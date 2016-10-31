$(function(){
	var softwareUrl = location.href, softwareRegExp = new RegExp("course/software");
	if(softwareRegExp.test(softwareUrl)){
		mediaPlayer($('.player object:eq(0)'));
	}
  });
  
//换页功能函数  -->>
  function getPageHtml(url, sendData, callback_func) {
 		var pageAjax = $.ajax({
 			'url': url,
 			'type': 'get',
 			'data': sendData,
 			'dataType': 'jsonp',
 			'success': function(data){
 				callback_func(data);
 			}
 		});
 		return pageAjax;
  }
  
  function createPagesHtml(pageDiv, currentPage, pageSize, count, limitNum) {
 		pageShowDothEnds = typeof pageShowDothEnds == "undefined" ? true : pageShowDothEnds;
 		pageUpTxt = typeof pageUpTxt == "undefined" ? '上一页' : pageUpTxt;
 		pageDownTxt = typeof pageDownTxt == "undefined" ? '下一页' : pageDownTxt;
 		var pageHtml = "";
 		var pageCount = Math.ceil(count/pageSize);
 		var prevHtml = "";
 		var nextHtml = "";
 		var pageListHtml = "";
 		limitNum = limitNum ? limitNum : 0;
 		if(currentPage <= 0) currentPage = 1;
 		if(currentPage >= pageCount) currentPage = pageCount;
 		if(pageShowDothEnds) {
 			if(currentPage > 1) {
 				prevHtml = '<li class="prev"><a href="javascript:;" page-num="'+(currentPage-1)+'">'+pageUpTxt+'</a></li>';
 			}
 			if(currentPage < pageCount) {
 				nextHtml = '<li class="next"><a href="javascript:;" page-num="'+(currentPage+1)+'">'+pageDownTxt+'</a></li>';
 			}
 		}
 		
 		if(limitNum) {
 			var mid = Math.floor(limitNum/2);
 			if(currentPage - mid > 2) {
 				pageListHtml += '<li><a href="javascript:;" page-num="1">1</a></li><li class="dotted"><span>...</span></li>';
 			} else if(currentPage - mid > 1) {
 				pageListHtml += '<li><a href="javascript:;" page-num="1">1</a></li>';
 			}
 			for(i = currentPage - mid; i < currentPage; i++) {
 				if(i < 1) continue;
 				pageListHtml += '<li><a href="javascript:;" page-num="'+i+'">'+i+'</a></li>';
 			}
 			pageListHtml += '<li class="active"><span page-num="'+currentPage+'">'+currentPage+'</span></li>';
 			for(j = currentPage +1; j <= currentPage + mid; j++) {
 				if(j > pageCount) break;
 				pageListHtml += '<li><a href="javascript:;" page-num="'+j+'">'+j+'</a></li>';
 			}	
 			if(currentPage + mid < pageCount-1) {
 				pageListHtml += '<li class="dotted"><span>...</span></li><li><a href="javascript:;" page-num="'+pageCount+'">'+pageCount+'</a></li>';
 			} else if(currentPage + mid < pageCount) {
 				pageListHtml += '<li><a href="javascript:;" page-num="'+pageCount+'">'+pageCount+'</a></li>';
 			}
 		} else {
 			for(i = 1; i <= pageCount; i++) {
 				if(i != currentPage) {
 					pageListHtml += '<li><a href="javascript:;" page-num="'+i+'">'+i+'</a></li>';
 				} else {
 					pageListHtml += '<li class="active"><span page-num="'+i+'">'+i+'</span></li>';
 				}
 			}
 		}
 		
 		pageHtml = '<ul class="pagination">' + prevHtml + pageListHtml + nextHtml + '</ul>';
 		$(pageDiv).html(pageHtml);
 	}
function location_show(obj, referObj, onUpCls, onDwCls) {
	var winHt = $(window).height();
	var winTop = $(window).scrollTop();
	var objHt = $(obj).height();
	var refHt = $(referObj).height();
	var refTop = $(referObj).offset().top;
	var refTopHt = refTop - winTop;
	var refBtmHt= winHt - refHt - refTopHt; 
	if(objHt < refBtmHt) {
		$(obj).removeClass(onDwCls).addClass(onUpCls).show();//显示在参照对象的下方
	} else {
		$(obj).removeClass(onUpCls).addClass(onDwCls).show(); //显示在参照对象的上方
	}
}

/* 视频播放支持iOS */
function mediaPlayer(obj){
	if (obj && (navigator.userAgent.match(/iP(od|hone|ad)/i))) {
		var vidStr = obj.find('embed:eq(0)').attr('flashvars');
		var vidArr = vidStr.split('=');
		if (vidArr[1]) {
			//var urlstr = "http://v.polyv.net/uc/video/getMp4?vid=" + vidArr[1];
			var v = $('<video src="http://v.polyv.net/uc/video/getMp4?vid=' + vidArr[1] + '" width="100%" height="100%" controls="controls" post="http://v.polyv.net/uc/video/getImage?vid=' + vidArr[1] + '"></video>');
			obj.replaceWith(v);
		}
	}
}
/*function mediaPlayer2(obj){
	if (obj && (navigator.userAgent.match(/iP(od|hone|ad)/i) || navigator.userAgent.match(/Windows Phone/i) || navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/Linux/i) || navigator.userAgent.match(/AppleWebKit.*Mobile.*///i))) {
/*		var vidStr = obj.find('embed:eq(0)').attr('flashvars');
		var vidArr = vidStr.split('=');
		//var regEx = new RegExp(); 
		//regEx.compile(/(.*)\/videos\/([0-9a-zA-Z_-]*).swf/i);
		if (vidArr[1]) {
			//var results = regEx.exec(src);
			//var vid = results[2];
			var urlstr = "http://v.polyv.net/hlsIndex/" + vidArr[1] + '.m3u8';
			var v = $('<video src="' + urlstr + '" poster="http://v.polyv.net/uc/video/getImage?vid=' + urlstr + '" width="100%" height="100%" controls="controls"></video>');
			obj.replaceWith(v);
		}
	}
}*/
