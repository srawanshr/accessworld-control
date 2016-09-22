<?php

namespace App\Console\Commands;

use App\Models\DailyTraffic;
use App\Models\Traffic;
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
    protected $description = 'Aggregate daily traffic from the raw traffic data';

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
        $traffic = Traffic::whereDate('created_date', '=', date('Y-m-d'))->get();

        //        $vpsName = VpsProvision::lists('name', 'uuid');

        foreach ($traffic->groupBy('uuid') as $uuid => $records)
        {
            $upload = 0;
            $download = 0;
            foreach ($records->groupBy('domid') as $domainRecords)
            {
                $download += floatval($domainRecords->max('traffic_in'));
                $upload += floatval($domainRecords->max('traffic_out'));
            }
            $dailyTraffic = DailyTraffic::firstOrCreate(['date' => date('Y-m-d'), 'uuid' => $uuid]);
            $dailyTraffic->upload = $upload;
            $dailyTraffic->download = $download;
            $dailyTraffic->total = $upload + $download;
            $dailyTraffic->save();
        }
    }
}
