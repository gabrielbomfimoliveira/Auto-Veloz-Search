<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ProductSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategories = [];
    public $selectedBrands = [];
    public $sortBy = 'name_asc'; // Valor padrão de ordenação

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategories' => ['except' => []],
        'selectedBrands' => ['except' => []],
        'sortBy' => ['except' => 'name_asc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategories()
    {
        $this->resetPage();
    }

    public function updatingSelectedBrands()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'selectedCategories', 'selectedBrands', 'sortBy']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedCategories, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->whereIn('categories.id', $this->selectedCategories);
                });
            })
            ->when($this->selectedBrands, function ($query) {
                $query->whereIn('brand_id', $this->selectedBrands);
            })
            ->when($this->sortBy, function ($query) {
                match($this->sortBy) {
                    'name_asc' => $query->orderBy('name', 'asc'),
                    'name_desc' => $query->orderBy('name', 'desc'),
                    'price_asc' => $query->orderBy('price', 'asc'),
                    'price_desc' => $query->orderBy('price', 'desc'),
                    'newest' => $query->orderBy('created_at', 'desc'),
                    'oldest' => $query->orderBy('created_at', 'asc'),
                    default => $query->orderBy('name', 'asc')
                };
            })
            ->with(['brand', 'categories']);

        return view('livewire.product-search', [
            'products' => $query->paginate(12),
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }
} 