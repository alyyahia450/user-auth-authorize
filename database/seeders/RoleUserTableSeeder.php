<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;
use Laravel\Passport\Passport;
class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::findOrFail(1);
        $user->roles()->sync(1);
        $admin_permissions = Permission::pluck('title')->toArray();
        Passport::tokensCan(array_flip($admin_permissions));
        $user->createToken('admin-token', $admin_permissions)->accessToken;
     }
}
