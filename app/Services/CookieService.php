<?php


namespace App\Services;

use Illuminate\Http\Response;

class CookieService
{
    public function setWebData(string $name, string $value): Response
    {
        $minutes = 12 * 60;
        $cookie = cookie($name, $value, $minutes);
        return response('Cookie set')->cookie($cookie);
    }
}