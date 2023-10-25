<?php

namespace App\Src\Admin\Products\Controllers;

use App\Domains\Products\Models\Item;
use App\Http\Controllers\Controller;
use App\Src\Admin\Products\Requests\ItemRequest;
use App\Src\Admin\Products\Resources\ItemGrideResource;
use App\Src\Admin\Products\Resources\ItemShowResource;

class ItemController extends Controller
{
    public function __construct(protected Item $item)
    {
    }

    public function index()
    {
        $items = $this->item->getForGride()->get();

        return $this->successResponse(ItemGrideResource::collection($items), 'success');
    }

    public function store(ItemRequest $request)
    {
        try {
            $item = $this->item->create($request->validated());

            return $this->createdResponse(new ItemGrideResource($item), 'created');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function show(Item $item)
    {
        return $this->successResponse(new ItemShowResource($item), 'success');
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
