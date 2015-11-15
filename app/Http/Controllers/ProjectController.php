<?php

namespace Geldvoorelkaar\Http\Controllers;

use Geldvoorelkaar\Project;
use Illuminate\Http\Request;

use Geldvoorelkaar\Http\Requests;
use Geldvoorelkaar\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->middleware('auth');
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('projects/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        } else {
            // store
            $project = new Project;
            $project->name = \Input::get('name');
            $project->save();

            // redirect
            \Session::flash('message', 'Successfully created project!');
            return \Redirect::to('projects');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
