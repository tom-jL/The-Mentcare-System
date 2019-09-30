<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!session()->has('tabs')) {
            session(['tabs' => [["route" => "home", "name" => "Home"], ["route" => "/", "name" => "test"]]]);
        }
        return view('admin');
    }
}