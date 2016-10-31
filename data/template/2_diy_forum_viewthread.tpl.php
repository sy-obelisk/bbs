<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('viewthread');
0
|| checktplrefresh('./template/default/forum/viewthread.htm', './template/default/forum/viewthread_node.htm', 1464342577, 'diy', './data/template/2_diy_forum_viewthread.tpl.php', './template/dean_tech_150528', 'forum/viewthread')
|| checktplrefresh('./template/default/forum/viewthread.htm', './template/default/forum/viewthread_fastpost.htm', 1464342577, 'diy', './data/template/2_diy_forum_viewthread.tpl.php', './template/dean_tech_150528', 'forum/viewthread')
|| checktplrefresh('./template/default/forum/viewthread.htm', './template/default/forum/viewthread_node_body.htm', 1464342577, 'diy', './data/template/2_diy_forum_viewthread.tpl.php', './template/dean_tech_150528', 'forum/viewthread')
|| checktplrefresh('./template/default/forum/viewthread.htm', './template/default/forum/viewthread_node_body.htm', 1464342577, 'diy', './data/template/2_diy_forum_viewthread.tpl.php', './template/dean_tech_150528', 'forum/viewthread')
|| checktplrefresh('./template/default/forum/viewthread.htm', './template/default/common/seditor.htm', 1464342577, 'diy', './data/template/2_diy_forum_viewthread.tpl.php', './template/dean_tech_150528', 'forum/viewthread')
|| checktplrefresh('./template/default/forum/viewthread.htm', './template/default/forum/seccheck_post.htm', 1464342577, 'diy', './data/template/2_diy_forum_viewthread.tpl.php', './template/dean_tech_150528', 'forum/viewthread')
|| checktplrefresh('./template/default/forum/viewthread.htm', './template/default/common/upload.htm', 1464342577, 'diy', './data/template/2_diy_forum_viewthread.tpl.php', './template/dean_tech_150528', 'forum/viewthread')
|| checktplrefresh('./template/default/forum/viewthread.htm', './template/default/common/seccheck.htm', 1464342577, 'diy', './data/template/2_diy_forum_viewthread.tpl.php', './template/dean_tech_150528', 'forum/viewthread')
;?><?php include template('common/header'); ?><script src="template/dean_tech_150528/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">var fid = parseInt('<?php echo $_G['fid'];?>'), tid = parseInt('<?php echo $_G['tid'];?>');</script>
<?php if($modmenu['thread'] || $modmenu['post']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum_moderate.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } ?>

<script src="<?php echo $_G['setting']['jspath'];?>forum_viewthread.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">zoomstatus = parseInt(<?php echo $_G['setting']['zoomstatus'];?>);var imagemaxwidth = '<?php echo $_G['setting']['imagemaxwidth'];?>';var aimgcount = new Array();</script>

<style id="diy_style" type="text/css"></style>
<!--[diy=diynavtop]--><div id="diynavtop" class="area"></div><!--[/diy]-->
<div id="pt" class="bm cl" style="width: 1190px;margin: 30px auto">
    <!--面包屑 导航-->
    <div id="breadcrumb">
        <!--<a href="./"><?php echo $_G['setting']['bbname'];?></a>-->
        <!--&gt;-->
        <a href="http://www.smartapply.cn/forum.php"><?php echo $_G['setting']['navs']['2']['navname'];?></a>
        <!--&gt;-->
        <a href=""><?php echo $navigation;?></a>
        &gt;
        <span><?php echo $_G['forum_thread']['short_subject'];?></span>
    </div>
    </div>




<?php if(!empty($_G['setting']['pluginhooks']['viewthread_top'])) echo $_G['setting']['pluginhooks']['viewthread_top'];?><?php echo adshow("text/wp a_t");?><style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<div id="ct" class="wp cl">
    <!--左侧-->
    <div class="main" id="comment-frame" style="">

