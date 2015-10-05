<?php

namespace Geldvoorelkaar\Http\Controllers;


class DashboardController extends Controller
{
    /**
     * Instantiate a new DashboarController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard');
    }
}