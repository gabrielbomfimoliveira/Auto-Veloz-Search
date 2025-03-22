<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Criar algumas categorias de teste
        $categories = Category::factory(3)->create([
            'name' => fn($attrs, $index) => "Test Category " . ($index + 1)
        ]);

        // Criar algumas marcas de teste
        $brands = Brand::factory(3)->create([
            'name' => fn($attrs, $index) => "Test Brand " . ($index + 1)
        ]);

        // Criar alguns produtos de teste
        $brands->each(function ($brand) use ($categories) {
            Product::factory(2)
                ->create(['brand_id' => $brand->id])
                ->each(function ($product) use ($categories) {
                    $product->categories()->attach(
                        $categories->random(rand(1, 2))->pluck('id')->toArray()
                    );
                });
        });
    }
} 