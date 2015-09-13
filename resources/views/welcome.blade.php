<?php $settings = array("optie1","optie2"); ?>
@extends('master')
@section('title','Home')



@section('content')
    <div class="navbar-fixed">
        @if (count($settings) === 1)
            <ul id="actions" class="dropdown-content">
                @foreach ($settings as $setting)
                    <li><a href="#!">{{ $setting }}</a></li>
                @endforeach
            </ul>
        @endif
        <nav class="blue">
            <div class="nav-wrapper">
                <a href="/geldvoorelkaar/" class="brand-logo center">Geldvoorelkaar</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                <!--{% if settings %} -->
                <ul class="right">
                    <li><a href="#!" class="dropdown-button" data-activates="actions"><i class="mdi-navigation-more-vert"></i></a></li>
                </ul>
                <!--{% endif %}-->
                <ul class="right hide-on-med-and-down">
                    <li><a href="/geldvoorelkaar/app/template/projects.php">Projecten</a></li>
                    <li><a href="/geldvoorelkaar/app/template/settings.php">Instellingen</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="/geldvoorelkaar"><i class="mdi-action-account-balance left"></i>Dashboard</a></li>
                    <li><a href="/geldvoorelkaar/app/template/projects.php"><i class="mdi-action-assignment left"></i>Projecten</a></li>
                    <div class="divider "></div>
                    <li><a href="/geldvoorelkaar/app/template/settings.php"><i class="mdi-action-settings left"></i>Instellingen</a></li>
                </ul>
            </div>
        </nav>
    </div>
@endsection

@section('js-loading')
    <script>
        jQuery( document ).ready(function(){
            jQuery(".button-collapse").sideNav();
            jQuery('.dropdown-button').dropdown({
                        hover: true, // Activate on hover
                        constrain_width: false, // Does not change width of dropdown to that of the activator
                        gutter: 10, // Spacing from edge
                        belowOrigin: false // Displays dropdown below the button
                    }
            );
        })
    </script>
    @endsection