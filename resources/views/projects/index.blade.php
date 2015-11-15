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

                    <div id="work-collections">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <ul id="projects-collection" class="collection highlight">
                                    <li class="collection-item avatar">
                                        <i class="mdi-file-folder circle light-blue"></i>
                                        <span class="collection-header">Projects</span>
                                        <a href="/projects/create" class="btn-floating btn-large waves-effect waves-light red right" style="top:28px;right:-15px;"><i class="mdi-content-add">add</i></a>
                                        <p>All Geldvoorelkaar projects</p>
                                    </li>
                                    @foreach( $projects as $project)
                                    <li class="collection-item" onclick="window.open('/projects/'+ '{{ $project->id }}' + '/edit');">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title">{!! $project->name !!}</p>
                                                <p class="collections-content">Start date</p>
                                            </div>
                                            <div class="col s3">
                                                <span class="task-cat red">Invested</span>
                                                <span>Amount</span>
                                            </div>
                                            <div class="col s3">
                                                <span class="task-cat green">Interest</span>
                                                <span id="project-line-1">Amount</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col s12 m8 l9">
                            <div class="collection">
                                <a href="#!" class="collection-item">Alvin</a>
                                <a href="#!" class="collection-item active">Alvin</a>
                                <a href="#!" class="collection-item">Alvin</a>
                                <a href="#!" class="collection-item">Alvin</a>
                            </div>
                        </div>
                    </div>



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