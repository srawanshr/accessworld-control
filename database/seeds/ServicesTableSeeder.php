<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('services')->truncate();

        DB::table('services')->insert([
            /*
            |--------------------------------------------------------------------------
            | VPS
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Cloud VPS',
                'slug'              => 'vps',
                'short_description' => 'Create an instance and launch your VPS in minutes. We provide you with improved efficiency, reduced costs and streamlined support.',
                'view'              => 'service.show',
                'order'             => 0,
                'is_active'         => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Web
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Web Hosting',
                'slug'              => 'web',
                'short_description' => 'Host your website in Nepal. Your website loads faster and your visitors get improved experience. Simple, quick and easy.',
                'view'              => 'service.show',
                'order'             => 1,
                'is_active'         => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Email
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Enterprise Secure Email',
                'slug'              => 'email',
                'short_description' => 'Secure email service for all your staff. Unlimited mailboxes, flexible storage, encrypted transmission and great support.',
                'view'              => 'service.show',
                'order'             => 2,
                'is_active'         => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | Domain
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'Domain',
                'slug'              => 'domain',
                'short_description' => 'Domain registration is the process of registering a domain name, which identifies one or more IP addresses with a name that is easier to remember and use in URLs to identify particular Web pages.',
                'view'              => 'service.show',
                'order'             => 3,
                'is_active'         => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            /*
            |--------------------------------------------------------------------------
            | SSL Certificate
            |--------------------------------------------------------------------------
            */
            [
                'name'              => 'SSL Certificate',
                'slug'              => 'ssl-certificate',
                'short_description' => 'SSL stands for Secure Sockets Layer, its a technology that enables encryption between web server and web browser.',
                'view'              => 'service.show',
                'order'             => 3,
                'is_active'         => true,
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
