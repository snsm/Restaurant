<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-insertMenu">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">
            <label>添加菜品</label>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">

            {!! Form::open(['route'=>'admin.menu-insert','files'=>'true','class'=>'am-form','data-am-validator']) !!}
            <fieldset>
                <div class="am-form-group" style="text-align: left;">

                    <div class="am-form-group">
                        {!! Form::label('menu_name','菜品名称：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('menu_name',null,['id'=>'doc-vld-name-2','placeholder'=>'输入菜品名称','required'=>'required']) !!}
                    </div>

                    <div class="am-form-group">
                        {!! Form::label('menu_description','菜品描述：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('menu_description',null,['id'=>'doc-vld-name-2','placeholder'=>'输入菜品描述','required'=>'required']) !!}
                    </div>

                    <div class="am-form-group">
                        <label for="doc-select-1">属于菜系</label>
                        <select id="doc-select-1" required name="sort_id">
                            <option value="">选择菜系</option>
                            @foreach($sorts as $list)
                                <option value="{{ $list['sort_id'] }}">{{ $list['sort_name'] }}</option>
                            @endforeach
                        </select>
                        <span class="am-form-caret"></span>
                    </div>

                    <div class="am-form-group">
                        {!! Form::label('menu_price','菜品价格：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('menu_price',null,['id'=>'doc-vld-name-2','placeholder'=>'输入菜品价格','required'=>'required']) !!}
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