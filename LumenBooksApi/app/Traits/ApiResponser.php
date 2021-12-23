<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * build success response
     * @param string/array $data
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($data, $code=Response::HTTP_OK) {
        return response()->json(['data'=>$data],$code);
    }

    /**
     * build error response
     * @param string/array $message
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse($message, $code) {
        return response()->json(['error'=>$message, 'code'=>$code],$code);
    }
}
