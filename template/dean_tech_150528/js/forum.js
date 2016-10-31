var _csrf, ajaxResult = true;
var pageUpTxt = '«';
var pageDownTxt = '»';
var hint_timer = null;
if(typeof xs_static == 'undefined') {
	xs_static = "http://img.xsteach.cn";
};
if(typeof xs_bbs == 'undefined') {
	xs_bbs = "http://bbs.xsteach.com";
};
if(typeof xs_www == 'undefined') {
	xs_www = "http://www.xsteach.com";
};
if(typeof loginUrl == 'undefined') {
	loginUrl = xs_www+"/login";
};
//定义楼中楼表情配置
var xs_reply_face={
	url:xs_static+'/static/images/ueditor/dialogs/emotion/minis/',
	vers:'v1',
	img:xs_static+'/static/images/bbs/brface.png',
	titles:['咦','啊','开心','吓','乖','花心','调皮','吐','阴险','坏笑','生气','惊哭','惊讶','咬牙','大哭','流汗']
};

(function($){
	//放在Ajax缓存
    $.ajaxSetup({cache:false});
	// 在编辑框内插入文字
	$.fn.extend({
		"insert":function(txt){
			var dthis = $(this)[0]; //将jQuery对象转换为DOM元素

			//IE下
			if(document.selection){
				$(dthis).focus();		//输入元素textara获取焦点
				var fus = document.selection.createRange();//获取光标位置
				fus.text = txt;	//在光标位置插入值
				$(dthis).focus();	///输入元素textara获取焦点

			}
			//火狐下标准
			else if(dthis.selectionStart || dthis.selectionStart == '0'){
				var start = dthis.selectionStart;
				var end = dthis.selectionEnd;
				var top = dthis.scrollTop;
				//以下这句，应该是在焦点之前，和焦点之后的位置，中间插入我们传入的值
				dthis.value = dthis.value.substring(0, start) + txt + dthis.value.substring(end, dthis.value.length);
			}
			//在输入元素textara没有定位光标的情况
			else{
				this.value += txt;
				this.focus();
			};

			return $(this);
		}
	}).extend({
		/**
		 * 获取光标在文本框最右边
		 * @param v
		 * @returns {$.fn}
		 */
		textFocus : function (v) {
			var range, len, v = v === undefined ? 0 : parseInt(v);
			this.each(function () {
				if (document.selection) {
					range = this.createTextRange();
					v === 0 ? range.collapse(false) : range.move("character", v);
					range.select();
				} else {
					len = this.value.length;
					v === 0 ? this.setSelectionRange(len, len) : this.setSelectionRange(v, v);
				}
				this.focus();
			});
			return this;
		}
	});
})(jQuery)
function newBlankLink(nlink) {
	if($('#new-blank-link').length) {
		$('#new-blank-link').attr('href',nlink);
	} else {
		$('body').append('<a id="new-blank-link" href="'+nlink+'" target="_blank" style="display:none;"/></a>');
	}
	$('#new-blank-link')[0].click();
}

