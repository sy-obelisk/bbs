var isclosed = false;
var newData;
function GetNewMsg(data, nosave) {
    var result = data || {};
    $.extend(result, newData);
    if (result) {
    }
    var html = "";
    if (data == null) {
        return;
    }
    var allCount = 0;
    if (data.st_answer)
        allCount += data.st_answer;
    if (data.st_atme)
        allCount += data.st_atme;
    if (allCount > 0) {
        $("#myleague").addClass("my_league_icon");
        if (data.st_atme && data.st_atme > 0) {
            var tc_count = data.st_atme;
            if (tc_count > 99) {
                tc_count = "99+";
            }
            html += "<span class='tips_data_stat'><a class='noline floatright' href=\"/attopic/\">点击查看</a>" + tc_count + "条社团@消息<br /></span>";
            if ($("#atmy_li").length > 0) {
                $("#atmy_li").addClass("my_league_icon2");
            }
        }
        if (data.st_answer && data.st_answer > 0) {
            var tc_count = data.st_answer;
            if (tc_count > 99) {
                tc_count = "99+";
            }
            html += "<span class='tips_data_stanswer'><a class='noline floatright' href=\"/rm/\">点击查看</a>" + tc_count + "条社团新回复<br /></span>";
            if ($("#rm_li").length > 0) {
                $("#rm_li").addClass("my_league_icon");
            }
        }
    }
    else {
        $("#myleague").removeClass("my_league_icon");
        if ($("#atmy_li").length > 0) {
            $("#atmy_li").removeClass("my_league_icon2");
        }
        if ($("#rm_li").length > 0) {
            $("#rm_li").removeClass("my_league_icon");
        }
    }
    if (html === "") {
        $("#ing_push").hide();
        $("#push_cnt").html("");
    }
    else {
        $("#ing_push").show();
        $("#push_cnt").html(html);
        var isIe6 = false;
        if ($.browser.msie) {
            if ($.browser.version == '6.0') {
                isIe6 = true;
            }
        }
    }
    try {
        if (!nosave) {
            HJBulo.fun.setCookie("st_tips_201208_nc", $.toJSON(data), 30, "/");
        }
        else {
            HJBulo.fun.setCookie("st_tips_201208_nc", '', -300, "/");
        }
    }
    catch (e) {
    }
}
(function () {
    var win = window;
    if (win['HJBulo'] === undefined)win['HJBulo'] = {};
    var HJBulo = win['HJBulo'];
    HJBulo.fun = {getCookie:function (name) {
        var cookie_start = document.cookie.indexOf(name);
        var cookie_end = document.cookie.indexOf(";", cookie_start);
        return cookie_start == -1 ? '' : unescape(document.cookie.substring(cookie_start + name.length + 1, (cookie_end > cookie_start ? cookie_end : document.cookie.length)));
    }, setCookie:function (cookieName, cookieValue, seconds, path, domain, secure) {
        var expires = new Date();
        expires.setTime(expires.getTime() + seconds * 1000);
        document.cookie = escape(cookieName) + '=' + escape(cookieValue)
            + (expires ? '; expires=' + expires.toGMTString() : '')
            + (path ? '; path=' + path : '/')
            + (domain ? '; domain=' + domain : '')
            + (secure ? '; secure' : '');
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
function getNotifyUrl() {
    var host = location.host, url = "http://hjapi.hujiang.com/notify/v1/tips/c/Jsonp/";
    if (host.indexOf('beta') != -1 || host.indexOf('qa') != -1 || host.indexOf('st2') != -1 || host.indexOf('dev') != -1 || host.indexOf('local') != -1) {
        url = "http://yz.tips.yeshj.com/notify/v1/tips/count/jsonp/";
    }
    return url;
}
function GetMsg() {
    var cookieMsg = HJBulo.fun.getCookie("st_tips_201208_nc");
    if (cookieMsg) {
        GetNewMsg($.evalJSON(cookieMsg), true);
        return;
    }
    var userid = 0;
    var username = "";
    try {
        userid = centerUserID;
        username = centerUserName;
    }
    catch (e) {
    }
    var notifyUrl = getNotifyUrl() + userid;
    $.ajax({type:"get", url:notifyUrl, dataType:"jsonp", jsonp:"callback", success:function (data, status) {
        successCallback(data, status);
    }});
}
function closeMsg() {
    isclosed = true;
    $("#ing_push").hide();
    HJBulo.fun.setCookie("st_tips_201208_nc", '', -300, "/");
    $.ajax({url:"/ajax/optionAjax.ashx?action=closeLeagueMsg", dataType:"json", timeout:'4000'});
}
var successCallback = function (data, status) {
    if (data) {
        GetNewMsg(data);
    }
};
(function () {
    function removeMenus() {
        $('.m-select').removeClass('m-focus').find('dd').hide();
    };
    var SelectorJS = {selector:{init:function (options) {
        this.select = $(options.id);
        this.data = options.data;
        this.value = options.value;
        this.height = options.height;
        this.width = options.width;
        this.curValue = this.select.find('dt');
        this.list = this.select.find('dd');
        this.input = this.select.find('input');
        this.click = options.click;
        this.height && this.list.css({height:this.height, overflowY:'auto'});
        this.width && this.select.css({width:this.width});
        this.create = function () {
            var listHTML = '', that = this;
            if (typeof this.data !== 'string') {
                $.each(this.data, function (index, val) {
                    if (val) {
                        if (val[0] == that.value) {
                            that.input.val(val[0]);
                            that.curValue.html(val[1]);
                        }
                        if (val.length > 2) {
                            if (val[1] == that.value || val[0] == that.value) {
                                listHTML += '<a class="selected" val="' + val[0] + '" data-type="' + val[2] + '" href="javascript:;">' + val[1] + '</a>';
                            } else {
                                listHTML += '<a val="' + val[0] + '" data-type="' + val[2] + '" href="javascript:;">' + val[1] + '</a>';
                            }
                        } else {
                            if (val[1] == that.value || val[0] == that.value) {
                                listHTML += '<a class="selected" val="' + val[0] + '" href="javascript:;">' + val[1] + '</a>';
                            } else {
                                listHTML += '<a val="' + val[0] + '" href="javascript:;">' + val[1] + '</a>';
                            }
                        }
                    }
                });
            } else {
                listHTML = this.data;
            }
            this.list.children().not('input').remove();
            this.list.append(listHTML);
            if (this.data !== 'string') {
            }
        }, this.events = function () {
            var that = this;
            this.list.find('a').bind('click', function (e) {
                e.stopPropagation();
                that.input.val($(this).attr('val'));
                that.curValue.html($(this).text());
                that.list.hide();
                that.select.removeClass('m-focus');
                that.click && that.click.call(this, $(this).attr('val') | 0, $(this).index());
                $(this).addClass('selected').siblings('a').removeClass('selected');
            });
            $(document).unbind('click', removeMenus).bind('click', removeMenus);
            this.select.bind('click', function (e) {
                e.stopPropagation();
                removeMenus();
                that.list.show();
                that.select.addClass('m-focus');
            });
        }
        this.create();
        this.events();
    }}, script:function (src, callback, that) {
        var script = document.getElementsByTagName('script'), i = 0, len = script.length;
        for (; i < len; i++) {
            if (/Selector.js/.test(script[i].src)) {
                $.getScript(script[i].src.replace('Selector.js', src), function () {
                    callback.call(that, addressCode);
                });
                break;
            }
        }
    }};
    window.SelectorJS = SelectorJS;
})();