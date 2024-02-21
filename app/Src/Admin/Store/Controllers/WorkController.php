<?php

namespace App\Src\Admin\Store\Controllers;

use App\Domains\Stores\Models\Work;
use App\Http\Controllers\Controller;
use App\Src\Admin\Store\Requests\StoreWorkRequest;
use App\Src\Admin\Store\Requests\UpdateWorkRequest;
use App\Src\Admin\Store\Resources\WorkGridResource;

class WorkController extends Controller
{
    public function __construct(protected Work $work)
    {
    }

    public function index()
    {
        $works = $this->work->getForGrid();

        return $this->successResponse(WorkGridResource::collection($works), 'success');
    }

    public function store(StoreWorkRequest $request)
    {
        $work = $this->work->create($request->validated());

        return $this->createdResponse(new WorkGridResource($work), 'success');
    }

    public function show(Work $work)
    {
        return $this->successResponse(new WorkGridResource($work), 'success');
    }

    public function update(UpdateWorkRequest $request, Work $work)
    {
        $work->update($request->validated());

        return $this->successResponse(new WorkGridResource($work), 'updated');
    }

    public function destroy(Work $work)
    {
        $work->delete();

        return $this->deletedResponse('deleted successful');
    }
}
