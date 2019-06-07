<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            'user_id' => 1,
            'review_id' => 4,
        ]);
        DB::table('likes')->insert([
            'user_id' => 2,
            'review_id' => 5,
        ]);
        DB::table('likes')->insert([
            'user_id' => 1,
            'review_id' => 1,
        ]);
    }
}
