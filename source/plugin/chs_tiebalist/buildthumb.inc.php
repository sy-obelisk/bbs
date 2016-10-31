<?php
if(!defined('IN_DISCUZ')||!defined('IN_ADMINCP')) {
   exit('Access Deined');
}
global $_G;
if (!isset($_G['cache']['plugin']['chs_tiebalist'])) loadcache('plugin');
$setting=&$_G['cache']['plugin']['chs_tiebalist'];
$dyfids = (array)unserialize($setting['forumselected']);
if (!isset($_G['cache']['forums'])) loadcache('forums');
$forums=array();
foreach($dyfids as $fid){
      $forums[$fid]=$_G['cache']['forums'][$fid]['name'];
}
if (submitcheck('buildthumb'))
{  
   $pertask=intval($_POST['pertask']);
   $fid=intval($_POST['fid']);
   $allthread=intval($_POST['allthread']);
   $starttime=strval($_POST['starttime']);
   $endtime=strval($_POST['endtime']);
   if (empty($fid)) exit('no forum chosen.');
   $starttime1=$starttime?date2time($starttime):'';
   $endtime1= $endtime?date2time($endtime):'';
   $num=C::t('#chs_tiebalist#forum')->count_thread_by_timerange($fid,$starttime1,$endtime2);
   if ($pertask<1)  $pertask=1;
   $tasks=ceil($num/$pertask);
   include template('chs_tiebalist:buildthumb_ajax');
}
else include template('chs_tiebalist:buildthumb');

function date2time($date)
{
   $arr=explode("-",$date);
   $year=intval($arr[0]);
   $month=intval($arr[1]);
   $day=intval($arr[2]);
   return mktime(0,0,0,$month,$day,$year);		
}

?>