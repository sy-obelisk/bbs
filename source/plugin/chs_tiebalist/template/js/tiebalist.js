function getAncestryByClassName(obj,className) {
	if (!obj) return null;
	var ancestry=obj;
	while (ancestry&&(!hasClass(ancestry,className))) {
		ancestry=ancestry.parentNode;
	}
	return ancestry;
}
function showElement(obj) {
    if(obj.style.visibility) {
		obj.style.visibility = 'visible';
	} else {
		obj.style.display = '';
	}
}
function hideElement(obj) {
    if(obj.style.visibility) {
		obj.style.visibility = 'hidden';
	} else {
		obj.style.display = 'none';
	}
}
function showPicture(obj,i) {
	if (!obj) return;
	var pictureDisplay=getAncestryByClassName(obj,'picturedisplay');
	var thumbList=($C('thumblist',pictureDisplay,'p'))[0];
	var pictureBox=($C('picturebox',pictureDisplay,'div'))[0];
	var bigPictures=$C('bigpicture',pictureBox,'div');
	var num=bigPictures.length;
	var curPicture=null;;
	for (var j=0;j<num;j++) if (j==i) {curPicture=bigPictures[j];break;}
	var curImg=($C('picture',curPicture,'img'))[0];
	var picUrl=curImg.getAttribute('file');
	if (!curImg.getAttribute('loaded')) {
		imgtmp=new Image();
		imgtmp.onerror=function (){this.error=true;};
		imgtmp.src=picUrl;
		var waittimer=setInterval(function(){
			if (imgtmp.height>2||imgtmp.complete||imgtmp.error){
				clearInterval(waittimer);
				if (!imgtmp.error){
					var zw = imgtmp.width;
					var zh = imgtmp.height;
					var zr = zw / zh;
					fixw = pictureMaxWidth == undefined ? '600' : pictureMaxWidth;
					if(zw > fixw) {
					    zw = fixw;
					    zh = zw / zr;
					}
					curImg.width = zw;
					curImg.height = zh;
					curImg.src=picUrl;
					
				}else {
					curImg.width = 213;
					curImg.height = 160;
					curImg.src='source/plugin/chs_tiebalist/template/images/nopic.jpg';
				}
				curImg.setAttribute('loaded',1);
				hideElement(thumbList);
				showElement(pictureBox);
				for (var j=0;j<num;j++) {
					if (j==i) showElement(bigPictures[j]);
					else hideElement(bigPictures[j]);
				}
			}
		},100);
		
	}else {
		hideElement(thumbList);
		showElement(pictureBox);
		for (var j=0;j<num;j++) {
			if (j==i) showElement(bigPictures[j]);
			else hideElement(bigPictures[j]);
		}
	}
	if(!curImg.id) {
		curImg.id = 'img_' + Math.random();
	}
	var turnLeftBTN=($C('icon_turnleft',pictureBox,'a'))[0];
	var turnRightBTN=($C('icon_turnright',pictureBox,'a'))[0];
	if (turnLeftBTN) {
		turnLeftBTN.setAttribute('imgid',curImg.id);
	}
	if (turnRightBTN) {
		turnRightBTN.setAttribute('imgid',curImg.id);
	}
	var largePicBTN=($C('icon_viewlarge',pictureBox,'a'))[0];
	if (largePicBTN){
		largePicBTN.href=picUrl;
	}
	
	var prev=($C('goprevious',curPicture))[0];
	var next=($C('gonext',curPicture))[0];
	if (i>0) {
		prev.onclick=function(){showPicture(pictureBox,i-1);return false;};
		showElement(prev);
	}else{
		hideElement(prev);
	}
	if (i<num-1) {
		next.onclick=function(){showPicture(pictureBox,i+1);return false;};
		showElement(next);
	}else{
		hideElement(next);
	}
}
function closePicture(obj) {
    if (!obj) return;
	var pictureDisplay=getAncestryByClassName(obj,'picturedisplay');
	var pictureBox=($C('picturebox',pictureDisplay,'div'))[0];
	var thumbList=($C('thumblist',pictureDisplay,'p'))[0];
	hideElement(pictureBox);
	showElement(thumbList);
}
function turnImg(obj,direct) {
	if (!obj) return;
    var imgid=obj.getAttribute('imgid');
    imageRotate(imgid, direct);
}
function imageRotate(imgid, direct) {
	var image = $(imgid);
	if(!image.getAttribute('deg')) {
		var deg = 0;
		image.setAttribute('ow', image.width);
		image.setAttribute('oh', image.height);
	} else {
		var deg = parseInt(image.getAttribute('deg'));
	}
	var ow = image.getAttribute('ow');
	var oh = image.getAttribute('oh');
	deg = direct == 1 ? deg - 90 : deg + 90;
	if(deg > 270) {
		deg = 0;
	} else if(deg < 0) {
		deg = 270;
	}
	image.setAttribute('deg', deg);
	switch(deg) {
		case 0:var cow=ow,coh=oh;cx = 0, cy = 0;break;
		case 90:var cow = oh, coh = ow;cx = 0, cy = (ow-oh)/2;break;
		case 180:var cow = ow, coh = oh;cx = 0, cy = 0;break;
		case 270:var cow = oh, coh = ow;cx = 0, cy = (ow-oh)/2;break;
	}
	image.parentNode.style.height=coh+'px';
	var rotate = (function() {
		if (hasTransform) {
			return function(dom, angle) {  
				dom.style[css3Transform] = 'translate('+cx+'px,'+cy+'px) rotate(' + angle + 'deg) scale(1,1)';  
			};//code
		}else if (BROWSER.ie) {   
			return function(dom, angle) {  
				var rad = angle * (Math.PI / 180),  
				dx = (1 - Math.cos(Math.PI / 4 + rad) / Math.cos(Math.PI / 4)) * dom.offsetWidth / 2,  
				dy = (1 - Math.sin(Math.PI / 4 + rad) / Math.cos(Math.PI / 4)) * dom.offsetHeight / 2,  
				m11 = Math.cos(rad),  
				m12 = -1 * Math.sin(rad),  
				m21 = Math.sin(rad),  
				m22 = m11;
				dom.style.filter = 'progid:DXImageTransform.Microsoft.Matrix(Dx=' + dx + ',Dy=' + dy + ',M11=' + m11 + ',M12=' + m12 + ',M21=' + m21 + ',M22=' + m22 + ',SizingMethod="auto expand")';
			};
		}else return null;
	})();
	if (rotate!=null) rotate(image, deg);
}
function testTransform() {
	var style = document.createElement("div").style;
	var transformTypes=["transform", "MozTransform", "webkitTransform", "OTransform", "msTransform"];
	var count=transformTypes.length;
	for(var i=0;i<count;i++) {
		css=transformTypes[i];
		if (css in style) {
			css3Transform = css; return true;
		}
	}
	return false;
}