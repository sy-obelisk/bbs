;
(function ($) {
    $.extend($.fn, {diyScroll:function (options) {
        var self = this;
        $(self).each(function () {
            var opt = {showPages:false, autoPlay:false, showPrevBtn:false, showNextBtn:false, defaultShowBTN:false, interValue:4000, subScroll:'li', loop:false, queue:false, scrollAction:'scroll'};
            opt = $.extend(opt, options);
            var scrollBox = $(this), cur = 1, loop = opt.loop, autoPlay = opt.autoPlay, scrollAction = opt.scrollAction, action = {'scroll':1, 'fade':1}, scrollObj = scrollBox.find(opt.subScroll), len = scrollObj.length, cw = scrollObj.outerWidth(), ch = scrollObj.outerHeight(), scrolling = 0, autoInterval, scrollPages;

            function showPages() {
                var str = '<ul class="pages"><li class="active"></li>', i;
                for (i = 1; i < len; i++) {
                    str += '<li></li>'
                }
                str += '<ul>'
                scrollPages = $(str)
                scrollBox.parent().append(scrollPages);
                scrollPages.on('mouseover', 'li',function () {
                    if (autoPlay)stopAutoPlay();
                    cur = scrollPages.find('li').index(this);
                    runScroll(1);
                }).on('mouseout', 'li', function () {
                    if (autoPlay)startAutoPlay();
                });
            }

            function showPrevBtn() {
                scrollBox.prepend('<a href="#" class="prev"><i></i></a>');
                scrollBox.on('click', '.prev', function () {
                    prev(1);
                    return false;
                })
            }

            function showNextBtn() {
                scrollBox.prepend('<a href="#" class="next"><i></i></a>');
                scrollBox.on('click', '.next', function () {
                    next(1);
                    return false;
                })
            }

            function prev(bl) {
                if (cur == 1 && !loop) {
                    return;
                }
                if (cur == 1 && loop) {
                    cur = 2;
                    scrollBox.css('margin-left', -cw).prepend(scrollBox.find(opt.subScroll).eq(len - 1));
                }
                if (bl && autoPlay) {
                    stopAutoPlay();
                    runScroll(0);
                    startAutoPlay()
                } else {
                    runScroll(0);
                }
            }

            function next(bl) {
                if (scrollAction == 'fade') {
                    if (cur > len - 1)cur = 0
                    runScroll(1);
                    return;
                }
                if (cur == len && !loop) {
                    return;
                }
                if (cur == len && loop) {
                    cur = len - 1;
                    scrollBox.css('margin-left', -(cur - 1) * cw).append(scrollBox.find(opt.subScroll).eq(0));
                }
                if (bl && autoPlay) {
                    stopAutoPlay();
                    runScroll(1);
                    startAutoPlay()
                } else {
                    runScroll(1);
                }
            }

            function runScroll(arrow, callback) {
                !arrow ? cur-- : cur++;
                if (!opt.queue) {
                    if (!scrolling) {
                        scrolling = 1;
                        if (scrollAction == 'fade') {
                            scrollObj.eq(cur - 1).fadeIn().siblings().fadeOut();
                            scrolling = 0;
                        } else {
                            scrollBox.animate({'margin-left':-(cur - 1) * cw}, 500, function () {
                                scrolling = 0;
                                callback && callback();
                            })
                        }
                    }
                } else {
                    if (scrollAction == 'fade') {
                        scrollObj.eq(cur).fadeIn().siblings().fadeOut();
                    } else {
                        scrollBox.animate({'margin-left':-(cur - 1) * cw}, {duration:500, queue:false, complete:function () {
                            callback && callback();
                        }});
                    }
                }
                if (opt.showPages && scrollPages) {
                    scrollPages.find('li').eq(cur - 1).addClass('active').siblings().removeClass('active');
                }
            }

            function stopAutoPlay() {
                clearInterval(autoInterval)
            }

            function startAutoPlay() {
                autoInterval = setInterval(function () {
                    next();
                }, opt.interValue);
            }

            function showPrevBTN(bl) {
                if (!bl) {
                    scrollBox.find('.prev').show();
                } else {
                    scrollBox.find('.prev').hide();
                }
            }

            function showNextBTN(bl) {
                if (!bl) {
                    scrollBox.find('.next').show();
                } else {
                    scrollBox.find('.next').hide();
                }
            }

            if (opt.showPages && len > 1) {
                showPages();
            }
            if (opt.showPrevBtn) {
                showPrevBtn();
            }
            if (opt.showNextBtn) {
                showNextBtn();
            }
            if (!action[scrollAction]) {
                scrollAction = 'fade';
            }
            if (scrollAction != 'fade') {
                scrollBox.css('width', len * cw);
            } else {
                cur = 0;
            }
            if (opt.autoPlay) {
                startAutoPlay();
                scrollBox.on('mouseover',function () {
                    showPrevBTN()
                    showNextBTN();
                    stopAutoPlay();
                }).on('mouseout', function () {
                        showPrevBTN(1)
                        showNextBTN(1);
                        startAutoPlay();
                    });
            }
            if (!opt.defaultShowBTN && len > 1) {
                scrollBox.on('mouseover',function () {
                    showPrevBTN()
                    showNextBTN();
                }).on('mouseout', function () {
                        showPrevBTN(1)
                        showNextBTN(1);
                    });
            }
            $(window).resize(function () {
                cw = scrollObj.outerWidth();
                if (scrollAction != 'fade') {
                    scrollBox.css('width', len * cw);
                    scrollBox.css('margin-left', -(cur - 1) * cw);
                }
            });
        })
    }})
})($ || jQuery || zepto);
var Loadpages = [1, 1, 1], xhrUrl = '/ajax/optionAjax.ashx?action=[actionName]&page=', xhrName = ['getMyLeagueTopicList', 'getHomeTopicList', 'getMySubMagTopicList'], haveMore = [true, true, true], obj = $('.hot_topic'), dataObj = obj.find('.topic_list > div'), loading = 0, cutDate = $('#hddTime').val().split(' ')[0].split('/');
function getDate(pos) {
    showLoading();
    $.ajax({url:xhrUrl.replace(/\[actionName\]/, xhrName[pos]) + Loadpages[pos], dataType:'json', type:'get', success:function (d) {
        loading = 0;
        hideLoading();
        if (d.ret == 1) {
            displayData(d.data);
        } else {
            alert('加载失败！')
        }
    }})
}
function GetUserFace(uid, psize) {
    uid = uid.toString();
    uid = $(uid).PadLeft(4, '0');
    uid = uid.toString();
    var firstLevel = uid.substring(uid.Length - 4, 2);
    var secondLevel = uid.substring(uid.Length - 2, 2);
    return"http://i2.hjfile.cn/f" + psize + "/" + firstLevel + "/" + secondLevel + "/" + uid + ".jpg";
}
function displayData(d, bl, showSettings) {
    if (d.count <= Loadpages[activeIndex] || Loadpages[activeIndex] == 3) {
        haveMore[activeIndex] = false;
        dataObj.eq(activeIndex).find('.more').show();
    }
    var html = $(getStr(d.topicList, bl, showSettings));
    dataObj.eq(activeIndex).children('ul').append(html);
}
function getStr(d, bl, showSettings) {
    var str = '', isnew = '<i class="icon_new">new</i>', bulo = '', cs = "topic_list_img", header = 'header?imageView2/1/w/96/h/96/format/png';
    if (bl == 1) {
        cs = "topic_list_img_user";
        bulo = 'http://bulo.hujiang.com';
    } else if (bl == 2) {
        bulo = '/mag';
        cs = "topic_list_img_mag";
        header = 'header?imageView2/1/w/96/h/120/format/png';
    }
    $.each(d, function (i, n) {
        str += '<li class="clearfix"><a class="topic_icon" rel="nofollow" href="' + bulo + '/' + (bl == 1 ? n.PosterID : bl == 2 ? n.LongMagID : n.Alias) + '/" target="_blank" userid="' + n.PosterID + '" title="' + (bl == 1 ? n.UserName : bl == 2 ? n.MagName : n.LeagueName) + '">' + '<img class="' + cs + '" src="';
        if (bl == 1) {
            str += GetUserFace(n.PosterID, 96);
        } else {
            str += header.replace(/header/, bl == 2 ? n.MagCover : n.Avatar).replace('i3.s.yun.hjfile.cn', 'i3.s.7.hjfile.cn').replace("http://i3.s.7.hjfile.cn/entry/", "http://i3.s.7.hjfile.cn/img/entry/");
        }
        str += '"><span class="user_name">' + (bl == 1 ? n.UserName : '') + '</span></a>' + '<div class="topic_content"><div class="topic_title clearfix"><span class="topic_times">' + RetDateTime(n.DateAdded) + '</span>' + isBestorHot(n, bl) + '<a href="/topic/' + n.LongTopicID + '/" class="ellipsis_text" target="_blank"  title="' + n.Title + '">' + n.Title + '</a>' + isPrivate(n) + (isNew(n.DateAdded) ? isnew : '') + '</div><p class="topic_desc">' + n.Summary + '</p>';
        if (n.UploadImg) {
            str += '<a href="/topic/' + n.LongTopicID + '/" class="topic_imgs" target="_blank">';
            $.each(n.UploadImg.split('|'), function (j, m) {
                if (j >= 4) {
                    return false;
                }
                str += '<span class="topic_img_box"><img src="' + m + '?imageView2/2/h/180/format/png"  onerror="this.parentNode.style.display=\'none\'"  class="topic_content_img" alt="' + m.Title + '"></span>'
            });
            str += '</a>';
        }
        if (showSettings) {
            str += '<div class="other_info clearfix with_settings">';
            str += "<div class=\"quick_settings\">";
            str += "    <div class=\"icons\">";
            str += "        <i class=\"icon_setting\"></i>";
            str += "        <i class=\"icon_down\"></i>";
            str += "    </div>";
            str += "    <div class=\"hide\">";
            str += "        <ul>";
            str += "            <li data-id=\"" + n.TopicID + "\" style=\"display:none\" data-leagugeid=\"" + n.LeaguesID + "\"></li>";
            str += "            <li data-command=\"edit\">修改</li>";
            str += "            <li data-command=\"deleteTopic\">删除</li>";
            str += ("            <li data-command=\"lock\">" + (n.LockTopic == 1 ? "取消锁帖" : "锁帖") + "</li>");
            str += ("            <li data-command=\"setTop\">" + (n.IsTop == true ? "取消置顶" : "置顶") + "</li>");
            str += ("            <li data-command=\"setBest\">" + (n.IsBest == true ? "取消加精" : "加精") + "</li>");
            str += "            <li data-command=\"addToMagazine\">选编社刊</li>";
            str += "        </ul>";
            str += "    </div>";
            str += "</div>";
        } else {
            str += '<div class="other_info clearfix">';
        }
        str += '<span class="icons praise_num" title="点赞数"><i></i>' + n.RateSum + '</span>' + '<span class="icons reply_num" title="回帖数"><i></i>' + n.ReplyNum + '</span>' + '<span class="icons read_num" title="阅读数"><i></i>' + n.ViewNum + '</span>';
        if (bl != 1) {
            if (bl == 2) {
                str += '<a rel="nofollow" class="league_name" href="http://bulo.hujiang.com/' + n.PosterID + '" target="_blank" title="' + n.UserName + '">' + n.UserName + '</a>　|　';
            } else {
                str += '<a href="/' + n.Alias + '/" class="league_name"  title="' + n.LeagueName + '">' + n.LeagueName + '</a>　|　';
            }
        }
        str += '<span class="topic_from">最后回复：' + n.LastReplyUserName + '　' + RetDateTime(n.LastReplyDate) + '</span></div></div></li>';
    });
    return str;
}
function isNew(date) {
    date = date.split('T')[0].split('-');
    if (date[0] == cutDate[0] && date[1] == cutDate[1] && date[2] == cutDate[2]) {
        return true;
    } else {
        return false;
    }
}
function isPrivate(d) {
    var str = '';
    if (d.IsPrivate) {
        str += '<span class="icon_isPrivate"></span>'
    }
    return str;
}
function isBestorHot(d, islist) {
    var str = '';
    if (d.IsTop && islist)
        str = ''; else if (d.IsBest) {
        str = '<i class="icon-elite">精华</i>';
    } else if (d.IsHot) {
        str = '<i class="icon-hot">热帖</i>';
    }
    return str;
}
function showLoading() {
    obj.find('.loading').show();
}
function hideLoading() {
    obj.find('.loading').hide();
}
Date.prototype.Format = function (fmt) {
    var o = {"M+":this.getMonth() + 1, "d+":this.getDate(), "h+":this.getHours(), "m+":this.getMinutes(), "s+":this.getSeconds(), "q+":Math.floor((this.getMonth() + 3) / 3), "S":this.getMilliseconds()};
    if (/(y+)/.test(fmt))
        fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}
