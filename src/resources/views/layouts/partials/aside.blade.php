<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->image }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @if(Auth::guest())
                    {{ route('login') }}
                @else
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ __('Online') }}</a>
                @endif
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">{{ __('MAIN NAVIGATION') }}</li>
            <li class="@if(Request::is('home')) active @endif">
                <a href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ __('Dashboard') }}</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview @if(!Request::is('home')) active @endif">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{ __('Management') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::is('users', 'users/*')) active @endif"><a href="#"><i class="fa fa-users" aria-hidden="true"></i>{{ __('Users Management') }}</a></li>
                    <li class="@if(Request::is('teams', 'teams/*')) active @endif"><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i>{{ __('Teams Management') }}</a></li>
                    <li class="@if(Request::is('stadiums', 'stadiums/*')) active @endif"><a href="#"><i class="fa fa-building-o" aria-hidden="true"></i>{{ __('Stadiums Management') }}</a></li>
                    <li class="@if(Request::is('orders', 'orders/*')) active @endif"><a href="#"><i class="fa fa-ticket" aria-hidden="true"></i>{{ __('Orders Management') }}</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-pie-chart"></i> <span>{{ __('Statistical') }}</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
