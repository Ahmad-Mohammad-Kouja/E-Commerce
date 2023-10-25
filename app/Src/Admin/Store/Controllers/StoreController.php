<?php

namespace App\Src\Admin\Store\Controllers;

use App\Domains\Stores\Models\Store;
use App\Http\Controllers\Controller;
use App\Src\Admin\Store\Requests\StoreStoreRequest;
use App\Src\Admin\Store\Requests\StoreUpdateRequest;
use App\Src\Admin\Store\Resources\StoreGridResource;
use App\Src\Admin\Store\Resources\StoreUpdateResource;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct(protected Store $store)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $stores = $this->store->getStores()->get();

            return $this->successResponse(StoreGridResource::collection($stores), 'success');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        $store = $this->store->create($request->validated());

        return $this->createdResponse(new StoreGridResource($store), 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return $this->successResponse(new StoreGridResource($store), 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateRequest $request, Store $store)
    {
        $data = $request->validated();
        if ($data['is_main'] && ! $store->is_main) {
            $this->store->removeMainStore();
        } elseif (! $data['is_main'] && $store->is_main) {
            unset($data['is_main']);
        }
        $store->update($data);

        return $this->successResponse(new StoreUpdateResource($store), 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return $this->deletedResponse('deleted successful');
    }
}
