<script>
    var iG = iG||{};
    if(window.localStorage){
        try{
            iG = JSON.parse(localStorage["zaiG"])||{};
        }catch(e){
            localStorage.removeItem("zaiG");
            iG = iG||{};
        }
    }else{
        iG = iG||{};
    }
    $(function(){
        setTimeout(function () { window.scrollTo(0, 1); }, 0);

        /*$.ajax({
            type:"get",
            dataType:"json",
            url:"http://www.restaurant.skip.pw/api/menu-list",
            success:function(result){
                //alert(result);
                iG.items = result;
                init();//ajax成功后执行init();
            }
        });*/

        setTimeout(function () {
            iG.items={
                <?php
                    $sort= (new \App\Sort())->getSorts();
                    $menu= \App\Menu::all();
                    ?>
                @foreach($sort as $list)
                "{{ $list['title'] }} {{ $list['count'] }}":[
                    @foreach($menu as $menu_list)
                        @if($list['id']==$menu_list['menu_type'])
                    {id:"{{ $menu_list['menu_id'] }}",name:"{{ $menu_list['menu_name'] }}",cls:"{{ $menu_list['menu_description'] }}",price:"{{ $menu_list['menu_price'] }}",sels:"{{ $menu_list['menu_order'] }}",imageUrl:"{{ $menu_list['menu_pictrue'] ? 'http://'.\Request::getHttpHost().'/build/images/'.$menu_list['menu_pictrue'] :'' }}"},
                        @endif
                    @endforeach
                ],
                @endforeach
            };
            init();//ajax成功后执行init();
        }, 20);//模拟ajax请求时间


        $("body").on("click",".list_id_respone",function(){
            iG["order"] = iG["order"]||{};
            var index = $(this).attr("data_id");

            if(iG.order[index]){
                iG.order[index].counter = iG.order[index].counter + 1;
            }else{
                var obj = getIndex(index);
                iG.order[index] = obj;
                iG.order[index].counter = 1;
            }
            if(window.localStorage){
                localStorage["zaiG"] = JSON.stringify(iG);
            }
        });

        $("#myOrder").click(function(){
            $(".wrapper,#wrapper").removeClass("show");
            $(".wrapper,#wrapper").removeClass("hide");
            $("#wrapper").addClass("hide");
            $("#wrapper2").addClass("show")
            //$("#J_order_Manager").siblings("div").remove();
            $("#J_order_list").html(buildOrder(iG.order));
            $("#price_txt").html(countPrice() + "元");
        });
        $("body").on("click","#addOrder",function(){
            $(".wrapper,#wrapper").removeClass("show");
            $(".wrapper,#wrapper").removeClass("hide");
            $("#wrapper").addClass("show");
            $("#wrapper2").addClass("hide");
        });
        $("body").on("click",".foot-img img",function(){
            $("#imgViewer img").attr("src",$(this).attr("src"));

            $("#imgViewer").show();
            var item = getIndex($(this).attr("data_id"));
            $("#J_imgInfo").html("<strong>"+ item.name +"</strong><span class=\"colred\">"+ item.price +"元/份</span><small>"+ item.sels +"人买过</small>");
            var img = new Image();
            img.src = $(this).attr("src");
            if(img.complete){
                $(".imgViewer_contain").css("max-width",img.width + "px")
                $("#imgViewer .imgViewer_contain").css("margin-top",$(window).height() / 2 - img.height / 2 + "px");
                img = null;
            }else{
                img.onload=function(){
                    $(".imgViewer_contain").css("max-width",this.width + "px");
                    $("#imgViewer .imgViewer_contain").css("margin-top",$(window).height() / 2 - img.height / 2 + "px");
                    img = null;
                };
            }
        });
        $("body").on("click","#imgViewer",function(){
            $("#imgViewer").hide();
        });

        $("body").on("click",".counter_plus",function(){
            iG["order"] = iG["order"]||{};
            var index = $(this).attr("data_id");

            if(iG.order[index]){
                iG.order[index].counter = iG.order[index].counter + 1;
            }else{
                var obj = getIndex(index);
                iG.order[index] = obj;
                iG.order[index].counter = 1;
            }
            $(this).siblings(".nocounter").html(iG.order[index].counter);
            $("#price_txt").html(countPrice() + "元");
            if(window.localStorage){
                localStorage["zaiG"] = JSON.stringify(iG);
            }
        });

        $("body").on("click",".counter_minus",function(){
            iG["order"] = iG["order"]||{};
            var index = $(this).attr("data_id");
            if(iG.order[index].counter === 0)return;
            if(iG.order[index]){
                iG.order[index].counter = iG.order[index].counter - 1;
            }else{
                var obj = getIndex(index);
                iG.order[index] = obj;
                iG.order[index].counter = 1;
            }
            $(this).siblings(".nocounter").html(iG.order[index].counter);
            $("#price_txt").html(countPrice() + "元");
            if(window.localStorage){
                localStorage["zaiG"] = JSON.stringify(iG);
            }
        });

        $("body").on("click","#clearOder",function(){
            iG["order"] = {};
            $("#J_order_list").html(buildOrder(iG.order));
            $("#price_txt").html(countPrice() + "元");
            if(window.localStorage){
                localStorage["zaiG"] = JSON.stringify(iG);
            }
        });

        $("body").on("click","#J_menuList dd a",function(){
            iG.indexMenu = $(this).attr("data_name");
            $("#J_list_Container").html(listManger(iG.items));
            $("#J_menuList .active").removeClass("active");
            $(this).parent("dd").addClass("active");
        });
        $("#remote_order").click(function(){
            $(".nav-tabs li.active").removeClass("active");
            $(this).parent("li").addClass("active");
            $("#form_desk").slideUp();
            $("#form_more").slideUp();
            $("#form_info").slideDown();
        });
        $("#now_order").click(function(){
            $(".nav-tabs li.active").removeClass("active");
            $(this).parent("li").addClass("active");
            $("#form_desk").slideDown();
            $("#form_more").slideDown();
            $("#form_info").slideUp();
        });
        $("#J_btn_reg").click(function(){
            $("#form_info").toggle("normal","linear");

        });
        $("#submitOrder").click(function(){
            $(".viewer:visible").removeClass("show").addClass("hide");
            $("#submitView").removeClass("hide").addClass("show");
        })
        $("#cancelSubmit").click(function(){
            $(".viewer:visible").removeClass("show").addClass("hide");
            $("#wrapper2").removeClass("hide").addClass("show");
        });
    });
    function init(){
        setMenu(iG.items);
        $("#J_list_Container").html(listManger(iG.items));
        $("#loadingView").addClass("hide");
    }

    function setMenu(_list){
        iG.menu = [];
        iG.indexMenu = (function(){
            var menu;
            var count = 0;
            for(var i in _list){
                if(count===0){
                    menu =  i;
                }
                count++;
                iG.menu.push(i);
            }
            return menu;
        })();
        buildMenu(iG.menu);
    }

    function buildMenu(_list){
        var menuHtml = "<dl>";
        var active;
        for(var i in _list){
            active = "";
            if(_list[i]===iG.indexMenu)active = "active";
            menuHtml += "<dd class=\""+active+"\"><a data_name=\""+ _list[i] +"\">"+ _list[i] +"</a></dd>"

        }
        menuHtml += "</dl>";
        $("#J_menuList").html(menuHtml);
    }

    function getIndex(_id){
        var indexList = iG.items[iG.indexMenu];
        for(var i in indexList){
            if(indexList[i].id===_id){
                return indexList[i]
            }
        }
    }
    function submit(){
        var data = iG.order;
        var result = [];
        for(var i in data){
            result.push({id:iG.order[i].id,counter:iG.order[i].counter});
        }
        return JSON.stringify(result);
    }

    function countPrice(){
        var price = 0;
        for(var i in iG.order){
            price += Number(iG.order[i].price)*iG.order[i].counter;
        }
        return price;
    }
    function listManger(_list){
        var result = "";
        var listArr = [];
        var indexList = _list[iG.indexMenu];
        for(var i in indexList){
            listArr.push(indexList[i]);
            if(Math.floor(i/3)===0&&i>2){
                result += "<div class=\"row\">";
                result += buildList(listArr);
                result += "</div>";
                listArr = [];
            }
        }
        result += "<div class=\"row\">";
        result += buildList(listArr);
        result += "</div>";
        return result;
    }
    function buildList(_list){
        var result = "";
        for(var i in _list){
            result += "<div class=\"col-md-4 clearfix foot-items\"><div class=\"col-xs-4 foot-img\"><img src=\""+_list[i].imageUrl+"\" class=\"img-responsive\" alt=\"Responsive image\" data_id=\""+_list[i].id+"\" ></div><div class=\"col-xs-6 foot-info\"><p><strong>"+_list[i].name+"</strong></p><p class=\"colred\">"+_list[i].price+"元/份</p></div><div class=\"col-xs-2 icons-pick foot-pick\"><div class=\"btn_wrap\"><button class=\"minus\" style=\"display: none;\"><strong></strong></button><i style=\"display: none;\">0</i><button class=\"list_add list_id_respone\" data_id=\""+_list[i].id+"\"><strong></strong></button><em class=\"fixBig  fake\"></em></div></div></div>"
            //<button ontouchstart=\"\" class=\"list_id_respone button button-circle button-flat-primary fa fa-plus\" data_id=\""+_list[i].id+"\"></button>
        }
        return result;
    }
    function buildOrder(_list){
        var result = "<div class=\"row\" id=\"J_order_Manager\"><div class=\"col-xs-12 clearfix board_content\"><div class=\"col-xs-4 title_contain\"><p class=\"menu_title \">购物车</p></div><div class=\"col-xs-2\"></div><div class=\"col-xs-3 title_contain\"><button class=\"button button-rounded button-flat-action\" id=\"addOrder\">选菜</button></div><div class=\"col-xs-3 title_contain\"><button id=\"clearOder\"class=\"button button-rounded button-flat\">清空</button></div></div></div>";
        var check = true;

        for(var i in _list){
            if(_list[i].counter === 0)continue;
            check = false;
            result += "<div class=\"row gray_line\"><div class=\"col-md-12 clearfix board_content\"><div class=\"col-xs-6\"><div class=\"col-md-6 clearfix order_item_name\"><label>"+_list[i].name+"</label></div><div class=\"col-md-6 clearfix order_price\">"+_list[i].price+"元/份</div></div><div class=\"col-xs-6\"><div class=\"btn_wrap counter\"><button class=\"list_minus counter_minus fl\" style=\"display: inline-block;\" data_id=\""+_list[i].id+"\" ontouchstart=\"\"><strong></strong></button><i class=\"nocounter fl\" style=\"display: inline-block;\">"+_list[i].counter+"</i><button class=\"list_add counter_plus\" data_id=\""+_list[i].id+"\" ontouchstart=\"\"><strong></strong></button><em class=\"fixBig  fake\"></em></div></div></div></div>";


        }
        if(check){
            result += "<div class=\"row gray_line\"><div class=\"col-md-12 clearfix board_content\"><p style=\"text-align: center;\"><span>亲，还没选到心仪的菜喔，点加菜开始选菜吧！</span></p></div></div>";
        }
        return result;
    }
</script>