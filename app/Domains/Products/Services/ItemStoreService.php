<?php
namespace App\Domains\Products\Services;

use App\Domains\Products\Models\Item;

class ItemStoreService
{
    public function get($itemRequest)
    {
        $ids=collect($itemRequest)->pluck('id')->toArray();
        $items=Item::whereIn('id', $ids)->get();
        if (count($items)!=count($itemRequest)) {
            return null;
        }
        return $ids;
    }
    public function collect($itemRequest)
    {
        foreach ($itemRequest as $item) {
            $stores=$item['stores'];
            for ($i=0; $i <count($stores); $i++) {
                $data[]=['item_id'=>$item['id'],'store_id'=>$stores[$i]['id'],'price'=>$stores[$i]['price']];
            }
        }
        return $data;
    }
    public function delete($itemStore, $ids)
    {
        $itemStore->whereIn('item_id', $ids)->delete();
    }
    public function add($itemStore, $data)
    {
        $itemStore->insert($data);
    }
}
