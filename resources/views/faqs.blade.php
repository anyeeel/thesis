@extends('layouts.app')

@section('content')
    @include('layouts.header')
    @include('layouts.sidebar')
    <div id="layout-wrapper">
        <div class="main-content">
            
        
                    
                    <!-- Faqs start -->
                    <section class="section" id="faqs">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mb-5">
                                        <div class="small-title">FAQs</div>
                                        <h4 style=" color: #6e0606;">Frequently Asked Questions</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row" style="padding-left: 2rem; padding-right: 2rem;">
                                <div class="col-lg-12">
                                    <div class="vertical-nav">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-4">
                                                <div class="nav flex-column nav-pills" role="tablist">
                                                    <a class="nav-link active" id="v-pills-gen-ques-tab" data-bs-toggle="pill" href="#v-pills-gen-ques" role="tab">
                                                        <i class= "bx bx-help-circle nav-icon d-block"></i>
                                                        <p class="fw-bold mb-0">General Questions</p>
                                                    </a>
                                                    <a class="nav-link" id="v-pills-token-sale-tab" data-bs-toggle="pill" href="#v-pills-token-sale" role="tab"> 
                                                        <i class= "bx bx-receipt nav-icon d-block mb-2"></i>
                                                        <p class="fw-bold mb-0">Data Gathering</p>
                                                    </a>
                                                    <a class="nav-link" id="v-pills-roadmap-tab" data-bs-toggle="pill" href="#v-pills-roadmap" role="tab">
                                                        <i class= "bx bx-timer d-block nav-icon mb-2"></i>
                                                        <p class="fw-bold mb-0">System Functionality</p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-sm-8">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel">
                                                                <h4 class="card-title mb-4">General Questions</h4>
                                                                
                                                                <div>
                                                                <div id="token-accordion" class="accordion custom-accordion">
                                                                        <div class="mb-3">
                                                                            <a href="#token-collapseOne" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                            aria-expanded="false"
                                                                                            aria-controls="token-collapseOne">
                                                                
                                                                                <div>What is an Energy Management System ?</div>
                                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                
                                                                            </a>
                                                                
                                                                            <div id="token-collapseOne" class="collapse" data-bs-parent="#token-accordion">
                                                                                <div class="card-body">
                                                                                    <p class="mb-0">An energy management system is a software or hardware solution designed to monitor, analyze, and optimize energy usage within buildings, facilities, or industrial processes. These systems typically collect data from various sources such as energy meters, sensors, and smart devices to track energy consumption patterns in real-time or over specific periods.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                
                                                                        <div class="mb-3">
                                                                            <a href="#general-collapseTwo" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                aria-expanded="false" aria-controls="general-collapseTwo">
                                                                                <div>What is the reason behind the development of this system ?</div>
                                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                            </a>
                                                                            <div id="general-collapseTwo" class="collapse" data-bs-parent="#gen-ques-accordion">
                                                                                <div class="card-body">
                                                                                    <p class="mb-0">The development of this system is in accordance with Republic Act 11285 knows as the Energy Efficiency and Conservation Act which mandates that institutions are required to have a system which audits their energy consumption to ensure compliance with energy efficiency standards and promote sustainable energy practices.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                
                                                                        <div class="mb-3">
                                                                            <a href="#general-collapseThree" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                aria-expanded="false" aria-controls="general-collapseThree">
                                                                                <div>Can the system be customized to suit our specific needs and requirements? ?</div>
                                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                            </a>
                                                                            <div id="general-collapseThree" class="collapse" data-bs-parent="#gen-ques-accordion">
                                                                                <div class="card-body">
                                                                                    <p class="mb-0">Yes, the system can be customized to align with your specific needs and requirements. Whether you have unique data gathering preferences, visualization preferences, or specific functionality needs, the system can be tailored to accommodate them. This customization ensures that the system effectively addresses your organization's particular challenges and objectives, maximizing its utility and value to your operations.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                                               
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="v-pills-token-sale" role="tabpanel">
                                                                <h4 class="card-title mb-4">Data Gathering</h4>
                                                                    
                                                                <div>
                                                                    <div id="token-accordion" class="accordion custom-accordion">
                                                                        <div class="mb-3">
                                                                            <a href="#token-collapseOne" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                            aria-expanded="false"
                                                                                            aria-controls="token-collapseOne">
                                                                                <div>Is there a limit to the number of devices the system can monitor ?</div>
                                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                            </a>
                                                                            <div id="token-collapseOne" class="collapse" data-bs-parent="#token-accordion">
                                                                                <div class="card-body">
                                                                                    <p class="mb-0">No, there is no fixed limit to the number of devices the system can monitor. The system is designed to scale according to the needs of your organization, allowing for the monitoring of an extensive network of devices across multiple buildings or facilities. Whether you have a small number of devices or a large, complex infrastructure, the system can accommodate your requirements for comprehensive energy consumption monitoring.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <a href="#token-collapseTwo" class="accordion-list" data-bs-toggle="collapse"
                                                                                                            aria-expanded="true"
                                                                                                            aria-controls="token-collapseTwo">
                                                                                
                                                                                <div>What types of devices and sensors does the system support ?</div>
                                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                                
                                                                            </a>
                                                    
                                                                            <div id="token-collapseTwo" class="collapse show" data-bs-parent="#token-accordion">
                                                                                <div class="card-body">
                                                                                    <p class="mb-0">No, the system can scale according to your organization's needs, accommodating monitoring for any number of devices across multiple buildings or facilities. Its flexibility ensures comprehensive energy consumption monitoring, whether you have a small number of devices or a large, complex infrastructure.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                                  
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="v-pills-roadmap" role="tabpanel">
                                                                <h4 class="card-title mb-4">System Functionality</h4>
                                                                    
                                                                <div>
                                                                    <div id="roadmap-accordion" class="accordion custom-accordion">

                                                                        <div class="mb-3">
                                                                            <a href="#roadmap-collapseOne" class="accordion-list" data-bs-toggle="collapse"
                                                                                                            aria-expanded="true"
                                                                                                            aria-controls="roadmap-collapseOne">
                                                                                
                                                                                <div>What types of data visualizations does the system offer ?</div>
                                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                                
                                                                            </a>
                                                    
                                                                            <div id="roadmap-collapseOne" class="collapse show" data-bs-parent="#roadmap-accordion">
                                                                                <div class="card-body">
                                                                                    <p class="mb-0">The system offers a variety of data visualizations to provide insights into energy consumption patterns and trends. These visualizations include charts, graphs,  and customizable dashboards. With these tools, users can easily interpret complex energy data, identify areas of inefficiency, and make informed decisions to optimize energy usage within their buildings or facilities.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <a href="#roadmap-collapseTwo" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                            aria-expanded="false"
                                                                                            aria-controls="roadmap-collapseTwo">
                                                                                <div>Can the visualizations be customized according to specific requirements ?</div>
                                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                            </a>
                                                                            <div id="roadmap-collapseTwo" class="collapse" data-bs-parent="#roadmap-accordion">
                                                                                <div class="card-body">
                                                                                    <p class="mb-0">Yes, the visualizations offered by the system can be customized according to specific requirements, allowing users to tailor the presentation of energy consumption data to their preferences and objectives. This customization ensures that the visualizations effectively communicate insights and support decision-making tailored to the user's needs.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                        
                                                                        <div class="mb-3">
                                                                            <a href="#roadmap-collapseThree" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                            aria-expanded="false"
                                                                                            aria-controls="roadmap-collapseThree">
                                                                                <div>Are there any automated controls or recommendations provided by the system ?</div>
                                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                            </a>
                                                                            <div id="roadmap-collapseThree" class="collapse" data-bs-parent="#roadmap-accordion">
                                                                                <div class="card-body">
                                                                                    <p class="mb-0">Yes, the system can provide automated controls and recommendations based on the analysis of energy consumption data. These controls may include automated adjustments to heating, cooling, lighting, or other systems to optimize energy usage and efficiency within buildings or facilities. Additionally, the system may offer recommendations for implementing specific energy-saving measures based on identified patterns and trends in the data.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>   
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end vertical nav -->
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end container -->
                    </section>
                    <!-- Faqs end -->
                
            
        </div> <!-- end main content-->
    </div> <!-- end layout-wrapper -->
@endsection