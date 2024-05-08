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
                   
                <!-- Daily Energy Consumption Table -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4 card-title">Daily Energy Consumption from the Meter</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>KiloWatts per Hour</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($meterConsumptions as $consumption)
                                    <tr>
                                        <td>{{ $consumption->date }}</td>
                                        <td>{{ $consumption->time }}</td>
                                        <td>{{ $consumption->kilowatts_per_hour }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $meterConsumptions->links() }}
                        </div>
                    </div>
                </div>
                
                <!-- Computed Daily Consumption Table -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="mb-4 card-title">Computed Daily Consumption from Devices</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>KiloWatts per Hour</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($computedConsumptions as $computed)
                                    <tr>
                                        <td>{{ $computed->date }}</td>
                                        <td>{{ $computed->time }}</td>
                                        <td>{{ $computed->computed_consumption }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $computedConsumptions->links() }}
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div> <!-- end page-content -->
    </div> <!-- main-content -->
</div> <!-- layout-wrapper -->

@endsection
