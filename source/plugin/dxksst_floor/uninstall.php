<?php
/**
 * 		Copyright���ݸ���
 * 		  WebSite��www.caogen8.co
 *             QQ:2811931192
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$sql = <<<SQL

DROP TABLE IF EXISTS pre_dxksst_floor;
SQL;
    runquery($sql);
	$showsql="UPDATE ".DB::table('forum_post')." set invisible=0 where invisible=9";
	$query=DB::query($showsql);
	updatecache("forum");
	$finish=true;

?>