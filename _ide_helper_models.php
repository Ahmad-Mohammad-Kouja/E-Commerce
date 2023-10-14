<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Domains\Entities\Models{
/**
 * App\Domains\Entities\Models\Admin
 *
 * @property mixed $password
 * @method static \Database\Factories\Domains\Entities\Models\AdminFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 */
	class Admin extends \Eloquent {}
}

namespace App\Domains\Entities\Models{
/**
 * App\Domains\Entities\Models\Provider
 *
 * @property-read \App\Domains\Entities\Models\User|null $user
 * @method static \Database\Factories\Domains\Entities\Models\ProviderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider query()
 */
	class Provider extends \Eloquent {}
}

namespace App\Domains\Entities\Models{
/**
 * App\Domains\Entities\Models\User
 *
 * @property mixed $password
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Locations\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Operations\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Stores\Models\Feedback> $feedbacks
 * @property-read int|null $feedbacks_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Operations\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Entities\Models\Provider> $providers
 * @property-read int|null $providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\Rate> $rates
 * @property-read int|null $rates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\Wishlist> $wishlists
 * @property-read int|null $wishlists_count
 * @method static \Database\Factories\Domains\Entities\Models\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

namespace App\Domains\Locations\Models{
/**
 * App\Domains\Locations\Models\Address
 *
 * @property-read \App\Domains\Operations\Models\Order|null $order
 * @property-read \App\Domains\Locations\Models\Region|null $region
 * @property-read \App\Domains\Entities\Models\User|null $user
 * @method static \Database\Factories\Domains\Locations\Models\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 */
	class Address extends \Eloquent {}
}

namespace App\Domains\Locations\Models{
/**
 * App\Domains\Locations\Models\City
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Locations\Models\Region> $regions
 * @property-read int|null $regions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Stores\Models\Store> $stores
 * @property-read int|null $stores_count
 * @method static \Database\Factories\Domains\Locations\Models\CityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 */
	class City extends \Eloquent {}
}

namespace App\Domains\Locations\Models{
/**
 * App\Domains\Locations\Models\Region
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Locations\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Domains\Locations\Models\City|null $city
 * @method static \Database\Factories\Domains\Locations\Models\RegionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 */
	class Region extends \Eloquent {}
}

namespace App\Domains\Operations\Models{
/**
 * App\Domains\Operations\Models\Cart
 *
 * @property-read \App\Domains\Products\Models\Item|null $item
 * @property-read \App\Domains\Entities\Models\User|null $user
 * @method static \Database\Factories\Domains\Operations\Models\CartFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 */
	class Cart extends \Eloquent {}
}

namespace App\Domains\Operations\Models{
/**
 * App\Domains\Operations\Models\Order
 *
 * @property-read \App\Domains\Locations\Models\Address|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Operations\Models\OrderDetail> $orderDetails
 * @property-read int|null $order_details_count
 * @property-read \App\Domains\Operations\Models\Payment|null $payment
 * @property-read \App\Domains\Stores\Models\Store|null $store
 * @property-read \App\Domains\Entities\Models\User|null $user
 * @method static \Database\Factories\Domains\Operations\Models\OrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 */
	class Order extends \Eloquent {}
}

namespace App\Domains\Operations\Models{
/**
 * App\Domains\Operations\Models\OrderDetail
 *
 * @property-read \App\Domains\Products\Models\Item|null $item
 * @property-read \App\Domains\Operations\Models\Order|null $order
 * @method static \Database\Factories\Domains\Operations\Models\OrderDetailFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail query()
 */
	class OrderDetail extends \Eloquent {}
}

