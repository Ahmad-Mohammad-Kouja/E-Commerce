<?php

namespace App\Src\Admin\Store\Controllers;

use Illuminate\Http\Request;
use App\Domains\Stores\Models\Work;
use App\Domains\Stores\Models\Store;
use App\Http\Controllers\Controller;
use App\Src\Admin\Store\Requests\StoreWorkRequest;
use App\Src\Admin\Store\Requests\StoreStoreRequest;
use App\Src\Admin\Store\Requests\UpdateWorkRequest;
use App\Src\Admin\Store\Resources\WorkGridResource;
use App\Src\Admin\Store\Requests\StoreUpdateRequest;
use App\Src\Admin\Store\Resources\StoreGridResource;
use App\Src\Admin\Store\Resources\StoreUpdateResource;

class WorkController extends Controller
{
    public function __construct(protected Work $work)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = $this->work->getForGrid();

        return $this->successResponse(WorkGridResource::collection($works), 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkRequest $request)
    {
        $work = $this->work->create($request->validated());

        return $this->createdResponse(new WorkGridResource($work), 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        return $this->successResponse(new WorkGridResource($work), 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkRequest $request, Work $work)
    {
        $work->update($request->validated());

        return $this->successResponse(new WorkGridResource($work), 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        $work->delete();

        return $this->deletedResponse('deleted successful');
    }
}
