<?php $profit = -100; ?>

@extends('master')


@section('title','Dashboard')

@section('content')

<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->


@include("_navbar")

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START CONTENT -->
        <section id="content">

            <!--start container-->
            <div class="container">
                <div class="section">

                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                            @if ( $profit < 0 )
                                <div class="card red">
                                    <div class="card-content white-text">
                                        <p class="card-stats-title">Profit</p>
                                        <h4 class="card-stats-number">€ {{ $profit }}</h4>
                                    </div>
                                    <div class="card-action  red darken-2">
                                        <a href="/projects">Projects</a>
                                    </div>
                                </div>
                            @else ( $profit > 0 )
                                <div class="card green">
                                    <div class="card-content white-text">
                                        <p class="card-stats-title">Profit</p>
                                        <h4 class="card-stats-number">€ {{ $profit }}</h4>
                                    </div>
                                    <div class="card-action green darken-2">
                                        <a href="/projects">Projects</a>
                                    </div>
                                </div>
                            @endif
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card purple">
                                    <div class="card-content white-text">
                                        <p class="card-stats-title">Invested</p>
                                        <h4 class="card-stats-number">€423</h4>
                                    </div>
                                    <div class="card-action  purple darken-2">
                                        <a href="/projects">Projects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card purple">
                                    <div class="card-content white-text">
                                        <p class="card-stats-title">To recieve</p>
                                        <h4 class="card-stats-number">€423</h4>
                                    </div>
                                    <div class="card-action  purple darken-2">
                                        <a href="/projects">Projects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card purple">
                                    <div class="card-content white-text">
                                        <p class="card-stats-title">Interest</p>
                                        <h4 class="card-stats-number">5%</h4>
                                    </div>
                                    <div class="card-action  purple darken-2">
                                        <a href="/projects">Projects</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                        <!--Morris Donut Chart-->
                        <!--<div id="morris-donut-chart" class="section">-->
                            <div class="row">
                                <div class="col s12 m6 l3">
                                    <div class="card">
                                        <div class="card-content center-align">
                                            <span class="card-title black-text">Projects</span>
                                            <div class="sample-chart-wrapper">
                                                <div id="morris-donut" class="graph" style="height:150px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--</div>-->
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
    <script>
        jQuery( document ).ready(function(){
            jQuery(".button-collapse").sideNav();

            //Morris Chart JS
            new Morris.Donut({
                // ID of the element in which to draw the chart.
                element: 'morris-donut',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    {label: "Bakkery broodje", value: 12},
                    {label: "Zonnestudio", value: 30},
                    {label: "Sharkenergy", value: 20}
                ],
                resize: true,
                formatter: function(y, data){ return (y + '%');}
            });
        })
    </script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- morris -->
    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/plugins/morris-chart/morris.min.js"></script>
    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>



@endsection