<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>鄱阳县朋友圈全民餐厅</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <!-- Le styles -->
    <link rel="stylesheet" href="{{ elixir('build/wechat/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ elixir('build/wechat/css/buttons.css') }}">
    <link rel="stylesheet" href="{{ elixir('build/wechat/css/flat.css') }}">
    <link rel="stylesheet" href="{{ elixir('build/wechat/css/font-awesome.css') }}">

    <style rel="stylesheet">
        .sidebar-nav nav {
            background-color: #ffffff;
            box-shadow: inset -10px 0px 40px #ffffff;
        }
        .sidebar-nav nav dl dd.active {
            color: #fff;
            background-color: #52b13c;
        }
        .sidebar-nav nav dl dd {
            border-bottom-color: #ddd;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }
        .footFix button {
            background-color: #52b13c;
        }
        .panel {
            width: 100%;
            margin-bottom: 3px;
            border: 1px solid #f5f5f5;
            background-color: #f5f5f5;
            border-radius: 0px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            position: fixed;
            z-index: 1000;
        }
        .well,.row  {
            margin-top: 50px;
        }
        .sidebar-nav nav dl dd a {
            text-decoration: none;
        }
        .panel-body {
            padding-top: 12px;
            padding-right: 15px;
            padding-bottom: 12px;
            padding-left: 15px;
        }
        .badge {
            background-color: #eb3634;
            padding: 2px 5px;
            font-weight: normal;
        }

        div.foot-items {
            padding-left: 4px;
            padding-right: 14px;
        }
        .img-responsive {
            width: 80px;
            height: 50px;
        }
        .footLeft {
            right: 30px;
        }
        .foot-pick {
            padding: 20px 0;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->

</head>
<body>

@yield('content')

<script src="{{ asset('build/wechat/js/jquery.js') }}"></script>
<script src="{{ asset('build/wechat/js/bootstrap.min.js') }}"></script>

@yield('script')
</body>
</html>