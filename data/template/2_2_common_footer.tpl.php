<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
</div>
<?php if(empty($topic) || ($topic['usefooter'])) { $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
    <div class="bm">
        <div class="bm_h cl">
            <a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
            <h2>
                <?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?>
                <span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="上一条" title="上一条" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="下一条" title="下一条" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
            </h2>
        </div>
        <div class="bm_c" id="focus_con">
        </div>
    </div>
</div><?php $focusi = 0;?><?php if(is_array($_G['setting']['focus'][$_G['basescript']])) foreach($_G['setting']['focus'][$_G['basescript']] as $id) { ?><div class="bm_c" style="display: none" id="focus_<?php echo $focusi;?>">
    <dl class="xld cl bbda">
        <dt><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2" target="_blank"><?php echo $_G['cache']['focus']['data'][$id]['subject'];?></a></dt>
        <?php if($_G['cache']['focus']['data'][$id]['image']) { ?>
        <dd class="m"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" target="_blank"><img src="<?php echo $_G['cache']['focus']['data'][$id]['image'];?>" alt="<?php echo $_G['cache']['focus']['data'][$id]['subject'];?>" /></a></dd>
        <?php } ?>
        <dd><?php echo $_G['cache']['focus']['data'][$id]['summary'];?></dd>
    </dl>
    <p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">查看 &raquo;</a></p>
</div><?php $focusi ++;?><?php } ?>
<script type="text/javascript">
    var focusnum = <?php echo $focusnum;?>;
    if(focusnum < 2) {
        $('focus_ctrl').style.display = 'none';
    }
    if(!$('focuscur').innerHTML) {
        var randomnum = parseInt(Math.round(Math.random() * focusnum));
        $('focuscur').innerHTML = Math.max(1, randomnum);
    }
    showfocus();
    var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<div class="focus patch" id="patch_notice"></div>
<?php } ?><?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?><!--尾部类似导航条-->
<div id="footer_nav">
    <div>
        <span>友情链接：<a href="http://www.thinkugmat.com/" target="_blank">申友网</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="http://www.toeflonline.cn/" target="_blank">小申托福</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="http://gmat.etest.edu.cn/" target="_blank">教育部考试中心GMAT网上报名</a>
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.mba.com/china" target="_blank">The Official China GMAT Website</a>
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.tudou.com/home/gmatonline/item" target="_blank">土豆视频课程频道</a>
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://gmatonline.taobao.com/?spm=2013.1.1000126.d21.6rxSIr" target="_blank">雷哥GMAT在线官方淘宝店</a></span>
    </div>
</div>

