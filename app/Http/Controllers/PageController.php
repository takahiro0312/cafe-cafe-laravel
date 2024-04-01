<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function header()
    {
        return view('header');
    }

    public function footer()
    {
        return view('footer');
    }

    public function edit()
    {
        return view('edit');
    }

    public function delete()
    {
        return view('delete');
    }

    public function contact()
    {
        return view('contact');
    }

    public function confirm()
    {
        return view('confirm');
    }

    public function complete()
    {
        return view('complete');
    }
}