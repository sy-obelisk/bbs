<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
         <li>
             <a href='home.php?mod=space&uid=<?php echo $uid;?>'>
                 <em style="font-size: 14px!important;color: #009AFF">
                 <!--<img class="dxksst_avatar" src="<?php echo $avatar;?>" alt='<?php echo $username;?>' >-->
                     &nbsp;<?php echo $username;?>
            </em>
             </a>
             <em style="font-size: 14px">:<?php echo $message;?></em>
             <div align="left" class="ddd_152">
                 <em style="color:#81828c;font-size: 11px!important;line-height: 18px "><?php echo $dateline;?></em>
                 <em>
                     <a href="javascript:;" onclick="dxksst_reply(<?php echo $pid;?>,'<?php echo $_G['username'];?>');"><?php echo $txt['reply'];?></a>
                 </em>
             </div>
         </li>