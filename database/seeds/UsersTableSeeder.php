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
        // create user
        $user = User::firstOrCreate([
            'username' => 'super_admin',
            'email'    => 'super@accessworld.net',
        ]);
        $user->password = bcrypt('admin@awt');
        $user->save();
        //adding permissions to super user
        $superRole = Role::first();

        $user->attachRole($superRole);
    }
}
