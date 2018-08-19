<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

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
        $validator = \Validator::make($request->all(), $rules);

        $pos = strpos($request->input('invested'), ",");
        $value = "";
        if( $pos != false ){
            $value = str_replace(',','.', str_replace('.','', $request->input('invested') ) );
        }
        else{
            $value = $request->input('invested');
        }


        if ($validator->fails()) {
            return \Redirect::to('projects/create')->withErrors($validator)->withInput($request->except('password'));
        } else {
            $project = new Project;
            $project->name = $request->input('name');
            $project->invested = $value;
            $project->duration_months = $request->input('duration_months');
            $project->interest = $request->input('interest');
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
        //$interest_yearly_percentage = 9;
        /*$interest_monthly_percentage = pow(1 + ($interest_yearly_percentage/100), 1/12) -1;*/
        //$investment = preg_replace('/[^A-Za-z0-9\-.,]/', '', $project['Investering'] );
        //$durationInMonths = $project['duration_months'];
        //$investment = $project['invested'];
        //$project['invested'] = $project['invested'];
        /*$interest_montly = round(
            ($interest_monthly_percentage/(1-pow((1+$interest_monthly_percentage),-$durationInMonths)))
            * str_replace(",",".",str_replace(".","",$investment)), 2);*/
        /*$project['interest_monthly'] = $interest_montly;*/
        return view('projects.show', ['project'=>$project]);
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
        $validator = \Validator::make($request->all(), $rules);

        $pos = strpos($request->input('invested'), ",");
        $value = "";
        if( $pos != false ){
            $value = str_replace(',','.', str_replace('.','', $request->input('invested') ) );
        }
        else{
            $value = $request->input('invested');
        }
        if ($validator->fails()) {
            return \Redirect::to('projects/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $project = Project::find($id);
            $project->name      = $request->input('name');
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


    /**
     * Calculates the expected date that the project will end.
     * Only translated month and year are returned.
     * @param Request $request
     * @return mixed
     */
    public function expectedEnd(Request $request){
        $month = Input::get('start_month');
        $year = (int)Input::get('start_year');
        $date = Carbon::create($year, $month);
        $newDate = $date->addMonths((int)Input::get('duration'));
        $newDateMonth = trans('months.'.$newDate->format('F'));
        $newDateYear = $newDate->format('Y');
        return json_encode(array(
                "month" => $newDateMonth,
                "year" => $newDateYear
        ));
    }
}
