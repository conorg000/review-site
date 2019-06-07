<?php

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
            'name' => 'Bob',
            'email' => 'Bob@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'mod',
            'dob' => new DateTime('1996-11-19'),
            
        ]);
        DB::table('users')->insert([
            'name' => 'Fred',
            'email' => 'Fred@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'reg',
            'dob' => new DateTime('1990-1-9'),
        ]);
        DB::table('users')->insert([
            'name' => 'Jill',
            'email' => 'jill@outlook.com',
            'password' => bcrypt('123456'),
            'type' => 'mod',
            'dob' => new DateTime('1978-3-28'),
        ]);
        DB::table('users')->insert([
            'name' => 'Jenny',
            'email' => 'jenny84@outlook.com',
            'password' => bcrypt('123456'),
            'type' => 'reg',
            'dob' => new DateTime('1984-8-29'),
        ]);
        DB::table('users')->insert([
            'name' => 'Benny',
            'email' => 'benny84@outlook.com',
            'password' => bcrypt('123456'),
            'type' => 'reg',
            'dob' => new DateTime('1984-8-29'),
        ]);
        DB::table('users')->insert([
            'name' => 'Lenny',
            'email' => 'lenny84@outlook.com',
            'password' => bcrypt('123456'),
            'type' => 'reg',
            'dob' => new DateTime('1984-8-29'),
        ]);
        DB::table('users')->insert([
            'name' => 'Henny',
            'email' => 'henny84@outlook.com',
            'password' => bcrypt('123456'),
            'type' => 'reg',
            'dob' => new DateTime('1984-8-29'),
        ]);
        DB::table('users')->insert([
            'name' => 'Penny',
            'email' => 'penny84@outlook.com',
            'password' => bcrypt('123456'),
            'type' => 'reg',
            'dob' => new DateTime('1984-8-29'),
        ]);
    }
}
