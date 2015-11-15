@extends('master')


@section('title','Projects')

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
                                <li class="active">Projects</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->


            <!--start container-->
            <div class="container">
                <div class="section">

                    <h1>Edit {{ $project->name }}</h1>

                    {{ Html::ul($errors->all()) }}

                    {!! Form::model($project, array('route' => array('projects.update', $project->id), 'method' => 'PUT')) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                    </div>

                    {!! Form::submit('Edit the Project!', array('class' => 'btn btn-primary')) !!}

                    {!! Form::close() !!}

                </div>
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->

    </div>
    <!-- END WRAPPER -->

</div>
<!-- END MAIN -->

@endsection