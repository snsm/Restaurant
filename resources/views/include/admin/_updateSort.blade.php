<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-{{ $list['sort_id'] }}">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">
            <label>修改菜品类别</label>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">

            <form action="{{ route('admin.menu-sort-update') }}" method="post" class="am-form" data-am-validator>
                <fieldset>
                    <div class="am-form-group" style="text-align: left;">
                        <label for="doc-vld-name-2">菜品名称：</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="sort_id" value="{{ $list['sort_id'] }}">
                        <input type="text" id="doc-vld-name-2" placeholder="输入菜品名称" name="sort_name" value="{{ $list['sort_name'] }}" required/>
                    </div>
                    <button class="am-btn am-btn-secondary" type="submit">提交</button>
                </fieldset>
            </form>

        </div>
    </div>
</div>