<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'uuid' => Uuid::generate(4),
                'name' => 'System Admin',
                'email' => 'system.admin@agoitsolutions',
                'password' => bcrypt('123456'),
                'ip_address' => '127.0.0.1',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
