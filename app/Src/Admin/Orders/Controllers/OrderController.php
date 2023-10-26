<?php

namespace App\Src\Admin\Orders\Controllers;

use App\Domains\Operations\Models\Order;
use App\Http\Controllers\Controller;
use App\Src\Admin\Orders\Requests\OrderRequest;
use App\Src\Admin\Orders\Resources\OrderGridResource;
use App\Src\Shared\Traits\ApiResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;

class OrderController extends Controller
{
    use ApiResponseHelper;
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $orders = QueryBuilder::for(Order::class)
            ->join('users' , 'orders.user_id' , 'user.id')
            ->join('stores' , 'orders.store_id' , 'stores.id')
            ->join('addresses' , 'orders.address_id', 'addresses.id')
            ->allowedFilters([
                'users.name', 'stores.name' , 'addresses.name' ,
                'payment_id' , 'order_status' , 'payment_status' ,
                'delivery_type' , 'time_delivery']
            )->get();

        return $this->successResponse(OrderGridResource::collection($orders), 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        return $this->createdResponse(new OrderGridResource($order));
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
