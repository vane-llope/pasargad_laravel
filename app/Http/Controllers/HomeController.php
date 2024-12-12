<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('Home.home');
    }

    public function contact()
    {
        return view('Home.contact');
    }

    public function about()
    {
        return view('Home.about');
    }
}
