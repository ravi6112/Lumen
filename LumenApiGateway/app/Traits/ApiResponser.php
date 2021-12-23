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
        return response($data,$code)->header('Content-Type','application/json');
    }
}
