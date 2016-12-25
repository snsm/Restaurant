<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>鄱阳县朋友圈全民餐厅</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <!-- Le styles -->
    <link rel="stylesheet" href="{{ elixir('build/wechat/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ elixir('build/wechat/css/buttons.css') }}">
    <link rel="stylesheet" href="{{ elixir('build/wechat/css/flat.css') }}">
    <link rel="stylesheet" href="{{ elixir('build/wechat/css/font-awesome.css') }}">

    <style rel="stylesheet">
        .sidebar-nav nav {
            background-color: #ffffff;
            box-shadow: inset -10px 0px 40px #ffffff;
        }
        .sidebar-nav nav dl dd.active {
            color: #fff;
            background-color: #52b13c;
        }
        .sidebar-nav nav dl dd {
            border-bottom-color: #ddd;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }
        .footFix button {
            background-color: #52b13c;
        }
        .panel {
            width: 100%;
            margin-bottom: 3px;
            border: 1px solid #f5f5f5;
            background-color: #f5f5f5;
            border-radius: 0px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            position: fixed;
            z-index: 1000;
        }
        .well,.row  {
            margin-top: 50px;
        }
        .sidebar-nav nav dl dd a {
            text-decoration: none;
        }
        .panel-body {
            padding-top: 12px;
            padding-right: 15px;
            padding-bottom: 12px;
            padding-left: 15px;
        }
        .badge {
            background-color: #eb3634;
            padding: 2px 5px;
            font-weight: normal;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->

</head>
<body>

@yield('content')

<script src="{{ asset('build/wechat/js/jquery.js') }}"></script>
<script src="{{ asset('build/wechat/js/bootstrap.min.js') }}"></script>

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

        setTimeout(function () {
            iG.items={
                "湘菜":[{id:"1",name:"纯瘦肉",cls:"肉品",price:"15",sels:"45",imageUrl:"images/1.jpg"},
                    {id:"2",name:"猪耳朵",cls:"肉品",price:"23",sels:"75",imageUrl:"images/2.jpg"},
                    {id:"3",name:"牛肉",cls:"肉品",price:"45",sels:"36",imageUrl:"images/3.jpg"},
                    {id:"4",name:"牛肉和牛肚",cls:"肉品",price:"85",sels:"26",imageUrl:"images/4.jpg"},
                    {id:"5",name:"排骨",cls:"肉品",price:"63",sels:"12",imageUrl:"images/5.jpg"},
                    {id:"6",name:"猪脚",cls:"肉品",price:"56",sels:"32",imageUrl:"images/6.jpg"}
                ],
                "川菜":[{id:"7",name:"罗非鱼",cls:"水产",price:"45",sels:"12",imageUrl:"images/7.jpg"},
                    {id:"8",name:"杭州虾",cls:"水产",price:"153",sels:"8",imageUrl:"images/8.jpg"},
                    {id:"9",name:"海鲜套餐",cls:"水产",price:"255",sels:"30",imageUrl:"images/9.jpg"},
                    {id:"10",name:"贝壳",cls:"水产",price:"188",sels:"8",imageUrl:"images/10.jpg"},
                    {id:"11",name:"青鱼",cls:"水产",price:"156",sels:"8",imageUrl:"images/11.jpg"},
                    {id:"12",name:"黄鱼",cls:"水产",price:"120",sels:"8",imageUrl:"images/12.jpg"}
                ],
                "粤菜":[{id:"13",name:"飘菜",cls:"蔬菜",price:"152",sels:"524",imageUrl:"images/13.jpg"},
                    {id:"14",name:"苦瓜",cls:"蔬菜",price:"154",sels:"524",imageUrl:"images/14.jpg"},
                    {id:"15",name:"西红柿辣椒黄瓜套餐",cls:"蔬菜",price:"151",sels:"524",imageUrl:"images/15.jpg"},
                    {id:"16",name:"黄瓜",cls:"蔬菜",price:"152",sels:"524",imageUrl:"images/16.jpg"},
                    {id:"17",name:"黄豆",cls:"蔬菜",price:"152",sels:"524",imageUrl:"images/17.jpg"},
                    {id:"18",name:"白苦瓜",cls:"蔬菜",price:"152",sels:"524",imageUrl:"images/18.jpg"},
                    {id:"19",name:"蔬菜套餐1",cls:"蔬菜",price:"152",sels:"524",imageUrl:"images/19.jpg"},
                    {id:"20",name:"蔬菜套餐2",cls:"蔬菜",price:"152",sels:"524",imageUrl:"images/20.jpg"},
                    {id:"20",name:"蔬菜套餐2",cls:"蔬菜",price:"152",sels:"524",imageUrl:"images/20.jpg"}
                ],
                "浙菜":[{id:"21",name:"大米",cls:"干货杂粮",price:"45",sels:"524",imageUrl:"images/21.jpg"},
                    {id:"22",name:"紫米",cls:"干货杂粮",price:"9",sels:"524",imageUrl:"images/22.jpg"},
                    {id:"23",name:"玉米",cls:"干货杂粮",price:"22",sels:"524",imageUrl:"images/23.jpg"}
                ],
                "闽菜":[{id:"24",name:"糕点",cls:"糕点",price:"152",sels:"12",imageUrl:"images/24.jpg"},
                    {id:"25",name:"糕点",cls:"糕点",price:"154",sels:"16",imageUrl:"images/25.jpg"},
                    {id:"26",name:"糕点",cls:"糕点",price:"151",sels:"18",imageUrl:"images/26.jpg"},
                    {id:"27",name:"糕点",cls:"糕点",price:"152",sels:"19",imageUrl:"images/27.jpg"},
                    {id:"28",name:"糕点",cls:"糕点",price:"152",sels:"23",imageUrl:"images/28.jpg"},
                    {id:"29",name:"糕点",cls:"糕点",price:"152",sels:"30",imageUrl:"images/29.jpg"}
                ],
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
            menuHtml += "<dd class=\""+active+"\"><a data_name=\""+ _list[i] +"\">"+ _list[i] +"</a> <h6 class='badge'>0</h6></dd>"
        }

        menuHtml += "<dd class=\""+active+"\"><a>个人中心</a></dd>"

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
            result += "<div class=\"col-md-4 clearfix foot-items\"><div class=\"col-xs-4 foot-img\"><img src=\""+_list[i].imageUrl+"\" class=\"img-responsive\" alt=\"Responsive image\" data_id=\""+_list[i].id+"\" ></div><div class=\"col-xs-6 foot-info\"><p><strong>"+_list[i].name+"</strong></p><p class=\"colred\">"+_list[i].price+"元/份</p><p><small>"+_list[i].sels+"人买过</small></p></div><div class=\"col-xs-2 icons-pick foot-pick\"><div class=\"btn_wrap\"><button class=\"minus\" style=\"display: none;\"><strong></strong></button><i style=\"display: none;\">0</i><button class=\"list_add list_id_respone\" data_id=\""+_list[i].id+"\"><strong></strong></button><em class=\"fixBig  fake\"></em></div></div></div>"
            //<button ontouchstart=\"\" class=\"list_id_respone button button-circle button-flat-primary fa fa-plus\" data_id=\""+_list[i].id+"\"></button>
        }
        return result;
    }
    function buildOrder(_list){
        var result = "<div class=\"row\" id=\"J_order_Manager\"><div class=\"col-xs-12 clearfix board_content\"><div class=\"col-xs-4 title_contain\"><p class=\"menu_title \">菜篮子</p></div><div class=\"col-xs-2\"></div><div class=\"col-xs-3 title_contain\"><button class=\"button button-rounded button-flat-action\" id=\"addOrder\">选菜</button></div><div class=\"col-xs-3 title_contain\"><button id=\"clearOder\"class=\"button button-rounded button-flat\">清空</button></div></div></div>";
        var check = true;

        for(var i in _list){
            if(_list[i].counter === 0)continue;
            check = false;
            result += "<div class=\"row gray_line\"><div class=\"col-md-12 clearfix board_content\"><div class=\"col-xs-6\"><div class=\"col-md-6 clearfix order_item_name\"><label>"+_list[i].name+"</label></div><div class=\"col-md-6 clearfix order_price\">"+_list[i].price+"元一例</div></div><div class=\"col-xs-6\"><div class=\"btn_wrap counter\"><button class=\"list_minus counter_minus fl\" style=\"display: inline-block;\" data_id=\""+_list[i].id+"\" ontouchstart=\"\"><strong></strong></button><i class=\"nocounter fl\" style=\"display: inline-block;\">"+_list[i].counter+"</i><button class=\"list_add counter_plus\" data_id=\""+_list[i].id+"\" ontouchstart=\"\"><strong></strong></button><em class=\"fixBig  fake\"></em></div></div></div></div>";


        }
        if(check){
            result += "<div class=\"row gray_line\"><div class=\"col-md-12 clearfix board_content\"><p style=\"text-align: center;\"><span>亲，还没选到心仪的菜喔，点加菜开始选菜吧！</span></p></div></div>";
        }
        return result;
    }
</script>

</body>
</html>