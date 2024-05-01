@extends('layouts.app')

@section('content')
    @include('layouts.header')
    @include('layouts.sidebar')
    <div id="layout-wrapper">
        <div class="main-content">
            
                
                    <!-- hero section start -->
                    <section class="section hero-section" id="home" style="padding-left: 2rem; padding-right: 2rem; background-image: url('assets/images/ENERGY/iit.png'); background-repeat: no-repeat; background-size: cover;">
                        <div class="overlay"></div> 
                        
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-lg-6">                                    
                                        <h1 class="text-white fw-semibold mb-3 hero-title">MSU-IIT Energy Management System</h1>
                                        <p class="font-size-14 text-light">A comprehensive platform designed to efficiently monitor, analyze, and optimize energy usage within the MSU-IIT campus to promote sustainability and cost-effectiveness.</p>                                                                          
                                </div>
                            </div>
                            <!-- end row -->                     
                    </section>
                    <!-- hero section end -->                    

                    <!-- about section start -->
                    <section class="section pt-4 bg-white" id="about" style="padding-left: 2rem; padding-right: 2rem;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mb-5">
                                        <div class="small-title">About Us</div>
                                        <h4 style=" color: #6e0606;">What is an Energy Management System?</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center justify-content-center text-center">
                            <div class="col-lg-8">
                                <p>An Energy Management System (EMS) is a comprehensive platform designed to efficiently monitor, analyze, and optimize energy usage within an organization or institution. It provides records of the electrical energy consumption of each building in MSU-IIT through a database system.</p>
                                <p>With an EMS, faculties and staff will be able to monitor or navigate the energy consumption of each building's rooms or the building as a whole within MSU-IIT conveniently and efficiently.</p>
                            </div>   
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end container -->
                    </section>
                    <!-- about section end -->

                  
            
        </div> <!-- end main content-->
    </div> <!-- end layout-wrapper -->
@endsection