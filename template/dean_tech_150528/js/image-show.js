$(function(){
	var imgListClass = '.xs-imgs', regEx = /xfImage=(yes|all|.{35})/;
	var res = window.location.href.match(regEx);

	//社区首页和列表页图片延迟加载
	$('.xs-imgs .x-item').scrollLoading();
	
	//显示指定图片秀
	if(res){
		var imgName = res[1];
		showXfImage(imgName, imgListClass);
	};
	//点击帖子页正文或回复中的图片
	$(document).on('click', '#comment-frame .comment-article img, #comment-frame .comment-ul .comment-text img', function(){
		var imgName = xst.getImgName($(this).attr('src'));
		showXfImage(imgName, imgListClass);
	});
	
	//直播页图片秀
	$(document).on('click', '#live_imgs .x-item', function(){
		var $this = $(this), $imgs = $('#live_imgs .x-item'), len = $imgs.length, 
			imgUrl = '', urlArr = [], imgBigUrl = '', urlBigArr = [];
		for(var i = 0; i < len; i++){
			imgUrl = $($imgs[i]).attr('src');
			imgBigUrl = $($imgs[i]).attr('data-url');
			//if(typeof imgUrl == 'string' && regEx.test(imgUrl)){
			if(typeof imgUrl == 'string' && typeof imgBigUrl == 'string'){
				urlArr.push(imgUrl);
				urlBigArr.push(imgBigUrl);
			}
		}
		//var imgs = urlArr.split(',');
		if(typeof urlArr == 'object' && urlArr.length > 0 && urlArr[0]){
			var imgName = $this.attr('src').substr(-13);
			createXfImage(urlArr, imgName, makeLiveList, urlBigArr);
		}
	});
	
	//聊天图片秀
	$(document).on('click', '.users-chat-wp .x-item', function(){
		var $this = $(this), $imgs = $('.users-chat-wp .x-item'), len = $imgs.length, 
			regEx = /^[http|https].+xsteach\-edu/, imgUrl = '', urlArr = [];
		for(var i = 0; i < len; i++){
			imgUrl = $($imgs[i]).attr('src');
			//if(typeof imgUrl == 'string' && regEx.test(imgUrl)){
			if(typeof imgUrl == 'string'){
				urlArr.push(imgUrl);
			}
		}
		//var imgs = urlArr.split(',');
		if(typeof urlArr == 'object' && urlArr.length > 0 && urlArr[0]){
			var imgName = $this.attr('src');
			createXfImage(urlArr, imgName, makeList);
		}
	});

	//点击帖子列表图片项
	$(document).on('click', imgListClass + ' .x-item', function(){
		var $this = $(this), $wrap = $this.parent().parent(), $xsImage = $('.xs-image'),
			imgStr = $wrap.attr('data-imgs'),
			imgSrc = $.trim($this.attr('src')),
			imgName = xst.getImgName(imgSrc);
		if(typeof imgStr != 'string'){
			//debug('指定元素未定义属性data-imgs');
			return false;
		}
		imgs = imgStr.split(',');
		$xsImage.parent().find(imgListClass).removeClass('x-hide');
		$xsImage.remove();
		if(typeof imgs == 'object' && imgs.length > 0){
			createXsImage(imgs, imgName, $wrap);
		}
	});	
	//指定图片加载完成添加类loaded
	$(imgListClass + ' .x-item').load(function(){
		$(this).parent().addClass('loaded');
	});
	
	function showXfImage(imgName, imgListClass){
		var urlArr = [], $imgList = $(imgListClass), 
			len = $imgList.length;
		for(var i = 0; i < len; i++){
			var dataImgs = $($imgList[i]).attr('data-imgs');
			if(typeof dataImgs == 'string'){
				if(imgName.length == 35){
					if(dataImgs.indexOf(imgName) != -1){
						urlArr.push(dataImgs);
						break;
					}
				}else if(imgName == 'yes'){
					urlArr.push(dataImgs);
					break;
				}else if(imgName == 'all'){
					urlArr.push(dataImgs);
				}
			}
		}
		var imgs = urlArr.join(',').split(',');
		if(typeof imgs == 'object' && imgs.length > 0 && imgs[0]){
			createXfImage(imgs, imgName);
		}
	}
	
	//创建帖子列表图片秀
	function createXsImage(imgs, imgName, $imgList){
		if(typeof XsImage == 'undefined'){
			//debug('XsImage类未定义！');
			return false;
		}
		var xsImage = new XsImage({
			imgs : imgs, 
			imgName : imgName,
			$imgList : $imgList
		});
		$imgList.addClass('x-hide').parent().append(xsImage.$wrap);
		xsImage.$wrap.find('.x-zoom').click(function(){
			var imgName = xst.getImgName(xsImage.$wrap.find('.x-show').attr('src'));
			createXfImage(imgs, imgName);
		});
	}
	
	//创建查看大图图片秀
	function createXfImage(imgs, imgName, makeListFunc, imgsBig){
		if(typeof XfImage == 'undefined'){
			//debug('XfImage类未定义！');
			return false;
		}
		var o = {
			imgs : imgs, 
			imgName : imgName
		};
		if(imgsBig){
			o.imgsBig = imgsBig;
		}
		debug(o.imgsBig);
		if(makeListFunc){
			o.makeListFunc = makeListFunc;
		}
		var xfImage = new XfImage(o);
		$('body').append(xfImage.$wrap);
		$('html').addClass('x-noscroll');
	}
	
	//聊天图片秀列表生成
	function makeList(){
		var imgs = this.imgs, len = imgs.length, ret = '', imgUrl = '', ifGif = '';
		//debug(len);
		for(var i = 0; i < len; i++){
			ifGif = '';
			imgUrl = imgs[i];
			if(imgUrl.match(/\.(gif)+/)){
				ifGif = '<i></i>';
			}
			ret += '<li><a class="item" data-url="' + imgUrl + '" href="javascript:;" style="background:url(' + imgUrl + ')" />' + ifGif + '</a></li>';
		}
		//debug(ret);
		return ret;
	}
	
	//直播页图片秀列表生成
	function makeLiveList(){
		var imgs = this.imgs, imgsBig = this.imgsBig, len = imgs.length, ret = '', imgUrl = '', imgBigUrl = '', ifGif = '';
		debug(imgs);
		for(var i = 0; i < len; i++){
			ifGif = '';
			imgUrl = imgs[i];
			imgBigUrl = imgsBig[i];
			if(imgUrl.match(/\.(gif)+/)){
				ifGif = '<i></i>';
			}
			ret += '<li><a class="item" data-url="' + imgBigUrl + '" href="javascript:;" style="background:url(' + imgUrl + ')" />' + ifGif + '</a></li>';
		}
		//debug(ret);
		return ret;
	}
});

