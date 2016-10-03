<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Run the Setting model database seed.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'slug'       => 'name',
                'name'       => 'Name',
                'country_id' => 147,
                'value'      => 'AccessWorld Tech'
            ],
            [
                'slug'       => 'address',
                'name'       => 'Address',
                'country_id' => 147,
                'value'      => 'Krishnagalli, Patandhoka, Lalitpur',
            ],
            [
                'slug'       => 'phone',
                'name'       => 'Phone',
                'country_id' => 147,
                'value'      => '+977 9801000575',
            ],
            [
                'slug'       => 'email',
                'name'       => 'Email',
                'country_id' => 147,
                'value'      => 'sales@accessworld.net'
            ],
            [
                'slug'       => 'facebook',
                'name'       => 'Facebook',
                'country_id' => 147,
                'value'      => 'https://www.facebook.com/accessworld01'
            ],
            [
                'slug'       => 'twitter',
                'name'       => 'Twitter',
                'country_id' => 147,
                'value'      => 'https://www.twitter.com'
            ],
            [
                'slug'       => 'google_plus',
                'name'       => 'Google Plus',
                'country_id' => 147,
                'value'      => 'https://www.google.com'
            ],
            [
                'slug'       => 'logo',
                'name'       => 'Logo',
                'country_id' => 147,
                'value'      => public_path() . '\img\logo.png'
            ],
            [
                'slug'       => 'facebook_logo',
                'name'       => 'Facebook Logo',
                'country_id' => 147,
                'value'      => public_path() . '\img\facebook.png'
            ],
            [
                'slug'       => 'twitter_logo',
                'name'       => 'Twitter Logo',
                'country_id' => 147,
                'value'      => public_path() . '\img\twitter.png'
            ],
            [
                'slug'       => 'google_plus_logo',
                'name'       => 'Google Plus Logo',
                'country_id' => 147,
                'value'      => public_path() . '\img\google-plus.png'
            ],
            [
                'slug'       => 'order_mail_recipients',
                'name'       => 'Order Mail Notification Recipients',
                'country_id' => 147,
                'value'      => 'bharat@accessworld.net'
            ],
            [
                'slug'       => 'provision_mail_recipients',
                'name'       => 'Provision Mail Notification Recipients',
                'country_id' => 147,
                'value'      => 'it.support@accessworld.net'
            ],
            [
                'slug'       => 'vat',
                'name'       => 'VAT Percent',
                'country_id' => 147,
                'value'      => '0.13'
            ],
        ];

        DB::table('settings')->truncate();

        DB::table('settings')->insert($settings);
    }
}
