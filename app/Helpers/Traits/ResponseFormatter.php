<?php
namespace App\Helpers\Traits;

trait ResponseFormatter
{
    protected function formatResponse($status, $message = null, $data = null){
        return [
            'status' => $status,
            'data' => $data,
            'message' => $message,
        ];
    }
}