<?php

namespace App\Console\Commands;

use Exception;
use phpseclib\Net\SSH2;
use App\Models\Traffic;
use App\Models\VpsProvision;
use Illuminate\Console\Command;

class CrawlTraffic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'traffic:crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl all available Xen VPS to aggregate the traffic details';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (config('xenapi') as $key => $vm)
        {
            try
            {
                //Connecting with Host
                $ssh = new SSH2($vm['HOST']);
                if ($ssh->login($vm['USER'], $vm['PASSWORD']))
                {

                    // $host_uuid = $ssh->exec('xe host-list hostname='.$host.' --minimal');
                    // Getting list of DomID
                    $x = $ssh->exec('xe vm-list is-a-template=false is-a-snapshot=false params=dom-id resident-on=' . $vm['UUID'] . ' --minimal');

                    $list_of_domid = explode(',', $x);

                    foreach ($list_of_domid as $domid)
                    {
                        try
                        {
                            // Getting Network usage
                            $k     = [ "-1", "0" ];
                            $domid = trim($domid);
                            if ( ! in_array($domid, $k) && ! empty( $domid ))
                            {
                                $x     = $ssh->exec('grep vif' . $domid . '.0 /proc/net/dev');
                                $value = preg_split('/[\s]+/', str_replace(':', ': ', trim($x)));

                                if (( empty( $value[1] ) && empty( $value[9] ) ))
                                {
                                    $value[1] = 0;
                                    $value[9] = 0;
                                }

                                $c['in']  = $value[9];
                                $c['out'] = $value[1];

                                $value = $c;

                                $x    = $ssh->exec('xenstore-read /local/domain/' . trim($domid) . '/vm');
                                $uuid = trim(substr($x, 4));

                                $in    = $value['in'];
                                $out   = $value['out'];
                                $total = $in + $out;

                                $vpsExistsInRecord = VpsProvision::whereUuid($uuid)->exists();
                                if ($vpsExistsInRecord) Traffic::insert([
                                    'uuid'        => $uuid,
                                    'domid'       => $domid,
                                    'traffic_in'  => $in,
                                    'traffic_out' => $out,
                                    'total'       => $total,
                                    'host'        => $key,
                                ]);
                            }
                        } catch (Exception $e)
                        {
                            $message = 'Error inserting traffic data of VM with UUID=' . $uuid . ' Error Details: ' . $e->getMessage();
                            $this->info($message);
                            //                            $mailer->sendTrafficCrawlFailureEmail($message);
                            continue;
                        }
                    }
                }
            } catch (Exception $e)
            {
                $message = $e->getMessage();
                $this->info($message);
                //                $mailer->sendTrafficCrawlFailureEmail($message);
                continue;
            }
        }
    }
}
