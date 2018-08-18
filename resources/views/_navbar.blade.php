<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <ul id="actions" class="dropdown-content">
            <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a></li>
            <li><a href="#"><i class="mdi-action-settings"></i> Settings</a></li>
            <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a></li>
            <li><a href="{{ url('/logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        <nav class="cyan">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="/home" class="brand-logo center">@yield('title')</a>

                    <!--{% if settings %} -->
                    <ul class="right hide-on-med-and-down">
                        <li class="profile">
                            @if ( isset(Auth::user()->name) )
                                <img src="/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image right" />
                                <a href="#!" class="dropdown-button" data-activates="actions">{{ Auth::user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                            @else
                                <li><a href="{{ url('/login') }}">Inloggen</a></li>
                            @endif
                    </ul>
                    <!--{% endif %}-->
                    <ul class="right hide-on-med-and-down">
                        <li><a href="/projects">Projecten</a></li>
                        <li><a href="/geldvoorelkaar/app/template/settings.php">Instellingen</a></li>
                    </ul>


                    <ul id="slide-out" class="side-nav">
                        <li class="user-details cyan darken-2">
                            <div class="row">
                                @if ( isset(Auth::user()->name) )
                                    <div class="col col s4 m4 l4">
                                        <img src="/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                                    </div>
                                @endif
                                <div class="col col s8 m8 l8">
                                    @if ( isset(Auth::user()->name) )
                                        <ul id="profile-dropdown" class="dropdown-content">
                                            <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a></li>
                                            <li><a href="#"><i class="mdi-action-settings"></i> Settings</a></li>
                                            <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a></li>
                                            <li><a href="{{ url('/logout') }}"
                                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    @endif
                                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">
                                        @if ( isset(Auth::user()->name) )
                                            {{ Auth::user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </li>
                        @if ( isset(Auth::user()->name) )
                            <li><a href="/geldvoorelkaar"><i class="mdi-action-account-balance left"></i>Dashboard</a></li>
                            <li><a href="/geldvoorelkaar/app/template/projects.php"><i class="mdi-action-assignment left"></i>Projecten</a></li>
                            <div class="divider "></div>
                            <li><a href="/geldvoorelkaar/app/template/settings.php"><i class="mdi-action-settings left"></i>Instellingen</a></li>
                        @else
                            <li><a href="{{ url('/login') }}">Inloggen</a></li>
                        @endif
                    </ul>
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                </div>
            </div>
        </nav>
    </div>
    @if ( isset(Auth::user()->name) )
        <div class="row hide-on-large-only">
            <div class="col s12 tabpanel">
                <ul class="tabs center">
                    <li class="tab col s6 m2"><a class="active" href="#test1">Dashboard</a></li>
                    <li class="tab col s6 m2"><a href="#test2">Projecten</a></li>
                </ul>
            </div>
        </div>
        @endif
    <!-- end header nav-->
</header>
<!-- END HEADER -->