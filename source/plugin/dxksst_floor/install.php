<?php
/**
 * 		Copyright���ݸ���
 * 		  WebSite��www.SamrtCome.com
 *             QQ:2811931192
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$installsql = <<<SQL
CREATE TABLE IF NOT EXISTS pre_dxksst_floor (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `pid` mediumint(8) unsigned default '0',
  `thisid` mediumint(8) unsigned default '0',
  `gradation` smallint(3) default '0',
  `uid` mediumint(8) unsigned default '0',
  `username` varchar(30) default '0',
  `message` mediumtext ,
  `dateline` int(10) default '0',
  PRIMARY KEY  (`id`),
  KEY (`id`,`pid`)
) ENGINE=MyISAM;
SQL;
runquery($installsql); 
$finish = 1;
?>
