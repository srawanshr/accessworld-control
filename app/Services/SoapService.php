<?php
namespace App\Services;

use App\Models\Lakuri3Client;
use Exception;
use Illuminate\Support\Facades\DB;
use SoapClient;
use SoapFault;

class SoapService
{
    const EMAIL = 'email', WEB = 'web';
    protected $soapClient;
    protected $session;
    protected $client;
    protected $reseller = 0;
    protected $domainId;
    protected $serviceType;

    /**
     * SoapController constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function connect()
    {
        try
        {
            $connection = config('lakuri');

            $this->soapClient = new SoapClient(null, [
                'location'  => $connection['LOCATION'],
                'uri'       => $connection['URI'],
                'trace'     => '1',
                'exception' => '1'
            ]);

            $this->session = $this->soapClient->login($connection['USERNAME'], $connection['PASSWORD']);

            return true;
        } catch (SoapFault $e)
        {
            throw new Exception($this->soapClient->__getLastResponse() . ' SOAP Error: ' . $e->getMessage());
        }
    }

    /**
     * @param array $data
     * @return bool
     */
    public function provisionEmail($data = [])
    {
        $this->verifyEmailData($data);

        $this->setClient($data);

        //Email domain
        $params = [
            'server_id' => 3, //Server_id =3 is for lakuri3-mail.accessworld.net
            'domain'    => $data['name'],
            'active'    => 'y'
        ];

        $domainId = $this->soapClient->mail_domain_add($this->session, $this->client['client_id'], $params);

        return $domainId;
    }

    /**
     * @param $data
     * @throws Exception
     */
    private function verifyEmailData($data)
    {
        $keys = [ 'name', 'customer' ];
        foreach ($keys as $key)
        {
            if ( ! array_key_exists($key, $data)) throw new Exception("Insufficient Data. $key not found");
        }
    }

