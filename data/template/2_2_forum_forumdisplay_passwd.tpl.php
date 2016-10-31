<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forumdisplay_passwd');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <?php echo $navigation;?></div>
</div>

<div id="ct" class="wp cl">
<div class="mn">
<div class="nfl">
<div class="f_c">
<h3 class="xs2 xi2 mbm">本版块需要密码，您必须在下面输入正确的密码才能浏览这个版块</h3>
<div class="o">
<form method="post" autocomplete="off" action="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;action=pwverify">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="password" name="pw" class="px vm" size="25" />
&nbsp;<button class="pn pnc vm" type="submit" name="loginsubmit" value="true"><strong>提交</strong></button>
</form>
</div>
</div>
</div>
</div>
</div><?php include template('common/footer'); ?>