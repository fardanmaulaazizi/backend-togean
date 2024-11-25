<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Twin Bed Lower Deck',
                'image' => '/storage/images/rooms/twin-bed.jpg',
                'price' => 500000,
                'service_id' => 1,
                'capacity' => 6,
            ],
            [
                'name' => 'Twin Bed Upper Deck',
                'image' => '/storage/images/rooms/twin-bed.jpg',
                'price' => 700000,
                'service_id' => 1,
                'capacity' => 6,
            ]
            
        ]);
    }
}
