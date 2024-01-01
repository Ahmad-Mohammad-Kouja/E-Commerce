<?php

namespace App\Src\Admin\Store\Controllers;

use App\Domains\Stores\Models\Ad;
use App\Http\Controllers\Controller;
use App\Src\Admin\Store\Requests\StoreAdRequest;
use App\Src\Admin\Store\Requests\UpdateAdRequest;
use App\Src\Admin\Store\Resources\AdCollection;
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

        return $this->successResponse(new AdCollection($ads), 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            unset($data['image']);
            $result = $this->ad->create($data);
            if ($request->hasFile('image')) {
                $result->addMediaFromRequest('image')->toMediaCollection('ads');
            }
            DB::commit();

            return $this->createdResponse(new AdGridResource($result), 'success');
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
            $data = $request->validated();
            unset($data['image']);
            $ad->update($data);
            if ($request->hasFile('image')) {
                $ad->clearMediaCollection('ads');
                $ad->addMediaFromRequest('image')->toMediaCollection('ads');
            }
            DB::commit();

            return $this->successResponse(new AdGridResource($ad), 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());

            return $this->failedResponse(__('An error occurred. Please try again later.'));
        }
    }

    public function destroy(Ad $ad)
    {
        try {
            DB::beginTransaction();
            $ad->delete();
            DB::commit();

            return $this->deletedResponse('deleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());

            return $this->failedResponse(__('An error occurred. Please try again later.'));
        }
    }
}
