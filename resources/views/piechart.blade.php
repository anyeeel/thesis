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

                <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-4">Estimated Weekly Total Consumption of Peripheral Devices (kWh)</h4>
                            </div>
                            <canvas id="outputDevicePieChart" class="chartjs-chart" width="600" height="600"></canvas>
                        </div>
                    </div>
                </div>

                            
        
                   </div>                                
                </div>
            </div>
        </div>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Retrieve data for the peripheral device pie chart
            var outputDeviceLabels = @json($outputDeviceLabels);
            var outputDeviceData = @json($outputDeviceData);

            // Get the canvas element for the peripheral device pie chart
            var ctxOutputDevicePie = document.getElementById('outputDevicePieChart').getContext('2d');

            // Create the peripheral device pie chart
            var outputDevicePieChart = new Chart(ctxOutputDevicePie, {
                type: 'pie',
                data: {
                    labels: outputDeviceLabels,
                    datasets: [{
                        data: outputDeviceData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)', // Red
                            'rgba(54, 162, 235, 0.6)', // Blue
                            'rgba(255, 206, 86, 0.6)', // Yellow
                            'rgba(75, 192, 192, 0.6)', // Green
                            'rgba(153, 102, 255, 0.6)' // Purple
                            // Add more colors if needed
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    </script>
    <script>
            document.addEventListener("DOMContentLoaded", function () {
                
            // Retrieve data passed from the controller
            var labels = @json($pieLabels);
            var data = @json($pieData);

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

            // Get the canvas element
            var ctx = document.getElementById('pieChart').getContext('2d');

            // Create the pie chart
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColors
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
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
            type: 'pie',
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