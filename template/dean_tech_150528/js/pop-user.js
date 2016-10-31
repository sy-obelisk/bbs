$(function(){
    if(typeof xs_www == 'undefined') {
        xs_www = 'http://www.xsteach.com';
    }
    if(PopUserChat){
		popUserChat = new PopUserChat({www : xs_www});
	}
	if(InputCount){
		var inputConf = {input : '#chat_form .input-text', send : '#chat_form .btn-send', tips : '#chat_form .input-tips', maxLength : 200, func : 'limit'};
		new InputCount(inputConf);
	}
});

//弹层发送私信
function PopUserChat(o){
	//this.target = o.target || $('.xs-chat');
	this.www = o.www || 'http://www.xsteach.com';
	this.ajaxUrl = o.ajaxUrl || '/message/person/pop-chat';
	this.countdown = o.countdown || 3;
	this.si; //setInterval;
	this.init().bind();
}

PopUserChat.prototype.init = function(){
	return this;
};

PopUserChat.prototype.bind = function(){
	var that = this;
	//Ctrl+Enter提交表单
	$(document).keydown(function(e){
		if(that.$popChat && e.ctrlKey && e.which == 13){
			that.$popChat.find('.btn-send').click();
			that.$popChat.find('.send-tips').text('');
		}	
	});
};
PopUserChat.prototype.newWin = function(href){
    var $newer = $('#xs-new-win');
    if($newer.length) {
        $newer.attr('href',href);
    } else {
        $newer = $('<a id="xs-new-win" style="display:none" target="_blank"></a>');
        $('body').append($newer);
    }
    $newer[0].click();
};
PopUserChat.prototype.bindClick = function($btn){
	var that = this;
	$btn.click(function(){
        if(window.notLoginRedirect()) {
            return false;
        }
		//clearInterval(that.si);
		//that.create($btn).bindSend().bindClose();;
	});
};

PopUserChat.prototype.bindSend = function(){
	var that = this;
	
	that.$popChat.find('.btn-send').click(function(){
        if(window.notLoginRedirect()) {
            return false;
        }
		var $this = $(this), $wrap = that.$popChat, submiting = false, 
			$input = $wrap.find('.input-text'),
			$sendTips = $wrap.find('.send-tips'), 
			content = $.trim($input.val());
		if($this.hasClass('btn-disabled')){
			return false;
		}
        if(!that.uid) {
            $sendTips.text('私信对象不能为空！');
            $input.focus();
            return false;
        }
        if(!content) {
            $sendTips.text('私聊内容不能为空！');
            $input.focus();
            return false;
        }
		if(submiting) return false;
		submiting = true;
		$this.addClass('btn-disabled').html('发送中...');
        $.ajax({
            url     : that.ajaxUrl,
            async   : true,
            type    : "post",
            data    : {'rid' : that.uid, 'content' : content},
            cache : false,
            dataType: "json",
            success : function (res) {
                submiting =  false;
                if(res.status == '0') {
                    $wrap.attr('data-uid', -1).find('.bd').html('<div class="center"><p class="success"><i></i>发送成功（<span class="countdown">' + that.countdown +'</span>）</p></div>')
					that.autoClose();
                } else {
                    $sendTips.text(res.content);
					$this.removeClass('btn-disabled').text('发送');
                }
            },
            error : function(xhr, status){
                submiting =  false;
                if(xhr.status == 403) {
                    $sendTips.text(xhr.responseJSON.message);
					$this.removeClass('btn-disabled').text('发送');
                }
                xhr = null;
            }
        });
	});
	return this;
};

PopUserChat.prototype.create = function($btn){
	this.uid =  $btn.attr('data-rid');
	var $pop = $('#pop_chat'), name = $btn.attr('data-name'), 
		homeUrl = this.www + '/home/' + this.uid, 
		chatUrl = this.www + '/user/message/chat?rid=' + this.uid;
	var html = '<div class="wrap">' + 
		'<div class="hd"><h2>发送给 ' + name + '</h2><a class="btn-close" href="javascript:;" title="关闭">X</a></div>' + 
		'<div class="bd"><div id="chat_form" class="chat-wrap"><div class="input">' + 
		'<textarea class="input-text" placeholder="和TA说点什么···"></textarea></div>' + 
		'<div class="tips"><p class="send-tips"></p><p class="input-tips">还可以输入<span>200</span>字</p></div>' + 
		'<div class="do"><a class="home" href="' + homeUrl + '" target="_blank" title="查看TA的主页">查看TA的主页</a><a class="record" href="' + chatUrl + '" target="_blank" title="查看私信记录">查看私信记录</a><a class="btn-send btn-disabled" href="javascript:;">发送</a></div>' + 
		'</div></div></div>' + 
		'<div class="pop-layer"></div>';
	if($pop.length > 0){
		if($pop.attr('data-uid') != this.uid){
			$pop.html(html).attr('data-uid', this.uid);		
		}
		$pop.removeClass('hide');
	}else{
		$pop = $('<div id="pop_chat" data-uid="' + this.uid + '">' + html + '</div>');
		$('body').append($pop);
	}
	$pop.find('.input-text').focus();
	if(!this.$popChat){
		this.$popChat = $pop;
	}
	return this;
};

