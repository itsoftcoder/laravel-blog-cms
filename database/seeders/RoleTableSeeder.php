<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'name' => 'Admin',
                'slug' => 'admin'
            ]
        );

        DB::table('roles')->insert(
            [
                'name' => 'Author',
                'slug' => 'author'
            ]
        );

        DB::table('roles')->insert(
            [
                'name' => 'Subscriber',
                'slug' => 'subscriber'
            ]
        );


        DB::table('roles')->insert(
            [
                'name' => 'Native',
                'slug' => 'native'
            ]
        );
    }
}
