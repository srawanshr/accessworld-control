<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();

        DB::table('permissions')->insert([
            /*
            |--------------------------------------------------------------------------
            | Role CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Update and insert role',
                'slug' => 'upsert.role',
                'model' => 'Bican\Roles\Models\Role',
                'description' => 'Permission to update and insert roles'
            ],
            [
                'name' => 'Read Role',
                'slug' => 'read.role',
                'model' => 'Bican\Roles\Models\Role',
                'description' => 'Permission to view roles'
            ],
            [
                'name' => 'Delete Role',
                'slug' => 'delete.role',
                'model' => 'Bican\Roles\Models\Role',
                'description' => 'Permission to delete roles'
            ],
            /*
            |--------------------------------------------------------------------------
            | User CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Update and insert User',
                'slug' => 'upsert.user',
                'model' => 'App\Models\User',
                'description' => 'Permission to update or insert users'
            ],
            [
                'name' => 'Read User',
                'slug' => 'read.user',
                'model' => 'App\Models\User',
                'description' => 'Permission to view user list'
            ],
            [
                'name' => 'Delete User',
                'slug' => 'delete.user',
                'model' => 'App\Models\User',
                'description' => 'Permission to delete users'
            ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
