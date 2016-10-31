<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
         <li id="dxksst_floor_li_<?php echo $mood['id'];?>">
             <a href='home.php?mod=space&uid=<?php echo $mood['uid'];?>'>
                 <em style="font-size: 14px!important;color: #009AFF">
                 <!--<img class="dxksst_avatar" src="<?php echo $mood['avatar'];?>" alt='<?php echo $mood['username'];?>'>-->
                     &nbsp;<?php echo $mood['username'];?>
            </em></a>
             <em style="font-size: 14px">:<?php echo $mood['message'];?></em>
             <div align="left" class="ddd_152">
                 <em style="color:#81828c;font-size: 11px!important;line-height: 18px "><?php echo $mood['dateline'];?>&nbsp;</em>
                 <em>
                     <a href="javascript:;" onclick="dxksst_reply(<?php echo $pid;?>,'<?php echo $mood['username'];?>',<?php echo $mood['uid'];?>);"><?php echo $txt['reply'];?></a>
                 </em>
<?php if($del==1||$mood['self']) { ?>
                 <em>&nbsp;&nbsp;
                     <a href="javascript:;" onclick="dxksst_reply_delete(<?php echo $pid;?>,<?php echo $mood['id'];?>);"><?php echo $txt['delete'];?></a>
                 </em><?php } ?></div>
</li>