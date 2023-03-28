<?php

namespace App\Traits;

trait ResponseCodeTrait
{
    /** 
     * to get data for responseCode
     * @author Nita Bopche 
     * @param int $code  Response code param
     * @param array $data Response data param
     * @param string $message Response message param   
     *  @param string $token Response message param   
     * @return array
     */


    public function getResponseCode($code, $token = null, $data = null, $message = null)
    {
        $responseCode = [
            /*
        |---------------------------------------------------------------------
        |SEND TOKEN RESPONSE CODE
        |---------------------------------------------------------------------
        */
            // send Token
            '200' => [
                'success' => true,
                'response_code' => 200,
                'message' => $message,
                'token' => $token,
                'data' => $data,
                'http_code' => 200

            ],
            /*
        |---------------------------------------------------------------------
        |GENERAL SUCCESS RESPONSE CODE
        |---------------------------------------------------------------------
        */
            '201' => [
                'success' => true,
                'response_code' => 201,
                'message' => $message,
                'data' => $data,
                'http_code' => 201

            ],
            /*
        |---------------------------------------------------------------------
        |VALIDATION ERROR RESPONSE CODE
        |---------------------------------------------------------------------
        */
            '101' => [
                'success' => false,
                'response_code' => 101,
                'message' => 'Validation error',
                'error_message' => $message,
                'data' => $data,
                'http_code' => 101

            ],
            '400' => [
                'success' => false,
                'response_code' => 400,
                'message' => 'HTTP_BAD_REQUEST',
                'error_message' => $message,
                'data' => $data,
                'http_code' => 400

            ],

            '401' => [
                'success' => false,
                'response_code' => 401,
                'message' => 'HTTP_UNAUTHORIZED',
                'error_message' => $message,
                'data' => $data,
                'http_code' => 401

            ],
        ];
        return $responseCode[$code];
    }
}
