<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'name'        => 'Super Administrator',
            'slug'        => 'super',
            'description' => 'One role to rule them all',
            'level'       => '9001',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('roles')->truncate();

        DB::table('roles')->insert($roles);

        $super = \Bican\Roles\Models\Role::first();

        $super->attachPermission(\Bican\Roles\Models\Permission::all());

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
