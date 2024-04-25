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
                            @foreach($room as $room)
                            <h4 class="mb-sm-0 font-size-18">{{ $room->name}} Devices</h4>
                            @endforeach

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('buildings.index') }}">Buildings</a></li>
                                        @foreach($building as $building)
                                        <li class="breadcrumb-item"><a href="javascript:history.go(-3);">{{ $building->building_name }}</a></li>
                                        @endforeach
                                        @foreach($floor as $floor)
                                        <li class="breadcrumb-item"><a href="javascript:history.go(-2);">{{ $floor->name }}</a></li>
                                        @endforeach
                                        <li class="breadcrumb-item"><a href="javascript:history.back();"> {{ $room->name}}</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

               

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">
                            <div class="row">
                <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-start">
                                            <div class="page-title-right">
                                                <div><a href="{{ route('rooms.index', ['floor_id' => $floor->id]) }}" class="btn btn-secondary"><i class="bx bx-chevron-left"></i></a></div>
                                            </div>
                                        </div>

                                        <div class="page-title-left">
                                            <span class="text-muted fw-medium">Total: </span>
                                            <span class="font-size-14 mb-0">{{ number_format($room->totalEnergy(), 2) }} kWh</span>
                                        </div>
                                    </div>
                </div>
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 card-title flex-grow-1">
                                    <div class="col-xxl-4 col-lg-6">
                                        <!-- App Search-->
                                    <form class="app-search d-none d-lg-block">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <span class="bx bx-search-alt"></span>
                                        </div>
                                    </form>
                                    </div>
                                    </h5>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addDeviceModal">Add New Device</button>                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body border-bottom">
                                <div class="row g-3">
                                    <div class="col-xxl-4 col-lg-6">
                                        <input type="search" class="form-control" id="searchInput"
                                            placeholder="Search for ...">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered align-middle nowrap" style="text-align: center;">

                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Device Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">No. of Active</th>
                                                <th scope="col">No. of Inactive</th>
                                                <th scope="col">Power (watts)</th>
                                                <th scope="col">Hours Used</th>
                                                <th scope="col">Energy (kWh)</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($devices as $device)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $device->name }}</td>
                                                <td>{{ $device->type }}</td>
                                                <td>{{ $device->active_quantity }}</td> 
                                                <td>{{ $device->inactive_quantity }}</td>                                           
                                                <td>{{ $device->power }}</td>
                                                <td>{{ $device->hours_used }}</td>
                                                <td>{{ $device->energy }}</td>
                                                <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <!-- View button in the loop -->
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <button type="button" class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#viewDeviceModal{{ $device->id }}">
                                                        <i class="mdi mdi-eye-outline"></i>
                                                    </button>
                                                </li>

                                                                                                        <!-- Edit button in the loop -->
                                                <a href="#" class="btn btn-sm btn-soft-info" data-bs-toggle="modal" data-bs-target="#editDeviceModal{{ $device->id }}"><i class="mdi mdi-pencil-outline"></i></a>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Delete">
                                                    <form
                                                        action="{{ route('devices.destroy', $device->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-soft-danger"><i
                                                                class="mdi mdi-delete-outline"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- end page-content -->


<!-- Modal for adding new device -->

