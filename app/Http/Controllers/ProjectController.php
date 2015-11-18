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

        $pos = strpos(\Input::get('invested'), ",");
        $value = "";
        if( $pos != false ){
            $value = str_replace(',','.', str_replace('.','', \Input::get('invested') ) );
        }
        else{
            $value = \Input::get('invested');
        }


        if ($validator->fails()) {
            return \Redirect::to('projects/create')->withErrors($validator)->withInput(\Input::except('password'));
        } else {
            $project = new Project;
            $project->name = \Input::get('name');
            $project->invested = $value;
            $project->save();

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
        $project = Project::find($id);

        return \View::make('projects.show')
            ->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        // show the edit form and pass the nerd
        return \View::make('projects.edit')
            ->with('project', $project);
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
        $rules = array(
            'name'      => 'required',
            'invested'  => 'regex:/^\$?([0-9]{1,3}.([0-9]{3},)*[0-9]+)(,[0-9][0-9])?$/'  // /^\$?([0-9]{1,3},([0-9]{3},)*[0-9]{3}|[0-9]+)(.[0-9][0-9])?$/',    // /^[0-9]+(\\.[0-9]+)?$/'
        );
        $validator = \Validator::make(\Input::all(), $rules);

        $pos = strpos(\Input::get('invested'), ",");
        $value = "";
        if( $pos != false ){
            $value = str_replace(',','.', str_replace('.','', \Input::get('invested') ) );
        }
        else{
            $value = \Input::get('invested');
        }
        if ($validator->fails()) {
            return \Redirect::to('projects/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        } else {
            $project = Project::find($id);
            $project->name      = \Input::get('name');
            $project->invested  = $value;
            $project->save();

            \Session::flash('message', 'Successfully updated project!');
            return \Redirect::to('projects');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        // redirect
        \Session::flash('message', 'Successfully deleted the project!');
        return \Redirect::to('projects');
    }
}