//对 @用户名 加个人主页链接
function wrapAtWithLink(node) {
	var s = $(node).html();
	s = '>' + s + '<';
	var m = s.replace(/>[^<]+</g, function(i){
		return i.replace(/@([^@\s,<:\?#\(\)\*\^+\\>，：“”　。！]+)/g, '<a class="at-me" unm="$1" href="javascript:void(0);">@$1</a>');
	});
	$(node).html(m.substr(1, m.length - 2));
}

$(document).ready(function () {
	var uajax = null;
	 if($('.newtopic').next('.sq-release-topic').find('input[name="Thread[has_pass]"][type=radio]:checked').length == 0) {
     	$('.newtopic').next('.sq-release-topic').find('input[name="Thread[has_pass]"][type=radio]').eq(0).click();
     }
     if($('.newtopic').next('.sq-release-topic').find('input[name="Thread[forum_id]"][type=radio]:checked').length == 0) {
     	$('.newtopic').next('.sq-release-topic').find('input[name="Thread[forum_id]"][type=radio]').eq(0).click();
     }
	if($('.dropdown-menu li').length == 0) {
		$('.dropdown-menu').closest('.dropdown').remove();
	}
    _csrf = $("input[name=_csrf]").val();

    // 对 @用户名 加个人主页链接
    $('.comment-info, .comment-text').each(function(){
    	wrapAtWithLink(this);
    });

    $(document).on('click','.at-me',function() {
    	var _this = this;
    	if( alink = $(this).data('href')) {
			newBlankLink(alink);
			return false;
    	}
    	if(uajax) {
    		uajax.abort();
    		uajax = null;
    	};
    	var unm = $(this).attr('unm');
    	var url = '/default/userid-by-name';
    	if(typeof xs_www == 'undefined') {
    		xs_www = "http://www.xsteach.com";
    	}
    	uajax = $.ajax({
    		'url':url,
    		'data':{'unm':unm},
    		'dataType':'jsonp',
    		'type':'get',
    		'async':false,
    		'cache':false,
    		'success':function(data) {
    			uajax = null;
    			if(data) {
    				var alink = xs_www+'/home/'+data;
    			} else {
    				var alink = xs_www+'/home/0';
    			}
				$(_this).data('href',alink);
				newBlankLink(alink);
				return false;
    		}
    	});
    });
    // 点赞评分
    var praiseAjax = null;
    var praisePageUrl = $('.see-score .get-praise').attr('praise-page');
    var g_pid = $('.see-score .get-praise').attr('pid');
    var praiseHtmlDiv = $('#comment-frame .praise-tooltip .bd .li-list');
    var blankDataTip = '此主贴暂时没有点赞评分';
    window.praise_page_ajax_callback = function (data) {
        praiseAjax = null;
        var msgs = data['msgs'];
        if (msgs.length <= 0) {
            praiseHtmlDiv.html('<li class="blank-tip">' + blankDataTip + '</li>');
//            praisePageDiv.html('');
            $('#comment-frame .praise-tooltip .up-num').html('0');
            $('#comment-frame .praise-tooltip .down-num').html('0');
            return false;
        }
        var stat = data['stat'];
        var upCount = stat['upCount'];
        var downCount = stat['downCount'];
        var msgHtml = '';
        for (i = 0; i < msgs.length; i++) {
            var msg = msgs[i];
            var sur = msg['support'] == 1 ? 'praise-btn' : 'updown-btn';
            var surTxt = msg['support'] == 1 ? '赞' : '踩';
            msgHtml += '<li>\
					<span class="act">\
						<a class="praise-act ' + sur + '" href="javascript:;">' + surTxt + '</a>\
					</span>\
					<span class="name">\
						<a style="cursor: hand;cursor: pointer;" target="_blank" href="http://www.xsteach.com/home/'+msg['support_user']+'">' + msg['username'] + '</a> \
					</span>\
					<span class="date">' + msg['time'] + '</span>\
				    </li>';
        }
        praiseHtmlDiv.html(msgHtml);
        $('#comment-frame .praise-tooltip .up-num').html(upCount);
        $('#comment-frame .praise-tooltip .down-num').html(downCount);
    }
    window.showPraisePageHtml = function (page, showLoading) { //page = 0  则后台将读取最后一页的数据
        var page = page;
        var sendData = {
            'pid': g_pid
        }
        showLoading = typeof showLoading === 'undefined' ? true : showLoading;
        if (showLoading) {
            praiseHtmlDiv.html('<li class="loading"></li>');
        }
        if (praiseAjax) praiseAjax.abort();
        praiseAjax = getPageHtml(praisePageUrl, sendData, praise_page_ajax_callback);
    }
    //贴子主题字数限制显示
    /*$('.modal-dialog .thread-subject').keyup(function(evt) {
	    var txt = $(this).val();
	    $(this).closest('.content').find(".inputLimit").html(txt.length);
	});
    $('.modal-dialog .thread-subject').focus(function(evt) {
	    var txt = $(this).val();
	    $(this).closest('.content').find(".inputLimit").html(txt.length);
	});
    $('.modal-dialog .thread-subject').each(function(){
    	$(this).closest('.content').find(".inputLimit").html($(this).val().length);
    });*/
	$('.content .thread-subject').each(function(){
		$(this).parent().find(".inputLimit").html($(this).val().length);
		$(this).keyup(function(evt) {
			var txt = $(this).val();
			$(this).parent().find(".inputLimit").html(txt.length);
		}).focus(function(evt) {
			var txt = $(this).val();
			$(this).parent().find(".inputLimit").html(txt.length);
		})
	});
    // 判断是否主题是否第一页
    if ($('#comment-frame .comment-article .support-div').length > 0) {
        showPraisePageHtml();
    }
    var praise_timer = null;
    $('.see-score').hover(function () {
        if (praise_timer) clearTimeout(praise_timer);
        $('.praise .praise-cont').hide();
        location_show($('.see-score .praise-tooltip'), $('.see-score'), 'toolbar-top', 'toolbar-bottom');
    }, function () {
        praise_timer = setTimeout("$('.see-score .praise-tooltip').hide();", 200);
    })
    $(".reply-time").each(function () {
        var oldDate = new Date($(this).attr("date"));
        var nowDate = new Date();
        var nowTime = nowDate.getTime();
        var lastTime = oldDate.getTime();
        var offsetTime = parseInt((nowTime - lastTime) / 1000);
        if (offsetTime < 60) {
            $(this).html(offsetTime + "秒前");
        }
        else if (offsetTime < 3600) {
            var mis = parseInt(offsetTime / 60);
            $(this).html(mis + "分钟前");
        }
        else if (offsetTime < (3600 * 24)) {
            var hour = parseInt(offsetTime / 3600);
            $(this).html(hour + "小时前");
        }
        else if (offsetTime < (3600 * 24 * 7)) {
            var day = parseInt(offsetTime / (3600 * 24));
            $(this).html(day + "天前");
        }
        else {
            $(this).html($(this).attr("format"));
        }
    });
    $(".post-disabled").click(function () {
        alert("你还没有关注该板块，不能发贴");
    });

    $("#post-captcha-image").click(function () {
        $('.captcha-image').click();
    });

    $(document).click(function (evt) {
        if (evt.target.className != "praise-cont praise-vip" && evt.target.className != "view-less") {
            $('.praise .praise-cont').hide();
        }
    });

    $('.publicity').html($.trim($('.publicity').html()).replace(/\n/g, '<br>').replace(/\s/g, '&nbsp;'));
    $(".mod_pub").click(function () {
        var fid = $(this).attr("data-id");
        var obj = $(this).closest('.hd').next('.publicity');
        var tip = "该小组暂无公告";
        var action = "/forum/mod-notice";
        var ajaxed = null;
        if (obj.find('.mod-box').length > 0) {
            return false;
        }
        /* 保存原始的内容 */
        var txt = $.trim(obj.html());
        txt = txt.replace(/<br>/g, '\n').replace(/&nbsp;/g, ' ');
        obj.html('<div class="mod-box">' +
            '<div><textarea type="text" id="input-edit-pub" class="edit-pub" maxlength="100" ></textarea></div>' +
            '<div class="pull-right">0/100</div> ' +
            '<div class="handle">' +
            '<a class="confirm" href="javascript:;">确定</a>' +
            '<a class="cancle" href="javascript:;">取消</a>' +
            '</div></div>');
        var editor = obj.find(".edit-pub");
        editor.val(txt);
        if (txt == tip) editor.val("");
        editor.textFocus();
        ckWordLength($(".mod-box .edit-pub"));
        $(".mod-box .edit-pub").on("keyup", function () {
            ckWordLength($(this));
        });
        $(".mod-box .edit-pub").on("blur", function () {
            ckWordLength($(this));
        });
        txt = txt.replace(/\n/g, '<br>').replace(/\s/g, '&nbsp;');
        //$(document).delegate(".mod-box .confirm","click",function(){
        $(".mod-box .confirm").on("click", function () {
            var val = editor.val();
            if (!fid) {
                obj.html(txt);
                alert("不正当操作！");
                return false;
            }
            if (ajaxed) {
                return false;
            }
            ajaxed = $.post(action, {"_csrf": _csrf, "fid": fid, "val": editor.val()}, function (result) {
                if (result.error) {
                    alert(result.error);
                    editor.focus();
                    return false;
                }
                if (result.content) {
                    var txt2 = result.content.replace(/\n/g, '<br>').replace(/\s/g, '&nbsp;');
                    obj.html(txt2);
                }
                else {
                    obj.html(tip);
                }
            }, "json");
        })
        $(".mod-box .cancle").on("click", function () {
            obj.html(txt);
        })
    });
    var timer = null;
    $("#sq-share-button").hover(function () {
        if (timer) {
            clearTimeout(timer);
        }
        $(".share-hd").show();
    }, function () {
        timer = setTimeout(function () {
            $(".share-hd").hide();
        }, 1000);
    });
    $(".share-hd").hover(function () {
        if (timer) {
            clearTimeout(timer);
        }
        $(".share-hd").show();
    }, function () {
        timer = setTimeout(function () {
            $(".share-hd").hide();
        }, 1000);
    });
    $(document).delegate(".share-info .bdshare_popup_box", "mouseenter", function () {
        if (timer) {
            clearTimeout(timer);
        }
        $(".share-hd").show();
    })
    $(document).delegate(".bdshare_popup_box", "mouseleave", function () {
        timer = setTimeout(function () {
            $(".share-hd").hide();
        }, 100);
    })
    $('.posts-reply').click(function () {
        $('body,html').stop().animate({ scrollTop: $('#sq-release-topic').offset().top - 100}, 400);
    });
    $(".topic-form-subject").keyup(function (e) {
        ckWordLength($(this));
    });
    $(".topic-form-subject").blur(function () {
        ckWordLength($(this));
    });
    $(".check-all input").click(function () {
        $(".tab-content ul li input").prop("checked", $(this).prop("checked"));
    });
    $("#delete-thread").click(function () {
        var checked = false;
        $(".tab-content ul li input").each(function () {
            if ($(this).prop("checked")) {
                checked = true;
            }
        })
        if (checked) {
            if (!confirm("你确定要删除贴子吗？")) {
                return false;
            }
            $("#forum-index").attr("action", $(this).attr("href"));
            $("#forum-index").submit();
        } else {
            alert("你选择要删除的贴子");
        }
        return false;
    });
    function postSubmit(fName) {
        ckWordLength($("form[name='" + fName + "'] input[name='subject']"));
        var subject = $.trim($("form[name='" + fName + "'] input[name='subject']").val());
        var content = $.trim($("form[name='" + fName + "'] textarea[name='content']").val());
        var forumId = $("form[name='" + fName + "'] input[name='forum_id']:checked").val();
        var hasPass = $("form[name='" + fName + "'] input[name='has_pass']:checked").val();
        var password = $.trim($("form[name='" + fName + "'] input[name='password']").val());
        if (subject == "") {
            alert("请输入贴子标题");
            return false;
        }
        if (content.length < 6) {
            alert("贴子内容不能小于6个字符");
            return false;
        }
        if (!(parseInt(forumId) > 0)) {
            alert("请选择要发布到的版块");
            return false;
        }
        if (hasPass == 1 && password == "") {
            alert("指定加密的贴子必须要输入密码");
            return false;
        }
        $(".btn-primary").attr("disabled", "disabled");
        return true;
    }

    function ckWordLength(inputdom) {
        var maxword = parseInt($(inputdom).attr("maxlength"));
        var txt = $(inputdom).val();
//	if(txt.length > maxword){
//		txt = txt.substr(0, maxword);
//		$(inputdom).val(txt);
//	}
        $(inputdom).parent().next().html(txt.length + '/' + maxword);
    }

    function formatFileSize(size) {
        var format;
        if (size < 1024) {
            format = size + 'B';
        }
        else if (size < (1024 * 1024)) {
            format = parseInt((size / 1024)) + 'KB';
        }
        else {
            format = parseInt((size / (1024 * 1024))) + 'M';
        }
        return format;
    }

    function createPageHtml(pageDiv) {
        var pageSize = parseInt(pageDiv.attr("page-size"));
        var pageCount = parseInt(pageDiv.attr("page-count"));
        var currentPage = parseInt(pageDiv.attr("current-page"));
        var postId = pageDiv.attr("post-id");
        var pageUrl = pageDiv.attr("page-url");
        currentPage = currentPage <= 0 ? 1 : currentPage;
        currentPage = currentPage >= pageCount ? pageCount : currentPage;
        if (pageCount > 1) {
            var offset = 3;
            var pageFirst = pagePrev = pageBody = pageNext = pageLast = pageHtml = '';
            var pageStart = pageEnd = 0;
            if (pageCount <= 7) {
                pageStart = 1;
                pageEnd = pageCount;
            }
            else {
                if (currentPage <= 7) {
                    pageStart = 1;
                    pageEnd = pageCount;
                }
                else {
                    if ((currentPage + offset) >= pageCount) {
                        var pageEnd = pageCount;
                        var pageStart = pageEnd - 7;
                    }
                    else {
                        var pageStart = currentPage - offset;
                        var pageEnd = currentPage + offset;
                    }
                }
            }
            if (currentPage > 1) {
                pageFirst = '<a data-index="1" href="javascript:;">首页</a>';
                pagePrev = '<a data-index="' + (currentPage - 1) + '" href="javascript:;">上一页</a>';
            }
            if (currentPage < pageCount) {
                pageNext = '<a data-index="' + (currentPage + 1) + '" href="javascript:;">下一页</a>';
                pageLast = '<a data-index="' + pageCount + '" href="javascript:;">尾页</a>';
            }
            for (var i = pageStart; i <= pageEnd; i++) {
                var active = i == currentPage ? 'active' : '';
                var dataIndex = i == currentPage ? 0 : i;
                pageBody += '<a data-index="' + dataIndex + '" href="javascript:;" class="' + active + '">' + i + '</a>';
            }
            pageHtml = pageFirst + pagePrev + pageBody + pageNext + pageLast;
            pageDiv.html(pageHtml);
            pageDiv.find("a").click(function () {
                var page = $(this).attr("data-index");
                if (page == 0) {
                    return false;
                }
                $.get(pageUrl, {"postId": postId, "page": page, "pagesize": pageSize}, function (html) {
                    var parentDiv = pageDiv.parent().parent().parent();
                    parentDiv.html(html);
                    createPageHtml(parentDiv.find(".comment_page"));
                });
            });
        }
    }

    function attachPopoverHideEvent(id) {
        $('#' + id).on('show.bs.popover', function () {
            setTimeout(function () {
                $('#' + id).popover('hide');
            }, 2000);
        })
    }

    $("#favor-post").click(function () {
        var url = $(this).attr('href');
        var text = $.trim($(this).text());
        var thar = this;
        if (text == '取消收藏' && !confirm('确定要取消收藏!')) {
            return false;
        }
        $.getJSON(url,function () {
            if (text === '收藏') {
                $(thar).text('取消收藏');
            }
            else {
                $(thar).text('收藏');
            }
        }).fail(function (jqxhr, textStatus, error) {
            if (jqxhr.status == 303) {
                window.location.href = jqxhr.responseJSON.message;
            } else {
                alert(jqxhr.responseJSON.message);
            }
        });
        return false;
    });
//移动贴子
    /*$("#moving-thread > a").click(function () {
     var url = $(this).attr('href');
     var thar = this;
     $.getJSON(url,function (data) {
     window.location.href = data.message;
     }).fail(function (jqxhr, textStatus, error) {
     alert(jqxhr.responseJSON.message);
     });
     return false;
     });*/
//置顶贴子
    $("#overhead-thread").click(function () {
        var url = $(this).attr('loc');
        var text = $.trim($(this).html());
        var thar = this;
        if (text == '取消置顶' && !confirm('确定要取消置顶吗?')) {
            return true;
        }
        $.getJSON(url+'&rand='+Math.random(),function (data) {
            if (text === '置&nbsp;&nbsp;顶') {
                $(thar).html('取消置顶');
                $('#notice-thread').html('全站置顶');
                if($('.thread .platact_type .label-top').length == 0) {
                    $('.thread .platact_type').append('<span class="label label-top" title="置顶"></span>');
                    $('.thread .platact_type .label-notice').remove();
                }
            } else {
                $(thar).html('置&nbsp;&nbsp;顶');
                $('.thread .platact_type .label-top').remove();
            }
        }).fail(function (jqxhr, textStatus, error) {
            alert(jqxhr.responseJSON.message);
        });
       // return false;
    });

  //设置贴子公告
    $("#notice-thread").click(function () {
        var url = $(this).attr('loc');
        var text = $.trim($(this).html());
        var thar = this;
        if (text == '取消站顶' && !confirm('确定要取消全站置顶吗？')) {
            return true;
        }
        $.getJSON(url+'&rand='+Math.random(),function (data) {
            if (text === '全站置顶') {
                $(thar).html('取消站顶');
                $("#overhead-thread").html('置&nbsp;&nbsp;顶');
                if($('.thread .platact_type .label-notice').length == 0) {
                    $('.thread .platact_type').append('<span class="label label-notice" title="全站置顶"></span>');
                    $('.thread .platact_type .label-top').remove();
                }
            } else {
                $(thar).html('全站置顶');
                $('.thread .platact_type .label-notice').remove();
            }
        }).fail(function (jqxhr, textStatus, error) {
            alert(jqxhr.responseJSON.message);
        });
       // return false;
    });
//精华贴子
    $("#quality-thread").click(function () {
        var url = $(this).attr('loc');
        var text = $.trim($(this).html());
        var thar = this;
        if (text == '取消精华' && !confirm('确定要取消精华!')) {
            return true;
        }
        $.getJSON(url+'&rand='+Math.random(),function (data) {
            if (text === '精&nbsp;&nbsp;华') {
                $(thar).html('取消精华');
                if($('.thread .platact_type .label-hot').length == 0) {
                    $('.thread .platact_type').append('<span class="label label-hot" title="精华"></span>');
                }
            } else {
                $(thar).html('精&nbsp;&nbsp;华');
                $('.thread .platact_type .label-hot').remove();
            }
        }).fail(function (jqxhr, textStatus, error) {
            alert(jqxhr.responseJSON.message);
        });
       // return false;
    });
 //移动贴子
    $("#move-thread").click(function () {
    	var container =$('.forums-wrapper');
    	if(container.length) {
    	var pop = new xst.popLayer($(container), container.find(".close"));
        pop.showMasker();
    	var liht = $('.forums-wrapper .forum-items').height();
    	$('.forums-wrapper .groups-items').height(liht);
    	$('.forums-wrapper .subforum-items').height(liht);
    	}
    });

    // 点击显示更多回复跟贴
    $(document).on('click', '.btn-comment-expand', function () {
        var item = $(this).parent('li').siblings();
        item.removeClass('hidden');
        item.show();
        $(this).parent().remove();
    });
    // 移动显示回复跟贴操作按钮
    $(document).on('mouseleave', '.comment-ul .comment-reply-item li', function () {
        $(this).find('.reply-reply').hide();
        $(this).find('.delete-comment').hide();
    });
    $(document).on('mouseenter', '.comment-ul .comment-reply-item li', function () {
        $(this).find('.reply-reply').show();
        $(this).find('.delete-comment').show();
    });
    // 点击回复操作
    $(document).on('click', '.comment-reply', function () {
        if (window.notLoginRedirect()) {
            return false;
        }
        var makeComment = $('.make-comments');
        var input = makeComment.find('.post-content');
		var inputX = makeComment.find('.post-input-x');
		var commentId = makeComment.find('.post-comment-id');
        var postId = makeComment.find('.post-id');
        makeComment.find(':input').not('input[name="_csrf"]').val('');
        makeComment.removeAttr('data-title');
        $(this).parents('.cont').children('.comment-act').before(makeComment);
        makeComment.removeClass('hidden');
		inputX.addClass('hidden');
        makeComment.show();
        var dataTiele = $(this).parents('li').attr('data-title');
        makeComment.attr('data-title', dataTiele);
        input.val(dataTiele);
        postId.val($(this).parents('.cont').parent().attr('data-key'));
        // 避免commentId 和 postId 重复
        var commentKey = $(this).parents('li').attr('data-key');
        if (postId.val() != commentKey) {
            commentId.val(commentKey)
        }
        input.textFocus();

		//楼中楼回复操作
		var inputValue = input.val();
		if(!inputValue || inputValue == dataTiele){
			makeComment.find('.form-group').removeClass('has-error').find('.help-block').html('');
		}
		input.unbind('blur');
		$('body').click(function(evt){
			var inputValue = input.val();
			if($(evt.target).attr('class') !='face-item' && (!inputValue || inputValue == dataTiele)){
				makeComment.addClass('hidden');
				if($(evt.target).attr('class') !='iconfont' && $(evt.target).attr('class') != 'form-control comment-input-content post-content') {
					$('.make-comments .xs-faces-layer').hide();
				}
			}
		});
		$(document).on('keyup', '.make-comments .post-content', function(){
			var inputValue = input.val();
			$('.make-comments .form-group').removeClass('has-error').find('.help-block').html('');
			if(inputValue.length > 0 && inputValue != dataTiele){
				inputX.removeClass('hidden');
			}else{
				inputX.addClass('hidden');
			}
		}).on('click', '.make-comments', function(){
			makeComment.removeClass('hidden');
		}).on('click', '.post-input-x', function(e){
			e.preventDefault();
			input.val(dataTiele).focus();
			$(this).addClass('hidden');
			$('.make-comments .form-group').removeClass('has-error').find('.help-block').html('');
		})
    });

    $(document).on('click','.make-comments .iconfont',function(){
    	var wrap = $(this).closest('.form-group');
    	if($('.make-comments .xs-faces-layer').length == 0) {
    		var face_titles = xs_reply_face['titles'];
    		var htm = '<div class="xs-faces-layer toolbar-top"><div class="face-wrap">';
        	if(typeof xs_static == 'undefined') {
        		xs_static = "http://img.xsteach.cn";
        	}
        	var _y =0;
        	var bgimg = xs_reply_face['img'];
        	for(i=0;i<face_titles.length;i++) {
        		var tle = face_titles[i];
        		var nth = (i+1) < 10 ? '0'+(i+1) : (i+1);
        		htm += '<a class="face-item-a" href="javascript:;" nth="'+nth+'"><span class="face-item" style="background-position-y:'+_y+'px" title="'+tle+'"></span></a>';
        		_y -=32;
        	}
        	htm += '<div class="clear"></div></div></div>';
        	wrap.append(htm);
    	} else {
    		$('.make-comments .xs-faces-layer').toggle()
    	}
    });

    $(document).on('click','.make-comments .xs-faces-layer .face-item',function(){
    	var tle = $(this).attr('title');
    	var txt = '[/'+tle+']';
    	$('#post-content').insert(txt);
    	$('.make-comments .xs-faces-layer').hide();
    });

    $(document).on('mouseenter','.make-comments .xs-faces-layer .face-items',function(){
    	var nth = $(this).closest('.face-item-a').attr('nth');
    	var _n =parseInt(nth);
    	var _cls = _n%10 < 6 && _n%10 > 0 ? 'float-r' : '';
    	var tle = $(this).attr('title');
    	var _src = xs_reply_face['url']+xs_reply_face['vers']+'/B_'+nth+'.gif';
    	var _layer = $('.make-comments .xs-faces-layer .face-show-layer');
    	if(_layer.length ==0) {
    		var layer = '<div class="face-show-layer '+_cls+'">';
    		layer += '<img title="'+tle+'" src="'+_src+'"/>';
    		layer +="</div>";
    		$('.make-comments .xs-faces-layer').append(layer);
    	} else {
    		_layer.find('img').attr('src',_src).attr('title',tle);
    		_layer.show();
    		if(_cls) {
    			_layer.addClass('float-r');
    		} else {
    			_layer.removeClass('float-r');
    		}
    	}
    });
    $(document).on('mouseleave','.make-comments .xs-faces-layer .face-items',function(){
    	$('.make-comments .xs-faces-layer .face-show-layer').hide();
    });

    $(document).on('keyup', '.make-comments .post-content', function () {
        var value = $(this).val();
        var result = value.match(/^回复 @.+?：/);
        var makeComment = $(this).parents('.make-comments');
        if ((result && result[0] != $('.make-comments').attr('data-title')) || (result == null && $('.make-comments').attr('data-title'))) {
            makeComment.find('.post-comment-id').val('');
            makeComment.removeAttr('data-title');
        }
    })
    // 评论分页操作
    $(document).on('click', '.comment-reply-item .comment_page a', function () {
        var href = $(this).attr('href');
        var container = $(this).parents('.comment-reply-item').parent();
        $.get(href, function (data) {
            if (data) {
                $(container).children('.comment-reply-item').remove();
                $(container).children('.make-comments').addClass('hidden');
                $(container).children('.comment-text').after(data);
                var pos_obj = $(container).children('.comment-reply-item');
                if(pos_obj.length > 0) {
                    $('body,html').stop().animate({ 'scrollTop': pos_obj.offset().top-10}, 10);
                }
            }
        }).fail(function (jqxhr, textStatus, error) {
            alert(jqxhr.responseJSON.message);
        });
        return false;
    });
    $('#post-content').focus(function(){
    	if(document.selection){
        	$(this).textFocus();
    	}
    });
    // 评论提交操作
    $('.make-comments form .posts-comment-btn').click(function(){
    	var elem = $(this).closest('form');
    	var inval = $.trim($(elem).find('.comment-input-content').val());
    	var toTa = $(this).closest('.make-comments').attr('data-title');
    	if(!inval || (toTa && inval == toTa)) {
    		$(elem).find('.form-group').removeClass('has-success').addClass('has-error');
    		$(elem).find('.help-block').html('请填写内容');
    		return false;
    	}
    	var reply = $('#post-content').val();
    	reply = reply.replace(/\[\/[^\]]*\]/g,function(mth){
    		var t = mth.match(/\[\/([^\]]*)\]/)[1];
    		var pos = $.inArray(t,xs_reply_face['titles']);
    		if(pos>=0) {
    		    var _pos = (pos+1) < 10 ? '0'+(pos+1) : (pos+1);
        		return '<img src="'+xs_reply_face['url']+xs_reply_face['vers']+'/B_'+_pos+'.gif" class="xs-face-img" title="'+t+'">';
    		} else {
        		return mth;
    		}
    	});
    	var data = {
    			'Post[post_id]':$('#post-post_id').val(),
    			'Post[comment_id]':$('#post-comment_id').val(),
    			'Post[content]':reply
    	}
        $(elem).children('button:submit').attr('disabled', true);
        $(elem).find('.form-group').removeClass('has-error');
        $.ajax({
            url     : $(elem).prop('action'),
            type    : $(elem).prop('method'),
            data    : data,
            dataType: 'json',
            success : function (data) {
            	data = $(data);
            	wrapAtWithLink(data);
                $(elem).parent().hide();
                $(elem).find(':input').not('input[name="_csrf"]').val('');
                $(elem).children('button:submit').removeAttr('disabled');
                var container = $(elem).parents('.cont');
                var childContainer = container.children('.comment-reply-item');
                if (childContainer.length) {
                    var pageElem = childContainer.find('ul .comment_page');
                    if (pageElem.length) {
                        pageElem.before(data);
                        return true;
                    }
                    var moreElem = childContainer.find('ul .view-more');
                    if (moreElem.length) {
                        moreElem.before(data);
                        return true;
                    }
                    childContainer.find('ul').append(data);
                } else {
                    container.children('.comment-text').after(data);
                    $(data).wrap('<div class="comment-reply-ctn comment-reply-item"><ul></ul></div>');
                }
            },
            error   : function (data) {
                $(elem).children('button:submit').removeAttr('disabled');
            }
        }).fail(function (jqxhr, textStatus, error) {
            alert(jqxhr.responseJSON.message);
        });;
        return false;
    });

    // 发表主题
    $(document).on("click", ".newtopic,.edit-topic", function () {
        if (window.notLoginRedirect()) {
            return false;
        }
        var container = $(this).is('.newtopic') ? $(this).parent().children(".sq-release-topic") : $(this).closest('.dropdown').find(".sq-release-topic");
        if (container.length < 1) {
            return false;
        }
        $('html').addClass('x-noscroll');
        var pop = new xst.popLayer($(container), container.find(".close"), true, function () {
            container.hide();
            $('html').removeClass('x-noscroll');
            typeof(adjustfooter)=="function" && adjustfooter();
        });
        pop.showMasker();
	});
    // 隐藏主题
    $(document).on("click", ".hidden-thread", function () {
        if (window.notLoginRedirect()) {
            return false;
        }
        _this = this;
        var _url = $(this).attr('locate');
        $.get(_url+'&rand='+Math.random(),function (data) {
        	if(data == '0') {
        		$(_this).html('隐藏贴子');
        	} else {
        		$(_this).html('显示贴子');
        	}
        });
    });

    // 点击回复
    $(".sq-reply,.sq-reply2").click(function () {
        $('body,html').stop().animate({ 'scrollTop': $("#sq-reply-topic").offset().top}, 800);
        return false;
    });
    var supports_ajax = null;
    // 点赞/踩操作
    $('.thread-support .updown-cancel').click(function () {
        var elem = $(this);
        var hint = elem.parents('.support').find('.praise-cont');
        hint.hide();
        if (elem.attr('data-disabled')) {
            return false;
        }
        if(supports_ajax) return false;
        supports_ajax = $.get($(this).attr('href')+'&rand='+Math.random(),function (data) {
            supports_ajax = null;
            var oldNumber = parseInt(elem.children('span').text());
            var oldText = elem.children('i').eq(1).text();
            var sideElem = elem.closest('.praise').next('.praise').length > 0 ? elem.closest('.praise').next('.praise') : elem.closest('.praise').prev('.praise');
            var text = '';
            var number = 0;
            switch (oldText) {
                case '赞' :
                    text = '已赞';
                    number = oldNumber + 1;
                    break;
                case '踩' :
                    text = '已踩';
                    number = oldNumber + 1;
                    break;
                case '已赞' :
                    text = '赞';
                    number = oldNumber - 1;
                    break;
                case '已踩' :
                    text = '踩';
                    number = oldNumber - 1;
                    break;
            }
            if (text.length > 1) {
            	sideElem.find('.updown-cancel').addClass('disabled');
            	sideElem.find('.updown-cancel').attr('data-disabled', true)
            } else {
            	sideElem.find('.updown-cancel').removeClass('disabled');
            	sideElem.find('.updown-cancel').removeAttr('data-disabled');
            }
            elem.children('i').eq(1).text(text);
            elem.children('span').text(number);
            window.showPraisePageHtml();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            supports_ajax = null;
            var message = '服务器提出了一个问题';
            if (jqXHR.status < 500) {
                message = jqXHR.responseJSON ? jqXHR.responseJSON.message : message;
            }
            hint.html(message);
            elem.parent().append(hint);
            hint.show();
        });
        return false;
    });
    $('.thread-support .updown-cancel').mouseenter(function () {
        var elem = $(this);
        var oldText = elem.children('i').eq(1).text();
        var message = '';
        if(oldText == '已赞' || oldText == '已踩') {
        	switch (oldText) {
            case '已赞' :
                message = '点击取消赞';
                break;
            case '已踩' :
                message = '点击取消踩';
                break;
        	}
        } else {
        	var sideElem = elem.closest('.praise').next('.praise').length > 0 ? elem.closest('.praise').next('.praise') : elem.closest('.praise').prev('.praise');
        	var sideTxt = sideElem.find('i').eq(1).text();
        	switch (sideTxt) {
            case '已赞' :
                message = '你已点赞，请先取消赞';
                break;
            case '已踩' :
                message = '你已点踩，请先取消踩';
                break;
        	}
        }

        if (message.length > 0) {
            var hint = elem.parents('.support').find('.praise-cont');
            hint.text(message);
            elem.parent().append(hint);
            hint.show();
        }
    });
    var comment_ajax = null;
    // 点赞/踩操作
    $('.comment-support .updown-btn').click(function () {
        var elem = $(this);
        var sideElem = elem.closest('.praise').next('.praise').length > 0 ? elem.closest('.praise').next('.praise') : elem.closest('.praise').prev('.praise');
    	var hint = elem.parents('.comment-support').find('.praise-cont');
        hint.hide();
        if (elem.attr('data-disabled')) {
            return false;
        }
        if(comment_ajax) return false;
        comment_ajax = $.get($(this).attr('href')+'&rand='+Math.random(),function (data) {
            comment_ajax = null;
            var oldNumber = parseInt(elem.children('.scnt').text());
            var oldText = elem.children('i').text();
            var text = '';
            var number = 0;
            switch (oldText) {
                case '赞' :
                    text = '已赞';
                    number = oldNumber + 1;
                    break;
                case '踩' :
                    text = '已踩';
                    number = oldNumber + 1;
                    break;
                case '已赞' :
                    text = '赞';
                    number = oldNumber - 1;
                    break;
                case '已踩' :
                    text = '踩';
                    number = oldNumber - 1;
                    break;
            }
            if (text.length > 1) {
            	sideElem.find('.updown-btn').addClass('disabled');
            	sideElem.find('.updown-btn').attr('data-disabled', true)
            } else {
            	sideElem.find('.updown-btn').removeClass('disabled');
            	sideElem.find('.updown-btn').removeAttr('data-disabled');
            }
            elem.children('i').text(text);
            elem.children('.scnt').text(number);
//            window.showPraisePageHtml();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            comment_ajax = null;
            var message = '服务器提出了一个问题';
            if (jqXHR.status < 500) {
                message = jqXHR.responseJSON ? jqXHR.responseJSON.message : message;
            }
            hint.html(message);
            elem.parent().append(hint);
            hint.show();
        });
        return false;
    });
    $('.comment-support .updown-btn').mouseenter(function () {
    	$('.praise .praise-cont').hide();
    	clearTimeout(hint_timer);
        var elem = $(this);
        var oldText = elem.children('i').text();
        var message = '';
        if(oldText == '已赞' || oldText == '已踩') {
        	switch (oldText) {
            case '已赞' :
                message = '点击取消赞';
                break;
            case '已踩' :
                message = '点击取消踩';
                break;
        	}
        } else {
        	var sideElem = elem.closest('.praise').next('.praise').length > 0 ? elem.closest('.praise').next('.praise') : elem.closest('.praise').prev('.praise');
        	var sideTxt = sideElem.find('i').text();
        	switch (sideTxt) {
            case '已赞' :
                message = '你已点赞，请先取消赞';
                break;
            case '已踩' :
                message = '你已点踩，请先取消踩';
                break;
        	}
        }
        if (message.length > 0) {
            var hint = elem.parents('.comment-support').find('.praise-cont');
            hint.text(message);
            elem.parent().append(hint);
            hint.show();
        }
    });

    $('.comment-support .updown-btn').mouseleave(function () {
        var hint = $(this).parents('.comment-support').find('.praise-cont');
        if (hint.is(':visible')) {
        	clearTimeout(hint_timer);
        	hint_timer = setTimeout(function(){hint.hide();},'800');
        }
    });

    $('.comment-ul .comment-act .praise-cont').hover(function(){
    	clearTimeout(hint_timer);
    },function(){
    	clearTimeout(hint_timer);
    	var _this = $(this);
    	hint_timer = setTimeout(function(){_this.hide();},'800');
    });
    //查看回复跳转定位
    var loc_id=parseInt(getQueryString('cid'));
    var loc_pos = $('.comment-ul li[data-key='+loc_id+']');
    if(loc_id > 0) {
    	if(loc_pos.length > 0) {
    		$('body,html').animate({ scrollTop: loc_pos.offset().top - 90}, 800,function(){
    			loc_pos.add(loc_pos.find('.comment-reply-ctn')).effect('highlight',{duration:1000});
            });
    	}
    }
    // 批量删除
    $('#thread-delete-all').click(function(){
        if (confirm('确定删除选择贴子！')) {
            $(this).parents('form').submit();
        }

        return true;
    });

    //防止重复提交表单
    $(".xs-form-class").on("beforeSubmit", function() {
    	var tjz = '提交中...';
    	$(".btn-primary",this).text(tjz).attr('disabled',true);
    	return true;
    });
});
function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);
	if (r != null) return unescape(r[2]); return null;
};

