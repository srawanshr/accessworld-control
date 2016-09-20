<?php
/*
* PHP XenAPI v1.0
* a class for XenServer API calls
*
* Copyright (C) 2010 Andy Goodwin <andyg@unf.net>
*
* This class requires xml-rpc, PHP5, and curl.
*
* Permission is hereby granted, free of charge, to any person obtaining
* a copy of this software and associated documentation files (the
* "Software"), to deal in the Software without restriction, including
* without limitation the rights to use, copy, modify, merge, publish,
* distribute, sublicense, and/or sell copies of the Software, and to
* permit persons to whom the Software is furnished to do so, subject to
* the following conditions:
*
* The above copyright notice and this permission notice shall be included
* in all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
* OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
* MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
* IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
* CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
* TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
* SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*
 * reference doc : http://docs.vmd.citrix.com/XenServer/6.5.0/1.0/en_gb/api/?c=VM
*
*/
namespace App\Services;

use App\Http\Requests;
use Exception;
use phpseclib\Net\SSH2;

class XenService
{
    private $_url;
    private $_session_id;
    private $_user;
    private $_password;

    public function connect ( $vm = null )
    {
        $connection = config ( 'xenapi.' . strtoupper ( $vm ) );

        $r = $this->xenrpc_request (
            $connection[ 'URL' ],
            $this->xenrpc_method (
                'session.login_with_password',
                [
                    $connection[ 'USER' ],
                    $connection[ 'PASSWORD' ],
                    '1.3'
                ]
            )
        );

        if ( is_array ( $r ) && $r[ 'Status' ] == 'Success' ) {
            $this->_session_id = $r[ 'Value' ];
            $this->_url = $connection[ 'URL' ];
            $this->_user = $connection[ 'USER' ];
            $this->_password = $connection[ 'PASSWORD' ];
            return true;
        } else {
            $this->error(implode(',',$r['ErrorDescription']));
        }
    }

