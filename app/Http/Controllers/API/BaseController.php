<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'status' => 101,
            'message' => $message,
        ];
        
        if($result instanceof  \Illuminate\Http\Resources\Json\Resource){
            return $result->additional($response);
        }
        
        $response['data'] = $result;
        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'status' => $code,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, 200);
    }
    
    
    
    /**
     * @param $error | array
     * 
     * return error|string.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function getFirstError(array $errors = []){
        $err = "Data Invalid";
        foreach($errors as $fieldName=>$error){
            if(count($error) > 0){
                $err = $error[0];
                break;
            }
        }
        return $err;
    }
    
}
