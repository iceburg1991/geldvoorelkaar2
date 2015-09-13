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
            <li><a href="/auth/logout"><i class="mdi-hardware-keyboard-tab"></i> Logout</a></li>
        </ul>
        <nav class="cyan">
            <div class="nav-wrapper">

                <a href="/home" class="brand-logo center">Geldvoorelkaar</a>

                <!--{% if settings %} -->
                <ul class="right hide-on-med-and-down">
                    <li class="profile">
                        <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image right" />
                        <a href="#!" class="dropdown-button" data-activates="actions">{{ Auth::user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                    <!--<li><a href="#!" class="dropdown-button" data-activates="actions"><i class="mdi-navigation-more-vert"></i></a></li>-->
                </ul>
                <!--{% endif %}-->
                <ul class="right hide-on-med-and-down">
                    <li><a href="/projects">Projecten</a></li>
                    <li><a href="/geldvoorelkaar/app/template/settings.php">Instellingen</a></li>
                </ul>


                <ul id="slide-out" class="side-nav">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a></li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a></li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a></li>
                                    <li><a href="/auth/logout"><i class="mdi-hardware-keyboard-tab"></i> Logout</a></li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{ Auth::user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li><a href="/geldvoorelkaar"><i class="mdi-action-account-balance left"></i>Dashboard</a></li>
                    <li><a href="/geldvoorelkaar/app/template/projects.php"><i class="mdi-action-assignment left"></i>Projecten</a></li>
                    <div class="divider "></div>
                    <li><a href="/geldvoorelkaar/app/template/settings.php"><i class="mdi-action-settings left"></i>Instellingen</a></li>

                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->