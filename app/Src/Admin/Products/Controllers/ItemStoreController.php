<?php

namespace App\Src\Admin\Products\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domains\Stores\Models\Store;
use App\Http\Controllers\Controller;
use App\Domains\Products\Models\Item;
use App\Domains\Products\Models\ItemStore;
use App\Domains\Products\Services\ItemStoreService;
use App\Src\Admin\Products\Resources\ItemStoreResource;
use App\Src\Admin\Products\Requests\StoreItemStoreRequest;

class ItemStoreController extends Controller
{
    public function __construct(protected ItemStore $itemStore)
    {
    }
    public function index(Request $request)
    {
        $items=Item::with('itemStores')->paginate();
        return $this->successResponse(ItemStoreResource::collection($items), 'success');
    }

    public function store(StoreItemStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            //get items from database and compare them
            $ids=(new ItemStoreService())->get($request->items);
            if (is_null($ids)) {
                return $this->failedResponse(__('there is item doesn\'t exist in system'));
            }
            //collect the new items request in array
            $data=(new ItemStoreService())->collect($request->items);
            //delete exist ids in database
            (new ItemStoreService())->delete($this->itemStore, $ids);
            //add new items from array and inserted to database
            (new ItemStoreService())->add($this->itemStore, $data);
            DB::commit();
            return $this->createdResponse($data, 'created');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->failedResponse($th->getMessage());
        }
    }
    public function metaData()
    {
        return $this->successResponse(Store::select(['id','name'])->paginate(), 'success');
    }
}
