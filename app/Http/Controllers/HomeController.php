<?php

namespace App\Http\Controllers;

use App\Ad;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', ['ads' => Ad::take(29)->get()]);
    }
}
