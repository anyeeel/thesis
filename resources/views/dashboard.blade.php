@extends('layouts.app')

@section('content')
    <!-- Begin page -->
    <div id="layout-wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                       <div class="row">
                        <h4>Bar Chart</h4>
                        <canvas id="energyChart" width="800" height="200"></canvas>
                        </div><!--end row-->
                        </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Job View</p>
                                                <h4 class="mb-0">14,487</h4>
                                            </div>
                                
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="eathereum_sparkline_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-success me-1"><i class="bx bx-trending-up align-bottom me-1"></i> 18.89%</span> Increase last month</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">New Application</p>
                                                <h4 class="mb-0">7,402</h4>
                                            </div>
                            
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="new_application_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-success me-1"><i class="bx bx-trending-up align-bottom me-1"></i> 24.07%</span> Increase last month</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Approved</p>
                                                <h4 class="mb-0">12,487</h4>
                                            </div>
                            
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="total_approved_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-success me-1"><i class="bx bx-trending-up align-bottom me-1"></i> 8.41%</span> Increase last month</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Rejected</p>
                                                <h4 class="mb-0">12,487</h4>
                                            </div>
                            
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-danger", "--bs-transparent"]' dir="ltr" id="total_rejected_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-danger me-1"><i class="bx bx-trending-down align-bottom me-1"></i> 20.63%</span> Decrease last month</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex flex-wrap">
                                            <h4 class="card-title mb-4">Statistics Applications</h4>
                                            <div class="ms-auto">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="javascript:void(0);">Week</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="javascript:void(0);">Month</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="javascript:void(0);">Year</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-info"]' dir="ltr" id="chart"></div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h4 class="card-title mb-3">Invite your friends to Skote</h4>
                                                <p class="text-muted">Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.</p>
                                                <div>
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm"><i class='bx bx-user-plus align-middle'></i> Invite Friends</a>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="assets/images/jobs.png" alt="" height="130">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Popular Candidate</h4>
                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="3000">
                                                    <div class="bg-light p-3 d-flex mb-3 rounded">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-sm rounded me-3">
                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-2"><a href="candidate-overview.html" class="text-body">Stephen Hadley</a> <span class="badge badge-soft-info">Freelance</span></h5>
                                                            <p class="mb-0 text-muted"><i class="bx bx-map text-body align-middle"></i> Germany</p>
                                                        </div>
                                                        <div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-primary" type="button" id="dropdownMenuButton11" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton11">
                                                                    <li><a class="dropdown-item" href="candidate-overview.html">View Details</a></li>
                                                                    <li><a class="dropdown-item" href="#">Download CV</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-light p-3 d-flex">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded me-3">
                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-2"><a href="candidate-overview.html" class="text-body">Charles Brown</a> <span class="badge badge-soft-success">Full Time</span></h5>
                                                            <p class="mb-0 text-muted"><i class="bx bx-map text-body align-middle"></i> Cambodia</p>
                                                        </div>
                                                        <div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-primary" type="button" id="dropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton12">
                                                                    <li><a class="dropdown-item" href="candidate-overview.html">View Details</a></li>
                                                                    <li><a class="dropdown-item" href="#">Download CV</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="3000">
                                                    <div class="bg-light p-3 d-flex mb-3 rounded">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-sm rounded me-3">
                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-2"><a href="candidate-overview.html" class="text-body">Adam Miller</a> <span class="badge badge-soft-warning">Internship</span></h5>
                                                            <p class="mb-0 text-muted"><i class="bx bx-map text-body align-middle"></i> Australia</p>
                                                        </div>
                                                        <div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-primary" type="button" id="dropdownMenuButton13" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton13">
                                                                    <li><a class="dropdown-item" href="candidate-overview.html">View Details</a></li>
                                                                    <li><a class="dropdown-item" href="#">Download CV</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-light p-3 d-flex">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded me-3">
                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-2"><a href="candidate-overview.html" class="text-body">Keith Gonzales</a> <span class="badge badge-soft-info">Freelance</span></h5>
                                                            <p class="mb-0 text-muted"><i class="bx bx-map text-body align-middle"></i> Belgium</p>
                                                        </div>
                                                        <div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-primary" type="button" id="dropdownMenuButton14" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton14">
                                                                    <li><a class="dropdown-item" href="candidate-overview.html">View Details</a></li>
                                                                    <li><a class="dropdown-item" href="#">Download CV</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="3000">
                                                    <div class="bg-light p-3 d-flex mb-3 rounded">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-sm rounded me-3">
                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-2"><a href="candidate-overview.html" class="text-body">Bonnie Harney</a> <span class="badge badge-soft-success">Full Timer</span></h5>
                                                            <p class="mb-0 text-muted"><i class="bx bx-map text-body align-middle"></i> Syria</p>
                                                        </div>
                                                        <div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-primary" type="button" id="dropdownMenuButton15" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton15">
                                                                    <li><a class="dropdown-item" href="candidate-overview.html">View Details</a></li>
                                                                    <li><a class="dropdown-item" href="#">Download CV</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-light p-3 d-flex">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded me-3">
                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-2"><a href="candidate-overview.html" class="text-body">Dolores Minter</a> <span class="badge badge-soft-danger">Part Time</span></h5>
                                                            <p class="mb-0 text-muted"><i class="bx bx-map text-body align-middle"></i> San Marino</p>
                                                        </div>
                                                        <div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-primary" type="button" id="dropdownMenuButton16" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton16">
                                                                    <li><a class="dropdown-item" href="candidate-overview.html">View Details</a></li>
                                                                    <li><a class="dropdown-item" href="#">Download CV</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->



                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
     <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('energyChart').getContext('2d');
        var buildingEnergyData = @json($buildingEnergyData);

        var chartData = {
            labels: Object.keys(buildingEnergyData),
            datasets: [{
                label: 'Total Energy Consumption',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: Object.values(buildingEnergyData)
            }]
        };

        var energyChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection