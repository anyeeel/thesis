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
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-4">Estimated Total Consumption of Device Types</h4>
                                    <button type="button" class="btn btn-l btn-secondary" id="infoBtn" data-toggle="modal" data-target="#deviceTypesModal">
                                        <i class="fas fa-info-circle"></i>
                                    </button>

                                </div>
                                <canvas id="pieChart" class="chartjs-chart" width="600" height="600"></canvas> <!-- Adjust width and height here -->
                                <p class="text-muted mt-3"><em><strong>Note:</strong> Estimated Total consumption reflects user-input device usage, not meter readings.</em></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-4">Estimated Total Consumption of Device Types</h4>
                                    <button type="button" class="btn btn-l btn-secondary" id="infoBtn" data-toggle="modal" data-target="#deviceTypesModal">
                                        <i class="fas fa-info-circle"></i>
                                    </button>

                                </div>
                                <canvas id="pieChart" class="chartjs-chart" width="600" height="600"></canvas> <!-- Adjust width and height here -->
                                <p class="text-muted mt-3"><em><strong>Note:</strong> Estimated Total consumption reflects user-input device usage, not meter readings.</em></p>
                            </div>
                        </div>
                    </div>

                    
                </div>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="deviceTypesModal" tabindex="-1" role="dialog" aria-labelledby="deviceTypesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deviceTypesModalLabel">What are Device Types</h5>
                   
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <li><strong style="color: rgba(255, 99, 132, 0.6);">Appliance:</strong> Refrigerators, microwaves, water coolers, vending machines - These devices consume electrical power for their operation and are typically found in common areas such as break rooms, cafeterias, or dormitories.</li><br>
                        <li><strong style="color: rgba(54, 162, 235, 0.6);">Desktop:</strong> Desktop computers, monitors, printers - These devices are powered by electricity and are commonly found in computer labs, administrative offices, and libraries.</li><br>
                        <li><strong style="color: rgba(255, 206, 86, 0.6);">HVAC (Heating, Ventilation, and Air Conditioning):</strong> Air conditioning units, electric heaters, ventilation fans - HVAC systems require electricity to regulate temperature and air quality throughout the building.</li><br>
                        <li><strong style="color: rgba(75, 192, 192, 0.6);">Lighting:</strong> Overhead lights, emergency exit signs, decorative lighting fixtures - Lighting fixtures are powered by electricity and play a crucial role in illuminating indoor spaces for visibility and safety.</li><br>
                        <li><strong style="color: rgba(153, 102, 255, 0.6);">Output:</strong> Output devices are used to display information or produce tangible outputs. This category includes printers, projectors, and screens that facilitate the dissemination of information, presentations, and educational materials.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            var backgroundColors = labels.map(function (label, index) {
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

            // Show modal when hovering over the information button
            document.getElementById('infoBtn').addEventListener('mouseover', function () {
                $('#deviceTypesModal').modal('show');
            });

        });
    </script>
    
@endsection
