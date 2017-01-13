<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>鄱阳县朋友圈时尚餐厅点餐系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}"/>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>鄱阳县朋友圈全民餐厅点餐系统</h1>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

        {!! Form::open(['url'=>'admin/login','method'=>'POST','class'=>'am-form','data-am-validator']) !!}
        <fieldset>

        <div class="am-form-group">
        {!! Form::label('user_mobile','手机号:',['for'=>'user_mobile']) !!}
        {!! Form::number('user_mobile',null,['id'=>'user_mobile','placeholder'=>'输入手机号','required'=>'required','class'=>'js-pattern-mobile']) !!}
        </div>

        <div class="am-form-group">
            <label for="doc-vld-pwd-1">密码:</label>
            <input type="password" name="password" id="doc-vld-pwd-1" placeholder="输入密码" pattern="^\d{6}$" required/>
        </div>

        <div class="am-cf">
            {!! Form::submit('登 录',['class'=>'am-btn am-btn-primary am-btn-sm am-fl']) !!}
        </div>

        </fieldset>
        {!! Form::close() !!}

        @if (count($errors) > 0)
        <div class="am-alert am-alert-danger" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @elseif(Session::has('message'))
            <div class="am-alert am-alert-danger" data-am-alert>
                <button type="button" class="am-close">&times;</button>
                    <p>{{Session::get('message')}}</p>
            </div>
        @endif

    </div>

</div>
</body>
<script src="{{ elixir('js/jquery.js') }}"></script>
<script src="{{ elixir('js/all.js') }}"></script>
</html>