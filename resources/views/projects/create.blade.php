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
            <div id="breadcrumbs-wrapper">
                <!-- Search for small screen -->
                <div class="header-search-wrapper grey hide-on-large-only">
                    <i class="mdi-action-search active"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Geldvoorelkaar">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <ol class="breadcrumbs">
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
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',null,array('placeholder'=>'naam van het project')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('invested', 'Geïnvesteerd') !!}
                            {!! Form::text('invested',null,array('placeholder'=>"Geïnvesteerd bedrag e.g. '100,25', '10.000,50' ")) !!}
                        </div>
                        <div class="row">
                            {!! Form::label('start_month', 'Datum dat 1e rente/aflossing verwacht wordt') !!}
                            <br />
                            <span class="form-group col l1">
                                {!!  Form::select('start_month', array(
                                 '1' => trans('months.January'),
                                 '2' => trans('months.February'),
                                 '3' => trans('months.March'),
                                 '4' => trans('months.April'),
                                 '5' => trans('months.May'),
                                 '6' => trans('months.June'),
                                 '7' => trans('months.July'),
                                 '8' => trans('months.August'),
                                 '9' => trans('months.September'),
                                 '10' => trans('months.October'),
                                 '11' => trans('months.November'),
                                 '12' => trans('months.December')
                                 ),null, ['class' => 'browser-default']) !!}
                            </span>
                            <span class="form-group col l1">
                                {!!  Form::select('start_year', array(
                                 '2017' => '2017',
                                 '2018' => '2018'
                                 ),null, ['class' => 'browser-default', 'placeholder' => '2018', 'id' => 'start_year'])
                                 !!}
                            </span>
                        </div>
                        <div class="row">
                            <div class="form-group col l2">
                                {!! Form::label('duration_months', 'Looptijd in maanden') !!}
                                {!! Form::number('duration_months',null,array('class'=>'validate')) !!}
                            </div>
                        </div>
                        <div>Verwachte einddatum:
                            <span id="expected_end_month"></span><span id="expected_end_year"></span>
                        </div>
                        <div class="row">
                            <div class="form-group col l2">
                                {!! Form::label('interest', 'Rente in %') !!}
                                {!! Form::number('interest', null, array('class'=>'validate') ) !!}
                            </div>
                        </div>
                        {!! Form::submit('Opslaan', array('class' => 'btn btn-primary')) !!}
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

@section('js-loading')
    <script>
        jQuery( "#duration_months" ).change(function() {
            jQuery.ajax({
                url: '/project/expected_end',
                type: 'POST',
                data: {
                    _token: jQuery('input[name="_token"]').val(),
                    duration: jQuery(this).val(),
                    start_month: jQuery( "#start_month option:selected" ).val(),
                    start_year: jQuery( "#start_year option:selected" ).text()
                },
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    document.getElementById("expected_end_month").innerHTML = data.month ;
                    document.getElementById("expected_end_year").innerHTML = ' ' + data.year;
                }

            });
        });
    </script>
@endsection