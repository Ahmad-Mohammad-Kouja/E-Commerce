<?php

namespace App\src\traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function successResponse(string $dataName ,  $data ,  $status = 200): JsonResponse
    {
        $response = [
            'status' => $status,
            $dataName => $data
        ];

        return response()->json($response , $status);
    }

    public function successResponseWithMessage(string $dataName ,  $data  , string $msg , int $status = 200): JsonResponse
    {
        $response = [
            'status' => $status,
            'massage' => $msg,
            $dataName => $data
        ];

        return response()->json($response , $status);
    }
    public function showMessage(string $msg , int $status = 201): JsonResponse
    {
        return response()->json(['success' => $msg, 'status' => $status] , $status);
    }

    protected function errorResponse($errors, string $message  , int $status = 400): JsonResponse
    {
        $response = [
            'status' => $status,
            'massage' => $message,
            'errors' => $errors
        ];

        return response()->json($response , $status);
    }

    public function getCurrentLang(): string
    {
        return app()->getLocale();
    }

    public function returnValidationError($validator , $status = 422): JsonResponse
    {
        return $this->errorResponse($validator->errors() , "validation error" , $status);
    }
}
