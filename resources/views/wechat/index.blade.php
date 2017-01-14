@extends('layouts.wechat')

@section('content')
    <div id="wrapper" class="viewer">
        <div id="sidebar-wrapper">
            <div class="well sidebar-nav">
                <nav id="J_menuList" class="nav nav-list">
                </nav>
            </div>
        </div>
        <div id="page-content-wrapper" class="">
            <div class="page-content">
                <div class="container" id="J_list_Container">
                </div>
            </div>
        </div>
        <footer class="footFix footLeft">
            <button id="myOrder" class="btn_change">
                菜篮子
                <span class="num">9</span>
            </button>
        </footer>
    </div>
    <div id="wrapper2" class="viewer wrapper countpage clearfix" style="display:none">
        <section class="order_title">
            <div class="container" id="">
                <div class="col-md-12 clearfix foot_orderList">
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="notice">

                            </p>
                        </div>
                        <div class="col-xs-6">
                            <p class="notice tar">
                                共计
                                <span class="price" id="price_txt">
                                315元
                            </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="oder_content">
            <div class="container" id="J_order_list">
            </div>
        </section>
        <section class="oder_submit">
            <div class="container">
                <button class="button button-rounded button-flat-action fr mgtbr8" id="submitOrder">
                    下单
                </button>
            </div>
        </section>
    </div>
    <div id="imgViewer" class="viewer" style="display:none">
        <div class="container">
            <div class="col-md-12 clearfix">
                <div class="col-xs-12 foot-info">
                    <div class="imgViewer_contain">
                        <div class="img_contain">
                            <img src="" class="img-responsive" alt="Responsive image" />
                        </div>
                        <div id="J_imgInfo" class="info_contain clearfix">
                            <strong>
                                芒果布丁2
                            </strong>
                            <span class="colred">
                            888元/粒
                        </span>
                            <small>
                                524人买过
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="submitView" class="viewer clearfix" style="display:none">
        <section class="submit_title">
            <div class="container" id="">

                <div class="col-md-12 clearfix">
                    <div class="now_submit clearfix">
                        <form role="form">

                            <div class="line-body clearfix" id="form_more">
                            <span class="fl lh43">
                               配送信息
                            </span>
                                <ul class="nav nav-pills tabdrop fr">
                                    <li class="dropdown pull-right tabdrop">
                                        <a class="dropdown-toggle" id="J_btn_reg">
                                            <i class="fa fa-th-list">
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group" id="form_info">
                                <label for="phone">
                                    手机号码
                                </label>
                                <span class="twitter-typeahead">
                                <input type="text" name="phone" class="form-control tt-query" autocomplete="off"
                                       spellcheck="false" dir="auto">
                            </span>
                                <label for="name" class="mgt10">
                                    姓名
                                </label>
                                <span class="twitter-typeahead">
                                <input type="text" name="name" class="form-control tt-query" autocomplete="off"
                                       spellcheck="false" dir="auto">
                            </span>
                                <label for="adress" class="mgt10">
                                    地址
                                </label>
                                <span class="twitter-typeahead">
                                <input type="text" name="adress" class="form-control tt-query" autocomplete="off"
                                       spellcheck="false" dir="auto">
                            </span>
                            </div>
                            <div class="form-group">
                                <div class="btn_control fr">
                                    <a class="btn btn-default bottommargin" id="cancelSubmit">
                                        取消
                                    </a>
                                    <button formaction="order.html" class="btn btn-info bottommargin" id="stickyGrowl">
                                        确认
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="loadingView" class="viewer">
        <div class="container">
            <div class="col-md-12 clearfix loading">
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('include.wechat._ajax_sort_menu')
@endsection

