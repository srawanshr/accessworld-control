<?php

use Illuminate\Database\Seeder;

class OperatingSystemsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operating_systems = [
            [
                'slug'       => 'windows-server-2012-r2',
                'name'       => 'Windows Server 2012 R2',
                'price'      => 0.0000,
                'is_active'  => 1,
                'created_at' => '2016-08-24 06:04:53',
                'updated_at' => '2016-08-24 06:04:53',
            ],
            [
                'slug'       => 'centos-6.7',
                'name'       => 'CentOS Release 6.7',
                'price'      => 0.0000,
                'is_active'  => 1,
                'created_at' => '2016-08-24 06:04:53',
                'updated_at' => '2016-08-24 06:04:53',
            ],
            [
                'slug'       => 'ubuntu-14-04-ispconfig',
                'name'       => 'Ubuntu 14.04 ISPConfig',
                'price'      => 0.0000,
                'is_active'  => 1,
                'created_at' => '2016-08-24 06:04:53',
                'updated_at' => '2016-08-24 06:04:53',
            ],
            [
                'slug'       => 'ubuntu-14-04-2g',
                'name'       => 'Ubuntu 14.04-2G',
                'price'      => 0.0000,
                'is_active'  => 1,
                'created_at' => '2016-08-24 06:04:53',
                'updated_at' => '2016-08-24 06:04:53',
            ],
        ];

        DB::table('operating_systems')->truncate();
        DB::table('operating_systems')->insert($operating_systems);
    }
}
