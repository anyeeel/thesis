
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-chart-bar"></i>
                        <span key="t-dashboards">Data Visualization</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('piechart') }}" key="t-saas">Pie Chart</a></li>
                        <li><a href="{{ route('barchart') }}" key="t-crypto">Bar Chart</a></li>
                    </ul>
                </li>
              

                <li>
                    <a href="{{ route('buildings.index') }}" class="waves-effect">
                        <i class="bx bx-buildings"></i>
                        <span key="t-layouts">Buildings</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('energy.index') }}" class="waves-effect">
                        <i class="bx bxs-bolt"></i>
                        <span key="t-layouts">Energy Consumption</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-info-circle"></i>
                        <span key="t-dashboards">About Us</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('about') }}" key="t-default">What is EMS</a></li>
                        <li><a href="{{ route('features') }}" key="t-saas">Features</a></li>
                        <li><a href="{{ route('faqs') }}" key="t-crypto">FAQs</a></li>
                     
                    </ul>
                </li>
              


                @can(['create-user', 'edit-user', 'delete-user'])
                <li class="menu-title" key="t-menu">Access</li>

                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Users</span>
                    </a>
                </li>
                @endcan
                
                @can(['create-role', 'edit-role', 'delete-role'])
                <li>
                    <a href="{{ route('roles.index') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt"></i>
                        <span key="t-ecommerce">Roles</span>
                    </a>
                </li>
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
