<script>
    //删除菜品分类
    function delSort(id){
        layer.confirm('您确定要删除码？',{
            btn:['确定','取消']
        },function(){
            $.post("{{ url('admin/sorts-list') }}/"+id,{'_method':'get'},function(data){
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

    //删除菜品管理
    function delMenu(id){
        layer.confirm('您确定要删除码？',{
            btn:['确定','取消']
        },function(){
            $.post("{{ url('admin/menus-list') }}/"+id,{'_method':'get'},function(data){
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