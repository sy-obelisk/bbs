<?php
/**
 *
 *
 *
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$dxksst = $_G['cache']['plugin']['dxksst_floor'];
$txt=lang("plugin/dxksst_floor");
$type=$_GET['type'];$mod=array("page","info");$pid=(int)($_GET['pid']);
if(!(in_array($type,$mod)&&$pid))exit; 
include template('common/header_ajax');
require_once libfile('class/smart','plugin/dxksst_floor');
$floor_page=new dxksst_page("dxksst_floor","pid=$pid","dateline asc",$dxksst['e_page_num']);
$maxpage=$floor_page->_get("maxpage");
$maxnum=$floor_page->_get("maxnum");
$page=(int)($_GET['page']);
if($type=="page"){
$dele_uid=$dxksst['deuid'];$del=0;
$deuid_ar=explode('|',$dele_uid);
if(in_array($_G['uid'],$deuid_ar))$del=1;
else{
$moderators=C::t("#dxksst_floor#smart")->get_moderators_by_pid($pid);
if($dxksst['moderator']&&in_array($_G['username'],explode("\t",$moderators)))$del=1;
}
 $self=$dxksst['self'];
  if($self){
   require_once libfile('function/smiley','plugin/dxksst_floor');
   require_once libfile('function/preg','plugin/dxksst_floor');
   $smiley=get_smiley();
  }
  require_once libfile('function/discuzcode');
$pageinfo=$floor_page->getpage($page);
foreach ($pageinfo as $k=>$mood){
		  $mood['dateline']=date("Y-m-d H:i",$mood['dateline']);
		  $mood['avatar']=avatar($mood['uid'], 'small',true);
	      $mood['message']=discuzcode($mood['message'], $self, 0);
	      if($self){foreach ($smiley as $k=>$v){
		   foreach ($v['img'] as $k1=>$v1){
		   $mood['message']=preg_replace(str_preg($k1),"<img src='source/plugin/dxksst_floor/images/$k/$v1'/>",$mood['message']);
		  }}}
	  $mood['self']=0; 
	  if($_G['uid']==$mood['uid']) $mood['self']=1; 
	    include template('dxksst_floor:page');  
	
	}
	}
elseif($type=='info'){
if($maxpage>1){
$around=$floor_page->getaround($page,5);
include template('dxksst_floor:around'); 
}}
include template('common/footer_ajax');	