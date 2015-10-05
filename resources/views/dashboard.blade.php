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
                                <div class="card purple lighten-2">
                                    <div class="card-content white-text">
                                        <p class="card-stats-title">Invested</p>
                                        <h4 class="card-stats-number">€423</h4>
                                    </div>
                                    <div class="card-action purple">
                                        <a href="/projects">Projects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card purple lighten-2">
                                    <div class="card-content white-text">
                                        <p class="card-stats-title">To recieve</p>
                                        <h4 class="card-stats-number">€423</h4>
                                    </div>
                                    <div class="card-action  purple">
                                        <a href="/projects">Projects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card purple lighten-2">
                                    <div class="card-content white-text">
                                        <p class="card-stats-title">Interest</p>
                                        <h4 class="card-stats-number">5%</h4>
                                    </div>
                                    <div class="card-action purple">
                                        <a href="/projects">Projects</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div id="chart-dashboard" class="section">
                        <div class="row">
                            <div class="col s12 m8 l8">
                                <div class="card">
                                    <div class="card-move-up waves-effect waves-block waves-light">
                                        <div class="move-up cyan darken-1">
                                            <div>
                                                <span class="chart-title white-text">Revenue</span>
                                                <!--<div class="chart-revenue cyan darken-2 white-text">
                                                    <p class="chart-revenue-total">$4,500.85</p>
                                                    <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
                                                </div>-->
                                                <div class="switch chart-revenue-switch right" style="padding-top: 10px;">
                                                    <label class="cyan-text text-lighten-5">
                                                        <span>
                                                            <input name="quarter" type="radio" id="test1" value="1"/>
                                                            <label for="test1" class="white-text">Q1</label>
                                                        </span>
                                                        <span>
                                                            <input name="quarter" type="radio" id="test2" value="2"/>
                                                            <label for="test2" class="white-text">Q2</label>
                                                        </span>
                                                        <span>
                                                            <input name="quarter" type="radio" id="test3" value="3"/>
                                                            <label for="test3" class="white-text">Q3</label>
                                                        </span>
                                                        <span>
                                                            <input name="quarter" type="radio" id="test4" value="4"/>
                                                            <label for="test4" class="white-text">Q4</label>
                                                        </span>
                                                        <!--<input type="checkbox">
                                                        <span class="lever"></span> Year-->
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="trending-line-chart-wrapper">
                                                <canvas id="trending-line-chart" height="70"></canvas>
                                            </div>
                                        </div>
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


            //==================================
            // Reloading Line Chart
            //==================================
            var data = {
                labels : ["JAN","FEB","MAR"],
                datasets : [
                    {
                        label: "First dataset",
                        fillColor : "rgba(128, 222, 234, 0.6)",
                        strokeColor : "#ffffff",
                        pointColor : "#00bcd4",
                        pointStrokeColor : "#ffffff",
                        pointHighlightFill : "#ffffff",
                        pointHighlightStroke : "#ffffff",
                        data: [100, 435, 235]
                    }
                ]
            };

            var trendingLineChart = document.getElementById("trending-line-chart").getContext("2d");
            window.trendingLineChart = new Chart(trendingLineChart).Line(data, {
                scaleShowGridLines: true,///Boolean - Whether grid lines are shown across the chart
                scaleGridLineColor: "rgba(255,255,255,0.4)",//String - Colour of the grid lines
                scaleGridLineWidth: 1,//Number - Width of the grid lines
                scaleShowHorizontalLines: true,//Boolean - Whether to show horizontal lines (except X axis)
                scaleShowVerticalLines: false,//Boolean - Whether to show vertical lines (except Y axis)
                bezierCurve: false,//Boolean - Whether the line is curved between points
                bezierCurveTension: 0.4,//Number - Tension of the bezier curve between points
                pointDot: true,//Boolean - Whether to show a dot for each point
                pointDotRadius: 5,//Number - Radius of each point dot in pixels
                pointDotStrokeWidth: 2,//Number - Pixel width of point dot stroke
                pointHitDetectionRadius: 20,//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                datasetStroke: true,//Boolean - Whether to show a stroke for datasets
                datasetStrokeWidth: 3,//Number - Pixel width of dataset stroke
                datasetFill: true,//Boolean - Whether to fill the dataset with a colour
                animationSteps: 15,// Number - Number of animation steps
                animationEasing: "easeOutQuart",// String - Animation easing effect
                tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
                scaleFontSize: 12,// Number - Scale label font size in pixels
                scaleFontStyle: "normal",// String - Scale label font weight style
                scaleFontColor: "#fff",// String - Scale label font colour
                tooltipEvents: ["mousemove", "touchstart", "touchmove"],// Array - Array of string names to attach tooltip events
                tooltipFillColor: "rgba(255,255,255,0.8)",// String - Tooltip background colour
                tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
                tooltipFontSize: 12,// Number - Tooltip label font size in pixels
                tooltipFontColor: "#000",// String - Tooltip label font colour
                tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
                tooltipTitleFontSize: 14,// Number - Tooltip title font size in pixels
                tooltipTitleFontStyle: "bold",// String - Tooltip title font weight style
                tooltipTitleFontColor: "#000",// String - Tooltip title font colour
                tooltipYPadding: 8,// Number - pixel width of padding around tooltip text
                tooltipXPadding: 16,// Number - pixel width of padding around tooltip text
                tooltipCaretSize: 10,// Number - Size of the caret on the tooltip
                tooltipCornerRadius: 6,// Number - Pixel radius of the tooltip border
                tooltipXOffset: 10,// Number - Pixel offset from point x to tooltip edge
                responsive: true
            });

            function showQuarter( quarter ){
                if( quarter == 1 ){
                    window.trendingLineChart.addData([75], "JAN");
                    window.trendingLineChart.addData([335], "FEB");
                    window.trendingLineChart.addData([125], "MAR");
                    window.trendingLineChart.removeData();
                    window.trendingLineChart.removeData();
                    window.trendingLineChart.removeData();
                }else if( quarter == 2 ){
                    window.trendingLineChart.addData([500], "APR");
                    window.trendingLineChart.addData([100], "MAY");
                    window.trendingLineChart.addData([250], "JUNE");
                    window.trendingLineChart.removeData();
                    window.trendingLineChart.removeData();
                    window.trendingLineChart.removeData();
                }else if( quarter == 3 ){
                    window.trendingLineChart.addData([50], "JULY");
                    window.trendingLineChart.addData([135], "AUG");
                    window.trendingLineChart.addData([445], "SEP");
                    window.trendingLineChart.removeData();
                    window.trendingLineChart.removeData();
                    window.trendingLineChart.removeData();
                } else if( quarter == 4 ){
                    window.trendingLineChart.addData([645], "OCT");
                    window.trendingLineChart.addData([135], "NOV");
                    window.trendingLineChart.addData([245], "DEC");
                    window.trendingLineChart.removeData();
                    window.trendingLineChart.removeData();
                    window.trendingLineChart.removeData();
                }
            }
            jQuery('input[name=quarter]').on('change', function(){
                quarter = jQuery(this).val();
                showQuarter( quarter );
            });

            // ====================================
            // End line chart
            // ====================================
        });
    </script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- morris -->
    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/plugins/morris-chart/morris.min.js"></script>
    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- chartjs -->
    <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>


@endsection