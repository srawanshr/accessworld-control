<?php

use Illuminate\Database\Seeder;

class DataCentersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_centers = [
            [
                'country'    => 'Nepal',
                'slug'       => 'krishna-galli',
                'name'       => 'Krishna Galli',
                'prefix'     => 'K',
                'price'      => 0.0000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'country'    => 'Nepal',
                'slug'       => 'putalisadak',
                'name'       => 'Putalisadak',
                'prefix'     => 'P',
                'price'      => 0.0000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('data_centers')->truncate();
        DB::table('data_centers')->insert($data_centers);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
