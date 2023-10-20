<?php

namespace App\Src\Admin\Products\Controllers;

use App\Domains\Products\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Src\Admin\Products\Resources\ItemGrideResource;
use App\Src\Shared\Traits\ApiResponseHelper;
use Spatie\QueryBuilder\QueryBuilder;

class ItemController extends Controller
{
    use ApiResponseHelper;

    public function index()
    {
        $items = QueryBuilder::for(Item::class)
            ->allowedFilters(['name', 'status'])
            ->get();

        return $this->successResponse(ItemGrideResource::collection($items), 'success');
    }

    public function store(ItemRequest $request)
    {
        try {
            $item = Item::create($request->validated());

            return $this->createdResponse(new ItemGrideResource($item), 'created');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }

    }

    public function show(Item $item)
    {
        return $this->createdResponse(new ItemGrideResource($item));
    }

    public function update(ItemRequest $request, Item $item)
    {
        try {
            $item->update($request->validated());

            return $this->successResponse(new ItemGrideResource($item), 'updated');

        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function destroy(Item $item)
    {
        try {
            $item->delete();

            return $this->deletedResponse('deleted');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
}