$(function(){
	 if($(".aside .sq-release-topic").length) {
        var bDrag = false;
        var _x,_y;
        var $box=$(".aside .sq-release-topic")
        var aPos = [{
                x: $(".aside .sq-release-topic").offset().left,
                y: $(".aside .sq-release-topic").offset().top
        }];
        $(".aside .sq-release-topic .modal-header:first").mousedown(function(event){
                var e=event || window.event;
                bDrag = true;
                _x=e.pageX-$box.position().left;
                _y=e.pageY-$box.position().top;
                return true;
        })

        $(document).mousemove(function(event){
                if(!bDrag) return true;
                var e=event || window.event;
                //e.preventDefault();
                var x=e.pageX-_x;
                var y=e.pageY-_y;
                var maxL = $(document).width() - $box.outerWidth();
                var maxT = $(document).height() - $box.outerHeight();
                x = x < 0 ? 0: x;
                x = x > maxL ? maxL: x;
                y = y < 0 ? 0: y;
                y = y > maxT ? maxT: y;
                $box.css({left:x,top:y});
                aPos.push({
                x: x,
                y: y
        });
                return true;
        }).mouseup(function(){
                bDrag = false;
                return true;
        })
	 }
});

$(function(){
	  if($("#comment-frame .sq-release-topic").length) {
	        var bDrag = false;
	        var _x,_y;
	        var $box=$("#comment-frame .sq-release-topic")
	        var aPos = [{
	                x: $("#comment-frame .sq-release-topic").offset().left,
	                y: $("#comment-frame .sq-release-topic").offset().top
	        }];
	        $("#comment-frame .sq-release-topic .modal-header:first").mousedown(function(event){
	                var e=event || window.event;
	                bDrag = true;
	                _x=e.pageX-$box.position().left;
	                _y=e.pageY-$box.position().top;
	                return true;
	        })

	        $(document).mousemove(function(event){
	                if(!bDrag) return true;
	                var e=event || window.event;
	                //e.preventDefault();
	                var x=e.pageX-_x;
	                var y=e.pageY-_y;
	                var maxL = $(document).width() - $box.outerWidth();
	                var maxT = $(document).height() - $box.outerHeight();
	                x = x < 0 ? 0: x;
	                x = x > maxL ? maxL: x;
	                y = y < 0 ? 0: y;
	                y = y > maxT ? maxT: y;
	                $box.css({left:x,top:y});
	                aPos.push({
	                x: x,
	                y: y
	        });
	                return true;
	        }).mouseup(function(){
	                bDrag = false;
	                return true
	        })
	  }
})

$(function(){
	if(typeof PopUserCard != 'undefined'){
		var popUserCard = new PopUserCard({});
		popUserCard.bindEnter({query : '.user-avatar-home img', effect : 'zoom'}).bindEnter({query : '.user-avatar-card-img', effect : 'top', rank : 1});
	}

});
$('.sq-release-topic .close').on('click', function(event) {
   if (window.confirm('确认关闭窗口')) {
       return true;
   } else {
       event.stopImmediatePropagation();
       return false;
   }

});