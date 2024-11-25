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
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Cruise Tour',
                'image' => '/storage/images/categories/cruise-tour.jpg',
            ],
            [
                'name' => 'Adventure',
                'image' => '/storage/images/categories/adventure.jpg',
            ],
            [
                'name' => 'Animal Safari',
                'image' => '/storage/images/categories/animal-safari.jpg',
            ],
            [
                'name' => 'Underwater Exploration',
                'image' => '/storage/images/categories/underwater-exploration.jpg',
            ],
            [
                'name' => 'Cultural',
                'image' => '/storage/images/categories/cultural.jpg',
            ],
            [
                'name' => 'nature',
                'image' => '/storage/images/categories/nature.jpg',
            ],
            [
                'name' => 'Historical',
                'image' => '/storage/images/categories/historical.jpg',
            ]
        ]);
    }
}
