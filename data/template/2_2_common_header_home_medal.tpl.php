<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/dean_tech_150528/common/header.htm', './template/dean_tech_150528/common/header_common.htm', 1474985383, '2', './data/template/2_2_common_header_home_medal.tpl.php', './template/dean_tech_150528', 'common/header_home_medal')
|| checktplrefresh('./template/dean_tech_150528/common/header.htm', './template/dean_tech_150528/common/header_qmenu.htm', 1474985383, '2', './data/template/2_2_common_header_home_medal.tpl.php', './template/dean_tech_150528', 'common/header_home_medal')
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
    <?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
    <title>
        <?php if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?>
    </title>
    <?php echo $_G['setting']['seohead'];?>

    <meta name="keywords" content="GMAT社区，GMAT备考论坛，GMAT复习资料，GMAT语法笔记，PREP笔记，GMAT模考评估，GMAT模考，gmat模考软件,GMATPREP模考，gmat考试真题,gmat历年真题下载,gmat考试资料,GWD，GMAT语法解析，gmat逻辑，gmat阅读，gmat OG16，gmat PREP，gmat GWD，GMAT培训，GMAT网课">
    <meta name="description" content="雷哥GMAT在线官网(gmatonline)|GMAT社区|GMAT备考论坛|GMAT复习资料|GMAT模考|GMAT模考软件|GMAT考试真题|GMAT在线题库|GMAT培训|GMAT网络课程|预见你想象的700">
    <link rel="icon" href="test/images/index-title.png" type="image/x-icon" sizes="16x9"/>
    <!--<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />-->
    <!--<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />-->
    <meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
    <meta name="author" content="Discuz! Team and Comsenz UI Team" />
    <meta name="copyright" content="2001-2013 Comsenz Inc." />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <meta http-equiv="MSThemeCompatible" content="Yes" />
    <base href="<?php echo $_G['siteurl'];?>" />
    <link rel="stylesheet" type="text/css" href="data/cache/style_2_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_2_home_medal.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?>    <script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', DYNAMICURL = '<?php echo $_G['dynamicurl'];?>';</script>
    <script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
    <?php if(empty($_GET['diy'])) { $_GET['diy'] = '';?><?php } ?>
    <?php if(!isset($topic)) { $topic = array();?><?php } ?>
<meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />
<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['setting']['portalstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" /><?php } ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />
<?php if($_G['setting']['groupstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" /><?php } if(helper_access::check_module('feed')) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" /><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(!empty($rsshead)) { ?><?php echo $rsshead;?><?php } if(widthauto()) { ?>
<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<link rel="stylesheet"  type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>

<!--申友-->
<!--自己写的css-->
<link rel="stylesheet" href="template/dean_tech_150528/common/my_style.css"/>
<!--<script src="template/dean_tech_150528/js/lxb.js" type="text/javascript"></script>-->
<link href="template/dean_tech_150528/common/header.css" rel="stylesheet">
<link href="template/dean_tech_150528/common/footer.css" rel="stylesheet">

<link href="template/dean_tech_150528/common/jquery-ui.custom.css" rel="stylesheet">
<link href="template/dean_tech_150528/common/jquery-ui.theme.css" rel="stylesheet">
<link href="template/dean_tech_150528/common/bootstrap.css" rel="stylesheet">
<link href="template/dean_tech_150528/common/right-bar.css" rel="stylesheet">
<link href="template/dean_tech_150528/common/layout.css" rel="stylesheet">
<link href="template/dean_tech_150528/common/bbs-index.css" rel="stylesheet">


<!--<script src="template/dean_tech_150528/js/xsteach.js" type="text/javascript"></script>-->
<!--[if lt IE 9]>
<!--<script src="template/dean_tech_150528/js/html5shiv.min.js" type="text/javascript"></script>-->
<!--<script src="template/dean_tech_150528/js/respond.min.js" type="text/javascript"></script>-->
<![endif]-->
<!--[if IE 7]>
    <!--<link rel="stylesheet" type="tex/css" href="/static/css/respond.min.js">-->
<!--[endif]-->

<link rel="stylesheet" type="text/css" href="template/dean_tech_150528/common/footer.css">
<link rel="stylesheet" type="text/css" href="template/dean_tech_150528/common/bbs-index.css">

<script src="<?php echo $_G['style']['styleimgdir'];?>/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    var jq=jQuery.noConflict();
</script>

<script language="javascript" type="text/javascript">
    function killErrors() {
        return true;
    }
    window.onerror = killErrors;
</script>
</head>

<body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?><?php if($_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)) { ?> <?php echo $cat['bodycss'];?><?php } ?>" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { include template('common/header_diy'); } if(check_diy_perm($topic)) { include template('common/header_diynav'); } if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)) { ?>
<?php echo $diynav;?>
<?php } if(empty($topic) || $topic['useheader']) { if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
<div class="xi1 bm bm_c">
    请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>
</div>
<?php } if($_G['setting']['shortcut'] && $_G['member']['credits'] >= $_G['setting']['shortcut']) { ?>
<!--<div id="shortcut">-->
    <!--<span><a href="javascript:;" id="shortcutcloseid" title="关闭">关闭</a></span>-->
    您经常访问 <?php echo $_G['setting']['bbname'];?>，试试添加到桌面，访问更方便！
    <!--<a href="javascript:;" id="shortcuttip">添加 <?php echo $_G['setting']['bbname'];?> 到桌面</a>-->

<!--</div>-->
<script type="text/javascript">setTimeout(setShortcut, 2000);</script>
<?php } ?>
<!--下面是DIY的div style="display: none;"-->
<div id="toptb" class="cl" style="display: none;">
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_top'])) echo $_G['setting']['pluginhooks']['global_cpnav_top'];?>
<div class="wp">
<div class="y">
<a id="switchblind" href="javascript:;" onClick="toggleBlind(this)" title="开启辅助访问" class="switchblind">开启辅助访问</a>
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra2'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra2'];?><?php if(is_array($_G['setting']['topnavs']['1'])) foreach($_G['setting']['topnavs']['1'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><?php echo $nav['code'];?><?php } } if(!empty($_G['style']['extstyle'])) { ?><a id="sslct" href="javascript:;" onMouseOver="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});">切换风格</a><?php } if(check_diy_perm($topic)) { ?>
<?php echo $diynav;?>
<?php } ?>
</div>
</div>
</div>


<!--头部-->
<div class="greyNav clearfix">
    <div class="inGrey clearfix">
        <div class="leftNav">
            <ul>
                <li>
                    <img src="template/dean_tech_150528/images/index_kevinIcon.png" alt="图标">
                </li>
                <li><a class="on" href="http://www.gmatonline.cn/">GMAT</a></li>
                <li><a href="http://www.toeflonline.cn/">TOEFL</a></li>
                <li><a href="http://ielts.gmatonline.cn/">IELTS</a></li>
                <li><a href="http://smartapply.gmatonline.cn/">留学</a></li>
                <li>|</li>
                <li><span>400-1816-180</span></li>
                <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1746295647&amp;site=qq&amp;menu=yes">在线咨询</a></li>
            </ul>
        </div>
        <div class="float-l nav-de">互联网一站式GMAT备考平台</div>

        <?php include template('common/header_userstatus'); ?>        <!--        app下载-->
        <div class="appDownload">
            <span title="app下载" class="tit_t">APP <b></b></span>
            <div class="pull_down">
                <ul>
                    <li>
                        <div class="first_layer">
                            <img src="template/dean_tech_150528/images/gmatapp_logo.jpg" alt="app logo图标"/>
                            <span>雷哥GMAT</span>
                        </div>
                        <div class="code_box">
                            <img src="template/dean_tech_150528/images/leigeQrCode.png" alt="app二维码图片"/>
                        </div>
                    </li>
                    <li>
                        <div class="first_layer">
                            <img src="template/dean_tech_150528/images/toeflapp_logo.jpg" alt="app logo图标"/>
                            <span>雷哥托福</span>
                        </div>
                        <div class="code_box">
                            <img src="template/dean_tech_150528/images/toeflQrCode.jpg" alt="app二维码图片"/>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--        app下载 end-->
        <div class="clearBr"></div>
    </div>
</div>

