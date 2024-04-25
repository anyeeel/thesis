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
                            <h4 class="mb-sm-0 font-size-18">Floors of {{ $building->building_name}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route ('buildings.index') }}">Buildings</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:history.back();">{{ $building->building_name}}</a></li>
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
                                <div class="row">

                                <div class="d-flex justify-content-between">
                                    <div class="page-title-right">
                                        <a href="{{ route('buildings.index') }}"><i class="bx bx-left-arrow-alt bx-sm"></i></a>
                                    </div>
                                    
                                    <div class="page-title-left">
                                        <span class="text-muted fw-medium" >Total: </span>
                                        <span class="font-size-15 mb-0" style="color: #6e0606; font-weight: 500;">{{ number_format($building->totalEnergy(), 2) }} kWh</span>
                                    </div>
                                </div>



                                    @forelse ($floors as $floor)
                                        <div class="col-xl-4 col-sm-6 p-3">
                                            <div class="border p-3 rounded mt-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-warning-subtle text-warning font-size-18">
                                                            <i class="bx bx-buildings"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-14 mb-0">{{ $floor->name }}</h5>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="text-muted mt-3">
                                                            <p class="mb-0">{{ number_format($floor->totalEnergy(), 2) }} kWh</p>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 align-self-end">
                                                        <div class="float-end mt-3">
                                                            <a href="{{ route('rooms.index') }}?floor_id={{ $floor->id }}" class="btn btn-primary">View Rooms</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

                                  
                                    <!-- end col -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--  end row -->
            </div> <!-- container-fluid -->
        </div> <!-- end page-content -->
    </div> <!-- end main content-->
</div> <!-- end layout-wrapper -->
@endsection