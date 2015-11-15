@extends('master')

@section('title','Project toevoegen')

@section('content')

@include('_navbar')

        <!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START CONTENT -->
        <section id="content">

            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <!--<h5 class="breadcrumbs-title">Projects</h5>-->
                            <ol class="breadcrumb">
                                <li><a href="/home">Dashboard</a></li>
                                <li><a href="/projects">Projects</a></li>
                                <li class="active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->

            <!--start container-->
            <div class="container">
                <div class="section">
                    @if(count($errors->all()) > 0)
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="card red lighten-1">
                                    <div class="card-content white-text">
                                        <span class="card-title"><i class="mdi-action-report-problem"></i> O jeetje, er ging iets niet goed</span>
                                        {!! Html::ul($errors->all(),array('style'=>'padding:0px;margin:0px;')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {!! Form::open(array('url' => array('projects'))) !!}
                        {!! Form::text('name','naam van het project') !!}
                        {!! Form::submit('Click Me!', array('class' => 'btn btn-primary')) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </section>
        <!-- END CONTENT -->

    </div>
    <!-- END WRAPPER -->

</div>
<!-- END MAIN -->

@endsection