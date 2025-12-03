<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample products for testing
        $products = [
            [
                'name' => 'Laptop Pro 15',
                'price' => 1299.99,
                'quantity' => 5,
                'category' => 'Electronics',
                'description' => 'High-performance laptop with 16GB RAM and SSD storage'
            ],
            [
                'name' => 'Wireless Mouse',
                'price' => 29.99,
                'quantity' => 50,
                'category' => 'Accessories',
                'description' => 'Ergonomic wireless mouse with 2.4GHz connection'
            ],
            [
                'name' => 'USB-C Cable',
                'price' => 12.99,
                'quantity' => 0,
                'category' => 'Cables',
                'description' => '2-meter USB-C cable for fast charging and data transfer'
            ],
            [
                'name' => 'Mechanical Keyboard',
                'price' => 159.99,
                'quantity' => 8,
                'category' => 'Peripherals',
                'description' => 'RGB mechanical keyboard with Cherry MX switches'
            ],
            [
                'name' => 'Monitor 27 inch',
                'price' => 349.99,
                'quantity' => 3,
                'category' => 'Electronics',
                'description' => '4K UHD monitor with HDR support'
            ],
            [
                'name' => 'Desk Lamp LED',
                'price' => 45.99,
                'quantity' => 12,
                'category' => 'Lighting',
                'description' => 'Adjustable LED desk lamp with USB charging port'
            ],
            [
                'name' => 'Phone Stand',
                'price' => 19.99,
                'quantity' => 25,
                'category' => 'Accessories',
                'description' => 'Adjustable phone stand for desk'
            ],
            [
                'name' => 'Webcam HD',
                'price' => 89.99,
                'quantity' => 6,
                'category' => 'Electronics',
                'description' => '1080p HD webcam with auto-focus and microphone'
            ],
            [
                'name' => 'HDMI Cable',
                'price' => 14.99,
                'quantity' => 2,
                'category' => 'Cables',
                'description' => '4K HDMI 2.1 cable 3 meters'
            ],
            [
                'name' => 'Desk Organizer',
                'price' => 24.99,
                'quantity' => 15,
                'category' => 'Office Supplies',
                'description' => 'Bamboo desk organizer with multiple compartments'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
