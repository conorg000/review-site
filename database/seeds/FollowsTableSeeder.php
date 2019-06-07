<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            'user_id' => 1,
            'follows_id' => 2,
        ]);
        DB::table('follows')->insert([
            'user_id' => 1,
            'follows_id' => 3,
        ]);
        DB::table('follows')->insert([
            'user_id' => 1,
            'follows_id' => 4,
        ]);
        DB::table('follows')->insert([
            'user_id' => 1,
            'follows_id' => 5,
        ]);
        DB::table('follows')->insert([
            'user_id' => 1,
            'follows_id' => 6,
        ]);
        DB::table('follows')->insert([
            'user_id' => 1,
            'follows_id' => 7,
        ]);
        DB::table('follows')->insert([
            'user_id' => 1,
            'follows_id' => 8,
        ]);
        DB::table('follows')->insert([
            'user_id' => 2,
            'follows_id' => 1,
        ]);
        DB::table('follows')->insert([
            'user_id' => 2,
            'follows_id' => 3,
        ]);
        DB::table('follows')->insert([
            'user_id' => 2,
            'follows_id' => 4,
        ]);
        DB::table('follows')->insert([
            'user_id' => 2,
            'follows_id' => 5,
        ]);
        DB::table('follows')->insert([
            'user_id' => 3,
            'follows_id' => 1,
        ]);
        DB::table('follows')->insert([
            'user_id' => 3,
            'follows_id' => 2,
        ]);
        DB::table('follows')->insert([
            'user_id' => 3,
            'follows_id' => 6,
        ]);
        DB::table('follows')->insert([
            'user_id' => 3,
            'follows_id' => 5,
        ]);
    }
}
