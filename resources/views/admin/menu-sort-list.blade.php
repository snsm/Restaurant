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
                            <tr>
                                <td>1</td>
                                <td>粤菜</td>
                                <td><a href="#"><span class="am-badge am-badge-success">3</span></a></td>
                                <td>
                                    <input type="text" style="width:30px;height:24px; text-align: center; border:solid 1px #f2dede;" name="sort" value="0" onchange="changeSort(this,1)"/>

                                    <script>
                                        function changeSort(obj,id){
                                            var sort = $(obj).val();
                                            $.post("{{url('')}}",{'_token':'{{csrf_token()}}','id':id,'sort':sort},function(data){
                                                if(data.status=0){
                                                    location.href = location.href;
                                                    layer.msg(data.msg, {icon:5});
                                                }else{
                                                    location.href = location.href;
                                                    layer.msg(data.msg, {icon:6});
                                                }
                                            });
                                        }
                                    </script>

                                </td>
                                <td>2016-12-25</td>
                                <td>
                                    <button class="am-btn am-btn-xs am-btn-success" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 400, height: 200}">修改</button>
                                    @include('include.admin._updateSort')

                                    <a href="javascript:;" onclick="delSort(1)" class="am-btn am-btn-xs am-btn-danger" style="color:white;">删除</a>
                                    @include('include.admin._ajax_del')

                                </td>
                            </tr>

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