<div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog" aria-labelledby="addDeviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDeviceModalLabel">Add New Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addDeviceForm" action="{{ route('devices.store') }}" method="POST">
                @csrf
                <input type="hidden" name="room_id" value="{{ $room_id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="deviceName" class="form-label">Device Name</label>
                                <input type="text" class="form-control" id="deviceName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="deviceType" class="form-label">Type</label>
                                <select class="form-select" id="deviceType" name="type" required>
                                    <option value="" selected disabled>Select a type</option>
                                    <option value="HVAC">HVAC</option>
                                    <option value="Lighting">Lighting System</option>
                                    <option value="Output">Output Device</option>
                                    <option value="Appliance">Appliance</option>
                                    <option value="Desktop">Desktop</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="deviceBrand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="deviceBrand" name="brand" required>
                            </div>
                            <div class="mb-3">
                                <label for="deviceModel" class="form-label">Model</label>
                                <input type="text" class="form-control" id="deviceModel" name="model" required>
                            </div>
                            <div class="mb-3">
                                <label for="deviceInstalledDate" class="form-label">Date Installed</label>
                                <input type="date" class="form-control" id="deviceInstalledDate" name="installed_date" >
                            </div>
                        </div>
                       
                            
                            <div class="col-md-6">
                            <div class="mb-3">
                                <label for="deviceLifeExpectancy" class="form-label">Life Expectancy (years)</label>
                                <input type="number" class="form-control" id="deviceLifeExpectancy" name="life_expectancy" >
                            </div>
                            <div class="mb-3">
                                <label for="deviceActive" class="form-label">No. of Active</label>
                                <input type="number" class="form-control" id="deviceActive" name="active_quantity" required min='0' step='any'>
                            </div>
                            <div class="mb-3">
                                <label for="deviceInactive" class="form-label">No. of Inactive</label>
                                <input type="number" class="form-control" id="deviceInactive" name="inactive_quantity" required min='0' step='any'>
                            </div>
                            <div class="mb-3">
                                <label for="devicePower" class="form-label">Power (watts)</label>
                                <input type="number" class="form-control" id="devicePower" name="power" required min='0' step='any'>
                            </div>
                            <div class="mb-3">
                                <label for="deviceHoursUsed" class="form-label">Hours Used</label>
                                <input type="number" class="form-control" id="deviceHoursUsed" name="hours_used" required min='0' step='any'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Device</button>
                </div>
            </form>
        </div>
    </div>
</div>


              

