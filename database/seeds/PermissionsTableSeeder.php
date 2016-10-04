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
        $permissions = [
            /*
            |--------------------------------------------------------------------------
            | Role CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Update and insert role',
                'slug'        => 'save.role',
                'model'       => 'Bican\Roles\Models\Role',
                'description' => 'Permission to update and insert roles'
            ],
            [
                'name'        => 'Read role',
                'slug'        => 'read.role',
                'model'       => 'Bican\Roles\Models\Role',
                'description' => 'Permission to view roles'
            ],
            [
                'name'        => 'Delete role',
                'slug'        => 'delete.role',
                'model'       => 'Bican\Roles\Models\Role',
                'description' => 'Permission to delete roles'
            ],
            /*
            |--------------------------------------------------------------------------
            | User CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Update and insert user',
                'slug'        => 'save.user',
                'model'       => 'App\Models\User',
                'description' => 'Permission to update or insert users'
            ],
            [
                'name'        => 'Read user',
                'slug'        => 'read.user',
                'model'       => 'App\Models\User',
                'description' => 'Permission to view user list'
            ],
            [
                'name'        => 'Delete user',
                'slug'        => 'delete.user',
                'model'       => 'App\Models\User',
                'description' => 'Permission to delete users'
            ],
            /*
            |--------------------------------------------------------------------------
            | Customer CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Update and insert customer',
                'slug'        => 'save.customer',
                'model'       => 'App\Models\Customer',
                'description' => 'Permission to update or insert customers'
            ],
            [
                'name'        => 'Read customer',
                'slug'        => 'read.customer',
                'model'       => 'App\Models\Customer',
                'description' => 'Permission to view customer list'
            ],
            [
                'name'        => 'Delete customer',
                'slug'        => 'delete.customer',
                'model'       => 'App\Models\Customer',
                'description' => 'Permission to delete customer'
            ],
            /*
            |--------------------------------------------------------------------------
            | Staff CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Update and insert staff',
                'slug'        => 'save.staff',
                'model'       => 'App\Models\Staff',
                'description' => 'Permission to update or insert staffs'
            ],
            [
                'name'        => 'Read staff',
                'slug'        => 'read.staff',
                'model'       => 'App\Models\Staff',
                'description' => 'Permission to view staff list'
            ],
            [
                'name'        => 'Delete staff',
                'slug'        => 'delete.staff',
                'model'       => 'App\Models\Staff',
                'description' => 'Permission to delete staffs'
            ],
            /*
            |--------------------------------------------------------------------------
            | Content CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Update and insert frontend content',
                'slug'        => 'save.content',
                'model'       => 'App\Models\Page',
                'description' => 'Permission to update or insert contents'
            ],
            [
                'name'        => 'Read content',
                'slug'        => 'read.content',
                'model'       => 'App\Models\Page',
                'description' => 'Permission to view contents'
            ],
            [
                'name'        => 'Delete content',
                'slug'        => 'delete.content',
                'model'       => 'App\Models\Page',
                'description' => 'Permission to delete contents'
            ],
            /*
            |--------------------------------------------------------------------------
            | Order CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Approve order',
                'slug'        => 'approve.order',
                'model'       => 'App\Models\Order',
                'description' => 'Permission to approve a order'
            ],
            [
                'name'        => 'Update and insert order',
                'slug'        => 'save.order',
                'model'       => 'App\Models\Order',
                'description' => 'Permission to update or insert order'
            ],
            [
                'name'        => 'Read order',
                'slug'        => 'read.order',
                'model'       => 'App\Models\Order',
                'description' => 'Permission to view orders'
            ],
            [
                'name'        => 'Delete order',
                'slug'        => 'delete.order',
                'model'       => 'App\Models\Order',
                'description' => 'Permission to delete orders'
            ],
            /*
            |--------------------------------------------------------------------------
            | Provision CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Update and insert provision',
                'slug'        => 'save.provision',
                'model'       => 'App\Models\Provision',
                'description' => 'Permission to update or insert provision'
            ],
            [
                'name'        => 'Read provision',
                'slug'        => 'read.provision',
                'model'       => 'App\Models\Provision',
                'description' => 'Permission to view provisions'
            ],
            [
                'name'        => 'Delete provision',
                'slug'        => 'delete.provision',
                'model'       => 'App\Models\Provision',
                'description' => 'Permission to delete provisions'
            ],
            /*
            |--------------------------------------------------------------------------
            | IP CRUD permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Update and insert IP',
                'slug'        => 'save.ip',
                'model'       => 'App\Models\Ip',
                'description' => 'Permission to update or insert IP'
            ],
            [
                'name'        => 'Read IP',
                'slug'        => 'read.ip',
                'model'       => 'App\Models\Ip',
                'description' => 'Permission to view IPs'
            ],
            [
                'name'        => 'Delete IP',
                'slug'        => 'delete.ip',
                'model'       => 'App\Models\Ip',
                'description' => 'Permission to delete IPs'
            ],
            /*
            |--------------------------------------------------------------------------
            | Deposit permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'Insert Deposit',
                'slug'        => 'save.deposit',
                'model'       => 'App\Models\Deposit',
                'description' => 'Permission to Insert Deposit'
            ],
            [
                'name'        => 'Read Deposit',
                'slug'        => 'read.deposit',
                'model'       => 'App\Models\Deposit',
                'description' => 'Permission to view Deposits'
            ],
            /*
            |--------------------------------------------------------------------------
            | Bandwidth permissions
            |--------------------------------------------------------------------------
            */
            [
                'name'        => 'View Traffic',
                'slug'        => 'read.traffic',
                'model'       => 'App\Models\Traffic',
                'description' => 'Permission to view Traffic details'
            ],
        ];

        DB::table('permissions')->truncate();

        DB::table('permissions')->insert($permissions);
    }
}
