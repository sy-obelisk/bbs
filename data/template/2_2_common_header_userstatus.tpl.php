<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($_G['uid']) { ?>

<!--登录中-->

<div class="rightLogin">
    <!--登陆之后显示-->
    <div class="loginAfter">
        <div class="whiteDiv"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo avatar($_G[uid],small);?></a></div>
        <div class="leftFont">
            <span>
                <a style="color: #ffffff;padding-right: 5px;" href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间">
                <?php $slides = DB::fetch_all("SELECT * FROM `pre_common_member_profile` WHERE `uid`=$_G[uid]");?>                <?php if(is_array($slides)) foreach($slides as $slide) { ?>                <?php if($slide['field1']) { ?>
                <?php echo $slide['field1'];?>
                <?php } else { ?>
                <?php echo $_G['member']['username'];?>
                <?php } ?>
                <?php } ?>
            </a>
                <a style="color: #ffffff;" href="home.php?mod=space&amp;do=notice" id="myprompt"<?php if($_G['member']['newprompt']) { ?> class="new"<?php } ?> >提醒
                <?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a>
            </span>
            <div class="deaninfo">
                <div class="deanhove" title="操作"></div>
                <div class="clear"></div>
                <div class="deanmessage">
                    <ul>
                        <li><a href="home.php?mod=spacecp">设置</a></li>
                        <li><a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>消息</a></li>
                        <?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><li><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">进行中的任务</a></li><?php } ?>
                        <?php if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
                        <li><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a></li>
                        <?php } ?>
                        <?php if($_G['uid'] && $_G['group']['radminid'] > 1) { ?><li><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a></li><?php } ?>
                        <?php if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?><li><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">云平台</a></li><?php } ?>
                        <?php if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?><li><a href="admin.php" target="_blank">管理中心</a></li><?php } ?>
                        <li><a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: <?php echo $_G['member']['credits'];?></a></li>
                        <li><a href="home.php?mod=spacecp&amp;ac=usergroup" ><?php echo $_G['group']['grouptitle'];?></a></li>
                        <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="clearB"></div>
        <!--下拉-->
    </div>
</div>

<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<div class="deanmessage">
    <li><a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></li>
    <li><a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">激活</a></li>
    <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a></li>
</div>
<?php } elseif(!$_G['connectguest']) { ?>


<div class="rightLogin">
    <!--未登陆显示-->
    <div class="loginBefore">
        <a href="http://login.gmatonline.cn/cn/index?source=5&amp;url=http://bbs.gmatonline.cn"  class="deanlogin"><input type="button" value="登陆"></a>
        <a href="http://login.gmatonline.cn/cn/index/register?source=5&amp;url=http://bbs.gmatonline.cn" class="deanregister"><input type="button" value="注册" ></a>
    </div>
</div>

<?php } else { ?>
<div id="um">
    <div class="avt y"><?php echo avatar(0,small);?></div>
    <p>
        <strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>
        <?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
        <span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
    </p>
    <p>
        <a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: 0</a>
        <span class="pipe">|</span>用户组: <?php echo $_G['group']['grouptitle'];?>
    </p>
</div>
<?php } ?>
<script type="text/javascript">
    jq(".deanhove").hover(
            function(){
                jq(this).addClass("deanhoved");
                jq(this).siblings(".deanmessage").show();
            },
            function(){
                jq(this).removeClass("deanhoved");
                jq(this).siblings(".deanmessage").hide();
            })
    jq(".deanmessage").hover(
            function(){
                jq(this).siblings(".deanhove").addClass("deanhoved");
                jq(this).show();
            },
            function(){
                jq(this).siblings(".deanhove").removeClass("deanhoved");
                jq(this).hide();
            })
</script>