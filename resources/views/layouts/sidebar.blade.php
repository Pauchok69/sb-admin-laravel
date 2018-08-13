<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @can('charts.view')
    <li class="nav-item">
        <a class="nav-link" href="{{route('charts')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link" href="{{route('tables')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="componentsDropDown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Components</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="componentsDropDown">
            <a class="dropdown-item" href="{{route('components_navbar')}}">Navbar</a>
            <a class="dropdown-item" href="{{route('components_cards')}}">Cards</a>
        </div>
    </li>
</ul>