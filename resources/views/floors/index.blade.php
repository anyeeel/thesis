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
                                <h4 class="mb-sm-0 font-size-18">Floors of</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        @forelse ($floors as $index=>$floor) 
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Floor {{ $floor->id }}</h5>                                      
                                        <a href="{{ route('rooms.index', $floor->id) }}" class="btn btn-primary">View Rooms</a>

                                    </div>
                                </div>
                            </div>
                            @empty
                        @endforelse

                    </div>
                </div> <!-- container-fluid -->
            </div> <!-- end page-content -->
            
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
        </div> <!-- end main content-->
    </div> <!-- end layout-wrapper -->
@endsection
