<div class="page-header-inner">
    <div class="page-header-inner">
        <div class="navbar-header">
            <a href="{{ url('/') }}"
               class="navbar-brand">
            
               <span> <img src="http://localhost:8000/images/logo.svg" width="38px" height="30px">
            
            Réservation le 15</span>
            </a>
        </div>
        <a href="javascript:;"
           class="menu-toggler responsive-toggler"
           data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>
        @guest
        <li class="nav-item">
            <a class="nav-link" href="/admin/login">{{ __('Login') }}</a>
        </li>
        @else
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="navbar-brand">
                    <i class="fa fa-user-circle-o" aria-hidden="true">
                    {{ Auth::user()->name }} </i> 
                </li>
            </ul>
        </div>
        @endguest
    </div>
</div>

