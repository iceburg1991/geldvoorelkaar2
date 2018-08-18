@extends('master')


@section('title','Projects')

@section('content')
    <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!--<link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">-->
    <!--<link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">-->
    <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    @include('_navbar')

        <!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">



                <div class="section">
                    <!--DataTables example-->
                    <div id="table-datatables">
                        <h4 class="header">DataTables example</h4>
                        <div class="row">
                            <div class="col s12 m8 l9">
                                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Invested</th>
                                        <th>Interest yearly</th>
                                        <th>Duration in months</th>
                                        <th>Monthly</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Invested</th>
                                        <th>Interest yearly</th>
                                        <th>Duration in months</th>
                                        <th>Monthly</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    @foreach( $projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->invested }}</td>
                                        <td>{{ $project->interest }}%</td>
                                        <td>{{ $project->duration_months }}</td>
                                        <td>{{ $project->InterestMonthly() }}</td>
                                        <td>{{ $project->start_date }}</td>
                                        <td>$320,800</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>





















                <div class="section">

                    <div id="work-collections">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <ul id="projects-collection" class="collection highlight">
                                    <li class="collection-item avatar">
                                        <i class="mdi-file-folder circle light-blue"></i>
                                        <span class="collection-header">@lang('project.projects')</span>
                                        <a href="/projects/create" class="btn-floating btn-large waves-effect waves-light red right" style="top:28px;right:-15px;"><i class="mdi-content-add">add</i></a>
                                        <p>All Geldvoorelkaar projects</p>
                                    </li>
                                    @foreach( $projects as $project)
                                    <li class="collection-item" onclick="window.open('/projects/'+ '{{ $project->id }}' ,'_self');">
                                        <div class="row">
                                            <div class="col s4">
                                                <p class="collections-title">{!! $project->name !!}</p>
                                                <p class="collections-content">Start date</p>
                                            </div>
                                            <div class="col s2">
                                                <span class="task-cat red">Invested</span>
                                                <span>€ {{ $project->invested }}</span>
                                            </div>
                                            <div class="col s2">
                                                <span class="task-cat green">Interest</span>
                                                <span id="project-line-1">Amount</span>
                                            </div>
                                            <div class="col s2">
                                                {!! Form::open(array('url' => 'projects/' . $project->id, 'class' => 'pull-right')) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="section">
                    {{--@include('projects.file_upload')--}}
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

@section('js-loading')

    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    @if(Session::has('message'))
        <script>
            Materialize.toast( '{!! Session::get("message") !!}', 4000);
        </script>
    @endif
@endsection
