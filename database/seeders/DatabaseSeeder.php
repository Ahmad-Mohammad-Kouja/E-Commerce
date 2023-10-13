<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ad;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\ContactInfo;
use App\Models\Feedback;
use App\Models\Item;
use App\Models\ItemStore;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Rate;
use App\Models\Region;
use App\Models\Store;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Work;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            User::factory(100)->create(),
            Provider::factory(25)->create(),
            City::factory(25)->create(),
            Region::factory(25)->create(),
            Address::factory(25)->create(),
            Category::factory(20)->create(),
            Admin::factory(3)->create(),
            Product::factory(100)->create(),
            ItemStore::factory(100)->create(),
            Wishlist::factory(25)->create(),
            Rate::factory(25)->create(),
            Offer::factory(25)->create(),
            Feedback::factory(50)->create(),
            Ad::factory(10)->create(),
            Cart::factory(15)->create(),
            ContactInfo::factory(10)->create(),
            OrderDetail::factory(25)->create(),
        ]);
    }
}
