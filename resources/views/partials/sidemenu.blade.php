<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link active" href="#">
            <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('maps.index') }}">
            <span data-feather="map-pin"></span>
            Maps
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('simu.index') }}">
            <span data-feather="award"></span>
            Emulator
        </a>
        </li>
    </ul>

    
    </div>
</nav>