@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">

            @can('salle_access')
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/admin/home') }}">
                    <i class="fa fa-tachometer"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>
            @endcan
           

            @can('appointment_access')
            <li class="{{ $request->segment(2) == 'appointments' ? 'active' : '' }}">
                <a href="{{ route('admin.appointments.index') }}">
                    <i class="fa fa-calendar"></i>
                    <span class="title">Gestion Des Reservations</span>
                </a>
            </li>
            @endcan

            

            @can('salle_access')
            <li class="{{ $request->segment(2) == 'salles' ? 'active' : '' }}">
                <a href="{{ route('admin.salles.index') }}">
                    <i class="fa fa-building-o "></i>
                    <span class="title">Gestion Des Salles</span>
                </a>
            </li>
            @endcan

            @can('demande_access')
            <li class="{{ $request->segment(2) == 'demandes' ? 'active' : '' }}">
                <a href="{{ route('demandes.index') }}">
                    <i class="fa fa-building-o "></i>
                    <span class="title">Gestion Des Demandes</span>
                </a>
            </li>
            @endcan
            
           
            @can('prix_management_access')
                <li class="">
                    <a href="#">
                        <i class="fa fa-university"></i>
                        <span class="title">Gestion Des Prix</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">

                           @can('prix_access')
                            <li class="{{ $request->segment(2) == 'prix' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.prix.index') }}">
                                    <i class="fa fa-money "></i>
                                    <span class="title">@lang('Prix')</span>
                                </a>
                            </li>
                        @endcan
                        @can('type_access')
                            <li class="{{ $request->segment(2) == 'type' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.type.index') }}">
                                    <i class="fa fa-list-alt"></i>
                                    <span class="title">
                                Type
                            </span>
                                </a>
                            </li>
                        @endcan
                        @can('timing_access')
                            <li class="{{ $request->segment(2) == 'Durée' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.timing.index') }}">
                                    <i class="fa fa-clock-o"></i>
                                    <span class="title">
                                Timing
                            </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

          <!--    @can('user_management_access')
                <li class="">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="title">Gestion des utilisateurs</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        @can('role_access')
                            <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.roles.index') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span class="title">
                                Roles
                            </span>
                                </a>
                            </li>
                        @endcan -->
                        @can('user_access')
                            <li class="{{ $request->segment(2) == 'users' ? 'active ' : '' }}">
                                <a href="{{ route('admin.users.index') }}">
                                    <i class="fa fa-user"></i>
                                    <span class="title">
                                Utilisateurs
                            </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            
        <!--    <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>
        -->   
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Déconnexion</span>
                </a>
            </li>
    
        </ul>
        <br/>
        <br/>
        <br/>
        
    </div>
    
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Déconnexion</button>
{!! Form::close() !!}


