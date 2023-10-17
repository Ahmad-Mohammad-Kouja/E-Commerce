<?php

namespace App\Src\Admin\Store\Controllers;

use App\Domains\Stores\Models\Store;
use App\Http\Controllers\Controller;
use App\Src\Admin\Store\Requests\StoreRequest;
use App\Src\Admin\Store\Resources\GridStoreResource;

class StoreController extends Controller
{
    protected $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $stores = $this->store->all();

            return response()->json(GridStoreResource::collection($stores));
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

        return response()->json(new GridStoreResource($store), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $store = $this->store->find($id);

        return response()->json(new GridStoreResource($store));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $store = $this->store->find($id);
        $store->update($request->validated());

        return response()->json(new GridStoreResource($store));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->store->destroy($id);

        return response()->json(null, 204);
    }
}
