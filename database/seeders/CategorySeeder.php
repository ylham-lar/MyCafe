<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Fast Foods',
            'Soups',
            'Desserts',
            'Salads',
            'Pizzas',
            'Pastas',
            'Seafood',
            'Breakfast',
            'Grills',
            'Burgers',
            'Drinks',
            'Snacks',
        ];

        foreach ($categories as $catName) {
            Category::create([
                'name' => $catName,
            ]);
        }
    }
}
