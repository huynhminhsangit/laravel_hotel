<?php

namespace App\Http\Controllers\News;
use Illuminate\Http\Request;;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    private $pathViewController = 'hotel.pages.errors.';

    public function notfound()
    {
        return view($this->pathViewController.'404');
    }

}
