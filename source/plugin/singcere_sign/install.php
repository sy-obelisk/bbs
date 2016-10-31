<?php


if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

$sql = <<<EOF

CREATE TABLE IF NOT EXISTS pre_singcere_sign_log (
  `sid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `message` varchar(255) NOT NULL DEFAULT '',
  `reward` smallint(6) unsigned NOT NULL DEFAULT '0',
  `exreward` smallint(6) unsigned NOT NULL DEFAULT '0',
  `conreward` smallint(6) unsigned NOT NULL DEFAULT '0',
  `gid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`),
  KEY `gid` (`gid`),
  KEY `uid` (`uid`),
  KEY `dateline`(`dateline`, `uid`)
) ENGINE=MYISAM;
    
CREATE TABLE IF NOT EXISTS pre_singcere_sign_count (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `signs` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `msigns` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `rewards` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `continuous` smallint(6) unsigned NOT NULL DEFAULT '0',
  `lastsign` int(10) unsigned NOT NULL DEFAULT '0',
  `lastreward` smallint(6) NOT NULL,
  `lastsid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `uid` (`uid`, `lastsign`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS pre_singcere_sign_gift (
  `gid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(15) NOT NULL DEFAULT '',
  `uids` varchar(255) NOT NULL DEFAULT '',
  `counts` smallint(6) unsigned NOT NULL DEFAULT '0',
  `membertimes` smallint(6) NOT NULL DEFAULT '0',
  `random` varchar(255) NOT NULL DEFAULT '',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM;
EOF;


runquery($sql);

$finish = TRUE;