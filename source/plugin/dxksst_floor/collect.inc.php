<?php
/**
 * 		Copyright���ݸ���
 * 		  WebSite��www.caogen8.co
 *              QQ:2811931192
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$txt=lang("plugin/dxksst_floor");
if(submitcheck('submit')){
showtableheader('', 'psetting');
echo '<tr class="hover hover" align="center">
    <td width="20%"><h1>'.$txt['replypid'].'</h1></td>
    <td width="80%"><h1>'.$txt['replymes'].'</h1></td>
  </tr>';
$sql="SELECT pid,author,authorid,message,dateline FROM ".DB::table('forum_post')." where invisible=0 and position>2 order by dateline asc";
 $querys=DB::query($sql);
 while($mood = DB::fetch($querys)) {
	$num=preg_match("/goto\=findpost.pid\=.*?ptid/",$mood['message'],$match);
	if($num){
     $pid=explode("pid=",$match[0]);
	 $pid=explode("&",$pid[1]);
	 $pid=(int)($pid[0]);
	 if(!$pid)break;
	 $message=explode("[/quote]",$mood['message']);
	 $message=$message[1];
	 $insert=array(
	 'pid'=>$pid,
	 'thisid'=>$mood['pid'],
	 'gradation'=>1,
	 'uid'=>$mood['authorid'],
	 'username'=>daddslashes($mood['author']),
	 'message'=>daddslashes($message),
	 'dateline'=>$mood['dateline']
	 );
      $query=DB::insert("dxksst_floor",$insert);
	  echo '<tr class="hover hover" align="center">
    <td width="20%"><h1>'.$pid.'</h1></td>
    <td width="80%"><h1>'.$message.'</h1></td>
    </tr>';
			$hiddensql="UPDATE ".DB::table('forum_post')." set invisible=9 where pid=".$mood['pid'];
			$query=DB::query($hiddensql);
		} 
	 
	 }
	  echo '<tr class="hover hover" align="center">
    <td colspan="2"><h1><font color="#FF0000">'.$txt['collect_done'].'</font></h1></td>
    </tr>';	 
updatecache("forum");
showtablefooter();			
}
else{
include template('dxksst_floor:collect');
cpmsg($return);		
	}
?>
