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
                "price" => 10,
                "unit" => "per Core"
            ],
            [
                "name" => "RAM",
                "slug" => "ram",
                "price" => 3,
                "unit" => "per GB"
            ],
            [
                "name" => "Traffic",
                "slug" => "traffic",
                "price" => 0.5,
                "unit" => "per GB"
            ],
            [
                "name" => "Disk",
                "slug" => "disk",
                "price" => 0.02,
                "unit" => "per GB"
            ],
            [
                "name" => "Managed",
                "slug" => "is-managed",
                "price" => 0,
                "unit" => NULL,
            ]
        ];

        DB::table('vps_components')->insert($vps_components);

        DB::table('web_components')->truncate();

        $web_components = [
            [
                "name" => "Traffic",
                "slug" => "traffic",
                "price" => 0.5,
                "unit" => "per GB"
            ],
            [
                "name" => "Disk",
                "slug" => "disk",
                "price" => 0.02,
                "unit" => "per GB"
            ],
            [
                "name" => "Domain",
                "slug" => "domain",
                "price" => 0,
                "unit" => "per domain"
            ],
            [
                "name" => "Compute",
                "slug" => "compute",
                "price" => 1.1856,
                "unit" => "per domain"
            ]
        ];

        DB::table('web_components')->insert($web_components);

        DB::table('email_components')->truncate();

        $email_components = [
            [
                "name" => "Traffic",
                "slug" => "traffic",
                "price" => 0.5,
                "unit" => "per GB"
            ],
            [
                "name" => "Disk",
                "slug" => "disk",
                "price" => 0.02,
                "unit" => "per GB"
            ],
            [
                "name" => "Domain",
                "slug" => "domain",
                "price" => 0,
                "unit" => "per domain"
            ]
        ];

        DB::table('email_components')->insert($email_components);
    }
}