    /**
     * @param array $data
     * @return bool
     */
    public function provisionWeb($data = [])
    {
        $this->verifyWebData($data);

        $this->setClient($data);

        $timestamp = date('Y-m-d H:i:s');
        $clientId  = $this->client['client_id'];
        $customer = $data['customer'];

        //Web Domain
        $params = [
            'server_id'               => 1, // server_id =1 is for lakuri2.accessworld.net
            'ip_address'              => '*',
            'domain'                  => $data['name'],
            'type'                    => 'vhost',
            'parent_domain_id'        => 0,
            'vhost_type'              => 'name',
            'hd_quota'                => $data['disk'],
            'traffic_quota'           => $data['traffic'],
            'cgi'                     => 'n',
            'ssi'                     => 'n',
            'suexec'                  => 'y',
            'errordocs'               => 1,
            'is_subdomainwww'         => 1,
            'subdomain'               => 'www',
            'php'                     => 'fast-cgi',
            'ruby'                    => 'n',
            'redirect_type'           => '',
            'redirect_path'           => '',
            'ssl'                     => 'n',
            'ssl_state'               => '',
            'ssl_locality'            => '',
            'ssl_organisation'        => '',
            'ssl_organisation_unit'   => '',
            'ssl_country'             => 'NP',
            'ssl_domain'              => '',
            'ssl_request'             => '',
            'ssl_cert'                => '',
            'ssl_bundle'              => '',
            'ssl_action'              => '',
            'stats_password'          => '',
            'stats_type'              => 'webalizer',
            'allow_override'          => 'All',
            'apache_directives'       => '',
            'php_open_basedir'        => '/',
            'custom_php_ini'          => '',
            'backup_interval'         => 'none',
            'backup_copies'           => 1,
            'active'                  => 'y',
            'pm_max_requests'         => '0',
            'pm_process_idle_timeout' => '10',
            'pm_max_children'         => '10',
            'pm_start_servers'        => '2',
            'pm_min_spare_servers'    => '1',
            'pm_max_spare_servers'    => '5',
            'php_fpm_use_socket'      => 'y',
            'pm'                      => 'dynamic',
            'added_date'              => date('Y-m-j'),
            'added_by'                => auth()->user()->username,
            'traffic_quota_lock'      => 'n'
        ];

        $domainId = $this->soapClient->sites_web_domain_add($this->session, $clientId, $params, $readonly = false);

        $this->setDomainId($domainId);

        //DNS Zone alias for testing
        $params = [
            'server_id'   => 1,
            'origin'      => $data['name'] . ".", #.s.access.com.np
            'ns'          => 'ns1.accessworld.net.',
            'mbox'        => 'dnsops.accessworld.net.',
            //'serial' => '1',
            'refresh'     => '7200',
            'retry'       => '7200',
            'expire'      => '604800',
            'minimum'     => '3600',
            'ttl'         => '3600',
            'active'      => 'y',
            'xfer'        => '',
            'also_notify' => '',
            'update_acl'  => '',
        ];

        $zone_id = $this->soapClient->dns_zone_add($this->session, $clientId, $params);

        //NS1 Record
        $params = [
            'server_id' => 1,
            'zone'      => $zone_id,
            'name'      => $data['name'] . ".", #.s.access.com.np
            'type'      => 'NS',
            'data'      => 'ns1.accessworld.net.',
            'aux'       => '0',
            'ttl'       => '3600',
            'active'    => 'y',
            'stamp'     => $timestamp,
            //'serial' => '1',
        ];


        $ns1_id = $this->soapClient->dns_ns_add($this->session, $clientId, $params);

        //NS2 Record
        $params = [
            'server_id' => 1,
            'zone'      => $zone_id,
            'name'      => $data['name'] . ".", #.s.access.com.np
            'type'      => 'NS',
            'data'      => 'ns2.accessworld.net.',
            'aux'       => '0',
            'ttl'       => '3600',
            'active'    => 'y',
            'stamp'     => $timestamp,
            //'serial' => '1',
        ];


        $ns2_id = $this->soapClient->dns_ns_add($this->session, $clientId, $params);

        //A Record
        $params = [
            'server_id' => 1,
            'zone'      => $zone_id,
            'name'      => $data['name'] . ".", #.s.access.com.np
            'type'      => 'A',
            'data'      => config('lakuri.IP'),
            'aux'       => '0',
            'ttl'       => '3600',
            'active'    => 'y',
            'stamp'     => $timestamp,
            //'serial' => '1',
        ];


        $a_id = $this->soapClient->dns_a_add($this->session, $clientId, $params);

        //Alias Domain
        $params = [
            'server_id'             => 1,
            'ip_address'            => '',
            'domain'                => $data['name'] .".access.com.np",
            'type'                  => 'alias',
            'parent_domain_id'      => $domainId,
            'vhost_type'            => '',
            'document_root'         => '',
            'system_user'           => '',
            'system_group'          => '',
            'hd_quota'              => $data['disk'],
            'traffic_quota'         => $data['traffic'],
            'cgi'                   => 'y',
            'ssi'                   => 'y',
            'suexec'                => 'y',
            'errordocs'             => 1,
            'is_subdomainwww'       => 1,
            'subdomain'             => '',
            'php'                   => 'y',
            'ruby'                  => 'n',
            'redirect_type'         => '',
            'redirect_path'         => '',
            'ssl'                   => 'n',
            'ssl_state'             => '',
            'ssl_locality'          => '',
            'ssl_organisation'      => '',
            'ssl_organisation_unit' => '',
            'ssl_country'           => '',
            'ssl_domain'            => '',
            'ssl_request'           => '',
            'ssl_cert'              => '',
            'ssl_bundle'            => '',
            'ssl_action'            => '',
            'stats_password'        => '',
            'stats_type'            => 'webalizer',
            'allow_override'        => 'All',
            'apache_directives'     => '',
            'php_open_basedir'      => '/php',
            'custom_php_ini'        => '',
            'backup_interval'       => '',
            'backup_copies'         => 1,
            'active'                => 'y',
            'traffic_quota_lock'    => 'n'
        ];


        $aliasdomain_id = $this->soapClient->sites_web_aliasdomain_add($this->session, $clientId, $params);

        //FTP User
        $username_ftp = $customer->username . '_' . $domainId;
        $params       = [
            'server_id'        => 1, //
            'parent_domain_id' => $domainId,
            'username'         => $username_ftp,
            'username_prefix'  => $data['username'],
            'password'         => $data['ftp_password'],
            'quota_size'       => - 1,
            'active'           => 'y',
            'uid'              => 'web' . $domainId,
            'gid'              => 'client' . $clientId,
            'dir'              => '/var/www/clients/client' . $clientId . '/web' . $domainId,
            'quota_files'      => - 1,
            'ul_ratio'         => - 1,
            'dl_ratio'         => - 1,
            'ul_bandwidth'     => - 1,
            'dl_bandwidth'     => - 1
        ];


        $this->soapClient->sites_ftp_user_add($this->session, $clientId, $params);

        return $domainId;
    }

