<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = [])
    {
        return self::response(true, $data, [], 200);
    }

    public static function failure($errors = [], $data = [])
    {
        return self::response(false, $data, $errors, 422);
    }

    private static function response($success = true, $data = [], $errors = [], $code = 200)
    {
        return response()->json([
            'success'   => $success,
            'data'      => $data,
            'errors'    => $errors
        ], $code);
    }
}
