<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function about()
    {
        return view('front.about');
    }

    public function experience()
    {
        return view('front.experience');
    }

    public function my_cv()
    {
        return view('front.my_cv');
    }

    public function portfolio()
    {
        return view('front.portfolio');
    }

    public function blog()
    {
        return view('front.blog');
    }

    public function contact()
    {
        return view('front.contact');
    }
}