function RetDateTime(objtimes) {
    var times = objtimes;
    if (times == null || times == '')
        return"1分钟前";
    var nowTime = $('#hddTime').val();
    times = times.replace("T", " ").replace(/\-/g, "/");
    if (times.indexOf(".") > 0)
        times = times.substring(0, times.indexOf("."));
    nowTime = nowTime.replace("T", " ");
    var oldTime = new Date(times).getTime();
    if (isNaN(oldTime))
        oldTime = new Date(objtimes).getTime();
    if (oldTime <= 0)
        return"1分钟前";
    var now = new Date(nowTime).getTime();
    var ts = now - oldTime;
    ts = Math.abs(ts);
    if (ts < 2)
        return"1分钟前";
    var seconds = 1000;
    var minute = seconds * 60;
    var hour = minute * 60;
    var day = hour * 24;
    var strSeconds = parseInt(ts / seconds);
    var strMinute = parseInt(ts / minute);
    var strHour = parseInt(ts / hour);
    var strDay = parseInt(ts / day);
    if (strSeconds < 50)
        return"1分钟前"; else if (strMinute < 60)
        return(strMinute + 1) + "分钟前"; else if (strMinute > 60 && strHour <= 24)
        return strHour + "小时前"; else if (strHour > 24 && strDay <= 10)
        return strDay + "天前"; else
        return new Date(times).Format("yyyy-MM-dd hh:mm");
}
$(function () {
    var commands = {edit:function (id) {
        topic.editTopic(id);
    }, deleteTopic:function (id) {
        topic.deleteTopic({topicId:id, type:1, onSuccess:function () {
            location.reload();
        }});
    }, lock:function (id, el) {
        topic.lockTopic({topicId:id, isLock:el.text() == "锁帖", onSuccess:function (d) {
            if (d == 1) {
                alert(el.text() + "成功");
                el.text(el.text() == "锁帖" ? "取消锁帖" : "锁帖");
            }
        }});
    }, setTop:function (id, el) {
        topic.setToTop({topicId:id, isTop:el.text() == "置顶", onSuccess:function (d) {
            if (d == 1) {
                alert(el.text() + "成功");
                el.text(el.text() == "置顶" ? "取消置顶" : "置顶");
            }
        }});
    }, setBest:function (id, el) {
        topic.setToBest({topicId:id, isBest:el.text() == "加精", onSuccess:function (d) {
            if (d == 1) {
                alert(el.text() + "成功");
                el.text(el.text() == "加精" ? "取消加精" : "加精");
            }
        }});
    }, addToMagazine:function (id, el) {
        var leagueID = el.parent().children(":first").attr("data-leagugeid"), topicEl = el.parents(".topic_content");
        topic.addToMagazine({topicId:id, leagueID:leagueID, title:topicEl.find(".topic_title .ellipsis_text").text(), summary:topicEl.find(".topic_desc").text()});
    }};
    $("body").on("click", ".quick_settings .icons",function (e) {
        var ele = this;
        $(".quick_settings.active").filter(function (index, el) {
            if ($(ele).parents(".quick_settings")[0] != el) {
                return el;
            }
        }).removeClass("active");
        $(this).parents(".quick_settings").toggleClass("active");
        e.stopPropagation();
    }).on("click", ".quick_settings .hide li", function () {
        var el = $(this), command = el.attr("data-command"), id = el.parent().children(":first").attr("data-id");
        commands[command](id, el);
    });
    $(document).on("click", function () {
        $(".quick_settings.active").removeClass("active");
    })
});
var global = this;
(function () {
    var noop = function () {
    }, win = window, url = "/ajax/PostAjax.asmx", location = win.location, defaultErrorMessage = {"0":"您当前还没有登录", "-1":"操作失败"}, topic, magazineHtml = "<div class=\"pop-out hide\" id=\"divSetToMagazine\" style=\"width: 555px;\" >" + "    <div class=\"panel\">" + "        <div class=\"pad\">" + "            <div class=\"form-li\">" + "                <div class=\"name\">" + "                    社刊：" + "                </div>" + "                <div class=\"form-c\">" + "                   <div class=\"item\">" + "                        <dl class=\"m-select\" id=\"m_MagazineName\">" + "                            <dt>请选择</dt>" + "                            <dd>" + "                                <input type=\"hidden\" name=\"hdnMagazineID\" id=\"hdnMagazineID\" value=\"\" />" + "                            </dd>" + "                        </dl>" + "                    </div>" + "                </div>" + "            </div>" + "            <div class=\"form-li\">" + "                <div class=\"name\">" + "                    标题：" + "                </div>" + "                <div class=\"form-c\">" + "                    <input type=\"text\" id=\"txtTopicTitle\" maxlength=\"100\" value=\"{{title}}\"/>" + "                </div>" + "            </div>" + "            <div class=\"form-li\">" + "                <div class=\"name\">" + "                     简介：" + "                </div>" + "                <div class=\"form-c\">" + "                    <textarea id=\"areaSummary\" maxlength=\"200\" cols=\"40\" rows=\"4\">{{summary}}</textarea>" + "                </div>" + "            </div>" + "            <a href=\"javascript:;\" id=\"btnSaveSubMagazine\" class=\"btn btn-m btn-green\">保存</a>" + "        </div>" + "    </div>" + "</div>";

    function confirm(msg) {
        return win.confirm(msg);
    }

    function alert(msg) {
        win.alert(msg);
    }

    function doAjax(method, data, onSuccess, onError) {
        var errorHandler, errMsgs;
        if ($.isFunction(onError)) {
            errorHandler = onError;
        } else {
            errMsgs = $.extend({}, defaultErrorMessage, onError);
            errorHandler = function (data) {
                if (errMsgs[data]) {
                    alert(errMsgs[data]);
                    return true;
                }
            }
        }
        $.comajax(url, method, data, function (data) {
            if (errorHandler(data)) {
                return;
            }
            if (onSuccess) {
                onSuccess(data);
            }
        });
    }

    function saveSetMagazine(options) {
        var magazineID = $('#divSetToMagazine #hdnMagazineID').val(), title = $('#divSetToMagazine #txtTopicTitle').val(), summary = $('#divSetToMagazine #areaSummary').val();
        if (magazineID === '') {
            alert('请选择社刊');
            return false;
        }
        if (title === '') {
            alert('请输入标题');
            return false;
        }
        if (summary === '') {
            alert('请输入简介');
            return false;
        }
        $.comajax('/ajax/PostAjax.asmx', 'AddSubMagazine', {leagueID:options.leagueID, magazineID:magazineID, topicID:options.topicId, title:title, summary:summary}, function (d) {
            switch (d) {
                case-6:
                    alert('该社刊已添加过本帖');
                    break;
                case 1:
                    alert('添加社刊成功');
                    break;
                default:
                    alert('添加失败');
                    break;
            }
            $.modal.close();
        });
    }

    global.topic = topic = {deleteTopic:function (options) {
        var id = options.topicId, type = options.type, onSuccess = options.onSuccess || function (data) {
            if (data >= 0) {
                location.reload();
            }
        }, onError = options.onError, method = type == 1 ? "DelTopic" : "DelPost", args = type == 1 ? {topicId:id} : {postId:id}, msgs = type == 1 ? {"-1":"您当前还没有登录", "-2":"该帖子已经删除", "0":false} : {"0":"您当前还没有登录", "-1":"操作失败"};
        if (confirm("确定要删除吗？")) {
            doAjax(method, args, function (data) {
                onSuccess(data);
            }, onError ? onError : msgs);
        }
    }, addTopic:function () {
    }, editTopic:function (topicId) {
        window.open("/topic/" + topicId + "/edit", "_blank");
    }, lockTopic:function (options) {
        var isLock = options.isLock
        if (confirm("确定要" + (isLock ? "锁帖" : "取消锁帖") + "吗")) {
            doAjax("DoLock", {topicId:options.topicId, isLock:isLock}, options.onSuccess || function (data) {
                alert("操作成功");
                location.reload();
            }, options.onError);
        }
    }, setToBest:function (options) {
        doAjax("DoBest", {topicId:options.topicId, isbest:options.isBest}, options.onSuccess || function (data) {
            alert("操作成功");
            location.reload();
        }, options.onError);
    }, setToTop:function (options) {
        doAjax("DoToTop", {topicId:options.topicId, istop:options.isTop}, onSuccess = options.onSuccess || function (data) {
            alert("操作成功");
            window.location.reload();
        }, options.onError || {"-2":"对不起，社团只能有5个置顶贴。"});
    }, setToHot:function (options) {
        doAjax("DoHot", {topicId:options.topicId, ishot:isHot}, options.onSuccess || function (data) {
            alert("操作成功");
            window.location.reload();
        }, options.onError);
    }, addToMagazine:function (options) {
        var id = options.topicId, leagueID = options.leagueID;
        $.getJSON("/ajax/optionAjax.ashx", {action:'getMagazineList', leagueID:leagueID, t:+new Date()}, function (d) {
            if (d.data.length > 0) {
                var obj = {title:options.title, summary:options.summary}, maghtml, magData = [];
                for (var i = 0; i < d.data.length; i++) {
                    magData.push([d.data[i].magazineID, d.data[i].magazineName]);
                }
                ;
                maghtml = magazineHtml.replace(/\{\{title\}\}/ig, options.title).replace(/\{\{summary\}\}/ig, options.summary);
                $(maghtml).appendTo("body");
                new SelectorJS.selector.init({id:'#m_MagazineName', data:magData, value:magData[0][1]});
                $('#divSetToMagazine').modal({overlayClose:true, onClose:function () {
                    $(".simplemodal-container, #simplemodal-placeholder, .simplemodal-overlay").remove();
                    this.d = {};
                }});
                $("#btnSaveSubMagazine").click(function () {
                    saveSetMagazine(options);
                })
            } else {
                alert("该社团下还没有社刊");
            }
        });
    }}
})();
(function () {
    function o() {
        var a = {"&":"&#38;", "<":"&#60;", ">":"&#62;", '"':"&#34;", "'":"&#39;", "/":"&#47;"}, b = /&(?!#?\w+;)|<|>|"|'|\//g;
        return function () {
            return this ? this.replace(b, function (c) {
                return a[c] || c
            }) : this
        }
    }

    function p(a, b, c) {
        return(typeof b === "string" ? b : b.toString()).replace(a.define || i,function (l, e, f, g) {
            if (e.indexOf("def.") === 0)e = e.substring(4);
            if (!(e in c))if (f === ":") {
                a.defineParams && g.replace(a.defineParams, function (n, h, d) {
                    c[e] = {arg:h, text:d}
                });
                e in c || (c[e] = g)
            } else(new Function("def", "def['" +
                e + "']=" + g))(c);
            return""
        }).replace(a.use || i, function (l, e) {
                if (a.useParams)e = e.replace(a.useParams, function (g, n, h, d) {
                    if (c[h] && c[h].arg && d) {
                        g = (h + ":" + d).replace(/'|\\/g, "_");
                        c.__exp = c.__exp || {};
                        c.__exp[g] = c[h].text.replace(RegExp("(^|[^\\w$])" + c[h].arg + "([^\\w$])", "g"), "$1" + d + "$2");
                        return n + "def.__exp['" + g + "']"
                    }
                });
                var f = (new Function("def", "return " + e))(c);
                return f ? p(a, f, c) : f
            })
    }

    function m(a) {
        return a.replace(/\\('|\\)/g, "$1").replace(/[\r\t\n]/g, " ")
    }

    var j = {version:"1.0.1", templateSettings:{evaluate:/\{\{([\s\S]+?(\}?)+)\}\}/g, interpolate:/\{\{=([\s\S]+?)\}\}/g, encode:/\{\{!([\s\S]+?)\}\}/g, use:/\{\{#([\s\S]+?)\}\}/g, useParams:/(^|[^\w$])def(?:\.|\[[\'\"])([\w$\.]+)(?:[\'\"]\])?\s*\:\s*([\w$\.]+|\"[^\"]+\"|\'[^\']+\'|\{[^\}]+\})/g, define:/\{\{##\s*([\w\.$]+)\s*(\:|=)([\s\S]+?)#\}\}/g, defineParams:/^\s*([\w$]+):([\s\S]+)/, conditional:/\{\{\?(\?)?\s*([\s\S]*?)\s*\}\}/g, iterate:/\{\{~\s*(?:\}\}|([\s\S]+?)\s*\:\s*([\w$]+)\s*(?:\:\s*([\w$]+))?\s*\}\})/g, varname:"it", strip:true, append:true, selfcontained:false}, template:undefined, compile:undefined}, q;
    if (typeof module !== "undefined" && module.exports)module.exports = j; else if (typeof define === "function" && define.amd)define(function () {
        return j
    }); else {
        q = function () {
            return this || (0, eval)("this")
        }();
        q.doT = j
    }
    String.prototype.encodeHTML = o();
    var r = {append:{start:"'+(", end:")+'", endencode:"||'').toString().encodeHTML()+'"}, split:{start:"';out+=(", end:");out+='", endencode:"||'').toString().encodeHTML();out+='"}}, i = /$^/;
    j.template = function (a, b, c) {
        b = b || j.templateSettings;
        var l = b.append ? r.append : r.split, e, f = 0, g;
        a = b.use || b.define ? p(b, a, c || {}) : a;
        a = ("var out='" + (b.strip ? a.replace(/(^|\r|\n)\t* +| +\t*(\r|\n|$)/g, " ").replace(/\r|\n|\t|\/\*[\s\S]*?\*\//g, "") : a).replace(/'|\\/g, "\\$&").replace(b.interpolate || i,function (h, d) {
            return l.start + m(d) + l.end
        }).replace(b.encode || i,function (h, d) {
            e = true;
            return l.start + m(d) + l.endencode
        }).replace(b.conditional || i,function (h, d, k) {
            return d ? k ? "';}else if(" + m(k) + "){out+='" : "';}else{out+='" : k ? "';if(" + m(k) + "){out+='" : "';}out+='"
        }).replace(b.iterate || i,function (h, d, k, s) {
            if (!d)return"';} } out+='";
            f += 1;
            g = s || "i" + f;
            d = m(d);
            return"';var arr" + f + "=" + d + ";if(arr" + f + "){var " + k + "," + g + "=-1,l" + f + "=arr" + f + ".length-1;while(" + g + "<l" + f + "){" + k + "=arr" + f + "[" + g + "+=1];out+='"
        }).replace(b.evaluate || i, function (h, d) {
            return"';" + m(d) + "out+='"
        }) + "';return out;").replace(/\n/g, "\\n").replace(/\t/g, "\\t").replace(/\r/g, "\\r").replace(/(\s|;|\}|^|\{)out\+='';/g, "$1").replace(/\+''/g, "").replace(/(\s|;|\}|^|\{)out\+=''\+/g, "$1out+=");
        if (e && b.selfcontained)a = "String.prototype.encodeHTML=(" +
            o.toString() + "());" + a;
        try {
            return new Function(b.varname, a)
        } catch (n) {
            typeof console !== "undefined" && console.log("Could not create a template function: " + a);
            throw n;
        }
    };
    j.compile = function (a, b) {
        return j.template(a, null, b)
    }
})();