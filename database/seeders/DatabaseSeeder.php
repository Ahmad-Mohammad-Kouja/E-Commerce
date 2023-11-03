<?php

namespace Database\Seeders;

use App\Domains\Entities\Models\Admin;
use App\Domains\Entities\Models\Provider;
use App\Domains\Entities\Models\User;
use App\Domains\Locations\Models\Address;
use App\Domains\Locations\Models\City;
use App\Domains\Locations\Models\Region;
use App\Domains\Operations\Models\Cart;
use App\Domains\Operations\Models\OrderDetail;
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
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
          //  User::factory(100)->create(),
            Provider::factory(25)->create(),
          //  City::factory(25)->create(),
          //  Region::factory(25)->create(),
            Address::factory(25)->create(),
            Category::factory(20)->create(),
            Admin::factory(3)->create(),
//
//            ItemStore::factory(50)->create(),
//            Wishlist::factory(25)->create(),
//            Rate::factory(25)->create(),
//            Offer::factory(25)->create(),
//            Feedback::factory(50)->create(),
//            Ad::factory(10)->create(),
//            Cart::factory(15)->create(),
//            ContactInfo::factory(10)->create(),
//            Product::factory(50)->create(),
//            OrderDetail::factory(25)->create(),
        ]);


    }
}
