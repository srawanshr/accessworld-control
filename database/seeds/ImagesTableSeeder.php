<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [];
        foreach (Service::all() as $service)
        {
            array_push($images, [
                'name'           => 'service-' . $service->slug,
                'size'           => 0,
                'path'           => 'service-' . $service->slug . '.png',
                'imageable_id'   => $service->id,
                'imageable_type' => Service::class
            ]);
        }

        DB::table('images')->insert($images);
    }
}
