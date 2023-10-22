<?php

namespace App\Src\Admin\Entities\Controllers;

use App\Domains\Entities\Models\Admin;
use App\Http\Controllers\Controller;
use App\Src\Admin\Entities\Requests\LoginRequest;
use App\Src\Admin\Entities\Resources\AdminResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(protected Admin $admin)
    {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $admin = $this->admin->findByEmail($request->get('email'));
        if (empty($admin) || Hash::check($request->get('password'), $admin->password) === false) {
            return $this->failedResponse(__('admin.response_messages.invalid_credentials'));
        }

        return $this->successResponse(
            [
                'admin' => AdminResource::make($admin),
                'token' => $admin->createToken('admin')->plainTextToken,
            ],
            message: __('admin.response_messages.login_success')
        );
    }

    public function logout(): JsonResponse
    {
        /**
         * @var App\Domains\Entities\Models\Admin $admin
         */
        $admin = Auth::guard('sanctum')->user();
        $admin->currentAccessToken()->delete();

        return $this->successResponse(message: __('admin.response_messages.logout_success'));
    }
}
