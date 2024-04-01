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
                            <div class="chart-container">
                                <canvas id="stacked-bar-chart"  max-width="50" height="75"></canvas>
                            </div>

                        </div>
                    </div>

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

                                <canvas id="energyChart" max-width="50" height="75"></canvas>
                            </div><!-- end row -->
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
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Extracting data passed from controller
    const buildingEnergyData = @json($buildingEnergyData);

    // Creating labels and datasets for Chart.js
    const labels = Object.keys(buildingEnergyData);
    const allFloors = new Set();

    // Extract all unique floors from all buildings
    labels.forEach(building => {
        Object.keys(buildingEnergyData[building]).forEach(floor => {
            allFloors.add(floor);
        });
    });

    const datasets = [];

    allFloors.forEach(floor => {
        const data = labels.map((building) => buildingEnergyData[building][floor] || 0);
        datasets.push({
            label: floor, 
            backgroundColor: `rgba(${Math.random() * 255},${Math.random() * 255},${Math.random() * 255},0.5)`,
            data: data
        });
    });

    // Configuration for the chart
    const config = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            }
        }
    };

    // Create the chart
    const stackedBarChart = new Chart(
        document.getElementById('stacked-bar-chart'),
        config
    );
</script>
@endsection