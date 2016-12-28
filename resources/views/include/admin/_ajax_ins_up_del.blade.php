<script>
    //更新菜品分类排序
    function changeSort(obj,id){
        var sort = $(obj).val();
        $.post("{{url('admin/menu-sort-order')}}",{'_token':'{{csrf_token()}}','id':id,'sort':sort},function(data){
            if(data.status=0){
                location.href = location.href;
                layer.msg(data.msg, {icon:5});
            }else{
                location.href = location.href;
                layer.msg(data.msg, {icon:6});
            }
        });
    }


    //删除菜品分类
    function delSort(id){
        layer.confirm('您确定要删除码？',{
            btn:['确定','取消']
        },function(){
            $.post("{{ url('admin/menu-sort-list') }}/"+id,{'_method':'get'},function(data){
                if(data.status=0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon:6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon:5});
                }
            });
        });
    }

    //更新菜品排序
    function changeMenuSort(obj,id){
        var menu_order = $(obj).val();
        $.post("menu-order",{'_token':'{{csrf_token()}}','id':id,'menu_order':menu_order},function(data){
            if(data.status=0){
                location.href = location.href;
                layer.msg(data.msg, {icon:5});
            }else{
                location.href = location.href;
                layer.msg(data.msg, {icon:6});
            }
        });
    }

    //删除菜品管理
    function delMenu(id){
        layer.confirm('您确定要删除码？',{
            btn:['确定','取消']
        },function(){
            $.post("{{ url('admin/menu-list') }}/"+id,{'_method':'get'},function(data){
                if(data.status=0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon:6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon:5});
                }
            });
        });
    }

    //删除推送文本消息
    function delMessage(id){
        layer.confirm('您确定要删除码？',{
            btn:['确定','取消']
        },function(){
            $.post("{{ url('admin/message-list') }}/"+id,{'_method':'get'},function(data){
                if(data.status=0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon:6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon:5});
                }
            });
        });
    }
</script>