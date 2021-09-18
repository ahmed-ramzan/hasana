<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'study',
            'slug' => 'slug',
        ]);

        DB::table('categories')->insert([
            'name' => 'food',
            'slug' => 'food',
        ]);

        DB::table('categories')->insert([
            'name' => 'divorce',
            'slug' => 'divorce',
        ]);
    }
}
