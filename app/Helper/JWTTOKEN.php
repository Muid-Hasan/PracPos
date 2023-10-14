<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTTOKEN{
    static public function CreateTokenForLogin($userEmail):string{
        $key=env('JWT_KEY');
        $payload=[
            'iss'=>'POS_Project',
            'iat'=>time(),
            'exp'=>time()+60*60,
            'email'=>$userEmail

        ];

        return JWT::encode($payload,$key,'HS256');
    }
    static public function CreateTokenForResetPass($userEmail):string{
        $key=env('JWT_KEY');
        $payload=[
            'iss'=>'POS_Project',
            'iat'=>time(),
            'exp'=>time()+60*10,
            'email'=>$userEmail

        ];

        return JWT::encode($payload,$key,'HS256');
    }
    static function Decoder($token):string
    {
        try{
            $key=env('JWT_KEY');
            $decode=JWT::decode($token,new Key($key,'HS256'));
           
            return $decode->email;
           
        }
        catch(Exception $e){
            
                return "unauthorized";
           
        }

    }
}