 //侧边上评下滚动代码
jQuery(document).ready(function($) {$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $("html") : $("body")) : $("html,body");$("#scroll_t").mouseover(function() {up()}).mouseout(function() {clearTimeout(fq)}).click(function() {$body.animate({scrollTop: 0},400)});$("#scroll_b").mouseover(function() {dn()}).mouseout(function() {clearTimeout(fq)}).click(function() {$body.animate({scrollTop: $(document).height()},400)});$("#empl").click(function() {$body.animate({scrollTop: $("#empl").offset().top},400)});});function up() {$wd = $(window);$wd.scrollTop($wd.scrollTop() - 1);fq = setTimeout("up()", 50)};function dn() {$wd = $(window);$wd.scrollTop($wd.scrollTop() + 1);fq = setTimeout("dn()", 50)}; 

// 双击自动滚屏
function initialize(){timer=setInterval("scrollwindow()",50)}function sc(){clearInterval(timer)}function scrollwindow(){window.scrollBy(0,1)}var currentpos,timer;document.onmousedown=sc,document.ondblclick=initialize;

//随机字符特效
(function($){var namespace="chaffle";var methods={init:function(options){options=$.extend({speed:20,time:140},options);return this.each(function(){var _this=this;var $this=$(this);var data=$this.data(namespace);if(!data){options=$.extend({},options);$this.data(namespace,{options:options})}var $text=$this.text();var substitution;var shuffle_timer;var shuffle_timer_delay;var shuffle=function(){$this.text(substitution);if($text.length-substitution.length>0){for(i=0;i<$text.length-substitution.length;i++){var shuffleStr=random_text.call();$this.append(shuffleStr)}}else{clearInterval(shuffle_timer)}};var shuffle_delay=function(){if(substitution.length<$text.length){substitution=$text.substr(0,substitution.length+1)}else{clearInterval(shuffle_timer_delay)}};var random_text=function(){var str;var lang=$this.data("lang");switch(lang){case"en":str=String.fromCharCode(33+Math.round(Math.random()*99));break;case"zh":str=String.fromCharCode(19968+Math.round(Math.random()*80));break;case"ja-hiragana":str=String.fromCharCode(12352+Math.round(Math.random()*50));break;case"ja-katakana":str=String.fromCharCode(12448+Math.round(Math.random()*84));break}return str};var start=function(){substitution="";clearInterval(shuffle_timer);clearInterval(shuffle_timer_delay);shuffle_timer=setInterval(function(){shuffle.call(_this)},options.speed);shuffle_timer_delay=setInterval(function(){shuffle_delay.call(this)},options.time)};$this.unbind("mouseover."+namespace).bind("mouseover."+namespace,function(){start.call(_this)})})},destroy:function(){return this.each(function(){var $this=$(this);$(window).unbind("."+namespace);$this.removeData(namespace)})}};$.fn.chaffle=function(method){if(methods[method]){return methods[method].apply(this,Array.prototype.slice.call(arguments,1))}else if(typeof method==="object"||!method){return methods.init.apply(this,arguments)}else{$.error("Method "+method+" does not exist on jQuery."+namespace)}}})(jQuery);

//返回顶部缓冲代码
function goTop(acceleration,time){acceleration=acceleration||0.1;time=time||12;var dx=0;var dy=0;var bx=0;var by=0;var wx=0;var wy=0;if(document.documentElement){dx=document.documentElement.scrollLeft||0;dy=document.documentElement.scrollTop||0}if(document.body){bx=document.body.scrollLeft||0;by=document.body.scrollTop||0}var wx=window.scrollX||0;var wy=window.scrollY||0;var x=Math.max(wx,Math.max(bx,dx));var y=Math.max(wy,Math.max(by,dy));var speed=1+acceleration;window.scrollTo(Math.floor(x/speed),Math.floor(y/speed));if(x>0||y>0){var invokeFunction="goTop("+acceleration+", "+time+")";window.setTimeout(invokeFunction,time)}};

//锚点平滑滚动代码
(function(window,$){var $window,$document,$body,$html,$bodhtml;window.AA_CONFIG=window.AA_CONFIG||{};window.AA_CONFIG=$.extend({animationLength:750,easingFunction:"linear",scrollOffset:0},window.AA_CONFIG);$(document).ready(function(){$window=$(window);$document=$(this);$body=$(document.body);$html=$(document.documentElement);$bodhtml=$body.add($html);scrollToHash();$document.find('a[href^="#"], a[href^="."]').on("click",function(){var href=$(this).attr("href");if(href.charAt(0)==="."){href=href.split("#");href.shift();href="#"+href.join("#")}if(href===location.hash){scrollToHash(href)}});$window.on("hashchange",function(){scrollToHash()});$window.on("mousewheel DOMMouseScroll touchstart mousedown MSPointerDown",function(ev){$bodhtml.stop(true,false)})});function scrollToHash(rawHash){var rawHash=rawHash||location.hash;var anchorTuple=rawHash.substring(1).split("|");var hash=anchorTuple[0];var animationTime=anchorTuple[1]||window.AA_CONFIG.animationLength;if(hash.charAt(0).search(/[A-Za-z]/)>-1){var $actualID=$document.find("#"+hash)}var $actualAnchor=$document.find('a[name="'+hash+'"]');if(($actualAnchor&&$actualAnchor.length)||($actualID&&$actualID.length)){return}var $arbitraryAnchor=$(hash).first();if($arbitraryAnchor&&$arbitraryAnchor.length){var $el=$arbitraryAnchor}else{return}if($el&&$el.length){var top=$el.offset().top-window.AA_CONFIG.scrollOffset;$bodhtml.stop(true,false).animate({scrollTop:top},parseInt(animationTime),window.AA_CONFIG.easingFunction)}}})(window,jQuery);
//草榴社区
    jQuery(document).ready(function() { function d() {document.title = document[b] ? "草榴社區" : a; } var b, c, a = document.title; "undefined" != typeof document.hidden ? (b = "hidden", c = "visibilitychange") : "undefined" != typeof document.mozHidden ? (b = "mozHidden", c = "mozvisibilitychange") : "undefined" != typeof document.webkitHidden && (b = "webkitHidden", c = "webkitvisibilitychange"), ("undefined" != typeof document.addEventListener || "undefined" != typeof document[b]) && document.addEventListener(c, d, !1); });

