<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            'Fast Foods' => ['Cheese Burger', 'Chicken Nuggets', 'Fries', 'Hot Dog', 'Onion Rings', 'Zinger Burger', 'Mini Pizza', 'Chicken Wrap', 'Mozzarella Sticks', 'BBQ Wings', 'Corn Dog', 'Loaded Nachos'],
            'Soups' => ['Tomato Soup', 'Chicken Noodle Soup', 'Mushroom Cream Soup', 'Lentil Soup', 'Pumpkin Soup', 'Vegetable Soup', 'Beef Soup', 'Clam Chowder', 'French Onion Soup', 'Minestrone', 'Seafood Bisque', 'Chicken & Corn Soup'],
            'Desserts' => ['Chocolate Cake', 'Brownie', 'Cheesecake', 'Ice Cream Sundae', 'Tiramisu', 'Panna Cotta', 'Cupcake', 'Apple Pie', 'Creme Brulee', 'Donuts', 'Macarons', 'Churros'],
            'Salads' => ['Caesar Salad', 'Greek Salad', 'Tuna Salad', 'Garden Salad', 'Cobb Salad', 'Caprese Salad', 'Quinoa Salad', 'Spinach Salad', 'Kale Salad', 'Waldorf Salad', 'Potato Salad', 'Pasta Salad'],
            'Pizzas' => ['Pepperoni Pizza', 'Margherita Pizza', 'BBQ Chicken Pizza', 'Veggie Supreme Pizza', 'Hawaiian Pizza', 'Four Cheese Pizza', 'Meat Lovers Pizza', 'Buffalo Chicken Pizza', 'Mushroom Pizza', 'Sausage Pizza', 'Spinach Pizza', 'Seafood Pizza'],
            'Pastas' => ['Spaghetti Bolognese', 'Fettuccine Alfredo', 'Mac & Cheese', 'Penne Arrabbiata', 'Lasagna', 'Ravioli', 'Carbonara', 'Seafood Pasta', 'Pesto Pasta', 'Chicken Alfredo', 'Baked Ziti', 'Shrimp Scampi'],
            'Seafood' => ['Grilled Salmon', 'Garlic Butter Shrimp', 'Fish & Chips', 'Seafood Pasta', 'Lobster Tail', 'Crab Cakes', 'Fried Calamari', 'Tuna Steak', 'Grilled Octopus', 'Clams in White Wine', 'Salmon Teriyaki', 'Shrimp Cocktail'],
            'Breakfast' => ['Pancakes', 'French Toast', 'Omelette', 'English Breakfast', 'Waffles', 'Bagel with Cream Cheese', 'Breakfast Burrito', 'Eggs Benedict', 'Avocado Toast', 'Granola Bowl', 'Smoothie Bowl', 'Breakfast Sandwich'],
            'Grills' => ['BBQ Ribs', 'Grilled Chicken', 'Lamb Kebab', 'Mixed Grill Platter', 'Grilled Steak', 'Grilled Vegetables', 'Pork Chops', 'Grilled Sausages', 'Chicken Skewers', 'Beef Skewers', 'Grilled Fish', 'BBQ Tofu'],
            'Burgers' => ['Classic Beef Burger', 'Cheese Burger', 'Chicken Burger', 'Double Smash Burger', 'Veggie Burger', 'Bacon Burger', 'Mushroom Swiss Burger', 'Spicy Chicken Burger', 'BBQ Burger', 'Turkey Burger', 'Fish Burger', 'Buffalo Burger'],
            'Drinks' => ['Coffee', 'Tea', 'Orange Juice', 'Smoothie', 'Milkshake', 'Coca Cola', 'Pepsi', 'Fresh Lemonade', 'Iced Tea', 'Hot Chocolate', 'Apple Juice', 'Energy Drink'],
            'Snacks' => ['Nachos', 'Popcorn', 'Pretzel', 'Potato Chips', 'Trail Mix', 'Cheese Sticks', 'Fruit Bowl', 'Veggie Sticks', 'Mini Sandwiches', 'Chicken Fingers', 'Spring Rolls', 'Mozzarella Balls']
        ];



        foreach ($products as $categoryName => $productList) {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) continue;

            foreach ($productList as $prodName) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $prodName,
                    'price' => rand(5, 50),
                    'code' => 'PRD-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                    'description' => 'Delicious ' . $prodName,
                    'image' => null,
                    'discount_percent' => rand(0, 30),
                    'weight' => rand(1, 500) / 100,
                ]);
            }
        }
    }
}
