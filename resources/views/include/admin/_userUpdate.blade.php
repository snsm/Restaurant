<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">
            <label>修改用户</label>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">

            <form action="" method="post" class="am-form" data-am-validator>
                <fieldset>
                    <div class="am-form-group" style="text-align: left;">
                        <label for="doc-vld-name-2">顾客姓名：</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="">
                        <input type="text" id="doc-vld-name-2"  placeholder="输入顾客姓名" name="name" value="陈小龙" required/>
                        <label for="doc-vld-name-2">顾客手机号：</label>
                        <input type="number" id="doc-vld-name-2" placeholder="输入手机号" name="mobile" value="" required/>
                    </div>
                    <button class="am-btn am-btn-secondary" type="submit">提交</button>
                </fieldset>
            </form>

        </div>
    </div>
</div>