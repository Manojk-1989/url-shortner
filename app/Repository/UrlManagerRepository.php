<?php

namespace App\Repository;

use App\Repository\UrlManagerInterface;
use DB;
use App\Http\Traits\CommonTrait;
use App\Models\Url;


class UrlManagerRepository implements UrlManagerInterface
{   
    use CommonTrait;

    public function generateShortUrl($url)
    {
        try {
            //code...
            $protocoal = explode('://', $url);
            DB::beginTransaction();

            $shortUrlCrtd = new Url;
            $shortUrlCrtd->url = $url;
            $shortUrlCrtd->token = $protocoal[0].'://'.$this->tokenGenerator();
            $shortUrlCrtd->save();

            if ($shortUrlCrtd->exists) {
                # code...
                DB::commit();
                return true;
            } else {
                # code...
                DB::rollback();
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }

    public function getAllUrls()
        {
            try {
                //code...
                return Url::get();
            } catch (\Throwable $th) {
                //throw $th;
                return false;
            }
        }

    
    
}