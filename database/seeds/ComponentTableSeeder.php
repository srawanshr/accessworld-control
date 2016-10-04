<?php

use Illuminate\Database\Seeder;

class ComponentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {DB::table('vps_components')->truncate();

        $vps_components = [
            [
                "name" => "CPU",
                "slug" => "cpu",
                "price_usd" => 10,
                "price_npr" => 1070,
                "unit" => "per Core"
            ],
            [
                "name" => "RAM",
                "slug" => "ram",
                "price_usd" => 3,
                "price_npr" => 321,
                "unit" => "per GB"
            ],
            [
                "name" => "Traffic",
                "slug" => "traffic",
                "price_usd" => 0.5,
                "price_npr" => 53.5,
                "unit" => "per GB"
            ],
            [
                "name" => "Disk",
                "slug" => "disk",
                "price_usd" => 0.02,
                "price_npr" => 2.14,
                "unit" => "per GB"
            ],
            [
                "name" => "Managed",
                "slug" => "is-managed",
                "price_npr" => 0,
                "price_usd" => 0,
                "unit" => NULL,
            ]
        ];

        DB::table('vps_components')->insert($vps_components);

        DB::table('web_components')->truncate();

        $web_components = [
            [
                "name" => "Traffic",
                "slug" => "traffic",
                "price_usd" => 0.5,
                "price_npr" => 53.5,
                "unit" => "per GB"
            ],
            [
                "name" => "Disk",
                "slug" => "disk",
                "price_usd" => 0.02,
                "price_npr" => 2.14,
                "unit" => "per GB"
            ],
            [
                "name" => "Domain",
                "slug" => "domain",
                "price_usd" => 0,
                "price_npr" => 0,
                "unit" => "per domain"
            ],
            [
                "name" => "Compute",
                "slug" => "compute",
                "price_usd" => 1.1856,
                "price_npr" => 126.8592,
                "unit" => "per domain"
            ]
        ];

        DB::table('web_components')->insert($web_components);

        DB::table('email_components')->truncate();

        $email_components = [
            [
                "name" => "Traffic",
                "slug" => "traffic",
                "price_usd" => 0.5,
                "price_npr" => 53.5,
                "unit" => "per GB"
            ],
            [
                "name" => "Disk",
                "slug" => "disk",
                "price_usd" => 0.02,
                "price_npr" => 2.14,
                "unit" => "per GB"
            ],
            [
                "name" => "Domain",
                "slug" => "domain",
                "price_usd" => 0,
                "price_npr" => 0,
                "unit" => "per domain"
            ]
        ];

        DB::table('email_components')->insert($email_components);
    }
}
