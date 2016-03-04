<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link rel="apple-touch-icon-precomposed" href="/assets/images/ios/fickle-logo-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/ios/fickle-logo-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/ios/fickle-logo-114.png" />

    <link rel="shortcut icon" href="/assets/images/ico/fab.ico">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="/assets/css/plugins/pace.css">
    <script src="/assets/js/pace.min.js"></script>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/plugins/selectize.bootstrap3.css">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>



</head>

    <body class="">
        @include('layouts.topnav')

        <section id="main-container">

            @include('layouts.leftnav')

            <section id="min-wrapper">
                <div id="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="ls-top-header">@yield('title')</h3>
                                <ol class="breadcrumb">
                                    <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                                    @yield('breadcrumbs')
                                </ol>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!--Layout Script start -->
        <script type="text/javascript" src="/assets/js/color.js"></script>
        <script type="text/javascript" src="/assets/js/lib/jquery-1.11.min.js"></script>
        <script src="/assets/js/lib/jqueryui.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/assets/js/multipleAccordion.js"></script>
        <script src="/assets/js/lib/jquery.easing.js"></script>
        <script src="/assets/js/jquery.nanoscroller.min.js"></script>
        <script src="/assets/js/switchery.min.js"></script>
        <script src="/assets/js/bootstrap-switch.js"></script>
        <script src="/assets/js/jquery.easypiechart.min.js"></script>
        <script src="/assets/js/bootstrap-progressbar.min.js"></script>
        <script type="text/javascript" src="/assets/js/pages/layout.js"></script>
        <script src="/assets/js/loader/spin.js"></script>
        <script src="/assets/js/loader/ladda.js"></script>
        <script src="/assets/js/pages/buttonSwitch.js"></script>
        <script src="/assets/js/selectize.min.js"></script>
        <script src="/assets/js/pages/selectTag.js"></script>
    </body>
</html>