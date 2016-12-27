<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>鄱阳县朋友圈时尚餐厅点餐系统</title>
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}"/>
    <link rel="stylesheet" href="{{ elixir('css/admin.css') }}">
</head>
<body>

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <small>鄱阳县朋友圈时尚餐厅点餐系统</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="{{ route('admin.logout') }}"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="{{ route('admin.index') }}"><span class="am-icon-home"></span> 首页</a></li>
                <li><a href="{{ route('admin.user-list') }}"><span class="am-icon-pencil-square-o"></span> 用户管理</a></li>
                <li><a href="{{ route('admin.menu-sort-list') }}"><span class="am-icon-pencil-square-o"></span> 菜品分类</a></li>
                <li><a href="{{ route('admin.menu-list') }}"><span class="am-icon-pencil-square-o"></span> 菜品管理</a></li>
                <li><a href="{{ route('admin.order-list') }}"><span class="am-icon-pencil-square-o"></span> 订单管理</a></li>
                <li><a href="index.html"><span class="am-icon-pencil-square-o"></span> 生成二维码</a></li>
                <li><a href=""><span class="am-icon-pencil-square-o"></span> 消息推送</a></li>
                <li><a href="{{ route('admin.logout') }}"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>
        </div>
    </div>
    <!-- sidebar end -->

    @yield('content')

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<script src="{{ elixir('js/jquery.js') }}"></script>
<script src="{{ elixir('js/all.js') }}"></script>
<script src="{{ asset('build/layer/layer.js') }}"></script>
</body>
</html>
