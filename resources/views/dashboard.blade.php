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

                <!-- Total consumption card-->
                <div class="row">
                            <div class="col-lg-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium text-center">Overall Energy Consumption</p>
                                                <h4 class="mb-0 text-center">{{ number_format($overallTotalEnergy, 2) }} kWh</h4>
                                            </div>
                                
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="eathereum_sparkline_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-success me-1"></p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium text-center">Overall No. of Devices</p>
                                                <h4 class="mb-0 text-center">{{ number_format($totalDevices) }}</h4>
                                            </div>
                            
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="new_application_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-success me-1"></p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium text-center">Overall No. of Buildings</p>
                                                <h4 class="mb-0 text-center">{{ $totalBuildings}}</h4>
                                            </div>
                            
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="total_approved_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-success me-1"></span></p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                                <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-start">
                                <h5 class="card-title me-2">Comparison of Total Energy Consumption: Meter vs Device Consumption</h5>
                                <div class="ms-auto">
                                    <div class="toolbar d-flex flex-wrap gap-2 text-end">
                                        <!-- Add this dropdown in your HTML -->
                                        <select id="filterDropdown" class="form-select">
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>                                            
                                        </select>

                                                                                
                                    </div>
                                </div>
                            </div>
                            <div id="double-line-chart-container">
                                <canvas id="double-line-chart" height="300"></canvas>
                            </div>
                            <div id="legend-container" class="mt-4"></div>

                        </div>
                    </div>          
                          

                     
                   

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4"> Total Number of Devices by Type</h4>
                                    <canvas id="polarAreaChart" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex flex-wrap">
                                        <h4 class="card-title mb-4">Estimated Total Consumption of Buildings</h4>
                                        
                                    </div>
                                <div class="chart-container">
                                    <canvas id="stacked-bar-chart" width="400" height="255"></canvas>
                                </div>                       
                            </div>

                            
        
                        </div>
                       
                    </div>

                
                   </div>                                
                </div>
            </div> <!-- container-fluid -->
    </div>
