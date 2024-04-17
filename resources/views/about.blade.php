@extends('layouts.app')

@section('content')
    @include('layouts.header')
    @include('layouts.sidebar')
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">About Our Energy Consumption Management System</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="lead">Our energy consumption management system is designed to efficiently collect data from devices installed in each building that generate electricity. By gathering real-time information on energy consumption, our system enables building administrators to monitor and optimize energy usage, ultimately leading to cost savings and environmental sustainability.</p>
                                    <p class="mb-4">Key features of our system include:</p>
                                    <ul class="mb-4">
                                        <li>Real-time monitoring of energy consumption</li>
                                        <li>Data aggregation from various devices</li>
                                        <li>Analytics and reporting tools for insights</li>
                                        <li>Integration with building management systems</li>
                                        <li>Customizable alerts and notifications</li>
                                    </ul>
                                    <p class="mb-0">With our energy consumption management system, building owners and facility managers can make informed decisions to reduce waste, improve efficiency, and contribute to a greener future.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div> <!-- end page-content -->
        </div> <!-- end main content-->
    </div> <!-- end layout-wrapper -->
@endsection
