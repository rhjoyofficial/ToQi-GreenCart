<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create roles
        $roles = [
            ['name' => 'admin', 'description' => 'System Administrator'],
            ['name' => 'seller', 'description' => 'Product Seller'],
            ['name' => 'customer', 'description' => 'Customer/Buyer'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // 2. Create categories (Organic food categories)
        $categories = [
            ['name' => 'Vegetables', 'description' => 'Fresh Organic Vegetables'],
            ['name' => 'Fruits', 'description' => 'Fresh Organic Fruits'],
            ['name' => 'Rice & Lentils', 'description' => 'Organic Rice and Lentils'],
            ['name' => 'Spices', 'description' => 'Pure Organic Spices'],
            ['name' => 'Dairy', 'description' => 'Organic Dairy Products'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }

        // 3. Create users
        // Admin
        $admin = User::create([
            'role_id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@greencart.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'phone' => '+8801712345678',
            'address_line1' => '123 Organic Street',
            'city' => 'Dhaka',
            'state' => 'Dhaka',
            'postal_code' => '1207',
            'country' => 'Bangladesh',
            'is_active' => true,
        ]);

        // Create sellers (Organic farmers)
        $sellers = [];
        for ($i = 1; $i <= 5; $i++) {
            $seller = User::factory()->create([
                'role_id' => 2,
                'name' => 'Organic Farm ' . $i,
                'email' => 'seller' . $i . '@greencart.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'phone' => '+8801' . rand(300000000, 999999999),
                'address_line1' => 'Farm ' . $i . ', Village Road',
                'city' => ['Tangail', 'Gazipur', 'Manikganj', 'Kushtia', 'Bogra'][$i - 1],
                'state' => 'Bangladesh',
                'postal_code' => '120' . $i,
                'country' => 'Bangladesh',
                'is_active' => true,
            ]);
            $sellers[] = $seller;
        }

        // Create customers
        $customers = [];
        for ($i = 1; $i <= 20; $i++) {
            $customer = User::factory()->create([
                'role_id' => 3,
                'name' => 'Customer ' . $i,
                'email' => 'customer' . $i . '@greencart.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'phone' => '+8801' . rand(300000000, 999999999),
                'address_line1' => 'House ' . $i . ', Road ' . rand(1, 20),
                'city' => 'Dhaka',
                'state' => 'Dhaka',
                'postal_code' => '120' . rand(1, 9),
                'country' => 'Bangladesh',
                'is_active' => true,
            ]);
            $customers[] = $customer;
        }

        // 4. Create products (Organic foods - exactly 25 products)
        $products = [];
        $categories = Category::all();

        $organicProducts = [
            'Vegetables' => [
                ['name' => 'Organic Tomato', 'price' => 80, 'stock' => 50],
                ['name' => 'Organic Potato', 'price' => 60, 'stock' => 70],
                ['name' => 'Organic Carrot', 'price' => 90, 'stock' => 40],
                ['name' => 'Organic Cabbage', 'price' => 70, 'stock' => 45],
                ['name' => 'Organic Cauliflower', 'price' => 100, 'stock' => 35],
            ],
            'Fruits' => [
                ['name' => 'Organic Mango', 'price' => 250, 'stock' => 30],
                ['name' => 'Organic Banana', 'price' => 40, 'stock' => 80],
                ['name' => 'Organic Papaya', 'price' => 50, 'stock' => 60],
                ['name' => 'Organic Guava', 'price' => 120, 'stock' => 40],
                ['name' => 'Organic Orange', 'price' => 180, 'stock' => 35],
            ],
            'Rice & Lentils' => [
                ['name' => 'Organic Rice', 'price' => 140, 'stock' => 100],
                ['name' => 'Organic Lentil', 'price' => 160, 'stock' => 80],
                ['name' => 'Organic Chickpea', 'price' => 150, 'stock' => 75],
                ['name' => 'Organic Mung Bean', 'price' => 130, 'stock' => 70],
                ['name' => 'Organic Soybean', 'price' => 170, 'stock' => 60],
            ],
            'Spices' => [
                ['name' => 'Organic Turmeric', 'price' => 500, 'stock' => 25],
                ['name' => 'Organic Cumin', 'price' => 600, 'stock' => 20],
                ['name' => 'Organic Coriander', 'price' => 450, 'stock' => 30],
                ['name' => 'Organic Chili', 'price' => 400, 'stock' => 35],
                ['name' => 'Organic Cardamom', 'price' => 800, 'stock' => 15],
            ],
            'Dairy' => [
                ['name' => 'Organic Milk', 'price' => 120, 'stock' => 50],
                ['name' => 'Organic Yogurt', 'price' => 200, 'stock' => 40],
                ['name' => 'Organic Cheese', 'price' => 350, 'stock' => 30],
                ['name' => 'Organic Butter', 'price' => 250, 'stock' => 35],
                ['name' => 'Organic Ghee', 'price' => 1200, 'stock' => 20],
            ],
        ];

        foreach ($sellers as $seller) {
            foreach ($categories as $category) {
                $categoryProducts = $organicProducts[$category->name] ?? [];

                // Create 1 product per category per seller (5 sellers × 5 categories = 25 products)
                if (!empty($categoryProducts)) {
                    $productData = $categoryProducts[array_rand($categoryProducts)];

                    $product = Product::create([
                        'seller_id' => $seller->id,
                        'category_id' => $category->id,
                        'name' => $productData['name'],
                        'slug' => Str::slug($productData['name']) . '-' . uniqid(),
                        'description' => 'Fresh organic ' . strtolower($productData['name']) . ' cultivated without chemicals. Price per kg.',
                        'price' => $productData['price'],
                        'stock_quantity' => $productData['stock'],
                        'is_active' => true,
                    ]);
                    $products[] = $product;
                }
            }
        }

        // 5. Create carts for customers
        foreach ($customers as $customer) {
            $cart = Cart::create([
                'customer_id' => $customer->id,
                'total_price' => 0,
            ]);

            // Add random items to cart
            $randomProducts = collect($products)->random(rand(1, 5));
            $cartTotal = 0;

            foreach ($randomProducts as $product) {
                $quantity = rand(1, 3);
                $unitPrice = $product->price;
                $totalPrice = $unitPrice * $quantity;

                $cart->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'total_price' => $totalPrice,
                ]);

                $cartTotal += $totalPrice;
            }

            $cart->update(['total_price' => $cartTotal]);
        }

        // 6. Create orders for some customers
        $orderStatuses = ['pending', 'processing', 'shipped', 'delivered'];
        $paymentStatuses = ['pending', 'paid'];

        foreach (array_slice($customers, 0, 10) as $customer) {
            for ($i = 0; $i < rand(1, 3); $i++) {
                $order = Order::create([
                    'customer_id' => $customer->id,
                    'total_amount' => 0,
                    'status' => $orderStatuses[array_rand($orderStatuses)],
                    'shipping_address' => $customer->address_line1 . ', ' . $customer->city . ', ' . $customer->state,
                    'billing_address' => $customer->address_line1 . ', ' . $customer->city . ', ' . $customer->state,
                    'payment_method' => ['bKash', 'Nagad', 'Bank Transfer', 'Cash'][rand(0, 3)],
                    'payment_status' => $paymentStatuses[array_rand($paymentStatuses)],
                    'notes' => rand(0, 1) ? 'Please deliver in the morning' : null,
                ]);

                // Add order items
                $randomProducts = collect($products)->random(rand(1, 4));
                $orderTotal = 0;

                foreach ($randomProducts as $product) {
                    $quantity = rand(1, 2);
                    $unitPrice = $product->price;
                    $totalPrice = $unitPrice * $quantity;

                    $order->items()->create([
                        'product_id' => $product->id,
                        'seller_id' => $product->seller_id,
                        'quantity' => $quantity,
                        'unit_price' => $unitPrice,
                        'total_price' => $totalPrice,
                    ]);

                    $orderTotal += $totalPrice;
                }

                $order->update(['total_amount' => $orderTotal]);
            }
        }

        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin: admin@greencart.com / password123');
        $this->command->info('Sellers: seller1-5@greencart.com / password123');
        $this->command->info('Customers: customer1-20@greencart.com / password123');
    }
}
