<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        $user = auth()->user(); 
        $addresses = $user->addresses;

        // print_r($addresses);
        return view('home', compact('user', 'addresses'));
    }
}