function XsImage(o){
	this.wrapClass = o.wrapClass || 'xs-image';
	this.$wrap;
	this.imgs = o.imgs;
	this.imgName = o.imgName;
	this.$imgList = o.$imgList || false;
	this.imgIndex = 0;  //默认显示第一张图片
	this.imgSize = 	o.imgSize || ['@100h_0e_1c_1l_90Q_1x.', '@750w_550h_0e_1c_1l_90Q_1x.'];
	this.imgHolder = o.imgHolder || 'http://img.xsteach.cn/static/images/common/loading24x24.gif';
	this.eggs = o.eggs || 1;
	this.makeListFunc = o.makeListFunc || null;
	this.btns = o.btns || [
		['close', '收起', '&#xe61b;'],
		['zoom', '查看大图', '&#xe66a;'],
		['rotate', '旋转', '&#xe612;']
	];
	
	this.init(o);
}

XsImage.prototype.init = function(){
	var that = this;
	
	this.makeHtml();
	var $wrap = this.$wrap;
	
	if(this.eggs){
		this.pageUrl = location.href;
	}
	
	var si = setInterval(function(){
		if(that.$wrap.find('.x-show').length > 0){
			clearInterval(si);
			var $list = that.$list = $wrap.find('.x-list').eq(0);
			that.$lis = $list.find('li');
			
			if(typeof that.imgName == 'string'){
				that.getIndex();
			}
			that.bind().createRotate().createSlide().$lis.eq(that.imgIndex).click();
		}
	}, 10);

	return this;
};

XsImage.prototype.bind = function(){
	var that = this, $wrap = this.$wrap, $origin = $wrap.find('.x-origin');
	
	//点击收起 或 显示的图片
	$wrap.find('.x-close, .x-show').click(function(){
		$wrap.remove();
		if(that.$imgList){
			that.$imgList.removeClass('x-hide');
		}
	});
	
	//点击缩列图列表项
	this.$lis.click(function(){
		that.createRotate().createSlide();
		
		var $this = $(this), $item = $this.find('.item:eq(0)'), url = $item.attr('data-url');
		$origin.removeClass('loaded');
		if($item && url){
			$wrap.find('.x-origin, .x-show').attr('src', url).attr('alt', $item.attr('data-alt'));
			if(that.eggs){
				that.makeEggs($wrap, url);
			}
		}
		that.iRotate.reset();
	});
	
	//指定图片加载完成添加类loaded
	$origin.load(function(){
		$(this).addClass('loaded');
	});
	
	return this;
};

XsImage.prototype.getIndex = function(){
	var that = this;
	this.$lis.each(function(){
		var $this = $(this);
		if($this.find('.item:eq(0)').attr('data-url').indexOf(that.imgName) != -1){
			that.imgIndex =  $this.index();
		}
	});
};

XsImage.prototype.createSlide = function(){
	if(!this.iSlide){
		if(typeof XImageSlide == 'undefined'){
			//debug('XImageSlide类未定义');
			return false;
		}
		this.iSlide = new XImageSlide({$wrap : this.$wrap});
	}
	return this;
};

XsImage.prototype.createRotate = function(){
	if(!this.iRotate){
		if(typeof XImageRotate == 'undefined'){
			//debug('XImageRotate类未定义');
			return false;
		}
		this.iRotate = new XImageRotate({$wrap : this.$wrap}); 
	}
	return this;
};

XsImage.prototype.makeHtml = function(){
	var actHtml = showHtml = listHtml = '', 
		btns = this.btns, len = btns.length;
	//show
	showHtml = '<div class="x-bd"><div class="x-show-wp"><img class="x-show" src="' + this.imgHolder + '" /></div>\
		<div class="x-origin-wp"><img class="x-origin" src="' + this.imgHolder + '" /></div>\
		<a class="x-prev iconfont" href="javascript:;" title="上一张">&#xe634;</a>\
		<a class="x-next iconfont" href="javascript:;" title="下一张">&#xe636;</a></div>';
	//action
	actHtml += this.makeActFunc ? this.makeActFunc() : this.makeAct();
	//image list
	listHtml += this.makeListFunc ? this.makeListFunc() : this.makeList();
	listHtml = '<div class="x-nav"><div class="x-list-wp"><ul class="x-list cl">' + 
		listHtml + '</ul></div>\
		<a class="x-list-prev iconfont" href="javascript:;" title="上一列">&#xe634;</a>\
		<a class="x-list-next iconfont" href="javascript:;" title="下一列">&#xe636;</a></div>';
	this.$wrap = $('<div class="' + this.wrapClass + '"></div>');
	this.$wrap.html(actHtml + showHtml + listHtml);
};

