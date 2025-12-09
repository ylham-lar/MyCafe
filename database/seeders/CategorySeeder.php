<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'en' => 'Fast Foods',
                'ru' => 'Фастфуд',
                'tm' => 'Çalt iýmitler',
            ],
            [
                'en' => 'Soups',
                'ru' => 'Супы',
                'tm' => 'Şorbalary',
            ],
            [
                'en' => 'Desserts',
                'ru' => 'Десерты',
                'tm' => 'Desertler',
            ],
            [
                'en' => 'Salads',
                'ru' => 'Салаты',
                'tm' => 'Salatlar',
            ],
            [
                'en' => 'Pizzas',
                'ru' => 'Пиццы',
                'tm' => 'Pizzalar',
            ],
            [
                'en' => 'Pastas',
                'ru' => 'Пасты',
                'tm' => 'Makaronlar',
            ],
            [
                'en' => 'Seafood',
                'ru' => 'Морепродукты',
                'tm' => 'Deňiz önümleri',
            ],
            [
                'en' => 'Breakfast',
                'ru' => 'Завтрак',
                'tm' => 'Irdenlik',
            ],
            [
                'en' => 'Grills',
                'ru' => 'Гриль',
                'tm' => 'Gryllar',
            ],
            [
                'en' => 'Burgers',
                'ru' => 'Бургеры',
                'tm' => 'Burgerler',
            ],
            [
                'en' => 'Drinks',
                'ru' => 'Напитки',
                'tm' => 'Içgiler',
            ],
            [
                'en' => 'Snacks',
                'ru' => 'Закуски',
                'tm' => 'Şireli zatlar',
            ],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name'      => $cat['en'],
                'name_ru'   => $cat['ru'],
                'name_tm'   => $cat['tm'],
            ]);
        }
    }
}
