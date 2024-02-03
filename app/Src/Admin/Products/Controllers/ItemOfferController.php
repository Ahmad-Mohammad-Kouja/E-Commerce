<?php

namespace App\Src\Admin\Products\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Domains\Products\Models\Offer;
use App\Src\Admin\Products\Resources\OfferResource;
use App\Src\Admin\Products\Requests\StoreOfferRequest;
use App\Src\Admin\Products\Requests\UpdateOfferRequest;
use App\Src\Admin\Products\Resources\OfferGridResource;
use App\Src\Admin\Products\Requests\UpdateOfferImageRequest;

class ItemOfferController extends Controller
{
    public function __construct(protected Offer $offer)
    {
    }

    public function index()
    {
        // get all offers
        $offers = $this->offer->getForGrid();

        return $this->successResponse(OfferGridResource::collection($offers), 'success');
    }

    public function store(StoreOfferRequest $request)
    {
        try {
            DB::beginTransaction();
            $offer = $this->offer->create($request->validated());

            if ($request->hasFile('image')) {
                $offer->addMediaFromRequest('image')->toMediaCollection('offers');
            }
            DB::commit();
            return $this->createdResponse(new OfferResource($offer->load('media')), 'created');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->failedResponse($th->getMessage());
        }
    }

    public function show(Offer $offer)
    {
        return $this->successResponse(new OfferResource($offer->load('store', 'media')), 'success');
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        try {
            $offer->update($request->validated());
            return $this->successResponse(new OfferResource($offer), 'updated');
        } catch (\Throwable $th) {
            Log::error('error when update offer!');
        }
    }

    public function updateImage(UpdateOfferImageRequest $request, Offer $offer)
    {
        try {
            // Remove the existing image from the media library
            $offer->clearMediaCollection('offers');
            // Store the new image in the media library
            $offer->addMediaFromRequest('image')->toMediaCollection('offers');
            return $this->successResponse(new OfferResource($offer->load('media')), 'updated');
        } catch (\Throwable $th) {
            Log::error('error when updateImage offer!');
        }
    }

    public function destroy(Offer $offer)
    {
        try {
            DB::beginTransaction();
            // Remove the existing image from the media library
            $offer->clearMediaCollection('offers');
            // Remove the offer
            $offer->delete();
            DB::commit();

            return $this->deletedResponse('deleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('error when delete offer!');
        }
    }
}
