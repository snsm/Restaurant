<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-{{ $menu_list['menu_id'] }}">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">
            <label>更新菜品</label>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">

            {!! Form::open(['route'=>'admin.menu-update','files'=>'true','class'=>'am-form','data-am-validator']) !!}
            <fieldset>
                <div class="am-form-group" style="text-align: left;">
                    <div class="am-form-group" style="text-align: center;">
                        <img class="am-radius" alt="100*80" src="{{ url('build/images/'.$menu_list['menu_pictrue'])}}" width="100" height="80" />
                    </div>

                    <div class="am-form-group">
                        {!! Form::label('menu_name','菜品名称：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('menu_name',$menu_list['menu_name'],['id'=>'doc-vld-name-2','placeholder'=>'输入菜品名称','required'=>'required']) !!}
                    </div>

                    <div class="am-form-group">
                        {!! Form::label('menu_description','菜品描述：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('menu_description',$menu_list['menu_description'],['id'=>'doc-vld-name-2','placeholder'=>'输入菜品描述','required'=>'required']) !!}
                    </div>

                    <div class="am-form-group">
                        <label for="doc-select-1">属于菜系</label>
                        <select id="doc-select-1" name="sort_id"  required>
                            <option value="">选择菜系</option>
                            @foreach($sorts as $lists)
                                <option value="{{ $lists['sort_id'] }}" @if($lists['sort_id'] == $menu_list['menu_type']) selected @endif >{{ $lists['sort_name'] }}</option>
                            @endforeach
                        </select>
                        <span class="am-form-caret"></span>
                    </div>

                    <div class="am-form-group">
                        {!! Form::label('menu_price','菜品价格：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('menu_price',$menu_list['menu_price'],['id'=>'doc-vld-name-2','placeholder'=>'输入菜品价格','required'=>'required']) !!}
                        {!! Form::hidden('menu_id',$menu_list['menu_id']) !!}
                    </div>

                    <div class="am-form-group am-form-file">
                        {!! Form::button('<i class="am-icon-cloud-upload"></i> 选择要上传的菜品图片',['class'=>'am-btn am-btn-danger am-btn-sm']) !!}
                        {!! Form::file('menu_pictrue',['multiple'=>'multiple']) !!}
                    </div>

                </div>
                {!! Form::submit('提交',['class'=>'am-btn am-btn-secondary']) !!}

            </fieldset>
            {!! Form::close() !!}

        </div>
    </div>
</div>