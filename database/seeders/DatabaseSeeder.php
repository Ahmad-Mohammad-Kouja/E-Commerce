<?php

namespace Database\Seeders;

use App\Domains\Entities\Models\Admin;
use App\Domains\Entities\Models\Provider;
use App\Domains\Entities\Models\User;
use App\Domains\Locations\Models\Address;
use App\Domains\Locations\Models\City;
use App\Domains\Locations\Models\Region;
use App\Domains\Operations\Models\Cart;
use App\Domains\Operations\Models\Order;
use App\Domains\Operations\Models\OrderDetail;
use App\Domains\Operations\Models\Payment;
use App\Domains\Products\Models\Category;
use App\Domains\Products\Models\Item;
use App\Domains\Products\Models\ItemStore;
use App\Domains\Products\Models\Offer;
use App\Domains\Products\Models\Product;
use App\Domains\Products\Models\Rate;
use App\Domains\Products\Models\Wishlist;
use App\Domains\Stores\Models\Ad;
use App\Domains\Stores\Models\ContactInfo;
use App\Domains\Stores\Models\Feedback;
use App\Domains\Stores\Models\Store;
use App\Domains\Stores\Models\Work;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory()->create();
        Provider::factory()->create();
        User::factory()->create();
        Address::factory()->create();
        City::factory()->create();
        Region::factory()->create();
        Cart::factory()->create();
        Order::factory()->create();
        OrderDetail::factory()->create();
        Payment::factory()->create();
        Category::factory()->create();
        Item::factory()->create();
        ItemStore::factory()->create();
        Wishlist::factory()->create();
        Offer::factory()->create();
        Product::factory()->create();
        Rate::factory()->create();
        Wishlist::factory()->create();
        Ad::factory()->create();
        ContactInfo::factory()->create();
        Feedback::factory()->create();
        Store::factory()->create();
        Work::factory()->create();
    }
}
