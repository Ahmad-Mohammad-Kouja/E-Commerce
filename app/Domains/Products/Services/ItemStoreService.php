<?php

namespace App\Domains\Products\Services;

use App\Domains\Products\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemStoreService
{
    //ids items in request
    public $ids;

    public function storeItemStore($itemRequest, $itemStore)
    {
        try {
            DB::beginTransaction();
            //get items count from database and compare them
            $itemsCount = $this->get($itemRequest);
            if ($itemsCount != count($itemRequest)) {
                return null;
            }
            //collect the request items in array
            $data = $this->collect($itemRequest);
            //delete exist ids in database
            $itemStore->whereIn('item_id', $this->ids)->delete();
            //add items in in database
            $itemStore->insert($data);
            DB::commit();

            return $data;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    private function get($itemRequest)
    {
        $this->ids = collect($itemRequest)->pluck('id')->toArray();

        return Item::whereIn('id', $this->ids)->count();
    }

    private function collect($itemRequest)
    {
        foreach ($itemRequest as $item) {
            $stores = $item['stores'];
            for ($i = 0; $i < count($stores); $i++) {
                $data[] = ['item_id' => $item['id'], 'store_id' => $stores[$i]['id'], 'price' => $stores[$i]['price']];
            }
        }

        return $data;
    }
}
