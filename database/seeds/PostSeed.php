<?php

use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 50; $i++){
            \Illuminate\Support\Facades\DB::table('posts')->insertOrIgnore([
                'name' => 'name ' . $i,
                'content' => 'content' . $i,
                'admin_id' => 1
            ]);
        }
    }
}
