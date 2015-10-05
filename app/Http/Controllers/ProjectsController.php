<?php

namespace Geldvoorelkaar\Http\Controllers;


class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('projects');
    }
}