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
                            <h4 class="mb-sm-0 font-size-18">Devices List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Devices</a></li>
                                    <li class="breadcrumb-item active">Devices List</li>
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
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 card-title flex-grow-1">Devices List</h5>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addDeviceModal">Add New Device</button>
                                        <a href="#!" class="btn btn-light"><i class="mdi mdi-refresh"></i></a>
                                        <div class="dropdown d-inline-block">
                                            <button type="menu" class="btn btn-success" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-dots-vertical"></i></button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-bottom">
                                <div class="row g-3">
                                    <div class="col-xxl-4 col-lg-6">
                                        <input type="search" class="form-control" id="searchInput"
                                            placeholder="Search for ...">
                                    </div>
                                    <!-- Add more filters if needed -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Device Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Quantity</th>
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
                                                <td>{{ $device->quantity }}</td>                                            
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

    </div> <!-- end page-content -->
</div> <!-- end main-content -->

<!-- Modal for adding new device -->
<div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog" aria-labelledby="addDeviceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDeviceModalLabel">Add New Device</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addDeviceForm" action="{{ route('devices.store') }}" method="POST">
                        @csrf
                         <input type="hidden" name="room_id" value="{{ $room_id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="deviceName" class="form-label">Device Name</label>
                                <input type="text" class="form-control" id="deviceName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="deviceType" class="form-label">Type</label>
                                <input type="text" class="form-control" id="deviceType" name="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="deviceQuantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="deviceQuantity" name="quantity" required>
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
                                <input type="date" class="form-control" id="deviceInstalledDate" name="installed_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="deviceLifeExpectancy" class="form-label">Life Expectancy (years)</label>
                                <input type="number" class="form-control" id="deviceLifeExpectancy" name="life_expectancy" required>
                            </div>
                            <div class="mb-3">
                                <label for="devicePower" class="form-label">Power (watts)</label>
                                <input type="number" class="form-control" id="devicePower" name="power" required>
                            </div>
                            <div class="mb-3">
                                <label for="deviceHoursUsed" class="form-label">Hours Used</label>
                                <input type="number" class="form-control" id="deviceHoursUsed" name="hours_used" required>
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
</div>
<!-- Add this modal at the end of your blade file, after the modal for adding new devices -->

<!-- Modal for editing device -->
<!-- Modal for editing device -->
@foreach($devices as $device)
<div class="modal fade" id="editDeviceModal{{ $device->id }}" tabindex="-1" role="dialog" aria-labelledby="editDeviceModalLabel{{ $device->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDeviceModalLabel{{ $device->id }}">Edit Device</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editDeviceForm{{ $device->id }}" action="{{ route('devices.update', $device->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
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
                    <!-- Quantity -->
                    <div class="mb-3">
                        <label for="editDeviceQuantity{{ $device->id }}" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="editDeviceQuantity{{ $device->id }}" name="quantity" value="{{ $device->quantity }}" required>
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
                        <input type="date" class="form-control" id="editDeviceInstalledDate{{ $device->id }}" name="installed_date" value="{{ $device->installed_date }}" required>
                    </div>
                    <!-- Life Expectancy -->
                    <div class="mb-3">
                        <label for="editDeviceLifeExpectancy{{ $device->id }}" class="form-label">Life Expectancy (years)</label>
                        <input type="number" class="form-control" id="editDeviceLifeExpectancy{{ $device->id }}" name="life_expectancy" value="{{ $device->life_expectancy }}" required>
                    </div>
                    <!-- Power -->
                    <div class="mb-3">
                        <label for="editDevicePower{{ $device->id }}" class="form-label">Power (watts)</label>
                        <input type="number" class="form-control" id="editDevicePower{{ $device->id }}" name="power" value="{{ $device->power }}" required>
                    </div>
                    <!-- Hours Used -->
                    <div class="mb-3">
                        <label for="editDeviceHoursUsed{{ $device->id }}" class="form-label">Hours Used</label>
                        <input type="number" class="form-control" id="editDeviceHoursUsed{{ $device->id }}" name="hours_used" value="{{ $device->hours_used }}" required>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDeviceModalLabel{{ $device->id }}">View Device Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display all device details here -->
                <p><strong>Name:</strong> {{ $device->name }}</p>
                <p><strong>Type:</strong> {{ $device->type }}</p>
                <p><strong>Quantity:</strong> {{ $device->quantity }}</p>
                <p><strong>Brand:</strong> {{ $device->brand }}</p>
                <p><strong>Model:</strong> {{ $device->model }}</p>
                <p><strong>Date Installed:</strong> {{ $device->installed_date }}</p>
                <p><strong>Life Expectancy:</strong> {{ $device->life_expectancy }} years</p>
                <!-- Add more device details as needed -->
            </div>
            <div class="modal-footer">
               <p>Need to change in this date</p>
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