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
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h5 class="card-title me-2">Line Chart</h5>
                                            <div class="ms-auto">
                                                <div class="toolbar d-flex flex-wrap gap-2 text-end">
                                                    <button type="button" class="btn btn-light btn-sm">
                                                        ALL
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-sm">
                                                        1M
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-sm">
                                                        6M
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-sm active">
                                                        1Y
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="apex-charts" data-colors='["--bs-primary", "--bs-warning"]' id="area-chart" dir="ltr"></div>
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex flex-wrap">
                    <h4 class="card-title mb-4">Bar Chart</h4>
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

                <!-- Move the chart here -->
                <div class="row">
                
                    <canvas id="energyChart" max-width="400" height="360"></canvas>
                </div><!-- end row -->
            </div>
        </div>
    </div>

    <div class="col-lg-6">
    <div class="card">
            <div class="card-body">
                                        <div class="d-sm-flex flex-wrap">
                                            <h4 class="card-title mb-4">Stacked Bar Chart</h4>
                                            <div class="ms-auto">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Week</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Month</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#">Year</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div id="stacked-column-chart" class="apex-charts" data-colors='["--bs-primary", "--bs-warning", "--bs-success"]' dir="ltr"></div>
                                    </div>
                             
                            </div>
</div>
</div>

<div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Pie Chart</h4>
        
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-0">2536</h5>
                                                <p class="text-muted text-truncate">Activated</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">69421</h5>
                                                <p class="text-muted text-truncate">Pending</p>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">89854</h5>
                                                <p class="text-muted text-truncate">Deactivated</p>
                                            </div>
                                        </div>
        
                                        <canvas id="pie" data-colors='["--bs-success", "#ebeff2"]' class="chartjs-chart"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
</div>




                            </div>
                            
                            <!-- end col -->

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