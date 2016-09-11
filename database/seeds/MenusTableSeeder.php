<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('menus')->truncate();

        DB::table('menus')->insert([
            [
                'slug'       => 'home',
                'name'       => 'Home',
                'url'        => '/',
                'order'      => 0,
                'is_primary' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'slug'       => 'services',
                'name'       => 'Services',
                'url'        => '/page/services',
                'order'      => 1,
                'is_primary' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'slug'       => 'about',
                'name'       => 'About',
                'url'        => 'page/about',
                'order'      => 2,
                'is_primary' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'slug'       => 'contact',
                'name'       => 'Contact',
                'url'        => 'page/contact',
                'order'      => 3,
                'is_primary' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
