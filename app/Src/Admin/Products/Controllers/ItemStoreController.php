<?php

namespace App\Src\Admin\Products\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domains\Stores\Models\Store;
use App\Http\Controllers\Controller;
use App\Domains\Products\Models\Item;
use App\Domains\Products\Models\ItemStore;
use App\Domains\Products\Services\ItemStoreService;
use App\Src\Admin\Products\Requests\ItemStoreStoreRequest;
use App\Src\Admin\Products\Resources\ItemStoreResource;

class ItemStoreController extends Controller
{
    public function __construct(protected ItemStore $itemStore)
    {
    }
    public function index(Request $request)
    {
        return  new ItemStoreResource(Store::with('itemStores')->where('id', $request->storeId)->first());
    }

    public function store(ItemStoreStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            //get items from database and compare them
            $ids=(new ItemStoreService())->get($request->items);
            //collect the new items request in array
            $data=(new ItemStoreService())->collect($request->items);

            $this->itemStore->whereIn('item_id', $ids)->delete();
            $this->itemStore->insert($data);
            DB::commit();
            return $this->createdResponse($data, 'created');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->failedResponse($th->getMessage());
        }
    }
}
