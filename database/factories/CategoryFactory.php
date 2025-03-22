<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $carCategories = [
        'SUV',
        'Sedan',
        'Hatchback',
        'Coupé',
        'Convertible',
        'Sports Car',
        'Luxury',
        'Electric',
        'Hybrid',
        'Compact',
        'Wagon',
        'Pickup Truck',
        'Van',
        'Crossover',
        'Off-Road'
    ];

    public function definition(): array
    {
        $category = $this->faker->unique()->randomElement($this->carCategories);
        
        return [
            'name' => $category,
            'slug' => Str::slug($category),
        ];
    }
} 