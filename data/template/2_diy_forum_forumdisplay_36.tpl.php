<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forumdisplay_36');
0
|| checktplrefresh('data/diy/./template/dean_tech_150528//forum/forumdisplay_36.htm', './template/dean_tech_150528/common/pubsearchform.htm', 1477625185, 'diy', './data/template/2_diy_forum_forumdisplay_36.tpl.php', 'data/diy/./template/dean_tech_150528/', 'forum/forumdisplay_36')
|| checktplrefresh('data/diy/./template/dean_tech_150528//forum/forumdisplay_36.htm', './template/default/forum/recommend.htm', 1477625185, 'diy', './data/template/2_diy_forum_forumdisplay_36.tpl.php', 'data/diy/./template/dean_tech_150528/', 'forum/forumdisplay_36')
|| checktplrefresh('data/diy/./template/dean_tech_150528//forum/forumdisplay_36.htm', './template/dean_tech_150528/common/seccheck.htm', 1477625185, 'diy', './data/template/2_diy_forum_forumdisplay_36.tpl.php', 'data/diy/./template/dean_tech_150528/', 'forum/forumdisplay_36')
|| checktplrefresh('data/diy/./template/dean_tech_150528//forum/forumdisplay_36.htm', './template/default/forum/forumdisplay_list.htm', 1477625185, 'diy', './data/template/2_diy_forum_forumdisplay_36.tpl.php', 'data/diy/./template/dean_tech_150528/', 'forum/forumdisplay_36')
|| checktplrefresh('data/diy/./template/dean_tech_150528//forum/forumdisplay_36.htm', './template/default/forum/forumdisplay_sort.htm', 1477625185, 'diy', './data/template/2_diy_forum_forumdisplay_36.tpl.php', 'data/diy/./template/dean_tech_150528/', 'forum/forumdisplay_36')
|| checktplrefresh('data/diy/./template/dean_tech_150528//forum/forumdisplay_36.htm', './template/default/forum/search_sortoption.htm', 1477625185, 'diy', './data/template/2_diy_forum_forumdisplay_36.tpl.php', 'data/diy/./template/dean_tech_150528/', 'forum/forumdisplay_36')
|| checktplrefresh('data/diy/./template/dean_tech_150528//forum/forumdisplay_36.htm', './template/default/forum/search_sortoption.htm', 1477625185, 'diy', './data/template/2_diy_forum_forumdisplay_36.tpl.php', 'data/diy/./template/dean_tech_150528/', 'forum/forumdisplay_36')
;?><?php include template('common/header'); if($_G['forum']['ismoderator']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum_moderate.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } ?>
<style id="diy_style" type="text/css"></style>
<!--[diy=diynavtop]--><div id="diynavtop" class="area"></div><!--[/diy]--><?php echo adshow("text/wp a_t");?><div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div class="boardnav">

