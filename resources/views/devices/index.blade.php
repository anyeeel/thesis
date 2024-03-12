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
                                    <h4 class="mb-sm-0 font-size-18">Jobs List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                            <li class="breadcrumb-item active">Jobs List</li>
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
                                            <h5 class="mb-0 card-title flex-grow-1">Jobs Lists</h5>
                                            <div class="flex-shrink-0">
                                                <a href="#!" class="btn btn-primary">Add New Job</a>
                                                <a href="#!" class="btn btn-light"><i class="mdi mdi-refresh"></i></a>
                                                <div class="dropdown d-inline-block">

                                                    <button type="menu" class="btn btn-success" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
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
                                                <input type="search" class="form-control" id="searchInput" placeholder="Search for ...">
                                            </div>
                                            <div class="col-xxl-2 col-lg-6">
                                                <select class="form-control select2">
                                                    <option>Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="New">New</option>
                                                    <option value="Close">Close</option>
                                                </select>
                                            </div>
                                            <div class="col-xxl-2 col-lg-4">
                                                <select class="form-control select2">
                                                    <option>Select Type</option>
                                                    <option value="1">Full Time</option>
                                                    <option value="2">Part Time</option>
                                                </select>
                                            </div>
                                            <div class="col-xxl-2 col-lg-4">
                                                <div id="datepicker1">
                                                    <input type="text" class="form-control" placeholder="Select date" data-date-format="dd M, yyyy" data-date-autoclose="true" data-date-container='#datepicker1' data-provide="datepicker">
                                                </div><!-- input-group -->
                                            </div>
                                            <div class="col-xxl-2 col-lg-4">
                                                <button type="button" class="btn btn-soft-secondary w-100"><i class="mdi mdi-filter-outline align-middle"></i> Filter</button>
                                            </div>
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
                                                        <th scope="col">Inactive</th>
                                                        <th scope="col">Brand</th>
                                                        <th scope="col">Model</th>
                                                        <th scope="col">Date Installed</th>
                                                        <th scope="col">Life Expectancy</th>
                                                        <th scope="col">Power</th>
                                                        <th scope="col">Hours Used</th>
                                                        <th scope="col">Energy (kWh)</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Magento Developer</td>
                                                        <td>Themesbrand</td>
                                                        <td>California</td>
                                                        <td><span class="badge badge-soft-success">Active</span></td>
                                                        <td>2</td>
                                                        <td>EC1VA35</td>
                                                        <td>02 June 2021</td>
                                                        <td>25 June 2021</td>
                                                        <td><span class="badge bg-success">Active</span></td>
                                                        <td>234</td>
                                                        <td>13hrs</td>
                                                        <td>
                                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                                    <a href="#" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                                    <a href="#jobDelete" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto me-auto">
                                                <p class="text-muted mb-0">Showing <b>1</b> to <b>12</b> of <b>45</b> entries</p>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card d-inline-block ms-auto mb-0">
                                                    <div class="card-body p-2">
                                                        <nav aria-label="Page navigation example" class="mb-0">
                                                            <ul class="pagination mb-0">
                                                                <li class="page-item">
                                                                    <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                    </a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">...</a></li>
                                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">12</a></li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->

                        </div><!--end row-->
                </div> <!-- container-fluid -->
            </div> <!-- end page-content -->
            @endsection