<?php

namespace App\Src\Admin\Controllers;

use App\Domains\Products\Models\Category;
use App\Http\Controllers\Controller;
use App\Src\Admin\Requests\CategoryRequest;

class CategoriesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            Category::create([
                'parent_id' => $request->parent_id,
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $request->image, //string
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        try {
            $category = Category::find($id)->update([
                'parent_id' => $request->parent_id,
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $request->image,
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Category::find($id)->delete();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
