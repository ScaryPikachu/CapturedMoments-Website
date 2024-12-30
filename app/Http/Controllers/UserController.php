<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        //echo"This is index method";
       // exit;
        return view('frontend.home');
    }
}
