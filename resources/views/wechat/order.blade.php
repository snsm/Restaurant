@extends('layouts.wechat')

@section('content')
    <script>
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
        });
    </script>

    <div id="wrapper2" class="viewer wrapper countpage clearfix show" style="display:none">
        <section class="order_title">
            <div class="container" id="">
                <div class="col-md-12 clearfix foot_orderList">
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="notice"> </p>
                        </div>
                        <div class="col-xs-6">
                            <p class="notice tar"> 共计 <span class="price" id="price_txt">46元</span> </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="oder_content">
            <div class="container" id="J_order_list">
                <div class="row" id="J_order_Manager">
                    <div class="col-xs-12 clearfix board_content">
                        <div class="col-xs-4 title_contain">
                            <p class="menu_title ">我的订单</p>
                        </div>
                        <div class="col-xs-2">
                        </div>

                        <div class="col-xs-3 title_contain">

                        </div>
                    </div>
                </div>
                <div class="row gray_line">
                    <div class="col-md-12 clearfix board_content"> <div class="col-xs-6"> <div class="col-md-6 clearfix order_item_name"> <label>五花肉</label> </div><div class="col-md-6 clearfix order_price">23元一份</div> </div><div class="col-xs-6"><div class="btn_wrap counter"><i class="nocounter fl" style="display: inline-block;">1</i></div></div></div>
                </div>
                <div class="row gray_line">
                    <div class="col-md-12 clearfix board_content"> <div class="col-xs-6"> <div class="col-md-6 clearfix order_item_name"> <label>小青菜</label> </div><div class="col-md-6 clearfix order_price">8元一份</div> </div><div class="col-xs-6"><div class="btn_wrap counter"><i class="nocounter fl" style="display: inline-block;">2</i></div></div></div>
                </div>
            </div>
        </section>
    </div>

@endsection