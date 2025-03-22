<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar todas as categorias (15 categorias pré-definidas)
        $categories = Category::factory(15)->create();

        // Criar todas as marcas (15 marcas pré-definidas)
        $brands = Brand::factory(15)->create();

        // Criar 2 produtos para cada marca (30 produtos no total)
        $brands->each(function ($brand) use ($categories) {
            Product::factory(2)
                ->create(['brand_id' => $brand->id])
                ->each(function ($product) use ($categories) {
                    // Atribuir 2-3 categorias aleatórias para cada produto
                    $randomCategories = $categories->random(rand(2, 3));
                    
                    // Mapear categorias apropriadas com base no nome do produto
                    $appropriateCategories = $this->mapAppropriateCategories($product, $randomCategories);
                    
                    $product->categories()->attach($appropriateCategories);
                });
        });
    }

    protected function mapAppropriateCategories($product, $randomCategories)
    {
        $categoryIds = $randomCategories->pluck('id')->toArray();
        
        // Adicionar categorias específicas baseadas no nome do produto
        $productName = strtolower($product->name);
        
        // SUVs e Crossovers
        if (str_contains($productName, 'suv') || 
            preg_match('/(x[3-7]|gle|q[5-7]|rav4|cr-v|explorer|equinox|tucson|cayenne|urus)/i', $productName)) {
            $suvCategory = Category::where('name', 'SUV')->first();
            if ($suvCategory) {
                $categoryIds[] = $suvCategory->id;
            }
        }
        
        // Sedans
        if (str_contains($productName, 'sedan') || 
            preg_match('/(series 3|c-class|a4|camry|civic|accord|elantra)/i', $productName)) {
            $sedanCategory = Category::where('name', 'Sedan')->first();
            if ($sedanCategory) {
                $categoryIds[] = $sedanCategory->id;
            }
        }
        
        // Sports Cars
        if (preg_match('/(rs6|m3|amg|supra|911|f8|huracán|aventador)/i', $productName)) {
            $sportsCategory = Category::where('name', 'Sports Car')->first();
            if ($sportsCategory) {
                $categoryIds[] = $sportsCategory->id;
            }
        }
        
        // Electric Cars
        if (preg_match('/(e-tron|taycan|ioniq|id\.4)/i', $productName)) {
            $electricCategory = Category::where('name', 'Electric')->first();
            if ($electricCategory) {
                $categoryIds[] = $electricCategory->id;
            }
        }

        // Luxury Cars
        if (preg_match('/(bmw|mercedes|audi|porsche|ferrari|lamborghini)/i', $productName)) {
            $luxuryCategory = Category::where('name', 'Luxury')->first();
            if ($luxuryCategory) {
                $categoryIds[] = $luxuryCategory->id;
            }
        }

        return array_unique($categoryIds);
    }
}
