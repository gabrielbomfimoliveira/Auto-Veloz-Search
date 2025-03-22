<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    protected $carBrands = [
        'BMW',
        'Mercedes-Benz',
        'Audi',
        'Volkswagen',
        'Toyota',
        'Honda',
        'Ford',
        'Chevrolet',
        'Hyundai',
        'Porsche',
        'Ferrari',
        'Lamborghini',
        'Volvo',
        'Land Rover',
        'Jeep'
    ];

    public function definition(): array
    {
        $brand = $this->faker->unique()->randomElement($this->carBrands);
        
        return [
            'name' => $brand,
            'slug' => Str::slug($brand),
        ];
    }
} 