<!--<div class="nav2_fl fl">-->
    <!--<div class="relative logo_wrap inb">-->
        <!--<a href="/index.html">-->
            <!--<img src="/app/web_core/styles//app/web_core/styles/images-3/logo_3.png" alt="logo_图标">-->
        <!--</a>-->
    <!--</div>-->
   <!---->
<!--</div>-->
<div class="deanheader" id="deanheader">
    <div class="nav_list tl clearfix">

        <!--logo 图标-->
        <div class="relative logo_wrap inb">
            <h2><?php if(!isset($_G['setting']['navlogos'][$mnid])) { ?><a href="<?php if($_G['setting']['domain']['app']['default']) { ?>http://<?php echo $_G['setting']['domain']['app']['default'];?>/<?php } else { ?>./<?php } ?>" title="<?php echo $_G['setting']['bbname'];?>"><?php echo $_G['style']['boardlogo'];?></a><?php } else { ?><?php echo $_G['setting']['navlogos'][$mnid];?><?php } ?></h2>
            <!--<span></span>-->
            <div class="clear"></div>
        </div>
        <ul class="inb tm nav_bar clearfix">
            <li class="bar-li"><a href="http://www.gmatonline.cn/index.html">首页</a></li>
            <li class="bar-li">
                <a href="http://www.gmatonline.cn/practise/index.html">做题模考 <img class="crow-1" src="template/dean_tech_150528/images/crow-1.png" alt=""></a>
                <div class="nav2-wrap">
                    <ul class="nav2-list">
                        <li><a href="http://www.gmatonline.cn/question/">题库</a></li>
                        <li><a href="http://www.gmatonline.cn/learn/index.html">知识库</a></li>
                        <li><a href="http://www.gmatonline.cn/practise/index.html">做题</a></li>
                        <li><a href="http://www.gmatonline.cn/exam/index.html">模考</a></li>
                        <li><a href="http://www.gmatonline.cn/test/index.html">测评</a></li>
                    </ul>
                </div>

            </li>
            <li class="bar-li">
                <a href="http://www.gmatonline.cn/analyze">GMAT报告 <img class="crow-1" src="template/dean_tech_150528/images/crow-1.png" alt=""></a>
                <div class="nav2-wrap" style="width: 170px">
                    <ul class="nav2-list">
                        <li><a href="http://www.gmatonline.cn/analyze">Complete Report</a></li>
                        <li><a href="http://www.gmatonline.cn/analyze/sc_only.html">SC Report</a></li>
                        <li><a href="http://www.gmatonline.cn/analyze/rc_only.html">RC Report</a></li>
                        <li><a href="http://www.gmatonline.cn/analyze/cr_only.html">CR Report</a></li>
                        <li><a href="http://www.gmatonline.cn/analyze/quant_only.html">Quant Report</a></li>
                    </ul>
                </div>
            </li>
            <li class="bar-li">
                <a href="http://www.gmatonline.cn/gmatcourses/index.html">GMAT课程 <img class="crow-1" src="template/dean_tech_150528/images/crow-1.png" alt=""></a>
                <div class="nav2-wrap">
                    <ul class="nav2-list">
                        <li><a href="http://smartapply.gmatonline.cn/public-class.html">公开课</a></li>
                        <li><a href="http://www.gmatonline.cn/gmatcourses/index.html">直播课程</a></li>
                        <li><a href="http://www.gmatonline.cn/video.html">视频课程</a></li>
                    </ul>
                </div>
            </li>
            <li class="bar-li">
                <a href="http://www.gmatonline.cn/beikao/index.html">GMAT资讯 <img class="crow-1" src="template/dean_tech_150528/images/crow-1.png" alt=""></a>
                <div class="nav2-wrap" style="width: 150px;">
                    <ul class="nav2-list">
                        <li><a href="http://www.gmatonline.cn/beikao/index.html">GMAT备考</a></li>
                        <li><a href="http://www.gmatonline.cn/beikao/index.html">GMAT活动</a></li>
                        <li><a href="http://www.gmatonline.cn/beikao/index.html">商学院头条</a></li>
                        <li><a href="http://www.gmatonline.cn/beikao/index.html">GMAT考试指南</a></li>
                    </ul>
                </div>
            </li>
            <li class="on bar-li"><a href="http://bbs.gmatonline.cn/">GMAT论坛</a></li>
            <li class="bar-li"><a href="http://www.gmatonline.cn/teachers/index.html">GMAT团队</a></li>
            <li class="bar-li">
                <a href="http://www.gmatonline.cn/shop/vip/">雷豆VIP</a>
                <div class="nav2-wrap">
                    <ul class="nav2-list">
                        <li><a href="http://www.gmatonline.cn/shop/index.html">雷豆商城</a></li>
                        <li><a href="http://www.gmatonline.cn/shop/vip">VIP会员</a></li>

                    </ul>
                </div>
            </li>
        </ul>
        <?php $mnid = getcurrentnav();?>    </div>
