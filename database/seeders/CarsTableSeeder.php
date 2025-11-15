<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        $cars = [
            [
                'name' => 'Toyota Vios 2023',
                'brand' => 'Toyota',
                'model' => 'Vios',
                'price' => 850000.00,
                'description' => 'Brand new Toyota Vios 2023 model, automatic transmission, fuel efficient, with 1-year warranty.'
            ],
            [
                'name' => 'Honda City RS',
                'brand' => 'Honda',
                'model' => 'City',
                'price' => 950000.00,
                'description' => 'Honda City RS variant with premium features, touchscreen display, and advanced safety systems.'
            ],
            [
                'name' => 'Mitsubishi Mirage',
                'brand' => 'Mitsubishi',
                'model' => 'Mirage',
                'price' => 750000.00,
                'description' => 'Fuel efficient compact car, perfect for city driving, low maintenance cost.'
            ],
            [
                'name' => 'Nissan Almera',
                'brand' => 'Nissan',
                'model' => 'Almera',
                'price' => 780000.00,
                'description' => 'Spacious sedan with modern features and excellent fuel economy.'
            ],
            [
                'name' => 'Toyota Fortuner',
                'brand' => 'Toyota',
                'model' => 'Fortuner',
                'price' => 1850000.00,
                'description' => '7-seater SUV with powerful engine, perfect for family and off-road adventures.'
            ],
            [
                'name' => 'Honda CR-V',
                'brand' => 'Honda',
                'model' => 'CR-V',
                'price' => 1650000.00,
                'description' => 'Compact SUV with luxurious interior and advanced technology features.'
            ]
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}