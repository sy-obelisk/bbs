<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Deined');
}
define('IN_ADMINCP',true);//����������ͻ�hashkeyֵ�޷����
require_once("thumbbuilder.class.php");
$fid=intval($_GET['fid']);
$starttime=intval($_GET['starttime']);
$endtime=intval($_GET['endtime']);
$index=intval($_GET['index']);
$pertask=intval($_GET['pertask']);
$allthread=intval($_GET['allthread']);
$hashkey=strval($_GET['hashkey']);
if ($hashkey!=formhash()) exit('invalid request.');
global $_G;
$setting=&$_G['cache']['plugin']['chs_tiebalist'];
$widthlimit=$setting['widthlimit'];
$picturenum=$setting['picturenum'];
$outsitethumb=$setting['outsitethumb'];
if ($picturenum<=0) exit;
$threads=C::t('#chs_tiebalist#forum')->fetch_tids_by_timerange($fid,$starttime,$endtime,$index*$pertask,$pertask);
$oTB=new ThumbBuilder();
foreach($threads as $thread)
{
   $firstpost=C::t('#chs_tiebalist#forum')->fetch_post_by_tid($thread['posttableid'],$thread['tid'],$thread['special']);
   //��ȡ���ӵ�ͼƬ
   $attachs=C::t('forum_attachment_n')->fetch_all_by_pid_width('pid:'.$firstpost['pid'],$firstpost['pid'],$widthlimit);
   $len=count($attachs);
   if (($len<$picturenum)&&$outsitethumb){
	   preg_match_all('/(\[img\]|\[img=\d{1,4}[x|\,]\d{1,4}\]|<img.*?src=")\s*([^\[\<\r\n]+?)\s*(\[\/img\]|".*>)/is', $firstpost['message'], $imglist, PREG_SET_ORDER);
	   foreach($imglist as $img){
		   $attachs[]=array('attachment'=>$img[2]);
		   $len++;
		   if ($len>=$picturenum) break;
	   }
   }
   if ($len>$picturenum){
        array_splice($attachs,$picturenum);
    }
   //����Ҫǿ�Ƹ���ʱ����ʹͼƬ����Ϊ0��Ҳ��Ҫ����GetThreadThumbs()����ɾ�����������ͼ�ļ���
   if ($allthread||$attachs){
	  $oTB->GetThreadThumbs($thread['tid'],$attachs,$allthread);
   }	
}
echo "<p>complete once.</p>";
?>

