<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{url('../image/df.png')}}" alt="Logo" class="brand-image bg-white img-circle" />
        <!-- <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle"> -->
        <span class="brand-text font-weight-light">ወታደራዊ ፍርድ ቤት</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            ዳሽቦርድ
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            Apps
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    
                </li> -->



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                        አስተዳዳሪ ተጠቃሚዎች
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', App\Models\User::class)
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ተጠቃሚዎች</p>
                            </a>
                        </li>
                        @endcan

                    </ul>





                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            የፍርድ ቤት ዝርዝር 
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', App\Models\Court::class)
                        <li class="nav-item">
                            <a href="{{ route('courts.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ፍርድ ቤት</p>
                            </a>

                        </li>
                        @endcan
                        @can('view-any', App\Models\Attorney::class)
                        <li class="nav-item">
                            <a href="{{ route('attorneys.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ጠበቃ</p>
                            </a>
                        </li>
                        @endcan
                        @can('view-any', App\Models\Judge::class)
                        <li class="nav-item">
                            <a href="{{ route('judges.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ዳኛ</p>
                            </a>
                        </li>
                        @endcan
                        @can('view-any', App\Models\Bar::class)
                        <li class="nav-item">
                            <a href="{{ route('bars.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ማረሚያ ቤት</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            የችሎት ዝርዝር
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', App\Models\CaseCharge::class)
                        <li class="nav-item">
                            <a href="{{ route('case-charges.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ክስ ቻርጅ</p>
                            </a>
                        </li>
                        @endcan
                        @can('view-any', App\Models\Wittness::class)
                        <li class="nav-item">
                            <a href="{{ route('wittnesses.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ምስክር</p>
                            </a>
                        </li>
                        @endcan
                        @can('view-any', App\Models\CaseHear::class)
                        <li class="nav-item">
                            <a href="{{ route('case-hears.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ሰሚ ችሎት</p>
                            </a>
                        </li>
                        @endcan
                        
                        @can('view-any', App\Models\Appointment::class)
                        <li class="nav-item">
                            <a href="{{ route('appointments.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ቀጠሮ</p>
                            </a>
                        </li>
                        @endcan
                        @can('view-any', App\Models\Decision::class)
                        <li class="nav-item">
                            <a href="{{ route('decisions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ውሳኔ</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>



                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                        የመዳረሻ አስተዳደር
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ሚናዎች</p>
                            </a>
                        </li>
                        @endcan

                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-on"></i>
                                <p>ፈቃዶች</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                @endauth

                <!-- <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1//index.html" target="_blank" class="nav-link">
                        <i class="nav-icon icon ion-md-help-circle-outline"></i>
                        <p>Docs</p>
                    </a>
                </li> -->

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('ውጣ') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>