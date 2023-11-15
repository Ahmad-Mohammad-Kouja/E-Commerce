<?php
namespace App\Domains\Products\Services;
use App\Domains\Products\Models\Item;
use App\Src\Shared\Traits\ApiResponseHelper;

class ItemStoreService
{
    use ApiResponseHelper;
    public function get($itemRequest)
    {
        $ids=collect($itemRequest)->pluck('id')->toArray();
        $items=Item::whereIn('id',$ids)->get();
        if(count($items)!=count($itemRequest)){
            return  $this->failedResponse(__('there is item doesn\'t exist in system' ));
        }
        return $ids;
    }
    public function collect($itemRequest)
    {
        foreach($itemRequest as $item){
            $stores=$item['stores'];
            $prices=$item['prices'];
            for ($i=0; $i <count( $stores) ; $i++)
            {
                $data[]=['item_id'=>$item['id'],'store_id'=>$stores[$i],'price'=>$prices[$i]];
            }
        }
        return $data;
    }
}
