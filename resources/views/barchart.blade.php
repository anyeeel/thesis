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
                <div class="d-flex justify-content-center">
                    <select id="buildingSelect" class="form-select">
                        @foreach($buildingEnergyData as $buildingName => $floorData)
                            <option value="{{ $loop->index }}" {{ $loop->first ? 'selected' : '' }}>{{ $buildingName }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="chartContainer" class="row justify-content-center"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <select id="buildingSelect2" class="form-select">
                        <option value="" selected disabled>Select Building</option>
                        @foreach($buildingDeviceCounts as $buildingName => $deviceCounts)
                            <option value="{{ $loop->index }}">{{ $buildingName }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="chartContainer2" class="row justify-content-center"></div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buildingEnergyData = {!! json_encode($buildingEnergyData) !!};

        const buildingSelect = document.getElementById('buildingSelect');
        const chartContainer = document.getElementById('chartContainer');

        buildingSelect.addEventListener('change', function () {
            const buildingIndex = buildingSelect.value;
            renderChart(buildingIndex);
        });

        // Render the default chart on page load
        renderChart(buildingSelect.value);

        function renderChart(buildingIndex) {
            // Clear the chart container
            chartContainer.innerHTML = '';

            const buildingName = Object.keys(buildingEnergyData)[buildingIndex];
            const floorData = buildingEnergyData[buildingName];

            const chartHtml = `
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">${buildingName} Energy Consumption by Floor</h4>
                            <canvas id="buildingChart_${buildingIndex}" class="chartjs-chart" height="400"></canvas>
                        </div>
                    </div>
                </div>
            `;

            chartContainer.innerHTML = chartHtml;

            const ctx = document.getElementById('buildingChart_' + buildingIndex).getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(floorData),
                    datasets: [{
                        label: 'Energy Consumption (kWh)',
                        data: Object.values(floorData),
                        backgroundColor: 'rgba(128, 0, 0, 0.6)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Energy Consumption (kWh)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Floor'
                            }
                        }
                    }
                }
            });
        }
    });
</script>

                    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const buildingDeviceCounts = {!! json_encode($buildingDeviceCounts) !!};

        const buildingSelect2 = document.getElementById('buildingSelect2');
        const chartContainer2 = document.getElementById('chartContainer2');

        buildingSelect2.addEventListener('change', function () {
            const buildingIndex = buildingSelect2.value;
            if (buildingIndex !== '') {
                renderChart(buildingIndex);
                // Store selected building index in localStorage
                localStorage.setItem('selectedBuildingIndex', buildingIndex);
            } else {
                chartContainer2.innerHTML = ''; // Clear chart container if no building selected
                // Remove selected building index from localStorage
                localStorage.removeItem('selectedBuildingIndex');
            }
        });

        // Check if there's a selected building in localStorage on page load
        const selectedBuildingIndex = localStorage.getItem('selectedBuildingIndex');
        if (selectedBuildingIndex !== null) {
            buildingSelect2.value = selectedBuildingIndex;
            renderChart(selectedBuildingIndex);
        }

        function renderChart(buildingIndex) {
            const buildingName = Object.keys(buildingDeviceCounts)[buildingIndex];
            const deviceCounts = buildingDeviceCounts[buildingName];

            const chartHtml = `
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">${buildingName} Device Counts by Type</h4>
                            <canvas id="buildingDeviceChart_${buildingIndex}" class="chartjs-chart" height="400"></canvas>
                        </div>
                    </div>
                </div>
            `;

            chartContainer2.innerHTML = chartHtml;

            const ctx = document.getElementById('buildingDeviceChart_' + buildingIndex).getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(deviceCounts),
                    datasets: [{
                        label: 'Device Count',
                        data: Object.values(deviceCounts),
                        backgroundColor: 'rgba(54, 162, 235, 0.6)', // Example color
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Device Count'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Device Type'
                            }
                        }
                    }
                }
            });
        }
    });
</script>   
                   </div>                                
                </div>
            </div> <!-- container-fluid -->
    </div>
</div> <!-- END layout-wrapper -->
    
@endsection
