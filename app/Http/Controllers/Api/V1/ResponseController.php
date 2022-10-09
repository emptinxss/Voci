<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class ResponseController extends Controller
{
    public function succResponse($result, $message, $status = 200)
    {
        $response = [
            'success' => true,
            'status' => $status,
            'message' => $message,
            'data'  => $result,

        ];
        return response()->json($response, $status);
    }

    public function errResponse($error, $errorMessages = [], $status = 404)
    {
        $response = [
            'success' => false,
            'status' => $status,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data']['errors'] = $errorMessages;
        }

        return response()->json($response, $status);
    }
    //use FormRequest if u dont need all these response to a request
}
