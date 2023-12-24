<?php

namespace App\Src\Admin\Store\Controllers;

use App\Domains\Stores\Models\Ad;
use App\Http\Controllers\Controller;
use App\Src\Admin\Store\Requests\StoreAdRequest;
use App\Src\Admin\Store\Requests\UpdateAdRequest;
use App\Src\Admin\Store\Resources\AdGridResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdController extends Controller
{
    public function __construct(protected Ad $ad)
    {

    }

    public function index()
    {
        $ads = $this->ad->getForGrid();

        return $this->successResponse(AdGridResource::collection($ads), 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdRequest $request)
    {
        try {
            DB::beginTransaction();
            $ad = $this->ad->create($request->validated());
            if ($request->hasFile('image')) {
                $ad->addMediaFromRequest('image')->toMediaCollection('ads');
            }
            DB::commit();

            return $this->createdResponse($ad, 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());

            return $this->failedResponse(__('An error occurred. Please try again later.'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        try {
            DB::beginTransaction();
            $ad->update($request->validated());
            if ($request->hasFile('image')) {
                $ad->clearMediaCollection('ads');
                $ad->addMediaFromRequest('image')->toMediaCollection('ads');
            }
            DB::commit();

            return $this->createdResponse($ad, 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
        }
    }

    public function destroy(Ad $ad)
    {
        try {
            DB::beginTransaction();
            // Remove the existing image from the media library
            $ad->clearMediaCollection('ads');
            // Remove the ad
            $ad->delete();
            DB::commit();

            return $this->deletedResponse('deleted');
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->failedResponse($th->getMessage());
        }
    }
}