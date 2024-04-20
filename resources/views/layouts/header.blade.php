<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/2.png') }}" alt="" height="27">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="35">
                    </span>
                </a>

                <a href="{{ url('/dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="" alt="" height="19">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars" style = "color: #f3f3f3;"></i>
            </button>
        </div>

        <div class="d-flex align-items-center">
            <!-- Live Date and Time -->
            <div class="text-muted me-4">
                <i class="bx bx-calendar me-1" style = "color: #f3f3f3;"></i>
                <span id="currentDate"></span>
            </div>
            <div class="text-muted">
                <i class="bx bx-time me-1" style = "color: #f3f3f3;"></i>
                <span id="currentTime"></span>
            </div>
        </div>

        <div class="d-flex">
           
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry" >{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a id="logout-button" class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">{{ __('Logout') }}</span>
                    </a>
                </div>
            </div>
         

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
    </div>
</header>
<script>
    document.getElementById('logout-button').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });

    function updateDateTime() {
        var currentDate = new Date();

        // Date options
        var dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var dateString = currentDate.toLocaleDateString('en-US', dateOptions);

        // Time options
        var timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
        var timeString = currentDate.toLocaleTimeString('en-US', timeOptions);

        // Update date and time separately
        document.getElementById("currentDate").innerText = dateString;
        document.getElementById("currentTime").innerText = timeString;
    }

    // Initial update
    updateDateTime();

    // Update every second
    setInterval(updateDateTime, 1000);
</script>
