<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ProductSearch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        $brand = Brand::factory()->create(['name' => 'Ferrari']);
        $category = Category::factory()->create(['name' => 'Sports Car']);
        
        $product = Product::factory()->create([
            'name' => 'Test Car',
            'brand_id' => $brand->id,
            'price' => 100.00
        ]);
        
        $product->categories()->attach($category);
    }

    /** @test */
    public function can_render_product_search_component()
    {
        Livewire::test(ProductSearch::class)
            ->assertStatus(200)
            ->assertViewIs('livewire.product-search');
    }

    /** @test */
    public function can_search_products_by_name()
    {
        Livewire::test(ProductSearch::class)
            ->set('search', 'Test Car')
            ->assertSee('Test Car')
            ->assertDontSee('Another Product');
    }

    /** @test */
    public function can_filter_products_by_category()
    {
        $category = Category::first();

        Livewire::test(ProductSearch::class)
            ->set('selectedCategories', [$category->id])
            ->assertSee('Test Car');
    }

    /** @test */
    public function can_filter_products_by_brand()
    {
        $brand = Brand::first();

        Livewire::test(ProductSearch::class)
            ->set('selectedBrands', [$brand->id])
            ->assertSee('Test Car');
    }

    /** @test */
    public function can_sort_products()
    {
        Livewire::test(ProductSearch::class)
            ->set('sortBy', 'name_asc')
            ->assertSet('sortBy', 'name_asc')
            ->set('sortBy', 'price_desc')
            ->assertSet('sortBy', 'price_desc');
    }

    /** @test */
    public function can_clear_filters()
    {
        Livewire::test(ProductSearch::class)
            ->set('search', 'Test')
            ->set('selectedCategories', [1])
            ->set('selectedBrands', [1])
            ->set('sortBy', 'price_desc')
            ->call('clearFilters')
            ->assertSet('search', '')
            ->assertSet('selectedCategories', [])
            ->assertSet('selectedBrands', [])
            ->assertSet('sortBy', 'name_asc');
    }
}