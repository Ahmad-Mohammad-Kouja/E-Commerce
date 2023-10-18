<?php

namespace App\Src\Admin\Products\Controllers;

use App\Domains\Products\Models\Category;
use App\Http\Controllers\Controller;
use App\Src\Admin\Products\Requests\CategoryRequest;
use App\Src\Admin\Products\Resources\CategoryGrideResource;
use App\Src\Shared\Traits\ApiResponseHelper;

class CategoryController extends Controller
{
    use ApiResponseHelper;

    public function index()
    {
        $categories = Category::paginate();

        return $this->successResponse(CategoryGrideResource::collection($categories), 'success');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $category = Category::create($request->validated());

            return $this->createdResponse(new CategoryGrideResource($category), 'created');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function show(string $id)
    {
        //
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());

            return $this->successResponse(new CategoryGrideResource($category), 'created');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            Category::find($id)->delete();

            return $this->deletedResponse('deleted');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
}
