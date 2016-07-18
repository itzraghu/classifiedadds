@extends('layouts.admin.adminlayouts')

@section('title', 'Dashboard')

@section('page-title')

<div class="page-title">

    <h3>Dashboard</h3>

    <div class="page-breadcrumb">

        <ol class="breadcrumb">

            <li><a href="{{URL('admin/dashboard')}}">Home</a></li>

            <li class="active">Dashboard</li>

        </ol>

    </div>

</div>

@endsection

@section('page-content')


<div id="main-wrapper">
   
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">107,200</p>
                        <span class="info-box-title">User activity this month</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-users"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">340,230</p>
                        <span class="info-box-title">Page views</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-eye"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p>$<span class="counter">653,000</span></p>
                        <span class="info-box-title">Monthly revenue goal</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-basket"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">47,500</p>
                        <span class="info-box-title">New emails recieved</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-envelope"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row -->
    <div class="row">
    	<div class="col-md-12">
            <div class="panel panel-white">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="visitors-chart">
                            <div class="panel-heading">
                                <h4 class="panel-title">Visitors</h4>
                            </div>
                            <div class="panel-body">
                                <div id="flotchart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stats-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">Browser Stats</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li>Google Chrome<div class="text-success pull-right">32%<i class="fa fa-level-up"></i></div></li>
                                    <li>Firefox<div class="text-success pull-right">25%<i class="fa fa-level-up"></i></div></li>
                                    <li>Internet Explorer<div class="text-success pull-right">16%<i class="fa fa-level-up"></i></div></li>
                                    <li>Safari<div class="text-danger pull-right">13%<i class="fa fa-level-down"></i></div></li>
                                    <li>Opera<div class="text-danger pull-right">7%<i class="fa fa-level-down"></i></div></li>
                                    <li>Mobile &amp; tablet<div class="text-success pull-right">4%<i class="fa fa-level-up"></i></div></li>
                                    <li>Others<div class="text-success pull-right">3%<i class="fa fa-level-up"></i></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- Main Wrapper -->



@endsection