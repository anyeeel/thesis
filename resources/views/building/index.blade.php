@extends('layouts.app')


@section('content')
    @include('layouts.header')
    @include('layouts.sidebar')
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Buildings</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route ('building.index') }}">Buildings</a></li>
                                        <li class="breadcrumb-item active">Files</li>
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
                                                        <h5>Files</h5>
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
                                                                <a class="dropdown-item" href="#">Share Files</a>
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
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="card shadow-none border">
                                                        <div class="card-body p-3">
                                                            <div class="">
                                                                <div class="float-end ms-2">
                                                                    <div class="dropdown mb-2">
                                                                        <a class="font-size-16 text-muted" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                                        </a>
                                                                        
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="#">Open</a>
                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                            <a class="dropdown-item" href="#">Rename</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="#">Remove</a>
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
                                                                        <h5 class="font-size-14 text-truncate mb-1"><a href="javascript: void(0);" class="text-body">Design</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">12 Files</p>
                                                                    </div>
                                                                    <div class="align-self-end ms-2">
                                                                        <p class="text-muted mb-0">20,123 kWh</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- end col -->

                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="card shadow-none border" id="building">
                                                        <div class="card-body p-3 d-flex align-items-center justify-content-center">
                                                            <a class="addBldg" role="button" aria-haspopup="true" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
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


    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Building</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-build">
                        <div class="row mb-3">
                            <label for="Building Name" class="col-sm-2 col-form-label">Building Name:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="bldgName">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="No. of Floors" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="bldgName">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all input fields in the form
        const inputs = document.querySelectorAll('.form-build input');

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
</script>
@endsection