//微语滚动
(function (win){ 
var callboarTimer; 
var callboard = $('.text'); 
var callboardUl = callboard.find('ul'); 
var callboardLi = callboard.find('li'); 
var liLen = callboard.find('li').length; 
var initHeight = callboardLi.first().outerHeight(true); 
win.autoAnimation = function (){ 
if (liLen <= 1) return; 
var self = arguments.callee; 
var callboardLiFirst = callboard.find('li').first(); 
callboardLiFirst.animate({ 
marginTop:-initHeight 
}, 500, function (){ 
clearTimeout(callboarTimer); 
callboardLiFirst.appendTo(callboardUl).css({marginTop:0}); 
callboarTimer = setTimeout(self, 5000); 
}); 
} 
callboard.mouseenter( 
function (){ 
clearTimeout(callboarTimer); 
}).mouseleave(function (){ 
callboarTimer = setTimeout(win.autoAnimation, 5000); 
}); 
}(window)); 
setTimeout(window.autoAnimation, 5000); 
//tag切换
var obig = document.getElementById("big");
function selectTag(showContent, selfObj) {
    var tag = document.getElementById("tags").getElementsByTagName("li");
    var taglength = tag.length;
    for (i = 0; i < taglength; i++) {
        tag[i].className = "";
    }
    selfObj.parentNode.className = "selectTag";
    for (i = 0; j = document.getElementById("tagContent" + i); i++) {
        j.style.display = "none";
    }
    document.getElementById(showContent).style.display = "block";
}
var x = 0;
function scrollTag() {
    var tags = document.getElementById("tags").getElementsByTagName("a");
    if (x < 2) {
        x = x + 1
    } else x = 0;
    var tag = document.getElementById("tags").getElementsByTagName("li");
    var taglength = tag.length;
    for (i = 0; i < taglength; i++) {
        tag[i].className = "";
    }
    tags[x].parentNode.className = "selectTag";
    for (i = 0; j = document.getElementById("tagContent" + i); i++) {
        j.style.display = "none";
    }
    document.getElementById("tagContent" + x).style.display = "block";
}
var scrolll = setInterval(scrollTag, 20000);
function zhuan() {
    clearInterval(scrolll);
}
function jixu() {
    scrolll = setInterval(scrollTag,20000);
}
//navfixed//tag切换
var obig = document.getElementById("big");
function selectTag(showContent, selfObj) {
    var tag = document.getElementById("tags").getElementsByTagName("li");
    var taglength = tag.length;
    for (i = 0; i < taglength; i++) {
        tag[i].className = "";
    }
    selfObj.parentNode.className = "selectTag";
    for (i = 0; j = document.getElementById("tagContent" + i); i++) {
        j.style.display = "none";
    }
    document.getElementById(showContent).style.display = "block";
}
var x = 0;
function scrollTag() {
    var tags = document.getElementById("tags").getElementsByTagName("a");
    if (x < 2) {
        x = x + 1
    } else x = 0;
    var tag = document.getElementById("tags").getElementsByTagName("li");
    var taglength = tag.length;
    for (i = 0; i < taglength; i++) {
        tag[i].className = "";
    }
    tags[x].parentNode.className = "selectTag";
    for (i = 0; j = document.getElementById("tagContent" + i); i++) {
        j.style.display = "none";
    }
    document.getElementById("tagContent" + x).style.display = "block";
}
var scrolll = setInterval(scrollTag, 2000);
function zhuan() {
    clearInterval(scrolll);
}
function jixu() {
    scrolll = setInterval(scrollTag, 2000);
}
$(function(){
    var top=$('#navbar').offset().top;
    $(window).scroll(function(){
        if ($(window).scrollTop()>=200) { $("#navbar").addClass('topfixed');
         $("#nav").addClass('navfixed');}
            
            else  {$("#navbar").removeClass('topfixed');
            $("#nav").removeClass('navfixed');
}
    });
}
);
function embedImage() {
    var a = prompt("请输入图片的 URL 地址（包含http://）:", "http://");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[img]" + a + "[/img]")
}
function strong() {
    var a = prompt("请输入需要加粗的文字:");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[strong]" + a + "[/strong]")
}
function em() {
    var a = prompt("请输入需要斜体的文字:");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[em]" + a + "[/em]")
}
function del() {
    var a = prompt("请输入需要删除线的文字:");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[del]" + a + "[/del]")
}
function url1() {
    var a = prompt("请输入链接的 URL 地址（包含http://）:", "http://");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[url]" + a + "[/url]")
}
function underline() {
    var a = prompt("请输入需要下划线的文字:");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[u]" + a + "[/u]")
}
function code() {
    var a = prompt("请粘贴代码:");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[code]" + a + "[/code]")
}
function quote() {
    var a = prompt("请粘贴引用内容:");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[blockquote]" + a + "[/blockquote]")
}
function qq() {
    var a = prompt("请输入QQ号:");
    a && (document.getElementById("comment").value = document.getElementById("comment").value + "[qq]" + a + "[/qq]")
}
function embedSmiley() {
    "none" == $(".smilebg").css("display") ? $(".smilebg").slideDown(200) : $(".smilebg").slideUp(200)
}
function checkLength(a) {
    if (250 < a.value.length) return wenkmTips.show("您填写的评论内容已经超出250个字！"), a.value = a.value.substring(0, 250), !1;
    a = 250 - a.value.length;
    document.getElementById("num").innerHTML = a.toString();
    return !0
}
function showreply() {
    $(".form").slideToggle(500, "easeOutExpo")
}
function commentReply(a, b) {
    var c = document.getElementById("comment-post");
    b.style.display = "none";
    document.getElementById("cancel-reply").style.display = "";
    document.getElementById("comment-pid").value = a;
    b.parentNode.parentNode.appendChild(c)
}
function cancelReply() {
    var a = document.getElementById("comment-place"),
        b = document.getElementById("comment-post");
    document.getElementById("comment-pid").value = 0;
    $(".reply a").css({
        display: ""
    });
    document.getElementById("cancel-reply").style.display = "none";
    a.appendChild(b)
}
$(".open2").click(function() {
        $(".tijiao").slideDown(300)
    });
    $(".close2 a").click(function() {
        $(".tijiao").slideUp(300)
    });


