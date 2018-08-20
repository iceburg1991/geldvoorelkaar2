@extends('master')


@section('title', $project->name )

@section('content')

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
                    <a href="/projects/{!! $project->id !!}/edit" class="btn-floating btn-large waves-effect waves-light red right" style=""><i class="mdi-editor-mode-edit">edit</i></a>
                    <div class="jumbotron text-center">
                        <p>
                            @foreach($project->getAttributes() as $key => $value)
                                <strong>{{ $key }}:</strong> {{ $value }}<br />
                            @endforeach
                        </p>
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