@extends('layouts.app')

@section('content')
    @include('layouts.header')
    @include('layouts.sidebar')
    <div id="layout-wrapper">
        <div class="main-content">
            
                
                    <!-- Features start -->
                    <section class="section" id="features">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mb-5">
                                        <div class="small-title">Features</div>
                                        <h4 style=" color: #6e0606;">Key Features of the System</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row align-items-center pt-4" style="padding-left: 2rem; padding-right: 2rem;">
                                <div class="col-md-6 col-sm-8">
                                    <div>
                                        <img src="assets/images/crypto/features-img/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                                <div class="col-md-5 ms-auto">
                                    <div class="mt-4 mt-md-auto">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="fw-semibold display-4 me-3" style = "color: #FFA500;">01</div>
                                            <h4 class="mb-0">Data Aggregation and Repository</h4>
                                        </div>
                                        <p class="text-muted">The system gathers data from all devices in each building, including energy consumption details. It aggregates data from sensors, meters, or smart devices and stores it in centralized repositories or databases.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row align-items-center mt-5 pt-md-5" style="padding-left: 2rem; padding-right: 2rem;">
                                <div class="col-md-5">
                                    <div class="mt-4 mt-md-0">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class=" fw-semibold display-4 me-3" style = "color: #FFA500;">02</div>
                                            <h4 class="mb-0">Data Visualization</h4>
                                        </div>
                                        <p class="text-muted">Using the aggregated data, the system generates visualizations like charts or graphs. These visuals reveal energy consumption patterns, trends, and areas for potential optimization or efficiency improvements within the buildings.</p>                                       
                                    </div>
                                </div>
                                <div class="col-md-6  col-sm-8 ms-md-auto">
                                    <div class="mt-4 me-md-0">
                                        <img src="assets/images/crypto/features-img/img-2.png" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end container -->
                    </section>
                    <!-- Features end -->
                    
                  
                
            
        </div> <!-- end main content-->
    </div> <!-- end layout-wrapper -->
@endsection