<?php

namespace App\Repository;

interface UrlManagerInterface 
{
    public function generateShortUrl($url);
    public function getAllUrls();
}