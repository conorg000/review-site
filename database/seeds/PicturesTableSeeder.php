<?php

use Illuminate\Database\Seeder;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictures')->insert([
            'user_id' => 1,
            'product_id' => 1,
            'image' => 'products_images/u1.jpg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('pictures')->insert([
            'user_id' => 2,
            'product_id' => 1,
            'image' => 'products_images/u2.jpg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('pictures')->insert([
            'user_id' => 3,
            'product_id' => 1,
            'image' => 'products_images/u3.jpg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('pictures')->insert([
            'user_id' => 1,
            'product_id' => 2,
            'image' => 'products_images/u4.jpg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('pictures')->insert([
            'user_id' => 1,
            'product_id' => 2,
            'image' => 'products_images/u5.jpg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('pictures')->insert([
            'user_id' => 4,
            'product_id' => 2,
            'image' => 'products_images/u6.jpg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('pictures')->insert([
            'user_id' => 1,
            'product_id' => 3,
            'image' => 'products_images/u7.jpg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('pictures')->insert([
            'user_id' => 2,
            'product_id' => 5,
            'image' => 'products_images/yeet.jpg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
