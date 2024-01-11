<?php

namespace App\Src\Admin\Products\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Domains\Products\Models\Discount;
use App\Src\Admin\Products\Resources\DiscountResource;
use App\Src\Admin\Products\Requests\StoreDiscountRequest;
use App\Src\Admin\Products\Requests\UpdateDiscountRequest;
use App\Src\Admin\Products\Resources\DiscountGridResource;

class ItemDiscountController extends Controller
{

    public function __construct(protected Discount $discount)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all discounts
        $discounts = $this->discount->getForGrid();

        return $this->successResponse(DiscountGridResource::collection($discounts), 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscountRequest $request)
    {
        $discount = $this->discount->create($request->validated());

        return $this->createdResponse(new DiscountResource($discount), 'created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return $this->successResponse(new DiscountResource($discount->load('itemStore.item')), 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        try {
            $discount->update($request->validated());
            return $this->successResponse(new DiscountResource($discount), 'updated');
        } catch (\Throwable $th) {
            Log::error('Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return $this->deletedResponse('deleted');
    }
}