XsImage.prototype.makeAct = function(){
	var ret = '', btns = this.btns, len = btns.length;;
	if(len > 0){
		ret += '<div class="x-act">';
		for(var i = 0; i < len; i++){
			if(btns[i][0] && btns[i][1]){
				ret += '<a class="x-btn x-' + btns[i][0] + '" href="javascript:;"><i class="iconfont">' + btns[i][2] + '</i> ' + btns[i][1] + '</a>';
			}
		}
		ret += '</div>';
	}
	return ret;
};

XsImage.prototype.makeList = function(){
	var ret = '', imgs = this.imgs, imgSize = this.imgSize;
	if(typeof xst == 'undefined' || typeof xst.getImgUrl == 'undefined'){
		//debug('xst.getImgUrl(): 未定义');
		return false;
	}
	var imgArr = xst.getImgUrl(imgs, imgSize, 1), len = imgArr.length,
		smallUrl, bigUrl;
		var ifGif = '';
	for(var i = 0; i < len; i++){
		ifGif = '';
		smallUrl = imgArr[i][imgSize[0]], bigUrl = imgArr[i][imgSize[1]];
		if(typeof smallUrl == 'string' && typeof bigUrl == 'string'){
			if(smallUrl.match(/\.(gif)+/)){
				ifGif = '<i></i>';
			}
			ret += '<li><a class="item" data-url="' + bigUrl + '" href="javascript:;" style="background:url(' + smallUrl + ')" />' + ifGif + '</a></li>';
		}
	}
	return ret;
};

XsImage.prototype.makeEggs = function($wrap, url){
	var eggsUrl = '', regEx = /xfImage=(yes|all|.{35})/;
	var res = this.pageUrl.match(regEx);
	if(typeof xst.getImgName == 'undefined'){
		//debug('xst.getImgName(): 未定义');
		return false;
	}
	if(res && res[1]){
		eggsUrl = this.pageUrl.replace(regEx, 'xfImage=' + xst.getImgName(url));
	}else{
		if(this.pageUrl.indexOf('?') != -1){
			eggsUrl = this.pageUrl + '&xfImage=' + xst.getImgName(url);
		}else{
			eggsUrl = this.pageUrl + '?xfImage=' + xst.getImgName(url);
		}					
	}
	$wrap.find('.x-show').attr('data-eggs', eggsUrl);
};

function XfImage(o){
	this.wrapClass = o.wrapClass || 'xf-image';
	this.$wrap;
	this.imgs = o.imgs;
	this.imgsBig = o.imgsBig;
	this.imgName = o.imgName;
	this.imgIndex = 0;  //默认显示第一张图片
	this.imgSize = 	o.imgSize || ['@100h_0e_1c_1l_90Q_1x.', 'origin'];
	this.imgHolder = o.imgHolder || 'http://img.xsteach.cn/static/images/common/loading24x24.gif';
	this.makeListFunc = o.makeListFunc || null;
	this.dragHtml = '<div class="x-map-wp"><img class="x-map-img" src="' + this.imgHolder + '" /><i class="x-layer"></i><i class="x-map" id="x-map-drag"></i></div>';
	this.closeHtml = '<a class="x-close" href="javascript:;" title="关闭"><i class="iconfont">&#xe65f;</i> </a>';
	this.eggs = o.eggs || 1;
	this.btns = o.btns || [
		['rotate', '旋转', '&#xe612;'],
		['zoom', '放大', '&#xe668;']
		//['close', '关闭', '&#xe65f;']
	];
	this.init(o);
}

XfImage.prototype.init = function(o){
	var that = this;
	
	this.makeHtml();
	var $wrap = this.$wrap;
	$('html').addClass('x-noscroll');
	
	if(this.eggs){
		this.pageUrl = location.href;
	}
	
	var si = setInterval(function(){
		if(that.$wrap.find('.x-show').length > 0){
			clearInterval(si);
			var $list = that.$list = $wrap.find('.x-list').eq(0);
			that.$lis = $list.find('li');
			
			if(typeof that.imgName == 'string'){
				that.getIndex();
			}
			that.reset().bind().createRotate().createSlide().createZoom().$lis.eq(that.imgIndex).click();
		}
	}, 10);

	return this;
};

XfImage.prototype.bind = function(o){
	var that = this, $wrap = this.$wrap, $origin = $wrap.find('.x-origin');
	
	//点击收起显示的图片
	$wrap.find('.x-close').click(function(){
		$wrap.remove();
		$('html').removeClass('x-noscroll');
	});
	
	//显示的图片
	$wrap.find('.x-show').click(function(){
		//$wrap.find('.x-zoom').click();
	});
	
	//点击缩列图列表项
	this.$lis.click(function(){
		that.createRotate().createSlide().createZoom().iZoom.ready('reset');
		
		var $this = $(this), $item = $this.find('.item:eq(0)'), url = $item.attr('data-url');
		$origin.removeClass('loaded');
		if($item && url){
			$wrap.find('.x-origin, .x-show, .x-map-img').attr('src', url).attr('alt', $item.attr('data-alt'));
			var $btnOrigin = $wrap.find('.x-btn-origin').eq(0);
			if($btnOrigin.length > 0){
				$btnOrigin.attr('href', url);
			}
			if(that.eggs){
				that.makeEggs($wrap, url);
			}
		}
		that.iRotate.reset();
	});
	
	this.$wrap.find('.x-rotate').click(function(){
		$wrap.find('.x-origin-wp').addClass('x-hidden');
		$wrap.find('.x-show-wp').removeClass('x-hide');
		that.iZoom.ready('reset');
	});
	
	
	this.$wrap.find('.x-zoom').click(function(){
		that.createDrag().iDrag.reset();
		that.iRotate.reset();
	});

	//指定图片加载完成添加类loaded
	$origin.load(function(){
		$(this).addClass('loaded');
	});
	
	//调整窗口大小
	$(window).resize(function(){
		that.reset();
	});
	return this;
};

