@extends('layouts.admin')

@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">菜品分类管理列表</strong></div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-12">
                    <a href="" class="am-btn am-btn-default am-fr am-btn-sm" style="margin-left: 6px;">刷新</a>
                    <button type="button"  class="am-btn am-btn-primary am-fr am-btn-sm" data-am-modal="{target: '#doc-modal-insertSort', closeViaDimmer: 0, width: 400, height: 200}"> 添加菜品类别 </button>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th>ID</th><th>菜品类别</th><th>菜品数量</th><th>排序</th><th>创建时间</th><th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0; ?>
                        @foreach($sort as $list)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $list['sort_id'] }}</td>
                                <td>{{ $list['sort_name'] }}</td>
                                <td><a href="#"><span class="am-badge am-badge-success">{{ $result[$i]['count'] }}</span></a></td>
                                <td>
                                    <input type="text" style="width:30px;height:24px; text-align: center; border:solid 1px #f2dede;" name="sort" value="{{ $list['sort_order'] }}" onchange="changeSort(this,{{ $list['sort_id'] }})"/>
                                </td>
                                <td>{{ $list['created_at'] }}</td>
                                <td>
                                    <button class="am-btn am-btn-xs am-btn-success" data-am-modal="{target: '#doc-modal-{{ $list['sort_id'] }}', closeViaDimmer: 0, width: 400, height: 200}">修改</button>
                                    @include('include.admin._updateSort')

                                    <a href="javascript:;" onclick="delSort({{ $list['sort_id'] }})" class="am-btn am-btn-xs am-btn-danger" style="color:white;">删除</a>
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

        @include('include.admin._footer')
    </div>
    <!-- content end -->
@endsection

@include('include.admin._insertSort')