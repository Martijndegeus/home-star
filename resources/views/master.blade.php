<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Home St&star;r</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="hold-transition sidebar-mini menu-hidden">
<div class="wrapper" id="app">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="sidebar">
            <nav>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <router-link to="/dashboard" class="nav-link">
                            <dashboard-icon class="mr-2"></dashboard-icon> Dashboard
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/Settings" class="nav-link">
                            <wrench-icon class="mr-2"></wrench-icon> Settings
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">

                <router-view></router-view>

                <vue-progress-bar></vue-progress-bar>

            </div>
        </div>
    </div>

</div>

<script src="{{ mix('js/app.js') }}"></script>
<script>
    let body = document.getElementsByTagName('body')[0];
    let menuToggle = document.getElementById('menu_toggle');
    let sidebar = document.getElementsByClassName('main-sidebar')[0];

    menuToggle.addEventListener('click', function(e) {
        e.preventDefault();

        body.classList.toggle('menu-hidden');
    }, false);

    sidebar.addEventListener('click', function(e) {
        e.preventDefault();

        body.classList.toggle('menu-hidden');
    }, false);

    document.addEventListener("DOMContentLoaded", function(event) {
        let cube = document.getElementsByClassName('cube')[0];
    });

    function showMorningDashboard() {
        let cube = document.getElementsByClassName('cube')[0];
        cube.classList.remove('show-top', 'show-bottom', 'show-front', 'show-back');
        cube.classList.add('show-back');
    }

    function showDayDashboard() {
        let cube = document.getElementsByClassName('cube')[0];
        cube.classList.remove('show-top', 'show-bottom', 'show-front', 'show-back');
        cube.classList.add('show-top');
    }

    function showNightDashboard() {
        let cube = document.getElementsByClassName('cube')[0];
        cube.classList.remove('show-top', 'show-bottom', 'show-front', 'show-back');
        cube.classList.add('show-bottom');
    }

    function showGeneralDashboard() {
        let cube = document.getElementsByClassName('cube')[0];
        cube.classList.remove('show-top', 'show-bottom', 'show-front', 'show-back');
        cube.classList.add('show-front');
    }

</script>
</body>
</html>