<!--尾部内容-->
<div id="footer_content">
    <?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>
    <div id="ft" class="wp cl" >

        <!--底部导航-->
            <?php if(is_array($_G['setting']['footernavs'])) foreach($_G['setting']['footernavs'] as $nav) { if($nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile' || $nav['id'] == 'darkroom'))) { ?><?php echo $nav['code'];?><span class="pipe"></span><?php } } ?>


        <?php updatesession();?>        <!--<div style="text-align: center;color: black;margin-top: 30px;color: #696969;">-->
            <!--<span>&copy;2014-2015  smartapply.cn All Rights Reserved     沪ICP备15006607号-1</span>-->
        <!--</div>-->
    </div>

  <div class="fc_in" >

        <ul>

            <li>
                <a href="#">
                    <img src="template/dean_tech_150528/images/weixin_gzh.gif" alt="" class="hover_ewm"/>
                    <img src="template/dean_tech_150528/images/weixin.gif" alt=""/>
                    <span>雷哥GMAT在线</span>
                </a>
            </li>
            <li>
                <a href="http://weibo.com/gmatonline" target="newWindow">
                    <img src="template/dean_tech_150528/images/shenyou_weixin.gif" alt=""/>
                    <span>雷哥GMAT在线</span>
                </a>
            </li>
            <li>
                <a href="http://gmatonline.taobao.com/" target="newWindow02">
                    <img src="template/dean_tech_150528/images/taobao.gif" alt=""/>
                    <span>雷哥GMAT在线</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="template/dean_tech_150528/images/footer_qun_ewm.png" alt="" class="hover_ewm"/>
                    <img src="template/dean_tech_150528/images/qq.png" alt=""/>
                    <span>雷哥GMAT在线</span>
                </a>
            </li>
        </ul>
        <!--第二个ul-->
        <ul>

            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=1#log_reg_what">
                    <span style="margin-left: 20px">如何注册登录</span>
                </a>
            </li>

            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=2#zhangh_shz">
                    <span>账号设置</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=3#zhangh_anq">
                    <span>账号安全</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=4#found_code">
                    <span>找回密码</span>
                </a>
            </li>

        </ul>
        <!--第三个ul-->
        <ul>

            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=5#self_xuanke">
                    <span>自主选课</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=6#what_fukuan">
                    <span>如何付款</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=7#jianyi_xiaz">
                    <span>讲义下载</span>
                </a>
            </li>

            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=8#huiyuan_center">
                    <span>查看课程</span>
                </a>
            </li>
        </ul>
        <!--第四个ul-->
        <ul>

            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=9#jifen_guize">
                    <span>积分规则</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=10#ruhe_huodejf">
                    <span style="margin-left: 20px">如何获得积分</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=11#jifen_use">
                    <span style="margin-left: 20px">如何使用积分</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=12#jifen_dengji">
                    <span>积分等级</span>
                </a>
            </li>


        </ul>
        <!--第五个ul-->
        <ul style=" border-right: 1px gray solid;">

            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=13#user_fank">
                    <span>用户反馈</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=14#guanyu_us">
                    <span>关于我们</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=15#call_us">
                    <span>联系我们</span>
                </a>
            </li>
            <li>
                <a href="http://www.gmatonline.cn/index.php?web/aboutUs/index&amp;ulNum=16#free_shengm">
                    <span>版权声明</span>
                </a>
            </li>


        </ul>

            <!--微信公众号-->
            <div style="margin-left: 40px;margin-right: 20px">
                <img src="template/dean_tech_150528/images/weixin_gzh.gif" alt=""/> <br>
                <span>关注雷哥GMAT</span>
            </div>
            <!--qq群-->
            <div >
                <img src="template/dean_tech_150528/images/footer_qun_ewm.png" alt=""/> <br>
                <span>加入雷哥GMAT学习群</span>
            </div>

    </div>
    <div style="clear: both;margin-bottom: 10px;"></div>
    <div>
    <span style="font-size: 12px;color: #a2a2a2;">【雷哥GMAT在线(gmatonline)】GMAT模考|GMAT在线题库|GMAT机经|GMAT培训|GMAT网络课程|雷哥GMAT在线<br/>
        &copy;2015 gmatonline.cn All Rights Reserved&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.miitbeian.gov.cn/"
                                                                               style="font-size: 12px;color: #34388d;">京ICP备15001182号-1</a> 京公网安备11010802017681</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--统计数据-->
        <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256511954'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256511954%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
        <br/>
        <span style="font-size: 12px;color: #a2a2a2;">本网站提供的OG13&15&16、PREP07/08/12内容，其版权归GMAC所有，仅供学习者交流免费使用。本网站中所提供的GWD、Manhattan内容来源互联网，仅供学习者交流免费使用。</span>
        <br/>
        <span style="font-size: 12px;color: #a2a2a2;">本网站所提供的知识库/资料下载内容，部分来源于雷哥GMAT整理发布，版权归gmatonline.cn所有，仅供学习者交流免费使用。部分来源于互联网，版权归原作者所有，仅供学习者交流免费使用。</span>
    </div>
</div>

</div>
    <?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>


    <?php } ?>

    <?php if(!$_G['setting']['bbclosed']) { ?>
    <?php if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
    <script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
    <?php } ?>

    <?php if($_G['uid'] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])) { ?>
    <script src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
    <?php } ?>

    <?php if(!isset($_G['cookie']['sendmail'])) { ?>
    <script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
    <?php } ?>

    <?php if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])) { ?>
    <script src="misc.php?mod=patch&action=checkpatch&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
    <?php } ?>

    <?php } ?>

    <?php if($_GET['diy'] == 'yes') { ?>
    <?php if(check_diy_perm($topic) && (empty($do) || $do != 'index')) { ?>
    <script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
    <script src="<?php echo $_G['setting']['jspath'];?>portal_diy<?php if(!check_diy_perm($topic, 'layout')) { ?>_data<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript"></script>
    <?php } ?>
    <?php if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
    <script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
    <script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
    <?php } ?>
    <?php } ?>
    <?php if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
    <script type="text/javascript">patchNotice();</script>
    <?php } ?>
    <?php if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])) { ?>
    <div class="focus plugin" id="plugin_notice"></div>
    <script type="text/javascript">pluginNotice();</script>
    <?php } ?>
    <?php if(!$_G['setting']['bbclosed'] && $_G['setting']['disableipnotice'] != 1 && $_G['uid'] && !empty($_G['cookie']['lip'])) { ?>
    <div class="focus plugin" id="ip_notice"></div>
    <script type="text/javascript">ipNotice();</script>
    <?php } ?>
    <?php if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_GET['do'] != 'notice') { ?>
    <script type="text/javascript">noticeTitle();</script>
    <?php } ?>

    <?php if(($_G['member']['newpm'] || $_G['member']['newprompt']) && empty($_G['cookie']['ignore_notice'])) { ?>
    <script src="<?php echo $_G['setting']['jspath'];?>html5notification.js?<?php echo VERHASH;?>" type="text/javascript"></script>
    <script type="text/javascript">
        var h5n = new Html5notification();
        if(h5n.issupport()) {
            <?php if($_G['member']['newpm'] && $_GET['do'] != 'pm') { ?>
            h5n.shownotification('pm', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=pm', '<?php echo avatar($_G[uid],small,true);?>', '新的短消息', '有新的短消息，快去看看吧');
            <?php } ?>
            <?php if($_G['member']['newprompt'] && $_GET['do'] != 'notice') { ?>
            <?php if(is_array($_G['member']['category_num'])) foreach($_G['member']['category_num'] as $key => $val) { ?>            <?php $noticetitle = lang('template', 'notice_'.$key);?>            h5n.shownotification('notice_<?php echo $key;?>', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=notice&view=<?php echo $key;?>', '<?php echo avatar($_G[uid],small,true);?>', '<?php echo $noticetitle;?> (<?php echo $val;?>)', '有新的提醒，快去看看吧');
            <?php } ?>
            <?php } ?>
        }
    </script>
    <?php } ?>

    <?php userappprompt();?>    <?php if($_G['basescript'] != 'userapp') { ?>
    <!--<div id="scrolltop">-->
        <!--&lt;!&ndash;<?php if($_G['fid'] && $_G['mod'] == 'viewthread') { ?>&ndash;&gt;-->
        <!--<span><a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onclick="showWindow('reply', this.href)" class="replyfast" title="快速回复"><b>快速回复</b></a></span>-->
        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
        <!--<span hidefocus="true"><a title="返回顶部" onclick="window.scrollTo('0','0')" class="scrolltopa" ><b>返回顶部</b></a></span>-->
        <!--&lt;!&ndash;<?php if($_G['fid']) { ?>&ndash;&gt;-->
<!--<span>-->
<!--&lt;!&ndash;<?php if($_G['mod'] == 'viewthread') { ?>&ndash;&gt;-->
<!--<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" hidefocus="true" class="returnlist" title="返回列表"><b>返回列表</b></a>-->
<!--&lt;!&ndash;<?php } else { ?>&ndash;&gt;-->
<!--<a href="forum.php" hidefocus="true" class="returnboard" title="返回版块"><b>返回版块</b></a>-->
<!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
<!--</span>-->
        <!--&lt;!&ndash;<?php } ?>&ndash;&gt;-->
    <!--</div>-->
    <script type="text/javascript">_attachEvent(window, 'scroll', function () { showTopLink(); });checkBlind();</script>
    <?php } ?>
    <?php if(isset($_G['makehtml'])) { ?>
    <script src="<?php echo $_G['setting']['jspath'];?>html2dynamic.js?<?php echo VERHASH;?>" type="text/javascript"></script>
    <script type="text/javascript">
        var html_lostmodify = <?php echo TIMESTAMP;?>;
        htmlGetUserStatus();
        <?php if(isset($_G['htmlcheckupdate'])) { ?>
        htmlCheckUpdate();
        <?php } ?>
    </script>
    <?php } ?>
    <?php output();?><div class="xs-pop-login-form" id="xs-pop-login-form">
    <a class="pop-close" href="javascript:;"><i class="iconfont"></i></a>
    <iframe src="" marginheight="0" marginwidth="0" frameborder="0" scrolling="no" width="100%" height="100%"
            id="xs-pop-login-iframe" name="xs-pop-login-iframe">
    </iframe>
</div>

<div style="display:none">
    <span id="cnzz_stat_icon_5110270"><a href="#" target="_blank" title="站长统计">站长统计</a></span>

    <script src="js/h.js" type="text/javascript" type="text/javascript"></script>
    <a href="http://tongji.baidu.com/hm-web/welcome/ico?s=666eed3d1138aba8c53e5d28cf45cdff" target="_blank"><img
            border="0" src="images/21.gif" width="20" height="20"></a>
    <a href="http://tongji.baidu.com/hm-web/welcome/ico?s=f39ac0b4e7c154f22927ee602eda7e14" target="_blank"><img
            border="0" src="images/21.gif" width="20" height="20"></a>
</div>
<!--}页脚-->
<script src="template/dean_tech_150528/js/10041364.js" type="text/javascript"></script>


<link rel="stylesheet" type="text/css" href="template/dean_tech_150528/common/talk99.css">



<!---------------------------------------右边固定部分qq、微信、电话---------------------------------------------------->

<!-------------------咨询框------------------------>
<div class="refer_small" onclick="showZiXun()"></div>
<div class="referBox">
    <div class="refer_close" onclick="closeRefer()"></div>
    <div class="refer_top"></div>
    <div class="refer_con">
        <ul>
            <li>
                <a href="http://p.qiao.baidu.com/im/index?siteid=7905926&amp;ucid=18329536&amp;cp=&amp;cr=&amp;cw=" target="_blank">
                    <div class="comSize diffBG01"></div>
                    <p>在线咨询</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="comSize diffBG02"></div>
                    <p>微信</p>
                    <div class="tanc_mask01 animated"><img src="template/dean_tech_150528/images/r_fixed/erm-wx.jpg" alt="二维码图片"></div>
                </a>
            </li>
            <li>
                <a href="tencent://message/?uin=1746295647&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                    <div class="comSize diffBG03"></div>
                    <p>QQ</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="comSize diffBG04"></div>
                    <p>电话</p>
                    <div class="tanc_mask02 animated">400-1816-180</div>
                </a>
            </li>
            <li>
                <a href="tencent://message/?uin=2095453331&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                    <div class="comSize diffBG05"></div>
                    <p>吐槽入口</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="window.scroll(0,0)">
                    <div class="diffBG06 animated">
                        <img src="template/dean_tech_150528/images/r_fixed/refer_icon06.png" alt="回到顶部图标"/>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--/*固定部分css*/-->
<style>
    /*咨询框改版样式*/
    .referBox{
        width: 60px;
        height: 400px;
        background: #ffffff;
        border-radius: 40px;
        position: fixed;
        right: 5px;
        top: 50%;
        z-index: 55;
        margin-top: -200px;
        -webkit-box-shadow:0 0 10px #c3c3c3;
        -moz-box-shadow:0 0 10px #c3c3c3;
        box-shadow:0 0 10px #c3c3c3;
    }
    .refer_close{
        width: 15px;
        height: 15px;
        background: url("template/dean_tech_150528/images/r_fixed/refer_close.png") no-repeat;
        position: absolute;
        right: -5px;
        top: -15px;
    }
    .refer_close:hover{
        cursor: pointer;
    }
    .refer_top{
        width: 60px;
        height: 62px;
        margin-top: -10px;
        background: url("template/dean_tech_150528/images/r_fixed/refer_topImg.png") no-repeat;
        background-size: 100% 100%;
    }
    .refer_small:hover{
        cursor: pointer;
    }
    .refer_small{
        width: 60px;
        height: 62px;
        background: url("template/dean_tech_150528/images/r_fixed/refer_topImg.png") no-repeat;
        background-size: 100% 100%;
        position: fixed;
        right: 0;
        top: 50%;
        margin-top: -32px;
        display: none;
    }
    .refer_con{
        width: 100%;
    }
    .refer_con ul li a{
        width: 100%;
        display: block;
        text-align: center;
        padding: 8px 0 5px 0;
        color: #878787;
        font-size: 12px;
        border-bottom: 1px #e5e5e5 solid;
        position: relative;
    }
    .refer_con ul li:last-child a{
        border-bottom: none;
    }
    .refer_con ul li a p{
        margin-top: 5px;
    }
    .refer_con ul li:hover a{
        color: #5fabf8;
    }
    .refer_con ul li .comSize{
        width: 25px;
        height: 25px;
        margin: 0 auto;
    }
    .refer_con ul li:hover .diffBG01{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon001.png") no-repeat;
        background-size: 100% 100%;
    }
    .refer_con ul li:hover .diffBG02{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon002.png") no-repeat;
        background-size: 100% 100%;
    }
    .refer_con ul li:hover .diffBG03{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon003.png") no-repeat;
        background-size: 100% 100%;
    }
    .refer_con ul li:hover .diffBG04{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon004.png") no-repeat;
        background-size: 100% 100%;
    }
    .refer_con ul li:hover .diffBG05{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon005.png") no-repeat;
        background-size: 100% 100%;
    }
    .diffBG01{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon01.png") no-repeat;
        background-size: 100% 100%;
    }
    .diffBG02{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon02.png") no-repeat;
        background-size: 100% 100%;
    }
    .diffBG03{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon03.png") no-repeat;
        background-size: 100% 100%;
    }
    .diffBG04{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon04.png") no-repeat;
        background-size: 100% 100%;
    }
    .diffBG05{
        background: url("template/dean_tech_150528/images/r_fixed/refer_icon05.png") no-repeat;
        background-size: 100% 100%;
    }
    .diffBG06{
        width: 35px;
        height: 18px;
        margin: 0 auto;
        /*background: url("../images/refer_icon06.png") no-repeat;*/
    }
    .refer_con ul li:nth-child(2):hover .tanc_mask01{
        display: block;
        -webkit-animation-name:fadeIn;
        -webkit-animation-duration:0.8s;
        -webkit-animation-timing-function:ease-out;
        -webkit-animation-iteration-count: 1;
    }
    .refer_con ul li:nth-child(4):hover .tanc_mask02{
        display: block;
        -webkit-animation-name:fadeInLeft;
        -webkit-animation-duration:0.3s;
        -webkit-animation-timing-function:ease-out;
        -webkit-animation-iteration-count: 1;
    }
    .refer_con ul li:last-child:hover .diffBG06{
        -webkit-animation-name:bounce;
        -webkit-animation-duration:0.8s;
        -webkit-animation-timing-function:ease-out;
        -webkit-animation-iteration-count: 1;
    }
    .tanc_mask01{
        width: 113px;
        height: 107px;
        background: url("template/dean_tech_150528/images/r_fixed/bg-11.png") no-repeat;
        position: absolute;
        left: -113px;
        top: -20px;
        display: none;
        padding: 10px 13px 10px 10px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }
    .tanc_mask01 img{
        width: 100%;
    }
    .tanc_mask02{
        width: 212px;
        height: 45px;
        line-height: 45px;
        background: url("template/dean_tech_150528/images/r_fixed/bg-12.png") no-repeat;
        position: absolute;
        left: -212px;
        top: 10px;
        color: #ffffff;
        font-size: 22px;
        display: none;
    }
</style>

<script type="text/javascript">
    //关闭咨询框
    function closeRefer(){
        var referBox=document.getElementsByClassName("referBox")[0];
        var refer_small=document.getElementsByClassName("refer_small")[0];
        referBox.style.display="none";
        refer_small.style.display="block";
    }
    //点击小的咨询展示大的咨询
    function showZiXun(){
        var referBox=document.getElementsByClassName("referBox")[0];
        var refer_small=document.getElementsByClassName("refer_small")[0];
        referBox.style.display="block";
        refer_small.style.display="none";
    }

</script>

<script src="template/dean_tech_150528/js/bootstrap.js" type="text/javascript"></script>
<!--<script src="template/dean_tech_150528/js/calendar.js" type="text/javascript"></script>-->
<!--<script src="template/dean_tech_150528/js/jquery-ui.js" type="text/javascript"></script>-->
<!--<script src="template/dean_tech_150528/js/head.js" type="text/javascript"></script>-->
<!--<script src="template/dean_tech_150528/js/forum.js" type="text/javascript"></script>-->
<!--<script src="template/dean_tech_150528/js/image-show.js" type="text/javascript"></script>-->
<!--<script src="template/dean_tech_150528/js/pop-user.js" type="text/javascript"></script>-->
</body>
</html>
