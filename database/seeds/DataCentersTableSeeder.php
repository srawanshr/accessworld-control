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
                'country_id'    => 147,
                'slug'       => 'krishna-galli',
                'name'       => 'Krishna Galli',
                'prefix'     => 'K',
                'price_usd'      => 0.0000,
                'price_npr'      => 0.0000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'country_id'    => 147,
                'slug'       => 'putalisadak',
                'name'       => 'Putalisadak',
                'prefix'     => 'P',
                'price_usd'      => 0.0000,
                'price_npr'      => 0.0000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ];

        DB::table('data_centers')->truncate();
        DB::table('data_centers')->insert($data_centers);
    }
}