//关闭弹层
PopUserChat.prototype.bindClose = function(target){
	var that = this, className = target ? (target + ', .btn-close') : '.btn-close';
	this.$popChat.find(className).click(function(e){
		e.preventDefault();
		that.$popChat.addClass('hide');
	});
	return this;
};

//自动关闭弹层
PopUserChat.prototype.autoClose = function(){
	var that = this, $cd = this.$popChat.find('.countdown'), countdown = this.countdown;
	//countdown--;
	this.si = setInterval(function(){
		countdown--;
		if(countdown > 0){
			$cd.text(countdown);
		}else{
			clearInterval(that.si);
			that.$popChat.addClass('hide');
		}
	}, 1000);
};

//弹出用户名片
function PopUserCard(o){
	this.bbsUrl = o.bbsUrl || 'http://bbs.xsteach.com';
	this.imgUrl = o.imgUrl || 'http://img.xsteach.cn';
	this.loadingUrl = o.loadingUrl || this.imgUrl + '/static/images/loading_circle.gif';
	this.ajaxUrl = this.bbsUrl + '/default/get-user-card';
	this.btnChatClass = o.btnChatClass || '.xs-exchanger-chat-over';
	this.data = [];
}

PopUserCard.prototype.bindEnter = function(o){
	var that = this;
	$(document).on('mouseenter', o.query, function(e){
		that.rank = o.rank || 0;
		that.display($(this), o.effect);
	});
	return this;
};

PopUserCard.prototype.display = function(t, type){
	var parentClass = t.hasClass('adminer') ? 'li' : '.avatar';
	var $wrap = t.closest(parentClass);
	var $popWrap = $wrap.find('.avatar-wrap');
	if($popWrap.length == 0){
		$popWrap = this.append(t, $wrap);
	}

	if(type == 'zoom'){
		this.displayZoom(t, $popWrap);		
	}else if(type == 'top'){
		this.displayTop(t, $popWrap);
	}
};

PopUserCard.prototype.displayZoom = function(t, $popWrap){
	var timer;
	$popWrap.show(300);
	$popWrap.mouseenter(function(){
		clearTimeout(timer);
	}).mouseleave(function(){
		$(this).hide(300);
	});
	t.mouseleave(function(){
		timer = setTimeout(function(){
			$popWrap.hide(300);		
		}, 100);
	}).mouseenter(function(){
		clearTimeout(timer);
	});
};

PopUserCard.prototype.displayTop = function(t, $popWrap){
	var timer, p = t.parent();
	$popWrap.fadeIn();
	p.addClass('toolbar-bottom');
	t.mouseleave(function(){
		timer = setTimeout(function(){
			$popWrap.fadeOut();		
			p.removeClass('toolbar-bottom');
		}, 100);
	}).mouseenter(function(){
		clearTimeout(timer);
	});
	$popWrap.mouseenter(function(){
		clearTimeout(timer);
	}).mouseleave(function(){
		timer = setTimeout(function(){
			$popWrap.fadeOut();		
			p.removeClass('toolbar-bottom');
		}, 100);
	});
};

