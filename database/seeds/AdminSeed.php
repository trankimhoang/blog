<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('admins')->insertOrIgnore([
            'name' => 'admin',
            'email' => 'abc@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123')
        ]);
    }
}