    /**
     * @param $data
     * @throws Exception
     */
    private function verifyWebData($data)
    {
        $keys = [ 'domain', 'traffic', 'disk', 'name', 'customer' ];
        foreach ($keys as $key)
        {
            if ( ! array_key_exists($key, $data)) throw new Exception("Insufficient Data. $key not found");
        }
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param $data
     * @return bool
     */
    public function setClient($data)
    {
        return $this->clientExists($data['username']);
        if ($this->clientExists($data['username']))
        {
            $this->updateClient($data);
        }
        else
        {
            $this->createClient($data);
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function clientExists($username)
    {
        $exists = $this->soapClient->client_get_by_username($this->session, $username);
        if ($exists) $this->client = $this->soapClient->client_get($this->session, $exists['client_id']);

        return $exists;
    }

    /**
     * @return mixed
     */
    public function getCustomerNo()
    {
        return Lakuri3Client::select(DB::raw("concat('C',max(cast(substring(customer_no,2) as unsigned))+1)cno"))->whereRaw("substring(customer_no,1,1)='C'")->first()->cno;
    }

    /**
     * @return mixed
     */
    public function getSoapClient()
    {
        return $this->soapClient;
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return mixed
     */
    public function getDomainId()
    {
        return $this->domainId;
    }

    /**
     * @param mixed $domainId
     */
    public function setDomainId($domainId)
    {
        $this->domainId = $domainId;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function disconnect()
    {
        $this->soapClient->logout($this->session);
    }

    public function setStatus($status)
    {
        $this->soapClient->mail_domain_set_status($this->session, $this->primary_id, $status);
    }

    public function getEmailRecord($domain_id)
    {
        return $this->soapClient->mail_domain_get($this->session, $domain_id);
    }

    public function getWebRecord($domain_id)
    {
        return $this->soapClient->sites_web_domain_get($this->session, $domain_id);
    }

    public function setEmailStatus($domain_id, $status)
    {
        return $this->soapClient->mail_domain_set_status($this->session, $domain_id, $status);
    }

    public function setWebStatus($domain_id, $status)
    {
        return $this->soapClient->sites_web_domain_set_status($this->session, $domain_id, $status);
    }

    /**
     * @param $data
     * @return mixed
     */
    private function updateClient($data)
    {
        // Set the function parameters.

        $disk         = $data['disk'] * 1000;
        $traffic      = $data['traffic'] * 1000;
        $no_of_domain = $data['domain'];

        $params = $this->client;

        if ($this->serviceType = self::EMAIL)
        {
            $params['limit_maildomain']        = $this->client['limit_maildomain'] + $no_of_domain;
            $params['limit_mailbox']           = - 1;
            $params['limit_mailalias']         = - 1;
            $params['limit_mailaliasdomain']   = - 1;
            $params['limit_mailforward']       = - 1;
            $params['limit_mailcatchall']      = - 1;
            $params['limit_mailrouting']       = 0;
            $params['limit_mailfilter']        = - 1;
            $params['limit_fetchmail']         = - 1;
            $params['limit_mailquota']         = $this->client['limit_mailquota'] + $disk;
            $params['limit_spamfilter_policy'] = - 1;
        }
        elseif ($this->serviceType = self::WEB)
        {
            $params['limit_web_domain']      = $this->client['limit_maildomain'] + $no_of_domain;
            $params['limit_web_quota']       = $this->client['limit_mailquota'] + $disk;
            $params['limit_web_subdomain']   = $no_of_domain * 2;
            $params['limit_web_aliasdomain'] = $no_of_domain * 2;
            $params['limit_ftp_user']        = $no_of_domain * 2;
            $params['limit_database']        = $no_of_domain;
        }

        $params['limit_dns_record']    = $this->client['limit_dns_record'] + ( $no_of_domain * 5 );
        $params['limit_traffic_quota'] = $this->client['limit_traffic_quota'] + $traffic;
        $params['added_by']            = auth()->user()->username;

        try
        {
            $updatedClient = $this->soapClient->client_update($this->session, $this->client['client_id'], $this->reseller, $params);
        } catch (SoapFault $e)
        {
            return redirect()->route('admin.' . $this->serviceType . 'order.index')->withError('Soap error. Update client failed! ' . $e->getMessage());
        }

        return $updatedClient;
    }

    /**
     * @return mixed
     */
    private function createClient($data)
    {
        // Set the function parameters.
        try
        {
            $disk         = $data['disk'] * 1000;
            $traffic      = $data['traffic'] * 1000;
            $no_of_domain = $data['domain'];
            $customer     = $data['customer'];

            $params['company_name']       = $customer->company;
            $params['contact_name']       = $customer->name;
            $params['customer_no']        = $this->getCustomerNo();
            $params['vat_id']             = '';
            $params['street']             = '';
            $params['zip']                = '';
            $params['city']               = $customer->address;
            $params['state']              = '';
            $params['country']            = $customer->country;
            $params['telephone']          = $customer->phone;
            $params['mobile']             = $customer->phone;
            $params['fax']                = '';
            $params['email']              = $customer->email;
            $params['internet']           = '';
            $params['icq']                = '';
            $params['notes']              = '';
            $params['default_mailserver'] = 3;

            if ($this->serviceType == self::EMAIL)
            {
                $params['limit_maildomain']        = $no_of_domain;
                $params['limit_mailbox']           = - 1;
                $params['limit_mailalias']         = - 1;
                $params['limit_mailaliasdomain']   = - 1;
                $params['limit_mailforward']       = - 1;
                $params['limit_mailcatchall']      = - 1;
                $params['limit_mailrouting']       = 0;
                $params['limit_mailfilter']        = - 1;
                $params['limit_fetchmail']         = - 1;
                $params['limit_mailquota']         = $disk;
                $params['limit_spamfilter_policy'] = - 1;
                $params['limit_web_domain']        = 0;
                $params['limit_web_quota']         = 0;
                $params['limit_web_subdomain']     = 0;
                $params['limit_web_aliasdomain']   = 0;
                $params['limit_ftp_user']          = 0;
                $params['limit_database']          = 0;

                //web fields

                $params['limit_maildomain']        = 0;
                $params['limit_mailbox']           = 0;
                $params['limit_mailalias']         = 0;
                $params['limit_mailaliasdomain']   = 0;
                $params['limit_mailforward']       = 0;
                $params['limit_mailcatchall']      = 0;
                $params['limit_mailrouting']       = 0;
                $params['limit_mailfilter']        = 0;
                $params['limit_fetchmail']         = 0;
                $params['limit_mailquota']         = 0;
                $params['limit_spamfilter_policy'] = 0;
                $params['limit_web_domain']        = 0;
                $params['limit_web_quota']         = 0;
                $params['limit_web_subdomain']     = 0;
                $params['limit_web_aliasdomain']   = 0;
                $params['limit_ftp_user']          = - 1;
                $params['limit_database']          = $no_of_domain;
            }
            elseif ($this->serviceType == self::WEB)
            {
                // email fields
                $params['limit_maildomain']        = $no_of_domain;
                $params['limit_mailbox']           = 0;
                $params['limit_mailalias']         = 0;
                $params['limit_mailaliasdomain']   = 0;
                $params['limit_mailforward']       = 0;
                $params['limit_mailcatchall']      = 0;
                $params['limit_mailrouting']       = 0;
                $params['limit_mailfilter']        = 0;
                $params['limit_fetchmail']         = 0;
                $params['limit_mailquota']         = 0;
                $params['limit_spamfilter_policy'] = 0;
                $params['limit_web_domain']        = 0;
                $params['limit_web_quota']         = 0;
                $params['limit_web_subdomain']     = 0;
                $params['limit_web_aliasdomain']   = 0;
                $params['limit_ftp_user']          = 0;
                $params['limit_database']          = 0;
                // web fields
                $params['limit_maildomain']        = 0;
                $params['limit_mailbox']           = 0;
                $params['limit_mailalias']         = 0;
                $params['limit_mailaliasdomain']   = 0;
                $params['limit_mailforward']       = 0;
                $params['limit_mailcatchall']      = 0;
                $params['limit_mailrouting']       = 0;
                $params['limit_mailfilter']        = 0;
                $params['limit_fetchmail']         = 0;
                $params['limit_mailquota']         = 0;
                $params['limit_spamfilter_policy'] = 0;
                $params['limit_web_domain']        = $no_of_domain;
                $params['limit_web_quota']         = $disk;
                $params['limit_web_subdomain']     = - 1;
                $params['limit_web_aliasdomain']   = - 1;
                $params['limit_ftp_user']          = - 1;
                $params['limit_database']          = $no_of_domain;
            }
            $params['limit_spamfilter_wblist'] = 0;
            $params['limit_spamfilter_user']   = 0;
            $params['default_webserver']       = 1;
            $params['limit_web_ip']            = '';
            $params['web_php_options']         = 'no,fast-cgi,cgi,mod,suphp';
            $params['limit_shell_user']        = 0;
            $params['ssh_chroot']              = 'no,jailkit,ssh-chroot';
            $params['limit_webdav_user']       = 0;
            $params['default_dnsserver']       = 1;
            $params['limit_dns_zone']          = - 1;
            $params['limit_dns_slave_zone']    = - 1;
            $params['limit_dns_record']        = $no_of_domain * 5;
            $params['default_dbserver']        = 2;
            $params['limit_cron']              = 0;
            $params['limit_cron_type']         = 'url';
            $params['limit_cron_frequency']    = 5;
            $params['limit_traffic_quota']     = $traffic;
            $params['limit_client']            = 0; // If this value is > 0, then the client is a reseller
            $params['parent_client_id']        = 0;
            $params['username']                = $customer->username;
            $params['password']                = $this->salted($data['password']);
            $params['language']                = 'en';
            $params['usertheme']               = 'default';
            $params['template_master']         = 0;
            $params['template_additional']     = '';
            $params['created_at']              = 0;
            $params['added_date']              = date('Y-m-j');
            $params['added_by']                = auth()->user()->username;

            $clientId = $this->soapClient->client_add($this->session, $this->reseller, $params);

            $client = $this->soapClient->client_get($this->session, $clientId);
        } catch (SoapFault $e)
        {
            return redirect()->route('admin.' . $this->serviceType . 'order.index')->withError('Soap error. Add client failed! ' . $e->getMessage());
        }

        return $client;
    }

    private function salted($password)
    {
        return crypt( $password, '$1$' . str_random( 8 ) . '$' );
    }
}