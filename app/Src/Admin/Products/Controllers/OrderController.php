<?php

namespace App\Src\Admin\Products\Controllers;

use App\Domains\Operations\Models\Order;
use App\Http\Controllers\Controller;
use App\Src\Admin\Products\Resources\OrderGridResource;
use App\Src\Admin\Products\Resources\OrderResource;
use App\Src\Shared\Traits\ApiResponseHelper;
use Illuminate\Http\JsonResponse;
use Throwable;

class OrderController extends Controller
{
    use ApiResponseHelper;
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $orders = (new Order())->getForGrid();

        //dd($orders->sum('order_price'));

        return $this->successResponse(data:  OrderGridResource::collection($orders->paginate()), message: 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        return $this->successResponse(new OrderResource($order));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): JsonResponse
    {
        try {
            $order->delete();

            return $this->deletedResponse('deleted');
        } catch (Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
}