namespace App\Domains\Operations\Models{
/**
 * App\Domains\Operations\Models\Payment
 *
 * @property-read \App\Domains\Operations\Models\Order|null $order
 * @method static \Database\Factories\Domains\Operations\Models\PaymentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 */
	class Payment extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Category
 *
 * @method static count()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\Item> $items
 * @property-read int|null $items_count
 * @property-read Category|null $parent
 * @method static \Database\Factories\Domains\Products\Models\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 */
	class Category extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Item
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Operations\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \App\Domains\Products\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\ItemStore> $itemStores
 * @property-read int|null $item_stores_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\Offer> $offers
 * @property-read int|null $offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Operations\Models\OrderDetail> $orderDetails
 * @property-read int|null $order_details_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\Rate> $rates
 * @property-read int|null $rates_count
 * @method static \Database\Factories\Domains\Products\Models\ItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 */
	class Item extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\ItemStore
 *
 * @property-read \App\Domains\Products\Models\Item|null $item
 * @property-read \App\Domains\Stores\Models\Store|null $store
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\Wishlist> $wishlists
 * @property-read int|null $wishlists_count
 * @method static \Database\Factories\Domains\Products\Models\ItemStoreFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ItemStore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemStore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemStore query()
 */
	class ItemStore extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Offer
 *
 * @property-read \App\Domains\Products\Models\Item|null $item
 * @method static \Database\Factories\Domains\Products\Models\OfferFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 */
	class Offer extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Product
 *
 * @property-read \App\Domains\Entities\Models\User|null $user
 * @method static \Database\Factories\Domains\Products\Models\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 */
	class Product extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Rate
 *
 * @property-read \App\Domains\Products\Models\Item|null $item
 * @property-read \App\Domains\Entities\Models\User|null $user
 * @method static \Database\Factories\Domains\Products\Models\RateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Rate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate query()
 */
	class Rate extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Wishlist
 *
 * @property-read \App\Domains\Products\Models\ItemStore|null $itemStore
 * @property-read \App\Domains\Entities\Models\User|null $user
 * @method static \Database\Factories\Domains\Products\Models\WishlistFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist query()
 */
	class Wishlist extends \Eloquent {}
}

namespace App\Domains\Stores\Models{
/**
 * App\Domains\Stores\Models\Ad
 *
 * @property-read \App\Domains\Stores\Models\Store|null $store
 * @method static \Database\Factories\Domains\Stores\Models\AdFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad query()
 */
	class Ad extends \Eloquent {}
}

namespace App\Domains\Stores\Models{
/**
 * App\Domains\Stores\Models\ContactInfo
 *
 * @property-read \App\Domains\Stores\Models\Store|null $store
 * @method static \Database\Factories\Domains\Stores\Models\ContactInfoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo query()
 */
	class ContactInfo extends \Eloquent {}
}

namespace App\Domains\Stores\Models{
/**
 * App\Domains\Stores\Models\Feedback
 *
 * @property-read \App\Domains\Stores\Models\Store|null $store
 * @property-read \App\Domains\Entities\Models\User|null $user
 * @method static \Database\Factories\Domains\Stores\Models\FeedbackFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
 */
	class Feedback extends \Eloquent {}
}

namespace App\Domains\Stores\Models{
/**
 * App\Domains\Stores\Models\Store
 *
 * @method static take(int $int)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Stores\Models\Ad> $ads
 * @property-read int|null $ads_count
 * @property-read \App\Domains\Locations\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Stores\Models\ContactInfo> $contactInfos
 * @property-read int|null $contact_infos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Stores\Models\Feedback> $feedbacks
 * @property-read int|null $feedbacks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Products\Models\ItemStore> $itemStores
 * @property-read int|null $item_stores_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Operations\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Stores\Models\Work> $works
 * @property-read int|null $works_count
 * @method static \Database\Factories\Domains\Stores\Models\StoreFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store query()
 */
	class Store extends \Eloquent {}
}

namespace App\Domains\Stores\Models{
/**
 * App\Domains\Stores\Models\Work
 *
 * @property-read \App\Domains\Stores\Models\Store|null $store
 * @method static \Database\Factories\Domains\Stores\Models\WorkFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Work newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Work newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Work query()
 */
	class Work extends \Eloquent {}
}