</div>

<?php if(!IS_ROBOT) { if($_G['uid']) { ?>
<ul id="myprompt_menu" class="p_pop" style="display: none;">
    <li><a href="home.php?mod=space&amp;do=pm" id="pm_ntc" style="background-repeat: no-repeat; background-position: 0 50%;"><em class="prompt_news<?php if(empty($_G['member']['newpm'])) { ?>_0<?php } ?>"></em>消息</a></li>

    <li><a href="home.php?mod=follow&amp;do=follower"><em class="prompt_follower<?php if(empty($_G['member']['newprompt_num']['follower'])) { ?>_0<?php } ?>"></em>新听众<?php if($_G['member']['newprompt_num']['follower']) { ?>(<?php echo $_G['member']['newprompt_num']['follower'];?>)<?php } ?></a></li>

    <?php if($_G['member']['newprompt'] && $_G['member']['newprompt_num']['follow']) { ?>
    <li><a href="home.php?mod=follow"><em class="prompt_concern"></em>我关注的(<?php echo $_G['member']['newprompt_num']['follow'];?>)</a></li>
    <?php } ?>
    <?php if($_G['member']['newprompt']) { ?>
    <?php if(is_array($_G['member']['category_num'])) foreach($_G['member']['category_num'] as $key => $val) { ?>    <li><a href="home.php?mod=space&amp;do=notice&amp;view=<?php echo $key;?>"><em class="notice_<?php echo $key;?>"></em><?php echo lang('template', 'notice_'.$key); ?>(<span class="rq"><?php echo $val;?></span>)</a></li>
    <?php } ?>
    <?php } ?>
    <?php if(empty($_G['cookie']['ignore_notice'])) { ?>
    <li class="ignore_noticeli"><a href="javascript:;" onClick="setcookie('ignore_notice', 1);hideMenu('myprompt_menu')" title="暂不提醒"><em class="ignore_notice"></em></a></li>
    <?php } ?>
</ul>
<?php } if(!empty($_G['style']['extstyle'])) { ?>
<div id="sslct_menu" class="cl p_pop" style="display: none;">
    <?php if(!$_G['style']['defaultextstyle']) { ?><span class="sslct_btn" onClick="extstyle('')" title="默认"><i></i></span><?php } ?>
    <?php if(is_array($_G['style']['extstyle'])) foreach($_G['style']['extstyle'] as $extstyle) { ?>    <span class="sslct_btn" onClick="extstyle('<?php echo $extstyle['0'];?>')" title="<?php echo $extstyle['1'];?>"><i style='background:<?php echo $extstyle['2'];?>'></i></span>
    <?php } ?>
</div>
<?php } ?><div id="qmenu_menu" class="p_pop <?php if(!$_G['uid']) { ?>blk<?php } ?>" style="display: none;">
<?php if(!empty($_G['setting']['pluginhooks']['global_qmenu_top'])) echo $_G['setting']['pluginhooks']['global_qmenu_top'];?>
<?php if($_G['uid']) { ?>
<ul class="cl nav"><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<li><?php echo $nav['code'];?></li>
<?php } } ?>
</ul>
<?php } elseif($_G['connectguest']) { ?>
<div class="ptm pbw hm">
请先<br /><a class="xi2" href="member.php?mod=connect"><strong>完善帐号信息</strong></a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2 xw1"><strong>绑定已有帐号</strong></a><br />后使用快捷导航
</div>
<?php } else { ?>
<div class="ptm pbw hm">
请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2 xw1"><?php echo $_G['setting']['reglinkname'];?></a>
</div>
<?php } if($_G['setting']['showfjump']) { ?><div id="fjump_menu" class="btda"></div><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_qmenu_bottom'])) echo $_G['setting']['pluginhooks']['global_qmenu_bottom'];?>
</div><?php } ?><?php echo adshow("headerbanner/wp a_h");?><div class="clear"></div>
<div class="deanwp" id="deansubnav">
    <?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
    <ul class="p_pop h_pop" id="plugin_menu" style="display: none">
        <?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?>        <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
        <li><?php echo $module['url'];?></li>
        <?php } ?>
        <?php } ?>
    </ul>
    <?php } ?>
    <?php echo $_G['setting']['menunavs'];?>
    <div id="mu" class="cl">
        <?php if($_G['setting']['subnavs']) { ?>
        <?php if(is_array($_G['setting']['subnavs'])) foreach($_G['setting']['subnavs'] as $navid => $subnav) { ?>        <?php if($_G['setting']['navsubhover'] || $mnid == $navid) { ?>
        <ul class="cl <?php if($mnid == $navid) { ?>current<?php } ?>" id="snav_<?php echo $navid;?>" style="display:<?php if($mnid != $navid) { ?>none<?php } ?>">
            <?php echo $subnav;?>
        </ul>
        <?php } ?>
        <?php } ?>
        <?php } ?>
    </div>
    <?php echo adshow("subnavbanner/a_mu");?></div>
