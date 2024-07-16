<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
                <!-- end Dashboard Menu -->
                <li class="nav-item">

                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="home" class="icon-dual"></i> <span>@lang('translation.dashboard')</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('kpaypro.index') }}" class="nav-link">@lang('translation.trangchu')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('kpaypro.banks') }}" class="nav-link">@lang('translation.banks')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('kpaypro.bankscode') }}" class="nav-link">@lang('translation.bankscode')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('kpaypro.test') }}" class="nav-link">@lang('translation.test')</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link"><span>@lang('translation.job')</span> <span
                                        class="badge badge-pill bg-success">@lang('translation.new')</span></a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