<!--管理 功能 开始-->

            <?php if($_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) { ?>
                <ul class="p_pop" id="newspecial_menu" style="display: none;">
                    <?php if(!$_G['forum']['allowspecialonly']) { ?><li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>">发表帖子</a></li><?php } ?>
                    <?php if($_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']) { ?>
                        <?php if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $threadsorts) { ?>                            <?php if($_G['forum']['threadsorts']['show'][$id]) { ?>
                                <li class="popupmenu_option"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;sortid=<?php echo $id;?>"><?php echo $threadsorts;?></a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if($_G['group']['allowpostpoll']) { ?><li class="poll"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=1">发起投票</a></li><?php } ?>
                    <?php if($_G['group']['allowpostreward']) { ?><li class="reward"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=3">发布悬赏</a></li><?php } ?>
                    <?php if($_G['group']['allowpostdebate']) { ?><li class="debate"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=5">发起辩论</a></li><?php } ?>
                    <?php if($_G['group']['allowpostactivity']) { ?><li class="activity"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=4">发起活动</a></li><?php } ?>
                    <?php if($_G['group']['allowposttrade']) { ?><li class="trade"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=2">出售商品</a></li><?php } ?>
                    <?php if($_G['setting']['threadplugins']) { ?>
                        <?php if(is_array($_G['forum']['threadplugin'])) foreach($_G['forum']['threadplugin'] as $tpid) { ?>                            <?php if(array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])) { ?>
                                <li class="popupmenu_option"<?php if($_G['setting']['threadplugins'][$tpid]['icon']) { ?> style="background-image:url(source/plugin/<?php echo $tpid;?>/<?php echo $_G['setting']['threadplugins'][$tpid]['icon'];?>)"<?php } ?>><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;specialextra=<?php echo $tpid;?>"><?php echo $_G['setting']['threadplugins'][$tpid]['name'];?></a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            <?php } if($modmenu['post']) { ?>
<div id="mdly" class="fwinmask" style="display:none;z-index:350;">
<table cellspacing="0" cellpadding="0" class="fwin">
<tr>
<td class="t_l"></td>
<td class="t_c"></td>
<td class="t_r"></td>
</tr>
<tr>
<td class="m_l">&nbsp;&nbsp;</td>
<td class="m_c">
<div class="f_c">
<div class="c">
<h3>选中&nbsp;<strong id="mdct" class="xi1"></strong>&nbsp;篇: </h3>
<?php if($_G['forum']['ismoderator']) { if($_G['group']['allowwarnpost']) { ?><a href="javascript:;" onclick="modaction('warn')">警告</a><span class="pipe">|</span><?php } if($_G['group']['allowbanpost']) { ?><a href="javascript:;" onclick="modaction('banpost')">屏蔽</a><span class="pipe">|</span><?php } if($_G['group']['allowdelpost'] && !$rushreply) { ?><a href="javascript:;" onclick="modaction('delpost')">删除</a><span class="pipe">|</span><?php } } if($_G['forum']['ismoderator'] && $_G['group']['allowstickreply'] || $_G['forum_thread']['authorid'] == $_G['uid']) { ?><a href="javascript:;" onclick="modaction('stickreply')">置顶</a><span class="pipe">|</span><?php } if($_G['forum_thread']['pushedaid'] && $allowpostarticle) { ?><a href="javascript:;" onclick="modaction('pushplus', '', 'aid=<?php echo $_G['forum_thread']['pushedaid'];?>', 'portal.php?mod=portalcp&ac=article&op=pushplus')">文章连载</a><span class="pipe">|</span><?php } ?>
</div>
</div>
</td>
<td class="m_r"></td>
</tr>
<tr>
<td class="b_l"></td>
<td class="b_c"></td>
<td class="b_r"></td>
</tr>
</table>
</div>
<?php } if($modmenu['thread']) { ?>
<div id="modmenu" class="xi2 pbm" style="padding: 20px;border: 1px solid #d4d4d4;border-radius: 5px;margin-bottom: 20px">
        <ul class="modmenu_Ul">
            <li><a href="javascript:;" onclick="modthreads(3, 'delete')">删除主题</a></li>
            <li><a href="javascript:;" onclick="modthreads(3, 'bump')">升降</a></li>
            <li><a href="javascript:;" onclick="modthreads(1, 'stick')">置顶</a></li>
            <li><a href="javascript:;" onclick="modaction('live')">直播</a></li>
            <li><a href="javascript:;" onclick="modthreads(1, 'highlight')">高亮</a></li>
            <li><a href="javascript:;" onclick="modthreads(1, 'digest')">精华</a></li>
            <li><a href="javascript:;" onclick="modthreads(1, 'recommend')">推荐</a></li>
            <li><a href="javascript:;" onclick="modaction('stamp')">图章</a></li>
            <li><a href="javascript:;" onclick="modaction('stamplist')">图标</a></li>
            <li><a href="javascript:;" onclick="modthreads(4)"><?php if(!$_G['forum_thread']['closed']) { ?>关闭<?php } else { ?>打开<?php } ?></a></li>
            <li><a href="javascript:;" onclick="modthreads(2, 'move')">移动</a></li>
            <li><a href="javascript:;" onclick="modthreads(2, 'type')">分类</a></li>
            <li><a href="javascript:;" onclick="modaction('copy')">复制</a></li>
            <li><a href="javascript:;" onclick="modaction('merge')">合并</a></li>
            <li><a href="javascript:;" onclick="modaction('refund')">撤销付费</a></li>
            <li><a href="javascript:;" onclick="modaction('split')">分割</a></li>
            <li><a href="javascript:;" onclick="modaction('repair')">修复</a></li>
            <li><a href="javascript:;" onclick="modaction('restore', '', 'archiveid=<?php echo $_G['forum_thread']['archiveid'];?>')">取消存档</a></li>
            <li><a href="javascript:;" onclick="modaction('warn', '<?php echo $_G['forum_firstpid'];?>')">警告</a></li>
            <li><a href="javascript:;" onclick="modaction('banpost', '<?php echo $_G['forum_firstpid'];?>')">屏蔽</a></li>
            <li><a href="javascript:;" onclick="modaction('removereward')">移除悬赏</a></li>
            <li><a href="javascript:;" onclick="modthreads(5, 'recommend_group');return false;">推到版块</a></li>
            <li><a href="javascript:;" onclick="showWindow('mods', 'forum.php?mod=tag&op=manage&tid=<?php echo $_G['tid'];?>', 'get', 0)">标签</a></li>
            <li><a href="javascript:;" onclick="showWindow('usertag', 'forum.php?mod=misc&action=usertag&tid=<?php echo $_G['tid'];?>', 'get', 0)">用户标签</a></li>
            <li><a href="portal.php?mod=portalcp&amp;ac=article&amp;from_idtype=tid&amp;from_id=<?php echo $_G['tid'];?>">生成文章</a></li>
        </ul><?php $modopt=0;?><?php if($_G['forum']['ismoderator']) { if($_G['group']['allowdelpost']) { $modopt++?><!--<span class="pipe">|</span>--><?php } if($_G['group']['allowbumpthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['group']['allowstickthread'] && ($_G['forum_thread']['displayorder'] <= 3 || $_G['adminid'] == 1) && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['group']['allowlivethread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['group']['allowhighlightthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['group']['allowdigestthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['group']['allowrecommendthread'] && !empty($_G['forum']['modrecommend']['open']) && $_G['forum']['modrecommend']['sort'] != 1 && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['group']['allowstampthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['group']['allowstamplist'] && !$_G['forum_thread']['is_archived']) { $modopt++?><!--<span class="pipe">|</span>--><?php } if($_G['group']['allowclosethread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3) { $modopt++?><!--<span class="pipe">|</span>--><?php } if($_G['group']['allowmovethread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3) { $modopt++?><!--<span class="pipe">|</span>--><?php } if($_G['group']['allowedittypethread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if(!$_G['forum_thread']['special'] && !$_G['forum_thread']['is_archived']) { if($_G['group']['allowcopythread'] && $_G['forum']['status'] != 3) { $modopt++?><?php } if($_G['group']['allowmergethread'] && $_G['forum']['status'] != 3) { $modopt++?><?php } if($_G['group']['allowrefund'] && $_G['forum_thread']['price'] > 0) { $modopt++?><?php } } if($_G['group']['allowsplitthread'] && !$_G['forum_thread']['is_archived'] && $_G['forum']['status'] != 3) { $modopt++?><?php } if($_G['group']['allowrepairthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['forum_thread']['is_archived'] && $_G['adminid'] == 1) { $modopt++?><?php } if($_G['forum_firstpid']) { if($_G['group']['allowwarnpost']) { $modopt++?><?php } if($_G['group']['allowbanpost']) { $modopt++?><?php } } if($_G['group']['allowremovereward'] && $_G['forum_thread']['special'] == 3 && !$_G['forum_thread']['is_archived']) { $modopt++?><?php } if($_G['forum']['status'] == 3 && in_array($_G['adminid'], array('1','2')) && $_G['forum_thread']['closed'] < 1) { } if($_G['group']['allowmanagetag']) { } if($_G['group']['alloweditusertag']) { } } if($allowpusharticle && $allowpostarticle) { $modopt++?><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_modoption'])) echo $_G['setting']['pluginhooks']['viewthread_modoption'];?>
        <div style="clear: both"></div>
</div>
<?php } ?>

<!--管理 功能 结束-->

<?php if(!empty($_G['setting']['pluginhooks']['viewthread_beginline'])) echo $_G['setting']['pluginhooks']['viewthread_beginline'];?>





<div id="postlist" class="pl bm" style="border: none!important;">
<table cellspacing="0" cellpadding="0">
<tr>

</tr>
</table>


<?php if($_G['forum_thread']['replycredit'] > 0 || $rushreply) { ?>
<div id="pl_top">
<table cellspacing="0" cellpadding="0">
<tr class="ad">
<!--<td class="pls"></td>-->
<!--<td class="plc"></td>-->
</tr>
<?php if($_G['forum_thread']['replycredit'] > 0 ) { ?>
<tr>
<?php if(!$close_leftinfo) { ?>
<td class="pls vm ptm">
<?php } else { ?>
<td class="pls ptm pbm xi1" colspan="2">
<?php } ?>
<img src="<?php echo IMGDIR;?>/thread_prize_s.png" class="hm" alt="回帖奖励" />
<strong><?php echo $_G['forum_thread']['replycredit'];?> <?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['title'];?></strong>
<?php if(!$close_leftinfo) { ?>
</td>
<td class="plc ptm pbm xi1">
<?php } else { ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?>
回复本帖可获得 <?php echo $_G['forum_thread']['replycredit_rule']['extcredits'];?> <?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['title'];?>奖励! 每人限 <?php echo $_G['forum_thread']['replycredit_rule']['membertimes'];?> 次<?php if($_G['forum_thread']['replycredit_rule']['random'] > 0) { ?><span class="xg1">(中奖概率 <?php echo $_G['forum_thread']['replycredit_rule']['random'];?>%)</span><?php } ?>
</td>
</tr>
<?php if($rushreply) { ?>
<!--<tr class="ad">-->
<!--<td class="pls"></td>-->
<!--<td class="plc"></td>-->
<!--</tr>-->
<?php } } if($rushreply) { ?>
<tr>
<?php if(!$close_leftinfo) { ?>
<td class="pls vm ptm">
<img src="<?php echo IMGDIR;?>/rushreply_s.png" class="vm" alt="抢楼" />
<strong>抢楼</strong>
</td>
<td class="plc ptm pbm xi1">
<?php } else { ?>
<td class="plc ptm pbm xi1" colspan="2">
<img src="<?php echo IMGDIR;?>/rushreply_s.png" class="vm" alt="抢楼" />
<?php } if($rushresult['rewardfloor']) { ?>
<span class="y">
<?php if($_G['uid'] == $_G['thread']['authorid'] || $_G['forum']['ismoderator']) { ?><a href="javascript:;" onclick="showWindow('membernum', 'forum.php?mod=ajax&action=get_rushreply_membernum&tid=<?php echo $_G['tid'];?>')" class="y pn xi2"><span>统计参与人数</span></a><?php } if(!$_GET['checkrush']) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;checkrush=1" rel="nofollow" class="y pn xi2"><span>查看抢中楼层</span></a>
<?php } ?>
</span>
<?php } if($rushresult['creditlimit'] == '') { ?>
本帖为抢楼帖，欢迎抢楼!&nbsp;
<?php } else { ?>
本帖为抢楼帖，<?php echo $rushresult['creditlimit_title'];?>大于<?php echo $rushresult['creditlimit'];?>可以抢楼 &nbsp;
<?php } if($rushresult['timer']) { ?>
<span id="rushtimer_<?php echo $thread['tid'];?>"> 【还有 <span id="rushtimer_body_<?php echo $thread['tid'];?>"></span> <script language="javascript">settimer(<?php echo $rushresult['timer'];?>, 'rushtimer_body_<?php echo $thread['tid'];?>');</script><?php if($rushresult['timertype'] == 'start') { ?> 开始 <?php } else { ?> 结束 <?php } ?> 】</span>
<?php } if($rushresult['stopfloor']) { ?>
截止楼层：<?php echo $rushresult['stopfloor'];?>&nbsp;
<?php } if($rushresult['rewardfloor']) { ?>
奖励楼层: <?php echo $rushresult['rewardfloor'];?>&nbsp;
<?php } if($rushresult['rewardfloor'] && $_GET['checkrush']) { ?>
<p class="ptn">
<?php if($countrushpost) { ?>[<strong><?php echo $countrushpost;?></strong>]个楼层已中奖<?php } else { ?> 暂时还没有楼层中奖 <?php } ?>&nbsp;&nbsp;
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>" class="xi2">返回抢楼帖</a>
</p>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_title_row'])) echo $_G['setting']['pluginhooks']['viewthread_title_row'];?>
<table cellspacing="0" cellpadding="0" class="ad">
<tr>
<!--<td class="pls">-->
<!--&lt;!&ndash;<?php if(!$close_leftinfo) { ?>&ndash;&gt;-->
<!--</td>-->
<!--<td class="plc">-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--</td>-->
</tr>
</table><?php $postcount = 0;?><?php if(is_array($postlist)) foreach($postlist as $post) { if($rushreply && $_GET['checkrush'] && $post['rewardfloor'] != 1) { continue;?><?php } ?>
<div id="post_<?php echo $post['pid'];?>" <?php if($_G['blockedpids'] && $post['inblacklist']) { ?>style="display:none;"<?php } ?>><?php $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);
$postshowavatars = !($_G['setting']['bannedmessages'] & 2 && ($post['memberstatus'] == '-1' || ($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || ($post['status'] & 1)));?><?php
$authorverifys = <<<EOF

EOF;
 if(is_array($post['verifyicon'])) foreach($post['verifyicon'] as $vid) { 
$authorverifys .= <<<EOF
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid={$vid}" target="_blank">
EOF;
 if($_G['setting']['verify'][$vid]['icon']) { 
$authorverifys .= <<<EOF
<img src="{$_G['setting']['verify'][$vid]['icon']}" class="vm" alt="{$_G['setting']['verify'][$vid]['title']}" title="{$_G['setting']['verify'][$vid]['title']}" />
EOF;
 } else { 
$authorverifys .= <<<EOF
{$_G['setting']['verify'][$vid]['title']}
EOF;
 } 
$authorverifys .= <<<EOF
</a>

EOF;
 } if(is_array($post['unverifyicon'])) foreach($post['unverifyicon'] as $vid) { 
$authorverifys .= <<<EOF
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid={$vid}" target="_blank"><img src="{$_G['setting']['verify'][$vid]['unverifyicon']}" class="vm" alt="{$_G['setting']['verify'][$vid]['title']}" title="{$_G['setting']['verify'][$vid]['title']}" /></a>

EOF;
 } 
$authorverifys .= <<<EOF



EOF;
?>

<?php if($post['first'] &&  $_G['forum_threadstamp']) { ?>
<div id="threadstamp"><img src="<?php echo STATICURL;?>image/stamp/<?php echo $_G['forum_threadstamp']['url'];?>" title="<?php echo $_G['forum_threadstamp']['text'];?>" /></div>
<?php } if(empty($post['deleted'])) { ?>
<style>
    .ad td{
        border: none!important;
    }
</style>
<table id="pid<?php echo $post['pid'];?>" class="plhin" summary="pid<?php echo $post['pid'];?>" cellspacing="0" cellpadding="0" >


<tr>
<?php if(!$close_leftinfo) { ?>
<!--<td class="pls" rowspan="2" style="background: none!important;">-->


<!--</td>-->
<?php } ?>


<td class="plc" style="width:100%;"<?php if($close_leftinfo) { ?> style="width:100%"<?php } ?>>
<div class="pi"<?php if($close_leftinfo && !$post['anonymous'] && $postshowavatars && $showavatars) { ?> style="height:48px"<?php } ?>>

<?php if(!IS_ROBOT) { ?>
    <!--楼主/回帖用户-->
    <?php if($_G['setting']['authoronleft']) { ?>

        <?php if(!$postcount && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>
                <div class="avatar avatar-70" style="width: auto!important;">

                    <div class="avatar_12"<?php if(!($_G['setting']['threadguestlite'] && !$_G['uid'])) { ?> onmouseover="showauthor(this, 'userinfo<?php echo $post['pid'];?>')"<?php } ?>>
                    <a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>" class="avtm" target="_blank" style="width: 70px;"><?php echo $post['avatar'];?></a>
                    </div>
                <?php if(!$postcount && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>
                    <div class="avatar_13">
                        <div class="thread">
                                 <span class="title" style="border-bottom: none!important;"><?php echo $_G['forum_thread']['short_subject'];?></span>
                            <span class="xg1">
                                <?php if($_G['forum_thread']['displayorder'] == -2) { ?>(审核中)
                                <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?>(已忽略)
                                    <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?>(草稿)
                                        <?php if($post['first'] && $post['invisible'] == -3) { ?>
                                            <a class="psave" href="forum.php?mod=misc&amp;action=pubsave&amp;tid=<?php echo $_G['tid'];?>">发表</a>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if($_G['setting']['threadhidethreshold'] && $_G['forum_thread']['hidden'] >= $_G['setting']['threadhidethreshold']) { ?>
                                        <?php if($_G['forum_thread']['authorid'] == $_G['uid']) { ?><a class="psave" id="hiderecover" title="点击恢复主题隐藏状态" href="forum.php?mod=misc&amp;action=hiderecover&amp;tid=<?php echo $_G['tid'];?>&amp;formhash=<?php echo FORMHASH;?>" onclick="showWindow(this.id, this.href, 'get', 0);">隐藏</a><?php } else { ?>(隐藏)<?php } ?>
                                        &nbsp;
                                    <?php } ?>
                                    <?php if($_G['forum_thread']['recommendlevel']) { ?>
                                        &nbsp;<img src="<?php echo IMGDIR;?>/recommend_<?php echo $_G['forum_thread']['recommendlevel'];?>.gif" alt="" title="评价指数 <?php echo $_G['forum_thread']['recommends'];?>" />
                                    <?php } ?>
                                    <?php if($_G['forum_thread']['heatlevel']) { ?>
                                        &nbsp;<img src="<?php echo IMGDIR;?>/hot_<?php echo $_G['forum_thread']['heatlevel'];?>.gif" alt="" title="热度: <?php echo $_G['forum_thread']['heats'];?>" />
                                    <?php } ?>
                                    <?php if($_G['forum_thread']['closed'] == 1) { ?>
                                        &nbsp;<img src="<?php echo IMGDIR;?>/locked.gif" alt="关闭" title="关闭" class="vm" />
                                    <?php } ?>
                                    <!--<a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?><?php echo $fromuid;?>" onclick="return copyThreadUrl(this, '<?php echo $_G['setting']['bbname'];?>')" <?php if($fromuid) { ?>title="您的朋友访问此链接后，您将获得相应的积分奖励"<?php } ?>>[复制链接]</a>-->
                                </span>

                        </div>
                        <div class="thread">
                        <div class="author-info fans_numbox">
                            <span class="author-name">

                               <a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>" target="_blank" class="xw1"<?php if($post['groupcolor']) { ?> style="color: <?php echo $post['groupcolor'];?>"<?php } ?>>
                                      <?php if($post['field1']) { ?>
                                     <?php echo $post['field1'];?>
                                     <?php } else { ?>
                                     <?php echo $post['author'];?>
                                     <?php } ?>

                                </a>
                                <?php echo $authorverifys;?>

                            </span>
                            <span class="show-time" style="color: #81828c">&nbsp;&nbsp;发表于&nbsp;<?php echo $post['dateline'];?></span>
                            <span style="color: #81828c">
                                &nbsp;&nbsp;查看：<span class="light"><?php echo $_G['forum_thread']['views'];?></span>
                            </span>&nbsp; | &nbsp;<span style="color: #81828c">
                            回复：<span class="light"><?php echo $_G['forum_thread']['allreplies'];?></span>
                        </span>
                        </div>
                       </div>
                    </div>
                <?php } ?>
                </div>
        <?php } else { ?>
                <div class="avatar avatar-70" style="width: 70px!important;">

                    <div  class="avatar_12"<?php if(!($_G['setting']['threadguestlite'] && !$_G['uid'])) { ?> onmouseover="showauthor(this, 'userinfo<?php echo $post['pid'];?>')"<?php } ?>>
                    <a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>" class="avtm" target="_blank" style="width: 70px;"><?php echo $post['avatar'];?></a>
                      <span style="font-size: 12px;color: #81828c">
                          <?php if($post['field1']) { ?>
                                     <?php echo $post['field1'];?>
                                     <?php } else { ?>
                                     <?php echo $post['author'];?>
                                     <?php } ?></span>
                   <!--<?php echo $authorverifys;?>-->
                </div>
                <?php if(!$postcount && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>
                <div class="avatar_13">
                    <div class="thread">
                        <span class="title" style="border-bottom: none!important;"><?php echo $_G['forum_thread']['short_subject'];?></span>
                    </div>

                </div>
                <?php } ?>
                </div>
                <?php } ?>
        <?php } ?>



             <!--电梯直达--直接跳到某楼层-->

<?php if(!$postcount && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>

                    <div class="btns" style="float: right;position: relative;top: 12px;">
                        <?php if(!IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']) { ?>
                        <!--只看该作者-->
                        <a class="btn btn-default" href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;page=<?php echo $page;?>&amp;authorid=<?php echo $post['authorid'];?>" rel="nofollow"> 只看楼主</a>
                        <?php } elseif(!$_G['forum_thread']['archiveid']) { ?>
                        <!--显示全部楼层-->
                        <a class="btn btn-default" href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;page=<?php echo $page;?>" rel="nofollow">取消只看楼主</a>
                        <?php } ?>
                    </div>

                    <!--<div id="fj" class="y">-->
<!--<label class="z">电梯直达</label>-->
<!--<input type="text" class="px p_fre z" size="2" onkeyup="$('fj_btn').href='forum.php?mod=redirect&ptid=<?php echo $_G['tid'];?>&authorid=<?php echo $_GET['authorid'];?>&postno='+this.value" onkeydown="if(event.keyCode==13) {window.location=$('fj_btn').href;return false;}" title="跳转到指定楼层" />-->
<!--<a href="javascript:;" id="fj_btn" class="z" title="跳转到指定楼层"><img src="<?php echo IMGDIR;?>/fj_btn.png" alt="跳转到指定楼层" class="vm" /></a>-->
<!--</div>-->
<?php } ?>

            <!--调用于用戶帖子被警告的图标及文字-->
<?php if($post['warned']) { ?>
<a href="forum.php?mod=misc&amp;action=viewwarning&amp;tid=<?php echo $_G['tid'];?>&amp;uid=<?php echo $post['authorid'];?>" title="受到警告" class="y" onclick="showWindow('viewwarning', this.href)"><img src="<?php echo IMGDIR;?>/warning.gif" alt="受到警告" /></a>
<?php } ?>

                <!--楼主链接地址-->
<!--<strong>-->
<!--<a href="<?php if($post['first']) { ?>forum.php?mod=viewthread&tid=<?php echo $_G['tid'];?><?php echo $fromuid;?><?php } else { ?>forum.php?mod=redirect&goto=findpost&ptid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?><?php echo $fromuid;?><?php } ?>"  <?php if($fromuid) { ?>title="您的朋友访问此链接后，您将获得相应的积分奖励"<?php } ?> id="postnum<?php echo $post['pid'];?>" onclick="setCopy(this.href, '帖子地址复制成功');return false;">-->
<!--&lt;!&ndash;<?php if(isset($post['isstick'])) { ?>&ndash;&gt;-->
<!--<img src ="<?php echo IMGDIR;?>/settop.png" title="置顶回复" class="vm" /> 来自 <?php echo $post['number'];?><?php echo $postnostick;?>-->
<!--&lt;!&ndash;<?php } elseif($post['number'] == -1) { ?>&ndash;&gt;-->

<!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if(!empty($postno[$post['number']])) { ?>&ndash;&gt;-->
<!--<?php echo $postno[$post['number']];?>-->
<!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
<!--<em><?php echo $post['number'];?></em><?php echo $postno['0'];?>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--</a>-->
<!--</strong>-->



<?php } ?>


<div class="pti">

<div class="pdbt">
                    <!--调用于抢楼帖所中楼的显示等-->
<?php if(!$post['first'] && $post['rewardfloor']) { ?>
<label class="pdbts pdbts_1">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;checkrush=1" rel="nofollow" title="查看抢中楼层" class="v">恭喜</a>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;checkrush=1" rel="nofollow" title="查看抢中楼层" class="b">抢中本楼</a>
</label>
<?php } if(!$post['first'] && $_G['forum_thread']['special'] == 5) { ?>
<label class="pdbts pdbts_<?php echo intval($post['stand']); ?>">
<?php if($post['stand'] == 1) { ?><a class="v" href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;filter=debate&amp;stand=1" title="只看正方">正方</a>
<?php } elseif($post['stand'] == 2) { ?><a class="v" href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;filter=debate&amp;stand=2" title="只看反方">反方</a>
<?php } else { ?><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;filter=debate&amp;stand=0" title="只看中立">中立</a><?php } if($post['stand']) { ?>
<a class="b" href="forum.php?mod=misc&amp;action=debatevote&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" id="voterdebate_<?php echo $post['pid'];?>" onclick="ajaxmenu(this);doane(event);">支持 <?php echo $post['voters'];?></a>
<?php } ?>
</label>
<?php } ?>

</div>


<div class="authi">
                    <!--empty 未定义-->
<?php if($close_leftinfo && !$post['anonymous'] && $postshowavatars && $showavatars) { ?>
<!--<a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>" target="_blank" class="xi2 z" style="padding-right:10px;">-->
                        <?php echo avatar($post['authorid'], 'small'); ?>                    <!--</a>-->
<?php } $_self = $thread['author'] && $post['author'] == $thread['author'] && $post['position'] !== '1';?>                    <!--调用于显示在线图标icon-->
                <!--&lt;!&ndash;<?php if($_self ) { ?>&ndash;&gt;-->
    <!--<img class="authicn vm" id="authicon<?php echo $post['pid'];?>" src="<?php echo IMGDIR;?>/ico_lz.png" />-->
<!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
                        <!--&lt;!&ndash;<?php if(!$post['anonymous'] && $_G['cache']['groupicon'][$post['groupid']]) { ?>&ndash;&gt;-->
                            <!--<img class="authicn vm" id="authicon<?php echo $post['pid'];?>" src="<?php echo $_G['cache']['groupicon'][$post['groupid']];?>" />-->
                        <!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
                            <!--<img class="authicn vm" id="authicon<?php echo $post['pid'];?>" src="<?php echo $_G['cache']['groupicon']['0'];?>" />-->
                        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->


<?php if($post['authorid'] && !$post['anonymous']) { ?>

                            <!--empty 未定义-->
                            <?php if($_self) { ?>
                            <!--&nbsp;楼主<span class="pipe">|</span>-->
                            <?php } ?>

                             <!--empty 未定义-->
                            <?php if(!$_G['setting']['authoronleft']) { ?>
                                 <a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>" target="_blank" class="xi2">
                                     <?php if($post['field1']) { ?>
                                     <?php echo $post['field1'];?>
                                     <?php } else { ?>
                                     <?php echo $post['author'];?>
                                     <?php } ?>
                                 </a>
                                    <?php echo $authorverifys;?>
                            <?php } ?>

                            <?php if($close_leftinfo) { } ?>

                            <!--发帖时间/回帖时间-->
                            <!--<em id="authorposton<?php echo $post['pid'];?>">发表于 <?php echo $post['dateline'];?></em>-->

                            <?php if($post['status'] & 8) { ?>
                                <span class="xg1"><?php if($_G['setting']['mobile']['mobilecomefrom']) { ?><?php echo $_G['setting']['mobile']['mobilecomefrom'];?><?php } else { ?>来自手机<?php } ?></span>
                            <?php } ?>

                            <!--&lt;!&ndash;<?php if($post['invisible'] == 0) { ?>&ndash;&gt;-->
                                <!--&lt;!&ndash;分割 | &ndash;&gt;-->
                                <!--&lt;!&ndash;<span class="pipe">|</span>&ndash;&gt;-->
                    <!---->
                                <!--&lt;!&ndash;<?php if(!IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']) { ?>&ndash;&gt;-->
                                    <!--&lt;!&ndash;只看该作者&ndash;&gt;-->
                                    <!--<a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;page=<?php echo $page;?>&amp;authorid=<?php echo $post['authorid'];?>" rel="nofollow">只看该作者</a>-->
                                <!--&lt;!&ndash;<?php } elseif(!$_G['forum_thread']['archiveid']) { ?>&ndash;&gt;-->
                                     <!--&lt;!&ndash;查看全部&ndash;&gt;-->
                                    <!--<a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;page=<?php echo $page;?>" rel="nofollow">显示全部楼层</a>-->
                                <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                            <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->

<?php } elseif(getstatus($post['status'], 5)) { ?>
                            <?php if(!$_G['setting']['authoronleft']) { ?><a href="javascript:;" class="xi2">
                            <?php if($post['field1']) { ?>
                            <?php echo $post['field1'];?>
                            <?php } else { ?>
                            <?php echo $post['author'];?>
                            <?php } ?>
                </a><?php } ?>
                         <!--发帖时间/回帖时间-->
                            <!--&nbsp;<em id="authorposton<?php echo $post['pid'];?>">发表于 <?php echo $post['dateline'];?></em>-->
                        <?php } elseif($post['authorid'] && $post['username'] && $post['anonymous'] || !$post['authorid'] && !$post['username']) { ?>
                            <?php echo $_G['setting']['anonymoustext'];?>&nbsp;
                            <!--发帖时间/回帖时间-->
                            <!--<em id="authorposton<?php echo $post['pid'];?>">发表于 <?php echo $post['dateline'];?></em>-->
<?php } ?>


                    <!--empty 未定义-->
<!--&lt;!&ndash;<?php if(!IS_ROBOT && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>&ndash;&gt;-->

                    <!--&lt;!&ndash;<?php if($_G['forum_thread']['attachment'] == 2 && $_G['group']['allowgetimage'] && (!$_G['setting']['guestviewthumb']['flag'] || $_G['setting']['guestviewthumb']['flag'] && $_G['uid'])) { ?>&ndash;&gt;-->

                        <!--<span class="pipe">|</span><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;from=album">只看大图</a>-->
                    <!---->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->

<!--<span class="none"><img src="<?php echo IMGDIR;?>/arw_r.gif" class="vm" alt="回帖奖励" /></span>-->

<!--&lt;!&ndash;<?php if(!$rushreply) { ?>&ndash;&gt;-->
                            <!--&lt;!&ndash;<?php if($ordertype != 1) { ?>&ndash;&gt;-->
                                <!--<span class="pipe show">|</span><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;ordertype=1"  class="show">倒序浏览</a>-->
                            <!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
                                <!--<span class="pipe show">|</span><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;ordertype=2"  class="show">正序浏览</a>-->
                            <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->

<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->

                <!--empty 未定义-->
<!--&lt;!&ndash;<?php if($post['first']) { ?>&ndash;&gt;-->
<!--<span class="pipe show">|</span><a href="javascript:;" onclick="readmode($('thread_subject').innerHTML, <?php echo $post['pid'];?>);" class="show">阅读模式</a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->


<?php if(!empty($_G['setting']['pluginhooks']['viewthread_postheader'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postheader'][$postcount];?>
</div>



</div>


</div><?php $ad_a_pr=adshow("thread/a_pr/3/$postcount");?>    <?php if(!$postcount && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>
        <!--内容-->
<div class="pct"><?php echo adshow("thread/a_pt/2/$postcount");?><?php if(empty($ad_a_pr_css)) { ?>
<style type="text/css">.pcb{margin-right:0}</style><?php $ad_a_pr_css=1;?><?php } if(!$post['first'] && $post['replycredit'] > 0) { ?>
<div class="cm">
<h3 class="psth xs1"><span class="icon_ring vm"></span>
回帖奖励 <span class="xw1 xs2 xi1">+<?php echo $post['replycredit'];?></span> <?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['title'];?>
</h3>
</div>
<?php } ?><div class="pcb">
<?php if(!$_G['forum']['ismoderator'] && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($_G['thread']['digest'] == 0 && ($post['groupid'] == 4 || $post['groupid'] == 5 || $post['memberstatus'] == '-1')))) { ?>
<div class="locked">提示: <em>作者被禁止或删除 内容自动屏蔽</em></div>
<?php } elseif(!$_G['forum']['ismoderator'] && $post['status'] & 1) { ?>
<div class="locked">提示: <em>该帖被管理员或版主屏蔽</em></div>
<?php } elseif($needhiddenreply) { ?>
<div class="locked">此帖仅作者可见</div>
<?php } elseif($post['first'] && $_G['forum_threadpay']) { include template('forum/viewthread_pay'); } elseif($_G['forum_discuzcode']['passwordlock'][$post['pid']]) { ?>
<div class="locked">本帖为密码帖 ，请输入密码<input type="text" id="postpw_<?php echo $post['pid'];?>" class="vm" />&nbsp;<button class="pn vm" type="button" onclick="submitpostpw(<?php echo $post['pid'];?><?php if($_GET['from'] == 'preview') { ?>,<?php echo $post['tid'];?><?php } else { } ?>)"><strong>提交</strong></button></div>
<?php } else { if(!$post['first'] && !empty($post['subject'])) { ?>
<h2><?php echo $post['subject'];?></h2>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_posttop'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_posttop'][$postcount];?>
<?php if($_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($_G['thread']['digest'] == 0 && ($post['groupid'] == 4 || $post['groupid'] == 5 || $post['memberstatus'] == '-1')))) { ?>
<div class="locked">提示: <em>作者被禁止或删除 内容自动屏蔽，只有管理员或有管理权限的成员可见</em></div>
<?php } elseif($post['status'] & 1) { ?>
<div class="locked">提示: <em>该帖被管理员或版主屏蔽，只有管理员或有管理权限的成员可见</em></div>
<?php } if(!$post['first'] && $hiddenreplies && $_G['forum']['ismoderator']) { ?>
<div class="locked">此帖仅作者可见</div>
<?php } if($post['first']) { ?> 
<?php if($_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0 && empty($previewspecial)) { ?>
<div class="locked"><em class="y"><a href="forum.php?mod=misc&amp;action=viewpayments&amp;tid=<?php echo $_G['tid'];?>" onclick="showWindow('pay', this.href)">记录</a></em>付费主题, 价格: <strong><?php echo $_G['forum_thread']['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?> </strong></div>
<?php } if($threadsort && $threadsortshow) { if($threadsortshow['typetemplate']) { ?>
<?php echo $threadsortshow['typetemplate'];?>
<?php } elseif($threadsortshow['optionlist']) { ?>
<div class="typeoption">
<?php if($threadsortshow['optionlist'] == 'expire') { ?>
该信息已经过期
<?php } else { ?>
<table summary="分类信息" cellpadding="0" cellspacing="0" class="cgtl mbm">
<caption><?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?></caption>
<tbody><?php if(is_array($threadsortshow['optionlist'])) foreach($threadsortshow['optionlist'] as $option) { if($option['type'] != 'info') { ?>
<tr>
<th><?php echo $option['title'];?>:</th>
<td><?php if($option['value'] !== '') { ?><?php echo $option['value'];?> <?php echo $option['unit'];?><?php } else { ?>-<?php } ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
<?php } ?>
</div>
<?php } } } if($_G['forum_discuzcode']['passwordauthor'][$post['pid']]) { ?>
<div class="locked">本帖为密码帖</div>
<?php } ?>
<div class="<?php if(!$_G['forum_thread']['special']) { ?>t_fsz<?php } else { ?>pcbs<?php } ?>">
<?php echo $_G['forum_posthtml']['header'][$post['pid']];?>
<?php if($post['first']) { if(!$_G['forum_thread']['special']) { ?>
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_<?php echo $post['pid'];?>">
<?php if(!$_G['inajax']) { if($ad_a_pr) { ?>
<?php echo $ad_a_pr;?>
<?php } } if(!empty($_G['setting']['guesttipsinthread']['flag']) && empty($_G['uid']) && !$post['attachment'] && $_GET['from'] != 'preview') { ?>
<div class="attach_nopermission attach_tips">
<div>
<h3><strong>
<?php if(!empty($_G['setting']['guesttipsinthread']['text'])) { ?>
<?php echo $_G['setting']['guesttipsinthread']['text'];?>
<?php } else { ?>
马上注册，结交更多好友，享用更多功能，让你轻松玩转社区。
<?php } ?>
</strong></h3>
<p>您需要 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href);return false;">登录</a> 才可以下载或查看，没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" title="注册帐号"><?php echo $_G['setting']['reglinkname'];?></a> <?php if(!empty($_G['setting']['pluginhooks']['global_login_text'])) echo $_G['setting']['pluginhooks']['global_login_text'];?></p>
</div>
<span class="atips_close" onclick="this.parentNode.style.display='none'">x</span>
</div>
<?php } ?>
<?php echo $post['message'];?></td></tr></table>
<?php } elseif($_G['forum_thread']['special'] == 1) { include template('forum/viewthread_poll'); } elseif($_G['forum_thread']['special'] == 2) { include template('forum/viewthread_trade'); } elseif($_G['forum_thread']['special'] == 3) { include template('forum/viewthread_reward'); } elseif($_G['forum_thread']['special'] == 4) { include template('forum/viewthread_activity'); } elseif($_G['forum_thread']['special'] == 5) { include template('forum/viewthread_debate'); } elseif($_G['forum_thread']['special'] == 127) { ?>
<?php echo $threadplughtml;?>
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_<?php echo $post['pid'];?>"><?php echo $post['message'];?></td></tr></table>
<?php } } else { ?>
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_<?php echo $post['pid'];?>">
<?php if(!$_G['inajax']) { if($ad_a_pr) { ?>
<?php echo $ad_a_pr;?>
<?php } } if($post['invisible'] != '-2' || $_G['forum']['ismoderator']) { ?><?php echo $post['message'];?><?php } else { ?><span class="xg1">待审核</span><?php } ?></td></tr></table>
<?php } ?>
<?php echo $_G['forum_posthtml']['footer'][$post['pid']];?>

<?php if($post['first'] && ($post['tags'] || $relatedkeywords) && $_GET['from'] != 'preview') { ?>
<div class="ptg mbm mtn">
<?php if($post['tags']) { $tagi = 0;?><?php if(is_array($post['tags'])) foreach($post['tags'] as $var) { if($tagi) { ?>, <?php } ?><a title="<?php echo $var['1'];?>" href="misc.php?mod=tag&amp;id=<?php echo $var['0'];?>" target="_blank"><?php echo $var['1'];?></a><?php $tagi++;?><?php } } if($relatedkeywords) { ?><span><?php echo $relatedkeywords;?></span><?php } ?>
</div>
<?php } if(!IS_ROBOT && $post['first'] && !$_G['forum_thread']['archiveid']) { if(!empty($lastmod['modaction'])) { ?><div class="modact"><a href="forum.php?mod=misc&amp;action=viewthreadmod&amp;tid=<?php echo $_G['tid'];?>" title="帖子模式" onclick="showWindow('viewthreadmod', this.href)"><?php if($lastmod['modactiontype'] == 'REB') { ?>本主题由 <?php echo $lastmod['modusername'];?> 于 <?php echo $lastmod['moddateline'];?> <?php echo $lastmod['modaction'];?>到 <?php echo $lastmod['reason'];?><?php } else { ?>本主题由 <?php echo $lastmod['modusername'];?> 于 <?php echo $lastmod['moddateline'];?> <?php echo $lastmod['modaction'];?><?php } ?></a></div><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_modaction'])) echo $_G['setting']['pluginhooks']['viewthread_modaction'];?>
<?php } if($post['attachment'] && $_GET['from'] != 'preview') { ?>
<div class="attach_nopermission attach_tips">
<div>
<h3><strong>本帖子中包含更多资源</strong></h3>
<p><?php if($_G['uid']) { ?>您所在的用户组无法下载或查看附件<?php } elseif($_G['connectguest']) { ?>您需要 <a href="member.php?mod=connect" class="xi2">完善帐号信息</a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2">绑定已有帐号</a> 后才可以下载或查看<?php } else { ?>您需要 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href);return false;">登录</a> 才可以下载或查看，没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" title="注册帐号"><?php echo $_G['setting']['reglinkname'];?></a> <?php if(!empty($_G['setting']['pluginhooks']['global_login_text'])) echo $_G['setting']['pluginhooks']['global_login_text'];?><?php } ?></p>
</div>
<span class="atips_close" onclick="this.parentNode.style.display='none'">x</span>
</div>
<?php } elseif($post['imagelist'] || $post['attachlist']) { ?>
<div class="pattl">
<?php if($post['imagelist'] && $_G['setting']['imagelistthumb'] && $post['imagelistcount'] >= $_G['setting']['imagelistthumb']) { if(!isset($imagelistkey)) { $imagelistkey = rawurlencode(dsign($_G[tid].'|100|100'))?><script type="text/javascript" reload="1">var imagelistkey = '<?php echo $imagelistkey;?>';</script>
<?php } $post['imagelistthumb'] = true;?><div class="bbda cl mtw mbm pbm">
<strong>更多图片</strong>
<a href="javascript:;" onclick="attachimglst('<?php echo $post['pid'];?>', 0)" class="xi2 attl_g">小图</a>
<a href="javascript:;" onclick="attachimglst('<?php echo $post['pid'];?>', 1, <?php echo intval($_G['setting']['lazyload']); ?>)" class="xi2 attl_m">大图</a>
</div>
<div id="imagelist_<?php echo $post['pid'];?>" class="cl" style="display:none"><?php echo showattach($post, 1); ?></div>
<div id="imagelistthumb_<?php echo $post['pid'];?>" class="pattl_c cl"><img src="<?php echo IMGDIR;?>/loading.gif" width="16" height="16" class="vm" /> 组图打开中，请稍候......</div>
<?php } else { echo showattach($post, 1); } if($post['attachlist']) { echo showattach($post); } ?>
</div>
<?php } if($_G['setting']['allowfastreply'] && $post['first'] && $fastpost && $allowpostreply && !$_G['forum_thread']['archiveid'] && $_GET['from'] != 'preview') { ?>
<form method="post" autocomplete="off" id="vfastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;fromvf=1&amp;extra=<?php echo $_G['gp_extra'];?>&amp;replysubmit=yes<?php if($_G['gp_ordertype'] != 1) { ?>&amp;infloat=yes&amp;handlekey=vfastpost<?php } if($_G['gp_from']) { ?>&amp;from=<?php echo $_G['gp_from'];?><?php } ?>" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost('vfastpostform', 'return_reply', 'return_reply', 'onerror');return false;">
<div id="vfastpost" class="fullvfastpost">				
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<table cellspacing="0" cellpadding="0" id="vfastposttb">
<tr>
<td id="vf_l"></td>
<td id="vf_m"><input type="text" name="message" id="vmessage" onKeyDown="seditor_ctlent(event, '$(\'vfastpostform\').submit()');"/></td>
<td id="vf_r"></td>						
<td id="vf_b">
<button type="submit" class="pn pnc" name="replysubmit" id="vreplysubmit" value="true" style="">post_newreply</button>								
</td>						
</tr>
</table>				
</div>
<div id="vfastpostseccheck"></div>				
</form>
<script type="text/javascript">vmessage();</script>
<?php } ?>

</div>
<div id="comment_<?php echo $post['pid'];?>" class="cm">
<?php if($_GET['from'] != 'preview' && $_G['setting']['commentnumber'] && !empty($comments[$post['pid']])) { ?>
<h3 class="psth xs1"><span class="icon_ring vm"></span>点评</h3>
<?php if($totalcomment[$post['pid']]) { ?><div class="pstl"><?php echo $totalcomment[$post['pid']];?></div><?php } if(is_array($comments[$post['pid']])) foreach($comments[$post['pid']] as $comment) { ?><div class="pstl xs1 cl">
<div class="psta vm">
<a href="home.php?mod=space&amp;uid=<?php echo $comment['authorid'];?>" c="1"><?php echo $comment['avatar'];?></a>
<?php if($comment['authorid']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $comment['authorid'];?>" class="xi2 xw1"><?php echo $comment['author'];?></a>
<?php } else { ?>
游客
<?php } ?>
</div>
<div class="psti">
<?php echo $comment['comment'];?>&nbsp;
<?php if($comment['rpid']) { ?>
<a href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=<?php echo $comment['rpid'];?>&amp;ptid=<?php echo $_G['tid'];?>" class="xi2">详情</a>
<a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $comment['rpid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" class="xi2" onclick="showWindow('reply', this.href)">回复</a>
<?php } ?>
<span class="xg1">
发表于 <?php echo dgmdate($comment[dateline], 'u');?><?php if($comment['useip'] && $_G['group']['allowviewip']) { ?>&nbsp;IP:<?php echo $comment['useip'];?><?php if($comment['port']) { ?>:<?php echo $comment['port'];?><?php } } if($_G['forum']['ismoderator'] && $_G['group']['allowdelpost']) { ?>&nbsp;<a href="javascript:;" onclick="modaction('delcomment', <?php echo $comment['id'];?>)">删除</a><?php } ?>
</span>
</div>
</div>
<?php } if($commentcount[$post['pid']] > $_G['setting']['commentnumber']) { ?><div class="pgs mbm mtn cl"><div class="pg"><a href="javascript:;" class="nxt" onclick="ajaxget('forum.php?mod=misc&action=commentmore&tid=<?php echo $post['tid'];?>&pid=<?php echo $post['pid'];?>&page=2', 'comment_<?php echo $post['pid'];?>')">下一页</a></div></div><?php } } ?>
</div>

<?php if($_GET['from'] != 'preview' && !empty($post['ratelog'])) { ?>
<h3 class="psth xs1"><span class="icon_ring vm"></span>评分</h3>
<dl id="ratelog_<?php echo $post['pid'];?>" class="rate<?php if(!empty($_G['cookie']['ratecollapse'])) { ?> rate_collapse<?php } ?>">
<?php if($_G['setting']['ratelogon']) { ?>
<dd style="margin:0">
<?php } else { ?>
<dt>
<?php if(!empty($postlist[$post['pid']]['totalrate'])) { ?>
<strong><a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" onclick="showWindow('viewratings', this.href)" title="已有<?php echo count($postlist[$post['pid']]['totalrate']);; ?>人评分, 查看全部评分"><?php echo count($postlist[$post['pid']]['totalrate']);; ?></a></strong>
<p><a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" onclick="showWindow('viewratings', this.href)">查看全部评分</a></p>
<?php } ?>
</dt>
<dd>
<?php } ?>
<div id="post_rate_<?php echo $post['pid'];?>"></div>
<?php if($_G['setting']['ratelogon']) { ?>
<table class="ratl">
<tr>
<th class="xw1" width="120"><a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" onclick="showWindow('viewratings', this.href)" title="查看全部评分"> 参与人数 <span class="xi1"><?php echo count($postlist[$post['pid']]['totalrate']);; ?></span></a></th><?php if(is_array($post['ratelogextcredits'])) foreach($post['ratelogextcredits'] as $id => $score) { if($score > 0) { ?>
<th class="xw1" width="80"><?php echo $_G['setting']['extcredits'][$id]['title'];?> <i><span class="xi1">+<?php echo $score;?></span></i></th>
<?php } else { ?>
<th class="xw1" width="80"><?php echo $_G['setting']['extcredits'][$id]['title'];?> <i><span class="xi1"><?php echo $score;?></span></i></th>
<?php } } ?>
<th>
<a href="javascript:;" onclick="toggleRatelogCollapse('ratelog_<?php echo $post['pid'];?>', this);" class="y xi2 op"><?php if(!empty($_G['cookie']['ratecollapse'])) { ?>展开<?php } else { ?>收起<?php } ?></a>
<i class="txt_h">理由</i>
</th>
</tr>
<tbody class="ratl_l"><?php if(is_array($post['ratelog'])) foreach($post['ratelog'] as $uid => $ratelog) { ?><tr id="rate_<?php echo $post['pid'];?>_<?php echo $uid;?>">
<td>
<a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank"><?php echo avatar($uid, 'small');; ?></a> <a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank"><?php echo $ratelog['username'];?></a>
</td><?php if(is_array($post['ratelogextcredits'])) foreach($post['ratelogextcredits'] as $id => $score) { if($ratelog['score'][$id] > 0) { ?>
<td class="xi1"> + <?php echo $ratelog['score'][$id];?></td>
<?php } else { ?>
<td class="xg1"><?php echo $ratelog['score'][$id];?></td>
<?php } } ?>
<td class="xg1"><?php echo $ratelog['reason'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
<p class="ratc">
<a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" onclick="showWindow('viewratings', this.href)" title="查看全部评分" class="xi2">查看全部评分</a>
</p>
<?php } else { ?>
<ul class="cl"><?php if(is_array($post['ratelog'])) foreach($post['ratelog'] as $uid => $ratelog) { ?><li>
<p id="rate_<?php echo $post['pid'];?>_<?php echo $uid;?>" onmouseover="showTip(this)" tip="<strong><?php echo $ratelog['reason'];?></strong>&nbsp;<?php if(is_array($ratelog['score'])) foreach($ratelog['score'] as $id => $score) { if($score > 0) { ?>
<em class='xi1'><?php echo $_G['setting']['extcredits'][$id]['title'];?> + <?php echo $score;?> <?php echo $_G['setting']['extcredits'][$id]['unit'];?></em>
<?php } else { ?>
<span><?php echo $_G['setting']['extcredits'][$id]['title'];?> <?php echo $score;?> <?php echo $_G['setting']['extcredits'][$id]['unit'];?></span>
<?php } } ?>" class="mtn mbn"><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank" class="avt"><?php echo avatar($uid, 'small');; ?></a></p>
<p><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank"><?php echo $ratelog['username'];?></a></p>
</li>
<?php } ?>
</ul>
<?php } ?>
</dd>
</dl>
<?php } else { ?>
<div id="post_rate_div_<?php echo $post['pid'];?>"></div>
<?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_postbottom'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postbottom'][$postcount];?>
</div>
</div>
        <?php } else { ?>

            <div class="pct_1">
                <?php echo adshow("thread/a_pt/2/$postcount");?>                <?php if(empty($ad_a_pr_css)) { ?>
                <style type="text/css">.pcb{margin-right:0}</style>
                <?php $ad_a_pr_css=1;?>                <?php } ?>

                <?php if(!$post['first'] && $post['replycredit'] > 0) { ?>
                <div class="cm">
                    <h3 class="psth xs1"><span class="icon_ring vm"></span>
                        回帖奖励 <span class="xw1 xs2 xi1">+<?php echo $post['replycredit'];?></span> <?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['title'];?>
                    </h3>
                </div>
                <?php } ?>

                <div class="pcb">
<?php if(!$_G['forum']['ismoderator'] && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($_G['thread']['digest'] == 0 && ($post['groupid'] == 4 || $post['groupid'] == 5 || $post['memberstatus'] == '-1')))) { ?>
<div class="locked">提示: <em>作者被禁止或删除 内容自动屏蔽</em></div>
<?php } elseif(!$_G['forum']['ismoderator'] && $post['status'] & 1) { ?>
<div class="locked">提示: <em>该帖被管理员或版主屏蔽</em></div>
<?php } elseif($needhiddenreply) { ?>
<div class="locked">此帖仅作者可见</div>
<?php } elseif($post['first'] && $_G['forum_threadpay']) { include template('forum/viewthread_pay'); } elseif($_G['forum_discuzcode']['passwordlock'][$post['pid']]) { ?>
<div class="locked">本帖为密码帖 ，请输入密码<input type="text" id="postpw_<?php echo $post['pid'];?>" class="vm" />&nbsp;<button class="pn vm" type="button" onclick="submitpostpw(<?php echo $post['pid'];?><?php if($_GET['from'] == 'preview') { ?>,<?php echo $post['tid'];?><?php } else { } ?>)"><strong>提交</strong></button></div>
<?php } else { if(!$post['first'] && !empty($post['subject'])) { ?>
<h2><?php echo $post['subject'];?></h2>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_posttop'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_posttop'][$postcount];?>
<?php if($_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($_G['thread']['digest'] == 0 && ($post['groupid'] == 4 || $post['groupid'] == 5 || $post['memberstatus'] == '-1')))) { ?>
<div class="locked">提示: <em>作者被禁止或删除 内容自动屏蔽，只有管理员或有管理权限的成员可见</em></div>
<?php } elseif($post['status'] & 1) { ?>
<div class="locked">提示: <em>该帖被管理员或版主屏蔽，只有管理员或有管理权限的成员可见</em></div>
<?php } if(!$post['first'] && $hiddenreplies && $_G['forum']['ismoderator']) { ?>
<div class="locked">此帖仅作者可见</div>
<?php } if($post['first']) { ?> 
<?php if($_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0 && empty($previewspecial)) { ?>
<div class="locked"><em class="y"><a href="forum.php?mod=misc&amp;action=viewpayments&amp;tid=<?php echo $_G['tid'];?>" onclick="showWindow('pay', this.href)">记录</a></em>付费主题, 价格: <strong><?php echo $_G['forum_thread']['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?> </strong></div>
<?php } if($threadsort && $threadsortshow) { if($threadsortshow['typetemplate']) { ?>
<?php echo $threadsortshow['typetemplate'];?>
<?php } elseif($threadsortshow['optionlist']) { ?>
<div class="typeoption">
<?php if($threadsortshow['optionlist'] == 'expire') { ?>
该信息已经过期
<?php } else { ?>
<table summary="分类信息" cellpadding="0" cellspacing="0" class="cgtl mbm">
<caption><?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?></caption>
<tbody><?php if(is_array($threadsortshow['optionlist'])) foreach($threadsortshow['optionlist'] as $option) { if($option['type'] != 'info') { ?>
<tr>
<th><?php echo $option['title'];?>:</th>
<td><?php if($option['value'] !== '') { ?><?php echo $option['value'];?> <?php echo $option['unit'];?><?php } else { ?>-<?php } ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
<?php } ?>
</div>
<?php } } } if($_G['forum_discuzcode']['passwordauthor'][$post['pid']]) { ?>
<div class="locked">本帖为密码帖</div>
<?php } ?>
<div class="<?php if(!$_G['forum_thread']['special']) { ?>t_fsz<?php } else { ?>pcbs<?php } ?>">
<?php echo $_G['forum_posthtml']['header'][$post['pid']];?>
<?php if($post['first']) { if(!$_G['forum_thread']['special']) { ?>
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_<?php echo $post['pid'];?>">
<?php if(!$_G['inajax']) { if($ad_a_pr) { ?>
<?php echo $ad_a_pr;?>
<?php } } if(!empty($_G['setting']['guesttipsinthread']['flag']) && empty($_G['uid']) && !$post['attachment'] && $_GET['from'] != 'preview') { ?>
<div class="attach_nopermission attach_tips">
<div>
<h3><strong>
<?php if(!empty($_G['setting']['guesttipsinthread']['text'])) { ?>
<?php echo $_G['setting']['guesttipsinthread']['text'];?>
<?php } else { ?>
马上注册，结交更多好友，享用更多功能，让你轻松玩转社区。
<?php } ?>
</strong></h3>
<p>您需要 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href);return false;">登录</a> 才可以下载或查看，没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" title="注册帐号"><?php echo $_G['setting']['reglinkname'];?></a> <?php if(!empty($_G['setting']['pluginhooks']['global_login_text'])) echo $_G['setting']['pluginhooks']['global_login_text'];?></p>
</div>
<span class="atips_close" onclick="this.parentNode.style.display='none'">x</span>
</div>
<?php } ?>
<?php echo $post['message'];?></td></tr></table>
<?php } elseif($_G['forum_thread']['special'] == 1) { include template('forum/viewthread_poll'); } elseif($_G['forum_thread']['special'] == 2) { include template('forum/viewthread_trade'); } elseif($_G['forum_thread']['special'] == 3) { include template('forum/viewthread_reward'); } elseif($_G['forum_thread']['special'] == 4) { include template('forum/viewthread_activity'); } elseif($_G['forum_thread']['special'] == 5) { include template('forum/viewthread_debate'); } elseif($_G['forum_thread']['special'] == 127) { ?>
<?php echo $threadplughtml;?>
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_<?php echo $post['pid'];?>"><?php echo $post['message'];?></td></tr></table>
<?php } } else { ?>
<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_<?php echo $post['pid'];?>">
<?php if(!$_G['inajax']) { if($ad_a_pr) { ?>
<?php echo $ad_a_pr;?>
<?php } } if($post['invisible'] != '-2' || $_G['forum']['ismoderator']) { ?><?php echo $post['message'];?><?php } else { ?><span class="xg1">待审核</span><?php } ?></td></tr></table>
<?php } ?>
<?php echo $_G['forum_posthtml']['footer'][$post['pid']];?>

<?php if($post['first'] && ($post['tags'] || $relatedkeywords) && $_GET['from'] != 'preview') { ?>
<div class="ptg mbm mtn">
<?php if($post['tags']) { $tagi = 0;?><?php if(is_array($post['tags'])) foreach($post['tags'] as $var) { if($tagi) { ?>, <?php } ?><a title="<?php echo $var['1'];?>" href="misc.php?mod=tag&amp;id=<?php echo $var['0'];?>" target="_blank"><?php echo $var['1'];?></a><?php $tagi++;?><?php } } if($relatedkeywords) { ?><span><?php echo $relatedkeywords;?></span><?php } ?>
</div>
<?php } if(!IS_ROBOT && $post['first'] && !$_G['forum_thread']['archiveid']) { if(!empty($lastmod['modaction'])) { ?><div class="modact"><a href="forum.php?mod=misc&amp;action=viewthreadmod&amp;tid=<?php echo $_G['tid'];?>" title="帖子模式" onclick="showWindow('viewthreadmod', this.href)"><?php if($lastmod['modactiontype'] == 'REB') { ?>本主题由 <?php echo $lastmod['modusername'];?> 于 <?php echo $lastmod['moddateline'];?> <?php echo $lastmod['modaction'];?>到 <?php echo $lastmod['reason'];?><?php } else { ?>本主题由 <?php echo $lastmod['modusername'];?> 于 <?php echo $lastmod['moddateline'];?> <?php echo $lastmod['modaction'];?><?php } ?></a></div><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_modaction'])) echo $_G['setting']['pluginhooks']['viewthread_modaction'];?>
<?php } if($post['attachment'] && $_GET['from'] != 'preview') { ?>
<div class="attach_nopermission attach_tips">
<div>
<h3><strong>本帖子中包含更多资源</strong></h3>
<p><?php if($_G['uid']) { ?>您所在的用户组无法下载或查看附件<?php } elseif($_G['connectguest']) { ?>您需要 <a href="member.php?mod=connect" class="xi2">完善帐号信息</a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2">绑定已有帐号</a> 后才可以下载或查看<?php } else { ?>您需要 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href);return false;">登录</a> 才可以下载或查看，没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" title="注册帐号"><?php echo $_G['setting']['reglinkname'];?></a> <?php if(!empty($_G['setting']['pluginhooks']['global_login_text'])) echo $_G['setting']['pluginhooks']['global_login_text'];?><?php } ?></p>
</div>
<span class="atips_close" onclick="this.parentNode.style.display='none'">x</span>
</div>
<?php } elseif($post['imagelist'] || $post['attachlist']) { ?>
<div class="pattl">
<?php if($post['imagelist'] && $_G['setting']['imagelistthumb'] && $post['imagelistcount'] >= $_G['setting']['imagelistthumb']) { if(!isset($imagelistkey)) { $imagelistkey = rawurlencode(dsign($_G[tid].'|100|100'))?><script type="text/javascript" reload="1">var imagelistkey = '<?php echo $imagelistkey;?>';</script>
<?php } $post['imagelistthumb'] = true;?><div class="bbda cl mtw mbm pbm">
<strong>更多图片</strong>
<a href="javascript:;" onclick="attachimglst('<?php echo $post['pid'];?>', 0)" class="xi2 attl_g">小图</a>
<a href="javascript:;" onclick="attachimglst('<?php echo $post['pid'];?>', 1, <?php echo intval($_G['setting']['lazyload']); ?>)" class="xi2 attl_m">大图</a>
</div>
<div id="imagelist_<?php echo $post['pid'];?>" class="cl" style="display:none"><?php echo showattach($post, 1); ?></div>
<div id="imagelistthumb_<?php echo $post['pid'];?>" class="pattl_c cl"><img src="<?php echo IMGDIR;?>/loading.gif" width="16" height="16" class="vm" /> 组图打开中，请稍候......</div>
<?php } else { echo showattach($post, 1); } if($post['attachlist']) { echo showattach($post); } ?>
</div>
<?php } if($_G['setting']['allowfastreply'] && $post['first'] && $fastpost && $allowpostreply && !$_G['forum_thread']['archiveid'] && $_GET['from'] != 'preview') { ?>
<form method="post" autocomplete="off" id="vfastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;fromvf=1&amp;extra=<?php echo $_G['gp_extra'];?>&amp;replysubmit=yes<?php if($_G['gp_ordertype'] != 1) { ?>&amp;infloat=yes&amp;handlekey=vfastpost<?php } if($_G['gp_from']) { ?>&amp;from=<?php echo $_G['gp_from'];?><?php } ?>" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost('vfastpostform', 'return_reply', 'return_reply', 'onerror');return false;">
<div id="vfastpost" class="fullvfastpost">				
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<table cellspacing="0" cellpadding="0" id="vfastposttb">
<tr>
<td id="vf_l"></td>
<td id="vf_m"><input type="text" name="message" id="vmessage" onKeyDown="seditor_ctlent(event, '$(\'vfastpostform\').submit()');"/></td>
<td id="vf_r"></td>						
<td id="vf_b">
<button type="submit" class="pn pnc" name="replysubmit" id="vreplysubmit" value="true" style="">post_newreply</button>								
</td>						
</tr>
</table>				
</div>
<div id="vfastpostseccheck"></div>				
</form>
<script type="text/javascript">vmessage();</script>
<?php } ?>

</div>
<div id="comment_<?php echo $post['pid'];?>" class="cm">
<?php if($_GET['from'] != 'preview' && $_G['setting']['commentnumber'] && !empty($comments[$post['pid']])) { ?>
<h3 class="psth xs1"><span class="icon_ring vm"></span>点评</h3>
<?php if($totalcomment[$post['pid']]) { ?><div class="pstl"><?php echo $totalcomment[$post['pid']];?></div><?php } if(is_array($comments[$post['pid']])) foreach($comments[$post['pid']] as $comment) { ?><div class="pstl xs1 cl">
<div class="psta vm">
<a href="home.php?mod=space&amp;uid=<?php echo $comment['authorid'];?>" c="1"><?php echo $comment['avatar'];?></a>
<?php if($comment['authorid']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $comment['authorid'];?>" class="xi2 xw1"><?php echo $comment['author'];?></a>
<?php } else { ?>
游客
<?php } ?>
</div>
<div class="psti">
<?php echo $comment['comment'];?>&nbsp;
<?php if($comment['rpid']) { ?>
<a href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=<?php echo $comment['rpid'];?>&amp;ptid=<?php echo $_G['tid'];?>" class="xi2">详情</a>
<a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $comment['rpid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" class="xi2" onclick="showWindow('reply', this.href)">回复</a>
<?php } ?>
<span class="xg1">
发表于 <?php echo dgmdate($comment[dateline], 'u');?><?php if($comment['useip'] && $_G['group']['allowviewip']) { ?>&nbsp;IP:<?php echo $comment['useip'];?><?php if($comment['port']) { ?>:<?php echo $comment['port'];?><?php } } if($_G['forum']['ismoderator'] && $_G['group']['allowdelpost']) { ?>&nbsp;<a href="javascript:;" onclick="modaction('delcomment', <?php echo $comment['id'];?>)">删除</a><?php } ?>
</span>
</div>
</div>
<?php } if($commentcount[$post['pid']] > $_G['setting']['commentnumber']) { ?><div class="pgs mbm mtn cl"><div class="pg"><a href="javascript:;" class="nxt" onclick="ajaxget('forum.php?mod=misc&action=commentmore&tid=<?php echo $post['tid'];?>&pid=<?php echo $post['pid'];?>&page=2', 'comment_<?php echo $post['pid'];?>')">下一页</a></div></div><?php } } ?>
</div>

<?php if($_GET['from'] != 'preview' && !empty($post['ratelog'])) { ?>
<h3 class="psth xs1"><span class="icon_ring vm"></span>评分</h3>
<dl id="ratelog_<?php echo $post['pid'];?>" class="rate<?php if(!empty($_G['cookie']['ratecollapse'])) { ?> rate_collapse<?php } ?>">
<?php if($_G['setting']['ratelogon']) { ?>
<dd style="margin:0">
<?php } else { ?>
<dt>
<?php if(!empty($postlist[$post['pid']]['totalrate'])) { ?>
<strong><a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" onclick="showWindow('viewratings', this.href)" title="已有<?php echo count($postlist[$post['pid']]['totalrate']);; ?>人评分, 查看全部评分"><?php echo count($postlist[$post['pid']]['totalrate']);; ?></a></strong>
<p><a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" onclick="showWindow('viewratings', this.href)">查看全部评分</a></p>
<?php } ?>
</dt>
<dd>
<?php } ?>
<div id="post_rate_<?php echo $post['pid'];?>"></div>
<?php if($_G['setting']['ratelogon']) { ?>
<table class="ratl">
<tr>
<th class="xw1" width="120"><a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" onclick="showWindow('viewratings', this.href)" title="查看全部评分"> 参与人数 <span class="xi1"><?php echo count($postlist[$post['pid']]['totalrate']);; ?></span></a></th><?php if(is_array($post['ratelogextcredits'])) foreach($post['ratelogextcredits'] as $id => $score) { if($score > 0) { ?>
<th class="xw1" width="80"><?php echo $_G['setting']['extcredits'][$id]['title'];?> <i><span class="xi1">+<?php echo $score;?></span></i></th>
<?php } else { ?>
<th class="xw1" width="80"><?php echo $_G['setting']['extcredits'][$id]['title'];?> <i><span class="xi1"><?php echo $score;?></span></i></th>
<?php } } ?>
<th>
<a href="javascript:;" onclick="toggleRatelogCollapse('ratelog_<?php echo $post['pid'];?>', this);" class="y xi2 op"><?php if(!empty($_G['cookie']['ratecollapse'])) { ?>展开<?php } else { ?>收起<?php } ?></a>
<i class="txt_h">理由</i>
</th>
</tr>
<tbody class="ratl_l"><?php if(is_array($post['ratelog'])) foreach($post['ratelog'] as $uid => $ratelog) { ?><tr id="rate_<?php echo $post['pid'];?>_<?php echo $uid;?>">
<td>
<a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank"><?php echo avatar($uid, 'small');; ?></a> <a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank"><?php echo $ratelog['username'];?></a>
</td><?php if(is_array($post['ratelogextcredits'])) foreach($post['ratelogextcredits'] as $id => $score) { if($ratelog['score'][$id] > 0) { ?>
<td class="xi1"> + <?php echo $ratelog['score'][$id];?></td>
<?php } else { ?>
<td class="xg1"><?php echo $ratelog['score'][$id];?></td>
<?php } } ?>
<td class="xg1"><?php echo $ratelog['reason'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
<p class="ratc">
<a href="forum.php?mod=misc&amp;action=viewratings&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>" onclick="showWindow('viewratings', this.href)" title="查看全部评分" class="xi2">查看全部评分</a>
</p>
<?php } else { ?>
<ul class="cl"><?php if(is_array($post['ratelog'])) foreach($post['ratelog'] as $uid => $ratelog) { ?><li>
<p id="rate_<?php echo $post['pid'];?>_<?php echo $uid;?>" onmouseover="showTip(this)" tip="<strong><?php echo $ratelog['reason'];?></strong>&nbsp;<?php if(is_array($ratelog['score'])) foreach($ratelog['score'] as $id => $score) { if($score > 0) { ?>
<em class='xi1'><?php echo $_G['setting']['extcredits'][$id]['title'];?> + <?php echo $score;?> <?php echo $_G['setting']['extcredits'][$id]['unit'];?></em>
<?php } else { ?>
<span><?php echo $_G['setting']['extcredits'][$id]['title'];?> <?php echo $score;?> <?php echo $_G['setting']['extcredits'][$id]['unit'];?></span>
<?php } } ?>" class="mtn mbn"><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank" class="avt"><?php echo avatar($uid, 'small');; ?></a></p>
<p><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank"><?php echo $ratelog['username'];?></a></p>
</li>
<?php } ?>
</ul>
<?php } ?>
</dd>
</dl>
<?php } else { ?>
<div id="post_rate_div_<?php echo $post['pid'];?>"></div>
<?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_postbottom'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postbottom'][$postcount];?>
</div>
            </div>
        <?php } if(helper_access::check_module('collection') && !$_G['forum']['disablecollect']) { if($post['relatecollection']) { ?>
<div class="cm">
<h3 class="psth xs1"><span class="icon_ring vm"></span>本帖被以下淘专辑推荐:</h3>
<ul class="mbw xl xl2 cl"><?php if(is_array($post['relatecollection'])) foreach($post['relatecollection'] as $var) { ?><li>&middot; <a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $var['ctid'];?>" title="<?php echo $var['name'];?>" target="_blank" class="xi2 xw1"><?php echo $var['name'];?></a><span class="pipe">|</span><span class="xg1">主题: <?php echo $var['threadnum'];?>, 订阅: <?php echo $var['follownum'];?></span></li>
<?php } if($post['releatcollectionmore']) { ?>
<li>&middot; <a href="forum.php?mod=collection&amp;tid=<?php echo $_G['tid'];?>" target="_blank" class="xi2 xw1">更多</a></li>
<?php } ?>
</ul>
</div>
<?php if($post['sourcecollection']['ctid']) { ?>
<div>
您是从淘专辑 <a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $post['sourcecollection']['ctid'];?>" target="_blank" class="xi2"><?php echo $post['sourcecollection']['name'];?></a> 访问到本帖的，欢迎对专辑打分：
<form action="forum.php?mod=collection&amp;action=comment&amp;ctid=<?php echo $ctid;?>&amp;tid=<?php echo $_G['tid'];?>" method="POST" class="ptm pbm cl">
<input type="hidden" name="ratescore" id="ratescore" />
<span class="clct_ratestar">
<span class="btn">
<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',1)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',1,'ratescore')">1</a>
<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',2)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',2,'ratescore')">2</a>
<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',3)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',3,'ratescore')">3</a>
<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',4)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',4,'ratescore')">4</a>
<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',5)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',5,'ratescore')">5</a>
</span>
<span id="clct_ratestar_star" class="star star<?php echo $memberrate;?>"></span>
</span>
&nbsp;<button type="submit" value="submit" class="pn"><span>评分</span></button>
</form>
</div>
<?php } } } ?>
</td></tr>



<tr><td class="plc plm">
<?php if($locations[$post['pid']]) { ?>
<div class="mobile-location"><?php echo $locations[$post['pid']]['location'];?></div>
<?php } if(!IS_ROBOT && $post['first'] && !$_G['forum_thread']['archiveid']) { ?>

        <!--调用于显示道具功能-->
<?php if($post['invisible'] == 0) { ?>
<!--<div id="p_btn" class="mtw mbm hm cl">-->
<!--&lt;!&ndash;<?php if(!empty($_G['setting']['pluginhooks']['viewthread_share_method'])) { ?>&ndash;&gt;-->
<!--<div class="tshare cl">-->
<!--<b>分享到:&nbsp;</b>-->
<!--&lt;!&ndash;<?php if(!empty($_G['setting']['pluginhooks']['viewthread_share_method'])) echo $_G['setting']['pluginhooks']['viewthread_share_method'];?>&ndash;&gt;-->
<!--</div>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                    <!---->
<!--&lt;!&ndash;<a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>&amp;formhash=<?php echo FORMHASH;?>" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title = $('favoritenumber').innerHTML + ' 人收藏'" title="收藏本帖">&ndash;&gt;-->
                        <!--&lt;!&ndash;<i>&ndash;&gt;-->
                            <!--&lt;!&ndash;<img src="<?php echo IMGDIR;?>/fav.gif" alt="收藏" />&ndash;&gt;-->
                            <!--&lt;!&ndash;收藏&ndash;&gt;-->
                            <!--&lt;!&ndash;<span id="favoritenumber"<?php if(!$_G['forum_thread']['favtimes']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['favtimes'];?></span>&ndash;&gt;-->
                        <!--&lt;!&ndash;</i>&ndash;&gt;-->
                    <!--&lt;!&ndash;</a>&ndash;&gt;-->

                    <!--&lt;!&ndash;<?php if($_G['group']['raterange'] && $post['authorid']) { ?>&ndash;&gt;-->
<!--<a href="javascript:;" id="ak_rate" onclick="showWindow('rate', 'forum.php?mod=misc&action=rate&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?>', 'get', -1);return false;" title="评分表立场"><i><img src="<?php echo IMGDIR;?>/agree.gif" alt="评分" />评分</i></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if(!$post['anonymous'] && $post['first'] && helper_access::check_module('follow')) { ?>&ndash;&gt;-->
<!--<a class="followp" href="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=<?php echo $_G['tid'];?>&amp;from=forum" onclick="showWindow('relaythread', this.href, 'get', 0);" title="转播求扩散"><i><img src="<?php echo IMGDIR;?>/rt.png" alt="转播" />转播&lt;!&ndash;<?php if($_G['forum_thread']['relay']) { ?>&ndash;&gt;<span id="relaynumber" style="display:none"><?php echo $_G['forum_thread']['relay'];?></span>&lt;!&ndash;<?php } ?>&ndash;&gt;</i></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if($post['first'] && helper_access::check_module('share')) { ?>&ndash;&gt;-->
<!--<a class="sharep" href="home.php?mod=spacecp&amp;ac=share&amp;type=thread&amp;id=<?php echo $_G['tid'];?>" onclick="showWindow('sharethread', this.href, 'get', 0);" title="分享推精华"><i><img src="<?php echo IMGDIR;?>/oshr.png" alt="分享" />分享&lt;!&ndash;<?php if($_G['forum_thread']['sharetimes']) { ?>&ndash;&gt;<span id="sharenumber"><?php echo $_G['forum_thread']['sharetimes'];?></span>&lt;!&ndash;<?php } ?>&ndash;&gt;</i></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->

<!--&lt;!&ndash;<?php if(!$_G['forum']['disablecollect'] && helper_access::check_module('collection')) { ?>&ndash;&gt;-->
<!--<a href="forum.php?mod=collection&amp;action=edit&amp;op=addthread&amp;tid=<?php echo $_G['tid'];?>" id="k_collect" onclick="showWindow(this.id, this.href);return false;" onmouseover="this.title = $('collectionnumber').innerHTML + ' 人淘帖'" title="淘好帖进专辑"><i><img src="<?php echo IMGDIR;?>/collection.png" alt="分享" />淘帖<span id="collectionnumber"<?php if(!$post['releatcollectionnum']) { ?> style="display:none"<?php } ?>><?php echo $post['releatcollectionnum'];?></span></i></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if(($_G['group']['allowrecommend'] || !$_G['uid']) && $_G['setting']['recommendthread']['status']) { ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if(!empty($_G['setting']['recommendthread']['addtext'])) { ?>&ndash;&gt;-->
<!--<a id="recommend_add" href="forum.php?mod=misc&amp;action=recommend&amp;do=add&amp;tid=<?php echo $_G['tid'];?>&amp;hash=<?php echo FORMHASH;?>" <?php if($_G['uid']) { ?>onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate(<?php echo $_G['group']['allowrecommend'];?>)');return false;"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?> onmouseover="this.title = $('recommendv_add').innerHTML + ' 人<?php echo $_G['setting']['recommendthread']['addtext'];?>'" title="顶一下"><i><img src="<?php echo IMGDIR;?>/rec_add.gif" alt="<?php echo $_G['setting']['recommendthread']['addtext'];?>" /><?php echo $_G['setting']['recommendthread']['addtext'];?><span id="recommendv_add"<?php if(!$_G['forum_thread']['recommend_add']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['recommend_add'];?></span></i></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if(!empty($_G['setting']['recommendthread']['subtracttext'])) { ?>&ndash;&gt;-->
<!--<a id="recommend_subtract" href="forum.php?mod=misc&amp;action=recommend&amp;do=subtract&amp;tid=<?php echo $_G['tid'];?>&amp;hash=<?php echo FORMHASH;?>" <?php if($_G['uid']) { ?>onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate(-<?php echo $_G['group']['allowrecommend'];?>)');return false;"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?> onmouseover="this.title = $('recommendv_subtract').innerHTML + ' 人<?php echo $_G['setting']['recommendthread']['subtracttext'];?>'" title="踩一下"><i><img src="<?php echo IMGDIR;?>/rec_subtract.gif" alt="<?php echo $_G['setting']['recommendthread']['subtracttext'];?>" /><?php echo $_G['setting']['recommendthread']['subtracttext'];?><span id="recommendv_subtract"<?php if(!$_G['forum_thread']['recommend_sub']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['recommend_sub'];?></span></i></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->


<!--&lt;!&ndash;<?php if(!empty($_G['setting']['pluginhooks']['viewthread_useraction'])) echo $_G['setting']['pluginhooks']['viewthread_useraction'];?>&ndash;&gt;-->
<!--</div>-->
<?php } } ?>
        <!--调用于显示相关帖子-->
<?php if($post['relateitem']) { ?>
<div class="mtw mbw">
<h3 class="pbm mbm bbda">相关帖子</h3>
<ul class="xl xl2 cl"><?php if(is_array($post['relateitem'])) foreach($post['relateitem'] as $var) { ?><li>&#8226; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $var['tid'];?>" title="<?php echo $var['subject'];?>" target="_blank"><?php echo $var['subject'];?></a></li>
<?php } ?>
</ul>
</div>
<?php } ?>


        <!--调用于显示会员签名 <div class="sign">签名被屏蔽</div>调用显示用戶签名给屏蔽-->
<?php if($post['signature'] && ($_G['setting']['bannedmessages'] & 4 && ($post['memberstatus'] == '-1' || ($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || ($post['status'] & 1)))) { ?>
<div class="sign">签名被屏蔽</div>
<?php } elseif($post['signature'] && !$post['anonymous'] && $showsignatures) { ?>
<div class="sign" style="max-height:<?php echo $_G['setting']['maxsigrows'];?>px;maxHeightIE:<?php echo $_G['setting']['maxsigrows'];?>px;"><?php echo $post['signature'];?></div>
<?php } elseif(!$post['anonymous'] && $showsignatures && $_G['setting']['globalsightml']) { ?>
<div class="sign"><?php echo $_G['setting']['globalsightml'];?></div>
<?php } ?>


<?php if(!empty($_G['setting']['pluginhooks']['viewthread_postsightmlafter'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postsightmlafter'][$postcount];?>


        <!--调用AD--><?php echo adshow("thread/a_pb/1/$postcount");?></td>
</tr>


<tr id="_postposition<?php echo $post['pid'];?>"></tr>


<?php if(!$_G['forum_thread']['archiveid']) { ?>
<tr>
<?php if(!$close_leftinfo) { ?>
<!--<td class="pls" style="background: none!important;border: 1px solid #ff503e!important;">-->

    <!--</td>-->
<?php } ?>
<td class="plc" style="overflow:visible;<?php if($close_leftinfo) { ?>--> width:100%<?php } ?>;">


        <div class="po hin">

            <?php if(!$postcount && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>
            <!--贴子行为{-->
            <div class="comment-meta clearfix">
                <div class="support-div">


                    <div class="btns favorites" style="float: left">
                        <div class="praise">

                            <!--调用于显示分享到功能-->
                            <?php if(!empty($_G['setting']['pluginhooks']['viewthread_share_method'])) { ?>
                            <div class="tshare cl">
                                <b>分享到:&nbsp;</b>
                                <?php if(!empty($_G['setting']['pluginhooks']['viewthread_share_method'])) echo $_G['setting']['pluginhooks']['viewthread_share_method'];?>
                            </div>
                            <?php } ?>

                            <a class="btn favor-btn btn-default" href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>&amp;formhash=<?php echo FORMHASH;?>" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title = $('favoritenumber').innerHTML + ' 人收藏'" title="收藏本帖">
                                <i class="iconfont">&#xe60e;</i>
                                <i>

                                    收藏
                                    <span id="favoritenumber"<?php if(!$_G['forum_thread']['favtimes']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['favtimes'];?></span>
                                </i>
                            </a>

                            <?php if($_G['group']['raterange'] && $post['authorid']) { ?>
                            <a href="javascript:;" id="ak_rate" onclick="showWindow('rate', 'forum.php?mod=misc&action=rate&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?>', 'get', -1);return false;" title="评分表立场">
                                <i class="iconfont">&#xe60e;</i>
                                <i>评分</i></a>
                            <?php } ?>
                            <?php if(!$post['anonymous'] && $post['first'] && helper_access::check_module('follow')) { ?>
                            <a class="followp" href="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=<?php echo $_G['tid'];?>&amp;from=forum" onclick="showWindow('relaythread', this.href, 'get', 0);" title="转播求扩散">
                                <i class="iconfont">&#xe60e;</i>
                                <i>转播<?php if($_G['forum_thread']['relay']) { ?><span id="relaynumber" style="display:none"><?php echo $_G['forum_thread']['relay'];?></span><?php } ?></i></a>
                            <?php } ?>
                            <?php if($post['first'] && helper_access::check_module('share')) { ?>
                            <a class="sharep" href="home.php?mod=spacecp&amp;ac=share&amp;type=thread&amp;id=<?php echo $_G['tid'];?>" onclick="showWindow('sharethread', this.href, 'get', 0);" title="分享推精华">
                                <i class="iconfont">&#xe60e;</i>
                                <i>分享<?php if($_G['forum_thread']['sharetimes']) { ?><span id="sharenumber"><?php echo $_G['forum_thread']['sharetimes'];?></span><?php } ?></i></a>
                            <?php } ?>

                            <?php if(!$_G['forum']['disablecollect'] && helper_access::check_module('collection')) { ?>
                            <a href="forum.php?mod=collection&amp;action=edit&amp;op=addthread&amp;tid=<?php echo $_G['tid'];?>" id="k_collect" onclick="showWindow(this.id, this.href);return false;" onmouseover="this.title = $('collectionnumber').innerHTML + ' 人淘帖'" title="淘好帖进专辑">
                                <i class="iconfont">&#xe60e;</i>
                                <i>淘帖<span id="collectionnumber"<?php if(!$post['releatcollectionnum']) { ?> style="display:none"<?php } ?>><?php echo $post['releatcollectionnum'];?></span></i></a>
                            <?php } ?>
                            <?php if(($_G['group']['allowrecommend'] || !$_G['uid']) && $_G['setting']['recommendthread']['status']) { ?>
                            <?php if(!empty($_G['setting']['recommendthread']['addtext'])) { ?>
                            <a id="recommend_add" href="forum.php?mod=misc&amp;action=recommend&amp;do=add&amp;tid=<?php echo $_G['tid'];?>&amp;hash=<?php echo FORMHASH;?>" <?php if($_G['uid']) { ?>onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate(<?php echo $_G['group']['allowrecommend'];?>)');return false;"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?> onmouseover="this.title = $('recommendv_add').innerHTML + ' 人<?php echo $_G['setting']['recommendthread']['addtext'];?>'" title="顶一下">
                            <i class="iconfont">&#xe60e;</i>
                            <i><?php echo $_G['setting']['recommendthread']['addtext'];?><span id="recommendv_add"<?php if(!$_G['forum_thread']['recommend_add']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['recommend_add'];?></span></i></a>
                            <?php } ?>
                            <?php if(!empty($_G['setting']['recommendthread']['subtracttext'])) { ?>
                            <a id="recommend_subtract" href="forum.php?mod=misc&amp;action=recommend&amp;do=subtract&amp;tid=<?php echo $_G['tid'];?>&amp;hash=<?php echo FORMHASH;?>" <?php if($_G['uid']) { ?>onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate(-<?php echo $_G['group']['allowrecommend'];?>)');return false;"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?> onmouseover="this.title = $('recommendv_subtract').innerHTML + ' 人<?php echo $_G['setting']['recommendthread']['subtracttext'];?>'" title="踩一下">
                            <i class="iconfont">&#xe60e;</i>
                            <i><?php echo $_G['setting']['recommendthread']['subtracttext'];?><span id="recommendv_subtract"<?php if(!$_G['forum_thread']['recommend_sub']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['recommend_sub'];?></span></i></a>
                            <?php } ?>
                            <?php } ?>


                            <div class="praise-cont praise-vip" style="display: none;"></div>
                        </div>
                    </div>

                </div>

                <!--<div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1431413699022">-->

                <!--&lt;!&ndash;快速回复&ndash;&gt;-->
                <!--&lt;!&ndash;<?php if((!$_G['uid'] || $allowpostreply) && !$needhiddenreply) { ?>&ndash;&gt;-->
                <!--&lt;!&ndash;<?php if($post['first']) { ?>&ndash;&gt;-->
                <!--<a class="sq-reply2" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;reppost=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" onclick="showWindow('reply', this.href)"><i class="icon-btn icon-info"></i>回复</a>-->
                <!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
                <!--<a class="sq-reply2" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" onclick="showWindow('reply', this.href)"><i class="icon-btn icon-info"></i>回复</a>-->
                <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->

                <!--<a href="javascript:void(0)" id="sq-share-button" class="bds_more" data-cmd="more"><i-->
                <!--class="icon-btn icon-share"></i>分享</a>-->

                <!--</div>-->

            </div>
            <!--}贴子行为-->
            <?php } ?>

<div class="pob cl">




<em style="font-size: 12px!important; ">
                    <!--显示楼层-->
                    <strong style="float: left!important;color:#81828c;font-weight: normal;margin-right: 10px">

                        <!--<a href="<?php if($post['first']) { ?>forum.php?mod=viewthread&tid=<?php echo $_G['tid'];?><?php echo $fromuid;?><?php } else { ?>forum.php?mod=redirect&goto=findpost&ptid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?><?php echo $fromuid;?><?php } ?>"  <?php if($fromuid) { ?>title="您的朋友访问此链接后，您将获得相应的积分奖励"<?php } ?> id="postnum<?php echo $post['pid'];?>" onclick="setCopy(this.href, '帖子地址复制成功');return false;">-->

                        <?php if(isset($post['isstick'])) { ?>

                        <img src ="<?php echo IMGDIR;?>/settop.png" title="置顶回复" class="vm" /> 来自 <?php echo $post['number'];?><?php echo $postnostick;?>

                        <?php } elseif($post['number'] == -1) { ?>
                        推荐

                        <?php } else { ?>
                        <?php if(!empty($postno[$post['number']])) { ?>
                        <?php echo $postno[$post['number']];?>
                        <?php } else { ?>
                        <em><?php echo $post['number'];?></em><?php echo $postno['0'];?>
                        <?php } ?>

                        <?php } ?>
                        </a>
                    </strong>
                    <?php if(!$postcount && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>
                    <?php } else { ?>
                    <em id="authorposton<?php echo $post['pid'];?>" style="float: left!important;color: #81828c;margin-right: 2px"><?php echo $post['dateline'];?></em>
                    <?php } ?>

                    <!--举报-->
                    <?php if($post['authorid'] != $_G['uid']) { ?>
                    <a style="font-size: 12px!important;" href="javascript:;" onclick="showWindow('miscreport<?php echo $post['pid'];?>', 'misc.php?mod=report&rtype=post&rid=<?php echo $post['pid'];?>&tid=<?php echo $_G['tid'];?>&fid=<?php echo $_G['fid'];?>', 'get', -1);return false;">举报</a>
                    <?php } ?>
                    <!--调用于显示评论內容(需在后台开通相关功能)-->
<?php if($post['invisible'] == 0) { if($allowpostreply && $post['allowcomment'] && (!$thread['closed'] || $_G['forum']['ismoderator'])) { ?><a class="cmmnt" href="forum.php?mod=misc&amp;action=comment&amp;tid=<?php echo $post['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?><?php if($_G['forum_thread']['special'] == 127) { ?>&amp;special=<?php echo $specialextra;?><?php } ?>" onclick="showWindow('comment', this.href, 'get', 0)">点评</a><?php } ?>
                        <?php if((!$_G['uid'] || $allowpostreply) && !$needhiddenreply) { ?>
                                <?php if($post['first']) { ?>
                                    <!--<a class="fastre" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;reppost=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" onclick="showWindow('reply', this.href)">-->
                                        <!--<i class="icon-btn icon-info"></i>-->
                                        <!--lang reply-->
                                    <!--</a>-->
                                <?php } else { ?>
                                    <!--<a class="fastre" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" onclick="showWindow('reply', this.href)">-->
                                        <!--<i class="icon-btn icon-info"></i>-->
                                        <!--lang reply-->
                                    <!--</a>-->
                                <?php } ?>
                        <?php } } ?>




                    <!--调用于显示商品时增加介紹-->
<?php if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { ?>
<a class="editp" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>">
                            <?php if($_G['forum_thread']['special'] == 2 && !$post['message']) { ?>
                            添加柜台介绍
                            <?php } else { ?>
                            编辑
                        </a><?php } ?>

                    <!--调用于补充(需在后台开通相关功能)-->
                    <?php } elseif($_G['uid'] && $post['authorid'] == $_G['uid'] && $_G['setting']['postappend']) { ?>
<a class="appendp" href="forum.php?mod=misc&amp;action=postappend&amp;tid=<?php echo $post['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" onClick="showWindow('postappend', this.href, 'get', 0)">补充</a>
<?php } ?>

                    <!--调用于帖子是草稿状态的发表功能-->
<?php if($post['first'] && $post['invisible'] == -3) { ?>
<!--<a class="psave" href="forum.php?mod=misc&amp;action=pubsave&amp;tid=<?php echo $_G['tid'];?>">发表</a>-->
<?php } ?>


                    <!--调用于帖子在审核中标题所显示"待审核"-->
<?php if($post['invisible'] == -2 && !$post['first']) { ?>
<span class="xg1">(待审核)</span>
<?php } ?>


                    <!--调用于推送的功能(如有DIY即可推送)-->
<?php if($post['first'] && $allowblockrecommend) { ?>
                      <a class="push" href="javascript:;" onclick="modaction('recommend', '<?php echo $_G['forum_firstpid'];?>', 'op=recommend&idtype=<?php if($_G['forum_thread']['isgroup']) { ?>gtid<?php } else { ?>tid<?php } ?>&id=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?>', 'portal.php?mod=portalcp&ac=portalblock')">推送</a>
                    <?php } if(!$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])) { ?>
<a class="replyadd" href="forum.php?mod=misc&amp;action=postreview&amp;do=support&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;hash=<?php echo FORMHASH;?>" <?php if($_G['uid']) { ?>onclick="ajaxmenu(this, 3000, 1, 0, '43', '');return false;"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?> onmouseover="this.title = ($('review_support_<?php echo $post['pid'];?>').innerHTML ? $('review_support_<?php echo $post['pid'];?>').innerHTML : 0) + ' 人 支持'">支持 <span id="review_support_<?php echo $post['pid'];?>"><?php echo $post['postreview']['support'];?></span></a>
<a class="replysubtract" href="forum.php?mod=misc&amp;action=postreview&amp;do=against&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;hash=<?php echo FORMHASH;?>" <?php if($_G['uid']) { ?>onclick="ajaxmenu(this, 3000, 1, 0, '43', '');return false;"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?> onmouseover="this.title = ($('review_against_<?php echo $post['pid'];?>').innerHTML ? $('review_against_<?php echo $post['pid'];?>').innerHTML : 0) + ' 人 反对'">反对 <span id="review_against_<?php echo $post['pid'];?>"><?php echo $post['postreview']['against'];?></span></a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_postfooter'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postfooter'][$postcount];?>
</em>



<p>
<?php if($post['invisible'] == 0) { if($_G['setting']['magicstatus']) { ?>
<a href="javascript:;" id="mgc_post_<?php echo $post['pid'];?>" onmouseover="showMenu(this.id)" class="showmenu">使用道具</a>
<?php } if($_G['forum_thread']['special'] == 3 && ($_G['forum']['ismoderator'] && (!$_G['setting']['rewardexpiration'] || $_G['setting']['rewardexpiration'] > 0 && ($_G['timestamp'] - $_G['forum_thread']['dateline']) / 86400 > $_G['setting']['rewardexpiration']) || $_G['forum_thread']['authorid'] == $_G['uid']) && $post['authorid'] != $_G['forum_thread']['authorid'] && $post['first'] == 0 && $_G['uid'] != $post['authorid'] && $_G['forum_thread']['price'] > 0) { ?>
<a href="javascript:;" onclick="setanswer(<?php echo $post['pid'];?>, '<?php echo $_GET['from'];?>')">最佳答案</a>
<?php } ?>


                    <!--调用于评分-->
<?php if(!$post['first'] && $_G['group']['raterange'] && $post['authorid']) { ?>
<a href="javascript:;" onclick="showWindow('rate', 'forum.php?mod=misc&action=rate&tid=<?php echo $_G['tid'];?>&pid=<?php echo $post['pid'];?>', 'get', -1);return false;">评分</a>
<?php } ?>


                    <!--调用于管理撤銷对该帖子的评分-->
<?php if(!empty($postlist[$post['pid']]['totalrate']) && $_G['forum']['ismoderator']) { ?>
<a href="forum.php?mod=misc&amp;action=removerate&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;page=<?php echo $page;?>" onclick="showWindow('rate', this.href, 'get', -1)">撤销评分</a>
<?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_postaction'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postaction'][$postcount];?>
</p>




                <!--调用于显示所有道具功能-->

<?php if($_G['setting']['magicstatus']) { ?>
<ul id="mgc_post_<?php echo $post['pid'];?>_menu" class="p_pop mgcmn" style="display: none;">
<?php if($post['first']) { if(!empty($_G['setting']['magics']['bump'])) { ?>
<li><a href="home.php?mod=magic&amp;mid=bump&amp;idtype=tid&amp;id=<?php echo $_G['tid'];?>" id="a_bump" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/bump.small.gif" /><?php echo $_G['setting']['magics']['bump'];?></a></li>
<?php } if(!empty($_G['setting']['magics']['stick'])) { ?>
<li><a href="home.php?mod=magic&amp;mid=stick&amp;idtype=tid&amp;id=<?php echo $_G['tid'];?>" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/stick.small.gif" /><?php echo $_G['setting']['magics']['stick'];?></a></li>
<?php } if(!empty($_G['setting']['magics']['close'])) { ?>
<li><a href="home.php?mod=magic&amp;mid=close&amp;idtype=tid&amp;id=<?php echo $_G['tid'];?>" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/close.small.gif" /><?php echo $_G['setting']['magics']['close'];?></a></li>
<?php } if(!empty($_G['setting']['magics']['open'])) { ?>
<li><a href="home.php?mod=magic&amp;mid=open&amp;idtype=tid&amp;id=<?php echo $_G['tid'];?>" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/open.small.gif" /><?php echo $_G['setting']['magics']['open'];?></a></li>
<?php } if(!empty($_G['setting']['magics']['highlight'])) { ?>
<li><a href="home.php?mod=magic&amp;mid=highlight&amp;idtype=tid&amp;id=<?php echo $_G['tid'];?>" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/highlight.small.gif" /><?php echo $_G['setting']['magics']['highlight'];?></a></li>
<?php } if(!empty($_G['setting']['magics']['sofa'])) { ?>
<li><a href="home.php?mod=magic&amp;mid=sofa&amp;idtype=tid&amp;id=<?php echo $_G['tid'];?>" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/sofa.small.gif" /><?php echo $_G['setting']['magics']['sofa'];?></a></li>
<?php } if(!empty($_G['setting']['magics']['jack'])) { ?>
<li><a href="home.php?mod=magic&amp;mid=jack&amp;idtype=tid&amp;id=<?php echo $_G['tid'];?>" id="a_jack" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/jack.small.gif" /><?php echo $_G['setting']['magics']['jack'];?></a></li>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_magic_thread'])) echo $_G['setting']['pluginhooks']['viewthread_magic_thread'];?>
<?php } if(!empty($_G['setting']['magics']['repent']) && $post['authorid'] == $_G['uid'] && !$rushreply) { ?>
<li><a href="home.php?mod=magic&amp;mid=repent&amp;idtype=pid&amp;id=<?php echo $post['pid'];?>:<?php echo $_G['tid'];?>" id="a_repent_<?php echo $post['pid'];?>" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/repent.small.gif" /><?php echo $_G['setting']['magics']['repent'];?></a></li>
<?php } if(!empty($_G['setting']['magics']['anonymouspost']) && $post['authorid'] == $_G['uid']) { ?>
<li><a href="home.php?mod=magic&amp;mid=anonymouspost&amp;idtype=pid&amp;id=<?php echo $post['pid'];?>:<?php echo $_G['tid'];?>" id="a_anonymouspost_<?php echo $post['pid'];?>" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/anonymouspost.small.gif" /><?php echo $_G['setting']['magics']['anonymouspost'];?></a><li>
<?php } if(!empty($_G['setting']['magics']['namepost'])) { ?>
<li><a href="home.php?mod=magic&amp;mid=namepost&amp;idtype=pid&amp;id=<?php echo $post['pid'];?>:<?php echo $_G['tid'];?>" id="a_namepost_<?php echo $post['pid'];?>" onclick="showWindow(this.id, this.href)"><img src="<?php echo STATICURL;?>image/magic/namepost.small.gif" /><?php echo $_G['setting']['magics']['namepost'];?></a><li>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_magic_post'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_magic_post'][$postcount];?>
</ul>
<script type="text/javascript" reload="1">checkmgcmn('post_<?php echo $post['pid'];?>')</script>
<?php } ?>

                <!--调用于显示帖子作者可以管理帖子进行置顶的动作(而管理员则功能全有)-->
                <?php if(!$post['first'] && $modmenu['post']) { ?>
<!--<span class="y">-->
                    <!--&lt;!&ndash;举报&ndash;&gt;-->
<!--<label for="manage<?php echo $post['pid'];?>">-->
                    <!--<input type="checkbox" id="manage<?php echo $post['pid'];?>" class="pc" <?php if(!empty($modclick)) { ?>checked="checked" <?php } ?>onclick="pidchecked(this);modclick(this, <?php echo $post['pid'];?>)" value="<?php echo $post['pid'];?>" autocomplete="off" />-->

                    <!--lang manage-->
                <!--</label>-->
<!--</span>-->
                <?php } ?>


</div>
</div>

        <!--楼主链接地址-->

        <?php if(!$postcount && !$_G['forum_thread']['archiveid'] && $post['first'] ) { ?>

        <!--共有多少回复-->
        <div style="  border-bottom: 1px solid #a9b1c9!important;
                  padding: 0 10px 10px!important;
                  /*margin-bottom: 20px!important;*/
                  position: relative;
                  top: 2px;
                  width: 100%;
                  font-size: 18px!important;">
            <span>共有<span> <?php echo $_G['forum_thread']['allreplies'];?> </span>条回复</span>
        </div>
        <?php } ?>


</td>
</tr>
<?php } ?>

<tr class="ad">
<td class="pls">
<?php if(!$close_leftinfo) { ?>
</td>
<td class="plc">
<?php } ?>


        <!--调用于显示辩论时帖子正方 反方 中立-->
<?php if($post['first'] && $_G['forum_thread']['special'] == 5 && $_G['forum_thread']['displayorder'] >= 0) { ?>
<ul class="ttp cl">
<li style="display:inline;margin-left:12px"><strong class="bw0 bg0_all">按立场筛选: </strong></li>
<li<?php if(!isset($_GET['stand'])) { ?> class="xw1 a"<?php } ?>><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>" hidefocus="true">全部</a></li>
<li<?php if($_GET['stand'] == 1) { ?> class="xw1 a"<?php } ?>><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;stand=1" hidefocus="true">正方</a></li>
<li<?php if($_GET['stand'] == 2) { ?> class="xw1 a"<?php } ?>><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;stand=2" hidefocus="true">反方</a></li>
<li<?php if(isset($_GET['stand']) && $_GET['stand'] == 0) { ?> class="xw1 a"<?php } ?>><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;stand=0" hidefocus="true">中立</a></li>
</ul>
<?php } if($_G['forum_thread']['replies']) { ?><?php echo adshow("interthread/a_p/$postcount");?><?php } ?>
</td>
</tr>


</table>




<?php if(!empty($aimgs[$post['pid']])) { ?>
<script type="text/javascript" reload="1">
aimgcount[<?php echo $post['pid'];?>] = [<?php echo dimplode($aimgs[$post['pid']]);; ?>];
attachimggroup(<?php echo $post['pid'];?>);
<?php if(empty($_G['setting']['lazyload'])) { if(!$post['imagelistthumb']) { ?>
attachimgshow(<?php echo $post['pid'];?>);
<?php } else { ?>
attachimgshow(<?php echo $post['pid'];?>, 1);
<?php } } ?>
var aimgfid = 0;
<?php if($_G['forum']['picstyle'] && ($_G['forum']['ismoderator'] || $_G['uid'] == $_G['thread']['authorid'])) { ?>
aimgfid = <?php echo $_G['fid'];?>;
<?php } if($post['imagelistthumb']) { ?>
attachimglstshow(<?php echo $post['pid'];?>, <?php echo intval($_G['setting']['lazyload']); ?>, aimgfid, '<?php echo $_G['setting']['showexif'];?>');
<?php } ?>
</script>
<?php } } else { ?>

<table id="pid<?php echo $post['pid'];?>" summary="pid<?php echo $post['pid'];?>" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<?php if(!$close_leftinfo) { ?>
<td class="pls"></td>
<?php } ?>
<td class="plc"<?php if($close_leftinfo) { ?> style="width:100%"<?php } ?>>
<div class="pi">

                    <!--调用于复制帖子楼层的显示文件及复制地址-->
<strong><a><?php if(!empty($postno[$post['number']])) { ?><?php echo $postno[$post['number']];?><?php } else { ?><em><?php echo $post['number'];?></em><?php echo $postno['0'];?><?php } ?></a></strong>

</div>
<div class="pct">无效楼层，该帖已经被删除</div>
</td>
</tr>
<tr class="ad" style="border-bottom: none!important;">
<?php if(!$close_leftinfo) { ?>
<td class="pls"></td>
<?php } ?>
<td class="plc"></td>
</tr>
</tbody>
</table>
<?php } ?>



<?php if(!empty($_G['setting']['pluginhooks']['viewthread_endline'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_endline'][$postcount];?>
</div><?php $postcount++;?><?php } ?>
<div id="postlistreply" class="pl"><div id="post_new" class="viewthread_table" style="display: none"></div></div>
<?php if($_G['blockedpids']) { ?>
<div id='hiddenpoststip'><a href='javascript:display_blocked_post();'>还有一些帖子被系统自动隐藏，点此展开</a></div>
<div id="hiddenposts"></div>
<?php } ?>
</div>
<form method="post" autocomplete="off" name="modactions" id="modactions">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="optgroup" />
<input type="hidden" name="operation" />
<input type="hidden" name="listextra" value="<?php echo $_GET['extra'];?>" />
<input type="hidden" name="page" value="<?php echo $page;?>" />
</form>
<?php echo $_G['forum_tagscript'];?>
<?php if($multipage && $page < $_G['setting']['threadmaxpages'] && $page < $_G['page_next']) { $nxtpage = $page + 1;?><div class="pgbtn"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?><?php if($_GET['authorid']) { ?>&amp;authorid=<?php echo $_GET['authorid'];?><?php } ?>&amp;page=<?php echo $nxtpage;?>" hidefocus="true" class="bm_h">下一页 &raquo;</a></div>
<?php } ?>

<div class="pgs mtm mbm cl" style="margin-top: 80px!important;">
<?php echo $multipage;?>
<span class="pgb y"<?php if($_G['setting']['visitedforums']) { ?> id="visitedforumstmp" onmouseover="$('visitedforums').id = 'visitedforumstmp';this.id = 'visitedforums';showMenu({'ctrlid':this.id,'pos':'21'})"<?php } ?>><!--<a href="<?php echo $upnavlink;?>">返回列表</a>--></span>

    <!--&lt;!&ndash;<?php if(!$_G['forum_thread']['is_archived']) { ?>&ndash;&gt;-->
<!--<a id="newspecialtmp" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})"<?php if(!$_G['forum']['allowspecialonly'] && empty($_G['forum']['picstyle']) && !$_G['forum']['threadsorts']['required']) { ?> onclick="showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>')"<?php } else { ?> onclick="location.href='forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>';return false;"<?php } ?> href="javascript:;" title="发新帖"><img src="<?php echo IMGDIR;?>/pn_post.png" alt="发新帖" /></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->

<!--&lt;!&ndash;<?php if($allowpostreply && !$_G['forum_thread']['archiveid']) { ?>&ndash;&gt;-->
<!--<a id="post_replytmp" onclick="showWindow('reply', 'forum.php?mod=post&action=reply&fid=<?php echo $_G['fid'];?>&tid=<?php echo $_G['tid'];?>')" href="javascript:;" title="回复"><img src="<?php echo IMGDIR;?>/pn_reply.png" alt="回复" /></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
</div>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_middle'])) echo $_G['setting']['pluginhooks']['viewthread_middle'];?>
<!--[diy=diyfastposttop]--><div id="diyfastposttop" class="area"></div><!--[/diy]-->
<?php if($fastpost) { ?><script type="text/javascript">
var postminchars = parseInt('<?php echo $_G['setting']['minpostsize'];?>');
var postmaxchars = parseInt('<?php echo $_G['setting']['maxpostsize'];?>');
var disablepostctrl = parseInt('<?php echo $_G['group']['disablepostctrl'];?>');
</script>

<div id="f_pst" class="pl<?php if(empty($_GET['from'])) { ?> bm bmw<?php } ?>" style="border: none!important;">
<form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;replysubmit=yes<?php if($_GET['ordertype'] != 1) { ?>&amp;infloat=yes&amp;handlekey=fastpost<?php } if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>"<?php if($_GET['ordertype'] != 1) { ?> onSubmit="return fastpostvalidate(this)"<?php } ?>>
<?php if(empty($_GET['from'])) { ?>
<table cellspacing="0" cellpadding="0">
<tr>
<!--<td class="pls">-->
<!--&lt;!&ndash;<?php if($_G['uid']) { ?>&ndash;&gt;<div class="avatar avtm">&lt;!&ndash;<?php echo avatar($_G['uid']); ?>&ndash;&gt;</div>&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_side'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_side'];?>
<!--</td>-->
<td class="plc">
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_content'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_content'];?>

<span id="fastpostreturn"></span>

<?php if($_G['forum_thread']['special'] == 5 && empty($firststand)) { ?>
<div class="pbt cl">
<div class="ftid sslt">
<select id="stand" name="stand">
<option value="">选择观点</option>
<option value="0">中立</option>
<option value="1">正方</option>
<option value="2">反方</option>
</select>
</div>
<script type="text/javascript">simulateSelect('stand');</script>
</div>
<?php } ?>

    <!--主体内容-->
<div class="cl">

<?php if(empty($_GET['from']) && $_G['setting']['fastsmilies']) { ?>
        <!--<div id="fastsmiliesdiv" class="y">-->
            <!--<div id="fastsmiliesdiv_data">-->
                <!--<div id="fastsmilies"></div>-->
            <!--</div>-->
        <!--</div>-->
        <?php } ?>

<div<?php if(empty($_GET['from']) && $_G['setting']['fastsmilies']) { ?> class="hasfsl"<?php } ?> id="fastposteditor">
<div class="tedt<?php if(!($_G['forum_thread']['special'] == 5 && empty($firststand))) { ?> mtn<?php } ?>">
<div class="bar">
<span class="y">
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_func_extra'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_func_extra'];?>
<a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onclick="return switchAdvanceMode(this.href)">高级模式</a>
</span><?php $seditor = array('fastpost', array('at', 'bold', 'color', 'img', 'link', 'quote', 'code', 'smilies'), !$allowfastpost ? 1 : 0, $allowpostattach && $_GET['from'] != 'preview' && $allowfastpost ? '<span class="pipe z">|</span><span id="spanButtonPlaceholder">'.lang('template', 'upload').'</span>' : '');?><?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_ctrl_extra'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_ctrl_extra'];?><script src="<?php echo $_G['setting']['jspath'];?>seditor.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<div class="fpd">

<?php if(in_array('bold', $seditor['1'])) { ?>
<a href="javascript:;" title="文字加粗" class="fbld"<?php if(empty($seditor['2'])) { ?> onclick="seditor_insertunit('<?php echo $seditor['0'];?>', '[b]', '[/b]');doane(event);"<?php } ?>>B</a>
<?php } if(in_array('color', $seditor['1'])) { ?>
<a href="javascript:;" title="设置文字颜色" class="fclr" id="<?php echo $seditor['0'];?>forecolor"<?php if(empty($seditor['2'])) { ?> onclick="showColorBox(this.id, 2, '<?php echo $seditor['0'];?>');doane(event);"<?php } ?>>Color</a>
<?php } if(in_array('img', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>img" href="javascript:;" title="图片" class="fmg"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'img');doane(event);"<?php } ?>>Image</a>
<?php } if(in_array('link', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>url" href="javascript:;" title="添加链接" class="flnk"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'url');doane(event);"<?php } ?>>Link</a>
<?php } if(in_array('quote', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>quote" href="javascript:;" title="引用" class="fqt"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'quote');doane(event);"<?php } ?>>Quote</a>
<?php } if(in_array('code', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>code" href="javascript:;" title="代码" class="fcd"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'code');doane(event);"<?php } ?>>Code</a>
<?php } if(in_array('smilies', $seditor['1'])) { ?>
<a href="javascript:;" class="fsml" id="<?php echo $seditor['0'];?>sml"<?php if(empty($seditor['2'])) { ?> onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;"<?php } ?>>Smilies</a>
<?php if(empty($seditor['2'])) { ?>
<script type="text/javascript" reload="1">smilies_show('<?php echo $seditor['0'];?>smiliesdiv', <?php echo $_G['setting']['smcols'];?>, '<?php echo $seditor['0'];?>');</script>
<?php } } if(in_array('at', $seditor['1']) && $_G['group']['allowat']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>at.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<a id="<?php echo $seditor['0'];?>at" href="javascript:;" title="@朋友" class="fat"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'at');doane(event);"<?php } ?>>@朋友</a>
<?php } ?>
    <span class="sdg">
<?php echo $seditor['3'];?>
    </span>
</div>
<style>
    .sdg object{
        margin-top: 10px!important;
    }
</style></div>
<div class="area">
<?php if($allowfastpost) { ?>
<textarea rows="6" cols="80" style="height: 232px!important;" name="message" id="fastpostmessage" onKeyDown="seditor_ctlent(event, <?php if($_GET['ordertype'] != 1) { ?>'fastpostvalidate($(\'fastpostform\'))'<?php } else { ?>'$(\'fastpostform\').submit()'<?php } ?>);" tabindex="4" class="pt"<?php echo getreplybg($_G['forum']['replybg']);?>></textarea>
<?php } else { ?>
<div class="pt hm" style="margin-top: 70px!important;">
<?php if(!$_G['uid']) { if(!$_G['connectguest']) { ?>
您需要登录后才可以回帖
                            <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)" class="xi2" style="color: #009AFF!important;">登录</a>
                            |
                            <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2" style="color: #009AFF!important;"><?php echo $_G['setting']['reglinkname'];?></a>

<?php } else { ?>
您需要 <a href="member.php?mod=connect" class="xi2">完善帐号信息</a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2">绑定已有帐号</a> 后才可以发帖
<?php } } else { ?>
您现在无权发帖。<a href="javascript:;" onclick="$('fastpostform').submit()" class="xi2">点击查看原因</a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_login_text'])) echo $_G['setting']['pluginhooks']['global_login_text'];?>
</div>
<?php } ?>
</div>
</div>
</div>

</div>

        <!--验证码-->
<div id="seccheck_fastpost">
<?php if($allowpostreply && ($secqaacheck || $seccodecheck)) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(
EOF;
 if(!empty($_G['gp_infloat'])) { 
$sectpl .= <<<EOF
{'ctrlid':this.id,'win':'{$_GET['handlekey']}'}
EOF;
 } else { 
$sectpl .= <<<EOF
this.id
EOF;
 } 
$sectpl .= <<<EOF
)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="mtm"><?php $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
$sectpl = str_replace("'", "\'", $sectpl);?><?php if($secqaacheck) { ?>
<span id="secqaa_q<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updatesecqaa('q<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } if($seccodecheck) { ?>
<span id="seccode_c<?php echo $sechash;?>" style="margin-top: 15px!important;"></span>
<script type="text/javascript" reload="1">updateseccode('c<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } ?></div><?php } ?>
</div>




<?php if($allowpostattach && $_GET['from'] != 'preview') { ?>
<script type="text/javascript">
var editorid = '';
var ATTACHNUM = {'imageused':0,'imageunused':0,'attachused':0,'attachunused':0}, ATTACHUNUSEDAID = new Array(), IMGUNUSEDAID = new Array();
</script>

<input type="hidden" name="posttime" id="posttime" value="<?php echo TIMESTAMP;?>" />
<div class="upfl<?php if(empty($_GET['from']) && $_G['setting']['fastsmilies']) { ?> hasfsl<?php } ?>">
<table cellpadding="0" cellspacing="0" border="0" id="attach_tblheader" style="display: none;">
<tr>
<td>点击附件文件名添加到帖子内容中</td>
<td class="atds">描述</td>
<?php if($_G['group']['allowsetattachperm']) { ?>
<td class="attv">
阅读权限
<img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="阅读权限按由高到低排列，高于或等于选中组的用户才可以阅读" />
</td>
<?php } if($_G['group']['maxprice']) { ?><td class="attpr"><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?></td><?php } ?>
<td class="attc"></td>
</tr>
</table>
<div class="fieldset flash" id="attachlist"></div>
<?php if(empty($_G['setting']['pluginhooks']['viewthread_fastpost_upload_extend'])) { if(empty($_G['uploadjs'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>upload.js?<?php echo VERHASH;?>" type="text/javascript"></script><?php $_G['uploadjs'] = 1;?><?php } ?><script type="text/javascript">
var upload = new SWFUpload({
upload_url: "<?php echo $_G['siteurl'];?>misc.php?mod=swfupload&action=swfupload&operation=upload&fid=<?php echo $_G['fid'];?>",
post_params: {"uid" : "<?php echo $_G['uid'];?>", "hash":"<?php echo $swfconfig['hash'];?>"},
file_size_limit : "<?php echo $swfconfig['max'];?>",
file_types : "<?php echo $swfconfig['attachexts']['ext'];?>",
file_types_description : "<?php echo $swfconfig['attachexts']['depict'];?>",
file_upload_limit : <?php echo $swfconfig['limit'];?>,
file_queue_limit : 0,
swfupload_preload_handler : preLoad,
swfupload_load_failed_handler : loadFailed,
file_dialog_start_handler : fileDialogStart,
file_queued_handler : fileQueued,
file_queue_error_handler : fileQueueError,
file_dialog_complete_handler : fileDialogComplete,
upload_start_handler : uploadStart,
upload_progress_handler : uploadProgress,
upload_error_handler : uploadError,
upload_success_handler : uploadSuccess,
upload_complete_handler : uploadComplete,
button_image_url : "<?php echo IMGDIR;?>/uploadbutton_small.png",
button_placeholder_id : "spanButtonPlaceholder",
button_width: 17,
button_height: 25,
button_cursor:SWFUpload.CURSOR.HAND,
button_window_mode: "transparent",
custom_settings : {
progressTarget : "attachlist",
uploadSource: 'forum',
uploadType: 'attach',
<?php if($swfconfig['maxsizeperday']) { ?>
maxSizePerDay: <?php echo $swfconfig['maxsizeperday'];?>,
<?php } if($swfconfig['maxattachnum']) { ?>
maxAttachNum: <?php echo $swfconfig['maxattachnum'];?>,
<?php } ?>
uploadFrom: 'fastpost'
},
debug: false
});
</script>
<?php } else { ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_upload_extend'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_upload_extend'];?>
<?php } ?>
</div>
<?php } ?>

<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="usesig" value="<?php echo $usesigcheck;?>" />
<input type="hidden" name="subject" value="  " />



    <!--发帖 发帖后回到最后一页-->
<p class="ptm pnpost">
<a href="home.php?mod=spacecp&amp;ac=credit&amp;op=rule&amp;fid=<?php echo $_G['fid'];?>" class="y" target="_blank">本版积分规则</a>

<button <?php if($allowpostreply) { ?>type="submit" <?php } elseif(!$_G['uid']) { ?>type="button" onclick="showWindow('login', 'member.php?mod=logging&action=login&guestmessage=yes')" <?php } if(!$seccodecheck) { ?>onmouseover="checkpostrule('seccheck_fastpost', 'ac=reply');this.onmouseover=null" <?php } ?>name="replysubmit" id="fastpostsubmit"
        class="btn_1 btn-primary posts-comment-btn"
        value="replysubmit" tabindex="5">
        <strong style="font-size: 18px!important;font-weight: normal!important;">发表</strong>
        </button>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_btn_extra'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_btn_extra'];?>

<?php if(helper_access::check_module('follow')) { ?>
<label class="lb"><input type="checkbox" name="adddynamic" class="pc" value="1" />回帖并转播</label>
<?php } if($_GET['ordertype'] != 1 && empty($_GET['from'])) { ?>
<!--<label for="fastpostrefresh"><input id="fastpostrefresh" type="checkbox" class="pc" />回帖后跳转到最后一页</label>-->
<script type="text/javascript">if(getcookie('fastpostrefresh') == 1) {$('fastpostrefresh').checked=true;}</script>
<?php } ?>
</p>



<?php if(empty($_GET['from'])) { ?>
</td>
</tr>
</table>
<?php } ?>
</form>
</div><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_bottom'])) echo $_G['setting']['pluginhooks']['viewthread_bottom'];?>
<?php if(($_G['setting']['visitedforums']) && $_G['forum']['status'] != 3) { ?>
<div id="visitedforums_menu" class="p_pop blk cl" style="display: none;">
<table cellspacing="0" cellpadding="0">
<tr>
<td id="v_forums">
<h3 class="mbn pbn bbda xg1">浏览过的版块</h3>
<ul class="xl xl1">
<?php echo $_G['setting']['visitedforums'];?>
</ul>
</td>
</tr>
</table>
</div>
<?php } if($_G['medal_list']) { if(is_array($_G['medal_list'])) foreach($_G['medal_list'] as $medalid => $medal) { ?><div id="md_<?php echo $medalid;?>_menu" class="tip tip_4" style="display: none;">
<div class="tip_horn"></div>
<div class="tip_c">
<h4><?php echo $medal['name'];?></h4>
<p><?php echo $medal['description'];?></p>
</div>
</div>
<?php } } if(!IS_ROBOT && !empty($_G['setting']['lazyload'])) { ?>
<script type="text/javascript">
new lazyload();
</script>
<?php } if(!IS_ROBOT && $_G['setting']['threadmaxpages'] > 1) { ?>
<script type="text/javascript">document.onkeyup = function(e){keyPageScroll(e, <?php if($page > 1) { ?>1<?php } else { ?>0<?php } ?>, <?php if($page < $_G['setting']['threadmaxpages'] && $page < $_G['page_next']) { ?>1<?php } else { ?>0<?php } ?>, 'forum.php?mod=viewthread&tid=<?php echo $_G['tid'];?><?php if($_GET['authorid']) { ?>&authorid=<?php echo $_GET['authorid'];?><?php } ?>', <?php echo $page;?>);}</script>
<?php } ?>
</div>
<!--左侧-->
<!--右侧{-->
<div class="aside">
    <!--发布新帖-->
    <?php if(!$_GET['archiveid']) { ?>
    <a href="javascript:;"
       onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})"
       <?php if(!$_G['forum']['allowspecialonly'] && empty($_G['forum']['picstyle']) && !$_G['forum']['threadsorts']['required']) { ?> onclick="showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>')"<?php } else { ?> onclick="location.href='forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>';return false;"<?php } ?>
    title="发新帖"
    class="btn btn-primary newtopic">
    发布新贴
    <!--<img src="<?php echo IMGDIR;?>/pn_post.png" alt="发新帖" />-->
    </a>
    <?php } ?>
    <!--<a href="javascript:;" class="btn btn-primary newtopic">-->
    <!--发布新贴-->
    <!--</a>-->
    <!--版主-->
    <div class="model admin-list" style="position: relative;top: -5px">
        <div class="hd">
            <a class="more-link" href="#" target="_blank"></a>
            <h4>楼主</h4>
        </div>
        <div class="bd">
            <div id="w0" class="model list-view">
                <ul>
                    <li data-key="3">

                        <a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" c="1">

                            <img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=small"
                                 class="ava_border" width="50px" height="50px" style=" padding:2px; margin:0; background-color:#fff;border-radius: 50%;overflow: hidden;" />
                        </a>
                        <em><span class="xi2"><?php echo $thread['author'];?></span></em>

                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="clearfix ad_pos"></div>

    <!--广告-->
    <div class="ad mrt50">
        <div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">


                <li data-target="#carousel-example-generic3" data-slide-to="0" class="active"></li>

                <li data-target="#carousel-example-generic3" data-slide-to="1" class=""></li>

                <li data-target="#carousel-example-generic3" data-slide-to="2" class=""></li>
                <li data-target="#carousel-example-generic3" data-slide-to="3" class=""></li>

            </ol>


            <div class="carousel-inner">
                <div class="item active"><a href="#" target="_blank"><img
                        src="template/dean_tech_150528/images/luntan_small03.jpg" title="2016暑假在线强化班" alt="2016暑假在线强化班"></a></div>

                <div class="item"><a href="#" target="_blank"><img
                        src="template/dean_tech_150528/images/luntan_small04.png" title="网络年会" alt="网络年会"></a></div>

                <div class="item"><a href="http://www.gmatonline.cn/index.php?web/exam/" target="_blank"><img
                        src="template/dean_tech_150528/images/luntan_small01.jpg" title="雷哥GMAT在线题库 做题拿直播课名额" alt="雷哥GMAT在线题库 做题拿直播课名额"></a></div>

                <div class="item"><a href="http://www.gmatonline.cn/index.php?web/ceping" target="_blank"><img
                        src="template/dean_tech_150528/images/luntan_small02.jpg" title="雷哥GMAT在线智能测评" alt="雷哥GMAT在线智能测评"></a>
                </div>

            </div>

            <!--<a class="left carousel-control"-->
            <!--href="#" data-slide="prev">-->
            <!--<span class="glyphicon glyphicon-chevron-left"></span>-->
            <!--</a>-->
            <!--<a class="right carousel-control"-->
            <!--href="#" data-slide="next">-->
            <!--<span class="glyphicon glyphicon-chevron-right"></span>-->
            <!--</a>-->
        </div>
    </div>


    <script type="text/javascript">
        $(function () {
            $("#fid").attr('value', getUrlParam('fid'));
            $("#all").attr('value', getUrlParam('all'));

            $("#reply").click(function (e) {
                $("#getSortType").val('reply');
                $("#sortFrom").submit();
            });
            $("#release").click(function (e) {
                $("#getSortType").val('release');
                $("#sortFrom").submit();
            });
            $("#all_count").click(function (e) {
                $("#getSortType").val('all');
                $("#sortFrom").submit();
            });
            $("#default").click(function (e) {
                $("#getSortType").val('');
                $("#sortFrom").submit();
            });
        })

        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]);
            return null;
        }
    </script>


    <!--[diy=diyfastposttop]-->
    <div id="diyfastposttop" class="area"></div>
    <!--[/diy]-->
</div>
<!--右侧-->


<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php if($_G['relatedlinks'] || $_GET['highlight']) { ?>
<script type="text/javascript">
var relatedlink = [];<?php if(is_array($_G['relatedlinks'])) foreach($_G['relatedlinks'] as $key => $link) { ?>relatedlink[<?php echo $key;?>] = {'sname':'<?php echo $link['name'];?>', 'surl':'<?php echo $link['url'];?>'};
<?php } $highlights = explode(' ', str_replace(array('\'', chr(125)), array('&#039;', '&#125;'), dhtmlspecialchars($_GET['highlight'])));?><?php if(is_array($highlights)) foreach($highlights as $word) { $key++;?>relatedlink[<?php echo $key;?>] = {'sname':'<?php echo $word;?>', 'surl':''};
<?php } ?>
relatedlinks('postmessage_<?php echo $_G['forum_firstpid'];?>');
</script>
<?php } if(!empty($_G['cookie']['clearUserdata']) && $_G['cookie']['clearUserdata'] == 'forum') { ?>
<script type="text/javascript">saveUserdata('forum_'+discuz_uid, '')</script>
<?php } ?>

<script type="text/javascript">
<?php if($_G['forum']['picstyle'] && ($_G['forum']['ismoderator'] || $_G['uid'] == $_G['thread']['authorid'])) { ?>
function showsetcover(obj) {
if(obj.parentNode.id == 'postmessage_<?php echo $_G['forum_firstpid'];?>') {
var defheight = <?php echo $_G['setting']['forumpicstyle']['thumbheight'];?>;
var defwidth = <?php echo $_G['setting']['forumpicstyle']['thumbwidth'];?>;
var newimgid = 'showcoverimg';
var imgsrc = obj.src ? obj.src : obj.file;
if(!imgsrc) return;

var tempimg=new Image();
tempimg.src=imgsrc;
if(tempimg.complete) {
if(tempimg.width < defwidth || tempimg.height < defheight) return;
} else {
return;
}
if($(newimgid) && obj.id != newimgid) {
$(newimgid).id = 'img'+Math.random();
}
if($(newimgid+'_menu')) {
var menudiv = $(newimgid+'_menu');
} else {
var menudiv = document.createElement('div');
menudiv.className = 'tip tip_4 aimg_tip';
menudiv.id = newimgid+'_menu';
menudiv.style.position = 'absolute';
menudiv.style.display = 'none';
obj.parentNode.appendChild(menudiv);
}
menudiv.innerHTML = '<div class="tip_c xs0"><a onclick="showWindow(\'setcover_'+newimgid+'\', this.href)" href="forum.php?mod=ajax&amp;action=setthreadcover&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $_G['forum_firstpid'];?>&amp;fid=<?php echo $_G['fid'];?>&amp;imgurl='+imgsrc+'">设为封面</a></div>';
obj.id = newimgid;
showMenu({'ctrlid':newimgid,'pos':'12'});
}
return;
}
<?php } ?>
function succeedhandle_followmod(url, msg, values) {
var fObj = $('followmod_'+values['fuid']);
if(values['type'] == 'add') {
fObj.innerHTML = '不收听';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
} else if(values['type'] == 'del') {
fObj.innerHTML = '收听TA';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid='+values['fuid'];
}
}
<?php if($_G['blockedpids']) { ?>
var blockedPIDs = [<?php echo implode(',', $_G['blockedpids']); ?>];
<?php } if($postlist && empty($_G['setting']['disfixedavatar'])) { ?>
fixed_avatar([<?php echo implode(',', array_keys($postlist)); ?>], <?php if(empty($_G['setting']['disfixednv_viewthread']) ) { ?>1<?php } else { ?>0<?php } ?>);
<?php } elseif(empty($_G['setting']['disfixednv_viewthread'])) { ?>
fixed_top_nv();
<?php } ?>
</script><?php include template('common/footer'); ?>