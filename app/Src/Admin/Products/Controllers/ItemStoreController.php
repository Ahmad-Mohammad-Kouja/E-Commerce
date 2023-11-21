<?php

namespace App\Src\Admin\Products\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Domains\Stores\Models\Store;
use App\Http\Controllers\Controller;
use App\Domains\Products\Models\Item;
use App\Domains\Products\Models\ItemStore;
use App\Domains\Products\Services\ItemStoreService;
use App\Src\Admin\Products\Requests\StoreItemStoreRequest;
use App\Src\Admin\Products\Resources\ItemStoreResource;
use App\Src\Admin\Products\Resources\ItemStoreItemResource;

class ItemStoreController extends Controller
{
    public function __construct(protected ItemStore $itemStore)
    {
    }
    public function index(Request $request)
    {
        $items=Item::with('itemStores')->paginate();
        return $this->successResponse(ItemStoreItemResource::collection($items), 'success');
    }

    public function store(StoreItemStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data=(new ItemStoreService())->storeItemStore($request->items, $this->itemStore);
            if (is_null($data)) {
                return $this->failedResponse(__('there is item doesn\'t exist in system'));
            }
            DB::commit();
            return $this->createdResponse($data, 'created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();
            return $this->failedResponse(__('An error occurred. Please try again later.'));
        }
    }
    public function metadata()
    {
        return $this->successResponse(Store::select(['id','name'])->get(), 'success');
    }
}
