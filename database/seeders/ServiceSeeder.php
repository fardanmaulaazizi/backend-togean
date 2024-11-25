<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'product_id' => 1,
                'boat_id' => 1,
                'departure_place' => 'Surabaya',
                'route' => 'Bali - NTT',
                'departure_date' => '2024-11-22',
                'arrival_date' => '2024-11-25'
            ],
            [
                'product_id' => 1,
                'boat_id' => 1,
                'departure_place' => 'Madura',
                'route' => 'Bali - Kalimantan',
                'departure_date' => '2025-01-01',
                'arrival_date' => '2025-01-04'
            ],    
        ]);
    }
}
