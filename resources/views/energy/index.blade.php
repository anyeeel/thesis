@extends('layouts.app')

@section('content')
<div id="layout-wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')
    
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Energy Consumption</h4>

                            <div class="page-title-right">
                                <!-- Breadcrumb code -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-start">
                                <h5 class="card-title me-2">Actual vs Computed Consumption</h5>
                                <!-- <div class="ms-auto">
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
                                </div> -->
                            </div>
                            <div id="double-line-chart-container">
                                <canvas id="double-line-chart" height="300"></canvas>
                            </div>
                        </div>
                    </div>        
                <!-- Daily Energy Consumption Table -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4 card-title">Daily Energy Consumption</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle" style="text-align: center;" >
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Consumption</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($meterConsumptions as $consumption)
                                            <tr>
                                                <td>{{ $consumption->date }}</td>
                                                <td>{{ $consumption->consumption }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Computed Daily Consumption Table -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4 card-title">Computed Daily Consumption</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle" style="text-align: center;" >
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Computed Consumption</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($computedConsumptions as $computed)
                                            <tr>
                                                <td>{{ $computed->date }}</td>
                                                <td>{{ $computed->computed_consumption }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div> <!-- end page-content -->
    </div> <!-- main-content -->
</div> <!-- layout-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Retrieve data passed from the controller
        var labels = @json($labels);
        var meterData = @json($meterData);
        var computedData = @json($computedData);

        // Get the canvas element for the double line chart
        var ctxDoubleLine = document.getElementById('double-line-chart').getContext('2d');

        // Create the double line chart
        var myDoubleLineChart = new Chart(ctxDoubleLine, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Meter Consumption',
                    data: meterData,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                }, {
                    label: 'Computed Consumption',
                    data: computedData,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Consumption'
                        }
                    }
                }
            }
        });
    });
</script>

@endsection
