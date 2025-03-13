<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Product;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'name' => 'Германия',
            'code' => 'DE',
            'tax_rate' => 19.00,
            'tax_number_pattern' => '/^DE\d{9}$/',
        ]);

        Country::create([
            'name' => 'Италия',
            'code' => 'IT',
            'tax_rate' => 22.00,
            'tax_number_pattern' => '/^IT\d{11}$/',
        ]);

        Country::create([
            'name' => 'Греция',
            'code' => 'GR',
            'tax_rate' => 24.00,
            'tax_number_pattern' => '/^GR\d{9}$/',
        ]);

        Product::create([
            'name' => 'Наушники',
            'price' => 100.00,
        ]);

        Product::create([
            'name' => 'Чехол для телефона',
            'price' => 20.00,
        ]);
    }
}
