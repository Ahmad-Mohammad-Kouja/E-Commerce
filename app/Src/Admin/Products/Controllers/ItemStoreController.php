<?php

namespace App\Src\Admin\Products\Controllers;

use App\Domains\Products\Models\Item;
use App\Domains\Products\Models\ItemStore;
use App\Domains\Products\Services\ItemStoreService;
use App\Domains\Stores\Models\Store;
use App\Http\Controllers\Controller;
use App\Src\Admin\Products\Requests\StoreItemStoreRequest;
use App\Src\Admin\Products\Resources\ItemStoreItemResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ItemStoreController extends Controller
{
    public function __construct(protected ItemStore $itemStore)
    {
    }

    public function index(Request $request)
    {
        $items = Item::with('itemStores')->paginate();

        return $this->successResponse(ItemStoreItemResource::collection($items), 'success');
    }

    public function store(StoreItemStoreRequest $request)
    {
        try {
            $data = (new ItemStoreService())->storeItemStore($request->items, $this->itemStore);
            if (is_null($data)) {
                return $this->failedResponse(__('there is item doesn\'t exist in system'));
            }

            return $this->createdResponse($data, 'created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return $this->failedResponse(__('An error occurred. Please try again later.'));
        }
    }

    public function metadata()
    {
        return $this->successResponse((new Store())->metadata(), 'success');
    }
}
