<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           
           
            [
                'id'    => 1,
                'title' => 'permission_access',
            ],
            [
                'id'    => 2,
                'title' => 'role_create',
            ],
            [
                'id'    => 3,
                'title' => 'role_edit',
            ],
            [
                'id'    => 4,
                'title' => 'role_show',
            ],
            [
                'id'    => 5,
                'title' => 'role_delete',
            ],
            [
                'id'    => 6,
                'title' => 'role_access',
            ],
            [
                'id'    => 7,
                'title' => 'user_create',
            ],
            [
                'id'    => 8,
                'title' => 'user_edit',
            ],
            [
                'id'    => 9,
                'title' => 'user_show',
            ],
            [
                'id'    => 10,
                'title' => 'user_delete',
            ],
            [
                'id'    => 11,
                'title' => 'user_access',
            ],
            [
                'id'    => 12,
                'title' => 'check_user_permission',
            ],
           
        ];

        Permission::insert($permissions);
    }
}
