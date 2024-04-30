<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    

    public function getQuote()
    {
        return view('front.getQuote');
    }

    public function instantQuote()
    {
        return view('front.instantQuote');
    }
}