PopUserCard.prototype.append = function(t, $wrap){
	var uid = t.attr('uid'),
		name = t.attr('title'),
		src = t.attr('src'),
		href = t.closest('a').attr('href'),
		top50 = '',
		$role = $wrap.find('i');
    var chatUrl = xs_www + '/user/message/chat?rid=' + uid;
    chatUrl = 'javascript:;';
		if(!this.rank){
			var className = $role.attr('class').replace('sm-level','md-level'),
				roleName = $role.attr('title'),
				roleHtml = '<i class="' + className + '" title="' + roleName + '"></i>';
		}else{
			var roleHtml = '';
		}
		if(t.hasClass('adminer')){
			var index = t.closest('li').index();
			if(index > 2){
				top50 = ' top50';
			}
            if($wrap.closest('li').find('.icon-crown').length) {
                roleHtml += '<i title="SVIP" class="icon-crown"></i>';
            }
		} else {
            if($wrap.find('.icon-crown').length) {
                roleHtml += '<i title="SVIP" class="icon-crown"></i>';
            }
        }
    var alone = xst.user.info.userId != uid ? '' : '';
    var chatStr = xst.user.info.userId != uid ? '<a class="btn btn-success xs-exchanger-chat" data-rid="'+uid+'" data-name="'+name+'" href="'+chatUrl+'"><i class="iconfont">&#xe632;</i>聊天</a>': '<a class="btn btn-success to-home" href="' + href + '" target="_blank"><i class="iconfont">&#xe640;</i>个人主页</a>';
    var actions = chatStr ? '<div class="about">' + chatStr + '</div>' : '';
	var	avatarHtml = '<div class="avatar"><a class="home-to" href = "'+ href +'" target="_blank"><img src="' + src +
		' "alt="' + name + '" /> ' + roleHtml + '</a></div>',
		introHtml = '<div class="intro '+ alone +'"><div class="name"><a href="' + href + '" target="_blank">' + name + '</a></div><div class="identity"><i class="icon-identity"></i></div>'+ actions +'</div>',
		actHtml = '<div class="avatar-act"><div class="loading"><img src="' + this.loadingUrl + '" alt="加载中..." /></div>',
		cardHtml = '<div class="avatar-wrap' + top50 + '"><div class="avatar-info">' + avatarHtml + introHtml + '</div>' + actHtml + '</div>';	
	var	$popWrap = $(cardHtml);
	$wrap.append($popWrap);
	
	this.bindPopChat($popWrap, this.btnChatClass);  //绑定私信弹窗
	
	this.getData(uid, $popWrap);
	return $popWrap;
};

PopUserCard.prototype.getData = function(uid, $popWrap){
	var that = this, ret, rank = this.rank;
	var oData = rank ? {'uid' : uid, 'needrole' : 1} : {'uid' : uid};
	var uData = this.data[uid];
	if(uData && (!rank || uData['hasRank'])){
		that.insertData(uData, rank, $popWrap);
	}else{	
		$.ajax({
			url : that.ajaxUrl,
			data : oData,
			type : 'get',
			dataType : 'jsonp',
			success : function(data){
				if(data){
					that.insertData(data, rank, $popWrap);
					if(rank){
						data['hasRank'] = 1;
					}
					that.data[uid] = data;
				}
			}
		});
	}
};

PopUserCard.prototype.insertData = function(data, rank, $popWrap){
	var ulHtml = "<ul><li>发贴<span>" + data['postCount'] + "</span></li><li>帅气值<span>" + data['handsome'] + "</span></li><li>被赞<span>" +data['up'] + "</span></li></ul>";
	$popWrap.find('.icon-identity').addClass('identity-' + data['rank']);
	$popWrap.find('.avatar-act').html(ulHtml);
	var rankHtml = data['userRole'];
    var follow = '';
    if(data['follow'] == 'canceled' || data['follow'] == 'attention' ) {
        follow = '<a class="btn btn-primary xs-follow-user" data-fid="' + data['uid'] + '" href="javascript:;"><i class="iconfont">&#xe65b;</i>加关注</a>';
    } else if(data['follow'] == 'followed') {
        follow = '<a class="btn xs-follow-user followed" data-fid="' + data['uid'] + '" href="javascript:;"><i class="iconfont">&#xe622;</i>已关注</a>';
    } else if(data['follow'] == 'friend') {
        follow = '<a class="btn friend xs-follow-user" data-fid="' + data['uid'] + '" href="javascript:;"><i class="iconfont">&#xe653;</i>互相关注</a>';
    }
    $popWrap.find('.xs-exchanger-chat').length && $popWrap.find('.xs-exchanger-chat').before(follow);
	if(rank && typeof rankHtml == 'string'){
		$popWrap.find('.avatar').append($(rankHtml));
	}
    if(data['yearSigned']){
        $popWrap.find('.identity').append($('<a href="http://bbs.xsteach.com/forum/topic?tid=24788" target="_blank"><i class="icon-sheep" title="羊羊签到徽章"></i></a>'));
    }
};

PopUserCard.prototype.bindPopChat = function($pop, className){
	var $btnChat = $pop.find(className);
	if($btnChat.length > 0){
        if(typeof popUserChat == 'undefined') {
            if(PopUserChat){
                popUserChat = new PopUserChat({www : xs_www});
            }
        }
        popUserChat && popUserChat.bindClick($btnChat);
	}
};