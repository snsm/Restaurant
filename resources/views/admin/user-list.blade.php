@extends('layouts.admin')

@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户管理列表</strong></div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th>ID</th><th>微信头像</th><th>微信昵称</th><th>顾客姓名</th><th>性别</th><th>手机号</th><th>创建时间</th><th>管理</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td><img src="" width="30"></td>
                                <td>昵称</td>
                                <td>陈小龙</td>
                                <td>男</td>
                                <td>13480731740</td>
                                <td>2016-12-25</td>
                                <td>
                                    <button class="am-btn am-btn-xs am-btn-success" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 400, height: 263}">修改</button>
                                    @include('include.admin._userUpdate')

                                    <a href="#" class="am-btn am-btn-xs am-btn-danger" style="color:white;">删除</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('include.admin._footer')
    </div>
    <!-- content end -->
@endsection