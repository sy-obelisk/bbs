<?php
/**
 * 		Copyright:�ݸ���
 * 		  WebSite:www.caogen8.co
 *             QQ:2811931192
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$txt=lang("plugin/dxksst_floor");
$type=$_GET['type'];
include template('common/header_ajax');
$dxksst = $_G['cache']['plugin']['dxksst_floor'];
$dele_uid=$dxksst['deuid'];$del=0;
$deuid_ar=explode('|',$dele_uid);
if(in_array($_G['uid'],$deuid_ar))$del=1;
 $self=$dxksst['self'];
  if($self){
   require_once libfile('function/smiley','plugin/dxksst_floor');
   require_once libfile('function/preg','plugin/dxksst_floor');
   $smiley=get_smiley();
  }
  require_once libfile('function/discuzcode');
if($type=="reply"){	
if(submitcheck('submit')){
 $upid=(int)($_POST['pid']);	
  $message=$_POST['message'];
  $pid=(int)($_POST['pid']);
  $tid=(int)($_POST['tid']);
  $fid=(int)($_POST['fid']);
  $to_uid=(int)($_POST['touid']);
  $username=$_G['username'];
  $uid=(int)($_G['uid']);
  if($uid&&$pid&&$fid){
  $dateline=strtotime("now");
  require_once libfile('function/smart','plugin/dxksst_floor');
  $jf=array();$jf['type']=$dxksst['jftype'];$jf['value']=$dxksst['jfvalue'];
  add_post($pid,$tid,$fid,$username,$uid,$message,$dateline,$to_uid,$jf,$txt);
   $dxksst = $_G['cache']['plugin']['dxksst_floor'];
   $space= $dxksst['space'];
  $message=discuzcode($message, $self, 0);
		if($self){foreach ($smiley as $k=>$v){
			 foreach ($v['img'] as $k1=>$v1){
			 $message=preg_replace(str_preg($k1),"<img src='./source/plugin/dxksst_floor/images/$k/$v1'/>",$message);
			}}}
  $avatar=avatar($uid, 'small',true);			
  $dateline=date("Y-m-d H:i");
  include template('dxksst_floor:ajax');
  }
}

}

elseif($type=='left'){	
	$pid=(int)($_GET['pid']);
	if(!$del){
	$moderators=C::t("#dxksst_floor#smart")->get_moderators_by_pid($pid);
    if($dxksst['moderator']&&in_array($_G['username'],explode("\t",$moderators)))$del=1;}
	$e_page_num=$dxksst['e_page_num']; $limit= $dxksst['limit'];	
	$left_num=$e_page_num-$limit;
	  if($left_num>0){
	  $querys=C::t("#dxksst_floor#smart")->fetch_all_by_where("pid=".$pid,"dateline asc",$limit,$left_num);
	foreach($querys as$k=>$mood) {
		  $mood['dateline']=date("Y-m-d H:i",$mood['dateline']);
		  $mood['avatar']=avatar($mood['uid'], 'small',true);
		  $mood['message']=discuzcode($mood['message'], $self, 0);
		  if($self){foreach ($smiley as $k=>$v){
		   foreach ($v['img'] as $k1=>$v1){
		   $mood['message']=preg_replace(str_preg($k1),"<img src='source/plugin/dxksst_floor/images/$k/$v1'/>",$mood['message']);
		  }}}
	  $mood['self']=0; 
	  if($_G['uid']==$mood['uid']) $mood['self']=1; 
		include template('dxksst_floor:left');  
			}
	 
	  }
}
	elseif($type=="delete"){
	$id=(int)($_GET['vid']);
	if(!$del){
	$is_my=C::t("#dxksst_floor#smart")->fetch_first_by_id($id);	
	if($is_my['uid']==$_G['uid'])$del=1;
	if(!$del){
	$moderators=C::t("#dxksst_floor#smart")->get_moderators_by_pid($is_my['pid']);
    if($_G['username']&&$dxksst['moderator']&&in_array($_G['username'],explode("\t",$moderators)))$del=1;}
	}
	if($del){
	C::t("#dxksst_floor#smart")->delete_by_where("id=".$id) ;
		}	
		}
	include template('common/footer_ajax');
?>