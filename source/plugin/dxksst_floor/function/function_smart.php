<?php
/**
 * 		Copyright���ݸ���
 * 		  WebSite��www.caogen8.co
 *       QQ:2811931192
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
function floor_main($mobile=0,$is_group=0){
	global $_G,$postlist;
	 $dxksst = $_G['cache']['plugin']['dxksst_floor'];
	 $dxksst_froum=unserialize($dxksst['froums']);
	 $dxksst_users=unserialize($dxksst['users']);
	 if(!($is_group&&$dxksst['allow_group'])){
	 if(!in_array($_G['fid'],$dxksst_froum))return array();}
	 $forbide_reply=0;
	 if(!in_array($_G['groupid'],$dxksst_users))$forbide_reply=1;
	 $txt=lang("plugin/dxksst_floor");
	 $self=$dxksst['self'];
	 $margin= $dxksst['margin'];
	 $space= $dxksst['space'];
	 $top= $dxksst['top'];
	 $limit= $dxksst['limit'];
	 $mlimit=$dxksst[mlimit];
	 $dxksst[mlimit]=preg_replace("/\{n\}/",$dxksst[mlimit],$txt[font_limit]);
	 $addn=2;if($_G['charset']=='utf-8')$addn=3;
	 $dele_uid=$dxksst['deuid'];$del=0;
	 $deuid_ar=explode('|',$dele_uid);
	 if(in_array($_G['uid'],$deuid_ar))$del=1;
	 elseif($_G['username']&&$dxksst['moderator']&&in_array($_G['username'],explode("\t",$_G['forum']['moderators'])))$del=1;
	 require_once libfile('function/discuzcode');
	 require_once libfile('function/smiley','plugin/dxksst_floor');
	 if($self)require_once libfile('function/preg','plugin/dxksst_floor');
	$smiley=get_smiley();
	 $floor=array();$useid=array();
	 $i=0;
	 foreach($postlist as $id => $post){
	 $floor[$i]['have']=0;$useid[$i]=$post['pid'];	 	  
	 if($post['position']!=1){
	 $floor[$i]['have']=1;	 
	  $floor[$i]['total']=C::t("#dxksst_floor#smart")->count_by_where("pid=".(int)($post['pid']));
	  if($mobile)$limit= $dxksst['e_page_num'];
		$querys=C::t("#dxksst_floor#smart")->fetch_all_by_where("pid=".(int)($post['pid']),"dateline asc",0,$limit);
	foreach($querys as$k=>$mood) {
		  $mood['dateline']=date("Y-m-d H:i",$mood['dateline']);
		  $mood['avatar']=avatar($mood['uid'], 'small',true);
		  $mood['message']=discuzcode($mood['message'], $self, 0);
		  if($self){foreach ($smiley as $k=>$v){
			   foreach ($v['img'] as $k1=>$v1){
			   $mood['message']=preg_replace(str_preg($k1),"<img src='./source/plugin/dxksst_floor/images/$k/$v1'/>",$mood['message']);
			  }}}
		  $mood['self']=0; 
		  if($_G['uid']==$mood['uid'])  
		  $mood['self']=1;
		  $floor[$i]['info'][]=$mood;
		  $floor[$i]['authorid']=$post['authorid'];
		  $floor[$i]['have']=2;
		 }	  
	 }
	 $i++;
	 }
	$return_array=array();
	 foreach($floor as $id=>$value){
		 $return='';
		 if($value['have']){
		 $val=$value['info'];$have=$value['have'];$postuid=$value['authorid'];
		 $total_mes=$value['total']; $val_num=count($val);$hidden=$total_mes-$val_num;$upid=$useid[$id];
		 $left_message=preg_replace("/\{n\}/",$hidden,$txt[left_message]);
		 $show=preg_replace("/\{n\}/",$total_mes,$txt[show]);
		 $color= $dxksst['color'];
		 if(!($val_num+1))$color="";
		 include template('dxksst_floor:list');}
		 $return_array[$id]=$return;
		 }
	include template('dxksst_floor:style');	
	if($mobile){
		$_G['setting']['pluginhooks']['viewthread_top_mobile'].=$return;
		}
	else{ 
	$_G['setting']['pluginhooks']['viewthread_beginline'].=$return;	
	if($dxksst['forbid_discuz']){ 
	$jstr='<script type="text/javascript">to_discuz_submit();</script>';
	$_G['setting']['pluginhooks']['viewthread_middle'].=$jstr;	}
	}
	return $return_array;
	}
function add_post($pid,$tid,$fid,$author,$authorid,$message,$dateline,$to_uid,$jf,$txt){
	$pid=(int)($pid);$tid=(int)($tid);$fid=(int)($fid);$authorid=(int)($authorid);
	$dateline=(int)($dateline);$author=daddslashes($author);$message=daddslashes($message);
	$post=array(
	'pid'=>$pid,
	'thisid'=>0,
	'gradation'=>1,
	'uid'=>$authorid,
	'username'=>$author,
	'message'=>$message,
	'dateline'=>$dateline,
	);
	$maxnum=C::t("#dxksst_floor#smart")->insert_new($post);
	$fpid=$pid;	
	if(!$to_uid){$to_uid=C::t("#dxksst_floor#smart")->get_floor_authorid($pid);}
	$authorinfo=getuserbyuid($to_uid);
	$reply_uid=$authorinfo['uid'];
	if(!$reply_uid)exit;
	$reply_user=$authorinfo['username'];
	$rmessage='[quote][size=2][color=#999999]'.$txt[reply].'[url=home.php?mod=space&uid='.$reply_uid.'] '.$reply_user.'[/url]:[/color] [url=forum.php?mod=redirect&goto=findpost&pid='.$fpid.'&ptid='.$tid.'][img]static/image/common/back.gif[/img][/url][/size][/quote]';
	$dmessage=$rmessage.$message;//
	$data=array(
	'fid'=>$fid,
	'tid'=>$tid,
	'first'=>0,
	'author'=>$author,
	'authorid'=>$authorid,
	'subject' => '',
	'dateline'=>$dateline,
	'message'=>daddslashes($dmessage),
	'useip'=>$_SERVER["REMOTE_ADDR"],
	'invisible'=>9,
	'anonymous' => '0','usesig' =>1,'htmlon' => '0','bbcodeoff' => '0','smileyoff' => '0','parseurloff' => '0','attachment' => '0','status' => 0
	);
	//$pid=C::t("#dxksst_floor#smart")->insert_post_to_discuz($data);
	$lastpost = "$tid\t$message\t".time()."\t$author";
	C::t("#dxksst_floor#smart")->after_success_insert(array('authorid'=>$authorid,"author"=>$author),$tid,$fid,$lastpost);
	if($authorid!=$reply_uid){
	$note_array=array(     'tid' => $tid,
							'subject' =>$txt['notice'].$message,
							'fid' => $fid,
							'pid' => $fpid,
							'from_id' =>$tid,
							'from_idtype' => 'post',
										);
	notification_add($reply_uid,'post', "reppost_noticeauthor",$note_array);}
	updatemembercount($authorid, array($jf['type'] => $jf['value']));		
	}
?>