<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected static $usedCombinations = [];

    protected $carModels = [
        'BMW' => [
            'X5' => ['price_min' => 65000, 'price_max' => 85000],
            'Series 3' => ['price_min' => 45000, 'price_max' => 65000],
            'X3' => ['price_min' => 55000, 'price_max' => 75000],
            'M3' => ['price_min' => 85000, 'price_max' => 105000],
            'X7' => ['price_min' => 75000, 'price_max' => 95000],
        ],
        'Mercedes-Benz' => [
            'C-Class' => ['price_min' => 50000, 'price_max' => 70000],
            'E-Class' => ['price_min' => 65000, 'price_max' => 85000],
            'GLE' => ['price_min' => 75000, 'price_max' => 95000],
            'AMG GT' => ['price_min' => 120000, 'price_max' => 150000],
            'GLC' => ['price_min' => 55000, 'price_max' => 75000],
        ],
        'Audi' => [
            'A4' => ['price_min' => 45000, 'price_max' => 65000],
            'Q5' => ['price_min' => 55000, 'price_max' => 75000],
            'RS6' => ['price_min' => 110000, 'price_max' => 140000],
            'e-tron' => ['price_min' => 70000, 'price_max' => 90000],
            'Q7' => ['price_min' => 65000, 'price_max' => 85000],
        ],
        'Volkswagen' => [
            'Golf' => ['price_min' => 30000, 'price_max' => 45000],
            'Tiguan' => ['price_min' => 35000, 'price_max' => 50000],
            'Passat' => ['price_min' => 35000, 'price_max' => 50000],
            'ID.4' => ['price_min' => 45000, 'price_max' => 65000],
            'Atlas' => ['price_min' => 40000, 'price_max' => 60000],
        ],
        'Toyota' => [
            'Camry' => ['price_min' => 30000, 'price_max' => 45000],
            'RAV4' => ['price_min' => 35000, 'price_max' => 50000],
            'Corolla' => ['price_min' => 25000, 'price_max' => 40000],
            'Supra' => ['price_min' => 55000, 'price_max' => 75000],
            'Highlander' => ['price_min' => 40000, 'price_max' => 60000],
        ],
        'Honda' => [
            'Civic' => ['price_min' => 25000, 'price_max' => 40000],
            'CR-V' => ['price_min' => 30000, 'price_max' => 45000],
            'Accord' => ['price_min' => 35000, 'price_max' => 50000],
            'Pilot' => ['price_min' => 40000, 'price_max' => 60000],
            'HR-V' => ['price_min' => 28000, 'price_max' => 42000],
        ],
        'Ford' => [
            'Mustang' => ['price_min' => 45000, 'price_max' => 65000],
            'Explorer' => ['price_min' => 40000, 'price_max' => 60000],
            'F-150' => ['price_min' => 35000, 'price_max' => 75000],
            'Escape' => ['price_min' => 30000, 'price_max' => 45000],
            'Bronco' => ['price_min' => 35000, 'price_max' => 55000],
        ],
        'Chevrolet' => [
            'Camaro' => ['price_min' => 45000, 'price_max' => 65000],
            'Silverado' => ['price_min' => 35000, 'price_max' => 75000],
            'Equinox' => ['price_min' => 30000, 'price_max' => 45000],
            'Tahoe' => ['price_min' => 55000, 'price_max' => 75000],
            'Corvette' => ['price_min' => 65000, 'price_max' => 95000],
        ],
        'Hyundai' => [
            'Tucson' => ['price_min' => 28000, 'price_max' => 42000],
            'Santa Fe' => ['price_min' => 35000, 'price_max' => 50000],
            'Elantra' => ['price_min' => 25000, 'price_max' => 35000],
            'Palisade' => ['price_min' => 40000, 'price_max' => 55000],
            'IONIQ 5' => ['price_min' => 45000, 'price_max' => 65000],
        ],
        'Porsche' => [
            '911' => ['price_min' => 100000, 'price_max' => 150000],
            'Cayenne' => ['price_min' => 75000, 'price_max' => 95000],
            'Taycan' => ['price_min' => 85000, 'price_max' => 105000],
            'Macan' => ['price_min' => 65000, 'price_max' => 85000],
            'Panamera' => ['price_min' => 95000, 'price_max' => 125000],
        ],
        'Ferrari' => [
            'F8 Tributo' => ['price_min' => 280000, 'price_max' => 350000],
            'SF90 Stradale' => ['price_min' => 500000, 'price_max' => 600000],
            'Roma' => ['price_min' => 250000, 'price_max' => 300000],
            '812 Superfast' => ['price_min' => 400000, 'price_max' => 500000],
            'Portofino' => ['price_min' => 230000, 'price_max' => 280000],
        ],
        'Lamborghini' => [
            'Huracán' => ['price_min' => 250000, 'price_max' => 350000],
            'Aventador' => ['price_min' => 450000, 'price_max' => 550000],
            'Urus' => ['price_min' => 230000, 'price_max' => 280000],
            'Revuelto' => ['price_min' => 500000, 'price_max' => 600000],
            'Countach' => ['price_min' => 2500000, 'price_max' => 3000000],
        ],
        'Volvo' => [
            'XC90' => ['price_min' => 55000, 'price_max' => 75000],
            'XC60' => ['price_min' => 45000, 'price_max' => 65000],
            'S60' => ['price_min' => 40000, 'price_max' => 55000],
            'V60' => ['price_min' => 45000, 'price_max' => 60000],
            'C40 Recharge' => ['price_min' => 55000, 'price_max' => 70000],
        ],
        'Land Rover' => [
            'Range Rover' => ['price_min' => 95000, 'price_max' => 130000],
            'Defender' => ['price_min' => 55000, 'price_max' => 85000],
            'Discovery' => ['price_min' => 60000, 'price_max' => 80000],
            'Evoque' => ['price_min' => 45000, 'price_max' => 65000],
            'Velar' => ['price_min' => 65000, 'price_max' => 85000],
        ],
        'Jeep' => [
            'Wrangler' => ['price_min' => 35000, 'price_max' => 55000],
            'Grand Cherokee' => ['price_min' => 40000, 'price_max' => 65000],
            'Cherokee' => ['price_min' => 30000, 'price_max' => 45000],
            'Compass' => ['price_min' => 28000, 'price_max' => 40000],
            'Gladiator' => ['price_min' => 38000, 'price_max' => 55000],
        ],
    ];

    public function definition(): array
    {
        $brand = Brand::inRandomOrder()->first();
        if (!$brand) {
            $brand = Brand::factory()->create();
        }

        $brandModels = $this->carModels[$brand->name];
        $model = $this->faker->randomElement(array_keys($brandModels));
        $priceRange = $brandModels[$model];
        
        // Tenta encontrar uma combinação única de ano e modelo
        $maxAttempts = 20;
        $attempt = 0;
        do {
            $year = $this->faker->numberBetween(2020, 2024);
            $combination = $brand->name . '-' . $model . '-' . $year;
            $attempt++;
        } while (in_array($combination, self::$usedCombinations) && $attempt < $maxAttempts);

        if ($attempt >= $maxAttempts) {
            throw new \RuntimeException("Não foi possível gerar uma combinação única após $maxAttempts tentativas");
        }

        self::$usedCombinations[] = $combination;
        
        $name = $year . ' ' . $brand->name . ' ' . $model;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->generateCarDescription($brand->name, $model, $year),
            'price' => $this->faker->randomFloat(2, $priceRange['price_min'], $priceRange['price_max']),
            'brand_id' => $brand->id,
        ];
    }

    protected function generateCarDescription($brand, $model, $year): string
    {
        $features = [
            'Automatic transmission',
            'Leather seats',
            'Navigation system',
            'Bluetooth connectivity',
            'Backup camera',
            'Sunroof',
            'LED headlights',
            'Keyless entry',
            'Climate control',
            'Premium sound system',
            'Lane departure warning',
            'Blind spot monitoring',
            'Parking sensors',
            'Heated seats',
            'Wireless charging',
            'Apple CarPlay',
            'Android Auto',
            'Panoramic roof',
            'Adaptive cruise control',
            '360-degree camera'
        ];

        $selectedFeatures = $this->faker->randomElements($features, 5);
        
        return sprintf(
            "Experience the %d %s %s. This premium vehicle comes equipped with %s. " .
            "Combining luxury, performance, and innovation, this %s offers an exceptional driving experience.",
            $year,
            $brand,
            $model,
            implode(', ', array_slice($selectedFeatures, 0, -1)) . ' and ' . end($selectedFeatures),
            $brand
        );
    }
} 