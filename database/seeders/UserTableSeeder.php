<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'role_id' => 1,
                'name' => 'Alamin Hossain',
                'username' => 'alamin',
                'email' => 'alamin@blog.com',
                'password' => bcrypt('1234567890'),
            ]
        );

        DB::table('users')->insert(
            [
                'role_id' => 2,
                'name' => 'Author',
                'username' => 'author',
                'email' => 'author@blog.com',
                'password' => bcrypt('12345678'),
            ]
        );


        DB::table('users')->insert(
            [
                'role_id' => 3,
                'name' => 'Subscriber',
                'username' => 'subscriber',
                'email' => 'subscriber@blog.com',
                'password' => bcrypt('subscriber'),
            ]
        );


        DB::table('users')->insert(
            [
                'role_id' => 4,
                'name' => 'Native',
                'username' => 'native',
                'email' => 'native@blog.com',
                'password' => bcrypt('native'),
            ]
        );
    }
}
