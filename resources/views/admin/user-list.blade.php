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
                            @foreach($user as $list)
                            <tr>
                                <td>{{ $list['id'] }}</td>
                                <td><img src="{{ $list['headimgurl'] }}" width="30"></td>
                                <td>{{ $list['nickname'] }}</td>
                                <td>{{ $list['name'] }}</td>
                                <td>{{ $list['sex_text'] }}</td>
                                <td>{{ $list['mobile'] }}</td>
                                <td>{{ $list['created_at'] }}</td>
                                <td>
                                    <button class="am-btn am-btn-xs am-btn-success" data-am-modal="{target: '#doc-modal-{{ $list['id'] }}', closeViaDimmer: 0, width: 400, height: 263}">修改</button>
                                    @include('include.admin._userUpdate')

                                    <a href="#" class="am-btn am-btn-xs am-btn-danger" style="color:white;">删除</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('include.admin._footer')
    </div>
    <!-- content end -->
@endsection