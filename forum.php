<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: forum.php 22172 2011-04-25 04:25:01Z  $
 */

define('APPTYPEID', 2);
define('CURSCRIPT', 'forum');

$_GET +=array('mod'=>'forumdisplay','fid'=>45);
require './source/class/class_core.php';
require './source/function/function_forum.php';
//require './source/function/function_forumlist.php';

$discuz = & discuz_core::instance();

$modarray = array('ajax','announcement','attachment','forumdisplay',
    'group','image','index','medal','misc','modcp','notice','post','redirect',
    'relatekw','relatethread','rss','topicadmin','trade','viewthread','tag'
);

$modcachelist = array(
    'index'		=> array('announcements', 'onlinelist', 'forumlinks',
        'heats', 'historyposts', 'onlinerecord', 'userstats', 'diytemplatenameforum'),
    'forumdisplay'	=> array('smilies', 'announcements_forum', 'globalstick', 'forums',
        'onlinelist', 'forumstick', 'threadtable_info', 'threadtableids', 'stamps', 'diytemplatenameforum'),
    'viewthread'	=> array('smilies', 'smileytypes', 'forums', 'usergroups',
        'stamps', 'bbcodes', 'smilies',	'custominfo', 'groupicon', 'stamps',
        'threadtableids', 'threadtable_info', 'posttable_info', 'diytemplatenameforum'),
    'redirect'	=> array('threadtableids', 'threadtable_info', 'posttable_info'),
    'post'		=> array('bbcodes_display', 'bbcodes', 'smileycodes', 'smilies', 'smileytypes',
        'domainwhitelist'),
    'space'		=> array('fields_required', 'fields_optional', 'custominfo'),
    'group'		=> array('grouptype', 'diytemplatenamegroup'),
);

$mod = !in_array($discuz->var['mod'], $modarray) ? 'index' : $discuz->var['mod'];

define('CURMODULE', $mod);
$cachelist = array();
if(isset($modcachelist[CURMODULE])) {
    $cachelist = $modcachelist[CURMODULE];
}
if($discuz->var['mod'] == 'group') {
    $_G['basescript'] = 'group';
}

$discuz->cachelist = $cachelist;
$discuz->init();

loadforum();
set_rssauth();
runhooks();




//帖子调用开始
$colorarray = array('', 'red', 'orange', 'yellow', 'green', 'cyan', 'blue', 'purple', 'gray');
$hack_cut_str =60; // 这里修改标题长度
$fids = array();
if (file_exists("./data/cache/cache_forums.php")){
    require_once "./data/cache/cache_forums.php";
    if (is_array($_DCACHE['forums'])){
        foreach ($_DCACHE['forums'] as $k => $v){
            if (!strstr(',sub,forum,',','.$v['type'].',')) continue;
            $fids[$k] = 5; // 这里是第一处调用条数需要和后面的设置一样。
        }
    }
}
if (count($fids) < 1){
    $query = DB::query("SELECT fid FROM ".DB::table('forum_forum')." WHERE type='forum' OR type='sub'");
    while ($row = DB::fetch($query)){
        $fids[$row['fid']] = 5; // 这里是第二处调用条数需要和前面的设置一样。
    }
}
$limit_counts = 0;

foreach ($fids as $k => $v){
    $sql .= "(SELECT t.*, f.name FROM ".DB::table('forum_thread')." t LEFT JOIN ".DB::table('forum_forum')." f ON f.fid = t.fid WHERE t.fid='$k' AND t.closed NOT LIKE 'moved|%' AND t.displayorder>=0 ORDER BY t.dateline DESC LIMIT $v) UNION ";
}
if ($sql){
    $sql = substr($sql,0,strlen($sql)-6);
}
$query = DB::query($sql);
while ($row = DB::fetch($query)){
    $row['view_subject'] = cutstr($row['subject'],$hack_cut_str);
    $row['date']= gmdate('m-d/H:i', $row['dateline'] + $_G['setting']['timeoffset'] * 3600);
    if($row['highlight']) {
        $string = sprintf('%02d', $row['highlight']);
        $stylestr = sprintf('%03b', $string[0]);
        $row['highlight'] = 'style="';
        $row['highlight'] .= $stylestr[0] ? 'font-weight: bold;' : '';
        $row['highlight'] .= $stylestr[1] ? 'font-style: italic;' : '';
        $row['highlight'] .= $stylestr[2] ? 'text-decoration: underline;' : '';
        $row['highlight'] .= $string[1] ? 'color: '.$colorarray[$string[1]] : '';
        $row['highlight'] .= '"';
    } else {
        $row['highlight'] = '';
    }
    ${'new_no'.$row['fid'].'_threadlist'}[] = $row;
}
if($_G['uid'] !== 0){
    //查询昵称  字段为field1
    $query = DB::query("SELECT field1 FROM ".DB::table('common_member_profile')." WHERE uid='".$_G['uid']."'");
    $row = DB::fetch($query);
    if(empty($row['field1'])){
        $sql_name = DB::query("SELECT username FROM ".DB::table('common_member')." WHERE uid='".$_G['uid']."'");
        $name = DB::fetch($sql_name);
        if($name){
            $phone = preg_match('/0?(13|14|15|18)[0-9]{9}/',$name['username']);
            $email = preg_match('/\w+((-w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+/',$name['username']);
            $qq = preg_match('/^[1-9]*[1-9][0-9]*$/',$name['username']);
            if(!empty($phone)||!empty($qq)||!empty($email))
            {
                echo "<script language='javascript' type='text/javascript'>";
                echo 'alert("亲，你的昵称尚未设置，去设置吧！");location.href="http://bbs.gmatonline.cn/home.php?mod=spacecp"';
                echo "</script>";
            }else{
                $update = DB::query("UPDATE ".DB::table('common_member_profile')." SET field1='".$name['username']."' WHERE uid='".$_G['uid']."'");
                $nickname = DB::fetch($update);
            }
        }
    }
}
//每版最新主题--结束
require DISCUZ_ROOT.'./source/module/forum/forum_'.$mod.'.php';


?>