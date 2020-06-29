<!-- Start NavBar -->

<nav>

    <!-- Left Side -->

    <div class="left-side">
        <div class="sidebar-collabse">
            <i class="fas fa-bars"></i>
        </div>
    </div>

    <!-- Right Side -->

    <div class="right-side">

        <a href="#"
           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
            <i class="fas fa-power-off"></i>
            تسجيل خروج
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>

    </div>
</nav>

<!-- End NavBar -->
