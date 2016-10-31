(function ($) {
    $.fn.hoverDelay = function (options) {
        var defaults = {hoverDuring:200, outDuring:200, hoverEvent:function () {
            $.noop();
        }, outEvent:function () {
            $.noop();
        }};
        var sets = $.extend(defaults, options || {});
        return $(this).each(function () {
            var hoverTimer, outTimer;
            $(this).hover(function () {
                clearTimeout(outTimer);
                hoverTimer = setTimeout($.proxy(sets.hoverEvent, this), sets.hoverDuring);
            }, function () {
                clearTimeout(hoverTimer);
                outTimer = setTimeout($.proxy(sets.outEvent, this), sets.outDuring);
            });
        });
    }
})(jQuery);
$(function () {
    $('#hjpassport .pass_x').hoverDelay({hoverEvent:function () {
        var t = $(this);
        t.find(".pass_x_t").find("b").addClass("bg2");
        t.find(".pass_x_t").addClass("hover");
        t.find(".pass_x_b").show();
    }, outEvent:function () {
        var t = $(this);
        t.find(".pass_x_t").find("b").removeClass("bg2");
        t.find(".pass_x_t").removeClass("hover");
        t.find(".pass_x_b").hide();
    }});
});
window.hjquicklogin = {init:function () {
    var me = this;
    me.control = me.control || hui.Control.create('HJ_QuickLogin', {formName:'hj_quicklogin', top:0.33, className:'hj001_login_box'});
    me.control.getPassName = function () {
        var host = location.host, pass = 'http://pass';
        if (host.indexOf('qa.') != -1 || host.indexOf('st2.') != -1 || host.indexOf('local.') != -1 || host.indexOf('dev.') != -1) {
            pass = 'http://pass2';
        }
        return pass;
    };
    me.control.source = 'shetuan';
    me.control.onLoginSuccess = function (result) {
        setTimeout(function () {
            window.location.reload();
        }, 800);
    };
    me.control.onRegisteSuccessMobile = function (result) {
        setTimeout(function () {
            window.location.reload();
        }, 800);
    };
    me.control.monitorList['hj_reg'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 4)
        }
    };
    me.control.monitorList['hj_reg_login'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 2)
        }
    };
    me.control.monitorList['hj_reg_mobile_success'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 10)
        }
    };
    me.control.monitorList['hj_reg_email_success'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 11)
        }
    };
    me.control.monitorList['hj_reg_login_submit'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 5)
        }
    };
    me.control.monitorList['hj_reg_mobile_submit'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 6)
        }
    };
    me.control.monitorList['hj_reg_email_submit'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 7)
        }
    };
    me.control.monitorList['hj_reg_email_success_active'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 8)
        }
    };
    me.control.monitorList['hj_reg_email_continue'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 9)
        }
    };
    me.control.monitorList['hj_reg_close'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 12)
        }
    };
    me.control.monitorList['hj_reg_mobile_sendsms'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 13)
        }
    };
    me.control.monitorList['hj_reg_mobile_email'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 16)
        }
    };
    me.control.monitorList['hj_reg_email_mobile'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 15)
        }
    };
    me.control.monitorList['hj_reg_login_qq'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 17)
        }
    };
    me.control.monitorList['hj_reg_login_weibo'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 18)
        }
    };
    me.control.monitorList['hj_reg_login_renren'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 19)
        }
    };
    me.control.monitorList['hj_reg_login_baidu'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 20)
        }
    };
    me.control.monitorList['hj_reg_login_douban'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 21)
        }
    };
    me.control.monitorList['hj_reg_login_zhifu'] = function () {
        if (typeof SendEvent !== 'undefined') {
            SendEvent(2, 22)
        }
    };
}, doLogin:function () {
    var me = this;
    !me.control && me.init();
    me.control.showDialog('hj_reg_login');
}, doRegiste:function () {
    var me = this;
    !me.control && me.init();
    me.control.showDialog('hj_reg_mobile');
}};
var register_tooltip = {userID:0, check:function () {
    var getPassName = function () {
        var host = location.host, pass = 'http://pass';
        if (host.indexOf('qa') != -1 || host.indexOf('st2') != -1 || host.indexOf('dev') != -1) {
            pass = 'http://pass2';
        }
        return pass;
    };
    var userID = parseInt(register_tooltip.userID);
    if (userID > 0) {
        $.ajax({type:"GET", url:getPassName() + ".hujiang.com/quick/account/?act=check_tooltip&userid=" + userID, data:"{}", contentType:"application/json; charset=utf-8", dataType:"jsonp", jsonp:"callback", success:function (result) {
            if (result.data.showtips) {
                var url = getPassName() + ".hujiang.com/q/profile/?returnurl=" + encodeURIComponent(document.location.href);
                $(".pass_register_tooltip").show();
                $(".pass_register_tooltip").attr("href", getPassName() + ".hujiang.com/q/profile/?template=shetuan&returnurl=" + encodeURIComponent(document.location.href));
                $(".pass_register_tooltip").click(function () {
                    if (typeof SendEvent !== 'undefined') {
                        SendEvent(2, 23)
                    }
                });
            }
        }});
    }
}};
$(function () {
    $(".fastLogin").click(function () {
        if ($('#hdnCurrentUserID').val() === "0") {
            window.hjquicklogin.doLogin();
        }
    });
    $(".fastRegister").click(function () {
        window.hjquicklogin.doRegiste();
    });
    register_tooltip.check();
});
(function ($) {
    $.extend($.fn, {fixedTop:function (options) {
        var opt = {top:0}
        opt = $.extend(opt, options);
        this.each(function () {
            var self = this, top = self.offsetTop, seftPos = self.getBoundingClientRect(), selfHeight = seftPos.height, selfWidth = seftPos.width;
            setInterval(function () {
                var st = document.documentElement.scrollTop || document.body.scrollTop, pos = 0, height = 0;
                if (!pos && st - top >= 0) {
                    $(self).css({'position':'fixed', 'top':0, 'padding-top':opt.top, 'width':selfWidth});
                    pos = 1;
                    if (document.documentElement.clientHeight - 180 < selfHeight) {
                        height = $(document).height();
                        if (st + selfHeight + 200 > height) {
                            $(self).css({'position':'static', 'padding-top':0});
                        }
                    }
                } else if (st - top <= 0) {
                    $(self).css({'position':'static', 'padding-top':0});
                }
            }, 16);
        })
    }});
})($ || jQuery || Zepto);
var lockTime = new Date();
$('.member-list').delegate('.col', 'mouseenter mouseleave', function (event) {
    var t = $(this);
    if (event.type === 'mouseenter') {
        t.addClass('hover');
    }
    else {
        t.removeClass('hover');
    }
});
$('.navi li').bind('click', function (event) {
    var t = $(this), index = t.index();
    t.addClass('active').siblings().removeClass();
    $('.panel-list .panel').eq(index).show().siblings().hide();
});
$('.member-permit').delegate('.btn-reject', 'click', function (event) {
    event.preventDefault();
    var t = $(this), parent = t.closest('.row'), on = 'reject-on';
    t.toggleClass(on);
    if (parent.find('.reject').length === 0) {
        clear();
        parent.append('<div class="reject cf">' + $('.reject').html() + '</div>');
    }
    else if (t.hasClass(on)) {
        clear();
        parent.find('.reject').show();
    }
    else {
        parent.find('.reject').hide();
    }
    function clear() {
        $('.reject').hide();
        $('.btn-reject').removeClass(on);
        t.addClass(on);
    }
});
$('.member-manage').delegate('.btn-delete, .btn-up, .btn-down', 'click', function (event) {
    event.preventDefault();
    var t = $(this), parent = t.closest('.col'), $row1 = $('.row-1'), $row2 = $('.row-2'), up_class = 'icon-up btn-up', down_class = 'icon-down btn-down';
    var userid = t.attr("data-userid");
    var strLeagueID = $("#hid_LeagueID").val();
    var strRoleUserName = t.attr("data-username");
    if (t.hasClass('btn-up')) {
        $.comajax("/ajax/PostAjax.asmx", "SetUserRoleActive", {leagueID:strLeagueID, roleUserID:userid, roleUserName:strRoleUserName, isActive:true}, function (d) {
            if (d.saveOK == -1) {
                alert("最多只能有8位管理员");
                return;
            }
            else {
                t.removeClass(up_class).addClass(down_class).html('<i></i>解除管理员');
                parent.find('.mem-li').append('<p class="grey">管理员</p>');
                $row1.append('<div class="col">' + parent.html() + '</div>');
                parent.remove();
            }
        }, null);
    }
    else if (t.hasClass('btn-down')) {
        $.comajax("/ajax/PostAjax.asmx", "SetUserRoleActive", {leagueID:strLeagueID, roleUserID:userid, roleUserName:strRoleUserName, isActive:false}, function (d) {
        }, null);
        t.removeClass(down_class).addClass(up_class).html('<i></i>升为管理员');
        parent.find('.mem-li').find('.grey').remove();
        $row2.append('<div class="col">' + parent.html() + '</div>');
        parent.remove();
    }
    else if (t.hasClass("btn-delete")) {
        if (confirm("您确定要删除该成员吗？")) {
            $.comajax("/ajax/PostAjax.asmx", "DeleteLeagueMember", {leagueID:strLeagueID, roleUserID:userid, roleUserName:strRoleUserName, isActive:false}, function (d) {
            }, null);
            parent.remove();
        }
    }
    else {
        parent.remove();
    }
});
$('.re-list').on('click', '.btn-sec-reply', function (event) {
    if ($('#hdnCurrentUserID').val() === "0") {
        return false;
    }
    $("#MySockPuppetsReply").hide();
    $("#chkSockPuppetReply").attr("checked", false);
    $("#hidSockUserID").val(0);
    $("#hidSockUserName").val("");
    var isEdit = $("#hid_IsReply").val();
    var leagueID = $("#hide_userInfo").attr("data-leaguesID");
    var type = $("#hide_userInfo").attr("data-leagueType");
    if (isEdit == 0) {
        var isUserAuditing = $("#hid_IsUserAuditing").val();
        if (isUserAuditing == 1) {
            showAuditingLeague();
        }
        else {
            showAddLeague(leagueID, type);
        }
        return;
    }
    var t = $(this), parent = t.closest('.article'), on = 'sec-reply-on', postid = $(t).attr("data-postid"), userName = $(t).attr("data-username"), parentid = $(t).attr("data-parentid");
    t.toggleClass(on);
    if (parent.find('.sec-reply-area').length === 0) {
        clear();
        parent.append('<div class="sec-reply-area">' + $('.sec-reply-area').html() + '</div>');
        parent.find('textarea').focus();
        if (parentid != null && parentid != '' && parentid != '0')
            parent.find('textarea').val("回复 " + userName + "：");
    }
    else if (t.hasClass(on)) {
        clear();
        parent.find('.sec-reply-area').show().find('textarea').focus();
        if (parentid != null && parentid != '' && parentid != '0')
            parent.find('textarea').val("回复 " + userName + "：");
    }
    else {
        parent.find('.sec-reply-area').hide().find('textarea').blur();
    }
    parent.find('.row-2 a.btn').attr('data-username', userName);
    parent.find('textarea').on('keydown', function (event) {
        if (event.ctrlKey && event.keyCode == 13) {
            parent.find('.row-2 a.btn').click();
        }
    });
    function clear() {
        $('.sec-reply-area').hide();
        $('.btn-sec-reply').removeClass(on);
        t.addClass(on);
    }

    return false;
});
$('#pnl_myreply_btn').click(function () {
    if (editor) {
        editor.focus();
    }
    else {
        var leagueID = $("#hide_userInfo").attr("data-leaguesID");
        var type = $("#hide_userInfo").attr("data-leagueType");
        showAddLeague(leagueID, type);
    }
});
$('.tab-a a').bind('click', function (event) {
    var t = $(this), index = t.index();
    t.addClass('current').siblings().removeClass();
    $('.tab-b .tab-li').eq(index).show().siblings().hide();
});
$('.share').bind('mouseenter mouseleave', function (event) {
    var t = $(this), cont = t.find('.share-cont');
    if (event.type === 'mouseenter') {
        cont.show();
    }
    else {
        cont.hide();
    }
});
$('body').delegate('.hover-c', 'mouseenter mouseleave', function (event) {
    var on = 'hover-c-on';
    if (event.type === 'mouseenter') {
        $(this).addClass(on);
    }
    else {
        $(this).removeClass(on);
    }
});
$('.c-praise,.praise_tip_link').bind('click', function () {
    if ($('#hdnCurrentUserID').val() === "0") {
        return false;
    }
    var topicId = $('#hide_userInfo').attr('topicid');
    hmuSt.addPraise(topicId, this);
});
$('body').on('click', 'div.pop-out #btnCommonAddLeague', function () {
    var leagueID = parseInt($(this).attr('data-id')), type = parseInt($(this).attr('data-type')), applyData = {leagueID:leagueID, applyMsg:''};
    if (type == 2) {
        alert("私密社团不能加入~");
        return;
    }
    ApplyLeague(leagueID, type);
});
function ApplyLeague(leagueID, type) {
    type = parseInt(type);
    switch (type) {
        case 0:
            $.modal.close();
            $.comajax("/ajax/PostAjax.asmx", "CheckApplyUserStatus", {leagueID:leagueID}, function (d) {
                if (d == -1) {
                    alert("你登录之后才能操作哦！");
                    return;
                }
                else if (d == -2) {
                    alert("该社团不存在！");
                    return;
                }
                else if (d == -3) {
                    showAuditingLeague();
                }
                else if (d > 0) {
                    showApplyLeague(leagueID);
                }
            }, null);
            break;
        case 1:
            var applyData = {leagueID:leagueID, applyMsg:''};
            $.comajax("/ajax/PostAjax.asmx", "ApplyJoinLeague", applyData, function (d) {
                if (d == -6) {
                    alert("您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员~");
                    return;
                }
                if (d == -300) {
                    showModalTips("您加入社团的数量已达上限（300个）", true);
                    return;
                }
                else {
                    window.location.reload();
                }
            }, null);
            break;
        case 2:
            showAddLeague(leagueID, 2);
            break;
    }
}
$('body').delegate('div.pop-out #btnCommonApplyLeague', 'click', function () {
    var leagueID = $(this).attr('data-id'), applyMsg = $('div.pop-out #areaApplyMsg').val(), applyData = {};
    if (applyMsg === '') {
        alert('请输入申请理由');
        return;
    }
    applyData = {leagueID:leagueID, applyMsg:applyMsg};
    $.comajax("/ajax/PostAjax.asmx", "ApplyJoinLeague", applyData, function (d) {
        if (d == -3 || d == -4) {
            alert("你的申请理由包含敏感词！");
            return;
        }
        else if (d == -5) {
            alert("你已经申请过该社团，请耐心等待审核！");
            return;
        }
        else if (d == -6) {
            alert("您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员");
            return;
        } else if (d == -300) {
            showModalTips("您加入社团的数量已达上限（300个）", true);
            return;
        }
        else if (d > 0) {
            window.location.reload();
        }
    }, null);
});
$('.listzan').bind('click', function () {
    if ($('#hdnCurrentUserID').val() === "0") {
        return false;
    }
    hmuSt.addPostPraise(this);
});
var hmuSt = {dotHtml:function (tmpl, data) {
    _html = $(tmpl).html();
    var tpl = doT.template(_html);
    var html = tpl(data);
    return html;
}, ajaxData:function (url, parameter, callback, ajaxType) {
    url = url + '?v=' + Math.random();
    $.ajax({type:'GET' || ajaxType, url:url, dataType:'jsonp', data:parameter, jsonp:'callback', success:function (data) {
        if (callback == null) {
            return;
        }
        callback(data);
    }, error:function (error) {
        console.log(error);
    }})
}, addPraise:function (topicID, obj) {
    var $this = $(obj), t = $this.find('.praise-num'), num = t.text();
    $.comajax("/ajax/PostAjax.asmx", "AddTopicRate", {topicID:topicID}, function (data) {
        switch (data.saveOK) {
            case-4:
                window.location.href = "http://pass.hujiang.com/m/?url=" + encodeURIComponent(document.location.href) + "&source=shetuan";
                break;
            case 0:
                if ($('.praise_tip_link').length > 0) {
                    $this.find('.praise_tip_link_txt').text('已提交这个');
                    var cur = $this.find('.praise_tip_box').find('span');
                    $this.find('.praise_tip_box').append('<span class="animate-praise">+1</span>');
                    cur.text(+cur.text() + 1);
                    setTimeout(function () {
                        $this.find('.praise_tip_box').find('.animate-praise').remove();
                    }, 2000);
                }
                else {
                    if ($this.hasClass('num_praise')) {
                        $this.removeClass('num_praise').addClass('num_praised');
                    }
                    if ($.trim(num) === '赞') {
                        num = 0;
                    }
                    num++;
                    t.text(num);
                    $this.find('i').addClass('animate-praise2');
                    $(".icon-praise").find("span").text(num);
                    $this.append('<span class="animate-praise">+1</span>');
                    $('.praise_tip_box').append('<span class="animate-praise">+1</span>');
                    setTimeout(function () {
                        $this.find('.animate-praise').remove();
                    }, 2000);
                }
                break;
            case-5:
                $this.find('.praise-num').text('已赞');
                $this.find('.praise_tip_link_txt').text('已提交这个');
                break;
            case-1:
                alert('点赞失败');
                break;
            case-2:
                showActivateGuide();
                break;
            case-3:
                alert('帖子不存在');
                break;
        }
    }, null);
}, checkImage:function (obj) {
    var $imgs = $(obj).find('img'), imgs = [];
    var re = 'http://([^"]+(?:jpg|png|gif|jpeg))';
    $imgs.each(function (index) {
        var t = $(this), w = t.width(), h = t.height();
        if (t.closest(".pnl_replyCantView_content").length > 0)
            return;
        var strimg = "";
        if (w > 94 && h > 94) {
            strimg = this.src;
            var arrayImgs = strimg.match(re);
            if (arrayImgs != null && arrayImgs.length > 0) {
                strimg = arrayImgs[0];
                imgs.push(strimg);
            }
        }
    });
    var topicId = $('#hide_userInfo').attr('topicid');
    $.comajax("/ajax/PostAjax.asmx", "EditTopicImg", {strImg:imgs.toString(), topicID:topicId, uploadCount:imgs.length}, function (data) {
    }, null);
}, checkFoot:function () {
    var h = $('.wrapper').height() + 160, win_h = $(window).height(), out_h = win_h - 160 - 130;
    if ($('.head').length) {
        out_h = out_h - $('.head').height() - 40;
    }
    if (h < win_h) {
        $('.wrapper').css('min-height', out_h);
    }
}, addPostPraise:function (obj) {
    var $this = $(obj), t = $this.find('.post-num'), num = t.text();
    var postID = $this.attr("data-postid");
    $.comajax("/ajax/PostAjax.asmx", "AddPostRate", {postID:postID}, function (data) {
        switch (data.saveOK) {
            case-4:
                window.location.href = "http://pass.hujiang.com/m/?url=" + encodeURIComponent(document.location.href) + "&source=shetuan";
                break;
            case 0:
                if ($(obj).find('.post-num').length > 0) {
                    var num = $(obj).find('.post-num').text();
                    num = parseInt(num) + 1;
                    $(obj).find('.post-num').text(num);
                }
                else {
                    $(obj).html("赞 (<span class=\"post-num\">1</span>)")
                }
                break;
            case-5:
                var num = $(obj).find('.post-num').text();
                $(obj).html("已赞 (<span class=\"post-num\">" + num + "</span>)");
                break;
            case-1:
                alert('点赞失败');
                break;
            case-2:
                showActivateGuide();
                break;
            case-3:
                alert('帖子不存在');
                break;
        }
    }, null);
}};
(function ($) {
    $.fn.hjqrcode = function (opts) {
        var options = $.extend({}, $.fn.hjqrcode.defaults, opts);
        return this.each(function () {
            var isWebkit = 'WebkitAppearance'in document.documentElement.style;
            var renderWay = '';
            if (isWebkit) {
                renderWay = 'canvas';
            }
            else {
                renderWay = 'table';
            }
            $(this).qrcode({render:renderWay, width:options.width, height:options.height, text:options.qrcode, correctLevel:options.correctLevel})
        })
    }
    $.fn.hjqrcode.defaults = {width:100, height:100, qrcode:window.location.href}
})(jQuery);
function CheckAddTopic() {
    window.onbeforeunload = function () {
        return;
    }
    $("#txtContent").val(editor.getContent ? editor.getContent() : editor.html());
    var flag = true;
    var txtTitle = $.trim($("#txtTitle").val());
    var txtContent = $.trim($("#txtContent").val());
    var strText = editor.getContentTxt ? editor.getContentTxt() : editor.text();
    var reg = new RegExp("<!doctype html>", "g");
    txtContent = txtContent.replace(reg, " ");
    var topicId = $.trim($("#hid_TopicID").val());
    var boardID = $.trim($("#drop_Board").val());
    var leaguesID = $.trim($("#hid_LeaguesID").val());
    if (txtTitle == "" || txtTitle == $("#txtTitle").attr("rel")) {
        alert("标题不能为空哦");
        showBorderCnt($("#txtTitle"));
        setTimeout(function () {
            $("#txtTitle").val("").focus()
        }, 700);
        return;
    }
    else if (txtContent == "" || txtContent == $("#txtContent").attr("rel")) {
        alert("内容不能为空哦");
        return;
    }
    else if (strText.length < 10) {
        alert("请输入10个以上字符哦~");
        return;
    }
    var tag;
    $.comajax("/ajax/PostAjax.asmx", "checkAddTopic", {title:txtTitle, content:txtContent, topicID:topicId}, function (d) {
        tag = d;
        if (tag == -1 && topicId == 0) {
            alert("不能发布相同主题的帖子~");
            return;
        }
        else if (tag == -2) {
            alert("标题或内容中有敏感字符，发布失败~");
            return;
        }
        else if (tag == -3 && topicId == 0) {
            alert("您的发帖速度太快了，休息一会吧~");
            return;
        }
        else if (tag == -4) {
            alert("您当前还没有登录~");
            return;
        }
        else if (tag == -6) {
            alert("抱歉，您的账号已被锁定,系统会自动退出~");
            window.location.href = "http://pass.hujiang.com/uc/handler/logout.ashx?returnurl=http://st.hujiang.com/";
            return;
        }
        else if (tag == -5) {
            showActivateGuide();
            return;
        }
        else {
            if (flag && !issave) {
                issave = true;
                var draftID = $.trim($("#hid_DraftID").val());
                var isRelease = $("#chk_IsRelease:checked").length ? true : false;
                var strReleaseTime = $("#txt_ReleaseTime").length > 0 ? $("#txt_ReleaseTime").val() : "";
                var sockUserID = $("#hidSockUserID").val();
                var sockUserName = $("#hidSockUserName").val();
                var attachmentIDs = $('#hdnAttachmentIDs').val();
                var lockedAttachmentIDs = $('#hdnLockedAttachmentIDs').val();
                var atLeagueIDs = $('#hid_isAtLeague').val() || '';
                var topicModel = {topicID:topicId, leaguesID:leaguesID, boardID:boardID, strTitle:txtTitle, strContent:txtContent, draftID:draftID, ReleaseTime:strReleaseTime, isRelease:isRelease, sockUserID:sockUserID, sockUserName:sockUserName, attachmentIDs:attachmentIDs, subjectID:subjectID, lockedAttachmentIDs:lockedAttachmentIDs, magazineID:magazineID, topicTag:tagId, atLeagueIDs:atLeagueIDs}
                $.comajax("/ajax/PostAjax.asmx", "SetTopicData", {topicModel:topicModel}, function (d) {
                    issave = false;
                    var saveid = d.saveOK;
                    var isOwnerFisrtPost = $('#hid_IsProprieterFirstTopic').val();
                    if (saveid > 0) {
                        if (isOwnerFisrtPost == 1) {
                            showExpBOx(0, function () {
                                window.location = "/topic/" + saveid;
                            });
                            var obj = $('.get_experience_box');
                            obj.find('h3').html('社长锦囊');
                            obj.find('h4').html('恭喜发首帖 <img style="position:relative;top:1px" src="/images/guide_icon_1.png">');
                            obj.find('.tip_more').css('margin-top', -14).html('想要社团人气旺，您可以：').nextAll('p').remove();
                            obj.find('.tip_more').after('<ul class="guide_box clearfix"><li class="first">社长官方QQ群<br><strong>215281663</strong></li>'
                                + '<li class="quick_enter">快捷入口<br><a href="http://st.hujiang.com/mag/135092432/" target="_blank"><img src="/images/guide_icon_3.png"></a></li>'
                                + '<li>社长必备社团<br><a href="http://st.hujiang.com/shetuanlian/" target="_blank"><img src="/images/guide_icon_4.png"></a>'
                                + ' <a href="http://st.hujiang.com/gjw/" target="_blank"><img src="/images/guide_icon_5.png"></a></li></ul>');
                            obj.find('.no_tips').hide();
                            return;
                        }
                        if (d.typeID == 0) {
                            if (d.pageCount == 1) {
                                showExpBOx(0, function () {
                                    window.location = "/topic/" + saveid;
                                })
                            }
                            else {
                                window.location = "/topic/" + saveid;
                            }
                            return;
                        } else if (saveid > 0) {
                            window.location.href = "/mydraft/";
                        }
                    }
                    switch (saveid) {
                        case-1:
                        {
                            alert("您当前还没有登录~");
                        }
                            ;
                            break;
                        case-2:
                        {
                            showActivateGuide();
                        }
                            ;
                            break;
                        case-3:
                        {
                            alert("请输入10个以上字符哦");
                        }
                            ;
                            break;
                        case-4:
                        {
                            alert("请输入10个以上字符哦");
                        }
                            ;
                            break;
                        case-5:
                        {
                            alert("标题字数请限制在1-80个字符之间~");
                        }
                            ;
                            break;
                        case-6:
                        {
                            alert("标题或内容中有敏感字符，发布失败");
                        }
                            ;
                            break;
                        case-7:
                        {
                            alert("标题或内容中有敏感字符，发布失败");
                        }
                            ;
                            break;
                        case-8:
                        {
                            alert("您的发帖速度太快了，休息一会吧~");
                        }
                            ;
                            break;
                        case-9:
                        {
                            alert("定时发贴时间不正确，请重新选择~");
                        }
                            ;
                            break;
                        case-10:
                        {
                            alert("您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员~");
                        }
                            ;
                            break;
                        case-15:
                        {
                            alert("你的帐号还没有加入该社团，不能发帖哦~");
                        }
                            ;
                            break;
                        case-16:
                        {
                            alert("你没有@全社团成员的权限");
                        }
                            ;
                            break;
                        case-17:
                        {
                            alert("你的@全社团成员次数已用完");
                        }
                            ;
                        case-18:
                        {
                            alert("无权限发布帖子~");
                        }
                            ;
                            break;
                    }
                }, null);
            }
        }
    }, null);
}
var isreply = false;
function doReply() {
    if (isreply)
        return;
    var topicId = $("#hide_userInfo").attr("topicId");
    $("#chkSockPuppetReply").attr("checked", false);
    $("#MySockPuppetsReply").hide();
    $("#txtContent").val(editor.html());
    var body = $("#txtContent").val();
    var isHostView = $("#chkHostView").attr("checked");
    var re = new RegExp("<!doctype html>", "g");
    body = body.replace(re, " ");
    if (checkTxt("#txtContent")) {
        var tmpReply = $("#txtContent").val();
        var re = new RegExp("&nbsp;", "g");
        tmpReply = tmpReply.replace(re, " ");
        re = new RegExp("<br />", "g");
        tmpReply = tmpReply.replace(re, " ");
        re = new RegExp("<!doctype html>", "g");
        tmpReply = tmpReply.replace(re, " ");
        if ($.trim(tmpReply).length == 0) {
            alert("回复内容不能为空哦~");
            if (typeof(KE) != "undefined" && KE != null)
                KE.focus('txtContent');
            return;
        }
        if (tmpReply.length < 2) {
            alert("您的回复连2个字都不到，多打几个字吧~");
            if (typeof(KE) != "undefined" && KE != null)
                KE.focus('txtContent');
            return;
        }
        if (isHostView)
            body = "[contest]" + body + "[/contest]";
        isreply = true;
        var sockUserID = $("#hidSockUserID").val();
        var sockUserName = $("#hidSockUserName").val();
        var draftID = $.trim($("#hid_DraftID").val());
        var leagueID = $("#hid_LeaguesID").val();
        $.comajax("/ajax/PostAjax.asmx", "ReplyTopic", {topicID:topicId, body:body, sockUserID:sockUserID, sockUserName:sockUserName, draftID:draftID, leagueID:leagueID}, function (data) {
            isreply = false;
            var d = data.saveOK;
            if (d == -1) {
                alert("您当前还没有登录~");
                if (typeof(KE) != "undefined" && KE != null)
                    KE.focus('txtContent');
                return;
            }
            else if (d == -2) {
                alert("回复为空或包含敏感字符~");
                if (typeof(KE) != "undefined" && KE != null)
                    KE.focus('txtContent');
                return;
            }
            else if (d == -3) {
                alert("您回复的速度太快了，休息一会吧~");
                if (typeof(KE) != "undefined" && KE != null)
                    KE.focus('txtContent');
                return;
            }
            else if (d == -10) {
                alert("一天最多只能发200条评论");
                if (typeof(KE) != "undefined" && KE != null)
                    KE.focus('txtContent');
                return;
            }
            else if (d == -11) {
                alert("非法操作");
                if (typeof(KE) != "undefined" && KE != null)
                    KE.focus('txtContent');
                return;
            }
            else if (d == -12) {
                showActivateGuide();
                if (typeof(KE) != "undefined" && KE != null)
                    KE.focus('txtContent');
                return;
            }
            else if (d == -13) {
                alert("您的回复连2个字都不到，多打几个字吧~");
                if (typeof(KE) != "undefined" && KE != null)
                    KE.focus('txtContent');
                return;
            }
            else if (d == -15) {
                alert("你的帐号还没有加入社团，不能回复~");
                return;
            }
            else if (d == -16) {
                alert("您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员~");
                return;
            }
            else if (d == -17) {
                alert("你的帐号正在审核中，不能回复~");
                return;
            } else if (d == -18) {
                alert("帖子被锁定，不能回复~");
                return;
            } else if (d == -19) {
                alert("私密帖子，不能回复~");
                return;
            }
            var currentUserIsReply = $('#hid_NewsReplyLook').val(), topicsIsNeedReply = $('#hid_IsNeedReply').val();
            if (currentUserIsReply == 0 && topicsIsNeedReply == 1) {
                var CurUrl = window.location.toString(), pos = CurUrl.lastIndexOf('p');
                if (pos >= 45) {
                    window.location = CurUrl.substr(0, pos) + '#topicsIsNeedReply'
                } else {
                    window.location = CurUrl + '#topicsIsNeedReply';
                    location.reload();
                }
            }
            var strsource = $("#replydiv").clone();
            $(strsource).css("display", "");
            $($(strsource).find("#times")).html("刚刚");
            $($(strsource).find("#fl")).html(data.datalist.FloorID + "楼");
            var reUserID = data.datalist.PosterID;
            var reUserName = data.datalist.UserName;
            $($(strsource).find(".user-pic a")).attr("href", "http://bulo.hujiang.com/u/" + reUserID).attr("userid", reUserID).attr("rel", "nofollow");
            $($(strsource).find(".user-pic a img")).attr("src", GetUserFace(reUserID, 96)).attr("userid", reUserID);
            $($(strsource).find(".a-title a")).first().attr("href", "http://bulo.hujiang.com/u/" + reUserID).attr("userid", reUserID).html(reUserName).attr("rel", "nofollow");
            if (sockUserID > 0) {
                $($(strsource).find(".a-title a")).last().attr("href", "http://bulo.hujiang.com/u/" + reUserID).attr("userid", reUserID).html("").attr("rel", "nofollow");
            }
            $($(strsource).find(".a-p")).html($.parseEmoji(data.datalist.Body));
            if ($(".re-list ul").length == 0) {
                var strReply = "<div class='reply-list'>";
                strReply = strReply + "<div class='title bb'>";
                strReply = strReply + "<span class='f16'>全部回复</span>";
                strReply = strReply + "<span class'grey'>(1)</span>";
                strReply = strReply + "</div>";
                strReply = strReply + "<div class='panel re-list'><ul>";
                strReply = strReply + "</ul></div>";
                strReply = strReply + "</div>";
                strReply = strReply + "</div>";
                $(strReply).insertBefore(".reply-area");
            }
            $(".re-list>ul").append(strsource);
            if (data.pageCount == 1) {
                showExpBOx(1);
            }
            editor.html("");
            if ($("#isAddLeagueShow").val() == "1") {
                var leagueID = $("#hide_userInfo").attr("data-leaguesID");
                var type = $("#hide_userInfo").attr("data-leagueType");
                showAddLeague(leagueID, type, "对这个话题感兴趣？加入社团，了解更多精彩内容哦~");
            }
        }, function () {
            isreply = false;
            alert("输入内容中含有非法或敏感字符，请检查输入");
        });
    }
    else {
        alert("回复内容不能为空哦~");
        editor.focus();
    }
}
function CheckAddTopicAct() {
    window.onbeforeunload = function () {
        return;
    }
    $("#txtContent").val(editor.html());
    var flag = true;
    var txtTitle = $.trim($("#txtTitle").val());
    var txtContent = $.trim($("#txtContent").val());
    var strText = editor.text();
    var reg = new RegExp("<!doctype html>", "g");
    txtContent = txtContent.replace(reg, " ");
    var topicId = $.trim($("#hid_TopicID").val());
    var leaguesID = $.trim($("#hid_LeaguesID").val());
    var beginTime = $.trim($("#txt_BeginTime").val());
    var endTime = $.trim($("#txt_EndTime").val());
    var address = $.trim($("#txt_Address").val());
    var strurl = $.trim($("#txt_Url").val());
    var strimg = $.trim($("#avatar").val());
    var joinType = $.trim($("#joinType").val());
    if (txtTitle == "" || txtTitle == $("#txtTitle").attr("rel")) {
        alert("标题不能为空哦");
        showBorderCnt($("#txtTitle"));
        setTimeout(function () {
            $("#txtTitle").val("").focus()
        }, 700);
        return;
    }
    else if (txtContent == "" || txtContent == $("#txtContent").attr("rel")) {
        alert("内容不能为空哦");
        return;
    }
    else if (strimg == "") {
        alert("请上传封面图标哦");
        return;
    }
    else if (strText.length < 10) {
        alert("请输入10个以上字符哦~");
        return;
    }
    else if (beginTime.length < 3) {
        alert("请输入活动开始时间哦~");
        return;
    }
    else if (endTime.length < 3) {
        alert("请输入活动结束时间哦~");
        return;
    } else if (beginTime == endTime) {
        alert("活动开始时间与结束时间不能一样~");
        return;
    }
    else if (new Date(beginTime) > new Date(endTime)) {
        alert("活动开始时间不能在结束时间之后哦~");
        return;
    }
    var activityTypeID = 1;
    if ($("input[name=\"rad_TypeID\"]:checked").length > 0 && $("input[name=\"rad_TypeID\"]:checked").val() == 2)
        activityTypeID = 2;
    var roomID = 0;
    if (activityTypeID == 2)
        roomID = $("#hid_RoomID").val();
    if (activityTypeID == 1 && address == "") {
        alert("请输入活动地点哦~");
        return;
    }
    var tag;
    $.comajax("/ajax/PostAjax.asmx", "checkAddTopic", {title:txtTitle, content:txtContent, topicID:topicId}, function (d) {
        tag = d;
        if (tag == -1 && topicId == 0) {
            alert("不能发布相同主题的帖子~");
            return;
        }
        else if (tag == -2) {
            alert("标题或内容中有敏感字符，发布失败~");
            return;
        }
        else if (tag == -3 && topicId == 0) {
            alert("您的发帖速度太快了，休息一会吧~");
            return;
        }
        else if (tag == -4) {
            alert("您当前还没有登录~");
            return;
        }
        else if (tag == -5) {
            showActivateGuide();
            return;
        }
        else {
            if (flag && !issave) {
                issave = true;
                var draftID = $.trim($("#hid_DraftID").val());
                var isRelease = $("#chk_IsRelease:checked").length ? true : false;
                var strReleaseTime = $("#txt_ReleaseTime").length > 0 ? $("#txt_ReleaseTime").val() : "";
                var subjectId = subjectID || 0;
                var atLeagueIDs = $('#hid_isAtLeague').val() || '';
                var topicModel = {topicID:topicId, leaguesID:leaguesID, boardID:0, strTitle:txtTitle, address:address, strBeginDate:beginTime, strEndDate:endTime, strUrl:strurl, strContent:txtContent, imgUrl:strimg, draftID:draftID, ReleaseTime:strReleaseTime, isRelease:isRelease, joinType:joinType, activitiesTypeID:activityTypeID, activitiesRoomID:roomID, subjectID:subjectId, atLeagueIDs:atLeagueIDs};
                $.comajax("/ajax/PostAjax.asmx", "SetTopicActData", {topicModel:topicModel}, function (d) {
                    issave = false;
                    var saveid = d.saveOK;
                    if (saveid > 0 && d.typeID == 0) {
                        if (d.pageCount == 1) {
                            showExpBOx(0, function () {
                                if (topicId > 0)
                                    window.location.href = "/topic/" + saveid; else
                                    window.location.href = "/topic/" + saveid;
                            });
                        }
                        else {
                            if (topicId > 0)
                                window.location.href = "/topic/" + saveid; else
                                window.location.href = "/topic/" + saveid;
                        }
                        return;
                    }
                    else if (saveid > 0) {
                        window.location.href = "/mydraft/";
                    }
                    switch (saveid) {
                        case-1:
                        {
                            alert("您当前还没有登录~");
                        }
                            ;
                            break;
                        case-2:
                        {
                            showActivateGuide();
                        }
                            ;
                            break;
                        case-3:
                        {
                            alert("请输入10个以上字符哦");
                        }
                            ;
                            break;
                        case-4:
                        {
                            alert("请输入10个以上字符哦");
                        }
                            ;
                            break;
                        case-5:
                        {
                            alert("标题字数请限制在1-80个字符之间~");
                        }
                            ;
                            break;
                        case-6:
                        {
                            alert("标题或内容中有敏感字符，发布失败");
                        }
                            ;
                            break;
                        case-7:
                        {
                            alert("标题或内容中有敏感字符，发布失败");
                        }
                            ;
                            break;
                        case-8:
                        {
                            alert("活动开始时间不能超过结束时间");
                        }
                            ;
                            break;
                        case-9:
                        {
                            alert("定时发贴时间不正确，请重新选择~");
                        }
                            ;
                            break;
                        case-10:
                        {
                            alert("您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员~");
                        }
                            ;
                            break;
                        case-15:
                        {
                            alert("你的帐号还没有加入该社团，不能发帖哦~");
                        }
                            ;
                            break;
                        case-16:
                        {
                            alert("你的@全社团成员次数已用完");
                        }
                            ;
                            break;
                        case-17:
                        {
                            alert("你没有@全社团成员的权限");
                        }
                            ;
                            break;
                        case-18:
                        {
                            alert("活动开始时间与结束时间不能超过10小时");
                        }
                            ;
                            break;
                        case-19:
                        {
                            alert("私密版块不能使用@全社团");
                        }
                            ;
                            break;
                    }
                }, null);
            }
        }
    }, null);
}
function checkTxt(obj) {
    var rel = $(obj).attr("rel");
    var key = $.trim($(obj).val());
    if (key.length == 0 || key == rel) {
        showBorderCnt($(obj));
        return false;
    }
    else {
        return true;
    }
}
function showBorderCnt(obj) {
    var rel = $(obj).attr("rel");
    var showCount = 0;
    var MyInterval = setInterval(function () {
        if (showCount < 4) {
            if (showCount % 2 == 0) {
                $(obj).addClass("searchEmpty");
                $(obj).addClass("lightgray");
                $(obj).val(rel);
            }
            else {
                $(obj).removeClass("searchEmpty");
                $(obj).val("");
            }
            showCount++;
        }
        else {
            clearInterval(MyInterval);
        }
    }, 150);
}
var objReplyContent = "";
var objPostID = 0;
function ReplyClick(obj) {
    $("#windownbg").remove();
    $("#windown-box").remove();
    var nowTime = new Date();
    var postTime = nowTime - lockTime;
    var userName = $(obj).attr('data-username');
    if (postTime < 200) {
        return;
    }
    $("#chkSockPuppet").attr("checked", false);
    $("#MySockPuppets").hide();
    lockTime = new Date();
    var topicId = $("#hide_userInfo").attr("topicId"), btn = $(obj).closest(".article").find(".btn-sec-reply"), postId = btn.attr("data-postid"), parentId = btn.attr("data-parentid"), reply = $(obj).closest(".sec-reply-area").find("textarea").val(), summary = $(obj).closest(".sec-reply-area").find("textarea").val();
    var re = new RegExp("&nbsp;", "g");
    reply = reply.replace(re, " ");
    re = new RegExp("<br />", "g");
    reply = reply.replace(re, " ");
    re = new RegExp("<!doctype html>", "g");
    reply = reply.replace(re, " ");
    var lenth = $.trim(reply).length;
    if (lenth == 0) {
        alert("回复内容不能为空哦~");
        return;
    }
    if (reply == '回复 ' + userName + '：' || reply == '回复 ' + userName) {
        alert("请填写回复内容~");
        return;
    }
    if (lenth > 500) {
        lenth = $.trim(reply).replace(/[^x00-xff]/g, '00').length;
        if (lenth > 1000) {
            alert("回复内容不能超过500个字哦~");
            return;
        }
    }
    var leagueID = $("#hid_LeaguesID").val();
    var sockUserIDReply = $("#hidSockUserID").val();
    var sockUserNameReply = $("#hidSockUserName").val();
    $.comajax("/ajax/PostAjax.asmx", "AddPostReply", {topicID:topicId, postID:postId, parentID:parentId, summary:summary, leagueID:leagueID, sockUserID:sockUserIDReply, sockUserName:sockUserNameReply}, function (d) {
        if (d.saveOK > 0) {
            var strText = "<li><div class=\"user-pic\">";
            strText = strText + '<a href="http://bulo.hujiang.com/' + d.datalist.UserID + '/" target="_blank" rel="nofollow">';
            strText = strText + '<img src="' + d.datalist.SrcImg + '" alt="">'
            strText = strText + '</a>';
            strText = strText + '</div>';
            strText = strText + '<div class="article">';
            strText = strText + '<div class="a-title cf">';
            strText = strText + '<a href="http://bulo.hujiang.com/' + d.datalist.UserID + '/" target="_blank" rel="nofollow">' + d.datalist.UserName + ' </a>';
            var longLeagueID = $("#hid_LongLeaguesID").val();
            var userLevelID = $("#hid_centerLevelID").val();
            var experienceCount = $("#hid_centerExperienceCount").val();
            var isPlugin = $("#hid_IsPlugin").val();
            var experienceRankName = $("#hid_centerRankName").val();
            var isLeagueMember = $("#hid_IsLeagueMember").val();
            if (isPlugin == -1)
                strText = strText + ""; else if (isPlugin == 1 && ((userLevelID != null && userLevelID != '') && experienceCount > 0) && isLeagueMember)
                strText = strText + " <a href='/" + longLeagueID + "/levelrule/' title=\"本社团头衔" + userLevelID + "级，经验值" + experienceCount + "，点击进入等级头衔说明页\"><span class=\"user_level_detail\">" + experienceRankName + "</span></a> "; else if (isPlugin == 1)
                strText = strText + " <a href='/" + longLeagueID + "/levelrule/' title=\"点击进入等级头衔说明页\"><span class=\"user_level_detail\">路人甲</span></a> ";
            strText = strText + '<span class="grey">' + d.datalist.DateAdded + '</span>';
            strText = strText + '</div>';
            if (d.datalist.IsAudit != true) {
                strText = strText + "<p class=\"wait\">您发布的信息正在审核中，请稍等……（审核完成前都看不到哦）</p>";
            }
            strText = strText + '<div class="a-p">';
            strText = strText + $.parseEmoji(d.datalist.Summary);
            strText = strText + '</div>';
            strText = strText + '<div class="a-info cf">';
            strText = strText + '<div class="a-info-r fr">';
            strText = strText + '<a href="javascript:;" class="" onclick="delPostReply(' + d.datalist.GradeID + ')">删除</a>';
            strText = strText + '</div>';
            strText = strText + '</div>';
            strText = strText + '</div>';
            strText = strText + '</li>';
            var newPostObj = $("#new_post_list_" + postId);
            if (newPostObj.find(".re-sec-list").length <= 0) {
                var strHeard = "";
                strHeard = strHeard + '<div class="panel re-sec-list" id="post_' + postId + '">';
                strHeard = strHeard + '<ul>';
                strText = strHeard + strText;
                strText = strText + "</div>";
                newPostObj.append(strText);
                newPostObj.find(".sec-reply-area textarea").val("");
                if (d.pageCount == 1) {
                    showExpBOx(1);
                }
                resizeFaceImg("#post_" + postId + " img");
                return;
            }
            newPostObj.find(".re-sec-list ul").append(strText);
            newPostObj.find(".sec-reply-area textarea").val("");
            if (d.pageCount == 1) {
                showExpBOx(1);
            }
            resizeFaceImg("#post_" + postId + " img");
            return;
        }
        else if (d.saveOK == -1) {
            alert("您当前还没有登录~");
        }
        else if (d.saveOK == -2) {
            alert("非法操作，贴子不存在");
        }
        else if (d.saveOK == -13) {
            alert("抱歉，您的账号已被锁定,系统会自动退出~");
            window.location.href = "http://pass.hujiang.com/uc/handler/logout.ashx?returnurl=http://st.hujiang.com/";
            return;
        }
        else if (d.saveOK == -14) {
            showActivateGuide();
        }
        else if (d.saveOK == -3) {
            alert("您的发帖速度太快了，休息一会吧~");
        }
        else if (d.saveOK == -4) {
            alert("内容中有敏感字符");
        }
        else if (d.saveOK == -5) {
            alert("回复内容不能为空哦~");
        }
        else if (d.saveOK == -6) {
            alert("回复内容不能超过500个字哦~");
        }
        else if (d.saveOK == -7) {
            alert("您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员~");
        }
        else if (d.saveOK == -9) {
            alert("回复出错，该帖子不存在~");
        }
        else if (d.saveOK == -11) {
            alert("你的帐号还没有加入社团，不能回复~");
        }
        else if (d.saveOK == -12) {
            alert("你的帐号正在审核中，不能回复~");
        }
        else if (d.saveOK == -99) {
            alert("你的马甲不存在~");
        }
        else {
            alert("非法操作~");
        }
    })
    btn.click();
}
function SaveEdit(postid, topicID, leaguesID) {
    var content = editor.html();
    $.comajax("/ajax/PostAjax.asmx", "EditPost", {postID:postid, body:content, topicID:topicID, leaguesID:leaguesID}, function (d) {
        if (d.saveOK == -1) {
            alert("您当前还没有登录~")
        }
        else if (d.saveOK == -2) {
            alert("信息不能为空")
        }
        else if (d.saveOK == -5) {
            alert("内容中有敏感字符")
        }
        else if (d.saveOK == -6) {
            alert("您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员~");
        }
        else if (d.saveOK == -7) {
            alert("数据保存失败~");
        }
        else if (d.saveOK > 0) {
            parent.window.location.reload();
        }
    }, null);
}
function PopEdit(postid, leaguesID, v2) {
    var src = "/frame/EditPost.aspx";
    if (v2) {
        src = "/frame/EditPostv2.aspx";
    }
    src += '?postId=' + postid + '&leaguesID=' + leaguesID + '&r=' + new Date().getTime();
    modalIframe(src, 700, 550);
}
function GetTopGradeReply(obj, page) {
    var leagueID = $('#hid_LeaguesID').val();
    var replySource = $(obj).find(".article_info");
    var strPostID = $(obj).attr("id").replace("post_", "");
    $.comajax("/ajax/PostAjax.asmx", "GetGradeReplyList", {postID:strPostID, leagueID:leagueID, page:page, pageSize:10000}, function (response) {
        if (response != null && response.datalist.length > 0) {
            var len = response.datalist.length;
            for (var i = 5; i < len; i++) {
                var item = response.datalist[i];
                var leveid = $(replySource).find(".resp_index").text();
                GetGradeReplyBind(obj, leveid, item.UserID, item.UserName, item.SrcImg, item.Summary, item.DateAdded, item.SourceTimes, item.ReplyID, item.IsAudit, strPostID, item.SourceID, item.RankName, item.ExperienceCount, item.LevelID, item.NickName);
            }
            BindReplyPage(obj, response.pageCount, response.pageUrl);
            BindReplyMouse();
            $(".reply_btn").click(function () {
                NewReplyNext(this);
            });
            obj.find('.page_warp').hide();
            resizeFaceImg(obj.find('img'));
        }
    }, null);
}
function GetGradeReplyList(obj, page) {
    var objSource = $(obj).parents(".re-sec-list");
    var replySource = $(obj).parents(".replylist").find(".time");
    var leagueID = $("#hid_LeaguesID").val();
    strPostID = $(objSource).attr("id").replace("post_", "");
    $.comajax("/ajax/PostAjax.asmx", "GetGradeReplyList", {postID:strPostID, page:page, pageSize:10, leagueID:leagueID}, function (response) {
        if (response != null && response.datalist.length > 0) {
            var len = response.datalist.length;
            $($(objSource).find("li")).html("");
            for (var i = 0; i < len; i++) {
                var item = response.datalist[i];
                var leveid = $(replySource).find(".resp_index").text();
                GetGradeReplyBind(objSource, leveid, item.UserID, item.UserName, item.SrcImg, item.Summary, item.DateAdded, item.SourceTimes, item.ReplyID, item.IsAudit, strPostID, item.SourceID, item.RankName, item.ExperienceCount, item.LevelID, item.NickName);
            }
            BindReplyPage(objSource, response.pageCount, response.pageUrl);
            BindReplyMouse();
            $(".reply_btn").click(function () {
                NewReplyNext(this);
            });
        }
    }, null);
}
function GetGradeReplyBind(obj, leveid, itemUserID, itemUserName, itemSrcImg, itemSummary, itemDateAdded, SourceTimes, itemGradeID, itemIsAudit, postID, SourceID, RankName, ExperienceCount, userLevelID, nickName) {
    var strTitle = $(".detail .title h2").text();
    var longLeagueID = $("#hid_LongLeaguesID").val();
    var isPlugin = parseInt($("#hid_IsPlugin").val(), 10);
    var strText = "";
    strText = strText + "<li>";
    strText = strText + "<div class=\"user-pic\">";
    strText = strText + "<a rel='nofollow' class=\"logo userface\" target=\"_blank\" href=\"http://bulo.hujiang.com/u/" + itemUserID + "\" userid=\"" + itemUserID + "\"><img src=\"" + itemSrcImg + "\" /></a></div>";
    strText = strText + "<div class=\"article\">";
    strText = strText + "<div class=\"a-title cf\"><a rel='nofollow' href=\"http://bulo.hujiang.com/u/" + itemUserID + "\" title=\"" + itemUserName + "\">" + itemUserName;
    strText = strText + "</a>";
    strText = strText + "<span class='nickName'>" + nickName + "</span>";
    if (isPlugin == -1)
        strText = strText + ""; else if (isPlugin && (RankName != null && RankName != '' && ExperienceCount > 0))
        strText = strText + " <a href='/" + longLeagueID + "/levelrule/' title=\"本社团头衔" + userLevelID + "级，经验值" + ExperienceCount + "，点击进入等级头衔说明页\"><span class=\"user_level_detail\">" + RankName + "</span></a> "; else if (isPlugin)
        strText = strText + " <a href='/" + longLeagueID + "/levelrule/' title=\"点击进入等级头衔说明页\"><span class=\"user_level_detail\">路人甲</span></a> ";
    strText = strText + " <span class=\"grey\" title=\"发布时间：" + SourceTimes + "\">" + itemDateAdded + "</span>";
    if (SourceID > 0) {
        strText = strText + "<a href='http://st.hujiang.com/topic/15207291839/' target='_blank'><span class='mobile_pos' title='来自社团移动端（APP或触屏）'></span></a>";
    }
    strText = strText + " </div>";
    if (!itemIsAudit) {
    }
    strText = strText + "<div class=\"a-p\">" + $.parseEmoji(itemSummary);
    strText = strText + "</div>";
    strText = strText + "<div class=\"a-info cf\">";
    strText = strText + "<div class=\"a-info-r fr\">";
    var objUserID = $("#hid_UserID").val();
    var objLevel = $("#hid_IsAdmin").val();
    var isUserLocked = $("#hid_IsUserLocked").val();
    if (objUserID > 0) {
        strText = strText + "<span class=\"post_more_link\">";
        strText = strText + "<a href=\"javascript:;\" class=\"report_btn\"  onclick=\"PopReport(20," + postID + ",'" + strTitle + "[" + leveid + "的二级回复]" + itemSummary + "'," + itemUserID + ")\" title=\"举报\">举报</a>";
        if (objLevel == 1 || objUserID == itemUserID) {
            strText = strText + "<a href=\"javascript:;\" class=\"delete_btn\" onclick=\"OpenReplyEdit(" + itemGradeID + ")\" title=\"修改\">修改</a>";
            strText = strText + "<a href=\"javascript:;\" class=\"delete_btn\" onclick=\"delPostReply(" + itemGradeID + ")\" title=\"删除\">删除</a>";
        }
        itemSummary = itemSummary.replace(/<[^>]*>/g, "");
        if (itemSummary.length > 30)
            itemSummary = itemSummary.substring(0, 29);
        strText = strText + "</span>";
        if (isUserLocked == 0)
            strText = strText + "<a href=\"javascript:;\" class=\"btn-sec-reply fastLogin\" title=\"回复\" data-postid=\"" + postID + "\" data-username=\"" + itemUserName + "\" data-parentid=\"" + itemGradeID + "\">回复</a>";
    }
    strText = strText + "</div>";
    strText = strText + "</div>";
    strText = strText + "</div>";
    strText = strText + "</li>";
    strText = $(strText);
    $(obj).find("ul").append(strText);
    strText.emoji();
}
function BindReplyMouse() {
    $('.reply_list > li').unbind("mouseover").unbind("mouseleave");
    $('.reply_list > li').bind('mouseover',function () {
        $(this).find('.delete_btn').show();
        $(this).find('.report_btn').show();
    }).bind('mouseleave', function () {
        $(this).find('.delete_btn').hide();
        $(this).find('.report_btn').hide();
    })
}
function BindReplyPage(obj, count, pageUrl) {
    if (count > 1) {
        $(obj).find(".page").html(pageUrl);
        $(obj).find(".page").show();
    }
    else {
        $(obj).find(".page").remove();
    }
}
function NewReplyNext(obj) {
    var objSource = $(obj).parents(".response_block");
    $(objSource).find(".edit_area").show();
    var userobj = $(obj).parents("li");
    var userName = $($(userobj).find(".name")).text();
    $(objSource).find("textarea").focus();
    $(objSource).find("textarea").val("回复 " + userName + "：");
    $(objSource).attr("data-gid", $(obj).attr("data-gid"));
    $(objSource).attr("data-tid", $(obj).attr("data-tid"));
}
function showApplyLeague(leagueID) {
    if ($('#hdnCurrentUserID').val() === "0") {
        return false;
    }
    $.getJSON('/ajax/optionAjax.ashx', {action:'getLeagueApplyHint', leagueID:leagueID}, function (d) {
        var diystr = '';
        if (d.ret > 0) {
            if (d.data) {
                diystr = '<div class="diy_tips"><span class="tip_title">入社须知：</span>' + d.data.text;
                if (d.data.link)diystr += '<a href="' + d.data.link + '" target="_blank">详情</a>';
                diystr += '</div>';
            }
            var showHtml = '<div class="pop-out">';
            showHtml += '   <div class="panel"><div class="pad"><div class="form-li">' + diystr;
            showHtml += '       <div class="form-c" style="width:100%">';
            showHtml += '           <textarea id="areaApplyMsg" placeholder="填写申请理由"></textarea>';
            showHtml += '       </div>';
            showHtml += '   </div>';
            showHtml += '   <div class="row">';
            showHtml += '       <a href="javascript:;" class="btn btn-s btn-green bc" id="btnCommonApplyLeague" data-id="' + leagueID + '">申请</a>';
            showHtml += '</div></div></div></div>';
            $.modal(showHtml, {overlayClose:true});
        }
    });
}
function showAddLeague(leagueID, type, text, isSimplify) {
    if ($('#hdnCurrentUserID').val() === "0") {
        return false;
    }
    if (arguments.length >= 4 && isSimplify) {
        if (type == 2) {
            alert("私密社团不能加入~");
            return;
        }
        ApplyLeague(leagueID, type);
        return;
    }
    var tips = "您需要先加入社团哦~";
    if ($('#hid_IsBlackMember').length > 0 && $('#hid_IsBlackMember').val() == "1")
        tips = "您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员~";
    if (arguments.length >= 3 && text) {
        tips = text;
    }
    var showHtml = '<div class="pop-out"><div class="panel">';
    showHtml += '   <div class="pad">';
    showHtml += '       <p class="lead">' + tips + '</p>';
    showHtml += '       <div class="row">';
    showHtml += '           <a href="javascript:;" class="btn btn-m btn-green bc" id="btnCommonAddLeague" data-id="' + leagueID + '" data-type="' + type + '" >加入社团</a>';
    showHtml += '       </div>';
    showHtml += '   </div>';
    showHtml += '</div></div>';
    $.modal(showHtml, {overlayClose:true});
}
function showAuditingLeague() {
    if ($('#hdnCurrentUserID').val() === "0") {
        return false;
    }
    var showHtml = '<div class="pop-out"><div class="panel">';
    showHtml += '   <div class="pad">';
    showHtml += '       <p class="lead">您的加入请求正在审核过程中，请耐心等待。</p>';
    showHtml += '       <div class="row">';
    showHtml += '           <a href="javascript:;" class="btn btn-s btn-green bc" onclick="$.modal.close();">知道了</a>';
    showHtml += '       </div>';
    showHtml += '   </div>';
    showHtml += '</div></div>';
    $.modal(showHtml, {overlayClose:true});
}
function MemberAuditNotClick(obj) {
    var objSource = $(obj).parents(".row");
    var strText = $(objSource).find("textarea").val();
    var memberid = $(objSource).attr("data-memberid");
    var leagueName = $("#headLeagueName").text();
    $.comajax("/ajax/PostAjax.asmx", "SetLeagueMemberAudit", {memberID:memberid, msg:strText, leagueName:leagueName, isActive:false}, function (d) {
        if (d.saveOK <= 0) {
            alert("操作失败~");
        }
        else if (d.saveOK > 0) {
            $(objSource).fadeOut(1000, function () {
                this.remove();
            });
        }
    }, null);
}
function MemberAuditYesClick(obj) {
    var objSource = $(obj).parents(".row");
    var memberid = $(objSource).attr("data-memberid");
    var leagueName = $("#headLeagueName").text();
    $.comajax("/ajax/PostAjax.asmx", "SetLeagueMemberAudit", {memberID:memberid, msg:"", leagueName:leagueName, isActive:true}, function (d) {
        if (d.saveOK > 0 || d.saveOK == -2) {
            var newSource = $(obj).parents(".buttons");
            $(newSource).html("<a href=\"javascript:;\" class=\"btn btn-permited\">已批准</a>");
        }
        else if (d.saveOK == -300) {
            alert("该用户加入社团的数量已达上限（300个）", true);
            $(objSource).fadeOut(1000, function () {
                this.remove();
            });
        }
        else {
            alert("操作失败~");
        }
    }, null);
}
function SetTopicStatus(objtype, objstatus) {
    var topicId = $('#hide_userInfo').attr('topicid');
    switch (objtype) {
        case 1:
        {
            $.comajax("/ajax/PostAjax.asmx", "DoToTop", {topicId:topicId, istop:objstatus == 1 ? true : false}, function (data) {
                if (data == 0) {
                    alert("您当前还没有登录~")
                }
                else if (data == -1) {
                    alert("操作失败~")
                }
                else if (data == -2) {
                    alert("对不起，社团只能有5个置顶贴。")
                }
                else if (data > 0) {
                    alert("操作成功");
                    window.location.reload();
                }
            }, null);
        }
            ;
            break;
        case 2:
        {
            $.comajax("/ajax/PostAjax.asmx", "DoHot", {topicId:topicId, ishot:objstatus == 1 ? true : false}, function (data) {
                if (data == 0) {
                    alert("您当前还没有登录~")
                }
                else if (data == -1) {
                    alert("操作失败~")
                }
                else if (data > 0) {
                    alert("操作成功");
                    window.location.reload();
                }
            }, null);
        }
            ;
            break;
        case 3:
        {
            $.comajax("/ajax/PostAjax.asmx", "DoBest", {topicId:topicId, isbest:objstatus == 1 ? true : false}, function (data) {
                if (data == 0) {
                    alert("您当前还没有登录~")
                }
                else if (data == -1) {
                    alert("操作失败~")
                }
                else if (data > 0) {
                    alert("操作成功");
                    window.location.reload();
                }
            }, null);
        }
            ;
            break;
        case 4:
        {
            $.comajax("/ajax/PostAjax.asmx", "DoLock", {topicId:topicId, isLock:objstatus == 1 ? true : false}, function (data) {
                if (data == 0) {
                    alert("您当前还没有登录~")
                }
                else if (data == -1) {
                    alert("操作失败~")
                }
                else if (data > 0) {
                    alert("操作成功");
                    window.location.reload();
                }
            }, null);
        }
            ;
            break;
    }
}
function PopReport(typeid, replyId, title, userid) {
    var src = '/frame/report.aspx?type=' + typeid + '&userid=' + userid + '&title=' + encodeURI(title) + '&id=' + replyId + '&r=' + Math.random();
    modalIframe(src, 520);
}
function delPostReply(gradeId) {
    if (confirm("确认要删除吗?")) {
        $.comajax("/ajax/PostAjax.asmx", "DeletePostReply", {replyID:gradeId}, function (data) {
            if (data == -2) {
                alert("您当前还没有登录~")
            }
            else if (data == -1) {
                alert("操作失败~")
            }
            else if (data > 0) {
                window.location.reload();
            }
        }, null);
    }
}
function modalIframe(src, width) {
    $.modal('<iframe class="audioIframeOnly" src="' + src + '" height="450" width="' + width + '" frameborder="no" border="0">', {containerCss:{backgroundColor:"#fff", borderColor:"#fff", height:460, padding:0, width:width}});
}
function DTopic(topicid, type) {
    if (topicid <= 0)
        return;
    if (type == 1) {
        var objleaguesID = $("#hide_userInfo").attr("data-longleaguesid");
        if (confirm("确认要删除吗?")) {
            $.comajax("/ajax/PostAjax.asmx", "DelTopic", {topicId:topicid}, function (data) {
                if (data == -1) {
                    alert("您当前还没有登录~")
                }
                else if (data == -2) {
                    alert("该帖子已经删除~")
                }
                else if (data > 0) {
                    window.location.href = "/" + objleaguesID + "/c" + data;
                }
                else {
                    window.location.href = "/" + objleaguesID;
                }
            }, null);
        }
    }
    else if (type == 2) {
        if (confirm("确认要删除吗?")) {
            $.comajax("/ajax/PostAjax.asmx", "DelPost", {postId:topicid}, function (data) {
                if (data == 0) {
                    alert("您当前还没有登录~")
                }
                else if (data == -1) {
                    alert("操作失败~")
                }
                else if (data > 0) {
                    window.location.reload();
                }
            }, null);
        }
    }
}
function CloseWindows() {
    $.modal.close();
}
function LeaveBrowser() {
    window.onbeforeunload = function () {
        return("已成功保存为草稿，确定离开吗？");
    }
}
function SetBgLeague(leagueID, imgID, typeID) {
    $.comajax("/ajax/PostAjax.asmx", "SetBgLeague", {leagueID:leagueID, imgID:imgID, typeID:typeID}, function (data) {
        if (data == -2) {
            alert("您当前还没有登录~")
        }
        else if (data == -1) {
            alert("操作失败~")
        }
        else if (data == -3) {
            alert("您权限不够，不能操作~")
        }
        else if (data > 0) {
        }
    }, null);
}
$(function () {
    if (!League.fun.getCookie('header_board_tip')) {
        $('.header_board_tip').show()
    }
    $('.fixedTop')[0] && $('.fixedTop').fixedTop({top:55});
})
$(window).scroll(function () {
    var h = document.documentElement.scrollTop || document.body.scrollTop, $top = $('.go_top');
    if (h > 200) {
        $top.css('display', 'block');
    }
    else {
        $top.hide();
    }
});
(function () {
    var win = window;
    if (win['League'] === undefined)win['League'] = {};
    var League = win['League'];
    League.fun = {getCookie:function (name) {
        var cookie_start = document.cookie.indexOf(name);
        var cookie_end = document.cookie.indexOf(";", cookie_start);
        return cookie_start == -1 ? '' : unescape(document.cookie.substring(cookie_start + name.length + 1, (cookie_end > cookie_start ? cookie_end : document.cookie.length)));
    }, setCookie:function (cookieName, cookieValue, seconds, path, domain, secure) {
        if (!domain) {
            domain = this.getHost();
        }
        var expires = new Date();
        expires.setTime(expires.getTime() + seconds * 1000);
        document.cookie = escape(cookieName) + '=' + escape(cookieValue) + (expires ? '; expires=' + expires.toGMTString() : '') + (path ? '; path=' + path : '/') + (domain ? '; domain=' + domain : '') + (secure ? '; secure' : '');
    }, getHost:function (url) {
        var host = "null";
        if (typeof url == "undefined" || null == url) {
            url = window.location.host;
        }
        var hosts = url.split(".");
        if (hosts.length > 1) {
            return hosts[hosts.length - 2] + "." + hosts[hosts.length - 1];
        }
        return hosts[hosts.length - 1];
    }}
})();
$(function () {
    hmuSt.checkFoot();
});
function SaveDraft() {
    var strText = editor.text();
    var reg = new RegExp("<!doctype html>", "g");
    strText = strText.replace(reg, " ");
    strText = encodeURI(strText);
    if (strText <= 10)
        return;
    $("#txtContent").val(editor.html());
    var draftID = $.trim($("#hid_DraftID").val()), topicID = $.trim($("#hid_TopicID").val()), leaguesID = $("#hid_LeaguesID").length > 0 ? $.trim($("#hid_LeaguesID").val()) : "", boardID = $("#drop_Board").length > 0 ? $.trim($("#drop_Board").val()) : "", strTitle = $("#txtTitle").length > 0 ? $.trim($("#txtTitle").val()) : "", address = $("#txt_Address").length > 0 ? $.trim($("#txt_Address").val()) : "", strBeginDate = $("#txt_BeginTime").length > 0 ? $.trim($("#txt_BeginTime").val()) : "", strEndDate = $("#txt_EndTime").length > 0 ? $.trim($("#txt_EndTime").val()) : "", strUrl = $("#txt_Url").length > 0 ? $.trim($("#txt_Url").val()) : "", strContent = $("#txtContent").length > 0 ? $.trim($("#txtContent").val()) : "", imgUrl = $("#avatar").length > 0 ? $.trim($("#avatar").val()) : "", strReleaseTime = $("#txt_ReleaseTime").length > 0 ? $("#txt_ReleaseTime").val() : "", isRelease = $("#chk_IsRelease:checked").length ? true : false, typeID = $("#hid_TypeID").length > 0 ? $.trim($("#hid_TypeID").val()) : "0", draftTags = typeof(tagId) == "undefined" ? '' : tagId, draftMagID = typeof(magazineID) == "undefined" ? 0 : magazineID;
    var activityTypeID = 1;
    if ($("input[name=\"rad_TypeID\"]:checked").length > 0 && $("input[name=\"rad_TypeID\"]:checked").val() == 2)
        activityTypeID = 2;
    var roomID = 0;
    if (activityTypeID == 2)
        roomID = $("#hid_RoomID").val();
    if (boardID == null || boardID == "")
        boardID = "0";
    $.comajax("/ajax/PostAjax.asmx", "AddDraftInfo", {draftID:draftID, topicID:topicID, leaguesID:leaguesID, boardID:boardID, strTitle:strTitle, address:address, strBeginDate:strBeginDate, strEndDate:strEndDate, strUrl:strUrl, strContent:strContent, imgUrl:imgUrl, strReleaseTime:strReleaseTime, isRelease:isRelease, typeID:typeID, subjectID:typeof(subjectID) == "undefined" ? 0 : subjectID, activitiesTypeID:activityTypeID, activitiesRoomID:roomID, tags:draftTags, magID:draftMagID}, function (d) {
        if (d.saveOK == -1) {
            alert("你登录之后才能操作哦！");
            return;
        }
        else if (d.saveOK == -2) {
            alert("该社团不存在！");
            return;
        }
        else if (d.saveOK > 0) {
            $("#hid_DraftID").val(d.saveOK);
            $('#draft_div .save_draft_btn').text('保存成功');
            $('#draft_div span').show();
            setTimeout(function () {
                $('#draft_div .save_draft_btn').text('保存草稿');
                $('#draft_div span').hide();
            }, 3000);
            if (!$('#draft_div .temp_link')[0]) {
                $('#draft_div .save_draft_btn').after(' ( <a target="_blank" href="/mydraft/" class="temp_link">查看</a> )')
            }
        }
    }, null);
}
function DeleteDraft(obj, draftID) {
    if (!confirm("确认要删除吗?"))
        return;
    $.comajax("/ajax/PostAjax.asmx", "EditDraftStatus", {draftID:draftID}, function (d) {
        if (d.saveOK == -1) {
            alert("你登录之后才能操作哦！");
            return;
        }
        else if (d.saveOK == 0) {
            alert("该草稿不存在！");
            return;
        }
        else if (d.saveOK > 0) {
            if ($(".draft_list li").length <= 0)
                window.location.reload();
            $(obj).parents("li").remove();
        }
    }, null);
}
function OpenReplyEdit(replyID) {
    $.getJSON("/ajax/optionAjax.ashx", {action:"getreply", replyID:replyID}, function (re) {
        var data = re.data;
        var showHtml = '<div class="pop-out">';
        showHtml += '   <div class="panel"><div class="pad"><div class="form-li">';
        showHtml += '       <div class="form-c" style="width:100%">';
        showHtml += '           <textarea>' + data.replace(/<br>|<br\/>/g, "\r\n") + '</textarea>';
        showHtml += '       </div>';
        showHtml += '   </div>';
        showHtml += '   <div class="row">';
        showHtml += '       <a href="javascript:;" class="btn btn-s btn-green bc" data-id="' + replyID + '" onclick="SaveReply(this)">保存</a>';
        showHtml += '</div></div></div></div>';
        $.modal(showHtml, {overlayClose:false});
        setPos($('#simplemodal-data textarea')[0])
    });
}
function setPos(o, start, end) {
    if (start === undefined)start = o.value.length;
    if (end === undefined)end = o.value.length;
    if (o.setSelectionRange) {
        setTimeout(function () {
            o.setSelectionRange(start, end);
            o.focus();
        }, 0);
    }
    else if (o.createTextRange) {
        var textRange = o.createTextRange();
        textRange.moveStart("character", start);
        textRange.moveEnd("character", end);
        textRange.select();
    }
}
function SaveReply(obj) {
    var objValue = $(obj).parents(".pop-out").find("textarea").val();
    var replyID = $(obj).attr("data-id");
    var leagueID = $("#hid_LeaguesID").val();
    $.comajax("/ajax/PostAjax.asmx", "EditReply", {replyID:replyID, leagueID:leagueID, summary:objValue}, function (data) {
        if (data.saveOK == -2) {
            alert("您当前还没有登录~")
        }
        else if (data.saveOK == -1) {
            alert("操作失败~")
        }
        else if (data.saveOK == -3) {
            alert("您权限不够，不能操作~")
        }
        else if (data.saveOK == -4) {
            alert("内容中有敏感字符");
        }
        else if (data.saveOK == -5) {
            alert("内容不能为空")
        }
        else if (data.saveOK == -6) {
            alert("回复内容不能超过500个字哦~");
        }
        else if (data.saveOK == -7) {
            alert("您已被该社团管理员拉入黑名单，无法进行此操作，请联系该社团管理员~")
        }
        else if (data.saveOK > 0) {
            if ($("#reply_" + replyID).length > 0) {
                $("#reply_" + replyID).find(".a-p").html($.parseEmoji(data.datalist.Summary));
                resizeFaceImg("#reply_" + replyID + " img");
            }
            CloseWindows();
        }
        else {
            alert("操作失败~");
        }
    }, null);
}
function SetTopicHeadline(topicid) {
    var src = '/frame/AddHeadlineNew.aspx?topicid=' + topicid;
    modalIframe(src, 620);
}
function SaveHeadlineNewEdit(obj) {
    var topicID = $("#hid_TopicID").val();
    var newsID = $("#hid_NewsID").val();
    var strSummary = $("#txt_Summary").val();
    var strTitle = $("#txt_Title").val();
    var strImg = $("#txt_ImgUrl").val();
    var strLinkUrl = $("#hid_LinkUrl").val();
    $.comajax("/ajax/PostAjax.asmx", "EditHeadlineNew", {topicID:topicID, newsID:newsID, summary:strSummary, title:strTitle, img:strImg, linkUrl:strLinkUrl}, function (data) {
        if (data.saveOK == -2) {
            alert("您当前还没有登录~")
        }
        else if (data.saveOK == -1) {
            alert("操作失败~")
        }
        else if (data.saveOK == -3) {
            alert("您权限不够，不能操作~")
        }
        else if (data.saveOK > 0) {
            alert('推荐成功！')
            parent.$.modal.close();
        }
        else {
            alert("操作失败~");
        }
    }, null);
}
function GetUserFace(uid, psize) {
    uid = uid.toString();
    uid = $(uid).PadLeft(4, '0');
    uid = uid.toString();
    var firstLevel = uid.substring(uid.Length - 4, 2);
    var secondLevel = uid.substring(uid.Length - 2, 2);
    return"http://i2.hjfile.cn/f" + psize + "/" + firstLevel + "/" + secondLevel + "/" + uid + ".jpg";
}
function DelayScript(url, delay) {
    var load = function () {
        var blnIsLoad = false;
        try {
            if (typeof(HJ) != "undefined" && typeof(HJ.global) != "undefined" && typeof(HJ.global.SearchType) != "undefined") {
                blnIsLoad = true;
            }
        }
        catch (e) {
        }
        if (!blnIsLoad) {
            var el = document.createElement("script");
            el.type = "text/javascript";
            el.src = url;
            var head = document.getElementsByTagName("head")[0];
            head.appendChild(el);
        }
    }
    if (delay) {
        window.setTimeout(load, delay);
    }
    else {
        $(document).ready(load);
    }
}
function gotoImgLink(img) {
    if ($(img).width() > 600) {
        $(img).parent().attr('href', "javascript:;").removeAttr('target')
    }
}
function GetPluginCount() {
    if (objIsAdmin == 0)
        return;
    $.getJSON("/ajax/pluginAjax.ashx", {action:"getPluginCount", leagueID:objLeagueID}, function (re) {
        var data = re.data;
        if (data.count > 0) {
            $('#btnManage').attr('href', "/" + objAlias + '/admin/plugin/').append('<span class="has_new_plugin">New</span>');
        }
    });
}
function InitPlugin() {
    if (objIsAdmin == 0)
        return;
    $.comajax("/ajax/pluginPostAjax.asmx", "InitPlugin", {leagueID:objLeagueID}, function (data) {
        if (data.status < 0) {
        }
    }, null);
}
var subscribe = {addSubscribe:function (obj, MagId) {
    $.comajax('/ajax/PostAjax.asmx', 'AddUserMagSubscribeInfo', {model:{MagId:MagId}}, function (d) {
        if (d.status == 0) {
            $(obj).replaceWith('<span class="subscribed_mag">已订阅</span>');
            subscribe.showSubscribedTip();
        }
        else {
            alert(d.msg);
        }
    });
}, removeSubscribe:function (obj, magID) {
    $.comajax('/ajax/PostAjax.asmx', 'DeleteUserMagSubscribe', {magID:magID}, function (d) {
        if (d.status == 0) {
            $(obj).replaceWith('<span class="add_subscribe_btn">订阅社刊</span>');
        }
        else {
            alert(d.msg);
        }
    });
}, showSubscribedTip:function () {
    var msg = $('<div class="subscribe_tip_box"><p class="tip_content">该社刊已订阅成功！</p>' + '<a href="javascript:$.modal.close();" class="btn btn-green continue_browse">继续浏览</a>' + '<a href="/mymags/" target="_blank" class="btn btn-default view_mag_btn">查看我的社刊</a>' + '<span class="grey" style="display:block;clear:both;padding:20px 0"><label><input type="checkbox" style="outline:none"> 不再提示</label></span></div>');
    if (League.fun.getCookie('showSubscribedTip') == 0) {
        $.modal(msg);
    }
    msg.on('change', 'input', function () {
        if ($(this).is(':checked')) {
            League.fun.setCookie('showSubscribedTip', 1, 999 * 24 * 60 * 60, '/')
        }
        else {
            League.fun.setCookie('showSubscribedTip', 0, 999 * 24 * 60 * 60, '/')
        }
    });
}, showConfirm:function (obj, magID) {
    var msg = $('<div class="subscribe_tip_box"><p class="tip_content">您确认要取消订阅吗？</p>' + '<a href="javascript:;" class="btn btn-default continue_browse">是</a>' + '<a href="javascript:$.modal.close()" class="btn btn-green view_mag_btn">否</a> </div>');
    $.modal(msg);
    msg.on('click', '.continue_browse', function () {
        subscribe.removeSubscribe(obj, magID);
        $.modal.close();
    });
}};
(function () {
    function Tooltip(element, options) {
        return new init(element, options);
    }

    function init(element, options) {
        var defaultOption = {offsetTop:0, offsetLeft:0}
        this.options = $.extend(defaultOption, options);
        this._init(element);
    }

    init.prototype = Tooltip.prototype;
    window.hui_Tooltip = window.hui_Tooltip || Tooltip;
    $.extend(Tooltip.prototype, {_init:function (element) {
        var self = this;
        self.element = element;
        self._createTooltip();
        element.on("mouseover", self.options.target, $.proxy(self._mouseOver, self)).on("mouseout", self.options.target, $.proxy(self._mouseOut, self));
    }, _createTooltip:function () {
        if (!this.tooltip) {
            this.tooltip = $("<div class='hui_tooltip'><div class='hui_tooltip_pointer'></div><div class='hui_tooltip_content'></div></div>").appendTo(this.element).hide();
            this.pointer = this.tooltip.find(".hui_tooltip_pointer");
            this.content = this.tooltip.find(".hui_tooltip_content");
        }
    }, _mouseOver:function (e) {
        var self = this, target = $(e.target), offset = target.position(), content = self.options.content, pos = {left:offset.left + target.width() + this.options.offsetLeft, top:offset.top + target.height() / 2 + this.options.offsetTop}, tooltip = self.tooltip, text = content;
        if ($.isFunction(content)) {
            text = content.call(this, e);
        }
        self.content.html(text);
        tooltip.show();
        pos.top -= tooltip.height() / 2;
        tooltip.css({left:parseInt(pos.left), top:parseInt(pos.top)});
    }, _mouseOut:function (e) {
        this.tooltip.hide();
    }});
})()
$(function () {
    var favorLeagueLoading = false;
    $(".head-banner, .st-list").on("click", ".signed-icon, .unsigned-icon", function () {
        if (favorLeagueLoading)return;
        var ele = $(this), id = ele.attr("data-id"), signed = ele.hasClass("signed-icon"), args = signed ? "CancelFavorLeague" : "AddFavorLeague";
        favorLeagueLoading = true;
        $.comajax('/ajax/PostAjax.asmx', args, {leagueID:id}, function (d) {
            favorLeagueLoading = false;
            if (d.saveOK == 0) {
                ele.removeClass("signed-icon unsigned-icon");
                ele.addClass(signed ? "unsigned-icon" : "signed-icon");
                ele.css("display", signed ? "" : "inline-block");
            } else if (d.saveOK == 1) {
                $.modal('<div class="pop-out" style="padding:40px;width:300px"><p style="text-align:center;font-size:16px;margin-bottom:20px">“我的最爱社团”最多只能加9个哦~</p><a href="javascript:$.modal.close()" class="btn btn-m btn-green bc">知道了</a> </div>')
            } else {
                alert("操作失败！");
            }
        })
    });
    hui_Tooltip($(".head-banner .col-8"), {target:".unsigned-icon, .signed-icon", content:function (e) {
        if ($(e.target).hasClass("signed-icon")) {
            return"取消";
        }
        return"设为最爱";
    }, offsetTop:13, offsetLeft:12});
    hui_Tooltip($(".st-list"), {target:".unsigned-icon, .signed-icon", content:function (e) {
        if ($(e.target).hasClass("signed-icon")) {
            return"取消";
        }
        return"设为最爱";
    }, offsetLeft:12});
});
function showActivateGuide() {
    var text = "您的账号尚未激活<br />激活后可以体验更多功能！";
    var showHtml = '<div class="pop-out"><div class="panel">';
    showHtml += '   <div class="pad">';
    showHtml += '       <p class="lead">' + text + '</p>';
    showHtml += '       <div class="row">';
    showHtml += '           <a target="_blank" href="http://bulo.hujiang.com/setting/email/" class="btn btn-m btn-green bc">立即激活</a>';
    showHtml += '       </div>';
    showHtml += '   </div>';
    showHtml += '</div></div>';
    $.modal(showHtml, {overlayClose:true});
}
function showModalTips(text, overlayClose) {
    text = text || "";
    var showHtml = '<div class="pop-out"><div class="panel">';
    showHtml += '   <div class="pad">';
    showHtml += '       <p class="lead">' + text + '</p>';
    showHtml += '       <div class="row">';
    showHtml += '           <a href="javascript:$.modal.close();" class="btn btn-m btn-green bc">知道了</a>';
    showHtml += '       </div>';
    showHtml += '   </div>';
    showHtml += '</div></div>';
    if (arguments.length >= 2 && overlayClose) {
        $.modal(showHtml, {overlayClose:true});
    } else {
        $.modal(showHtml);
    }
}