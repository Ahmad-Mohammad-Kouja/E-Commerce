<?php

namespace App\Src\Admin\Products\Controllers;

use App\Domains\Products\Models\Category;
use App\Http\Controllers\Controller;
use App\Src\Admin\Products\Requests\CategoryRequest;
use App\Src\Admin\Products\Resources\CategoryGridResource;
use App\Src\Shared\Traits\ApiResponseHelper;

class CategoryController extends Controller
{
    use ApiResponseHelper;

    public function __construct(protected Category $category)
    {
    }

    public function index()
    {
        $categories = $this->category->getForGrid();

        return $this->successResponse(CategoryGridResource::collection($categories), 'success');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $category = $this->category->create($request->validated());

            return $this->createdResponse(new CategoryGridResource($category), 'created');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function show(Category $category)
    {
        return $this->successResponse(new CategoryGridResource($category), 'success');
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());

            return $this->successResponse(new CategoryGridResource($category), 'updated');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return $this->deletedResponse('deleted');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
}
