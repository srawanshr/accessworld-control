<?php

namespace App\Console\Commands;

use App\Models\DailyTraffic;
use App\Models\Traffic;
use App\Services\XenService;
use Exception;
use Illuminate\Console\Command;

class AggregateTraffic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'traffic:aggregate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aggregate data from traffic into daily_traffic';

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
        $today = date('Y-m-d');

        $traffic = Traffic::whereDate('created_date', '=', $today)->get();

        foreach ($traffic->groupBy('uuid') as $uuid => $records)
        {
            try
            {
                $dt = DailyTraffic::whereUuid($uuid)->first();
                if ($dt)
                {
                    $name = $dt->name;
                }
                else
                {
                    $host   = $records->first()->host;
                    $xen    = new XenService($host);
                    $record = $xen->getRecord($uuid);
                    $name   = empty( $record['name_description'] ) ? $record['name_label'] : $record['name_description'];
                }
            } catch (Exception $e)
            {
                $name = null;
            }

            $upload   = 0;
            $download = 0;

            $count = 0;
            foreach ($records->groupBy('domid') as $domainRecords)
            {
                if ($count == 0)
                {
                    $download = floatval($domainRecords->max('traffic_in') - $domainRecords->min('traffic_in'));
                    $upload   = floatval($domainRecords->max('traffic_out') - $domainRecords->min('traffic_out'));
                }
                else
                {
                    $download += floatval($domainRecords->max('traffic_in'));
                    $upload += floatval($domainRecords->max('traffic_out'));
                }
                $count ++;
            }
            $dailyTraffic           = DailyTraffic::firstOrCreate([ 'date' => $today, 'uuid' => $uuid ]);
            $dailyTraffic->upload   = $upload;
            $dailyTraffic->download = $download;
            $dailyTraffic->total    = $upload + $download;
            $dailyTraffic->name     = $name;
            $dailyTraffic->save();
        }
    }
}
