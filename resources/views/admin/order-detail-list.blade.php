@extends('layouts.admin')

@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">

            <div class="am-cf am-padding">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">订单详情</strong> / <small>
                        <label id="lTableId" runat="server">桌号为：1</label>
                    </small>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-12">
                    <button type="button" class="am-btn am-btn-default am-btn-xs" >返回上一页</button>
                    <button type="button" class="am-btn am-btn-default am-btn-xs order-status" >全部确认</button>
                    <button type="button" class="am-btn am-btn-default am-btn-xs order-status" >全部上菜</button>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th>状态</th>
                            <th>菜名</th>
                            <th>单价</th>
                            <th>份数</th>
                            <th class="order-status">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td><span class="am-text-warning">未确认</span></td><td>上海青</td><td><a href="#">18.00</a></td> <td>1</td>
                            <td>
                                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span>取消</button>
                                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-warning"><span class="am-icon-check"></span>确认</button>
                            </td>
                        </tr>

                        <tr><td><span class="am-text-secondary">烹饪中</span></td><td>红烧鱼</td><td><a href="#">18.00</a></td> <td>1</td>
                            <td>
                                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span>取消</button>
                                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-warning"><span class="am-icon-check"></span>确认</button>
                            </td>
                        </tr>

                        <tr><td><span class="am-text-success">已上菜</span></td><td>清蒸排骨</td><td><a href="#">18.00</a></td> <td>1</td>
                            <td>
                                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span>取消</button>
                                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-warning"><span class="am-icon-check"></span>确认</button>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="5">
                                <label class="am-text-danger am-fr">合计：￥<span runat="server" id="sTotalPrice">176.00</span>元</label></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- content end -->
@endsection