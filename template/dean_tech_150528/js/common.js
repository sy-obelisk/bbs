var leagueJS = {myDatepicker:function (elmentID) {
    $("#" + elmentID).datepicker({dateFormat:'yy-mm-dd', monthNames:['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'], dayNames:['日', '一', '二', '三', '四', '五', '六'], dayNamesMin:['日', '一', '二', '三', '四', '五', '六'], showAnim:''});
}, uploadImg:function (url, inputName, uploadding, source, bl) {
    var $o = $(source);
    if (!inputName)inputName = "file";
    var frameId = 'upload_file_iframe' + (new Date()).getTime();
    var $iframe = $('<iframe style="display:none; width:0px; height;0px;" id="' + frameId + '" name="' + frameId + '"></iframe>');
    $iframe.attr({'id':frameId, 'name':frameId}).appendTo('body');
    var $form = $('<form method="POST" class="upload_form" name="upload_file_form" enctype="multipart/form-data" style="position:relative;height:40px;"></form>');
    $form.attr({'action':url, 'target':frameId});
    var $uploader = $('<input name="' + inputName + '" title="单击选择" type="file" tabindex="-1" style="position:absolute; visibility:visible; outline-width:medium; outline-style:none; outline-color:initial; opacity:0; filter:alpha(opacity:0); cursor:pointer;" />');
    $o.wrap($form).after($uploader);
    $uploader.change(function () {
        if (!!$uploader.val()) {
            if (bl)
                $('#upImg').attr('src', '../images/loading_b.gif').show().css({'width':32, 'height':32});
            $o.parents(".upload_form").submit();
            if (typeof(uploadding) == 'function')uploadding();
        }
    });
    $o.mousemove(function (e) {
        $uploader.css({"left":e.pageX - $o.parents(".upload_form").offset().left - $uploader.width() + 10, "top":e.pageY - $o.parents(".upload_form").offset().top - $uploader.height() / 2});
    });
}, CheckHtmlXss:function (str) {
    if (str.indexOf("<script>") > -1 || str.indexOf("<SCRIPT>") > -1 || str.indexOf("<script") > -1 || str.indexOf("<SCRIPT") > -1 || str.indexOf("script>") > -1 || str.indexOf("SCRIPT>") > -1) {
        return true;
    }
    if (str.indexOf("<\/script>") > -1 || str.indexOf("<\/SCRIPT>") > -1) {
        return true;
    }
    if (str.indexOf("javascript") > -1 || str.indexOf("alert") > -1) {
        return true;
    }
    return false;
}, CheckLength:function (str) {
    return parseInt($.trim(str.replace(/\n/g, "").replace(/[^\x00-\xff]/g, "rr")).length);
}, CheckMobile:function (str) {
    var reg = /^0?1[3|5|8|4|7][0-9]\d{8}$/;
    return reg.test(str);
}};
(function ($) {
    $.extend($.fn, {PadLeft:function (b, c) {
        var d = this.selector;
        while (d.length < b) {
            d = c + d;
        }
        return d;
    }, GetLength:function () {
        var str = this.selector;
        if (str == null || str == '')
            return 0;
        var str_length = 0;
        var str_len = 0;
        str_len = str.length;
        var a, b;
        for (var i = 0; i < str_len; i++) {
            a = str.charAt(i);
            str_length++;
            var isen = true;
            if (escape(a).length > 4) {
                str_length++;
                isen = false;
            }
        }
        return str_length;
    }, RemoveHTML:function () {
        var str = this.selector;
        var regEx = /<[^>]*>/g;
        f = true;
        return str.replace(regEx, "");
    }})
})($)
function showExpBOx(action, callback) {
    var options = {h3:['发布主帖', '回复主贴', '签到'], h4:['+2', '+1', '+1'], tips:[
        {text:'发表一篇有趣的帖子吧', num:'+2'},
        {text:'给喜欢的帖子发个回复吧', num:'+1'},
        {text:'完成今日签到', num:'+1'}
    ]};
    var tips = options.tips;
    if (League.fun.getCookie('hide_exp_7day')) {
        return;
    }
    tips.splice(action, 1);
    var tipStr = '<div class="get_experience_box"><div class="info_box"><div class="rank_animate"></div><div class="top_tips"></div>'
        + '<h3>' + options.h3[action] + '</h3><h4>经验值 <span class="exp_num">' + options.h4[action] + '</span></h4><p class="tip_more">今日还可以赚取更多经验哦</p>';
    $.each(tips, function (i, n) {
        tipStr += '<p>' + (1 + i) + '、' + n.text + ' <span class="exp_num">' + n.num + '</span></p>';
    });
    tipStr += '<a href="javascript:;" class="btn btn-m exp-btn">我知道了</a><a href="javascript:;" class="no_tips">不再提示</a></div></div>';
    $('body').append(tipStr);
    $('body').on('click', '.no_tips,.exp-btn', function () {
        var self = $(this);
        if (self.hasClass('no_tips')) {
            League.fun.setCookie('hide_exp_7day', 1, 7 * 24 * 60 * 60);
        }
        $('.get_experience_box').hide();
        callback && callback();
    });
}
var timerIngBoxClose = null;
var ingSender = null;
(function () {
    ingSender = function () {
        this.callback_success = function () {
        };
        this.op = {toplimit:39, top:'60', backurl:''}
        this.init();
    }
    ingSender.prototype = {init:function () {
        var self = this;
        $(document).keyup(function (e) {
            if (window.event) {
                e = event;
            }
            else {
                e = arguments[0];
            }
            if (e.ctrlKey && e.keyCode == 120) {
                var frame_ing = $(".pnl_ingSender_frame");
                if (frame_ing.length > 0) {
                    self.closeSendBox(frame_ing);
                }
                else {
                    self.showSendBox();
                }
            }
        })
    }, addCookie:function (objName, objValue, objHours, domain) {
        var str = objName + "=" + escape(objValue);
        if (objHours > 0) {
            var date = new Date();
            var ms = objHours * 3600 * 1000 * 100;
            date.setTime(date.getTime() + ms);
            str += ";expires=" + date.toGMTString();
            if (domain != null && domain.length > 0) {
                str += ";domain=" + domain;
            }
        }
        document.cookie = str + ";path=/";
    }, getCookie:function (objName) {
        var arrStr = document.cookie.split("; ");
        for (var i = 0; i < arrStr.length; i++) {
            var temp = arrStr[i].split("=");
            if (temp[0] == objName)return unescape(temp[1]);
        }
        return null;
    }, delCookie:function (name) {
        var date = new Date();
        date.setTime(date.getTime() - 10000);
        document.cookie = name + "=a; expires=" + date.toGMTString();
    }, checkIsLogin:function () {
        var islogin = true;
        var loginCookie = this.getCookie("ClubAuth");
        if (loginCookie == null || loginCookie == "") {
            $.ajax({url:"http://t.hujiang.com/api/CheckLogin.ashx?callback=?", dataType:"jsonp", jsonp:"callback", timeout:'1000', async:false, success:function (result) {
                islogin = result == 1;
            }});
        }
        return islogin;
    }, showSendBox:function (inCnt, imgUrl) {
        var self = this;
        if (!this.checkIsLogin())return;
        var screenHeight = $(window).height();
        var screenWidth = $(window).width();
        this.addCookie("ing_sendboxState", 1, 1, '.hujiang.com');
        var position = "fixed";
        if (inCnt == null || inCnt.length == 0) {
            inCnt = "";
        }
        var isIe6 = false;
        if ($.browser.msie) {
            if ($.browser.version == '6.0') {
                isIe6 = true;
            }
        }
        if (isIe6) {
            position = "absolute";
            screenHeight = $("body").height();
            this.op.top = '60px';
        }
        var url = "http://t.hujiang.com/sendbox/?limit=" + this.op.toplimit + "&top=" + this.op.top + "&cnt=" + inCnt + "&backurl=" + this.op.backurl;
        if (imgUrl != null && imgUrl != "") {
            url += "&img=" + imgUrl;
        }
        var str = "<iframe class='pnl_ingSender_frame' style=\"width:" + screenWidth + "px;height:" + screenHeight + "px;z-index:9999999999;position:" + position + ";top:0px;border:0px;left:0px;display:none;\" scrolling=\"no\" frameborder=\"no\"  allowtransparency=\"true\" src=\"" + url + "\"></iframe>";
        $("body").append(str);
        $(".pnl_ingSender_frame").fadeIn(200);
        setTimeout(function () {
            self.intervalCloseBox($(".pnl_ingSender_frame"));
        }, 500);
    }, intervalCloseBox:function (obj) {
        var self = this;
        timerIngBoxClose = setInterval(function () {
            var value = self.getCookie("ing_sendboxState");
            if (value == "0") {
                self.closeSendBox(obj);
            }
            else if (value == "2") {
                self.closeSendBox(obj);
                self.callback_success();
            }
            else if (value == "3") {
                self.closeSendBox(obj);
                self.showSuccess('保存成功', true, 3000);
            }
        }, 100)
    }, closeSendBox:function (obj) {
        clearTimeout(timerIngBoxClose);
        $(obj).remove();
    }, showSuccess:function (content, autoClose, autoTime) {
        var str = "<div class='ingSender_winmedal-box' style='display:none; position: fixed;_position: absolute;-moz-border-radius:5px;-webkit-border-radius: 5px;-khtml-border-radius: 5px;border:0;_border:2px solid #97ACD2;background:url(http://t.hujiang.com/images/transBG.png) no-repeat;_background:white;text-align: left;left: 50%;top: 50%;margin-top:-130px;margin-left: -196px;z-index: 999999;'><div style='background:#FFF;line-height: 22px;margin: 5px;padding: 12px 0 10px 5px;position: relative;top: -1px;'><span onclick=\"$(this).parents('.ingSender_winmedal-box').hide(300)\" style=\"position: absolute;right: 10px;top: 8px;width: 16px;height: 16px;text-indent: -10em;overflow: hidden;background: url(../images/ico_tip_win_close.gif) no-repeat;cursor: pointer;display:block;\">Close</span><div style='width: 250px;height: 35px;line-height:35px;padding-left:10px;'><img style='float:left; margin:4px 15px 0px 0px;' src='../images/ico_right_answer.gif' /> <span class='big gray'>" + content + "</span></div></div></div>";
        if (autoTime == null) {
            autoTime = 1500;
        }
        $(".ingSender_winmedal-box").remove();
        $("body").append(str);
        $(".ingSender_winmedal-box").show(300);
        if (autoClose) {
            window.setTimeout(function () {
                $('.ingSender_winmedal-box').hide(300)
            }, autoTime);
        }
    }}
})();
(function ($) {
    jQuery.extend({comajax:function (url, method, data, callback, errorCallback) {
        var para = data;
        if (para != null) {
            para = $.toJSON(data);
        }
        $.ajax({url:url + "/" + method, type:"post", contentType:"application/json", data:para, dataType:"json", success:function (data) {
            callback(data.d);
        }, error:function (e, status) {
            errorCallback != undefined ? errorCallback(e, status) : "";
        }});
    }});
})(jQuery);
;
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else {
        factory(jQuery);
    }
}
    (function ($) {
        var d = [], doc = $(document), ua = navigator.userAgent.toLowerCase(), wndw = $(window), w = [], interval;
        var browser = {ieQuirks:null, msie:/msie/.test(ua) && !/opera/.test(ua), opera:/opera/.test(ua)};
        browser.ie6 = browser.msie && /msie 6./.test(ua) && typeof window['XMLHttpRequest'] !== 'object';
        browser.ie7 = browser.msie && /msie 7.0/.test(ua);
        $.modal = function (data, options) {
            return $.modal.impl.init(data, options);
        };
        $.modal.close = function () {
            $.modal.impl.close();
        };
        $.modal.focus = function (pos) {
            $.modal.impl.focus(pos);
        };
        $.modal.setContainerDimensions = function () {
            $.modal.impl.setContainerDimensions();
        };
        $.modal.setPosition = function () {
            $.modal.impl.setPosition();
        };
        $.modal.update = function (height, width) {
            $.modal.impl.update(height, width);
        };
        $.fn.modal = function (options) {
            return $.modal.impl.init(this, options);
        };
        $.modal.defaults = {appendTo:'body', focus:true, opacity:50, overlayId:'simplemodal-overlay', overlayCss:{}, containerId:'simplemodal-container', containerCss:{}, dataId:'simplemodal-data', dataCss:{}, minHeight:null, minWidth:null, maxHeight:null, maxWidth:null, autoResize:false, autoPosition:true, zIndex:1000, close:true, closeHTML:'<a class="modalCloseImg" title="Close"></a>', closeClass:'simplemodal-close', escClose:true, overlayClose:false, fixed:true, position:null, persist:false, modal:true, onOpen:null, onShow:null, onClose:null};
        $.modal.impl = {d:{}, init:function (data, options) {
            var s = this;
            if (s.d.data) {
                return false;
            }
            browser.ieQuirks = browser.msie && !$.support.boxModel;
            s.o = $.extend({}, $.modal.defaults, options);
            s.zIndex = s.o.zIndex;
            s.occb = false;
            if (typeof data === 'object') {
                data = data instanceof $ ? data : $(data);
                s.d.placeholder = false;
                if (data.parent().parent().size() > 0) {
                    data.before($('<span></span>').attr('id', 'simplemodal-placeholder').css({display:'none'}));
                    s.d.placeholder = true;
                    s.display = data.css('display');
                    if (!s.o.persist) {
                        s.d.orig = data.clone(true);
                    }
                }
            }
            else if (typeof data === 'string' || typeof data === 'number') {
                data = $('<div></div>').html(data);
            }
            else {
                alert('SimpleModal Error: Unsupported data type: ' + typeof data);
                return s;
            }
            s.create(data);
            data = null;
            s.open();
            if ($.isFunction(s.o.onShow)) {
                s.o.onShow.apply(s, [s.d]);
            }
            return s;
        }, create:function (data) {
            var s = this;
            s.getDimensions();
            if (s.o.modal && browser.ie6) {
                s.d.iframe = $('<iframe src="javascript:false;"></iframe>').css($.extend(s.o.iframeCss, {display:'none', opacity:0, position:'fixed', height:w[0], width:w[1], zIndex:s.o.zIndex, top:0, left:0})).appendTo(s.o.appendTo);
            }
            s.d.overlay = $('<div></div>').attr('id', s.o.overlayId).addClass('simplemodal-overlay').css($.extend(s.o.overlayCss, {display:'none', opacity:s.o.opacity / 100, height:s.o.modal ? d[0] : 0, width:s.o.modal ? d[1] : 0, position:'fixed', left:0, top:0, zIndex:s.o.zIndex + 1})).appendTo(s.o.appendTo);
            s.d.container = $('<div></div>').attr('id', s.o.containerId).addClass('simplemodal-container').css($.extend({position:s.o.fixed ? 'fixed' : 'absolute'}, s.o.containerCss, {display:'none', zIndex:s.o.zIndex + 2})).append(s.o.close && s.o.closeHTML ? $(s.o.closeHTML).addClass(s.o.closeClass) : '').appendTo(s.o.appendTo);
            s.d.wrap = $('<div></div>').attr('tabIndex', -1).addClass('simplemodal-wrap').css({height:'100%', outline:0, width:'100%'}).appendTo(s.d.container);
            s.d.data = data.attr('id', data.attr('id') || s.o.dataId).addClass('simplemodal-data').css($.extend(s.o.dataCss, {display:'none'})).appendTo('body');
            data = null;
            s.setContainerDimensions();
            s.d.data.appendTo(s.d.wrap);
            if (browser.ie6 || browser.ieQuirks) {
                s.fixIE();
            }
        }, bindEvents:function () {
            var s = this;
            $('.' + s.o.closeClass).bind('click.simplemodal', function (e) {
                e.preventDefault();
                s.close();
            });
            if (s.o.modal && s.o.close && s.o.overlayClose) {
                s.d.overlay.bind('click.simplemodal', function (e) {
                    e.preventDefault();
                    s.close();
                });
            }
            doc.bind('keydown.simplemodal', function (e) {
                if (s.o.modal && e.keyCode === 9) {
                    s.watchTab(e);
                }
                else if ((s.o.close && s.o.escClose) && e.keyCode === 27) {
                    e.preventDefault();
                    s.close();
                }
            });
            wndw.bind('resize.simplemodal orientationchange.simplemodal', function () {
                s.getDimensions();
                s.o.autoResize ? s.setContainerDimensions() : s.o.autoPosition && s.setPosition();
                if (browser.ie6 || browser.ieQuirks) {
                    s.fixIE();
                }
                else if (s.o.modal) {
                    s.d.iframe && s.d.iframe.css({height:w[0], width:w[1]});
                    s.d.overlay.css({height:d[0], width:d[1]});
                }
            });
            var oldHeight = $('#simplemodal-container .simplemodal-data').height(), oldWidth = $('#simplemodal-container .simplemodal-data').width()
            interval = setInterval(function () {
                var newHeight = $('#simplemodal-container .simplemodal-data').height(), newWidth = $('#simplemodal-container .simplemodal-data').width();
                if (newHeight != oldHeight || newWidth != oldWidth) {
                    oldHeight = newHeight;
                    oldWidth = newWidth;
                    $.modal.update(newHeight, newWidth);
                }
            }, 16)
        }, unbindEvents:function () {
            clearInterval(interval)
            $('.' + this.o.closeClass).unbind('click.simplemodal');
            doc.unbind('keydown.simplemodal');
            wndw.unbind('.simplemodal');
            this.d.overlay.unbind('click.simplemodal');
        }, fixIE:function () {
            var s = this, p = s.o.position;
            $.each([s.d.iframe || null, !s.o.modal ? null : s.d.overlay, s.d.container.css('position') === 'fixed' ? s.d.container : null], function (i, el) {
                if (el) {
                    var bch = 'document.body.clientHeight', bcw = 'document.body.clientWidth', bsh = 'document.body.scrollHeight', bsl = 'document.body.scrollLeft', bst = 'document.body.scrollTop', bsw = 'document.body.scrollWidth', ch = 'document.documentElement.clientHeight', cw = 'document.documentElement.clientWidth', sl = 'document.documentElement.scrollLeft', st = 'document.documentElement.scrollTop', s = el[0].style;
                    s.position = 'absolute';
                    if (i < 2) {
                        s.removeExpression('height');
                        s.removeExpression('width');
                        s.setExpression('height', '' + bsh + ' > ' + bch + ' ? ' + bsh + ' : ' + bch + ' + "px"');
                        s.setExpression('width', '' + bsw + ' > ' + bcw + ' ? ' + bsw + ' : ' + bcw + ' + "px"');
                    }
                    else {
                        var te, le;
                        if (p && p.constructor === Array) {
                            var top = p[0] ? typeof p[0] === 'number' ? p[0].toString() : p[0].replace(/px/, '') : el.css('top').replace(/px/, '');
                            te = top.indexOf('%') === -1 ? top + ' + (t = ' + st + ' ? ' + st + ' : ' + bst + ') + "px"' : parseInt(top.replace(/%/, '')) + ' * ((' + ch + ' || ' + bch + ') / 100) + (t = ' + st + ' ? ' + st + ' : ' + bst + ') + "px"';
                            if (p[1]) {
                                var left = typeof p[1] === 'number' ? p[1].toString() : p[1].replace(/px/, '');
                                le = left.indexOf('%') === -1 ? left + ' + (t = ' + sl + ' ? ' + sl + ' : ' + bsl + ') + "px"' : parseInt(left.replace(/%/, '')) + ' * ((' + cw + ' || ' + bcw + ') / 100) + (t = ' + sl + ' ? ' + sl + ' : ' + bsl + ') + "px"';
                            }
                        }
                        else {
                            te = '(' + ch + ' || ' + bch + ') / 2 - (this.offsetHeight / 2) + (t = ' + st + ' ? ' + st + ' : ' + bst + ') + "px"';
                            le = '(' + cw + ' || ' + bcw + ') / 2 - (this.offsetWidth / 2) + (t = ' + sl + ' ? ' + sl + ' : ' + bsl + ') + "px"';
                        }
                        s.removeExpression('top');
                        s.removeExpression('left');
                        s.setExpression('top', te);
                        s.setExpression('left', le);
                    }
                }
            });
        }, focus:function (pos) {
            var s = this, p = pos && $.inArray(pos, ['first', 'last']) !== -1 ? pos : 'first';
            var input = $(':input:enabled:visible:' + p, s.d.wrap);
            setTimeout(function () {
                input.length > 0 ? input.focus() : (s.d.wrap && s.d.wrap.focus());
            }, 10);
        }, getDimensions:function () {
            var s = this, h = typeof window.innerHeight === 'undefined' ? wndw.height() : window.innerHeight;
            d = [doc.height(), doc.width()];
            w = [h, wndw.width()];
        }, getVal:function (v, d) {
            return v ? (typeof v === 'number' ? v : v === 'auto' ? 0 : v.indexOf('%') > 0 ? ((parseInt(v.replace(/%/, '')) / 100) * (d === 'h' ? w[0] : w[1])) : parseInt(v.replace(/px/, ''))) : null;
        }, update:function (height, width) {
            var s = this;
            if (!s.d.data) {
                return false;
            }
            s.d.origHeight = s.getVal(height, 'h');
            s.d.origWidth = s.getVal(width, 'w');
            s.d.data.hide();
            height && s.d.container.css('height', height);
            width && s.d.container.css('width', width);
            s.setContainerDimensions();
            s.d.data.show();
            s.o.focus && s.focus();
            s.unbindEvents();
            s.bindEvents();
        }, setContainerDimensions:function () {
            var s = this, badIE = browser.ie6 || browser.ie7;
            var ch = s.d.origHeight ? s.d.origHeight : browser.opera ? s.d.container.height() : s.getVal(badIE ? s.d.container[0].currentStyle['height'] : s.d.container.css('height'), 'h'), cw = s.d.origWidth ? s.d.origWidth : browser.opera ? s.d.container.width() : s.getVal(badIE ? s.d.container[0].currentStyle['width'] : s.d.container.css('width'), 'w'), dh = s.d.data.outerHeight(true), dw = s.d.data.outerWidth(true);
            s.d.origHeight = s.d.origHeight || ch;
            s.d.origWidth = s.d.origWidth || cw;
            var mxoh = s.o.maxHeight ? s.getVal(s.o.maxHeight, 'h') : null, mxow = s.o.maxWidth ? s.getVal(s.o.maxWidth, 'w') : null, mh = mxoh && mxoh < w[0] ? mxoh : w[0], mw = mxow && mxow < w[1] ? mxow : w[1];
            var moh = s.o.minHeight ? s.getVal(s.o.minHeight, 'h') : 'auto';
            if (!ch) {
                if (!dh) {
                    ch = moh;
                }
                else {
                    if (dh > mh) {
                        ch = mh;
                    }
                    else if (s.o.minHeight && moh !== 'auto' && dh < moh) {
                        ch = moh;
                    }
                    else {
                        ch = dh;
                    }
                }
            }
            else {
                ch = s.o.autoResize && ch > mh ? mh : ch < moh ? moh : ch;
            }
            var mow = s.o.minWidth ? s.getVal(s.o.minWidth, 'w') : 'auto';
            if (!cw) {
                if (!dw) {
                    cw = mow;
                }
                else {
                    if (dw > mw) {
                        cw = mw;
                    }
                    else if (s.o.minWidth && mow !== 'auto' && dw < mow) {
                        cw = mow;
                    }
                    else {
                        cw = dw;
                    }
                }
            }
            else {
                cw = s.o.autoResize && cw > mw ? mw : cw < mow ? mow : cw;
            }
            s.d.container.css({height:ch, width:cw});
            s.d.wrap.css({overflow:(dh > ch || dw > cw) ? 'auto' : 'visible'});
            s.o.autoPosition && s.setPosition();
        }, setPosition:function () {
            var s = this, top, left, hc = (w[0] / 2) - (s.d.container.outerHeight(true) / 2), vc = (w[1] / 2) - (s.d.container.outerWidth(true) / 2), st = s.d.container.css('position') !== 'fixed' ? wndw.scrollTop() : 0;
            if (s.o.position && Object.prototype.toString.call(s.o.position) === '[object Array]') {
                top = st + (s.o.position[0] || hc);
                left = s.o.position[1] || vc;
            } else {
                top = st + hc;
                left = vc;
            }
            s.d.container.css({left:left, top:top});
        }, watchTab:function (e) {
            var s = this;
            if ($(e.target).parents('.simplemodal-container').length > 0) {
                s.inputs = $(':input:enabled:visible:first, :input:enabled:visible:last', s.d.data[0]);
                if ((!e.shiftKey && e.target === s.inputs[s.inputs.length - 1]) || (e.shiftKey && e.target === s.inputs[0]) || s.inputs.length === 0) {
                    e.preventDefault();
                    var pos = e.shiftKey ? 'last' : 'first';
                    s.focus(pos);
                }
            }
            else {
                e.preventDefault();
                s.focus();
            }
        }, open:function () {
            var s = this;
            s.d.iframe && s.d.iframe.show();
            if ($.isFunction(s.o.onOpen)) {
                s.o.onOpen.apply(s, [s.d]);
            }
            else {
                s.d.overlay.show();
                s.d.container.show();
                s.d.data.show();
            }
            s.o.focus && s.focus();
            s.bindEvents();
        }, close:function () {
            var s = this;
            if (!s.d.data) {
                return false;
            }
            s.unbindEvents();
            if ($.isFunction(s.o.onClose) && !s.occb) {
                s.occb = true;
                s.o.onClose.apply(s, [s.d]);
            }
            else {
                if (s.d.placeholder) {
                    var ph = $('#simplemodal-placeholder');
                    if (s.o.persist) {
                        ph.replaceWith(s.d.data.removeClass('simplemodal-data').css('display', s.display));
                    }
                    else {
                        s.d.data.hide().remove();
                        ph.replaceWith(s.d.orig);
                    }
                }
                else {
                    s.d.data.hide().remove();
                }
                s.d.container.hide().remove();
                s.d.overlay.hide();
                s.d.iframe && s.d.iframe.hide().remove();
                s.d.overlay.remove();
                s.d = {};
            }
        }};
    }));
