<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<script type="text/javascript">
// JavaScript Document
function dxksst_reply(id,username,uid){
var m=document.getElementById("dxksst_reply_module_"+id);
var s=document.getElementById("dxksst_floor_reply_"+id); 
var to_user=document.getElementById("dxksst_floor_touid_"+id);  
m.style.display='block';s.focus();s.value="{$txt['reply']} "+username+" :";
to_user.value=uid;
}
function dxksst_addsmiley(smiley,id){var s=document.getElementById("dxksst_floor_reply_"+id); var message=s.value;s.value=message+smiley;}
function play_smiley(id){dxksst_toggle("dxksst_floor_smiley_"+id);}
function dxksst_submit(id,uid,tid,fid,n,total,formid,forbide)
{	if(uid==""){showWindow('login', "member.php?mod=logging"+"&"+"action=login");return false;}
if(forbide){showPrompt(null, null, "{$txt['forbide_reply']}",2000);return false;}
var s=document.getElementById("dxksst_floor_reply_"+id);var message=s.value;
if(message==''){showPrompt(null, null, "{$txt['not_input']}",2000);return false;}if(fucCheckLength(message,n,total)){
ajaxpost(formid,"dxksst_floor_ready_wait_"+id,null,null,dxksst_loop(id));
}}	
function dxksst_loop(id){
var ready=document.getElementById("dxksst_floor_ready_"+id)
var ready_wait=document.getElementById("dxksst_floor_ready_wait_"+id);
ready.innerHTML=ready.innerHTML+ready_wait.innerHTML;
dxksst_toggle("dxksst_reply_module_"+id);
}	
function showreplymodule(id){var s=document.getElementById("dxksst_floor_reply_"+id);dxksst_toggle("dxksst_reply_module_"+id);
document.getElementById("dxksst_floor_touid_"+id).value=0;s.value='';s.focus();}

function showleft(upid){
var url="plugin.php?id=dxksst_floor:ajax"+"&"+"type=left"+"&"+"pid="+upid;ajaxget(url,"dxksst_left_"+upid, null,null,null,function (){var lm=document.getElementById("dxksst_left_message_"+upid);lm.innerHTML="";dxksst_getpageinfo(upid,1);});}
function dxksst_reply_delete(pid,id){
var want_del=document.getElementById("dxksst_floor_li_"+id);
    want_del.parentNode.removeChild(want_del);
var url="plugin.php?id=dxksst_floor:ajax"+"&"+"vid="+id+"&"+"type=delete";
ajaxget(url,"dxksst_floor_dele_"+pid, null,null,null,function (){});
//window.location.reload();
}
function dxksst_toggle_main(id){
var s_mes=document.getElementById("dxksst_floor_message_"+id)
var s=document.getElementById("dxksst_floor_"+id);if(s.style.display=='none'){s.style.display='block';s_mes.innerHTML="{$txt['hide']}";}else{s.style.display='none';s_mes.innerHTML="{$txt['show']}";}}
function dxksst_toggle(id){
var s=document.getElementById(id);if(s.style.display=='none'){s.style.display='block';}else{s.style.display='none';}}
function dxksst_getpage(pid,page){var url="plugin.php?id=dxksst_floor:page"+"&"+"type=page"+"&"+"pid="+pid+"&"+"page="+page;ajaxget(url,"dxksst_page_"+pid, null,null,null,function (){dxksst_getpageinfo(pid,page);})}
function dxksst_getpageinfo(pid,page){var url="plugin.php?id=dxksst_floor:page"+"&"+"type=info"+"&"+"pid="+pid+"&"+"page="+page;ajaxget(url,"dxksst_pagenum_"+pid, null,null,null,function (){})}
function fucCheckLength(strTemp,n,total) 
{ var i,sum;  sum=0;   
for(i=0;i<strTemp.length;i++)   
{  if ((strTemp.charCodeAt(i)>=0) && (strTemp.charCodeAt(i)<=255))    sum=sum+1;   
  else  sum=sum+n;   }   if(sum<total) {alert('{$dxksst['mlimit']}');return false;}return true;}
function to_discuz_submit(){
var preg=/repquote\=.*?extra\=/;
var a=document.getElementsByTagName('a');
var num=a.length;
   for(var i=0;i<num;i++){ 
   var myhref=a[i].href;
  if(preg.test(myhref)){
  var dmatch=myhref.match(preg);
  dmatch=String(dmatch);
  var b=dmatch.split('=');
  var pids=b[1].split('&');
  var pid=pids[0];
  var fa=a[i].parentNode;
  var em=document.createElement('em');
  em.innerHTML='<a class="fastre" href="javascript:;" onclick="showreplymodule('+pid+');">{$txt['reply']}</a>';
          fa.replaceChild(em,a[i]);
  }
   }
}
</script>
<style type="text/css">
.dxksst_floor{
    border: 1px solid #e7e7e7;
    border-radius:5px ;
    margin: -10px 0 20px;
    padding: 0 10px 0;
    text-align: left;
    font-size: 14px!important;
    width:750px;;
    margin-top:{$top}px;
    list-style-type:none;
}
.dxsstt_floor button{ width:1px;}
.dxksst_floor em{

font-size:{$dxksst['font_size']}px;}
.dxksst_floor li
{border-bottom:1px  dotted #e7e7e7; padding-left:10px; padding-top:10px; padding-right:10px;}
.dxksst_avatar{width:32px; height:32px;}
.dxksst_floor img{ vertical-align:middle;}
.dxksst_floor textarea{ width:530px;}
.dxksst_floor font{color:#06C;font-size:{$dxksst['font_size']}px;}
.dxksst_showreply{
/*background: url(source/plugin/dxksst_floor/images/dxksst.png) no-repeat -510px -7px;*/
display: block;
padding-left: 20px;
width: 75px;
height: 25px;
line-height: 25px;
text-align: center;
text-decoration: none;}
.ddd_152{
    padding: 10px 10px 10px 0!important;
}
.ddd_152 em{
    font-size: 11px!important;
}
.dxksst_submit{
cursor: pointer;
float: right;
width: 51px;
height: 24px;
color: #fff;
text-align: center;
background: url(source/plugin/dxksst_floor/images/dxksst.png) no-repeat -344px -7px;	
}
.dxksst_smiley{
width: 33px;
height: 22px;
background: url(/source/plugin/dxksst_floor/images/smiley.png) no-repeat;
cursor: pointer;	
}
</style>

EOF;
?>