XfImage.prototype.reset = function(){
	var winH = $(window).height(), navH = this.$wrap.find('.x-nav').outerHeight(),
		bdH = winH - navH - 40;
	bdH = bdH >= 400 ? bdH : 400;
	this.$wrap.find('.x-bd').height(bdH).css('lineHeight', bdH + 'px');
	return this;
};

XfImage.prototype.getIndex = function(o){
	var that = this;
	this.$lis.each(function(){
		var $this = $(this);
		if($this.find('.item:eq(0)').attr('data-url').indexOf(that.imgName) != -1){
			that.imgIndex =  $this.index();
		}
	});
};

XfImage.prototype.createSlide = function(){
	if(!this.iSlide){
		if(typeof XImageSlide == 'undefined'){
			//debug('XImageSlide类未定义');
			return false;
		}
		this.iSlide = new XImageSlide({$wrap : this.$wrap});
	}
	return this;
};

XfImage.prototype.createRotate = function(){
	if(!this.iRotate){
		if(typeof XImageRotate == 'undefined'){
			//debug('XImageRotate类未定义');
			return false;
		}
		this.iRotate = new XImageRotate({$wrap : this.$wrap}); 
	}
	return this;
};

XfImage.prototype.createZoom = function(){
	if(!this.iZoom){
		if(typeof XImageZoom == 'undefined'){
			//debug('XImageZoom类未定义');
			return false;
		}
		this.iZoom = new XImageZoom({$wrap : this.$wrap});
	}
	return this;
};

XfImage.prototype.createDrag = function(){
	if(!this.iDrag){
		if(typeof XImageDrag == 'undefined'){
			//debug('XImageDrag类未定义');
			return false;
		}
		this.iDrag = new XImageDrag({$wrap : this.$wrap});
	}
	return this;
};

XfImage.prototype.makeHtml = function(){
	var actHtml = showHtml = listHtml = '', layerHtml = '<div class="x-layer x-layer-pop"></div>';
	if(typeof this.dragHtml == 'string'){
		var dragHtml = this.dragHtml;
	}else{
		var dragHtml = '';
	}
	if(typeof this.closeHtml == 'string'){
		var closeHtml = this.closeHtml;
	}else{
		var closeHtml = '';
	}
	//show
	showHtml = '<div class="x-bd"><div class="x-show-wp"><div class="x-layer x-layer-filter"></div><img class="x-show" src="' + this.imgHolder + '" /></div>\
		<div class="x-origin-wp x-hidden"><i class="x-layer x-layer-filter"></i><img class="x-origin" src="' + this.imgHolder + '" /><i class="x-layer x-origin-drag" id="x-origin-drag"></i></div><a class="x-prev iconfont" href="javascript:;" title="上一张">&#xe634;</a>\
		<a class="x-next iconfont" href="javascript:;" title="下一张">&#xe636;</a></div>';
	//action
	actHtml += this.makeActFunc ? this.makeActFunc() : this.makeAct();
	//image list
	listHtml += this.makeListFunc ? this.makeListFunc() : this.makeList();
	listHtml = '<div class="x-nav"><div class="x-list-wp"><ul class="x-list cl">' + 
		listHtml + '</ul></div>\
		<a class="x-list-prev iconfont" href="javascript:;" title="上一列">&#xe634;</a>\
		<a class="x-list-next iconfont" href="javascript:;" title="下一列">&#xe636;</a></div>';
	this.$wrap = $('<div class="' + this.wrapClass + '"></div>');
	this.$wrap.html(layerHtml + actHtml + showHtml + listHtml + dragHtml + closeHtml);
};

XfImage.prototype.makeAct = function(){
	var ret = '', btns = this.btns, len = btns.length;;
	if(len > 0){
		ret += '<div class="x-act"><a class="x-btn x-btn-origin" href="#" target="_blank"><i class="iconfont">&#xe66c;</i> 原图</a>';
		for(var i = 0; i < len; i++){
			if(btns[i][0] == 'close'){
				var text = '';
			}else{
				var text = btns[i][1];
			}
			if(btns[i][0] && btns[i][1]){
				ret += '<a class="x-btn x-' + btns[i][0] + '" href="javascript:;" title="' + btns[i][1] + '"><i class="iconfont">' + btns[i][2] + '</i> ' + text + '</a>';
			}
		}
		ret += '</div>';
	}
	return ret;
};

XfImage.prototype.makeList = function(){
	var ret = '', imgs = this.imgs, imgSize = this.imgSize;
	if(typeof xst == 'undefined' || typeof xst.getImgUrl == 'undefined'){
		//debug('xst.getImgUrl(): 未定义');
		return false;
	}
	var imgArr = xst.getImgUrl(imgs, imgSize, 1), len = imgArr.length,
		smallUrl, bigUrl;
		var ifGif = '';
	for(var i = 0; i < len; i++){
		ifGif = '';
		smallUrl = imgArr[i][imgSize[0]], bigUrl = imgArr[i][imgSize[1]];
		if(typeof smallUrl == 'string' && typeof bigUrl == 'string'){
			if(smallUrl.match(/\.(gif)+/)){
				ifGif = '<i></i>';
			}
			ret += '<li><a class="item" data-url="' + bigUrl + '" href="javascript:;" style="background:url(' + smallUrl + ')" />' + ifGif + '</a></li>';
		}
	}
	return ret;
};

