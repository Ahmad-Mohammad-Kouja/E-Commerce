<?php

namespace App\Src\User\Orders\Controllers;

use App\Domains\Operations\Models\Order;
use App\Http\Controllers\Controller;
use App\Src\Admin\Orders\Requests\OrderRequest;
use App\Src\Admin\Orders\Resources\OrderGridResource;
use App\Src\Shared\Traits\ApiResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class OrderController extends Controller
{
    use ApiResponseHelper;
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id' , $user_id);
        return $this->successResponse(OrderGridResource::collection($orders), 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request): JsonResponse
    {
        try {
            $order = Order::create($request->validated());

            return $this->createdResponse(new OrderGridResource($order), 'created');
        } catch (Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        //authorize code (if this a user?... is this order for this user??)
        return $this->createdResponse(new OrderGridResource($order));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order): JsonResponse
    {
        //authorize code (if this a user?... is this order for this user??)
        try {
            $order->update($request->validated());

            return $this->successResponse(new OrderGridResource($order), 'updated');
        } catch (Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): JsonResponse
    {
        //authorize code (if this a user?... is this order for this user??)
        try {
            $order->delete();

            return $this->deletedResponse('deleted');
        } catch (Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
}