(function ($) {
    function toCodePoint(unicodeSurrogates, sep) {
        var
            r = [], c = 0, p = 0, i = 0;
        while (i < unicodeSurrogates.length) {
            c = unicodeSurrogates.charCodeAt(i++);
            if (p) {
                r.push((0x10000 + ((p - 0xD800) << 10) + (c - 0xDC00)).toString(16));
                p = 0;
            } else if (0xD800 <= c && c <= 0xDBFF) {
                p = c;
            } else {
                r.push(c.toString(16));
            }
        }
        return r.join(sep || '-');
    }

    function grabTheRightIcon(icon, variant) {
        return toCodePoint(variant === '\uFE0F' ? icon.slice(0, -1) : (icon.length === 3 && icon.charAt(1) === '\uFE0F' ? icon.charAt(0) + icon.charAt(2) : icon));
    }

    function grabAllTextNodes(node, allText) {
        var
            childNodes = node.childNodes, length = childNodes.length, subnode, nodeType;
        while (length--) {
            subnode = childNodes[length];
            nodeType = subnode.nodeType;
            if (nodeType === 3) {
                allText.push(subnode);
            }
            else if (nodeType === 1 && !shouldntBeParsed.test(subnode.nodeName)) {
                grabAllTextNodes(subnode, allText);
            }
        }
        return allText;
    }

    function parseNodes(nodes) {
        $.each(nodes, function (i, node) {
            var text = node.nodeValue, result = parseEmoji(text, true);
            if (result.matched) {
                $(node).replaceWith(result.result);
            }
        });
    }

    function isApple() {
        return/ipad|iphone|iPod|Macintosh|mac os]/i.test(navigator.userAgent);
    }

    function buildImage(icon) {
        return"/images/emoji/_" + icon + ".png";
    }

    var remoji = /((?:\ud83c\udde8\ud83c\uddf3|\ud83c\uddfa\ud83c\uddf8|\ud83c\uddf7\ud83c\uddfa|\ud83c\uddf0\ud83c\uddf7|\ud83c\uddef\ud83c\uddf5|\ud83c\uddee\ud83c\uddf9|\ud83c\uddec\ud83c\udde7|\ud83c\uddeb\ud83c\uddf7|\ud83c\uddea\ud83c\uddf8|\ud83c\udde9\ud83c\uddea|\u0039\ufe0f?\u20e3|\u0038\ufe0f?\u20e3|\u0037\ufe0f?\u20e3|\u0036\ufe0f?\u20e3|\u0035\ufe0f?\u20e3|\u0034\ufe0f?\u20e3|\u0033\ufe0f?\u20e3|\u0032\ufe0f?\u20e3|\u0031\ufe0f?\u20e3|\u0030\ufe0f?\u20e3|\u0023\ufe0f?\u20e3|\ud83d\udeb3|\ud83d\udeb1|\ud83d\udeb0|\ud83d\udeaf|\ud83d\udeae|\ud83d\udea6|\ud83d\udea3|\ud83d\udea1|\ud83d\udea0|\ud83d\ude9f|\ud83d\ude9e|\ud83d\ude9d|\ud83d\ude9c|\ud83d\ude9b|\ud83d\ude98|\ud83d\ude96|\ud83d\ude94|\ud83d\ude90|\ud83d\ude8e|\ud83d\ude8d|\ud83d\ude8b|\ud83d\ude8a|\ud83d\ude88|\ud83d\ude86|\ud83d\ude82|\ud83d\ude81|\ud83d\ude36|\ud83d\ude34|\ud83d\ude2f|\ud83d\ude2e|\ud83d\ude2c|\ud83d\ude27|\ud83d\ude26|\ud83d\ude1f|\ud83d\ude1b|\ud83d\ude19|\ud83d\ude17|\ud83d\ude15|\ud83d\ude11|\ud83d\ude10|\ud83d\ude0e|\ud83d\ude08|\ud83d\ude07|\ud83d\ude00|\ud83d\udd67|\ud83d\udd66|\ud83d\udd65|\ud83d\udd64|\ud83d\udd63|\ud83d\udd62|\ud83d\udd61|\ud83d\udd60|\ud83d\udd5f|\ud83d\udd5e|\ud83d\udd5d|\ud83d\udd5c|\ud83d\udd2d|\ud83d\udd2c|\ud83d\udd15|\ud83d\udd09|\ud83d\udd08|\ud83d\udd07|\ud83d\udd06|\ud83d\udd05|\ud83d\udd04|\ud83d\udd02|\ud83d\udd01|\ud83d\udd00|\ud83d\udcf5|\ud83d\udcef|\ud83d\udced|\ud83d\udcec|\ud83d\udcb7|\ud83d\udcb6|\ud83d\udcad|\ud83d\udc6d|\ud83d\udc6c|\ud83d\udc65|\ud83d\udc2a|\ud83d\udc16|\ud83d\udc15|\ud83d\udc13|\ud83d\udc10|\ud83d\udc0f|\ud83d\udc0b|\ud83d\udc0a|\ud83d\udc09|\ud83d\udc08|\ud83d\udc07|\ud83d\udc06|\ud83d\udc05|\ud83d\udc04|\ud83d\udc03|\ud83d\udc02|\ud83d\udc01|\ud83d\udc00|\ud83c\udfe4|\ud83c\udfc9|\ud83c\udfc7|\ud83c\udf7c|\ud83c\udf50|\ud83c\udf4b|\ud83c\udf33|\ud83c\udf32|\ud83c\udf1e|\ud83c\udf1d|\ud83c\udf1c|\ud83c\udf1a|\ud83c\udf18|\ud83c\udccf|\ud83c\udd70|\ud83c\udd71|\ud83c\udd7e|\ud83c\udd8e|\ud83c\udd91|\ud83c\udd92|\ud83c\udd93|\ud83c\udd94|\ud83c\udd95|\ud83c\udd96|\ud83c\udd97|\ud83c\udd98|\ud83c\udd99|\ud83c\udd9a|\ud83d\udc77|\ud83d\udec5|\ud83d\udec4|\ud83d\udec3|\ud83d\udec2|\ud83d\udec1|\ud83d\udebf|\ud83d\udeb8|\ud83d\udeb7|\ud83d\udeb5|\ud83c\ude01|\ud83c\ude02|\ud83c\ude32|\ud83c\ude33|\ud83c\ude34|\ud83c\ude35|\ud83c\ude36|\ud83c\ude37|\ud83c\ude38|\ud83c\ude39|\ud83c\ude3a|\ud83c\ude50|\ud83c\ude51|\ud83c\udf00|\ud83c\udf01|\ud83c\udf02|\ud83c\udf03|\ud83c\udf04|\ud83c\udf05|\ud83c\udf06|\ud83c\udf07|\ud83c\udf08|\ud83c\udf09|\ud83c\udf0a|\ud83c\udf0b|\ud83c\udf0c|\ud83c\udf0f|\ud83c\udf11|\ud83c\udf13|\ud83c\udf14|\ud83c\udf15|\ud83c\udf19|\ud83c\udf1b|\ud83c\udf1f|\ud83c\udf20|\ud83c\udf30|\ud83c\udf31|\ud83c\udf34|\ud83c\udf35|\ud83c\udf37|\ud83c\udf38|\ud83c\udf39|\ud83c\udf3a|\ud83c\udf3b|\ud83c\udf3c|\ud83c\udf3d|\ud83c\udf3e|\ud83c\udf3f|\ud83c\udf40|\ud83c\udf41|\ud83c\udf42|\ud83c\udf43|\ud83c\udf44|\ud83c\udf45|\ud83c\udf46|\ud83c\udf47|\ud83c\udf48|\ud83c\udf49|\ud83c\udf4a|\ud83c\udf4c|\ud83c\udf4d|\ud83c\udf4e|\ud83c\udf4f|\ud83c\udf51|\ud83c\udf52|\ud83c\udf53|\ud83c\udf54|\ud83c\udf55|\ud83c\udf56|\ud83c\udf57|\ud83c\udf58|\ud83c\udf59|\ud83c\udf5a|\ud83c\udf5b|\ud83c\udf5c|\ud83c\udf5d|\ud83c\udf5e|\ud83c\udf5f|\ud83c\udf60|\ud83c\udf61|\ud83c\udf62|\ud83c\udf63|\ud83c\udf64|\ud83c\udf65|\ud83c\udf66|\ud83c\udf67|\ud83c\udf68|\ud83c\udf69|\ud83c\udf6a|\ud83c\udf6b|\ud83c\udf6c|\ud83c\udf6d|\ud83c\udf6e|\ud83c\udf6f|\ud83c\udf70|\ud83c\udf71|\ud83c\udf72|\ud83c\udf73|\ud83c\udf74|\ud83c\udf75|\ud83c\udf76|\ud83c\udf77|\ud83c\udf78|\ud83c\udf79|\ud83c\udf7a|\ud83c\udf7b|\ud83c\udf80|\ud83c\udf81|\ud83c\udf82|\ud83c\udf83|\ud83c\udf84|\ud83c\udf85|\ud83c\udf86|\ud83c\udf87|\ud83c\udf88|\ud83c\udf89|\ud83c\udf8a|\ud83c\udf8b|\ud83c\udf8c|\ud83c\udf8d|\ud83c\udf8e|\ud83c\udf8f|\ud83c\udf90|\ud83c\udf91|\ud83c\udf92|\ud83c\udf93|\ud83c\udfa0|\ud83c\udfa1|\ud83c\udfa2|\ud83c\udfa3|\ud83c\udfa4|\ud83c\udfa5|\ud83c\udfa6|\ud83c\udfa7|\ud83c\udfa8|\ud83c\udfa9|\ud83c\udfaa|\ud83c\udfab|\ud83c\udfac|\ud83c\udfad|\ud83c\udfae|\ud83c\udfaf|\ud83c\udfb0|\ud83c\udfb1|\ud83c\udfb2|\ud83c\udfb3|\ud83c\udfb4|\ud83c\udfb5|\ud83c\udfb6|\ud83c\udfb7|\ud83c\udfb8|\ud83c\udfb9|\ud83c\udfba|\ud83c\udfbb|\ud83c\udfbc|\ud83c\udfbd|\ud83c\udfbe|\ud83c\udfbf|\ud83c\udfc0|\ud83c\udfc1|\ud83c\udfc2|\ud83c\udfc3|\ud83c\udfc4|\ud83c\udfc6|\ud83c\udfc8|\ud83c\udfca|\ud83c\udfe0|\ud83c\udfe1|\ud83c\udfe2|\ud83c\udfe3|\ud83c\udfe5|\ud83c\udfe6|\ud83c\udfe7|\ud83c\udfe8|\ud83c\udfe9|\ud83c\udfea|\ud83c\udfeb|\ud83c\udfec|\ud83c\udfed|\ud83c\udfee|\ud83c\udfef|\ud83c\udff0|\ud83d\udc0c|\ud83d\udc0d|\ud83d\udc0e|\ud83d\udc11|\ud83d\udc12|\ud83d\udc14|\ud83d\udc17|\ud83d\udc18|\ud83d\udc19|\ud83d\udc1a|\ud83d\udc1b|\ud83d\udc1c|\ud83d\udc1d|\ud83d\udc1e|\ud83d\udc1f|\ud83d\udc20|\ud83d\udc21|\ud83d\udc22|\ud83d\udc23|\ud83d\udc24|\ud83d\udc25|\ud83d\udc26|\ud83d\udc27|\ud83d\udc28|\ud83d\udc29|\ud83d\udc2b|\ud83d\udc2c|\ud83d\udc2d|\ud83d\udc2e|\ud83d\udc2f|\ud83d\udc30|\ud83d\udc31|\ud83d\udc32|\ud83d\udc33|\ud83d\udc34|\ud83d\udc35|\ud83d\udc36|\ud83d\udc37|\ud83d\udc38|\ud83d\udc39|\ud83d\udc3a|\ud83d\udc3b|\ud83d\udc3c|\ud83d\udc3d|\ud83d\udc3e|\ud83d\udc40|\ud83d\udc42|\ud83d\udc43|\ud83d\udc44|\ud83d\udc45|\ud83d\udc46|\ud83d\udc47|\ud83d\udc48|\ud83d\udc49|\ud83d\udc4a|\ud83d\udc4b|\ud83d\udc4c|\ud83d\udc4d|\ud83d\udc4e|\ud83d\udc4f|\ud83d\udc50|\ud83d\udc51|\ud83d\udc52|\ud83d\udc53|\ud83d\udc54|\ud83d\udc55|\ud83d\udc56|\ud83d\udc57|\ud83d\udc58|\ud83d\udc59|\ud83d\udc5a|\ud83d\udc5b|\ud83d\udc5c|\ud83d\udc5d|\ud83d\udc5e|\ud83d\udc5f|\ud83d\udc60|\ud83d\udc61|\ud83d\udc62|\ud83d\udc63|\ud83d\udc64|\ud83d\udc66|\ud83d\udc67|\ud83d\udc68|\ud83d\udc69|\ud83d\udc6a|\ud83d\udc6b|\ud83d\udc6e|\ud83d\udc6f|\ud83d\udc70|\ud83d\udc71|\ud83d\udc72|\ud83d\udc73|\ud83d\udc74|\ud83d\udc75|\ud83d\udc76|\ud83d\udeb4|\ud83d\udc78|\ud83d\udc79|\ud83d\udc7a|\ud83d\udc7b|\ud83d\udc7c|\ud83d\udc7d|\ud83d\udc7e|\ud83d\udc7f|\ud83d\udc80|\ud83d\udc81|\ud83d\udc82|\ud83d\udc83|\ud83d\udc84|\ud83d\udc85|\ud83d\udc86|\ud83d\udc87|\ud83d\udc88|\ud83d\udc89|\ud83d\udc8a|\ud83d\udc8b|\ud83d\udc8c|\ud83d\udc8d|\ud83d\udc8e|\ud83d\udc8f|\ud83d\udc90|\ud83d\udc91|\ud83d\udc92|\ud83d\udc93|\ud83d\udc94|\ud83d\udc95|\ud83d\udc96|\ud83d\udc97|\ud83d\udc98|\ud83d\udc99|\ud83d\udc9a|\ud83d\udc9b|\ud83d\udc9c|\ud83d\udc9d|\ud83d\udc9e|\ud83d\udc9f|\ud83d\udca0|\ud83d\udca1|\ud83d\udca2|\ud83d\udca3|\ud83d\udca4|\ud83d\udca5|\ud83d\udca6|\ud83d\udca7|\ud83d\udca8|\ud83d\udca9|\ud83d\udcaa|\ud83d\udcab|\ud83d\udcac|\ud83d\udcae|\ud83d\udcaf|\ud83d\udcb0|\ud83d\udcb1|\ud83d\udcb2|\ud83d\udcb3|\ud83d\udcb4|\ud83d\udcb5|\ud83d\udcb8|\ud83d\udcb9|\ud83d\udcba|\ud83d\udcbb|\ud83d\udcbc|\ud83d\udcbd|\ud83d\udcbe|\ud83d\udcbf|\ud83d\udcc0|\ud83d\udcc1|\ud83d\udcc2|\ud83d\udcc3|\ud83d\udcc4|\ud83d\udcc5|\ud83d\udcc6|\ud83d\udcc7|\ud83d\udcc8|\ud83d\udcc9|\ud83d\udcca|\ud83d\udccb|\ud83d\udccc|\ud83d\udccd|\ud83d\udcce|\ud83d\udccf|\ud83d\udcd0|\ud83d\udcd1|\ud83d\udcd2|\ud83d\udcd3|\ud83d\udcd4|\ud83d\udcd5|\ud83d\udcd6|\ud83d\udcd7|\ud83d\udcd8|\ud83d\udcd9|\ud83d\udcda|\ud83d\udcdb|\ud83d\udcdc|\ud83d\udcdd|\ud83d\udcde|\ud83d\udcdf|\ud83d\udce0|\ud83d\udce1|\ud83d\udce2|\ud83d\udce3|\ud83d\udce4|\ud83d\udce5|\ud83d\udce6|\ud83d\udce7|\ud83d\udce8|\ud83d\udce9|\ud83d\udcea|\ud83d\udceb|\ud83d\udcee|\ud83d\udcf0|\ud83d\udcf1|\ud83d\udcf2|\ud83d\udcf3|\ud83d\udcf4|\ud83d\udcf6|\ud83d\udcf7|\ud83d\udcf9|\ud83d\udcfa|\ud83d\udcfb|\ud83d\udcfc|\ud83d\udd03|\ud83d\udd0a|\ud83d\udd0b|\ud83d\udd0c|\ud83d\udd0d|\ud83d\udd0e|\ud83d\udd0f|\ud83d\udd10|\ud83d\udd11|\ud83d\udd12|\ud83d\udd13|\ud83d\udd14|\ud83d\udd16|\ud83d\udd17|\ud83d\udd18|\ud83d\udd19|\ud83d\udd1a|\ud83d\udd1b|\ud83d\udd1c|\ud83d\udd1d|\ud83d\udd1e|\ud83d\udd1f|\ud83d\udd20|\ud83d\udd21|\ud83d\udd22|\ud83d\udd23|\ud83d\udd24|\ud83d\udd25|\ud83d\udd26|\ud83d\udd27|\ud83d\udd28|\ud83d\udd29|\ud83d\udd2a|\ud83d\udd2b|\ud83d\udd2e|\ud83d\udd2f|\ud83d\udd30|\ud83d\udd31|\ud83d\udd32|\ud83d\udd33|\ud83d\udd34|\ud83d\udd35|\ud83d\udd36|\ud83d\udd37|\ud83d\udd38|\ud83d\udd39|\ud83d\udd3a|\ud83d\udd3b|\ud83d\udd3c|\ud83d\udd3d|\ud83d\udd50|\ud83d\udd51|\ud83d\udd52|\ud83d\udd53|\ud83d\udd54|\ud83d\udd55|\ud83d\udd56|\ud83d\udd57|\ud83d\udd58|\ud83d\udd59|\ud83d\udd5a|\ud83d\udd5b|\ud83d\uddfb|\ud83d\uddfc|\ud83d\uddfd|\ud83d\uddfe|\ud83d\uddff|\ud83d\ude01|\ud83d\ude02|\ud83d\ude03|\ud83d\ude04|\ud83d\ude05|\ud83d\ude06|\ud83d\ude09|\ud83d\ude0a|\ud83d\ude0b|\ud83d\ude0c|\ud83d\ude0d|\ud83d\ude0f|\ud83d\ude12|\ud83d\ude13|\ud83d\ude14|\ud83d\ude16|\ud83d\ude18|\ud83d\ude1a|\ud83d\ude1c|\ud83d\ude1d|\ud83d\ude1e|\ud83d\ude20|\ud83d\ude21|\ud83d\ude22|\ud83d\ude23|\ud83d\ude24|\ud83d\ude25|\ud83d\ude28|\ud83d\ude29|\ud83d\ude2a|\ud83d\ude2b|\ud83d\ude2d|\ud83d\ude30|\ud83d\ude31|\ud83d\ude32|\ud83d\ude33|\ud83d\ude35|\ud83d\ude37|\ud83d\ude38|\ud83d\ude39|\ud83d\ude3a|\ud83d\ude3b|\ud83d\ude3c|\ud83d\ude3d|\ud83d\ude3e|\ud83d\ude3f|\ud83d\ude40|\ud83d\ude45|\ud83d\ude46|\ud83d\ude47|\ud83d\ude48|\ud83d\ude49|\ud83d\ude4a|\ud83d\ude4b|\ud83d\ude4c|\ud83d\ude4d|\ud83d\ude4e|\ud83d\ude4f|\ud83d\ude80|\ud83d\ude83|\ud83d\ude84|\ud83d\ude85|\ud83d\ude87|\ud83d\ude89|\ud83d\ude8c|\ud83d\ude8f|\ud83d\ude91|\ud83d\ude92|\ud83d\ude93|\ud83d\ude95|\ud83d\ude97|\ud83d\ude99|\ud83d\ude9a|\ud83d\udea2|\ud83d\udea4|\ud83d\udea5|\ud83d\udea7|\ud83d\udea8|\ud83d\udea9|\ud83d\udeaa|\ud83d\udeab|\ud83d\udeac|\ud83d\udead|\ud83d\udeb2|\ud83d\udeb6|\ud83d\udeb9|\ud83d\udeba|\ud83d\udebb|\ud83d\udebc|\ud83d\udebd|\ud83d\udebe|\ud83d\udec0|\ud83c\udde6|\ud83c\udde7|\ud83c\udde8|\ud83c\udde9|\ud83c\uddea|\ud83c\uddeb|\ud83c\uddec|\ud83c\udded|\ud83c\uddee|\ud83c\uddef|\ud83c\uddf0|\ud83c\uddf1|\ud83c\uddf2|\ud83c\uddf3|\ud83c\uddf4|\ud83c\uddf5|\ud83c\uddf6|\ud83c\uddf7|\ud83c\uddf8|\ud83c\uddf9|\ud83c\uddfa|\ud83c\uddfb|\ud83c\uddfc|\ud83c\uddfd|\ud83c\uddfe|\ud83c\uddff|\ud83c\udf0d|\ud83c\udf0e|\ud83c\udf10|\ud83c\udf12|\ud83c\udf16|\ud83c\udf17|\ue50a|\u3030|\u27b0|\u2797|\u2796|\u2795|\u2755|\u2754|\u2753|\u274e|\u274c|\u2728|\u270b|\u270a|\u2705|\u26ce|\u23f3|\u23f0|\u23ec|\u23eb|\u23ea|\u23e9|\u2122|\u27bf|\u00a9|\u00ae)|(?:(?:\ud83c\udc04|\ud83c\udd7f|\ud83c\ude1a|\ud83c\ude2f|\u3299|\u303d|\u2b55|\u2b50|\u2b1c|\u2b1b|\u2b07|\u2b06|\u2b05|\u2935|\u2934|\u27a1|\u2764|\u2757|\u2747|\u2744|\u2734|\u2733|\u2716|\u2714|\u2712|\u270f|\u270c|\u2709|\u2708|\u2702|\u26fd|\u26fa|\u26f5|\u26f3|\u26f2|\u26ea|\u26d4|\u26c5|\u26c4|\u26be|\u26bd|\u26ab|\u26aa|\u26a1|\u26a0|\u2693|\u267f|\u267b|\u3297|\u2666|\u2665|\u2663|\u2660|\u2653|\u2652|\u2651|\u2650|\u264f|\u264e|\u264d|\u264c|\u264b|\u264a|\u2649|\u2648|\u263a|\u261d|\u2615|\u2614|\u2611|\u260e|\u2601|\u2600|\u25fe|\u25fd|\u25fc|\u25fb|\u25c0|\u25b6|\u25ab|\u25aa|\u24c2|\u231b|\u231a|\u21aa|\u21a9|\u2199|\u2198|\u2197|\u2196|\u2195|\u2194|\u2139|\u2049|\u203c|\u2668)([\uFE0E\uFE0F]?)))/g, shouldntBeParsed = /IFRAME|NOFRAMES|NOSCRIPT|SCRIPT|STYLE|TEXTAREA|INPUT|SELECT/;

    function parseEmoji(str, innerUse) {
        var result = str, matched = false;
        if (isApple()) {
            return str;
        } else {
            matched = remoji.test(str);
            if (matched) {
                result = str.replace(remoji, function (match, icon, variant) {
                    if (variant != "\uFE0E") {
                        return"<img class=\"emoji_pic\" width='24px' height='24px' align='absmiddle' src='" + buildImage(grabTheRightIcon(icon, variant)) + "' alt='" + match + "' />";
                    }
                    return match;
                });
            }
        }
        if (innerUse) {
            return{result:result, matched:matched};
        } else {
            return result;
        }
    }

    $.fn.emoji = function (options) {
        if (isApple()) {
            return this;
        }
        return this.each(function () {
            var textNodes = [];
            grabAllTextNodes(this, textNodes);
            parseNodes(textNodes);
        });
    };
    $.parseEmoji = parseEmoji;
})(jQuery);
(function () {
    var css_loading = "loading", css_userInfoCard = "userInfo-card", css_card_inner = "card-inner", css_head = "card-head", css_info = "card-info", css_buttons = "card-buttons", css_counters = "card-counters", css_st_infos = "card-st-infos", css_signature = "card-signature-info", css_title = "card-title-info", css_head_pic = "card_head-pic", baseApiPath = "http://bulo.hujiang.com", editNickNameUrl = baseApiPath + "/setting/normal/", Location = {};
    (function (L) {
        var cityCodes = {"110100":"北京", "120100":"天津", "130101":"石家庄", "130201":"唐山", "130301":"秦皇岛", "130701":"张家口", "130801":"承德", "131001":"廊坊", "130401":"邯郸", "130501":"邢台", "130601":"保定", "130901":"沧州", "133001":"衡水", "140101":"太原", "140201":"大同", "140301":"阳泉", "140501":"晋城", "140601":"朔州", "142201":"忻州", "142331":"离石", "142401":"榆次", "142601":"临汾", "142701":"运城", "140401":"长治", "150101":"呼和浩特", "150201":"包头", "150301":"乌海", "152601":"集宁", "152701":"东胜", "152801":"临河", "152921":"阿拉善左旗", "150401":"赤峰", "152301":"通辽", "152502":"锡林浩特", "152101":"海拉尔", "152201":"乌兰浩特", "210101":"沈阳", "210201":"大连", "210301":"鞍山", "210401":"抚顺", "210501":"本溪", "210701":"锦州", "210801":"营口", "210901":"阜新", "211101":"盘锦", "211201":"铁岭", "211301":"朝阳", "211401":"锦西", "210601":"丹东", "220101":"长春", "220201":"吉林", "220301":"四平", "220401":"辽源", "220601":"浑江", "222301":"白城", "222401":"延吉", "220501":"通化", "230101":"哈尔滨", "230301":"鸡西", "230401":"鹤岗", "230501":"双鸭山", "230701":"伊春", "230801":"佳木斯", "230901":"七台河", "231001":"牡丹江", "232301":"绥化", "230201":"齐齐哈尔", "230601":"大庆", "232601":"黑河", "232700":"加格达奇", "310100":"上海", "320101":"南京", "320201":"无锡", "320301":"徐州", "320401":"常州", "320501":"苏州", "320600":"南通", "320701":"连云港", "320801":"淮阴", "320901":"盐城", "321001":"扬州", "321101":"镇江", "321201":"昆山", "321301":"常熟", "321401":"张家港", "321501":"太仓", "321601":"江阴", "321701":"宜兴", "321801":"泰州", "330101":"杭州", "330201":"宁波", "330301":"温州", "330401":"嘉兴", "330501":"湖州", "330601":"绍兴", "330701":"金华", "330801":"衢州", "330901":"舟山", "332501":"丽水", "332602":"临海", "332702":"义乌", "332802":"萧山", "332901":"慈溪", "332603":"台州", "340101":"合肥", "340201":"芜湖", "340301":"蚌埠", "340401":"淮南", "340501":"马鞍山", "340601":"淮北", "340701":"铜陵", "340801":"安庆", "341001":"黄山", "342101":"阜阳", "342201":"宿州", "342301":"滁州", "342401":"六安", "342501":"宣州", "342601":"巢湖", "342901":"贵池", "350101":"福州", "350201":"厦门", "350301":"莆田", "350401":"三明", "350501":"泉州", "350601":"漳州", "352101":"南平", "352201":"宁德", "352601":"龙岩", "360101":"南昌", "360201":"景德镇", "362101":"赣州", "360301":"萍乡", "360401":"九江", "360501":"新余", "360601":"鹰潭", "362201":"宜春", "362301":"上饶", "362401":"吉安", "362502":"临川", "370101":"济南", "370201":"青岛", "370301":"淄博", "370401":"枣庄", "370501":"东营", "370601":"烟台", "370701":"潍坊", "370801":"济宁", "370901":"泰安", "371001":"威海", "371100":"日照", "372301":"滨州", "372401":"德州", "372501":"聊城", "372801":"临沂", "372901":"菏泽", "410101":"郑州", "410201":"开封", "410301":"洛阳", "410401":"平顶山", "410501":"安阳", "410601":"鹤壁", "410701":"新乡", "410801":"焦作", "410901":"濮阳", "411001":"许昌", "411101":"漯河", "411201":"三门峡", "412301":"商丘", "412701":"周口", "412801":"驻马店", "412901":"南阳", "413001":"信阳", "420101":"武汉", "420201":"黄石", "420301":"十堰", "420400":"荆州", "420501":"宜昌", "420601":"襄阳", "420701":"鄂州", "420801":"荆门", "422103":"黄冈", "422201":"孝感", "422301":"咸宁", "433000":"仙桃", "433100":"潜江", "431700":"天门", "421300":"随州", "422421":"江陵", "422801":"恩施", "430101":"长沙", "430401":"衡阳", "430501":"邵阳", "432801":"郴州", "432901":"永州", "430801":"大庸", "433001":"怀化", "433101":"吉首", "430201":"株洲", "430301":"湘潭", "430601":"岳阳", "430701":"常德", "432301":"益阳", "432501":"娄底", "440101":"广州", "440301":"深圳", "441501":"汕尾", "441301":"惠州", "441601":"河源", "440601":"佛山", "441801":"清远", "441901":"东莞", "440401":"珠海", "440701":"江门", "441201":"肇庆", "442001":"中山", "440801":"湛江", "440901":"茂名", "440201":"韶关", "440501":"汕头", "441401":"梅州", "441701":"阳江", "441901":"潮州", "445200":"揭阳", "450101":"南宁", "450401":"梧州", "452501":"玉林", "450301":"桂林", "452601":"百色", "452701":"河池", "452802":"钦州", "450201":"柳州", "450501":"北海", "460100":"海口", "460200":"三亚", "510101":"成都", "513321":"康定", "513101":"雅安", "513229":"马尔康", "510301":"自贡", "500100":"重庆", "512901":"南充", "510501":"泸州", "510601":"德阳", "510701":"绵阳", "510901":"遂宁", "511001":"内江", "511101":"乐山", "512501":"宜宾", "510801":"广元", "513021":"达县", "513401":"西昌", "510401":"攀枝花", "520101":"贵阳", "520200":"六盘水", "522201":"铜仁", "522501":"安顺", "522601":"凯里", "522701":"都匀", "522301":"兴义", "522421":"毕节", "522101":"遵义", "530101":"昆明", "530201":"东川", "532201":"曲靖", "532301":"楚雄", "532401":"玉溪", "532501":"个旧", "532621":"文山", "532721":"思茅", "532101":"昭通", "532821":"景洪", "532901":"大理", "533001":"保山", "533121":"潞西", "533221":"丽江纳西族自治县", "533321":"泸水", "533421":"中甸", "533521":"临沧", "540101":"拉萨", "542121":"昌都", "542221":"乃东", "542301":"日喀则", "542421":"那曲", "542523":"噶尔", "542621":"林芝", "610101":"西安", "610201":"铜川", "610301":"宝鸡", "610401":"咸阳", "612101":"渭南", "612301":"汉中", "612401":"安康", "612501":"商州", "612601":"延安", "612701":"榆林", "620101":"兰州", "620401":"白银", "620301":"金昌", "620501":"天水", "622201":"张掖", "622301":"武威", "622421":"定西", "622624":"成县", "622701":"平凉", "622801":"西峰", "622901":"临夏", "623027":"夏河", "620201":"嘉峪关", "622102":"酒泉", "630100":"西宁", "632121":"平安", "632221":"门源回族自治县", "632321":"同仁", "632521":"共和", "632621":"玛沁", "632721":"玉树", "632802":"德令哈", "640101":"银川", "640201":"石嘴山", "642101":"吴忠", "642221":"固原", "650101":"乌鲁木齐", "650201":"克拉玛依", "652101":"吐鲁番", "652201":"哈密", "652301":"昌吉", "652701":"博乐", "652801":"库尔勒", "652901":"阿克苏", "653001":"阿图什", "653101":"喀什", "654101":"伊宁", "710001":"台北", "710002":"基隆", "710020":"台南", "710019":"高雄", "710008":"台中", "211001":"辽阳", "653201":"和田", "542200":"泽当镇", "542600":"八一镇", "820001":"澳门", "810001":"香港"}, provinceCodes = {"44":"广东", "32":"江苏", "33":"浙江", "34":"安徽", "37":"山东", "35":"福建", "43":"湖南", "42":"湖北", "51":"四川", "61":"陕西", "13":"河北", "41":"河南", "36":"江西", "14":"山西", "15":"内蒙古", "21":"辽宁", "22":"吉林", "23":"黑龙江", "45":"广西", "46":"海南", "52":"贵州", "53":"云南", "54":"西藏", "62":"甘肃", "64":"宁夏", "63":"青海", "65":"新疆", "71":"台湾", "81":"香港", "82":"澳门"};
        L.getCityCode = function (city) {
            var result = "";
            $.each(cityCodes, function (code, strCity) {
                if (strCity == city) {
                    result = code;
                    return false;
                }
            })
            return result;
        };
        L.getCityFullName = function (city) {
            var code = L.getCityCode(city), provinceCode, provinceName;
            if (!code) {
                return city;
            }
            else {
                provinceCode = code.substring(0, 2);
                provinceName = provinceCodes[provinceCode];
                if (provinceName) {
                    return provinceName + " " + city;
                }
                else {
                    return city;
                }
            }
        };
    }(Location));
    function getUserPic(userId) {
        var len = userId.length, str = "0000";
        if (length < 4) {
            userId = str.substring(0, (4 - len)) + userId;
        }
        len = userId.length;
        var firstLevel = userId.substr(len - 4, 2);
        var secondLevel = userId.substr(len - 2, 2);
        return"http://i2.hjfile.cn/f48/" + firstLevel + "/" + secondLevel + "/" + userId + ".jpg";
    }

    function UserInfoCard(optiopns) {
        this.options = optiopns;
        this.init();
    }

    function getUserInfoUrl(userId) {
        return baseApiPath + "/u/" + userId;
    }

    function format() {
        var str = arguments[0], len = arguments.length;
        for (var i = 1; i < len; i++) {
            var reg = new RegExp("\\{" + (i - 1) + "\\}", "g");
            str = str.replace(reg, arguments[i]);
        }
        return str;
    }

    function ajax(url, data, callback) {
        $.get(url, data, function (data) {
            callback(data);
        }, "jsonp");
    }

    function checkIsOnline(userId, callback) {
        $.ajax({type:"Get", dataType:"jsonp", url:"http://cctalkn.hujiang.com/api/CheckIsOnline.ashx?userId=" + userId, contentType:"application/json;charset=utf-8", success:function (result) {
            callback(result);
        }, timeout:1000 * 15, error:function (XMLHttpRequest, textStatus, errorThrown) {
            callback(-1);
        }});
    }

    function follow(userId, userName, callback) {
        ajax(baseApiPath + "/service/GetUserFace.ashx", {op:"follow", FriendID:userId, FriendName:userName}, callback);
    }

    function unfollow(userID, userName, callback) {
        if (window.confirm("确定要取消关注吗？")) {
            ajax(baseApiPath + "/service/GetUserFace.ashx", {op:"cancel", FriendID:userID, FriendName:userName}, callback);
        }
    }

    var relations = {anonymous:"anonymous", none:"none", blackList:"blackList", focused:"focused", friend:"friend", self:"self", fans:"fans"}

    function getRelation(code) {
        return{"-3":relations.anonymous, "-2":relations.none, "-1":relations.blackList, "0":relations.focused, "1":relations.friend, "2":relations.self, "3":relations.fans}[code];
    }

    var template = "<div class='" + css_userInfoCard + "'>" + "<div class='" + css_loading + "'></div>" + "<div class='" + css_card_inner + "'>" + "<div class='top'>" + "<div class='" + css_head + "'></div>" + "<div class='" + css_info + "'></div>" + "<div class='" + css_buttons + "'></div>" + "</div>" + "<div class='" + css_counters + "'></div>" + "<div class='" + css_st_infos + "'></div>" + "<hr />" + "<div class='" + css_signature + "'></div>" + "<div class='hide " + css_title + "'>" + "</div>" + "</div>"
    UserInfoCard.prototype = {constructor:UserInfoCard, init:function () {
        this._initElements();
        this._initEvents();
    }, _initElements:function () {
        var appendTo = this.options.appendTo || "body", container = this.container = $(template).appendTo(appendTo).hide(), self = this, innner;
        self.$loading = container.find("." + css_loading);
        innner = self.$inner = container.find("." + css_card_inner);
        self.$header = innner.find("." + css_head);
        self.$info = innner.find("." + css_info);
        self.$buttons = innner.find("." + css_buttons);
        self.$counters = innner.find("." + css_counters);
        self.$stInfos = innner.find("." + css_st_infos);
        self.$signature = innner.find("." + css_signature);
        self.$title = innner.find("." + css_title);
        self.$hr = innner.find("hr");
    }, _initHeader:function (userId) {
        this.$header.html(format("<a href='{0}' target='_blank'><img src='{1}' class='{2}' /></a>", getUserInfoUrl(userId), getUserPic(userId), css_head_pic));
    }, _initInfo:function (data) {
        var html = "";
        if (data.UserName) {
            html += format("<a href='{0}/u/{1}' target='_blank' class='user-name'>{2}</a>", baseApiPath, data.UserID, data.UserName);
        }
        if (data.NickName) {
            data.NickName = data.NickName.replace(/^\(/, "").replace(/\)$/, "");
            if (data.NickName.replace(/\s/g, "")) {
                if (this._relation == relations.self) {
                    html += format("<span class='nickName'>({0}<a href='{1}' class='edit-nickName icon' target='_blank'></a>)</span>", data.NickName, editNickNameUrl);
                }
                else {
                    html += format("<span class='nickName'>({0})</span>", data.NickName);
                }
            }
        }
        else if (this._relation == relations.self) {
            html += format("（<a href='{0}' target='_blank'>添加昵称</a>）", editNickNameUrl);
        }
        if (data.Gender && data.Gender != " ") {
            html += format("<i class='icon {0}'></i>", data.Gender == 1 ? "male" : "female");
        }
        html += format("<i title='{0}' class='icon location'></i>", Location.getCityFullName(data.city));
        this.$info.html(html);
    }, _initButtons:function (data) {
        var html = "", self = this, relation = this._relation;
        if (relation == relations.none || relation == relations.blackList) {
            html += "<div class='focusOn'><i class='icon'></i><span>关注</span></div>";
        }
        else if (relation == relations.focused || relation == relations.friend) {
            html += "<div class='focused'><i class='icon'></i><span>已关注</span></div>";
        }
        else if (relation == relations.fans) {
            html += "<div class='focused-eachother'><i class='icon'></i><span>相互关注</span></div>";
        }
        if (relation != relations.self) {
            html += "<div class='private-message'>私信</div>";
            if (relation != relations.anonymous) {
                html += format("<a class='ccTalk icon'><iframe src='http://cctalk.hujiang.com/api/frame_install/frame_cctalkInstall.aspx?userid={0}&userName={1}' scrolling='no' frameborder='no' allowtransparency='true'></iframe></a>", data.UserID, data.UserName);
                if (relation != relations.self) {
                    checkIsOnline(data.UserID, function (result) {
                        if (result > 0) {
                            self.container.find(".ccTalk").addClass("online").attr("title", "当前在线");
                        }
                    });
                }
            }
        }
        this.$buttons.html(html);
    }, _initCounters:function (data) {
        var html = "";
        html += format("<div class='fans-counter'><div class='counter'>{0}</div><div class='desc'>粉丝</div></div>", data.FansCount);
        html += format("<div class='hu-age-counter'><div class='counter'>{0}</div><div class='desc'>沪龄</div></div>", data.Age);
        html += format("<div class='hu-money-counter'><div class='counter'>{0}</div><div class='desc'>沪元</div></div>", data.Money);
        this.$counters.html(html);
    }, _initStView:function (data) {
        if (data.Leagues && data.Leagues.length) {
            var html = "";
            html += "<label>社团</label>";
            html += "<ul>";
            $.each(data.Leagues, function (i, item) {
                html += format("<li><a href='{0}' title='{2}'><img src='{1}' alt='{2}'></a></li>", item.LeagueUrl, item.AvatarUrl, item.LeagueName);
            });
            html += "</ul>";
            this.$stInfos.html(html).show();
        }
        else {
            this.$stInfos.html("<div class='empty-st'>暂无加入社团</div>");
        }
    }, _initUserSign:function (data) {
        if (data.UserSign) {
            var html = format("<label>签名</label><div>{0}</div>", data.UserSign);
            this.$signature.html(html).show();
        }
        else {
            this.$signature.hide();
        }
    }, _isInsideOfPopup:function (ele) {
        return $.contains(this.container[0], ele);
    }, _initEvents:function () {
        var target = this.options.target, o = this.options, self = this, showTimer, hideTimer, delay = 500, isMouseInside;
        $("body").on("mouseenter", target,function (e) {
            var $this = $(this);
            if (self._isInsideOfPopup(this)) {
                return;
            }
            if (!showTimer) {
                showTimer = setTimeout(function () {
                    self._show($this, e);
                    showTimer = null;
                }, delay);
            }
        }).on("mouseleave", target, function (e) {
                if (self._isInsideOfPopup(this)) {
                    return;
                }
                if (showTimer) {
                    clearTimeout(showTimer);
                    showTimer = null;
                }
                if (!hideTimer) {
                    hideTimer = setTimeout(function () {
                        self._hide(e);
                        hideTimer = null;
                    }, delay)
                }
            });
        this.$inner.on("click", ".focusOn,.focused,.focused-eachother,.private-message",function (e) {
            var $target = $(this);
            if ($target.is(".private-message")) {
                window.open(baseApiPath + "/app/msg/#/compose/" + self.userName, "_blank");
            }
            else if ($target.is(".focusOn")) {
                follow(self.userId, self.userName, function (d) {
                    if (d == "ok") {
                        $target.removeClass("focusOn").addClass("focused");
                        $target.find("span").text("已关注");
                    }
                    else if (d == -99) {
                        location.href = baseApiPath + "/login?source=buloApp&returnurl=" + location.href;
                    }
                });
            }
            else {
                unfollow(self.userId, self.userName, function (d) {
                    $target.removeClass("focused focused-eachother").addClass("focusOn");
                    $target.find("span").text("关注");
                })
            }
        }).on("mouseenter",function (e) {
                if (hideTimer) {
                    clearTimeout(hideTimer);
                    hideTimer = null;
                    isMouseInside = true;
                }
            }).on("mouseleave", function () {
                hideTimer = setTimeout(function () {
                    self._hide();
                    hideTimer = null;
                }, delay);
            });
    }, _show:function (target, e) {
        var o = this.options, id = o.getUserId(target);
        if (!id) {
            return;
        }
        this.container.show();
        this.container.position({at:"right bottom", my:"left top", of:target});
        this._switchLoadingState(true);
        this.loadData(id);
    }, _hide:function () {
        this.container.hide();
    }, _switchLoadingState:function (isLoading) {
        this.$loading[isLoading ? "show" : "hide"]();
        this.$inner[isLoading ? "hide" : "show"]();
    }, _initView:function (data) {
        this.userName = data.UserName;
        this._relation = getRelation(data.IsFollowed);
        this._initHeader(data.UserID);
        this._initInfo(data);
        this._initButtons(data);
        this._initCounters(data);
        this._initStView(data);
        this._initUserSign(data);
        if (data.UserSign || data.header) {
            this.$hr.show();
        }
        else {
            this.$hr.hide();
        }
    }, loadData:function (userId) {
        var url = baseApiPath + "/service/GetUserFace.ashx", self = this;
        if (self.userId == userId) {
            self._switchLoadingState(false);
            return;
        }
        self.userId = userId;
        $.get(url, {ver:+new Date(), userId:userId}, function (data) {
            self._switchLoadingState(false);
            self._initView(data);
        }, "jsonp")
    }}
    this.UserInfoCard = UserInfoCard;
    this.format = format;
}());
$(function () {
    new UserInfoCard({target:"a[href*='bulo.hujiang.com/'],a[href*='t.hujiang.com/'],a[href*='/listen/u'],a.userface,a[href*='/u/']", getUserId:function (ele) {
        var nouserface = ele.attr("nouserface");
        if (!nouserface) {
            var href = ele.attr("href");
            var userID = ele.attr("userid") || (href.match(/\d+/) && href.match(/\d+/)[0]);
            var host = href.replace(/(\/u)?\/\d+\/?/ig, "");
            if (userID && (host == "http://bulo.hujiang.com" || host == "bulo.hujiang.com" || host == "t.hujiang.com" || host == "http://t.hujiang.com")) {
                return userID;
            }
        }
        return null;
    }, appendTo:"body"})
});
;
(function (win) {
    function showError(title, info, callback) {
        $.modal.close();
        var infoBox = '<div class="pop_window clearfix">';
        if (info && typeof(info) != 'function') {
            infoBox += '<h3>' + title + '</h3><div class="pop_window_desc_2">' + info + '</div>';
        } else {
            infoBox += '<div class="pop_window_desc">' + title + '</div>'
            callback = info;
        }
        infoBox += '<a href="javascript:;" class="error_close_btn" on>知道了</a></div>';
        infoBox = $(infoBox);
        infoBox.modal();
        infoBox.on('click', '.error_close_btn', function () {
            callback && callback();
            $.modal.close();
        });
    }

    function confirmWindow(title, info, callback) {
        $.modal.close();
        var infoBox = '<div class="pop_window clearfix">';
        if (info && typeof(info) !== "function")
            infoBox += '<h3>' + title + '</h3><div class="pop_window_desc_2">' + info + '</div>';
        if (!info || typeof(info) == "function") {
            infoBox += '<div class="pop_window_desc">' + title + '</div>'
            callback = typeof(info) == "function" ? info : callback;
        }
        infoBox += '<div class="pop_window_btns"><a href="javascript:;" class="confirm_Ok_btn">确认</a>'
            + '<a href="javascript:$.modal.close();" class="confirm_close_btn">取消</a></div></div>';
        infoBox = $(infoBox);
        infoBox.modal();
        infoBox.on('click', '.confirm_Ok_btn', function () {
            $.modal.close();
            callback && callback();
        });
    }

    win.alertWindow = showError;
    win.confirmWindow = confirmWindow;
})(this);
;
(function (win) {
    function showError(title, info, callback) {
        $.modal.close();
        var infoBox = '<div class="pop_window clearfix">';
        if (info && typeof(info) != 'function') {
            infoBox += '<h3>' + title + '</h3><div class="pop_window_desc_2">' + info + '</div>';
        } else {
            infoBox += '<div class="pop_window_desc">' + title + '</div>'
            callback = info;
        }
        infoBox += '<a href="javascript:;" class="error_close_btn" on>知道了</a></div>';
        infoBox = $(infoBox);
        infoBox.modal();
        infoBox.on('click', '.error_close_btn', function () {
            callback && callback();
            $.modal.close();
        });
    }

    function confirmWindow(title, info, callback) {
        $.modal.close();
        var infoBox = '<div class="pop_window clearfix">';
        if (info && typeof(info) !== "function")
            infoBox += '<h3>' + title + '</h3><div class="pop_window_desc_2">' + info + '</div>';
        if (!info || typeof(info) == "function") {
            infoBox += '<div class="pop_window_desc">' + title + '</div>'
            callback = typeof(info) == "function" ? info : callback;
        }
        infoBox += '<a href="javascript:;" class="confirm_Ok_btn">确认</a>'
            + '<a href="javascript:$.modal.close();" class="confirm_close_btn">取消</a></div>';
        infoBox = $(infoBox);
        infoBox.modal();
        infoBox.on('click', '.confirm_Ok_btn', function () {
            if (callback && callback() !== false)
                $.modal.close();
        });
    }

    win.alertWindow = showError;
    win.confirmWindow = confirmWindow;
})(this);
;
(function ($, win) {
    $.extend($, {stringify:function (obj) {
        var m = {'\b':'\\b', '\t':'\\t', '\n':'\\n', '\f':'\\f', '\r':'\\r', '"':'\\"', '\\':'\\\\'}, s = {'array':function (x) {
            var a = ['['], b, f, i, l = x.length, v;
            for (i = 0; i < l; i += 1) {
                v = x[i];
                f = s[typeof v];
                if (f) {
                    v = f(v);
                    if (typeof v == 'string') {
                        if (b) {
                            a[a.length] = ','
                        }
                        a[a.length] = v;
                        b = true
                    }
                }
            }
            a[a.length] = ']';
            return a.join('')
        }, 'boolean':function (x) {
            return String(x)
        }, 'null':function (x) {
            return'null'
        }, 'number':function (x) {
            return isFinite(x) ? String(x) : 'null'
        }, 'object':function (x) {
            if (x) {
                if (x instanceof Array) {
                    return s.array(x)
                }
                var a = ['{'], b, f, i, v;
                for (i in x) {
                    v = x[i];
                    f = s[typeof v];
                    if (f) {
                        v = f(v);
                        if (typeof v == 'string') {
                            if (b) {
                                a[a.length] = ','
                            }
                            a.push(s.string(i), ':', v);
                            b = true
                        }
                    }
                }
                a[a.length] = '}';
                return a.join('')
            }
            return'null'
        }, 'string':function (x) {
            if (/["\\\x00-\x1f]/.test(x)) {
                x = x.replace(/([\x00-\x1f\\"])/g, function (a, b) {
                    var c = m[b];
                    if (c) {
                        return c
                    }
                    c = b.charCodeAt();
                    return'\\u00' + Math.floor(c / 16).toString(16) + (c % 16).toString(16)
                })
            }
            return'\"' + x + '\"'
        }};
        return s.object(obj);
    }, checkNetwork:function () {
        if (navigator.onLine) {
            return true;
        } else {
            alertWindow('您的网络不太给力哦~');
            return false;
        }
    }, showError:function (d) {
        console.log(d);
        alertWindow('服务器忙，请稍候再试~');
    }, loading:function (bool) {
        if (!bool) {
            $('.loading').show();
        } else {
            $('.loading').hide();
        }
    }, isRetina:function () {
        return window.devicePixelRatio && window.devicePixelRatio >= 1.5;
    }, uniqID:function (string) {
        string = string || '_';
        return string + Math.floor(Math.random() * 10000000) + new Date().getTime().toString().substring(10, 13);
    }, loadMoreData:function (options) {
        var defaultSetting = {loading:'.loading', padding:200, url:'', dataType:'json', loadFirstPage:false, data:{page:1, pagesize:10}, success:function () {
        }, error:null}, opt = $.extend(defaultSetting, options), isRetina = $.isRetina(), windowHeight = isRetina ? window.devicePixelRatio * document.documentElement.clientHeight : $(window).height(), loading = false, loadingObj = $(opt.loading), uniqID = $.uniqID(), curPage = opt.data.page;
        opt.data.pagesize = opt.data.pagesize || 10;
        function loadData() {
            opt.data.page = curPage;
            var data = {url:opt.url, type:'get', data:opt.data, dataType:opt.dataType, success:function (d) {
                var hasMore = true;
                if (!d || Math.ceil(d.totalCount / opt.data.pagesize) <= curPage) {
                    $(win).off('scroll.' + uniqID);
                    hasMore = false;
                }
                loadingObj.hide();
                curPage += 1;
                loading = false;
                opt.success && opt.success(d, hasMore);
            }, error:function (e, s, d) {
                loadingObj.hide();
                opt.error && opt.error(e, s, d);
                $(win).off('scroll.' + uniqID);
            }, loading:opt.loading};
            $.sync(data);
        }

        if (opt.loadFirstPage) {
            loadingObj.show();
            loading = true;
            loadData();
        }
        $(win).on('scroll.' + uniqID, function () {
            loadingObj.show();
            var offset = loadingObj[0].getBoundingClientRect();
            if (offset.top - opt.padding < windowHeight && !loading) {
                loading = true;
                loadData();
            }
        });
        return{destory:function () {
            $(win).off('scroll.' + uniqID);
        }};
    }, scrollTo:function (obj) {
        if (typeof obj === "number") {
            $(window).scrollTop(obj);
        } else {
            var offset = $(obj).offset();
            $(window).scrollTop(offset.top);
        }
    }, isWeixin:function () {
        return/MicroMessenger/i.test(navigator.userAgent);
    }, isIOS:function () {
        return/[ipad|iphone|iPod|Macintosh|mac os]/i.test(navigator.userAgent);
    }, isAndroid:function () {
        return/Android/i.test(navigator.userAgent);
    }, UserId2face:function (userId) {
        var len = userId.length, str = "0000";
        if (length < 4) {
            userId = str.substring(0, (4 - len)) + userId;
            len = userId.length;
        }
        return"http://i2.hjfile.cn/f48/" + userId.substr(len - 4, 2) + "/" + userId.substr(len - 2, 2) + "/" + userId + ".jpg";
    }, charlen:function (string) {
        return string.replace(/[^\x00-\xff]/g, '00').length;
    }});
    $.extend($, {sync:function (options) {
        var defaultSetting = {checkNetwork:true, timeout:20000, userProxy:true};
        var opt = $.extend(defaultSetting, options), uniqID = $.uniqID();
        var type = (opt.type || 'get').toLowerCase();
        if (type == 'get') {
            if (opt.data) {
                opt.data._ = uniqID;
            } else {
                opt.data = {_:uniqID};
            }
            if (opt.userProxy) {
                var tempData = opt.data;
                opt.data = {};
                opt.data.action = 'getFromLeagueApi';
                opt.data.ApiLink = opt.url + '?' + $.param(tempData);
                opt.url = '/ajax/optionAjax.ashx';
            }
        } else {
            if (opt.type == 'put' || opt.type == 'delete') {
                opt.type = 'post';
                opt.data.method = opt.type;
            }
            if (opt.userProxy) {
                var tempData = opt.data;
                opt.data = {};
                opt.data.Body = $.stringify(tempData) || '';
                opt.data.ApiLink = opt.url;
                opt.data.HttpMethod = opt.type;
                opt.url = '/ajax/PostAjax.asmx/RequestLeagueAPI';
            }
            opt.data = $.stringify(opt.data);
        }
        if (!opt.checkNetwork || (opt.checkNetwork && $.checkNetwork())) {
            var data = {url:opt.url, dataType:options.dataType || 'json', type:opt.type, timeout:opt.timeout, data:opt.data, contentType:'application/json', success:function (d) {
                if (opt.type != 'get')
                    d = $.parseJSON(d.d);
                if (!opt.loading) {
                    if (opt.loading === undefined) {
                        $.loading('hide');
                    }
                } else {
                    $(opt.loading).hide();
                }
                if (d.status == 0) {
                    opt.success && opt.success(d.data);
                } else if (opt.error && typeof(opt.error) === 'function') {
                    opt.error(d);
                } else {
                    alertWindow(d.message);
                }
            }, error:function (d) {
                if (!opt.loading) {
                    $.loading('hide');
                } else {
                    $(opt.loading).hide();
                }
                if (opt.error && typeof(opt.error) === 'function') {
                    opt.error(d);
                } else {
                    $.showError(d);
                }
            }};
            if (!opt.loading) {
                $.loading();
            } else {
                $(opt.loading).show();
            }
            $.ajax(data);
        }
    }})
})($, this);