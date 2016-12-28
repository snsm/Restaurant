@extends('layouts/admin')

@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">菜品管理列表</strong></div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-12" style="margin-top:-10px;padding-bottom: 16px;">
                    <a href="" class="am-btn am-btn-default am-fr am-btn-sm" style="margin-left: 6px;">刷新</a>
                    <button type="button"  class="am-btn am-btn-primary am-fr am-btn-sm " data-am-modal="{target: '#doc-modal-insertMenu', closeViaDimmer: 0, width: 400, height: 520}"> 添加菜品 </button>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th>ID</th><th>菜品图片</th><th>菜品名称</th><th>菜品价格</th><th>属于菜系</th><th>排序</th><th>创建时间</th><th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($menu as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td><img src="{{ url('build/images/'.$list->pictrue)}}" width="55" height="45"></td>
                                <td>{{ $list->title }}</td>
                                <td><a href="#"><span class="am-badge am-badge-success">{{ $list->price }}</span></a></td>
                                <td>{{ $list->bt }}</td>
                                <td>
                                    <input type="text" style="width:30px;height:24px; text-align: center; border:solid 1px #f2dede;" name="menu_order" value="{{ $list->menu_order }}" onchange="changeMenuSort(this,{{ $list->id }})"/>
                                </td>
                                <td>{{ $list->created_at }}</td>
                                <td>
                                    <button class="am-btn am-btn-xs am-btn-success" data-am-modal="{target: '#doc-modal-{{ $list->id }}', closeViaDimmer: 0, width: 400, height: 638}">修改</button>
                                    @include('include.admin._updateMenu')

                                    <a href="javascript:;" onclick="delMenu({{ $list->id }})" class="am-btn am-btn-xs am-btn-danger" style="color:white;">删除</a>
                                    @include('include.admin._ajax_ins_up_del')

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{--BootstrapThreePresenter   <ul class="am-pagination am-pagination-right">  <li class="am-active">--}}
                </div>
            </div>
        </div>

    </div>
    <!-- content end -->
@endsection

@include('include.admin._insertMenu')