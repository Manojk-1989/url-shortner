<?php

namespace App\Http\Traits;

trait CommonTrait{

    public function tokenGenerator()
    {
        try {
            //code...
            $token =  time().substr(md5(mt_rand()), 0,3);
            return $token;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
      

    


    
}