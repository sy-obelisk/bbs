# Identify: MTQzODU2NzMwOSx1Y2VudGVyLHVjZW50ZXIsbXVsdGl2b2wsMQ==
# <?php exit();?>
# ucenter Multi-Volume Data Dump Vol.1
# Time: 2015-08-03 10:01:49
# Type: ucenter
# Table Prefix: pre_ucenter_
# utf8
# ucenter Home: http://www.comsenz.com
# Please visit our website for newest infomation about ucenter
# --------------------------------------------------------


DROP TABLE IF EXISTS pre_ucenter_admins;
CREATE TABLE pre_ucenter_admins (
  uid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  username char(15) NOT NULL DEFAULT '',
  allowadminsetting tinyint(1) NOT NULL DEFAULT '0',
  allowadminapp tinyint(1) NOT NULL DEFAULT '0',
  allowadminuser tinyint(1) NOT NULL DEFAULT '0',
  allowadminbadword tinyint(1) NOT NULL DEFAULT '0',
  allowadmintag tinyint(1) NOT NULL DEFAULT '0',
  allowadminpm tinyint(1) NOT NULL DEFAULT '0',
  allowadmincredits tinyint(1) NOT NULL DEFAULT '0',
  allowadmindomain tinyint(1) NOT NULL DEFAULT '0',
  allowadmindb tinyint(1) NOT NULL DEFAULT '0',
  allowadminnote tinyint(1) NOT NULL DEFAULT '0',
  allowadmincache tinyint(1) NOT NULL DEFAULT '0',
  allowadminlog tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  UNIQUE KEY username (username)
) ENGINE=MyISAM AUTO_INCREMENT=821 DEFAULT CHARSET=utf8 AUTO_INCREMENT=821;

DROP TABLE IF EXISTS pre_ucenter_applications;
CREATE TABLE pre_ucenter_applications (
  appid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(16) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  authkey varchar(255) NOT NULL DEFAULT '',
  ip varchar(15) NOT NULL DEFAULT '',
  viewprourl varchar(255) NOT NULL,
  apifilename varchar(30) NOT NULL DEFAULT 'uc.php',
  `charset` varchar(8) NOT NULL DEFAULT '',
  dbcharset varchar(8) NOT NULL DEFAULT '',
  synlogin tinyint(1) NOT NULL DEFAULT '0',
  recvnote tinyint(1) DEFAULT '0',
  extra text NOT NULL,
  tagtemplates text NOT NULL,
  allowips text NOT NULL,
  PRIMARY KEY (appid)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;

DROP TABLE IF EXISTS pre_ucenter_badwords;
CREATE TABLE pre_ucenter_badwords (
  id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  admin varchar(15) NOT NULL DEFAULT '',
  find varchar(255) NOT NULL DEFAULT '',
  replacement varchar(255) NOT NULL DEFAULT '',
  findpattern varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  UNIQUE KEY find (find)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS pre_ucenter_domains;
CREATE TABLE pre_ucenter_domains (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  domain char(40) NOT NULL DEFAULT '',
  ip char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS pre_ucenter_failedlogins;
CREATE TABLE pre_ucenter_failedlogins (
  ip char(15) NOT NULL DEFAULT '',
  count tinyint(1) unsigned NOT NULL DEFAULT '0',
  lastupdate int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (ip)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_feeds;
CREATE TABLE pre_ucenter_feeds (
  feedid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  appid varchar(30) NOT NULL DEFAULT '',
  icon varchar(30) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  hash_template varchar(32) NOT NULL DEFAULT '',
  hash_data varchar(32) NOT NULL DEFAULT '',
  title_template text NOT NULL,
  title_data text NOT NULL,
  body_template text NOT NULL,
  body_data text NOT NULL,
  body_general text NOT NULL,
  image_1 varchar(255) NOT NULL DEFAULT '',
  image_1_link varchar(255) NOT NULL DEFAULT '',
  image_2 varchar(255) NOT NULL DEFAULT '',
  image_2_link varchar(255) NOT NULL DEFAULT '',
  image_3 varchar(255) NOT NULL DEFAULT '',
  image_3_link varchar(255) NOT NULL DEFAULT '',
  image_4 varchar(255) NOT NULL DEFAULT '',
  image_4_link varchar(255) NOT NULL DEFAULT '',
  target_ids varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (feedid),
  KEY uid (uid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS pre_ucenter_friends;
CREATE TABLE pre_ucenter_friends (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  friendid mediumint(8) unsigned NOT NULL DEFAULT '0',
  direction tinyint(1) NOT NULL DEFAULT '0',
  version int(10) unsigned NOT NULL AUTO_INCREMENT,
  delstatus tinyint(1) NOT NULL DEFAULT '0',
  `comment` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (version),
  KEY uid (uid),
  KEY friendid (friendid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS pre_ucenter_mailqueue;
CREATE TABLE pre_ucenter_mailqueue (
  mailid int(10) unsigned NOT NULL AUTO_INCREMENT,
  touid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tomail varchar(32) NOT NULL,
  frommail varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  message text NOT NULL,
  `charset` varchar(15) NOT NULL,
  htmlon tinyint(1) NOT NULL DEFAULT '0',
  `level` tinyint(1) NOT NULL DEFAULT '1',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  failures tinyint(3) unsigned NOT NULL DEFAULT '0',
  appid smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (mailid),
  KEY appid (appid),
  KEY `level` (`level`,failures)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS pre_ucenter_memberfields;
CREATE TABLE pre_ucenter_memberfields (
  uid mediumint(8) unsigned NOT NULL,
  blacklist text NOT NULL,
  PRIMARY KEY (uid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_members;
CREATE TABLE pre_ucenter_members (
  uid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  username char(20) DEFAULT NULL,
  `password` char(32) NOT NULL DEFAULT '',
  email char(32) NOT NULL DEFAULT '',
  myid char(30) NOT NULL DEFAULT '',
  myidkey char(16) NOT NULL DEFAULT '',
  regip char(15) NOT NULL DEFAULT '',
  regdate int(10) unsigned NOT NULL DEFAULT '0',
  lastloginip int(10) NOT NULL DEFAULT '0',
  lastlogintime int(10) unsigned NOT NULL DEFAULT '0',
  salt char(6) NOT NULL,
  secques char(8) NOT NULL DEFAULT '',
  PRIMARY KEY (uid),
  UNIQUE KEY username (username),
  KEY email (email)
) ENGINE=MyISAM AUTO_INCREMENT=1528 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1528;

DROP TABLE IF EXISTS pre_ucenter_mergemembers;
CREATE TABLE pre_ucenter_mergemembers (
  appid smallint(6) unsigned NOT NULL,
  username char(15) NOT NULL,
  PRIMARY KEY (appid,username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_newpm;
CREATE TABLE pre_ucenter_newpm (
  uid mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (uid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_notelist;
CREATE TABLE pre_ucenter_notelist (
  noteid int(10) unsigned NOT NULL AUTO_INCREMENT,
  operation char(32) NOT NULL,
  closed tinyint(4) NOT NULL DEFAULT '0',
  totalnum smallint(6) unsigned NOT NULL DEFAULT '0',
  succeednum smallint(6) unsigned NOT NULL DEFAULT '0',
  getdata mediumtext NOT NULL,
  postdata mediumtext NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  pri tinyint(3) NOT NULL DEFAULT '0',
  app3 tinyint(4) NOT NULL,
  PRIMARY KEY (noteid),
  KEY closed (closed,pri,noteid),
  KEY dateline (dateline)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 AUTO_INCREMENT=30;

DROP TABLE IF EXISTS pre_ucenter_pm_indexes;
CREATE TABLE pre_ucenter_pm_indexes (
  pmid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS pre_ucenter_pm_lists;
CREATE TABLE pre_ucenter_pm_lists (
  plid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  pmtype tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(80) NOT NULL,
  members smallint(5) unsigned NOT NULL DEFAULT '0',
  min_max varchar(17) NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  lastmessage text NOT NULL,
  PRIMARY KEY (plid),
  KEY pmtype (pmtype),
  KEY min_max (min_max),
  KEY authorid (authorid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS pre_ucenter_pm_members;
CREATE TABLE pre_ucenter_pm_members (
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  isnew tinyint(1) unsigned NOT NULL DEFAULT '0',
  pmnum int(10) unsigned NOT NULL DEFAULT '0',
  lastupdate int(10) unsigned NOT NULL DEFAULT '0',
  lastdateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (plid,uid),
  KEY isnew (isnew),
  KEY lastdateline (uid,lastdateline),
  KEY lastupdate (uid,lastupdate)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_0;
CREATE TABLE pre_ucenter_pm_messages_0 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_1;
CREATE TABLE pre_ucenter_pm_messages_1 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_2;
CREATE TABLE pre_ucenter_pm_messages_2 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_3;
CREATE TABLE pre_ucenter_pm_messages_3 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_4;
CREATE TABLE pre_ucenter_pm_messages_4 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_5;
CREATE TABLE pre_ucenter_pm_messages_5 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_6;
CREATE TABLE pre_ucenter_pm_messages_6 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_7;
CREATE TABLE pre_ucenter_pm_messages_7 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_8;
CREATE TABLE pre_ucenter_pm_messages_8 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_pm_messages_9;
CREATE TABLE pre_ucenter_pm_messages_9 (
  pmid mediumint(8) unsigned NOT NULL DEFAULT '0',
  plid mediumint(8) unsigned NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_protectedmembers;
CREATE TABLE pre_ucenter_protectedmembers (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  appid tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  admin char(15) NOT NULL DEFAULT '0',
  UNIQUE KEY username (username,appid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_settings;
CREATE TABLE pre_ucenter_settings (
  k varchar(32) NOT NULL DEFAULT '',
  v text NOT NULL,
  PRIMARY KEY (k)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_sqlcache;
CREATE TABLE pre_ucenter_sqlcache (
  sqlid char(6) NOT NULL DEFAULT '',
  `data` char(100) NOT NULL,
  expiry int(10) unsigned NOT NULL,
  PRIMARY KEY (sqlid),
  KEY expiry (expiry)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_tags;
CREATE TABLE pre_ucenter_tags (
  tagname char(20) NOT NULL,
  appid smallint(6) unsigned NOT NULL DEFAULT '0',
  `data` mediumtext,
  expiration int(10) unsigned NOT NULL,
  KEY tagname (tagname,appid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pre_ucenter_vars;
CREATE TABLE pre_ucenter_vars (
  `name` char(32) NOT NULL DEFAULT '',
  `value` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

INSERT INTO pre_ucenter_admins VALUES ('1',0x61646d696e,'1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO pre_ucenter_admins VALUES ('5',0x7468696e6b75,'1','1','1','1','1','1','1','1','1','1','1','1');
INSERT INTO pre_ucenter_admins VALUES ('820',0xe99bb7e593a5474d4154e59ca8e7babf,'1','1','1','1','1','1','1','1','1','1','1','1');

INSERT INTO pre_ucenter_applications VALUES ('3',0x44495343555a58,0x64697363757a,0x687474703a2f2f6262732e676d61746f6e6c696e652e636e,0x6239393532704475464e6778432f6a6f5a645178556c77793342583153776d2b362f51396178556b7651686761315a33514b3762593563,'','',0x75632e706870,'','','1','1',0x613a323a7b733a373a2261707070617468223b733a303a22223b733a383a22657874726175726c223b613a303a7b7d7d,0x3c3f786d6c2076657273696f6e3d22312e302220656e636f64696e673d2249534f2d383835392d31223f3e0d0a3c726f6f743e0d0a093c6974656d2069643d2274656d706c617465223e3c215b43444154415b5d5d3e3c2f6974656d3e0d0a3c2f726f6f743e,'');



INSERT INTO pre_ucenter_failedlogins VALUES (0x3232322e3231302e3136382e3933,'0','1438567288');
INSERT INTO pre_ucenter_failedlogins VALUES (0x376135376135613734333839346130,'0','1438567288');
INSERT INTO pre_ucenter_failedlogins VALUES (0x623935613433343836333061346433,'0','1438567300');




INSERT INTO pre_ucenter_memberfields VALUES ('1','');
INSERT INTO pre_ucenter_memberfields VALUES ('2','');
INSERT INTO pre_ucenter_memberfields VALUES ('3','');
INSERT INTO pre_ucenter_memberfields VALUES ('5','');
INSERT INTO pre_ucenter_memberfields VALUES ('6','');
INSERT INTO pre_ucenter_memberfields VALUES ('7','');
INSERT INTO pre_ucenter_memberfields VALUES ('8','');
INSERT INTO pre_ucenter_memberfields VALUES ('9','');
INSERT INTO pre_ucenter_memberfields VALUES ('10','');
INSERT INTO pre_ucenter_memberfields VALUES ('11','');
INSERT INTO pre_ucenter_memberfields VALUES ('12','');
INSERT INTO pre_ucenter_memberfields VALUES ('13','');
INSERT INTO pre_ucenter_memberfields VALUES ('14','');
INSERT INTO pre_ucenter_memberfields VALUES ('15','');
INSERT INTO pre_ucenter_memberfields VALUES ('16','');
INSERT INTO pre_ucenter_memberfields VALUES ('17','');
INSERT INTO pre_ucenter_memberfields VALUES ('18','');
INSERT INTO pre_ucenter_memberfields VALUES ('19','');
INSERT INTO pre_ucenter_memberfields VALUES ('20','');
INSERT INTO pre_ucenter_memberfields VALUES ('21','');
INSERT INTO pre_ucenter_memberfields VALUES ('22','');
INSERT INTO pre_ucenter_memberfields VALUES ('23','');
INSERT INTO pre_ucenter_memberfields VALUES ('24','');
INSERT INTO pre_ucenter_memberfields VALUES ('25','');
INSERT INTO pre_ucenter_memberfields VALUES ('26','');
INSERT INTO pre_ucenter_memberfields VALUES ('27','');
INSERT INTO pre_ucenter_memberfields VALUES ('28','');
INSERT INTO pre_ucenter_memberfields VALUES ('29','');
INSERT INTO pre_ucenter_memberfields VALUES ('30','');
INSERT INTO pre_ucenter_memberfields VALUES ('31','');
INSERT INTO pre_ucenter_memberfields VALUES ('32','');
INSERT INTO pre_ucenter_memberfields VALUES ('33','');
INSERT INTO pre_ucenter_memberfields VALUES ('34','');
INSERT INTO pre_ucenter_memberfields VALUES ('35','');
INSERT INTO pre_ucenter_memberfields VALUES ('36','');
INSERT INTO pre_ucenter_memberfields VALUES ('37','');
INSERT INTO pre_ucenter_memberfields VALUES ('38','');
INSERT INTO pre_ucenter_memberfields VALUES ('39','');
INSERT INTO pre_ucenter_memberfields VALUES ('40','');
INSERT INTO pre_ucenter_memberfields VALUES ('41','');
INSERT INTO pre_ucenter_memberfields VALUES ('42','');
INSERT INTO pre_ucenter_memberfields VALUES ('43','');
INSERT INTO pre_ucenter_memberfields VALUES ('44','');
INSERT INTO pre_ucenter_memberfields VALUES ('45','');
INSERT INTO pre_ucenter_memberfields VALUES ('46','');
INSERT INTO pre_ucenter_memberfields VALUES ('47','');
INSERT INTO pre_ucenter_memberfields VALUES ('48','');
INSERT INTO pre_ucenter_memberfields VALUES ('49','');
INSERT INTO pre_ucenter_memberfields VALUES ('50','');
INSERT INTO pre_ucenter_memberfields VALUES ('51','');
INSERT INTO pre_ucenter_memberfields VALUES ('52','');
INSERT INTO pre_ucenter_memberfields VALUES ('53','');
INSERT INTO pre_ucenter_memberfields VALUES ('54','');
INSERT INTO pre_ucenter_memberfields VALUES ('55','');
INSERT INTO pre_ucenter_memberfields VALUES ('56','');
INSERT INTO pre_ucenter_memberfields VALUES ('57','');
INSERT INTO pre_ucenter_memberfields VALUES ('58','');
INSERT INTO pre_ucenter_memberfields VALUES ('59','');
INSERT INTO pre_ucenter_memberfields VALUES ('60','');
INSERT INTO pre_ucenter_memberfields VALUES ('61','');
INSERT INTO pre_ucenter_memberfields VALUES ('62','');
INSERT INTO pre_ucenter_memberfields VALUES ('63','');
INSERT INTO pre_ucenter_memberfields VALUES ('64','');
INSERT INTO pre_ucenter_memberfields VALUES ('65','');
INSERT INTO pre_ucenter_memberfields VALUES ('66','');
INSERT INTO pre_ucenter_memberfields VALUES ('67','');
INSERT INTO pre_ucenter_memberfields VALUES ('68','');
INSERT INTO pre_ucenter_memberfields VALUES ('69','');
INSERT INTO pre_ucenter_memberfields VALUES ('70','');
INSERT INTO pre_ucenter_memberfields VALUES ('71','');
INSERT INTO pre_ucenter_memberfields VALUES ('72','');
INSERT INTO pre_ucenter_memberfields VALUES ('73','');
INSERT INTO pre_ucenter_memberfields VALUES ('74','');
INSERT INTO pre_ucenter_memberfields VALUES ('75','');
INSERT INTO pre_ucenter_memberfields VALUES ('76','');
INSERT INTO pre_ucenter_memberfields VALUES ('77','');
INSERT INTO pre_ucenter_memberfields VALUES ('78','');
INSERT INTO pre_ucenter_memberfields VALUES ('79','');
INSERT INTO pre_ucenter_memberfields VALUES ('80','');
INSERT INTO pre_ucenter_memberfields VALUES ('81','');
INSERT INTO pre_ucenter_memberfields VALUES ('82','');
INSERT INTO pre_ucenter_memberfields VALUES ('83','');
INSERT INTO pre_ucenter_memberfields VALUES ('84','');
INSERT INTO pre_ucenter_memberfields VALUES ('85','');
INSERT INTO pre_ucenter_memberfields VALUES ('86','');
INSERT INTO pre_ucenter_memberfields VALUES ('87','');
INSERT INTO pre_ucenter_memberfields VALUES ('88','');
INSERT INTO pre_ucenter_memberfields VALUES ('89','');
INSERT INTO pre_ucenter_memberfields VALUES ('90','');
INSERT INTO pre_ucenter_memberfields VALUES ('91','');
INSERT INTO pre_ucenter_memberfields VALUES ('92','');
INSERT INTO pre_ucenter_memberfields VALUES ('93','');
INSERT INTO pre_ucenter_memberfields VALUES ('94','');
INSERT INTO pre_ucenter_memberfields VALUES ('95','');
INSERT INTO pre_ucenter_memberfields VALUES ('96','');
INSERT INTO pre_ucenter_memberfields VALUES ('97','');
INSERT INTO pre_ucenter_memberfields VALUES ('98','');
INSERT INTO pre_ucenter_memberfields VALUES ('99','');
INSERT INTO pre_ucenter_memberfields VALUES ('100','');
INSERT INTO pre_ucenter_memberfields VALUES ('101','');
INSERT INTO pre_ucenter_memberfields VALUES ('102','');
INSERT INTO pre_ucenter_memberfields VALUES ('103','');
INSERT INTO pre_ucenter_memberfields VALUES ('104','');
INSERT INTO pre_ucenter_memberfields VALUES ('105','');
INSERT INTO pre_ucenter_memberfields VALUES ('106','');
INSERT INTO pre_ucenter_memberfields VALUES ('107','');
INSERT INTO pre_ucenter_memberfields VALUES ('108','');
INSERT INTO pre_ucenter_memberfields VALUES ('109','');
INSERT INTO pre_ucenter_memberfields VALUES ('110','');
INSERT INTO pre_ucenter_memberfields VALUES ('111','');
INSERT INTO pre_ucenter_memberfields VALUES ('112','');
INSERT INTO pre_ucenter_memberfields VALUES ('113','');
INSERT INTO pre_ucenter_memberfields VALUES ('114','');
INSERT INTO pre_ucenter_memberfields VALUES ('115','');
INSERT INTO pre_ucenter_memberfields VALUES ('116','');
INSERT INTO pre_ucenter_memberfields VALUES ('117','');
INSERT INTO pre_ucenter_memberfields VALUES ('118','');
INSERT INTO pre_ucenter_memberfields VALUES ('119','');
INSERT INTO pre_ucenter_memberfields VALUES ('120','');
INSERT INTO pre_ucenter_memberfields VALUES ('121','');
INSERT INTO pre_ucenter_memberfields VALUES ('122','');
INSERT INTO pre_ucenter_memberfields VALUES ('123','');
INSERT INTO pre_ucenter_memberfields VALUES ('124','');
INSERT INTO pre_ucenter_memberfields VALUES ('125','');
INSERT INTO pre_ucenter_memberfields VALUES ('126','');
INSERT INTO pre_ucenter_memberfields VALUES ('127','');
INSERT INTO pre_ucenter_memberfields VALUES ('128','');
INSERT INTO pre_ucenter_memberfields VALUES ('129','');
INSERT INTO pre_ucenter_memberfields VALUES ('130','');
INSERT INTO pre_ucenter_memberfields VALUES ('131','');
INSERT INTO pre_ucenter_memberfields VALUES ('132','');
INSERT INTO pre_ucenter_memberfields VALUES ('133','');
INSERT INTO pre_ucenter_memberfields VALUES ('134','');
INSERT INTO pre_ucenter_memberfields VALUES ('135','');
INSERT INTO pre_ucenter_memberfields VALUES ('136','');
INSERT INTO pre_ucenter_memberfields VALUES ('137','');
INSERT INTO pre_ucenter_memberfields VALUES ('138','');
INSERT INTO pre_ucenter_memberfields VALUES ('139','');
INSERT INTO pre_ucenter_memberfields VALUES ('140','');
INSERT INTO pre_ucenter_memberfields VALUES ('141','');
INSERT INTO pre_ucenter_memberfields VALUES ('142','');
INSERT INTO pre_ucenter_memberfields VALUES ('143','');
INSERT INTO pre_ucenter_memberfields VALUES ('144','');
INSERT INTO pre_ucenter_memberfields VALUES ('145','');
INSERT INTO pre_ucenter_memberfields VALUES ('146','');
INSERT INTO pre_ucenter_memberfields VALUES ('147','');
INSERT INTO pre_ucenter_memberfields VALUES ('148','');
INSERT INTO pre_ucenter_memberfields VALUES ('149','');
INSERT INTO pre_ucenter_memberfields VALUES ('150','');
INSERT INTO pre_ucenter_memberfields VALUES ('151','');
INSERT INTO pre_ucenter_memberfields VALUES ('152','');
INSERT INTO pre_ucenter_memberfields VALUES ('153','');
INSERT INTO pre_ucenter_memberfields VALUES ('154','');
INSERT INTO pre_ucenter_memberfields VALUES ('155','');
INSERT INTO pre_ucenter_memberfields VALUES ('156','');
INSERT INTO pre_ucenter_memberfields VALUES ('157','');
INSERT INTO pre_ucenter_memberfields VALUES ('158','');
INSERT INTO pre_ucenter_memberfields VALUES ('159','');
INSERT INTO pre_ucenter_memberfields VALUES ('160','');
INSERT INTO pre_ucenter_memberfields VALUES ('161','');
INSERT INTO pre_ucenter_memberfields VALUES ('162','');
INSERT INTO pre_ucenter_memberfields VALUES ('163','');
INSERT INTO pre_ucenter_memberfields VALUES ('164','');
INSERT INTO pre_ucenter_memberfields VALUES ('165','');
INSERT INTO pre_ucenter_memberfields VALUES ('166','');
INSERT INTO pre_ucenter_memberfields VALUES ('167','');
INSERT INTO pre_ucenter_memberfields VALUES ('168','');
INSERT INTO pre_ucenter_memberfields VALUES ('169','');
INSERT INTO pre_ucenter_memberfields VALUES ('170','');
INSERT INTO pre_ucenter_memberfields VALUES ('171','');
INSERT INTO pre_ucenter_memberfields VALUES ('172','');
INSERT INTO pre_ucenter_memberfields VALUES ('173','');
INSERT INTO pre_ucenter_memberfields VALUES ('174','');
INSERT INTO pre_ucenter_memberfields VALUES ('175','');
INSERT INTO pre_ucenter_memberfields VALUES ('176','');
INSERT INTO pre_ucenter_memberfields VALUES ('177','');
INSERT INTO pre_ucenter_memberfields VALUES ('178','');
INSERT INTO pre_ucenter_memberfields VALUES ('179','');
INSERT INTO pre_ucenter_memberfields VALUES ('180','');
INSERT INTO pre_ucenter_memberfields VALUES ('181','');
INSERT INTO pre_ucenter_memberfields VALUES ('182','');
INSERT INTO pre_ucenter_memberfields VALUES ('183','');
INSERT INTO pre_ucenter_memberfields VALUES ('184','');
INSERT INTO pre_ucenter_memberfields VALUES ('185','');
INSERT INTO pre_ucenter_memberfields VALUES ('186','');
INSERT INTO pre_ucenter_memberfields VALUES ('187','');
INSERT INTO pre_ucenter_memberfields VALUES ('188','');
INSERT INTO pre_ucenter_memberfields VALUES ('189','');
INSERT INTO pre_ucenter_memberfields VALUES ('190','');
INSERT INTO pre_ucenter_memberfields VALUES ('191','');
INSERT INTO pre_ucenter_memberfields VALUES ('192','');
INSERT INTO pre_ucenter_memberfields VALUES ('193','');
INSERT INTO pre_ucenter_memberfields VALUES ('194','');
INSERT INTO pre_ucenter_memberfields VALUES ('195','');
INSERT INTO pre_ucenter_memberfields VALUES ('196','');
INSERT INTO pre_ucenter_memberfields VALUES ('197','');
INSERT INTO pre_ucenter_memberfields VALUES ('198','');
INSERT INTO pre_ucenter_memberfields VALUES ('199','');
INSERT INTO pre_ucenter_memberfields VALUES ('200','');
INSERT INTO pre_ucenter_memberfields VALUES ('201','');
INSERT INTO pre_ucenter_memberfields VALUES ('202','');
INSERT INTO pre_ucenter_memberfields VALUES ('203','');
INSERT INTO pre_ucenter_memberfields VALUES ('204','');
INSERT INTO pre_ucenter_memberfields VALUES ('205','');
INSERT INTO pre_ucenter_memberfields VALUES ('206','');
INSERT INTO pre_ucenter_memberfields VALUES ('207','');
INSERT INTO pre_ucenter_memberfields VALUES ('208','');
INSERT INTO pre_ucenter_memberfields VALUES ('209','');
INSERT INTO pre_ucenter_memberfields VALUES ('210','');
INSERT INTO pre_ucenter_memberfields VALUES ('211','');
INSERT INTO pre_ucenter_memberfields VALUES ('212','');
INSERT INTO pre_ucenter_memberfields VALUES ('213','');
INSERT INTO pre_ucenter_memberfields VALUES ('214','');
INSERT INTO pre_ucenter_memberfields VALUES ('215','');
INSERT INTO pre_ucenter_memberfields VALUES ('216','');
INSERT INTO pre_ucenter_memberfields VALUES ('217','');
INSERT INTO pre_ucenter_memberfields VALUES ('218','');
INSERT INTO pre_ucenter_memberfields VALUES ('219','');
INSERT INTO pre_ucenter_memberfields VALUES ('220','');
INSERT INTO pre_ucenter_memberfields VALUES ('221','');
INSERT INTO pre_ucenter_memberfields VALUES ('222','');
INSERT INTO pre_ucenter_memberfields VALUES ('223','');
INSERT INTO pre_ucenter_memberfields VALUES ('224','');
INSERT INTO pre_ucenter_memberfields VALUES ('225','');
INSERT INTO pre_ucenter_memberfields VALUES ('226','');
INSERT INTO pre_ucenter_memberfields VALUES ('227','');
INSERT INTO pre_ucenter_memberfields VALUES ('228','');
INSERT INTO pre_ucenter_memberfields VALUES ('229','');
INSERT INTO pre_ucenter_memberfields VALUES ('230','');
INSERT INTO pre_ucenter_memberfields VALUES ('231','');
INSERT INTO pre_ucenter_memberfields VALUES ('232','');
INSERT INTO pre_ucenter_memberfields VALUES ('233','');
INSERT INTO pre_ucenter_memberfields VALUES ('234','');
INSERT INTO pre_ucenter_memberfields VALUES ('235','');
INSERT INTO pre_ucenter_memberfields VALUES ('236','');
INSERT INTO pre_ucenter_memberfields VALUES ('237','');
INSERT INTO pre_ucenter_memberfields VALUES ('238','');
INSERT INTO pre_ucenter_memberfields VALUES ('239','');
INSERT INTO pre_ucenter_memberfields VALUES ('240','');
INSERT INTO pre_ucenter_memberfields VALUES ('241','');
INSERT INTO pre_ucenter_memberfields VALUES ('242','');
INSERT INTO pre_ucenter_memberfields VALUES ('243','');
INSERT INTO pre_ucenter_memberfields VALUES ('244','');
INSERT INTO pre_ucenter_memberfields VALUES ('245','');
INSERT INTO pre_ucenter_memberfields VALUES ('246','');
INSERT INTO pre_ucenter_memberfields VALUES ('247','');
INSERT INTO pre_ucenter_memberfields VALUES ('248','');
INSERT INTO pre_ucenter_memberfields VALUES ('249','');
INSERT INTO pre_ucenter_memberfields VALUES ('250','');
INSERT INTO pre_ucenter_memberfields VALUES ('251','');
INSERT INTO pre_ucenter_memberfields VALUES ('252','');
INSERT INTO pre_ucenter_memberfields VALUES ('253','');
INSERT INTO pre_ucenter_memberfields VALUES ('254','');
INSERT INTO pre_ucenter_memberfields VALUES ('255','');
INSERT INTO pre_ucenter_memberfields VALUES ('256','');
INSERT INTO pre_ucenter_memberfields VALUES ('257','');
INSERT INTO pre_ucenter_memberfields VALUES ('258','');
INSERT INTO pre_ucenter_memberfields VALUES ('259','');
INSERT INTO pre_ucenter_memberfields VALUES ('260','');
INSERT INTO pre_ucenter_memberfields VALUES ('261','');
INSERT INTO pre_ucenter_memberfields VALUES ('262','');
INSERT INTO pre_ucenter_memberfields VALUES ('263','');
INSERT INTO pre_ucenter_memberfields VALUES ('264','');
INSERT INTO pre_ucenter_memberfields VALUES ('265','');
INSERT INTO pre_ucenter_memberfields VALUES ('266','');
INSERT INTO pre_ucenter_memberfields VALUES ('267','');
INSERT INTO pre_ucenter_memberfields VALUES ('268','');
INSERT INTO pre_ucenter_memberfields VALUES ('269','');
INSERT INTO pre_ucenter_memberfields VALUES ('270','');
INSERT INTO pre_ucenter_memberfields VALUES ('271','');
INSERT INTO pre_ucenter_memberfields VALUES ('272','');
INSERT INTO pre_ucenter_memberfields VALUES ('273','');
INSERT INTO pre_ucenter_memberfields VALUES ('274','');
INSERT INTO pre_ucenter_memberfields VALUES ('275','');
INSERT INTO pre_ucenter_memberfields VALUES ('276','');
INSERT INTO pre_ucenter_memberfields VALUES ('277','');
INSERT INTO pre_ucenter_memberfields VALUES ('278','');
INSERT INTO pre_ucenter_memberfields VALUES ('279','');
INSERT INTO pre_ucenter_memberfields VALUES ('280','');
INSERT INTO pre_ucenter_memberfields VALUES ('281','');
INSERT INTO pre_ucenter_memberfields VALUES ('282','');
INSERT INTO pre_ucenter_memberfields VALUES ('283','');
INSERT INTO pre_ucenter_memberfields VALUES ('284','');
INSERT INTO pre_ucenter_memberfields VALUES ('285','');
INSERT INTO pre_ucenter_memberfields VALUES ('286','');
INSERT INTO pre_ucenter_memberfields VALUES ('287','');
INSERT INTO pre_ucenter_memberfields VALUES ('288','');
INSERT INTO pre_ucenter_memberfields VALUES ('289','');
INSERT INTO pre_ucenter_memberfields VALUES ('290','');
INSERT INTO pre_ucenter_memberfields VALUES ('291','');
INSERT INTO pre_ucenter_memberfields VALUES ('292','');
INSERT INTO pre_ucenter_memberfields VALUES ('293','');
INSERT INTO pre_ucenter_memberfields VALUES ('294','');
INSERT INTO pre_ucenter_memberfields VALUES ('295','');
INSERT INTO pre_ucenter_memberfields VALUES ('296','');
INSERT INTO pre_ucenter_memberfields VALUES ('297','');
INSERT INTO pre_ucenter_memberfields VALUES ('298','');
INSERT INTO pre_ucenter_memberfields VALUES ('299','');
INSERT INTO pre_ucenter_memberfields VALUES ('300','');
INSERT INTO pre_ucenter_memberfields VALUES ('301','');
INSERT INTO pre_ucenter_memberfields VALUES ('302','');
INSERT INTO pre_ucenter_memberfields VALUES ('303','');
INSERT INTO pre_ucenter_memberfields VALUES ('304','');
INSERT INTO pre_ucenter_memberfields VALUES ('305','');
INSERT INTO pre_ucenter_memberfields VALUES ('306','');
INSERT INTO pre_ucenter_memberfields VALUES ('307','');
INSERT INTO pre_ucenter_memberfields VALUES ('308','');
INSERT INTO pre_ucenter_memberfields VALUES ('309','');
INSERT INTO pre_ucenter_memberfields VALUES ('310','');
INSERT INTO pre_ucenter_memberfields VALUES ('311','');
INSERT INTO pre_ucenter_memberfields VALUES ('312','');
INSERT INTO pre_ucenter_memberfields VALUES ('313','');
INSERT INTO pre_ucenter_memberfields VALUES ('314','');
INSERT INTO pre_ucenter_memberfields VALUES ('315','');
INSERT INTO pre_ucenter_memberfields VALUES ('316','');
INSERT INTO pre_ucenter_memberfields VALUES ('317','');
INSERT INTO pre_ucenter_memberfields VALUES ('318','');
INSERT INTO pre_ucenter_memberfields VALUES ('319','');
INSERT INTO pre_ucenter_memberfields VALUES ('320','');
INSERT INTO pre_ucenter_memberfields VALUES ('321','');
INSERT INTO pre_ucenter_memberfields VALUES ('322','');
INSERT INTO pre_ucenter_memberfields VALUES ('323','');
INSERT INTO pre_ucenter_memberfields VALUES ('324','');
INSERT INTO pre_ucenter_memberfields VALUES ('325','');
INSERT INTO pre_ucenter_memberfields VALUES ('326','');
INSERT INTO pre_ucenter_memberfields VALUES ('327','');
INSERT INTO pre_ucenter_memberfields VALUES ('328','');
INSERT INTO pre_ucenter_memberfields VALUES ('329','');
INSERT INTO pre_ucenter_memberfields VALUES ('330','');
INSERT INTO pre_ucenter_memberfields VALUES ('331','');
INSERT INTO pre_ucenter_memberfields VALUES ('332','');
INSERT INTO pre_ucenter_memberfields VALUES ('333','');
INSERT INTO pre_ucenter_memberfields VALUES ('334','');
INSERT INTO pre_ucenter_memberfields VALUES ('335','');
INSERT INTO pre_ucenter_memberfields VALUES ('336','');
INSERT INTO pre_ucenter_memberfields VALUES ('337','');
INSERT INTO pre_ucenter_memberfields VALUES ('338','');
INSERT INTO pre_ucenter_memberfields VALUES ('339','');
INSERT INTO pre_ucenter_memberfields VALUES ('340','');
INSERT INTO pre_ucenter_memberfields VALUES ('341','');
INSERT INTO pre_ucenter_memberfields VALUES ('342','');
INSERT INTO pre_ucenter_memberfields VALUES ('343','');
INSERT INTO pre_ucenter_memberfields VALUES ('344','');
INSERT INTO pre_ucenter_memberfields VALUES ('345','');
INSERT INTO pre_ucenter_memberfields VALUES ('346','');
INSERT INTO pre_ucenter_memberfields VALUES ('347','');
INSERT INTO pre_ucenter_memberfields VALUES ('348','');
INSERT INTO pre_ucenter_memberfields VALUES ('349','');
INSERT INTO pre_ucenter_memberfields VALUES ('350','');
INSERT INTO pre_ucenter_memberfields VALUES ('351','');
INSERT INTO pre_ucenter_memberfields VALUES ('352','');
INSERT INTO pre_ucenter_memberfields VALUES ('353','');
INSERT INTO pre_ucenter_memberfields VALUES ('354','');
INSERT INTO pre_ucenter_memberfields VALUES ('355','');
INSERT INTO pre_ucenter_memberfields VALUES ('356','');
INSERT INTO pre_ucenter_memberfields VALUES ('357','');
INSERT INTO pre_ucenter_memberfields VALUES ('358','');
INSERT INTO pre_ucenter_memberfields VALUES ('359','');
INSERT INTO pre_ucenter_memberfields VALUES ('360','');
INSERT INTO pre_ucenter_memberfields VALUES ('361','');
INSERT INTO pre_ucenter_memberfields VALUES ('362','');
INSERT INTO pre_ucenter_memberfields VALUES ('363','');
INSERT INTO pre_ucenter_memberfields VALUES ('364','');
INSERT INTO pre_ucenter_memberfields VALUES ('365','');
INSERT INTO pre_ucenter_memberfields VALUES ('366','');
INSERT INTO pre_ucenter_memberfields VALUES ('367','');
INSERT INTO pre_ucenter_memberfields VALUES ('368','');
INSERT INTO pre_ucenter_memberfields VALUES ('369','');
INSERT INTO pre_ucenter_memberfields VALUES ('370','');
INSERT INTO pre_ucenter_memberfields VALUES ('371','');
INSERT INTO pre_ucenter_memberfields VALUES ('372','');
INSERT INTO pre_ucenter_memberfields VALUES ('373','');
INSERT INTO pre_ucenter_memberfields VALUES ('374','');
INSERT INTO pre_ucenter_memberfields VALUES ('375','');
INSERT INTO pre_ucenter_memberfields VALUES ('376','');
INSERT INTO pre_ucenter_memberfields VALUES ('377','');
INSERT INTO pre_ucenter_memberfields VALUES ('378','');
INSERT INTO pre_ucenter_memberfields VALUES ('379','');
INSERT INTO pre_ucenter_memberfields VALUES ('380','');
INSERT INTO pre_ucenter_memberfields VALUES ('381','');
INSERT INTO pre_ucenter_memberfields VALUES ('382','');
INSERT INTO pre_ucenter_memberfields VALUES ('383','');
INSERT INTO pre_ucenter_memberfields VALUES ('384','');
INSERT INTO pre_ucenter_memberfields VALUES ('385','');
INSERT INTO pre_ucenter_memberfields VALUES ('386','');
INSERT INTO pre_ucenter_memberfields VALUES ('387','');
INSERT INTO pre_ucenter_memberfields VALUES ('388','');
INSERT INTO pre_ucenter_memberfields VALUES ('389','');
INSERT INTO pre_ucenter_memberfields VALUES ('390','');
INSERT INTO pre_ucenter_memberfields VALUES ('391','');
INSERT INTO pre_ucenter_memberfields VALUES ('392','');
INSERT INTO pre_ucenter_memberfields VALUES ('393','');
INSERT INTO pre_ucenter_memberfields VALUES ('394','');
INSERT INTO pre_ucenter_memberfields VALUES ('395','');
INSERT INTO pre_ucenter_memberfields VALUES ('396','');
INSERT INTO pre_ucenter_memberfields VALUES ('397','');
INSERT INTO pre_ucenter_memberfields VALUES ('398','');
INSERT INTO pre_ucenter_memberfields VALUES ('399','');
INSERT INTO pre_ucenter_memberfields VALUES ('400','');
INSERT INTO pre_ucenter_memberfields VALUES ('401','');
INSERT INTO pre_ucenter_memberfields VALUES ('402','');
INSERT INTO pre_ucenter_memberfields VALUES ('403','');
INSERT INTO pre_ucenter_memberfields VALUES ('404','');
INSERT INTO pre_ucenter_memberfields VALUES ('405','');
INSERT INTO pre_ucenter_memberfields VALUES ('406','');
INSERT INTO pre_ucenter_memberfields VALUES ('407','');
INSERT INTO pre_ucenter_memberfields VALUES ('408','');
INSERT INTO pre_ucenter_memberfields VALUES ('409','');
INSERT INTO pre_ucenter_memberfields VALUES ('410','');
INSERT INTO pre_ucenter_memberfields VALUES ('411','');
INSERT INTO pre_ucenter_memberfields VALUES ('412','');
INSERT INTO pre_ucenter_memberfields VALUES ('413','');
INSERT INTO pre_ucenter_memberfields VALUES ('414','');
INSERT INTO pre_ucenter_memberfields VALUES ('415','');
INSERT INTO pre_ucenter_memberfields VALUES ('416','');
INSERT INTO pre_ucenter_memberfields VALUES ('417','');
INSERT INTO pre_ucenter_memberfields VALUES ('418','');
INSERT INTO pre_ucenter_memberfields VALUES ('419','');
INSERT INTO pre_ucenter_memberfields VALUES ('420','');
INSERT INTO pre_ucenter_memberfields VALUES ('421','');
INSERT INTO pre_ucenter_memberfields VALUES ('422','');
INSERT INTO pre_ucenter_memberfields VALUES ('423','');
INSERT INTO pre_ucenter_memberfields VALUES ('424','');
INSERT INTO pre_ucenter_memberfields VALUES ('425','');
INSERT INTO pre_ucenter_memberfields VALUES ('426','');
INSERT INTO pre_ucenter_memberfields VALUES ('427','');
INSERT INTO pre_ucenter_memberfields VALUES ('428','');
INSERT INTO pre_ucenter_memberfields VALUES ('429','');
INSERT INTO pre_ucenter_memberfields VALUES ('430','');
INSERT INTO pre_ucenter_memberfields VALUES ('431','');
INSERT INTO pre_ucenter_memberfields VALUES ('432','');
INSERT INTO pre_ucenter_memberfields VALUES ('433','');
INSERT INTO pre_ucenter_memberfields VALUES ('434','');
INSERT INTO pre_ucenter_memberfields VALUES ('435','');
INSERT INTO pre_ucenter_memberfields VALUES ('436','');
INSERT INTO pre_ucenter_memberfields VALUES ('437','');
INSERT INTO pre_ucenter_memberfields VALUES ('438','');
INSERT INTO pre_ucenter_memberfields VALUES ('439','');
INSERT INTO pre_ucenter_memberfields VALUES ('440','');
INSERT INTO pre_ucenter_memberfields VALUES ('441','');
INSERT INTO pre_ucenter_memberfields VALUES ('442','');
INSERT INTO pre_ucenter_memberfields VALUES ('443','');
INSERT INTO pre_ucenter_memberfields VALUES ('444','');
INSERT INTO pre_ucenter_memberfields VALUES ('445','');
INSERT INTO pre_ucenter_memberfields VALUES ('446','');
INSERT INTO pre_ucenter_memberfields VALUES ('447','');
INSERT INTO pre_ucenter_memberfields VALUES ('448','');
INSERT INTO pre_ucenter_memberfields VALUES ('449','');
INSERT INTO pre_ucenter_memberfields VALUES ('450','');
INSERT INTO pre_ucenter_memberfields VALUES ('451','');
INSERT INTO pre_ucenter_memberfields VALUES ('452','');
INSERT INTO pre_ucenter_memberfields VALUES ('453','');
INSERT INTO pre_ucenter_memberfields VALUES ('454','');
INSERT INTO pre_ucenter_memberfields VALUES ('455','');
INSERT INTO pre_ucenter_memberfields VALUES ('456','');
INSERT INTO pre_ucenter_memberfields VALUES ('457','');
INSERT INTO pre_ucenter_memberfields VALUES ('458','');
INSERT INTO pre_ucenter_memberfields VALUES ('459','');
INSERT INTO pre_ucenter_memberfields VALUES ('460','');
INSERT INTO pre_ucenter_memberfields VALUES ('461','');
INSERT INTO pre_ucenter_memberfields VALUES ('462','');
INSERT INTO pre_ucenter_memberfields VALUES ('463','');
INSERT INTO pre_ucenter_memberfields VALUES ('464','');
INSERT INTO pre_ucenter_memberfields VALUES ('465','');
INSERT INTO pre_ucenter_memberfields VALUES ('466','');
INSERT INTO pre_ucenter_memberfields VALUES ('467','');
INSERT INTO pre_ucenter_memberfields VALUES ('468','');
INSERT INTO pre_ucenter_memberfields VALUES ('469','');
INSERT INTO pre_ucenter_memberfields VALUES ('470','');
INSERT INTO pre_ucenter_memberfields VALUES ('471','');
INSERT INTO pre_ucenter_memberfields VALUES ('472','');
INSERT INTO pre_ucenter_memberfields VALUES ('473','');
INSERT INTO pre_ucenter_memberfields VALUES ('474','');
INSERT INTO pre_ucenter_memberfields VALUES ('475','');
INSERT INTO pre_ucenter_memberfields VALUES ('476','');
INSERT INTO pre_ucenter_memberfields VALUES ('477','');
INSERT INTO pre_ucenter_memberfields VALUES ('478','');
INSERT INTO pre_ucenter_memberfields VALUES ('479','');
INSERT INTO pre_ucenter_memberfields VALUES ('480','');
INSERT INTO pre_ucenter_memberfields VALUES ('481','');
INSERT INTO pre_ucenter_memberfields VALUES ('482','');
INSERT INTO pre_ucenter_memberfields VALUES ('483','');
INSERT INTO pre_ucenter_memberfields VALUES ('484','');
INSERT INTO pre_ucenter_memberfields VALUES ('485','');
INSERT INTO pre_ucenter_memberfields VALUES ('486','');
INSERT INTO pre_ucenter_memberfields VALUES ('487','');
INSERT INTO pre_ucenter_memberfields VALUES ('488','');
INSERT INTO pre_ucenter_memberfields VALUES ('489','');
INSERT INTO pre_ucenter_memberfields VALUES ('490','');
INSERT INTO pre_ucenter_memberfields VALUES ('491','');
INSERT INTO pre_ucenter_memberfields VALUES ('492','');
INSERT INTO pre_ucenter_memberfields VALUES ('493','');
INSERT INTO pre_ucenter_memberfields VALUES ('494','');
INSERT INTO pre_ucenter_memberfields VALUES ('495','');
INSERT INTO pre_ucenter_memberfields VALUES ('496','');
INSERT INTO pre_ucenter_memberfields VALUES ('497','');
INSERT INTO pre_ucenter_memberfields VALUES ('498','');
INSERT INTO pre_ucenter_memberfields VALUES ('499','');
INSERT INTO pre_ucenter_memberfields VALUES ('500','');
INSERT INTO pre_ucenter_memberfields VALUES ('501','');
INSERT INTO pre_ucenter_memberfields VALUES ('502','');
INSERT INTO pre_ucenter_memberfields VALUES ('503','');
INSERT INTO pre_ucenter_memberfields VALUES ('504','');
INSERT INTO pre_ucenter_memberfields VALUES ('505','');
INSERT INTO pre_ucenter_memberfields VALUES ('506','');
INSERT INTO pre_ucenter_memberfields VALUES ('507','');
INSERT INTO pre_ucenter_memberfields VALUES ('508','');
INSERT INTO pre_ucenter_memberfields VALUES ('509','');
INSERT INTO pre_ucenter_memberfields VALUES ('510','');
INSERT INTO pre_ucenter_memberfields VALUES ('511','');
INSERT INTO pre_ucenter_memberfields VALUES ('512','');
INSERT INTO pre_ucenter_memberfields VALUES ('513','');
INSERT INTO pre_ucenter_memberfields VALUES ('514','');
INSERT INTO pre_ucenter_memberfields VALUES ('515','');
INSERT INTO pre_ucenter_memberfields VALUES ('516','');
INSERT INTO pre_ucenter_memberfields VALUES ('517','');
INSERT INTO pre_ucenter_memberfields VALUES ('518','');
INSERT INTO pre_ucenter_memberfields VALUES ('519','');
INSERT INTO pre_ucenter_memberfields VALUES ('520','');
INSERT INTO pre_ucenter_memberfields VALUES ('521','');
INSERT INTO pre_ucenter_memberfields VALUES ('522','');
INSERT INTO pre_ucenter_memberfields VALUES ('523','');
INSERT INTO pre_ucenter_memberfields VALUES ('524','');
INSERT INTO pre_ucenter_memberfields VALUES ('525','');
INSERT INTO pre_ucenter_memberfields VALUES ('607','');
INSERT INTO pre_ucenter_memberfields VALUES ('527','');
INSERT INTO pre_ucenter_memberfields VALUES ('528','');
INSERT INTO pre_ucenter_memberfields VALUES ('529','');
INSERT INTO pre_ucenter_memberfields VALUES ('530','');
INSERT INTO pre_ucenter_memberfields VALUES ('531','');
INSERT INTO pre_ucenter_memberfields VALUES ('532','');
INSERT INTO pre_ucenter_memberfields VALUES ('533','');
INSERT INTO pre_ucenter_memberfields VALUES ('534','');
INSERT INTO pre_ucenter_memberfields VALUES ('540','');
INSERT INTO pre_ucenter_memberfields VALUES ('536','');
INSERT INTO pre_ucenter_memberfields VALUES ('537','');
INSERT INTO pre_ucenter_memberfields VALUES ('538','');
INSERT INTO pre_ucenter_memberfields VALUES ('539','');
INSERT INTO pre_ucenter_memberfields VALUES ('541','');
INSERT INTO pre_ucenter_memberfields VALUES ('542','');
INSERT INTO pre_ucenter_memberfields VALUES ('543','');
INSERT INTO pre_ucenter_memberfields VALUES ('544','');
INSERT INTO pre_ucenter_memberfields VALUES ('545','');
INSERT INTO pre_ucenter_memberfields VALUES ('546','');
INSERT INTO pre_ucenter_memberfields VALUES ('547','');
INSERT INTO pre_ucenter_memberfields VALUES ('548','');
INSERT INTO pre_ucenter_memberfields VALUES ('549','');
INSERT INTO pre_ucenter_memberfields VALUES ('550','');
INSERT INTO pre_ucenter_memberfields VALUES ('551','');
INSERT INTO pre_ucenter_memberfields VALUES ('552','');
INSERT INTO pre_ucenter_memberfields VALUES ('553','');
INSERT INTO pre_ucenter_memberfields VALUES ('554','');
INSERT INTO pre_ucenter_memberfields VALUES ('555','');
INSERT INTO pre_ucenter_memberfields VALUES ('556','');
INSERT INTO pre_ucenter_memberfields VALUES ('557','');
INSERT INTO pre_ucenter_memberfields VALUES ('558','');
INSERT INTO pre_ucenter_memberfields VALUES ('559','');
INSERT INTO pre_ucenter_memberfields VALUES ('560','');
INSERT INTO pre_ucenter_memberfields VALUES ('561','');
INSERT INTO pre_ucenter_memberfields VALUES ('562','');
INSERT INTO pre_ucenter_memberfields VALUES ('563','');
INSERT INTO pre_ucenter_memberfields VALUES ('564','');
INSERT INTO pre_ucenter_memberfields VALUES ('565','');
INSERT INTO pre_ucenter_memberfields VALUES ('566','');
INSERT INTO pre_ucenter_memberfields VALUES ('567','');
INSERT INTO pre_ucenter_memberfields VALUES ('568','');
INSERT INTO pre_ucenter_memberfields VALUES ('569','');
INSERT INTO pre_ucenter_memberfields VALUES ('570','');
INSERT INTO pre_ucenter_memberfields VALUES ('571','');
INSERT INTO pre_ucenter_memberfields VALUES ('572','');
INSERT INTO pre_ucenter_memberfields VALUES ('573','');
INSERT INTO pre_ucenter_memberfields VALUES ('574','');
INSERT INTO pre_ucenter_memberfields VALUES ('575','');
INSERT INTO pre_ucenter_memberfields VALUES ('578','');
INSERT INTO pre_ucenter_memberfields VALUES ('577','');
INSERT INTO pre_ucenter_memberfields VALUES ('579','');
INSERT INTO pre_ucenter_memberfields VALUES ('580','');
INSERT INTO pre_ucenter_memberfields VALUES ('581','');
INSERT INTO pre_ucenter_memberfields VALUES ('582','');
INSERT INTO pre_ucenter_memberfields VALUES ('583','');
INSERT INTO pre_ucenter_memberfields VALUES ('584','');
INSERT INTO pre_ucenter_memberfields VALUES ('585','');
INSERT INTO pre_ucenter_memberfields VALUES ('586','');
INSERT INTO pre_ucenter_memberfields VALUES ('587','');
INSERT INTO pre_ucenter_memberfields VALUES ('588','');
INSERT INTO pre_ucenter_memberfields VALUES ('589','');
INSERT INTO pre_ucenter_memberfields VALUES ('590','');
INSERT INTO pre_ucenter_memberfields VALUES ('591','');
INSERT INTO pre_ucenter_memberfields VALUES ('592','');
INSERT INTO pre_ucenter_memberfields VALUES ('593','');
INSERT INTO pre_ucenter_memberfields VALUES ('594','');
INSERT INTO pre_ucenter_memberfields VALUES ('595','');
INSERT INTO pre_ucenter_memberfields VALUES ('596','');
INSERT INTO pre_ucenter_memberfields VALUES ('597','');
INSERT INTO pre_ucenter_memberfields VALUES ('598','');
INSERT INTO pre_ucenter_memberfields VALUES ('599','');
INSERT INTO pre_ucenter_memberfields VALUES ('600','');
INSERT INTO pre_ucenter_memberfields VALUES ('601','');
INSERT INTO pre_ucenter_memberfields VALUES ('602','');
INSERT INTO pre_ucenter_memberfields VALUES ('603','');
INSERT INTO pre_ucenter_memberfields VALUES ('604','');
INSERT INTO pre_ucenter_memberfields VALUES ('605','');
INSERT INTO pre_ucenter_memberfields VALUES ('606','');
INSERT INTO pre_ucenter_memberfields VALUES ('867','');
INSERT INTO pre_ucenter_memberfields VALUES ('609','');
INSERT INTO pre_ucenter_memberfields VALUES ('610','');
INSERT INTO pre_ucenter_memberfields VALUES ('611','');
INSERT INTO pre_ucenter_memberfields VALUES ('612','');
INSERT INTO pre_ucenter_memberfields VALUES ('613','');
INSERT INTO pre_ucenter_memberfields VALUES ('614','');
INSERT INTO pre_ucenter_memberfields VALUES ('615','');
INSERT INTO pre_ucenter_memberfields VALUES ('616','');
INSERT INTO pre_ucenter_memberfields VALUES ('617','');
INSERT INTO pre_ucenter_memberfields VALUES ('618','');
INSERT INTO pre_ucenter_memberfields VALUES ('619','');
INSERT INTO pre_ucenter_memberfields VALUES ('620','');
INSERT INTO pre_ucenter_memberfields VALUES ('621','');
INSERT INTO pre_ucenter_memberfields VALUES ('622','');
INSERT INTO pre_ucenter_memberfields VALUES ('623','');
INSERT INTO pre_ucenter_memberfields VALUES ('624','');
INSERT INTO pre_ucenter_memberfields VALUES ('625','');
INSERT INTO pre_ucenter_memberfields VALUES ('626','');
INSERT INTO pre_ucenter_memberfields VALUES ('627','');
INSERT INTO pre_ucenter_memberfields VALUES ('628','');
INSERT INTO pre_ucenter_memberfields VALUES ('629','');
INSERT INTO pre_ucenter_memberfields VALUES ('630','');
INSERT INTO pre_ucenter_memberfields VALUES ('631','');
INSERT INTO pre_ucenter_memberfields VALUES ('632','');
INSERT INTO pre_ucenter_memberfields VALUES ('633','');
INSERT INTO pre_ucenter_memberfields VALUES ('634','');
INSERT INTO pre_ucenter_memberfields VALUES ('635','');
INSERT INTO pre_ucenter_memberfields VALUES ('636','');
INSERT INTO pre_ucenter_memberfields VALUES ('637','');
INSERT INTO pre_ucenter_memberfields VALUES ('638','');
INSERT INTO pre_ucenter_memberfields VALUES ('639','');
INSERT INTO pre_ucenter_memberfields VALUES ('640','');
INSERT INTO pre_ucenter_memberfields VALUES ('641','');
INSERT INTO pre_ucenter_memberfields VALUES ('642','');
INSERT INTO pre_ucenter_memberfields VALUES ('643','');
INSERT INTO pre_ucenter_memberfields VALUES ('644','');
INSERT INTO pre_ucenter_memberfields VALUES ('645','');
INSERT INTO pre_ucenter_memberfields VALUES ('646','');
INSERT INTO pre_ucenter_memberfields VALUES ('647','');
INSERT INTO pre_ucenter_memberfields VALUES ('648','');
INSERT INTO pre_ucenter_memberfields VALUES ('649','');
INSERT INTO pre_ucenter_memberfields VALUES ('650','');
INSERT INTO pre_ucenter_memberfields VALUES ('651','');
INSERT INTO pre_ucenter_memberfields VALUES ('652','');
INSERT INTO pre_ucenter_memberfields VALUES ('653','');
INSERT INTO pre_ucenter_memberfields VALUES ('654','');
INSERT INTO pre_ucenter_memberfields VALUES ('655','');
INSERT INTO pre_ucenter_memberfields VALUES ('656','');
INSERT INTO pre_ucenter_memberfields VALUES ('657','');
INSERT INTO pre_ucenter_memberfields VALUES ('658','');
INSERT INTO pre_ucenter_memberfields VALUES ('659','');
INSERT INTO pre_ucenter_memberfields VALUES ('660','');
INSERT INTO pre_ucenter_memberfields VALUES ('661','');
INSERT INTO pre_ucenter_memberfields VALUES ('662','');
INSERT INTO pre_ucenter_memberfields VALUES ('663','');
INSERT INTO pre_ucenter_memberfields VALUES ('664','');
INSERT INTO pre_ucenter_memberfields VALUES ('665','');
INSERT INTO pre_ucenter_memberfields VALUES ('666','');
INSERT INTO pre_ucenter_memberfields VALUES ('667','');
INSERT INTO pre_ucenter_memberfields VALUES ('668','');
INSERT INTO pre_ucenter_memberfields VALUES ('669','');
INSERT INTO pre_ucenter_memberfields VALUES ('670','');
INSERT INTO pre_ucenter_memberfields VALUES ('671','');
INSERT INTO pre_ucenter_memberfields VALUES ('672','');
INSERT INTO pre_ucenter_memberfields VALUES ('673','');
INSERT INTO pre_ucenter_memberfields VALUES ('674','');
INSERT INTO pre_ucenter_memberfields VALUES ('675','');
INSERT INTO pre_ucenter_memberfields VALUES ('676','');
INSERT INTO pre_ucenter_memberfields VALUES ('677','');
INSERT INTO pre_ucenter_memberfields VALUES ('678','');
INSERT INTO pre_ucenter_memberfields VALUES ('679','');
INSERT INTO pre_ucenter_memberfields VALUES ('680','');
INSERT INTO pre_ucenter_memberfields VALUES ('681','');
INSERT INTO pre_ucenter_memberfields VALUES ('682','');
INSERT INTO pre_ucenter_memberfields VALUES ('683','');
INSERT INTO pre_ucenter_memberfields VALUES ('684','');
INSERT INTO pre_ucenter_memberfields VALUES ('685','');
INSERT INTO pre_ucenter_memberfields VALUES ('686','');
INSERT INTO pre_ucenter_memberfields VALUES ('687','');
INSERT INTO pre_ucenter_memberfields VALUES ('688','');
INSERT INTO pre_ucenter_memberfields VALUES ('689','');
INSERT INTO pre_ucenter_memberfields VALUES ('690','');
INSERT INTO pre_ucenter_memberfields VALUES ('691','');
INSERT INTO pre_ucenter_memberfields VALUES ('692','');
INSERT INTO pre_ucenter_memberfields VALUES ('693','');
INSERT INTO pre_ucenter_memberfields VALUES ('694','');
INSERT INTO pre_ucenter_memberfields VALUES ('695','');
INSERT INTO pre_ucenter_memberfields VALUES ('696','');
INSERT INTO pre_ucenter_memberfields VALUES ('697','');
INSERT INTO pre_ucenter_memberfields VALUES ('698','');
INSERT INTO pre_ucenter_memberfields VALUES ('699','');
INSERT INTO pre_ucenter_memberfields VALUES ('700','');
INSERT INTO pre_ucenter_memberfields VALUES ('701','');
INSERT INTO pre_ucenter_memberfields VALUES ('702','');
INSERT INTO pre_ucenter_memberfields VALUES ('703','');
INSERT INTO pre_ucenter_memberfields VALUES ('704','');
INSERT INTO pre_ucenter_memberfields VALUES ('705','');
INSERT INTO pre_ucenter_memberfields VALUES ('706','');
INSERT INTO pre_ucenter_memberfields VALUES ('707','');
INSERT INTO pre_ucenter_memberfields VALUES ('708','');
INSERT INTO pre_ucenter_memberfields VALUES ('709','');
INSERT INTO pre_ucenter_memberfields VALUES ('710','');
INSERT INTO pre_ucenter_memberfields VALUES ('711','');
INSERT INTO pre_ucenter_memberfields VALUES ('712','');
INSERT INTO pre_ucenter_memberfields VALUES ('713','');
INSERT INTO pre_ucenter_memberfields VALUES ('714','');
INSERT INTO pre_ucenter_memberfields VALUES ('715','');
INSERT INTO pre_ucenter_memberfields VALUES ('716','');
INSERT INTO pre_ucenter_memberfields VALUES ('717','');
INSERT INTO pre_ucenter_memberfields VALUES ('718','');
INSERT INTO pre_ucenter_memberfields VALUES ('719','');
INSERT INTO pre_ucenter_memberfields VALUES ('720','');
INSERT INTO pre_ucenter_memberfields VALUES ('721','');
INSERT INTO pre_ucenter_memberfields VALUES ('722','');
INSERT INTO pre_ucenter_memberfields VALUES ('723','');
INSERT INTO pre_ucenter_memberfields VALUES ('724','');
INSERT INTO pre_ucenter_memberfields VALUES ('725','');
INSERT INTO pre_ucenter_memberfields VALUES ('726','');
INSERT INTO pre_ucenter_memberfields VALUES ('727','');
INSERT INTO pre_ucenter_memberfields VALUES ('728','');
INSERT INTO pre_ucenter_memberfields VALUES ('729','');
INSERT INTO pre_ucenter_memberfields VALUES ('730','');
INSERT INTO pre_ucenter_memberfields VALUES ('731','');
INSERT INTO pre_ucenter_memberfields VALUES ('732','');
INSERT INTO pre_ucenter_memberfields VALUES ('733','');
INSERT INTO pre_ucenter_memberfields VALUES ('734','');
INSERT INTO pre_ucenter_memberfields VALUES ('735','');
INSERT INTO pre_ucenter_memberfields VALUES ('736','');
INSERT INTO pre_ucenter_memberfields VALUES ('737','');
INSERT INTO pre_ucenter_memberfields VALUES ('738','');
INSERT INTO pre_ucenter_memberfields VALUES ('739','');
INSERT INTO pre_ucenter_memberfields VALUES ('740','');
INSERT INTO pre_ucenter_memberfields VALUES ('741','');
INSERT INTO pre_ucenter_memberfields VALUES ('742','');
INSERT INTO pre_ucenter_memberfields VALUES ('743','');
INSERT INTO pre_ucenter_memberfields VALUES ('744','');
INSERT INTO pre_ucenter_memberfields VALUES ('745','');
INSERT INTO pre_ucenter_memberfields VALUES ('746','');
INSERT INTO pre_ucenter_memberfields VALUES ('747','');
INSERT INTO pre_ucenter_memberfields VALUES ('748','');
INSERT INTO pre_ucenter_memberfields VALUES ('749','');
INSERT INTO pre_ucenter_memberfields VALUES ('750','');
INSERT INTO pre_ucenter_memberfields VALUES ('751','');
INSERT INTO pre_ucenter_memberfields VALUES ('752','');
INSERT INTO pre_ucenter_memberfields VALUES ('753','');
INSERT INTO pre_ucenter_memberfields VALUES ('754','');
INSERT INTO pre_ucenter_memberfields VALUES ('755','');
INSERT INTO pre_ucenter_memberfields VALUES ('756','');
INSERT INTO pre_ucenter_memberfields VALUES ('757','');
INSERT INTO pre_ucenter_memberfields VALUES ('758','');
INSERT INTO pre_ucenter_memberfields VALUES ('759','');
INSERT INTO pre_ucenter_memberfields VALUES ('760','');
INSERT INTO pre_ucenter_memberfields VALUES ('761','');
INSERT INTO pre_ucenter_memberfields VALUES ('762','');
INSERT INTO pre_ucenter_memberfields VALUES ('763','');
INSERT INTO pre_ucenter_memberfields VALUES ('764','');
INSERT INTO pre_ucenter_memberfields VALUES ('765','');
INSERT INTO pre_ucenter_memberfields VALUES ('766','');
INSERT INTO pre_ucenter_memberfields VALUES ('767','');
INSERT INTO pre_ucenter_memberfields VALUES ('768','');
INSERT INTO pre_ucenter_memberfields VALUES ('769','');
INSERT INTO pre_ucenter_memberfields VALUES ('770','');
INSERT INTO pre_ucenter_memberfields VALUES ('771','');
INSERT INTO pre_ucenter_memberfields VALUES ('772','');
INSERT INTO pre_ucenter_memberfields VALUES ('773','');
INSERT INTO pre_ucenter_memberfields VALUES ('774','');
INSERT INTO pre_ucenter_memberfields VALUES ('775','');
INSERT INTO pre_ucenter_memberfields VALUES ('776','');
INSERT INTO pre_ucenter_memberfields VALUES ('777','');
INSERT INTO pre_ucenter_memberfields VALUES ('778','');
INSERT INTO pre_ucenter_memberfields VALUES ('779','');
INSERT INTO pre_ucenter_memberfields VALUES ('780','');
INSERT INTO pre_ucenter_memberfields VALUES ('781','');
INSERT INTO pre_ucenter_memberfields VALUES ('782','');
INSERT INTO pre_ucenter_memberfields VALUES ('783','');
INSERT INTO pre_ucenter_memberfields VALUES ('784','');
INSERT INTO pre_ucenter_memberfields VALUES ('785','');
INSERT INTO pre_ucenter_memberfields VALUES ('786','');
INSERT INTO pre_ucenter_memberfields VALUES ('787','');
INSERT INTO pre_ucenter_memberfields VALUES ('788','');
INSERT INTO pre_ucenter_memberfields VALUES ('789','');
INSERT INTO pre_ucenter_memberfields VALUES ('790','');
INSERT INTO pre_ucenter_memberfields VALUES ('791','');
INSERT INTO pre_ucenter_memberfields VALUES ('792','');
INSERT INTO pre_ucenter_memberfields VALUES ('793','');
INSERT INTO pre_ucenter_memberfields VALUES ('794','');
INSERT INTO pre_ucenter_memberfields VALUES ('795','');
INSERT INTO pre_ucenter_memberfields VALUES ('796','');
INSERT INTO pre_ucenter_memberfields VALUES ('797','');
INSERT INTO pre_ucenter_memberfields VALUES ('798','');
INSERT INTO pre_ucenter_memberfields VALUES ('799','');
INSERT INTO pre_ucenter_memberfields VALUES ('800','');
INSERT INTO pre_ucenter_memberfields VALUES ('801','');
INSERT INTO pre_ucenter_memberfields VALUES ('802','');
INSERT INTO pre_ucenter_memberfields VALUES ('803','');
INSERT INTO pre_ucenter_memberfields VALUES ('804','');
INSERT INTO pre_ucenter_memberfields VALUES ('805','');
INSERT INTO pre_ucenter_memberfields VALUES ('806','');
INSERT INTO pre_ucenter_memberfields VALUES ('807','');
INSERT INTO pre_ucenter_memberfields VALUES ('808','');
INSERT INTO pre_ucenter_memberfields VALUES ('809','');
INSERT INTO pre_ucenter_memberfields VALUES ('810','');
INSERT INTO pre_ucenter_memberfields VALUES ('811','');
INSERT INTO pre_ucenter_memberfields VALUES ('812','');
INSERT INTO pre_ucenter_memberfields VALUES ('813','');
INSERT INTO pre_ucenter_memberfields VALUES ('814','');
INSERT INTO pre_ucenter_memberfields VALUES ('815','');
INSERT INTO pre_ucenter_memberfields VALUES ('816','');
INSERT INTO pre_ucenter_memberfields VALUES ('817','');
INSERT INTO pre_ucenter_memberfields VALUES ('818','');
INSERT INTO pre_ucenter_memberfields VALUES ('819','');
INSERT INTO pre_ucenter_memberfields VALUES ('820','');
INSERT INTO pre_ucenter_memberfields VALUES ('821','');
INSERT INTO pre_ucenter_memberfields VALUES ('822','');
INSERT INTO pre_ucenter_memberfields VALUES ('823','');
INSERT INTO pre_ucenter_memberfields VALUES ('824','');
INSERT INTO pre_ucenter_memberfields VALUES ('825','');
INSERT INTO pre_ucenter_memberfields VALUES ('826','');
INSERT INTO pre_ucenter_memberfields VALUES ('827','');
INSERT INTO pre_ucenter_memberfields VALUES ('828','');
INSERT INTO pre_ucenter_memberfields VALUES ('829','');
INSERT INTO pre_ucenter_memberfields VALUES ('830','');
INSERT INTO pre_ucenter_memberfields VALUES ('831','');
INSERT INTO pre_ucenter_memberfields VALUES ('832','');
INSERT INTO pre_ucenter_memberfields VALUES ('833','');
INSERT INTO pre_ucenter_memberfields VALUES ('834','');
INSERT INTO pre_ucenter_memberfields VALUES ('835','');
INSERT INTO pre_ucenter_memberfields VALUES ('836','');
INSERT INTO pre_ucenter_memberfields VALUES ('837','');
INSERT INTO pre_ucenter_memberfields VALUES ('838','');
INSERT INTO pre_ucenter_memberfields VALUES ('839','');
INSERT INTO pre_ucenter_memberfields VALUES ('840','');
INSERT INTO pre_ucenter_memberfields VALUES ('841','');
INSERT INTO pre_ucenter_memberfields VALUES ('842','');
INSERT INTO pre_ucenter_memberfields VALUES ('843','');
INSERT INTO pre_ucenter_memberfields VALUES ('844','');
INSERT INTO pre_ucenter_memberfields VALUES ('845','');
INSERT INTO pre_ucenter_memberfields VALUES ('846','');
INSERT INTO pre_ucenter_memberfields VALUES ('847','');
INSERT INTO pre_ucenter_memberfields VALUES ('848','');
INSERT INTO pre_ucenter_memberfields VALUES ('849','');
INSERT INTO pre_ucenter_memberfields VALUES ('850','');
INSERT INTO pre_ucenter_memberfields VALUES ('851','');
INSERT INTO pre_ucenter_memberfields VALUES ('852','');
INSERT INTO pre_ucenter_memberfields VALUES ('853','');
INSERT INTO pre_ucenter_memberfields VALUES ('854','');
INSERT INTO pre_ucenter_memberfields VALUES ('855','');
INSERT INTO pre_ucenter_memberfields VALUES ('856','');
INSERT INTO pre_ucenter_memberfields VALUES ('857','');
INSERT INTO pre_ucenter_memberfields VALUES ('858','');
INSERT INTO pre_ucenter_memberfields VALUES ('859','');
INSERT INTO pre_ucenter_memberfields VALUES ('860','');
INSERT INTO pre_ucenter_memberfields VALUES ('861','');
INSERT INTO pre_ucenter_memberfields VALUES ('862','');
INSERT INTO pre_ucenter_memberfields VALUES ('863','');
INSERT INTO pre_ucenter_memberfields VALUES ('864','');
INSERT INTO pre_ucenter_memberfields VALUES ('865','');
INSERT INTO pre_ucenter_memberfields VALUES ('866','');
INSERT INTO pre_ucenter_memberfields VALUES ('868','');
INSERT INTO pre_ucenter_memberfields VALUES ('869','');
INSERT INTO pre_ucenter_memberfields VALUES ('870','');
INSERT INTO pre_ucenter_memberfields VALUES ('871','');
INSERT INTO pre_ucenter_memberfields VALUES ('872','');
INSERT INTO pre_ucenter_memberfields VALUES ('873','');
INSERT INTO pre_ucenter_memberfields VALUES ('874','');
INSERT INTO pre_ucenter_memberfields VALUES ('875','');
INSERT INTO pre_ucenter_memberfields VALUES ('876','');
INSERT INTO pre_ucenter_memberfields VALUES ('877','');
INSERT INTO pre_ucenter_memberfields VALUES ('878','');
INSERT INTO pre_ucenter_memberfields VALUES ('879','');
INSERT INTO pre_ucenter_memberfields VALUES ('880','');
INSERT INTO pre_ucenter_memberfields VALUES ('881','');
INSERT INTO pre_ucenter_memberfields VALUES ('882','');
INSERT INTO pre_ucenter_memberfields VALUES ('883','');
INSERT INTO pre_ucenter_memberfields VALUES ('884','');
INSERT INTO pre_ucenter_memberfields VALUES ('885','');
INSERT INTO pre_ucenter_memberfields VALUES ('886','');
INSERT INTO pre_ucenter_memberfields VALUES ('887','');
INSERT INTO pre_ucenter_memberfields VALUES ('888','');
INSERT INTO pre_ucenter_memberfields VALUES ('889','');
INSERT INTO pre_ucenter_memberfields VALUES ('890','');
INSERT INTO pre_ucenter_memberfields VALUES ('891','');
INSERT INTO pre_ucenter_memberfields VALUES ('892','');
INSERT INTO pre_ucenter_memberfields VALUES ('893','');
INSERT INTO pre_ucenter_memberfields VALUES ('894','');
INSERT INTO pre_ucenter_memberfields VALUES ('895','');
INSERT INTO pre_ucenter_memberfields VALUES ('896','');
INSERT INTO pre_ucenter_memberfields VALUES ('897','');
INSERT INTO pre_ucenter_memberfields VALUES ('898','');
INSERT INTO pre_ucenter_memberfields VALUES ('899','');
INSERT INTO pre_ucenter_memberfields VALUES ('900','');
INSERT INTO pre_ucenter_memberfields VALUES ('901','');
INSERT INTO pre_ucenter_memberfields VALUES ('902','');
INSERT INTO pre_ucenter_memberfields VALUES ('903','');
INSERT INTO pre_ucenter_memberfields VALUES ('904','');
INSERT INTO pre_ucenter_memberfields VALUES ('905','');
INSERT INTO pre_ucenter_memberfields VALUES ('906','');
INSERT INTO pre_ucenter_memberfields VALUES ('907','');
INSERT INTO pre_ucenter_memberfields VALUES ('908','');
INSERT INTO pre_ucenter_memberfields VALUES ('909','');
INSERT INTO pre_ucenter_memberfields VALUES ('910','');
INSERT INTO pre_ucenter_memberfields VALUES ('911','');
INSERT INTO pre_ucenter_memberfields VALUES ('912','');
INSERT INTO pre_ucenter_memberfields VALUES ('913','');
INSERT INTO pre_ucenter_memberfields VALUES ('914','');
INSERT INTO pre_ucenter_memberfields VALUES ('915','');
INSERT INTO pre_ucenter_memberfields VALUES ('916','');
INSERT INTO pre_ucenter_memberfields VALUES ('917','');
INSERT INTO pre_ucenter_memberfields VALUES ('918','');
INSERT INTO pre_ucenter_memberfields VALUES ('919','');
INSERT INTO pre_ucenter_memberfields VALUES ('920','');
INSERT INTO pre_ucenter_memberfields VALUES ('921','');
INSERT INTO pre_ucenter_memberfields VALUES ('922','');
INSERT INTO pre_ucenter_memberfields VALUES ('923','');
INSERT INTO pre_ucenter_memberfields VALUES ('924','');
INSERT INTO pre_ucenter_memberfields VALUES ('925','');
INSERT INTO pre_ucenter_memberfields VALUES ('926','');
INSERT INTO pre_ucenter_memberfields VALUES ('927','');
INSERT INTO pre_ucenter_memberfields VALUES ('928','');
INSERT INTO pre_ucenter_memberfields VALUES ('929','');
INSERT INTO pre_ucenter_memberfields VALUES ('930','');
INSERT INTO pre_ucenter_memberfields VALUES ('931','');
INSERT INTO pre_ucenter_memberfields VALUES ('932','');
INSERT INTO pre_ucenter_memberfields VALUES ('933','');
INSERT INTO pre_ucenter_memberfields VALUES ('934','');
INSERT INTO pre_ucenter_memberfields VALUES ('935','');
INSERT INTO pre_ucenter_memberfields VALUES ('936','');
INSERT INTO pre_ucenter_memberfields VALUES ('937','');
INSERT INTO pre_ucenter_memberfields VALUES ('938','');
INSERT INTO pre_ucenter_memberfields VALUES ('939','');
INSERT INTO pre_ucenter_memberfields VALUES ('940','');
INSERT INTO pre_ucenter_memberfields VALUES ('941','');
INSERT INTO pre_ucenter_memberfields VALUES ('942','');
INSERT INTO pre_ucenter_memberfields VALUES ('943','');
INSERT INTO pre_ucenter_memberfields VALUES ('944','');
INSERT INTO pre_ucenter_memberfields VALUES ('945','');
INSERT INTO pre_ucenter_memberfields VALUES ('946','');
INSERT INTO pre_ucenter_memberfields VALUES ('947','');
INSERT INTO pre_ucenter_memberfields VALUES ('948','');
INSERT INTO pre_ucenter_memberfields VALUES ('949','');
INSERT INTO pre_ucenter_memberfields VALUES ('950','');
INSERT INTO pre_ucenter_memberfields VALUES ('951','');
INSERT INTO pre_ucenter_memberfields VALUES ('952','');
INSERT INTO pre_ucenter_memberfields VALUES ('953','');
INSERT INTO pre_ucenter_memberfields VALUES ('954','');
INSERT INTO pre_ucenter_memberfields VALUES ('955','');
INSERT INTO pre_ucenter_memberfields VALUES ('958','');
INSERT INTO pre_ucenter_memberfields VALUES ('957','');
INSERT INTO pre_ucenter_memberfields VALUES ('959','');
INSERT INTO pre_ucenter_memberfields VALUES ('960','');
INSERT INTO pre_ucenter_memberfields VALUES ('961','');
INSERT INTO pre_ucenter_memberfields VALUES ('962','');
INSERT INTO pre_ucenter_memberfields VALUES ('963','');
INSERT INTO pre_ucenter_memberfields VALUES ('964','');
INSERT INTO pre_ucenter_memberfields VALUES ('965','');
INSERT INTO pre_ucenter_memberfields VALUES ('966','');
INSERT INTO pre_ucenter_memberfields VALUES ('967','');
INSERT INTO pre_ucenter_memberfields VALUES ('968','');
INSERT INTO pre_ucenter_memberfields VALUES ('969','');
INSERT INTO pre_ucenter_memberfields VALUES ('970','');
INSERT INTO pre_ucenter_memberfields VALUES ('971','');
INSERT INTO pre_ucenter_memberfields VALUES ('972','');
INSERT INTO pre_ucenter_memberfields VALUES ('973','');
INSERT INTO pre_ucenter_memberfields VALUES ('974','');
INSERT INTO pre_ucenter_memberfields VALUES ('975','');
INSERT INTO pre_ucenter_memberfields VALUES ('976','');
INSERT INTO pre_ucenter_memberfields VALUES ('977','');
INSERT INTO pre_ucenter_memberfields VALUES ('978','');
INSERT INTO pre_ucenter_memberfields VALUES ('979','');
INSERT INTO pre_ucenter_memberfields VALUES ('980','');
INSERT INTO pre_ucenter_memberfields VALUES ('981','');
INSERT INTO pre_ucenter_memberfields VALUES ('982','');
INSERT INTO pre_ucenter_memberfields VALUES ('983','');
INSERT INTO pre_ucenter_memberfields VALUES ('984','');
INSERT INTO pre_ucenter_memberfields VALUES ('985','');
INSERT INTO pre_ucenter_memberfields VALUES ('986','');
INSERT INTO pre_ucenter_memberfields VALUES ('987','');
INSERT INTO pre_ucenter_memberfields VALUES ('988','');
INSERT INTO pre_ucenter_memberfields VALUES ('989','');
INSERT INTO pre_ucenter_memberfields VALUES ('990','');
INSERT INTO pre_ucenter_memberfields VALUES ('991','');
INSERT INTO pre_ucenter_memberfields VALUES ('992','');
INSERT INTO pre_ucenter_memberfields VALUES ('993','');
INSERT INTO pre_ucenter_memberfields VALUES ('994','');
INSERT INTO pre_ucenter_memberfields VALUES ('995','');
INSERT INTO pre_ucenter_memberfields VALUES ('996','');
INSERT INTO pre_ucenter_memberfields VALUES ('997','');
INSERT INTO pre_ucenter_memberfields VALUES ('998','');
INSERT INTO pre_ucenter_memberfields VALUES ('999','');
INSERT INTO pre_ucenter_memberfields VALUES ('1000','');
INSERT INTO pre_ucenter_memberfields VALUES ('1001','');
INSERT INTO pre_ucenter_memberfields VALUES ('1002','');
INSERT INTO pre_ucenter_memberfields VALUES ('1003','');
INSERT INTO pre_ucenter_memberfields VALUES ('1004','');
INSERT INTO pre_ucenter_memberfields VALUES ('1005','');
INSERT INTO pre_ucenter_memberfields VALUES ('1006','');
INSERT INTO pre_ucenter_memberfields VALUES ('1007','');
INSERT INTO pre_ucenter_memberfields VALUES ('1008','');
INSERT INTO pre_ucenter_memberfields VALUES ('1009','');
INSERT INTO pre_ucenter_memberfields VALUES ('1010','');
INSERT INTO pre_ucenter_memberfields VALUES ('1011','');
INSERT INTO pre_ucenter_memberfields VALUES ('1012','');
INSERT INTO pre_ucenter_memberfields VALUES ('1013','');
INSERT INTO pre_ucenter_memberfields VALUES ('1014','');
INSERT INTO pre_ucenter_memberfields VALUES ('1015','');
INSERT INTO pre_ucenter_memberfields VALUES ('1016','');
INSERT INTO pre_ucenter_memberfields VALUES ('1017','');
INSERT INTO pre_ucenter_memberfields VALUES ('1018','');
INSERT INTO pre_ucenter_memberfields VALUES ('1019','');
INSERT INTO pre_ucenter_memberfields VALUES ('1020','');
INSERT INTO pre_ucenter_memberfields VALUES ('1021','');
INSERT INTO pre_ucenter_memberfields VALUES ('1022','');
INSERT INTO pre_ucenter_memberfields VALUES ('1023','');
INSERT INTO pre_ucenter_memberfields VALUES ('1024','');
INSERT INTO pre_ucenter_memberfields VALUES ('1025','');
INSERT INTO pre_ucenter_memberfields VALUES ('1026','');
INSERT INTO pre_ucenter_memberfields VALUES ('1027','');
INSERT INTO pre_ucenter_memberfields VALUES ('1028','');
INSERT INTO pre_ucenter_memberfields VALUES ('1029','');
INSERT INTO pre_ucenter_memberfields VALUES ('1030','');
INSERT INTO pre_ucenter_memberfields VALUES ('1031','');
INSERT INTO pre_ucenter_memberfields VALUES ('1032','');
INSERT INTO pre_ucenter_memberfields VALUES ('1033','');
INSERT INTO pre_ucenter_memberfields VALUES ('1034','');
INSERT INTO pre_ucenter_memberfields VALUES ('1035','');
INSERT INTO pre_ucenter_memberfields VALUES ('1036','');
INSERT INTO pre_ucenter_memberfields VALUES ('1037','');
INSERT INTO pre_ucenter_memberfields VALUES ('1038','');
INSERT INTO pre_ucenter_memberfields VALUES ('1039','');
INSERT INTO pre_ucenter_memberfields VALUES ('1040','');
INSERT INTO pre_ucenter_memberfields VALUES ('1041','');
INSERT INTO pre_ucenter_memberfields VALUES ('1042','');
INSERT INTO pre_ucenter_memberfields VALUES ('1043','');
INSERT INTO pre_ucenter_memberfields VALUES ('1044','');
INSERT INTO pre_ucenter_memberfields VALUES ('1045','');
INSERT INTO pre_ucenter_memberfields VALUES ('1046','');
INSERT INTO pre_ucenter_memberfields VALUES ('1047','');
INSERT INTO pre_ucenter_memberfields VALUES ('1048','');
INSERT INTO pre_ucenter_memberfields VALUES ('1049','');
INSERT INTO pre_ucenter_memberfields VALUES ('1050','');
INSERT INTO pre_ucenter_memberfields VALUES ('1051','');
INSERT INTO pre_ucenter_memberfields VALUES ('1052','');
INSERT INTO pre_ucenter_memberfields VALUES ('1053','');
INSERT INTO pre_ucenter_memberfields VALUES ('1054','');
INSERT INTO pre_ucenter_memberfields VALUES ('1055','');
INSERT INTO pre_ucenter_memberfields VALUES ('1056','');
INSERT INTO pre_ucenter_memberfields VALUES ('1057','');
INSERT INTO pre_ucenter_memberfields VALUES ('1058','');
INSERT INTO pre_ucenter_memberfields VALUES ('1059','');
INSERT INTO pre_ucenter_memberfields VALUES ('1060','');
INSERT INTO pre_ucenter_memberfields VALUES ('1064','');
INSERT INTO pre_ucenter_memberfields VALUES ('1062','');
INSERT INTO pre_ucenter_memberfields VALUES ('1063','');
INSERT INTO pre_ucenter_memberfields VALUES ('1065','');
INSERT INTO pre_ucenter_memberfields VALUES ('1066','');
INSERT INTO pre_ucenter_memberfields VALUES ('1067','');
INSERT INTO pre_ucenter_memberfields VALUES ('1068','');
INSERT INTO pre_ucenter_memberfields VALUES ('1069','');
INSERT INTO pre_ucenter_memberfields VALUES ('1070','');
INSERT INTO pre_ucenter_memberfields VALUES ('1071','');
INSERT INTO pre_ucenter_memberfields VALUES ('1072','');
INSERT INTO pre_ucenter_memberfields VALUES ('1073','');
INSERT INTO pre_ucenter_memberfields VALUES ('1074','');
INSERT INTO pre_ucenter_memberfields VALUES ('1075','');
INSERT INTO pre_ucenter_memberfields VALUES ('1076','');
INSERT INTO pre_ucenter_memberfields VALUES ('1077','');
INSERT INTO pre_ucenter_memberfields VALUES ('1078','');
INSERT INTO pre_ucenter_memberfields VALUES ('1079','');
INSERT INTO pre_ucenter_memberfields VALUES ('1080','');
INSERT INTO pre_ucenter_memberfields VALUES ('1081','');
INSERT INTO pre_ucenter_memberfields VALUES ('1082','');
INSERT INTO pre_ucenter_memberfields VALUES ('1083','');
INSERT INTO pre_ucenter_memberfields VALUES ('1084','');
INSERT INTO pre_ucenter_memberfields VALUES ('1085','');
INSERT INTO pre_ucenter_memberfields VALUES ('1086','');
INSERT INTO pre_ucenter_memberfields VALUES ('1087','');
INSERT INTO pre_ucenter_memberfields VALUES ('1088','');
INSERT INTO pre_ucenter_memberfields VALUES ('1089','');
INSERT INTO pre_ucenter_memberfields VALUES ('1090','');
INSERT INTO pre_ucenter_memberfields VALUES ('1091','');
INSERT INTO pre_ucenter_memberfields VALUES ('1092','');
INSERT INTO pre_ucenter_memberfields VALUES ('1093','');
INSERT INTO pre_ucenter_memberfields VALUES ('1094','');
INSERT INTO pre_ucenter_memberfields VALUES ('1095','');
INSERT INTO pre_ucenter_memberfields VALUES ('1096','');
INSERT INTO pre_ucenter_memberfields VALUES ('1097','');
INSERT INTO pre_ucenter_memberfields VALUES ('1098','');
INSERT INTO pre_ucenter_memberfields VALUES ('1099','');
INSERT INTO pre_ucenter_memberfields VALUES ('1100','');
INSERT INTO pre_ucenter_memberfields VALUES ('1101','');
INSERT INTO pre_ucenter_memberfields VALUES ('1102','');
INSERT INTO pre_ucenter_memberfields VALUES ('1103','');
INSERT INTO pre_ucenter_memberfields VALUES ('1104','');
INSERT INTO pre_ucenter_memberfields VALUES ('1105','');
INSERT INTO pre_ucenter_memberfields VALUES ('1106','');
INSERT INTO pre_ucenter_memberfields VALUES ('1107','');
INSERT INTO pre_ucenter_memberfields VALUES ('1108','');
INSERT INTO pre_ucenter_memberfields VALUES ('1109','');
INSERT INTO pre_ucenter_memberfields VALUES ('1110','');
INSERT INTO pre_ucenter_memberfields VALUES ('1111','');
INSERT INTO pre_ucenter_memberfields VALUES ('1112','');
INSERT INTO pre_ucenter_memberfields VALUES ('1113','');
INSERT INTO pre_ucenter_memberfields VALUES ('1114','');
INSERT INTO pre_ucenter_memberfields VALUES ('1115','');
INSERT INTO pre_ucenter_memberfields VALUES ('1116','');
INSERT INTO pre_ucenter_memberfields VALUES ('1117','');
INSERT INTO pre_ucenter_memberfields VALUES ('1118','');
INSERT INTO pre_ucenter_memberfields VALUES ('1119','');
INSERT INTO pre_ucenter_memberfields VALUES ('1120','');
INSERT INTO pre_ucenter_memberfields VALUES ('1121','');
INSERT INTO pre_ucenter_memberfields VALUES ('1122','');
INSERT INTO pre_ucenter_memberfields VALUES ('1123','');
INSERT INTO pre_ucenter_memberfields VALUES ('1124','');
INSERT INTO pre_ucenter_memberfields VALUES ('1125','');
INSERT INTO pre_ucenter_memberfields VALUES ('1126','');
INSERT INTO pre_ucenter_memberfields VALUES ('1127','');
INSERT INTO pre_ucenter_memberfields VALUES ('1128','');
INSERT INTO pre_ucenter_memberfields VALUES ('1129','');
INSERT INTO pre_ucenter_memberfields VALUES ('1130','');
INSERT INTO pre_ucenter_memberfields VALUES ('1131','');
INSERT INTO pre_ucenter_memberfields VALUES ('1132','');
INSERT INTO pre_ucenter_memberfields VALUES ('1133','');
INSERT INTO pre_ucenter_memberfields VALUES ('1134','');
INSERT INTO pre_ucenter_memberfields VALUES ('1135','');
INSERT INTO pre_ucenter_memberfields VALUES ('1136','');
INSERT INTO pre_ucenter_memberfields VALUES ('1137','');
INSERT INTO pre_ucenter_memberfields VALUES ('1138','');
INSERT INTO pre_ucenter_memberfields VALUES ('1139','');
INSERT INTO pre_ucenter_memberfields VALUES ('1140','');
INSERT INTO pre_ucenter_memberfields VALUES ('1141','');
INSERT INTO pre_ucenter_memberfields VALUES ('1142','');
INSERT INTO pre_ucenter_memberfields VALUES ('1143','');
INSERT INTO pre_ucenter_memberfields VALUES ('1144','');
INSERT INTO pre_ucenter_memberfields VALUES ('1145','');
INSERT INTO pre_ucenter_memberfields VALUES ('1146','');
INSERT INTO pre_ucenter_memberfields VALUES ('1147','');
INSERT INTO pre_ucenter_memberfields VALUES ('1148','');
INSERT INTO pre_ucenter_memberfields VALUES ('1149','');
INSERT INTO pre_ucenter_memberfields VALUES ('1150','');
INSERT INTO pre_ucenter_memberfields VALUES ('1151','');
INSERT INTO pre_ucenter_memberfields VALUES ('1152','');
INSERT INTO pre_ucenter_memberfields VALUES ('1153','');
INSERT INTO pre_ucenter_memberfields VALUES ('1154','');
INSERT INTO pre_ucenter_memberfields VALUES ('1155','');
INSERT INTO pre_ucenter_memberfields VALUES ('1156','');
INSERT INTO pre_ucenter_memberfields VALUES ('1157','');
INSERT INTO pre_ucenter_memberfields VALUES ('1158','');
INSERT INTO pre_ucenter_memberfields VALUES ('1159','');
INSERT INTO pre_ucenter_memberfields VALUES ('1160','');
INSERT INTO pre_ucenter_memberfields VALUES ('1161','');
INSERT INTO pre_ucenter_memberfields VALUES ('1162','');
INSERT INTO pre_ucenter_memberfields VALUES ('1163','');
INSERT INTO pre_ucenter_memberfields VALUES ('1164','');
INSERT INTO pre_ucenter_memberfields VALUES ('1165','');
INSERT INTO pre_ucenter_memberfields VALUES ('1166','');
INSERT INTO pre_ucenter_memberfields VALUES ('1167','');
INSERT INTO pre_ucenter_memberfields VALUES ('1168','');
INSERT INTO pre_ucenter_memberfields VALUES ('1169','');
INSERT INTO pre_ucenter_memberfields VALUES ('1170','');
INSERT INTO pre_ucenter_memberfields VALUES ('1171','');
INSERT INTO pre_ucenter_memberfields VALUES ('1172','');
INSERT INTO pre_ucenter_memberfields VALUES ('1173','');
INSERT INTO pre_ucenter_memberfields VALUES ('1174','');
INSERT INTO pre_ucenter_memberfields VALUES ('1175','');
INSERT INTO pre_ucenter_memberfields VALUES ('1176','');
INSERT INTO pre_ucenter_memberfields VALUES ('1177','');
INSERT INTO pre_ucenter_memberfields VALUES ('1178','');
INSERT INTO pre_ucenter_memberfields VALUES ('1179','');
INSERT INTO pre_ucenter_memberfields VALUES ('1180','');
INSERT INTO pre_ucenter_memberfields VALUES ('1181','');
INSERT INTO pre_ucenter_memberfields VALUES ('1182','');
INSERT INTO pre_ucenter_memberfields VALUES ('1183','');
INSERT INTO pre_ucenter_memberfields VALUES ('1184','');
INSERT INTO pre_ucenter_memberfields VALUES ('1185','');
INSERT INTO pre_ucenter_memberfields VALUES ('1186','');
INSERT INTO pre_ucenter_memberfields VALUES ('1187','');
INSERT INTO pre_ucenter_memberfields VALUES ('1188','');
INSERT INTO pre_ucenter_memberfields VALUES ('1189','');
INSERT INTO pre_ucenter_memberfields VALUES ('1190','');
INSERT INTO pre_ucenter_memberfields VALUES ('1191','');
INSERT INTO pre_ucenter_memberfields VALUES ('1192','');
INSERT INTO pre_ucenter_memberfields VALUES ('1193','');
INSERT INTO pre_ucenter_memberfields VALUES ('1194','');
INSERT INTO pre_ucenter_memberfields VALUES ('1195','');
INSERT INTO pre_ucenter_memberfields VALUES ('1196','');
INSERT INTO pre_ucenter_memberfields VALUES ('1197','');
INSERT INTO pre_ucenter_memberfields VALUES ('1198','');
INSERT INTO pre_ucenter_memberfields VALUES ('1199','');
INSERT INTO pre_ucenter_memberfields VALUES ('1200','');
INSERT INTO pre_ucenter_memberfields VALUES ('1201','');
INSERT INTO pre_ucenter_memberfields VALUES ('1202','');
INSERT INTO pre_ucenter_memberfields VALUES ('1203','');
INSERT INTO pre_ucenter_memberfields VALUES ('1204','');
INSERT INTO pre_ucenter_memberfields VALUES ('1205','');
INSERT INTO pre_ucenter_memberfields VALUES ('1206','');
INSERT INTO pre_ucenter_memberfields VALUES ('1207','');
INSERT INTO pre_ucenter_memberfields VALUES ('1208','');
INSERT INTO pre_ucenter_memberfields VALUES ('1209','');
INSERT INTO pre_ucenter_memberfields VALUES ('1210','');
INSERT INTO pre_ucenter_memberfields VALUES ('1211','');
INSERT INTO pre_ucenter_memberfields VALUES ('1212','');
INSERT INTO pre_ucenter_memberfields VALUES ('1213','');
INSERT INTO pre_ucenter_memberfields VALUES ('1214','');
INSERT INTO pre_ucenter_memberfields VALUES ('1215','');
INSERT INTO pre_ucenter_memberfields VALUES ('1216','');
INSERT INTO pre_ucenter_memberfields VALUES ('1217','');
INSERT INTO pre_ucenter_memberfields VALUES ('1218','');
INSERT INTO pre_ucenter_memberfields VALUES ('1219','');
INSERT INTO pre_ucenter_memberfields VALUES ('1220','');
INSERT INTO pre_ucenter_memberfields VALUES ('1221','');
INSERT INTO pre_ucenter_memberfields VALUES ('1222','');
INSERT INTO pre_ucenter_memberfields VALUES ('1223','');
INSERT INTO pre_ucenter_memberfields VALUES ('1224','');
INSERT INTO pre_ucenter_memberfields VALUES ('1225','');
INSERT INTO pre_ucenter_memberfields VALUES ('1226','');
INSERT INTO pre_ucenter_memberfields VALUES ('1227','');
INSERT INTO pre_ucenter_memberfields VALUES ('1228','');
INSERT INTO pre_ucenter_memberfields VALUES ('1229','');
INSERT INTO pre_ucenter_memberfields VALUES ('1230','');
INSERT INTO pre_ucenter_memberfields VALUES ('1231','');
INSERT INTO pre_ucenter_memberfields VALUES ('1232','');
INSERT INTO pre_ucenter_memberfields VALUES ('1233','');
INSERT INTO pre_ucenter_memberfields VALUES ('1234','');
INSERT INTO pre_ucenter_memberfields VALUES ('1235','');
INSERT INTO pre_ucenter_memberfields VALUES ('1236','');
INSERT INTO pre_ucenter_memberfields VALUES ('1237','');
INSERT INTO pre_ucenter_memberfields VALUES ('1238','');
INSERT INTO pre_ucenter_memberfields VALUES ('1239','');
INSERT INTO pre_ucenter_memberfields VALUES ('1240','');
INSERT INTO pre_ucenter_memberfields VALUES ('1241','');
INSERT INTO pre_ucenter_memberfields VALUES ('1242','');
INSERT INTO pre_ucenter_memberfields VALUES ('1243','');
INSERT INTO pre_ucenter_memberfields VALUES ('1244','');
INSERT INTO pre_ucenter_memberfields VALUES ('1245','');
INSERT INTO pre_ucenter_memberfields VALUES ('1246','');
INSERT INTO pre_ucenter_memberfields VALUES ('1247','');
INSERT INTO pre_ucenter_memberfields VALUES ('1248','');
INSERT INTO pre_ucenter_memberfields VALUES ('1249','');
INSERT INTO pre_ucenter_memberfields VALUES ('1250','');
INSERT INTO pre_ucenter_memberfields VALUES ('1251','');
INSERT INTO pre_ucenter_memberfields VALUES ('1252','');
INSERT INTO pre_ucenter_memberfields VALUES ('1253','');
INSERT INTO pre_ucenter_memberfields VALUES ('1254','');
INSERT INTO pre_ucenter_memberfields VALUES ('1255','');
INSERT INTO pre_ucenter_memberfields VALUES ('1256','');
INSERT INTO pre_ucenter_memberfields VALUES ('1257','');
INSERT INTO pre_ucenter_memberfields VALUES ('1258','');
INSERT INTO pre_ucenter_memberfields VALUES ('1259','');
INSERT INTO pre_ucenter_memberfields VALUES ('1260','');
INSERT INTO pre_ucenter_memberfields VALUES ('1261','');
INSERT INTO pre_ucenter_memberfields VALUES ('1262','');
INSERT INTO pre_ucenter_memberfields VALUES ('1263','');
INSERT INTO pre_ucenter_memberfields VALUES ('1264','');
INSERT INTO pre_ucenter_memberfields VALUES ('1265','');
INSERT INTO pre_ucenter_memberfields VALUES ('1266','');
INSERT INTO pre_ucenter_memberfields VALUES ('1267','');
INSERT INTO pre_ucenter_memberfields VALUES ('1268','');
INSERT INTO pre_ucenter_memberfields VALUES ('1269','');
INSERT INTO pre_ucenter_memberfields VALUES ('1270','');
INSERT INTO pre_ucenter_memberfields VALUES ('1271','');
INSERT INTO pre_ucenter_memberfields VALUES ('1272','');
INSERT INTO pre_ucenter_memberfields VALUES ('1273','');
INSERT INTO pre_ucenter_memberfields VALUES ('1274','');
INSERT INTO pre_ucenter_memberfields VALUES ('1275','');
INSERT INTO pre_ucenter_memberfields VALUES ('1276','');
INSERT INTO pre_ucenter_memberfields VALUES ('1277','');
INSERT INTO pre_ucenter_memberfields VALUES ('1278','');
INSERT INTO pre_ucenter_memberfields VALUES ('1279','');
INSERT INTO pre_ucenter_memberfields VALUES ('1280','');
INSERT INTO pre_ucenter_memberfields VALUES ('1281','');
INSERT INTO pre_ucenter_memberfields VALUES ('1282','');
INSERT INTO pre_ucenter_memberfields VALUES ('1283','');
INSERT INTO pre_ucenter_memberfields VALUES ('1284','');
INSERT INTO pre_ucenter_memberfields VALUES ('1285','');
INSERT INTO pre_ucenter_memberfields VALUES ('1286','');
INSERT INTO pre_ucenter_memberfields VALUES ('1287','');
INSERT INTO pre_ucenter_memberfields VALUES ('1288','');
INSERT INTO pre_ucenter_memberfields VALUES ('1289','');
INSERT INTO pre_ucenter_memberfields VALUES ('1290','');
INSERT INTO pre_ucenter_memberfields VALUES ('1291','');
INSERT INTO pre_ucenter_memberfields VALUES ('1292','');
INSERT INTO pre_ucenter_memberfields VALUES ('1293','');
INSERT INTO pre_ucenter_memberfields VALUES ('1294','');
INSERT INTO pre_ucenter_memberfields VALUES ('1295','');
INSERT INTO pre_ucenter_memberfields VALUES ('1296','');
INSERT INTO pre_ucenter_memberfields VALUES ('1297','');
INSERT INTO pre_ucenter_memberfields VALUES ('1298','');
INSERT INTO pre_ucenter_memberfields VALUES ('1299','');
INSERT INTO pre_ucenter_memberfields VALUES ('1300','');
INSERT INTO pre_ucenter_memberfields VALUES ('1301','');
INSERT INTO pre_ucenter_memberfields VALUES ('1302','');
INSERT INTO pre_ucenter_memberfields VALUES ('1303','');
INSERT INTO pre_ucenter_memberfields VALUES ('1304','');
INSERT INTO pre_ucenter_memberfields VALUES ('1305','');
INSERT INTO pre_ucenter_memberfields VALUES ('1306','');
INSERT INTO pre_ucenter_memberfields VALUES ('1307','');
INSERT INTO pre_ucenter_memberfields VALUES ('1308','');
INSERT INTO pre_ucenter_memberfields VALUES ('1309','');
INSERT INTO pre_ucenter_memberfields VALUES ('1310','');
INSERT INTO pre_ucenter_memberfields VALUES ('1311','');
INSERT INTO pre_ucenter_memberfields VALUES ('1312','');
INSERT INTO pre_ucenter_memberfields VALUES ('1313','');
INSERT INTO pre_ucenter_memberfields VALUES ('1314','');
INSERT INTO pre_ucenter_memberfields VALUES ('1315','');
INSERT INTO pre_ucenter_memberfields VALUES ('1316','');
INSERT INTO pre_ucenter_memberfields VALUES ('1317','');
INSERT INTO pre_ucenter_memberfields VALUES ('1318','');
INSERT INTO pre_ucenter_memberfields VALUES ('1319','');
INSERT INTO pre_ucenter_memberfields VALUES ('1320','');
INSERT INTO pre_ucenter_memberfields VALUES ('1321','');
INSERT INTO pre_ucenter_memberfields VALUES ('1322','');
INSERT INTO pre_ucenter_memberfields VALUES ('1323','');
INSERT INTO pre_ucenter_memberfields VALUES ('1324','');
INSERT INTO pre_ucenter_memberfields VALUES ('1325','');
INSERT INTO pre_ucenter_memberfields VALUES ('1326','');
INSERT INTO pre_ucenter_memberfields VALUES ('1327','');
INSERT INTO pre_ucenter_memberfields VALUES ('1328','');
INSERT INTO pre_ucenter_memberfields VALUES ('1329','');
INSERT INTO pre_ucenter_memberfields VALUES ('1330','');
INSERT INTO pre_ucenter_memberfields VALUES ('1331','');
INSERT INTO pre_ucenter_memberfields VALUES ('1332','');
INSERT INTO pre_ucenter_memberfields VALUES ('1333','');
INSERT INTO pre_ucenter_memberfields VALUES ('1334','');
INSERT INTO pre_ucenter_memberfields VALUES ('1335','');
INSERT INTO pre_ucenter_memberfields VALUES ('1336','');
INSERT INTO pre_ucenter_memberfields VALUES ('1337','');
INSERT INTO pre_ucenter_memberfields VALUES ('1338','');
INSERT INTO pre_ucenter_memberfields VALUES ('1339','');
INSERT INTO pre_ucenter_memberfields VALUES ('1340','');
INSERT INTO pre_ucenter_memberfields VALUES ('1341','');
INSERT INTO pre_ucenter_memberfields VALUES ('1342','');
INSERT INTO pre_ucenter_memberfields VALUES ('1343','');
INSERT INTO pre_ucenter_memberfields VALUES ('1344','');
INSERT INTO pre_ucenter_memberfields VALUES ('1345','');
INSERT INTO pre_ucenter_memberfields VALUES ('1346','');
INSERT INTO pre_ucenter_memberfields VALUES ('1347','');
INSERT INTO pre_ucenter_memberfields VALUES ('1348','');
INSERT INTO pre_ucenter_memberfields VALUES ('1349','');
INSERT INTO pre_ucenter_memberfields VALUES ('1350','');
INSERT INTO pre_ucenter_memberfields VALUES ('1351','');
INSERT INTO pre_ucenter_memberfields VALUES ('1352','');
INSERT INTO pre_ucenter_memberfields VALUES ('1353','');
INSERT INTO pre_ucenter_memberfields VALUES ('1354','');
INSERT INTO pre_ucenter_memberfields VALUES ('1355','');
INSERT INTO pre_ucenter_memberfields VALUES ('1356','');
INSERT INTO pre_ucenter_memberfields VALUES ('1357','');
INSERT INTO pre_ucenter_memberfields VALUES ('1358','');
INSERT INTO pre_ucenter_memberfields VALUES ('1359','');
INSERT INTO pre_ucenter_memberfields VALUES ('1360','');
INSERT INTO pre_ucenter_memberfields VALUES ('1361','');
INSERT INTO pre_ucenter_memberfields VALUES ('1362','');
INSERT INTO pre_ucenter_memberfields VALUES ('1363','');
INSERT INTO pre_ucenter_memberfields VALUES ('1364','');
INSERT INTO pre_ucenter_memberfields VALUES ('1365','');
INSERT INTO pre_ucenter_memberfields VALUES ('1366','');
INSERT INTO pre_ucenter_memberfields VALUES ('1367','');
INSERT INTO pre_ucenter_memberfields VALUES ('1368','');
INSERT INTO pre_ucenter_memberfields VALUES ('1369','');
INSERT INTO pre_ucenter_memberfields VALUES ('1370','');
INSERT INTO pre_ucenter_memberfields VALUES ('1371','');
INSERT INTO pre_ucenter_memberfields VALUES ('1372','');
INSERT INTO pre_ucenter_memberfields VALUES ('1373','');
INSERT INTO pre_ucenter_memberfields VALUES ('1374','');
INSERT INTO pre_ucenter_memberfields VALUES ('1375','');
INSERT INTO pre_ucenter_memberfields VALUES ('1376','');
INSERT INTO pre_ucenter_memberfields VALUES ('1377','');
INSERT INTO pre_ucenter_memberfields VALUES ('1378','');
INSERT INTO pre_ucenter_memberfields VALUES ('1379','');
INSERT INTO pre_ucenter_memberfields VALUES ('1380','');
INSERT INTO pre_ucenter_memberfields VALUES ('1381','');
INSERT INTO pre_ucenter_memberfields VALUES ('1382','');
INSERT INTO pre_ucenter_memberfields VALUES ('1383','');
INSERT INTO pre_ucenter_memberfields VALUES ('1384','');
INSERT INTO pre_ucenter_memberfields VALUES ('1385','');
INSERT INTO pre_ucenter_memberfields VALUES ('1386','');
INSERT INTO pre_ucenter_memberfields VALUES ('1387','');
INSERT INTO pre_ucenter_memberfields VALUES ('1388','');
INSERT INTO pre_ucenter_memberfields VALUES ('1389','');
INSERT INTO pre_ucenter_memberfields VALUES ('1390','');
INSERT INTO pre_ucenter_memberfields VALUES ('1391','');
INSERT INTO pre_ucenter_memberfields VALUES ('1392','');
INSERT INTO pre_ucenter_memberfields VALUES ('1393','');
INSERT INTO pre_ucenter_memberfields VALUES ('1394','');
INSERT INTO pre_ucenter_memberfields VALUES ('1395','');
INSERT INTO pre_ucenter_memberfields VALUES ('1396','');
INSERT INTO pre_ucenter_memberfields VALUES ('1397','');
INSERT INTO pre_ucenter_memberfields VALUES ('1398','');
INSERT INTO pre_ucenter_memberfields VALUES ('1399','');
INSERT INTO pre_ucenter_memberfields VALUES ('1400','');
INSERT INTO pre_ucenter_memberfields VALUES ('1401','');
INSERT INTO pre_ucenter_memberfields VALUES ('1402','');
INSERT INTO pre_ucenter_memberfields VALUES ('1403','');
INSERT INTO pre_ucenter_memberfields VALUES ('1404','');
INSERT INTO pre_ucenter_memberfields VALUES ('1405','');
INSERT INTO pre_ucenter_memberfields VALUES ('1406','');
INSERT INTO pre_ucenter_memberfields VALUES ('1407','');
INSERT INTO pre_ucenter_memberfields VALUES ('1408','');
INSERT INTO pre_ucenter_memberfields VALUES ('1409','');
INSERT INTO pre_ucenter_memberfields VALUES ('1410','');
INSERT INTO pre_ucenter_memberfields VALUES ('1411','');
INSERT INTO pre_ucenter_memberfields VALUES ('1412','');
INSERT INTO pre_ucenter_memberfields VALUES ('1413','');
INSERT INTO pre_ucenter_memberfields VALUES ('1414','');
INSERT INTO pre_ucenter_memberfields VALUES ('1415','');
INSERT INTO pre_ucenter_memberfields VALUES ('1416','');
INSERT INTO pre_ucenter_memberfields VALUES ('1417','');
INSERT INTO pre_ucenter_memberfields VALUES ('1418','');
INSERT INTO pre_ucenter_memberfields VALUES ('1419','');
INSERT INTO pre_ucenter_memberfields VALUES ('1420','');
INSERT INTO pre_ucenter_memberfields VALUES ('1421','');
INSERT INTO pre_ucenter_memberfields VALUES ('1422','');
INSERT INTO pre_ucenter_memberfields VALUES ('1423','');
INSERT INTO pre_ucenter_memberfields VALUES ('1424','');
INSERT INTO pre_ucenter_memberfields VALUES ('1425','');
INSERT INTO pre_ucenter_memberfields VALUES ('1426','');
INSERT INTO pre_ucenter_memberfields VALUES ('1427','');
INSERT INTO pre_ucenter_memberfields VALUES ('1428','');
INSERT INTO pre_ucenter_memberfields VALUES ('1429','');
INSERT INTO pre_ucenter_memberfields VALUES ('1430','');
INSERT INTO pre_ucenter_memberfields VALUES ('1431','');
INSERT INTO pre_ucenter_memberfields VALUES ('1432','');
INSERT INTO pre_ucenter_memberfields VALUES ('1433','');
INSERT INTO pre_ucenter_memberfields VALUES ('1434','');
INSERT INTO pre_ucenter_memberfields VALUES ('1435','');
INSERT INTO pre_ucenter_memberfields VALUES ('1436','');
INSERT INTO pre_ucenter_memberfields VALUES ('1437','');
INSERT INTO pre_ucenter_memberfields VALUES ('1438','');
INSERT INTO pre_ucenter_memberfields VALUES ('1439','');
INSERT INTO pre_ucenter_memberfields VALUES ('1440','');
INSERT INTO pre_ucenter_memberfields VALUES ('1441','');
INSERT INTO pre_ucenter_memberfields VALUES ('1442','');
INSERT INTO pre_ucenter_memberfields VALUES ('1443','');
INSERT INTO pre_ucenter_memberfields VALUES ('1444','');
INSERT INTO pre_ucenter_memberfields VALUES ('1445','');
INSERT INTO pre_ucenter_memberfields VALUES ('1446','');
INSERT INTO pre_ucenter_memberfields VALUES ('1447','');
INSERT INTO pre_ucenter_memberfields VALUES ('1448','');
INSERT INTO pre_ucenter_memberfields VALUES ('1449','');
INSERT INTO pre_ucenter_memberfields VALUES ('1450','');
INSERT INTO pre_ucenter_memberfields VALUES ('1451','');
INSERT INTO pre_ucenter_memberfields VALUES ('1452','');
INSERT INTO pre_ucenter_memberfields VALUES ('1453','');
INSERT INTO pre_ucenter_memberfields VALUES ('1454','');
INSERT INTO pre_ucenter_memberfields VALUES ('1455','');
INSERT INTO pre_ucenter_memberfields VALUES ('1456','');
INSERT INTO pre_ucenter_memberfields VALUES ('1457','');
INSERT INTO pre_ucenter_memberfields VALUES ('1458','');
INSERT INTO pre_ucenter_memberfields VALUES ('1459','');
INSERT INTO pre_ucenter_memberfields VALUES ('1460','');
INSERT INTO pre_ucenter_memberfields VALUES ('1461','');
INSERT INTO pre_ucenter_memberfields VALUES ('1462','');
INSERT INTO pre_ucenter_memberfields VALUES ('1463','');
INSERT INTO pre_ucenter_memberfields VALUES ('1464','');
INSERT INTO pre_ucenter_memberfields VALUES ('1465','');
INSERT INTO pre_ucenter_memberfields VALUES ('1466','');
INSERT INTO pre_ucenter_memberfields VALUES ('1467','');
INSERT INTO pre_ucenter_memberfields VALUES ('1468','');
INSERT INTO pre_ucenter_memberfields VALUES ('1469','');
INSERT INTO pre_ucenter_memberfields VALUES ('1470','');
INSERT INTO pre_ucenter_memberfields VALUES ('1471','');
INSERT INTO pre_ucenter_memberfields VALUES ('1472','');
INSERT INTO pre_ucenter_memberfields VALUES ('1473','');
INSERT INTO pre_ucenter_memberfields VALUES ('1474','');
INSERT INTO pre_ucenter_memberfields VALUES ('1475','');
INSERT INTO pre_ucenter_memberfields VALUES ('1476','');
INSERT INTO pre_ucenter_memberfields VALUES ('1477','');
INSERT INTO pre_ucenter_memberfields VALUES ('1478','');
INSERT INTO pre_ucenter_memberfields VALUES ('1479','');
INSERT INTO pre_ucenter_memberfields VALUES ('1480','');
INSERT INTO pre_ucenter_memberfields VALUES ('1481','');
INSERT INTO pre_ucenter_memberfields VALUES ('1482','');
INSERT INTO pre_ucenter_memberfields VALUES ('1483','');
INSERT INTO pre_ucenter_memberfields VALUES ('1484','');
INSERT INTO pre_ucenter_memberfields VALUES ('1485','');
INSERT INTO pre_ucenter_memberfields VALUES ('1486','');
INSERT INTO pre_ucenter_memberfields VALUES ('1487','');
INSERT INTO pre_ucenter_memberfields VALUES ('1488','');
INSERT INTO pre_ucenter_memberfields VALUES ('1489','');
INSERT INTO pre_ucenter_memberfields VALUES ('1490','');
INSERT INTO pre_ucenter_memberfields VALUES ('1491','');
INSERT INTO pre_ucenter_memberfields VALUES ('1492','');
INSERT INTO pre_ucenter_memberfields VALUES ('1493','');
INSERT INTO pre_ucenter_memberfields VALUES ('1494','');
INSERT INTO pre_ucenter_memberfields VALUES ('1495','');
INSERT INTO pre_ucenter_memberfields VALUES ('1496','');
INSERT INTO pre_ucenter_memberfields VALUES ('1498','');
INSERT INTO pre_ucenter_memberfields VALUES ('1499','');
INSERT INTO pre_ucenter_memberfields VALUES ('1500','');
INSERT INTO pre_ucenter_memberfields VALUES ('1501','');
INSERT INTO pre_ucenter_memberfields VALUES ('1502','');
INSERT INTO pre_ucenter_memberfields VALUES ('1503','');
INSERT INTO pre_ucenter_memberfields VALUES ('1504','');
INSERT INTO pre_ucenter_memberfields VALUES ('1505','');
INSERT INTO pre_ucenter_memberfields VALUES ('1506','');
INSERT INTO pre_ucenter_memberfields VALUES ('1507','');
INSERT INTO pre_ucenter_memberfields VALUES ('1508','');
INSERT INTO pre_ucenter_memberfields VALUES ('1509','');
INSERT INTO pre_ucenter_memberfields VALUES ('1510','');
INSERT INTO pre_ucenter_memberfields VALUES ('1511','');
INSERT INTO pre_ucenter_memberfields VALUES ('1512','');
INSERT INTO pre_ucenter_memberfields VALUES ('1513','');
INSERT INTO pre_ucenter_memberfields VALUES ('1514','');
INSERT INTO pre_ucenter_memberfields VALUES ('1515','');
INSERT INTO pre_ucenter_memberfields VALUES ('1516','');
INSERT INTO pre_ucenter_memberfields VALUES ('1517','');
INSERT INTO pre_ucenter_memberfields VALUES ('1518','');
INSERT INTO pre_ucenter_memberfields VALUES ('1519','');
INSERT INTO pre_ucenter_memberfields VALUES ('1520','');
INSERT INTO pre_ucenter_memberfields VALUES ('1521','');
INSERT INTO pre_ucenter_memberfields VALUES ('1522','');
INSERT INTO pre_ucenter_memberfields VALUES ('1523','');
INSERT INTO pre_ucenter_memberfields VALUES ('1524','');
INSERT INTO pre_ucenter_memberfields VALUES ('1525','');
INSERT INTO pre_ucenter_memberfields VALUES ('1526','');
INSERT INTO pre_ucenter_memberfields VALUES ('1527','');

INSERT INTO pre_ucenter_members VALUES ('1',0x61646d696e,0x6665643235643031353937303065373763363934373966356163393538646561,0x61646d696e4061646d696e2e636f6d,'','',0x68696464656e,'1435628330','0','0',0x613830633234,'');
INSERT INTO pre_ucenter_members VALUES ('2',0x78696e676e61736e6869,0x6266333434643931386138323436343939303335336563313061653038343738,0x7a636866656e403136332e636f6d,'','',0x3132372e302e302e31,'1435903153','0','0',0x323336353935,'');
INSERT INTO pre_ucenter_members VALUES ('3',0x78696e676e616e736869,0x6366636463336263393431643863393432346634383164383832326666393034,0x3938303538353336334071712e636f6d,'','',0x3132372e302e302e31,'1436253615','0','0',0x303030366263,'');
INSERT INTO pre_ucenter_members VALUES ('5',0x7468696e6b75,0x3330393364653764626431363230323932306463643237623064303538353266,0x636872697374696e612e73407468696e6b77697468752e636f6d,'','',0x68696464656e,'1378785089','0','0',0x313834613930,'');
INSERT INTO pre_ucenter_members VALUES ('6',0x77616c6b6572,0x6330343432343939316264623335383636653866613638316365396630626663,0x77616c6b6572407468696e6b752e636e,'','',0x3132332e3131322e37332e323332,'1378797471','0','0',0x666562663031,'');
INSERT INTO pre_ucenter_members VALUES ('7',0x4d722de7a986,0x6566626135306362613930653766323361663530626535333930643433623734,0x323633333236323330384071712e636f6d,'','',0x3132332e3131322e37332e323332,'1378797588','0','0',0x343830353364,'');
INSERT INTO pre_ucenter_members VALUES ('8',0xe5a4a7e58f94,0x6663373936623437616432366166633633653530323232363463366234383635,0x323230383937383234394071712e636f6d,'','',0x3132332e3131322e37332e323332,'1378797645','0','0',0x643638636666,'');
INSERT INTO pre_ucenter_members VALUES ('9',0x4c75636b79,0x3538666164656530333266303433663130613333646638636163313139363064,0x323535333230323434374071712e636f6d,'','',0x3232322e39302e3134312e323039,'1378798809','0','0',0x393263393261,'');
INSERT INTO pre_ucenter_members VALUES ('10',0x52656e617461,0x3334326535323363383632373263616361393162303134363866346264626136,0x323032343435303738374071712e636f6d,'','',0x3232322e39302e3134312e323039,'1378799112','0','0',0x386531383162,'');
INSERT INTO pre_ucenter_members VALUES ('11',0xe5b08fe78cabe683b3e99293e9b1bc,0x3436336534306166623134653531383730613265643265636433353430353365,0x323235303238313933364071712e636f6d,'','',0x35382e34382e33312e3833,'1378799160','0','0',0x383338306534,'');
INSERT INTO pre_ucenter_members VALUES ('12',0x4861726479,0x3337306166663963303235346535336434643061656162393838313432356336,0x323534373030333534304071712e636f6d,'','',0x3232322e39302e3134312e323039,'1378799239','0','0',0x373131653766,'');
INSERT INTO pre_ucenter_members VALUES ('13',0xe88b8fe5b08fe5b08fe5b08fe79a84e5aeb6,0x6233613862376166366135353132323234323462393735356130356138303966,0x6368726973407468696e6b752e636e,'','',0x3232322e3230392e3134382e3536,'1378800172','0','0',0x633537343538,'');
INSERT INTO pre_ucenter_members VALUES ('14',0xe4b880e4baa9e4b889e58886e59cb0,0x6166636432666264383131393031363966373933323834306430373837376131,0x323236313132373130334071712e636f6d,'','',0x3132352e3132322e3131342e313534,'1378801210','0','0',0x323036303635,'');
INSERT INTO pre_ucenter_members VALUES ('15',0x656d696c79,0x3333363134623131643336313930323063636138386135326264613231336334,0x323438303638323532354071712e636f6d,'','',0x3232322e3231312e3132362e313634,'1378806800','0','0',0x306465323733,'');
INSERT INTO pre_ucenter_members VALUES ('16',0x6d6567616e,0x6634383531386562613164326536336235616638376131303037633136653734,0x323639353039353631354071712e636f6d,'','',0x35382e34382e33312e3833,'1378807236','0','0',0x343765636234,'');
INSERT INTO pre_ucenter_members VALUES ('17',0xe89891e88f87e69ca8e69ca8,0x6438616138646664343832303938333762623138343433353765303566396562,0x323438343338373238314071712e636f6d,'','',0x3231382e37322e31332e323336,'1378884441','0','0',0x393038373332,'');
INSERT INTO pre_ucenter_members VALUES ('18',0xe6b290e6b290,0x3965623830356532353764636363356539383431303535316363313938376433,0x6361726f6c407468696e6b752e636e,'','',0x3231382e37322e31332e323336,'1378887598','0','0',0x656166386433,'');
INSERT INTO pre_ucenter_members VALUES ('19',0x6d65696d6569,0x3765353266336562636165613962346665346631333636613137653337366537,0x3431303737383132374071712e636f6d,'','',0x3131332e3233362e38312e3736,'1378897331','0','0',0x336633343636,'');
INSERT INTO pre_ucenter_members VALUES ('20',0xe4ba91e6b7a1e9a38ee8bdbb,0x3365616330343031313730656465333231646262303162663062376637346562,0x6361726f6c696e652e6c407468696e6b752e636e,'','',0x3232322e3230392e3134382e3536,'1378964153','0','0',0x393062653535,'');
INSERT INTO pre_ucenter_members VALUES ('21',0x79756b69e985b1,0x6233393363303735666436656530396261313964343663313062323937633835,0x313134303532353131394071712e636f6d,'','',0x3131372e32322e3132332e313939,'1378964161','0','0',0x316431653138,'');
INSERT INTO pre_ucenter_members VALUES ('22',0x6a657373,0x3566653734313765636232316138666365356135616566346139303361656233,0x6a6573732e6a407468696e6b752e636e,'','',0x3232322e3231312e3132362e313634,'1378964193','0','0',0x313939323065,'');
INSERT INTO pre_ucenter_members VALUES ('23',0x4a616e6973,0x3431313938303166336161353363623765663230666162663733303731353739,0x323932313533373032304071712e636f6d,'','',0x3232322e3231312e3132362e313634,'1378964235','0','0',0x626133646534,'');
INSERT INTO pre_ucenter_members VALUES ('24',0xe9a39ee5a4aae78bbc,0x6138646261306532646639376632373331323730316131656136646661656538,0x3235343634343934364071712e636f6d,'','',0x3132352e33342e35302e313230,'1378964402','0','0',0x323662336436,'');
INSERT INTO pre_ucenter_members VALUES ('25',0x53756e7368696e65,0x3931303530376636313466356331663266656531346635303162663366663163,0x323535383433303734304071712e636f6d,'','',0x3132352e33342e35302e313230,'1378964413','0','0',0x646136396235,'');
INSERT INTO pre_ucenter_members VALUES ('26',0xe5b08fe794b2e5908ce5ada6,0x3062656663326664646131373338383731303662636263376362383631353738,0x3835333130373234344071712e636f6d,'','',0x3232322e3231312e3132362e313634,'1378964477','0','0',0x646130386132,'');
INSERT INTO pre_ucenter_members VALUES ('27',0xe9bb91e79faee88396,0x6337353862393363333235303436373231343539363763393430373238346561,0x3338313234383936344071712e636f6d,'','',0x3231382e37322e31332e323336,'1378965024','0','0',0x303935366165,'');
INSERT INTO pre_ucenter_members VALUES ('28',0xe591bce5999ce5a883,0x6631396336393866313334396233386336666564613331353036363565313637,0x323332343530393036304071712e636f6d,'','',0x3231382e37322e31332e323336,'1378965108','0','0',0x343633656563,'');
INSERT INTO pre_ucenter_members VALUES ('29',0xe5b08fe6a0bce8b083,0x3536373136303935623966393466346636633430323661666336653663346662,0x323238323938353033374071712e636f6d,'','',0x3232322e3231312e3132362e313634,'1378965142','0','0',0x363236373838,'');
INSERT INTO pre_ucenter_members VALUES ('30',0x4c7563792e57,0x6461376334643333643534393165396233316164393832396631346235393465,0x323632333430303730354071712e636f6d,'','',0x3131372e32322e3132332e313939,'1378965167','0','0',0x663636396339,'');
INSERT INTO pre_ucenter_members VALUES ('31',0xe998b3e58589e5a4a9e4b88b,0x3866646265353363643761326539643165303235663839373062633532333265,0x323735373036353633304071712e636f6d,'','',0x3132352e33342e35302e313230,'1378965347','0','0',0x333038623332,'');
INSERT INTO pre_ucenter_members VALUES ('32',0xe58da1e58897e5b0bce5a89c,0x3331303761616137326361663233373637643261373731616237383335343166,0x6b6172696e696e617275737369616e403136332e636f6d,'','',0x3131372e32322e3132332e313939,'1378965397','0','0',0x353434326530,'');
INSERT INTO pre_ucenter_members VALUES ('33',0xe98187e8a781e4b88be58d88e88cb6,0x3636356433366539343032396565323865653230383064373366386430303239,0x323836323132333335374071712e636f6d,'','',0x3232322e3231312e3132362e313634,'1378966284','0','0',0x636464336263,'');
INSERT INTO pre_ucenter_members VALUES ('34',0xe99bb7e593a5,0x3663613139616461386337366662313565313433343466613065653533643338,0x6b6576696e2e6e407468696e6b752e636e,'','',0x3131342e39332e3137302e313031,'1378966547','0','0',0x333538363538,'');
INSERT INTO pre_ucenter_members VALUES ('35',0x47e68998,0x3261363561396665656436383061613931353630343764366534386666376638,0x64756e6b696e3434403136332e636f6d,'','',0x3131372e32322e3132332e313939,'1378966574','0','0',0x653963336163,'');
INSERT INTO pre_ucenter_members VALUES ('36',0xe6989fe6989fe782b9e781af,0x6438313832323533613937323535333832353132653733666635313233336338,0x63796e34353033353734403136332e636f6d,'','',0x3232322e3230392e3134382e3536,'1378966787','0','0',0x336130383166,'');
INSERT INTO pre_ucenter_members VALUES ('37',0xe993b6e7bfbce79a84e9ad94e69cafe5b888,0x3234356539383230623137336630373265366637643261643439616531326664,0x3237313939393230334071712e636f6d,'','',0x3232322e3230392e3134382e3536,'1378967103','0','0',0x666533633964,'');
INSERT INTO pre_ucenter_members VALUES ('38',0x426574746572,0x3264653339666566373830383430306163373662393136326233393464393337,0x3238303036373135384071712e636f6d,'','',0x3232322e3231312e3132362e313634,'1378967245','0','0',0x643864656633,'');
INSERT INTO pre_ucenter_members VALUES ('39',0xe6b2b9e88f9ce88ab1e88ab1e9a39ee9bb84,0x6531636530646362306137626531323930383230393135666264653264353265,0x77686364313231403136332e636f6d,'','',0x35392e3137342e3130362e313930,'1378967798','0','0',0x363362306536,'');
INSERT INTO pre_ucenter_members VALUES ('40',0x436869687561687561,0x3664313638633834376462633238623539323434336232623536326337316334,0x3431383432313134384071712e636f6d,'','',0x3131372e32322e3132332e313939,'1378968163','0','0',0x333133653230,'');
INSERT INTO pre_ucenter_members VALUES ('41',0xe99986e5b08fe587a4,0x6631643766303664626635633239653038326438323762663263316131623633,0x6c7572696f313440686f746d61696c2e636f6d,'','',0x3131372e32322e3132332e313939,'1378968276','0','0',0x346239333434,'');
INSERT INTO pre_ucenter_members VALUES ('42',0xe9878ce5a5a52de8b4b9e8bfaae58d97e5beb7,0x6465343931643762613735376532386363656237306539616161396664373462,0x6c7572696f31334071712e636f6d,'','',0x3131372e32322e3132332e313939,'1378968425','0','0',0x393330656131,'');
INSERT INTO pre_ucenter_members VALUES ('43',0xe58f91e5b896e78b82e4babae78e8be88081e5b888,0x6265623632613539646537363864303336326264303361316661663935653132,0x6c7572696f313140686f746d61696c2e636f6d,'','',0x3131372e32322e3132332e313939,'1378968593','0','0',0x316238383534,'');
INSERT INTO pre_ucenter_members VALUES ('44',0xe7b4abe889b2e59b9be58fb6e88d89,0x3365316666343266613839643163346432666361313030326137333332313735,0x313432303232343738354071712e636f6d,'','',0x3231382e37322e31332e323336,'1378969858','0','0',0x323733636262,'');
INSERT INTO pre_ucenter_members VALUES ('45',0xe69d8ee5a7a8e5a4ab,0x3436396564333661623835353965376661646132373130393562656332646462,0x616c75616c75616c75616c754071712e636f6d,'','',0x3232322e3231312e3132362e313634,'1378969937','0','0',0x313935393935,'');
INSERT INTO pre_ucenter_members VALUES ('46',0xe582bbe5b8bde4b99fe69c89e698a5e5a4a9,0x6161313039386366666165326134306266616533663636383663343436386331,0x3234353238303236394071712e636f6d,'','',0x3232322e3230392e3134382e3536,'1378970202','0','0',0x613734653361,'');
INSERT INTO pre_ucenter_members VALUES ('47',0xe9ad94e58a9be5b08fe882a5e79a82,0x3535626166356333323431343466633430633864393762306135303163396233,0x313739323238343530364071712e636f6d,'','',0x3232322e3231312e3132362e313634,'1378970660','0','0',0x346334343331,'');
INSERT INTO pre_ucenter_members VALUES ('48',0xe6a0bce6a0bce5b7ab,0x3063376235393563373136386433646564656633663164383037366464376130,0x77687368656e796f75403136332e636f6d,'','',0x35392e3137342e3130362e313930,'1378970927','0','0',0x663738366331,'');
INSERT INTO pre_ucenter_members VALUES ('49',0x41757374696e2e4c75616e,0x3136313965323930633531326235336637383362323832383638646230646466,0x313137313535323638304071712e636f6d,'','',0x3132332e3131342e3131302e323235,'1378972780','0','0',0x633131616631,'');
INSERT INTO pre_ucenter_members VALUES ('50',0xe69ca8e69ca8e5b08f6c75636b79,0x6137643530323439353464333464663737333565623533313335623737653861,0x313733363432303231364071712e636f6d,'','',0x35392e3137342e3130362e313930,'1378973684','0','0',0x343637633237,'');
INSERT INTO pre_ucenter_members VALUES ('51',0xe683b3e8a681e695b0e695b0e79a84e9b1bc,0x3662633032666264323332653837623463356232653666333565383331663738,0x323336373634323439314071712e636f6d,'','',0x3231382e37322e31332e323336,'1378974500','0','0',0x343033343832,'');
INSERT INTO pre_ucenter_members VALUES ('52',0xe68891e788b1e59083e7b396,0x6562393361336566383666343661336231343339666566633066323530353834,0x313930383937353536394071712e636f6d,'','',0x3231382e37322e31332e323336,'1378974681','0','0',0x396463313738,'');
INSERT INTO pre_ucenter_members VALUES ('53',0xe5a682e69e9ce4ba95e7bba7e7bbade4ba95,0x3662383936336366353265346562383439613961366538356234373536626562,0x6169676d6174403136332e636f6d,'','',0x35392e3137342e3130362e313930,'1378975993','0','0',0x613033613063,'');
INSERT INTO pre_ucenter_members VALUES ('54',0x62696c69616e31323231,0x6435613365636631373439326664663532643832386636333630373634613566,0x3835343130393039384071712e636f6d,'','',0x32372e31372e36312e313035,'1379052248','0','0',0x386234343030,'');
INSERT INTO pre_ucenter_members VALUES ('55',0x6b696b6f6d696b6f,0x6238613737333135396138666435326332333432386637356165383165653261,0x6b696b6f6d696b6f4071712e636f6d,'','',0x35382e36322e3137332e323236,'1379052268','0','0',0x636465376562,'');
INSERT INTO pre_ucenter_members VALUES ('56',0x6173686c657977616e677975,0x6530313936653331636262363735303661383262326264306336656332373966,0x6173686c657933323640686f746d61696c2e636f6d,'','',0x3232312e3233322e3130342e323438,'1379052341','0','0',0x356631386331,'');
INSERT INTO pre_ucenter_members VALUES ('57',0xe58aa0e4b880,0x3232643633313435353130326163633366353433646564643434623762373463,0x3337323735393638354071712e636f6d,'','',0x3231302e33322e372e3336,'1379052460','0','0',0x633138653362,'');
INSERT INTO pre_ucenter_members VALUES ('58',0x76697669,0x6332336134343134323062386339313830396531636166613563333933356264,0x3537363834323537344071712e636f6d,'','',0x3131382e3131322e32322e313237,'1379052465','0','0',0x316331383964,'');
INSERT INTO pre_ucenter_members VALUES ('59',0x456c656e61,0x6639333930616231326263336136646330346435353334343439373037393738,0x646f35657570407468696e6b75676d61742e636f6d,'','',0x3132322e3233332e3139332e323436,'1379052552','0','0',0x383363326437,'');
INSERT INTO pre_ucenter_members VALUES ('60',0x53796c766965,0x3731386464343765393737323639323131623330383634663036373531663439,0x653269647064407468696e6b75676d61742e636f6d,'','',0x3137312e38382e3131342e3932,'1379052593','0','0',0x316439343963,'');
INSERT INTO pre_ucenter_members VALUES ('61',0x6368726973,0x3635633930373533633462303764653639666637303935666430343164313538,0x6370626d6131407468696e6b75676d61742e636f6d,'','',0x3230322e3130312e3138372e3636,'1379052635','0','0',0x623661346630,'');
INSERT INTO pre_ucenter_members VALUES ('62',0x79616d61e889be,0x3333646432636230623536313435366663356239393363643535666666326534,0x7368656e61693131303540676d61696c2e636f6d,'','',0x3137352e3135322e36312e313430,'1379052651','0','0',0x623238613237,'');
INSERT INTO pre_ucenter_members VALUES ('63',0x736b756c6c79756b69,0x3765306635393337633866616564636132316661373039313231323331323630,0x72616368656c5f3138406d736e2e636e,'','',0x3138322e3134382e3131312e313331,'1379052809','0','0',0x396632313938,'');
INSERT INTO pre_ucenter_members VALUES ('64',0x77783135373138323831,0x6436383434366432623131653530616531313539306238373962343363326435,0x31353731383238314071712e636f6d,'','',0x3130362e38302e34372e37,'1379053275','0','0',0x626566663839,'');
INSERT INTO pre_ucenter_members VALUES ('65',0xe8919be99d99,0x6662393638366536623735636533393335393463343537353435643832356539,0x7a7630356372407468696e6b75676d61742e636f6d,'','',0x3137312e3232312e362e313638,'1379053338','0','0',0x613665323639,'');
INSERT INTO pre_ucenter_members VALUES ('66',0x6c69757368616f79696e67,0x6236663361383563666236626561643933313364663862303537623765333334,0x313135343039323837364071712e636f6d,'','',0x3132342e37372e3231312e313837,'1379054028','0','0',0x633930303063,'');
INSERT INTO pre_ucenter_members VALUES ('67',0x6d6169737931303330,0x3635383236313531633832616331346564613166613334656161616665326231,0x3435353236363336304071712e636f6d,'','',0x3131392e3134362e3138382e313830,'1379054176','0','0',0x306533393537,'');
INSERT INTO pre_ucenter_members VALUES ('68',0xe597b3e59392e59392,0x3539356465393263663534616433373938306330306339303037313965623032,0x647763636a62407468696e6b75676d61742e636f6d,'','',0x35392e3137342e3130352e313734,'1379137716','0','0',0x343564393662,'');
INSERT INTO pre_ucenter_members VALUES ('69',0x353031383837383432,0x3730653464373338363034356461666162663864643464303266376533373331,0x3530313838373834324071712e636f6d,'','',0x35392e3137342e3130352e313734,'1379138065','0','0',0x316535616633,'');
INSERT INTO pre_ucenter_members VALUES ('70',0xe783ade6adbbe4babae79a84e5a48fe5a4a9,0x3533663465346434323064643231376331386664343763363266303965613365,0x37353330383336354071712e636f6d,'','',0x35392e3137342e3130352e313734,'1379144603','0','0',0x623838373934,'');
INSERT INTO pre_ucenter_members VALUES ('71',0xe6b0b4e793b6e4b8abe5a4b4,0x6366363936333535306236393936613132666462353332666530623636623731,0x313931313238393834394071712e636f6d,'','',0x3231392e3134342e3230342e313537,'1379211594','0','0',0x613434663439,'');
INSERT INTO pre_ucenter_members VALUES ('72',0xe5a4a7e799bde884b8,0x3138623737333762383266653439613836333466336432373933303262336536,0x77626d766c72407468696e6b75676d61742e636f6d,'','',0x3132352e3132312e3231382e323439,'1379313627','0','0',0x623439306364,'');
INSERT INTO pre_ucenter_members VALUES ('73',0xe6b2abe6b2ab,0x6161656230336336356366316539663364386430386639393364353366353364,0x6f6466647265407468696e6b75676d61742e636f6d,'','',0x3138322e3134392e35392e323336,'1379403821','0','0',0x653034376535,'');
INSERT INTO pre_ucenter_members VALUES ('74',0x48656c656e61,0x3739623033396464626161313762353337653465366661363131653161303564,0x68656c656e612e68407468696e6b752e636e,'','',0x3132352e33342e35352e313832,'1379408646','0','0',0x366262383836,'');
INSERT INTO pre_ucenter_members VALUES ('75',0xe99ba8e5a4a9,0x3336333734613532356534356537613434396235373332653366396332316639,0x323833383233363933384071712e636f6d,'','',0x3132352e33342e35352e313832,'1379409154','0','0',0x323864306336,'');
INSERT INTO pre_ucenter_members VALUES ('76',0xe985b7e78b97e78b97,0x6136666130353633363539623230653833356466366662326538333036333730,0x6e696b692e6c407468696e6b752e636e,'','',0x3232302e3136362e3232392e313237,'1382950042','0','0',0x616331663066,'');
INSERT INTO pre_ucenter_members VALUES ('77',0xe69599e69599,0x3430393163646536376162393662633239383766653733316533633430633864,0x7134356c736b407468696e6b75676d61742e636f6d,'','',0x35392e3137342e3130342e3637,'1382952054','0','0',0x363563653238,'');
INSERT INTO pre_ucenter_members VALUES ('78',0xe4b8abe7b1b3,0x3534633730316664646166353239663434373763313637373966313332396238,0x323236323739353436374071712e636f6d,'','',0x3138332e39342e32312e313831,'1384495624','0','0',0x383534636166,'');
INSERT INTO pre_ucenter_members VALUES ('79',0x6d693132336d61363637,0x3963343738323830653537303930373336393961636434613032626635343363,0x756a6f757575407468696e6b75676d61742e636f6d,'','',0x3131342e3235352e34302e3335,'1384696470','0','0',0x363135333936,'');
INSERT INTO pre_ucenter_members VALUES ('80',0xe5bc80e5bf83e8b186,0x6431313065316362613234616564343230316134666239356233336465306239,0x7131356d3571407468696e6b75676d61742e636f6d,'','',0x3132322e3233342e3231362e313338,'1385434264','0','0',0x383839656239,'');
INSERT INTO pre_ucenter_members VALUES ('81',0xe6999ae6999ae5909be59096,0x3762643930613335653038663134663262313236383862393434316665363538,0x32343236353133354071712e636f6d,'','',0x3131372e33362e352e3930,'1385434479','0','0',0x663738333263,'');
INSERT INTO pre_ucenter_members VALUES ('82',0xe586ace5a4a9,0x3339656565353430333265306239666566643661373838336431633864643335,0x6a6463626368407468696e6b75676d61742e636f6d,'','',0x3132352e33342e35312e313938,'1385970229','0','0',0x353731666664,'');
INSERT INTO pre_ucenter_members VALUES ('83',0x7869616f62616f,0x3764343934383562613033636266316465313139633733373936393034343663,0x756b7a6d7170407468696e6b75676d61742e636f6d,'','',0x3131342e39332e3137312e313332,'1386733278','0','0',0x653434373933,'');
INSERT INTO pre_ucenter_members VALUES ('84',0x446f726961,0x3739393266613931313261626533343032323163366265393362303438666364,0x323238343930363839334071712e636f6d,'','',0x3232322e39302e3137302e3137,'1386735271','0','0',0x376535323862,'');
INSERT INTO pre_ucenter_members VALUES ('85',0xe5818fe689a7e680aae4baba,0x3435373266616164653835303865363765643135323633326331613234386331,0x3437303138373430304071712e636f6d,'','',0x3232322e39302e3137302e3137,'1386745561','0','0',0x396566356566,'');
INSERT INTO pre_ucenter_members VALUES ('86',0x6b656c6c795f73,0x6665653231353736626430306138316233343865396139316635616464646164,0x666874637030407468696e6b75676d61742e636f6d,'','',0x3137312e38392e38322e3536,'1387089743','0','0',0x663439623661,'');
INSERT INTO pre_ucenter_members VALUES ('87',0x416e6b6579e69da5e592af,0x3535646135353762303365663064313662396465373461393534646537333931,0x7673786b6c36407468696e6b75676d61742e636f6d,'','',0x3132322e3233342e3232322e313032,'1387267990','0','0',0x323238393535,'');
INSERT INTO pre_ucenter_members VALUES ('88',0x796b6169787565736875,0x3064393334306633323063636263393936633038646239643961646237633462,0x3833373633313732304071712e636f6d,'','',0x3131392e39372e3139362e3732,'1387464993','0','0',0x323030323839,'');
INSERT INTO pre_ucenter_members VALUES ('89',0x416c657831353235,0x3036333230333566333062643336623538643536323333303034396236366537,0x6d69636b657931353235403132362e636f6d,'','',0x3231302e33322e372e313233,'1387542473','0','0',0x393436633834,'');
INSERT INTO pre_ucenter_members VALUES ('90',0x373030676f,0x3632626561303937323534323338663336623638343564393064363632643630,0x666130616c37407468696e6b75676d61742e636f6d,'','',0x32372e31362e3134332e323039,'1387763017','0','0',0x393064376635,'');
INSERT INTO pre_ucenter_members VALUES ('91',0x666564657261626569,0x3833633366623133313731356362383830643437386137353131643630303035,0x7a68616e67787565626569403132362e636f6d,'','',0x3231382e39342e36322e313836,'1387766941','0','0',0x643733633737,'');
INSERT INTO pre_ucenter_members VALUES ('92',0x626c617a65313535,0x3265613231373533353832376630643239333262316330613335626464623832,0x666c79746f746865736b7931353540686f746d61696c2e636f6d,'','',0x3131332e3131312e3231332e313530,'1387767902','0','0',0x656135376535,'');
INSERT INTO pre_ucenter_members VALUES ('93',0x77656e6779,0x3766313337323034633438643434316263346163336566346265373764373262,0x3434313430313435364071712e636f6d,'','',0x3232322e3230352e31312e3838,'1387771087','0','0',0x663439643365,'');
INSERT INTO pre_ucenter_members VALUES ('94',0x7676766967,0x6535396637393534366262373965616639316465306230373136663633326161,0x7463776f6f77407468696e6b75676d61742e636f6d,'','',0x3138322e3133392e3133322e3737,'1387777982','0','0',0x653664353836,'');
INSERT INTO pre_ucenter_members VALUES ('95',0x6c696c6c7573696f6e69737465,0x6533333665333039383735366630633539613439336232663461613134303532,0x76696365636974796c694073696e612e636f6d,'','',0x3132332e3132342e3233302e313039,'1387777982','0','0',0x653830636265,'');
INSERT INTO pre_ucenter_members VALUES ('96',0x6e61747676,0x3862616632393266616439346239316339316639373863626638383364643464,0x3332383830363231394071712e636f6d,'','',0x3137312e3131332e3130352e3639,'1387778106','0','0',0x613436666534,'');
INSERT INTO pre_ucenter_members VALUES ('97',0x47726f734368656e,0x3364323237383762336661333035343138396237616333326138313238666334,0x3334373139393230324071712e636f6d,'','',0x35382e36332e3131342e3733,'1387778638','0','0',0x653337653734,'');
INSERT INTO pre_ucenter_members VALUES ('98',0x67656a696e67,0x3933353537653862346636636365623263636537623536383963323933343331,0x67656a696e673131384073696e612e636f6d,'','',0x3232312e31302e38382e3535,'1387778846','0','0',0x653833316263,'');
INSERT INTO pre_ucenter_members VALUES ('99',0xe58faee5bd93e5bd93,0x6237303233333362666639643363646536623730303263343434623161323731,0x3836373737383433364071712e636f6d,'','',0x36312e3138352e3232342e323433,'1387779264','0','0',0x303964613463,'');
INSERT INTO pre_ucenter_members VALUES ('100',0x656e7368696e653138,0x3361353239313664363961363366336134643033653835393430653461336166,0x3435343335373132374071712e636f6d,'','',0x3132342e3135362e36352e323532,'1387779542','0','0',0x366335336366,'');
INSERT INTO pre_ucenter_members VALUES ('101',0x5368617768616d,0x3930623633383464646639656439366563613732613065623632643935333834,0x3730373933393735364071712e636f6d,'','',0x3131332e3130382e3136362e3539,'1387782164','0','0',0x343962313862,'');
INSERT INTO pre_ucenter_members VALUES ('102',0x76657264616e74,0x3032393066663732313638633639663764636432666231333439326338666537,0x3534363633373937324071712e636f6d,'','',0x3131332e3130332e3134322e313334,'1387785227','0','0',0x626539373661,'');
INSERT INTO pre_ucenter_members VALUES ('103',0x656d696c797a796d,0x3466363163353430613332626135333862643562353434646633353935336236,0x7a68616e6779696e6d656e67393340676d61696c2e636f6d,'','',0x3231382e38382e39332e313331,'1387785483','0','0',0x626265376133,'');
INSERT INTO pre_ucenter_members VALUES ('104',0x656d696c797a796d6d,0x3935363537353331626165653539386130346361613633396139643934343838,0x3338323337313538324071712e636f6d,'','',0x3231382e38382e39332e313331,'1387785772','0','0',0x636265356633,'');
INSERT INTO pre_ucenter_members VALUES ('105',0xe88ab1e8a3a4e5ad90e58588e6a3ae,0x6234316538623564306663636564323663303336336330303461646135373833,0x3836373232343534334071712e636f6d,'','',0x3232322e3230392e3131302e3537,'1387786136','0','0',0x386366356165,'');
INSERT INTO pre_ucenter_members VALUES ('106',0xe698afe69bb0e6ada4e6b180,0x3239356564623834376430316631356537313531653461343637326230386262,0x313039373739383936394071712e636f6d,'','',0x3131312e3137342e35382e3239,'1387786447','0','0',0x663933383366,'');
INSERT INTO pre_ucenter_members VALUES ('107',0xe29886446f75626c655f65e29885,0x3034313963646335346531313432653331323338393831343636336366383933,0x3236313836343837344071712e636f6d,'','',0x3131392e3133312e3138362e3430,'1387787104','0','0',0x303439336630,'');
INSERT INTO pre_ucenter_members VALUES ('108',0xe5ae88e69c9be9baa6e794b0,0x3934643332663762636430323762333430653836656161646263626631386631,0x3938313535313032314071712e636f6d,'','',0x3138302e3136382e32382e3930,'1387790179','0','0',0x333166313830,'');
INSERT INTO pre_ucenter_members VALUES ('109',0x6369766574636174,0x3532313566333132376239636531356334356637666635306532303965613933,0x63697665746361743940676d61696c2e636f6d,'','',0x33312e3230352e392e323432,'1387791766','0','0',0x363838626166,'');
INSERT INTO pre_ucenter_members VALUES ('110',0x532e542e,0x3066313938313230363237363334316337353463333337313166323263326530,0x3431353534383130364071712e636f6d,'','',0x33312e3230352e392e323432,'1387793853','0','0',0x643637613136,'');
INSERT INTO pre_ucenter_members VALUES ('111',0x48696c6c617279373739,0x3530656361333038333133393765353536613566633634643265633266323561,0x3934303334383532364071712e636f6d,'','',0x3132322e3233342e3231372e3638,'1387797661','0','0',0x643839373166,'');
INSERT INTO pre_ucenter_members VALUES ('112',0xe892b9e891ade88b8de88b8d,0x3437613166323465363137616236396265656233373363653333313437346532,0x3336333035343234344071712e636f6d,'','',0x3132342e3232352e3139372e313837,'1387799329','0','0',0x316232386434,'');
INSERT INTO pre_ucenter_members VALUES ('113',0xe596b527735f4c756c6c616279,0x6433373965313262623166393738366630313034346532363465373939643263,0x3639303430303530364071712e636f6d,'','',0x3232312e3139362e3135312e3234,'1387800540','0','0',0x633165383730,'');
INSERT INTO pre_ucenter_members VALUES ('114',0x7661696e736f6e,0x6631633035373237306665663933643362613961393436353131653937306237,0x6368656e6c6979696e6739324073696e612e636f6d,'','',0x32372e3131352e38332e313434,'1387806074','0','0',0x616436383931,'');
INSERT INTO pre_ucenter_members VALUES ('115',0x4c7a73,0x3662366464303739303864666266316666353639653632333338633762363536,0x313031373034343538384071712e636f6d,'','',0x3132302e3131382e312e3931,'1387817110','0','0',0x363931393633,'');
INSERT INTO pre_ucenter_members VALUES ('116',0x7a6e6e,0x3362613062316637666434306338633964633563616431363263373461363437,0x6d656c6f64797a6e6e40676d61696c2e636f6d,'','',0x33312e3230352e31342e3137,'1387826046','0','0',0x653130623163,'');
INSERT INTO pre_ucenter_members VALUES ('117',0xe999a4e58db4e5b7abe5b1b1e4b88de698afe4ba91,0x3135393862643336663530636566663661326539313434383864336631313066,0x3537363636313937334071712e636f6d,'','',0x3138322e3133392e3133322e3833,'1387848759','0','0',0x373539623061,'');
INSERT INTO pre_ucenter_members VALUES ('118',0x6b6576696e696e6368696e61,0x3138386162656533326132373736356636326334386130653037336339643163,0x6b6576696e696e6368696e614073696e612e636f6d,'','',0x3231382e35362e3139362e3936,'1387850855','0','0',0x376466323462,'');
INSERT INTO pre_ucenter_members VALUES ('119',0x4c696e73656e,0x3732366130633033366138616463363738343035663032353139613935366530,0x796c73303730374071712e636f6d,'','',0x35382e36302e312e313230,'1387857043','0','0',0x333964353737,'');
INSERT INTO pre_ucenter_members VALUES ('120',0x44656c61696e,0x3134333862663362393134363139363061663934313036383965333130313335,0x3835373836373838324071712e636f6d,'','',0x3132352e3232312e3130362e3335,'1387861437','0','0',0x643361333965,'');
INSERT INTO pre_ucenter_members VALUES ('121',0x70616e3737766970,0x6562343335396364303433333933386561623364353535303462386263643238,0x6c7563796368656e373135403132362e636f6d,'','',0x3231302e32322e3132392e323133,'1387873151','0','0',0x663433303762,'');
INSERT INTO pre_ucenter_members VALUES ('122',0xe9bd90e5b08fe7859c,0x3134343066313762656236353536336438623633353930326237666431653437,0x3533303833383034314071712e636f6d,'','',0x3131392e342e3235322e313834,'1387874067','0','0',0x336362383233,'');
INSERT INTO pre_ucenter_members VALUES ('123',0x73686572727951,0x3033346238646139333063356639663734396465636630613137393034383766,0x3834343238373934344071712e636f6d,'','',0x3132342e3135362e36352e313338,'1387880121','0','0',0x393130613365,'');
INSERT INTO pre_ucenter_members VALUES ('124',0xe5b2abe5b2ab,0x6561623163396635633166313462373566616532663363643061333331323032,0x3334303033383638394071712e636f6d,'','',0x3138302e3136302e3138312e313833,'1387895449','0','0',0x393839623230,'');
INSERT INTO pre_ucenter_members VALUES ('125',0xe68792e4b8abe5a4b4,0x3636366238396533633932353339366266643565333062633237383563346261,0x6d6f67756d756d7540796561682e6e6574,'','',0x3132322e3233342e3231382e31,'1387950118','0','0',0x363635313164,'');
INSERT INTO pre_ucenter_members VALUES ('126',0x736a6a313637,0x3734386639393734653266616639363939656138336139326338313935346639,0x676f6c66626162793838363136403136332e636f6d,'','',0x3132322e3233342e3231382e31,'1387951264','0','0',0x303933633363,'');
INSERT INTO pre_ucenter_members VALUES ('127',0x68616f313233,0x3934316666616231366538323136626137656261363561393233346432343063,0x73756e6e796c6f76656d756d754073696e612e636f6d,'','',0x3132322e3233342e3231382e31,'1387951971','0','0',0x336238613964,'');
INSERT INTO pre_ucenter_members VALUES ('128',0x6d6666313330393131,0x3035353737353661623436393062623933313362343130366465613733356366,0x3536383930333733344071712e636f6d,'','',0x35392e36382e36302e313236,'1387954509','0','0',0x646266393937,'');
INSERT INTO pre_ucenter_members VALUES ('129',0x53746576656e57616e67,0x3235326439306130326562666239613433663735636462303436326430343134,0x3634383933333931314071712e636f6d,'','',0x32372e33322e3131302e313637,'1387956854','0','0',0x363035383935,'');
INSERT INTO pre_ucenter_members VALUES ('130',0x6c616f746f75,0x3737643333393263346632636663323432346333303230343639336364333962,0x3135303331353739364071712e636f6d,'','',0x3132322e3233342e3231382e31,'1387958167','0','0',0x373335616564,'');
INSERT INTO pre_ucenter_members VALUES ('131',0xe69d8ee59388e59388,0x3766346364396266613564653261393930633932346136306564666638363933,0x766b6265726e696540676d61696c2e636f6d,'','',0x3131382e3132322e39332e3836,'1387961546','0','0',0x613134346534,'');
INSERT INTO pre_ucenter_members VALUES ('132',0x6b6576696e,0x3030313162343165323639336630653533623165303563636164386366353236,0x323336393938313339364071712e636f6d,'','',0x3131392e362e32392e3130,'1387967747','0','0',0x336537383461,'');
INSERT INTO pre_ucenter_members VALUES ('133',0xe69d8ee7bbbfe88cb6,0x6137363637323336333764336638303931643766623139663237323062343135,0x6c6c73793132324073696e612e636f6d,'','',0x3232322e3136312e3230352e3937,'1387968786','0','0',0x323461373934,'');
INSERT INTO pre_ucenter_members VALUES ('134',0x76696b6b69,0x3263643233386466396637343965326139393439313436666163383938613835,0x6d656e6773736d794071712e636f6d,'','',0x31342e32392e3130392e313939,'1387969972','0','0',0x343062643462,'');
INSERT INTO pre_ucenter_members VALUES ('135',0xe88c83e4ba9ae7929e,0x6637313363323066666463643330323732343039663839323461613262303934,0x3932366c796e4073696e612e636f6d,'','',0x3138332e3138352e3131332e323231,'1387977425','0','0',0x313636313230,'');
INSERT INTO pre_ucenter_members VALUES ('136',0x527573656d616b656f6e6568617070,0x3566346239636439666163366137343266623837656433326132633734616539,0x323736333133373335394071712e636f6d,'','',0x3131332e3230302e3234392e3830,'1387988625','0','0',0x313838333536,'');
INSERT INTO pre_ucenter_members VALUES ('137',0xe5b08fe99bb7,0x3164653861303265306336613534633736376364613931373531643338633137,0x3339313938373538354071712e636f6d,'','',0x34322e3232342e35362e3835,'1388069474','0','0',0x323336653532,'');
INSERT INTO pre_ucenter_members VALUES ('138',0x6173646661736466313030,0x3266623935313463373836643230313530613131393438323738643031366430,0x6c617669655f31304073696e612e636f6d,'','',0x3232312e3232322e3135372e34,'1388116340','0','0',0x346466356337,'');
INSERT INTO pre_ucenter_members VALUES ('139',0x46696674792d74776f,0x3138333032663161636465623832623866636661616133643135663836313264,0x3431303238343635334071712e636f6d,'','',0x35392e3137322e3139352e313030,'1388119791','0','0',0x663539656665,'');
INSERT INTO pre_ucenter_members VALUES ('140',0x6a656e6e797a,0x6231323835386664633661663532356336333163663138366539623937326638,0x3430333638393239344071712e636f6d,'','',0x3131312e36332e302e323331,'1388160915','0','0',0x333835343034,'');
INSERT INTO pre_ucenter_members VALUES ('141',0x7377616c6c6f776c65756e67,0x3361353135336138643335643235383963396636363766363634326538373137,0x7377616c6c6f773738303040686f746d61696c2e636f6d,'','',0x3136332e3134322e3230332e323232,'1388201749','0','0',0x356436336634,'');
INSERT INTO pre_ucenter_members VALUES ('142',0xe99ca1e99c82e381aee8afad,0x3632306135396230666330393139636535666564646365396334633935333030,0x626c61636b7261626269743233304073696e612e636f6d,'','',0x3231382e32362e332e3138,'1388219273','0','0',0x393137396666,'');
INSERT INTO pre_ucenter_members VALUES ('143',0x636563696c6961,0x3637343134333039316662373037646135653236343838343633643764613365,0x3435353937343338344071712e636f6d,'','',0x3137352e34332e3132342e3430,'1388231207','0','0',0x373235333261,'');
INSERT INTO pre_ucenter_members VALUES ('144',0xe78ea55f27,0x3635336236343931326362616536613666616664303966633735383830303661,0x3537383137343039384071712e636f6d,'','',0x3138332e39342e3134342e3735,'1388240139','0','0',0x623365646661,'');
INSERT INTO pre_ucenter_members VALUES ('145',0xe4ba94e6af92e69d82e8b4a7e59586,0x3133666661393635336431306238663061323335343439666366623766313331,0x796c79796c79303038314073696e612e636f6d,'','',0x3137332e33302e3130322e313131,'1388348217','0','0',0x393131303633,'');
INSERT INTO pre_ucenter_members VALUES ('146',0x736e61726169,0x3261363064306134343539366361356631313333313335303335393433363661,0x3930373539343035304071712e636f6d,'','',0x3131392e39382e36342e313337,'1388491276','0','0',0x636539363965,'');
INSERT INTO pre_ucenter_members VALUES ('147',0x72696f6c753134,0x3066363738363366663630306464613630373438353264613165316436383966,0x323037323936363435324071712e636f6d,'','',0x3132342e3131342e36382e323030,'1388649598','0','0',0x653462343135,'');
INSERT INTO pre_ucenter_members VALUES ('148',0xe5b08fe69d8e,0x3537363765363165383639633739633239333635353439636264326165363630,0x3439333930393736384071712e636f6d,'','',0x3131352e36332e3136382e3235,'1388837894','0','0',0x366530343737,'');
INSERT INTO pre_ucenter_members VALUES ('149',0xe88ab1e88ab1e8a399e5ad90,0x6636643530313562623135363133626661376530656262643534373433623365,0x686579696c696e353132403136332e636f6d,'','',0x3232322e3230392e3131312e323237,'1388846625','0','0',0x316265663162,'');
INSERT INTO pre_ucenter_members VALUES ('150',0x7377616e5f6c6f76696e67,0x6361616666343465656230383261353963333536616234333934366535363561,0x797562696e676e696e675f31393931403136332e636f6d,'','',0x36302e3231352e3235352e313930,'1388997148','0','0',0x633366353934,'');
INSERT INTO pre_ucenter_members VALUES ('151',0x526567696e61,0x6632663232376164343537663430306335643566383637353638313039363439,0x3132313632353531394071712e636f6d,'','',0x3232322e3231302e3234312e3333,'1389016907','0','0',0x623261353236,'');
INSERT INTO pre_ucenter_members VALUES ('152',0xe59cb0e78bb1e381aee5a4a9e4bdbfe3808f,0x3665323931333765313930376461316435353536343133386434653864653639,0x6a756e79697a68616f3230313340676d61696c2e636f6d,'','',0x36362e3139302e3136342e313931,'1389112375','0','0',0x376130396131,'');
INSERT INTO pre_ucenter_members VALUES ('153',0xe78baee5ad90e5baa77361726168,0x6136643036623234643263366565653536663166636464353465316337613635,0x323039393339363136334071712e636f6d,'','',0x35382e33352e3136322e3236,'1389146893','0','0',0x643235656364,'');
INSERT INTO pre_ucenter_members VALUES ('154',0xe69e97e981a5e5ad902e,0x3062313966616538663536633231666435636338346637313664623639303432,0x3431363433323932384071712e636f6d,'','',0x37342e3232302e372e313836,'1389147336','0','0',0x386163653934,'');
INSERT INTO pre_ucenter_members VALUES ('155',0x4a656e6e79,0x3138313938326230346365353561663839666430393066323764313464613237,0x6a656e6e792e6c696e672e7a68616e6740676d61696c2e636f6d,'','',0x3132322e3134332e342e323133,'1389159237','0','0',0x356432646437,'');
INSERT INTO pre_ucenter_members VALUES ('156',0x66656962616b6572,0x6261613132633032303863376534646231653231373334653163623539353936,0x3334343239353334394071712e636f6d,'','',0x3131362e3233312e39312e313734,'1389165668','0','0',0x346238303661,'');
INSERT INTO pre_ucenter_members VALUES ('157',0x313233,0x3036346536393830343530353736313533663664343763336435663639326336,0x73756e6e796c6f76656d756d75403136332e636f6d,'','',0x3131352e3230362e3139372e313435,'1389166123','0','0',0x626230356464,'');
INSERT INTO pre_ucenter_members VALUES ('158',0xe68192e6989fe4b88ae79a84e88b94e89793,0x6466656530626235633965326366643430393562393938383563656366363833,0x3339343232353739304071712e636f6d,'','',0x3131372e33322e3135332e313735,'1389168671','0','0',0x666338613465,'');
INSERT INTO pre_ucenter_members VALUES ('159',0xe280b2e6988ee9959ce58fb0,0x3031666134316634633635313439326163306161303062386136633063306137,0x3238343233393736394071712e636f6d,'','',0x35382e35352e3136392e313137,'1389174329','0','0',0x396139616530,'');
INSERT INTO pre_ucenter_members VALUES ('160',0x50484f454245,0x6333623932386230393362373665353836363437633765666631346130303863,0x313530383333313032354071712e636f6d,'','',0x32372e31362e33302e313035,'1389174895','0','0',0x666234643631,'');
INSERT INTO pre_ucenter_members VALUES ('161',0xe5bca5e7949fe38082,0x3666613432626437363530383164366361313931343462323230353862323566,0x33343530363032334071712e636f6d,'','',0x312e38322e3233332e3136,'1389185066','0','0',0x613062633337,'');
INSERT INTO pre_ucenter_members VALUES ('162',0xe9a38ee99baae6a2a7e6a190,0x6439653430393531643733663262323930353966323464343330303663346234,0x3439393237353037374071712e636f6d,'','',0x3131302e3138342e31312e32,'1389187847','0','0',0x376439363865,'');
INSERT INTO pre_ucenter_members VALUES ('163',0x797566616e7475,0x6261313039333231303532353366626332343235336430303365646632353031,0x313332383434333235384071712e636f6d,'','',0x3131392e33362e39322e313736,'1389191508','0','0',0x343838353030,'');
INSERT INTO pre_ucenter_members VALUES ('164',0x686f6d6567726179,0x6232313965636430383534646162396165373931326466633263323461623536,0x62696379636c6568616861403136332e636f6d,'','',0x39342e352e35322e313030,'1389195192','0','0',0x383838623139,'');
INSERT INTO pre_ucenter_members VALUES ('165',0x6c616c616c616c616c616c616c61,0x3335623232626139346163623538666335366534396563373932373263313533,0x323933383235333731314071712e636f6d,'','',0x3131302e3138342e38322e323439,'1389250187','0','0',0x626530333437,'');
INSERT INTO pre_ucenter_members VALUES ('166',0x4cc3a92ee895bec2a8,0x6263653964353835666239313737633134383535336239363064333838666233,0x726567696e615f79754073696e612e636e,'','',0x3137312e3232312e3135352e313836,'1389260795','0','0',0x626532346164,'');
INSERT INTO pre_ucenter_members VALUES ('167',0x4873696e6779616e,0x3835646331366639633662396466653631386163643739383430636163653235,0x7473696e6779616e40686f746d61696c2e636f6d,'','',0x3131312e33372e332e313037,'1389279217','0','0',0x313265376261,'');
INSERT INTO pre_ucenter_members VALUES ('168',0xe88bb9e69e9ce6a2a8e5ad90e9a699e89589e6a999,0x6164313766306339656339376634656462333161643637333861643337616635,0x323831363836303537334071712e636f6d,'','',0x3131302e3139312e3131392e323238,'1389352445','0','0',0x643863626562,'');
INSERT INTO pre_ucenter_members VALUES ('169',0x7ce583a4e88d87e6b79a,0x3338616631656236376439303835616534616466636133303463663231656264,0x3334323833353739324071712e636f6d,'','',0x3138332e3134372e3234322e313133,'1389365872','0','0',0x303236666637,'');
INSERT INTO pre_ucenter_members VALUES ('170',0x5363686e617070695f2d2d,0x3466386266336164363039636265303066303264313137356633653833653730,0x3439373831313334384071712e636f6d,'','',0x3132302e3139322e3233312e3539,'1389445402','0','0',0x616266363632,'');
INSERT INTO pre_ucenter_members VALUES ('171',0x4a656c6c7973616e67,0x3062636564363363316565356661613230323237373035616262616338666430,0x3337363135303939394071712e636f6d,'','',0x3131392e3235312e33362e313632,'1389446550','0','0',0x366464663637,'');
INSERT INTO pre_ucenter_members VALUES ('172',0x6c656168,0x3965306266383237643261613565636363303230666434326632653538303564,0x3334323230393832334071712e636f6d,'','',0x35302e3137342e3136362e3837,'1389574004','0','0',0x343931366466,'');
INSERT INTO pre_ucenter_members VALUES ('173',0x4175677573,0x6432363164373061316539633463306137656230303639383366376133626630,0x3530353134353737354071712e636f6d,'','',0x3132332e3133382e31372e3237,'1389582859','0','0',0x626434646131,'');
INSERT INTO pre_ucenter_members VALUES ('174',0x746f6d6d79313938383833,0x3061663439343138633436376436313638663962393136306639363864656663,0x746f6d6d793139383838334071712e636f6d,'','',0x3137312e3231362e3130332e313630,'1389594034','0','0',0x326365616563,'');
INSERT INTO pre_ucenter_members VALUES ('175',0xe5879de5a2a8c2b7e5a4a9e9a699,0x3437303161633030343765636463323162613631323234383166316138353933,0x3532363933303135394071712e636f6d,'','',0x3131312e3137342e39312e313239,'1389599377','0','0',0x316262353839,'');
INSERT INTO pre_ucenter_members VALUES ('176',0x71756c6533,0x3065613662643939653061616330386665663465663834343666646531643962,0x323335323833333935314071712e636f6d,'','',0x3131312e3133362e31362e313637,'1389611255','0','0',0x376365393561,'');
INSERT INTO pre_ucenter_members VALUES ('177',0xe69dbee9bca0e5a587e5a587e5a4a7e5b0bee5b7b4,0x3335653531613931306661653637363263626336323661386639333333313662,0x77797a3230313036363637403136332e636f6d,'','',0x3137312e3231322e3233312e3131,'1389676387','0','0',0x336230656636,'');
INSERT INTO pre_ucenter_members VALUES ('178',0x42656c6c61,0x3534326461303430366263643030666131623833326666656265376662643130,0x3431343337353638394071712e636f6d,'','',0x3132392e39332e352e313239,'1389678278','0','0',0x366339613565,'');
INSERT INTO pre_ucenter_members VALUES ('179',0xe5bf92e5bf92,0x3766623463376239663238653534393933373864646132323138653031613166,0x7368616f6c616e3230313040676d61696c2e636f6d,'','',0x36312e35312e37372e313435,'1389685039','0','0',0x666563643034,'');
INSERT INTO pre_ucenter_members VALUES ('180',0xe7b1b3e58da1,0x6436653132363739623164653666623161666238386362326631303337643639,0x3333323131353836384071712e636f6d,'','',0x3131352e3233362e3234382e313434,'1389699429','0','0',0x353337323639,'');
INSERT INTO pre_ucenter_members VALUES ('181',0xe8b4abe5b0bce58fb7e4b88de8afad,0x3733333239616638346232353333623434393730306662336438633134356331,0x73696e79756f403132362e636f6d,'','',0x3131332e3139352e3131392e3539,'1389702080','0','0',0x303763313566,'');
INSERT INTO pre_ucenter_members VALUES ('182',0x436c61697265,0x6330613335373831313935393537356637313335613438326432303765613334,0x7a61632e6c696e407961686f6f2e636e,'','',0x3138332e31332e3132312e3835,'1389755307','0','0',0x626531383661,'');
INSERT INTO pre_ucenter_members VALUES ('183',0xe59296e595a1e7899be5a5b6,0x6630303533326531643364316536356362646565643764623263363361303861,0x3237393731303932374071712e636f6d,'','',0x3139392e38382e32332e3939,'1389764958','0','0',0x653531636265,'');
INSERT INTO pre_ucenter_members VALUES ('184',0xe6a0bce8b0835f46656d616c65c2b0,0x3738363565623031343335656264623666333039633034333230336339666531,0x3839353035393330374071712e636f6d,'','',0x3131332e3133322e3138302e3531,'1389786399','0','0',0x663137613565,'');
INSERT INTO pre_ucenter_members VALUES ('185',0x6c79786c696665,0x6635336431373535646466323937396566373433393539613064383861383863,0x3935383739313739324071712e636f6d,'','',0x3131352e35362e302e323134,'1389872149','0','0',0x353564326261,'');
INSERT INTO pre_ucenter_members VALUES ('186',0x536f726f73246d696e67,0x3039346366643665616236663132333364316631616331376331383735303361,0x3836333137373032344071712e636f6d,'','',0x3131372e33322e3134392e3330,'1389877452','0','0',0x633761613863,'');
INSERT INTO pre_ucenter_members VALUES ('187',0x6b696c696e,0x3631656161646236363261616334653463333539353930326165313062653264,0x323139373439393639314071712e636f6d,'','',0x3131332e38392e302e34,'1389885687','0','0',0x373530613739,'');
INSERT INTO pre_ucenter_members VALUES ('188',0xe78cb4e5ad90e58588e7949f,0x3532386434343165393165393063313866353434356433383761653332313931,0x3536353338333631354071712e636f6d,'','',0x36302e3231352e31372e3230,'1389960259','0','0',0x343030323935,'');
INSERT INTO pre_ucenter_members VALUES ('189',0xe588985fe5b08f5fe9a9b4e38082,0x6138656464353865616266613762333161626537353361613265356539316430,0x6c656f6e616e323233403132362e636f6d,'','',0x3232322e3137312e3130372e3731,'1390100749','0','0',0x643862623535,'');
INSERT INTO pre_ucenter_members VALUES ('190',0xe880b3e69cbae593a5e7bda9e68891,0x3636633932343537343166623930373830346632333631613336313539393937,0x3430393836383938374071712e636f6d,'','',0x3131382e3234392e33312e313239,'1390137595','0','0',0x626335316433,'');
INSERT INTO pre_ucenter_members VALUES ('191',0xefbcbee596aee88c9ce790b3efbcbe,0x6633636366656366663761653137616233336532633031626639363435396131,0x3336343932303530324071712e636f6d,'','',0x38392e3232342e3131372e3236,'1390158318','0','0',0x653832626561,'');
INSERT INTO pre_ucenter_members VALUES ('192',0x6c736a303037,0x3631363736303362613233383834633334383361303466666238616663336433,0x3539373631343331364071712e636f6d,'','',0x3132312e3233312e33382e3130,'1390187065','0','0',0x393935653338,'');
INSERT INTO pre_ucenter_members VALUES ('193',0xe69a97e8a18ce5bea1e58fb22de5b1b1e98193,0x3063633064323565323636323239386263633662626534666535663663373732,0x3538333234383031304071712e636f6d,'','',0x3131392e39372e3139362e3638,'1390221574','0','0',0x366333353562,'');
INSERT INTO pre_ucenter_members VALUES ('194',0x303831323035313132,0x3462633961383030636561333338656339303065336136396533396565666231,0x7368616f7169616e383730383133403136332e636f6d,'','',0x35382e33322e3233342e313535,'1390273635','0','0',0x336566313065,'');
INSERT INTO pre_ucenter_members VALUES ('195',0xe5b08fe68792e899ab,0x6438393639316631353234613239343166363836303865643761636461646635,0x736a6a313637403132362e636f6d,'','',0x3131352e3139322e3139392e323338,'1390287278','0','0',0x653265386130,'');
INSERT INTO pre_ucenter_members VALUES ('196',0xe5b098e696ade9a38e,0x3664343831646638356534366631336338383235333862643636313764343937,0x3733313839303432364071712e636f6d,'','',0x37312e36312e33302e3337,'1390347966','0','0',0x656434343863,'');
INSERT INTO pre_ucenter_members VALUES ('197',0x4361727931303331,0x3131386564386133366334646661653762653739326234613739643032326432,0x3330383636363230354071712e636f6d,'','',0x3230332e3139302e3132372e323239,'1390362898','0','0',0x323566373363,'');
INSERT INTO pre_ucenter_members VALUES ('198',0xe58c97e9a5aee8a5bfe58789,0x6332616266653439333736383734633639613536643536663534333563373864,0x3331353536323939314071712e636f6d,'','',0x36372e3133382e3134322e313835,'1390410795','0','0',0x626261656138,'');
INSERT INTO pre_ucenter_members VALUES ('199',0x77656e647977656e64796e,0x3066353766343965346362656666633237326262396162353135376663656162,0x6e696577656e6368616f3037303340676d61696c2e636f6d,'','',0x3132392e3130302e39332e313139,'1390537471','0','0',0x663236656130,'');
INSERT INTO pre_ucenter_members VALUES ('200',0xe295b0537962696c5fe6aebfe4b88be295ae,0x6530323337306164383330613231633563646536376362313538613061633432,0x3733353735353233374071712e636f6d,'','',0x3132322e36352e3137302e313134,'1390538097','0','0',0x316532366166,'');
INSERT INTO pre_ucenter_members VALUES ('201',0xe5bda9e7ac94e985b1,0x3765346365616131343336343033386563373537613964663831643636386565,0x3630313133393038364071712e636f6d,'','',0x3232312e3230332e33302e35,'1390556573','0','0',0x643038633939,'');
INSERT INTO pre_ucenter_members VALUES ('202',0x426f726e5f66697265,0x3835616239666632643761396635643961636165653237653266323063353565,0x3437323932353337344071712e636f6d,'','',0x3132352e37302e35392e3332,'1390569428','0','0',0x343964666532,'');
INSERT INTO pre_ucenter_members VALUES ('203',0xe998bfe5b7abe38082,0x6236383032313637323330656532373432343236376336666231623364306336,0x68616e7469616e333340676d61696c2e636f6d,'','',0x37322e3231312e3134382e3737,'1390639512','0','0',0x383261636536,'');
INSERT INTO pre_ucenter_members VALUES ('204',0x70756d706b696e,0x6637393066343134356633383539343335613265396463346539303539643339,0x3439333530373339364071712e636f6d,'','',0x36302e3136352e392e3935,'1390746592','0','0',0x303965363664,'');
INSERT INTO pre_ucenter_members VALUES ('205',0x676d617468616e,0x6534643738653634613434333433633332353730313765613536363362663036,0x6e7a313335364073696e612e636e,'','',0x3131362e31352e3135332e3832,'1390803423','0','0',0x663633663935,'');
INSERT INTO pre_ucenter_members VALUES ('206',0x5a65726f,0x6662343330616337393530333163323132366132313362623461376334333762,0x313034363934303435364071712e636f6d,'','',0x3131322e3132332e36342e313236,'1391057003','0','0',0x626630616636,'');
INSERT INTO pre_ucenter_members VALUES ('207',0x64656572696e6e,0x6238353538613166623938653961393939353235346435346562313337613866,0x64656572696e6e40686f746d61696c2e636f6d,'','',0x36372e3138352e33322e3233,'1391065939','0','0',0x336464376231,'');
INSERT INTO pre_ucenter_members VALUES ('208',0x656c7973657368656e363235,0x3334323463623831656265656534366463633837623138396664353333633739,0x656c7973657368656e36323540676d61696c2e636f6d,'','',0x3131342e38322e38382e3239,'1391233705','0','0',0x393865643262,'');
INSERT INTO pre_ucenter_members VALUES ('209',0xe781abe587b0,0x6564653536303531326636373264373139643634636536333665376163323966,0x3735323832303233384071712e636f6d,'','',0x36312e3136332e3139372e3738,'1391241426','0','0',0x323333653661,'');
INSERT INTO pre_ucenter_members VALUES ('210',0xe598bfe591a6e591a6,0x6530383330393032313737643165646165643565633761656261626530363563,0x796f796f35353936354073696e612e636f6d,'','',0x3131362e3233352e3139302e3833,'1391587875','0','0',0x336264343836,'');
INSERT INTO pre_ucenter_members VALUES ('211',0xe5b1b15f5f5fe883a1e69da8,0x6565313331626563383836323135623338666333336437323439323665633331,0x3138363336383333353932403136332e636f6d,'','',0x3137312e3131362e3137392e313634,'1391598502','0','0',0x363335613938,'');
INSERT INTO pre_ucenter_members VALUES ('212',0xe5b7a6e58492e9bb98,0x6166653435333665353663393165663832356263633032386333626433383731,0x323639383137393033354071712e636f6d,'','',0x3132352e3235332e39392e3630,'1391607841','0','0',0x316139613037,'');
INSERT INTO pre_ucenter_members VALUES ('213',0xe98791e889b2e5b9b4e58d8e,0x3961613863623638393438623930663661363134303565636263343863303165,0x313034353235333034334071712e636f6d,'','',0x3232322e3133392e322e3434,'1391783136','0','0',0x306134633262,'');
INSERT INTO pre_ucenter_members VALUES ('214',0x4161726f6e4c75,0x6338373063363965326661373932313836393166323438303136323133653036,0x33323537353835354071712e636f6d,'','',0x3131332e3130322e3136302e32,'1391916277','0','0',0x353064653130,'');
INSERT INTO pre_ucenter_members VALUES ('215',0xe7979be681a8e79b97e58fb7e79a84,0x6335663734663162383936303232653335306631393061366437346139326561,0x3830363830303938314071712e636f6d,'','',0x3138302e39382e33332e313339,'1392034168','0','0',0x383763346261,'');
INSERT INTO pre_ucenter_members VALUES ('216',0xe69caae9bb8e,0x6332356632643461366362323134363466633365623035643032326461376538,0x3238373037313739324071712e636f6d,'','',0x3131342e3232332e3130342e3332,'1392107300','0','0',0x346336383233,'');
INSERT INTO pre_ucenter_members VALUES ('217',0x53746576656e7969,0x6662366462646638373063663339613936323165633563383464623864366563,0x3532323533313132394071712e636f6d,'','',0x3131392e33392e382e323439,'1392121462','0','0',0x363963383833,'');
INSERT INTO pre_ucenter_members VALUES ('218',0xe59386e595a6,0x3939333664376132353934383236383930666162353266393237313731383031,0x3733303633304071712e636f6d,'','',0x3131382e3131322e32332e313230,'1392180730','0','0',0x616630626135,'');
INSERT INTO pre_ucenter_members VALUES ('219',0xe5b09be78699,0x3837356139636665383738373461656431653761383633333136393233326334,0x6275616f67373232383530334073696e612e636f6d,'','',0x3232322e3234362e36372e313539,'1392209177','0','0',0x393163613135,'');
INSERT INTO pre_ucenter_members VALUES ('220',0x6d6972616e64616765,0x3336353062373930646364666663666230373764643331343132313636666137,0x3339383038323637314071712e636f6d,'','',0x3138302e3132362e3130382e313931,'1392262577','0','0',0x313335356135,'');
INSERT INTO pre_ucenter_members VALUES ('221',0x657370726573736f,0x6332643433313865616332633964366135623332643561366134343335303638,0x69736572656e613033323840686f746d61696c2e636f6d,'','',0x3131372e3133362e382e3333,'1392267640','0','0',0x383137346336,'');
INSERT INTO pre_ucenter_members VALUES ('222',0xe588a9e588a9,0x3331383865313439643863636238346665663134613638323634613666393435,0x3432303138383936374071712e636f6d,'','',0x3132332e37302e31352e313036,'1392268736','0','0',0x303638326331,'');
INSERT INTO pre_ucenter_members VALUES ('223',0xe99bbee99cbee7a9bae4b8ad,0x6463373832303062346637373137373439346337613939636666303639633631,0x6d6f67616e67736330334073696e612e636f6d,'','',0x3232312e3233322e352e3335,'1392276957','0','0',0x643534633534,'');
INSERT INTO pre_ucenter_members VALUES ('224',0x6e696e676d656e67616e,0x3437356539633665363533313165666234373863363537373561323334363438,0x3238373638343436374071712e636f6d,'','',0x3131332e35362e3132372e3233,'1392285929','0','0',0x396331303766,'');
INSERT INTO pre_ucenter_members VALUES ('225',0xe9ba92e9ba9fefbfa1e6ae8be58991,0x3735376363636136393464373934316233653266646436386136636461323933,0x3334333138393237324071712e636f6d,'','',0x3132342e3136312e3131352e3237,'1392288113','0','0',0x316131373331,'');
INSERT INTO pre_ucenter_members VALUES ('226',0xe5b08fe78caae6b3a1e6b3a1e38082e38082e38082,0x3166373633366561396362323037343731356434646439623361643031323864,0x323638343139383330334071712e636f6d,'','',0x3231382e37372e31382e313133,'1392314801','0','0',0x313835663264,'');
INSERT INTO pre_ucenter_members VALUES ('227',0xe58f8ce88a82e597ac,0x6133346632666563323637653432646639303737373437383665306564356430,0x6d6f67616e67736330324073696e612e636f6d,'','',0x3131312e3137342e36362e3130,'1392370316','0','0',0x633464356465,'');
INSERT INTO pre_ucenter_members VALUES ('228',0x6a69616e6779696e67787565,0x6134343535376438346365656562653333656237353562343366613636336365,0x313430333237383737354071712e636f6d,'','',0x3131322e31332e3233322e313035,'1392384584','0','0',0x383634363363,'');
INSERT INTO pre_ucenter_members VALUES ('229',0x6b61746831393931,0x3264313732613930613037643364306237353735623430303835666633383330,0x3331303539313530314071712e636f6d,'','',0x3139382e39362e33382e3131,'1392444248','0','0',0x383661656263,'');
INSERT INTO pre_ucenter_members VALUES ('230',0xe5a495e38086e6b190,0x3136323261376566373862643663303032616262383066323536633834383538,0x3935343438313939354071712e636f6d,'','',0x3131342e34342e32362e3437,'1392446010','0','0',0x616333376264,'');
INSERT INTO pre_ucenter_members VALUES ('231',0xe4be9de784b6e69c9de58c97,0x3239316630643233343136643735396230376337376533346538643936636161,0x37353835393338354071712e636f6d,'','',0x3132342e3132372e3132332e313536,'1392548244','0','0',0x343236656261,'');
INSERT INTO pre_ucenter_members VALUES ('232',0x76696b6579,0x6435663536363435303430383666323337343263316333373238363336313133,0x3430343238333639394071712e636f6d,'','',0x33362e34302e35302e313835,'1392695438','0','0',0x656434383131,'');
INSERT INTO pre_ucenter_members VALUES ('233',0x4c6173657252617a6572,0x3233306337373234303564303562323230386539373637343630613233643335,0x3237303836373738394071712e636f6d,'','',0x39342e3130302e3234352e313336,'1392706316','0','0',0x633463613835,'');
INSERT INTO pre_ucenter_members VALUES ('234',0xe5b08fe8b596e78cab,0x3033376237626162643366353930393764363137316538346238646566366239,0x6372797374616c2e616940686f746d61696c2e636f6d,'','',0x3132332e3132302e3137352e313131,'1392709201','0','0',0x313331643562,'');
INSERT INTO pre_ucenter_members VALUES ('235',0x6e617679526f7365,0x6338653832623131393162333964303562323939616132653964353762656565,0x6f735f7669726573403136332e636f6d,'','',0x3138332e31362e3230322e3738,'1392789973','0','0',0x356266336331,'');
INSERT INTO pre_ucenter_members VALUES ('236',0xe8bdbbe68ba2e685a2e68dbbe68ab9e5a48de68c91,0x6239643563663165626330616530656630316433613561313237393733356634,0x313139373939323539324071712e636f6d,'','',0x3232302e3234392e3136332e313532,'1392812035','0','0',0x333163666531,'');
INSERT INTO pre_ucenter_members VALUES ('237',0x57656e6479,0x3933353963383436666165646364613839373331353764653934623062313238,0x3831303630323539344071712e636f6d,'','',0x3131332e35372e31382e313336,'1392816837','0','0',0x353738346631,'');
INSERT INTO pre_ucenter_members VALUES ('238',0x4269675f666f78,0x3038373138366436373462626630626334363337323635633066306337363338,0x3336313336323933364071712e636f6d,'','',0x3137312e3232312e3132332e323334,'1392817254','0','0',0x366234616538,'');
INSERT INTO pre_ucenter_members VALUES ('239',0xe5b08fe78289e5ad90656c76697261,0x6562346362353835356330323233346263616337306534663766343437313963,0x36383038373035354071712e636f6d,'','',0x3138332e322e34322e3234,'1392865061','0','0',0x353736363431,'');
INSERT INTO pre_ucenter_members VALUES ('240',0x6d65313233,0x6534633537613236333134646330346665376563313633393364356364306165,0x313431383030373130304071712e636f6d,'','',0x3138302e3134302e31382e313137,'1392885960','0','0',0x383062323237,'');
INSERT INTO pre_ucenter_members VALUES ('241',0xe7bab6e999b7e99ba8e99c96,0x3933663038636662653830306430663933643865313666356663663337633736,0x3837353331303535334071712e636f6d,'','',0x3131372e38362e39322e323137,'1392905430','0','0',0x363335373831,'');
INSERT INTO pre_ucenter_members VALUES ('242',0x4d696c6b,0x3836313031636662653539376136383435626531626137336234383162323463,0x3534333536383139334071712e636f6d,'','',0x3231382e36342e3131302e313737,'1392944554','0','0',0x613861636432,'');
INSERT INTO pre_ucenter_members VALUES ('243',0x7a68616f6c696e7869616f,0x3364613039633834326537613031303135653636353435386135373265306532,0x3532393831343536314071712e636f6d,'','',0x37312e38372e3130362e313239,'1392963648','0','0',0x303362633763,'');
INSERT INTO pre_ucenter_members VALUES ('244',0x457665726c617374696e67,0x3466316162636463316265373234356538336336656432333961643764633633,0x3131353937313038384071712e636f6d,'','',0x35382e3234302e37362e3738,'1392966940','0','0',0x633666306365,'');
INSERT INTO pre_ucenter_members VALUES ('245',0xe998b3e698a5e799bde99baa,0x6634303533346265353833323439633966663865393364336239303439353034,0x3430373438353732354071712e636f6d,'','',0x3132312e32382e33342e3638,'1392967889','0','0',0x313934323032,'');
INSERT INTO pre_ucenter_members VALUES ('246',0xe7b9a7e38384e6bb85,0x3661313661666531316236373065333732363030643239343966626536356135,0x3532323835363336354071712e636f6d,'','',0x3132332e3132322e3131342e313633,'1392989498','0','0',0x613262336637,'');
INSERT INTO pre_ucenter_members VALUES ('247',0x4f6c6976696130333133,0x3835613034373938616334303838316565363631363666303435643936336663,0x3431343138353434304071712e636f6d,'','',0x3131302e3138352e34312e323031,'1393035968','0','0',0x303436303738,'');
INSERT INTO pre_ucenter_members VALUES ('248',0xe5b890e58fb7e5889be5bbba303030,0x6134393138633862316465303935313066316163343062376465393065346264,0x323232353231393730354071712e636f6d,'','',0x3132332e3135302e3137342e3534,'1393073916','0','0',0x633035636131,'');
INSERT INTO pre_ucenter_members VALUES ('249',0x7a7a6c3132333036,0x3333323436656361323163333661343739623565326434376332326166373166,0x313330333439323439354071712e636f6d,'','',0x3131332e3235312e39312e323532,'1393077921','0','0',0x313336323561,'');
INSERT INTO pre_ucenter_members VALUES ('250',0x495f5f5f77696c6c5f5f5f2e2e2e2e,0x3230346463663034396339373163396439643534393635643630653864393035,0x3430313738373139374071712e636f6d,'','',0x3130332e33312e3134392e3431,'1393118149','0','0',0x353732666131,'');
INSERT INTO pre_ucenter_members VALUES ('251',0x5370617274696e61,0x3538356639353566636432363035653730613137666563613735623033303537,0x3932303237303037384071712e636f6d,'','',0x3131372e31312e3133392e3134,'1393127580','0','0',0x636338353135,'');
INSERT INTO pre_ucenter_members VALUES ('252',0x436865657279e5a6aee5ad90,0x6566626561353162663139326465336365653830363032343536313132363334,0x786e63647869616f6e697a69403136332e636f6d,'','',0x3137312e3232312e332e323230,'1393135383','0','0',0x376230363437,'');
INSERT INTO pre_ucenter_members VALUES ('253',0x79757469616e7469616e78696e67,0x3562383166306661643262333833633234333464336461343932663733626661,0x323331323535363632334071712e636f6d,'','',0x3231382e3139332e3136382e313735,'1393135567','0','0',0x666130303537,'');
INSERT INTO pre_ucenter_members VALUES ('254',0x434f434b59efbc8e,0x6336316436303562653066383566616462376633356539303939623131653830,0x6368656e687a30313233403132362e636f6d,'','',0x3131372e3133362e33302e323132,'1393169236','0','0',0x343961383963,'');
INSERT INTO pre_ucenter_members VALUES ('255',0xe5b0b9e6b49be4ba88,0x6366653461333438393332343432653736616632306634306437636338363230,0x6a656e6e696665726c7963403136332e636f6d,'','',0x3138322e3135312e35342e3737,'1393245210','0','0',0x616564666161,'');
INSERT INTO pre_ucenter_members VALUES ('256',0x5a5359,0x3064643438396434616237643435373366343938643537323030653433303430,0x3432313533323739374071712e636f6d,'','',0x3131322e352e3234382e31,'1393335746','0','0',0x323032613037,'');
INSERT INTO pre_ucenter_members VALUES ('257',0xe6989fe8afade5bf83e684bf,0x3738353835653135303561373431663839636663303439356563346637653838,0x3237373937313339364071712e636f6d,'','',0x3132322e3233332e37342e313439,'1393485503','0','0',0x663637343463,'');
INSERT INTO pre_ucenter_members VALUES ('258',0xe5b08fe592aae68991e68991,0x6363653537633735313165663638353030366535346564653133323834353630,0x3135333338303237334071712e636f6d,'','',0x3131352e3230362e392e313935,'1393599609','0','0',0x393364346633,'');
INSERT INTO pre_ucenter_members VALUES ('259',0x686f7579756c696e323436,0x3039343639656639346636643035376338353763656637643966366466366532,0x686f7579796c696e323436403136332e636f6d,'','',0x36302e35352e392e3330,'1393751339','0','0',0x626563636233,'');
INSERT INTO pre_ucenter_members VALUES ('260',0x78697869343235,0x3336636338383939363634336235383830303830666237303630313830653064,0x78696c697534323540676d61696c2e636f6d,'','',0x3135302e3230312e3132382e323431,'1393804352','0','0',0x303535303935,'');
INSERT INTO pre_ucenter_members VALUES ('261',0x4c6565,0x6263373130363030666131373833333837363734353863336161396365643833,0x313532353730323538364071712e636f6d,'','',0x3138332e39342e3139342e3532,'1393924520','0','0',0x383866343339,'');
INSERT INTO pre_ucenter_members VALUES ('262',0x69336c7665,0x3339313366336230633166386262303334656538383933396234343433623535,0x3332383836323437354071712e636f6d,'','',0x36312e3134322e31302e313932,'1393988756','0','0',0x346563616564,'');
INSERT INTO pre_ucenter_members VALUES ('263',0x7a6f6c6131393934,0x3162643636666663376532633063663465613231326666353633386463323065,0x3437323435363538374071712e636f6d,'','',0x3137312e3232312e332e323439,'1394003076','0','0',0x346539323337,'');
INSERT INTO pre_ucenter_members VALUES ('264',0xe4bb83e4bb83e794b2e9b1bc,0x3031386339383239313533376263303337636639636232393937323439376236,0x636563696c6961747531323340686f746d61696c2e636f6d,'','',0x3232302e3234382e3131302e3534,'1394175432','0','0',0x386164333364,'');
INSERT INTO pre_ucenter_members VALUES ('265',0x73686f7774696d6573756e6e79,0x6330383338343030336661343535383531343937346466623738656534653737,0x323139333635323336314071712e636f6d,'','',0x3131372e37392e3233322e323033,'1394177712','0','0',0x303637623033,'');
INSERT INTO pre_ucenter_members VALUES ('266',0x6fd09ee59387e58da1,0x3661616263666233653032383963653536346131333262353731316263373139,0x3430333631363231374071712e636f6d,'','',0x36302e3231352e32392e3636,'1394183479','0','0',0x373430643132,'');
INSERT INTO pre_ucenter_members VALUES ('267',0x41757374696e57616e67,0x6564373865633431616564373838653062616163666337623766666534396536,0x7a697869616f2e77616e674069636c6f75642e636f6d,'','',0x38332e3230342e3231372e313638,'1394183621','0','0',0x353436613363,'');
INSERT INTO pre_ucenter_members VALUES ('268',0xe68b88e88ab1,0x3836623562393965313238656531373264613234653161613139363136333434,0x3434343031343536344071712e636f6d,'','',0x3131332e3234302e3233342e323032,'1394199868','0','0',0x636132666666,'');
INSERT INTO pre_ucenter_members VALUES ('269',0xe5a4a7e88396e38082,0x3834333364376661313635643431383031616436666663353337663031346135,0x3336313538323036314071712e636f6d,'','',0x3131312e392e33352e3530,'1394243354','0','0',0x613031313061,'');
INSERT INTO pre_ucenter_members VALUES ('270',0x4c656f6e,0x3063313332383039393138333036363766643237303239663538663232356334,0x6c656f6e5f6b696e6e65647940686f746d61696c2e636f6d,'','',0x3131362e3233322e3133392e3131,'1394249368','0','0',0x383833653761,'');
INSERT INTO pre_ucenter_members VALUES ('271',0xe8b5b5e5b08fe699924575646f7261,0x3066373662613934663635343636643836303234616133326436653236623935,0x323538343438333939394071712e636f6d,'','',0x3132332e3139372e3132332e313938,'1394257501','0','0',0x643730363434,'');
INSERT INTO pre_ucenter_members VALUES ('272',0x7869616f797539323731,0x6261383630316539393862383865356431646662313438653337376132653737,0x7869616f7975393237314073696e612e636f6d,'','',0x3232322e3132382e3132392e313530,'1394278437','0','0',0x353962306664,'');
INSERT INTO pre_ucenter_members VALUES ('273',0x78696e676675646566656e673635,0x6465653465386564636435363961313765646462616562356330323038373636,0x6461646173616e73616e403132362e636f6d,'','',0x3131392e35312e3131382e3232,'1394335473','0','0',0x313466333430,'');
INSERT INTO pre_ucenter_members VALUES ('274',0xe5b885e9a9b4e9a9b4e788b1e5b08fe7899be7899b,0x3165343139346438313864636131313436373535353732333761346539353737,0x3531333737393439314071712e636f6d,'','',0x3130392e3230362e3139332e313338,'1394358178','0','0',0x326334336164,'');
INSERT INTO pre_ucenter_members VALUES ('275',0xe6b885e9a38ee99b85e7b5ae,0x6530353132343938313961363230353535376361636365666435666463313166,0x3934393036383939354071712e636f6d,'','',0x35382e3234362e32352e313036,'1394360195','0','0',0x336166653730,'');
INSERT INTO pre_ucenter_members VALUES ('276',0x676f676f676f,0x3735393032323162653034343732646230656134626131333235373762653363,0x6c697169616e67676840676d61696c2e636f6d,'','',0x3131302e3138392e3139342e3131,'1394438743','0','0',0x373261386230,'');
INSERT INTO pre_ucenter_members VALUES ('277',0xe58c97e5b7b7e69c88e78999,0x3030316435623336666564386134373737386166636466333766333762376661,0x313333343934393635314071712e636f6d,'','',0x34392e3134302e39342e3138,'1394446234','0','0',0x613532663733,'');
INSERT INTO pre_ucenter_members VALUES ('278',0x73756e787565353234,0x3663326537393166383764336333393563366262646534326330343938656131,0x73756e787565353234403132362e636f6d,'','',0x3131362e32322e3135372e3136,'1394546763','0','0',0x626166346266,'');
INSERT INTO pre_ucenter_members VALUES ('279',0xe6ba9ce8bebee79d807ce2968d,0x3366313238613037613462336233666637666234343233376539323838363262,0x3731343633313930364071712e636f6d,'','',0x3132312e33332e3139302e313837,'1394550172','0','0',0x633262346139,'');
INSERT INTO pre_ucenter_members VALUES ('280',0x656d696c797a796d31,0x3036303763643335383437323639383866346332623038366432366633383135,0x313930343931383838334071712e636f6d,'','',0x37352e3136372e3230372e313038,'1394566255','0','0',0x666632613533,'');
INSERT INTO pre_ucenter_members VALUES ('281',0x6361696e,0x3161373461386562383439646139376439343132333932313230633339333534,0x323930323034373932394071712e636f6d,'','',0x3138322e3134392e35382e3533,'1394589501','0','0',0x643862393931,'');
INSERT INTO pre_ucenter_members VALUES ('282',0xefb8b7e8b1ace588b5e58981,0x6534323137613365653334376335656466323765373863326339356365633637,0x6c6972756f7975323840686f746d61696c2e636f6d,'','',0x3232322e3234322e34372e323036,'1394598757','0','0',0x353532346232,'');
INSERT INTO pre_ucenter_members VALUES ('283',0xe58aa0e88fb2e78cab,0x6662353530623837383232656139373631393261656166323431313863313035,0x3935393838313432364071712e636f6d,'','',0x3131332e3133322e3231322e313932,'1394617187','0','0',0x333234643232,'');
INSERT INTO pre_ucenter_members VALUES ('284',0xe88081e6b5b7,0x3864303662313235653637636236653661366464643262373864623162653135,0x3934333231373339304071712e636f6d,'','',0x33362e35362e3233362e313436,'1394620304','0','0',0x303339333135,'');
INSERT INTO pre_ucenter_members VALUES ('285',0x6972697368616f,0x3836326165326365623163353236323362633738316237323936303631373162,0x6972697368616f3032323340676d61696c2e636f6d,'','',0x3131372e3133302e39322e313935,'1394635885','0','0',0x646532643638,'');
INSERT INTO pre_ucenter_members VALUES ('286',0x4772616379,0x3230326266663864643733656235333134643233363937316337353831666233,0x3334333433393037304071712e636f6d,'','',0x3131332e3234302e3233342e323239,'1394639395','0','0',0x333137666432,'');
INSERT INTO pre_ucenter_members VALUES ('287',0xe6938ee5a4a9e69fb1353238,0x3564336133386338653936303037313932313330633137383163383963343762,0x3739323234393030324071712e636f6d,'','',0x3231382e39342e38362e323138,'1394682796','0','0',0x633365633633,'');
INSERT INTO pre_ucenter_members VALUES ('288',0x43442de5b882e59cbae983a82d4b72757368,0x6532323632356634373635386638373666336334383861633236636639356530,0x323130383837333130354071712e636f6d,'','',0x3138322e3134392e35382e3533,'1394692352','0','0',0x303036373866,'');
INSERT INTO pre_ucenter_members VALUES ('289',0xe5a69ee5a69ee38082,0x3464303963663262636339346662313530383866613036346263316230393738,0x3938313737313432384071712e636f6d,'','',0x3131332e3234352e3136352e3138,'1394694313','0','0',0x393639323365,'');
INSERT INTO pre_ucenter_members VALUES ('290',0x4d6167676965,0x6236386333643431346238663537643562633531373631323832383063623563,0x323836333139333730354071712e636f6d,'','',0x3138322e3134392e35372e313138,'1394759114','0','0',0x616335376366,'');
INSERT INTO pre_ucenter_members VALUES ('291',0x6d616f6d656937373031,0x3339376138633331386634313435313839393537396264313737613465313031,0x6d616f6d656937373031403136332e636f6d,'','',0x3131342e38322e3231312e39,'1394848176','0','0',0x306366363134,'');
INSERT INTO pre_ucenter_members VALUES ('292',0xe381b3e9a7ade5ad96e6b0a32f7470,0x3461363665316239363234626235393865386236646666613764616166383835,0x3839323231323331384071712e636f6d,'','',0x3230322e3131332e33302e313436,'1394857062','0','0',0x363936333233,'');
INSERT INTO pre_ucenter_members VALUES ('293',0x6a6f686e637279,0x3430613963303332633566303231336462396533353132343364343166373430,0x6372796a6f686e63727940686f746d61696c2e636f6d,'','',0x3230392e3139352e37322e313138,'1394860998','0','0',0x363765383235,'');
INSERT INTO pre_ucenter_members VALUES ('294',0xe69caae5a4aeefb98d,0x6331323963643832623937353238356335623061666232323663613630313038,0x3539383031323333364071712e636f6d,'','',0x3137312e3232312e332e3336,'1394889112','0','0',0x383333663764,'');
INSERT INTO pre_ucenter_members VALUES ('295',0x6e6173736973,0x3266636333366665333366643339346261633966633535663762383832323662,0x3439343534363032334071712e636f6d,'','',0x3132352e37362e3231352e3832,'1394980910','0','0',0x653763313364,'');
INSERT INTO pre_ucenter_members VALUES ('296',0x75746f7069617171,0x6331323736623232363866303737663762643262653039363866623935343131,0x6c697169616e676163636140686f746d61696c2e636f6d,'','',0x3131302e3139302e3134392e3930,'1394988312','0','0',0x383564643237,'');
INSERT INTO pre_ucenter_members VALUES ('297',0xe58c97e4baace4babae59ca8e8a5bfe4baa4,0x6332396561663333616530663730653261653031666361353737646431656561,0x323632333836303339394071712e636f6d,'','',0x3131372e33322e3135332e313336,'1395025368','0','0',0x386364623633,'');
INSERT INTO pre_ucenter_members VALUES ('298',0x6b796c696e,0x6135333266623564353266313437373633356335623465633039326232356531,0x71343137343137343137403132362e636f6d,'','',0x3132332e35352e3130372e313035,'1395051640','0','0',0x383934623437,'');
INSERT INTO pre_ucenter_members VALUES ('299',0x726f73656d617279786f786f,0x6363306637653330636431363665333735373433306632383833613665363134,0x3331333538303134384071712e636f6d,'','',0x3138332e3232312e32392e3134,'1395116785','0','0',0x316134663163,'');
INSERT INTO pre_ucenter_members VALUES ('300',0x7a643135393239393537353834,0x3337636331376266346439366530383733343730343738613133623034333730,0x323934303536363633314071712e636f6d,'','',0x3138332e39342e33342e313336,'1395125265','0','0',0x313438646165,'');
INSERT INTO pre_ucenter_members VALUES ('301',0x485a2de5b882e59cbae983a82d4772616365,0x3536346337303664323634363034346530656339333333316665636539373865,0x323834363630333634324071712e636f6d,'','',0x3231382e37322e31332e313731,'1395131972','0','0',0x346364363630,'');
INSERT INTO pre_ucenter_members VALUES ('302',0xe88a99e89389e5a683e5ad90,0x6534633636643239353838333063306535393133326564646630656362336166,0x323231363934323439314071712e636f6d,'','',0x3232312e382e33302e313734,'1395152320','0','0',0x306361336266,'');
INSERT INTO pre_ucenter_members VALUES ('303',0x6d616e676f626975,0x6334633261653639363539376133313135633665323530356366623436633064,0x3530363431363039304071712e636f6d,'','',0x3132332e3132342e31392e33,'1395279130','0','0',0x616361633966,'');
INSERT INTO pre_ucenter_members VALUES ('304',0xe5ae89e5ae81efbc8a,0x3638656132306264366136306566333364336430353361303561343761346165,0x6a696e676c696e616e676c65403132362e636f6d,'','',0x34302e3133382e37322e323534,'1395284470','0','0',0x366233666338,'');
INSERT INTO pre_ucenter_members VALUES ('305',0x5b5f5f5d,0x6561363435306135356162346539316539653939383562633537326435633239,0x3435343431303435334071712e636f6d,'','',0x3231302e33322e372e323230,'1395322101','0','0',0x353864343165,'');
INSERT INTO pre_ucenter_members VALUES ('306',0x53482de5b882e59cbae983a82d6368726973,0x3166323464326463633964303762346630643637633262396234313162353930,0x636872697374696e612e73407468696e6b752e636e,'','',0x3138302e3137352e3137352e3835,'1395383419','0','0',0x623530666261,'');
INSERT INTO pre_ucenter_members VALUES ('307',0x686179616b6f,0x3936623062653434326539633932376466643661633637356662336164346266,0x323335393237383331334071712e636f6d,'','',0x3138302e3137352e3137352e3835,'1395384758','0','0',0x363337366631,'');
INSERT INTO pre_ucenter_members VALUES ('308',0x53482de592a8e8afa2e983a82d42726f776e,0x3539356465323835626464656639313466623037363162326165653735376434,0x62726f776e2e6c407468696e6b752e636e,'','',0x3138302e3137352e3137352e3835,'1395385012','0','0',0x343261383134,'');
INSERT INTO pre_ucenter_members VALUES ('309',0x4d656e676d656e6c,0x3437633633353030643065383135663231663963646131353465373162613830,0x313530343838363038314071712e636f6d,'','',0x3138302e3137352e3137352e3835,'1395385036','0','0',0x636561326336,'');
INSERT INTO pre_ucenter_members VALUES ('310',0x7261636865616c31323239,0x6339323635626435613061393066626633646362373336316536396365626465,0x3239363139303633354071712e636f6d,'','',0x35382e35312e3139362e323032,'1395388839','0','0',0x373430353262,'');
INSERT INTO pre_ucenter_members VALUES ('311',0x546f7a6f,0x3364326165623331653738373431303264336166346665373833653863306435,0x3530353436323637394071712e636f6d,'','',0x35392e34312e3137332e323431,'1395482886','0','0',0x373033313836,'');
INSERT INTO pre_ucenter_members VALUES ('312',0x5f5f5f5fe5b08fe88ab1e8bdaee38082,0x3465366438646335643531336435353061303937333532343636396565303264,0x3237393835353537364071712e636f6d,'','',0x3231312e3136312e3132322e36,'1395491740','0','0',0x633964353433,'');
INSERT INTO pre_ucenter_members VALUES ('313',0xe596b5e4ba86e4b8aae592aa,0x6338636138623133613335346235356335313865373766396436393030633935,0x3435333831383736344071712e636f6d,'','',0x3137312e3232312e32382e313938,'1395585635','0','0',0x336263383033,'');
INSERT INTO pre_ucenter_members VALUES ('314',0x79756b6938303233,0x3263313361666437363637653339666466623035653933316337373437633835,0x3238373131303639334071712e636f6d,'','',0x3137312e3231322e3137332e313039,'1395648462','0','0',0x653864643739,'');
INSERT INTO pre_ucenter_members VALUES ('315',0x736865727279,0x3232363964626433623532613632323263633461616361316539653165623932,0x323930343133393730344071712e636f6d,'','',0x3131302e3138382e35302e323130,'1395730986','0','0',0x616435336337,'');
INSERT INTO pre_ucenter_members VALUES ('316',0xe288aee98689e881bde7a78b,0x3664383062356339356262383765653066316237376130323132333664366134,0x6a696e79616f7275313133403132362e636f6d,'','',0x3232322e37302e3137312e313336,'1395846419','0','0',0x333933353865,'');
INSERT INTO pre_ucenter_members VALUES ('317',0x31343337313435363733,0x3531623730313464363661353864333066303535396431383662316633333365,0x313433373134353637334071712e636f6d,'','',0x3232322e3234312e3233392e313235,'1395881445','0','0',0x353966616366,'');
INSERT INTO pre_ucenter_members VALUES ('318',0xe5878ce58fb6,0x3031316464373861366263376231366165623234643737323731363561333636,0x79797a68616e67363534403132362e636f6d,'','',0x33392e3138312e32332e313334,'1395933514','0','0',0x613532333430,'');
INSERT INTO pre_ucenter_members VALUES ('319',0x4d6f6e6963616e6579,0x3333643431643062613430363661313537303134383335653164666662303531,0x75776e65656d61636e657940676d61696c2e636f6d,'','',0x37312e3233312e3139322e313637,'1395958196','0','0',0x346537303663,'');
INSERT INTO pre_ucenter_members VALUES ('320',0x6464726b61736572,0x6662333334336138323236336662393439383866303566376632306339323132,0x6464726b6173657240666f786d61696c2e636f6d,'','',0x3232322e3136312e3231352e34,'1396060297','0','0',0x396463306632,'');
INSERT INTO pre_ucenter_members VALUES ('321',0x6c6f6e67696e75733134,0x3134636636366565316461376334366463316431363235386537613961366162,0x6c6f6e67696e75733134403136332e636f6d,'','',0x3131322e39352e3139312e3630,'1396097508','0','0',0x343431646538,'');
INSERT INTO pre_ucenter_members VALUES ('322',0xe69a81e9a2a8e6ae8be69c88,0x3364653161323333336537343462373266373262366266383936313933373130,0x726f7365626174746c65403136332e636f6d,'','',0x3132342e3131342e39382e313330,'1396108840','0','0',0x383464353738,'');
INSERT INTO pre_ucenter_members VALUES ('323',0x416e6772795f59c3b3756e67,0x6563636239373264313334643664613137313632626439653039646331616235,0x6e737935306d40686f746d61696c2e636f6d,'','',0x39392e39352e3136382e313532,'1396122940','0','0',0x636437383734,'');
INSERT INTO pre_ucenter_members VALUES ('324',0x7474363636393431,0x6436636636333830623166326164326531323334656161383130383132336139,0x3537363635363839374071712e636f6d,'','',0x3132352e3131392e332e33,'1396156636','0','0',0x636338613565,'');
INSERT INTO pre_ucenter_members VALUES ('325',0xe6b19fe8a5bfe69d8ee69687e6b88a,0x6332616638626130616366356465376562623333636566356339386135373365,0x323630343738393838354071712e636f6d,'','',0x3131372e3137342e39332e323034,'1396189167','0','0',0x663965386564,'');
INSERT INTO pre_ucenter_members VALUES ('326',0x796573757365353131,0x6666636161653734356439363836356430336139663734656463653936316532,0x7965737573653531314073696e612e636f6d,'','',0x3138302e3131332e3137352e3530,'1396316072','0','0',0x383531316362,'');
INSERT INTO pre_ucenter_members VALUES ('327',0x6a65737369656a656666726579,0x6134633362313564626232663236366532373733363835326636313530376264,0x6a646668646a75726e766e40616c6979756e2e636f6d,'','',0x3132302e39302e32372e323433,'1396410057','0','0',0x393130323762,'');
INSERT INTO pre_ucenter_members VALUES ('328',0xe4bdb3e4bdb3,0x6161343164303536613530373636653062393935323030336535663639613461,0x313336393431353332314071712e636f6d,'','',0x3231302e32322e35392e3236,'1396424619','0','0',0x623232623735,'');
INSERT INTO pre_ucenter_members VALUES ('329',0x485a2de592a8e8afa2e983a85f4c75636173,0x3138633065333763363238666361656365663765643532393562663131396633,0x323231323631373334304071712e636f6d,'','',0x3131352e3139322e3139332e313332,'1396490162','0','0',0x323865333135,'');
INSERT INTO pre_ucenter_members VALUES ('330',0xe5b88ce88c9ce4b88de698afe7a59ee7bb8fe79785,0x3364336435646431626435663637333639326261396630666430353434663065,0x3532393833313031344071712e636f6d,'','',0x3232312e31302e37362e313930,'1396510880','0','0',0x306465393861,'');
INSERT INTO pre_ucenter_members VALUES ('331',0x74696e67616f76657261,0x3634333639356635636531363038626530323632633336326239343639613563,0x74696e67616f76657261403132362e636f6d,'','',0x3138332e3232312e39302e313638,'1396543156','0','0',0x343566343435,'');
INSERT INTO pre_ucenter_members VALUES ('332',0x4b656c6c795f43616c65636865,0x3531363465346537653861643134323139323165356339396361393066393534,0x323630363435383034344071712e636f6d,'','',0x3231392e3135302e37312e3938,'1396545698','0','0',0x326566333432,'');
INSERT INTO pre_ucenter_members VALUES ('333',0xe6a2a6e69785e88085,0x6238396239386364633935333537663462323431643736333636353839383933,0x34313332323034354071712e636f6d,'','',0x3130362e33382e3234352e313234,'1396577499','0','0',0x626132666264,'');
INSERT INTO pre_ucenter_members VALUES ('334',0x47e4b88de698afe4ba8be584bf,0x3865303232636663613666343331333130633939623264383434643766616430,0x323638343633323637344071712e636f6d,'','',0x3131352e3139332e3231372e323037,'1396596913','0','0',0x333638643665,'');
INSERT INTO pre_ucenter_members VALUES ('335',0xe6ba90e4b880e6b885,0x6238306638383334346439366265303032626333376132343734316330646265,0x79797170657266656374403132362e636f6d,'','',0x3131312e3136342e3235332e313536,'1396784439','0','0',0x373939393961,'');
INSERT INTO pre_ucenter_members VALUES ('336',0x4a5e2d5e4a7565,0x3064643332396633376366313136636135383131396663353834356530373930,0x616972752e7a68616e6740676d61696c2e636f6d,'','',0x3231302e32352e3234302e37,'1396924942','0','0',0x653235313738,'');
INSERT INTO pre_ucenter_members VALUES ('337',0xe5ada6e4b9a0e5b08fe99cb8e78e8b312e30,0x3635323333363637633264366366666633626538313565653564313031623432,0x3239353235323831314071712e636f6d,'','',0x3137312e3232312e332e3137,'1396934575','0','0',0x663031656332,'');
INSERT INTO pre_ucenter_members VALUES ('338',0xe78b82e5a594e79a84e89c97e7899b7e,0x6138643430653535613139356565366161636661376164663763326531313263,0x3437363631343135304071712e636f6d,'','',0x3132302e33332e37382e313139,'1396948686','0','0',0x653861306431,'');
INSERT INTO pre_ucenter_members VALUES ('339',0x65726963636b6b,0x6437656531336531303637306139323238316166613465656363616134333031,0x6563636b6b406c6976652e636f6d,'','',0x37352e3134322e3230352e313433,'1397004800','0','0',0x306333666133,'');
INSERT INTO pre_ucenter_members VALUES ('340',0x4e616e6379,0x3061386463393032336663666431383436363462323430303362623637333465,0x313732323933313933324071712e636f6d,'','',0x3132352e37302e3138362e3534,'1397097168','0','0',0x306331323939,'');
INSERT INTO pre_ucenter_members VALUES ('341',0x416c76696e,0x6335346534333330643136386433316438363430343739353535333634383266,0x313939303630303537304071712e636f6d,'','',0x3131342e3235342e34342e313538,'1397097774','0','0',0x653231376135,'');
INSERT INTO pre_ucenter_members VALUES ('342',0xe6b48be4bb94,0x3732376165646534356132386630396562613261663932376161366130323536,0x6f6e6c79616e6778403136332e636f6d,'','',0x3138302e3136342e3132302e313930,'1397105553','0','0',0x316631373730,'');
INSERT INTO pre_ucenter_members VALUES ('343',0x46696f6e61,0x3530613661633132666236653432633764363235616534323535333538343361,0x737571697579616e313939334073696e612e636f6d,'','',0x3137352e34332e3132352e323030,'1397107697','0','0',0x313730323037,'');
INSERT INTO pre_ucenter_members VALUES ('344',0xe9998ce4b88ae8aab0e5aeb6,0x3934353063376635303162386538613861336462386562323638323838326466,0x3538333130313430344071712e636f6d,'','',0x3137312e3232312e32382e3137,'1397125789','0','0',0x646530663131,'');
INSERT INTO pre_ucenter_members VALUES ('345',0xe9a39ee5a4a9e6b49be58fafe58faf,0x3866383861626463363965366433373530326436643662373533396339346632,0x3431323935323931354071712e636f6d,'','',0x312e3230322e3138372e3439,'1397126069','0','0',0x356238383462,'');
INSERT INTO pre_ucenter_members VALUES ('346',0x4c696c6c69616ee788b1474d4154,0x3835646534303438396334336336623837636264643561613136366535333466,0x313939326e69616e6e69616e403136332e636f6d,'','',0x3138332e3135372e3136302e3132,'1397182469','0','0',0x353834393931,'');
INSERT INTO pre_ucenter_members VALUES ('347',0xe585b0e5bdbbe29885,0x3831613134623661363465386633343263656439633337316432356438366465,0x313532383634383434324071712e636f6d,'','',0x33362e34362e3235322e313837,'1397184225','0','0',0x313635616262,'');
INSERT INTO pre_ucenter_members VALUES ('348',0x6c6f6c6c69706f705f6a73,0x6131383639643063363236393439376234393836343633663865653234623131,0x3439353232333630344071712e636f6d,'','',0x32372e31392e3138322e313737,'1397188161','0','0',0x313964303738,'');
INSERT INTO pre_ucenter_members VALUES ('349',0xe6988ee5b08fe78e89,0x3331616333363131363637363139323334373133396530633765303665336463,0x313934333433373537374071712e636f6d,'','',0x3232322e3230342e39322e323331,'1397189758','0','0',0x656331303436,'');
INSERT INTO pre_ucenter_members VALUES ('350',0x6b6c696d313139,0x3932663466613338613264613536303261336230346266363632386137356361,0x3938373435363234364071712e636f6d,'','',0x3131332e3230302e3231322e3732,'1397195167','0','0',0x666532643333,'');
INSERT INTO pre_ucenter_members VALUES ('351',0xe58589e5bdb1,0x3166656637306164646237366631323835306130363236316633613961633532,0x737573616e7a7178403136332e636f6d,'','',0x31342e3231332e33312e313536,'1397204180','0','0',0x343530356163,'');
INSERT INTO pre_ucenter_members VALUES ('352',0xe5a3b9e38082,0x6135383338386136346237396263653334373636663262306231386665356562,0x3334323130313131344071712e636f6d,'','',0x3232322e31382e32342e313334,'1397397099','0','0',0x623734653932,'');
INSERT INTO pre_ucenter_members VALUES ('353',0xe592b35fe38081e7b4a0e8b4a8,0x3135383039353331623539613465653434623030623338633131656338373035,0x3138383432343731384071712e636f6d,'','',0x32332e3131342e39372e3130,'1397409230','0','0',0x653432636638,'');
INSERT INTO pre_ucenter_members VALUES ('354',0xe5a4a7e6b5b7e68bbee8b49d,0x3439313264626131623863363265306238653330333730666133306566383232,0x383438313434304071712e636f6d,'','',0x37322e3230382e3134392e3537,'1397450487','0','0',0x373034653162,'');
INSERT INTO pre_ucenter_members VALUES ('355',0x636c6169726577616e67,0x3262333662616464326136653136326364336164633433303266653335636535,0x323935343538363837364071712e636f6d,'','',0x3131372e33362e31332e323438,'1397454765','0','0',0x646363323735,'');
INSERT INTO pre_ucenter_members VALUES ('356',0x4b6576696e31393831,0x6230323535356339623333393866653333303166306664666138623833373739,0x73756e636f61737432303140676d61696c2e636f6d,'','',0x3230322e39382e3135372e313938,'1397455942','0','0',0x366463623262,'');
INSERT INTO pre_ucenter_members VALUES ('357',0x417765736f6d65,0x3063306362376164613065613666396165333734666536303336393461656663,0x3934393932333836374071712e636f6d,'','',0x3137352e34392e3136302e3331,'1397472612','0','0',0x343464356363,'');
INSERT INTO pre_ucenter_members VALUES ('358',0xe89a8ae584bfe9a39e,0x3165323661386135663663333136373333306638653765633335346437643663,0x323538363736363439364071712e636f6d,'','',0x3232332e3132392e342e34,'1397477093','0','0',0x353539633732,'');
INSERT INTO pre_ucenter_members VALUES ('359',0x4a696159285e5f5e295975,0x6136653039626330643832613562343962636634326335353363306632303030,0x64656e676a6961797532303132403136332e636f6d,'','',0x32342e3132312e31342e313436,'1397533949','0','0',0x643930383539,'');
INSERT INTO pre_ucenter_members VALUES ('360',0x4c696e6e,0x3533333834633462613430363865626339353732323939316264616439356364,0x3535303435383835334071712e636f6d,'','',0x31342e3131382e3133392e313638,'1397552462','0','0',0x653831373235,'');
INSERT INTO pre_ucenter_members VALUES ('361',0xe78e9be4b8bde59ca8e99a94e5a381,0x3634393632303164326331356365356335363934306136323332326461643439,0x3631363334333736364071712e636f6d,'','',0x3231302e33352e3139332e323439,'1397555239','0','0',0x376330663034,'');
INSERT INTO pre_ucenter_members VALUES ('362',0x41722e4c6565,0x3732613632316136326562333735363234316431326433356264623263343437,0x3733393730363736334071712e636f6d,'','',0x35392e3137352e3231352e313530,'1397557839','0','0',0x666465636166,'');
INSERT INTO pre_ucenter_members VALUES ('363',0xe5b182e699a8,0x6534316139336534646464366366373833306335323964646432363338656237,0x656c61696e652e78696e7a686940686f746d61696c2e636f6d,'','',0x3131382e3138362e3133342e323432,'1397567978','0','0',0x613365393162,'');
INSERT INTO pre_ucenter_members VALUES ('364',0x73616e64796c6679,0x3165613361666238666662633133306465316361306631656262353936316634,0x73616e64796c6679403136332e636f6d,'','',0x3131362e3232362e38332e313932,'1397613205','0','0',0x353462393835,'');
INSERT INTO pre_ucenter_members VALUES ('365',0x636174313838,0x3265626261313438613137656564626666373039373034336635646563396262,0x737573616e6b6572656e406c6976652e636f6d,'','',0x37362e3130342e3137302e323032,'1397619193','0','0',0x393263623939,'');
INSERT INTO pre_ucenter_members VALUES ('366',0xe5b08fe5928ce5b09a,0x3737346637646239656438616335333563306330643963643966373430303266,0x3337393934393531394071712e636f6d,'','',0x3132352e34312e3233362e313230,'1397633074','0','0',0x323565303130,'');
INSERT INTO pre_ucenter_members VALUES ('367',0x43687269737479,0x6237626165666631366233366232663538636634336134643739353566393436,0x323836353338343236354071712e636f6d,'','',0x3131332e37342e392e3838,'1397721729','0','0',0x316362343336,'');
INSERT INTO pre_ucenter_members VALUES ('368',0x6e7562696c655f70656e6775696e,0x3639653062333338336364623761306466353537343664396166393030373661,0x3532333838383339344071712e636f6d,'','',0x3132352e3232302e3133342e37,'1397796762','0','0',0x616438363838,'');
INSERT INTO pre_ucenter_members VALUES ('369',0xe5b08fe5889de5889d,0x6661626666626533393038333037636638393762363463333966613630393064,0x7765696368755f30333331403136332e636f6d,'','',0x3132342e3131352e3137332e323439,'1397805692','0','0',0x633166336535,'');
INSERT INTO pre_ucenter_members VALUES ('370',0x4772616365,0x3564366561353066613463326466396565373637663131636637336534333165,0x677261636563737131323340676d61696c2e636f6d,'','',0x3133392e3134372e32342e3131,'1397956456','0','0',0x383739663863,'');
INSERT INTO pre_ucenter_members VALUES ('371',0x536861726f6e313233,0x3532633432653266313462613566366332333037336531396130653664366662,0x736861746f6e747440676d61696c2e636f6d,'','',0x3231382e36372e3230352e3331,'1397960235','0','0',0x623434363734,'');
INSERT INTO pre_ucenter_members VALUES ('372',0xe79dbfe8a786e5a4a9e4b88b,0x3766333436373165666463323033346432663436373265343464373236383935,0x73616d75656c727569406c6976652e636e,'','',0x3139382e39302e38372e313430,'1397965269','0','0',0x356235343931,'');
INSERT INTO pre_ucenter_members VALUES ('373',0x7a7977766f6c75,0x6430333730333563666466646661336233313165303434663439393136663231,0x7a7977766f6c754073696e612e636e,'','',0x3137312e3231362e38342e323031,'1397977826','0','0',0x323762363166,'');
INSERT INTO pre_ucenter_members VALUES ('374',0x63656c69616c696c69,0x3834623666313364383836633837653561613863386231653231643833353632,0x73736e7373756e313233403136332e636f6d,'','',0x3132332e3133382e37392e3330,'1398004391','0','0',0x376135383831,'');
INSERT INTO pre_ucenter_members VALUES ('375',0xe6b2a1e5908de5ad97,0x3663343136393062613230336435346433653161343433316431303931313037,0x6c696f6e735f7a62403136332e636f6d,'','',0x3132332e3131322e3130372e3739,'1398128377','0','0',0x396137373464,'');
INSERT INTO pre_ucenter_members VALUES ('376',0x6e69636f6c65,0x6338656235353664356330366632333465353663613165363262643463326233,0x323533313938383837364071712e636f6d,'','',0x3131342e3234392e32312e323238,'1398178340','0','0',0x343539343538,'');
INSERT INTO pre_ucenter_members VALUES ('377',0x47656d696e69,0x3831303535383333616631653539303463633432393830356162303933306634,0x727579616c693637403136332e636f6d,'','',0x3137312e3232312e332e31,'1398178488','0','0',0x386437656363,'');
INSERT INTO pre_ucenter_members VALUES ('378',0xe5a5bde4baba,0x3939356637363766313237373337633363303366633034313366346230366532,0x64797131303439393832383734403136332e636f6d,'','',0x3137312e3232312e32382e313131,'1398307999','0','0',0x663063656437,'');
INSERT INTO pre_ucenter_members VALUES ('379',0xe4b894e590ace9a38ee5909f,0x3233356431356435363863396131373637366639376439383364663837333639,0x313635323432353135364071712e636f6d,'','',0x3132322e3139352e3134312e39,'1398316658','0','0',0x323561633836,'');
INSERT INTO pre_ucenter_members VALUES ('380',0x626c61636b6361745f736972,0x3362363330343333653931386232633565646138613631636262393135363365,0x637874616f74616f40796561682e6e6574,'','',0x35382e36372e3134342e323335,'1398399281','0','0',0x316333653462,'');
INSERT INTO pre_ucenter_members VALUES ('381',0xe98187e8a781,0x6532633239343432363739613531656334613437383737393831313235323061,0x3937313735343639354071712e636f6d,'','',0x3132332e3136352e3130312e3637,'1398672543','0','0',0x663037313462,'');
INSERT INTO pre_ucenter_members VALUES ('382',0xe4bc8ae4b8807a7879,0x3664616336313932376630323866366239363565393061373336323965663030,0x3539383636333538364071712e636f6d,'','',0x33362e34372e332e3633,'1398679015','0','0',0x373831383036,'');
INSERT INTO pre_ucenter_members VALUES ('383',0xe79cbce9959ce584bf,0x3536366333303535653266663966323632356164316538626462633566313730,0x323237303434393834314071712e636f6d,'','',0x3131332e3133392e3230322e323236,'1398680686','0','0',0x653739336461,'');
INSERT INTO pre_ucenter_members VALUES ('384',0xe591b5e591b5efbd9e,0x6134653435633936646432643832306631353265663939366530393135353264,0x686379353230334073696e612e636f6d,'','',0x3131302e3139312e39372e323230,'1398832740','0','0',0x343130386166,'');
INSERT INTO pre_ucenter_members VALUES ('385',0xe7be8ae592a9e592a9e788b1e59083e9b8a1,0x3734376637393461643266653931643763656238306665346231316534306463,0x313237343832303330364071712e636f6d,'','',0x3137312e3232312e332e3134,'1399000408','0','0',0x383536323965,'');
INSERT INTO pre_ucenter_members VALUES ('386',0xc2b05f4b61746c796e5fe3829d,0x3662396163636139653263666462303062373733303233383730393238643933,0x3938363832343535384071712e636f6d,'','',0x3138332e3234362e31382e3331,'1399104257','0','0',0x313738306661,'');
INSERT INTO pre_ucenter_members VALUES ('387',0x7275736878756469,0x6566323866366361396665386165323536333730306136366431383462623936,0x3330383936353431344071712e636f6d,'','',0x3231392e3133392e3232362e313333,'1399164344','0','0',0x383436373163,'');
INSERT INTO pre_ucenter_members VALUES ('388',0x53482de592a8e8afa22d52656265636361,0x6438333063623635613037316364393131303138353732646434613261336361,0x323738353539383833304071712e636f6d,'','',0x35382e3234362e33302e323532,'1399191613','0','0',0x643730306134,'');
INSERT INTO pre_ucenter_members VALUES ('389',0xe3829ee99d92e890abe381a8e88f82e99cb2e98a96,0x6530356330383562663532303837336231383965616332343063393338626631,0x323035353435333738394071712e636f6d,'','',0x3138332e39342e33342e323037,'1399271802','0','0',0x613664613364,'');
INSERT INTO pre_ucenter_members VALUES ('390',0x76696f6c61,0x3731653761333333356233353235316236313936303434383333333261633162,0x76696f6c612e6a407468696e6b752e636e,'','',0x3232322e3133302e3133332e3539,'1399274491','0','0',0x623534613262,'');
INSERT INTO pre_ucenter_members VALUES ('391',0x6c756369656e,0x3261373639653131306331626139636137393964643665316537393765326231,0x6c756f7875656661403132362e636f6d,'','',0x37332e3139312e38382e3437,'1399432187','0','0',0x623235343836,'');
INSERT INTO pre_ucenter_members VALUES ('392',0xe999905fe9878f5fe789885fc2b0e29481,0x6336383139343937623564626534396432373361633439366366636530646238,0x3436343035363837324071712e636f6d,'','',0x3131312e3137322e33302e3235,'1399468036','0','0',0x346434616238,'');
INSERT INTO pre_ucenter_members VALUES ('393',0xe5a4a9e7babfe88396e883967ee595b5,0x3661646361653037656134646564333737336236626631363238626565326135,0x7461796c6f725f30403136332e636f6d,'','',0x3138302e3135372e38392e313334,'1399472607','0','0',0x663131663234,'');
INSERT INTO pre_ucenter_members VALUES ('394',0x235f594f4c4fe38082,0x6630653733646632333964646434636230303462346363333432313765653963,0x3535323037363337364071712e636f6d,'','',0x3131332e35372e3138322e313533,'1399480772','0','0',0x343230303162,'');
INSERT INTO pre_ucenter_members VALUES ('395',0x4158494241,0x3239336138616465323938643736363865373235623365626231336637313064,0x3430333230313638304071712e636f6d,'','',0x35392e3137352e3232362e38,'1399523171','0','0',0x333933623833,'');
INSERT INTO pre_ucenter_members VALUES ('396',0x6576657265766572,0x3232386434383866326461633764336437653264333533356631303835636464,0x3631303439393730394071712e636f6d,'','',0x3132332e3133392e32302e313135,'1399552600','0','0',0x386132396331,'');
INSERT INTO pre_ucenter_members VALUES ('397',0xe8b186e5ad90e4bbace5928ce8a5bfe7939c,0x3534353338626664373863323665316562323961653233666633303737643336,0x777a79343335364073696e612e636f6d,'','',0x3137312e3232312e32382e323433,'1399648226','0','0',0x323930303361,'');
INSERT INTO pre_ucenter_members VALUES ('398',0x656c76615f736b79,0x6464313037313531666264653937386437623066323831313935356266633038,0x3530323036353539354071712e636f6d,'','',0x3138332e39342e3137302e313036,'1399788436','0','0',0x343235373435,'');
INSERT INTO pre_ucenter_members VALUES ('399',0xe590bee79fa5e590bee4b88de79fa5,0x3639386334333338663266366631623762656239333435313766383062336164,0x6572696379616f7a646c403136332e636f6d,'','',0x3231392e3134322e3132322e313030,'1399880880','0','0',0x303835663061,'');
INSERT INTO pre_ucenter_members VALUES ('400',0xe98086e79d80e58589e79a84e696bde59da6e5a881,0x3331373066373433636262356433353462666230326534313131636336353938,0x3439353332363035314071712e636f6d,'','',0x3132312e3232392e3232382e313534,'1399893629','0','0',0x643638353936,'');
INSERT INTO pre_ucenter_members VALUES ('401',0xe59c8ae889b9e4b884e595b2e99cb2e98a96,0x6538636331373561386631333836616433616138653531353639346262336439,0x323930313438393331394071712e636f6d,'','',0x3138332e39342e33342e3234,'1400136389','0','0',0x356232373037,'');
INSERT INTO pre_ucenter_members VALUES ('402',0x73616e64726179753132,0x6263663965666530323533343832353263333931643137326438663639636336,0x736861726b31383640686f746d61696c2e636f6d,'','',0x3133302e3233382e3136352e313733,'1400274751','0','0',0x663362383433,'');
INSERT INTO pre_ucenter_members VALUES ('403',0x6a656e6e69666572667265656d616e,0x3330386339663435613535313261363938333664313532613461636465356465,0x3136353231323734314071712e636f6d,'','',0x3137312e3232312e332e3338,'1400396000','0','0',0x303233333363,'');
INSERT INTO pre_ucenter_members VALUES ('404',0x73756e6e796372617a79,0x6332343261333835353666643963323336306539356438363962383230636565,0x73756e6e796372617a794071712e636f6d,'','',0x3132342e3230372e3234392e32,'1400468918','0','0',0x363565633466,'');
INSERT INTO pre_ucenter_members VALUES ('405',0x63616c76696e6c696e,0x6632333932666163376461653238303231653030313835613739393332346431,0x7a68756c78313939304073696e612e636e,'','',0x34392e38362e3233372e313437,'1400471164','0','0',0x636463306630,'');
INSERT INTO pre_ucenter_members VALUES ('406',0x63656c69616c696c697961,0x6162623230313537343430653737663637643263383563363730346666376636,0x323131303135353537354071712e636f6d,'','',0x3132332e3133382e37392e3330,'1400497729','0','0',0x313064333139,'');
INSERT INTO pre_ucenter_members VALUES ('407',0x4b656c6c79,0x6335356634633633333565626665356231643431383161373739626631646361,0x3834333033333232304071712e636f6d,'','',0x3131392e35372e3131342e38,'1400568124','0','0',0x633364343763,'');
INSERT INTO pre_ucenter_members VALUES ('408',0xe9a1bee9998ce88c89,0x3030306439316433356231306263363262633663623633626534356166373731,0x3535343734393739364071712e636f6d,'','',0x3132342e3131352e3137332e323330,'1400585229','0','0',0x643036613166,'');
INSERT INTO pre_ucenter_members VALUES ('409',0xe58faee5bd93e69dbee9bca0e5a4a7e9ad94e78e8b,0x3163313636353939656364653936656135373435333265323236373061666465,0x3836373737383633364071712e636f6d,'','',0x36312e3138352e3232342e323433,'1400594506','0','0',0x613233376461,'');
INSERT INTO pre_ucenter_members VALUES ('410',0x676567656e626f6c6f72,0x3865656536333834346236656534613366666232313666613838303934313034,0x68617261626f6c6f7240676d61696c2e636f6d,'','',0x3231312e3136322e32362e3239,'1400681546','0','0',0x613231376530,'');
INSERT INTO pre_ucenter_members VALUES ('411',0x6b72796368656e,0x6130663562306230626433323538653565643937383839663030323633353439,0x636a61313331344073696e612e636f6d,'','',0x3130362e3132302e3231332e3532,'1400681934','0','0',0x653535653536,'');
INSERT INTO pre_ucenter_members VALUES ('412',0xe585b3e880b3e88d89e5aeb6e7949f,0x3062343436303036333731373062306264643434656365656530306235633338,0x313237393238383234394071712e636f6d,'','',0x3130362e3132302e38362e313536,'1400922284','0','0',0x636233396463,'');
INSERT INTO pre_ucenter_members VALUES ('413',0x67726163656368616e787878,0x6137613130393464636436363530383838353764393264323738663232666434,0x313039333032303137304071712e636f6d,'','',0x36312e3136342e3231312e3835,'1400948072','0','0',0x383665633666,'');
INSERT INTO pre_ucenter_members VALUES ('414',0x4d617269616c,0x6666393966623364393063356330376563666465366633373964306138366564,0x3632343038313233374071712e636f6d,'','',0x3232332e37312e3234302e313534,'1401030554','0','0',0x613435393732,'');
INSERT INTO pre_ucenter_members VALUES ('415',0x6464747431303037,0x3336636136353336666539376238343030653061626430616463653032376635,0x3535343533303731334071712e636f6d,'','',0x3131382e3131342e3136382e313131,'1401290080','0','0',0x303366626637,'');
INSERT INTO pre_ucenter_members VALUES ('416',0x686f6e65796d616d61,0x6664303765333435383161386535383563633963653339633031663531663961,0x6a61637175656c696e652e77407468696e6b752e636e,'','',0x3131352e3230342e3131352e313137,'1401414238','0','0',0x653931666563,'');
INSERT INTO pre_ucenter_members VALUES ('417',0x4a61637175656c696e65,0x6539323064346661613330346362383763626464363661333561613330336634,0x3239343635353432304071712e636f6d,'','',0x3130362e33372e32382e313530,'1401763014','0','0',0x363064313865,'');
INSERT INTO pre_ucenter_members VALUES ('418',0x6d6f6e74616765,0x3433613530633064653832646138646236616234653835323137643664343534,0x313830373931333435324071712e636f6d,'','',0x3138332e39342e3139342e313736,'1401789013','0','0',0x353837336237,'');
INSERT INTO pre_ucenter_members VALUES ('419',0x77776d31393932,0x3062313234643363386632663164623463396137666334363633323433616431,0x77776d31393932403132362e636f6d,'','',0x35392e3137322e3136362e323135,'1401789731','0','0',0x333631323638,'');
INSERT INTO pre_ucenter_members VALUES ('420',0x4de296a15f4b41,0x3461313836653765653237643863306635636434656234366332613736616232,0x3335343334363236314071712e636f6d,'','',0x3131322e36342e33312e313037,'1401810518','0','0',0x363436386666,'');
INSERT INTO pre_ucenter_members VALUES ('421',0x6d61726367756f,0x6233613863646634353137643666616634343931386664643563353530366333,0x6d61726367756f403132362e636f6d,'','',0x3232302e3138312e37332e3936,'1401813498','0','0',0x616464396564,'');
INSERT INTO pre_ucenter_members VALUES ('422',0x6b756b6c75786b6c616e,0x6464633965663565623837356636326236363732323734623963396432633464,0x796f756361746d6540676d61696c2e636f6d,'','',0x33362e34362e3231332e313631,'1401850915','0','0',0x333766633736,'');
INSERT INTO pre_ucenter_members VALUES ('423',0xe6a194e6a297,0x3533376232613063336636363165363838333632373463666238343563626339,0x313334373030393537394071712e636f6d,'','',0x3131342e36362e3230302e313730,'1401863687','0','0',0x373465356139,'');
INSERT INTO pre_ucenter_members VALUES ('424',0x687562657274,0x6530313437376235333537616534383239663537383336656561373530636235,0x6c696f6e735f7a62403132362e636f6d,'','',0x3232322e3132382e312e3339,'1401866321','0','0',0x316630343636,'');
INSERT INTO pre_ucenter_members VALUES ('425',0xe2978fe38081e5bdbce696b9e280b3,0x3330353766363134373430383139616138303835323366646562306539616364,0x3430373638393732334071712e636f6d,'','',0x3131352e3139392e37302e3830,'1401879965','0','0',0x646566313338,'');
INSERT INTO pre_ucenter_members VALUES ('426',0x70656979697169616f6c696665,0x6566613739303236353637383732663230663734386335646531626162393035,0x3138343434303934344071712e636f6d,'','',0x33362e34372e3137352e323431,'1401890822','0','0',0x366364656362,'');
INSERT INTO pre_ucenter_members VALUES ('427',0x4c554c4b59,0x6366633766353164396532336639386532343933623830303531326261343365,0x3233363133343338304071712e636f6d,'','',0x3138332e36322e35372e313637,'1401960675','0','0',0x336364363063,'');
INSERT INTO pre_ucenter_members VALUES ('428',0x6a7379717133363132,0x3966643239663366626666376364376266363439303030363537633535653133,0x34393838303732374071712e636f6d,'','',0x35392e33372e3132392e3434,'1402016728','0','0',0x383462303161,'');
INSERT INTO pre_ucenter_members VALUES ('429',0x7a7874777468,0x3637633233653537383866303235613966643836646339343533336466656461,0x3334323234313831364071712e636f6d,'','',0x3138332e3133362e3135322e313236,'1402039820','0','0',0x636533393461,'');
INSERT INTO pre_ucenter_members VALUES ('430',0x53e9bb84e5b08fe58594e584bf,0x3833666139663034663461643335363731353531633566393565666463633266,0x3334323136373137374071712e636f6d,'','',0x3131342e3235322e37332e313736,'1402107625','0','0',0x396439323131,'');
INSERT INTO pre_ucenter_members VALUES ('431',0xe79ba76361e696af,0x6630386561613964656439636638373263616565633834333130626439373863,0x6c7563617336363838406c6976652e636e,'','',0x37322e34382e3136322e313036,'1402111622','0','0',0x363233623032,'');
INSERT INTO pre_ucenter_members VALUES ('432',0x68656c6c6f64616a696168616f,0x3533383464336430353430613734613330373331616163386266393231343964,0x313030353732353435384071712e636f6d,'','',0x3132332e3234362e35392e3632,'1402135000','0','0',0x383631636231,'');
INSERT INTO pre_ucenter_members VALUES ('433',0xe5bdbce5b2b8e5bd92e888aa,0x3033313666653335316532663961393732356430316332373939363861663439,0x3835323035303737354071712e636f6d,'','',0x3132302e3139392e3135352e3337,'1402306878','0','0',0x653234623730,'');
INSERT INTO pre_ucenter_members VALUES ('434',0x2d5f5f5f5f5f5f5f2d7c7c7c,0x6332323361383563343432383534393737396235626539616434356566313839,0x323431303439394071712e636f6d,'','',0x3130372e3137382e3230302e31,'1402375152','0','0',0x303765643337,'');
INSERT INTO pre_ucenter_members VALUES ('435',0x333933373536343536,0x3362343839306239653863323631666432333736306331666233353538666333,0x3339333735363435364071712e636f6d,'','',0x3130362e372e3137352e313139,'1402440437','0','0',0x353139383239,'');
INSERT INTO pre_ucenter_members VALUES ('436',0xe8939de8bda9,0x6463666536613736643236643662613562343331333964393332376661336563,0x636368656e2e6875407961686f6f2e636f6d,'','',0x3132392e38322e39392e3439,'1402542678','0','0',0x366362313732,'');
INSERT INTO pre_ucenter_members VALUES ('437',0x64616e69656c646f6f,0x3833636639633136376331636333306663376361643762356363333537353263,0x3439333036363436374071712e636f6d,'','',0x3138332e31362e3134372e3334,'1402546094','0','0',0x656233656537,'');
INSERT INTO pre_ucenter_members VALUES ('438',0x61617979,0x3161613066366238313434346439613033303661353461376265346135616465,0x6f64656c657474652e6c69407469616e64616f6564752e636f6d,'','',0x3231392e3134322e32322e313334,'1402557007','0','0',0x663331353862,'');
INSERT INTO pre_ucenter_members VALUES ('439',0x72616368656c,0x3161376139373731666539333562343831663563333362383038333030313536,0x3335383736343935394071712e636f6d,'','',0x36312e3138332e38332e3233,'1402752201','0','0',0x393066643832,'');
INSERT INTO pre_ucenter_members VALUES ('440',0x7661677565,0x6532376365663939623431646665653738666266353138303764376633663139,0x3534393531363337324071712e636f6d,'','',0x3130312e38352e31342e323434,'1402841773','0','0',0x643339613034,'');
INSERT INTO pre_ucenter_members VALUES ('441',0x6d61646f6c6c,0x3762343162336135313361326431316135323738373864613936653362366232,0x6c686675774073696e612e636f6d,'','',0x3134392e3136392e3136342e313033,'1402954677','0','0',0x353336623263,'');
INSERT INTO pre_ucenter_members VALUES ('442',0xe5b08fe889afe5908ce5ada6,0x3337363463343431613536313332646462646131623165376161393137353939,0x72696f6e5f7061726b657240686f746d61696c2e636f6d,'','',0x3131382e3130302e3233322e323431,'1403017399','0','0',0x373264306531,'');
INSERT INTO pre_ucenter_members VALUES ('443',0xe99988e786a0e781b5,0x3766353733613763316139656531373064626365383365383263373034653630,0x323734323530323232384071712e636f6d,'','',0x3138302e3136302e3137372e3139,'1403105727','0','0',0x666539363031,'');
INSERT INTO pre_ucenter_members VALUES ('444',0x43442de69599e5ada6e983a82d50616e646f,0x3265396130303235336235626239343039373434356638316338633166646538,0x70616e646f72612e72407468696e6b752e636e,'','',0x3131302e3138382e35312e313533,'1403145100','0','0',0x633033373331,'');
INSERT INTO pre_ucenter_members VALUES ('445',0x4de38082,0x3064343033333762386364373266333036636238653464373936376336376535,0x6474743139393231313233403136332e636f6d,'','',0x3137312e3131302e3138372e313138,'1403148684','0','0',0x636237366639,'');
INSERT INTO pre_ucenter_members VALUES ('446',0x5269636f,0x3431343632336139303830393033633532316230353737383135666231376133,0x66656e6779753530403136332e636f6d,'','',0x3131322e3139332e3130352e3831,'1403357535','0','0',0x666264393862,'');
INSERT INTO pre_ucenter_members VALUES ('447',0x77616e747070,0x3466343038363162363766316538363936356163633031346638326234653033,0x313334373134353236344071712e636f6d,'','',0x3132332e3136352e3135302e3632,'1403407507','0','0',0x336139386334,'');
INSERT INTO pre_ucenter_members VALUES ('448',0xe28c926fe28c92e697bae697ba2f7470,0x3166633662393736303163333161636264616664633263383338633530623337,0x38323232393931334071712e636f6d,'','',0x3132342e3131362e3234312e3138,'1403431763','0','0',0x333239383765,'');
INSERT INTO pre_ucenter_members VALUES ('449',0x446176696e61,0x3734336465666639653461353263323038316538363837376464376663363435,0x323930373933353137314071712e636f6d,'','',0x39382e3134352e3135302e3239,'1403474534','0','0',0x366164656437,'');
INSERT INTO pre_ucenter_members VALUES ('450',0x777379393230343134,0x3431626538663464396266336433353931303466616130393766663935646130,0x7773797773797a78403132362e636f6d,'','',0x3132322e3138392e3231302e323138,'1403522096','0','0',0x306133333362,'');
INSERT INTO pre_ucenter_members VALUES ('451',0x736979696e67676f75,0x6438323536623933326430353536303133366462666131396434373261653635,0x3739303737303032334071712e636f6d,'','',0x3230322e38362e3137392e313134,'1403534195','0','0',0x333133386436,'');
INSERT INTO pre_ucenter_members VALUES ('452',0x7878786973756d6d6572,0x6431343737323035313861663266616564393533346566306432363637653464,0x6363712e786961403136332e636f6d,'','',0x3137312e3232312e332e3533,'1403699561','0','0',0x396463333038,'');
INSERT INTO pre_ucenter_members VALUES ('453',0x474d41546572,0x3135333063336330643666626665393264366230643730303637396130626338,0x6e6f726d616e647940796561682e6e6574,'','',0x3230322e3132312e3133322e37,'1403755301','0','0',0x356137663165,'');
INSERT INTO pre_ucenter_members VALUES ('454',0x73696a696e6768616f797565,0x6263336164643139373432303464646638333261646564316130396130313234,0x73696a696e6768616f7975654071712e636f6d,'','',0x3133392e3231362e3137302e3737,'1403787875','0','0',0x333939656233,'');
INSERT INTO pre_ucenter_members VALUES ('455',0x6c696c696c697a697a69393934,0x3532356633363139623232373763373834343737356532623566663632653564,0x3335383531373330374071712e636f6d,'','',0x3132352e33332e3131362e323030,'1403793190','0','0',0x363137316464,'');
INSERT INTO pre_ucenter_members VALUES ('456',0xe284965f44616973c2b0596060,0x3662666362643930356334643530613432626336613436316438333236383330,0x3532323436323136334071712e636f6d,'','',0x3132332e3233322e3139302e323236,'1403798063','0','0',0x663962363535,'');
INSERT INTO pre_ucenter_members VALUES ('457',0x6675736869617374656c6c61,0x3037303434373861353439326336616334333332333438393731656139393066,0x7374656c6c616c69753132303540676d61696c2e636f6d,'','',0x37302e3138372e3139312e3539,'1403841710','0','0',0x653861326464,'');
INSERT INTO pre_ucenter_members VALUES ('458',0x64616973796c6f766530383035,0x3439636562343533316237636663303866336339633864636132333435356466,0x63617468795f79755f31323340686f746d61696c2e636f6d,'','',0x3131392e3136322e3133302e323136,'1403873330','0','0',0x323537303566,'');
INSERT INTO pre_ucenter_members VALUES ('459',0x2960736861646f776060,0x6338323635623031623532373166303066653362666462613265663033616133,0x3436373135373832374071712e636f6d,'','',0x312e3230342e34382e3730,'1403875276','0','0',0x633630623331,'');
INSERT INTO pre_ucenter_members VALUES ('460',0x323734363135313735,0x3561383737306666323839646533313239353039363238393438343561386362,0x3237343631353137354071712e636f6d,'','',0x3134382e3137372e3233342e3337,'1404114738','0','0',0x323965303464,'');
INSERT INTO pre_ucenter_members VALUES ('461',0x4d6f6e6f,0x3863323062343965643935356230346162326330353966613134633937353130,0x3439303836323939394071712e636f6d,'','',0x3131372e3137362e3235352e313334,'1404133642','0','0',0x613535326530,'');
INSERT INTO pre_ucenter_members VALUES ('462',0x4563686f,0x6666346534383031316331643165653533303433356438636265343637306266,0x3239313638323233324071712e636f6d,'','',0x3230322e3131302e3135362e313130,'1404144184','0','0',0x383436663136,'');
INSERT INTO pre_ucenter_members VALUES ('463',0x796962696e6779756e687569,0x3134383634313132306262373963633061373165353439303431343438383666,0x3733323531373537384071712e636f6d,'','',0x3131362e3131372e39322e313838,'1404230128','0','0',0x303464613836,'');
INSERT INTO pre_ucenter_members VALUES ('464',0x4c796e6e,0x6631363235363233306563393066613635353363663065373864653363356532,0x3436363530303236374071712e636f6d,'','',0x33362e34302e35332e313636,'1404313021','0','0',0x643933356461,'');
INSERT INTO pre_ucenter_members VALUES ('465',0xe69a96e69a96,0x6466396164316632636565393734623664333765383939646239396561613237,0x3832323132353231364071712e636f6d,'','',0x3131342e3131332e3232312e313634,'1404318173','0','0',0x643361356338,'');
INSERT INTO pre_ucenter_members VALUES ('466',0xe6989fe6989f,0x3061623830376538373237643430303862366232333463653662313661376131,0x3137313139333634354071712e636f6d,'','',0x35382e34342e3130312e323332,'1404357403','0','0',0x623035346136,'');
INSERT INTO pre_ucenter_members VALUES ('467',0x737a6631393935323234,0x3439396631636330346532333063613461396538666663653330636262663430,0x3430363336303339354071712e636f6d,'','',0x33362e34332e3132322e323131,'1404362509','0','0',0x643266353636,'');
INSERT INTO pre_ucenter_members VALUES ('468',0x6f6ee88eabe6af94e4b98ce696afe78eaf,0x3033346265386330623231663632373765313933376232323563333764636562,0x6675796968616e63616e64794071712e636f6d,'','',0x3132342e36342e3130362e37,'1404386350','0','0',0x653534313633,'');
INSERT INTO pre_ucenter_members VALUES ('469',0x7a6a686e363130,0x6565653937303335616363323261396162613930613937343236623663653062,0x7a6a686e363130403136332e636f6d,'','',0x3132322e3233312e3131322e313039,'1404397428','0','0',0x343538333165,'');
INSERT INTO pre_ucenter_members VALUES ('470',0x63796c7979736e6b,0x3731363937336163633736336431323261386139303566336332623563633766,0x63796c7979736e6b403136332e636f6d,'','',0x3131342e35342e33302e3537,'1404399333','0','0',0x356537353034,'');
INSERT INTO pre_ucenter_members VALUES ('471',0xe99c8de58d8ae781ace68b89,0x6663643465363362373766393638383062663762613865613463656131656635,0x6c616e78696e2e68756f40676d61696c2e636f6d,'','',0x3130312e31362e3133312e313932,'1404400016','0','0',0x303334666362,'');
INSERT INTO pre_ucenter_members VALUES ('472',0x4a616e652e53,0x3062633364623461613966636163386537336461313938343138303662616135,0x7375656a616e653237403136332e636f6d,'','',0x3232322e3231312e3134362e323331,'1404439307','0','0',0x623633613932,'');
INSERT INTO pre_ucenter_members VALUES ('473',0xe9989de5b08fe8b1ace7be8ae592a9e781ac,0x3066653935633139646666303837356564363335373832376633643538643864,0x67696767735f3130313934313239324071712e636f6d,'','',0x3131332e36342e33362e3333,'1404464553','0','0',0x393339383236,'');
INSERT INTO pre_ucenter_members VALUES ('474',0xe585abe69c88e79a84e89d89,0x3465616562656665393364373563633537336231373335643137396134656235,0x796c6a3139393331303231403136332e636f6d,'','',0x35382e32302e3135322e3639,'1404467123','0','0',0x333461626361,'');
INSERT INTO pre_ucenter_members VALUES ('475',0xe58d9ae8a782e7baa6e58f96,0x3966663537633663376562303263393366343936626239366439336237333131,0x3437323433303035324071712e636f6d,'','',0x3131372e34342e3137382e313139,'1404551787','0','0',0x623837306130,'');
INSERT INTO pre_ucenter_members VALUES ('476',0x616d626974696f75736b6f6265,0x6135666436653661313730613230643931323462356531393832666636363564,0x64617669642e7a343230313140676d61696c2e636f6d,'','',0x3138332e39302e3131322e3531,'1404557881','0','0',0x393863326531,'');
INSERT INTO pre_ucenter_members VALUES ('477',0x2752656c61707365,0x3638363536336662663663643232656462393935633435303637313631613533,0x3433343436383739314071712e636f6d,'','',0x3131302e3235342e33392e323236,'1404562351','0','0',0x666562383130,'');
INSERT INTO pre_ucenter_members VALUES ('478',0x43686f707079,0x3634353466393632613464343632356435303164386161326464333831326132,0x3631363337313938374071712e636f6d,'','',0x3232322e39312e3136302e313537,'1404627574','0','0',0x366236346361,'');
INSERT INTO pre_ucenter_members VALUES ('479',0xe8afb4e5a5bde79a84e4b880e8b5b7e79599e5ada6,0x3236376537373738306135666539613432626534336536653632366236333738,0x323933303138383831344071712e636f6d,'','',0x3132352e3131382e3137352e3936,'1404713739','0','0',0x626138613632,'');
INSERT INTO pre_ucenter_members VALUES ('480',0xefb8b6e384a3e7858ae383ab6fd09e,0x3738666338346162373937343933613332306663326566386663373636353839,0x3330383832313139304071712e636f6d,'','',0x35382e3130302e3136362e313531,'1404723142','0','0',0x363563336365,'');
INSERT INTO pre_ucenter_members VALUES ('481',0xe4b88de593ad,0x6665623834613366383363623265306661663063623132346635386362633162,0x74696579696e67626a4073696e612e636f6d,'','',0x3132332e3132332e3137372e3531,'1404733556','0','0',0x343038626530,'');
INSERT INTO pre_ucenter_members VALUES ('482',0xe5aba3e5aba34c65656c61,0x3763633163636135643335353263376537633061633765383337363162613330,0x6c696e313939335f6368696e614071712e636f6d,'','',0x3131342e39312e3234392e323433,'1404745580','0','0',0x633333316539,'');
INSERT INTO pre_ucenter_members VALUES ('483',0x39346c6f6c6c79706f70,0x6439383063333066343631346434333133393130366236313066643564316535,0x646f6f6963656c656f6e67403136332e636f6d,'','',0x3132332e3132382e3133302e323338,'1404781376','0','0',0x306333613531,'');
INSERT INTO pre_ucenter_members VALUES ('484',0x7374617068616e6965,0x3761313336623235396432663534386238303164616139313036376262313138,0x637879636f6d636e403132362e636f6d,'','',0x3131312e3230332e31362e3437,'1404818333','0','0',0x643238366238,'');
INSERT INTO pre_ucenter_members VALUES ('485',0xe592a8e8afa22d5361726168,0x3466373231373763323139316633336363653864303963313235663263373237,0x3732333338323130324071712e636f6d,'','',0x3138332e39342e33332e3637,'1404888743','0','0',0x373164356432,'');
INSERT INTO pre_ucenter_members VALUES ('486',0x686f797979797979,0x3166383635346538366465633263633731376333326432626530336266663032,0x686f79792e68407468696e6b752e636e,'','',0x35382e3234362e33302e323532,'1404889237','0','0',0x356132363730,'');
INSERT INTO pre_ucenter_members VALUES ('487',0xe5aea4e58f8be7b6b2,0x3437613562643233323739633437326436373537653034613837323763336463,0x6572616e65746e6f776e657440676d61696c2e636f6d,'','',0x3130312e37382e3134382e3538,'1404898649','0','0',0x393464393532,'');
INSERT INTO pre_ucenter_members VALUES ('488',0x436174686572696e656e6565,0x3433306235666162646232393433656437353738303838386138623638613464,0x313237343134323435314071712e636f6d,'','',0x3132332e31352e35372e313737,'1404903884','0','0',0x636138343563,'');
INSERT INTO pre_ucenter_members VALUES ('489',0x44616e69656c,0x3237326337376162613834326664323037666665643735636462306631613535,0x3531393937323737344071712e636f6d,'','',0x3131372e3135312e35342e323339,'1404912173','0','0',0x643762646365,'');
INSERT INTO pre_ucenter_members VALUES ('490',0x536f70686965,0x6535383965313731303230343636663566656432376138353364303962383434,0x736f7068696566753638334073696e612e636f6d,'','',0x3131362e3231312e3139342e313930,'1405072750','0','0',0x656465383035,'');
INSERT INTO pre_ucenter_members VALUES ('491',0xe5b08fe5a89ce8b186,0x3032313935336637666535356131396533613633633139623865356633613032,0x7869616f6e61646f75324073696e612e636f6d,'','',0x3132332e3131362e3139382e323535,'1405262995','0','0',0x333166313234,'');
INSERT INTO pre_ucenter_members VALUES ('492',0xe5bca0e4bc9fe7bfb03636,0x3434306636633637643864323039613661396138646433666335363730396539,0x313930393637363731324071712e636f6d,'','',0x3131322e3233352e3232362e33,'1405322675','0','0',0x333265373937,'');
INSERT INTO pre_ucenter_members VALUES ('493',0x497679,0x3865636632316235636231663865356537323963386539636239393064623964,0x697679393230383233403132362e636f6d,'','',0x3131372e32332e3138332e3636,'1405328879','0','0',0x663432343664,'');
INSERT INTO pre_ucenter_members VALUES ('494',0x79696c69,0x3431353032633964616262663833353264653432316238663566356566313230,0x3431363635323035324071712e636f6d,'','',0x3231392e3134332e312e313737,'1405340537','0','0',0x393464623236,'');
INSERT INTO pre_ucenter_members VALUES ('495',0xe58f81e58d83,0x3363303165346233383065643365383636393363643337323261316166643762,0x63616967756f7765693132334071712e636f6d,'','',0x3232312e3137382e3132362e313437,'1405342110','0','0',0x653637643565,'');
INSERT INTO pre_ucenter_members VALUES ('496',0x616c6578323332363235,0x3164646334666231326130636262323039376139326535613130653435363733,0x7a6865792e77616e6740686f746d61696c2e636f6d,'','',0x32372e31362e3138332e3736,'1405351710','0','0',0x656236333930,'');
INSERT INTO pre_ucenter_members VALUES ('497',0x54616e67,0x6630636132623961643639313664613834623537623566326638353864376165,0x3830393534313539344071712e636f6d,'','',0x3231382e3130362e3132382e323438,'1405392245','0','0',0x356262336233,'');
INSERT INTO pre_ucenter_members VALUES ('498',0x7469616e64616f,0x3363303230663862636363356365633438376438303832353130313164313534,0x7768666a32303039403136332e636f6d,'','',0x3231392e3134322e32322e313334,'1405393031','0','0',0x376537383163,'');
INSERT INTO pre_ucenter_members VALUES ('499',0xe59388e59388,0x3263396339663238613661303637333462373965343236663161363839306630,0x313831313436363535334071712e636f6d,'','',0x3132302e3231302e3136302e323334,'1405413651','0','0',0x333339323230,'');
INSERT INTO pre_ucenter_members VALUES ('500',0x536861776e5f426569636f,0x6266643034396238303432386130333134373834376462386238616333326233,0x31383931323831374071712e636f6d,'','',0x3138332e3230312e3235352e3532,'1405499213','0','0',0x643338313730,'');
INSERT INTO pre_ucenter_members VALUES ('501',0xe5ae89e5a587e593a5,0x6333643461393862613032363461666434613361616332303061346631633565,0x7761713934313131407669702e71712e636f6d,'','',0x3138332e3135372e3136302e31,'1405519370','0','0',0x616330393662,'');
INSERT INTO pre_ucenter_members VALUES ('502',0x717765313233,0x3161386132353736306663323063653363653665386238303231343839316137,0x313430333033393838384071712e636f6d,'','',0x3130362e34392e38322e313036,'1405522481','0','0',0x313931343165,'');
INSERT INTO pre_ucenter_members VALUES ('503',0x67756f6d6569343139,0x6234383532656532616334633835373638376438343765623662376563663534,0x67756f6d6569343139403136332e636f6d,'','',0x3131362e31362e33332e3931,'1405580576','0','0',0x306364336232,'');
INSERT INTO pre_ucenter_members VALUES ('504',0x7a7963e38081,0x6239303362613236626637386261373130363432383732333063663038376231,0x3434393139343235334071712e636f6d,'','',0x3137352e33342e3135392e313832,'1405596661','0','0',0x353333303230,'');
INSERT INTO pre_ucenter_members VALUES ('505',0x4d616765,0x3039633864626637623364326531653731376434643365313839343136616231,0x323234373731303937324071712e636f6d,'','',0x3131372e3137322e32362e313631,'1405674051','0','0',0x336337363832,'');
INSERT INTO pre_ucenter_members VALUES ('506',0xe6a4b0e5ad90e6b094,0x3931646533373932316262333635373533623937326133623838653666626434,0x6d3138303830343430353432403136332e636f6d,'','',0x3131372e34342e33322e323135,'1405746048','0','0',0x306161366466,'');
INSERT INTO pre_ucenter_members VALUES ('507',0xe78a81e59cb0e4ba9a,0x6564373462643266653737313539333632623930356163383031653130656461,0x3537343439383232334071712e636f6d,'','',0x35382e34302e35322e3134,'1405758831','0','0',0x663036353437,'');
INSERT INTO pre_ucenter_members VALUES ('508',0xe6858ee78bac,0x3036626239626336306339383336323332643235356366303161666137656363,0x3531393833313430324071712e636f6d,'','',0x35382e33322e3235312e313032,'1405928546','0','0',0x323062306161,'');
INSERT INTO pre_ucenter_members VALUES ('509',0xe98293e5b08fe9be99,0x3939343039316132393763326265393539643836383038303962303530393536,0x64656e675f7869616f6c6f6e67403132362e636f6d,'','',0x3130332e382e3232332e313739,'1405938174','0','0',0x653637653964,'');
INSERT INTO pre_ucenter_members VALUES ('510',0x68656a69616a696132303134,0x6132613335643430316564656666623836636162356230383130306130626238,0x68656a69616a69613330314036332e636f6d,'','',0x3132342e36342e3133352e313235,'1406161892','0','0',0x343636643635,'');
INSERT INTO pre_ucenter_members VALUES ('511',0xe993b6e4b98be7bebd,0x3532306639656362376366373364633663326263313538373538633031626162,0x3738353930363333334071712e636f6d,'','',0x3132352e33372e39302e3638,'1406344213','0','0',0x353436666132,'');
INSERT INTO pre_ucenter_members VALUES ('512',0xe5a696e5a696,0x3461626538623463306130383138376537333230656165393037666635616338,0x6c6f766567656e676865654071712e636f6d,'','',0x3131382e37322e3134362e37,'1406691608','0','0',0x386563333335,'');
INSERT INTO pre_ucenter_members VALUES ('513',0x474d4154373030e6b2a1e59586e9878f,0x3764626430383038373134613933366539383531386563336538643531636632,0x3133353334333337313836403136332e636f6d,'','',0x3131332e3130352e3133392e313931,'1406775913','0','0',0x396461663633,'');
INSERT INTO pre_ucenter_members VALUES ('514',0xe682a0e682a0e79a84e5bf83e68385,0x3163363162643930663938626539623239363935623031646132643533646631,0x313130333335333634314071712e636f6d,'','',0x3131362e3233312e35362e313939,'1406876436','0','0',0x343461353262,'');
INSERT INTO pre_ucenter_members VALUES ('515',0xe998bfe5ad98e788b1e5ada6e69caf,0x6335336136363532643334393864656463393231656437303762616237333364,0x373830353638373339304071712e636f6d,'','',0x36312e3133302e3130352e313837,'1407229810','0','0',0x323832346432,'');
INSERT INTO pre_ucenter_members VALUES ('516',0x5965657a79,0x3938336330616464663464323965366639626231383535326336386235393565,0x777a71333434393235333635407669702e71712e636f6d,'','',0x3131352e3233302e3235332e3239,'1407250975','0','0',0x666463303264,'');
INSERT INTO pre_ucenter_members VALUES ('517',0xe5a4a7e880b3e5b185e5a3ab,0x6539313633626362623734373930383836613237363263333139626439373565,0x3539363539323437384071712e636f6d,'','',0x3131362e3233352e3134342e323139,'1407390794','0','0',0x616139383862,'');
INSERT INTO pre_ucenter_members VALUES ('518',0xe69bbce78fa0e6b299e58d8e,0x3861336161316664333438373964353835383265333635343863646139393638,0x3539313738383637314071712e636f6d,'','',0x3130312e31372e36342e323137,'1407490731','0','0',0x626365306366,'');
INSERT INTO pre_ucenter_members VALUES ('519',0x4576657261,0x3763353461386334363861666539333630393866623235303765353233643165,0x657665726168717940686f746d61696c2e636f6d,'','',0x3138342e35372e31312e3734,'1407552139','0','0',0x626261336237,'');
INSERT INTO pre_ucenter_members VALUES ('520',0x65647a6875616e67,0x3933613733346562386635373461373136653261326362383939313339346161,0x65647a6875616e6740686f746d61696c2e636f6d,'','',0x3131362e3235312e3231372e313734,'1407571145','0','0',0x393438613566,'');
INSERT INTO pre_ucenter_members VALUES ('521',0xe4b889e6b0b4e4b98be5b0a7,0x3238333933653034356166643434326265326164616264353664636539623066,0x3632343535393337374071712e636f6d,'','',0x3138332e36372e34302e3133,'1407638925','0','0',0x643862383631,'');
INSERT INTO pre_ucenter_members VALUES ('522',0x68756a696e67,0x3161633261623665353062373561393037643138666438313762373636333062,0x3330393539343038354071712e636f6d,'','',0x3131302e38302e3137382e323139,'1407642255','0','0',0x663537323032,'');
INSERT INTO pre_ucenter_members VALUES ('523',0xe5a4a9e5bf83,0x3935323130363831386334383937326536653834303136396565373839303463,0x7261696e793932343134403136332e636f6d,'','',0x3132312e32392e3132352e313137,'1407647051','0','0',0x623862346336,'');
INSERT INTO pre_ucenter_members VALUES ('524',0x647265616d636861736572,0x6430656639326136646262393661343762643139633863323337646133386164,0x3834343132323335314071712e636f6d,'','',0x3130362e33392e3235352e323332,'1407677161','0','0',0x393363636263,'');
INSERT INTO pre_ucenter_members VALUES ('525',0x63616e64796c75,0x6430623939333064653465333765616534386632303434366663346439313837,0x3834353837313230394071712e636f6d,'','',0x36312e3136342e3231312e323238,'1407829265','0','0',0x313431396631,'');
INSERT INTO pre_ucenter_members VALUES ('527',0x46656c6963697479,0x6563313639343463666331306538313138343938663236373439353563643362,0x39343532383738394071712e636f6d,'','',0x35392e3137352e3232362e3333,'1407863301','0','0',0x356362656261,'');
INSERT INTO pre_ucenter_members VALUES ('528',0x68737a78303330313032,0x3233313066353163306163646436663238663934613337393862323562396364,0x68737a78303330313032403132362e636f6d,'','',0x3232322e3132382e312e3339,'1407893758','0','0',0x653637636166,'');
INSERT INTO pre_ucenter_members VALUES ('529',0xe99a8fe4bebf,0x3038386639313339353336303436633064316366653335343663663635623761,0x6a656e6e792e6a407468696e6b752e636e,'','',0x3131362e3235352e3233332e313730,'1407898760','0','0',0x383766303266,'');
INSERT INTO pre_ucenter_members VALUES ('530',0x53482d545343,0x6332373563396462373432383231346264656231316231306433396536343330,0x313932363130363830374071712e636f6d,'','',0x3131362e3235352e3233332e313730,'1407899163','0','0',0x623138376565,'');
INSERT INTO pre_ucenter_members VALUES ('531',0x4a656e6e795f4d612de795aae88c84,0x3336373265356136646537633337653062613334613462393137306534316431,0x6a656e6e796d61636e403132362e636f6d,'','',0x3132352e3132322e32362e3433,'1407903451','0','0',0x623735653739,'');
INSERT INTO pre_ucenter_members VALUES ('532',0x77636c61726965,0x6561366238306566646139623238626366343361393538396133326539383261,0x3335383131343535334071712e636f6d,'','',0x31342e32392e3132372e313731,'1408177327','0','0',0x663338353265,'');
INSERT INTO pre_ucenter_members VALUES ('533',0xe9bb84e9959ce99c9332303134,0x3461336265613161326332326264363361613336393138326232663932336666,0x3431343530373731394071712e636f6d,'','',0x3232322e35352e37302e313136,'1408378168','0','0',0x386562346363,'');
INSERT INTO pre_ucenter_members VALUES ('534',0xe99bbe636865727279,0x3935396239386238633537303062366636643431323830363165653736643962,0x3334363231373936364071712e636f6d,'','',0x3137312e3232312e332e3536,'1408455114','0','0',0x613333316363,'');
INSERT INTO pre_ucenter_members VALUES ('536',0x53482d5a584e,0x3030333961366136653565343161303838616133333165643766396565633763,0x313934363636303139344071712e636f6d,'','',0x3131382e3132332e31362e35,'1408526026','0','0',0x616130313437,'');
INSERT INTO pre_ucenter_members VALUES ('537',0x416d616e6461,0x3136366339353732626630383961316430323633333339316531636136643137,0x313534343837323031324071712e636f6d,'','',0x3131362e3233312e36352e313534,'1408528956','0','0',0x633738396631,'');
INSERT INTO pre_ucenter_members VALUES ('538',0x53482d4358,0x3338613539396530306439663737313131616437326331363538356236643366,0x7370686173696140686f746d61696c2e636f6d,'','',0x3131382e3132332e31362e35,'1408588571','0','0',0x633333656637,'');
INSERT INTO pre_ucenter_members VALUES ('539',0x424a2d534e,0x3236306266343063626236303030636666646136626662313262396665663832,0x3233323932303433384071712e636f6d,'','',0x3131382e3132332e31362e35,'1408600568','0','0',0x383434653232,'');
INSERT INTO pre_ucenter_members VALUES ('540',0x4d656c616e746861,0x3061623836363835646230343862653536626566346136633139396365636334,0x6d656c616e7468612e79407468696e6b77697468752e636f6d,'','',0x3131382e3132332e31362e35,'1408603196','0','0',0x636533626531,'');
INSERT INTO pre_ucenter_members VALUES ('541',0x6c61757261323031323933,0x6139653061383562616466353638633661636666373035363866396132343461,0x3436313538383437344071712e636f6d,'','',0x3131312e34362e34332e313731,'1408849452','0','0',0x633531666139,'');
INSERT INTO pre_ucenter_members VALUES ('542',0x63796a31343337313435363733,0x6334393834646533353338386463393063626565316265343565663335343937,0x6368656e796a7a7a727a3230313240676d61696c2e636f6d,'','',0x3232322e3234312e3232372e323336,'1408886380','0','0',0x636539643161,'');
INSERT INTO pre_ucenter_members VALUES ('543',0x57482d50514a,0x6236623363313463383161316232623938333665363834363464653566663233,0x3336313837353432314071712e636f6d,'','',0x3131382e3132332e31362e35,'1408928408','0','0',0x383835393638,'');
INSERT INTO pre_ucenter_members VALUES ('544',0x57482d595946,0x3266663130336334616338663462666639643534366337636431313334623561,0x3339303138303035334071712e636f6d,'','',0x3131382e3132332e31362e35,'1408946283','0','0',0x623334363838,'');
INSERT INTO pre_ucenter_members VALUES ('545',0x57482d4d594c,0x3936306436643836323738616563386664643431633232653062323938386530,0x313134373833373838364071712e636f6d,'','',0x3131382e3132332e31362e35,'1408947134','0','0',0x653464376264,'');
INSERT INTO pre_ucenter_members VALUES ('546',0x424a2d574d,0x3261326139316638623830336135313736623064363131336630346565313562,0x3430363830323534344071712e636f6d,'','',0x3131382e3132332e31362e35,'1408948412','0','0',0x636562376236,'');
INSERT INTO pre_ucenter_members VALUES ('547',0x43442d5848,0x3962633834623165326437336134353161666664643537626664373962613838,0x313239343237383531334071712e636f6d,'','',0x3131382e3132332e31362e35,'1409017060','0','0',0x343962356231,'');
INSERT INTO pre_ucenter_members VALUES ('548',0x485a2d5a59,0x3037643531653238383639623762316336643338323731393533653563306266,0x7a686f757969616d79403132362e636f6d,'','',0x3131382e3132332e31362e35,'1409017152','0','0',0x303164313063,'');
INSERT INTO pre_ucenter_members VALUES ('549',0xe6b288e8bf9ce593b232303134,0x6262623632303731623236393261373735373435333038623964653863336533,0x7469616e6368656e6730393236403136332e636f6d,'','',0x3131352e3233302e3235342e3135,'1409019348','0','0',0x343336323030,'');
INSERT INTO pre_ucenter_members VALUES ('550',0x57482d4b594a,0x3565353536333866376635326564386632366662643764363463663637373966,0x3438393533313433354071712e636f6d,'','',0x3131382e3132332e31362e35,'1409046532','0','0',0x343331653838,'');
INSERT INTO pre_ucenter_members VALUES ('551',0x424a2d435948,0x3662363463313262633664346635626338656163656436306631346533663564,0x3234333833383834344071712e636f6d,'','',0x3131382e3132332e31362e35,'1409105157','0','0',0x353532303235,'');
INSERT INTO pre_ucenter_members VALUES ('552',0x57482d5a59,0x3634613834643662336434656663656566653237353663356133643137663065,0x3532353836373832394071712e636f6d,'','',0x3131382e3132332e31362e35,'1409131882','0','0',0x613135353962,'');
INSERT INTO pre_ucenter_members VALUES ('553',0x57482d4c4b59,0x3339653134393533613135393161366661323731386261313833303632643934,0x3436353739353736394071712e636f6d,'','',0x3131382e3132332e31362e35,'1409218647','0','0',0x373235616639,'');
INSERT INTO pre_ucenter_members VALUES ('554',0x424a2d434d,0x3435653230363939336230383537353065666434616362326633366633623636,0x3133333738343331304071712e636f6d,'','',0x3131382e3132332e31362e35,'1409219085','0','0',0x643437303465,'');
INSERT INTO pre_ucenter_members VALUES ('555',0xe4bbbbe5a4a7e5ae9b,0x6662633964663738346237316336343938323661393237623132633863353765,0x72777879784073696e612e636f6d,'','',0x3132312e32312e3136302e323131,'1409360061','0','0',0x643865663739,'');
INSERT INTO pre_ucenter_members VALUES ('556',0x436872697374696e6131393933,0x6263333061366632656535653966623636393064386132643661663233303535,0x3238313230303431314071712e636f6d,'','',0x3131312e3138322e32372e313730,'1409395452','0','0',0x633764643265,'');
INSERT INTO pre_ucenter_members VALUES ('557',0x52697461,0x3732643839373064353864346136396134326631646638373738623763623263,0x313930353736383239314071712e636f6d,'','',0x3132302e33382e32382e3637,'1409494378','0','0',0x616166613835,'');
INSERT INTO pre_ucenter_members VALUES ('558',0x43442d435958,0x6530643661656536356564353330353632333130363563363266336466313730,0x313136333536393532324071712e636f6d,'','',0x3131382e3132332e31362e35,'1409538925','0','0',0x643431323732,'');
INSERT INTO pre_ucenter_members VALUES ('559',0x43442d4b5148,0x6538386561656632313032613736623063346561636231373162333635346263,0x3637353137373736324071712e636f6d,'','',0x3131382e3132332e31362e35,'1409539011','0','0',0x336238356465,'');
INSERT INTO pre_ucenter_members VALUES ('560',0x57482d5258,0x3430303430313937323834363335333138316563333234363833376562343637,0x3532333335373233314071712e636f6d,'','',0x3131382e3132332e31362e35,'1409542065','0','0',0x316565303237,'');
INSERT INTO pre_ucenter_members VALUES ('561',0x57482d4151,0x3831646265313166393537356333646537303565383563663730323535363435,0x3337303637363239314071712e636f6d,'','',0x3131382e3132332e31362e35,'1409542167','0','0',0x373338636361,'');
INSERT INTO pre_ucenter_members VALUES ('562',0x57482d4359,0x6431393832336634656439616635663433303236623262646365316561663664,0x3930373132393435394071712e636f6d,'','',0x3131382e3132332e31362e35,'1409543815','0','0',0x373936313238,'');
INSERT INTO pre_ucenter_members VALUES ('563',0x43442d4a4652,0x6163353331636263323762303230326339333932623264363037623038346336,0x3539383336333535344071712e636f6d,'','',0x3131382e3132332e31362e35,'1409550834','0','0',0x326539336532,'');
INSERT INTO pre_ucenter_members VALUES ('564',0x536869726c6579,0x6232376463326563613538353334353031663165346538616466643634346436,0x736869726c65792e7a407468696e6b77697468752e636f6d,'','',0x3232322e3132382e312e3339,'1409551114','0','0',0x616234303938,'');
INSERT INTO pre_ucenter_members VALUES ('565',0x716561726c,0x3934643935616137303837613662633761323830643561653735663230653639,0x716561726c39353732314067616d696c2e636f6d,'','',0x3132332e3132362e31392e3538,'1409583380','0','0',0x346138303965,'');
INSERT INTO pre_ucenter_members VALUES ('566',0x424a2d48585a,0x3238613133663233383730316463336138666364383039346234633938373161,0x3239343035343332324071712e636f6d,'','',0x3131382e3132332e31362e35,'1409636647','0','0',0x373432613837,'');
INSERT INTO pre_ucenter_members VALUES ('567',0x46616e6e6966,0x6265386562366430313361376664313238386264373630343961653237626535,0x323534313934333038394071712e636f6d,'','',0x3131332e3130382e3136362e3439,'1409638778','0','0',0x616131353366,'');
INSERT INTO pre_ucenter_members VALUES ('568',0x424a2d4c5359,0x3535663461346632393330643461383264373330316261386437326138613864,0x3239383237303737364071712e636f6d,'','',0x3131382e3132332e31362e35,'1409639179','0','0',0x623739343536,'');
INSERT INTO pre_ucenter_members VALUES ('569',0x414e414e,0x3331303935663538326266653762613133363039303761366336353038313036,0x323534333638343734374071712e636f6d,'','',0x3132352e3132322e3233372e3431,'1409643821','0','0',0x643565396661,'');
INSERT INTO pre_ucenter_members VALUES ('570',0x373030,0x3361376432613566353334313637386537613234333232613061316333333133,0x3431393833323632394071712e636f6d,'','',0x3232332e38312e3234362e3431,'1409661794','0','0',0x323761633233,'');
INSERT INTO pre_ucenter_members VALUES ('571',0xe799bbe799bbe799bbe58da1,0x3932376164363935626439386336353931333933626233353436316265363261,0x676567656469646935353232403136332e636f6d,'','',0x3131352e3139352e3135342e323430,'1409709721','0','0',0x393435653634,'');
INSERT INTO pre_ucenter_members VALUES ('572',0x424a2d585751,0x6264663464366533393332373161666133393562373633313164333335396232,0x77656e71695f7869616e674063617267696c6c2e636f6d,'','',0x3131382e3132332e31362e35,'1409722299','0','0',0x623766363464,'');
INSERT INTO pre_ucenter_members VALUES ('573',0x616461616161,0x6438633339393365626363383764363239303634646634613038316131393737,0x6164612e6c7531303138406d652e636f6d,'','',0x3231312e3135322e33342e313330,'1409732082','0','0',0x326235663030,'');
INSERT INTO pre_ucenter_members VALUES ('574',0x57482d5759534d,0x6237613266626437646630643363633162393731373731333631353465343964,0x3536343734363837394071712e636f6d,'','',0x3131382e3132332e31362e35,'1409736862','0','0',0x653464663535,'');
INSERT INTO pre_ucenter_members VALUES ('575',0x57482d4a5359,0x6233643938656637383962643336666133336166343262363964363863363261,0x313038353437313535344071712e636f6d,'','',0x3131382e3132332e31362e35,'1409736931','0','0',0x333038643237,'');
INSERT INTO pre_ucenter_members VALUES ('577',0x485a2d514a51,0x6131633265323033323136326238633239626465346539633766346465306634,0x353935303236334071712e636f6d,'','',0x3131382e3132332e31362e35,'1409796586','0','0',0x623462626166,'');
INSERT INTO pre_ucenter_members VALUES ('578',0x43442d465859,0x3830633065303562356262666362383164646638336662393562663435333264,0x3534363630303634334071712e636f6d,'','',0x3131382e3132332e31362e35,'1409800012','0','0',0x636433626366,'');
INSERT INTO pre_ucenter_members VALUES ('579',0x57482d4e4659,0x3634383462386435666466636638636535666439303738373031613631313337,0x3739393732313232324071712e636f6d,'','',0x3131382e3132332e31362e35,'1409881470','0','0',0x656239663834,'');
INSERT INTO pre_ucenter_members VALUES ('580',0x424a2d5757,0x6338633232643030646663653965663335383437393832383262376162323131,0x3837303038333931324071712e636f6d,'','',0x3131382e3132332e31362e35,'1409881865','0','0',0x396536326537,'');
INSERT INTO pre_ucenter_members VALUES ('581',0x43442d4c4253,0x6332623037313932366664623835333038366635663631336236633830313238,0x3539383338303536394071712e636f6d,'','',0x3131382e3132332e31362e35,'1409882516','0','0',0x343935663833,'');
INSERT INTO pre_ucenter_members VALUES ('582',0x6a61736d696e65,0x3834653938313937316130356231353632373161353734666536353335666662,0x313537323838393537334071712e636f6d,'','',0x3132352e37302e3230372e313838,'1409883707','0','0',0x626232353262,'');
INSERT INTO pre_ucenter_members VALUES ('583',0x6a61736d696e656c697578696e7969,0x3233633735313631393136323735636431343963366234306332393563303530,0x6a61736d696e656c6975384073696e612e636f6d,'','',0x3133392e37382e3132302e3235,'1409888211','0','0',0x343033346430,'');
INSERT INTO pre_ucenter_members VALUES ('584',0x424a2d585748,0x6235616465323236353339636236363538373735653165323838316635323933,0x3536343532393838364071712e636f6d,'','',0x3131382e3132332e31362e35,'1409906179','0','0',0x333438646537,'');
INSERT INTO pre_ucenter_members VALUES ('585',0x57482d525351,0x6136643638333661303439326433333038616362393764306664396233623139,0x36323733373537304071712e636f6d,'','',0x3131382e3132332e31362e35,'1409909425','0','0',0x316433613639,'');
INSERT INTO pre_ucenter_members VALUES ('586',0x43442d504858,0x3264616636663437653564376634663738356438326562376161613961656136,0x3834303930393239324071712e636f6d,'','',0x3131382e3132332e31362e35,'1409973241','0','0',0x396536663165,'');
INSERT INTO pre_ucenter_members VALUES ('587',0x6c616e7469616e7a6869,0x6136313262363865333531366332323332656663633664613339306230313866,0x3536333432343935334071712e636f6d,'','',0x32372e31372e3131392e323531,'1409981875','0','0',0x336163396266,'');
INSERT INTO pre_ucenter_members VALUES ('588',0x57482d4c57,0x3933393839316664303263383634383161633932643635363064646336386165,0x333433303539344071712e636f6d,'','',0x3131382e3132332e31362e35,'1410228266','0','0',0x616134333032,'');
INSERT INTO pre_ucenter_members VALUES ('589',0x57482d584a,0x3538363334306364356466616431373031363535636234616637623039333338,0x3334383736333338394071712e636f6d,'','',0x3131382e3132332e31362e35,'1410229238','0','0',0x366335363036,'');
INSERT INTO pre_ucenter_members VALUES ('590',0x424a2d4a4a59,0x3763623262633862313365346565653664343337393531303732386131663537,0x3730383931363232384071712e636f6d,'','',0x3131382e3132332e31362e35,'1410232309','0','0',0x356232363137,'');
INSERT INTO pre_ucenter_members VALUES ('591',0x424a2d4c4b58,0x3833373963326561643131653033623738373638663864656534623736326339,0x3738373033383438394071712e636f6d,'','',0x3131382e3132332e31362e35,'1410232396','0','0',0x633365383136,'');
INSERT INTO pre_ucenter_members VALUES ('592',0x43442d545859,0x3363646262373236656136333932623337663933336464353064393065363234,0x3633353637323231304071712e636f6d,'','',0x3131382e3132332e31362e35,'1410241843','0','0',0x333663306264,'');
INSERT INTO pre_ucenter_members VALUES ('593',0x53482d4a5953,0x3534353538613731626436643466386431316532313335306361396538353830,0x3837333534323430314071712e636f6d,'','',0x3131382e3132332e31362e35,'1410244444','0','0',0x643032316335,'');
INSERT INTO pre_ucenter_members VALUES ('594',0x424a2d4a534d,0x3231373062343264353465313461643965373631386161323365396166373764,0x3635343431343937314071712e636f6d,'','',0x3131382e3132332e31362e35,'1410244537','0','0',0x393636326336,'');
INSERT INTO pre_ucenter_members VALUES ('595',0x68616c61636865,0x3034643230666465343533366234323063653761333263626534316366363538,0x68616c61636865403132362e636f6d,'','',0x3231382e38352e3131382e323133,'1410333132','0','0',0x633638643931,'');
INSERT INTO pre_ucenter_members VALUES ('596',0x53482d434d59,0x3933653263313739313334383830613635613063386665613135326632653830,0x6d696e67796563686940676d61696c2e636f6d,'','',0x3131382e3132332e31362e35,'1410399934','0','0',0x653765396334,'');
INSERT INTO pre_ucenter_members VALUES ('597',0x57482d5a5758,0x3663613034313036306339343034353638613365646636383065643263363763,0x323434363332353237364071712e636f6d,'','',0x3131382e3132332e31362e35,'1410402404','0','0',0x346136353066,'');
INSERT INTO pre_ucenter_members VALUES ('598',0x58412d47534c,0x6262393538636431373034363462316436383939623562376466323466383832,0x3235343033373338374071712e636f6d,'','',0x3131382e3132332e31362e35,'1410428377','0','0',0x393536376630,'');
INSERT INTO pre_ucenter_members VALUES ('599',0x43442d484a43,0x6539303633626638316137346438313831613632366637393664303133323339,0x3235303439393736364071712e636f6d,'','',0x3131382e3132332e31362e35,'1410494190','0','0',0x653537623830,'');
INSERT INTO pre_ucenter_members VALUES ('600',0x424a2d485a4d,0x6462666535363437356566366137313866393333396462353930336130303935,0x3637303830303533304071712e636f6d,'','',0x3131382e3132332e31362e35,'1410515242','0','0',0x616434383534,'');
INSERT INTO pre_ucenter_members VALUES ('601',0x61696e736965373133,0x3734313532303839383530633166393865363066333234653833333437323063,0x61696e73696537313340676d61696c2e636f6d,'','',0x32372e33382e31332e39,'1410629432','0','0',0x386338363130,'');
INSERT INTO pre_ucenter_members VALUES ('602',0x6a656c6c79,0x3437343337393635323333306662626466333439666134663461646131343938,0x3334353036303237334071712e636f6d,'','',0x312e38342e3230352e313530,'1410696280','0','0',0x386264376466,'');
INSERT INTO pre_ucenter_members VALUES ('603',0x57482d575a51,0x6162393665373862663564653634353438626333636135633038343633633961,0x313430313436333939304071712e636f6d,'','',0x3131382e3132332e31362e35,'1410749289','0','0',0x396264316530,'');
INSERT INTO pre_ucenter_members VALUES ('604',0x53482d535a59,0x3132363735393865373031373336326262363235376565323334623035613536,0x73756e7a687579756e403136332e636f6d,'','',0x3131382e3132332e31362e35,'1410751031','0','0',0x373335386639,'');
INSERT INTO pre_ucenter_members VALUES ('605',0x424a2d5a5146,0x6332663865396130363261393333613335366263383465366436626334393863,0x716966616e5f7a68616f403136332e636f6d,'','',0x3131382e3132332e31362e35,'1410751169','0','0',0x316631633433,'');
INSERT INTO pre_ucenter_members VALUES ('606',0x43442d4c5352,0x6132346134343133393232623939383834653162666663376634646230353430,0x3536333534353032324071712e636f6d,'','',0x3131382e3132332e31362e35,'1410758587','0','0',0x623635666634,'');
INSERT INTO pre_ucenter_members VALUES ('607',0x424a2d44584c,0x3934366437326634373738313436316463633434633965303762633130323863,0x323238303636313230354071712e636f6d,'','',0x3131382e3132332e31362e35,'1410763209','0','0',0x396132616538,'');
INSERT INTO pre_ucenter_members VALUES ('609',0x57482d574d58,0x3365373166633561613431666337373533316165363934346664636434383335,0x3439333238393230324071712e636f6d,'','',0x3131382e3132332e31362e35,'1410835544','0','0',0x386161353034,'');
INSERT INTO pre_ucenter_members VALUES ('610',0x57482d5359,0x6233393136363038396139653864356236656466346531646630623264346630,0x3534363439353334374071712e636f6d,'','',0x3131382e3132332e31362e35,'1410836361','0','0',0x393535326632,'');
INSERT INTO pre_ucenter_members VALUES ('611',0x636563696c69615f313233,0x6138653139616666623762623761623037656436386262316464646138623136,0x3334353738363731334071712e636f6d,'','',0x36382e36322e38362e3230,'1410840627','0','0',0x336338386138,'');
INSERT INTO pre_ucenter_members VALUES ('612',0x524c57,0x3164356534303037306634353733643036326630353332623932393065396166,0x313931343235313731384071712e636f6d,'','',0x3137312e34312e3130392e323532,'1410850760','0','0',0x383363316165,'');
INSERT INTO pre_ucenter_members VALUES ('613',0xe78e8be7919ee781b532303134,0x3039656130663136346334663130396235633339653164303633353364613664,0x3736353834383339384071712e636f6d,'','',0x3137312e34312e3130392e323532,'1410851440','0','0',0x306337353362,'');
INSERT INTO pre_ucenter_members VALUES ('614',0x736b79,0x3661356366393231393634356531653234323236646361613230633130336561,0x77696e6b3838403136332e636f6d,'','',0x3132342e36382e332e33,'1410852471','0','0',0x376131363832,'');
INSERT INTO pre_ucenter_members VALUES ('615',0x6d696c6b746561,0x3065633932363637656130643237633561323231643332623634356132343263,0x72616368656c68616e7a6869403136332e636f6d,'','',0x3131312e3137342e382e3235,'1410858459','0','0',0x626430356463,'');
INSERT INTO pre_ucenter_members VALUES ('616',0x424a2d595843,0x3538313439623062396663373535343533326566663335616336353530303732,0x31383630303837353037304071712e636f6d,'','',0x3131362e3235352e3233332e313730,'1410861913','0','0',0x393230613535,'');
INSERT INTO pre_ucenter_members VALUES ('617',0x42492d434a57,0x3835646363613134663535633738313738346334313665373166626638383037,0x3234343630323031314071712e636f6d,'','',0x3131382e3132332e31362e35,'1410925658','0','0',0x613832373862,'');
INSERT INTO pre_ucenter_members VALUES ('618',0x57482d4c4151,0x3765323632663132313764383334333962323833656261343066636366393130,0x34393233333532384071712e636f6d,'','',0x3131382e3132332e31362e35,'1410938638','0','0',0x653761663633,'');
INSERT INTO pre_ucenter_members VALUES ('619',0x43442d4d52,0x6461383064366630656136323861633937616538313439653764663038613463,0x6c6f6f6b666f726d72403136332e636f6d,'','',0x3131382e3132332e31362e35,'1411092619','0','0',0x633133656239,'');
INSERT INTO pre_ucenter_members VALUES ('620',0x43442d485a,0x6161643661663035376333626562386435666265653134363533663530353533,0x3931333931323131354071712e636f6d,'','',0x3131382e3132332e31362e35,'1411092717','0','0',0x646538623335,'');
INSERT INTO pre_ucenter_members VALUES ('621',0x485a2d484348,0x6439383961646637393464336264343732366662373861373265393533323434,0x3235333435353031344071712e636f6d,'','',0x3131382e3132332e31362e35,'1411092849','0','0',0x316265356163,'');
INSERT INTO pre_ucenter_members VALUES ('622',0x57482d594659,0x3637326237613635323236316364343133346232363530396165613663653861,0x323632323631333431354071712e636f6d,'','',0x3131382e3132332e31362e35,'1411093070','0','0',0x656539633665,'');
INSERT INTO pre_ucenter_members VALUES ('623',0x485a2d435959,0x3136323066316263303332323836323634363165623130396430316166623361,0x637979303831374073696e612e636f6d,'','',0x3131382e3132332e31362e35,'1411093822','0','0',0x653239626166,'');
INSERT INTO pre_ucenter_members VALUES ('624',0x57482d4c5858,0x3337333132623234303563303662663438613534316635613638353738613961,0x313235353438393734354071712e636f6d,'','',0x3131382e3132332e31362e35,'1411094205','0','0',0x643061353130,'');
INSERT INTO pre_ucenter_members VALUES ('625',0x424a2d4c50,0x3038623361643936373339336665336135616534313664313933623165633835,0x383536323435384071712e636f6d,'','',0x3131382e3132332e31362e35,'1411112920','0','0',0x386331373633,'');
INSERT INTO pre_ucenter_members VALUES ('626',0x656c61696e65,0x6538393962663463343930336432626436346631643137363635316261306630,0x34393932353132354071712e636f6d,'','',0x3131362e3233312e36352e313534,'1411278092','0','0',0x636464616161,'');
INSERT INTO pre_ucenter_members VALUES ('627',0x53482d4c4352,0x3032343635636239333432376237373765316462333236366263393035386461,0x6c69756368616f72616e6c6372403132362e636f6d,'','',0x3131382e3132332e31362e35,'1411349979','0','0',0x626231663734,'');
INSERT INTO pre_ucenter_members VALUES ('628',0x53482d4c58,0x3138303663323631623635323437393335353361323866616561616538373537,0x737461725f667269656e644073696e612e636f6d,'','',0x3131382e3132332e31362e35,'1411350524','0','0',0x636131396230,'');
INSERT INTO pre_ucenter_members VALUES ('629',0x424a2d535a59,0x3030376664396465333733373431313339333564353735633731653737383962,0x7368657272795f737a79403132362e636f6d,'','',0x3131382e3132332e31362e35,'1411351631','0','0',0x663433366166,'');
INSERT INTO pre_ucenter_members VALUES ('630',0x43442d5450,0x3734306265396462343532633863663333633533356333333638323263356464,0x3431313230323632344071712e636f6d,'','',0x3131382e3132332e31362e35,'1411372301','0','0',0x643934653862,'');
INSERT INTO pre_ucenter_members VALUES ('631',0x424a2d484843,0x3832656536353662623630363563343964326236356565303135316130646537,0x313138353635393735384071712e636f6d,'','',0x3131382e3132332e31362e35,'1411372561','0','0',0x313938343239,'');
INSERT INTO pre_ucenter_members VALUES ('632',0x43442d5a4c,0x3138623063653335386236316233306361346539663930623230623732373735,0x3631363232363535314071712e636f6d,'','',0x3131382e3132332e31362e35,'1411378953','0','0',0x393364393665,'');
INSERT INTO pre_ucenter_members VALUES ('633',0x424a2d5a5359,0x3665373162326232353338363437333165623838366262383735383333323136,0x3931313830313635384071712e636f6d,'','',0x3131382e3132332e31362e35,'1411458229','0','0',0x356632633635,'');
INSERT INTO pre_ucenter_members VALUES ('634',0x726974617a786c,0x6330363133336461656234626230323266326632343263393839643363353236,0x3338323430373938344071712e636f6d,'','',0x36392e3137362e3133302e3634,'1411535258','0','0',0x616432616438,'');
INSERT INTO pre_ucenter_members VALUES ('635',0x57482d4c59,0x3635386535393034626466656434383434323039653632326433306462363632,0x3235313238333435324071712e636f6d,'','',0x3131382e3132332e31362e35,'1411542361','0','0',0x393465663964,'');
INSERT INTO pre_ucenter_members VALUES ('636',0x43442d5a59,0x6632613632383131633234393232626664633130313135336666393265623363,0x7a68795f6a61736d696e65403136332e636f6d,'','',0x3131382e3132332e31362e35,'1411542429','0','0',0x643236303065,'');
INSERT INTO pre_ucenter_members VALUES ('637',0x424a2d5a59,0x3934646161353665366331363136663033616262666632313931623037316630,0x3239353232333239384071712e636f6d,'','',0x3131382e3132332e31362e35,'1411543191','0','0',0x376634306530,'');
INSERT INTO pre_ucenter_members VALUES ('638',0x43442d5959,0x6364303965626662313066383933333637393364376335346564316432333132,0x3430353933333236364071712e636f6d,'','',0x3131382e3132332e31362e35,'1411629240','0','0',0x383337626430,'');
INSERT INTO pre_ucenter_members VALUES ('639',0x57482d4c46,0x3331396465383333393266303231356239346537386433636536633963633338,0x323437323038343337364071712e636f6d,'','',0x3131382e3132332e31362e35,'1411631000','0','0',0x383764313737,'');
INSERT INTO pre_ucenter_members VALUES ('640',0x57482d574a,0x6536343734636637616438353132616663336135393639306534343330316138,0x3430313136303238334071712e636f6d,'','',0x3131382e3132332e31362e35,'1411693596','0','0',0x643135363936,'');
INSERT INTO pre_ucenter_members VALUES ('641',0x43442d5a484a46,0x6633366166303536383833313536323363653338616362643138616264333065,0x3237333138333037314071712e636f6d,'','',0x3131382e3132332e31362e35,'1411696390','0','0',0x363661316138,'');
INSERT INTO pre_ucenter_members VALUES ('642',0x485a2d4652,0x3964353661396465643030633334323666343239643061393836353739373230,0x313337373030313634364071712e636f6d,'','',0x3131382e3132332e31362e35,'1411708308','0','0',0x343964313638,'');
INSERT INTO pre_ucenter_members VALUES ('643',0xe6b3a1e6b3a1,0x3963653631383365343163663437623836376630306435613935363833363064,0x313130323332303036384071712e636f6d,'','',0x3131392e35322e39362e323032,'1411708516','0','0',0x353031383461,'');
INSERT INTO pre_ucenter_members VALUES ('644',0x43442d4c5159,0x6530636139346366636164333161323938373637396132326264313064376638,0x3531333238323935324071712e636f6d,'','',0x3131382e3132332e31362e35,'1411708568','0','0',0x383938643038,'');
INSERT INTO pre_ucenter_members VALUES ('645',0x53482d4a5957,0x3333663663363530663963373130616661626133656139313362323531386433,0x3135303433353636324071712e636f6d,'','',0x3131382e3132332e31362e35,'1411717860','0','0',0x353034363630,'');
INSERT INTO pre_ucenter_members VALUES ('646',0x424a2d4c53,0x3833326232313634643561303039396235616435303165373563303431633161,0x3431303439353935394071712e636f6d,'','',0x3131382e3132332e31362e35,'1411726853','0','0',0x353166623765,'');
INSERT INTO pre_ucenter_members VALUES ('647',0x43616e636572e682a6,0x6337323239346336313634643466356561316161303333656637306630656234,0x3135323330363131333037403136332e636f6d,'','',0x3131312e32362e33302e3730,'1411814276','0','0',0x343833303538,'');
INSERT INTO pre_ucenter_members VALUES ('648',0x43442d5a42,0x3630386165303134633238333436633330623138613237393862323062643634,0x3834343134353738304071712e636f6d,'','',0x3131382e3132332e31362e35,'1411869858','0','0',0x333034633362,'');
INSERT INTO pre_ucenter_members VALUES ('649',0x617468656e616c6a68,0x3762636361393062663062316231646231306464326133303465356339306263,0x3530323530393834304071712e636f6d,'','',0x3231382e322e3131332e3939,'1411890077','0','0',0x643266343462,'');
INSERT INTO pre_ucenter_members VALUES ('650',0x686d79,0x3736373036643934656537326664363333656238656338363761363763636334,0x3436333433353839314071712e636f6d,'','',0x3132342e3131352e3137332e323238,'1412235757','0','0',0x643765376130,'');
INSERT INTO pre_ucenter_members VALUES ('651',0x7368696a696e677969,0x3932323639323636663838656131343134363731326130643062646636373130,0x7368696a696e6779694071712e636f6d,'','',0x3131312e3137352e35342e313430,'1412324307','0','0',0x333738666262,'');
INSERT INTO pre_ucenter_members VALUES ('652',0x57482d505951,0x3862323562363933323737376663336134333738393863376163326663323436,0x3635373834383233324071712e636f6d,'','',0x3131382e3132332e31362e35,'1412730275','0','0',0x336563386665,'');
INSERT INTO pre_ucenter_members VALUES ('653',0x57482d5a5352,0x3833306639356665346337633038383238363334326561653633323563653862,0x3238323434303332304071712e636f6d,'','',0x3131382e3132332e31362e35,'1412730436','0','0',0x343266653737,'');
INSERT INTO pre_ucenter_members VALUES ('654',0x57482d584c59,0x3132333865396236303034306131336335356338653936323437613233643830,0x3637333537303638374071712e636f6d,'','',0x3131382e3132332e31362e35,'1412730524','0','0',0x633437633033,'');
INSERT INTO pre_ucenter_members VALUES ('655',0x424a2d4a5454,0x3536633232616137366338626230666234376334646366396666363134666230,0x646f6e676d656977616e67313232354073696e612e636f6d,'','',0x3131382e3132332e31362e35,'1412735176','0','0',0x386331396135,'');
INSERT INTO pre_ucenter_members VALUES ('656',0x424a2d445948,0x3935353866656330613637613130666630366462383862396136633938376136,0x6479686c7a797a403136332e636f6d,'','',0x3131382e3132332e31362e35,'1412735859','0','0',0x336331633032,'');
INSERT INTO pre_ucenter_members VALUES ('657',0x57482d5a42,0x3562376564333533343137363133303561613736323533326162336130623430,0x323238363730313430314071712e636f6d,'','',0x3131382e3132332e31362e35,'1412737077','0','0',0x356365306663,'');
INSERT INTO pre_ucenter_members VALUES ('658',0xe6a999e5ad90e5be88e98692e79bae,0x3864313730643235383038383666613036303963353237393935386238623737,0x6a6f686e2e746f70403136332e636f6d,'','',0x31342e3130362e3136342e3139,'1412765519','0','0',0x663834666539,'');
INSERT INTO pre_ucenter_members VALUES ('659',0x7a68616e677368756f,0x6534656565616465366162383662613361363466616134373165363338366235,0x3737333538343531334071712e636f6d,'','',0x3131372e3135312e3131342e313038,'1412869747','0','0',0x336264383963,'');
INSERT INTO pre_ucenter_members VALUES ('660',0x43442d4a4c57,0x3065353934653537393830383866633266333862356135373630636632383661,0x3733373534383435354071712e636f6d,'','',0x3131382e3132332e31362e35,'1412919919','0','0',0x666565353039,'');
INSERT INTO pre_ucenter_members VALUES ('661',0x66656c69637371,0x3165356162353862613432336466323731353264626337366239396231323261,0x66656c69636974795f6368656e40686f746d61696c2e636f6d,'','',0x3138332e39352e3133352e313837,'1412931226','0','0',0x613235373832,'');
INSERT INTO pre_ucenter_members VALUES ('662',0x77616e67686f6e673236,0x3234323933616264646365343539653531313934313131623633336633393231,0x77616e67686f6e67313939334073696e612e636f6d,'','',0x3131382e3138312e3230362e323030,'1413017208','0','0',0x383233633365,'');
INSERT INTO pre_ucenter_members VALUES ('663',0x796978696e,0x3635336564663263666435383266663165356166626561653765633530393464,0x796978696e5f3340686f746d61696c2e636f6d,'','',0x38322e32362e3137392e3134,'1413150278','0','0',0x363239643262,'');
INSERT INTO pre_ucenter_members VALUES ('664',0x424a2d4a59,0x6663636630633336303331323833303261376437623465636330373861343336,0x6861696c796369656c6f403136332e636f6d,'','',0x3131382e3132332e31362e35,'1413172220','0','0',0x636261386461,'');
INSERT INTO pre_ucenter_members VALUES ('665',0x485a2d57444e,0x3334316334346664333238333037353032396135613363373063333665343139,0x3532393936383339384071712e636f6d,'','',0x3131382e3132332e31362e35,'1413172664','0','0',0x383332363766,'');
INSERT INTO pre_ucenter_members VALUES ('666',0x58412d5a5951,0x6234356234373030373965356364653962633363363337666366666462613439,0x3234353037393032314071712e636f6d,'','',0x3131382e3132332e31362e35,'1413179649','0','0',0x316333376332,'');
INSERT INTO pre_ucenter_members VALUES ('667',0x726567756c7573,0x3166636636663066353731646330363461393861653433613433313161326636,0x3238323530393937334071712e636f6d,'','',0x3131352e3230362e3134382e313438,'1413186606','0','0',0x653762383966,'');
INSERT INTO pre_ucenter_members VALUES ('668',0x57482d5a4d59,0x3330333561336434306631653766313164613462376261333531323364393062,0x3239353436333930304071712e636f6d,'','',0x3131382e3132332e31362e35,'1413252294','0','0',0x366237653037,'');
INSERT INTO pre_ucenter_members VALUES ('669',0x485a2d475959,0x3339633231303362663163643464653338616265376563393362396330383862,0x3430353932333835304071712e636f6d,'','',0x3131382e3132332e31362e35,'1413339490','0','0',0x323130646565,'');
INSERT INTO pre_ucenter_members VALUES ('670',0x424a2d545958,0x3237333939383437373961373134313736663733666531663539666337313366,0x3437343335383739314071712e636f6d,'','',0x3131382e3132332e31362e35,'1413339537','0','0',0x316261653132,'');
INSERT INTO pre_ucenter_members VALUES ('671',0x57482d4c5351,0x3131663962303066613239636330646362653834386233383236383737653063,0x3332373235383834324071712e636f6d,'','',0x3131382e3132332e31362e35,'1413358600','0','0',0x386134666639,'');
INSERT INTO pre_ucenter_members VALUES ('672',0x43442d5a5952,0x3331393538343161666235376439616163336161366262323036336430646465,0x3336353537383632344071712e636f6d,'','',0x3131382e3132332e31362e35,'1413358645','0','0',0x356431376631,'');
INSERT INTO pre_ucenter_members VALUES ('673',0x43442d5a4d5a,0x6638663561623536346263376363343636626266363530633466316338343333,0x3236393936353738394071712e636f6d,'','',0x3131382e3132332e31362e35,'1413363456','0','0',0x303238643537,'');
INSERT INTO pre_ucenter_members VALUES ('674',0x43442d4c59,0x3065643164616237383933313763633636323338343930363163353061333730,0x7061756c74616e67636e40676d61696c2e636f6d,'','',0x3131382e3132332e31362e35,'1413364475','0','0',0x623061613463,'');
INSERT INTO pre_ucenter_members VALUES ('675',0x53482d524a58,0x3333363363333066396136373037346439363330656563336432376639396663,0x636f6c7061696e7465724071712e636f6d,'','',0x3131382e3132332e31362e35,'1413425937','0','0',0x316235363139,'');
INSERT INTO pre_ucenter_members VALUES ('676',0x43442d434457,0x6530366162353235306432353534333536363534623033623865643566363761,0x3333343535353631314071712e636f6d,'','',0x3131382e3132332e31362e35,'1413439785','0','0',0x393537633766,'');
INSERT INTO pre_ucenter_members VALUES ('677',0x424a2d434a57,0x3563373133353666353665326131333334626262633266646538316364313430,0x3234343630323031324071712e636f6d,'','',0x3131382e3132332e31362e35,'1413508641','0','0',0x316234383434,'');
INSERT INTO pre_ucenter_members VALUES ('678',0x57482d4c5151,0x6635663661356338623636323064353739623736313366316335313461326233,0x3538333135343030354071712e636f6d,'','',0x3131382e3132332e31362e35,'1413514571','0','0',0x626237306138,'');
INSERT INTO pre_ucenter_members VALUES ('679',0x424a2d5957,0x3930393963363738646466666635336532353165353933396339353831626663,0x79616e6777656e303733314071712e636f6d,'','',0x3131382e3132332e31362e35,'1413529815','0','0',0x376230663265,'');
INSERT INTO pre_ucenter_members VALUES ('680',0x4b61796c61,0x6661383864653663623363343439396561353461633530393664346338313962,0x313734393035323535364071712e636f6d,'','',0x3232322e3231312e3132332e313739,'1413532402','0','0',0x323139386633,'');
INSERT INTO pre_ucenter_members VALUES ('681',0x53482d51424c,0x6165343736633166613632353862326661636262383339633962366565366534,0x313036333938363539324071712e636f6d,'','',0x3131382e3132332e31362e35,'1413773775','0','0',0x663833323739,'');
INSERT INTO pre_ucenter_members VALUES ('682',0x53482d485144,0x3632363432383337383231306537636137303961373566653964666132326165,0x3739333230343834364071712e636f6d,'','',0x3131382e3132332e31362e35,'1413776645','0','0',0x353939613933,'');
INSERT INTO pre_ucenter_members VALUES ('683',0x57482d4458,0x3336363838623536663431623833303431356531316234656437643935653132,0x3633323330333737314071712e636f6d,'','',0x3131382e3132332e31362e35,'1413777035','0','0',0x623332633536,'');
INSERT INTO pre_ucenter_members VALUES ('684',0x424a2d4c4a58,0x6566343231633939333239366230363833353634623332633033343465316461,0x3331353731343833374071712e636f6d,'','',0x3131382e3132332e31362e35,'1413956198','0','0',0x363334626335,'');
INSERT INTO pre_ucenter_members VALUES ('685',0x424a2d4759,0x3039313765653432306235633762643461613465336262363837363165396633,0x63616e647975616e403136332e636f6d,'','',0x3131382e3132332e31362e35,'1413966093','0','0',0x646336666335,'');
INSERT INTO pre_ucenter_members VALUES ('686',0x485a2d435158,0x6630393061363933306439386366323438383932353364623533383765646164,0x3839353235393136344071712e636f6d,'','',0x3131382e3132332e31362e35,'1414378585','0','0',0x396563376538,'');
INSERT INTO pre_ucenter_members VALUES ('687',0x485a2d575359,0x3131613363633630613763356264373435633132646365376666663730613166,0x323339333737353434334071712e636f6d,'','',0x3131382e3132332e31362e35,'1414378633','0','0',0x393236343961,'');
INSERT INTO pre_ucenter_members VALUES ('688',0x4344452d5a4c4d,0x3939666663363433626331383831333662363865376262323761653265646334,0x3338363433343830354071712e636f6d,'','',0x3131382e3132332e31362e35,'1414382210','0','0',0x323062386536,'');
INSERT INTO pre_ucenter_members VALUES ('689',0x43442d5a4c4d,0x3239663337383962646539366335383430613538663061616666313436386438,0x33383634333438303540712e636f6d,'','',0x3131382e3132332e31362e35,'1414382390','0','0',0x366565303366,'');
INSERT INTO pre_ucenter_members VALUES ('690',0x58412d4c54,0x3731643936386561323165623366643935326637666139613164323663336435,0x3731393833303534324071712e636f6d,'','',0x3131382e3132332e31362e35,'1414459140','0','0',0x353034383735,'');
INSERT INTO pre_ucenter_members VALUES ('691',0x53482d5743,0x6339336266366438613962333061343933363361393065323165626431646166,0x3239363639383537374071712e636f6d,'','',0x3131382e3132332e31362e35,'1414465260','0','0',0x633334343561,'');
INSERT INTO pre_ucenter_members VALUES ('692',0x7869616f7979343431,0x3263636663343932633965653564376330313739663161633737323162613530,0x3631353333383135354071712e636f6d,'','',0x3138332e3234362e32342e313039,'1414484316','0','0',0x633332323930,'');
INSERT INTO pre_ucenter_members VALUES ('693',0x53482d4c59,0x3462393864623062313832653938386361623431633366656432666635333339,0x6361726c6f736c6579616e673838407961686f6f2e636f6d2e6172,'','',0x3131382e3132332e31362e35,'1414547804','0','0',0x633837316436,'');
INSERT INTO pre_ucenter_members VALUES ('694',0x57482d4852,0x3738656631613335633837383233326466653230653133353964376666353131,0x3233373937353138354071712e636f6d,'','',0x3131382e3132332e31362e35,'1414553086','0','0',0x653036613239,'');
INSERT INTO pre_ucenter_members VALUES ('695',0x57482d5a4859,0x3037393031313163656538316238376237383165633637393237633434333836,0x3430323934303937314071712e636f6d,'','',0x3131382e3132332e31362e35,'1414570599','0','0',0x373533363633,'');
INSERT INTO pre_ucenter_members VALUES ('696',0x58412d5a59,0x3863646432373135326531346530343166356536366237326236636663366539,0x34303239343039373140712e636f6d,'','',0x3131382e3132332e31362e35,'1414570728','0','0',0x383366306234,'');
INSERT INTO pre_ucenter_members VALUES ('697',0x4661697279,0x3265653533323530623334353433306665396139363035303531356531373439,0x66616e677275693431334073696e612e636f6d,'','',0x3132342e36382e332e3330,'1414595005','0','0',0x643534363933,'');
INSERT INTO pre_ucenter_members VALUES ('698',0x53482d4c4c59,0x6162666131306436303134373832376562366132646165633261383364653062,0x313030373736383135364071712e636f6d,'','',0x3131382e3132332e31362e35,'1414658816','0','0',0x306334636161,'');
INSERT INTO pre_ucenter_members VALUES ('699',0x43442d575848,0x3333613363633939633136636631343265396566326138356337396430363133,0x736468614071712e636f6d,'','',0x3131382e3132332e31362e35,'1414724235','0','0',0x623864386262,'');
INSERT INTO pre_ucenter_members VALUES ('700',0x43442d535159,0x3663303332316138653634396539613335333263353536393039666535616538,0x323534343934323837394071712e636f6d,'','',0x3131382e3132332e31362e35,'1414736371','0','0',0x343030303162,'');
INSERT INTO pre_ucenter_members VALUES ('701',0x424a2d43584c,0x6565653630393333623435386432656638343330396164333231666334303438,0x3733343330333137314071712e636f6d,'','',0x3131382e3132332e31362e35,'1414736930','0','0',0x323563303565,'');
INSERT INTO pre_ucenter_members VALUES ('702',0x52656f72616e6765,0x3539646264313333396230636461306362643461353236653532613337336230,0x3339373535373039364071712e636f6d,'','',0x3232322e37392e3130322e313836,'1414761543','0','0',0x376539653064,'');
INSERT INTO pre_ucenter_members VALUES ('703',0x6461363439383635323739,0x3864366539323863366335396631316535643265636535303864363662376563,0x3634393836353237394071712e636f6d,'','',0x35382e32302e35302e313731,'1414903648','0','0',0x303733396333,'');
INSERT INTO pre_ucenter_members VALUES ('704',0x58412d4358,0x3566323466376332383233633330343466326363323736333230353761373735,0x35313531353032354071712e636f6d,'','',0x3131382e3132332e31362e35,'1414982262','0','0',0x363537656333,'');
INSERT INTO pre_ucenter_members VALUES ('705',0x43442d5359,0x3163343038353731326335663935373464396563303062376432623735643562,0x3335393831383235374071712e636f6d,'','',0x3131382e3132332e31362e35,'1414986370','0','0',0x323563346333,'');
INSERT INTO pre_ucenter_members VALUES ('706',0x43442d5758,0x3938356230303063633635396564626566316639653438636561323936363661,0x323330323636333633334071712e636f6d,'','',0x3131382e3132332e31362e35,'1414987454','0','0',0x663136306664,'');
INSERT INTO pre_ucenter_members VALUES ('707',0x43442d57594e,0x6264636430323838666131363438613165623434626237323331333338663630,0x3533343131323233354071712e636f6d,'','',0x3131382e3132332e31362e35,'1414990798','0','0',0x653035363433,'');
INSERT INTO pre_ucenter_members VALUES ('708',0x53482d434a,0x6438356434386532306665393566616261383530353835613835303064643037,0x67656f7267652e6368656e406f75746c6f6f6b2e636f6d,'','',0x3131382e3132332e31362e35,'1415007040','0','0',0x306333643830,'');
INSERT INTO pre_ucenter_members VALUES ('709',0x424a2d534c,0x3137326465346562336136376335303062666566343731313238326133636661,0x3833343436343739314071712e636f6d,'','',0x3131382e3132332e31362e35,'1415007753','0','0',0x393361643834,'');
INSERT INTO pre_ucenter_members VALUES ('710',0xe994a6e7919fe585ace4b8bb,0x3137646465626135316530373362333666376165303430643131383736306438,0x3439373231323337324071712e636f6d,'','',0x35392e34362e3137322e323238,'1415013492','0','0',0x343165373539,'');
INSERT INTO pre_ucenter_members VALUES ('711',0x4d616e6479e685a2e685a2e7ad89,0x6662313034346632636264636432386136323930306362376366383961386264,0x313131353434383732324071712e636f6d,'','',0x3138302e3131372e3136362e313634,'1415157698','0','0',0x323362613063,'');
INSERT INTO pre_ucenter_members VALUES ('712',0x58412d5343,0x3336386336633734333163316261376630646562636365623731356432316133,0x3537333237373539304071712e636f6d,'','',0x3131382e3132332e31362e35,'1415167426','0','0',0x323563633362,'');
INSERT INTO pre_ucenter_members VALUES ('713',0x57482d5a4a,0x3935633430663138353636653662313230653636343738623133393665363739,0x3238343030343731324071712e636f6d,'','',0x3131382e3132332e31362e35,'1415245865','0','0',0x396131363135,'');
INSERT INTO pre_ucenter_members VALUES ('714',0x6261626573737373746f6e6579,0x3762623539663162373862666665623438653064313365303766343934323734,0x3237313034363330354071712e636f6d,'','',0x3232322e3139302e3131322e323330,'1415272277','0','0',0x363031646430,'');
INSERT INTO pre_ucenter_members VALUES ('715',0xe586ace5ada3e698a5e98692,0x3430356333653164393239663032313433386261393761633265373937306137,0x313638353337373432334071712e636f6d,'','',0x3131322e38342e3133302e313736,'1415352659','0','0',0x343032333530,'');
INSERT INTO pre_ucenter_members VALUES ('716',0x58412d4c594c,0x3061306466643239663034636661303861303236376230646663363462306361,0x313236303432343336314071712e636f6d,'','',0x3131382e3132332e31362e35,'1415370071','0','0',0x373633363864,'');
INSERT INTO pre_ucenter_members VALUES ('717',0x58412d475a4a,0x6466636566343637396530353430666466343133653937663564313866646133,0x3635323639323735374071712e636f6d,'','',0x3131382e3132332e31362e35,'1415370140','0','0',0x633863336365,'');
INSERT INTO pre_ucenter_members VALUES ('718',0x686561746865726368656e31393835,0x6463616465643231633563326233376662633534383038343333356264353132,0x686561746865726368656e403132362e636f6d,'','',0x3131322e3232342e31372e3834,'1415442754','0','0',0x323064363338,'');
INSERT INTO pre_ucenter_members VALUES ('719',0x57482d4c43,0x3638396334353034656466623862313937316638343862393933303433313165,0x323530363438373139344071712e636f6d,'','',0x3131382e3132332e31362e35,'1415585705','0','0',0x393230636235,'');
INSERT INTO pre_ucenter_members VALUES ('720',0x57482d474858,0x3235373863383863623663363138343436363866666364653232306230653439,0x31373335313132374071712e636f6d,'','',0x3131382e3132332e31362e35,'1415585766','0','0',0x363565313265,'');
INSERT INTO pre_ucenter_members VALUES ('721',0x57482d5046,0x6532653534393563323162303162663735316331633937663834323238383432,0x3336343033353234384071712e636f6d,'','',0x3131382e3132332e31362e35,'1415591990','0','0',0x366632323130,'');
INSERT INTO pre_ucenter_members VALUES ('722',0x424a2d5a4a59,0x3331326564393331363966376239356361303138343633396436626337656232,0x7a68756a696179756e31303231403136332e636f6d,'','',0x3131382e3132332e31362e35,'1415597921','0','0',0x313730653133,'');
INSERT INTO pre_ucenter_members VALUES ('723',0x43442d5a5359,0x3966633538396137346535343933383961313330363539663636666665356338,0x313533313133363834304071712e636f6d,'','',0x3131382e3132332e31362e35,'1415610263','0','0',0x383030363765,'');
INSERT INTO pre_ucenter_members VALUES ('724',0x424a2d4c58,0x3239316432616161666332393338663335396332333034613132333533373765,0x6c656e65782e78696e40676d61696c2e636f6d,'','',0x3131382e3132332e31362e35,'1415668983','0','0',0x373163303631,'');
INSERT INTO pre_ucenter_members VALUES ('725',0x424a2d484c52,0x3662323566653133306439633631623866326232316662373565396463306331,0x323530393132373833374071712e636f6d,'','',0x3131382e3132332e31362e35,'1415670295','0','0',0x373633646439,'');
INSERT INTO pre_ucenter_members VALUES ('726',0x57482d4c4c,0x3964643135353837353737323838663937643632653139396636643763333164,0x3334343435393133384071712e636f6d,'','',0x3131382e3132332e31362e35,'1415695588','0','0',0x346566663431,'');
INSERT INTO pre_ucenter_members VALUES ('727',0x424a2d53594a,0x3835323030643535333962303531383433386632656439356239383162326433,0x3530323234363230354071712e636f6d,'','',0x3131382e3132332e31362e35,'1415755932','0','0',0x633931653636,'');
INSERT INTO pre_ucenter_members VALUES ('728',0x57482d4c5347,0x3561373639613635663830656338653438626663663334336662303064643264,0x3434393832323035344071712e636f6d,'','',0x3131382e3132332e31362e35,'1415784930','0','0',0x323166353539,'');
INSERT INTO pre_ucenter_members VALUES ('729',0x57482d4851,0x6463346331663437663661313930313662326665386132303931636334623433,0x3730373038323832374071712e636f6d,'','',0x3131382e3132332e31362e35,'1415784985','0','0',0x393730343065,'');
INSERT INTO pre_ucenter_members VALUES ('730',0x57482d4c5959,0x3732303036346638303939353732306638663833363033663230303034646661,0x3836343630363738314071712e636f6d,'','',0x3131382e3132332e31362e35,'1415955467','0','0',0x626533623630,'');
INSERT INTO pre_ucenter_members VALUES ('731',0x74616e677368693d3d,0x6364643733626364306461646562316136396438643365623231636163383333,0x74737a3131624071712e636f6d,'','',0x3130312e39342e3132382e313731,'1416143380','0','0',0x343035633236,'');
INSERT INTO pre_ucenter_members VALUES ('732',0x53482d5a4a,0x6631616465653031663162343663306361303765646563663062303162313564,0x6d6f7169756c693039403136332e636f6d,'','',0x3131382e3132332e31362e35,'1416189079','0','0',0x373735656563,'');
INSERT INTO pre_ucenter_members VALUES ('733',0x53482d5453,0x6638616462626265666662323530343336356366393834636262613934356633,0x3538343333383337334071712e636f6d,'','',0x3131382e3132332e31362e35,'1416189122','0','0',0x326438356565,'');
INSERT INTO pre_ucenter_members VALUES ('734',0x7778393130373039,0x3733353638333836623266663036373636663538336463393366393533633935,0x34313232363232403136332e636f6d,'','',0x3131382e3131322e3135342e323331,'1416189865','0','0',0x393066633832,'');
INSERT INTO pre_ucenter_members VALUES ('735',0x424a2d59594c,0x3662353136653463386138643562633730626234336465373735633966313937,0x3338313631313432304071712e636f6d,'','',0x3131382e3132332e31362e35,'1416192341','0','0',0x353136303035,'');
INSERT INTO pre_ucenter_members VALUES ('736',0x57482d4c434a,0x3864616666643136656664393836326165336461633635663837636531373866,0x3634343230383239304071712e636f6d,'','',0x3131382e3132332e31362e35,'1416199495','0','0',0x373466356661,'');
INSERT INTO pre_ucenter_members VALUES ('737',0x43442d585948,0x3563396531323232313062653338666461313632393263396331316661343235,0x3339373936393832314071712e636f6d,'','',0x3131382e3132332e31362e35,'1416210821','0','0',0x353832353765,'');
INSERT INTO pre_ucenter_members VALUES ('738',0x485a2d5a594a,0x3434376236646337613764626535393839383930343034613065386534336362,0x313138313534333939364071712e636f6d,'','',0x3131382e3132332e31362e35,'1416216269','0','0',0x643263623166,'');
INSERT INTO pre_ucenter_members VALUES ('739',0x424a2d5a475a,0x6433316564386361643466376364656533373537333233663339373930653734,0x31373832363337374071712e636f6d,'','',0x3131382e3132332e31362e35,'1416380303','0','0',0x663936653066,'');
INSERT INTO pre_ucenter_members VALUES ('740',0x53482d53544c,0x3331653631363566616533633064393732376436613234623234313766623134,0x3238393538383737384071712e636f6d,'','',0x3131382e3132332e31362e35,'1416382168','0','0',0x386433643835,'');
INSERT INTO pre_ucenter_members VALUES ('741',0x636c656f383237,0x3832313861626561656138343835323238616435313464343761343763613664,0x636c656f383237406f75746c6f6f6b2e636f6d,'','',0x33392e36342e3230382e323332,'1416484912','0','0',0x303566346539,'');
INSERT INTO pre_ucenter_members VALUES ('742',0x57482d5a4c53,0x6565303262323538333366626236333332393137386331363365313936613132,0x3338333730334071712e636f6d,'','',0x3131382e3132332e31362e35,'1416799769','0','0',0x393261343037,'');
INSERT INTO pre_ucenter_members VALUES ('743',0x58412d575944,0x3835643062353039343436376539316435633138393033326435343830353563,0x3437383034383637354071712e636f6d,'','',0x3131382e3132332e31362e35,'1416819686','0','0',0x363630383764,'');
INSERT INTO pre_ucenter_members VALUES ('744',0x63686977617761,0x3839386566633262353936636239353538393635633765333432313165363239,0x323839373331303936374071712e636f6d,'','',0x3131372e33362e392e313336,'1416821740','0','0',0x633964356562,'');
INSERT INTO pre_ucenter_members VALUES ('745',0x526567696e6133333636,0x6436623365636139613163303833383734616538643839346562383162313164,0x77752e726567696e612e39323840676d61696c2e636f6d,'','',0x36392e33392e3139332e3633,'1416871949','0','0',0x646632353663,'');
INSERT INTO pre_ucenter_members VALUES ('746',0x53482d53475a58,0x3331643635306637376631333263386631333866373134303331396563313261,0x726974617368616e676775616e403132362e636f6d,'','',0x3131382e3132332e31362e35,'1416896031','0','0',0x663433613238,'');
INSERT INTO pre_ucenter_members VALUES ('747',0x485a2d595859,0x3430346630313934643636383035376263646634303963663031346139373536,0x3338373935383233354071712e636f6d,'','',0x3131382e3132332e31362e35,'1416896083','0','0',0x333164633065,'');
INSERT INTO pre_ucenter_members VALUES ('748',0x43442d574a52,0x6433663534646332636261356534376138646366306238393730636636356462,0x3932393233343933334071712e636f6d,'','',0x3131382e3132332e31362e35,'1416909281','0','0',0x316238666665,'');
INSERT INTO pre_ucenter_members VALUES ('749',0x53482d544359,0x3233643365396633393935653266653233343332323132656166623333646434,0x313035393037343239324071712e636f6d,'','',0x3232322e3230392e3134382e3834,'1417405895','0','0',0x376264373932,'');
INSERT INTO pre_ucenter_members VALUES ('750',0x43442d4a5959,0x3464396230333466353261643963313538366266393163633435316133366163,0x3234303439373937344071712e636f6d,'','',0x3138322e3134392e3139312e323131,'1417414013','0','0',0x646439633930,'');
INSERT INTO pre_ucenter_members VALUES ('751',0x485a2d434a,0x6533346539356466343964333239323538653835663339616466326436613965,0x3239313938353833304071712e636f6d,'','',0x3232322e3231312e3131372e313036,'1417491990','0','0',0x363862616161,'');
INSERT INTO pre_ucenter_members VALUES ('752',0x6a66723139393130343239,0x3135626537646161363065353535633239353636396234653330656630323061,0x6a66723139393130343239403136332e636f6d,'','',0x3138322e3134382e32362e3235,'1417498514','0','0',0x323532323432,'');
INSERT INTO pre_ucenter_members VALUES ('753',0x57482d594359,0x3537356530633665663334633734356565333038656231616331646234316333,0x3236393933393137354071712e636f6d,'','',0x3132352e37302e3230352e313731,'1417598134','0','0',0x363465376434,'');
INSERT INTO pre_ucenter_members VALUES ('754',0x43442d51594a,0x3330633132326263653638636562396232623262346635306534393261333439,0x3237393532313436324071712e636f6d,'','',0x3132352e37302e3230352e313731,'1417598159','0','0',0x663639643134,'');
INSERT INTO pre_ucenter_members VALUES ('755',0x7275696a69657a68656e67,0x3732363036326433303564353033643834653330616235353133363134613730,0x35323035323065696c65656e403136332e636f6d,'','',0x3231392e3134322e3132322e313338,'1417675969','0','0',0x313964366330,'');
INSERT INTO pre_ucenter_members VALUES ('756',0x4465616e6965,0x3563653739633865613836396638323936386332376336346665663964386465,0x313031303432363237314071712e636f6d,'','',0x3137352e3135322e33302e3633,'1417781835','0','0',0x623532303265,'');
INSERT INTO pre_ucenter_members VALUES ('757',0x7278313430383330,0x3637616138376464343435643134366264363236633462656335356535373634,0x636d7431393933303833302e636f6d4073696e612e636f6d,'','',0x3232322e32302e34352e323036,'1417890127','0','0',0x663266656137,'');
INSERT INTO pre_ucenter_members VALUES ('758',0x53482d5a5848,0x3139633461643731336530613433376664616435646532303961663366383863,0x64616e69656c7a68616e6731333138403136332e636f6d,'','',0x3132352e37302e3230352e313731,'1418002112','0','0',0x306461616661,'');
INSERT INTO pre_ucenter_members VALUES ('759',0x57482d5a4a48,0x3536326638633830313131306633346263383263666162353936323835643035,0x3238343838393536334071712e636f6d,'','',0x3132352e36392e372e323437,'1418003811','0','0',0x336139613535,'');
INSERT INTO pre_ucenter_members VALUES ('760',0x57482d535459,0x3865343733386335376665396233643666363435643864393230643631363838,0x3630393031353235384071712e636f6d,'','',0x3132352e36392e372e323437,'1418003867','0','0',0x623335376234,'');
INSERT INTO pre_ucenter_members VALUES ('761',0x57482d5a4857,0x6137363735356536373233393065643830323365343562636666343533363039,0x313039323136313837334071712e636f6d,'','',0x3132352e36392e372e323437,'1418018525','0','0',0x646339383733,'');
INSERT INTO pre_ucenter_members VALUES ('762',0x53482d575953,0x6661646563386362616539656564336633326139393061393864356630373735,0x797573692e77616e67406669727374646174612e636e,'','',0x3132352e36392e372e323437,'1418018658','0','0',0x323536353238,'');
INSERT INTO pre_ucenter_members VALUES ('763',0x57482d4c5955,0x3861666163316238666234343363373530633666303533343061643565363965,0x313034313632313731304071712e636f6d,'','',0x3132352e36392e372e323437,'1418018826','0','0',0x613336653438,'');
INSERT INTO pre_ucenter_members VALUES ('764',0x43442d5a4351,0x3232613332653737333230363163656437623732323561373364366662633439,0x313133383332383032334071712e636f6d,'','',0x3132352e36392e372e323437,'1418028479','0','0',0x666138386336,'');
INSERT INTO pre_ucenter_members VALUES ('765',0x485a2d595742,0x3630633036313938356636343639333665393432333730333633373065663436,0x31373134373930394071712e636f6d,'','',0x3132352e36392e372e323437,'1418087975','0','0',0x373165303937,'');
INSERT INTO pre_ucenter_members VALUES ('766',0x53482d585359,0x3235363066363764343336323834333637356230663638393664353237323361,0x313834343439343531334071712e636f6d,'','',0x3132352e37302e3230352e313731,'1418104098','0','0',0x323866636139,'');
INSERT INTO pre_ucenter_members VALUES ('767',0x58412d4c5359,0x6364363934633036326663376134646230336434353634303538386562626665,0x3537333337393531374071712e636f6d,'','',0x3132352e36392e372e323437,'1418196171','0','0',0x623961656330,'');
INSERT INTO pre_ucenter_members VALUES ('768',0x485a2d595748,0x3066303730386162373634613933323037636333666432396633656163333463,0x3736313033363839314071712e636f6d,'','',0x3138322e3134382e32382e313231,'1418609832','0','0',0x383632613063,'');
INSERT INTO pre_ucenter_members VALUES ('769',0x57482d4c54,0x6130376362623762313465623831626237656130653435656230653865373734,0x3837303238353938334071712e636f6d,'','',0x3138322e3134382e32382e313231,'1418612450','0','0',0x323163373636,'');
INSERT INTO pre_ucenter_members VALUES ('770',0x77682d7a6c79,0x3136616364616633326564393561303936353566396565353135376434323838,0x313035313630333836334071712e636f6d,'','',0x3138322e3134382e32382e313231,'1418612521','0','0',0x393134343366,'');
INSERT INTO pre_ucenter_members VALUES ('771',0x57482d5a584d,0x6336373865326634346237313134303965316233393432303636386137643932,0x3835333838353032324071712e636f6d,'','',0x3138322e3134382e32382e313231,'1418612597','0','0',0x353233653036,'');
INSERT INTO pre_ucenter_members VALUES ('772',0x43442d5a48,0x3635643233336330643765653165333664613434636465346464663164616138,0x3135343930333733374071712e636f6d,'','',0x3138322e3134382e32382e313231,'1418622089','0','0',0x393737313862,'');
INSERT INTO pre_ucenter_members VALUES ('773',0x43442d545944,0x6539393736343530373665663962353437343534373536646432326635656338,0x3935333431373033374071712e636f6d,'','',0x3138322e3134382e32382e313231,'1418622162','0','0',0x326563313632,'');
INSERT INTO pre_ucenter_members VALUES ('774',0x58412d4c5942,0x3061363139373263393232346266343933373936623233353033373534343233,0x323534393031343737384071712e636f6d,'','',0x3232322e3231312e3132312e38,'1418622860','0','0',0x633762346536,'');
INSERT INTO pre_ucenter_members VALUES ('775',0x43442d594859,0x3735316230373635303237353437313339303264633033373933653335653536,0x3332383533383339304071712e636f6d,'','',0x3138322e3133392e36352e3739,'1418636606','0','0',0x653164313333,'');
INSERT INTO pre_ucenter_members VALUES ('776',0x57482d5a4c4a,0x3066366334366539313131343630386662633436353730646433396639346131,0x313733383635363338344071712e636f6d,'','',0x3138322e3133392e36352e3739,'1418710393','0','0',0x396462663735,'');
INSERT INTO pre_ucenter_members VALUES ('777',0x57482d58554a,0x6332313934643535356364383637323961343434326136306133373739386465,0x36313737343439314071712e636f6d,'','',0x3137312e3232312e39392e3231,'1418783232','0','0',0x303339663737,'');
INSERT INTO pre_ucenter_members VALUES ('778',0x57482d575353,0x6337393332616464656664643032636338306130386633326432633530623035,0x7368616e7368616e7368616e73406d652e636f6d,'','',0x3137312e3232312e39392e3231,'1418783305','0','0',0x396335373039,'');
INSERT INTO pre_ucenter_members VALUES ('779',0x485a2d4c43,0x6535613464366239656365616333663836643662356338353163303335336533,0x6c756368656e30373031406f75746c6f6f6b2e636f6d,'','',0x3137312e3232312e39392e3231,'1418956784','0','0',0x306537396630,'');
INSERT INTO pre_ucenter_members VALUES ('780',0x31393933343834363638,0x6361303137616439383966323131323131613361633630323237363932386662,0x313939333438343636384071712e636f6d,'','',0x3130362e33392e3235352e323132,'1419013049','0','0',0x393565383563,'');
INSERT INTO pre_ucenter_members VALUES ('781',0x57482d5a484d59,0x6637303830353934633033353239633734303436313131373365613733343231,0x33353930373031394071712e636f6d,'','',0x3137312e3232312e39392e3231,'1419038322','0','0',0x323838643536,'');
INSERT INTO pre_ucenter_members VALUES ('782',0x6875746572303038,0x3632353538356434636538666639316537376335303034333331383036626434,0x3939373433393939374071712e636f6d,'','',0x35382e34392e31332e313635,'1419072303','0','0',0x663937353636,'');
INSERT INTO pre_ucenter_members VALUES ('783',0x53482d5758,0x3761373936646165363366393166353664653265646361323164306639323336,0x313430333033393731394071712e636f6d,'','',0x3137312e3232312e39392e3231,'1419211136','0','0',0x303162643465,'');
INSERT INTO pre_ucenter_members VALUES ('784',0x53482d57594e,0x3336383064316164326132643765356463653132646262363165643738393534,0x3233373637363731374071712e636f6d,'','',0x3137312e3232312e39392e3231,'1419214409','0','0',0x393135373663,'');
INSERT INTO pre_ucenter_members VALUES ('785',0x485a2d6d7968,0x6635636164323936323534386664396137623365306434653663363036633637,0x38343331383338304071712e636f6d,'','',0x3137312e3232312e39392e3130,'1419234294','0','0',0x363162613862,'');
INSERT INTO pre_ucenter_members VALUES ('786',0x424a2d424245,0x3834653666336232623463333764343661383530313739643463303432646362,0x626169626569657240686f746d61696c2e636f6d,'','',0x3231382e38382e34362e313734,'1419401240','0','0',0x383065353435,'');
INSERT INTO pre_ucenter_members VALUES ('787',0x485a2d424a58,0x3566363165653330636538633362333162363539633237653430356131303262,0x63687269736d7a6e403132362e636f6d,'','',0x3232312e3233372e3134392e323438,'1419408005','0','0',0x353931663139,'');
INSERT INTO pre_ucenter_members VALUES ('788',0x485a2d4c5351,0x6534326564633638353262313466636562383933333131656363386633646530,0x3430333734333539334071712e636f6d,'','',0x3232312e3233372e3134392e323438,'1419408160','0','0',0x303232343930,'');
INSERT INTO pre_ucenter_members VALUES ('789',0x53482d415348,0x3864653664666663653963346531343138343239656662303331353239666234,0x61697369686f6e67393140676d61696c2e636f6d,'','',0x3232312e3233372e3134392e323438,'1419815508','0','0',0x343137653232,'');
INSERT INTO pre_ucenter_members VALUES ('790',0x53482d5942,0x3565306137636539633562336130303632643564393163663965373332353033,0x3234343035373733344071712e636f6d,'','',0x3231382e38382e34362e313734,'1419834597','0','0',0x356162396433,'');
INSERT INTO pre_ucenter_members VALUES ('791',0x43442d4d534c,0x3862356466363932323938303066336438613334666233326238343463363933,0x3534333030383738324071712e636f6d,'','',0x3138322e3135312e3136362e323137,'1419904984','0','0',0x383737623732,'');
INSERT INTO pre_ucenter_members VALUES ('792',0x43442d434c4a,0x6565613234313639326635333764613138376265663039346366306431316134,0x313034313838393830374071712e636f6d,'','',0x3231382e38382e34352e3834,'1419905448','0','0',0x383332333238,'');
INSERT INTO pre_ucenter_members VALUES ('793',0x43442d5a5951,0x3533303066636437643630333431353037646234316264363439663065616233,0x3932353230303631384071712e636f6d,'','',0x3231382e38382e34352e3834,'1419905793','0','0',0x313734633432,'');
INSERT INTO pre_ucenter_members VALUES ('794',0x485a2d525a59,0x3664303564333736343163616538323466366633366236396137313035353065,0x3237323834303936374071712e636f6d,'','',0x3231382e38382e34352e3834,'1419908646','0','0',0x363266626566,'');
INSERT INTO pre_ucenter_members VALUES ('795',0x43442d474a57,0x3533353435373562376430633961383562643938383961633636356465356265,0x3532363236393131334071712e636f6d,'','',0x3231382e38382e34352e3834,'1419919886','0','0',0x653836373466,'');
INSERT INTO pre_ucenter_members VALUES ('796',0x485a2d4a4a54,0x3833623733353062343335346530633032376332396563643966333231356564,0x3834353738393032304071712e636f6d,'','',0x3232312e3233372e3135302e3232,'1419992109','0','0',0x643461636636,'');
INSERT INTO pre_ucenter_members VALUES ('797',0x485a2d4c59,0x3731376462623766656439646237663762353738393238663534636631663732,0x3339333135383539344071712e636f6d,'','',0x3232312e3233372e3135302e3232,'1420009497','0','0',0x393735373262,'');
INSERT INTO pre_ucenter_members VALUES ('798',0x43442d4c4a,0x6634653036306439663635333233616534643063323235646438623537323462,0x313232333734383637384071712e636f6d,'','',0x3232312e3233372e3135302e3232,'1420009549','0','0',0x643137333830,'');
INSERT INTO pre_ucenter_members VALUES ('799',0x4f6b696f,0x6666313336303863326465333261383466313835373337383637393233646165,0x7878353234304071712e636f6d,'','',0x34322e3135372e31312e3536,'1420126439','0','0',0x373731383435,'');
INSERT INTO pre_ucenter_members VALUES ('800',0x43442d5a484c,0x6333333838643266393336633333663061363432366664383131663930363661,0x3434383630333030304071712e636f6d,'','',0x3232312e3233372e3135302e3232,'1420166330','0','0',0x613939383537,'');
INSERT INTO pre_ucenter_members VALUES ('801',0x43442d574348,0x3839633962666664663465616234313639633833626162376535393338393234,0x3437383439383232354071712e636f6d,'','',0x3232312e3233372e34372e3135,'1420166793','0','0',0x393461323430,'');
INSERT INTO pre_ucenter_members VALUES ('802',0x424a2d535853,0x3231353839646333353039343738346663393961633561336435336237633731,0x3631393733373238374071712e636f6d,'','',0x3232312e3233372e34372e3135,'1420335646','0','0',0x656565633633,'');
INSERT INTO pre_ucenter_members VALUES ('803',0x57482d5a5748,0x3332633061373862356566393136333932353036643131386630343639306439,0x3633313638343030324071712e636f6d,'','',0x3232312e3233372e34372e3135,'1420337554','0','0',0x323064663562,'');
INSERT INTO pre_ucenter_members VALUES ('804',0x57482d574d44,0x3063613536653435666337623336623437373730626561323263323865643239,0x3337363238323236314071712e636f6d,'','',0x3232312e3233372e3135302e3232,'1420350843','0','0',0x626130326533,'');
INSERT INTO pre_ucenter_members VALUES ('805',0x57482d4c5859,0x3638386266663266623636323134303862373664373132343834313461326432,0x3932343138323537304071712e636f6d,'','',0x3232312e3233372e3135302e3232,'1420350929','0','0',0x316331323235,'');
INSERT INTO pre_ucenter_members VALUES ('806',0x57482d594a59,0x3362653662616535666433373038623961333834346161633766633665343266,0x3133363231313033394071712e636f6d,'','',0x3232312e3233372e34372e3135,'1420451049','0','0',0x393031373039,'');
INSERT INTO pre_ucenter_members VALUES ('807',0x57482d4c494e59,0x6266363137383035343831366464366435663437393536363065343934633437,0x3130353032343832324071712e636f6d,'','',0x3137312e3232312e372e3433,'1420522911','0','0',0x666233386435,'');
INSERT INTO pre_ucenter_members VALUES ('808',0x424a2d434a4c,0x6261376564633763323136326332623835663732666666323062353436376138,0x313232373537383839384071712e636f6d,'','',0x3137312e3232312e35312e323238,'1420702911','0','0',0x666361343835,'');
INSERT INTO pre_ucenter_members VALUES ('809',0x43442d4c5359,0x3939313638626534363665393031376636333165366262623539663632653264,0x3335393438303031394071712e636f6d,'','',0x3137312e3232312e35312e323238,'1420957996','0','0',0x633539636332,'');
INSERT INTO pre_ucenter_members VALUES ('810',0x424a2d525359,0x3765343330643462373132646130343661316164613061376337656565613435,0x313034393537363638394071712e636f6d,'','',0x3132352e37302e3230342e3635,'1421111820','0','0',0x633035326364,'');
INSERT INTO pre_ucenter_members VALUES ('811',0x424a2d5a5946,0x3238303264633739666132346533663839316439363030643332653262336136,0x313136323736333935374071712e636f6d,'','',0x3137312e3232312e352e313733,'1421198598','0','0',0x363063643363,'');
INSERT INTO pre_ucenter_members VALUES ('812',0x6c6a73353934303037,0x3163666432393439623336383266663630633563316666353231616239663531,0x6173647a7861734071712e636f6d,'','',0x32372e3139342e38352e3738,'1421240316','0','0',0x636335616464,'');
INSERT INTO pre_ucenter_members VALUES ('813',0x43442d4c594a,0x3963336566656131623662643333646630333636623866356166643136653937,0x3531363938313638304071712e636f6d,'','',0x3132352e37302e3230342e3635,'1421294091','0','0',0x623865393662,'');
INSERT INTO pre_ucenter_members VALUES ('814',0x485a2d574a,0x6161386666343333306164353733303063663365363336386535626135653464,0x77616e676a696e6739313031303540686f746d61696c2e636f6d,'','',0x3137312e3232312e352e313733,'1421390180','0','0',0x346364376665,'');
INSERT INTO pre_ucenter_members VALUES ('815',0x43442d515159,0x3637366238663931306435303732643034633339336133303235653035383836,0x313134373731393330364071712e636f6d,'','',0x3132352e37302e3230342e3830,'1421573466','0','0',0x613335643834,'');
INSERT INTO pre_ucenter_members VALUES ('816',0x58412d5a5859,0x6233626562306132653433356636346564363036396266346461623433336531,0x3539383636333538354071712e636f6d,'','',0x3132352e37302e3230342e3839,'1421635059','0','0',0x336339383630,'');
INSERT INTO pre_ucenter_members VALUES ('817',0x53482d4a5853,0x3235313335353132326430363664323832636537623139653031303139353762,0x3331323636383430314071712e636f6d,'','',0x3132352e37302e3230342e3830,'1421648633','0','0',0x393135663637,'');
INSERT INTO pre_ucenter_members VALUES ('818',0x57482d4a4859,0x6161363462626362346436333737306564643163303437303964383031663430,0x3734303833333037394071712e636f6d,'','',0x3132352e37302e3230342e3830,'1421742275','0','0',0x336335636531,'');
INSERT INTO pre_ucenter_members VALUES ('819',0x57482d4452,0x6534663735353161656562393334623564306365386439393233383162323437,0x3334363533363534324071712e636f6d,'','',0x3132352e37302e3230342e3839,'1421806891','0','0',0x626532656530,'');
INSERT INTO pre_ucenter_members VALUES ('820',0xe99bb7e593a5474d4154e59ca8e7babf,0x6236323530376232613433653737306333393437386166366164646231353732,0x6c696e64792e7a407468696e6b77697468752e636f6d,'','',0x35382e3234362e32342e323335,'1421807922','0','0',0x326530353233,'');
INSERT INTO pre_ucenter_members VALUES ('821',0x424a2d545a59,0x6534643264336262346132643135313833653865386362326238333462303065,0x3435333234363937394071712e636f6d,'','',0x3132352e37302e3230342e3830,'1421823440','0','0',0x303534343662,'');
INSERT INTO pre_ucenter_members VALUES ('822',0x636872697374696e6137383930,0x6334333935636331366434353736616539316338623963353036333961646234,0x323130393234303236324071712e636f6d,'','',0x35382e3234362e32342e323335,'1421912916','0','0',0x343434383836,'');
INSERT INTO pre_ucenter_members VALUES ('823',0x424a2d575958,0x6439343239366139366636343737346562366639353234643035343435623539,0x73757065725f746f617374403136332e636f6d,'','',0x3132352e37302e3230342e3839,'1421913163','0','0',0x623737316634,'');
INSERT INTO pre_ucenter_members VALUES ('824',0x424a2d4c4a59,0x6639633731626562383663333430363638383361313066356565333831393862,0x313031313734363636374071712e636f6d,'','',0x3132352e37302e3230372e313232,'1422155600','0','0',0x303466333562,'');
INSERT INTO pre_ucenter_members VALUES ('825',0x43442d4c4a59,0x3236396563303466393662656231363632343638653835323361636166666466,0x3435373437313032364071712e636f6d,'','',0x3132352e37302e3230372e313232,'1422238332','0','0',0x636562636138,'');
INSERT INTO pre_ucenter_members VALUES ('826',0x53482d4a4c52,0x3134636339303738616463316566393361363762633732626139316162643736,0x68656e72792e6a69616e67406c6976652e636e,'','',0x3232322e3230392e3135312e313230,'1422240417','0','0',0x313537363363,'');
INSERT INTO pre_ucenter_members VALUES ('827',0x57482d444a,0x3664363538646566346439386563366262633132363964613562633833363234,0x3837343433323035394071712e636f6d,'','',0x3132352e37302e3230372e313232,'1422329519','0','0',0x663737663937,'');
INSERT INTO pre_ucenter_members VALUES ('828',0x53482d57594a,0x3139373561396463663339616434316139336337633935363838303131386462,0x3339363937303735304071712e636f6d,'','',0x3132352e37302e3230372e313232,'1422334752','0','0',0x303964323332,'');
INSERT INTO pre_ucenter_members VALUES ('829',0x424a2d5a5a48,0x3038656663303865653863313236303732373934613864666561643037633163,0x3234333134383039364071712e636f6d,'','',0x3131302e3138342e3138302e3436,'1422344087','0','0',0x376238373261,'');
INSERT INTO pre_ucenter_members VALUES ('830',0x424a2d475948,0x6463343331356233663062396534356166353737373230636532666338653935,0x3238363934343730314071712e636f6d,'','',0x3131302e3138342e3138302e3436,'1422344132','0','0',0x343465616166,'');
INSERT INTO pre_ucenter_members VALUES ('831',0x57482d5a4a59,0x3735376362323233613461336237663433323238316234616331363530653665,0x3530323035343333334071712e636f6d,'','',0x3131302e3138342e3138302e3436,'1422511872','0','0',0x303333653663,'');
INSERT INTO pre_ucenter_members VALUES ('832',0x57482d4459,0x6265623766623235653264626238653536373234613638643832393833643734,0x3539313534333736314071712e636f6d,'','',0x3131302e3138342e3138302e3436,'1422511995','0','0',0x626564623432,'');
INSERT INTO pre_ucenter_members VALUES ('833',0x424a2d474a,0x3431613864643365363663346363656533333331663731613963343039333639,0x3730333233333031374071712e636f6d,'','',0x3131302e3138342e3138302e3436,'1422514712','0','0',0x383039366630,'');
INSERT INTO pre_ucenter_members VALUES ('834',0x424a2d5a5859,0x3234313764623164323636353935356536373438633465336263326332333134,0x6d6f6875616e6361694073696e612e636f6d,'','',0x3131302e3138342e3138302e3436,'1422524535','0','0',0x376232633537,'');
INSERT INTO pre_ucenter_members VALUES ('835',0x57482d484b,0x6134636662663531653966373736356333326337386534313830396535303930,0x3335393838323437314071712e636f6d,'','',0x3131302e3138342e3138302e323234,'1422596776','0','0',0x386437613034,'');
INSERT INTO pre_ucenter_members VALUES ('836',0xe99face99face99fac,0x3466313365326232626532363761366636396634653033313265666166666434,0x3237333030303931334071712e636f6d,'','',0x3130312e3235342e3230392e3233,'1422621392','0','0',0x303833666161,'');
INSERT INTO pre_ucenter_members VALUES ('837',0x53756f7a68616e67,0x6331653262323138386562653933656632346132303031653432626632393938,0x3239373037363338314071712e636f6d,'','',0x3131322e31322e332e3737,'1422668773','0','0',0x353039373465,'');
INSERT INTO pre_ucenter_members VALUES ('838',0x57482d484a48,0x6533636438623039333837643666386333343366393964353733316365656639,0x323533313832393335384071712e636f6d,'','',0x3137312e3232312e382e3436,'1422869075','0','0',0x336162333265,'');
INSERT INTO pre_ucenter_members VALUES ('839',0x485a2d435159,0x6661343062623036616363393539623638396531666139343764303439613462,0x313135393033343932334071712e636f6d,'','',0x3232322e3231312e3132372e323034,'1422952525','0','0',0x646430666434,'');
INSERT INTO pre_ucenter_members VALUES ('840',0x485a2d4c4a51,0x3264633938326630303837643365336234363562613238616366356230636435,0x323633313235313531394071712e636f6d,'','',0x3232322e3231312e3132372e323034,'1422952616','0','0',0x383834336165,'');
INSERT INTO pre_ucenter_members VALUES ('841',0x485a2d5458,0x3034303262633764643764636664333762333761633064323863346661383665,0x7473636736363636403132362e636f6d,'','',0x3232322e3231312e3132372e323034,'1422952673','0','0',0x313664373731,'');
INSERT INTO pre_ucenter_members VALUES ('842',0x526f6e6130363238,0x3737633432353631393264663734376431613034376266613264383638306165,0x3135393139323036313436403136332e636f6d,'','',0x3130312e37312e33382e3131,'1422961495','0','0',0x376566613834,'');
INSERT INTO pre_ucenter_members VALUES ('843',0x58412d51594b,0x3430343830363937366363666132393737353061383865306163323239303665,0x3737323433313731324071712e636f6d,'','',0x3137312e3232312e382e3436,'1423014700','0','0',0x633464663730,'');
INSERT INTO pre_ucenter_members VALUES ('844',0x58412d435957,0x6261303761343937363130656562626166336561393666373064343839646464,0x3730393936343436334071712e636f6d,'','',0x3137312e3232312e382e3436,'1423014764','0','0',0x636239633164,'');
INSERT INTO pre_ucenter_members VALUES ('845',0x485a2d585159,0x3135633566656636393863653630373933333831326566323566333832626237,0x313135393033343932324071712e636f6d,'','',0x3232322e3231312e3132372e323034,'1423020129','0','0',0x313538376265,'');
INSERT INTO pre_ucenter_members VALUES ('846',0x53482d5a54,0x6539313366613430633035356264343966333130636563656366653463313163,0x74696e615f7469616e7a68616e6740686f746d61696c2e636f6d,'','',0x3137312e3232312e382e3436,'1423031398','0','0',0x366132633239,'');
INSERT INTO pre_ucenter_members VALUES ('847',0x57482d5a485941,0x6565353833353662363835353836343965356163336336366236636130346161,0x3735323533343531364071712e636f6d,'','',0x3232322e3230392e3134382e313039,'1423204397','0','0',0x646264363866,'');
INSERT INTO pre_ucenter_members VALUES ('848',0x485a2d584652,0x6635313863656163663937623838333264646338633236653130633136326335,0x3533323539333832324071712e636f6d,'','',0x3232322e3230392e3134382e313039,'1423210691','0','0',0x333261613338,'');
INSERT INTO pre_ucenter_members VALUES ('849',0x506f6c6c795f79,0x3662343966323939363930393539346331613534613637316338363337383036,0x323439383038333832394071712e636f6d,'','',0x3231392e3134302e34392e3136,'1423266872','0','0',0x386239626262,'');
INSERT INTO pre_ucenter_members VALUES ('850',0x58412d5a5351,0x3530303633623332343439313938643734316461363732326238353836653261,0x3439333137383131394071712e636f6d,'','',0x3232322e3230392e3134382e313039,'1423531343','0','0',0x663232323832,'');
INSERT INTO pre_ucenter_members VALUES ('851',0x43442d544848,0x3436363637653333613365663036643630363863336635396266396663366536,0x313134383731383533364071712e636f6d,'','',0x3131302e3138382e34392e3334,'1423547376','0','0',0x306537633739,'');
INSERT INTO pre_ucenter_members VALUES ('852',0x7468696e6b75303037,0x3137383634336234366434316632613230376564366663303638323865643562,0x333138353331303433334071712e636f6d,'','',0x3131302e3138382e34392e3334,'1423558903','0','0',0x373839653939,'');
INSERT INTO pre_ucenter_members VALUES ('853',0x43442d48594c,0x6433393836386437393934333732303062613337623738303134636438376334,0x3330383934363034344071712e636f6d,'','',0x3232322e3230392e3134382e313039,'1423619299','0','0',0x333266396462,'');
INSERT INTO pre_ucenter_members VALUES ('854',0x6672616e6b,0x3731393731326433646233363139663539633330613565626161646636343065,0x6672616e6b2e68407468696e6b77697468752e636f6d,'','',0x35382e3234362e33302e323532,'1423703237','0','0',0x356133613436,'');
INSERT INTO pre_ucenter_members VALUES ('855',0x53482d5344,0x3334653037396636373366373333383333326536303130346133333863353662,0x3731353730333236374071712e636f6d,'','',0x3131302e3138382e34392e3334,'1423709483','0','0',0x623932643765,'');
INSERT INTO pre_ucenter_members VALUES ('856',0x79696b65,0x6531653965343262323033363139373865623830643162343037666138303038,0x6c616c617469616e6c69616e676c61403136332e636f6d,'','',0x35382e3234362e32342e323335,'1423731489','0','0',0x313636343830,'');
INSERT INTO pre_ucenter_members VALUES ('857',0x424a2d5a524e,0x3431326463613561623531353561313733313261303334363136366533393130,0x3436333033393539374071712e636f6d,'','',0x3131302e3138382e34392e3334,'1423790902','0','0',0x366439393331,'');
INSERT INTO pre_ucenter_members VALUES ('858',0x57482d5959,0x6531393162666364383331323264303235303965613930616638393132656464,0x3539323836373437334071712e636f6d,'','',0x3131302e3138382e34392e3334,'1423818559','0','0',0x666331646464,'');
INSERT INTO pre_ucenter_members VALUES ('859',0x746f6e676a6f6b65,0x3038646563613335326633616261393739393536393239383238343539356665,0x313035343335353831314071712e636f6d,'','',0x3231312e39362e3137302e313339,'1424495338','0','0',0x616133393665,'');
INSERT INTO pre_ucenter_members VALUES ('860',0x5468696e6b75416d616e6461,0x3036396532326431613265363730643433336132366536343339613834633834,0x616d616e6461407468696e6b77697468752e636f6d,'','',0x34322e3138342e3132332e323134,'1424832812','0','0',0x633836353934,'');
INSERT INTO pre_ucenter_members VALUES ('861',0x58412d5058,0x6431663734666566303230373538373733316339353637313132356366346365,0x3239343737363138324071712e636f6d,'','',0x3232322e3230392e3135312e313836,'1424832908','0','0',0x633737383862,'');
INSERT INTO pre_ucenter_members VALUES ('862',0xe781ade68e89474d4154,0x6238383534326138643734363532653033643739613066373833393631396237,0x7a6a71313233323030403136332e636f6d,'','',0x3232312e3231372e3132322e313436,'1424834810','0','0',0x613663636665,'');
INSERT INTO pre_ucenter_members VALUES ('863',0x424a2d47414f59,0x3637316632646330346633363566313731383533633039313538653862363239,0x3435323037373837364071712e636f6d,'','',0x3232322e3230392e3135312e313836,'1424851661','0','0',0x646161633462,'');
INSERT INTO pre_ucenter_members VALUES ('864',0x4d2e53656c696e61,0x6539306530373762656333636136666636306238663132666266643538666164,0x3637353430313837314071712e636f6d,'','',0x312e38322e3232352e3130,'1424922504','0','0',0x383537306663,'');
INSERT INTO pre_ucenter_members VALUES ('865',0x57482d464e58,0x6361316632663166643834303464626435393238323131633861336137386536,0x3733313036323834324071712e636f6d,'','',0x3132352e37302e3230362e323136,'1424943842','0','0',0x323935636339,'');
INSERT INTO pre_ucenter_members VALUES ('866',0x58412d4c4e58,0x6366393238653336353639353533323866663339633261643233343334363832,0x6c756f6e61697875616e4071712e636f6d,'','',0x3132352e37302e3230362e323136,'1425009057','0','0',0x313364333731,'');
INSERT INTO pre_ucenter_members VALUES ('867',0x57482d4d4c4e,0x3862366164336631343766386561326437356637653366383630616337656638,0x3939363535353934314071712e636f6d,'','',0x3232322e3230392e3135312e313836,'1425029712','0','0',0x303063346266,'');
INSERT INTO pre_ucenter_members VALUES ('868',0x776a776a776a313238,0x6639363637313966626536306139323539326264393161386466656135633164,0x776a776a776a313238403136332e636f6d,'','',0x3131372e37392e3233322e313630,'1425049159','0','0',0x376334326333,'');
INSERT INTO pre_ucenter_members VALUES ('869',0x58412d5a574a,0x3330326163363130616365666130616330343634363438336632323866333137,0x6a6f65796a69615f30323138403136332e636f6d,'','',0x3132352e37302e3230362e323136,'1425111689','0','0',0x396438626232,'');
INSERT INTO pre_ucenter_members VALUES ('870',0x43442d4c5943,0x6661626334343232383433316264393231643362393932636263363066393235,0x3536343636383135314071712e636f6d,'','',0x3132352e37302e3230362e323136,'1425113903','0','0',0x663237393633,'');
INSERT INTO pre_ucenter_members VALUES ('871',0x5468696e6b7550686f656265,0x6439646330303032323038316363666334663430613531383035336136623635,0x70686f6562652e66407468696e6b77697468752e636f6d,'','',0x35382e31392e37362e313238,'1425274938','0','0',0x613130306466,'');
INSERT INTO pre_ucenter_members VALUES ('872',0x485a2d5758,0x6432343437316337353063383535343334666561326263336235316135303937,0x6a6f792e77757869614069636c6f75642e636f6d,'','',0x3132352e37302e3230362e323136,'1425275163','0','0',0x626361346539,'');
INSERT INTO pre_ucenter_members VALUES ('873',0x485a2d5a53,0x6434643031306438636265336133623230383233393332653938313437363861,0x3339363032313630334071712e636f6d,'','',0x3132352e37302e3230362e323136,'1425275227','0','0',0x623762653838,'');
INSERT INTO pre_ucenter_members VALUES ('874',0x424a2d5a5742,0x3932653964653735643066386630656630323239653537336636353834323531,0x3337323530343837374071712e636f6d,'','',0x3132352e37302e3230362e323136,'1425275536','0','0',0x303464663338,'');
INSERT INTO pre_ucenter_members VALUES ('875',0x43442d584c,0x3331326163393061643632343064353337353034373933343339306438353161,0x313537373131383939384071712e636f6d,'','',0x3132352e37302e3230362e323136,'1425282691','0','0',0x333836353130,'');
INSERT INTO pre_ucenter_members VALUES ('876',0x424a2d57474c,0x3139393532663330623937343965316638633263333466336237303636316333,0x323533313938383837354071712e636f6d,'','',0x3232322e3230392e3134382e3136,'1425361082','0','0',0x616239373237,'');
INSERT INTO pre_ucenter_members VALUES ('877',0x485a2d5a5952,0x3532323237663662643030363162366462396363326138323863396265366433,0x3834343635393030374071712e636f6d,'','',0x3232322e3230392e3134382e3136,'1425361264','0','0',0x303036643233,'');
INSERT INTO pre_ucenter_members VALUES ('878',0x57482d4357,0x6538616565363963653666303066386461373061623632306632303139323433,0x3435323235393737334071712e636f6d,'','',0x3232312e3233372e3135312e3537,'1425449472','0','0',0x306535623537,'');
INSERT INTO pre_ucenter_members VALUES ('879',0x43442d575859,0x6537333764363866353265383731373466313434373035303836323465383766,0x3930373238343238334071712e636f6d,'','',0x3232322e3230392e3134382e3136,'1425449965','0','0',0x643063616234,'');
INSERT INTO pre_ucenter_members VALUES ('880',0x53482d435341,0x6531373133626634386666386338353737323438363130633332393261306639,0x3736313638353132384071712e636f6d,'','',0x3232312e3233372e3135312e3537,'1425450534','0','0',0x363337363537,'');
INSERT INTO pre_ucenter_members VALUES ('881',0x43442d5a4e58,0x3963636166393463393934313066353061633730353731363366646361353438,0x313037323434323135314071712e636f6d,'','',0x3232312e3233372e34352e313339,'1425537097','0','0',0x393462396438,'');
INSERT INTO pre_ucenter_members VALUES ('882',0x43442d5a485359,0x3639333035373639633766313830393263313931623966333336643430633861,0x3634393338323431344071712e636f6d,'','',0x3231382e38382e34352e37,'1425538135','0','0',0x373637326337,'');
INSERT INTO pre_ucenter_members VALUES ('883',0x636363636363,0x3531313565323636643237616564393163313763313833386463663562616630,0x7869616e676368756c61696c65403132362e636f6d,'','',0x35382e3234362e32342e323335,'1425548245','0','0',0x353431626538,'');
INSERT INTO pre_ucenter_members VALUES ('884',0x61616e6768647361,0x3864613162633564323661636261643832366132663435316433663061366531,0x34373734343634354071712e636f6d,'','',0x3131302e3137382e31312e3236,'1425566052','0','0',0x346266306336,'');
INSERT INTO pre_ucenter_members VALUES ('885',0x424a2d5959,0x3633353934633238336130356665343938353932393532376566373933323435,0x3337363930333733334071712e636f6d,'','',0x3232312e3233372e34352e313339,'1425627956','0','0',0x346336333732,'');
INSERT INTO pre_ucenter_members VALUES ('886',0x57482d434a,0x6536646336323332376430626433343331313634353139623033373033336264,0x3738373936313833344071712e636f6d,'','',0x3137312e3232312e35312e3430,'1425889095','0','0',0x373265653732,'');
INSERT INTO pre_ucenter_members VALUES ('887',0x57482d4846424b,0x3439333662653665633165643337353236386133323534353936306530376634,0x3737303634383937314071712e636f6d,'','',0x3137312e3232312e35312e3430,'1425889177','0','0',0x393136646362,'');
INSERT INTO pre_ucenter_members VALUES ('888',0x57482d544d4c,0x6634643962303938303063626136663136396365316362633037656231333862,0x313330333532313836374071712e636f6d,'','',0x3137312e3232312e35312e3430,'1425889241','0','0',0x393530333939,'');
INSERT INTO pre_ucenter_members VALUES ('889',0x57482d435852,0x3161373736623962383064643533386162303838643862306139343963643564,0x3635313538383738304071712e636f6d,'','',0x3137312e3232312e35312e3430,'1425889295','0','0',0x666563366230,'');
INSERT INTO pre_ucenter_members VALUES ('890',0x424a2d4448,0x3336366464366636376431386139636533366637393063333362353461383631,0x3632343333393436314071712e636f6d,'','',0x3232322e3231312e3132332e313236,'1425890599','0','0',0x373062396634,'');
INSERT INTO pre_ucenter_members VALUES ('891',0x4558585a,0x3335613365623332376465356531643030623766376263386230636330313734,0x3737323937353539394071712e636f6d,'','',0x3130362e33372e3137392e313530,'1425896665','0','0',0x393338363861,'');
INSERT INTO pre_ucenter_members VALUES ('892',0x41726573,0x3264656465613239666561643936646438393165386236633065623565303434,0x3439343030393235304071712e636f6d,'','',0x3138332e31372e3136332e3439,'1425900813','0','0',0x643064633835,'');
INSERT INTO pre_ucenter_members VALUES ('893',0x474d4154e890b1e890b1,0x3865633361346330666666363762663133323632383133323039343631623039,0x3438393638303835304071712e636f6d,'','',0x3131332e3134302e31362e313930,'1425949831','0','0',0x373934323034,'');
INSERT INTO pre_ucenter_members VALUES ('894',0x656e646c657373656c646e65,0x3133616337643738336131616533653339306337373366313839663233326131,0x3530323031393435304071712e636f6d,'','',0x3232332e3136372e3136332e3736,'1425986165','0','0',0x356133356164,'');
INSERT INTO pre_ucenter_members VALUES ('895',0x6879756b686165,0x3733633733306537313131393539396131613437363930626435343433616130,0x313835333837353038324071712e636f6d,'','',0x3131332e3133322e35342e323133,'1425986174','0','0',0x653432643539,'');
INSERT INTO pre_ucenter_members VALUES ('896',0x6b7979,0x6365373465393263393530373536663262353539323335646434663134623361,0x3731373032383835394071712e636f6d,'','',0x3232322e32302e302e313336,'1426041266','0','0',0x326133663435,'');
INSERT INTO pre_ucenter_members VALUES ('897',0x4d6f72746963,0x6533353834613831336336643666373865373335613139343265646364623135,0x6c617374676f64323340676d61696c2e636f6d,'','',0x3131342e38352e3131302e313035,'1426058521','0','0',0x393236326430,'');
INSERT INTO pre_ucenter_members VALUES ('898',0x424a2d595850,0x3461363232303062363031346536333932313563323463323037376330666665,0x3839323937323431314071712e636f6d,'','',0x3131382e3131342e3231332e323033,'1426065096','0','0',0x383137373730,'');
INSERT INTO pre_ucenter_members VALUES ('899',0x485a2d5a48,0x6162383930653265376232663664623734636339623061366435633136346637,0x3239313738323932334071712e636f6d,'','',0x3137312e3232312e35312e3430,'1426125490','0','0',0x323338306632,'');
INSERT INTO pre_ucenter_members VALUES ('900',0x73757375,0x3033383864643663643630363664393233653536393730306433346461633065,0x615f6d61783131403136332e636f6d,'','',0x3131312e3139352e32352e3336,'1426171290','0','0',0x613336373766,'');
INSERT INTO pre_ucenter_members VALUES ('901',0x6169736861,0x3437366162313365363864333764326530643334303839373966306663386132,0x72656e6269626f403132362e636f6d,'','',0x3132332e3132352e3231322e3738,'1426229788','0','0',0x633038353432,'');
INSERT INTO pre_ucenter_members VALUES ('902',0x57482d5a444c,0x6331616231313032363730336661313265376161373235323636326462333635,0x3333303735353237344071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426240681','0','0',0x393632353836,'');
INSERT INTO pre_ucenter_members VALUES ('903',0x57482d4c4a,0x3637653564373535353936643731396536313032363463653161376439376234,0x3332343339333434384071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426240828','0','0',0x636233383432,'');
INSERT INTO pre_ucenter_members VALUES ('904',0x5265636b79,0x3835653330306666393233376661663162653136653833373038616566643235,0x323634363338393537354071712e636f6d,'','',0x3131372e3135312e38312e313934,'1426250990','0','0',0x653339643365,'');
INSERT INTO pre_ucenter_members VALUES ('905',0x6c6f6e676c6f6e67,0x3661386566623530393532636438376563383538353336336339313363643632,0x3330353430343635304071712e636f6d,'','',0x3131332e3130382e3133392e3336,'1426262033','0','0',0x316566396436,'');
INSERT INTO pre_ucenter_members VALUES ('906',0x57482d5a48,0x3131343933356464363462626166333462383331393762393463323537383834,0x3239313738323932354071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426472534','0','0',0x363862343764,'');
INSERT INTO pre_ucenter_members VALUES ('907',0x53482d484251,0x3731393737343161386631663432353738663932303565336561633262633937,0x3437313336343036384071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426476978','0','0',0x323930646364,'');
INSERT INTO pre_ucenter_members VALUES ('908',0x53482d5a4c59,0x3461626435363031643632663637376337323462613835393435306637653265,0x6f726c614071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426484694','0','0',0x366363303739,'');
INSERT INTO pre_ucenter_members VALUES ('909',0xe9a290e88e8ee58fafe58faf,0x3533663561646463303234646534626638393333663536623764343964386334,0x3436303138393338304071712e636f6d,'','',0x3130362e3132302e3131382e313931,'1426496671','0','0',0x663131626261,'');
INSERT INTO pre_ucenter_members VALUES ('910',0x57482d5a4c,0x3764303838616562666361363537333665313931306365363765323865366363,0x3730393532323939384071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426555532','0','0',0x633630633630,'');
INSERT INTO pre_ucenter_members VALUES ('911',0x57482d445359,0x3133356366353366633039643830346536356232363530336662316164633765,0x3434353737383437374071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426556712','0','0',0x386564336334,'');
INSERT INTO pre_ucenter_members VALUES ('912',0x57482d484c,0x3534636463323236363562623365623561303235343136323366613666363864,0x313035313036333437364071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426559108','0','0',0x343637623132,'');
INSERT INTO pre_ucenter_members VALUES ('913',0x53482d544a59,0x3166666337626664613634636431353731313237323961333336353538623036,0x3238343736303431394071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426574083','0','0',0x343030636163,'');
INSERT INTO pre_ucenter_members VALUES ('914',0x53482d464651,0x6139343663313937326237333130636535396237626165393838623134336430,0x68656c6c6f6572696330363035403132362e636f6d,'','',0x3138322e3134382e33302e313436,'1426586379','0','0',0x626361643532,'');
INSERT INTO pre_ucenter_members VALUES ('915',0x43442d4c5954,0x3436666461393434363136363632373135663866373636373930336338303766,0x3735313432343235314071712e636f6d,'','',0x3138322e3134382e33302e313436,'1426645134','0','0',0x653936616363,'');
INSERT INTO pre_ucenter_members VALUES ('916',0x53482d4c494c59,0x3265346538306234363132646434373365656633313761343261636430386239,0x3133373936303038303836403136332e636f6d,'','',0x3138322e3134382e33302e313436,'1426664566','0','0',0x366434383631,'');
INSERT INTO pre_ucenter_members VALUES ('917',0x57482d585459,0x3837656630623433353666636332313534633364313536376638353939333663,0x3737343737363431304071712e636f6d,'','',0x3131392e39372e3139362e313636,'1426667895','0','0',0x373534333063,'');
INSERT INTO pre_ucenter_members VALUES ('918',0x424a2d4d4c4a,0x3063386337363065336535306436396163333832633037363735386561376162,0x3736373434343537374071712e636f6d,'','',0x3232322e3231312e3132312e313131,'1426730682','0','0',0x613234326134,'');
INSERT INTO pre_ucenter_members VALUES ('919',0x7368616c6567,0x6238636334333938663934366563386337623661336661633330643236326633,0x7869616e6771696c61696c65403132362e636f6d,'','',0x35382e3234362e33302e323532,'1426736607','0','0',0x666435656335,'');
INSERT INTO pre_ucenter_members VALUES ('920',0x424a2d5a5159,0x6138616630626466643835376562313937313735663531663134663466356531,0x313030323635383633384071712e636f6d,'','',0x3232322e3231312e3132312e313131,'1426745791','0','0',0x663435313765,'');
INSERT INTO pre_ucenter_members VALUES ('921',0x416e64726577447275636b6572,0x6636653836323831626236333530343933663037363466663262653539663531,0x7a68616e6771696e6779616e67407961686f6f2e636f6d,'','',0x3131382e32362e36362e313935,'1426757271','0','0',0x376164323864,'');
INSERT INTO pre_ucenter_members VALUES ('922',0x726562656363616875,0x3832373533353035333731616236326538626261323534633836626462356464,0x726562656363615f6875323031334073696e612e636e,'','',0x31342e3135362e3131362e37,'1426757444','0','0',0x343235356266,'');
INSERT INTO pre_ucenter_members VALUES ('923',0x6a656e6e796d3832,0x3837386432643433323739663665323539336430663733633162346362373439,0x6a656e6e796d656e67383240676d61696c2e636f6d,'','',0x36352e33382e38312e313235,'1426780773','0','0',0x353536353634,'');
INSERT INTO pre_ucenter_members VALUES ('924',0x53482d4c595545,0x6631633437336363633536616363343633383439396365303966363631643965,0x3735393439333036394071712e636f6d,'','',0x3232322e3231312e3132312e313131,'1426821292','0','0',0x633761303862,'');
INSERT INTO pre_ucenter_members VALUES ('925',0x4172657353756e,0x3765616335373035313532343835336263386330653632313634653965326238,0x3237313734373530384071712e636f6d,'','',0x3131332e39302e31352e313331,'1426833208','0','0',0x386139376636,'');
INSERT INTO pre_ucenter_members VALUES ('926',0x457468656c4343,0x6137343539643433333134373238303061366264366262353165303263653334,0x6373783933373230403136332e636f6d,'','',0x3131322e39342e3234312e323235,'1426854673','0','0',0x316532383934,'');
INSERT INTO pre_ucenter_members VALUES ('927',0x6a696e675f31303732,0x3238646537663537393562626432343330623532316565316536353263626533,0x6a696e675f313037324073696e612e636f6d,'','',0x31342e32392e3131352e3433,'1426860137','0','0',0x393864613934,'');
INSERT INTO pre_ucenter_members VALUES ('928',0x4c5368656c6c,0x6331353138333930653336363031643933613035383364303033326537316564,0x6c696c793838363838407961686f6f2e636f6d,'','',0x35382e3235342e3136382e3735,'1426861767','0','0',0x373036666238,'');
INSERT INTO pre_ucenter_members VALUES ('929',0x737079616e67,0x6530376235613362333061336536666330623831633764633131656139656265,0x737079616e67406862752e6564752e636e,'','',0x32372e3132392e3133372e313830,'1426862883','0','0',0x336261316434,'');
INSERT INTO pre_ucenter_members VALUES ('930',0x53482d4c5452,0x3863613431633266383237316232386166393530333563613834313731303337,0x313131393637303233384071712e636f6d,'','',0x3232322e3231312e3132312e313131,'1426987319','0','0',0x376330636636,'');
INSERT INTO pre_ucenter_members VALUES ('931',0xe88d89e88e93e6b4be7869,0x6636663466623832353138356433666131623631353638643636663536613062,0x313330333631343531344071712e636f6d,'','',0x32372e3132392e3133372e313830,'1426995274','0','0',0x613235396165,'');
INSERT INTO pre_ucenter_members VALUES ('932',0x485a2d594259,0x6530656437656338373535326239366532376432303462353764396234326335,0x3336333333393538394071712e636f6d,'','',0x3232322e3231312e3132312e313131,'1427075258','0','0',0x613164633032,'');
INSERT INTO pre_ucenter_members VALUES ('933',0x53482d425859,0x3331613231363637653531363935653735373861393834613461633932633738,0x313539353534383232354071712e636f6d,'','',0x3138322e3134392e3139302e323236,'1427102245','0','0',0x353636333762,'');
INSERT INTO pre_ucenter_members VALUES ('934',0x424a2d505951,0x3234643135336236383033343264396231653836366266643535653663386230,0x70616e675f6a69616e7869616e73697169403136332e636f6d,'','',0x3138322e3134392e3139302e323236,'1427104187','0','0',0x623531666466,'');
INSERT INTO pre_ucenter_members VALUES ('935',0xe8a281e699a8e992b0,0x6365313831383531626463663563343730333231366239303634316536613130,0x6368656e3236393933393137354071712e636f6d,'','',0x3232322e32302e31302e3632,'1427123878','0','0',0x366236303437,'');
INSERT INTO pre_ucenter_members VALUES ('936',0x57482d5a5851,0x3136313630656334383039393033316238626462633963306336616663656232,0x313134353934363633374071712e636f6d,'','',0x3138322e3134392e3139302e323236,'1427162801','0','0',0x316336346332,'');
INSERT INTO pre_ucenter_members VALUES ('937',0x424a2d445a4a,0x3035346534653134343635326635663231646431323534633739666531333165,0x3435383832303139394071712e636f6d,'','',0x3138322e3134392e3139302e323236,'1427177927','0','0',0x373033653130,'');
INSERT INTO pre_ucenter_members VALUES ('938',0x43532d5a5851,0x6139383661303765363636663566643563343436333763373761646632313235,0x313134353934363633384071712e636f6d,'','',0x3138322e3134392e3139302e323236,'1427185785','0','0',0x396135343030,'');
INSERT INTO pre_ucenter_members VALUES ('939',0x485a2d57584c,0x3132373839393764316130336639346336336664306232643163623837303438,0x3534323134333332374071712e636f6d,'','',0x3132352e37302e3138362e313638,'1427246941','0','0',0x643565643334,'');
INSERT INTO pre_ucenter_members VALUES ('940',0x73756d6d6572,0x3731653835656231666634353863326633326336356536343530643935306530,0x7368616e676861697368656e796f753134403136332e636f6d,'','',0x35382e3234362e33302e323532,'1427250572','0','0',0x636432376537,'');
INSERT INTO pre_ucenter_members VALUES ('941',0x57482d575152,0x3433623466386166356565303537373966643765376662393631326135356364,0x3339363930333330394071712e636f6d,'','',0x3132352e37302e3230352e3333,'1427251985','0','0',0x316530333930,'');
INSERT INTO pre_ucenter_members VALUES ('942',0x53482d5450,0x6662383364303138343532336436353635323636303037613834646263646532,0x3337353031333734324071712e636f6d,'','',0x3132352e37302e3230352e3333,'1427254135','0','0',0x373132353537,'');
INSERT INTO pre_ucenter_members VALUES ('943',0x6c69616f796f6761,0x3261323437643766373936303266643730316162306333303662343537333662,0x3238303134393135394071712e636f6d,'','',0x3137312e3232312e32382e313438,'1427267135','0','0',0x663965366530,'');
INSERT INTO pre_ucenter_members VALUES ('944',0x7061756c327962,0x6262633934646539653236356230393166336434643439666531323434613062,0x7061756c327962406c6976652e636e,'','',0x3131332e3233302e3234382e313939,'1427276253','0','0',0x646230366562,'');
INSERT INTO pre_ucenter_members VALUES ('945',0x57482d5754,0x6637653561396661383236363862353431343735363264313862333764386431,0x313136353330313237384071712e636f6d,'','',0x3131382e3131342e3231352e323435,'1427334392','0','0',0x386436313466,'');
INSERT INTO pre_ucenter_members VALUES ('946',0x57482d5a4b52,0x3463626633383365336439663030626131666262366135336464396633623336,0x3830363435303437334071712e636f6d,'','',0x3138322e3134392e3132352e3538,'1427357208','0','0',0x386138633937,'');
INSERT INTO pre_ucenter_members VALUES ('947',0x61736466,0x3464323037353136363965313466393038313465373431626563646437346638,0x737a7961683132403132362e636f6d,'','',0x35382e3234362e33302e323532,'1427418615','0','0',0x376561656634,'');
INSERT INTO pre_ucenter_members VALUES ('948',0x57482d5a575a59,0x3364373364643139313331643531653134373866356438306266363164623835,0x3536353234303037364071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427424797','0','0',0x646334313632,'');
INSERT INTO pre_ucenter_members VALUES ('949',0x485a2d485353,0x3730306535386466616566663964626438643536366533613265306332323335,0x3333303833333734334071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427444596','0','0',0x346337323636,'');
INSERT INTO pre_ucenter_members VALUES ('950',0x616c6963656368616e67,0x3562366439383032333266303732666230656533613836643261646533643463,0x616c6963656368616e67313939323131333040676d61696c2e636f6d,'','',0x36312e3232382e33332e3338,'1427514380','0','0',0x636566393032,'');
INSERT INTO pre_ucenter_members VALUES ('951',0x485a2d53584b,0x6232326262656566646266353063396464623063313962656666623963373231,0x7869616f6b616e7368656e407961686f6f2e636f6d,'','',0x3232322e3231322e3137332e3235,'1427677980','0','0',0x636166303037,'');
INSERT INTO pre_ucenter_members VALUES ('952',0x6a69617969393832,0x3234306132313435363963353065356132656337646137663661653763343466,0x6a6961796939383240686f746d61696c2e636f6d,'','',0x3130332e352e37332e313330,'1427680397','0','0',0x646436633737,'');
INSERT INTO pre_ucenter_members VALUES ('953',0x485a2d575448,0x6532396562303063346334393938383331386563653734376535303563333833,0x3733353139313837324071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427682881','0','0',0x313934643161,'');
INSERT INTO pre_ucenter_members VALUES ('954',0x53482d5959,0x6539633961316434323930316532346637646337666130643439313539316636,0x3437323638343837374071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427683656','0','0',0x383763373264,'');
INSERT INTO pre_ucenter_members VALUES ('955',0x57482d4c4d59,0x6363306563393135633663643437613563393531343331616637643336323537,0x313039303334333535324071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427685906','0','0',0x326531396337,'');
INSERT INTO pre_ucenter_members VALUES ('957',0x57482d48594a59,0x3566316162636666646663306364373138303361663961306166316236326664,0x3531333731323731394071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427687647','0','0',0x663035363664,'');
INSERT INTO pre_ucenter_members VALUES ('958',0x43442d5a48554c494e,0x6532643036303539326133306261373333666363383165353366376565323935,0x63645f7a696c696e313233403132362e636f6d,'','',0x3232322e3231322e3137332e3235,'1427688136','0','0',0x386261333362,'');
INSERT INTO pre_ucenter_members VALUES ('959',0x53482d5459,0x3533623537313839623833636266313262316635343663633264333364383631,0x3939333131353532384071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427766406','0','0',0x363961623035,'');
INSERT INTO pre_ucenter_members VALUES ('960',0x53482d596542,0x3235333364303931666636353933346135313266346331343931666639663964,0x34353534373531304071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427788072','0','0',0x383135633666,'');
INSERT INTO pre_ucenter_members VALUES ('961',0x57482d43584a,0x3562626433366361396366333762336331306561646636356539356363653439,0x3234353130313438344071712e636f6d,'','',0x3232322e3231322e3137332e3235,'1427794867','0','0',0x336263393866,'');
INSERT INTO pre_ucenter_members VALUES ('962',0x7a64643934313238,0x6464633333646233656630616331323262386539633638316639633031316630,0x3334353436353935394071712e636f6d,'','',0x3136312e36342e3230382e313134,'1427815943','0','0',0x373839636565,'');
INSERT INTO pre_ucenter_members VALUES ('963',0x756e69717565343231,0x3234626137373364353434643365396235653062376461656532643633363135,0x38313132353433334071712e636f6d,'','',0x3132342e39302e3232352e313236,'1427869754','0','0',0x613735653131,'');
INSERT INTO pre_ucenter_members VALUES ('964',0xe7b1b3e79a84e5ae9de584bf,0x3762336339346465663965366639643338383635343534333765633331396439,0x3836373936393934334071712e636f6d,'','',0x3232312e3231372e31302e313738,'1427871343','0','0',0x663531623437,'');
INSERT INTO pre_ucenter_members VALUES ('965',0xe7b38ae9878ce7b38ae6b682,0x3339376161303939396637313635636136656661366461396464346562343365,0x7368616e676861697368656e796f75313431403136332e636f6d,'','',0x35382e3234362e33302e323532,'1427939549','0','0',0x643230623862,'');
INSERT INTO pre_ucenter_members VALUES ('966',0x43442d5a574c,0x6464316136353065643766383765623133336662373338356231646638393237,0x3739393339323831324071712e636f6d,'','',0x3138322e3134382e33312e323139,'1427943654','0','0',0x366332366134,'');
INSERT INTO pre_ucenter_members VALUES ('967',0x58412d4c594a,0x6339303434633465356532666239363263316235383633626362613831646265,0x3439393739373536394071712e636f6d,'','',0x3232322e3231322e3137332e323139,'1427946018','0','0',0x326338363363,'');
INSERT INTO pre_ucenter_members VALUES ('968',0x77616c6c6163653231,0x6237626537633865633130366635366464643031336439396261633664326666,0x313239383934373533314071712e636f6d,'','',0x36312e34382e3135392e3139,'1428079949','0','0',0x643862643531,'');
INSERT INTO pre_ucenter_members VALUES ('969',0x6a7830377479,0x3965653536663030363335386434623331623462663035653336656362646465,0x3139313932303839314071712e636f6d,'','',0x39392e3234302e3138332e3734,'1428085353','0','0',0x393432633935,'');
INSERT INTO pre_ucenter_members VALUES ('970',0x43442d4d4a48,0x3763643138393634623436343562353864626238373961633065613732306263,0x3132323338333933374071712e636f6d,'','',0x3138322e3134382e33312e323139,'1428138234','0','0',0x616631386364,'');
INSERT INTO pre_ucenter_members VALUES ('971',0x424a2d4859,0x6663336265363961646639626331653138323363373337643166623037336335,0x31363834353934334071712e636f6d,'','',0x3232322e3231322e3137332e323139,'1428371183','0','0',0x663766643065,'');
INSERT INTO pre_ucenter_members VALUES ('972',0x57482d4c69755859,0x3830313033653836346262393133383862343263363565386637616463633437,0x3335343733393535344071712e636f6d,'','',0x3232322e3231322e3137332e323139,'1428378391','0','0',0x373266663439,'');
INSERT INTO pre_ucenter_members VALUES ('973',0x53482d435858,0x3965623535333664306366383731353335636238653730383134373632366638,0x65757068656d69615f616c696365403136332e636f6d,'','',0x3131302e3138382e34392e313234,'1428457792','0','0',0x306631383731,'');
INSERT INTO pre_ucenter_members VALUES ('974',0x424a2d5a5a43,0x6532346132653337626533343064356662656333366634643234653737303063,0x3934303938303139324071712e636f6d,'','',0x3232322e3231322e3137352e36,'1428471162','0','0',0x616261623434,'');
INSERT INTO pre_ucenter_members VALUES ('975',0x43442d4c4358,0x6538626233623237383135303730623333326631323064663733613037616166,0x3330323939323733384071712e636f6d,'','',0x3232322e3231322e3137352e36,'1428480696','0','0',0x383566326430,'');
INSERT INTO pre_ucenter_members VALUES ('976',0x63737461,0x3238373662633135333363643239306564623261643963313033353437333563,0x7368616e676861697869617469616e3134403132362e636f6d,'','',0x35382e3234362e33302e323532,'1428481802','0','0',0x613231646636,'');
INSERT INTO pre_ucenter_members VALUES ('977',0x79616d5f32303135,0x3235343836633637646130623038656533623137666535616264633561383431,0x79616f616d696e403132362e636f6d,'','',0x3232322e3139302e3131372e323139,'1428558841','0','0',0x393230373530,'');
INSERT INTO pre_ucenter_members VALUES ('978',0x485a2d4259,0x6365383761316634366130306462663061626531383733626139376431373636,0x3631373836333637354071712e636f6d,'','',0x3232322e3231322e3137352e36,'1428628758','0','0',0x363630313630,'');
INSERT INTO pre_ucenter_members VALUES ('979',0x485a2d5a5859,0x6261383936376337356537393132653862656132373837383265336363643438,0x3534323131353632354071712e636f6d,'','',0x3232322e3231322e3137352e36,'1428629447','0','0',0x376435363937,'');
INSERT INTO pre_ucenter_members VALUES ('980',0x6c6d6f797a6c79,0x3362616634623163653839336362313265333061336632633034313365383438,0x7368616e676861696875617869613134403132362e636f6d,'','',0x35382e3234362e33302e323532,'1428633327','0','0',0x663733376565,'');
INSERT INTO pre_ucenter_members VALUES ('981',0x43442d4c5a,0x3036633533356463346561653039613333646437326533376266333836333438,0x3534323139363332384071712e636f6d,'','',0x3232322e3231322e3137352e36,'1428743530','0','0',0x613432626332,'');
INSERT INTO pre_ucenter_members VALUES ('982',0x6a61736d696e655f6d6179,0x6366613138623231303130343333346562313433323765666432623265643662,0x3234343336343732384071712e636f6d,'','',0x3131392e39372e3139362e3537,'1428832293','0','0',0x353437313430,'');
INSERT INTO pre_ucenter_members VALUES ('983',0x57696e6e6e65,0x3961383636643637386435363966336534623935353735643535623438353766,0x3939313036333035384071712e636f6d,'','',0x3137312e3232312e332e323039,'1428841643','0','0',0x626332363663,'');
INSERT INTO pre_ucenter_members VALUES ('984',0x424a2d4c7553,0x3661306538313830623731663936303165383861666134346135313939623738,0x3434383037373935364071712e636f6d,'','',0x3232322e3231322e3137352e36,'1428888253','0','0',0x646337616338,'');
INSERT INTO pre_ucenter_members VALUES ('985',0x6c7362797a7974,0x6661656335326436343938613663316435393333323138656262333565663161,0x73686e683132403132362e636f6d,'','',0x35382e3234362e33302e323532,'1428912648','0','0',0x383834303266,'');
INSERT INTO pre_ucenter_members VALUES ('986',0x53482d48584a,0x3665363034373338306638613638643836356236626564653132386237363664,0x3531363337323434314071712e636f6d,'','',0x3232322e3231322e3137352e3433,'1428914912','0','0',0x306633373766,'');
INSERT INTO pre_ucenter_members VALUES ('987',0x53482d5a5a59,0x3137623165333962346566613866306534666530663135376438373830333463,0x3631363632333136384071712e636f6d,'','',0x3232322e3231322e3137352e3433,'1428916006','0','0',0x366139323231,'');
INSERT INTO pre_ucenter_members VALUES ('988',0x436872697374696e61,0x6364383030623336363765363663313538623539326662306434636439363438,0x3534303632393338394071712e636f6d,'','',0x35382e35302e3133382e3634,'1428938795','0','0',0x626630373933,'');
INSERT INTO pre_ucenter_members VALUES ('989',0x536f706f,0x3932363466626666623265383830623235613736646133313064373263613032,0x313031393133393538364071712e636f6d,'','',0x3232302e3132332e3138302e323337,'1428982260','0','0',0x343632303362,'');
INSERT INTO pre_ucenter_members VALUES ('990',0x53482d594b51,0x3836656230653733373732343564333437313864386531343035316230363730,0x79616f79616f6b61696b616940736f68752e636f6d,'','',0x3232322e3231322e3137352e3433,'1428992164','0','0',0x346230373362,'');
INSERT INTO pre_ucenter_members VALUES ('991',0x53482d574a4a,0x3931376564626638653435623533386332393634333631643631636636333465,0x3937343238373239304071712e636f6d,'','',0x3232322e3231322e3137352e3433,'1428996497','0','0',0x313330663137,'');
INSERT INTO pre_ucenter_members VALUES ('992',0x53482d595943,0x3037316137613635313534323333363261616132333836616133343137343465,0x3434313236323330344071712e636f6d,'','',0x3232312e3233372e3134392e313236,'1429061748','0','0',0x346335653934,'');
INSERT INTO pre_ucenter_members VALUES ('993',0x6c6974746c656c696f6e3533,0x3033636366306638306535366636333665616166623463343733363262663739,0x33353734393136394071712e636f6d,'','',0x3131362e3233322e38392e3432,'1429065743','0','0',0x663239343438,'');
INSERT INTO pre_ucenter_members VALUES ('994',0x485a2d475948,0x3631393639386430646433623532363534333333613064373264393837666261,0x3437353534323031304071712e636f6d,'','',0x3232322e3231322e3137352e3433,'1429083636','0','0',0x346539393938,'');
INSERT INTO pre_ucenter_members VALUES ('995',0x57482d595359,0x6430313432343766363633633766653038333133343634356361646466643934,0x3631363335383238374071712e636f6d,'','',0x3232322e3231322e3137352e3433,'1429085676','0','0',0x636337616132,'');
INSERT INTO pre_ucenter_members VALUES ('996',0x57482d4c697559,0x3264396438303364653339393638613764343834386464626266633931653436,0x3534393830383133394071712e636f6d,'','',0x3232322e3231322e3137352e3433,'1429087317','0','0',0x353230623333,'');
INSERT INTO pre_ucenter_members VALUES ('997',0xe69e9ce69e9ce58689,0x6531666364653634646162383030333235346333656436316235343764313932,0x6e673536333137333935313339353137403136332e636f6d,'','',0x3131392e3132322e3234382e313635,'1429087877','0','0',0x353338616563,'');
INSERT INTO pre_ucenter_members VALUES ('998',0x4b415448595959,0x3537313663313131383738336330353030663938626334346534363131323132,0x796b716c7930333230403136332e636f6d,'','',0x35392e3137322e35312e39,'1429168497','0','0',0x313233366664,'');
INSERT INTO pre_ucenter_members VALUES ('999',0x43442d435959,0x6132376364333130353130626233653162346239336661343435303931303831,0x3234333337333931304071712e636f6d,'','',0x36312e3135372e33392e313935,'1429173382','0','0',0x363839363566,'');
INSERT INTO pre_ucenter_members VALUES ('1000',0x43442d5a4a42,0x6231656535353135656333353930363062313134616665396664363033643565,0x3435343737323933324071712e636f6d,'','',0x36312e3135372e33392e313935,'1429176967','0','0',0x376134623434,'');
INSERT INTO pre_ucenter_members VALUES ('1001',0x43442d534a59,0x3766623337356233353735633262626163656362653562623131643938356165,0x313132363031303736374071712e636f6d,'','',0x36312e3135372e33392e313935,'1429178782','0','0',0x653439663363,'');
INSERT INTO pre_ucenter_members VALUES ('1002',0x42535a,0x6565663032336237366162336363396433353730316635393839303738333232,0x73686e683134403136332e636f6d,'','',0x35382e3234362e33302e323532,'1429250719','0','0',0x666565313935,'');
INSERT INTO pre_ucenter_members VALUES ('1003',0x7366636c73646168,0x3463303135653734623732663933373832373533396638343161623565623835,0x313635343138363239304071712e636f6d,'','',0x3131372e36332e31332e313132,'1429254204','0','0',0x633838613961,'');
INSERT INTO pre_ucenter_members VALUES ('1004',0x73616e6777656e6e62,0x6232316361663766323232653565393133666364353366393164363438613130,0x3737313934393535314071712e636f6d,'','',0x3131332e3133342e34332e3431,'1429267680','0','0',0x306433663665,'');
INSERT INTO pre_ucenter_members VALUES ('1005',0x73756e7975776569,0x3639323666326438383038616131383633633165333837663733316338623339,0x313236343530303935304071712e636f6d,'','',0x3131352e3232392e3234362e313535,'1429268958','0','0',0x653935633033,'');
INSERT INTO pre_ucenter_members VALUES ('1006',0x73737373737373,0x3466346436386230303761376165393033313365326632353430643564313233,0x3437323537323739314071712e636f6d,'','',0x3231382e3130362e3138322e313935,'1429321223','0','0',0x373865663862,'');
INSERT INTO pre_ucenter_members VALUES ('1007',0x6e696e693139393130383330,0x6233643264323463626339373162626665656537616166386139383862393039,0x3835333332333436304071712e636f6d,'','',0x3130312e38302e3233382e3736,'1429345325','0','0',0x643366386238,'');
INSERT INTO pre_ucenter_members VALUES ('1008',0x736361726c65746d6965,0x3737326163363737383765386339663731306166303233393764616338373234,0x736361726c65746d69654073696e612e636f6d,'','',0x3130362e33392e34312e313732,'1429370434','0','0',0x326438353433,'');
INSERT INTO pre_ucenter_members VALUES ('1009',0x6a63686f6c656e61,0x6336343764396239373732613461663664653432636665653738393230393134,0x323735383737383539324071712e636f6d,'','',0x312e3136332e32352e313333,'1429488717','0','0',0x643337623739,'');
INSERT INTO pre_ucenter_members VALUES ('1010',0x6c656f3236,0x3861613232376534353766383637376634373639336535393064383932616236,0x35303235363736374071712e636f6d,'','',0x3131332e39372e3135352e313634,'1429494603','0','0',0x623839323235,'');
INSERT INTO pre_ucenter_members VALUES ('1011',0x58412d5a5348,0x6462633036383161386366316365383939353364373938396139376532393464,0x3530343933313930374071712e636f6d,'','',0x36312e3135372e33392e313935,'1429495212','0','0',0x633064656662,'');
INSERT INTO pre_ucenter_members VALUES ('1012',0x43532d54504c,0x3335303565323531656561383136356637646133376364396338343266333239,0x32313237333230334071712e636f6d,'','',0x36312e3135372e33392e313935,'1429495532','0','0',0x636236343361,'');
INSERT INTO pre_ucenter_members VALUES ('1013',0x6d6167676965686168616861,0x3238303438313035366237313362643639663863653737623838313939366633,0x746c6c746178403136332e636f6d,'','',0x3132332e3132342e31392e3336,'1429497125','0','0',0x353862616636,'');
INSERT INTO pre_ucenter_members VALUES ('1014',0x706c61737469636275646479,0x6665363239396134656437333263396532336462653966336365323063363935,0x706c61737469636275646479403136332e636f6d,'','',0x3231312e39372e352e3237,'1429504334','0','0',0x653465386633,'');
INSERT INTO pre_ucenter_members VALUES ('1015',0x616c69636961686f6e6773,0x3166313433396532633963373032316330313732303865366339636536643365,0x313539353534303233334071712e636f6d,'','',0x3138332e33362e36372e313535,'1429521661','0','0',0x646463653165,'');
INSERT INTO pre_ucenter_members VALUES ('1016',0x6c79676f676f,0x6464366631663664323734333636336261333631336337616465363561323731,0x3535303939313638334071712e636f6d,'','',0x3232312e3233382e3234352e3135,'1429538284','0','0',0x633339346365,'');
INSERT INTO pre_ucenter_members VALUES ('1017',0x4c4a4c,0x6537616333393263326462646461343534366338616233656466343235623261,0x73686e6831343134403132362e636f6d,'','',0x35382e3234362e33302e323532,'1429600011','0','0',0x626137316136,'');
INSERT INTO pre_ucenter_members VALUES ('1018',0x53482d5a59,0x3934333335653438306666383332363838383163663932333063383431633735,0x313137353435313035344071712e636f6d,'','',0x36312e3135372e33392e313935,'1429664531','0','0',0x333265346138,'');
INSERT INTO pre_ucenter_members VALUES ('1019',0x6d6a6e6b6363,0x3161343464336434353433646638393664633135623063333036333764333863,0x736873686e683134403132362e636f6d,'','',0x35382e3234362e33302e323532,'1429688700','0','0',0x633132373639,'');
INSERT INTO pre_ucenter_members VALUES ('1020',0x6a7730,0x6139626365373831383432616533633232643535386162383365306132626463,0x3331343639333635334071712e636f6d,'','',0x38362e31302e39312e313133,'1429738459','0','0',0x626437356263,'');
INSERT INTO pre_ucenter_members VALUES ('1021',0x4972656e653638,0x3435373637623435666332363762656436623438613638316339653163363864,0x3430343035353336364071712e636f6d,'','',0x35382e34392e33322e323330,'1429775357','0','0',0x643030343136,'');
INSERT INTO pre_ucenter_members VALUES ('1022',0x6469793135,0x3663383033303962336238383339363031626331663132393237353737616363,0x7368616e67686169353139403132362e636f6d,'','',0x35382e3234362e33302e323532,'1429855885','0','0',0x643563306430,'');
INSERT INTO pre_ucenter_members VALUES ('1023',0x424a2d4c5858,0x3461366634383463393532346130346334623338326264653030323935303766,0x3835313830383633304071712e636f6d,'','',0x36312e3135372e33392e313830,'1429859725','0','0',0x643334613862,'');
INSERT INTO pre_ucenter_members VALUES ('1024',0x57482d594c,0x3239646565626333326361396132303635393461623538623139636335313135,0x3339303133303238324071712e636f6d,'','',0x36312e3135372e33392e313830,'1429861391','0','0',0x666235623461,'');
INSERT INTO pre_ucenter_members VALUES ('1025',0x7772656e636572,0x6534376439616230616161386131653438366331316139323135323239326339,0x3135383130353030323635403136332e636f6d,'','',0x3132352e33332e3131342e313139,'1429889804','0','0',0x636565376665,'');
INSERT INTO pre_ucenter_members VALUES ('1026',0x6368696368616e67776f6f6b,0x3634393830313663316235383030353638343231666639656538323430363763,0x3338333833303734314071712e636f6d,'','',0x3131362e32352e3134342e323133,'1429947369','0','0',0x396562663233,'');
INSERT INTO pre_ucenter_members VALUES ('1027',0x474469736d696e65,0x3736306464316230623165346134653064343462646566613631363739373462,0x313035303433373933354071712e636f6d,'','',0x3131362e32352e3134342e323133,'1429948365','0','0',0x643131316330,'');
INSERT INTO pre_ucenter_members VALUES ('1028',0x676d61746b696e67,0x3733633535666665383531353463646238323563346435663231393731643061,0x6c69616e67656c613838407961686f6f2e636f6d,'','',0x39392e3134392e3138342e313336,'1429977590','0','0',0x363937663234,'');
INSERT INTO pre_ucenter_members VALUES ('1029',0x43442d5a5859,0x3839616563663437626538346432326162396531386638333266313366353761,0x3430333636343135334071712e636f6d,'','',0x36312e3135372e33392e313830,'1430034995','0','0',0x333834643563,'');
INSERT INTO pre_ucenter_members VALUES ('1030',0x43442d575948,0x6162623661666639396162613663333530393665383930383339393032393034,0x38313133373137384071712e636f6d,'','',0x36312e3135372e33392e313830,'1430035990','0','0',0x363131393236,'');
INSERT INTO pre_ucenter_members VALUES ('1031',0x43532d50484f454e4958,0x3362383235303430643334336434303631383466646632666638363966633934,0x37393034363839394071712e636f6d,'','',0x36312e3135372e33392e313830,'1430098294','0','0',0x366337643032,'');
INSERT INTO pre_ucenter_members VALUES ('1032',0x6c68353133,0x3037313935633033346231346631613035633937393230393533626332366233,0x6c685f3531334073696e612e636f6d,'','',0x3131362e3233322e3137352e313731,'1430106537','0','0',0x393139366266,'');
INSERT INTO pre_ucenter_members VALUES ('1033',0x424a2d5743,0x3265366566333534356561633638636139393238343132636331633539356462,0x3138383133303731313835403136332e636f6d,'','',0x36312e3135372e33392e313830,'1430107135','0','0',0x663834616236,'');
INSERT INTO pre_ucenter_members VALUES ('1034',0x4a616e655f30373231,0x6334356163653032366435326635613531653961356438616532313339313865,0x3834323435333432384071712e636f6d,'','',0x3132322e3232382e3131322e323239,'1430117267','0','0',0x333934313964,'');
INSERT INTO pre_ucenter_members VALUES ('1035',0x6265747465726c696665,0x6133396564363034633062366161663036333161336634373164396663376466,0x626863766462403136332e636f6d,'','',0x35382e3234362e32342e323335,'1430211623','0','0',0x373336346339,'');
INSERT INTO pre_ucenter_members VALUES ('1036',0x43442d575452,0x3230303661346637636163633537363366656138346138373165386366643966,0x3539333337313934374071712e636f6d,'','',0x36312e3135372e33392e313830,'1430215043','0','0',0x333139396264,'');
INSERT INTO pre_ucenter_members VALUES ('1037',0x53696c766961e6a091e6b49e,0x6637323830313339633431326362393437313064393836643037663537383138,0x3534303232313735364071712e636f6d,'','',0x3232322e3231312e3132342e313735,'1430271534','0','0',0x653032363435,'');
INSERT INTO pre_ucenter_members VALUES ('1038',0x4161726f6e,0x3161613063653536656533363534313934343834616230393664393463313131,0x3531303234343636374071712e636f6d,'','',0x35382e3234362e32342e323335,'1430293565','0','0',0x643334656439,'');
INSERT INTO pre_ucenter_members VALUES ('1039',0x43442d4c5447,0x3230316562666665636663613866663138343433633830616238373930626137,0x3930383134383837354071712e636f6d,'','',0x3137312e3232312e3131332e3433,'1430359520','0','0',0x303334386566,'');
INSERT INTO pre_ucenter_members VALUES ('1040',0x656d6d61,0x3466373863323437643133313761343964343865313830393634313531613161,0x7368616e67686169313430353233403132362e636f6d,'','',0x35382e3234362e33302e323532,'1430361347','0','0',0x333033376262,'');
INSERT INTO pre_ucenter_members VALUES ('1041',0x424a2d4c4248,0x3761633933333134336538393463396639323334303961343763636561383164,0x68656c616e7368656e674073696e612e636e,'','',0x3137312e3232312e3131332e3433,'1430702945','0','0',0x313039353536,'');
INSERT INTO pre_ucenter_members VALUES ('1042',0x58412d585a5a,0x6338613162353738636439306537653038646431383438623039336133316431,0x3733393932323435374071712e636f6d,'','',0x3232322e3231312e3132342e313735,'1430712288','0','0',0x303931373438,'');
INSERT INTO pre_ucenter_members VALUES ('1043',0x57482d4a4a5a,0x3938393335356366643766396138373136356630656330353361353431366164,0x3238303034343837394071712e636f6d,'','',0x3137312e3232312e3131332e3433,'1430719514','0','0',0x613235393339,'');
INSERT INTO pre_ucenter_members VALUES ('1044',0x6b61696b61,0x3133333964383939633933623035306437363731356466613761616565333137,0x7368616e67686169313430363033403132362e636f6d,'','',0x35382e3234362e33302e323532,'1430724116','0','0',0x346239323762,'');
INSERT INTO pre_ucenter_members VALUES ('1045',0x57482d54594a,0x3635653461383863373839633631636361666138383230323335646530323936,0x313439393838373439394071712e636f6d,'','',0x3137312e3232312e3131332e3433,'1430729284','0','0',0x346434323663,'');
INSERT INTO pre_ucenter_members VALUES ('1046',0x63687269736c79,0x3761373864343035376132383039316164663234623362393866666233653863,0x3334313037363937364071712e636f6d,'','',0x35382e3234362e33302e323532,'1430819206','0','0',0x363463643162,'');
INSERT INTO pre_ucenter_members VALUES ('1047',0x6341726e69736d,0x6262306335643464613639376135336635633464643163643231656363656236,0x616c6c656e2e6a407468696e6b77697468752e636f6d,'','',0x36312e3135372e33362e3539,'1430903465','0','0',0x393932366136,'');
INSERT INTO pre_ucenter_members VALUES ('1048',0x41544d55,0x3161623639306462393863626464373630623833326265373538623865626161,0x313537323739333831304071712e636f6d,'','',0x35382e3234362e33302e323532,'1430903941','0','0',0x353738656533,'');
INSERT INTO pre_ucenter_members VALUES ('1049',0x485a2d5043,0x6230666166333737333439316539613938363736623066383934323035323937,0x70616e6368656e6735353540676d61696c2e636f6d,'','',0x36312e3135372e33362e3539,'1430961031','0','0',0x373634633138,'');
INSERT INTO pre_ucenter_members VALUES ('1050',0x73617961,0x6131656238303136393537343032616366626236636663663662393562636231,0x6775616967756169303732354073696e612e636e,'','',0x35382e3234362e33302e323532,'1430966863','0','0',0x666435646632,'');
INSERT INTO pre_ucenter_members VALUES ('1051',0x43442d5a594d,0x3137626435393031336232346532353161336631666333616637633434353865,0x3735323337313737314071712e636f6d,'','',0x36312e3135372e33362e3539,'1430977359','0','0',0x663838663436,'');
INSERT INTO pre_ucenter_members VALUES ('1052',0x43696e647931393930,0x6530363439623934653337343138393666623930396235616265363934313438,0x676f7373697031393930403132362e636f6d,'','',0x34392e38322e37342e3734,'1430991737','0','0',0x393636363539,'');
INSERT INTO pre_ucenter_members VALUES ('1053',0x63796e746869616475323238,0x6666396666323831386337626237366662373633336339623332313836303532,0x3236333438353332344071712e636f6d,'','',0x3131372e392e3134372e313438,'1431067810','0','0',0x326434346537,'');
INSERT INTO pre_ucenter_members VALUES ('1054',0x6b6973656e616e61,0x6562313634346364616339343161643230663731303633376463636462633832,0x3531363737373536324071712e636f6d,'','',0x3131352e3139352e3135322e323039,'1431078423','0','0',0x376336376630,'');
INSERT INTO pre_ucenter_members VALUES ('1055',0x514959454645495149,0x3333636331646132373433346532353165303634353731373833313031373137,0x71696e6779696e6766656e676c696e67403136332e636f6d,'','',0x37372e372e34342e323534,'1431122250','0','0',0x613261646631,'');
INSERT INTO pre_ucenter_members VALUES ('1056',0x4672616e6369735f5a686f75,0x3239656339396362356562316561666561343935326362646133396137383632,0x6775696c6c61756d657a686f753032313740676d61696c2e636f6d,'','',0x33372e3136302e31332e3436,'1431207219','0','0',0x336364616337,'');
INSERT INTO pre_ucenter_members VALUES ('1057',0x43442d545346,0x6634613364636663363261636339613638626131316239353338373364363531,0x3931323131343837364071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431311996','0','0',0x636164333630,'');
INSERT INTO pre_ucenter_members VALUES ('1058',0x53482d5a484a,0x3231343063613531633463343039656231623035323266393038353838303662,0x3534393937313733314071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431323574','0','0',0x363538633636,'');
INSERT INTO pre_ucenter_members VALUES ('1059',0x57482d485a48,0x3933643261346430663063656132306461303865306430663933346539383132,0x3435323535303835354071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431392818','0','0',0x323962356436,'');
INSERT INTO pre_ucenter_members VALUES ('1060',0x57482d595958,0x6138656432656639626163643433636535666133666533303530643439616530,0x3730393135323533374071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431392944','0','0',0x303532363734,'');
INSERT INTO pre_ucenter_members VALUES ('1062',0x57482d5a5945,0x6164323631303962303565323135643534303861643332663136623832663166,0x3436353630353730374071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431393546','0','0',0x616165383866,'');
INSERT INTO pre_ucenter_members VALUES ('1063',0x57482d5a48616e,0x3761663435383861653739636563306334316238383131346334663563653339,0x3139363230343936354071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431393621','0','0',0x353730616134,'');
INSERT INTO pre_ucenter_members VALUES ('1064',0x53432d594847,0x6536616532366565626163303836626563643730303037633033653865373935,0x323238353132333236324071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431393918','0','0',0x656134393636,'');
INSERT INTO pre_ucenter_members VALUES ('1065',0x485a2d6c69754a51,0x6635336564353366653632653266313833393961323534653164663038643837,0x6a696171695f6c69753139383840686f746d61696c2e636f6d,'','',0x3137312e38382e3133322e313131,'1431401806','0','0',0x653965366663,'');
INSERT INTO pre_ucenter_members VALUES ('1066',0x424a2d43534c,0x3037366239373365366637336664313135326238306535373632393736623565,0x3336323237363733314071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431488363','0','0',0x626239363332,'');
INSERT INTO pre_ucenter_members VALUES ('1067',0x43532d594847,0x3335343333376439636461613339373635613232313566623633353030366463,0x323238353132333236334071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431503877','0','0',0x353364633862,'');
INSERT INTO pre_ucenter_members VALUES ('1068',0x424a2d4c5843,0x3365343736666632363632326262653136336331313533316664393436333865,0x3733353934363837394071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431507803','0','0',0x623062366336,'');
INSERT INTO pre_ucenter_members VALUES ('1069',0x424a2d584359,0x6163613732373534633337313935633735636330613539383539333766383431,0x3336343933303630354071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431507839','0','0',0x663335623634,'');
INSERT INTO pre_ucenter_members VALUES ('1070',0x57482d5a5358,0x6362356566613436396231393830326437353333613435373735393866643231,0x3938373930303439334071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431570076','0','0',0x633036343931,'');
INSERT INTO pre_ucenter_members VALUES ('1071',0x57482d444859,0x3261626531363731373866306136346136333264653462653636623337383332,0x64687939333736403136332e636f6d,'','',0x3137312e38382e3133322e313131,'1431582326','0','0',0x366165323430,'');
INSERT INTO pre_ucenter_members VALUES ('1072',0x43442d5a4c4e,0x3837393530316336363339333339616461616162373938376631343030656135,0x3233313635323339304071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431584073','0','0',0x396362346234,'');
INSERT INTO pre_ucenter_members VALUES ('1073',0x43442d595952,0x3435356564643663306533633963623862306266333364383633366432643964,0x3933393730393633354071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431599470','0','0',0x656335313762,'');
INSERT INTO pre_ucenter_members VALUES ('1074',0x424a2d574368656e,0x6665363764613264326339366566323538376437383565346633653761666366,0x6368656e2e6368617240686f746d61696c2e636f6d,'','',0x3137312e38382e3133322e313131,'1431653281','0','0',0x313664363830,'');
INSERT INTO pre_ucenter_members VALUES ('1075',0x53482d53535a,0x3366306264303339663238306463623833346639343839303436353734626531,0x313231363133303331374071712e636f6d,'','',0x3137312e38382e3133322e313131,'1431658909','0','0',0x643131396264,'');
INSERT INTO pre_ucenter_members VALUES ('1076',0x53482d594251,0x6638616330326533326432656438656262373836366236326134623462353139,0x6e616e615f77616e6d656940796561682e6e6574,'','',0x3137312e38382e3133322e313131,'1431659169','0','0',0x313637393633,'');
INSERT INTO pre_ucenter_members VALUES ('1077',0x57482d53484e,0x3237326661626532373366363633623436353733373430623139633966373131,0x3732373834373932364071712e636f6d,'','',0x3137312e38382e3133322e313831,'1431914901','0','0',0x353832326464,'');
INSERT INTO pre_ucenter_members VALUES ('1078',0x53482d5351,0x3466363761393435636230306666376462326635616634373235356230313333,0x3338333337353439394071712e636f6d,'','',0x3137312e38382e3133322e313831,'1431914943','0','0',0x663231623139,'');
INSERT INTO pre_ucenter_members VALUES ('1079',0x53482d4d4a4a,0x3961633431386534636634623963653636303834666534653662366365303638,0x313034353937393231304071712e636f6d,'','',0x3137312e38382e3133322e313831,'1431927341','0','0',0x643430663031,'');
INSERT INTO pre_ucenter_members VALUES ('1080',0x424a2d464b,0x3161363436393630303166626662626431616164353237373438383132663837,0x3833353635313839304071712e636f6d,'','',0x3137312e38382e3133322e313831,'1431928031','0','0',0x663534653466,'');
INSERT INTO pre_ucenter_members VALUES ('1081',0x53482d4d4e,0x6533333036623066313231303438333530643764353636626434633663656433,0x3630323230393336344071712e636f6d,'','',0x3137312e38382e3133322e313831,'1431929292','0','0',0x636534363139,'');
INSERT INTO pre_ucenter_members VALUES ('1082',0x53482d575359,0x3730643562316430343563623333333832636466333737383235326235643238,0x3430373032333833304071712e636f6d,'','',0x3232322e3231312e3132372e3131,'1431930944','0','0',0x306533663039,'');
INSERT INTO pre_ucenter_members VALUES ('1083',0x557262616e636f77626f79,0x3134353938376531393630393836643638653534343638623239303331326561,0x6d61696c4071712e636f6d,'','',0x39382e3132362e3134382e3139,'1431946120','0','0',0x383862333635,'');
INSERT INTO pre_ucenter_members VALUES ('1084',0x70686f656e6978333233,0x3366386535643263343334376339393338393638313164333932373234343366,0x7069616f677569687561333233403136332e636f6d,'','',0x3138302e3137352e3139332e313935,'1431970527','0','0',0x666138383538,'');
INSERT INTO pre_ucenter_members VALUES ('1085',0x636f636f7875,0x3237336635613761303462626237623461333463396434643031376166326661,0x626162792d636f40686f746d61696c2e636f6d,'','',0x39392e3234302e3138332e3734,'1432000182','0','0',0x363332643830,'');
INSERT INTO pre_ucenter_members VALUES ('1086',0x353131373236373938,0x3636383861633235616632393435373837656536386337383439333061373363,0x3531313732363739384071712e636f6d,'','',0x3138332e3233372e3233342e3130,'1432008428','0','0',0x643032353066,'');
INSERT INTO pre_ucenter_members VALUES ('1087',0x6d617431323234,0x6163666631393030343437626265613365323166623737633261633565343231,0x6d61743132323440676d61696c2e636f6d,'','',0x3231382e38312e3138392e313931,'1432045702','0','0',0x366262656262,'');
INSERT INTO pre_ucenter_members VALUES ('1088',0x53482d58584c,0x6637333432623537633639653363323863623532393136323765643230353766,0x3631393338383837324071712e636f6d,'','',0x3137312e38382e3133322e313831,'1432175621','0','0',0x363030303030,'');
INSERT INTO pre_ucenter_members VALUES ('1089',0x424a2d435859,0x3463626635303237353664656231323465653635333930373831653763323365,0x6d696e69736b697274736f6e674071712e636f6d,'','',0x3232322e3231312e3132372e3131,'1432186872','0','0',0x386261656239,'');
INSERT INTO pre_ucenter_members VALUES ('1090',0x424a2d44594d,0x3562313737373636323231643162616236356262343633613732636139376261,0x3138353031363230383233403136332e636f6d,'','',0x3232322e3231312e3132372e3131,'1432186941','0','0',0x643339333837,'');
INSERT INTO pre_ucenter_members VALUES ('1091',0xe8afb7e58fabe68891e7ac91e7ac91,0x3532323262623061366466646263316465333938636539376238366364643761,0x323039353435333333314071712e636f6d,'','',0x3137312e38382e3133322e313831,'1432189942','0','0',0x366464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1092',0x7469616d6f747978,0x3032663162626537633230396364363962393561656432366432613465626338,0x6161613630343137393138403132362e636f6d,'','',0x3231392e3135302e37312e313933,'1432201263','0','0',0x666134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1093',0x57482d434e,0x6430623533393532356537326238303939303838343339386164323962653832,0x323036383436333030334071712e636f6d,'','',0x3137312e38382e3133322e313831,'1432202119','0','0',0x373533656336,'');
INSERT INTO pre_ucenter_members VALUES ('1094',0x4c5858,0x6336393037613738326136623663393437383433623834633761343864663561,0x3435333039353332304071712e636f6d,'','',0x3231312e3130302e34362e313031,'1432453838','0','0',0x653934633566,'');
INSERT INTO pre_ucenter_members VALUES ('1095',0x636c6e30303038,0x6337613566633836373035626538313934343735346234616337323261333763,0x6e696e676e696e6730383136406c6976652e636e,'','',0x3131332e3131362e3233392e313937,'1432481446','0','0',0x363562386438,'');
INSERT INTO pre_ucenter_members VALUES ('1096',0x43532d4c4a54,0x3831663338616639323436643562383266643562386239626336666263313535,0x3330363039323939374071712e636f6d,'','',0x3138322e3135312e3136362e313336,'1432521065','0','0',0x396464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1097',0x636f726170616e,0x6265393861313733313531396637343430633330643939666131306335366230,0x636f72612e70616e40686f746d61696c2e636f6d,'','',0x3231382e38302e3234362e31,'1432521249','0','0',0x316237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1098',0x43532d5a57595a,0x3737613632656531393165383539333565306332626563316239656635653638,0x3732363833323130334071712e636f6d,'','',0x3131302e3138352e31312e3435,'1432521855','0','0',0x663530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1099',0x485a2d46594e,0x3666633037653161306139366236636639326334346539623361353138323565,0x353032303439353739324071712e636f6d,'','',0x3131302e3138352e31312e3435,'1432603998','0','0',0x656137643863,'');
INSERT INTO pre_ucenter_members VALUES ('1100',0x485a2d4c4d54,0x3234313264653739386437336538373563306333356333653162646239393466,0x6c61696d697469616e40666f786d61696c2e636f6d,'','',0x3131302e3138352e31312e3435,'1432604102','0','0',0x363364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1101',0x57482d485859,0x3238633963323938393937386338633130633036366334396361663634613436,0x6878795f3039303640686f746d61696c2e636f6d,'','',0x3131302e3138352e31312e3435,'1432604507','0','0',0x626364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1102',0x63786a31393934,0x6137313236393864393035653861303664386636663338313830396432373433,0x63786a686d313939344071712e636f6d,'','',0x32372e31382e31312e3437,'1432607471','0','0',0x663938393638,'');
INSERT INTO pre_ucenter_members VALUES ('1103',0x424a2d41504a,0x3033646563303835383861396564326263613965306264353033373163363437,0x61706a646d6e4073696e612e636f6d,'','',0x3131302e3138352e31312e3435,'1432620841','0','0',0x396134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1104',0x424a2d5357,0x6562393139356239666165646637326361633965313262343234633136343832,0x3733343334353238324071712e636f6d,'','',0x3131302e3138352e31312e3435,'1432620898','0','0',0x323636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1105',0x6d616f796f6e6365,0x6263316136326661633863313734636331656438336464363230336638646230,0x3739383337343530374071712e636f6d,'','',0x3131312e392e36382e313638,'1432647358','0','0',0x653339333837,'');
INSERT INTO pre_ucenter_members VALUES ('1106',0x4372797374616c,0x3033306463386433666430643163396339626562356230646633383638623235,0x3133363731373934324071712e636f6d,'','',0x3138332e36342e3131352e313435,'1432695933','0','0',0x646237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1107',0x43442d595a43,0x3262643231346536636339396336323835376165356334363839323535653535,0x3539363935333635394071712e636f6d,'','',0x3131302e3138352e31312e3435,'1432705675','0','0',0x623963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1108',0x736e6f7761776f6c66,0x6533633362616232376631303136663461653037666139383234356162336437,0x736e6f7761776f6c66403136332e636f6d,'','',0x3138332e3138352e3231332e3238,'1432707401','0','0',0x396431636566,'');
INSERT INTO pre_ucenter_members VALUES ('1109',0x706368796c61,0x3939346366373065623965343834626432376638306635353534386461376362,0x3330393034313130334071712e636f6d,'','',0x3131342e3131312e3136372e3134,'1432712060','0','0',0x633636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1110',0x6c796e7669766f,0x3965333861663461313234653132646163306630636562373265393264336632,0x3238323030383238344071712e636f6d,'','',0x35392e37372e34332e323232,'1432773697','0','0',0x313430643939,'');
INSERT INTO pre_ucenter_members VALUES ('1111',0x53696c766961,0x6336613334323762323161383236313065626636353434663265386239343064,0x323934393730393933344071712e636f6d,'','',0x3137312e38382e3133332e313739,'1432792282','0','0',0x616534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1112',0x53482d485950,0x3535316339303565656538393835636336346533306362343530303431313763,0x6a6573736963612e6875796970696e6740686f746d61696c2e636f6d,'','',0x3137312e38382e3133332e313739,'1432798427','0','0',0x623062373162,'');
INSERT INTO pre_ucenter_members VALUES ('1113',0x6c616c616c61616d796c,0x3539343237326138636534646439303332386330366133343238666661376136,0x3734373830333337344071712e636f6d,'','',0x312e35382e35362e313632,'1432859171','0','0',0x336435396638,'');
INSERT INTO pre_ucenter_members VALUES ('1114',0x43442d5955454859,0x3765393163383431383463303362396132313230323661623664373666326232,0x3531333735323839374071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1432864243','0','0',0x333331393735,'');
INSERT INTO pre_ucenter_members VALUES ('1115',0xe5aebfe889ba,0x3963666338396334386337313339623630323335633965303833656161383231,0x62656363617379403136332e636f6d,'','',0x3131322e3139332e35392e313032,'1433066251','0','0',0x626464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1116',0x686c313330333136,0x3662646565346536613635626636383031323339313134626133323139373136,0x6d3138363731383734303535403136332e636f6d,'','',0x32372e31372e32392e313733,'1433120013','0','0',0x646464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1117',0x57482d5a4b57,0x3366386638643136313932383266396132353432393864386133316661346361,0x3436303134323535394071712e636f6d,'','',0x3138322e3135312e3136362e313438,'1433120476','0','0',0x633562386438,'');
INSERT INTO pre_ucenter_members VALUES ('1118',0x475a2d545943,0x3166623434303238643565613237643964376666346632353133376566303961,0x3435393338373839384071712e636f6d,'','',0x3138322e3135312e3136362e313438,'1433120543','0','0',0x663963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1119',0x424a2d4358,0x3037383636666366366262336663303363386437616334326635373238396536,0x3331363732363539324071712e636f6d,'','',0x3138322e3135312e3136362e313438,'1433120760','0','0',0x383236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1120',0x424a2d5a525a,0x3535643361333962613730643337653531383863636131303033616232343330,0x7a68616f72616e7a687540676d61696c2e636f6d,'','',0x3138322e3135312e3136362e313438,'1433120829','0','0',0x646534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1121',0x53482d534d59,0x6261623738663066363664306239323036343461643938353736653366663163,0x73696d696c652e73756e403136332e636f6d,'','',0x3138322e3135312e3136362e313438,'1433121405','0','0',0x643761313230,'');
INSERT INTO pre_ucenter_members VALUES ('1122',0x53482d5a534c,0x3865623134656138663737626139373664323466303861383438336465626536,0x3334383739343139344071712e636f6d,'','',0x3138322e3135312e3136362e313438,'1433121853','0','0',0x646464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1123',0x58412d5951,0x6332303932636135643036326636356664666539663935393830666432336234,0x3338303932323434394071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433124276','0','0',0x346137643863,'');
INSERT INTO pre_ucenter_members VALUES ('1124',0x57482d435359,0x6564396232643163666238623530303265303431306630373236353663653065,0x323836303232313031364071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433126554','0','0',0x623030303030,'');
INSERT INTO pre_ucenter_members VALUES ('1125',0x63637937343233,0x3832636166313338663761313539326664626566396466633732633435653962,0x63786a686d3139393440676d61696c2e636f6d,'','',0x32372e31382e3130332e3336,'1433127014','0','0',0x366237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1126',0x43442d4c5952,0x3833303164646538346532373338633438383363656238363364323364663835,0x3233363630323339314071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433130887','0','0',0x376435396638,'');
INSERT INTO pre_ucenter_members VALUES ('1127',0x43442d4c5951,0x6131333136383235383035643930316631353633613532393962386435643631,0x6c6979757169616f31303131403136332e636f6d,'','',0x3232322e3231302e3136382e3739,'1433131027','0','0',0x333530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1128',0x43442d534c4d,0x3262326434343562653439306632396538653830343835306464366262613066,0x3739383337343530384071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433139606','0','0',0x363037613132,'');
INSERT INTO pre_ucenter_members VALUES ('1129',0x485a2d574348,0x6532323662653961303436333134343437653638383536323734626166643730,0x7775636865676e68616f31393932403136332e636f6d,'','',0x3232322e3231302e3136382e3739,'1433214790','0','0',0x363136653336,'');
INSERT INTO pre_ucenter_members VALUES ('1130',0x79696e7875616e6d617274696e,0x6237623462363935613732333563613538393565613763616436613762316137,0x3436373537333939324071712e636f6d,'','',0x3135312e3232392e39362e3733,'1433250396','0','0',0x636364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1131',0x6c6f756973616c756c756c75,0x6436356362323161656631626637393434393431656663346164316132306335,0x323332303139373636344071712e636f6d,'','',0x3231312e36362e32382e313733,'1433258430','0','0',0x656431636566,'');
INSERT INTO pre_ucenter_members VALUES ('1132',0x43442d4c5a59,0x3737383364653963383161643834343032643032643661326462646463383630,0x3731383438373432384071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433300630','0','0',0x363934633566,'');
INSERT INTO pre_ucenter_members VALUES ('1133',0x424a2d485a59,0x6262656265643631356432306537326234386430623364633238306536366562,0x68657a795f3131403136332e636f6d,'','',0x3138322e3135312e3136362e313438,'1433301556','0','0',0x343633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1134',0x485a2d5a5954,0x6231323164363832323761363834363636656437666537346334363334623561,0x313037333431333435364071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433316709','0','0',0x353165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1135',0x485a2d4c696e59,0x3935393437333533386139623239663332326566343938646431656365363063,0x6c696e79616f407567612e656475,'','',0x3232322e3231302e3136382e3739,'1433316903','0','0',0x373438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1136',0x646f6d6574,0x3432626536623464656365303436633838623862373766613064393935333862,0x646e6562756c61403136332e636f6d,'','',0x3131332e35372e37342e313535,'1433334675','0','0',0x333430643939,'');
INSERT INTO pre_ucenter_members VALUES ('1137',0x70626d73,0x3130636636653535303866306562623131386162376561363136646633393761,0x7775786332303031407961686f6f2e636f6d,'','',0x3136322e3135372e382e313831,'1433341638','0','0',0x366162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1138',0x57482d4a5959,0x6336313436393930346466366130373733313531613036643666653862653763,0x3330323733373335354071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433381274','0','0',0x613236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1139',0x436872697374696e65,0x3431353630356363343061386164356639366366353965653130663832613866,0x323639343533363234374071712e636f6d,'','',0x3132352e3132312e3233312e323438,'1433399257','0','0',0x396134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1140',0x485a2d575a,0x3737336238393638376633613533646232303731346566343931616335336263,0x3237353831373734364071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433498284','0','0',0x636265626332,'');
INSERT INTO pre_ucenter_members VALUES ('1141',0x6261727279313134,0x6236373663653866386137306137323430653438333030656165613163303565,0x313833303232383630344071712e636f6d,'','',0x32372e32342e31392e3439,'1433555968','0','0',0x306534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1142',0x626c616e6368656a7262,0x6634383932626265363432656135373638313762313733383465626236623033,0x38313031303634314071712e636f6d,'','',0x3130312e3232382e36342e3432,'1433559656','0','0',0x383335363765,'');
INSERT INTO pre_ucenter_members VALUES ('1143',0x43442d4c4d59,0x3635663366393438663037363563343365363732666663343465363534383961,0x3339363236383137384071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433643230','0','0',0x656332386362,'');
INSERT INTO pre_ucenter_members VALUES ('1144',0x43442d544d,0x6436393065326264333537386265636539653766343664386136346666303231,0x323035343435383238374071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433644311','0','0',0x376364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1145',0x43442d535859,0x3136336161303636323236383437666233343431343931653531343138313165,0x63616e64797869616f7975654073696e612e636e,'','',0x3232322e3231302e3136382e3739,'1433655915','0','0',0x623566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1146',0x43442d5859,0x3265633464373265346333316130373863356563376537623665393466376361,0x73756e6b696e73656140676d61696c2e636f6d,'','',0x3232322e3231302e3136382e3739,'1433726595','0','0',0x333633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1147',0x53482d574a48,0x3435343662386664646266656537353263623835306561646238333035646465,0x77616e676a696e6768616e363638384073696e612e636f6d,'','',0x3232322e3231302e3136382e3739,'1433727656','0','0',0x383161623366,'');
INSERT INTO pre_ucenter_members VALUES ('1148',0x53482d4b484c,0x6235663131313534336465633736653262663035643565316232373039613035,0x3536393530333436374071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433727795','0','0',0x336336356434,'');
INSERT INTO pre_ucenter_members VALUES ('1149',0x475a2d53525a,0x3161643639623863303163383365383032323339333439623130336363356261,0x3534353234393937344071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433732062','0','0',0x653661636663,'');
INSERT INTO pre_ucenter_members VALUES ('1150',0x485a2d4c58,0x6433653632623232353964653934636333323564386166306163303133353766,0x3535343931333038324071712e636f6d,'','',0x3232322e3231302e3136382e3739,'1433752992','0','0',0x306162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1151',0xe883a1e890bde890bd,0x3830343766653835326462356366373365363331383335373064366266346638,0x3131303339383437374071712e636f6d,'','',0x35392e3137322e3137362e313439,'1433817649','0','0',0x313335363765,'');
INSERT INTO pre_ucenter_members VALUES ('1152',0x41474e4553,0x6530303833383936636337343663313433313838363936393432326539383939,0x313037303534373136324071712e636f6d,'','',0x3131342e35342e31372e323438,'1433829463','0','0',0x373133313264,'');
INSERT INTO pre_ucenter_members VALUES ('1153',0x43442d4c48,0x6537646632383766303230376562333363383535333764316239306336373538,0x313533393838343534394071712e636f6d,'','',0x3132352e37302e3138362e3830,'1433830657','0','0',0x313533656336,'');
INSERT INTO pre_ucenter_members VALUES ('1154',0x65647761726469616f,0x3566316535323638636261656137613566633631326433366661303933373839,0x313136353838333339364071712e636f6d,'','',0x36302e3136362e32332e3538,'1433833820','0','0',0x633264633663,'');
INSERT INTO pre_ucenter_members VALUES ('1155',0x53482d534d48,0x3663343564393161346131623262323530383862636133643936306666306532,0x3731343536313239304071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1433899418','0','0',0x613831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1156',0x53482d575a59,0x3135663739626633666263616434323231626264646237333739663936363133,0x616c657877753535406f75746c6f6f6b2e636f6d,'','',0x3232322e3231302e3136382e323337,'1433899463','0','0',0x373938393638,'');
INSERT INTO pre_ucenter_members VALUES ('1157',0x546561737569,0x3765356336336163393762663436333961343539343234376662333464353230,0x79616e676c696e6873697540686f746d61696c2e636f6d,'','',0x3131362e33302e33362e313238,'1433902577','0','0',0x316364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1158',0x485a2d574646,0x3163333530633238313731333835333135333062356333356530646534616534,0x3834373237383731314071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1433914366','0','0',0x656162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1159',0xe4b8b0e5b2ade899b9,0x6461376464653666616433306133313731616634393065346663363566666436,0x3534353132303730364071712e636f6d,'','',0x3131332e3234302e3233342e323238,'1433924955','0','0',0x623562386438,'');
INSERT INTO pre_ucenter_members VALUES ('1160',0x424a2d48594d,0x6231316264373730323538383935396233313162623130343934373134353961,0x3439363332353439304071712e636f6d,'','',0x3132352e37302e3138372e323330,'1434004658','0','0',0x323438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1161',0x424a2d4e4d4a,0x3035313533616561616462636164323032613333333531636135356264393638,0x3735313433333137384071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1434008049','0','0',0x316162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1162',0x424a2d4c695843,0x6635666138623238376138636136316634303135303565633935656365363438,0x3439343233393335394071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1434008152','0','0',0x383430643939,'');
INSERT INTO pre_ucenter_members VALUES ('1163',0x57482d434a59,0x3731653566333563643963643131626432343861363433663363393962393231,0x3334343931363338374071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1434016789','0','0',0x356538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1164',0x6d6f6865353637,0x6336623834343537356565326361616531313133656563633763636565663665,0x333238373634393834314071712e636f6d,'','',0x3131392e3132322e3234382e3936,'1434075906','0','0',0x323331393735,'');
INSERT INTO pre_ucenter_members VALUES ('1165',0x736f756ce6a3b1,0x3735386538356465383865643532643431383833353162333066613664613436,0x3739383337363036314071712e636f6d,'','',0x3130362e33392e3139362e3637,'1434090647','0','0',0x373136653336,'');
INSERT INTO pre_ucenter_members VALUES ('1166',0x63616c6d647265616d,0x3364306134346635326261373966356664363935653633343362376635313633,0x79696e686573616e79696e674073696e612e636f6d,'','',0x3138302e3136302e3139302e313630,'1434097759','0','0',0x663133313264,'');
INSERT INTO pre_ucenter_members VALUES ('1167',0xe8b7afe8a5bfe6b395,0x6363346462643435336262653236663833643531373066383132386638663466,0x6172746875726f36403136332e636f6d,'','',0x3131392e3132322e3234382e323031,'1434100827','0','0',0x626464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1168',0x426572796c736b,0x3237303263643130616364303930393339663963343037666163383732326233,0x6269727469653030403136332e636f6d,'','',0x3138332e3133322e32362e323530,'1434125497','0','0',0x396130333761,'');
INSERT INTO pre_ucenter_members VALUES ('1169',0x4d6178,0x6431623632356266633765643431626234396132306335626164373931306530,0x77616e6771697573693230303740686f746d61696c2e636f6d,'','',0x33362e34382e3131302e35,'1434187644','0','0',0x633434616132,'');
INSERT INTO pre_ucenter_members VALUES ('1170',0x436f6e6e6965,0x3233313039653266333163616434373536363135366465653838626534366631,0x3732373032333532314071712e636f6d,'','',0x3132332e3135312e3138372e313434,'1434248976','0','0',0x306134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1171',0x6d696e79696e67,0x3039666631653137333662313266656133333363613736663132383034353832,0x3630353637393231384071712e636f6d,'','',0x3132332e3134382e3232302e3834,'1434274567','0','0',0x373764653239,'');
INSERT INTO pre_ucenter_members VALUES ('1172',0x6d6972616e646130333038,0x3033313932353334633037356464656139333135616366303761356135656663,0x313530323330373338334071712e636f6d,'','',0x3131332e3130382e3134302e3132,'1434286964','0','0',0x343239663633,'');
INSERT INTO pre_ucenter_members VALUES ('1173',0x5a582d594d59,0x3962643865313666633935346139306532666230353866646630353837663134,0x796d79616f31303233403136332e636f6d,'','',0x3232322e3231302e3136382e323337,'1434337123','0','0',0x333831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1174',0x5a582d464c48,0x3065393036373536373138663761373232663764343736353334316132366263,0x35343531323037303640712e636f6d,'','',0x3232322e3231302e3136382e323337,'1434337221','0','0',0x356361326464,'');
INSERT INTO pre_ucenter_members VALUES ('1175',0x5a582d4c5259,0x6666303434643431613561646135373761303439353665383830623532366631,0x313431323730323233324071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1434337354','0','0',0x613530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1176',0x5a582d574d51,0x3534303966333530316266396539623361626139346434363837663038353036,0x3639313639303231344071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1434337410','0','0',0x323264633663,'');
INSERT INTO pre_ucenter_members VALUES ('1177',0x424a2d4c4c51,0x3632373637616237353132616561636165653234303935613139313866366465,0x6c692e6c757169406c6976652e636e,'','',0x3232322e3231302e3136382e323337,'1434338756','0','0',0x353033643039,'');
INSERT INTO pre_ucenter_members VALUES ('1178',0x424a2d5a484d,0x3533313234666230653039386361663036636234336465363434363038323261,0x686d65697a6840676d61696c2e636f6d,'','',0x3232322e3231302e3136382e323337,'1434338795','0','0',0x623136653336,'');
INSERT INTO pre_ucenter_members VALUES ('1179',0x424a2d574d53,0x3365393633383136303034633638333735343734616135363532326631363063,0x616d7977756c6273403136332e636f6d,'','',0x3232322e3231302e3136382e323337,'1434338832','0','0',0x306162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1180',0x5a65726f6f6f6b,0x6161656531633833316530323266363539393661326238666365353633303631,0x6172746875726f31403136332e636f6d,'','',0x3131392e3132322e3234382e3936,'1434425309','0','0',0x646137643863,'');
INSERT INTO pre_ucenter_members VALUES ('1181',0x43442d485958,0x3035313137616539656433323263643663313935313764383363353162373533,0x313031383730313436394071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434425546','0','0',0x613633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1182',0x43442d5a574c69,0x3036616537373534393063373634656333376565646635353939346137383662,0x323239323535323833334071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434425664','0','0',0x303930663536,'');
INSERT INTO pre_ucenter_members VALUES ('1183',0x424a2d4d5357,0x3731363265646431343366633362343730326662616434663835333137366563,0x6d656e672e313537406f73752e656475,'','',0x3232322e3231302e3136382e313436,'1434443859','0','0',0x333934633566,'');
INSERT INTO pre_ucenter_members VALUES ('1184',0x424a2d575153,0x6339613537643032383735636136643130316530393138393233346463363436,0x77616e71697573693230303740686f746d61696c2e636f6d,'','',0x3232322e3231302e3136382e313436,'1434443986','0','0',0x326534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1185',0x596f756e674d51,0x3830326163363963643136613634316165613461666435303639396463353766,0x79616e676d656e677169303833303339403136332e636f6d,'','',0x3137312e31322e31312e323330,'1434510135','0','0',0x373165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1186',0x58412d575a4c,0x3462393463333336656536636430326163656463643935663732353638653039,0x3431373937333234384071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434521359','0','0',0x666563383265,'');
INSERT INTO pre_ucenter_members VALUES ('1187',0xe5a4a9e584bfe982a3e4b8aae8939d,0x3937396536306437653134383538346637316636366262306363623830626332,0x736875747261637977616e403132362e636f6d,'','',0x35382e3139392e3133302e3431,'1434524321','0','0',0x316534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1188',0x7172353133,0x3632303537393333303631313330663762313166343133303033343539313162,0x3837333235343131334071712e636f6d,'','',0x3232322e3231312e3234352e3339,'1434564872','0','0',0x383133313264,'');
INSERT INTO pre_ucenter_members VALUES ('1189',0x43442d59655259,0x3766383635633137333261383864613537333339353139376531303635383230,0x3338363037333636354071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434589865','0','0',0x396265626332,'');
INSERT INTO pre_ucenter_members VALUES ('1190',0x43532d5953,0x3935623863316538316336393864346538333565653838366133323861383835,0x3834323434383930354071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434590369','0','0',0x316361326464,'');
INSERT INTO pre_ucenter_members VALUES ('1191',0x5a582d594d,0x3432363630383662626536663162306338343030656365643462303034643834,0x796d796d796d796d3131403132362e636f6d,'','',0x3232322e3231302e3136382e313436,'1434592821','0','0',0x356237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1192',0x424a2d4c5854,0x6539633634353564633637623662393539653463306364626461313833623533,0x3934323238363630324071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434594099','0','0',0x333963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1193',0x424a2d535958,0x6234326264663265373034346537396534373837336137623833366131383537,0x3436363331393136304071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434594146','0','0',0x326538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1194',0x424a2d594d51,0x3863323538636432616138646662306333663861373638363264393237656330,0x79616e676d656e677169303833303332403136332e636f6d,'','',0x3232322e3231302e3136382e313436,'1434594222','0','0',0x656364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1195',0x43442d4c6959,0x3033333437313965386162303664363435343935663336663965613534626436,0x3537363233373337344071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434609964','0','0',0x636531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1196',0x58412d594e,0x6332313863376139343364313565376462613430393665386433633038656238,0x3237363438303838324071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434615281','0','0',0x313264633663,'');
INSERT INTO pre_ucenter_members VALUES ('1197',0xe9a1bee6baaae58fa4e58fa4,0x3564643962313566613164613533323061343966383961326635353439383139,0x3932303637313030314071712e636f6d,'','',0x3131322e31372e3233352e313735,'1434621595','0','0',0x626261656239,'');
INSERT INTO pre_ucenter_members VALUES ('1198',0x6d696d696d696368656c6c65,0x3663343636383335333334633836323734303639313534626531666131323636,0x323736373631333034354071712e636f6d,'','',0x3131392e322e382e3433,'1434640233','0','0',0x393037613132,'');
INSERT INTO pre_ucenter_members VALUES ('1199',0x43442d465454,0x3835343062386561633264643163303437396565366133616334333235613264,0x3639343039333532314071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434698756','0','0',0x343566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1200',0x5a582d574a,0x6639653532643264623034643139376132653635363334636430373766326663,0x3631363339303034354071712e636f6d,'','',0x3232322e3231302e3136382e313436,'1434704557','0','0',0x646630353337,'');
INSERT INTO pre_ucenter_members VALUES ('1201',0x5a4f45,0x3833356562663361306261636266636337313562343536323038303437626238,0x313131393138363530304071712e636f6d,'','',0x3132332e3136352e3138372e3639,'1434879606','0','0',0x363761313230,'');
INSERT INTO pre_ucenter_members VALUES ('1202',0x474f47,0x3363303962653161646266376637373030353531396632366139383939393134,0x77616e676a696e68657a69403132362e636f6d,'','',0x37332e31352e3138392e323233,'1434950952','0','0',0x386237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1203',0x53482d53474a,0x6562613438666336643539646531316165336364333336633132646433353338,0x6d696d696b73686968407961686f6f2e636f6d,'','',0x3232322e3231302e3136382e323337,'1435025239','0','0',0x373761313230,'');
INSERT INTO pre_ucenter_members VALUES ('1204',0x485a2d595352,0x3035366337303933356339633265363035356665373230343136656636343466,0x79737231393934403132362e636f6d,'','',0x3232322e3231302e3136382e323337,'1435026758','0','0',0x363764653239,'');
INSERT INTO pre_ucenter_members VALUES ('1205',0x43442d4752,0x6639383462336134363036666430306535373230653435383230643735373832,0x35343037383733344071712e636f6d,'','',0x3132352e37302e3138372e30,'1435028760','0','0',0x383835383362,'');
INSERT INTO pre_ucenter_members VALUES ('1206',0x53482d585a54,0x3439303034376338326232313661656134303432336431643362636139396666,0x313531383130363235374071712e636f6d,'','',0x3132352e37302e3138372e30,'1435039180','0','0',0x636134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1207',0x43442d4c4559,0x3536323737636439623863653033633362353730323835656163613436346239,0x3338333433383431374071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435047549','0','0',0x646332386362,'');
INSERT INTO pre_ucenter_members VALUES ('1208',0x57482d5a58,0x3130306163646466623434656239353534303936613164366534653335363865,0x3537383931373433314071712e636f6d,'','',0x3132352e37302e3138372e30,'1435052775','0','0',0x373633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1209',0x57482d4c4459,0x6663393832393963383735663535313839613061363363626439356333323133,0x3536323835353436384071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435053595','0','0',0x623839353434,'');
INSERT INTO pre_ucenter_members VALUES ('1210',0x7869616f6c75,0x6534363965616663373239643363383434326566323836336636326634396137,0x68687869616f61403136332e636f6d,'','',0x36312e3134312e39342e3330,'1435134490','0','0',0x613364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1211',0x53482d465a57,0x3133623331633136313464373534356438333435356539343765666230336231,0x7765697273756e6e79406c6976652e636e,'','',0x3232322e3231302e3136382e323337,'1435135751','0','0',0x373062373162,'');
INSERT INTO pre_ucenter_members VALUES ('1212',0x485a2d4658,0x3361646436363239646462666665323264353865356434346466383733353539,0x3439323831343237384071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435135845','0','0',0x363033643039,'');
INSERT INTO pre_ucenter_members VALUES ('1213',0xe6a190e88ab13236,0x6332326161623562636630636631393464396632303433393738303964353535,0x3435393039353637344071712e636f6d,'','',0x3130362e33392e3234382e3332,'1435143014','0','0',0x363236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1214',0x74756e676b656c76696e,0x3738363239656539373562336365653934636434306630636264616233343832,0x74756e67766e373132403136332e636f6d,'','',0x312e35352e38372e313138,'1435161655','0','0',0x376435396638,'');
INSERT INTO pre_ucenter_members VALUES ('1215',0x57482d575159,0x6531306566356533303832656531353862623361316566396234656239623334,0x3333323039373538394071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435197312','0','0',0x306364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1216',0x57482d5a5852,0x6536663862303235383634636339643939383366313465383835383438333838,0x3432393632373835384071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435197864','0','0',0x383430643939,'');
INSERT INTO pre_ucenter_members VALUES ('1217',0x57482d575958,0x3132636137346666663934373662626663363766623838376665313031306136,0x3536313332373538344071712e636f6d,'','',0x3132352e37302e3138372e30,'1435199491','0','0',0x336336356434,'');
INSERT INTO pre_ucenter_members VALUES ('1218',0x6d697368756f62756169,0x3733626536333434323366333336313839376265313630373265653030323736,0x687878797969403136332e636f6d,'','',0x3131332e362e3235352e3132,'1435200023','0','0',0x383030303030,'');
INSERT INTO pre_ucenter_members VALUES ('1219',0xe4ba91e6a29331,0x3831616133333165626232613439326532653532323962643462623233316333,0x313333323434373238324071712e636f6d,'','',0x3231392e3233382e3132392e3333,'1435201237','0','0',0x353438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1220',0x424a2d43524c,0x6333663638636335626461343837643131323434666633616265323034626664,0x323734393030393636394071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435203846','0','0',0x363430643939,'');
INSERT INTO pre_ucenter_members VALUES ('1221',0x424a2d4c4c57,0x6230333239353964646636656630613862343065623663353336323031333939,0x3436393433383837344071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435203928','0','0',0x386237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1222',0x43442d585943,0x6634353461346237323938616364343665373235303364633262336430646437,0x3338313639393630394071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435204005','0','0',0x353566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1223',0x43442d5849414f4c,0x3031333237303264353538643338363639333139323736653839663362623162,0x3632353531393131314071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435282879','0','0',0x663165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1224',0x5a582d48574a,0x3065653233666131643930303433633362613361663334346163393533613865,0x3536383936323532394071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435287370','0','0',0x616538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1225',0x43696e64792e6366,0x3130313463336161316664626235396437353637346365653166363934623461,0x66757475726579617070795f63696e6479403136332e636f6d,'','',0x3131342e35342e33312e3135,'1435300702','0','0',0x656233346137,'');
INSERT INTO pre_ucenter_members VALUES ('1226',0xe5be90e6af9be6af9be698afe5b08fe4bb99e5a5b3,0x6330353934366565313062393862636662656534656433363664323134373334,0x333234373631303936314071712e636f6d,'','',0x36302e3138362e3232372e323235,'1435301874','0','0',0x323236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1227',0x68323330363030313039,0x6138366232313534643638633534353239386661666462623230363565663932,0x3431333934333531394071712e636f6d,'','',0x3137352e34332e32302e323330,'1435305162','0','0',0x613339333837,'');
INSERT INTO pre_ucenter_members VALUES ('1228',0x56616e5975616e,0x3038343265323634376464316439316531633234653766643439653130383636,0x3533343836343337344071712e636f6d,'','',0x3138302e3137302e32342e3337,'1435306289','0','0',0x313264633663,'');
INSERT INTO pre_ucenter_members VALUES ('1229',0x646f726973373030,0x3863356530613039626362646561666532383235313761333230626634323666,0x3839383732323535344071712e636f6d,'','',0x3132302e362e37392e3936,'1435308296','0','0',0x383761313230,'');
INSERT INTO pre_ucenter_members VALUES ('1230',0x636376657261,0x3861353265663065653932326239623863613566383763383834333462336663,0x313330303934303636384071712e636f6d,'','',0x3130362e33392e3234382e313335,'1435313748','0','0',0x346531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1231',0x6d766f6e7a7a,0x6536663535373137653235313161313336646565633238326133393335626636,0x7a7261797a6840676d61696c2e636f6d,'','',0x37362e31362e37322e3232,'1435318227','0','0',0x336531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1232',0x777579616e6731313031,0x6330326164343334353637356264303861386334343534616263613766663465,0x796f7578692e777540666f786d61696c2e636f6d,'','',0x3232312e3231372e37302e3736,'1435324263','0','0',0x376332386362,'');
INSERT INTO pre_ucenter_members VALUES ('1233',0x57482d575951,0x3263633939326635313864326161656637663137666534376539326433643531,0x3437363538343634374071712e636f6d,'','',0x3232322e3231302e3136382e323337,'1435367583','0','0',0x663463346234,'');
INSERT INTO pre_ucenter_members VALUES ('1234',0x6c637830363233,0x3030633137633031376631363264393662623336633739616431363061383138,0x3536353039333034354071712e636f6d,'','',0x3130362e38302e36332e3535,'1435369827','0','0',0x336364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1235',0x6a78303774793139393030353135,0x3164333935656338366133656639373336373030323537313939363663616238,0x636f636f3237313837313932313340676d61696c2e636f6d,'','',0x39392e3234302e3138332e3734,'1435375729','0','0',0x316431636566,'');
INSERT INTO pre_ucenter_members VALUES ('1236',0x656d6d796c6975,0x6263613465316464636166373336643265663132316663386334636539616263,0x3337313734313234354071712e636f6d,'','',0x32372e33382e35362e3236,'1435391976','0','0',0x383133313264,'');
INSERT INTO pre_ucenter_members VALUES ('1237',0x6d61726761726574,0x3232343261383562376262373236626265313134356663623863616664336535,0x3930383235363334304071712e636f6d,'','',0x3131392e33332e3137372e313435,'1435462913','0','0',0x313331393735,'');
INSERT INTO pre_ucenter_members VALUES ('1238',0x7665656c613131,0x3264363230653865623333663862336433303033616561356233646666333537,0x7363697373696c656769726c4071712e636f6d,'','',0x3231312e38332e3135342e36,'1435471894','0','0',0x363236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1239',0x4c697361,0x3333323133636132393838336536323533653964646331613030613263333835,0x323732373838303930384071712e636f6d,'','',0x3230372e39332e31332e313436,'1435510121','0','0',0x393831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1240',0x7a7a7932303135,0x3332646331373930613938393666643937363632343939366661646135383739,0x313732323732313730364071712e636f6d,'','',0x3131362e3233332e3132362e3337,'1435541984','0','0',0x303633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1241',0x72616e617461,0x3035323130343337336462613334643033623638653139303364346466663639,0x3133353738393636353636403133392e636f6d,'','',0x3137352e31372e3231362e38,'1435542926','0','0',0x653831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1242',0x736174616d7978383838,0x3533623362666334663431336437653163333066616166613132336534346265,0x79696e7875616e6d617274696e40676d61696c2e636f6d,'','',0x3132322e3232382e3131322e323234,'1435544486','0','0',0x363364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1243',0x62616f,0x6534323462336430633739333133636163363139396466633461643866643739,0x7072656461746f7262616f3932403136332e636f6d,'','',0x3132322e3232352e33362e3639,'1435544920','0','0',0x386538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1244',0x323331363532333930,0x3362623330616338336135313530343336623665663161646262313230333865,0x6c696e617a687532313840676d61696c2e636f6d,'','',0x3131372e3137322e32352e3235,'1435545615','0','0',0x663136653336,'');
INSERT INTO pre_ucenter_members VALUES ('1245',0x53482d534642,0x3936386532626562376266323564666665633236643065623432383661386537,0x7368656e66616e6762696e67403136332e636f6d,'','',0x3232322e3231302e3136382e313634,'1435548471','0','0',0x373831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1246',0x53482d4d594d,0x3436626138653939663739323362386166356231643336316237356362303938,0x33383733323933324071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435564109','0','0',0x643161623366,'');
INSERT INTO pre_ucenter_members VALUES ('1247',0x7368656e6a7132303132,0x6264626361613163626261633765646639626564663439303439373131303564,0x7368656e6a7132303132403136332e636f6d,'','',0x36302e31322e3234362e3831,'1435568097','0','0',0x313239663633,'');
INSERT INTO pre_ucenter_members VALUES ('1248',0x485a2d534a51,0x3331663732313265376565346638613764393230336531663031636632326539,0x7368656e6a7132303133403136332e636f6d,'','',0x3132352e37302e3138372e323431,'1435568263','0','0',0x373636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1249',0x646e7178,0x3363626635316633373935626130336166306239613937363134346232333330,0x3437313230363438314071712e636f6d,'','',0x3137312e3231332e32322e323037,'1435570079','0','0',0x663864323464,'');
INSERT INTO pre_ucenter_members VALUES ('1250',0x736f666961383938,0x6665376238623562353065663335333838353430303663353264323631396263,0x6375697869616f79616e4068696c6f6e6767726f75702e636f6d,'','',0x3131352e3130302e36322e34,'1435574034','0','0',0x326166373965,'');
INSERT INTO pre_ucenter_members VALUES ('1251',0x53482d4c495559554e,0x3434353431343634343966303365666564386261616162643563373863343530,0x62626f7070696c79406f75746c6f6f6b2e636f6d,'','',0x3132352e37302e3138372e323431,'1435636922','0','0',0x613636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1252',0x58412d5a5958,0x3062663337656331656134653865663439363938616164316237393739643539,0x3933373532353737324071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435649584','0','0',0x306237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1253',0x43442d4c69754d59,0x3233633534336561353535656438646238306535306333373264316665353530,0x3537303334303035344071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435650299','0','0',0x623930663536,'');
INSERT INTO pre_ucenter_members VALUES ('1254',0x7279616e7a68616e673933393138,0x3339393235376530363432633761306266316630383263613061393366616136,0x7279616e7a68616e673933393138403136332e636f6d,'','',0x3230322e3132302e3132312e3637,'1435652235','0','0',0x626332386362,'');
INSERT INTO pre_ucenter_members VALUES ('1255',0x485a2d534b4c,0x6439343962613661376238373830393832383434393437383130393965353930,0x3334313830353135394071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435654392','0','0',0x386534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1256',0x416e697461,0x3365656261343136613861396366643163653033623235626662666334643433,0x616e6974612e64752e79756e40686f746d61696c2e636f6d,'','',0x3132342e36342e3233372e3237,'1435707466','0','0',0x613335363765,'');
INSERT INTO pre_ucenter_members VALUES ('1257',0xe5b08fe7bfbc,0x3735623136333837353132663237323833396337653032326630666164313639,0x3533343632333232364071712e636f6d,'','',0x3131342e3131312e3136372e313131,'1435712061','0','0',0x643161623366,'');
INSERT INTO pre_ucenter_members VALUES ('1258',0x424a2d475952,0x3937373361663262613635636664643864393231313665666561383236363435,0x3534303136383930344071712e636f6d,'','',0x3132352e37302e3138372e323431,'1435713743','0','0',0x666265626332,'');
INSERT INTO pre_ucenter_members VALUES ('1259',0xe9a29de4b99de5a696e4bbbbe680a7,0x3435333334343937393334666564636338656635646464613266333463643430,0x313136323238343036314071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435717130','0','0',0x613136653336,'');
INSERT INTO pre_ucenter_members VALUES ('1260',0x77757469616e72756f,0x3762616163303264626166643863313437386132353734656565393738383365,0x777472796f756e6740686f746d61696c2e636f6d,'','',0x3137312e3232312e332e3536,'1435717463','0','0',0x373438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1261',0xe4bc9ae9a39ee79a84e6a091,0x3535373938666231613136313033386235666666303639636334303231666636,0x777472796f756e6740666f786d61696c2e636f6d,'','',0x3137312e3232312e332e3333,'1435735109','0','0',0x353761313230,'');
INSERT INTO pre_ucenter_members VALUES ('1262',0x424a2d48594e,0x6630316161386132643431626565613236636632366432316633633439616630,0x313234333334363539384071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435741740','0','0',0x636534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1263',0x57482d484e,0x6535323336613465343832336436343966356139663839376634363233386466,0x717468756e616e4073696e612e636f6d,'','',0x3232322e3231302e3136382e313634,'1435744814','0','0',0x656538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1264',0x6d616463617477616c6b,0x6436633532643462663139633366333931346266323935636433656437656232,0x6b726f646431393833406c6976652e636e,'','',0x3136352e3232382e3136302e313536,'1435789666','0','0',0x323537626366,'');
INSERT INTO pre_ucenter_members VALUES ('1265',0x424a2d535859,0x3236356438356531346133663139323363636130613762653530306337356262,0x3732393534313630384071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435821022','0','0',0x656166373965,'');
INSERT INTO pre_ucenter_members VALUES ('1266',0x53482d4753,0x3238313530386566383866393165353836326634326563363630373939643837,0x6775616e7375737565403132362e636f6d,'','',0x3232322e3231302e3136382e313634,'1435824339','0','0',0x336336356434,'');
INSERT INTO pre_ucenter_members VALUES ('1267',0x7869616f6c69756c6975,0x6433393263313537353464363034343239343833363730663564363833623331,0x7a6f7562313233343536403136332e636f6d,'','',0x3132332e3131332e34352e3537,'1435827538','0','0',0x326364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1268',0x313935343632393032,0x6462633761663264613432663738646432336366343562356132313530333933,0x3139353436323930324071712e636f6d,'','',0x3131312e3136342e3231352e3631,'1435853945','0','0',0x393835383362,'');
INSERT INTO pre_ucenter_members VALUES ('1269',0x485a2d535159,0x3535323435383865326137343033623631336565343132343738346263386463,0x3732393634343035364071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435886179','0','0',0x333434616132,'');
INSERT INTO pre_ucenter_members VALUES ('1270',0x57482d5959616e,0x6463393236656661653737373066333462653662626562373837643530613931,0x3531373237343838364071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435886346','0','0',0x613636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1271',0x7368646c6868,0x3734353161343930326363633335646632613663386661616662666366303439,0x7368646c6868403136332e636f6d,'','',0x32372e3231352e3230322e3233,'1435891524','0','0',0x346534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1272',0x43532d535253,0x3464613866343965383637346332643463363839626433363734366238383136,0x3531333338323734394071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1435917597','0','0',0x646166373965,'');
INSERT INTO pre_ucenter_members VALUES ('1273',0x4972656e655f6875,0x6534393830353233643035383732306630356337393135313432626534343134,0x3235333232303838364071712e636f6d,'','',0x36312e3133362e3232322e3334,'1435935611','0','0',0x623331393735,'');
INSERT INTO pre_ucenter_members VALUES ('1274',0x6c6979616e6665696572,0x3261316335653637316139356130326630666563336365623430653665663162,0x313530353335313735344071712e636f6d,'','',0x3137312e3232312e32382e3637,'1436024287','0','0',0x663764653239,'');
INSERT INTO pre_ucenter_members VALUES ('1275',0x6b69643837313838,0x3464306139313661666234653436336664306535666666643765326136316135,0x6b69643837313838407961686f6f2e636f6d2e7477,'','',0x3131312e38322e33372e313137,'1436089067','0','0',0x623033643039,'');
INSERT INTO pre_ucenter_members VALUES ('1276',0xe8bf99e9878ce69c89e4b880e5a4a7e69cb5e88ab1,0x3866376661623036326135626435323737633733613734626336363339393064,0x3430393031333030354071712e636f6d,'','',0x3132352e38362e3130362e313131,'1436089292','0','0',0x633537626366,'');
INSERT INTO pre_ucenter_members VALUES ('1277',0xe5b7b4e68b89e68b89e5b08fe9ad94e4bb99,0x6539313731343731313836643939343131316639346664663232613965303332,0x313537323838393537344071712e636f6d,'','',0x3138322e3134392e3138382e313437,'1436150045','0','0',0x643736343137,'');
INSERT INTO pre_ucenter_members VALUES ('1278',0x43442d4c4459,0x3938383832393763363230333865623239303263643930343738303736373832,0x6c696e2e64616e796940686f746d61696c2e636f6d,'','',0x3232322e3231302e3136382e313634,'1436151772','0','0',0x636534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1279',0x43442d444a48,0x3430323565303336366233376136376432393635393931613835313863386338,0x6475616e6a696e686f6e6731303135407961686f6f2e636f6d,'','',0x3232322e3231302e3136382e313634,'1436152044','0','0',0x633331393735,'');
INSERT INTO pre_ucenter_members VALUES ('1280',0x43442d58474d59,0x3235326338333939323662363731303334383137643331383065656636613864,0x3334333930353634394071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1436152633','0','0',0x393930663536,'');
INSERT INTO pre_ucenter_members VALUES ('1281',0x53482d574c59,0x3932663261663734326630386539316631666561376332643833623761323762,0x3839363837313634314071712e636f6d,'','',0x3138322e3134392e3138382e313437,'1436162918','0','0',0x363839353434,'');
INSERT INTO pre_ucenter_members VALUES ('1282',0x53482d4343,0x3066383462643536326638383334383436303266373433336137646536343332,0x3333353839363332354071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1436165479','0','0',0x373530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1283',0x79696e686573616e79696e67,0x3864646163383830376232346565653534623132626264393639346634376261,0x63616c6d647265616d403136332e636f6d,'','',0x3131312e3136342e36322e313636,'1436175075','0','0',0x333835383362,'');
INSERT INTO pre_ucenter_members VALUES ('1284',0xe59cb0e7939ce68891e698afe59c9fe8b186,0x6166373162313462356561623361363530326636663732356465383831336462,0x6c69616f79756a696137324069636c6f75642e636f6d,'','',0x3137312e3232312e32382e32,'1436186187','0','0',0x626538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1285',0x57482d545759,0x6364376336303633363365366232383933343265643536393334663632313433,0x74777968656479403132362e636f6d,'','',0x3232322e3231302e3136382e313634,'1436232148','0','0',0x343934633566,'');
INSERT INTO pre_ucenter_members VALUES ('1286',0xe88ab1e8afade4b88de6b2bee8a1a3,0x3734633565363561626237633633356461653835313932636137333937393032,0x616c6578616e3431406d652e636f6d,'','',0x3232332e37322e3235312e313836,'1436240916','0','0',0x343864323464,'');
INSERT INTO pre_ucenter_members VALUES ('1287',0x43442d584a59,0x6433663461326534616531393961626437363833343034623136376438353432,0x3434333631373934334071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1436249465','0','0',0x393963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1288',0x485a2d595159,0x6435376266636365393035656661303966613337326239623036633232383332,0x636174687979616e71696e79696e67406d736e2e636e,'','',0x3232322e3231302e3136382e313634,'1436260618','0','0',0x613831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1289',0x57482d48594a,0x3463336138653032663762353633343963626330663932323139306164623338,0x3132333432363534314071712e636f6d,'','',0x3138322e3134392e3138382e313437,'1436263531','0','0',0x623434616132,'');
INSERT INTO pre_ucenter_members VALUES ('1290',0x5a582d475852,0x6639373435613035613763383763346632353530376662633234633538613263,0x343039303133303035314071712e636f6d,'','',0x3131382e3132322e38372e3536,'1436311200','0','0',0x306361326464,'');
INSERT INTO pre_ucenter_members VALUES ('1291',0x7779627a6430323031,0x6535333061633234643433383465323665623032663138653137316436333665,0x7779627a64303230314073696e612e636f6d,'','',0x3131342e3234382e3135392e323334,'1436316581','0','0',0x356563383265,'');
INSERT INTO pre_ucenter_members VALUES ('1292',0x49726973,0x3539353462366431323239383630326134373030383537366434366139666664,0x3536343936343038384071712e636f6d,'','',0x3132312e36302e32362e313831,'1436324644','0','0',0x343434616132,'');
INSERT INTO pre_ucenter_members VALUES ('1293',0x73796c6f7665637966,0x6236643263663633303462343437663631356635313932643532333635643364,0x3138323234303838383437403136332e636f6d,'','',0x3138322e3134382e3234312e3238,'1436332950','0','0',0x366162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1294',0x4a41244f4e,0x3265633364336263633635656562303865316234613736343037303636326431,0x313533363337333438324071712e636f6d,'','',0x35382e33342e31382e313536,'1436337374','0','0',0x653661636663,'');
INSERT INTO pre_ucenter_members VALUES ('1295',0x64616e6764616e67,0x3165613330633062646363613064333462356262633531653163383163343938,0x6a616e6579646a646a403136332e636f6d,'','',0x32372e31362e3133342e313430,'1436343796','0','0',0x343839353434,'');
INSERT INTO pre_ucenter_members VALUES ('1296',0x57482d575948,0x6562623566366563363633653863653832333165346261343539663936336364,0x3434333037313933334071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1436349891','0','0',0x336464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1297',0x6e69636f,0x3536363661393633336166613038323964653662623263653235633035303761,0x323932303930393739384071712e636f6d,'','',0x3130362e38302e36312e3136,'1436353976','0','0',0x383434616132,'');
INSERT INTO pre_ucenter_members VALUES ('1298',0xe59d8fe59d8f,0x3064346466633632363530366134373763663363366439336262626138303266,0x3337383030333639334071712e636f6d,'','',0x3131382e3138372e31372e3834,'1436372302','0','0',0x653335363765,'');
INSERT INTO pre_ucenter_members VALUES ('1299',0x53482d4851,0x6130343063626534363630643735666532363362376333616366343138363662,0x3532373634333231374071712e636f6d,'','',0x3232322e3231302e3136382e313634,'1436405183','0','0',0x663533656336,'');
INSERT INTO pre_ucenter_members VALUES ('1300',0x53482d465744,0x6362636566366533613565353164663930353233343938663862383863623531,0x6a61736f6e66616e67353238403132362e636f6d,'','',0x3232322e3231302e3136382e313634,'1436405219','0','0',0x343030303030,'');
INSERT INTO pre_ucenter_members VALUES ('1301',0x4d61726b536869,0x3236393064663730366263646665646635373365323364333936353239303831,0x7377645f6a657272796464403136332e636f6d,'','',0x3138302e3136362e3230322e313935,'1436413468','0','0',0x636630353337,'');
INSERT INTO pre_ucenter_members VALUES ('1302',0x485a2d4d4a59,0x6535376163353066613461613335373363636532626361393439343732383761,0x6d6a79333137403136332e636f6d,'','',0x3232322e3231302e3136382e313634,'1436420464','0','0',0x303434616132,'');
INSERT INTO pre_ucenter_members VALUES ('1303',0x74616e68323331383030303238,0x3365396431663136313138343037306161366438616133373733633038313664,0x3139393331303732384071712e636f6d,'','',0x35382e3231392e35302e313039,'1436427952','0','0',0x306336356434,'');
INSERT INTO pre_ucenter_members VALUES ('1304',0x43532d4452,0x6132323866346637613132623161343435656632316633613230633031323739,0x323231353335343336314071712e636f6d,'','',0x3138322e3134392e3138382e313437,'1436434619','0','0',0x626361326464,'');
INSERT INTO pre_ucenter_members VALUES ('1305',0x686868737373797979,0x3038633130303335616439643661356237663337336538653961383936383363,0x3436383137323833384071712e636f6d,'','',0x3130362e33392e3234382e3335,'1436451925','0','0',0x356630353337,'');
INSERT INTO pre_ucenter_members VALUES ('1306',0x66616e71697169,0x3239666433383334623261643631313239393439313265383330336263303233,0x3739393031333030344071712e636f6d,'','',0x3131342e3131312e3136362e313336,'1436498765','0','0',0x643764653239,'');
INSERT INTO pre_ucenter_members VALUES ('1307',0xe8b49de5a5a5e6ada6e5a4abe4b98be58991,0x3365626234616439643433346139373431393437313933633064666531616137,0x73696d6f6e313139407669702e71712e636f6d,'','',0x34322e34392e33392e3731,'1436510436','0','0',0x343438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1308',0x53482d4c4e,0x3438353834626237306530663336656566323066663935303237636538363962,0x313137393636303035384071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436520565','0','0',0x356531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1309',0x716975686570696e67,0x3239626533383836616265383732636561316135373833656130313435363861,0x3132334071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436520810','0','0',0x613136653336,'');
INSERT INTO pre_ucenter_members VALUES ('1310',0x43532d574a,0x6235393737613235643732323433356334373138393635373263653733313132,0x3637353334313736344071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436521631','0','0',0x666563383265,'');
INSERT INTO pre_ucenter_members VALUES ('1311',0x57482d4368656e5359,0x6336356566316137663061313438353839383564616262313861313738653138,0x6368737931393934403132362e636f6d,'','',0x3232322e3231302e3137302e3837,'1436522516','0','0',0x343239663633,'');
INSERT INTO pre_ucenter_members VALUES ('1312',0xe7baa2e889b2e998bfe79498,0x3465363164316539663237636465353333363131383736333139323132393766,0x3439323339313932304071712e636f6d,'','',0x3130312e36382e3130392e313835,'1436540787','0','0',0x333930663536,'');
INSERT INTO pre_ucenter_members VALUES ('1313',0x5a582d4c4859,0x3864363061666431653839653363303539363239636134616134316162373432,0x73656c656e61333332343136403136332e636f6d,'','',0x3232322e3231302e3137302e3837,'1436580572','0','0',0x633434616132,'');
INSERT INTO pre_ucenter_members VALUES ('1314',0x63353134343731313732,0x6562323862333839643739356434373663316235316432343935613331363735,0x3531343437313137324071712e636f6d,'','',0x3130362e3138342e312e3431,'1436595214','0','0',0x656435396638,'');
INSERT INTO pre_ucenter_members VALUES ('1315',0x6368616e675f7a686970696e67,0x3063313130653632366463313139333564353132336361333932636231326163,0x6368616e675f7a686970696e67403136332e636f6d,'','',0x3131382e3138372e31382e323330,'1436618580','0','0',0x346162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1316',0x53482d4c4659,0x3132653937346239303837616534393831363435303363393631636638336163,0x3635373031353339334071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436749191','0','0',0x373533656336,'');
INSERT INTO pre_ucenter_members VALUES ('1317',0x43442d59574a,0x3036396566316666623230663030306531366435333733303931323430383833,0x3333353939343238314071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436751182','0','0',0x656162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1318',0x43442d5054,0x6239386139353533343263356562656332646230363136633866393265393036,0x3537303936383030394071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436751255','0','0',0x373764653239,'');
INSERT INTO pre_ucenter_members VALUES ('1319',0x424a2d4d4c58,0x3231323462656134306432623733383430623332333836316362353738643930,0x3531343833353834374071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436752025','0','0',0x396630353337,'');
INSERT INTO pre_ucenter_members VALUES ('1320',0x53482d534a48,0x3830383132396138383235343730366436616566363863386534636639356234,0x7368695f6a69616e4062656e746c65792e656475,'','',0x3232322e3231302e3137302e3837,'1436759632','0','0',0x303864323464,'');
INSERT INTO pre_ucenter_members VALUES ('1321',0xe5a49ce5a49ce5a49ce5a49c,0x6236646137653662303436386639373735373738626236323866643138653163,0x7a69796539323034323232403132362e636f6d,'','',0x3232312e382e36372e3536,'1436771823','0','0',0x663236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1322',0x7a68756c696e,0x3763353963653664393830363632353630613162616334393136343264303831,0x3837333435363239304071712e636f6d,'','',0x3138302e3136392e342e3738,'1436772944','0','0',0x306538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1323',0x43532d4c5958,0x3132393865363732326564323665313061376633326238626361373337356430,0x3238313730353838394071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436779110','0','0',0x363533656336,'');
INSERT INTO pre_ucenter_members VALUES ('1324',0x53482d4c4c4d,0x3439326234313430363739646139323036363062396235616536386162313262,0x313031353135363430324071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436836877','0','0',0x643636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1325',0x485a2d5a4d4a,0x3837643263663437616361633166313630623364353133383431383133626130,0x6d656e676a696e6730383138403132362e636f6d,'','',0x3232322e3231302e3137302e3837,'1436836972','0','0',0x633864323464,'');
INSERT INTO pre_ucenter_members VALUES ('1326',0x736861786a79,0x3266633563363166393436643633356365326534386236313539346363616232,0x736861786a79403136332e636f6d,'','',0x3231382e3130362e3138322e3532,'1436851893','0','0',0x353066343234,'');
INSERT INTO pre_ucenter_members VALUES ('1327',0x6a6372726179,0x3830646332316532336536343235343737646661656637363737646363393039,0x6a637261794073696e612e636f6d,'','',0x3231312e3130302e34362e313931,'1436856899','0','0',0x333239663633,'');
INSERT INTO pre_ucenter_members VALUES ('1328',0x485a2d5a585975,0x3264306337613430623932393234653761643362663935663866333932653766,0x3337343839313737394071712e636f6d,'','',0x3132352e36392e362e313130,'1436862004','0','0',0x343661636663,0x3766323031376336);
INSERT INTO pre_ucenter_members VALUES ('1329',0x43532d43594a,0x3436623262393434343364343737656434623634616466316361636161343031,0x3436313235363830384071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1436865551','0','0',0x663636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1330',0x6a6c506f514d3731663239,0x6139393066393934626138383532326465666565313465656461643530633530,0x65617379353764636f403136332e636f6d,'','',0x35392e35382e3134382e3331,'1436946024','0','0',0x386439373031,'');
INSERT INTO pre_ucenter_members VALUES ('1331',0x57482d594b51,0x3631303136393032366165323431343631613837343933363133616666363562,0x3435393938363039334071712e636f6d,'','',0x35392e3137322e34382e313735,'1436960269','0','0',0x646134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1332',0x7368716d72,0x6334353964396132316261626661363634343437303031623564633263373864,0x6f613133786c65403136332e636f6d,'','',0x3134302e3234392e36322e313531,'1436964785','0','0',0x313835383362,'');
INSERT INTO pre_ucenter_members VALUES ('1333',0x69797a756d,0x3830306266316561333561383430616462656131376636343938323335303464,0x6663747974303136323439403136332e636f6d,'','',0x3230332e3139352e3233312e323530,'1436975505','0','0',0x313633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1334',0x417274687572676f6e,0x6432336464303939663261336338633762373362363634383733303330356564,0x617274687572706e406d61696c2e7275,'','',0x3139312e3234332e3138302e313230,'1436979794','0','0',0x323636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1335',0x6661776e,0x3832353737656535656661633964313064383732626139323932366231326464,0x3235313838373932354071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437019861','0','0',0x353066343234,'');
INSERT INTO pre_ucenter_members VALUES ('1336',0x58412d574c43,0x6463383533346339343638333239633631363165643633333765393763303365,0x3536323431333835364071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437024833','0','0',0x316563383265,'');
INSERT INTO pre_ucenter_members VALUES ('1337',0x424a2d5746,0x3636623132366461333065303838376433303738383066613038376231326638,0x3235323235373638354071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437025249','0','0',0x316265626332,'');
INSERT INTO pre_ucenter_members VALUES ('1338',0x424a2d445951,0x3038343331613161396232326133303462653735333536643037343537666235,0x323039353937343036314071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437025302','0','0',0x363364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1339',0x424a2d4843,0x3163656431366261323037353630626361323463643261383530336534336463,0x3836393334333831324071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437025490','0','0',0x323533656336,'');
INSERT INTO pre_ucenter_members VALUES ('1340',0x424a2d4d4359,0x3361356534373037353439343364353532393961333162346261643638633432,0x786966616e66616e6572403136332e636f6d,'','',0x3232322e3231302e3137302e3837,'1437025527','0','0',0x373665613035,'');
INSERT INTO pre_ucenter_members VALUES ('1341',0x424a2d575843,0x3531393538366431303462303834363735393764666131636263343739663666,0x3737333831303332354071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437025591','0','0',0x373165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1342',0x424a2d4751,0x6631336461393563663137366537613066646239353331353138363437653763,0x3833373932323439324071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437025627','0','0',0x623665613035,'');
INSERT INTO pre_ucenter_members VALUES ('1343',0xe794b3e58f8b,0x6638316333346462663161636530396130333066343636656433363961623062,0x323733373235333831324071712e636f6d,'','',0x3131392e33392e3130322e313337,'1437032658','0','0',0x323438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1344',0xe9959ce99da2e58f8de5b084,0x3462626364376663386138666136663530333033656434393536363939316137,0x31323334353637384071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437033461','0','0',0x353930663536,'');
INSERT INTO pre_ucenter_members VALUES ('1345',0x43442d57574c,0x6639666165393130623235646363663233343335393134306562643062373439,0x3337323230363039374071712e636f6d,'','',0x3231382e38382e34352e323338,'1437033640','0','0',0x386630353337,'');
INSERT INTO pre_ucenter_members VALUES ('1346',0x417572746973436574,0x3338393036396333646639323566373761646163393762303339646564613031,0x72656b6c616d61697440667265656d61696c2e636f2e706c,'','',0x37392e3134312e3136362e3233,'1437039584','0','0',0x306137643863,'');
INSERT INTO pre_ucenter_members VALUES ('1347',0x4861726f6c646b6c,0x6464323437656535383830613632303465326466613337613030366339333036,0x737465726f776e696b406261742d706f6c2e706c,'','',0x3135352e3133332e31382e323430,'1437054949','0','0',0x353633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1348',0x424a2d4758,0x6164376336356434633765613839363566393039393661376330616636316134,0x3833373932323439324071712e636d,'','',0x3232322e3231302e3137302e3837,'1437095925','0','0',0x356531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1349',0x736d726773,0x6432396664656232343837616136616439323261323161663362613333636661,0x62786c646c343130343136403136332e636f6d,'','',0x3230332e3139352e3233312e323530,'1437097160','0','0',0x383364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1350',0x6b747a747461717378,0x3430623432323433386564396131333163326334386664376637336338613832,0x6161726f6e657a653038406775676f756d61696c2e636f6d,'','',0x35392e3137342e3130352e313034,'1437106926','0','0',0x653938393638,'');
INSERT INTO pre_ucenter_members VALUES ('1351',0x4d69676f5a6574,0x3061643233363537633530623235616238653632656263326462366663313561,0x69676e61746d61676e61744073747564656e742e7375,'','',0x3139332e3230312e3232372e3733,'1437108443','0','0',0x626534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1352',0x4d616e794c697a,0x3739623065373034316638313964656533343331653465653339653831373839,0x6b6f6c796d616e7940656d61696c2e7375,'','',0x3139332e3230312e3232372e3733,'1437111652','0','0',0x346265626332,'');
INSERT INTO pre_ucenter_members VALUES ('1353',0x66787939323132,0x6239653137363230666565333063366333643736316131646264613233313532,0x313930393938393934314071712e636f6d,'','',0x35382e35312e3139342e3231,'1437113884','0','0',0x633463346234,'');
INSERT INTO pre_ucenter_members VALUES ('1354',0x706266766f676b62,0x6261356539326663316137653437616637666663336132306362366365376232,0x68617474696573743037406775676f756d61696c2e636f6d,'','',0x35392e3137342e3130352e313034,'1437128124','0','0',0x633533656336,'');
INSERT INTO pre_ucenter_members VALUES ('1355',0x676f6e6866,0x3865386364666461353466656430303138663863653335656237363863323935,0x64676e7a64313330333132403136332e636f6d,'','',0x3230332e3139352e3233312e323530,'1437158748','0','0',0x636332386362,'');
INSERT INTO pre_ucenter_members VALUES ('1356',0x78756e6776,0x3364306365626534396135626432313338636332343464363834613336363738,0x6a746365306e76403136332e636f6d,'','',0x3138322e34352e3234362e3439,'1437159594','0','0',0x613963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1357',0x496d6d696e696369703630,0x6138653832313363303038353264653436353866373439376566313936663461,0x6b6565726d6f677967696d657269666640757278372e636f6d,'','',0x33372e35372e3233312e313236,'1437179185','0','0',0x313566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1358',0x53482d4c595a,0x3966366339386139633637656138393838323132326432643231353038313165,0x6c6565796f757a68756f2e383840686f746d61696c2e636f6d,'','',0x3232322e3231302e3137302e3837,'1437181202','0','0',0x326361326464,'');
INSERT INTO pre_ucenter_members VALUES ('1359',0x4a497975797579757975776e6e,0x3765306534616264366362643966346538616362646637643830363836636235,0x323733353432333333354071712e636f6d,'','',0x3231382e352e38392e323339,'1437188831','0','0',0x663633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1360',0x3138383638313935363231,0x3461383164343838366132306665663331306139313738346533613038336236,0x3534303830373933324071712e636f6d,'','',0x3138332e3234362e31362e3236,'1437191460','0','0',0x343732373065,'');
INSERT INTO pre_ucenter_members VALUES ('1361',0x68616e6e69657375,0x3034653030643836356139666165323165396433386335306136316130626635,0x313234313732343036314071712e636f6d,'','',0x3230322e3137352e34382e323230,'1437205960','0','0',0x383839353434,'');
INSERT INTO pre_ucenter_members VALUES ('1362',0xe58fafe58fafe78ca946696f6e61,0x6534316434323735653435396630326464383832653830663063356466396566,0x3133363739373430394071712e636f6d,'','',0x3130312e37312e33382e3233,'1437230176','0','0',0x306237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1363',0x7875637264,0x6235356536363335303865363463393462306131653432646135323564323333,0x76677371726f72403136332e636f6d,'','',0x3138322e34352e3234362e3439,'1437230243','0','0',0x333364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1364',0x3138333632393632363531,0x3531646137343331376664346139356232313436623666343663646234343439,0x3237313435383037354071712e636f6d,'','',0x3132322e39362e3131322e313931,'1437280698','0','0',0x616531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1365',0x46696f6e613132333435,0x3236333466303662343662353832376537323933353263313233336238663936,0x3336333839313938324071712e636f6d,'','',0x36312e3136312e3134352e3930,'1437285275','0','0',0x623963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1366',0x707379,0x6436636237303634316166613363633433623935353234386631643564353535,0x3235313530323935344071712e636f6d,'','',0x3232322e3132382e312e3339,'1437289279','0','0',0x663438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1367',0x4a6173706572546970,0x6434316163613931353435646565303763353738393533386364333766343830,0x617340706f7a79636a6f6e6f77616e69652d70726573746967652e706c,'','',0x3135352e3133332e31382e323430,'1437297371','0','0',0x623239663633,'');
INSERT INTO pre_ucenter_members VALUES ('1368',0x6466767462,0x6566363331326534663662326661373262336230346235646234393164653930,0x726c6e62787539403136332e636f6d,'','',0x3131332e3132322e3232322e323032,'1437301283','0','0',0x333839353434,'');
INSERT INTO pre_ucenter_members VALUES ('1369',0x4a656666726579766f6b,0x3766346262653261373063336337363839363466663663343862656334636164,0x6669746f6c406261742d706f6c2e706c,'','',0x3135352e3133332e31382e323430,'1437302798','0','0',0x653963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1370',0xe78e8be998b3e6988e,0x6364666461636336373133366137323032326636653638623534316632336561,0x77686974652d776f6c662e303037403136332e636f6d,'','',0x3132342e3136362e3234322e323238,'1437307049','0','0',0x393236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1371',0x57617272656e6d616773,0x3231646163643530386266386331613638313966666161326334663037653263,0x73746572406261742d706f6c2e706c,'','',0x3135352e3133332e31382e323430,'1437308310','0','0',0x363864323464,'');
INSERT INTO pre_ucenter_members VALUES ('1372',0x726162626963756265,0x3535343838663837646235316239313231656561333135306439386365643631,0x726162626963756265403136332e636f6d,'','',0x3131382e3138372e32312e3536,'1437308587','0','0',0x623736343137,'');
INSERT INTO pre_ucenter_members VALUES ('1373',0x4c45534c4559,0x6233306434393137643631653662623035373361623531656632636137306366,0x726f73656c6c6563616c797840796561682e6e6574,'','',0x3131362e39352e342e313731,'1437309635','0','0',0x333339333837,'');
INSERT INTO pre_ucenter_members VALUES ('1374',0x52616e64616c6c74616765,0x6164623762393161316265326231343263623461303430303635393734396264,0x646f62757a696e3440636172616d61696c2e636f6d,'','',0x3135352e3133332e31382e323430,'1437311376','0','0',0x303566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1375',0x44616e69656c42756773,0x3831363765326336356531393562663439643961316561616233383766663638,0x74796c6b6f72406261742d706f6c2e706c,'','',0x3135352e3133332e31382e323430,'1437318485','0','0',0x356137643863,'');
INSERT INTO pre_ucenter_members VALUES ('1376',0x4f646170726572,0x6631396631643933376364376133313835343538623633303439616364303437,0x6f646162657361406269676d69722e6e6574,'','',0x3139332e3230312e3232372e3733,'1437343129','0','0',0x396137643863,'');
INSERT INTO pre_ucenter_members VALUES ('1377',0x57482d5844,0x6636313633643530326363326266303132333535386436343137373039646335,0x3834333031353533354071712e636f6d,'','',0x3231382e38382e34352e323338,'1437355880','0','0',0x383232353531,'');
INSERT INTO pre_ucenter_members VALUES ('1378',0x43532d4c4b59,0x3935666134616464383730366530633632346636626433633037386562306162,0x3434323733313138394071712e636f6d,'','',0x3231382e38382e34352e323338,'1437357695','0','0',0x663037613132,'');
INSERT INTO pre_ucenter_members VALUES ('1379',0x43532d43594e,0x6430383835613532373061636263383462386461353436613962643563616636,0x3436333439363037354071712e636f6d,'','',0x3231382e38382e34352e323338,'1437357739','0','0',0x626166373965,'');
INSERT INTO pre_ucenter_members VALUES ('1380',0x43532d465a58,0x6134326436316238663336393364653438386534396361663535323636353536,0x3532383936303538314071712e636f6d,'','',0x3231382e38382e34352e323338,'1437358809','0','0',0x393831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1381',0x43532d48544a,0x6663396562373163373934646336616362393638353431393335376636653662,0x6875696e6665726e6f36313540686f746d61696c2e636f6d,'','',0x3232322e3231302e3137302e3837,'1437360355','0','0',0x336531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1382',0x736361726c657479616e67,0x6537666166333763613565323834366236633730386136373938373334333834,0x3533343238383237354071712e636f6d,'','',0x3131342e3234382e32322e323439,'1437360407','0','0',0x373963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1383',0x43442d5059,0x6637643532626536393262353631363063613230383335623336386565313033,0x636f6f6b6965706d6d40686f746d61696c2e636f6d,'','',0x3232322e3231302e3137302e3837,'1437360414','0','0',0x653264633663,'');
INSERT INTO pre_ucenter_members VALUES ('1384',0x57482d4d4a4a,0x3431376435613539363938356466313462333135393531313163393465633261,0x3732373432393136334071712e636f6d,'','',0x3231382e38382e34352e323338,'1437361250','0','0',0x323736343137,'');
INSERT INTO pre_ucenter_members VALUES ('1385',0x756e6e65667563766577,0x6262343463626237323431656236626261353363396432306363653038376438,0x696d697a7574406173646464646d61696c2e6f7267,'','',0x39312e3230302e31322e313136,'1437364968','0','0',0x386531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1386',0x6568616d65726967697261,0x6238363230363334333864346631663961643837623466386161333664343539,0x7165716f77656c65406173646464646d61696c2e6f7267,'','',0x39312e3230302e31322e313136,'1437365476','0','0',0x343831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1387',0x697975667578616f6e,0x3433653834383530313233633166373330363837343631326535333537336237,0x656a7261646163406d616e6e6264696e666f2e6f7267,'','',0x39312e3230302e31322e313136,'1437365506','0','0',0x323636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1388',0x6f7865786568696d61747570,0x3866653136663135363133653033356365313434363831626633613164633830,0x6f6b756c6970756240617364666f6f66662e6f7267,'','',0x39312e3230302e31322e313136,'1437365583','0','0',0x666233346137,'');
INSERT INTO pre_ucenter_members VALUES ('1389',0x485a2d43485a,0x3066303363363139336162346537656433336534363639306164613436303237,0x3334373339353337374071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437370552','0','0',0x383732373065,'');
INSERT INTO pre_ucenter_members VALUES ('1390',0x485a2d5a534e,0x3162386435663564613834646639323233306463663163646439303362646264,0x3237323833383138374071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437370609','0','0',0x313839353434,'');
INSERT INTO pre_ucenter_members VALUES ('1391',0x53482d575859,0x3337623365656261323063663066663961336461656138366266323937616539,0x7869616f7933393940676d61696c2e636f6d,'','',0x3232322e3231302e3137302e3837,'1437375303','0','0',0x373066343234,'');
INSERT INTO pre_ucenter_members VALUES ('1392',0x53482d5843,0x6533376434653566346466376638336437623131333432366532613635623733,0x7869616e6732407075726475652e656475,'','',0x3232322e3231302e3137302e3837,'1437375349','0','0',0x356534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1393',0xe5b08fe4bc8de4b88de59583e59083e8a5bfe7939c,0x3933333135353535393739383338326661393465336635383133376439336233,0x3437323137393631394071712e636f6d,'','',0x3131332e35372e3232342e3234,'1437376494','0','0',0x653335363765,'');
INSERT INTO pre_ucenter_members VALUES ('1394',0xe5b08fe5b08fe5909be5ad90e585b0,0x6338633633353166363239383366666234643762626335353162613637393931,0x70686f746f6c6a403132362e636f6d,'','',0x3130312e38302e3138302e323338,'1437378712','0','0',0x383165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1395',0x646a6a6e77,0x6639343130383733343366663730623230363838363136363935396264363664,0x69396171367070403136332e636f6d,'','',0x3131332e3132322e3232322e323032,'1437378757','0','0',0x353930663536,'');
INSERT INTO pre_ucenter_members VALUES ('1396',0x54686f6d617350797065,0x3864366261373732313863343635353735646133316566316331626234313034,0x6d65737a40706f7a79636a6f6e6f77616e69652d70726573746967652e706c,'','',0x3135352e3133332e31382e323430,'1437381564','0','0',0x636361326464,'');
INSERT INTO pre_ucenter_members VALUES ('1397',0x424a2d434c59,0x3537316134393534366638373837666362316438333034363131383663323635,0x636861696c6979616e6740796561682e6e6574,'','',0x3231382e38382e34352e323338,'1437381712','0','0',0x306439373031,'');
INSERT INTO pre_ucenter_members VALUES ('1398',0x6a6f686e736f6e6368656e3134,0x6338323038613435653532316161373562623137663764393339356165663334,0x6a6f686e736f6e6368656e3134403136332e636f6d,'','',0x3131302e35332e3135312e3232,'1437381827','0','0',0x333963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1399',0x56697669616e,0x3431656563616562383734313266393433373331366564643861313363616531,0x3435343031363539374071712e636f6d,'','',0x3132332e3133392e31382e3135,'1437386265','0','0',0x393438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1400',0x43442d435454,0x3932386634346436353535653461373539356137363635636462393839316138,0x3630333832323738334071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437386584','0','0',0x386130333761,'');
INSERT INTO pre_ucenter_members VALUES ('1401',0x6269616e6361,0x6433633365656234653936393334653765323164366636383335326132316563,0x3639333135333939364071712e636f6d,'','',0x3137352e32352e32382e3539,'1437446131','0','0',0x336531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1402',0xe68891e58fabe58da1e58da1e7bd97e789b9,0x3363383636623633633730323134383365373534626664376365616166633764,0x6b697277696e776f6e67407961686f6f2e636f6d,'','',0x3131372e33302e3137382e323134,'1437446454','0','0',0x366162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1403',0x7361696c6b,0x3561626662666235343463303464363433323435336666646138316132326631,0x333438373934313934344071712e636f6d,'','',0x36312e3136342e3231312e3135,'1437448035','0','0',0x333430643939,'');
INSERT INTO pre_ucenter_members VALUES ('1404',0xe4b8ade59bbde6b2b3e58c97e59cb0e59daa,0x3336393365613137343332316562626335313432353666343731633037366234,0x7a686f6e6767756f646970696e67403132362e636f6d,'','',0x3132332e3138322e3135302e313932,'1437449112','0','0',0x383533656336,'');
INSERT INTO pre_ucenter_members VALUES ('1405',0x796470766f,0x3933363262613562386136346137386136383439303838386630346138626332,0x6d636b7330673373403136332e636f6d,'','',0x3134302e3234392e36332e3631,'1437458219','0','0',0x623636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1406',0x53482d515159,0x3137333632656635633462396534306566353934336461643834656566313837,0x78696e78696e3333364071712e636f6d,'','',0x3231382e38382e34352e323338,'1437468158','0','0',0x653530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1407',0x53482d5953,0x6530393564336138386261636539393138643361363437613165656633366166,0x3730343731303237304071712e636f6d,'','',0x3231382e38382e34352e323338,'1437468203','0','0',0x623633326561,'');
INSERT INTO pre_ucenter_members VALUES ('1408',0x43442d48574c,0x3039656331363338326166626163373338396263353836616561333237323130,0x3339363534383136334071712e636f6d,'','',0x3231382e38382e34352e323338,'1437471675','0','0',0x623530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1409',0x43442d59534c,0x3165653835643231613732343536346436653962336531323063313937623165,0x3431383134333337394071712e636f6d,'','',0x3231382e38382e34352e323338,'1437471724','0','0',0x633831623332,'');
INSERT INTO pre_ucenter_members VALUES ('1410',0x485a2d5a686f75594a,0x3763616436616230366335326433366461333431393733373131353530363735,0x3135373537313033333133403136332e636f6d,'','',0x3231382e38382e34352e323338,'1437471810','0','0',0x323463346234,'');
INSERT INTO pre_ucenter_members VALUES ('1411',0xe5a299e4b88ae79a84e59091e697a5e891b5,0x6332303337346636393564356464613932656336343033626138623637363931,0x617877656c6c313130403132362e636f6d,'','',0x3138332e35342e31342e313330,'1437471896','0','0',0x393030303030,'');
INSERT INTO pre_ucenter_members VALUES ('1412',0x736572696e617368616e,0x3262616234663363633337626530373165306633663339616436666334343765,0x3634363538343636394071712e636f6d,'','',0x3130362e33372e3130352e313331,'1437528240','0','0',0x303438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1413',0xe5bc98e58d9ae69599e882b2766a6a,0x6264313861373362393736613330656137323266663730316666363936326537,0x7163776266686771403132362e636f6d,'','',0x3132332e3136342e32362e313630,'1437533595','0','0',0x623264633663,'');
INSERT INTO pre_ucenter_members VALUES ('1414',0xe5bc98e58d9ae69599e882b2616674,0x6362616435346566663030383037333962663633376335376166663833613963,0x746377696d73646d403132362e636f6d,'','',0x3132332e3136342e32362e313630,'1437536435','0','0',0x333963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1415',0xe5ad99e6829fe7a9ba383434,0x3434356366353335613662663437383339333463313432653063333630323864,0x6773716470667a7876403136332e636f6d,'','',0x3138332e31342e39322e3739,'1437536836','0','0',0x343839353434,'');
INSERT INTO pre_ucenter_members VALUES ('1416',0x72617962616e7357617370,0x6432663332623833616339306231366562386165336266643237633032343535,0x636865617072617973406f75746c6f6f6b2e636f6d,'','',0x3139392e33332e3132332e313134,'1437547391','0','0',0x663938393638,'');
INSERT INTO pre_ucenter_members VALUES ('1417',0xe596b5e4ba86e4b8aae592aa30353230,0x3731306334613765376339663530373237353765366462663138393632646433,0x7a7379343740686f746d61696c2e636f6d,'','',0x3137312e3232312e32382e3137,'1437548337','0','0',0x316435396638,'');
INSERT INTO pre_ucenter_members VALUES ('1418',0x4865726d696f6e65,0x6365303462666630326462383161393231616535373836383932616466393731,0x3435303038343430384071712e636f6d,'','',0x3232312e3233352e3130392e313734,'1437564007','0','0',0x373636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1419',0x5265626563636167,0x3030393737613139326631646566346465323865303561633836323931353037,0x313832333639393738314071712e636f6d,'','',0x3131342e3232332e3137302e3138,'1437567262','0','0',0x653665613035,'');
INSERT INTO pre_ucenter_members VALUES ('1420',0x73616b757261,0x3435346437663763333930393062323432623864366563306536633136376336,0x3431323331333833384071712e636f6d,'','',0x3132332e3132312e33362e313637,'1437567573','0','0',0x353963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1421',0xe5bca5e5bca5e5bca5e5bca5e5bca5,0x6134613634393165613462386461313663656338333034333061346430373632,0x3635313134383238394071712e636f6d,'','',0x35382e34352e3139322e313835,'1437576994','0','0',0x323236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1422',0x4d616e43616c73,0x3061363537353936616434623465613030303239353366363864653336626230,0x6b6f6c796e796d6173796e79406e78742e7275,'','',0x3139332e3230312e3232372e3733,'1437601347','0','0',0x333963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1423',0xe5bc98e58d9ae69599e882b26f747a,0x3662373133326638623835333534643937346437343930303530646462366262,0x38697070796d6473403132362e636f6d,'','',0x3132332e3136342e32362e313630,'1437615048','0','0',0x393033643039,'');
INSERT INTO pre_ucenter_members VALUES ('1424',0x5a582d575948,0x6436353637373463306137366437396137663466323635343038303034643334,0x6c6976656c7973756b6b6940686f746d61696c2e636f6d,'','',0x3232322e3231302e3137302e3837,'1437621436','0','0',0x633661636663,'');
INSERT INTO pre_ucenter_members VALUES ('1425',0x5a582d5a59,0x6238336438313066613339323334313134626237373161396431323132623736,0x79696e677a68616e6764656d6940686f746d61696c2e636f6d,'','',0x3232322e3231302e3137302e3837,'1437621842','0','0',0x326237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1426',0x6c6979616e7869,0x3361356639393532656265656163386439666438323437373233623164633763,0x3733353831323330344071712e636f6d,'','',0x3138332e36322e3136362e323330,'1437622285','0','0',0x643165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1427',0x5a582d575759,0x3031393163323363633066356435353932363964383532393238363264343833,0x76697669616e2e777532343836353740686f746d61696c2e636f6d,'','',0x3232322e3231302e3137302e3837,'1437622649','0','0',0x393864323464,'');
INSERT INTO pre_ucenter_members VALUES ('1428',0x424a2d4875616e675a59,0x6364396666363530376435346331376166343664363761393065383333303130,0x3431333231393034394071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437623587','0','0',0x336630353337,'');
INSERT INTO pre_ucenter_members VALUES ('1429',0x424a2d575359,0x3163663161373466333566616231633339653938383833663135383461316132,0x77616e6773687579616e673937403132362e636f6d,'','',0x3232322e3231302e3137302e3837,'1437623700','0','0',0x343835383362,'');
INSERT INTO pre_ucenter_members VALUES ('1430',0x424a2d5a5944,0x6437653138336534623138336663363632663361643465373363656566626430,0x313538343133333332304071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437623740','0','0',0x633136653336,'');
INSERT INTO pre_ucenter_members VALUES ('1431',0x6175666567716966,0x6430653331336463343234376431376538383762303737303734616231313562,0x756c75747562696840686f7465726d61696c2e6f7267,'','',0x39312e3230302e31322e37,'1437627219','0','0',0x333732373065,'');
INSERT INTO pre_ucenter_members VALUES ('1432',0x6166696c75717a69,0x3031653561356165653437326463313437346631623233333431663162333832,0x616e696a696574406d61696c666e6d6e672e6f7267,'','',0x39312e3230302e31322e37,'1437627219','0','0',0x333963363731,'');
INSERT INTO pre_ucenter_members VALUES ('1433',0x757461646c6574,0x3237643065636264393265313863376330393437626236363562333063326535,0x6f63696a756c6f40656d61696c7274672e6f7267,'','',0x39312e3230302e31322e37,'1437627237','0','0',0x353864323464,'');
INSERT INTO pre_ucenter_members VALUES ('1434',0x485a2d4a4c5a,0x6334633338366631363534636535306637303836303235313064636339366563,0x3530313736323631364071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437629926','0','0',0x366137643863,'');
INSERT INTO pre_ucenter_members VALUES ('1435',0x766979617961,0x6434343738363461616263636263376266373539363835353132633231303233,0x3431303233343432374071712e636f6d,'','',0x3131392e3138372e3136312e30,'1437633205','0','0',0x353430643939,'');
INSERT INTO pre_ucenter_members VALUES ('1436',0x5a582d43594a,0x6430643136373761636461383334656562373639343339343335636363306631,0x3239303732393130304071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437634880','0','0',0x303839353434,'');
INSERT INTO pre_ucenter_members VALUES ('1437',0x5a582d4c5144,0x3530623431303634363239363961393332633265653736336630323333323335,0x323431383934373532304071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437638945','0','0',0x316364666536,'');
INSERT INTO pre_ucenter_members VALUES ('1438',0x7169616e74776f303030,0x3332643130616334383434333530303965623632313336366137346161333533,0x75756c796e686c7073403136332e636f6d,'','',0x3131332e3131382e37312e3834,'1437644870','0','0',0x366233346137,'');
INSERT INTO pre_ucenter_members VALUES ('1439',0x42656c6c6170616d,0x6665323163303136626164353264383661333035323465623036363162363166,0x62656c616972656e406269676d69722e6e6574,'','',0x3139332e3230312e3232372e3733,'1437651179','0','0',0x623661636663,'');
INSERT INTO pre_ucenter_members VALUES ('1440',0x436172726f74333132,0x6562656366363633613262363466636436363534643964326634363835373437,0x636172726f7434303732303538403136332e636f6d,'','',0x36312e3134322e37352e3832,'1437651893','0','0',0x353430643939,'');
INSERT INTO pre_ucenter_members VALUES ('1441',0x7368657272796a696e30363230,0x6663623736373963323533303638376137393234656438366362343130656238,0x7368657272796a696e303632304071712e636f6d,'','',0x3131342e3131312e3136362e3938,'1437656425','0','0',0x393566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1442',0x787878694b79,0x3163326661353037633164656462616130616462366332363665336537313738,0x3232313533343336314071712e636f6d,'','',0x3131392e3133392e3138382e323332,'1437660816','0','0',0x303434616132,'');
INSERT INTO pre_ucenter_members VALUES ('1443',0x7a63676773,0x6364616465666532623366383233653939666364323133393361323131666238,0x687539393932373433403136332e636f6d,'','',0x3232302e3137302e3233352e313631,'1437664574','0','0',0x653236323561,'');
INSERT INTO pre_ucenter_members VALUES ('1444',0x5269636861726453796d6e,0x3136626665636338366536396432636562353831323430643061343438306461,0x696e666f406b726564797462657a2e706c,'','',0x3138352e36302e3233302e3430,'1437669229','0','0',0x643566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1445',0xe5bc98e58d9ae69599e882b2717371,0x3535656162386363656533336531623835343136313234666632383338343266,0x3061646f7633336a403132362e636f6d,'','',0x3131322e3130312e372e3938,'1437700223','0','0',0x666534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1446',0x6661776e3031,0x6239343433306363336334623965396634643436323462353964643461303261,0x3138333534353330354071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437702995','0','0',0x336538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1447',0x74657374303135,0x3761393365323233653932393162316661643137336534336533653737666531,0x3435363132333135394071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437707751','0','0',0x376237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1448',0x53482d4c4d57,0x3332633864316235343835313032313361613537636463333236333532623533,0x3735363632363139314071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437708984','0','0',0x383364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1449',0xe69d8ee8be89,0x3330643861643439316437393634666565633063383533383330306634323564,0x323634343532383235384071712e636f6d,'','',0x3132352e34362e39302e3337,'1437723053','0','0',0x653030303030,'');
INSERT INTO pre_ucenter_members VALUES ('1450',0x627a716834383330,0x6535326339353938663966656363393133396335306164343038373030386639,0x313034343832313032304071712e636f6d,'','',0x32372e3135362e32382e313036,'1437724487','0','0',0x373331393735,'');
INSERT INTO pre_ucenter_members VALUES ('1451',0x485a2d51594a,0x6336646530383062656331393431356632646337646464363139353936336339,0x3237313230343639354071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437794882','0','0',0x323736343137,'');
INSERT INTO pre_ucenter_members VALUES ('1452',0x43442d534c53,0x3261356266353561373237333732323865656266383764646361396266613735,0x323531333238333333364071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437801993','0','0',0x393364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1453',0x7169616e6a3933,0x3133663964353562356633613737393338386330393630343434636339323463,0x71796a6d6d616e403136332e636f6d,'','',0x3131372e3133362e382e3736,'1437804779','0','0',0x623566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1454',0x73746576656e353130323834,0x3265343932363430323634303831356536653062646131613236326631633631,0x313732363333363737314071712e636f6d,'','',0x3137312e34332e3231382e3831,'1437808031','0','0',0x666332386362,'');
INSERT INTO pre_ucenter_members VALUES ('1455',0x6e657768656176656e32333538,0x6464323739646261633563356465383463643932396532396462383336633931,0x6e657768656176656e313233353840686f746d61696c2e636f6d,'','',0x3231382e38322e3235302e3538,'1437835838','0','0',0x653331393735,'');
INSERT INTO pre_ucenter_members VALUES ('1456',0x6c6578696e65,0x3161613336653932623239613361613336396266316237353133373837383937,0x6c6578696e656c6378403136332e636f6d,'','',0x3137312e3232312e332e3132,'1437877890','0','0',0x326336356434,'');
INSERT INTO pre_ucenter_members VALUES ('1457',0x777a7a777a7a5f31303230,0x3062383465393761303463316466343732663363633331356535636563366561,0x777a7a777a7a5f31303230403132362e636f6d,'','',0x3131342e3131312e3136372e313534,'1437891984','0','0',0x306439373031,'');
INSERT INTO pre_ucenter_members VALUES ('1458',0xe69da8e79eb331313233,0x3763376230363963623963303162323339376363623033353430346162363431,0x3138303037393231313233403138392e636e,'','',0x3131362e3233312e3133362e323230,'1437958854','0','0',0x363339333837,'');
INSERT INTO pre_ucenter_members VALUES ('1459',0x485a2d484a48,0x6633616364363439313163643331373865646534653933363966343334663037,0x3331373230343737334071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437959801','0','0',0x393037613132,'');
INSERT INTO pre_ucenter_members VALUES ('1460',0xe88c83e681ba,0x6631373161663962386637313965653237336135653333353033636338353934,0x666b383335363531383930403136332e636f6d,'','',0x3132352e33332e37362e313537,'1437960472','0','0',0x383438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1461',0x3133333735373937333733,0x3163323963373130373938613134303064633034366635393039656330313462,0x77747231393934363133403136332e636f6d,'','',0x3131312e3136312e3131362e323233,'1437961598','0','0',0x656233346137,'');
INSERT INTO pre_ucenter_members VALUES ('1462',0x656368656c6f6e,0x3735393331333334306634663734653634616662316464386536646234636539,0x323537353132323339314071712e636f6d,'','',0x3231382e31372e3233312e313331,'1437963335','0','0',0x373566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1463',0x467572794c6f6d65,0x3363663265386231326665363138656334373462323766653037653161666535,0x6c73616e647769636b40616f6c2e636f2e756b,'','',0x33312e3138342e3233382e323039,'1437963558','0','0',0x366563383265,'');
INSERT INTO pre_ucenter_members VALUES ('1464',0x6c696c666179,0x6461663666616433663139623234323762383364626234633664323638643534,0x3237313931323733374071712e636f6d,'','',0x3132352e37312e35322e313133,'1437964430','0','0',0x656439373031,'');
INSERT INTO pre_ucenter_members VALUES ('1465',0x485a2d575a4c,0x3338396230343031663335383935383362663337383536336435316263396339,0x313032373036383630354071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437967779','0','0',0x336361326464,'');
INSERT INTO pre_ucenter_members VALUES ('1466',0xe5bc98e58d9ae69599e882b2797766,0x3534613966616532653965633332396331396363393530386461303066666563,0x7470346c7a647870403132362e636f6d,'','',0x3131322e3130312e312e313032,'1437968994','0','0',0x326265626332,'');
INSERT INTO pre_ucenter_members VALUES ('1467',0x53482d4c5946,0x3530623762343737653938663933313536633139376566653034373563356236,0x636f6f6c6c7966403132362e636f6d,'','',0x3232322e3231302e3137302e3837,'1437969559','0','0',0x373530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1468',0xe5bc98e58d9ae69599e882b2706d6f,0x3835363934396133376431643262383465373562656632623432616566663933,0x7a79676572657272403132362e636f6d,'','',0x3131322e3130312e312e313032,'1437976016','0','0',0x306332386362,'');
INSERT INTO pre_ucenter_members VALUES ('1469',0x43442d4c4d4c,0x3835643632653730323738353165333864336135373965613461326230333630,0x313237313934303730344071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437981883','0','0',0x626531313133,'');
INSERT INTO pre_ucenter_members VALUES ('1470',0x485a2d59594b,0x3537313537376434333332343839316430393637316130393833373735646361,0x79796b334071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437981938','0','0',0x323934633566,'');
INSERT INTO pre_ucenter_members VALUES ('1471',0xe5bc98e58d9ae69599e882b2717761,0x3561623735613632666535393564613536303330383638333336633466636161,0x6f307569776e7176403132362e636f6d,'','',0x3131322e3130312e312e313032,'1437984095','0','0',0x666237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1472',0x485a2d4c5958,0x3031316237653263316135656330346134323234653161643535663131333437,0x3532343339333936354071712e636f6d,'','',0x3232322e3231302e3137302e3837,'1437984241','0','0',0x316332386362,'');
INSERT INTO pre_ucenter_members VALUES ('1473',0x53746572616d6168,0x3166633464303466393338333636666365383532333237656366353333326238,0x626172626172617374657261406269676d69722e6e6574,'','',0x3139332e3230312e3232372e3733,'1437984623','0','0',0x663764653239,'');
INSERT INTO pre_ucenter_members VALUES ('1474',0x7a6a617165,0x3332383037373736663737616635653764636139613732346638623635346436,0x776b72726b6c70403136332e636f6d,'','',0x3134302e3234392e36332e3631,'1437986178','0','0',0x323264633663,'');
INSERT INTO pre_ucenter_members VALUES ('1475',0x43442d57594848,0x3337363430303338613065666361643564346433613966386165336239303132,0x3331343431353035394071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438047916','0','0',0x636439373031,'');
INSERT INTO pre_ucenter_members VALUES ('1476',0x5a582d585050,0x6563646136343931623938393361343664663538616633646439313165363731,0x3137323539333535384071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438048006','0','0',0x363566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1477',0x58412d584a4c,0x6162363832633230663834656539333234363139303562626632346434356432,0x3336313936363731304071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438048050','0','0',0x323537626366,'');
INSERT INTO pre_ucenter_members VALUES ('1478',0x58412d4c4d4a,0x3063383061626662393131643865376235353735633832323235623533623463,0x3331333037333638304071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438048099','0','0',0x336538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1479',0x57482d574a59,0x3339396238363037306666393535336334333330383833666136333734623236,0x38363732333331344071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438048207','0','0',0x666431636566,'');
INSERT INTO pre_ucenter_members VALUES ('1480',0x43532d57594a52,0x6565613462346666303237363965303539363264656232626162663836343935,0x3430343733333436314071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438048249','0','0',0x393165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1481',0x7030506f483274326c3239,0x6264366662636532326637653061303466346530666236336364643036623735,0x323738353534333432334071712e636f6d,'','',0x3131372e32362e3232322e313031,'1438049698','0','0',0x323764653239,'');
INSERT INTO pre_ucenter_members VALUES ('1482',0x42656e714c6f6d65,0x6364343739633537656564316335633061613633353063306335386365613462,0x62656e6c6177736b7940616f6c2e636f2e756b,'','',0x33312e3138342e3233382e323039,'1438053501','0','0',0x643661636663,'');
INSERT INTO pre_ucenter_members VALUES ('1483',0x424a2d574358,0x6334333662363636343161363965363537663161393731613736333735333262,0x3630313235323630364071712e636f6d,'','',0x3232322e3231312e3132332e3936,'1438063661','0','0',0x646464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1484',0x424a2d574c,0x3638383265376334333064653439333166316632613466613465313739306663,0x3639313638363537324071712e636f6d,'','',0x3232322e3231312e3132332e3936,'1438063701','0','0',0x353463346234,'');
INSERT INTO pre_ucenter_members VALUES ('1485',0x42696e6b,0x3637373662663031383463666163656533393961653134623639343761353030,0x3633313830363336314071712e636f6d,'','',0x35382e31392e322e3732,'1438068795','0','0',0x623636666633,'');
INSERT INTO pre_ucenter_members VALUES ('1486',0xe59489e59180,0x3235356537646139613166343132373337366337306637636264616538366262,0x353837343335363431324071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438068871','0','0',0x373562386438,'');
INSERT INTO pre_ucenter_members VALUES ('1487',0x4164616d71756974,0x6465383866653062663264653333303765643936633533386262383762663262,0x6164616d73656e64406269676d69722e6e6574,'','',0x3139332e3230312e3232372e3733,'1438078272','0','0',0x306134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1488',0x6a656e6e69666572,0x6531636462633235303931653561306235303931666564386236396264393562,0x3133393831373936323532403136332e636f6d,'','',0x3131382e3132322e38372e3534,'1438093741','0','0',0x646534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1489',0x7275697772676967,0x6630636134376137666235363666376238353333356538333662613338366433,0x75353238323334393367616e6778696e403136332e636f6d,'','',0x3230322e3130352e36332e323437,'1438093973','0','0',0x356538623235,'');
INSERT INTO pre_ucenter_members VALUES ('1490',0x436c6966746f6e6e7574,0x3365396330613630313237616462363430346534333239623730353137353033,0x6e6564696d657361687861407961686f6f2e636f6d,'','',0x3131312e3234382e3133392e323239,'1438098523','0','0',0x626534653163,'');
INSERT INTO pre_ucenter_members VALUES ('1491',0x6e657768656176656e3132333538,0x3466393663656363633634313764373266386163383961386437353966313065,0x6e657768656176656e313233353840676d61696c2e636f6d,'','',0x3231382e38322e3235302e3538,'1438108319','0','0',0x663530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1492',0x4d69636861656c7372,0x6433386265623039303330386336313534306233363530313830343731313037,0x6d69636861656c6e657065393939406d61696c2e7275,'','',0x34362e3131392e3131322e313031,'1438120407','0','0',0x373364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1493',0x57482d5a5359,0x3036313663616464636233643861633166386565663536636435373362663636,0x323430313336353631304071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438136037','0','0',0x353165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1494',0x4e656c736f6e44696f72,0x3366643630303733613630613761356231396663363239333965303835393864,0x3130406261742d706f6c2e706c,'','',0x3135352e3133332e31382e323430,'1438147061','0','0',0x356630353337,'');
INSERT INTO pre_ucenter_members VALUES ('1495',0x7a656c313239,0x3961353237353866316439366333643739663964346331383939356532383130,0x313834353935363135394071712e636f6d,'','',0x3131362e3234382e37312e313330,'1438156012','0','0',0x633165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1496',0x58412d5748,0x3338303730353933616231653832303833383530633462386661666338636430,0x313837313932363434364071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438158940','0','0',0x633934633566,'');
INSERT INTO pre_ucenter_members VALUES ('1498',0x72656e787530313133,0x6530613735343538376139343533356363633538333430363962646462313734,0x3532333335373233314071712e636f,'','',0x3232322e32302e34352e323036,'1438166702','0','0',0x653438376162,'');
INSERT INTO pre_ucenter_members VALUES ('1499',0x6c697568756932303135,0x6436376665303839373036656535383161633832646461313937623130623161,0x37393738323930354071712e636f6d,'','',0x3138322e3234322e3232372e313833,'1438186306','0','0',0x323463346234,'');
INSERT INTO pre_ucenter_members VALUES ('1500',0x787379,0x3933353538313135623739616564653936303161396135626462656233663565,0x736c696e76313233403132362e636f6d,'','',0x3130312e38312e32312e313839,'1438220271','0','0',0x663037613132,'');
INSERT INTO pre_ucenter_members VALUES ('1501',0x74657374303035,0x3138363433306130646561626437613863396632313537303763623561376335,0x74657374303035403136332e636f6d,'','',0x3232322e3231302e3136382e3933,'1438221790','0','0',0x656134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1502',0x3138333638333837313237,0x3063633366313838646463633730363836386463396261386466626266373436,0x3435313134363135314071712e636f6d,'','',0x36302e3137362e3135392e3135,'1438222151','0','0',0x376431636566,'');
INSERT INTO pre_ucenter_members VALUES ('1503',0x78756a69616e736875,0x3031373738333364356261393562623363393239386231636662393461636264,0x636e663538403132362e636f6d,'','',0x36302e3234372e3132372e323133,'1438234123','0','0',0x623331393735,'');
INSERT INTO pre_ucenter_members VALUES ('1504',0x333733323533303739,0x3735373466386130343363306261323366636430396135323234646531366536,0x3337333235333037394071712e636f6d,'','',0x3137312e3232312e332e3233,'1438239128','0','0',0x386563383265,'');
INSERT INTO pre_ucenter_members VALUES ('1505',0x74657374313131,0x3564343263353564313538386364643339636363643536383036346635363732,0x6c7a796d4073696e612e636f6d,'','',0x3232322e3231302e3136382e3933,'1438241415','0','0',0x373264633663,'');
INSERT INTO pre_ucenter_members VALUES ('1506',0x7465737431323334,0x6337366366613566336431333066666334366665313731323735653833623263,0x323334323334403136332e636f6d,'','',0x3232322e3231302e3136382e3933,'1438241921','0','0',0x316237316230,'');
INSERT INTO pre_ucenter_members VALUES ('1507',0x53482d435348,0x6661613638613566326465626365376466636239396263333938343130653632,0x3331303931303335314071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438246437','0','0',0x353530316264,'');
INSERT INTO pre_ucenter_members VALUES ('1508',0x736f67615f3133,0x3730653734653938656365633139363434376236653765663338646336376663,0x3436343535333538314071712e636f6d,'','',0x3131302e38362e34342e3232,'1438246923','0','0',0x623232353531,'');
INSERT INTO pre_ucenter_members VALUES ('1509',0x53482d4a4d,0x6366616634666433333131313630383363363963363061666237646138386462,0x6a6d38363731403132362e636f6d,'','',0x3232322e3231302e3136382e3933,'1438248979','0','0',0x333566356531,'');
INSERT INTO pre_ucenter_members VALUES ('1510',0xe4ba8ce78b97,0x3435616465366433346438623664316264343266346130633431343639323165,0x3633303932353736354071712e636f6d,'','',0x3137312e34302e3136302e313233,'1438249128','0','0',0x386336356434,'');
INSERT INTO pre_ucenter_members VALUES ('1511',0x7a636866656e,0x3664353265353561323035373131653636373464323637643336353238643663,0x7a636866656e4073696e612e636f6d,'','',0x3232322e3231302e3136382e3933,'1438326473','0','0',0x396134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1512',0xe99988e784b6,0x3330623361656264316136623966383966333538323430333865663036643234,0x313333323434373738384071712e636f6d,'','',0x3132342e3139322e3132392e32,'1438336650','0','0',0x613764653239,'');
INSERT INTO pre_ucenter_members VALUES ('1513',0x6c696c7936333639,0x6564633766626466636337666136643738663332636163346362653665363930,0x68617665616e65776461794071712e636f6d,'','',0x35382e34392e3139322e3537,'1438383351','0','0',0x376464343061,'');
INSERT INTO pre_ucenter_members VALUES ('1514',0x74756b68,0x3136633633383866303266303633646239636432613532663830386366643536,0x353834323834303538664071712e636f6d,'','',0x3131382e3235302e3231342e313537,'1438395308','0','0',0x636134303833,'');
INSERT INTO pre_ucenter_members VALUES ('1515',0xe88b8fe88b8f,0x6134623030373930633830343165366236316535633231636264393030333331,0x323639383138303437334071712e636f6d,'','',0x3232322e3136332e31312e323237,'1438406021','0','0',0x353364303930,'');
INSERT INTO pre_ucenter_members VALUES ('1516',0x726f73656d6172792d73656c6c6572,0x3032363164303465333965646132643131376239376234616633356263396338,0x3133393136363835323633403136332e636f6d,'','',0x3131342e38392e3234302e313238,'1438406686','0','0',0x653732373065,'');
INSERT INTO pre_ucenter_members VALUES ('1517',0xe8bf9ee7bbade5b08fe8849ae8a3a4,0x3066663630363362306633356134373530613036636333346533656637666635,0x323936303439313038394071712e636f6d,'','',0x3132322e3232382e3131322e323236,'1438411450','0','0',0x613232353531,'');
INSERT INTO pre_ucenter_members VALUES ('1518',0x53482d4c4a59,0x3764646431633265303763313232326135656534313530636132303338383834,0x736361726c65746c696e343136403136332e636f6d,'','',0x3232322e3231302e3136382e3933,'1438412902','0','0',0x366435396638,'');
INSERT INTO pre_ucenter_members VALUES ('1519',0x43442d4a43,0x3461333735316561376162666165383930393734343834363734383237663436,0x3435393737393732394071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438413860','0','0',0x343835383362,'');
INSERT INTO pre_ucenter_members VALUES ('1520',0x6a61636b656e676c697368,0x3931313566643432373938333962653136633539393566366437623864633365,0x7a657068727573403132362e636f6d,'','',0x3132342e3132362e3134382e3437,'1438432669','0','0',0x643037613132,'');
INSERT INTO pre_ucenter_members VALUES ('1521',0x69616d6e6f747a7a79,0x3630336664623433333330643135653036663363346565353866313539663238,0x7a68656e677975616e2e7a68616e67406f75746c6f6f6b2e636f6d,'','',0x3130362e33392e3235322e313435,'1438488822','0','0',0x366261656239,'');
INSERT INTO pre_ucenter_members VALUES ('1522',0x766976697a7a7a,0x3863616262393239633635623531643963383135373939343332633436636437,0x3534393235363839314071712e636f6d,'','',0x3131342e3234342e37332e313838,'1438489083','0','0',0x626261656239,'');
INSERT INTO pre_ucenter_members VALUES ('1523',0x747279646f776e,0x6666636632363166653463623362313531353237343734336339366333323835,0x74697475735f796c403132362e636f6d,'','',0x3132352e33382e3139392e3134,'1438513016','0','0',0x386162613935,'');
INSERT INTO pre_ucenter_members VALUES ('1524',0x7375796171696e677a6869,0x3337316435613937313030373530323430386437643032633736336230643433,0x3630313633373535364071712e636f6d,'','',0x3232312e3231382e36382e313230,'1438527677','0','0',0x643066343234,'');
INSERT INTO pre_ucenter_members VALUES ('1525',0x424a2d5a4a4a,0x6662353530383061393438656563346632373564356436643430316537616239,0x3936323136333638314071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438564627','0','0',0x333463346234,'');
INSERT INTO pre_ucenter_members VALUES ('1526',0x424a2d585950,0x3730313361333265666337653734343565643965653632356131316538303866,0x313937323334383433304071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438564703','0','0',0x663165383438,'');
INSERT INTO pre_ucenter_members VALUES ('1527',0x43532d485744,0x6363623133306630383736323632646363383339303830613138336434643364,0x3435353137383236354071712e636f6d,'','',0x3232322e3231302e3136382e3933,'1438566372','0','0',0x343934633566,'');



INSERT INTO pre_ucenter_notelist VALUES ('26',0x757064617465636c69656e74,'1','1','1','',0x3c3f786d6c2076657273696f6e3d22312e302220656e636f64696e673d2249534f2d383835392d31223f3e0d0a3c726f6f743e0d0a093c6974656d2069643d22616363657373656d61696c223e3c215b43444154415b5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2263656e736f72656d61696c223e3c215b43444154415b5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2263656e736f72757365726e616d65223e3c215b43444154415b5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2264617465666f726d6174223e3c215b43444154415b792d6e2d6a5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d22646f75626c6565223e3c215b43444154415b305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2274696d656f6666736574223e3c215b43444154415b32383830305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2270726976617465706d7468726561646c696d6974223e3c215b43444154415b32355d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2263686174706d7468726561646c696d6974223e3c215b43444154415b33305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2263686174706d6d656d6265726c696d6974223e3c215b43444154415b33355d5d3e3c2f6974656d3e0d0a093c6974656d2069643d22706d666c6f6f646374726c223e3c215b43444154415b31355d5d3e3c2f6974656d3e0d0a093c6974656d2069643d22706d63656e746572223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2273656e64706d736563636f6465223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d22706d73656e6472656764617973223e3c215b43444154415b305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c64656661756c74223e3c215b43444154415b6368726973407468696e6b77697468752e636f6d5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c73656e64223e3c215b43444154415b325d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c736572766572223e3c215b43444154415b736d74702e3231636e2e636f6d5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c706f7274223e3c215b43444154415b32355d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c61757468223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c66726f6d223e3c215b43444154415b7468696e6b75203c3235313838373932354071712e636f6d3e5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c617574685f757365726e616d65223e3c215b43444154415b757365726e616d65403231636e2e636f6d5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c617574685f70617373776f7264223e3c215b43444154415b70617373776f72645d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c64656c696d69746572223e3c215b43444154415b305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c757365726e616d65223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c73696c656e74223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226c6f67696e5f6661696c656474696d65223e3c215b43444154415b355d5d3e3c2f6974656d3e0d0a3c2f726f6f743e,'1437706381','0','1');
INSERT INTO pre_ucenter_notelist VALUES ('27',0x757064617465636c69656e74,'1','1','1','',0x3c3f786d6c2076657273696f6e3d22312e302220656e636f64696e673d2249534f2d383835392d31223f3e0d0a3c726f6f743e0d0a093c6974656d2069643d22616363657373656d61696c223e3c215b43444154415b5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2263656e736f72656d61696c223e3c215b43444154415b5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2263656e736f72757365726e616d65223e3c215b43444154415b5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2264617465666f726d6174223e3c215b43444154415b792d6e2d6a5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d22646f75626c6565223e3c215b43444154415b305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2274696d656f6666736574223e3c215b43444154415b32383830305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2270726976617465706d7468726561646c696d6974223e3c215b43444154415b32355d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2263686174706d7468726561646c696d6974223e3c215b43444154415b33305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2263686174706d6d656d6265726c696d6974223e3c215b43444154415b33355d5d3e3c2f6974656d3e0d0a093c6974656d2069643d22706d666c6f6f646374726c223e3c215b43444154415b31355d5d3e3c2f6974656d3e0d0a093c6974656d2069643d22706d63656e746572223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d2273656e64706d736563636f6465223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d22706d73656e6472656764617973223e3c215b43444154415b305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c64656661756c74223e3c215b43444154415b6368726973407468696e6b77697468752e636f6d5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c73656e64223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c736572766572223e3c215b43444154415b736d74702e3231636e2e636f6d5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c706f7274223e3c215b43444154415b32355d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c61757468223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c66726f6d223e3c215b43444154415b7468696e6b75203c3235313838373932354071712e636f6d3e5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c617574685f757365726e616d65223e3c215b43444154415b757365726e616d65403231636e2e636f6d5d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c617574685f70617373776f7264223e3c215b43444154415b70617373776f72645d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c64656c696d69746572223e3c215b43444154415b305d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c757365726e616d65223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226d61696c73696c656e74223e3c215b43444154415b315d5d3e3c2f6974656d3e0d0a093c6974656d2069643d226c6f67696e5f6661696c656474696d65223e3c215b43444154415b355d5d3e3c2f6974656d3e0d0a3c2f726f6f743e,'1437707132','0','1');
INSERT INTO pre_ucenter_notelist VALUES ('28',0x64656c65746575736572,'1','1','1',0x6964733d273134393727,'','1438166702','0','1');
INSERT INTO pre_ucenter_notelist VALUES ('29',0x7570646174657077,'1','1','1',0x757365726e616d653d43442d4c4d592670617373776f72643d,'','1438393719','0','1');















INSERT INTO pre_ucenter_settings VALUES (0x616363657373656d61696c,'');
INSERT INTO pre_ucenter_settings VALUES (0x63656e736f72656d61696c,'');
INSERT INTO pre_ucenter_settings VALUES (0x63656e736f72757365726e616d65,'');
INSERT INTO pre_ucenter_settings VALUES (0x64617465666f726d6174,0x792d6e2d6a);
INSERT INTO pre_ucenter_settings VALUES (0x646f75626c6565,'0');
INSERT INTO pre_ucenter_settings VALUES (0x6e6578746e6f746574696d65,'0');
INSERT INTO pre_ucenter_settings VALUES (0x74696d656f6666736574,0x3238383030);
INSERT INTO pre_ucenter_settings VALUES (0x70726976617465706d7468726561646c696d6974,0x3235);
INSERT INTO pre_ucenter_settings VALUES (0x63686174706d7468726561646c696d6974,0x3330);
INSERT INTO pre_ucenter_settings VALUES (0x63686174706d6d656d6265726c696d6974,0x3335);
INSERT INTO pre_ucenter_settings VALUES (0x706d666c6f6f646374726c,0x3135);
INSERT INTO pre_ucenter_settings VALUES (0x706d63656e746572,0x31);
INSERT INTO pre_ucenter_settings VALUES (0x73656e64706d736563636f6465,0x31);
INSERT INTO pre_ucenter_settings VALUES (0x706d73656e6472656764617973,'0');
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c64656661756c74,0x6368726973407468696e6b77697468752e636f6d);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c73656e64,0x31);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c736572766572,0x736d74702e3231636e2e636f6d);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c706f7274,0x3235);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c61757468,0x31);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c66726f6d,0x7468696e6b75203c3235313838373932354071712e636f6d3e);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c617574685f757365726e616d65,0x757365726e616d65403231636e2e636f6d);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c617574685f70617373776f7264,0x70617373776f7264);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c64656c696d69746572,'0');
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c757365726e616d65,0x31);
INSERT INTO pre_ucenter_settings VALUES (0x6d61696c73696c656e74,0x31);
INSERT INTO pre_ucenter_settings VALUES (0x6c6f67696e5f6661696c656474696d65,0x35);
INSERT INTO pre_ucenter_settings VALUES (0x76657273696f6e,0x312e362e30);



INSERT INTO pre_ucenter_vars VALUES (0x6e6f7465657869737473,'0');
INSERT INTO pre_ucenter_vars VALUES (0x6e6f746565786973747331,0x31);
INSERT INTO pre_ucenter_vars VALUES (0x6e6f746565786973747332,0x31);
INSERT INTO pre_ucenter_vars VALUES (0x6e6f746565786973747333,'0');
INSERT INTO pre_ucenter_vars VALUES (0x6e6f746565786973747334,0x31);

