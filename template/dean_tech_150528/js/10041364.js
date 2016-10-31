



















if(typeof doyoo=='undefined' || !doyoo){
var d_genId=function(){
    var id ='',ids='0123456789abcdef';
    for(var i=0;i<34;i++){ id+=ids.charAt(Math.floor(Math.random()*16));  }  return id;
};
var doyoo={
env:{
secure:false,
mon:'http://m8104.looyu.com/monitor',
chat:'http://looyuoms762.looyu.com/chat',
file:'http://static.soperson.com/131221',
compId:20000267,
confId:10041364,
vId:d_genId(),
lang:'',
fixFlash:1,
subComp:0,
_mark:'1751481847ee751b11766273e9c547833f443d9a74e04180fb13eea6a85627180c046ba48fe54ef0'
}

, monParam:{
index:1,

title:'\u5728\u7ebf\u5ba2\u670d',
text:'\u60a8\u597d\uff0c\u6b22\u8fce\u5149\u4e34\u672c\u7ad9\uff0c\u6211\u662f\u4eca\u5929\u7684\u5728\u7ebf\u670d\u52a1\u4eba\u5458\uff0c\u70b9\u51fb\u5f00\u59cb\u4ea4\u8c08\u5373\u53ef\u4e0e\u6211\u6c9f\u901a ',
auto:-1,
group:'10046647',
start:'00:00',
end:'24:00',
mask:false,
status:true,
fx:4,
mini:1,
pos:1,
offShow:0,
loop:0,
autoHide:0,
hidePanel:0,
miniStyle:1,
showPhone:0,
monHideStatus:[0,0,0],
monShowOnly:'',
autoDirectChat:-1
}




};

if(typeof talk99Init == 'function'){
    talk99Init(doyoo);
}



document.write('<div id="doyoo_monitor"></div>');


document.write('<div id="doyoo_share" style="display:none;"></div>');
document.write('<lin'+'k rel="stylesheet" type="text/css" href="http://static.soperson.com/131221/talk99.css?150424"></li'+'nk>');
document.write('<scr'+'ipt type="text/javascript" src="http://static.soperson.com/131221/talk99.js?1504232" charset="utf-8"></scr'+'ipt>');

}

