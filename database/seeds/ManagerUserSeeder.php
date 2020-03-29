<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'manager',
                'email'=> 'manager@manager.com',
                'password' => Hash::make('adminmanager'),
                'role' => 1,
                'remember_token' => Str::random(10),
            ]
        ];
        DB::table('users')->insert($data);
    }
}