</div> <!-- END layout-wrapper -->


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
            document.addEventListener("DOMContentLoaded", function () {
                
          

            // Define predefined colors for device types
            var predefinedColors = [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 0, 0, 0.6)',     // Red
                'rgba(0, 255, 0, 0.6)',     // Green
                'rgba(0, 0, 255, 0.6)',     // Blue
                'rgba(255, 255, 0, 0.6)',   // Yellow
                'rgba(255, 128, 0, 0.6)',   // Orange
                'rgba(128, 0, 128, 0.6)',   // Purple
                'rgba(0, 128, 128, 0.6)'    // Teal
            ];

            // Map device types to predefined colors
            var backgroundColors = labels.map(function(label, index) {
                // Use modulo operation to repeat colors if there are more labels than predefined colors
                return predefinedColors[index % predefinedColors.length];
            });

          

         

            document.getElementById('filterDropdown').addEventListener('change', function () {
        // Retrieve the selected value
        var filterValue = this.value;

        // Retrieve data passed from the controller
        var labels = @json($labels);
        var meterData = @json($meterData);
        var computedData = @json($computedData);

        // If weekly filter is selected, multiply daily data by 7
        if (filterValue === 'weekly') {
            labels = labels.filter(function (_, index) {
                return index % 7 === 0; // Filter labels to show only weekly data
            });

            meterData = meterData.reduce(function (acc, val, index) {
                if (index % 7 === 0) { // Sum up data for each week
                    acc.push(meterData.slice(index, index + 7).reduce((a, b) => a + b, 0));
                }
                return acc;
            }, []);

            computedData = computedData.reduce(function (acc, val, index) {
                if (index % 7 === 0) { // Sum up data for each week
                    acc.push(computedData.slice(index, index + 7).reduce((a, b) => a + b, 0));
                }
                return acc;
            }, []);
        }

        // Get the canvas element for the double line chart
        var ctxDoubleLine = document.getElementById('double-line-chart').getContext('2d');

        // Destroy previous chart instance if exists
        if (window.myDoubleLineChart) {
            window.myDoubleLineChart.destroy();
        }

        // Create the double line chart with updated data
        window.myDoubleLineChart = new Chart(ctxDoubleLine, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Metered Consumption',
                    data: meterData,
                    borderColor: 'rgba(110, 6, 6, 1)', 
                    backgroundColor: 'rgba(110, 6, 6, 0.5)', 
                }, {
                    label: 'Estimated Device Energy Usage',
                    data: computedData,
                    borderColor: 'rgba(255, 206, 86, 1)', 
                    backgroundColor: 'rgba(255, 206, 86, 0.2)', 
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
                            text: 'Total Consumption (kWh)'
                        }
                    }
                }
            }
        });
    });

    // Initial chart setup with daily data
    var labels = @json($labels);
    var meterData = @json($meterData);
    var computedData = @json($computedData);
    var ctxDoubleLine = document.getElementById('double-line-chart').getContext('2d');

    // Create the double line chart
    window.myDoubleLineChart = new Chart(ctxDoubleLine, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Metered Consumption',
                data: meterData,
                borderColor: 'rgba(110, 6, 6, 1)', 
                backgroundColor: 'rgba(110, 6, 6, 0.5)', 
            }, {
                label: 'Estimated Device Energy Usage',
                data: computedData,
                borderColor: 'rgba(255, 206, 86, 1)', 
                backgroundColor: 'rgba(255, 206, 86, 0.2)', 
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
                        text: 'Total Consumption (kWh)'
                    }
                }
            }
        }
    });
});
   
        const buildingEnergyData = @json($buildingEnergyData);

        // Creating labels and datasets for Chart.js
        const labels = Object.keys(buildingEnergyData);
        const datasets = [];
        const predefinedColors = [
            'rgba(255, 255, 0, 0.6)',   // Yellow
            'rgba(128, 0, 128, 0.6)',   // Purple
            'rgba(0, 255, 0, 0.6)',     // Green
            'rgba(0, 0, 255, 0.6)',     // Blue
            'rgba(255, 0, 0, 0.6)',     // Red
            'rgba(255, 128, 0, 0.6)',   // Orange
            'rgba(0, 128, 128, 0.6)'    // Teal
        ];

        Object.keys(buildingEnergyData[labels[0]]).forEach((floor, index) => {
        const data = labels.map((building) => buildingEnergyData[building][floor]);
        const colorIndex = index % predefinedColors.length; // To cycle through predefined colors
        datasets.push({
            label: floor,
            backgroundColor: predefinedColors[colorIndex],
            data: data
        });
        
        });
        
        // Retrieve data passed from the controller
        var polarLabels = @json($polarLabels);
        var polarData = @json($polarData);

        // Get the canvas element for the polar area chart
        var ctxPolar = document.getElementById('polarAreaChart').getContext('2d');

        // Create the polar area chart
        var myPolarChart = new Chart(ctxPolar, {
            type: 'polarArea',
            data: {
                labels: polarLabels,
                datasets: [{
                    data: polarData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 0, 0, 0.6)',     // Red
                        'rgba(0, 255, 0, 0.6)',     // Green
                        'rgba(0, 0, 255, 0.6)',     // Blue
                        'rgba(255, 255, 0, 0.6)',   // Yellow
                        'rgba(255, 128, 0, 0.6)',   // Orange
                        'rgba(128, 0, 128, 0.6)',   // Purple
                        'rgba(0, 128, 128, 0.6)'    // Teal
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
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

        function updateDateTime() {
        var currentDate = new Date();

        // Date options
        var dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var dateString = currentDate.toLocaleDateString('en-US', dateOptions);

        // Time options
        var timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
        var timeString = currentDate.toLocaleTimeString('en-US', timeOptions);

        // Update date and time separately
        document.getElementById("currentDate").innerText = dateString;
        document.getElementById("currentTime").innerText = timeString;
    }

    // Initial update
    updateDateTime();

    // Update every second
    setInterval(updateDateTime, 1000);    
     
    </script>
@endsection