navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i) || $(function(){
$(document).pjax('a[target!=_blank]', '#contentleft', {fragment:'#contentleft', timeout: 6000});
$(document).on("submit", "form", "button", function(a) {
	$.pjax.submit(a, "#contentleft", {
		fragment: "#contentleft",
		timeout: 6000
	})
});
$(document).on('pjax:send', function() {
$(".colorful_loading_frame,.colorful_loading").css("display", "block");
 });
// $(document).on('submit', 'form','button', function(event) {// 解决提交失效问题
//     $.pjax.submit(event, '#contentleft', {fragment: '#contentleft',timeout: 6000});
//  });
$(document).on('pjax:complete', function() { 
$(".colorful_loading_frame,.colorful_loading").css("display", "none");
//str_replace("?_pjax=%23contentleft","",BLOG_URL . trim(Dispatcher::setPath(), '/'));
$("a[href$=jpg],a[href$=gif],a[href$=png],a[href$=jpeg],a[href$=bmp]").addClass("highslide").each(function(){this.onclick=function(){return hs.expand(this)}});
pjax_cn();pjax_site_title();pjaxdone();tooltip();mysteptm();});
function pjax_cn(){
	$("#slider").responsiveSlides({
		auto: true,
		pager: true,
		nav: false,
		speed: 500,
		timeout: 5000,
		namespace: "centered-btns"
	});
	$(function() {
	$('pre').addClass('prettyprint linenums').attr('style', 'overflow:auto');
	window.prettyPrint && prettyPrint();
	});
}
function pjax_site_title(){
	var title=document.title;
	$(".box h2 a").html(title);
}
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
//tooltip
function tooltip() {
    $("a,div,li,h2,h3,h4,img,i").each(function() {
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
}

function pjaxdone(){
    /*start*/
    jQuery(document).ready(function() { function d() {document.title = document[b] ? "草榴社區" : a; } var b, c, a = document.title; "undefined" != typeof document.hidden ? (b = "hidden", c = "visibilitychange") : "undefined" != typeof document.mozHidden ? (b = "mozHidden", c = "mozvisibilitychange") : "undefined" != typeof document.webkitHidden && (b = "webkitHidden", c = "webkitvisibilitychange"), ("undefined" != typeof document.addEventListener || "undefined" != typeof document[b]) && document.addEventListener(c, d, !1); });
  /*  end*/
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
    //$("#wenkmPlayer").css("background-color","rgba(255,255,255,"+n+")");
    //$("#switch-player").css("background-color","rgba(255,255,255,"+n+")");
    //$("#wenkmTips").css("background-color","rgba(255,255,255,"+n+")");
    $.cookie("tmdu", n, {
        path: '/',
        expires: 10
    });
}
}
});