    /**
     * @param $url
     * @param $req
     * @return mixed
     */
    public function xenrpc_request ( $url, $req )
    {
        $headers = ['Content-type: text/xml', 'Content-length: ' . strlen ( $req )];
        $ch = curl_init ( $url );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 180 );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $req );
        $resp = curl_exec ( $ch );
        curl_close ( $ch );
        $ret = xmlrpc_decode ( $resp );
        return $ret;
    }

    /**
     * @param $name
     * @param $params
     * @return mixed
     */
    public function xenrpc_method ( $name, $params )
    {
        return xmlrpc_encode_request ( $name, $params );
    }

    /**
     * @param string $name
     * @param array $args
     * @return bool
     */
    public function __call ( $name, $args )
    {
        if ( !is_array ( $args ) ) {
            $args = [];
        }
        //Pass _ in function
        $name = str_replace ( '__', '.', $name );
        list($mod, $method) = explode ( '_', $name, 2 );
        $mod = str_replace ( '.', '_', $mod );
        //end

        $res = $this->xenrpc_parseresponse ( $this->xenrpc_request ( $this->_url, $this->xenrpc_method ( $mod . '.' . $method, array_merge ( [$this->_session_id], $args ) ) ) );
        return $res;
    }

    /**
     * @param $response
     * @return bool
     */
    public function xenrpc_parseresponse ( $response )
    {
        $ret = false;

        if ( !@is_array ( $response ) && !@$response[ 'Status' ] ) {
            return $this->error ( 'xenrpc_parseresponse: errorcode = 0001' );
        } else {
            if ( strtolower ( $response[ 'Status' ] ) == 'success' ) {
                $ret = $response[ 'Value' ];
            } else {
                if ( $response[ 'ErrorDescription' ][ 0 ] == 'SESSION_INVALID' ) {
                    $r = $this->xenrpc_request ( $this->_url, $this->xenrpc_method ( 'session.login_with_password',
                        [$this->_user, $this->_password, '1.3'] ) );
                    if ( !is_array ( $r ) && $r[ 'Status' ] == 'Success' ) {
                        $this->_session_id = $r[ 'Value' ];
                    } else {
                        return $this->error ( 'xenrpc_parseresponse: errorcode = 0002' );
                    }
                } else {
                    return $this->error ( 'xenrpc_parseresponse: errorcode = 0003 ' . implode ( ' ', $response[ 'ErrorDescription' ] ) );
                }
            }
        }
        return $ret;
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    private function error ( $message = "unknown" )
    {
        die("API failure. (" . $message . ")");
    }

    public function provision ( $data = [] )
    {
        try {

            $vm = $this->getVm ( $data[ 'uuid' ] );

            $cloneVM = $this->getCloneVm ( $vm, $data[ 'server_id' ], $data[ 'name' ] );

            $this->VM_provision ( $cloneVM );

            // Adding Max VCpu and increase CPU
            $this->VM_set_VCPUs_max ( $cloneVM, $data[ 'cpu' ] );
            $this->VM_set_VCPUs_at_startup ( $cloneVM, $data[ 'cpu' ] );

            //Changing RAM size
            $this->VM_set_memory_limits ( $cloneVM, $data[ 'ram' ], $data[ 'ram' ], $data[ 'ram' ], $data[ 'ram' ] );

            //Disk Size
            $record = $this->VM_get_record ( $cloneVM );
            $VBD_OpaqueRef = $record[ 'VBDs' ][ 1 ];


            $record = $this->VBD_get_all_records ();

            $VDI_OpaqueRef = $record[ $VBD_OpaqueRef ][ 'VDI' ];
            $record = $this->VDI_get_all_records ();

            if(array_key_exists( $VDI_OpaqueRef, $record) && array_key_exists( 'uuid', $record[ $VDI_OpaqueRef ])){

                $vdi_uuid = $record[ $VDI_OpaqueRef ][ 'uuid' ];

            } else {
                $record = $this->VM_get_record ( $cloneVM );
                $VBD_OpaqueRef = $record[ 'VBDs' ][ 0 ];
                $record = $this->VBD_get_all_records ();

                $VDI_OpaqueRef = $record[ $VBD_OpaqueRef ][ 'VDI' ];
                $record = $this->VDI_get_all_records ();
                $vdi_uuid = $record[ $VDI_OpaqueRef ][ 'uuid' ];
            }

            $vdi = $this->VDI_get_by_uuid ( $vdi_uuid );
            $vdi_size = $data[ 'disk' ];
            $vdi_size = (string)$vdi_size;

            $this->VDI_resize ( $vdi, $vdi_size );
            $this->VDI_set_name_label ( $vdi, $data[ 'name' ] );

            $this->VM_start ( $cloneVM, false, false );

            //Get Info of New VPS
            $record = $this->VM_get_record ( $cloneVM );

            $new_uuid = $record[ 'uuid' ];
            $VIF_OpaqueRef = $record[ 'VIFs' ][ 0 ];
            $record_vif = $this->VIF_get_all_records ();

            $mac = trim ( $record_vif[ $VIF_OpaqueRef ][ 'MAC' ] );

            $vps = [
                'uuid'      => $new_uuid,
                'ip'        => $data[ 'ip' ],
                'vdi_uuid'  => $vdi_uuid,
                'server_id' => $data[ 'server_id' ],
                'name'      => $data[ 'name' ],
                'mac'       => $mac
            ];

            return $vps;
        } catch (Exception $e) {
            return $this->error ( 'provision: errorcode = 0004' . $e );
        }
    }

    /**
     * @return mixed
     */
    public function getVm ( $uuid )
    {
        return $this->VM_get_by_uuid ( $uuid );
    }

    /**
     * @return mixed
     */
    public function getCloneVm ( $vm, $serverId, $name )
    {
        $clone = $this->VM_clone ( $vm, $serverId );
        $this->VM_set_name_description ( $clone, $name );
        return $clone;
    }

    /**
     * @param $uuid
     * @return bool
     */
    public function pauseVM ( $uuid )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return $this->VM_pause ( $vm );
    }

    /**
     * @param $uuid
     * @return mixed
     */
    public function getVMByUuid ( $uuid )
    {
        return $this->VM_get_by_uuid ( $uuid );
    }

    /**
     * @param $uuid
     * @return bool
     */
    public function unpauseVM ( $uuid )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return $this->VM_unpause ( $vm );
    }

    /**
     * @param $uuid
     * @return bool
     */
    public function startVM ( $uuid )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return $this->VM_start ( $vm, false, true ); // vm, start paused, force start
    }

    /**
     * @param $uuid
     * @return bool
     */
    public function rebootVM ( $uuid )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return $this->VM_clean_reboot ( $vm );
    }

    /**
     * @param $uuid
     * @return bool
     */
    public function suspendVM ( $uuid )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return $this->VM_suspend ( $vm );
    }

    /**
     * @param $uuid
     * @return bool
     */
    public function resumeVM ( $uuid )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return $this->VM_resume ( $vm, false, false );
    }

    /**
     * @param $uuid
     * @param $name
     * @return bool
     */
    public function renameVM ( $uuid, $name )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return $this->VM_set_name_description ( $vm, $name );
    }

    /**
     * @param $uuid
     * @param $newCpu
     * @return bool
     */
    public function changeVMCPU ( $uuid, $newCpu )
    {
        $vm = $this->getVMByUuid ( $uuid );
        if ( !(strtolower ( $this->getRecord ( $uuid )[ 'power_state' ] ) == 'halted') )
            $this->haltVM ( $uuid );
        if ( intval ( $newCpu ) < intval ( $this->getRecord ( $uuid )[ 'VCPUs_max' ] ) ) {
            $this->VM_set_VCPUs_at_startup ( $vm, strval ( $newCpu ) );
            return $this->VM_set_VCPUs_max ( $vm, strval ( $newCpu ) );
        } elseif ( intval ( $newCpu ) > intval ( $this->getRecord ( $uuid )[ 'VCPUs_max' ] ) ) {
            $this->VM_set_VCPUs_max ( $vm, strval ( $newCpu ) );
            return $this->VM_set_VCPUs_at_startup ( $vm, strval ( $newCpu ) );
        }
        return false;
    }

    /**
     * @param $uuid
     * @return mixed
     */
    public function getRecord ( $uuid )
    {
        $vms_array = $this->VM_get_by_uuid ( $uuid );
        return $this->VM_get_record ( $vms_array );
    }

    /**
     * @param $uuid
     * @return bool
     */
    public function haltVM ( $uuid )
    {
        $vm = $this->getVMByUuid ( $uuid );
        $this->VM_hard_shutdown ( $vm );
        return true;
    }

    /**
     * @param $uuid
     * @param $newRam
     * @return bool
     */
    public function changeVMRAM ( $uuid, $newRam )
    {
        $newRam = strval ( $newRam * 1024 * 1024 * 1024 );
        $vm = $this->getVMByUuid ( $uuid );
        $this->VM_set_memory_limits ( $vm, $newRam, $newRam, $newRam, $newRam );
        return true;
    }

    /**
     * @param $uuid
     * @param $newDisk
     * @return bool
     */
    public function changeVMDisk ( $uuid, $newDisk )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return true;
    }

    /**
     * @param $uuid
     * @param $newTraffic
     * @return bool
     */
    public function changeTraffic ( $uuid, $newTraffic )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return true;
    }

    /**
     * @param $ip
     * @param OperatingSystem $operatingSystem
     * @param $username
     * @param $password_sha
     * @return bool
     */
    public function replaceDefaultUser ( $ip, OperatingSystem $operatingSystem, $username, $password_sha )
    {
        $ssh = new SSH2( $ip );
        $key = 'awt$123';
        $default = 'root';

        $root_password_cent = '$6$xmtpqpwH$MS820qK4dNRzkZmHlJCjN.w.MyDMB4YFAXStri3ewkYX3vBj0yto7nVsnpwQDgwYYbj5GFjnctH3aClJwilrl0';
        $root_password_ubuntu = '$6$YiSJ0Cny$hlkOfnKtFmy2hI2vYdlkxJ6pzbnwlxbSZjKvG7M5JKD3t79.2SS0jVqYWpll2rvXMObgr1OsXDWyuJNaPnhlj.';

        $password = str_replace ( '/', '\/', $password_sha );

        if ( ! $ssh->login ( $default, $key ) ) {
            $this->error('Invalid login credentials.');
        }


        if ( $operatingSystem->isUbuntu () ) //Ubuntu
        {
            //adding user
            $ssh->exec ( 'useradd ' . $username . ' -m -s /bin/bash -G sudo' );

            //updating user password
            $str = $ssh->exec ( " cat /etc/shadow | grep " . $username );
            $new_str = str_replace ( '!', $password, $str );
            $mid_str = "'s/^" . trim ( $str ) . "$/" . trim ( $new_str ) . "/'";
            $qry = "sed -i " . $mid_str . " /etc/shadow\n";

            $ssh->setTimeout ( 5 );
            $ssh->write ( $qry );
            $ssh->read ();

            //updating root password
            $str = $ssh->exec ( " cat /etc/shadow | grep root" );
            $new_str = str_replace ( $root_password_ubuntu, $password, $str );
            $mid_str = "'s/^" . trim ( $str ) . "$/" . trim ( $new_str ) . "/'";
            $qry = "sed -i " . $mid_str . " /etc/shadow\n";

            $ssh->setTimeout ( 10 );
            $ssh->write ( $qry );
            $ssh->read ();

            $ssh->exec ( "sed -i 's/^PermitRootLogin yes$/PermitRootLogin no/' /etc/ssh/sshd_config" );

            $ssh->exec ( "/root/resize.sh" );
            $ssh->read ();

            return true;
        } elseif ( $operatingSystem->isCentos () ) { // Cent OS
            //                 if ( $operatingSystem->isIspConfig () ) {
            // //                    $panel_pass = trim ( $ssh->exec ( "/root/mysqlreset.sh" ) );

            // //                    $this->password_panel = $panel_pass;
            // //                    $this->save ();
            //                 } else if ( $operatingSystem->isCpanel () ) {

            //                 }

            $ssh->exec ( 'useradd ' . $username . ' -G wheel' );

            //updating user password
            $str = $ssh->exec ( " cat /etc/shadow | grep " . $username );
            $new_str = str_replace ( '!!', $password, $str );
            $mid_str = "'s/^" . trim ( $str ) . "$/" . trim ( $new_str ) . "/'";
            $qry = "sed -i " . $mid_str . " /etc/shadow\n";

            $ssh->setTimeout ( 5 );
            $ssh->write ( $qry );
            $ssh->read ();

            //updating root password
            $str = $ssh->exec ( " cat /etc/shadow | grep root" );
            $new_str = str_replace ( $root_password_cent, $password, $str );
            $mid_str = "'s/^" . trim ( $str ) . "$/" . trim ( $new_str ) . "/'";
            $qry = "sed -i " . $mid_str . " /etc/shadow\n";

            $ssh->setTimeout ( 10 );
            $ssh->write ( $qry );
            $ssh->read ();

            $ssh->exec ( "sed -i 's/^#PermitRootLogin yes$/PermitRootLogin no/' /etc/ssh/sshd_config" );

            //Storage Extend LVM partition Script
            $str = $ssh->exec ( "/root/resize.sh" );
            $ssh->read ();

            return true;
        }

        return false;
    }

    /**
     * @param $uuid
     * @return mixed
     */
    private function destroyVM ( $uuid )
    {
        $vm = $this->getVMByUuid ( $uuid );
        return $this->destroy ();
    }
}