XfImage.prototype.makeEggs = function($wrap, url){
	var eggsUrl = '', regEx = /xfImage=(yes|all|.{35})/;
	var res = this.pageUrl.match(regEx);
	if(typeof xst.getImgName == 'undefined'){
		//debug('xst.getImgName(): 未定义');
		return false;
	}
	if(res && res[1]){
		eggsUrl = this.pageUrl.replace(regEx, 'xfImage=' + xst.getImgName(url));
	}else{
		if(this.pageUrl.indexOf('?') != -1){
			eggsUrl = this.pageUrl + '&xfImage=' + xst.getImgName(url);
		}else{
			eggsUrl = this.pageUrl + '?xfImage=' + xst.getImgName(url);
		}					
	}
	$wrap.find('.x-show').attr('data-eggs', eggsUrl);
};

function XImageSlide(o){
	if(!o.$wrap){
		//debug('new XImageSlide(o): 对象参数o的必须定义属性$wrap！');
		return;
	}
	var $wrap = this.$wrap = o.$wrap;
	this.$list = o.$list || $wrap.find('.x-list');
	this.$parent = o.$parent || this.$list.parent();
	this.$imgPrev = o.$imgPrev || $wrap.find('.x-prev');
	this.$imgNext = o.$imgNext || $wrap.find('.x-next');
	this.$listPrev = o.$listPrev || $wrap.find('.x-list-prev');
	this.$listNext = o.$listNext || $wrap.find('.x-list-next');
	this.timer = 400;
	this.init(o).bind();
}

XImageSlide.prototype.init = function(o){
	if(typeof o.isIE8 != 'undefined'){
		this.isIE8 = o.isIE8;
	}else{
		this.isIE8 = xst.isIE(8);
	}
	this.$lis = this.$list.find('li');
	this.liLen = this.$lis.length;
	var $liItem = this.$lis.eq(0);
	var liWidth = $liItem.outerWidth();
	this.margin = (parseFloat($liItem.css('marginLeft')) + parseFloat($liItem.css('marginRight')));
	this.margin2 = this.margin / 2;
	this.oneWidth = liWidth + this.margin;
	this.active = 0;
	this.$list.css('width', this.liLen * this.oneWidth);
	
	this.reset();
	return this;
};

XImageSlide.prototype.reset = function(){
	var wrapWidth = this.$parent.width();
	this.liLenMax = parseInt((wrapWidth + this.margin) / this.oneWidth);
	this.middleIndex = this.middle = Math.ceil(this.liLenMax / 2);  //middle显示列表的中间项，middleIndex当前显示列表中间项的index
	this.leftMax = (this.liLen - this.liLenMax) * this.oneWidth;
	this.left = parseInt(this.$list.css('left'));
	this.clickItem(this.$list.find('.active').eq(0), 1);
	return this;
};

XImageSlide.prototype.bind = function(){
	var that = this;
	this.$lis.click(function(){
		that.clickItem($(this));
	});
	this.$imgPrev.click(function(){
		that.slideTo(that.active - 1);
	});
	this.$imgNext.click(function(){
		that.slideTo(that.active + 1);
	});
	
	this.$listPrev.click(function(){
		that.moveTo(that.middleIndex - that.liLenMax);
	});
	this.$listNext.click(function(){
		that.moveTo(that.middleIndex + that.liLenMax);
	});
	
	//调整窗口大小
	$(window).resize(function(){
		that.reset();
	});
};

XImageSlide.prototype.clickItem = function(li, current){
	var index = li.index() + 1;
	if(index == this.active && !current) return;
	this.active = index;
	li.addClass('active').siblings().removeClass('active');
	//显示区左右箭头显示或隐藏
	if(index == 1){
		this.$imgPrev.hide();
	}else{
		this.$imgPrev.show();
	}		
	if(index == this.liLen){
		this.$imgNext.hide();
	}else{
		this.$imgNext.show();
	}
	this.moveTo(index);
};

XImageSlide.prototype.slideTo = function(index){
	this.$lis.eq(index - 1).click();
};
 
XImageSlide.prototype.moveTo = function(index){
	if(this.liLen > this.liLenMax){
		this.middleIndex = index;
		var left = (index - this.middle) * this.oneWidth;
		if(index <= this.middle){
			left = 0;
			this.middleIndex = this.middle;
		}else if(index >= (this.liLen - (this.liLenMax - this.middle))){
			left = this.leftMax;
			this.middleIndex = this.liLen - this.middle + 1;
		}
		this.left = left = -left;
		if(this.isIE8){
			this.$list.stop().css({'left' : left});
		}else{
			this.$list.stop().animate({'left' : left}, this.timer);
		}
		//列表左右箭头显示或隐藏
		if(left == 0){
			this.$listPrev.hide();	
		}else{
			this.$listPrev.show();
		}
		if(left == -this.leftMax){
			this.$listNext.hide();
		}else{
			this.$listNext.show();
		}
	}else{
		this.$listPrev.hide();	
		this.$listNext.hide();
	}
};

function XImageRotate(o){
	if(!o.$wrap){
		//debug('new XImageRotate(o): 对象参数o的必须定义属性$wrap！');
		return;
	}
	var $wrap = this.$wrap = o.$wrap;
	this.$btn = o.btn || $wrap.find('.x-rotate');
	this.$img = o.img || $wrap.find('.x-show');
	this.$origin = o.origin || $wrap.find('.x-origin');
	this.$parent = o.parent || this.$img.parent();
	this.angle = 0;
	this.className = 'x-abs';
	this.transform = 'x-transform';
	this.init(o).bind();
}

