<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 flex gap-4">
                <!-- Search Input -->
                <div class="flex-1 relative">
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search products..."
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out placeholder:text-gray-400 placeholder:transition-all placeholder:duration-200 focus:placeholder:text-transparent">
                    <div wire:loading.delay class="absolute right-3 top-2">
                        <div class="animate-spin h-5 w-5 border-2 border-blue-500 rounded-full border-t-transparent"></div>
                    </div>
                </div>

                <!-- Sort Dropdown -->
                <div class="w-48">
                    <select
                        wire:model.live="sortBy"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white cursor-pointer"
                    >
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                        <option value="price_asc">Price (Low to High)</option>
                        <option value="price_desc">Price (High to Low)</option>
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                    </select>
                </div>
            </div>

            <!-- Clear Filters Button -->
            <button
                wire:click="clearFilters"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 cursor-pointer">
                Clear Filters
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Filters -->
        <div class="bg-white p-4 md:col-span-1 space-y-6 rounded-lg shadow-sm">
            <h3 class="text-xl font-bold">Filters</h3>

            <!-- Categories Filter -->
            <div x-data="{ open: true }">
                <button @click="open = !open" class="w-full flex justify-between items-center py-2 text-lg font-semibold cursor-pointer transition-all">
                    Categories
                    <span x-text="open ? '-' : '+'"></span>
                </button>

                <div x-show="open" class="mt-2 space-y-2">
                    @foreach($categories as $category)
                    <label class="flex items-center space-x-2">
                        <input
                            type="checkbox"
                            wire:model.live.debounce.150ms="selectedCategories"
                            value="{{ $category->id }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <span class="cursor-pointer">{{ $category->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Brands Filter -->
            <div x-data="{ open: true }">
                <button @click="open = !open" class="w-full flex justify-between items-center py-2 text-lg font-semibold cursor-pointer transition-all">
                    Brands
                    <span x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" class="mt-2 space-y-2">
                    @foreach($brands as $brand)
                    <label class="flex items-center space-x-2">
                        <input
                            type="checkbox"
                            wire:model.live.debounce.150ms="selectedBrands"
                            value="{{ $brand->id }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <span class="cursor-pointer">{{ $brand->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="md:col-span-3">
            <!-- Skeleton Loading -->
            <div wire:loading.class.remove="hidden" wire:target="search, clearFilters, sortBy, selectedCategories, selectedBrands" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @for ($i = 0; $i < 12; $i++)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden animate-pulse">
                        <div class="relative h-48">
                            <div class="absolute inset-0 bg-gray-300"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-400/50 to-transparent"></div>
                        </div>
                        <div class="p-4 w-full">
                            <div class="flex justify-between items-start mb-2">
                                <div class="h-6 bg-gray-300 rounded w-2/3"></div>
                                <div class="h-6 bg-gray-200 rounded w-1/4"></div>
                            </div>
                            <div class="h-4 bg-gray-200 rounded w-full mb-4"></div>
                            <div class="flex justify-between items-center">
                                <div class="h-6 bg-gray-300 rounded w-1/4"></div>
                                <div class="h-8 bg-gray-200 rounded w-1/3"></div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Products Grid -->
            <div wire:loading.class="hidden" wire:target="search, clearFilters, sortBy, selectedCategories, selectedBrands" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative h-48 bg-gray-100">
                        <img 
                            src="{{ asset('bg-car.png') }}" 
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover object-center"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded">{{ $product->brand->name }}</span>
                        </div>
                        <p class="text-gray-500 text-sm mb-4">
                            {{ implode(' • ', $product->categories->pluck('name')->toArray()) }}
                        </p>
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-bold text-blue-600">${{ number_format($product->price, 2) }}</p>
                            <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-200 cursor-pointer">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">No products found matching your criteria.</p>
                </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>