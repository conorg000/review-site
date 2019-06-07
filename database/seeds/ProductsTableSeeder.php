<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Samsung s7',
            'price' => '530',
            'manufacturer_id' => 3,
            'image' => 'products_images/s7.jpg',
            'url' => 'https://www.samsung.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'Huawei pS',
            'price' => '900',
            'manufacturer_id' => 2,
            'image' => 'products_images/p5.jpg',
            'url' => 'https://www.huawei.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 99',
            'price' => '800',
            'manufacturer_id' => 1,
            'image' => 'products_images/9.png',
            'url' => 'https://www.apple.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'Samsung J2',
            'price' => '100',
            'manufacturer_id' => 3,
            'image' => 'products_images/j2.jpg',
            'url' => 'https://www.samsung.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'Huawei LX',
            'price' => '650',
            'manufacturer_id' => 2,
            'image' => 'products_images/lx.jpg',
            'url' => 'https://www.huawei.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 7',
            'price' => '500',
            'manufacturer_id' => 1,
            'image' => 'products_images/7.jpg',
            'url' => 'https://www.apple.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'Samsung s9',
            'price' => '930',
            'manufacturer_id' => 3,
            'image' => 'products_images/s9.jpg',
            'url' => 'https://www.samsung.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'Huawei ST',
            'price' => '1000',
            'manufacturer_id' => 2,
            'image' => 'products_images/st.jpg',
            'url' => 'https://www.huawei.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 3G',
            'price' => '80',
            'manufacturer_id' => 1,
            'image' => 'products_images/3g.jpg',
            'url' => 'https://www.apple.com',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}