XImageRotate.prototype.init = function(o){
	this.pw = this.$parent.width(), this.ph = this.$parent.height();
	if(typeof o.isIE7 != 'undefined'){
		this.isIE7 = o.isIE7;
	}else{
		this.isIE7 = xst.isIE(7);
	}
	if(typeof o.isIE78 != 'undefined'){
		this.isIE78 = o.isIE78;
	}else{
		this.isIE78 = xst.isIE78();
	}
	this.reset();
	return this;
};

XImageRotate.prototype.reset = function(){
	this.pw = this.$parent.width(), this.ph = this.$parent.height();
	this.angle = 0;
	this.rotate();
	this.$img.removeClass(this.transform);

	var cssParam = {
		top : 'auto', left : 'auto', width : 'auto', height : 'auto'
	};
	this.$img.removeClass(this.className).css(cssParam);
	if(this.isIE7){
		this.setCss().$img.hide();
	}
};

XImageRotate.prototype.bind = function(){
	var that = this;
	this.$btn.click(function(){
		setTimeout(function(){
			that.angle++;
			that.rotate().setCss();
			if(that.isIE78){
				that.$img.hide();
			}
		}, 100);
	});
	//调整窗口大小
	$(window).resize(function(){
		that.reset();
	});
};

XImageRotate.prototype.getCss = function(){
	var that = this, $origin = this.$origin, cssParam = {},
		oWidth = $origin.width(), oHeight = $origin.height(),
		top = left = width = height = 'auto';
	this.pw = this.$parent.width(), this.ph = this.$parent.height();
	if(this.angle % 4 == 1 || this.angle % 4 == 3){
		oWidth = $origin.height(), oHeight = $origin.width();
	}
	if(oWidth > this.pw){
		width = this.pw, height = width / oWidth * oHeight;
		if(height > this.ph){
			height = this.ph, width = height / oHeight * oWidth;
		}
	}else{
		width = oWidth, height = oHeight;
		if(height > this.ph){
			height = this.ph, width = height / oHeight * oWidth;
		}
	}
	top = (this.ph - height) / 2, left = (this.pw - width) / 2;
	if(this.angle % 4 == 1 || this.angle % 4 == 3){
		var temp = width;
		width = height, height = temp;
	}else{
		
	}
	if(!this.isIE78){
		top = (this.ph - height) / 2, left = (this.pw - width) / 2;
	}
	cssParam = {
		width : width, height : height, top : top, left : left
	};
	return cssParam;
};

XImageRotate.prototype.setCss = function(){
	var that = this;
	var si = setInterval(function(){
		if(that.$origin.hasClass('loaded')){
			clearInterval(si);
			var cssParam = that.getCss();
			that.$img.addClass(that.className).css(cssParam).show();
		}
	}, 10);
	return this;
};

XImageRotate.prototype.rotate = function(){
	if(this.isIE78){
		this.angle = this.angle % 4;
		this.$img.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + this.angle + ')');
	}else{
		this.$img.addClass(this.transform).css('transform', 'rotate(' + (this.angle * 90) + 'deg)');
	}
	return this;
};

function XImageZoom(o){
	if(!o.$wrap){
		//debug('new XImageSlide(o): 对象参数o的必须定义属性$wrap！');
		return;
	}
	var $wrap = this.$wrap = o.$wrap;
	this.$btn = o.$btn || $wrap.find('.x-zoom').eq(0);
	this.$show = o.$show || $wrap.find('.x-show').eq(0);
	this.$showWrap = this.$show.parent();
	this.$origin = o.$origin || $wrap.find('.x-origin').eq(0);
	this.$originWrap = this.$origin.parent();
	this.$map = o.$map || $wrap.find('.x-map').eq(0);
	this.$mapWrap = this.$map.parent();
	this.$mapImg = this.$mapWrap.find('img').eq(0);
	
	this.zoomBtn = [
		['放大', '<i class="iconfont">&#xe668;</i> 放大'],
		['缩小', '<i class="iconfont">&#xe669;</i> 缩小'],
	];  //放大和缩小的字体图标

	this.init().bind();
}

XImageZoom.prototype.init = function(){
	this.mapWrapW = this.$mapWrap.width();
	this.mapWrapH = this.$mapWrap.height();
	var borderWidth = parseInt(this.$map.css('borderWidth'));
	this.mapBorder = borderWidth ? borderWidth : 3;
	
	this.reset();
	return this;
};

XImageZoom.prototype.reset = function(){
	this.$btn.html(this.zoomBtn[0][1]).attr('title', this.zoomBtn[0][0]);
	this.$mapWrap.addClass('x-hide');
	this.$showWrap.removeClass('x-hide');
	this.$originWrap.addClass('x-hidden');
	
	this.showW = this.$showWrap.width();
	this.showH = this.$showWrap.height();
	this.originW = this.$origin.css({'width' : 'auto', 'height' : 'auto'}).width();
	this.originH = this.$origin.height();

	this.mapImgW = this.$mapImg.width();
	this.mapImgH = this.$mapImg.height();

	if(this.originW > this.showW || this.originH > this.showH){
		this.$btn.removeClass('x-hide');
	}else{
		this.$btn.addClass('x-hide');
	}
};

XImageZoom.prototype.bind = function(){
	var that = this, zoomBtn = this.zoomBtn;
	
	this.$btn.click(function(){
		var $this = $(this);
		if($this.attr('title') == zoomBtn[0][0]){
			$this.html(zoomBtn[1][1]).attr('title', zoomBtn[1][0]);
			that.$mapWrap.removeClass('x-hide');
			that.$showWrap.addClass('x-hide');
			that.$originWrap.removeClass('x-hidden');
			that.zoom();
		}else{
			that.ready('reset');
		}
	});
	
	//调整窗口大小
	$(window).resize(function(){
		that.reset();
	});
};

