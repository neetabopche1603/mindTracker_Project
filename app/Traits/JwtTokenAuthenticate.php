<?php

namespace App\Traits;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Exception;

trait JwtTokenAuthenticate
{

// function authenticateJwtToken($token)
// {
//     try {
//         $user = JWTAuth::authenticate($token);
//         if (!$user) {
//             throw new Exception('User not found');
//         }
//         // return $user;
//     } catch (Exception $e) {
//         if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
//             return response()->json(['status' => 'Token is Invalid']);
//         }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
//             return response()->json(['status' => 'Token is Expired']);
//         }else{
//             return response()->json(['status' => 'Authorization Token not found']);
//         }
//     }
// }
}
