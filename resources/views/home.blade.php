@extends('layouts.app')



<!-- Main CSS-->
<link href="css/theme.css" rel="stylesheet" media="all">
@section('content')
<div class="main-content">

<h2>Bienvenu {{ Auth::user()->name }}</h2>

        <div class="section__content section__content--p30">
            <div class="container-fluid">
        <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h2>10368</h2>
                                <span>members online</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                            <div class="text">
                                <h2>388,688</h2>
                                <span>items solid</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
        </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                            <div class="text">
                                <h2>1,086</h2>
                                <span>this week</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-money"></i>
                            </div>
                            <div class="text">
                                <h2>$1,060,386</h2>
                                <span>total earnings</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
</div>
        @stop 

@section('javascript')         
<!-- Jquery JS-->
<script src="{{ url('coolAdmin') }}/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="{{ url('coolAdmin/bootstrap-4.1') }}/popper.min.js"></script>
<script src="{{ url('coolAdmin/bootstrap-4.1') }}/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="{{ url('coolAdmin/slick') }}/slick.min.js">
</script>
<script src="{{ url('coolAdmin/wow') }}/wow.min.js"></script>
<script src="{{ url('coolAdmin/animsition') }}/animsition.min.js"></script>
<script src="{{ url('coolAdmin/bootstrap-progressbar') }}/bootstrap-progressbar.min.js">
</script>
<script src="{{ url('coolAdmin/counter-up') }}/jquery.waypoints.min.js"></script>
<script src="{{ url('coolAdmin/counter-up') }}/jquery.counterup.min.js">
</script>
<script src="{{ url('coolAdmin/circle-progress') }}/circle-progress.min.js"></script>
<script src="{{ url('coolAdmin/perfect-scrollbar') }}/perfect-scrollbar.js"></script>
<script src="{{ url('coolAdmin/chartjs') }}/Chart.bundle.min.js"></script>
<script src="{{ url('coolAdmin/select2') }}/select2.min.js">
</script>

<!-- Main JS-->
<script src="js/charts.js"></script>

@stop      
<!-- end document-->
