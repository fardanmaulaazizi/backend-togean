<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Komodo Island',
                'image_cover' => '/storage/images/products/cover/komodo-island.jpg',
                'image_gallery' => '[/storage/images/products/gallery/komodo-1.jpg, /storage/images/products/gallery/komodo-2.jpg, /storage/images/products/gallery/komodo-3.jpg]',
                'category_id' => 3,
                'description' => '<h2>Nikmati suguhan menarik di komodo island</h2>',
                'features' => '<ul><li>Fitur 1</li><li>Fitur 2</li></ul>'
            ],
            [
                'name' => 'Bali Island',
                'image_cover' => '/storage/images/products/cover/bali-island.jpg',
                'image_gallery' => '[/storage/images/products/gallery/bali-1.jpg, /storage/images/products/gallery/bali-2.jpg, /storage/images/products/gallery/bali-3.jpg]',
                'category_id' => 1,
                'description' => '<h2>Nikmati suguhan menarik bersama bali</h2>',
                'features' => '<ul><li>Fitur 1</li><li>Fitur 2</li></ul>'
            ]
        ]);
    }
}
