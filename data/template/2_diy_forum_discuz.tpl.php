<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
    <!--&lt;!&ndash;<?php if(empty($gid) && $announcements) { ?>&ndash;&gt;-->
    <!--<div class="y">-->
    <!--<div id="an">-->
    <!--<dl class="cl">-->
    <!--<dt class="z xw1">公告:&nbsp;</dt>-->
    <!--<dd>-->
    <!--<div id="anc"><ul id="ancl"><?php echo $announcements;?></ul></div>-->
    <!--</dd>-->
    <!--</dl>-->
    <!--</div>-->
    <!--<script type="text/javascript">announcement();</script>-->
    <!--</div>-->
    <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
    <!--<div class="z">-->
    <!--<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&raquo;</em><a href="forum.php"><?php echo $_G['setting']['navs']['2']['navname'];?></a><?php echo $navigation;?>-->
    <!--</div>-->
    <div class="z"><?php if(!empty($_G['setting']['pluginhooks']['index_status_extra'])) echo $_G['setting']['pluginhooks']['index_status_extra'];?></div>
</div>

<?php if(empty($gid)) { ?><?php echo adshow("text/wp a_t");?><?php } ?>

<style id="diy_style" type="text/css"></style>

<?php if(empty($gid)) { ?>
<div class="wp">
    <!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<?php } ?>

<!--今日新帖-->
<div id="ct" class="wp cl<?php if($_G['setting']['forumallowside']) { ?> ct2<?php } ?>">



    <?php if(empty($gid)) { ?>
    <div id="chart" class="bm bw0 cl">
        <p class="chart z">今日: <em><?php echo $todayposts;?></em><span class="pipe">|</span>昨日: <em><?php echo $postdata['0'];?></em><span class="pipe">|</span>帖子: <em><?php echo $posts;?></em><span class="pipe">|</span>会员: <em><?php echo $_G['cache']['userstats']['totalmembers'];?></em><?php if($_G['cache']['userstats']['newsetuser']) { ?><span class="pipe">|</span>欢迎新会员: <em><a href="home.php?mod=space&amp;username=<?php echo rawurlencode($_G['cache']['userstats']['newsetuser']); ?>" target="_blank" class="xi2"><?php echo $_G['cache']['userstats']['newsetuser'];?></a></em><?php } ?></p>
        <!--<div class="y">-->
        <?php if(!empty($_G['setting']['pluginhooks']['index_nav_extra'])) echo $_G['setting']['pluginhooks']['index_nav_extra'];?>
        <!--&lt;!&ndash;<?php if($_G['uid']) { ?>&ndash;&gt;<a href="forum.php?mod=guide&amp;view=my" title="我的帖子" class="xi2">我的帖子</a>-->
        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;&lt;!&ndash;<?php if(!empty($_G['setting']['search']['forum']['status'])) { ?>&ndash;&gt;&lt;!&ndash;<?php if($_G['uid']) { ?>&ndash;&gt;<span class="pipe">|</span>&lt;!&ndash;<?php } ?>&ndash;&gt;-->
        <!--&lt;!&ndash;<a href="forum.php?mod=guide&amp;view=new" title="最新回复" class="xi2">最新回复</a>&ndash;&gt;-->
        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
        <!--</div>-->
    </div>
    <?php } ?>



    <!--[diy=diy_chart]--><div id="diy_chart" class="area"></div><!--[/diy]-->





    <div class="mn">




        <!--主体内容-->
        <?php if(!empty($_G['setting']['grid']['showgrid'])) { } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_top'])) echo $_G['setting']['pluginhooks']['index_top'];?>
<?php if(!empty($_G['cache']['heats']['message'])) { ?>
<div class="bm">
    <div class="bm_h cl">
        <h2><?php echo $_G['setting']['navs']['2']['navname'];?>热点</h2>
    </div>
    <div class="bm_c cl">
        <div class="heat z">
            <?php if(is_array($_G['cache']['heats']['message'])) foreach($_G['cache']['heats']['message'] as $data) { ?>            <dl class="xld">
                <dt><?php if($_G['adminid'] == 1) { ?><a class="d" href="forum.php?mod=misc&amp;action=removeindexheats&amp;tid=<?php echo $data['tid'];?>" onclick="return removeindexheats()">delete</a><?php } ?>
                    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $data['tid'];?>" target="_blank" class="xi2"><?php echo $data['subject'];?></a></dt>
                <dd><?php echo $data['message'];?></dd>
            </dl>
            <?php } ?>
        </div>
        <ul class="xl xl1 heatl">
            <?php if(is_array($_G['cache']['heats']['subject'])) foreach($_G['cache']['heats']['subject'] as $data) { ?>            <li><?php if($_G['adminid'] == 1) { ?><a class="d" href="forum.php?mod=misc&amp;action=removeindexheats&amp;tid=<?php echo $data['tid'];?>" onclick="return removeindexheats()">delete</a><?php } ?>&middot; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $data['tid'];?>" target="_blank" class="xi2"><?php echo $data['subject'];?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>


<!--左侧{-->
<div class="main">


    <!--幻灯片{-->
    <div class="slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">

                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>

                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">


                <div class="item active">
                    <a href="http://www.xsteach.com/ad/click?id=180" target="_blank" title="520恩爱秀出来"><img
                            src="test/images/eb6c9d152fc26c4df28f5e9ef2d927fe001.jpg" title="520恩爱秀出来" alt="520恩爱秀出来"></a>
                </div>

                <div class="item">
                    <a href="http://www.xsteach.com/ad/click?id=163" target="_blank" title=" 崇尚个性的自我表达"><img
                            src="test/images/302be4a991b5a95d30ffed4fcc4f69e0001.jpg" title=" 崇尚个性的自我表达" alt=" 崇尚个性的自我表达"></a>
                </div>

                <div class="item">
                    <a href="http://www.xsteach.com/ad/click?id=151" target="_blank" title="壕砸现金两万，请你甩故事！"><img
                            src="test/images/99e4a3aa9ae76cb3db2b40829d87d64f001.jpg" title="壕砸现金两万，请你甩故事！" alt="壕砸现金两万，请你甩故事！"></a>
                </div>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--}幻灯片-->

    <!--社区推荐{-->
 <div style="clear: both"></div>
    <!--}社区推荐-->


<?php if(!empty($_G['setting']['pluginhooks']['index_catlist_top'])) echo $_G['setting']['pluginhooks']['index_catlist_top'];?>


<!--帖子列表 开始-->
<div class="think_fl">
    <?php if(!empty($collectiondata['follows'])) { ?>

    <?php $forumscount = count($collectiondata['follows']);?>    <?php $forumcolumns = 4;?>    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>    <div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
        <div class="bm_h cl">
<span class="o">
<img id="category_-1_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_-1'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_-1');" />
</span>
            <!--<h2><a href="forum.php?mod=collection&amp;op=my">我订阅的专辑</a></h2>-->
        </div>
        <div id="category_-1" class="bm_c" style="<?php echo $collapse['category_-1']; ?>">
            <table cellspacing="0" cellpadding="0" class="fl_tb">
                <tr>
                    <?php $ctorderid = 0;?>                    <?php if(is_array($collectiondata['follows'])) foreach($collectiondata['follows'] as $key => $colletion) { ?>                    <?php if($ctorderid && ($ctorderid % $forumcolumns == 0)) { ?>
                </tr>
                <?php if($ctorderid < $forumscount) { ?>
                <tr class="fl_row">
                    <?php } ?>
                    <?php } ?>
                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                    <div class="fl_icn_g">
                        <a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>" target="_blank"><img src="<?php echo IMGDIR;?>/forum<?php if($followcollections[$key]['lastvisit'] < $colletion['lastupdate']) { ?>_new<?php } ?>.gif" alt="<?php echo $colletion['name'];?>" /></a>
                    </div>
                    <dl>
                        <dt><a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>"><?php echo $colletion['name'];?></a></dt>
                        <dd><em>主题: <?php echo dnumber($colletion['threadnum']); ?></em>, <em>评论: <?php echo dnumber($colletion['commentnum']); ?></em></dd>
                        <dd>
                            <?php if($colletion['lastpost']) { ?>
                            <?php if($forumcolumns < 3) { ?>
                            <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($colletion['lastsubject'], 30); ?></a> <cite><?php echo dgmdate($colletion[lastposttime]);?> <?php if($colletion['lastposter']) { ?><?php echo $colletion['lastposter'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                            <?php } else { ?>
                            <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo dgmdate($colletion[lastposttime]);?></a>
                            <?php } ?>
                            <?php } else { ?>
                            从未
                            <?php } ?>
                        </dd>
                        <?php if(!empty($_G['setting']['pluginhooks']['index_followcollection_extra'][$colletion[ctid]])) echo $_G['setting']['pluginhooks']['index_followcollection_extra'][$colletion[ctid]];?>
                    </dl>
                    </td>
                    <?php $ctorderid++;?>                    <?php } ?>
                    <?php if(($columnspad = $ctorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
                </tr>
            </table>

        </div>
    </div>

    <?php } ?>
    <?php if(empty($gid) && !empty($forum_favlist)) { ?>
    <?php $forumscount = count($forum_favlist);?>    <?php $forumcolumns = $forumscount > 3 ? ($forumscount == 4 ? 4 : 5) : 1;?>    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>    <div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
        <div class="bm_h cl">
<span class="o">
<!--<img id="category_0_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_0'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_0');" />-->
</span>
            <h2><a href="home.php?mod=space&amp;do=favorite&amp;type=forum">我收藏的版块11111111</a></h2>
        </div>
        <div id="category_0" class="bm_c" style="<?php echo $collapse['category_0']; ?>">
            <table cellspacing="0" cellpadding="0" class="fl_tb">
                <tr>
                    <?php $favorderid = 0;?>                    <?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { ?>                    <?php if($favforumlist[$favorite['id']]) { ?>
                    <?php $forum=$favforumlist[$favorite[id]];?>                    <?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?>                    <?php if($forumcolumns>1) { ?>
                    <?php if($favorderid && ($favorderid % $forumcolumns == 0)) { ?>
                </tr>
                <?php if($favorderid < $forumscount) { ?>
                <tr class="fl_row">
                    <?php } ?>
                    <?php } ?>
                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                    <div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                    <?php if($forum['icon']) { ?>
                    <?php echo $forum['icon'];?>
                    <?php } else { ?>
                    <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                    <?php } ?>
        </div>
        <dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
        <dt><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></dt>
        <?php if(empty($forum['redirect'])) { ?><dd><em>主题: <?php echo dnumber($forum['threads']); ?></em>, <em>帖数: <?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
        <dd>
            <?php if($forum['permission'] == 1) { ?>
            私密版块
            <?php } else { ?>
            <?php if($forum['redirect']) { ?>
            <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
            <?php } elseif(is_array($forum['lastpost'])) { ?>
            <?php if($forumcolumns < 3) { ?>
            <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
            <?php } else { ?>
            <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo $forum['lastpost']['dateline'];?></a>
            <?php } ?>
            <?php } else { ?>
            从未
            <?php } ?>
            <?php } ?>
        </dd>
        <?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
        </dl>
        </td>
        <?php $favorderid++;?>        <?php } else { ?>
        <td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
        <?php if($forum['icon']) { ?>
        <?php echo $forum['icon'];?>
        <?php } else { ?>
        <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
        <?php } ?>
        </td>
        <td>
            <h2><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
            <?php if($forum['description']) { ?><p class="xg2"><?php echo $forum['description'];?></p><?php } ?>
            <?php if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } ?>
            <?php if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
            <?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
        </td>
        <td class="fl_i">
            <?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
        </td>
        <td class="fl_by">
            <div>
                <?php if($forum['permission'] == 1) { ?>
                私密版块
                <?php } else { ?>
                <?php if($forum['redirect']) { ?>
                <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
                <?php } elseif(is_array($forum['lastpost'])) { ?>
                <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                <?php } else { ?>
                从未
                <?php } ?>
                <?php } ?>
            </div>
        </td>
        </tr>
        <tr class="fl_row">

            <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php if(($columnspad = $favorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
        </tr>
        </table>

    </div>

</div><?php echo adshow("intercat/bm a_c/-1");?><?php } if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><?php if(!empty($_G['setting']['pluginhooks']['index_catlist'][$cat[fid]])) echo $_G['setting']['pluginhooks']['index_catlist'][$cat[fid]];?>





    <!--功能板块-->
<div class="bm bmw <?php if($cat['forumcolumns']) { ?> flg<?php } ?> cl" style="border: none !important;">
    <div class="bm_h cl" style="background: none;border-bottom: 1px solid #c2c2c2">

<!--<span class="o">-->
<!--&lt;!&ndash;<img id="category_<?php echo $cat['fid'];?>_img" src="<?php echo IMGDIR;?>/<?php echo $cat['collapseimg'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_<?php echo $cat['fid'];?>');" />&ndash;&gt;-->
<!--</span>-->


        <?php if($cat['moderators']) { ?><span class="y">分区版主: <?php echo $cat['moderators'];?></span><?php } ?>
        <?php $caturl = !empty($cat['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$cat['domain'].'.'.$_G['setting']['domain']['root']['forum'] : '';?>        <h2 style="font-size: 18px">

            <a href="<?php if(!empty($caturl)) { ?><?php echo $caturl;?><?php } else { ?>forum.php?gid=<?php echo $cat['fid'];?><?php } ?>" style="<?php if($cat['extra']['namecolor']) { ?>color: <?php echo $cat['extra']['namecolor'];?>;<?php } ?>"><?php echo $cat['name'];?>222</a>

        </h2>


    </div>


    <div id="category_<?php echo $cat['fid'];?>" class="bm_c" style="<?php echo $collapse['category_'.$cat['fid']]; ?>">
        <table cellspacing="0" cellpadding="0" class="fl_tb">
            <tr>
                <?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { ?>                <?php $forum=$forumlist[$forumid];?>                <?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?>                <?php if($cat['forumcolumns']) { ?>
                <?php if($forum['orderid'] && ($forum['orderid'] % $cat['forumcolumns'] == 0)) { ?>


            </tr>
            <?php if($forum['orderid'] < $cat['forumscount']) { ?>
            <tr class="fl_row">
                <?php } ?>
                <?php } ?>
                <td class="fl_g" width="<?php echo $cat['forumcolwidth'];?>">
                    <div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                    <?php if($forum['icon']) { ?>
                    <?php echo $forum['icon'];?>
                    <?php } else { ?>
                    <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                    <?php } ?>
    </div>
    <dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
    <dt><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></dt>
    <?php if(empty($forum['redirect'])) { ?><dd><em>主题: <?php echo dnumber($forum['threads']); ?></em>, <em>帖数: <?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
    <dd>
        <?php if($forum['permission'] == 1) { ?>
        私密版块
        <?php } else { ?>
        <?php if($forum['redirect']) { ?>
        <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
        <?php } elseif(is_array($forum['lastpost'])) { ?>
        <?php if($cat['forumcolumns'] < 3) { ?>
        <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
        <?php } else { ?>
        <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo $forum['lastpost']['dateline'];?></a>
        <?php } ?>
        <?php } else { ?>
        从未
        <?php } ?>
        <?php } ?>
    </dd>
    <?php if(!empty($_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]];?>
    </dl>
    </td>
    <?php } else { ?>
    <td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
    <?php if($forum['icon']) { ?>
    <?php echo $forum['icon'];?>
    <?php } else { ?>
    <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
    <?php } ?>
    </td>
    <td>
        <h2><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
        <?php if($forum['description']) { ?><p class="xg2"><?php echo $forum['description'];?></p><?php } ?>
        <?php if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } ?>
        <?php if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
        <?php if(!empty($_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]];?>
    </td>
    <td class="fl_i">
        <?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
    </td>
    <td class="fl_by">
        <div>
            <?php if($forum['permission'] == 1) { ?>
            私密版块
            <?php } else { ?>
            <?php if($forum['redirect']) { ?>
            <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
            <?php } elseif(is_array($forum['lastpost'])) { ?>
            <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
            <?php } else { ?>
            从未
            <?php } ?>
            <?php } ?>
        </div>
    </td>
    </tr>
    <tr class="fl_row">
        <?php } ?>
        <?php } ?>




        <?php echo $cat['endrows'];?>
    </tr>
    </table>
</div><?php echo adshow("intercat/bm a_c/$cat[fid]");?><?php } if(!empty($collectiondata['data'])) { $forumscount = count($collectiondata['data']);?><?php $forumcolumns = 4;?><?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?><div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
    <div class="bm_h cl">
<span class="o">
<img id="category_-2_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_-2'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_-2');" />
</span>
        <h2><a href="forum.php?mod=collection">淘专辑推荐</a></h2>
    </div>
    <div id="category_-2" class="bm_c" style="<?php echo $collapse['category_-2']; ?>">
        <table cellspacing="0" cellpadding="0" class="fl_tb">
            <tr>
                <?php $ctorderid = 0;?>                <?php if(is_array($collectiondata['data'])) foreach($collectiondata['data'] as $key => $colletion) { ?>                <?php if($ctorderid && ($ctorderid % $forumcolumns == 0)) { ?>
            </tr>
            <?php if($ctorderid < $forumscount) { ?>
            <tr class="fl_row">
                <?php } ?>
                <?php } ?>
                <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                <div class="fl_icn_g">
                    <a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>" target="_blank"><img src="<?php echo IMGDIR;?>/forum.gif" alt="<?php echo $colletion['name'];?>" /></a>
                </div>
                <dl>
                    <dt><a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>"><?php echo $colletion['name'];?></a></dt>
                    <dd><em>主题: <?php echo dnumber($colletion['threadnum']); ?></em>, <em>评论: <?php echo dnumber($colletion['commentnum']); ?></em></dd>
                    <dd>
                        <?php if($colletion['lastpost']) { ?>
                        <?php if($forumcolumns < 3) { ?>
                        <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($colletion['lastsubject'], 30); ?></a> <cite><?php echo dgmdate($colletion[lastposttime]);?> <?php if($colletion['lastposter']) { ?><?php echo $colletion['lastposter'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                        <?php } else { ?>
                        <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo dgmdate($colletion[lastposttime]);?></a>
                        <?php } ?>
                        <?php } else { ?>
                        从未
                        <?php } ?>
                    </dd>
                    <?php if(!empty($_G['setting']['pluginhooks']['index_datacollection_extra'][$colletion[ctid]])) echo $_G['setting']['pluginhooks']['index_datacollection_extra'][$colletion[ctid]];?>
                </dl>
                </td>
                <?php $ctorderid++;?>                <?php } ?>
                <?php if(($columnspad = $ctorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
            </tr>
        </table>

    </div>
</div>

<?php } ?>

</div>
<!--功能板块结束-->








        <!-- 帖子分类 start -->
        <div class="fl bm" style="border: none">
            <div class="bm bmw cl">
                <div id="category_grid" class="bm_c" >
                    <table cellspacing="0" cellpadding="0"><tr>
                        <?php if(!$_G['setting']['grid']['gridtype']) { ?>

                        <!--最新图片-->
                        <!--<td valign="top" class="category_l1">-->
                            <!--<div class="newimgbox">-->
                                <!--<h4><span class="tit_newimg"></span>全部帖子</h4>-->
                                <!--<div class="module cl slidebox_grid" style="width:218px">-->
                                    <!--<script type="text/javascript">-->
                                        <!--var slideSpeed = 5000;-->
                                        <!--var slideImgsize = [218,200];-->
                                        <!--var slideBorderColor = '<?php echo $_G['style']['specialborder'];?>';-->
                                        <!--var slideBgColor = '<?php echo $_G['style']['commonbg'];?>';-->
                                        <!--var slideImgs = new Array();-->
                                        <!--var slideImgLinks = new Array();-->
                                        <!--var slideImgTexts = new Array();-->
                                        <!--var slideSwitchColor = '<?php echo $_G['style']['tabletext'];?>';-->
                                        <!--var slideSwitchbgColor = '<?php echo $_G['style']['commonbg'];?>';-->
                                        <!--var slideSwitchHiColor = '<?php echo $_G['style']['specialborder'];?>';-->
                                        <?php $k = 1;?>                                        <!--&lt;!&ndash;<?php if(is_array($grids['slide'])) foreach($grids['slide'] as $stid => $svalue) { ?>&ndash;&gt;-->
                                        <!--slideImgs[&lt;!&ndash;<?php echo $k; ?>&ndash;&gt;] = '<?php echo $svalue['image'];?>';-->
                                        <!--slideImgLinks[&lt;!&ndash;<?php echo $k; ?>&ndash;&gt;] = '<?php echo $svalue['url'];?>';-->
                                        <!--slideImgTexts[&lt;!&ndash;<?php echo $k; ?>&ndash;&gt;] = '<?php echo $svalue['subject'];?>';-->
                                        <?php $k++;?>                                        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                                    <!--</script>-->
                                    <!--<script src="<?php echo $_G['setting']['jspath'];?>forum_slide.js?<?php echo VERHASH;?>" type="text/javascript"></script>-->
                                <!--</div>-->
                            <!--</div>-->
                <!--</div>-->
                <?php } ?>
                        <!--全部帖子-->
                        <td valign="top" class="category_l2">

                            <div class="subjectbox">



                                <h4><span class="tit_subject"></span>全部帖子</h4>

                                <div class="bd tab-content">
                                    <div class="tab-pane active">
                                    <ul class="posts">


                                    <?php if(is_array($grids['newthread'])) foreach($grids['newthread'] as $thread) { ?>                                    <li>
                                                <div class="avatar avatar-50">
                                                    <a href="#" target="_blank" class="user-avatar-home">
                                            <!--用户头像-->
                                            <a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" c="1">

                                                <img src="http://localhost/upload/uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=small"
                                                     class="ava_border" width="50px" height="50px" style=" padding:2px; margin:0; background-color:#fff;border-radius: 50%;overflow: hidden;" />


                                            </a>
                                                        <i class="sm-level level-board-master" title="版主"></i> </a>
                                                </div>
                                                        <div class="cont">
                                                            <div class="thread" style="font-size: 18px">

                                                            <!--主题-->
                                        <img src="http://localhost/upload/uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=small"
                                             class="ava_border" width="20px" height="20px" style="padding:2px; margin:0px; background-color:#fff;" />


                                        <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>" target="_blank"}><?php echo $thread['subject'];?></a>


                                                <div class="platact_type">
                                                </div>
                                                <ul class="pagination thread-page-preview">
                                                </ul>
                                            </div>

                                        <!--回复-->
                                        <div class="thread" style="line-height: 20px;margin-top: 5px;margin-left: 5px">
                                            <div class="author-info">

                                                <span class="author-name" title="PS张甜"><?php echo $thread['author'];?></span>


                                                <span class="show-time" title="05-19">发布于&nbsp;<?php echo $thread['dateline'];?></span>
                                            </div>
                                            <div class="author-info">
                                                <span class="author-date" title="PS孙权"><?php echo $thread['lastposter'];?></span>
                                                <span class="show-time" title="09:01">最后回复于&nbsp;<?php echo $thread['lastpost'];?></span>
                                            </div>
                                            <div class="fans_numbox">
                                                <span>
                                                    查看：
                                                    <span class="light"><?php echo $thread['views'];?></span>
                                                </span>|

                                                <span>
                                                回复：
                                               <span class="light">

                                                    <?php echo $thread['replies'];?>
                                                </span>
                                            </span>
                                            </div>
                                        </div>

                                        </div>
                                    </li>


                                        <?php } ?>



                                    </ul>
                                <!--内容-->
                                </ul>
                                        <!--<ul class="bbsnewl">-->
                                            <!--&lt;!&ndash;<?php if(is_array(${"new_no".$forum['fid']."_threadlist"})) foreach(${"new_no".$forum['fid']."_threadlist"} as $row) { ?>&ndash;&gt;-->
                                            <!--<li><span class="y"><?php echo $row['author'];?></span><a href="forum.php?mod=viewthread&amp;tid=<?php echo $row['tid'];?>" target="_blank" title="<?php echo $row['view_subject'];?>">&lt;!&ndash;<?php echo cutstr($row['view_subject'], 30); ?>&ndash;&gt;</a></li>-->
                                            <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                                        <!--</ul>-->
                                    </div>
                                </div>
                                <!--分页-->

                                <div class="pages more-loading">
                                    <ul class="pagination">

                                        <!--<li class="first disabled"><span>首页</span></li>-->
                                        <!--<li class="prev disabled"><span>上一页</span></li>-->
                                        <li class="active"><a href="#" data-page="0">1</a></li>
                                        <li><a href="" data-page="1">2</a></li>
                                        <!--<li><a href="" data-page="2">3</a></li>-->
                                        <!--<li><a href="" data-page="3">4</a></li>-->
                                        <!--<li><a href="" data-page="4">5</a></li>-->
                                        <!--<li><a href="" data-page="5">6</a></li>-->
                                        <!--<li><a href="" data-page="6">7</a></li>-->
                                        <!--<li><a href="" data-page="7">8</a></li>-->
                                        <!--<li class="next"><a href="" data-page="1">下一页</a></li>-->
                                        <!--<li class="last"><a href="" data-page="2057">尾页</a></li>-->



                                            <span id="fd_page_bottom"><?php echo $multipage;?></span>

                                    </ul>
                                </div>
                            </div>
                        </div>

                <!--&lt;!&ndash;最新主贴&ndash;&gt;-->
                <!--<td valign="top" class="category_l2">-->
                    <!--<div class="subjectbox">-->
                        <!--<h4><span class="tit_subject"></span>最新主贴</h4>-->
                        <!--<ul class="category_newlist">-->
                            <!--&lt;!&ndash;<?php if(is_array($grids['newthread'])) foreach($grids['newthread'] as $thread) { ?>&ndash;&gt;-->
                            <!--<li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>"<?php if($thread['highlight']) { ?> <?php echo $thread['highlight'];?><?php } if($_G['setting']['grid']['showtips']) { ?> tip="标题: <strong><?php echo $thread['oldsubject'];?></strong><br/>作者: <?php echo $thread['author'];?> (<?php echo $thread['dateline'];?>)<br/>查看/回复: <?php echo $thread['views'];?>/<?php echo $thread['replies'];?>" onmouseover="showTip(this)"<?php } else { ?> title="<?php echo $thread['oldsubject'];?>"<?php } if($_G['setting']['grid']['targetblank']) { ?> target="_blank"<?php } ?>><?php echo $thread['subject'];?></a></li>-->
                            <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                        <!--</ul>-->
                    <!--</div>-->
            <!--</div>-->



            <!--&lt;!&ndash;社区精华&ndash;&gt;-->
            <!--<td valign="top" class="category_l3">-->
                <!--<div class="hottiebox">-->
                    <!--<h4><span class="tit_hottie"></span>社区精华</h4>-->
                    <!--<ul class="category_newlist">-->
                        <!--&lt;!&ndash;<?php if(is_array($grids['hot'])) foreach($grids['hot'] as $thread) { ?>&ndash;&gt;-->
                        <!--<li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>"<?php if($thread['highlight']) { ?> <?php echo $thread['highlight'];?><?php } if($_G['setting']['grid']['showtips']) { ?> tip="标题: <strong><?php echo $thread['oldsubject'];?></strong><br/>作者: <?php echo $thread['author'];?> (<?php echo $thread['dateline'];?>)<br/>查看/回复: <?php echo $thread['views'];?>/<?php echo $thread['replies'];?>" onmouseover="showTip(this)"<?php } else { ?> title="<?php echo $thread['oldsubject'];?>"<?php } if($_G['setting']['grid']['targetblank']) { ?> target="_blank"<?php } ?>><?php echo $thread['subject'];?></a></li>-->
                        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                    <!--</ul>-->
                <!--</div>-->
        <!--</div>-->

        <?php if($_G['setting']['grid']['gridtype']) { ?>

        <td valign="top" class="category_l4">
            <div class="goodtiebox">
                <h4><span class="tit_goodtie"></span>精华帖子</h4>
                <ul class="category_newlist">
                    <?php if(is_array($grids['digest'])) foreach($grids['digest'] as $thread) { ?>                    <li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>"<?php if($thread['highlight']) { ?> <?php echo $thread['highlight'];?><?php } if($_G['setting']['grid']['showtips']) { ?> tip="标题: <strong><?php echo $thread['oldsubject'];?></strong><br/>作者: <?php echo $thread['author'];?> (<?php echo $thread['dateline'];?>)<br/>查看/回复: <?php echo $thread['views'];?>/<?php echo $thread['replies'];?>" onmouseover="showTip(this)"<?php } else { ?> title="<?php echo $thread['oldsubject'];?>"<?php } if($_G['setting']['grid']['targetblank']) { ?> target="_blank"<?php } ?>><?php echo $thread['subject'];?></a></li>
                    <?php } ?>
                </ul>
            </div>

    </div>
    <?php } ?>
    </table>
</div>
</div>
</div>
<!-- 帖子分类 end -->

</div>



<!--会员列表 开始-->
<?php if(!empty($_G['setting']['pluginhooks']['index_middle'][$key])) echo $_G['setting']['pluginhooks']['index_middle'][$key];?>
<div class="wp mtn">
    <!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>

<?php if(empty($gid) && $_G['setting']['whosonlinestatus']) { ?>

<!--在线会员-->
<!--<div id="online" class="bm oll">-->
    <!--<div class="bm_h">-->
        <!--&lt;!&ndash;<?php if($detailstatus) { ?>&ndash;&gt;-->
        <!--<span class="o"><a href="forum.php?showoldetails=no#online" title="收起/展开"><img src="<?php echo IMGDIR;?>/collapsed_no.gif" alt="收起/展开" /></a></span>-->
        <!--<h3>-->
            <!--<strong><a href="home.php?mod=space&amp;do=friend&amp;view=online&amp;type=member">在线会员</a></strong>-->
<!--<span class="xs1">- <strong><?php echo $onlinenum;?></strong> 人在线-->
<!--- <strong><?php echo $membercount;?></strong> 会员(<strong><?php echo $invisiblecount;?></strong> 隐身),-->
<!--<strong><?php echo $guestcount;?></strong> 位游客-->
<!--- 最高记录是 <strong><?php echo $onlineinfo['0'];?></strong> 于 <strong><?php echo $onlineinfo['1'];?></strong>.</span>-->
        <!--</h3>-->
        <!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
        <!--&lt;!&ndash;<?php if(empty($_G['setting']['sessionclose'])) { ?>&ndash;&gt;-->
        <!--<span class="o"><a href="forum.php?showoldetails=yes#online" title="收起/展开"><img src="<?php echo IMGDIR;?>/collapsed_yes.gif" alt="收起/展开" /></a></span>-->
        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
        <!--<h3>-->
            <!--<strong>-->
                <!--&lt;!&ndash;<?php if(!empty($_G['setting']['whosonlinestatus'])) { ?>&ndash;&gt;-->
                在线会员
                <!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
                <!--<a href="home.php?mod=space&amp;do=friend&amp;view=online&amp;type=member">在线会员</a>-->
                <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
            <!--</strong>-->
<!--<span class="xs1">- 总计 <strong><?php echo $onlinenum;?></strong> 人在线-->
<!--&lt;!&ndash;<?php if($membercount) { ?>&ndash;&gt;- <strong><?php echo $membercount;?></strong> 会员,<strong><?php echo $guestcount;?></strong> 位游客&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--- 最高记录是 <strong><?php echo $onlineinfo['0'];?></strong> 于 <strong><?php echo $onlineinfo['1'];?></strong>.</span>-->
        <!--</h3>-->
        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
    <!--</div>-->
    <!--&lt;!&ndash;<?php if($_G['setting']['whosonlinestatus'] && $detailstatus) { ?>&ndash;&gt;-->
    <!--<dl id="onlinelist" class="bm_c">-->
        <!--<dt class="ptm pbm bbda"><?php echo $_G['cache']['onlinelist']['legend'];?></dt>-->
        <!--&lt;!&ndash;<?php if($detailstatus) { ?>&ndash;&gt;-->
        <!--<dd class="ptm pbm">-->
            <!--<ul class="cl">-->
                <!--&lt;!&ndash;<?php if($whosonline) { ?>&ndash;&gt;-->
                <!--&lt;!&ndash;<?php if(is_array($whosonline)) foreach($whosonline as $key => $online) { ?>&ndash;&gt;-->
                <!--<li title="时间: <?php echo $online['lastactivity'];?>">-->
                    <!--<img src="<?php echo STATICURL;?>image/common/<?php echo $online['icon'];?>" alt="icon" />-->
                    <!--&lt;!&ndash;<?php if($online['uid']) { ?>&ndash;&gt;-->
                    <!--<a href="home.php?mod=space&amp;uid=<?php echo $online['uid'];?>"><?php echo $online['username'];?></a>-->
                    <!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
                    <!--<?php echo $online['username'];?>-->
                    <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                <!--</li>-->
                <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                <!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
                <!--<li style="width: auto">当前只有游客或隐身会员在线</li>-->
                <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
            <!--</ul>-->
        <!--</dd>-->
        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
    <!--</dl>-->
    <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--</div>-->
<?php } ?>
<!--会员列表结束-->





<!--友情链接 开始-->
<?php if(empty($gid) && ($_G['cache']['forumlinks']['0'] || $_G['cache']['forumlinks']['1'] || $_G['cache']['forumlinks']['2'])) { } ?>

<?php if(!empty($_G['setting']['pluginhooks']['index_bottom'])) echo $_G['setting']['pluginhooks']['index_bottom'];?>
</div>
<!--右侧{-->
<div class="aside">

    <!--签到{-->
    <div class="checkin">
        <a class="checkin-btn" href="javascript:void(0)">
            <i class="icon"></i>
            <span>签到</span>
        </a>

        <div class="checkin-intro">
            <span class="title">今日签到人数</span>
            <span class="num"><span class="light day-total">1102</span><span style="">人</span></span>
        </div>
        <div class="model toolbar-top" style="display:none;">
            <div class="hd">
                <h3>你今天还未签到，赶紧啊~</h3>
            </div>
            <div class="bd">
                <div id="datepicker">
                    <div class="title">签到记录</div>
                    <div class="calendar-title">
                        <span class="calendar-prev">&lt;</span><span class="calendar-year">2015</span>年<span
                            class="calendar-month">05</span>月<span class="calendar-next">&gt;</span>
                    </div>
                    <div class="clear"></div>
                    <table class="calendar-table">
                        <thead>
                        <tr>
                            <th><span title="星期一">一</span></th>
                            <th><span title="星期二">二</span>
                            </th>
                            <th><span title="星期三">三</span></th>
                            <th><span title="星期四">四</span></th>
                            <th><span title="星期五">五</span></th>
                            <th class="ui-datepicker-week-end">
                                <span title="星期六">六</span></th>
                            <th class="ui-datepicker-week-end"><span title="星期日">日</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="empty-day">&nbsp;</td>
                            <td class="empty-day">&nbsp;</td>
                            <td class="empty-day">&nbsp;</td>
                            <td class="empty-day">&nbsp;</td>
                            <td class="month-day"><span class="calendar-day">1<span></span>
                </span></td>
                            <td class="month-day"><span class="calendar-day">2<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">3<span></span></span></td>
                        </tr>
                        <tr>
                            <td class="month-day"><span class="calendar-day">4<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">5<span></span></span></td>
                            <td class="month-day">
                                <span class="calendar-day">6<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">7<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">8<span>

                </span></span></td>
                            <td class="month-day"><span class="calendar-day">9<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">10<span></span></span></td>
                        </tr>
                        <tr>
                            <td class="month-day"><span class="calendar-day">11<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">12<span></span></span></td>
                            <td class="month-day">
                                <span class="calendar-day">13<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">14<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">15<span>

                </span></span></td>
                            <td class="month-day"><span class="calendar-day">16<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">17<span></span></span></td>
                        </tr>
                        <tr>
                            <td class="month-day">
                                <span class="calendar-day">18<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">19<span></span></span></td>
                            <td class="month-day default-day"><span class="calendar-day">20<span>

                </span></span></td>
                            <td class="month-day"><span class="calendar-day">21<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">22<span></span></span></td>
                            <td class="month-day">
                                <span class="calendar-day">23<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">24<span></span></span></td>
                        </tr>
                        <tr>
                            <td class="month-day"><span class="calendar-day">25<span></span>
            </span></td>
                            <td class="month-day"><span class="calendar-day">26<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">27<span></span></span></td>
                            <td class="month-day">
                                <span class="calendar-day">28<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">29<span></span></span></td>
                            <td class="month-day"><span class="calendar-day">30<span>

                </span></span></td>
                            <td class="month-day"><span class="calendar-day">31<span></span></span></td>
                        </tr>
                        <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="fter">
                <p class="checkin-count">你已经连续签到<span class="days">0</span>天</p>

                <p>签到<span class="light signed">1</span>天，经验值<span class="light">+5</span>, 帅气值<span class="light">+<span
                        class="cnt-h">1</span></span>；</p>

                <p class="signed7">连续签到<span class="light">7</span>天，经验值<span class="light">+<span
                        class="cnt-e">30</span></span>，帅气值<span class="light">+<span class="cnt-h">10</span></span>；</p>

                <p>想要领取<a href="#" target="_blank">更多签到奖励?</a></p>
            </div>
        </div>
    </div>
    <script>
        $(function () {
//            var loginUrl = "http://www.xsteach.com/login?goto=http%3A%2F%2Fbbs.xsteach.com%2Fdefault%2Findex%3Fpage%3D1%26per-page%3D12";
//            var signInUrl = "http://bbs.xsteach.com/experience/sign-in";
            var signAjax = null;
            var sign_days = [];
            var datepicker;

            $.ajax({
                url:'/experience/sign-in-info',
                type:'get',
                dataType:'jsonp',
                success:function (data) {
                    if (!data) {
                        return;
                    }

                    if (data.signed) {
                        $('.checkin h3').html('你今天已经签到，不错哦~');
                        $('.checkin').addClass('checked');
                        $('.checkin-btn span').html('已签到');
                        $('.days').html(data.series);
                    } else if (data.continuousSigned) {
                        $('.days').html(data.series);
                    }

                    $('.day-total').html(data.total).next().show();

                    datepicker = new generateCalendar({
                        selectedDates:data.sign_days,
                        monthTxt:['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']
                    });
                    datepicker.generate($('#datepicker'));
                }
            });

            var showtimer = null;
            $('.checkin').hover(function () {
                if (showtimer) clearTimeout(showtimer);
                shower = $('.checkin .toolbar-top');
                shower.show();
            }, function () {
                if (showtimer) clearTimeout(showtimer);
                shower = $('.checkin .toolbar-top');
                showtimer = setTimeout("shower.hide();", 300);
            });

            $('.checkin .checkin-btn').click(function () {
                if (xst.user.info.userId == 0) {
                    window.location = loginUrl;
                    return false;
                }

                if ($.trim($('.checkin .checkin-btn span').text()) != '签到') {
                    return false;
                }

                $('.checkin .checkin-btn span').text('签到中');
                signAjax = $.ajax({
                    type:"get",
                    url:signInUrl,
                    dataType:"jsonp",
                    jsonp:"callback",
                    success:function (data) {
                        if (data['code'] == 0) {
                            alert('要签到，请先登录哦~');
                            window.location = loginUrl;
                            return false;
                        } else {
                            var date = new Date();
                            _year = date.getFullYear();
                            _month = (date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1);
                            _day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
                            var dt = _year + '-' + _month + '-' + _day;
                            datepicker.selectedDates.push(dt);
                            var val = data['content'];
                            $('.checkin .checkin-btn span').text('已签到');
                            $('.checkin').addClass('checked');
                            $('.calendar-table .default-day').addClass('selecting-day');
                            $('.checkin .checkin-count .days').text(val['series']);
                            $('.checkin .checkin-intro .day-total').text(val['day_total']);
                            $('.checkin .hd h3').text('你今天已经签到，不错哦~');
                            $('.checkin .toolbar-top').show();
                        }
                    }
                });
            });

        });
    </script>
    <!--}签到-->


    <!--热门版块{-->
    <div class="model site-subnav">
        <div class="hd">
            <h3>热门版块</h3>
        </div>
        <div class="bd">
            <div class="wrapper clearfix">
                <a href="" target="_blank">
                    <img src="test/images/lt_zbgg.jpg" alt="公开课" title="公开课">公开课 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_ziliao.jpg" alt="备考资料" title="备考资料">备考资料 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_guihua.png" alt="备考规划" title="备考规划">备考规划 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_jijing.jpg" alt="机经课程" title="机经课程">机经课程 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_shuxue.png" alt="数学机经" title="数学机经">数学机经 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_readTwo.png" alt="阅读机经" title="阅读机经">阅读机经 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_SC_jiexi.jpg" alt="SC解析" title="SC解析">SC解析 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_CR_jiexi.jpg" alt="CR解析" title="CR解析">CR解析 </a>
                <a href="#" target="_blank">
                    <img src="test/images/lt_classXZ.png" alt="课程下载" title="课程下载">课程下载 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_dayi.png" alt="题目答疑" title="题目答疑">题目答疑 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_tingli.jpg" alt="托福听力" title="托福听力">托福听力 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_kouyu.jpg" alt="托福口语" title="托福口语">托福口语 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_ziliaok.jpg" alt="托福资料" title="托福资料">托福资料 </a>
                <a href="" target="_blank">
                    <img src="test/images/lt_shenq.jpg" alt="商学院申请" title="商学院申请">商学院申请 </a>

            </div>

        </div>
    </div>
    <!--}热门版块-->

    <!--热贴排行{-->
    <div class="model hot-rank">
        <div class="hd">
            <ul class="nav nav-tabs hot-tabs">
                <li class=""><a href="javascript:;">今日</a></li>
                <li class="active"><a href="javascript:;">一周</a></li>
            </ul>
            <h3>热贴排行</h3>
        </div>
        <div class="bd">
            <ul class="tab-pane" style="display: none;">
                <li class="hot-top">
                    <div class="con"><span class="num">1</span><a title="我想穿过大半个世界去睡你……"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31157"
                                                                  target="_blank">我想穿过大半个世界去睡你……</a></div>
                    <div class="info" style="display: none;">
                        <span>回复：<span class="light reply">39</span></span>
                        <span>查看：<span class="light view">42</span></span>
                        <span>被赞：<span class="light">0</span></span>
                        <span class="name"><span class="nm">漠扬</span>发布于  05-19 18:41</span>
                    </div>
                </li>
                <li class="hot-top">
                    <div class="con"><span class="num">2</span><a title="【今日话题】说说你单身的原因"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31124"
                                                                  target="_blank">【今日话题】说说你单身的原因</a></div>
                    <div class="info" style="display: block;">
                        <span>回复：<span class="light reply">37</span></span>
                        <span>查看：<span class="light view">287</span></span>
                        <span>被赞：<span class="light">3</span></span>
                        <span class="name"><span class="nm">小风酱</span>发布于  05-19 10:56</span>
                    </div>
                </li>
                <li class="hot-top">
                    <div class="con"><span class="num">3</span><a title="求大神给p成合照  抠出人物画质清晰 背景漂亮简约  好急！"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31145"
                                                                  target="_blank">求大神给p成合照 抠出人物画质清晰 背景漂亮简约 好急！</a></div>
                    <div class="info" style="display: none;">
                        <span>回复：<span class="light reply">29</span></span>
                        <span>查看：<span class="light view">125</span></span>
                        <span>被赞：<span class="light">2</span></span>
                        <span class="name"><span class="nm">刺青21克</span>发布于  05-19 16:05</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">4</span><a title="当插画师爱上摄影师，多美丽的童话！ "
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31149"
                                                                  target="_blank">当插画师爱上摄影师，多美丽的童话！ </a></div>
                    <div class="info" style="display: none;">
                        <span>回复：<span class="light reply">20</span></span>
                        <span>查看：<span class="light view">64</span></span>
                        <span>被赞：<span class="light">1</span></span>
                        <span class="name"><span class="nm">飞叶</span>发布于  05-19 17:07</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">5</span><a title="摄影作品欣赏（多图）"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31142"
                                                                  target="_blank">摄影作品欣赏（多图）</a></div>
                    <div class="info" style="display: none;">
                        <span>回复：<span class="light reply">19</span></span>
                        <span>查看：<span class="light view">57</span></span>
                        <span>被赞：<span class="light">1</span></span>
                        <span class="name"><span class="nm">qiqi000000</span>发布于  05-19 15:03</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">6</span><a title="【情定520】--缘分天注定，冥冥之中自有安排"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31131"
                                                                  target="_blank">【情定520】--缘分天注定，冥冥之中自有安排</a></div>
                    <div class="info" style="display: none;">
                        <span>回复：<span class="light reply">19</span></span>
                        <span>查看：<span class="light view">62</span></span>
                        <span>被赞：<span class="light">8</span></span>
                        <span class="name"><span class="nm">漠扬</span>发布于  05-19 13:39</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">7</span><a title="【情定520】 -  恶搞之男男才素真爱（非腐慎入）"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31151"
                                                                  target="_blank">【情定520】 - 恶搞之男男才素真爱（非腐慎入）</a></div>
                    <div class="info" style="display: none;">
                        <span>回复：<span class="light reply">16</span></span>
                        <span>查看：<span class="light view">99</span></span>
                        <span>被赞：<span class="light">6</span></span>
                        <span class="name"><span class="nm">小白白布白</span>发布于  05-19 17:23</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">8</span><a title="这是世界上最牛逼最三脚架！你们想过鸡的感受吗？ "
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31156"
                                                                  target="_blank">这是世界上最牛逼最三脚架！你们想过鸡的感受吗？ </a></div>
                    <div class="info" style="display: none;">
                        <span>回复：<span class="light reply">16</span></span>
                        <span>查看：<span class="light view">39</span></span>
                        <span>被赞：<span class="light">1</span></span>
                        <span class="name"><span class="nm">猫咪小姐</span>发布于  05-19 18:27</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">9</span><a title="【情定520】在这个还不能恋爱的年纪，我只能跟憨憨相爱！"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31135"
                                                                  target="_blank">【情定520】在这个还不能恋爱的年纪，我只能跟憨憨相爱！</a></div>
                    <div class="info" style="display: none;">
                        <span>回复：<span class="light reply">16</span></span>
                        <span>查看：<span class="light view">69</span></span>
                        <span>被赞：<span class="light">9</span></span>
                        <span class="name"><span class="nm">飞叶</span>发布于  05-19 14:24</span>
                    </div>
                </li>
            </ul>
            <ul class="tab-pane" style="">
                <li class="hot-top">
                    <div class="con"><span class="num">1</span><a title="让你脑洞大开笑成狗"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=30771"
                                                                  target="_blank">让你脑洞大开笑成狗</a></div>
                    <div class="info" style="display: block;">
                        <span>回复：<span class="light reply">277</span></span>
                        <span>查看：<span class="light view">847</span></span>
                        <span>被赞：<span class="light">6</span></span>
                        <span class="name"><span class="nm">xly</span>发布于  05-14 11:04</span>
                    </div>
                </li>
                <li class="hot-top">
                    <div class="con"><span class="num">2</span><a title="写给邢帅教育全体同事的一封信"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=30709"
                                                                  target="_blank">写给邢帅教育全体同事的一封信</a></div>
                    <div class="info">
                        <span>回复：<span class="light reply">169</span></span>
                        <span>查看：<span class="light view">2982</span></span>
                        <span>被赞：<span class="light">120</span></span>
                        <span class="name"><span class="nm">邢帅</span>发布于  05-13 10:36</span>
                    </div>
                </li>
                <li class="hot-top">
                    <div class="con"><span class="num">3</span><a title="那些别人家的老师"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31030"
                                                                  target="_blank">那些别人家的老师</a></div>
                    <div class="info">
                        <span>回复：<span class="light reply">127</span></span>
                        <span>查看：<span class="light view">238</span></span>
                        <span>被赞：<span class="light">0</span></span>
                        <span class="name"><span class="nm">杉林</span>发布于  05-18 10:58</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">4</span><a title="【情定520】 -谢谢邢帅让我们认识"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31088"
                                                                  target="_blank">【情定520】 -谢谢邢帅让我们认识</a></div>
                    <div class="info">
                        <span>回复：<span class="light reply">124</span></span>
                        <span>查看：<span class="light view">515</span></span>
                        <span>被赞：<span class="light">46</span></span>
                        <span class="name"><span class="nm">青果</span>发布于  05-18 23:08</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">5</span><a title="某个街角 偶遇晴天 收获幸福甜蜜好心情"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31072"
                                                                  target="_blank">某个街角 偶遇晴天 收获幸福甜蜜好心情</a></div>
                    <div class="info">
                        <span>回复：<span class="light reply">122</span></span>
                        <span>查看：<span class="light view">240</span></span>
                        <span>被赞：<span class="light">0</span></span>
                        <span class="name"><span class="nm">维尼小萱</span>发布于  05-18 21:52</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">6</span><a title="第三期【英语科目】发音课 签到贴"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=30965"
                                                                  target="_blank">第三期【英语科目】发音课 签到贴</a></div>
                    <div class="info">
                        <span>回复：<span class="light reply">99</span></span>
                        <span>查看：<span class="light view">735</span></span>
                        <span>被赞：<span class="light">5</span></span>
                        <span class="name"><span class="nm">陈永平</span>发布于  05-16 19:54</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">7</span><a title="【今日话题】假如上帝让你变成女生/男生一天你会做什么？"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=30929"
                                                                  target="_blank">【今日话题】假如上帝让你变成女生/男生一天你会做什么？</a></div>
                    <div class="info">
                        <span>回复：<span class="light reply">93</span></span>
                        <span>查看：<span class="light view">690</span></span>
                        <span>被赞：<span class="light">12</span></span>
                        <span class="name"><span class="nm">国小小</span>发布于  05-16 10:59</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">8</span><a title="千奇百怪的知识"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=31045"
                                                                  target="_blank">千奇百怪的知识</a></div>
                    <div class="info">
                        <span>回复：<span class="light reply">91</span></span>
                        <span>查看：<span class="light view">168</span></span>
                        <span>被赞：<span class="light">0</span></span>
                        <span class="name"><span class="nm">qiqi000000</span>发布于  05-18 15:46</span>
                    </div>
                </li>
                <li>
                    <div class="con"><span class="num">9</span><a title="【真人秀活动】520宠爱节，恩爱show出来！"
                                                                  href="http://bbs.xsteach.com/forum/topic?tid=30938"
                                                                  target="_blank">【真人秀活动】520宠爱节，恩爱show出来！</a></div>
                    <div class="info">
                        <span>回复：<span class="light reply">88</span></span>
                        <span>查看：<span class="light view">1389</span></span>
                        <span>被赞：<span class="light">22</span></span>
                        <span class="name"><span class="nm">xly</span>发布于  05-16 14:45</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script>
        $(function () {
            $('.hot-rank .hot-tabs li').click(function () {
                $('.hot-rank .hot-tabs li').removeClass('active');
                $(this).addClass('active');
                var nth = $(this).index('.hot-rank .hot-tabs li');
                $('.hot-rank .tab-pane').hide().eq(nth).show();
            });
            $('.hot-rank .tab-pane li:nth-child(1) .info').show();
            $('.hot-rank .tab-pane li').mouseenter(function () {
                $(this).closest('.tab-pane').find('.info').hide();
                $(this).find('.info').show();
            });

        });
    </script>
    <!--}热贴排行-->
    <!--社区之星{-->
    <div class="model star">
        <div class="hd">
            <ul class="nav nav-tabs hot-tabs">
                <li class="active"><a href="javascript:;">今日</a></li>
                <li><a href="javascript:;">一周</a></li>
            </ul>
            <h3>社区之星</h3>
        </div>
        <div class="bd">
            <ul class="tab-pane">
                <li class="hot-top">
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4620988"
                                 src="test/images/1acb721829eb675e05255960121d85aa001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="xly"
                                 title="xly">
                            <i class="num num1">1</i>
                            <i title="SVIP" class="icon-crown"></i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">xly</a>
                        </p>

                        <p>今日发贴数：<span class="light">102</span></p>
                    </div>
                </li>
                <li class="hot-top">
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4667278"
                                 src="test/images/176cf14781e402ec780fcd47e2d56099001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="东边太阳照亮我"
                                 title="东边太阳照亮我">
                            <i class="num num2">2</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">东边太阳照亮我</a>
                        </p>

                        <p>今日发贴数：<span class="light">59</span></p>
                    </div>
                </li>
                <li class="hot-top">
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4622981"
                                 src="test/images/2fd72928d127721e02610d7a2a6ad890001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="漠扬" title="漠扬">
                            <i class="num num3">3</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">漠扬</a>
                        </p>

                        <p>今日发贴数：<span class="light">57</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4654399"
                                 src="test/images/62d35c9584ffc6949b3b3d2107b7c03a001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="小风酱"
                                 title="小风酱">
                            <i class="num num4">4</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">小风酱</a>
                        </p>

                        <p>今日发贴数：<span class="light">45</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4716108"
                                 src="test/images/e6ce7d559f3001a9fdf77e13ec63c749001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="猫咪小姐"
                                 title="猫咪小姐">
                            <i class="num num5">5</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">猫咪小姐</a>
                        </p>

                        <p>今日发贴数：<span class="light">43</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="157910"
                                 src="test/images/bc4a3cf9091f0b4da85f8ca948513149001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="国小小"
                                 title="国小小">
                            <i class="num num6">6</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">国小小</a>
                        </p>

                        <p>今日发贴数：<span class="light">39</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4623729"
                                 src="test/images/35f8bbaab5bf40ac338651bbe9f37bdf001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="飞叶" title="飞叶">
                            <i class="num num7">7</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">飞叶</a>
                        </p>

                        <p>今日发贴数：<span class="light">36</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4623741"
                                 src="test/images/c6a3ad13186f1ee53d62bb09ad472fee001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="qiqi000000"
                                 title="qiqi000000">
                            <i class="num num8">8</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">qiqi000000</a>
                        </p>

                        <p>今日发贴数：<span class="light">28</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="139622" src="test/images/user_img.png" alt="风动" title="风动">
                            <i class="num num9">9</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">风动</a>
                        </p>

                        <p>今日发贴数：<span class="light">24</span></p>
                    </div>
                </li>
            </ul>

            <ul class="tab-pane" style="display: none;">
                <li class="hot-top">
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4620988"
                                 src="test/images/1acb721829eb675e05255960121d85aa001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="xly"
                                 title="xly">
                            <i class="num num1">1</i>
                            <i title="SVIP" class="icon-crown"></i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">xly</a>
                        </p>

                        <p>一周发贴数：<span class="light">342</span></p>
                    </div>
                </li>
                <li class="hot-top">
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="157910"
                                 src="test/images/bc4a3cf9091f0b4da85f8ca948513149001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="国小小"
                                 title="国小小">
                            <i class="num num2">2</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">国小小</a>
                        </p>

                        <p>一周发贴数：<span class="light">250</span></p>
                    </div>
                </li>
                <li class="hot-top">
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4654399"
                                 src="test/images/62d35c9584ffc6949b3b3d2107b7c03a001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="小风酱"
                                 title="小风酱">
                            <i class="num num3">3</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">小风酱</a>
                        </p>

                        <p>一周发贴数：<span class="light">243</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4667278"
                                 src="test/images/176cf14781e402ec780fcd47e2d56099001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="东边太阳照亮我"
                                 title="东边太阳照亮我">
                            <i class="num num4">4</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">东边太阳照亮我</a>
                        </p>

                        <p>一周发贴数：<span class="light">230</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4623741"
                                 src="test/images/c6a3ad13186f1ee53d62bb09ad472fee001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="qiqi000000"
                                 title="qiqi000000">
                            <i class="num num5">5</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">qiqi000000</a>
                        </p>

                        <p>一周发贴数：<span class="light">166</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="37412"
                                 src="test/images/3d5ad8efd8f9ae34923886481b38e990001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="维尼小萱"
                                 title="维尼小萱">
                            <i class="num num6">6</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">维尼小萱</a>
                        </p>

                        <p>一周发贴数：<span class="light">153</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="4716108"
                                 src="test/images/e6ce7d559f3001a9fdf77e13ec63c749001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="猫咪小姐"
                                 title="猫咪小姐">
                            <i class="num num7">7</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">猫咪小姐</a>
                        </p>

                        <p>一周发贴数：<span class="light">139</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="70338"
                                 src="test/images/028eeceb6fb3b6e9404d1d212122c66e001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="Percent"
                                 title="Percent">
                            <i class="num num8">8</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">Percent</a>
                        </p>

                        <p>一周发贴数：<span class="light">137</span></p>
                    </div>
                </li>
                <li>
                    <div class="avatar avatar-50">
                        <a href="#" target="_blank">
                            <img class="user-avatar-card-img" uid="6061066"
                                 src="test/images/4d383b7ac8e3db2645707d0483d03eef001.jpg@50w_50h_1c_1l_90Q_1x.jpg" alt="LiTk丶"
                                 title="LiTk丶">
                            <i class="num num9">9</i>
                        </a>
                    </div>
                    <div class="cont">
                        <p class="title">
                            <a href="#" target="_blank">LiTk丶</a>
                        </p>

                        <p>一周发贴数：<span class="light">133</span></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script>
        $(function () {
            $('.star .hot-tabs li').click(function () {
                $('.star .hot-tabs li').removeClass('active');
                $(this).addClass('active');
                var nth = $(this).index('.star .hot-tabs li');
                $('.star .tab-pane').hide().eq(nth).show();
            });
        });
    </script>
    <!--}内容主体-->
    <script>
        $(function () {
            var pg = '0';
            var lastTime = '1432083529';
            var lastId = '30938';
            pg = parseInt(pg);
            var pageCount = '2058';
            pageCount = parseInt(pageCount);
            var jp = '0';
            var loadLoc = '/default/get-page-list';
            var loading_img_src = 'http://img.xsteach.cn/static/images/loading_circle.gif';
            var loadPage = pg + 1;
            var pageLimit = pg + 2;
            var winHt = $(window).height();
            var conDiv = $('.tab-content .posts');
            var pageAjax = null;
            if (parseInt(pg) > 0 || jp == '1') {
                if ($('#forum-thread').length > 0) {
                    $('body,html').stop().animate({ scrollTop:$('#forum-thread').offset().top - 10}, 500);
// 			return false;
                }
            }
            $(window).resize(function () {
                winHt = $(window).height();
            });

// 	if(pg - 3 >= 0) {
// 	 var href = $('.pagination > li.prev a').attr('href').replace(/page=(\d+)/,'page='+(pg -2));
// 	 $('.pagination > li.prev a').attr('data-page',pg - 3).attr('href',href);
// 	} else if(pg - 2 >= 0) {
// 	 var href = $('.pagination > li.prev a').attr('href').replace(/page=(\d+)/,'page='+(pg-1));
// 	 $('.pagination > li.prev a').attr('data-page',pg - 2).attr('href',href);
// 	}


            $(window).scroll(function () {
                if (pageAjax) return false;
                if (loadPage < pageCount && loadPage <= pageLimit && $(".more-loading").length) {
                    var scrTop = $(window).scrollTop();
                    var winHt = $(window).height();
                    var getPos = $(".more-loading").offset().top;
                    var type = $('#forum-thread li.active a').attr('loc');
                    if (scrTop + winHt >= getPos) {
                        $(".more-loading").before("<div class='page-more-loading'><img src='" + loading_img_src + "' />&nbsp;&nbsp;&nbsp;正在加载下一页...</div>");
                        pageAjax = $.get(loadLoc, {'page':loadPage, 'display':type, 'lastPage':pg, 'lastId':lastId, 'lastTime':lastTime}, function (data) {
                            if (data) {
                                conDiv.append(data);
                                //指定图片加载完成添加类loaded
                                $('xs-imgs .x-item').load(function () {
                                    $(this).parent().addClass('loaded');
                                });
                                //社区首页和列表页图片延迟加载
                                $('.xs-imgs .x-item').scrollLoading();
                            }
                            $(".page-more-loading").remove();
                            //$('.pagination > li.active').removeClass('active').addClass('loaded');
                            $('.pagination > li.active').removeClass('active');
                            $('.pagination > li a[data-page=' + loadPage + ']').closest('li').eq(0).addClass('active');

                            loadPage++;
                            if (loadPage < pageCount) {
                                var _href = $('.pagination > li.next a').attr('href').replace(/page=(\d+)/, 'page=' + (loadPage + 1));
                                $('.pagination > li.next a').attr('data-page', loadPage).attr('href', _href);
                            } else {
                                $('.pagination > li.next,.pagination > li.last').addClass('loaded').hide();
                            }
                            pageAjax = null;
                        });
                    }
                }

            });
            $('.pagination > li').click(function () {
                if ($(this).is('.active,.loaded')) {
// 			var data = $(this).find('a').attr('data-page');
// 			var pos = $('.tab-content .page-'+data);
// 			if(pos.length) {
// 				$('body,html').stop().animate({ scrollTop: pos.offset().top-10}, 500);
// 			} else {
// 				$('body,html').stop().animate({ scrollTop: $('#forum-thread').offset().top-10}, 500);
// 			}
                    return false;
                }
            })
        });
    </script>
    <!--}社区之星-->
</div>



<?php if($_G['setting']['forumallowside']) { ?>
<div id="sd" class="sd">
    <?php if(!empty($_G['setting']['pluginhooks']['index_side_top'])) echo $_G['setting']['pluginhooks']['index_side_top'];?>
    <div class="drag">
        <!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
    </div>
    <?php if(!empty($_G['setting']['pluginhooks']['index_side_bottom'])) echo $_G['setting']['pluginhooks']['index_side_bottom'];?>
</div>
<?php } ?>
</div>
<!--友情链接 结束-->

</div>



<?php if($_G['group']['radminid'] == 1) { helper_manyou::checkupdate();?><?php } if(empty($_G['setting']['disfixednv_forumindex']) ) { ?><script>fixed_top_nv();</script><?php } include template('common/footer'); ?>