<!--判断是首页还是帖子页--首页板块ID=45-->
<?php if($_G['fid'] == 45 ) { ?>
<!--签到-->
<?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>
<?php } } ?>

<div class="clear"></div>
<!--<div id="wp" class="wp">-->
<script type="text/javascript">
    var loginUrl = "#";
    /*登录的链接地址*/
    var xs_www = "#";
    var xs_bbs = "#";
    var xs_static = "#";
    var xs_userInfoUrl = xs_www + '/site/user-login-info';

    if (xst.user && xst.user.info && xst.user.info.userId) {
        var xs_userAvatarUrl = '#';
        var xs_userName = xst.user.info.username || '憨憨熊';
        topUserInfo();
        $.ajax({
            type:"get",
            url:xs_userInfoUrl,
            dataType:"jsonp",
            jsonp:"callback",
            success:function (data) {
                if (data) {
                    topUserInfo(data);
                }
            }
        });
    } else {
        var topLoginHtml = '<li class="top-login"><a class="btn-login xs-pop-login-quick" href="#">登录</a>|<a href="#">注册</a></li>';
        $('#top_menu').append($(topLoginHtml));
    }

    $(function () {
        //签到跳转
        if ((getUrlParam('sign') == 'off') && (('http://' + window.location.host) != xs_bbs)) {
            showclick('pop_sign', 1);
        }
        $("#close_now").click(function () {
            $("#pop_sign").hide();
        });
        window.onresize = function () {
            showclick('pop_sign', 0);
        }
        function showclick(id2, isoff) {
            //是不是改变窗口大小时调用的showclick()方法
            if (isoff != 0) {
                $("#pop_sign").show("fast");
            }
        }

        //搜索所用参数
        var timer = null;
        var top_search_url = "#";
        var top_search_kw = null;
        var top_search_ajax = null;
        var top_search_cache = null;
        var <?php echo $top_search_input;?> = $('#top_search input').eq(0);

        //社区搜索
        $('#top_search').on('submit', 'form:eq(0)', function (e) {
            if (top_search_ajax) top_search_ajax.abort();
            if ($.trim(<?php echo $top_search_input;?>.val()) == '') {
                <?php echo $top_search_input;?>.focus();
                return false;
            }
        });
        $('#top_search').on('keyup focus', 'input:eq(0)', function (e) {
            if (e.keyCode !== 13) {
                if (timer) clearTimeout(timer);
                timer = setTimeout(function () {
                    getTopSearch(<?php echo $top_search_input;?>);
                }, 500);
            }
        });
        $(document).click(function (evt) {
            if (!$(evt.target).closest('#top_search').length) {
                $('#top_search .search-dropdown').hide();
            }
        });


        function getTopSearch(<?php echo $input;?>) {
            var val = <?php echo $input;?>.val();
            if ($.trim(val) == '') {
                $('#top_search').find('.search-dropdown').html('').hide();
                return false;
            }
            var data = {
                q:val
            };
            if (top_search_kw == val) {
                topSearchShow(top_search_cache, <?php echo $input;?>);
                return false;
            }
            top_search_kw = val;

            if (top_search_ajax) top_search_ajax.abort();
            top_search_ajax = $.ajax({
                url:top_search_url,
                type:'get',
                dataType:'jsonp',
                data:data,
                success:function (res) {
                    top_search_ajax = null;
                    var htm = topSearchResult(res);
                    top_search_cache = htm;
                    topSearchShow(htm, <?php echo $input;?>);
                    //console.dir(res);
                }
            });
        }

        function topSearchResult(data) {
            var htm = '';
            var course = '';
            var post = '';
            var user = '';
            if (data['post'] && data['post']['result'].length) {
                for (i = 0; i < data['post']['result'].length; i++) {
                    var val = data['post']['result'][i];
                    post += '<li> <a href="' + xs_bbs + '/forum/topic?tid=' + val.id + '" target="_blank">' + val.subject + '</a></li>';
                }
            }

            if (data['course'] && data['course']['result'].length) {
                for (i = 0; i < data['course']['result'].length; i++) {
                    var val = data['course']['result'][i];
                    course += '<li><a href="' + xs_www + '/course/' + val.id + '"  target="_blank"><div class="pic"><img src="' + val.imageUrl + '" alt="' + val.name + '" title="' + val.name + '"> </div>' +
                    '<div class="cont"><p>' + val.name + '</p><p class="info"><span>主讲老师：' + val.teacher.name + ' </span><span>' + val.virtualStudentCount + '人在学</span></p></div></a></li>';
                }
            }
            if (data['user'] && data['user']['result'].length) {
                for (i = 0; i < data['user']['result'].length; i++) {
                    var val = data['user']['result'][i];
                    user += '<li> <a href="' + xs_www + '/home/' + val.id + '"  target="_blank"><div class="pic"><img src="' + val.avatar + '" alt="' + val.username + '" title="' + val.username + '"></div>' +
                    '<div class="cont"><p>' + val.username + '</p><p class="info"><span>发贴：' + val.postCount + ' </span><span>帅气值：' + val.shuaiqi + ' </span><span>被赞：' + val.praise + '</span></p></div></a></li>';
                }
            }

            if (post) {
                htm += '<div class="item"><div class="hd"><h3>贴子</h3></div><div class="bd"><ul>' + post + '</ul></div></div>';
            }
            if (user) {
                htm += '<div class="item"><div class="hd"><h3>用户</h3></div><div class="bd"><ul class="pic-text search-user">' + user + '</ul></div></div>';
            }
            if (course) {
                htm += '<div class="item"><div class="hd"><h3>课程</h3></div><div class="bd"><ul class="pic-text search-course">' + course + '</ul></div></div>';
            }

            return htm;
        }


        function topSearchShow(htm, <?php echo $input;?>) {
            var <?php echo $wrap;?> = $('#top_search');
            if (<?php echo $wrap;?>.find('.search-dropdown').length) {
                <?php echo $search;?> = <?php echo $wrap;?>.find('.search-dropdown')
            } else {
                <?php echo $search;?> = $('<div class="search-dropdown"></div>');
                <?php echo $wrap;?>.append(<?php echo $search;?>);
            }
            _q = <?php echo $input;?>.val();
            if (_q) {
                _blank = <?php echo $input;?>.closest('.top-search').length ? ' target="_blank"' : ''
                if (htm) {
                    htm += '<a class="view-block" href="' + top_search_url + '?q=' + _q + '" ' + _blank + ' >查看全部搜索结果</a>';
                } else {
                    htm += '<span class="view-block sear-none" ' + _blank + '>没有搜索结果</span>';
                }
                <?php echo $search;?>.html(htm).show();
            } else {
                <?php echo $search;?>.html('').hide();
            }
        }
    });

    function topUserInfo(data) {
        var data = data || {}, count = data.count, logs = data.playLog;
        var total = '', reply = '', support = '', sysMsg = '', personMsg = '', follower = '', imMsg = '', logStr = [];
        if (count && count.total > 0) {
            total = '<i class="iconfont icon-dot">&#xe662;</i>';
            if (count.reply && count.reply > 0) {
                reply = '<i>' + count.reply + '</i>';
            }
            if (count.support && count.support > 0) {
                support = '<i>' + count.support + '</i>';
            }
            if (count.sysMsg && count.sysMsg > 0) {
                sysMsg = '<i>' + count.sysMsg + '</i>';
            }
            if (count.follower && count.follower > 0) {
                follower = '<i>' + count.follower + '</i>';
            }
            if (count.personMsg && count.personMsg > 0) {
                personMsg = '<i>' + count.personMsg + '</i>';
            }
            if (count.im && count.im > 0) {
                imMsg = '<i>' + count.im + '</i>';
            }
        }
        var msgHtml = '<li class="top-msg xs-hover">\
<a class="hover-btn iconfont" href="' + xs_www + '/user/message" title="查看消息" target="_blank">&#xe600;' + total + '</a>\
<ul class="hover-bd">\
<li><a href="' + xs_www + '/user/message/reply" target="_blank">回复/@我' + reply + '</a></li>\
<li><a href="' + xs_www + '/user/message/support" target="_blank">被赞' + support + '</a></li>\
<li><a class="xs-exchanger-chat" href="javascript:;">聊天' + imMsg + '</a></li>\
<li><a href="' + xs_www + '/user/schoolmate/follower" target="_blank">新粉丝' + follower + '</a></li>\
<li><a href="' + xs_www + '/user/message/system" target="_blank">系统消息' + sysMsg + '</a></li>\
</ul></li>';

        var avatarUrl = data.image || xs_userAvatarUrl, userName = xs_userName, menu = data.menu || {}, role = data.role;
        var rank = '', home = '', bbs = '', order = '', course = '', cart = '', union = '', student = '', workorder = '', exit = '', svip = '';
        switch (role) {
            case 0:
                rank = '试学学员';
                break;
            case 'S':
                rank = 'VIP学员';
                break;
            case 'T':
                rank = '老师';
                break;
            case 'G':
                rank = '组长';
                break;
            case 'C':
                rank = '班主任';
                break;
            case 'M':
                rank = '版主';
                break;
            case 'V':
                rank = 'SVIP';
                break;
            case 'A':
                rank = '管理员';
                break;
            case 'D':
                rank = '院长';
                break;
            default:
                rank = '试学学员';
        }
        if (menu.home && menu.home[0] && menu.home[1]) {
            home = '<li><a class="i-btn-home" href="' + menu.home[1] + '" target="_blank">' + menu.home[0] + '<i></i></a></li>';
        } else {
            home = '<li><a class="i-btn-home" href="http://www.xsteach.com/home/" target="_blank">个人主页<i></i></a></li>'
        }
        if (menu.bbs && menu.bbs[0] && menu.bbs[1]) {
            bbs = '<li><a class="i-btn-bbs" href="' + menu.bbs[1] + '" target="_blank">' + menu.bbs[0] + '<i></i></a></li>';
        } else {
            bbs = '<li><a class="i-btn-bbs" href="http://www.xsteach.com/user/message" target="_blank">我的社区<i></i></a></li>';
        }
        if (menu.order && menu.order[0] && menu.order[1]) {
            order = '<li><a class="i-btn-order" href="' + menu.order[1] + '" target="_blank">' + menu.order[0] + '<i></i></a></li>';
        } else {
            order = '<li><a class="i-btn-order" href="http://www.xsteach.com/user/order" target="_blank">我的订单<i></i></a></li>';
        }
        if (menu.course && menu.course[0] && menu.course[1]) {
            course = '<li><a class="i-btn-course" href="' + menu.course[1] + '" target="_blank">' + menu.course[0] + '<i></i></a></li>';
        } else {
            course = '<li><a class="i-btn-course" href="http://www.xsteach.com/user/learning/course" target="_blank">我的课程<i></i></a></li>';
        }
        if (menu.svip && menu.svip[0] && menu.svip[1]) {
            svip = '<li><a class="i-btn-svip" href="' + menu.svip[1] + '" target="_blank">' + menu.svip[0] + '<i></i></a></li>';
        } else {
            svip = '<li><a class="i-btn-svip" href="http://www.xsteach.com/user/svip" target="_blank">我的SVIP<i></i></a></li>';
        }
        if (menu.exit && menu.exit[0] && menu.exit[1]) {
            exit = '<li class="last"><a class="i-btn-exit" href="' + menu.exit[1] + '">' + menu.exit[0] + '<i></i></a></li>';
        } else {
            exit = '<li class="last"><a class="i-btn-exit" href="http://www.xsteach.com/logout">退出登录<i></i></a></li>';
        }
        if (menu.students && menu.students[0] && menu.students[1]) {
            student = '<li><a class="i-btn-student" href="' + menu.students[1] + '" target="_blank">' + menu.students[0] + '<i></i></a></li>';
        }
        if (menu.work && menu.work[0] && menu.work[1]) {
            workorder = '<li><a class="i-btn-workorder" href="' + menu.work[1] + '" target="_blank">' + menu.work[0] + '<i></i></a></li>';
        }
        if (menu.spread && menu.spread[0] && menu.spread[1]) {
            union = '<li><a class="i-btn-union" href="' + menu.spread[1] + '" target="_blank">' + menu.spread[0] + '<i></i></a></li>';
        }

        var userHtml = '<li class="top-user xs-hover mr10">\
<a class="hover-btn iconfont" href="http://www.xsteach.com/user" title="个人中心" target="_blank">&#xe605;</a>\
<div class="hover-bd"><dl class="hd">\
<dt><a class="pic" href="http://www.xsteach.com/user">\
<img src="' + avatarUrl + '" alt="' + userName + '" title="' + userName + '"></a></dt>\
<dd class="nick"><a href="http://www.xsteach.com/user" title="' + userName + '" target="_blank">' + userName + '</a></dd>\
<dd class="rank">' + rank + '</dd></dl><ul class="bd">' + home + bbs + order + course + svip + union + student + workorder + exit +
                '</ul></div></li>';

        if ($(logs).length) {
            $(logs).each(function (i, item) {
                var info = item.format;
                var _item = '<li>\
                <img src="' + info['imageUrl'] + '" alt="' + info['name'] + '" />\
                <a class="btn-delete iconfont hide" href="javascript:;" title="删除">&#xe623;</a>\
                <h3><a href="' + info['courseUrl'] + '" title="' + info['name'] + '" target="_blank">' + (info.isTaped ? '【课程回放】' : '') + info['name'] + '</a></h3>\
                <p><i class="iconfont">' + (info['isMobilePlatform'] ? '&#xe639;' : '&#xe674;') + '</i> 已观看至 第' + info['periodOrder'] + '节<span class="ml10">' + info['playTime'] + '</span></p>\
                </li>';
                logStr.push(_item);
            });
        }
        logStr = logStr.length ? logStr.join('') : '<li class="empty tac"> ' + (typeof logs != 'undefined' ? '没有播放记录' : '正在获取播放记录... ') + '</li>';
        <!--头部播放历史{-->
        var playLogHtml = '<li class="top-history xs-hover">\
                <a class="hover-btn iconfont" title="最近观看" href="javascript:;">&#xe67a;</a>\
                <div class="hover-bd">\
                <h2 class="hd">最近观看</h2>\
                <ul class="bd list-history">' + logStr + '</ul>\
                </div>\
                </li>';

        <!--}头部播放历史-->
        if ($('#top_menu .top-msg').length) {
            $('#top_menu .top-msg').replaceWith($(msgHtml));
            $('#top_menu .top-user').replaceWith($(userHtml));
        } else {
            $('#top_menu').append($(msgHtml + userHtml));
        }
        if ($('#top_menu .top-history').length) {
            $('#top_menu .top-history').replaceWith($(playLogHtml));
        } else {
            $('#top_menu').prepend($(playLogHtml));
        }
    }
</script>
