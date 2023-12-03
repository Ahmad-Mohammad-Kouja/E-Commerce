<?php

namespace App\Src\Admin\Products\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Domains\Products\Models\Category;
use App\Src\Admin\Products\Requests\CategoryStoreRequest;
use App\Src\Admin\Products\Requests\CategoryUpdateRequest;
use App\Src\Admin\Products\Resources\CategoryGridResource;
use App\Src\Admin\Products\Resources\CategoryShowResource;
use App\Src\Admin\Products\Requests\CategoryUpdateImageRequest;

class CategoryController extends Controller
{
    public function __construct(protected Category $category)
    {
    }

    public function index()
    {
        $categories = $this->category->getForGrid();

        return $this->successResponse(CategoryGridResource::collection($categories), 'success');
    }

    public function store(CategoryStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $category = $this->category->create($request->validated());

            if ($request->hasFile('image')) {
                $category->addMediaFromRequest('image')->toMediaCollection('categories');
            }
            DB::commit();

            return $this->createdResponse(new CategoryShowResource($category->load('media')), 'created');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function show(Category $category)
    {
        return $this->successResponse(new CategoryShowResource($category->load('media')), 'success');
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());

            return $this->successResponse(new CategoryShowResource($category), 'updated');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function updateImage(CategoryUpdateImageRequest $request, Category $category)
    {
        try {
            // Remove the existing image from the media library
            $category->clearMediaCollection('categories');
            // Store the new image in the media library
            $category->addMediaFromRequest('image')->toMediaCollection('categories');
            return $this->successResponse(new CategoryShowResource($category->load('media')), 'updated');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();
            // Remove the existing image from the media library
            $category->clearMediaCollection('categories');
            // Remove the item
            $category->delete();
            DB::commit();

            return $this->deletedResponse('deleted');
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
}
