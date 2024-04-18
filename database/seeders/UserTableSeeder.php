<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'              =>'Zaky Fathur Rahman',
                'email'             =>'Zaky@gmail.com',
                'password'          =>Hash::make('zaki@12345'),
                'remember_token'    =>'',
                'created_at'        =>date('Y-m-d H:i:s'),
                'updated_at'        =>date('Y-m-d H:i:s')
            ],
            [
                'name'              =>'Rahman Fathur Zaky',
                'email'             =>'Rahman@gmail.com',
                'password'          =>Hash::make('rahman@12345'),
                'remember_token'    =>'',
                'created_at'        =>date('Y-m-d H:i:s'),
                'updated_at'        =>date('Y-m-d H:i:s')
            ]
        ];
        User::insert($user);
    }
}
