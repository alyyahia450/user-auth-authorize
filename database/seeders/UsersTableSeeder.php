<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'               => 1,
                'name'             => 'Admin',
                'email'            => 'admin@app.com',
                'password'         => bcrypt('123456'),
                'remember_token'   => null,
               
            ],
          
           
            
        ];

        User::insert($users);
    }
}