$(".smile").click(function() {
        $(".smilebg").slideUp(200)
    });
    $("#commentform").submit(function() {
        var a = $("#commentform").serialize();
        $("#comment").attr("disabled", "disabled");
        $(".ajaxloading").show();
        $("#usb,.nop").hide();
        $.post($("#commentform").attr("action"), a, function(a) {
            var c = /<div class=\"main\">[\r\n]*<p>(.*?)<\/p>/i;
            c.test(a) ? ($(".error").html(a.match(c)[1]).show().fadeOut(2500), $(".ajaxloading").hide(), $("#usb,.nop").show()) : (c = $("input[name=pid]").val(), cancelReply(), $("[name=comment]").val(""), $(".commentlist").html($(a).find(".commentlist").html()), 0 != c ? (a = window.opera ? "CSS1Compat" == document.compatMode ? $("html") : $("body") : $("html,body"), a.animate({
                scrollTop: $("#comment-" + c).offset().top - 20
            }, "normal", function() {
                $(".ajaxloading").hide();
                $("#usb").show();
                $(".tijiao").slideUp(300)
            })) : (a = window.opera ? "CSS1Compat" == document.compatMode ? $("html") : $("body") : $("html,body"), a.animate({
                scrollTop: $(".commentlist").offset().top - 20
            }, "normal", function() {
                $(".ajaxloading").hide();
                $("#usb").show();
                $(".tijiao").slideUp(300)
            })));
            $("a[href*=#comment]").click(function() {
                if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
                    var a = $(this.hash),
                        a = a.length && a || $("[name=" + this.hash.slice(1) + "]");
                    if (a.length) return a = a.offset().top, $("html,body").animate({
                        scrollTop: a
                    }), !1
                }
            });
            $("#comment").attr("disabled", !1)
        });
        return !1
    });

        $(function() {
        jQuery(function() {
            function a(a, b, c) {
                if (document.selection) a.focus(), sel = document.selection.createRange(), c ? sel.text = b + sel.text + c : sel.text = b, a.focus();
                else if (a.selectionStart || "0" == a.selectionStart) {
                    var e = a.selectionStart,
                        k = a.selectionEnd,
                        g = k;
                    c ? a.value = a.value.substring(0, e) + b + a.value.substring(e, k) + c + a.value.substring(k, a.value.length) : a.value = a.value.substring(0, e) + b + a.value.substring(k, a.value.length);
                    c ? g += b.length + c.length : g += b.length - k + e;
                    e == k && c && (g -= c.length);
                    a.focus();
                    a.selectionStart = g;
                    a.selectionEnd = g
                } else a.value += b + c, a.focus()
            }
            var b = (new Date).toLocaleTimeString(),
                c = document.getElementById("comment") || 0;
            window.SIMPALED = {};
            window.SIMPALED.Editor = {
                qiandao: function() {
                    a(c, "[blockquote]签到成功！签到时间：" + b, "，每日打卡，生活更精彩哦~[/blockquote]")
                },
                good: function() {
                    a(c, "[blockquote][F1] 好羞射，文章真的好赞啊，顶博主！[/blockquote]")
                },
                bad: function() {
                    a(c, "[blockquote][F14] 有点看不懂哦，希望下次写的简单易懂一点！[/blockquote]")
                }
            }
        })
    });

function grin(a) {
    var b;
    a = " " + a + " ";
    if (document.getElementById("comment") && "textarea" == document.getElementById("comment").type) b = document.getElementById("comment");
    else return !1;
    if (document.selection) b.focus(), sel = document.selection.createRange(), sel.text = a, b.focus();
    else if (b.selectionStart || "0" == b.selectionStart) {
        var c = b.selectionEnd,
            d = c;
        b.value = b.value.substring(0, b.selectionStart) + a + b.value.substring(c, b.value.length);
        d += a.length;
        b.focus();
        b.selectionStart = d;
        b.selectionEnd = d
    } else b.value += a, b.focus()
}

