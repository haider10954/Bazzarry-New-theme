<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Electronics'],
            ['name' => 'Clothing'],
            ['name' => 'Home Decor'],
            ['name' => 'Sports & Fitness'],
        ];

        foreach ($categories as $category) {
            $category['status'] = 'published';
            $category['addedby'] = 'admin';
            $category['created_at'] = '2023-06-01 01:05:46';
            $category['updated_at'] = '2023-06-01 01:05:51';

            DB::table('categories')->insert($category);
        }
    }
}
