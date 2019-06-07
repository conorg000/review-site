<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => 1,
            'product_id' => 1,
            'rating' => 2,
            'review' => 'Cool',
            'upvotes' => 5,
            'downvotes' => 4,
            'created' => '2018-07-20',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 2,
            'product_id' => 1,
            'rating' => 5,
            'review' => 'I liked it',
            'upvotes' => 0,
            'downvotes' => 14,
            'created' => '2018-05-10',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 3,
            'product_id' => 1,
            'rating' => 4,
            'review' => 'Cool',
            'upvotes' => 5,
            'downvotes' => 4,
            'created' => '2017-10-20',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 1,
            'product_id' => 3,
            'rating' => 5,
            'review' => 'I liked it',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-07-20',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 2,
            'product_id' => 2,
            'rating' => 4,
            'review' => 'Cool',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-07-20',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 3,
            'product_id' => 2,
            'rating' => 3,
            'review' => 'I liked it',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-07-20',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 1,
            'product_id' => 5,
            'rating' => 4,
            'review' => 'Cool',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-07-20',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 2,
            'product_id' => 4,
            'rating' => 4,
            'review' => 'Nice',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-07-20',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 3,
            'product_id' => 5,
            'rating' => 3,
            'review' => 'Cool',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-07-20',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 5,
            'product_id' => 1,
            'rating' => 2,
            'review' => 'I liked it',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-05-10',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 6,
            'product_id' => 1,
            'rating' => 5,
            'review' => 'Cool',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-05-10',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 7,
            'product_id' => 1,
            'rating' => 4,
            'review' => 'I liked it',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-09-10',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 8,
            'product_id' => 3,
            'rating' => 5,
            'review' => 'Cool',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-05-10',
        ]);
        DB::table('reviews')->insert([
            'user_id' => 5,
            'product_id' => 2,
            'rating' => 4,
            'review' => 'I liked it',
            'upvotes' => 2,
            'downvotes' => 0,
            'created' => '2018-05-10',
        ]);
    }
}
