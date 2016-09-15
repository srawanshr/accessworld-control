<?php

namespace App\Console\Commands;

use App\Models\EmailProvision;
use App\Models\VpsProvision;
use App\Models\WebProvision;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendExpiryEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send service expiry notification';

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
        $provisions = VpsProvision::all()->merge(WebProvision::all())->merge(EmailProvision::all());
        $count = 0;
        $expiredCount = 0;
        foreach ($provisions as $provision) {
            $frequency = config('awt.email_frequency');
            if($provision->subscriptions->isEmpty())
                continue;
            $term = $provision->subscriptions->sortByDesc('subscribed_date')->first()->term;

            $today = Carbon::today();

            $expiryDate = Carbon::createFromFormat ( 'Y-m-d', $provision->expires_on );

            if(array_key_exists($term, $frequency)) {
                foreach ($frequency[ $term ] as $checkpoint) {
                    $checkpointData = explode ( '|', $checkpoint );

                    $checkPointExpiry = Carbon::today ()->{'add' . ucwords ( $checkpointData[ 1 ] )}( $checkpointData[ 0 ] );

                    if ( $expiryDate->isSameDay ( $checkPointExpiry ) ) {
                        echo $provision->name . ' has ' . $checkpointData[ 0 ] . ' ' . $checkpointData[ 1 ] . " left for expiry.\n";
                        $count++;
                        // $this->mailer->sendExpiryEmailTo ( $customer, $provision );
                    }
                }
            }

            if($today->isSameDay($expiryDate))
            {
                $expiredCount ++;
                $provision->update(['is_suspended' => 1]);
            }
        }

        echo $count. " expired services notifications\n";
        echo $count. " services expired today\n";
    }
}