XImageZoom.prototype.ready = function(func){
	if(typeof func != 'string'){
		//debug('ready没有传递回调函数');
		return this;
	}
	var that = this;
	var si = setInterval(function(){
		if(that.$origin.hasClass('loaded')){
			clearInterval(si);
			if(typeof func == 'string'){
				that[func]();
			}else{
				func();
			}
		}
	}, 10);
	return this;
};

XImageZoom.prototype.zoom = function (){
	//this.dragImgL = [this.$dragImg.width(), this.$dragImg.height()];
	var originLeft = originTop = mapLeft = mapTop = mapW = mapH = 0,
		originW = this.originW, originH = this.originH,
		showW = this.showW, showH = this.showH,
		mapWrapW = this.mapWrapW, mapWrapH = this.mapWrapW;
	if(originW > originH){  //图片宽度比高度大
		var mapImgW = mapWrapW;
		var mapImgH = originH * mapImgW / originW;
	}else{
		var mapImgH = mapWrapH;
		var mapImgW = originW * mapImgH / originH;
	}
	if(originW > showW && originH > showH){
		mapW = mapImgW * showW / originW;
		mapH = mapImgH * showH / originH;
		originLeft = (showW - originW) / 2;
		originTop =  (showH - originH) / 2;
	}else if(originW > showW){
		mapW = mapImgW * showW / originW;
		mapH = (mapWrapH + mapImgH) / 2;
		originLeft = 0;
		originTop = (showH - originH) / 2;
		//mapLeft = 0;
		//mapTop = (mapWrapH- mapH) / 2;
	}else{
		mapW = (mapWrapW + mapImgW) / 2;
		mapH = mapImgH * showH / originH;
		originLeft = (showW - originW) / 2;
		originTop = 0;
		//mapLeft = (mapWrapW - mapW) / 2;
		//mapTop = 0;
	}
	mapLeft =  (mapWrapW - mapW) / 2;
	mapTop =  (mapWrapH- mapH) / 2;
	$('.x-origin, .x-origin-drag').css('width', originW).css('height', originH).css('top', originTop).css('left', originLeft);
	this.$map.css('width', mapW - this.mapBorder * 2).css('height', mapH - this.mapBorder * 2).css('left', mapLeft).css('top', mapTop);
	if(typeof xst != 'undefined' && typeof xst.isIE != 'undefined' && xst.isIE(7)){
		this.$mapImg.css({left: (mapWrapW - mapImgW) / 2, top: (mapWrapH - mapImgH) /2});
	}
};

function XImageDrag(o){
	if(!o.$wrap){
		//debug('new XImageRotate(o): 对象参数o的必须定义属性$wrap！');
		return;
	}
	var $wrap = this.$wrap = o.$wrap;
	this.$b = o.$originDrag || $wrap.find('.x-origin-drag');   //大拖动块            
	this.$s = o.$map || $wrap.find('.x-map');                  //小拖动块
	this.$originImg = o.$origin || $wrap.find('.x-origin');    //缩列图
	this.$mapImg = o.$mapImg || $wrap.find('.x-map-img');      //缩列图
	this.target;
	this.bp;        //大拖动块的LEFT和TOP值              bigger position
	this.bmp = [];  //大拖动块拖动时的LEFT和TOP值        bigger moving position
	this.sp;        //小拖动块的LEFT和TOP值              smaller position
	this.smp = [];  //小拖动块移动时的LEFT和TOP值        smaller moving position
	this.mdp;       //鼠标按下时所在位置的LEFT和TOP值    mouse down position
	this.mmp;       //鼠标拖动时所在位置的LEFT和TOP值    mouse moving position
	this.mdl;       //鼠标拖动的横向和纵向距离           mouse drag length
	this.dlp;       //大小拖动块横向(纵向)可拖动距离比例 drag length percent
	this.bmr;       //大拖动块LEFT和TOP最大与最小的值    bigger moving range
	this.smr;       //小拖动块LEFT和TOP最大与最小的值    smaller moving range
	
	this.init();
}

XImageDrag.prototype.init = function(){
	var that = this;
	this.$bp = this.$b.parent();     //大拖动块父元素
	this.$sp = this.$s.parent();     //小拖动块父元素
	
	this.reset().bind(this.$b).bind(this.$s);
};

