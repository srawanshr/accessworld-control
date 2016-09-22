<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder {

    /**
     * Run the Setting model database seed.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'slug'  => 'name',
                'name'  => 'Name',
                'value' => 'AccessWorld Tech'
            ],
            [
                'slug'  => 'address',
                'name'  => 'Address',
                'value' => 'Krishnagalli, Patandhoka, Lalitpur',
            ],
            [
                'slug'  => 'phone',
                'name'  => 'Phone',
                'value' => '+977 9801000575',
            ],
            [
                'slug'  => 'email',
                'name'  => 'Email',
                'value' => 'sales@accessworld.net'
            ],
            [
                'slug'  => 'facebook',
                'name'  => 'Facebook',
                'value' => 'https://www.facebook.com/accessworld01'
            ],
            [
                'slug'  => 'twitter',
                'name'  => 'Twitter',
                'value' => 'https://www.twitter.com'
            ],
            [
                'slug'  => 'google_plus',
                'name'  => 'Google Plus',
                'value' => 'https://www.google.com'
            ],
            [
                'slug'  => 'logo',
                'name'  => 'Logo',
                'value' => public_path().'\img\logo.png'
            ],
            [
                'slug'  => 'facebook_logo',
                'name'  => 'Facebook Logo',
                'value' => public_path().'\img\facebook.png'
            ],
            [
                'slug'  => 'twitter_logo',
                'name'  => 'Twitter Logo',
                'value' => public_path().'\img\twitter.png'
            ],
            [
                'slug'  => 'google_plus_logo',
                'name'  => 'Google Plus Logo',
                'value' => public_path().'\img\google-plus.png'
            ],
        ];

        DB::table('settings')->truncate();

        DB::table('settings')->insert($settings);
    }
}
