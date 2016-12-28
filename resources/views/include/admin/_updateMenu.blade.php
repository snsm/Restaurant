<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-{{ $list->id }}">
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
                        <img class="am-radius" alt="100*80" src="{{ url('build/images/'.$list->pictrue)}}" width="100" height="80" />
                    </div>

                    <div class="am-form-group">
                        {!! Form::label('title','菜品名称：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('title',$list->title,['id'=>'doc-vld-name-2','placeholder'=>'输入菜品名称','required'=>'required']) !!}
                    </div>

                    <div class="am-form-group">
                        {!! Form::label('description','菜品描述：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('description',$list->description,['id'=>'doc-vld-name-2','placeholder'=>'输入菜品描述','required'=>'required']) !!}
                    </div>

                    <div class="am-form-group">
                        <label for="doc-select-1">属于菜系</label>
                        <select id="doc-select-1" name="sorts_id"  required>
                            <option value="">选择菜系</option>
                            @foreach($sorts as $lists)
                                <option value="{{ $lists['id'] }}" @if($lists['id'] == $list->sorts_id) selected @endif >{{ $lists['title'] }}</option>
                            @endforeach
                        </select>
                        <span class="am-form-caret"></span>
                    </div>

                    <div class="am-form-group">
                        {!! Form::label('price','菜品价格：',['id'=>'doc-vld-name-2']) !!}
                        {!! Form::text('price',$list->price,['id'=>'doc-vld-name-2','placeholder'=>'输入菜品价格','required'=>'required']) !!}
                        {!! Form::hidden('id',$list->id) !!}
                    </div>

                    <div class="am-form-group am-form-file">
                        {!! Form::button('<i class="am-icon-cloud-upload"></i> 选择要上传的菜品图片',['class'=>'am-btn am-btn-danger am-btn-sm']) !!}
                        {!! Form::file('pictrue',['multiple'=>'multiple']) !!}
                    </div>

                </div>
                {!! Form::submit('提交',['class'=>'am-btn am-btn-secondary']) !!}

            </fieldset>
            {!! Form::close() !!}

        </div>
    </div>
</div>