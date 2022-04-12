<?php

namespace App\Modules;

use Illuminate\Routing\Controller as BaseController;

class AppController extends BaseController
{
    protected function resData($status, $message, $data)
    {
        return response()->json([
            'status' => $status,
            'messages' => $message,
            'data' => $data,
        ], $status);
    }

    protected function resMessage($status, $message)
    {
        return response()->json([
            'status' => $status,
            'messages' => $message,
        ], $status);
    }
}