<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Support\Facades\Validator;

trait ApiResponseTrait
{
    public $paginateNumber = 15;
    public $adminRole = 1;
    public $techRole = 2;
    public $reception = 3;


    /*
     * [
     * data => data ,
     * status=> true or false
     * error = > 'Error Massage'
     * ]
     */

    public
    function apiResponse($data = null,bool $status = true, $error = null, $statusCode = 200)
    {
        $array = [
            'data' => $data,
            'status' => $status,
            'error' => $error,
            'statusCode' => $statusCode
        ];
        return response($array);
    }

    public function unAuthoriseResponse()
    {
        return $this->apiResponse(null, 0, 'Unauthorized !', 401);
    }

    public
    function notFoundMassage($more = null)
    {
        return $this->apiResponse(null, 1, $more . " Not found in our database !", 404);
    }

    public
    function requiredField($message)
    {
        return $this->apiResponse(null, false, $message, 200);
    }

    public
    function apiValidation($request, $array)
    {
        foreach ($array as $field) {
            if (!$request->has($field))
                return [false, 'Field ' . $field . ' is required'];

            if ($request[$field] == null)
                return [false, "Field " . $field . " can't be empty"];
        }
        return [true, 'No error'];
    }

}

