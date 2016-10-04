<?php

use App\Models\User;
use App\Models\UserDetail;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        // create user
        $user = User::create([
            'username' => 'super_admin',
            'email'    => 'super@accessworld.net',
            'password' => bcrypt('admin@awt')
        ]);
        //adding permissions to super user
        $superRole = Role::first();

        $user->attachRole($superRole);
    }
}
