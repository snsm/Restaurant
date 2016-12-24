(function($) {
  'use strict';

  $(function() {
    var $fullText = $('.admin-fullText');
    $('#admin-fullscreen').on('click', function() {
      $.AMUI.fullscreen.toggle();
    });

    $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
      $fullText.text($.AMUI.fullscreen.isFullscreen ? '退出全屏' : '开启全屏');
    });
  });
})(jQuery);

//**********点餐加减Jquery代码
$(function(){
  $(".add").click(function(){
    var t=$(this).parent().find('input[class*=text_box]');
    t.val(parseInt(t.val())+1)
    setTotal();
  })


  $(".min").click(function(){
    var t = $(this).parent().find('input[class*=text_box]');
    t.val(parseInt(t.val())-1)
    if(parseInt(t.val())<0){
      t.val(0);
    }
    setTotal();
  })

  function setTotal(){
    var s=0;
    $(".tab span").each(function(){
      s +=parseInt($(this).find('input[class*=text_box]').val())*parseFloat($(this).find('label[class*=price]').text());
    });
    $(".totals").html(s.toFixed(2));
  }

  setTotal();

})