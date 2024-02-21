<?php

namespace App\Src\Admin\Products\Controllers;

use App\Domains\Products\Models\Item;
use App\Http\Controllers\Controller;
use App\Src\Admin\Products\Requests\ItemStoreRequest;
use App\Src\Admin\Products\Requests\ItemUpdateImageRequest;
use App\Src\Admin\Products\Requests\ItemUpdateRequest;
use App\Src\Admin\Products\Resources\ItemGridResource;
use App\Src\Admin\Products\Resources\ItemShowResource;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __construct(protected Item $item)
    {
    }

    public function index()
    {
        $items = $this->item->getForGrid();

        return $this->successResponse(ItemGridResource::collection($items), 'success');
    }

    public function store(ItemStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $item = $this->item->create($request->validated());

            if ($request->hasFile('image')) {
                $item->addMediaFromRequest('image')->toMediaCollection('items');
            }
            DB::commit();

            return $this->createdResponse(new ItemShowResource($item->load('media')), 'created');
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->failedResponse($th->getMessage());
        }
    }

    public function show(Item $item)
    {
        return $this->successResponse(new ItemShowResource($item->load('media')), 'success');
    }

    public function update(ItemUpdateRequest $request, Item $item)
    {
        try {
            $item->update($request->validated());

            return $this->successResponse(new ItemShowResource($item), 'updated');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function updateImage(ItemUpdateImageRequest $request, Item $item)
    {
        try {
            // Remove the existing image from the media library
            $item->clearMediaCollection('items');
            // Store the new image in the media library
            $item->addMediaFromRequest('image')->toMediaCollection('items');

            return $this->successResponse(new ItemShowResource($item->load('media')), 'updated');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function destroy(Item $item)
    {
        try {
            DB::beginTransaction();
            // Remove the existing image from the media library
            $item->clearMediaCollection('items');
            // Remove the item
            $item->delete();
            DB::commit();

            return $this->deletedResponse('deleted');
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->failedResponse($th->getMessage());
        }
    }
}
