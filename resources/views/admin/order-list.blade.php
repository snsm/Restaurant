@extends('layouts.admin')

@section('content')

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">订单管理</strong> / <small>未完成的订单</small></div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-12">
                    <DropDownList ID="ddlRestaurant" runat="server" AutoPostBack="true" data-am-selected="{btnSize: 'xs'}" required>
                    </DropDownList>
                    <button type="button" class="am-btn am-btn-default am-btn-xs">全部订单</button>
                    <button type="button" class="am-btn am-btn-secondary am-btn-xs">未完成的订单</button>
                    <button type="button" class="am-btn am-btn-success am-btn-xs">已完成的订单</button>
                    <button type="button" class="am-btn am-btn-danger am-btn-xs">已取消的订单</button>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th>ID</th><th>用户名</th><th>状态</th><th>桌号</th><th>总价</th><th>数量</th><th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td>1</td><td>陈小龙</td><td><a href="#">未完成</a></td> <td><span class="am-badge am-badge-success">+1</span></td>
                            <td>176.00</td>
                            <td>
                                <span class="am-badge am-badge-success">6</span>
                                <span class="am-badge am-badge-secondary">8</span>
                                <span class="am-badge am-badge-warning ">9</span>
                            </td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a href="{{ route('admin.order-detail-list') }}"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>详情</button></a>
                                        <button type="button" class="am-btn am-btn-default am-btn-xs am-text-success"><span class="am-icon-check"></span>完成订单</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span>取消订单</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- content end -->
@endsection