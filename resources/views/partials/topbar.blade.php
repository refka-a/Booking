<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-header-inner">
            <div class="navbar-header">
                <a href="{{ url('/admin/home') }}"
                   class="navbar-brand">
                    
                </a>
            </div>
            
            <a href="javascript:;"
               class="menu-toggler responsive-toggler"
               data-toggle="collapse"
               data-target=".navbar-collapse">
            </a>

            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                        <a href="{{ url('/') }}">
                            <i class="fa fa-wrench"></i>
                            <span class="title"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>