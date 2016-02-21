<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Mosaddek" />
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>Admin Dashboard</title>

    <!--easy pie chart-->
    <link href="/assets/js/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

    <!--vector maps -->
    <link rel="stylesheet" href="/assets/js/vector-map/jquery-jvectormap-1.1.1.css">

    <!--right slidebar-->
    <link href="/assets/css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="/assets/js/switchery/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--jquery-ui-->
    <link href="/asset/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

    <!--iCheck-->
    <link href="/asset/js/icheck/skins/all.css" rel="stylesheet">

    <link href="/asset/css/owl.carousel.css" rel="stylesheet">


    <!--common style-->
    <link href="/asset/css/style.css" rel="stylesheet">
    <link href="/asset/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/asset/js/html5shiv.js"></script>
    <script src="/asset/js/respond.min.js"></script>
    <![endif]-->
</head>
</head>
<body class="sticky-header">


    @yield('content')

            <!-- Placed js at the end of the document so the pages load faster -->
    <script src="/asset/js/jquery-1.10.2.min.js"></script>

    <!--jquery-ui-->
    <script src="/asset/js/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

    <script src="/asset/js/jquery-migrate.js"></script>
    <script src="/asset/js/bootstrap.min.js"></script>
    <script src="/asset/js/modernizr.min.js"></script>

    <!--Nice Scroll-->
    <script src="/asset/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--right slidebar-->
    <script src="/asset/js/slidebars.min.js"></script>

    <!--switchery-->
    <script src="/asset/js/switchery/switchery.min.js"></script>
    <script src="/asset/js/switchery/switchery-init.js"></script>

    <!--flot chart -->
    <script src="/asset/js/flot-chart/jquery.flot.js"></script>
    <script src="/asset/js/flot-chart/flot-spline.js"></script>
    <script src="/asset/js/flot-chart/jquery.flot.resize.js"></script>
    <script src="/asset/js/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="/asset/js/flot-chart/jquery.flot.pie.js"></script>
    <script src="/asset/js/flot-chart/jquery.flot.selection.js"></script>
    <script src="/asset/js/flot-chart/jquery.flot.stack.js"></script>
    <script src="/asset/js/flot-chart/jquery.flot.crosshair.js"></script>


    <!--earning chart init-->
    <script src="/asset/js/earning-chart-init.js"></script>


    <!--Sparkline Chart-->
    <script src="/asset/js/sparkline/jquery.sparkline.js"></script>
    <script src="/asset/js/sparkline/sparkline-init.js"></script>

    <!--easy pie chart-->
    <script src="/asset/js/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/asset/js/easy-pie-chart.js"></script>


    <!--vectormap-->
    <script src="/asset/js/vector-map/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/asset/js/vector-map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/asset/js/dashboard-vmap-init.js"></script>

    <!--Icheck-->
    <script src="/asset/js/icheck/skins/icheck.min.js"></script>
    <script src="/asset/js/todo-init.js"></script>

    <!--jquery countTo-->
    <script src="/asset/js/jquery-countTo/jquery.countTo.js"  type="text/javascript"></script>

    <!--owl carousel-->
    <script src="/asset/js/owl.carousel.js"></script>


    <!--common scripts for all pages-->

    <script src="/asset/js/scripts.js"></script>


    <script type="text/javascript">

        $(document).ready(function() {

            //countTo

            $('.timer').countTo();

            //owl carousel

            $("#news-feed").owlCarousel({
                navigation : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true,
                autoPlay:true
            });
        });

        $(window).on("resize",function(){
            var owl = $("#news-feed").data("owlCarousel");
            owl.reinit();
        });

    </script>
</body>
</html>