<!-- Modal for editing device -->
@foreach($devices as $device)
<div class="modal fade" id="editDeviceModal{{ $device->id }}" tabindex="-1" role="dialog" aria-labelledby="editDeviceModalLabel{{ $device->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDeviceModalLabel{{ $device->id }}">Edit Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editDeviceForm{{ $device->id }}" action="{{ route('devices.update', $device->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Device Name -->
                            <div class="mb-3">
                                <label for="editDeviceName{{ $device->id }}" class="form-label">Device Name</label>
                                <input type="text" class="form-control" id="editDeviceName{{ $device->id }}" name="name" value="{{ $device->name }}" required>
                            </div>
                            <!-- Type -->
                            <div class="mb-3">
                                <label for="editDeviceType{{ $device->id }}" class="form-label">Type</label>
                                <input type="text" class="form-control" id="editDeviceType{{ $device->id }}" name="type" value="{{ $device->type }}" required>
                            </div>                                             
                            <!-- Brand -->
                            <div class="mb-3">
                                <label for="editDeviceBrand{{ $device->id }}" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="editDeviceBrand{{ $device->id }}" name="brand" value="{{ $device->brand }}" required>
                            </div>
                            <!-- Model -->
                            <div class="mb-3">
                                <label for="editDeviceModel{{ $device->id }}" class="form-label">Model</label>
                                <input type="text" class="form-control" id="editDeviceModel{{ $device->id }}" name="model" value="{{ $device->model }}" required>
                            </div>
                            <!-- Installed Date -->
                            <div class="mb-3">
                                <label for="editDeviceInstalledDate{{ $device->id }}" class="form-label">Date Installed</label>
                                <input type="date" class="form-control" id="editDeviceInstalledDate{{ $device->id }}" name="installed_date" value="{{ $device->installed_date }}" >
                            </div>                           
                            </div>
                            <div class="col-md-6">
                            <!-- Life Expectancy -->
                            <div class="mb-3">
                                <label for="editDeviceLifeExpectancy{{ $device->id }}" class="form-label">Life Expectancy (years)</label>
                                <input type="number" class="form-control" id="editDeviceLifeExpectancy{{ $device->id }}" name="life_expectancy" value="{{ $device->life_expectancy }}"   min='0' step='any'>
                            </div>
                            <!-- Active Quantity -->
                            <div class="mb-3">
                                <label for="editDeviceActive{{ $device->id }}" class="form-label">No. of Active</label>
                                <input type="number" class="form-control" id="editDeviceActive{{ $device->id }}" name="active_quantity" value="{{ $device->active_quantity }}" required min='0' step='any'>
                            </div>
                            <!-- Inactive Quantity -->
                            <div class="mb-3">
                                <label for="editDeviceInactive{{ $device->id }}" class="form-label">No. of Inactive</label>
                                <input type="number" class="form-control" id="editDeviceInactive{{ $device->id }}" name="inactive_quantity" value="{{ $device->inactive_quantity }}" required min='0' step='any'>
                            </div>                            
                            <!-- Power -->
                            <div class="mb-3">
                                <label for="editDevicePower{{ $device->id }}" class="form-label">Power (watts)</label>
                                <input type="number" class="form-control" id="editDevicePower{{ $device->id }}" name="power" value="{{ $device->power }}" required  min='0' step='any'>
                            </div>
                            <!-- Hours Used -->
                            <div class="mb-3">
                                <label for="editDeviceHoursUsed{{ $device->id }}" class="form-label">Hours Used</label>
                                <input type="number" class="form-control" id="editDeviceHoursUsed{{ $device->id }}" name="hours_used" value="{{ $device->hours_used }}" required  min='0' step='any'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

<!-- Modal for viewing device details -->
@foreach($devices as $device)
<div class="modal fade" id="viewDeviceModal{{ $device->id }}" tabindex="-1" role="dialog" aria-labelledby="viewDeviceModalLabel{{ $device->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDeviceModalLabel{{ $device->id }}">View Device Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display all device details here -->
                <div class="row">
                    <div class="col-md-5">
                        <p><strong>Name:</strong> </p>
                        <p><strong>Type:</strong> </p>
                        <p><strong>Brand:</strong> </p>
                        <p><strong>Model:</strong> </p>
                        <p><strong>Date Installed:</strong>
                        <p><strong>Life Expectancy:</strong></p>
                        <p><strong>No. of Active:</strong> </p>
                        <p><strong>No. of Inactive:</strong> </p>
                        <p><strong>Power (watts):</strong> </p>
                        <p><strong>Hours Used:</strong> </p>
                        <p><strong>Energy (kWh):</strong> </p>
                    </div>
                    <div class="col-md-7">
                        <p>{{ $device->name }}</p>
                        <p>{{ $device->type }}</p>
                        <p>{{ $device->brand }}</p>
                        <p>{{ $device->model }}</p>
                        <p>@if(isset($device->installed_date))
                                {{ \Carbon\Carbon::parse($device->installed_date)->format('m-d-Y') }}
                            @else
                                Not Specified
                            @endif</p>
                        <p>
                            @if(isset($device->life_expectancy))
                                {{ $device->life_expectancy }}
                            @else
                                Not Specified
                            @endif
                        </p>                
                        <p>{{ $device->active_quantity }}</p>
                        <p>{{ $device->inactive_quantity }}</p>
                        <p>{{ $device->power }}</p>
                        <p>{{ $device->hours_used }}</p>
                        <p> {{ $device->energy }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                $installedDate = strtotime($device->installed_date); // Convert the installed date to a timestamp
                $dateExpectancy = $device->life_expectancy; // Life expectancy of the device in years

                // Check if both installed date and life expectancy are provided
                if ($installedDate && $dateExpectancy) {
                    // Calculate the replacement date by adding the life expectancy to the installed date
                    $replacementDate = strtotime("+$dateExpectancy years", $installedDate);
                    $formattedReplacementDate = date('m-d-Y', $replacementDate);
                } else {
                    // If either installed date or life expectancy is not specified, set replacement date as "Not Specified"
                    $formattedReplacementDate = "Not Specified";
                }
                ?>
                <p>The device replacement date is <strong>{{ $formattedReplacementDate }}</strong></p>
            </div>
        </div>
    </div>
</div>
@endforeach




<script>
    $(document).ready(function() {
        // Handle form submission for each device edit modal
        @foreach($devices as $device)
        $('#editDeviceForm{{ $device->id }}').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#editDeviceModal{{ $device->id }}').modal('hide');
                    // You may need to reload the devices list or update the specific device row here
                },
                error: function(error) {
                    console.log(error);
                    // Handle errors here
                }
            });
        });
        @endforeach
    });
</script>


@endsection