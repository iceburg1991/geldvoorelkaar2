@extends('master')


@section('title','dashboard')

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
                    <p class="caption">Dashboard</p>
                    <div class="divider"></div>


                    <div class="row">
                        <div class="col s12 m6 l3">
                            <div class="card">
                                <div class="card-content  green white-text">
                                    <p class="card-stats-title"><i class="mdi-social-group-add"></i> New Clients</p>
                                    <h4 class="card-stats-number">566</h4>
                                    <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="green-text text-lighten-5">from yesterday</span>
                                    </p>
                                </div>
                                <div class="card-action  green darken-2">
                                    <div id="clients-bar"></div>
                                </div>
                            </div>
                        </div>



                        <!--Morris Donut Chart-->
                        <!--<div id="morris-donut-chart" class="section">
                            <div class="row">-->
                                <div class="col s12 m8 l9">
                                    <div class="sample-chart-wrapper">
                                        <div id="morris-donut" class="graph"></div>
                                    </div>
                                </div>
                            <!--</div>
                        </div>-->
                    </div>

                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
                formatter: function(y, data){ return (y + '%');}
            });

            jQuery("#clients-bar").sparkline([70, 80, 65, 78, 58, 80, 78, 80, 70, 50, 75, 65, 80, 70, 65, 90, 65, 80, 70, 65, 90], {
                type: 'bar',
                height: '25',
                width: '100%',
                barWidth: 10,
                barSpacing: 4,
                barColor: '#C7FCC9',
                negBarColor: '#81d4fa',
                zeroColor: '#81d4fa',
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