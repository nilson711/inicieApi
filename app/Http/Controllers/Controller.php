<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // token para autorização da API.
    public function __construct()
    {
        $this->tokenAPI = '77c9b41d7af042f4b7dfab370a4607b882c0d945125530305853445cbaf94758';
    }
}