// 设置网站透明度
mysteptm();
function mysteptm(){
    var n= $("#mypro").val();
    $("#nav,.sub-nav").css("background-color","rgba(255,255,255,"+n+")");
    $("#content").css("background-color","rgba(255,255,255,"+n+")");
    $("#contentleft").css("background-color","rgba(255,255,255,"+n+")");
    $("#sidebar").css("background-color","rgba(255,255,255,"+n+")");
    $("#footerbar").css("background-color","rgba(255,255,255,"+n+")");
    $("#new_comment_wenzi,.post-related li .title,.post-lisence,textarea,.commentlist .comment-body ,.commentlist .comment-body .content,.commentlist .comment-body1,.commentlist .comment-body1 .content,#comments blockquote").css("background-color","rgba(255,255,255,"+n+")");
    $("#mheader,#sidebar .tab_nav li,#sidebar .tab_box li,#sidebar .icon").css("background-color","rgba(255,255,255,"+n+")");
    $("#comment-post .sbsb,#submit, #reset,#reset").css("background-image","inherit");
    //$("#wenkmPlayer").css("background-color","rgba(255,255,255,"+n+")");
    //$("#switch-player").css("background-color","rgba(255,255,255,"+n+")");
    //$("#wenkmTips").css("background-color","rgba(255,255,255,"+n+")");
}
$(".nav ,gv").click(function(event) {
        $('bod').hide(400);
     $('#scroll').show(400);
    document.body.parentNode.style.overflow = "auto";
});
// changebg
$("#showbox").click(function() {
$("#imgul li").css("border", "solid #fff 3px");
$("#bg-images_tanchu").addClass("bg-images_tanchu");
$("#changebg").addClass("kaiguan");
$("#changebg").addClass("flipInX animated");
setTimeout(function() {
    $("#changebg").removeClass("flipInX")
}, 800)
});
$("#kaiguan").click(function() {
$("#imgul li").css("border", "solid #fff 3px");
$("#changebg").addClass("flipOutX animated");
setTimeout(function() {
    $("#changebg").removeClass("flipOutX");
    $("#bg-images_tanchu").removeClass("bg-images_tanchu");
    $("#changebg").removeClass("kaiguan")
}, 800)
});
$("#imgul>li").hover(function() {
$("#imgul li").css("border", "solid #fff 3px");
$(this).css("border", "solid #0c0 3px")
});
$("#imgul>li").click(function() {
// $(".bg-image").hide();
$("#imgul li").css("border", "solid #fff 3px");
$("#imgul li").find("i").removeClass("fa fa-check-circle fa-2x checkit");
$(this).find("i").addClass("fa fa-check-circle fa-2x checkit");
$("#changebg").addClass("flipOutX animated");
setTimeout(function() {
    $("#changebg").removeClass("flipOutX");
    $("#bg-images_tanchu").removeClass("bg-images_tanchu");
    $("#changebg").removeClass("kaiguan");
    mTips.show("第" + bgid + "张背景 - 保存成功")
}, 800)
});


