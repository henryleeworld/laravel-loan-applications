<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Trevor Admin Stanbridge',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'John Analyst Stone',
                'email'          => 'analyst@analyst.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Mia CFO Wong',
                'email'          => 'cfo@cfo.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
