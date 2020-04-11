<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
                'name' => 'Umer Saeed',
                'role_id' => 1,
                'country_id' => 1,
                'is_active' => 1,
                'DOB' => '1993-02-07',
                'email' => 'Umer2saeed@gmail.com',
                'password' => bcrypt('freerunning'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Daud',
                'role_id' => 2,
                'country_id' => 3,
                'is_active' => 1,
                'DOB' => '1994-03-09',
                'email' => 'daud@gmail.com',
                'password' => bcrypt('freerunning'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('users')->insert($users);


    }
}