XImageDrag.prototype.reset = function(){
	this.il  = [this.$mapImg.width(), this.$mapImg.height()];  //缩列图宽高	
	this.bl  = [this.$b.width(), this.$b.height()];            //大拖动块宽高
	this.bpl = [this.$bp.width(), this.$bp.height()];          //大拖动块父元素宽高	
	this.sl  = [this.$s.outerWidth(), this.$s.outerHeight()];  //小拖动块宽高
	this.spl = [this.$sp.width(), this.$sp.height()];          //小拖动块父元素宽高
	
	//大拖动块右上角坐标范围
	this.bmr = [0, 0, 0, 0];
	if(this.bl[0] > this.bpl[0]){                  //宽度 > 父元素宽度
		this.bmr[0] = [this.bpl[0] - this.bl[0]];  //LEFT最小
		//this.bmr[1] = 0;                           //LEFT最大
	}else{                                         //宽度 <= 父元素宽度
		//this.bmr[0] = 0;                           //LEFT最小
		this.bmr[1] = [this.bpl[0] - this.bl[0]];  //LEFT最大
	}
	if(this.bl[1] > this.bpl[1]){                  //高度 > 父元素高度
		this.bmr[2] = [this.bpl[1] - this.bl[1]];  //TOP最小
		//this.bmr[3] = 0;                           //TOP最大
	}else{                                         //高度 <= 父元素高度
		//this.bmr[2] = 0;                           //TOP最小
		this.bmr[3] = [this.bpl[1] - this.bl[1]];  //TOP最大
	}
	
	//小拖动块右上角坐标范围
	this.smr = [0, 0, 0, 0];
	if(this.il[0] > this.il[1]){                                   //缩列图宽度 > 缩列图高度
		//this.smr[0] = 0;                                           //LEFT最小
		this.smr[1] = this.spl[0] - this.sl[0];                    //LEFT最大
		if(this.sl[1] > this.il[1]){                               //小拖动块高度 > 缩列图高度
			this.smr[3] = (this.spl[1] - this.il[1]) / 2;          //TOP最小
			this.smr[2] = this.smr[3] - (this.sl[1] - this.il[1]); //TOP最大
		}else{                                                     //小拖动块高度 <= 缩列图高度
			this.smr[2] = (this.spl[1] - this.il[1]) / 2;
			this.smr[3] = this.smr[2] + (this.il[1] - this.sl[1]);
		}
	}else{                                                         //缩列图宽度<=缩列图高度
		if(this.sl[0] > this.il[0]){                               //小拖动块宽度 > 缩列图宽度
			this.smr[1] = (this.spl[0] - this.il[0]) / 2;
			this.smr[0] = this.smr[1] - (this.sl[0] - this.il[0]);
		}else{                                                     //小拖动块宽度 <= 缩列图宽度
			this.smr[0] = (this.spl[0] - this.il[0]) / 2;
			this.smr[1] = this.smr[0] + (this.il[0] - this.sl[0]);
		}
		//this.smr[2] = 0;
		this.smr[3] = this.spl[1] - this.sl[1];
	}
	
	this.dlp = [(this.bmr[1] - this.bmr[0]) / (this.smr[1] - this.smr[0]), (this.bmr[3] - this.bmr[2]) / (this.smr[3] - this.smr[2])];
	
	return this;
};

XImageDrag.prototype.bind = function(target){
	var that = this;
	target.mousedown(function(e){
		that.target = $(this).attr('id');
		that.mouseDown(e);
	});
	return this;
};

XImageDrag.prototype.unBind = function(){
	var that = this;
	this.isMove = false;
	$(document).unbind('mousemove', function(e){
		that.mouseMove(e);
	}).unbind('mouseup', function(){
		that.unBind();
	});
};

XImageDrag.prototype.mouseDown = function(e){
	var that = this;
	that.isMove = true;
	that.reset();
	that.bp = that.getPos(that.$b);
	that.sp = that.getPos(that.$s);
	that.mdp = that.getPagePos(e);
	$(document).mousemove(function(e){
		that.mouseMove(e);
	}).mouseup(function(){
		that.unBind();
	});
};

XImageDrag.prototype.mouseMove =function(e){
	this.mmp = this.getPagePos(e);
	this.mdl = this.getMoveLen();
	if(this.isMove){
		if(this.target == this.$b.attr('id')){  //拖动的是大拖动块
			//LEFT
			this.bmp[0] = this.bp[0] + this.mdl[0];
			this.smp[0] = this.sp[0] - this.mdl[0] / this.dlp[0];
			if(this.bmp[0] < this.bmr[0]){
				this.bmp[0] = this.bmr[0];
				this.smp[0] = this.smr[1];
			}else if(this.bmp[0] > this.bmr[1]){
				this.bmp[0] = this.bmr[1];
				this.smp[0] = this.smr[0];
			}
			//TOP
			this.bmp[1] = this.bp[1] + this.mdl[1];
			this.smp[1] = this.sp[1] - this.mdl[1] / this.dlp[1];
			if(this.bmp[1] < this.bmr[2]){
				this.bmp[1] = this.bmr[2];
				this.smp[1] = this.smr[3];
			}else if(this.bmp[1] > this.bmr[3]){
				this.bmp[1] = this.bmr[3];
				this.smp[1] = this.smr[2];
			}
		}else{    //拖动的是小拖动块
			//LEFT
			this.smp[0] = this.sp[0] + this.mdl[0];
			this.bmp[0] = this.bp[0] - this.mdl[0] * this.dlp[0];
			if(this.smp[0] < this.smr[0]){
				this.bmp[0] = this.bmr[1];
				this.smp[0] = this.smr[0];
			}else if(this.smp[0] > this.smr[1]){
				this.bmp[0] = this.bmr[0];
				this.smp[0] = this.smr[1];
			}
			//TOP
			this.smp[1] = this.sp[1] + this.mdl[1];
			this.bmp[1] = this.bp[1] - this.mdl[1] * this.dlp[1];
			if(this.smp[1] < this.smr[2]){
				this.smp[1] = this.smr[2];
				this.bmp[1] = this.bmr[3];
			}else if(this.smp[1] > this.smr[3]){
				this.smp[1] = this.smr[3];
				this.bmp[1] = this.bmr[2];
			}
		}
		this.css();
	}
};

XImageDrag.prototype.css = function(){
	var b = this.bmp, s = this.smp;
	this.$b.css('left', b[0] + 'px').css('top', b[1] + 'px');
	this.$originImg.css('left', b[0] + 'px').css('top', b[1] + 'px');
	this.$s.css('left', s[0] + 'px').css('top', s[1] + 'px');
};

XImageDrag.prototype.getPos = function(e){
	return [parseFloat(e.css('left')), parseFloat(e.css('top'))];
};

XImageDrag.prototype.getPagePos = function(e){
	return [e.pageX, e.pageY]; 
};

XImageDrag.prototype.getMoveLen = function(){
	return [this.mmp[0] - this.mdp[0], this.mmp[1] - this.mdp[1]]
};
