<?php

namespace App\Src\Admin\Products\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Domains\Products\Models\Offer;
use App\Src\Admin\Products\Requests\OfferStoreRequest;
use App\Src\Admin\Products\Requests\OfferUpdateRequest;
use App\Src\Admin\Products\Resources\OfferGridResource;
use App\Src\Admin\Products\Resources\OfferShowResource;

class ItemOfferController extends Controller
{

    public function __construct(protected Offer $offer)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all offers
        $offers = Offer::with('item')->get();

        return $this->successResponse(OfferGridResource::collection($offers), 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferStoreRequest $request)
    {
        $offer = $this->offer->create($request->validated());

        return $this->createdResponse(new OfferShowResource($offer), 'created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return $this->successResponse(new OfferShowResource($offer->load('item')), 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferUpdateRequest $request, Offer $offer)
    {
        try {
            $offer->update($request->validated());
            return $this->successResponse(new OfferShowResource($offer), 'updated');
        } catch (\Throwable $th) {
            Log::error('Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return $this->deletedResponse('deleted');
    }
}
