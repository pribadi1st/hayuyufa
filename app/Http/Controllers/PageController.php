<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('home');
    }

    //complement duration
    public function duration() {
        return view('duration');
    }
}
