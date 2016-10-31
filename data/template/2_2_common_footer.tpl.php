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
<div id="fixed_div">
    <a target=blank href=tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes>
        <div class="fixed_div_img" onmouseover="bacMouseover(this)" onmouseout="bacMouseout(this)">
            <img src="template/dean_tech_150528/images/public_qq.png" alt="qq图片"/>
            <p>QQ咨询</p>
        </div>
    </a>

    <div class="fixed_div_img fx_div_img_weixin" onmouseover="bacMouseover(this)" onmouseout="bacMouseout(this)">
        <img src="template/dean_tech_150528/images/public_weixin.png" alt="微信图片"/>
        <p>微信咨询</p>
        <div class="img01">
            <div>
                <img src="template/dean_tech_150528/images/right_erweima_img.jpg" alt="" width="90px"/>
            </div>
        </div>

    </div>
    <div class="fixed_div_img fx_div_img_phone" onmouseover="bacMouseover(this)" onmouseout="bacMouseout(this)">
        <img src="template/dean_tech_150528/images/public_phone.png" alt="电话图片"/>
        <p>电话咨询</p>
        <div class="img02">
            <span>400-1816-180</span>
        </div>
    </div>
    <a href="index.php?web/ceping">
        <div class="fixed_div_img" onmouseover="bacMouseover(this)" onmouseout="bacMouseout(this)">
            <img src="template/dean_tech_150528/images/public_cheping.png" alt="在线测评"/>
            <p style="margin-top: 5px;">在线测评</p>
        </div>
    </a>
    <div class="fixed_div_img fx_div_img_top" style="padding-top: 12px;" onclick="window.scrollTo('0','0');" onmouseover="bacMouseover(this)" onmouseout="bacMouseout(this)">
        <img src="template/dean_tech_150528/images/public_top.png" alt="回到顶部"/>
    </div>
</div>


<!--/*固定部分css*/-->
<style>
    #fixed_div {
        width: 60px;
        position: fixed;
        top: 25%;
        right: 20px;
        z-index: 5;
    }

    #fixed_div .fixed_div_img {
        width: 69px;
        height: 69px;
        background: #b2b2b2;
        margin-bottom: 5px;
        position: relative;
        color: white;
        font-size: 12px;
        text-align: center;
        padding-top: 7px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }
    .fixed_div_img:hover{
        /*background: #00a1e8;*/
        cursor: pointer;

    }

    .fixed_div_img .img01 {
        width: 133px;
        height: 126px;
        background: url("template/dean_tech_150528/images/weixin_show.png") center no-repeat;
        position: absolute;
        right: 60px;
        top: -35px;
        display: none;
    }

    .fixed_div_img .img01 div {
        width: 100px;
        height: 100px;
        position: absolute;
        left: 41%;
        margin-left: -41px;
        top: 50%;
        margin-top: -50px;
    }

    .fixed_div_img .img01 div img {
        margin-top: 5px;
        margin-left: 5px;
    }

    .fixed_div_img .img02 {
        width: 212px;
        height: 45px;
        line-height: 45px;
        background: url("template/dean_tech_150528/images/phone_show.png") center no-repeat;
        position: absolute;
        right: 70px;
        top: 10px;
        display: none;
        text-align: center;
    }

    .fixed_div_img .img02 span {
        color: white;
        font-size: 20px;
        letter-spacing: 2px;
    }

    .fx_div_img_phone:hover .img02 {
        display: block;
    }

    .fx_div_img_weixin:hover .img01 {
        display: block;
    }

#log_reg_zzc{
    background: #000;
    opacity: .4;
    filter: alpha(opacity=40);
    position: absolute;
    left: 0;
    top: 0;
    display: none;
}
</style>


<!--弹出框登陆与注册界面遮罩层-->
<div id="log_reg_zzc"></div>
<script>
    function isStrictMode() {
        return document.compatMode != "BackCompat"
    }
    function getHeight() {
        return isStrictMode() ? Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) : Math.max(document.body.scrollHeight, document.body.clientHeight)
    }
    function getWidth() {
        return isStrictMode() ? Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth) : Math.max(document.body.scrollWidth, document.body.clientWidth)
    }
    var wenzW = getWidth();
    var wenzH = getHeight();
    var zzc=document.getElementById("log_reg_zzc");
    zzc.style.width=wenzW + "px";
    zzc.style.height=wenzH + "px";
</script>
<script type="text/javascript">
    function bacMouseover(self){
        self.style.backgroundColor="#00a1e8";
    }
    function bacMouseout(self){
        self.style.backgroundColor="#b2b2b2";
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