<!--<div id="ct" class="wp cl<?php if($_G['forum']['allowside']) { ?> ct2<?php } ?>"<?php if($leftside) { ?> style="margin-left:<?php echo $_G['leftsidewidth_mwidth'];?>px"<?php } ?>>-->

    <div id="ct" class="wp cl<?php if($_G['setting']['forumallowside']) { ?> ct2<?php } ?>" >

        <?php if($_G['fid'] == 45 ) { ?>
            <?php if(empty($gid)) { ?>
            <div id="chart" class="bm bw0 cl" >
                <p class="chart z" style="padding-top: 40px">

                <!--<div class="bright">-->
                    <span>今日新贴：<span class="light"><!--<?php echo $_G['forum']['todayposts'];?>-->1
                    </span></span><span class="pipe">|</span><span compare="<?php echo $postdata['0'];?>">昨日发贴：<span class="light"><!--<?php echo $_G['forum']['yesterdayposts'];?>-->3
                    </span></span><span class="pipe">|</span><span>贴子总数：<span class="light">7245
                    </span></span><span class="pipe">|</span>
                    <span>欢迎新成员：<span> iblisk</span></span>
                <!--</div>-->

                    <!--今日新帖 :-->
                    <!--<em><?php echo $todayposts;?></em>-->
                    <!--<span class="pipe">|</span>-->
                    <!--昨日发帖 :-->
                    <!--<em><?php echo $postdata['0'];?></em><span class="pipe">|</span>-->

                    <!--帖子总数 : <em><?php echo $posts;?></em><span class="pipe">|</span>-->
                    <!--欢迎新成员 : <em><?php echo $_G['cache']['userstats']['totalmembers'];?></em>-->

                    <?php if($_G['cache']['userstats']['newsetuser']) { ?>
                    <span class="pipe">|</span>欢迎新会员: <em><a href="home.php?mod=space&amp;username=<?php echo rawurlencode($_G['cache']['userstats']['newsetuser']); ?>" target="_blank" class="xi2"><?php echo $_G['cache']['userstats']['newsetuser'];?></a></em><?php } ?>
                    <!--<a href="http://www.gmatonline.cn"><input type="button" value="进入雷哥GMAT在线题库" style="color:#6b6b6b;padding:2px 10px;border: none;margin-left: 30px;"/></a>-->
                </p>
                <!--<div class="y">-->

                <!--&lt;!&ndash;<?php if($_G['uid']) { ?>&ndash;&gt;<a href="forum.php?mod=guide&amp;view=my" title="我的帖子" class="xi2">我的帖子</a>-->
                <!--&lt;!&ndash;<?php } ?>&ndash;&gt;&lt;!&ndash;<?php if(!empty($_G['setting']['search']['forum']['status'])) { ?>&ndash;&gt;&lt;!&ndash;<?php if($_G['uid']) { ?>&ndash;&gt;<span class="pipe">|</span>&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                <!--&lt;!&ndash;<a href="forum.php?mod=guide&amp;view=new" title="最新回复" class="xi2">最新回复</a>&ndash;&gt;-->
                <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                <!--</div>-->
                <div class="z" style="margin-top: 30px;float: right">
                    <?php if($_G['setting']['search']) { $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
$slist[forumfid] = <<<EOF
<li><a href="javascript:;" rel="curforum" fid="{$_G['fid']}" >本版</a></li>
EOF;
?><?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<li><a href="javascript:;" rel="article">文章</a></li>
EOF;
?><?php } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
EOF;
?><?php } if(helper_access::check_module('blog') && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<li><a href="javascript:;" rel="blog">日志</a></li>
EOF;
?><?php } if(helper_access::check_module('album') && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<li><a href="javascript:;" rel="album">相册</a></li>
EOF;
?><?php } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<li><a href="javascript:;" rel="group">{$_G['setting']['navs']['3']['navname']}</a></li>
EOF;
?><?php } ?><?php
$slist[user] = <<<EOF
<li><a href="javascript:;" rel="user">用户</a></li>
EOF;
?>
<?php } if($_G['setting']['search'] && $slist) { ?>
<div id="scbar" class="<?php if($_G['setting']['srchhotkeywords'] && count($_G['setting']['srchhotkeywords']) > 5) { ?>scbar_narrow <?php } ?>cl">
<form id="scbar_form_a" method="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?><?php echo $searchparams['url'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="search" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
<?php if(!empty($searchparams['params'])) { if(is_array($searchparams['params'])) foreach($searchparams['params'] as $key => $value) { $srchotquery .= '&' . $key . '=' . rawurlencode($value);?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } ?>
<input type="hidden" name="source" value="discuz" />
<input type="hidden" name="fId" id="srchFId" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="q" id="cloudsearchquery" value="" />

<style>
#scbar { overflow: visible; position: relative; }
#sg{ background: #FFF; width:456px; border: 1px solid #B2C7DA; }
.scbar_narrow #sg { width: 316px; }
#sg li { padding:0 8px; line-height:30px; font-size:14px; }
#sg li span { color:#999; }
.sml { background:#FFF; cursor:default; }
.smo { background:#E5EDF2; cursor:default; }
            </style>
            <div style="display: none; position: absolute; top:37px; left:44px;" id="sg">
                <div id="st_box" cellpadding="2" cellspacing="0"></div>
            </div>
<?php } ?>
<table cellspacing="0" cellpadding="0">
<tr>
                <td>
                    <div class="search_xiala">
                        <div onclick="xialFun()">
                            <span class="changeC">帖子</span><span>▼</span>
                        </div>
                        <ul class="tieziUl">
                            <li>帖子</li>
                            <li>题库</li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        document.getElementById("scbar_form").action="search.php?mod=forum";
                        function xialFun(){
                            var ul=document.getElementsByClassName("tieziUl")[0];
                            ul.style.display="block";
                            var lis=ul.getElementsByTagName("li");
                            for(var i=0;i<lis.length;i++){
                                lis[i].onclick=function() {
                                    document.getElementsByClassName("changeC")[0].innerHTML = this.innerHTML;
                                    ul.style.display = "none";
                                }
                            }
                        }
                    </script>
                </td>
<td>
                    <input type="text" name="srchtxt" id="scbar_txt" placeholder="请输入搜索内容" autocomplete="off" x-webkit-speech speech onkeypress="javascript:return gosearch();"/>
                </td>
<td><button type="button" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc" value="true" onclick="tiaozhuan()"></button></td>
</tr>
</table>

</form>

</div>
<ul id="scbar_type_menu" class="p_pop" style="display: none;"><?php echo implode('', $slist);; ?></ul>
<script type="text/javascript">
initSearchmenu('scbar', '<?php echo $searchparams['url'];?>');
</script>
<?php } ?>                </div>
            </div>

            <?php } ?>
            <?php } else { ?>
            <div id="breadcrumb" style="margin-top: 40px">
                <a href="forum.php"><?php echo $_G['setting']['navs']['2']['navname'];?></a>
                <span><?php echo $navigation;?></span>
            </div>
        <?php } ?>
    <!--[diy=diy_chart]--><div id="diy_chart" class="area"></div><!--[/diy]-->
    <div class="main">
        <?php if($_G['fid'] == 45 ) { ?>
        <!--幻灯片{-->
        <div class="slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="5" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="6" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="7" class=""></li>

                </ol>
                <!-- Wrapper for slides test -->
                <div class="carousel-inner" role="listbox">

<div class="item active">
<a href="#" title="微信讲座"><img
src="template/dean_tech_150528/images/luntan_lunbo003.jpg" title="微信讲座" alt=" 微信讲座"></a>
</div>

<div class="item">
<a href="#" title=""><img
src="template/dean_tech_150528/images/luntan_lunbo03.png" title="" alt=" "></a>
</div>
<div class="item">
<a href="http://www.toeflonline.cn/toeflcourses.html" title=""><img
src="template/dean_tech_150528/images/luntan_lunbo04.png" title="" alt=" "></a>
</div>
<div class="item">
<a href="www.toeflonline.cn" title=""><img
src="template/dean_tech_150528/images/luntan_lunbo05.png" title="" alt=" "></a>
</div>
<div class="item">
<a href="#" title=""><img
src="template/dean_tech_150528/images/luntan_lunbo006.png" title="" alt=" "></a>
</div>

<div class="item">
                        <a href="http://www.gmatonline.cn/gmatcourses/292.html" title="雷哥陪练"><img
                                src="template/dean_tech_150528/images/luntan_lunboA6.jpg" title="雷哥陪练" alt=" 雷哥陪练"></a>
                    </div>
<div class="item">
                        <a href="http://www.liuxueonline.cn/public-class/442.html" title="公开课"><img
                                src="template/dean_tech_150528/images/luntan_lunbo07.png" title="公开课" alt=" 公开课"></a>
                    </div>
<div class="item">
                        <a href="http://www.gmatonline.cn/gmatcourses/405.html" title="雷哥网学习平台"><img
                                src="template/dean_tech_150528/images/luntan_lunbo08.png" title="雷哥网学习平台" alt=" 雷哥网学习平台"></a>
                    </div>



                </div>

                <!-- Controls -->
                <!--<a class="left carousel-control" href="#" role="button" data-slide="prev">-->
                    <!--<span class="glyphicon glyphicon-chevron-left"></span>-->
                    <!--<span class="sr-only">Previous</span>-->
                <!--</a>-->
                <!--<a class="right carousel-control" href="#" role="button" data-slide="next">-->
                    <!--<span class="glyphicon glyphicon-chevron-right"></span>-->
                    <!--<span class="sr-only">Next</span>-->
                <!--</a>-->
            </div>
        </div>
        <!--}幻灯片-->
        <?php } else { ?>
        <div class="posts group-top">
            <div class="avatar avatar-70">
                <img src="<?php echo $_G['forum']['banner'];?>" alt="<?php echo $_G['forum']['name'];?>" />
            </div>
            <div class="cont">
                <div class="thread">
                    <h3 class="title" title="<?php echo $_G['forum']['name'];?>" style="border: none"><?php echo $_G['forum']['name'];?></h3>
                </div>
                <div class="thread">
                    <div class="fans_numbox">
                        <span>今日新贴：<span class="light">
<?php if($_G['forum']['todayposts'] == 0) { ?>
2
<?php } else { ?>
<?php echo $_G['forum']['todayposts'];?>
 <?php } ?>
</span></span>|
                        <span>贴子总数：<span class="light">

<?php if($_G['fid'] == 2 ) { ?>
637
<?php } elseif($_G['fid'] == 36 ) { ?>
37
<?php } elseif($_G['fid'] == 37 ) { ?>
769
<?php } elseif($_G['fid'] == 38 ) { ?>
239
<?php } elseif($_G['fid'] == 39 ) { ?>
2067
<?php } elseif($_G['fid'] == 257 ) { ?>
570
<?php } elseif($_G['fid'] == 41 ) { ?>
325
<?php } elseif($_G['fid'] == 42 ) { ?>
743
<?php } else { ?>
<?php echo $_G['forum']['posts'];?>
<?php } ?>

</span></span>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <!--社区推荐{-->
        <div style="clear: both"></div>
        <!--}社区推荐-->

        <div class="mn" style="border: none !important;">
<?php if($_G['forum']['banner'] && !$subforumonly) { ?>
                <!--<img src="<?php echo $_G['forum']['banner'];?>" alt="<?php echo $_G['forum']['name'];?>" />-->
                <?php } ?>

            <!-- 旧版主-->
            <?php if((!empty($_G['forum']['domain']) && !empty($_G['setting']['domain']['root']['forum'])) || $moderatedby || ($_G['page'] == 1 && $_G['forum']['rules'])) { ?>
                    <!--<div class="bm_c cl pbn">-->
<!--&lt;!&ndash;<?php if(!empty($_G['forum']['domain']) && !empty($_G['setting']['domain']['root']['forum'])) { ?>&ndash;&gt;-->
<!--<div class="pbn">本版域名1111111111:-->
                                <!--<a href="http://<?php echo $_G['forum']['domain'];?>.<?php echo $_G['setting']['domain']['root']['forum'];?>" id="group_link">-->
                                    <!--http://<?php echo $_G['forum']['domain'];?>.<?php echo $_G['setting']['domain']['root']['forum'];?>-->
                                <!--</a>-->
                            <!--</div>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if($moderatedby) { ?>&ndash;&gt;<div>版主: <span class="xi2"><?php echo $moderatedby;?></span></div>&lt;!&ndash;<?php } ?>&ndash;&gt;-->

<!--&lt;!&ndash;<?php if($_G['page'] == 1 && $_G['forum']['rules']) { ?>&ndash;&gt;-->
<!--<div id="forum_rules_<?php echo $_G['fid'];?>" style="<?php echo $collapse['forum_rules'];?>;">-->
<!--<div class="ptn xg2"><?php echo $_G['forum']['rules'];?></div>-->
<!--</div>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--</div>-->
<?php } if(!empty($forumarchive)) { ?>
<div id="forumarchive_menu" class="p_pop" style="display:none">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>">全部主题</a></li><?php if(is_array($forumarchive)) foreach($forumarchive as $id => $info) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;archiveid=<?php echo $id;?>"><?php echo $info['displayname'];?> (<?php echo $info['threads'];?>)</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>

<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_top'])) echo $_G['setting']['pluginhooks']['forumdisplay_top'];?>
<?php if($subexists && $_G['page'] == 1) { include template('forum/forumdisplay_subforum'); } ?>
<div class="drag">
<!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
</div>


<?php if(!empty($_G['forum']['recommendlist'])) { ?>
<div class="bm bmw">
<div class="bm_h cl">
<h2>推荐主题</h2>
</div>
<div class="bm_c cl"><?php if($_G['forum']['recommendlist']['images'] && $_G['forum']['modrecommend']['imagenum']) { ?>
<div class="cl" style="width: <?php echo $_G['forum']['modrecommend']['imagewidth'];?>px; margin: 0 auto; float:left;">
<script type="text/javascript">
var slideSpeed = 5000;
var slideImgsize = [<?php echo $_G['forum']['modrecommend']['imagewidth'];?>,<?php echo $_G['forum']['modrecommend']['imageheight'];?>];
var slideBorderColor = '<?php echo $_G['style']['specialborder'];?>';
var slideBgColor = '<?php echo $_G['style']['commonbg'];?>';
var slideImgs = new Array();
var slideImgLinks = new Array();
var slideImgTexts = new Array();
var slideSwitchColor = '<?php echo $_G['style']['tabletext'];?>';
var slideSwitchbgColor = '<?php echo $_G['style']['commonbg'];?>';
var slideSwitchHiColor = '<?php echo $_G['style']['specialborder'];?>';<?php if(is_array($_G['forum']['recommendlist']['images'])) foreach($_G['forum']['recommendlist']['images'] as $k => $imginfo) { ?>slideImgs[<?php echo $k+1; ?>] = '<?php echo $imginfo['filename'];?>';
slideImgLinks[<?php echo $k+1; ?>] = 'forum.php?mod=viewthread&tid=<?php echo $imginfo['tid'];?>';
slideImgTexts[<?php echo $k+1; ?>] = '<?php echo $imginfo['subject'];?>';
<?php } ?>
</script>
<script src="<?php echo $_G['setting']['jspath'];?>forum_slide.js?<?php echo VERHASH;?>" type="text/javascript"></script>
</div>
<?php } ?>
<div class="cl"<?php if($_G['forum']['recommendlist']['images'] && $_G['forum']['modrecommend']['imagenum']) { ?> style="margin-left: <?php echo $_G['forum']['modrecommend']['imagewidth'];?>px; padding-left: 20px;"<?php } ?>><?php unset($_G['forum']['recommendlist']['images']);?><ul class="xl<?php if(!$_G['forum']['allowside']) { ?> xl2<?php } ?> cl"><?php if(is_array($_G['forum']['recommendlist'])) foreach($_G['forum']['recommendlist'] as $rtid => $recommend) { ?><li>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $rtid;?>" <?php echo $recommend['subjectstyles'];?> target="_blank"><?php echo $recommend['subject'];?></a>
</li>
<?php } ?>
</ul>
</div></div>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_middle'])) echo $_G['setting']['pluginhooks']['forumdisplay_middle'];?>
<?php if(!$subforumonly) { if($recommendgroups && !$_G['forum']['allowside']) { ?>
<div class="bm bmw fl<?php if($_G['forum']['forumcolumns']) { ?> flg<?php } ?>">
<div class="bm_h cl">
<span class="o"><img id="recommendgroups_<?php echo $_G['forum']['fid'];?>_img" src="<?php echo IMGDIR;?>/<?php echo $collapseimg['recommendgroups'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('recommendgroups_<?php echo $_G['forum']['fid'];?>');" /></span>
<h2>推荐<?php echo $_G['setting']['navs']['3']['navname'];?></h2>
</div>
<div class="bm_c" id="recommendgroups_<?php echo $_G['forum']['fid'];?>" style="<?php echo $collapse['recommendgroups'];?>">
<table cellspacing="0" cellpadding="0" class="fl_tb"><?php if(is_array($recommendgroups)) foreach($recommendgroups as $key => $group) { if($_G['forum']['forumcolumns']) { if($key && ($key % $_G['forum']['forumcolumns'] == 0)) { ?>
</tr>
<?php if($key < $_G['forum']['forumcolumns']) { ?>
<tr class="fl_row">
<?php } } ?>
<td class="fl_g">
<div class="fl_icn_g">
<a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" title="<?php echo $group['name'];?>" target="_blank"><img src="<?php echo $group['icon'];?>" alt="<?php echo $group['name'];?>" width="32" /></a>
</div>
<dl>
<dt><a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" target="_blank"><?php echo $group['name'];?></a><span class="xg1 xw0"> (<?php echo $group['membernum'];?> 人)</span>
<dd><em>主题: <?php echo $group['threads'];?></em></dd>
<dd>
<?php if(is_array($group['lastpost'])) { if($_G['forum']['forumcolumns'] < 3) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $group['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($group['lastpost']['subject'], 30); ?></a> <cite><?php echo $group['lastpost']['dateline'];?> <?php if($group['lastpost']['author']) { ?><a href="home.php?mod=space&amp;username=<?php echo $group['lastpost']['encode_author'];?>"><?php echo $group['lastpost']['author'];?></a><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<?php } else { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $group['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo $group['lastpost']['dateline'];?></a>
<?php } ?>				<?php } else { ?>
从未
<?php } ?>
</dd>
</dl>
</td>
<?php } else { ?>
<tr <?php if($key != 0) { ?>class="fl_row"<?php } ?>>
<td class="fl_icn">
<a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" title="<?php echo $group['name'];?>" target="_blank"><img src="<?php echo $group['icon'];?>" alt="<?php echo $group['name'];?>" width="32" /></a>
</td>
<td>
<h2><a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" target="_blank"><?php echo $group['name'];?></a><span class="xg1 xw0"> (<?php echo $group['membernum'];?> 人)</span></h2>
<p><?php echo cutstr($group['description'], 100); ?></p>
</td>
<td class="fl_i">
<span class="xi2"><?php echo $group['threads'];?> 主题</span>
</td>
<td class="fl_by">
<div>
<?php if(is_array($group['lastpost'])) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $group['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($group['lastpost']['subject'], 30); ?></a> <cite><?php echo $group['lastpost']['dateline'];?> <?php if($group['lastpost']['author']) { ?><a href="home.php?mod=space&amp;username=<?php echo $group['lastpost']['encode_author'];?>"><?php echo $group['lastpost']['author'];?></a><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<?php } else { ?>
从未
<?php } ?>
</div>
</td>
</tr>
<?php } } ?>
</table>
</div>
</div>
<?php } if($threadmodcount) { ?><div class="bm"><div class="ntc_l hm xi2"><strong><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me&amp;type=thread&amp;from=&amp;filter=aduit">您有 <?php echo $threadmodcount;?> 个主题正等待审核中，点击查看</a></strong></div></div><?php } if($livethread) { ?>
<div id="livethread" class="tl bm bmw cl" style="padding:10px 15px;">
<div class="livethreadtitle vm">
<span class="replynumber xg1">回复 <span id="livereplies" class="xi1"><?php echo $livethread['replies'];?></span></span>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $livethread['tid'];?>" target="_blank"><?php echo $livethread['subject'];?></a> <img src="<?php echo IMGDIR;?>/livethreadtitle.png" />
</div>
<div class="livethreadcon"><?php echo $livemessage;?></div>
<div id="livereplycontentout">
<div id="livereplycontent">
</div>
</div>
<div id="liverefresh">有新的发言了，点击刷新</div>
<div id="livefastreply">
<form id="livereplypostform" method="post" action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $livethread['tid'];?>&amp;replysubmit=yes&amp;infloat=yes&amp;handlekey=livereplypost&amp;inajax=1" onsubmit="return livereplypostvalidate(this)">
<div id="livefastcomment">
<textarea id="livereplymessage" name="message" style="color:gray;<?php if(!$liveallowpostreply) { ?>display:none;<?php } ?>">#在这里快速回复#</textarea>
<?php if(!$liveallowpostreply) { ?>
<div>
<?php if(!$_G['uid']) { ?>
您需要登录后才可以回帖 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)" class="xi2">登录</a> | <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2"><?php echo $_G['setting']['reglinkname'];?></a>
<?php } else { ?>
您现在无权发帖。<a href="javascript:;" onclick="ajaxpost('livereplypostform', 'livereplypostreturn', 'livereplypostreturn', 'onerror', $('livereplysubmit'));" class="xi2">点击查看原因</a>
<?php } ?>
</div>
<?php } ?>
</div>
<div id="livepostsubmit" style="display:none;">
<?php if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(this.id)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="mtm sec" style="text-align:right;"><?php $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
$sectpl = str_replace("'", "\'", $sectpl);?><?php if($secqaacheck) { ?>
<span id="secqaa_q<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updatesecqaa('q<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } if($seccodecheck) { ?>
<span id="seccode_c<?php echo $sechash;?>" style="margin-top: 15px!important;"></span>
<script type="text/javascript" reload="1">updateseccode('c<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } ?></div>
<?php } ?>
<p class="ptm pnpost" style="margin-bottom:10px;">
<button type="submit" name="replysubmit" class="pn pnc vm" style="float:right;" value="replysubmit" id="livereplysubmit">
<strong>发表</strong>
</button>
</p>
</div>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="subject" value="  ">
</form>
</div>
<span id="livereplypostreturn"></span>
</div>
<script type="text/javascript">
var postminchars = parseInt('<?php echo $_G['setting']['minpostsize'];?>');
var postmaxchars = parseInt('<?php echo $_G['setting']['maxpostsize'];?>');
var disablepostctrl = parseInt('<?php echo $_G['group']['disablepostctrl'];?>');
var replycontentlist = new Array();
var addreplylist = new Array();
var timeoutid = timeid = movescrollid = waitescrollid = null;
var replycontentnum = 0;
getnewlivepostlist(1);
timeid = setInterval(getnewlivepostlist, 5000);
$('livereplycontent').style.position = 'absolute';
$('livereplycontent').style.width = ($('livereplycontentout').clientWidth - 50) + 'px';
$('livereplymessage').onfocus = function() {
if(this.style.color == 'gray') {
this.value = '';
this.style.color = 'black';
$('livepostsubmit').style.display = 'block';
this.style.height = '56px';
$('livefastcomment').style.height = '57px';
}
};
$('livereplymessage').onblur = function() {
if(this.value == '') {
this.style.color = 'gray';
this.value = '#在这里快速回复#';
}
};

$('liverefresh').onclick = function() {
$('livereplycontent').style.position = 'absolute';
getnewlivepostlist();
this.style.display = 'none';
};

$('livereplycontentout').onmouseover = function(e) {

if($('livereplycontent').style.position == 'absolute' && $('livereplycontent').clientHeight > 215) {
$('livereplycontent').style.position = 'static';
this.scrollTop = this.scrollHeight;
}

if(this.scrollTop + this.clientHeight != this.scrollHeight) {
clearInterval(timeid);
clearTimeout(timeoutid);
clearInterval(movescrollid);
timeid = timeoutid = movescrollid = null;

if(waitescrollid == null) {
waitescrollid = setTimeout(function() {
$('liverefresh').style.display = 'block';
}, 60000 * 10);
}
} else {
clearTimeout(waitescrollid);
waitescrollid = null;
}
};

$('livereplycontentout').onmouseout = function(e) {
if(this.scrollTop + this.clientHeight == this.scrollHeight) {
$('livereplycontent').style.position = 'absolute';
clearInterval(timeid);
timeid = setInterval(getnewlivepostlist, 10000);
}
};

function getnewlivepostlist(first) {
var x = new Ajax('JSON');
x.getJSON('forum.php?mod=misc&action=livelastpost&fid=<?php echo $livethread['fid'];?>', function(s, x) {
var count = s.data.count;
$('livereplies').innerHTML = count;
var newpostlist = s.data.list;
for(i in newpostlist) {
var postid = i;
var postcontent = '';
postcontent += newpostlist[i].authorid ? '<dt><a href="home.php?mod=space&amp;uid=' + newpostlist[i].authorid + '" target="_blank">' + newpostlist[i].avatar + '</a></dt>' : '<dt></dt>';
postcontent += newpostlist[i].authorid ? '<dd><a href="home.php?mod=space&amp;uid=' + newpostlist[i].authorid + '" target="_blank">' + newpostlist[i].author + '</a></dd>' : '<dd>' + newpostlist[i].author + '</dd>';
postcontent += '<dd>' + htmlspecialchars(newpostlist[i].message) + '</dd>';
postcontent += '<dd class="dateline">' + newpostlist[i].dateline + '</dd>';
if(replycontentlist[postid]) {
$('livereply_' + postid).innerHTML = postcontent;
continue;
}
addreplylist[postid] = '<dl id="livereply_' + postid + '">' + postcontent + '</dl>';
}
if(first) {
for(i in addreplylist) {
replycontentlist[i] = addreplylist[i];
replycontentnum++;
var div = document.createElement('div');
div.innerHTML = addreplylist[i];
$('livereplycontent').appendChild(div);
delete addreplylist[i];
}
} else {
livecontentfacemove();
}
});
}

function livecontentfacemove() {
//note 从队列中取出数据
var reply = '';
for(i in addreplylist) {
reply = replycontentlist[i] = addreplylist[i];
replycontentnum++;
delete addreplylist[i];
break;
}
if(reply) {
var div = document.createElement('div');
div.innerHTML = reply;
var oldclientHeight = $('livereplycontent').clientHeight;
$('livereplycontent').appendChild(div);
$('livereplycontentout').style.overflowY = 'hidden';
$('livereplycontent').style.bottom = oldclientHeight - $('livereplycontent').clientHeight + 'px';

if(replycontentnum > 20) {
$('livereplycontent').removeChild($('livereplycontent').firstChild);
for(i in replycontentlist) {
delete replycontentlist[i];
break;
}
replycontentnum--;
}

if(!movescrollid) {
movescrollid = setInterval(function() {
if(parseInt($('livereplycontent').style.bottom) < 0) {
$('livereplycontent').style.bottom =
((parseInt($('livereplycontent').style.bottom) + 5) > 0 ? 0 : (parseInt($('livereplycontent').style.bottom) + 5)) + 'px';
} else {
$('livereplycontentout').style.overflowY = 'auto';
clearInterval(movescrollid);
movescrollid = null;
timeoutid = setTimeout(livecontentfacemove, 1000);
}
}, 100);
}
}
}

function livereplypostvalidate(theform) {
var s;
if(theform.message.value == '' || $('livereplymessage').style.color == 'gray') {
s = '抱歉，您尚未输入内容';
}
if(!disablepostctrl && ((postminchars != 0 && mb_strlen(theform.message.value) < postminchars) || (postmaxchars != 0 && mb_strlen(theform.message.value) > postmaxchars))) {
s = '您的帖子长度不符合要求。\n\n当前长度: ' + mb_strlen(theform.message.value) + ' 字节\n系统限制: ' + postminchars + ' 到 ' + postmaxchars + ' 字节';
}
if(s) {
showError(s);
doane();
$('livereplysubmit').disabled = false;
return false;
}
$('livereplysubmit').disabled = true;
theform.message.value = theform.message.value.replace(/([^>=\]"'\/]|^)((((https?|ftp):\/\/)|www\.)([\w\-]+\.)*[\w\-\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!]*)+\.(jpg|gif|png|bmp))/ig, '$1[img]$2[/img]');
theform.message.value = parseurl(theform.message.value);
ajaxpost('livereplypostform', 'livereplypostreturn', 'livereplypostreturn', 'onerror', $('livereplysubmit'));
return false;
}

function succeedhandle_livereplypost(url, msg, param) {
$('livereplymessage').value = '';
$('livereplycontent').style.position = 'absolute';
if(param['sechash']) {
updatesecqaa(param['sechash']);
updateseccode(param['sechash']);
}
getnewlivepostlist();
}
</script>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_threadtype_extra'])) echo $_G['setting']['pluginhooks']['forumdisplay_threadtype_extra'];?>
            <!--论坛帖子列表-start-->
<?php if(empty($_G['forum']['sortmode'])) { ?>
<div id="threadlist" class="tl bm bmw" style="border: none !important;"
     <?php if($_G['uid']) { ?> style="position: relative;"<?php } ?>>

<?php if($quicksearchlist && !$_GET['archiveid']) { ?><script type="text/javascript">
var forum_optionlist = <?php if($forum_optionlist) { ?>'<?php echo $forum_optionlist;?>'<?php } else { ?>''<?php } ?>;
</script>
<script src="<?php echo $_G['setting']['jspath'];?>threadsort.js?<?php echo VERHASH;?>" type="text/javascript"></script><?php if(is_array($quicksearchlist)) foreach($quicksearchlist as $optionid => $option) { $formsearch = '';?>        <?php if(getstatus($option['search'], 1)) { ?>
        <?php
$__VERHASH = VERHASH;$formsearch = <<<EOF

            <div style="
EOF;
 if($option['type'] == 'checkbox') { 
$formsearch .= <<<EOF
clear:left;padding-bottom: 5px;
EOF;
 } else { 
$formsearch .= <<<EOF
float: left;width: 48%;height: 30px; overflow: hidden;
EOF;
 } 
$formsearch .= <<<EOF
">
                <span style="padding-right: 1em;">{$option['title']}:</span>
                
EOF;
 if(in_array($option['type'], array('radio', 'checkbox', 'select', 'range'))) { 
$formsearch .= <<<EOF

                    <span id="select_{$option['identifier']}">
                    
EOF;
 if($option['type'] == 'select') { 
$formsearch .= <<<EOF

                        
EOF;
 if($_GET['searchoption'][$optionid]['value']) { 
$formsearch .= <<<EOF

                            <script type="text/javascript">
                                changeselectthreadsort('{$_GET['searchoption'][$optionid]['value']}', {$optionid}, 'search');
                            </script>
                        
EOF;
 } else { 
$formsearch .= <<<EOF

                            <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}" onchange="changeselectthreadsort(this.value, '{$optionid}', 'search');" class="ps vm">
                                <option value="0">请选择</option>
                            
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                                
EOF;
 if(!$value['foptionid']) { 
$formsearch .= <<<EOF

                                <option value="{$id}">{$value['content']} 
EOF;
 if($value['level'] != 1) { 
$formsearch .= <<<EOF
&raquo;
EOF;
 } 
$formsearch .= <<<EOF
</option>
                                
EOF;
 } 
$formsearch .= <<<EOF

                            
EOF;
 } 
$formsearch .= <<<EOF

                            </select>
<input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                        
EOF;
 } 
$formsearch .= <<<EOF

                    
EOF;
 } elseif($option['type'] != 'checkbox') { 
$formsearch .= <<<EOF

                        <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}" class="ps vm">
                            <option value="0">请选择</option>
                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <option value="{$id}" 
EOF;
 if($_GET['searchoption'][$optionid]['value'] == $id) { 
$formsearch .= <<<EOF
selected="selected"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</option>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        </select>
                        <input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <label><input type="checkbox" class="pc" name="searchoption[{$optionid}][value][{$id}]" value="{$id}" 
EOF;
 if(is_array($_GET['searchoption'][$optionid]) && $_GET['searchoption'][$optionid]['value'][$id]) { 
$formsearch .= <<<EOF
checked="checked"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</label>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        <input type="hidden" name="searchoption[{$optionid}][type]" value="checkbox">
                    
EOF;
 } 
$formsearch .= <<<EOF

                    </span>
                
EOF;
 } else { 
$formsearch .= <<<EOF

                    
EOF;
 if($option['type'] == 'calendar') { 
$formsearch .= <<<EOF

                        <script src="{$_G['setting']['jspath']}calendar.js?{$__VERHASH}" type="text/javascript"></script>
                        <input type="text" name="searchoption[{$optionid}][value]" size="15" class="px vm" value="
EOF;
 if(is_array($_GET['searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_GET['searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" onclick="showcalendar(event, this, false)" />
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        <input type="text" name="searchoption[{$optionid}][value]" size="15" class="px vm" value="
EOF;
 if(is_array($_GET['searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_GET['searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" />
                    
EOF;
 } 
$formsearch .= <<<EOF

                
EOF;
 } 
$formsearch .= <<<EOF

            </div>
            
EOF;
?>
<?php } ?>
    <?php $formsearch_html .= $formsearch;?><?php $fontsearch = '';$showoption = array();$tmpcount = 0;?><?php if(getstatus($option['search'], 2)) { ?>
    <?php
$fontsearch = <<<EOF

<tr>
<th width="8%">{$option['title']}:</th>
            <td>
                <ul class="cl">
                    <li
EOF;
 if($_GET[''.$option['identifier']] == 'all') { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1{$filterurladd}&amp;{$option['identifier']}=all{$sorturladdarray[$option['identifier']]}" class="xi2">不限</a></li>

EOF;
 if($option['type'] == 'select') { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if($value['foptionid'] == 0) { 
$fontsearch .= <<<EOF

<li
EOF;
 if(preg_match('/^'.$value['optionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['optionid'].'$/i', $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value['content']}</a></li>

EOF;
 } } if(!($_GET[''.$option['identifier']] == 'all' || !isset($_GET[''.$option['identifier']]))) { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if((preg_match('/^'.$value['foptionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['foptionid'].'$/i', $_GET[''.$option['identifier']])) && ($showoption[$value['count']][$id] = $value)) { } } if(ksort($showoption)) { } if(is_array($showoption)) foreach($showoption as $optioncount => $values) { if($tmpcount != $optioncount && ($tmpcount = $optioncount)) { 
$fontsearch .= <<<EOF

</ul><ul class="subtsm cl">
EOF;
 if(is_array($values)) foreach($values as $id => $value) { 
$fontsearch .= <<<EOF
<li
EOF;
 if(preg_match('/^'.$value['optionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['optionid'].'$/i', $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value['content']}</a></li>

EOF;
 } 
$fontsearch .= <<<EOF

</ul><ul>

EOF;
 } } } } else { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$fontsearch .= <<<EOF
<li
EOF;
 if($_GET[''.$option['identifier']] && !strcmp($id, $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value}</a></li>

EOF;
 } } 
$fontsearch .= <<<EOF

                </ul>
            </td>
</tr>

EOF;
?>
     <?php } ?>
     <?php $fontsearch_html .= $fontsearch;?><?php } if($formsearch_html || $fontsearch_html) { ?>
<div>
<?php if($fontsearch_html) { ?>
    <div class="ptn pbn mbm bbs">
    <table id="fontsearch" class="tsm cl">
         <?php echo $fontsearch_html;?>
    </table>
    </div>
<?php } if($formsearch_html) { ?>
    <form method="post" autocomplete="off" name="searhsort" id="searhsort" class="bbs bm_c pns mfm cl" action="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_GET['sortid'];?>">
        <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
        <?php echo $formsearch_html;?>
        <div class="ptm cl"><button type="submit" class="pn pnc" name="searchsortsubmit"><em>搜索</em></button></div>
    </form>
<?php } ?>
</div>
<?php } } ?>

<div >
        <style>
            .xw2{
                color: #009aff!important;
            }
            .ac12{border-bottom: 3px solid #009aff!important;}
            .ddf li{
                position: relative;
                top: 2px!important;
            }
            .ddf li a{
                background: none!important;
                font-size: 18px ;
                padding:0 15px;
                border: none!important;
            }
            .ddf ul li a:hover{
                text-decoration: none;
            }

            .fenl_1 ul{
                border: none;
                font-size: 18px;
                margin: 0 -8px -6px;
            }
            .fenl_1 ul li a{
                border: none;
                display: block;
                border-width: 0 0 3px 0;
                color: #424451;
                line-height: normal;
                padding: 0 30px 6px;
                font-size: 18px;
            }
            .ttp .a a{
                /*border: 1px solid #ff503e;*/
                padding-bottom: 12px;
                background: none !important;
                border-bottom: 3px solid #009aff;
                color: #009aff;
                margin-left: 11px;
            }
            .xw1{
                font-weight: normal;
            }
            .tl th, .tl td{
                border: none!important;
            }
        </style>

<?php if(CURMODULE != 'guide') { ?>

<div style="border-bottom: 1px solid #a9b1c9" >
                        <!--&lt;!&ndash;新窗&ndash;&gt;-->
<!--<span id="atarget" <?php if($_G['cookie']['atarget'] > 0) { ?>onclick="setatarget(-1)" class="y atarget_1"<?php } else { ?>onclick="setatarget(1)" class="y"<?php } ?> title="在新窗口中打开帖子">新窗</span>-->
                        <?php if($_GET['specialtype'] == 'reward') { ?>
                        <!--<a id="filter_reward" href="javascript:;" class="showmenu xi2<?php if($_GET['rewardtype']) { ?> xw1<?php } ?>" onclick="showMenu(this.id)">&lt;!&ndash;<?php if($_GET['rewardtype'] == '') { ?>&ndash;&gt;全部悬赏&lt;!&ndash;<?php } elseif($_GET['rewardtype'] == '1') { ?>&ndash;&gt;进行中&lt;!&ndash;<?php } elseif($_GET['rewardtype'] == '2') { ?>&ndash;&gt;已解决&lt;!&ndash;<?php } ?>&ndash;&gt;</a>&nbsp;-->
                        <?php } ?>

                        <?php if($_G['fid'] == 45 ) { ?>

                        <div class="hd">

                            <!--全部主题-->
                            <ul class="nav nav-tabs ddf">
                                <?php if($_GET['filter'] ==  '' ) { ?>
                                <li class="ac12" style="padding-bottom: 16px">

                                    <a href="forum.php?mod=forumdisplay&amp;fid=45&amp;filter=all#all"
                                       class="xi2 xw2">
                                    <?php } else { ?>
                                        <li class="<?php if($_GET['filter'] == 'all') { ?> ac12 <?php } ?>" style="padding-bottom: 16px">
                                        <a href="forum.php?mod=forumdisplay&amp;fid=45&amp;filter=all#all"
                                           class="xi2 <?php if($_GET['filter'] == 'all') { ?> xw2 <?php } ?>">
                                        <?php } ?>

                                        <h4 id="all"><span class="tit_subject"></span>全部帖子</h4>
                                    </a>
                                </li>

                                <li class="<?php if($_GET['filter'] == 'digest') { ?> ac12<?php } ?>">
                                    <!--精华-->
                                    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=digest&amp;digest=1<?php echo $forumdisplayadd['digest'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>#new"
                                       class="xi2<?php if($_GET['filter'] == 'digest') { ?> xw2<?php } ?>">
                                        <h4 id="new"><span class="tit_subject"></span>最新热帖</h4></a>&nbsp;

                                </li>

                                <li class="<?php if($_GET['filter'] == 'lastpost') { ?> ac12<?php } ?>">
                                    <!--最新-->
                                    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=lastpost&amp;orderby=lastpost<?php echo $forumdisplayadd['lastpost'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>#jinghua

                                    " class="xi2<?php if($_GET['filter'] == 'lastpost') { ?> xw2<?php } ?>"><h4 id="jinghua"><span class="tit_subject"></span>社区精华</h4></a>&nbsp;

                                </li>


                            </ul>
                        </div>
                        <?php } else { ?>
                        <style>
                            .title{
                                border: none!important;
                            }

                        </style>
                        <div class="fenl_1">
                        <!--分类 开始-->
                        <?php if(($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || count($_G['forum']['threadsorts']['types']) > 0) { ?>
                        <ul id="thread_types" class="ttp bm cl">
                            <?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_threadtype_inner'])) echo $_G['setting']['pluginhooks']['forumdisplay_threadtype_inner'];?>
                            <li id="ttp_all" <?php if(!$_GET['typeid'] && !$_GET['sortid']) { ?>class="xw1 a"<?php } ?>>
                              <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_G['forum']['threadsorts']['defaultshow']) { ?>&amp;filter=sortall&amp;sortall=1<?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">全部帖子</a>
                            </li>
                            <?php if($_G['forum']['threadtypes']) { ?>
                            <?php if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $id => $name) { ?>                            <?php if($_GET['typeid'] == $id) { ?>
                            <li class="xw1 a">
                                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['sortid']) { ?>&amp;filter=sortid&amp;sortid=<?php echo $_GET['sortid'];?><?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">
                                    <?php if($_G['forum']['threadtypes']['icons'][$id] && $_G['forum']['threadtypes']['prefix'] == 2) { ?>
                                    <img class="vm" src="<?php echo $_G['forum']['threadtypes']['icons'][$id];?>" alt="" />
                                    <?php } ?>
                                    <?php echo $name;?>
                                    <!--&lt;!&ndash;<?php if($showthreadclasscount['typeid'][$id]) { ?>&ndash;&gt;-->
                                    <!--<span class="xg1 num"><?php echo $showthreadclasscount['typeid'][$id];?></span>-->
                                    <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                                </a>
                            </li>
                            <?php } else { ?>
                            <li>
                                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $id;?><?php echo $forumdisplayadd['typeid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">
                                    <?php if($_G['forum']['threadtypes']['icons'][$id] && $_G['forum']['threadtypes']['prefix'] == 2) { ?>
                                    <img class="vm" src="<?php echo $_G['forum']['threadtypes']['icons'][$id];?>" alt="" />
                                    <?php } ?>
                                    <?php echo $name;?>
                                    <!--&lt;!&ndash;<?php if($showthreadclasscount['typeid'][$id]) { ?>&ndash;&gt;-->
                                    <!--<span class="xg1 num"><?php echo $showthreadclasscount['typeid'][$id];?></span>-->
                                    <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
                                </a>
                            </li>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>

                            <?php if($_G['forum']['threadsorts']) { ?>
                            <?php if($_G['forum']['threadtypes']) { ?><li><span class="pipe">|</span></li><?php } ?>
                            <?php if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $name) { ?>                            <?php if($_GET['sortid'] == $id) { ?>
                            <li class="xw1 a"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['typeid']) { ?>&amp;filter=typeid&amp;typeid=<?php echo $_GET['typeid'];?><?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"><?php echo $name;?><?php if($showthreadclasscount['sortid'][$id]) { ?><span class="xg1 num"><?php echo $showthreadclasscount['sortid'][$id];?></span><?php } ?></a></li>
                            <?php } else { ?>
                            <li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $id;?><?php echo $forumdisplayadd['sortid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"><?php echo $name;?><?php if($showthreadclasscount['sortid'][$id]) { ?><span class="xg1 num"><?php echo $showthreadclasscount['sortid'][$id];?></span><?php } ?></a></li>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            <?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_filter_extra'])) echo $_G['setting']['pluginhooks']['forumdisplay_filter_extra'];?>
                        </ul>
                        <script type="text/javascript">showTypes('thread_types');</script>
                        <?php } ?>
                        <!--分类 结束-->
                        </div>
                        <?php } ?>

                        <!--&lt;!&ndash;热门&ndash;&gt;-->
                        <!--<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=heat&amp;orderby=heats<?php echo $forumdisplayadd['heat'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="xi2<?php if($_GET['filter'] == 'heat') { ?> xw1<?php } ?>">热门</a>&nbsp;-->

                        <!--&lt;!&ndash;热贴&ndash;&gt;-->
                        <!--<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=hot" class="xi2<?php if($_GET['filter'] == 'hot') { ?> xw1<?php } ?>">热帖</a>&nbsp;-->





                        <!--&lt;!&ndash;更多&ndash;&gt;-->
                        <!--<a id="filter_dateline" href="javascript:;" class="showmenu xi2<?php if($_GET['dateline']) { ?> xw1<?php } ?>" onclick="showMenu(this.id)">更多</a>&nbsp;-->



                        <!--&lt;!&ndash;<?php if(empty($_G['forum']['picstyle']) && $_GET['orderby'] == 'lastpost' && (!$_G['setting']['forumseparator'] || !$separatepos) && !$_GET['filter']) { ?>&ndash;&gt;-->
<!--<a href="javascript:;" onclick="checkForumnew_btn('<?php echo $_G['fid'];?>')" title="查看更新" class="forumrefresh"></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->


<?php if($_GET['filter'] == 'hot') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<span><?php echo $ctime;?></span>
<img src="<?php echo IMGDIR;?>/date_magnify.png" class="cur1" alt="" id="hottime" value="<?php echo $ctime;?>" fid="<?php echo $_G['fid'];?>" onclick="showcalendar(event, this, false, false, false, false, function(){viewhot(this);});" align="absmiddle" />
<?php } ?>
<span id="clearstickthread" style="display: none;">
<span class="pipe">|</span>
<a href="javascript:;" onclick="clearStickThread()" class="xi2" title="显示置顶">显示置顶</a>
</span>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_filter_extra'])) echo $_G['setting']['pluginhooks']['forumdisplay_filter_extra'];?>
</div>


<?php } else { ?>
标题
<?php } ?>







<!--&lt;!&ndash;<?php if(empty($_G['forum']['picstyle'])) { ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if(CURMODULE == 'guide') { ?>&ndash;&gt;-->
<!--<td class="by">版块/群组</td>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--<td class="by">作者</td>-->
<!--<td class="num">回复/查看</td>-->
<!--<td class="by">最后发表</td>-->
<!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
<!--<td class="by" colspan="3">-->
<!--<a<?php if(empty($_G['cookie']['forumdefstyle'])) { ?> href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;forumdefstyle=yes" class="chked"<?php } else { ?> href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;forumdefstyle=no" class="unchk"<?php } ?> title="图片模式浏览帖子">图片模式</a>-->
<!--</td>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->

</div>


<div class="bm_c">
<?php if(empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']) { ?>
<script type="text/javascript">var lasttime = <?php echo $_G['timestamp'];?>;var listcolspan= '<?php if(!$_GET['archiveid'] && $_G['forum']['ismoderator']) { ?>6<?php } else { ?>5<?php } ?>';</script>
<?php } ?>
<div id="forumnew" style="display:none"></div>

<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;infloat=yes&amp;nopost=yes">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="listextra" value="<?php echo $extra;?>" />
<table summary="forum_<?php echo $_G['fid'];?>" cellspacing="0" cellpadding="0" id="threadlisttableid">
<?php if((!$simplestyle || !$_G['forum']['allowside'] && $page == 1) && !empty($announcement)) { ?>

<tbody>

<tr>
<td class="icn"><img src="<?php echo IMGDIR;?>/ann_icon.gif" alt="公告" /></td>
<?php if($_G['forum']['ismoderator'] && !$_GET['archiveid']) { ?><td class="o">&nbsp;</td><?php } ?>
<th><strong class="xst">公告: <?php if(empty($announcement['type'])) { ?><a href="forum.php?mod=announcement&amp;id=<?php echo $announcement['id'];?>#<?php echo $announcement['id'];?>" target="_blank"><?php echo $announcement['subject'];?></a><?php } else { ?><a href="<?php echo $announcement['message'];?>" target="_blank"><?php echo $announcement['subject'];?></a><?php } ?></strong></th>
<td class="by">
<cite><a href="home.php?mod=space&amp;uid=<?php echo $announcement['authorid'];?>" c="1"><?php echo $announcement['author'];?></a></cite>
<em><?php echo $announcement['starttime'];?></em>
</td>
<td class="num">&nbsp;</td>
<td class="by">&nbsp;</td>
</tr>
</tbody>


<?php } if(!$separatepos || !$_G['setting']['forumseparator']) { ?>
<tbody id="separatorline" class="emptb">
                    <tr><td class="icn">

                    </td><?php if(!$_GET['archiveid'] && $_G['forum']['ismoderator']) { ?><td class="o"></td><?php } ?><th></th><?php if(CURMODULE == 'guide') { ?><td class="by"></td><?php } ?><td class="by"></td><td class="num"></td><td class="by"></td></tr></tbody>
<?php } if($_G['forum_threadcount']) { if(empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']) { ?>



                <!--帖子列表循环--><?php if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($_G['setting']['forumseparator'] == 1 && $separatepos == $key + 1) { ?>
<tbody id="separatorline">
<tr class="ts">
<td>&nbsp;</td>
<?php if($_G['forum']['ismoderator'] && !$_GET['archiveid']) { ?>
                                        <td>&nbsp;</td>
                                        <?php } ?>
<th><?php if(empty($_G['forum']['picstyle']) && $_GET['orderby'] == 'lastpost' && !$_GET['filter']) { ?>
                                            <a href="javascript:;" onclick="checkForumnew_btn('<?php echo $_G['fid'];?>')" title="查看更新" class="forumrefresh">
                                                版块主题
                                            </a>
                                            <?php } else { ?>&nbsp;<?php } ?>
                                        </th>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
</tr>
</tbody>

<script type="text/javascript">hideStickThread();</script>
<?php } if($separatepos <= $key + 1) { ?><?php echo adshow("threadlist");?><?php } ?>

                <div class="bd tab-content">
                    <div class="tab-pane active">
                        <ul class="posts">

<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread'][$key];?>

                            <li>
                                                    <!--用户头像-->
                                        <div class="avatar avatar-50">
                                            <a href="#" target="_blank" class="user-avatar-home">
                                                <!--用户头像-大-->
                                                <a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" c="1">

                                                    <img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=small"
                                                         class="ava_border" width="50px" height="50px" style=" padding:2px; margin:0; background-color:#fff;border-radius: 50%;overflow: hidden;" />
                                                </a>
                                                <i class="sm-level level-trial" title=""></i>
                                            </a>
                                        </div>
                                        <div class="cont">
                                            <div class="thread" style="font-size: 18px;">
                                                <!--用户头像-小-->
                                                <!--<img src="http://localhost/upload/uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=small"-->
                                                     <!--class="ava_border" width="20px" height="20px" style="padding:2px; margin:0px; background-color:#fff;" />-->

                                                <!--帖子主题-->
                                                <a  href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"<?php echo $thread['highlight'];?><?php if($thread['isgroup'] == 1 || $thread['forumstick']) { ?> target="_blank"<?php } else { ?> onclick="atarget(this)"<?php } ?> class="s xst">
                                                <?php echo $thread['subject'];?>
                                                <?php if($thread['digest'] > 0 && $filter != 'digest') { ?>
                                                <img src="<?php echo IMGDIR;?>/digest.png" align="absmiddle" alt="digest" title="精华 <?php echo $thread['digest'];?>" />
                                                <?php } ?>

                                                <?php if($thread['folder'] == 'lock') { ?>
                                                <!--<img src="<?php echo IMGDIR;?>/folder_lock.gif" />-->
                                                <?php } elseif($thread['special'] == 1) { ?>
                                                <img src="<?php echo IMGDIR;?>/pollsmall.gif" alt="投票" />
                                                <?php } elseif($thread['special'] == 2) { ?>
                                                <img src="<?php echo IMGDIR;?>/tradesmall.gif" alt="商品" />
                                                <?php } elseif($thread['special'] == 3) { ?>
                                                <img src="<?php echo IMGDIR;?>/rewardsmall.gif" alt="悬赏" />
                                                <?php } elseif($thread['special'] == 4) { ?>
                                                <img src="<?php echo IMGDIR;?>/activitysmall.gif" alt="活动" />
                                                <?php } elseif($thread['special'] == 5) { ?>
                                                <img src="<?php echo IMGDIR;?>/debatesmall.gif" alt="辩论" />
                                                <?php } elseif(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
                                                <img src="<?php echo IMGDIR;?>/pin.png" alt="<?php echo $_G['setting']['threadsticky'][3-$thread['displayorder']];?>" />
                                                <?php } else { ?>
                                                <!--<img src="<?php echo IMGDIR;?>/folder_<?php echo $thread['folder'];?>.gif" />-->
                                                <?php } ?>
                                               </a>
                                                <div class="platact_type">
                                                </div>
                                                <ul class="pagination thread-page-preview">
                                                </ul>
                                            </div>
                                            <!--回复-->
                                            <div class="thread" style="line-height: 20px;margin-top: 5px;margin-left: 5px">
                                                <div class="author-info">
                                                    <span class="author-name" title="">
                                                       <?php $nicks= DB::fetch_all("SELECT * FROM `pre_common_member_profile` WHERE `uid`=$thread[authorid]");?>                                                     <?php if(is_array($nicks)) foreach($nicks as $nick) { ?>                                                        <?php if($nick['field1']) { ?>
                                                            <?php echo $nick['field1'];?>
                                                        <?php } else { ?>
                                                            <?php echo $thread['author'];?>
                                                        <?php } ?>
                                                     <?php } ?>
                                                    </span>
                                                    <span class="show-time" title="05-19">发布于&nbsp;<?php echo $thread['dateline'];?></span>
                                                </div>
                                                <div class="author-info">
                                                    <span class="author-date" title="">
                                                            <?php $laster = DB::fetch_all("SELECT uid FROM `pre_common_member` WHERE `username`='$thread[lastposter]'");?>                                                        <?php if(is_array($laster)) foreach($laster as $last) { ?>                                                        <?php $nick2s= DB::fetch_all("SELECT * FROM `pre_common_member_profile` WHERE `uid`=$last[uid]");?>                                                            <?php if(is_array($nick2s)) foreach($nick2s as $nick2) { ?>                                                                <?php if($nick['field1']) { ?>
                                                                <?php echo $nick2['field1'];?>
                                                                <?php } else { ?>
                                                                <?php echo $thread['lastposter'];?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </span>
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


<?php if($_G['setting']['threadhidethreshold'] && $thread['hidden'] >= $_G['setting']['threadhidethreshold']) { ?>
                                            <span class="xg1">隐藏</span>&nbsp;
                                            <?php } if($thread['icon'] >= 0) { ?>

<!--<img src="<?php echo STATICURL;?>image/stamp/<?php echo $_G['cache']['stamps'][$thread['icon']]['url'];?>" alt="<?php echo $_G['cache']['stamps'][$thread['icon']]['text'];?>" align="absmiddle" />-->

<?php } if($thread['rushreply']) { ?>
<img src="<?php echo IMGDIR;?>/rushreply_s.png" alt="抢楼" align="absmiddle" />
<?php if($rushinfo[$thread['tid']]) { ?>
<span id="rushtimer_<?php echo $thread['tid'];?>"> 【还有 <span id="rushtimer_body_<?php echo $thread['tid'];?>"></span> <script language="javascript">settimer(<?php echo $rushinfo[$thread['tid']]['timer'];?>, 'rushtimer_body_<?php echo $thread['tid'];?>');</script><?php if($rushinfo[$thread['tid']]['timertype'] == 'start') { ?> 开始 <?php } else { ?> 结束 <?php } ?> 】</span>
<?php } } if($stemplate && $sortid) { ?><?php echo $stemplate[$sortid][$thread['tid']];?><?php } if($thread['readperm']) { ?> - [阅读权限 <span class="xw1"><?php echo $thread['readperm'];?></span>]<?php } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
- <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>&amp;rewardtype=1" title="只看进行中的"><span class="xi1">[悬赏 <span class="xw1"><?php echo $thread['price'];?></span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?>]</span></a>
<?php } else { ?>
- [售价 <span class="xw1"><?php echo $thread['price'];?></span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?>]
<?php } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
- <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>&amp;rewardtype=2" title="只看已解决的">[已解决]</a>
<?php } ?>


<!--&lt;!&ndash;<?php if($thread['attachment'] == 2) { ?>&ndash;&gt;-->
<!--<img src="<?php echo STATICURL;?>image/filetype/image_s.gif" alt="attach_img" title="图片附件" align="absmiddle" />-->
<!--&lt;!&ndash;<?php } elseif($thread['attachment'] == 1) { ?>&ndash;&gt;-->
<!--<img src="<?php echo STATICURL;?>image/filetype/common.gif" alt="attachment" title="附件" align="absmiddle" />-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if($thread['mobile']) { ?>&ndash;&gt;-->
<!--<img src="<?php echo IMGDIR;?>/mobile-attach-<?php echo $thread['mobile'];?>.png" alt="手机发帖" align="absmiddle" />-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if($thread['digest'] > 0 && $filter != 'digest') { ?>&ndash;&gt;-->
<!--<img src="<?php echo IMGDIR;?>/digest_<?php echo $thread['digest'];?>.gif" align="absmiddle" alt="digest" title="精华 <?php echo $thread['digest'];?>" />-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->


<?php if($thread['displayorder'] == 0) { if($thread['recommendicon'] && $filter != 'recommend') { ?>
<img src="<?php echo IMGDIR;?>/recommend_<?php echo $thread['recommendicon'];?>.gif" align="absmiddle" alt="recommend" title="评价指数 <?php echo $thread['recommends'];?>" />
<?php } if($thread['heatlevel']) { ?>
<img src="<?php echo IMGDIR;?>/hot_<?php echo $thread['heatlevel'];?>.gif" align="absmiddle" alt="heatlevel" title="热度: <?php echo $thread['heats'];?>" />
<?php } if($thread['rate'] > 0) { ?>
<img src="<?php echo IMGDIR;?>/agree.gif" align="absmiddle" alt="agree" title="帖子被加分" />
<?php } elseif($thread['rate'] < 0) { ?>
<img src="<?php echo IMGDIR;?>/disagree.gif" align="absmiddle" alt="disagree" title="帖子被减分" />
<?php } } if($thread['replycredit'] > 0) { ?>
- <span class="xi1">[回帖奖励 <strong> <?php echo $thread['replycredit'];?></strong> ]</span>
<?php } ?>

                                            <?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_subject'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_subject'][$key];?>

<!--&lt;!&ndash;<?php if($thread['multipage']) { ?>&ndash;&gt;-->

<!--<span class="tps"><?php echo $thread['multipage'];?></span>-->
                             <!---->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->



<?php if($thread['weeknew']) { ?>
<!--<a href="forum.php?mod=redirect&amp;tid=<?php echo $thread['tid'];?>&amp;goto=lastpost#lastpost" class="xi1">New</a>-->
<?php } if(!$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { if($thread['related_group'] == 0 && $thread['closed'] > 1) { $thread[tid]=$thread[closed];?><?php } if($groupnames[$thread['tid']]) { ?>
<!--<span class="fromg xg1"> [来自: <a href="forum.php?mod=group&amp;fid=<?php echo $groupnames[$thread['tid']]['fid'];?>" target="_blank" class="xg1"><?php echo $groupnames[$thread['tid']]['name'];?></a>]</span>-->
<?php } } ?>

<!--&lt;!&ndash;<?php if(CURMODULE == 'guide') { ?>&ndash;&gt;-->
<!--<td class="by"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>" target="_blank"><?php echo $forumnames[$thread['fid']]['name'];?></a></td>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->




</li>
                            </ul>



<?php } ?>
</div>
</div>

                <!--帖子列表循环-->

</table><!-- end of table "forum_G[fid]" branch 1/3 -->






<?php if($_G['hiddenexists']) { ?>							
<div id="hiddenthread"<?php if($thread['hidden']) { ?> class="last"<?php } ?>><a href="javascript:;" onclick="display_blocked_thread()">还有一些帖子被系统自动隐藏，点此展开</a></div>
<?php } } else { ?>
</table><!-- end of table "forum_G[fid]" branch 2/3 -->
<ul id="waterfall" class="ml waterfall cl"><?php if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($_G['hiddenexists'] && $thread['hidden']) { continue;?><?php } if(!$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { if($thread['related_group'] == 0 && $thread['closed'] > 1) { $thread[tid]=$thread[closed];?><?php } } $waterfallwidth = $_G[setting][forumpicstyle][thumbwidth] + 24;?><li style="width:<?php echo $waterfallwidth;?>px">
<?php if(!$_GET['archiveid'] && $_G['forum']['ismoderator']) { ?>
<div style="position:absolute;margin:1px;padding:2px;background:#FFF">
<?php if($thread['fid'] == $_G['fid']) { if($thread['displayorder'] <= 3 || $_G['adminid'] == 1) { ?>
<input onclick="tmodclick(this)" type="checkbox" name="moderate[]" value="<?php echo $thread['tid'];?>" />
<?php } else { ?>
<input type="checkbox" disabled="disabled" />
<?php } } else { ?>
<input type="checkbox" disabled="disabled" />
<?php } ?>
</div>
<?php } ?>
<div class="c cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>" <?php if($thread['isgroup'] == 1 || $thread['forumstick'] || CURMODULE == 'guide') { ?> target="_blank"<?php } else { ?> onclick="atarget(this)"<?php } ?> title="<?php echo $thread['subject'];?>" class="z">
<?php if($thread['cover']) { ?>
<img src="<?php echo $thread['coverpath'];?>" alt="<?php echo $thread['subject'];?>" width="<?php echo $_G['setting']['forumpicstyle']['thumbwidth'];?>" />
<?php } else { ?>
<span class="nopic" style="width:<?php echo $_G['setting']['forumpicstyle']['thumbwidth'];?>px; height:<?php echo $_G['setting']['forumpicstyle']['thumbwidth'];?>px;"></span>
<?php } ?>
</a>
</div>
<h3 class="xw0">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread'][$key];?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"<?php echo $thread['highlight'];?><?php if($thread['isgroup'] == 1 || $thread['forumstick']) { ?> target="_blank"<?php } else { ?> onclick="atarget(this)"<?php } ?> title="<?php echo $thread['subject'];?>"><?php echo $thread['subject'];?></a>
</h3>
<div class="auth cl">
<cite class="xg1 y">
喜欢: <?php if($thread['recommends']) { ?><?php echo $thread['recommends'];?><?php } else { ?>0<?php } ?>
 &nbsp; 回复: <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>" title="<?php echo $thread['replies'];?> 回复"><?php echo $thread['replies'];?></a>
</cite>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_author'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_author'][$key];?>
<?php if($thread['authorid'] && $thread['author']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>"><?php echo $thread['author'];?></a><?php if(!empty($verify[$thread['authorid']])) { ?> <?php echo $verify[$thread['authorid']];?><?php } } else { ?>
<?php echo $_G['setting']['anonymoustext'];?>
<?php } ?>
</div>
</li>
<?php } ?>
</ul>
<div id="tmppic" style="display: none;"></div>
<script src="<?php echo $_G['setting']['jspath'];?>redef.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript" reload="1">
var wf = {};

_attachEvent(window, "load", function () {
if($("waterfall")) {
wf = waterfall();
}

<?php if($page < $_G['page_next'] && !$subforumonly) { ?>
var page = <?php echo $page;?> + 1,
maxpage = Math.min(<?php echo $page;?> + 10,<?php echo $maxpage;?> + 1),
stopload = 0,
scrolltimer = null,
tmpelems = [],
tmpimgs = [],
markloaded = [],
imgsloaded = 0,
loadready = 0,
showready = 1,
nxtpgurl = 'forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&filter=<?php echo $filter;?>&orderby=<?php echo $_GET['orderby'];?><?php echo $forumdisplayadd['page'];?>&page=',
wfloading = "<img src=\"<?php echo IMGDIR;?>/loading.gif\" alt=\"\" width=\"16\" height=\"16\" class=\"vm\" /> 加载中...",
pgbtn = $("pgbtn").getElementsByTagName("a")[0];

function loadmore() {
var url = nxtpgurl + page + '&t=' + parseInt((+new Date()/1000)/(Math.random()*1000));
var x = new Ajax("HTML");
x.get(url, function (s) {
s = s.replace(/\n|\r/g, "");
if(s.indexOf("id=\"pgbtn\"") == -1) {
$("pgbtn").style.display = "none";
stopload++;
window.onscroll = null;
}

s = s.substring(s.indexOf("<ul id=\"waterfall\""), s.indexOf("<div id=\"tmppic\""));
s = s.replace("id=\"waterfall\"", "");
$("tmppic").innerHTML = s;
loadready = 1;
});
}

window.onscroll = function () {
if(scrolltimer == null) {
scrolltimer = setTimeout(function () {
try {
if(page < maxpage && stopload < 2 && showready && ((document.documentElement.scrollTop || document.body.scrollTop) + document.documentElement.clientHeight + 500) >= document.documentElement.scrollHeight) {
pgbtn.innerHTML = wfloading;
loadready = 0;
showready = 0;
loadmore();
tmpelems = $("tmppic").getElementsByTagName("li");
var waitingtimer = setInterval(function () {
stopload >= 2 && clearInterval(waitingtimer);
if(loadready && stopload < 2) {
if(!tmpelems.length) {
page++;
pgbtn.href = nxtpgurl + Math.min(page, <?php echo $maxpage;?>);
pgbtn.innerHTML = "下一页 &raquo;";
showready = 1;
clearInterval(waitingtimer);
}
for(var i = 0, j = tmpelems.length; i < j; i++) {
if(tmpelems[i]) {
tmpimgs = tmpelems[i].getElementsByTagName("img");
imgsloaded = 0;
for(var m = 0, n = tmpimgs.length; m < n; m++) {
tmpimgs[m].onerror = function () {
this.style.display = "none";
};
markloaded[m] = tmpimgs[m].complete ? 1 : 0;
imgsloaded += markloaded[m];
}
if(imgsloaded == tmpimgs.length) {
$("waterfall").appendChild(tmpelems[i]);
wf = waterfall({
"index": wf.index,
"totalwidth": wf.totalwidth,
"totalheight": wf.totalheight,
"columnsheight": wf.columnsheight
});
}
}
}
}
}, 40);
}
} catch(e) {}
scrolltimer = null;
}, 320);
}
};
<?php } ?>

});

</script>
<?php } } else { ?>
<tbody class="bw0_all"><tr><th colspan="<?php if(!$_GET['archiveid'] && $_G['forum']['ismoderator']) { ?>6<?php } else { ?>5<?php } ?>"><p class="emp">本版块或指定的范围内尚无主题</p></th></tr></tbody>
</table><!-- end of table "forum_G[fid]" branch 3/3 -->
<?php } if($_G['forum']['ismoderator'] && $_G['forum_threadcount']) { include template('forum/topicadmin_modlayer'); } ?>
</form>

</div>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_threadlist_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_threadlist_bottom'];?>
</div>


<?php if(!IS_ROBOT) { ?>
<div id="filter_special_menu" class="p_pop" style="display:none" change="location.href='forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&filter='+$('filter_special').value">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">全部主题</a></li>
<?php if($showpoll) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=poll<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">投票</a></li><?php } if($showtrade) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=trade<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">商品</a></li><?php } if($showreward) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">悬赏</a></li><?php } if($showactivity) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=activity<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">活动</a></li><?php } if($showdebate) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=debate<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">辩论</a></li><?php } ?>
</ul>
</div>
<div id="filter_reward_menu" class="p_pop" style="display:none" change="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>&amp;rewardtype='+$('filter_reward').value">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">全部悬赏</a></li>
<?php if($showpoll) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>&amp;rewardtype=1">进行中</a></li><?php } if($showtrade) { ?><li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=specialtype&amp;specialtype=reward<?php echo $forumdisplayadd['specialtype'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>&amp;rewardtype=2">已解决</a></li><?php } ?>
</ul>
</div>
<div id="filter_dateline_menu" class="p_pop" style="display:none">
<ul class="pop_moremenu">
<li>排序: 
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=author&amp;orderby=dateline<?php echo $forumdisplayadd['author'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['orderby'] == 'dateline') { ?>class="xw1"<?php } ?>>发帖时间</a><span class="pipe">|</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=replies<?php echo $forumdisplayadd['reply'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['orderby'] == 'replies') { ?>class="xw1"<?php } ?>>回复/查看</a><span class="pipe">|</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=views<?php echo $forumdisplayadd['view'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['orderby'] == 'views') { ?>class="xw1"<?php } ?>>查看</a>
</li>
<li>时间: 
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if(!$_GET['dateline']) { ?>class="xw1"<?php } ?>>全部时间</a><span class="pipe">|</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=86400<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '86400') { ?>class="xw1"<?php } ?>>一天</a><span class="pipe">|</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=172800<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '172800') { ?>class="xw1"<?php } ?>>两天</a><span class="pipe">|</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=604800<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '604800') { ?>class="xw1"<?php } ?>>一周</a><span class="pipe">|</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=2592000<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '2592000') { ?>class="xw1"<?php } ?>>一个月</a><span class="pipe">|</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;orderby=<?php echo $_GET['orderby'];?>&amp;filter=dateline&amp;dateline=7948800<?php echo $forumdisplayadd['dateline'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['dateline'] == '7948800') { ?>class="xw1"<?php } ?>>三个月</a>
</li>
</ul>
</div>
<?php if(!$_G['setting']['closeforumorderby']) { ?>
<div id="filter_orderby_menu" class="p_pop" style="display:none">
<ul>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">默认排序</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=author&amp;orderby=dateline<?php echo $forumdisplayadd['author'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">发帖时间</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=replies<?php echo $forumdisplayadd['reply'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">回复/查看</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=views<?php echo $forumdisplayadd['view'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">查看</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=lastpost&amp;orderby=lastpost<?php echo $forumdisplayadd['lastpost'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">最后发表</a></li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=heat&amp;orderby=heats<?php echo $forumdisplayadd['heat'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">热门</a></li>
</ul>
</div>
<?php } } ?>



<!--<div class="bm bw0 pgs cl">-->

    <div class="pages more-loading">
        <ul class="pagination">
            <li><?php echo $multipage;?></li>
        </ul>
    </div>


<!--<span <?php if($_G['setting']['visitedforums']) { ?>id="visitedforumstmp" onmouseover="$('visitedforums').id = 'visitedforumstmp';this.id = 'visitedforums';showMenu({'ctrlid':this.id,'pos':'21'})"<?php } ?> class="pgb y"><a href="forum.php">返&nbsp;回</a></span>-->
<!--&lt;!&ndash;<?php if(!$_GET['archiveid']) { ?>&ndash;&gt;<a href="javascript:;" id="newspecialtmp" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})"<?php if(!$_G['forum']['allowspecialonly'] && empty($_G['forum']['picstyle']) && !$_G['forum']['threadsorts']['required']) { ?> onclick="showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>')"<?php } else { ?> onclick="location.href='forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>';return false;"<?php } ?> title="发新帖"><img src="<?php echo IMGDIR;?>/pn_post.png" alt="发新帖" /></a>&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_postbutton_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_postbutton_bottom'];?>
<!--</div>-->
<?php } else { ?><div id="threadlist" class="bm bmw"<?php if($_G['uid']) { ?> style="position: relative;"<?php } ?>>
<?php if($quicksearchlist && !$_GET['archiveid']) { ?><script type="text/javascript">
var forum_optionlist = <?php if($forum_optionlist) { ?>'<?php echo $forum_optionlist;?>'<?php } else { ?>''<?php } ?>;
</script>
<script src="<?php echo $_G['setting']['jspath'];?>threadsort.js?<?php echo VERHASH;?>" type="text/javascript"></script><?php if(is_array($quicksearchlist)) foreach($quicksearchlist as $optionid => $option) { $formsearch = '';?>        <?php if(getstatus($option['search'], 1)) { ?>
        <?php
$__VERHASH = VERHASH;$formsearch = <<<EOF

            <div style="
EOF;
 if($option['type'] == 'checkbox') { 
$formsearch .= <<<EOF
clear:left;padding-bottom: 5px;
EOF;
 } else { 
$formsearch .= <<<EOF
float: left;width: 48%;height: 30px; overflow: hidden;
EOF;
 } 
$formsearch .= <<<EOF
">
                <span style="padding-right: 1em;">{$option['title']}:</span>
                
EOF;
 if(in_array($option['type'], array('radio', 'checkbox', 'select', 'range'))) { 
$formsearch .= <<<EOF

                    <span id="select_{$option['identifier']}">
                    
EOF;
 if($option['type'] == 'select') { 
$formsearch .= <<<EOF

                        
EOF;
 if($_GET['searchoption'][$optionid]['value']) { 
$formsearch .= <<<EOF

                            <script type="text/javascript">
                                changeselectthreadsort('{$_GET['searchoption'][$optionid]['value']}', {$optionid}, 'search');
                            </script>
                        
EOF;
 } else { 
$formsearch .= <<<EOF

                            <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}" onchange="changeselectthreadsort(this.value, '{$optionid}', 'search');" class="ps vm">
                                <option value="0">请选择</option>
                            
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                                
EOF;
 if(!$value['foptionid']) { 
$formsearch .= <<<EOF

                                <option value="{$id}">{$value['content']} 
EOF;
 if($value['level'] != 1) { 
$formsearch .= <<<EOF
&raquo;
EOF;
 } 
$formsearch .= <<<EOF
</option>
                                
EOF;
 } 
$formsearch .= <<<EOF

                            
EOF;
 } 
$formsearch .= <<<EOF

                            </select>
<input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                        
EOF;
 } 
$formsearch .= <<<EOF

                    
EOF;
 } elseif($option['type'] != 'checkbox') { 
$formsearch .= <<<EOF

                        <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}" class="ps vm">
                            <option value="0">请选择</option>
                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <option value="{$id}" 
EOF;
 if($_GET['searchoption'][$optionid]['value'] == $id) { 
$formsearch .= <<<EOF
selected="selected"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</option>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        </select>
                        <input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <label><input type="checkbox" class="pc" name="searchoption[{$optionid}][value][{$id}]" value="{$id}" 
EOF;
 if(is_array($_GET['searchoption'][$optionid]) && $_GET['searchoption'][$optionid]['value'][$id]) { 
$formsearch .= <<<EOF
checked="checked"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</label>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        <input type="hidden" name="searchoption[{$optionid}][type]" value="checkbox">
                    
EOF;
 } 
$formsearch .= <<<EOF

                    </span>
                
EOF;
 } else { 
$formsearch .= <<<EOF

                    
EOF;
 if($option['type'] == 'calendar') { 
$formsearch .= <<<EOF

                        <script src="{$_G['setting']['jspath']}calendar.js?{$__VERHASH}" type="text/javascript"></script>
                        <input type="text" name="searchoption[{$optionid}][value]" size="15" class="px vm" value="
EOF;
 if(is_array($_GET['searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_GET['searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" onclick="showcalendar(event, this, false)" />
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        <input type="text" name="searchoption[{$optionid}][value]" size="15" class="px vm" value="
EOF;
 if(is_array($_GET['searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_GET['searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" />
                    
EOF;
 } 
$formsearch .= <<<EOF

                
EOF;
 } 
$formsearch .= <<<EOF

            </div>
            
EOF;
?>
<?php } ?>
    <?php $formsearch_html .= $formsearch;?><?php $fontsearch = '';$showoption = array();$tmpcount = 0;?><?php if(getstatus($option['search'], 2)) { ?>
    <?php
$fontsearch = <<<EOF

<tr>
<th width="8%">{$option['title']}:</th>
            <td>
                <ul class="cl">
                    <li
EOF;
 if($_GET[''.$option['identifier']] == 'all') { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1{$filterurladd}&amp;{$option['identifier']}=all{$sorturladdarray[$option['identifier']]}" class="xi2">不限</a></li>

EOF;
 if($option['type'] == 'select') { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if($value['foptionid'] == 0) { 
$fontsearch .= <<<EOF

<li
EOF;
 if(preg_match('/^'.$value['optionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['optionid'].'$/i', $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value['content']}</a></li>

EOF;
 } } if(!($_GET[''.$option['identifier']] == 'all' || !isset($_GET[''.$option['identifier']]))) { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if((preg_match('/^'.$value['foptionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['foptionid'].'$/i', $_GET[''.$option['identifier']])) && ($showoption[$value['count']][$id] = $value)) { } } if(ksort($showoption)) { } if(is_array($showoption)) foreach($showoption as $optioncount => $values) { if($tmpcount != $optioncount && ($tmpcount = $optioncount)) { 
$fontsearch .= <<<EOF

</ul><ul class="subtsm cl">
EOF;
 if(is_array($values)) foreach($values as $id => $value) { 
$fontsearch .= <<<EOF
<li
EOF;
 if(preg_match('/^'.$value['optionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['optionid'].'$/i', $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value['content']}</a></li>

EOF;
 } 
$fontsearch .= <<<EOF

</ul><ul>

EOF;
 } } } } else { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$fontsearch .= <<<EOF
<li
EOF;
 if($_GET[''.$option['identifier']] && !strcmp($id, $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value}</a></li>

EOF;
 } } 
$fontsearch .= <<<EOF

                </ul>
            </td>
</tr>

EOF;
?>
     <?php } ?>
     <?php $fontsearch_html .= $fontsearch;?><?php } if($formsearch_html || $fontsearch_html) { ?>
<div>
<?php if($fontsearch_html) { ?>
    <div class="ptn pbn mbm bbs">
    <table id="fontsearch" class="tsm cl">
         <?php echo $fontsearch_html;?>
    </table>
    </div>
<?php } if($formsearch_html) { ?>
    <form method="post" autocomplete="off" name="searhsort" id="searhsort" class="bbs bm_c pns mfm cl" action="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_GET['sortid'];?>">
        <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
        <?php echo $formsearch_html;?>
        <div class="ptm cl"><button type="submit" class="pn pnc" name="searchsortsubmit"><em>搜索</em></button></div>
    </form>
<?php } ?>
</div>
<?php } } ?>
<?php echo $sorttemplate['header'];?>
<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;infloat=yes&amp;nopost=yes">
<?php echo $sorttemplate['body'];?>
<?php if($_G['forum']['ismoderator'] && $_G['forum_threadcount']) { include template('forum/topicadmin_modlayer'); } ?>
</form>
<?php echo $sorttemplate['footer'];?>
</div>

<div class="bm bw0 pgs cl">
<?php echo $multipage;?>
<span <?php if($_G['setting']['visitedforums']) { ?>id="visitedforumstmp" onmouseover="$('visitedforums').id = 'visitedforumstmp';this.id = 'visitedforums';showMenu({'ctrlid':this.id,'pos':'21'})"<?php } ?> class="pgb y"><a href="forum.php">返&nbsp;回</a></span>
<?php if(!$_GET['archiveid']) { ?>

    <a href="javascript:;" id="newspecialtmp" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})"<?php if(!$_G['forum']['allowspecialonly'] && empty($_G['forum']['picstyle'])) { ?> onclick="showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>')"<?php } else { ?> onclick="location.href='forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?>';return false;"<?php } ?> title="发新帖"><img src="<?php echo IMGDIR;?>/pn_post.png" alt="发新帖" /></a><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_postbutton_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_postbutton_bottom'];?>
</div><?php } ?>
            <!--论坛帖子列表-end-->
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_bottom'];?>
</div>
        <!--右侧{-->
        <div class="aside">
            <!--判断是首页还是帖子页--首页板块ID=45-->
            <?php if($_G['fid'] == 45 ) { ?>
            <!--签到-->
            <div class="checkin">
                <a class="checkin-btn" href="javascript:void(0)">
                    <i class="icon"></i>
                    <span>签到</span>
                </a>

                <div class="checkin-intro">
                    <span class="title" style="border: none!important;">今日签到人数</span>
                    <span class="num" style="position: relative;top:-20px "><span class="light day-total">暂未开放</span><span style=""></span></span>
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


            <!--签到-->
                <!--热门版块{-->
                <div class="model site-subnav">
                    <div class="hd">
                        <h3>热门版块</h3>
                    </div>
                    <div class="bd">
                        <div class="wrapper clearfix">
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=256" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_zbgg.jpg" alt="公开课" title="公开课">公开课 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=95" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_ziliao.jpg" alt="备考资料" title="备考资料">备考资料 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=94" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_guihua.png" alt="备考规划" title="备考规划">备考规划 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=236" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_jijing.jpg" alt="机经课程" title="机经课程">机经课程 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=140" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_shuxue.png" alt="数学机经" title="数学机经">数学机经 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=141" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_readTwo.png" alt="阅读机经" title="阅读机经">阅读机经 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=229" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_SC_jiexi.jpg" alt="SC解析" title="SC解析">SC解析 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=230" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_CR_jiexi.jpg" alt="CR解析" title="CR解析">CR解析 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=213" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_classXZ.png" alt="课程下载" title="课程下载">课程下载 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=169" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_dayi.png" alt="题目答疑" title="题目答疑">题目答疑 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=250" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_tingli.jpg" alt="托福听力" title="托福听力">托福听力 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=253" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_kouyu.jpg" alt="托福口语" title="托福口语">托福口语 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=254" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_ziliaok.jpg" alt="托福资料" title="托福资料">托福资料 </a>
                            <a href="http://bbs.gmatonline.cn/forum.php?mod=forumdisplay&amp;fid=159" target="_blank">
                                <img src="template/dean_tech_150528/images/lt_shenq.jpg" alt="商学院申请" title="商学院申请">商学院申请 </a>

                        </div>

                    </div>
                </div>
                <!--}热门版块-->
            <?php } else { ?>

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
                        <a class="more-link" href="#" target="_blank">招版主啦</a>
                        <h4>版主</h4>
                    </div>
                    <div class="bd">
                        <div id="w0" class="model list-view">
                            <ul>
                                <li data-key="3">

                                    <a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" c="1">

                                        <img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=small"
                                             class="ava_border" width="50px" height="50px" style=" padding:2px; margin:0; background-color:#fff;border-radius: 50%;overflow: hidden;" />
                                    </a>


                                    <em><span class="xi2"><?php echo $moderatedby;?></span></em>
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

            <?php } ?>

            <!--[diy=diyfastposttop]--><div id="diyfastposttop" class="area"></div><!--[/diy]-->
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

        </div>

        <!--右侧-->

<?php if($_G['forum']['allowside']) { ?>
<div class="sd">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_side_top'])) echo $_G['setting']['pluginhooks']['forumdisplay_side_top'];?>
<?php if(!$subforumonly) { ?>
<div class="bm">
<div class="bm_h">
<h2>所属分类: <?php echo cutstr($_G['cache']['forums'][$_G['forum']['fup']]['name'], 22, '')?></h2>
</div>
<div class="bm_c">
<ul class="xl xl2 cl"><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $bforum) { if($bforum['fup'] == $_G['forum']['fup'] && $bforum['status']) { ?>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $bforum['fid'];?>"><?php echo $bforum['name'];?></a></li>
<?php } } ?>
</ul>
</div>
</div>

<?php if($recommendgroups) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>推荐<?php echo $_G['setting']['navs']['3']['navname'];?></h2>
</div>
<div class="bm_c cl">
<ul class="ml mls cl"><?php if(is_array($recommendgroups)) foreach($recommendgroups as $key => $group) { ?><li>
<a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" title="<?php echo $group['name'];?>" target="_blank" class="avt"><img src="<?php echo $group['icon'];?>" alt="<?php echo $group['name'];?>"></a>
<p><a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" target="_blank"><?php echo $group['name'];?></a></p>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } if(!($_G['forum']['simple'] & 1) && $_G['setting']['whosonlinestatus']) { ?>
<div class="bm">
<?php if($detailstatus) { ?>
<div class="bm_h cl">
<span class="o y"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;page=<?php echo $page;?>&amp;showoldetails=no#online"><img src="<?php echo IMGDIR;?>/collapsed_no.gif" alt="" /></a></span>
<h2>正在浏览此版块的会员 (<?php echo $onlinenum;?>)</h2>
</div>
<div class="bm_c">
<ul class="ml mls cl"><?php if(is_array($whosonline)) foreach($whosonline as $key => $online) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $online['uid'];?>" class="avt"><?php echo avatar($online[uid],small);?></a>
<?php if($online['uid']) { ?>
<p><a href="home.php?mod=space&amp;uid=<?php echo $online['uid'];?>"><?php echo $online['username'];?></a></p>
<?php } else { ?>
<p><?php echo $online['username'];?></p>
<?php } ?>
<span><?php echo $online['lastactivity'];?><?php echo "\n";?></span>
</li>
<?php } ?>
</ul>
</div>
<?php } else { ?>
<div class="bm_h cl">
<span class="o y"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;page=<?php echo $page;?>&amp;showoldetails=yes#online" class="nobdr"><img src="<?php echo IMGDIR;?>/collapsed_yes.gif" alt="" /></a></span>
<h2>正在浏览此版块的会员 (<?php echo $onlinenum;?>)</h2>
</div>
<?php } ?>
</div>
<?php } } ?>
<div class="drag">
<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
</div>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_side_bottom'])) echo $_G['setting']['pluginhooks']['forumdisplay_side_bottom'];?>
</div>
<?php } ?>
</div>
</div>
<?php if($_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])) { ?>
<ul class="p_pop" id="newspecial_menu" style="display: none">
<?php if(!$_G['forum']['allowspecialonly']) { ?><li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>">发表帖子</a></li><?php } if($_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']) { if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $threadsorts) { if($_G['forum']['threadsorts']['show'][$id]) { ?>
<li class="popupmenu_option"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;extra=<?php echo $extra;?>&amp;sortid=<?php echo $id;?>"><?php echo $threadsorts;?></a></li>
<?php } } } if($_G['group']['allowpostpoll']) { ?><li class="poll"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=1">发起投票</a></li><?php } if($_G['group']['allowpostreward']) { ?><li class="reward"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=3">发布悬赏</a></li><?php } if($_G['group']['allowpostdebate']) { ?><li class="debate"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=5">发起辩论</a></li><?php } if($_G['group']['allowpostactivity']) { ?><li class="activity"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=4">发起活动</a></li><?php } if($_G['group']['allowposttrade']) { ?><li class="trade"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=2">出售商品</a></li><?php } if($_G['setting']['threadplugins']) { if(is_array($_G['forum']['threadplugin'])) foreach($_G['forum']['threadplugin'] as $tpid) { if(array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])) { ?>
<li class="popupmenu_option"<?php if($_G['setting']['threadplugins'][$tpid]['icon']) { ?> style="background-image:url(source/plugin/<?php echo $tpid;?>/<?php echo $_G['setting']['threadplugins'][$tpid]['icon'];?>)"<?php } ?>><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;specialextra=<?php echo $tpid;?>"><?php echo $_G['setting']['threadplugins'][$tpid]['name'];?></a></li>
<?php } } } ?>
</ul>
<?php } if($_G['setting']['visitedforums'] && $_G['forum']['status'] != 3) { ?>
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

<?php } if($_G['setting']['threadmaxpages'] > 1 && $page && !$subforumonly) { ?>
<script type="text/javascript">document.onkeyup = function(e){keyPageScroll(e, <?php if($page > 1) { ?>1<?php } else { ?>0<?php } ?>, <?php if($page < $_G['setting']['threadmaxpages'] && $page < $_G['page_next']) { ?>1<?php } else { ?>0<?php } ?>, 'forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&filter=<?php echo $filter;?>&orderby=<?php echo $_GET['orderby'];?><?php echo $forumdisplayadd['page'];?>&<?php echo $multipage_archive;?>', <?php echo $page;?>);}</script>
<?php } if(empty($_G['forum']['picstyle']) && $_GET['orderby'] == 'lastpost' && empty($_GET['filter']) ) { ?>
<script type="text/javascript">checkForumnew_handle = setTimeout(function () {checkForumnew(<?php echo $_G['fid'];?>, lasttime);}, checkForumtimeout);</script>
<?php } ?>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php if(empty($_G['setting']['disfixednv_forumdisplay']) ) { ?><script>fixed_top_nv();</script><?php } include template('common/footer'); ?>