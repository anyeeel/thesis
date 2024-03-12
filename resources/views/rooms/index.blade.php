@extends('layouts.app')

@section('content')
    <div id="layout-wrapper">

    @include('layouts.header')
    @include('layouts.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Rooms</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('buildings.index') }}">Buildings</a></li>
                                        <li class="breadcrumb-item active">Rooms</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="w-100">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="row mb-3">
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="mt-2">
                                                    <h5>Rooms</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-sm-6">
                                                <form class="mt-4 mt-sm-0 float-sm-end d-flex align-items-center">
                                                    <div class="search-box mb-2 me-2">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control bg-light border-light rounded" placeholder="Search...">
                                                            <i class="bx bx-search-alt search-icon"></i>
                                                        </div>
                                                    </div>

                                                    <div class="dropdown mb-0">
                                                        <a class="btn btn-link text-muted mt-n2" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                            <i class="mdi mdi-dots-vertical font-size-20"></i>
                                                        </a>
                                                        
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Share Rooms</a>
                                                            <a class="dropdown-item" href="#">Share with me</a>
                                                            <a class="dropdown-item" href="#">Other Actions</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row">
                                            @foreach($rooms as $room)
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="card shadow-none border">
                                                        <div class="card-body p-3">
                                                            <div>
                                                                <div class="float-end ms-2">
                                                                    <div class="dropdown mb-2">
                                                                        <a class="font-size-16 text-muted" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                                        </a>
                                                                        
                                                                        <div class="dropdown-menu dropdown-menu-end">                                                         
                                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editRoomModal{{ $room->id }}">Edit</a>                                                                   
                                                                            <div class="dropdown-divider"></div>               
                                                                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this room?')">Remove</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-xs me-3 mb-3">
                                                                    <div class="avatar-title bg-transparent rounded">
                                                                        <i class="bx bxs-folder font-size-24 text-warning"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="overflow-hidden me-auto">               
                                                                        <h5 class="font-size-14 text-truncate mb-1"><a href="{{ route('rooms.show', $room->room_name) }}" class="text-body">{{ $rooms->room_name }}</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">{{ $rooms->room_description }}</p>
                                                                    </div>
                                                                    <div class="align-self-end ms-2">
                                                                        <p class="text-muted mb-0">{{ $rooms->room_capacity }} Capacity</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="col-xl-4 col-sm-6">
                                                <div class="card shadow-none border" id="room">
                                                    <div class="card-body p-3 d-flex align-items-center justify-content-center">
                                                        <a class="addRoom" role="button" aria-haspopup="true" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Room">
                                                            <i class="bx bx-plus-medical"></i>
                                                        </a>                                               
                                                    </div>                                        
                                                </div>
                                            </div>
                                            <!-- end col -->

                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!--  end row -->

                    
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center my-3">
                                <a href="javascript:void(0);" class="text-success"><i class="bx bx-loader bx-spin font-size-18 align-middle me-2"></i> Load more </a>
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
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
    <!-- end layout-wrapper -->

 <!-- add room -->
    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRoomForm" action="{{ route('rooms.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="roomName" class="col-sm-2 col-form-label">Room Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="roomName" name="room_name">
                                </div>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Room</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="successMessage" class="alert alert-success" role="alert" style="display: none;"></div>

<!-- edit room -->
@foreach($rooms as $room)
    <div class="modal fade bs-example-modal-center" id="editRoomModal{{ $room->id }}" tabindex="-1" aria-labelledby="editRoomModal{{ $room->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoomModal{{ $room->id }}Label">Edit Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editRoomName" class="form-label">Room Name</label>
                            <input type="text" class="form-control" id="editRoomName" name="room_name" value="{{ $room->room_name }}">
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all input fields in the form
        const inputs = document.querySelectorAll('.form-control');

        // Add focus event listener to each input field
        inputs.forEach(input => {
            input.addEventListener('focus', function () {
                // Change the border color when the input field is focused
                this.style.borderColor = '#007bff'; // Change to your desired border color
            });

            // Remove the border color when the input field loses focus
            input.addEventListener('blur', function () {
                this.style.borderColor = ''; // Reset to default border color
            });
        });
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    $(document).ready(function() {
        $('#addRoomForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#addRoomForm')[0].reset();
                    $('.bs-example-modal-center').modal('hide');
                    $('#successMessage').text(response.success).show();
                    // You may need to reload the room list here
                },
                error: function(error) {
                    console.log(error);
                    // Handle errors here
                }
            });
        });
    });

    </script>
@endsection
