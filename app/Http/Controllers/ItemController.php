<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::pagiante();

        return $items;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        Item::create([
           'category_id' => $request->id,
           'name' => $request->name,
           'description' => $request->description,
           'weight' => $request->quantity,
           'status' => Item::DEFAULT_STATUS,
        ]);

        // return $msg = "Item has been created successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //return $item
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item)
    {
        $item->update([
            'category_id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'weight' => $request->weight,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);
        // return $msg = "Item has been updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        // return $msg = "Item has been deleted successfully";
    }
}
