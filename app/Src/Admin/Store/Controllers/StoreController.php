<?php

namespace App\Src\Admin\Store\Controllers;

use App\Domains\Stores\Models\Store;
use App\Http\Controllers\Controller;
use App\Src\Admin\Store\Requests\StoreRequest;
use App\Src\Admin\Store\Resources\StoreGridResource;
use App\Src\Admin\Store\Resources\StoreUpdateResource;
use App\Src\Shared\Traits\ApiResponseHelper;

class StoreController extends Controller
{
    use ApiResponseHelper;

    public function __construct(protected Store $store)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $stores = $this->store->all();

            return $this->successResponse(StoreGridResource::collection($stores), 'success');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $store = $this->store->create($request->validated());

        return $this->successResponse(new StoreGridResource($store), 'success');
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
    public function update(StoreRequest $request, Store $store)
    {
        if ($request->input('is_main') == 1) {
            $mainStore = Store::where('is_main', 1)->first();
            $mainStore->update(['is_main' => 0]);
        }
        $store->update($request->validated());

        return $this->successResponse(new StoreUpdateResource($store), 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();

        $this->successResponse(null, 'success');
    }
}