var $tmdu=$('.tmdiv');
var $aprogress=$('.tm_cd',$tmdu);
$aprogress.click(function(e){
    var aprogressWidth=$aprogress.width(),
        aprogressOffsetLeft=$aprogress.offset().left;
    tmxp=(e.clientX-aprogressOffsetLeft)/aprogressWidth;
    steptm(tmxp);
});
var isDowns=false;
$('.cddrag',$aprogress).mousedown(function(){
    isDowns=true;
    $('.changdu',$aprogress).removeClass('ts5');
});
$(window).on({
    mousemove:function(e){
        if(isDowns){
            var aprogressWidth=$aprogress.width(),
                aprogressOffsetLeft=$aprogress.offset().left,
                eClientX=e.clientX;
            if(eClientX>=aprogressOffsetLeft && eClientX<=aprogressOffsetLeft+aprogressWidth){
                $('.changdu',$aprogress).width((eClientX-aprogressOffsetLeft)/aprogressWidth*100+'%');
                tmxp=(eClientX-aprogressOffsetLeft)/aprogressWidth;
                steptm(tmxp);
            }
        }
    },
    mouseup:function(){
        isDowns=false;
        $('.changdu',$aprogress).addClass('ts5');
    }
});
function steptm(n){
    var vols=parseInt(n*100);
    $('.changdu',$tmdu).width(vols+'%');
    $('.cddrag',$tmdu).attr("title","透明度" + vols + "%");
 $("#nav,.sub-nav").css("background-color","rgba(255,255,255,"+n+")");
    $("#content").css("background-color","rgba(255,255,255,"+n+")");
    $("#contentleft").css("background-color","rgba(255,255,255,"+n+")");
    $("#sidebar").css("background-color","rgba(255,255,255,"+n+")");
    $("#footerbar").css("background-color","rgba(255,255,255,"+n+")");
    $("#new_comment_wenzi,.post-related li .title,.post-lisence,textarea,.commentlist .comment-body ,.commentlist .comment-body .content,.commentlist .comment-body1,.commentlist .comment-body1 .content,#comments blockquote").css("background-color","rgba(255,255,255,"+n+")");
    $("#mheader,#sidebar .tab_nav li,#sidebar .tab_box li,#sidebar .icon").css("background-color","rgba(255,255,255,"+n+")");
    $("#comment-post .sbsb,#submit, #reset,#reset").css("background-image","inherit");
    //$("#wenkmPlayer").css("background-color","rgba(255,255,255,"+n+")");$("#mheader,#sidebar .tab_nav li,#sidebar .tab_box li,#sidebar .icon").css("background-color","rgba(255,255,255,"+n+")");
    //$("#switch-player").css("background-color","rgba(255,255,255,"+n+")");
    //$("#wenkmTips").css("background-color","rgba(255,255,255,"+n+")");
    $.cookie("tmdu", n, {
        path: '/',
        expires: 10
    });
}
function tooltip() {
    $("a,div,li,h3,h4,img,i").each(function() {
        $("#tooltip").remove();
        if (this.title) {
            var a = this.title;
            $(this).mouseover(function(b) {
                this.title = "";
                $("body").append('<div id="tooltip">' + a + "</div>");
                $("#tooltip").css({
                    left: b.pageX - 15 + "px",
                    top: b.pageY + 30 + "px",
                    opacity: "0.8"
                }).fadeIn(250)
            }).mouseout(function() {
                this.title = a;
                $("#tooltip").remove()
            }).mousemove(function(a) {
                $("#tooltip").css({
                    left: a.pageX - 15 + "px",
                    top: a.pageY + 30 + "px"
                })
            })
        }
    })
}(function(a) {
    a.fn.WIT_SetTab = function(b) {
        function c(a) {
            b.Field.filter(":visible").fadeOut(b.OutTime, function() {
                b.Field.eq(a).fadeIn(b.InTime).siblings().hide()
            });
            b.Nav.eq(a).addClass(b.CurCls).siblings().removeClass(b.CurCls)
        }
        b = a.extend({
            Nav: null,
            Field: null,
            K: 0,
            CurCls: "cur",
            Auto: !1,
            AutoTime: 5E3,
            OutTime: 100,
            InTime: 150,
            CrossTime: 60
        }, b || {});
        var d = null,
            f = !1,
            h = null;
        c(b.K);
        b.Nav.hover(function() {
            b.K = b.Nav.index(this);
            b.Auto && clearInterval(h);
            f = a(this).hasClass(b.CurCls);
            d = setTimeout(function() {
                f || c(b.K)
            }, b.CrossTime)
        }, function() {
            clearTimeout(d);
            b.Ajax && b.AjaxFun();
            b.Auto && (h = setInterval(function() {
                b.K++;
                c(b.K);
                b.K == b.Field.size() && (c(0), b.K = 0)
            }, b.AutoTime))
        }).eq(0).trigger("mouseleave")
    }
})(jQuery);
tooltip();
$(document).WIT_SetTab({
        Nav: $("#J_setTabANav>ul>li"),
        Field: $("#J_setTabABox>div>ul"),
        CurCls: "hover"
    });
    $(document).WIT_SetTab({
        Nav: $("#J_setTabBNav>ul>li"),
        Field: $("#J_setTabBBox>div>ul"),
        Auto: !0,
        CurCls: "hover"
    });