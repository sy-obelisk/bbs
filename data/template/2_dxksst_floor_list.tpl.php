<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$__FORMHASH = FORMHASH;$return = <<<EOF

<div align="right">
    <div class="dxksst_floor" align="left">
        
EOF;
 if($have==2) { 
$return .= <<<EOF

        <table width="100%">
            <tr>
                <td >&nbsp;</td>
                <td bgcolor="{$color}" align="center" width="80px;"><a href="javascript:;"  onclick="dxksst_toggle_main('{$upid}')"><font id="dxksst_floor_message_{$upid}">{$txt['hide']}</font></a><font>({$total_mes})</font></td>
            </tr>
        </table>
        
EOF;
 } 
$return .= <<<EOF

        <div id="dxksst_floor_{$upid}" 
EOF;
 if($have==2) { 
$return .= <<<EOF
style="background-color:{$color};" 
EOF;
 } 
$return .= <<<EOF
>
        <ul  style='margin-bottom:{$space}px; overflow:hidden;'>
            <div id="dxksst_page_{$upid}">


                <!--页面 2条显示-->
                
EOF;
 if(is_array($val)) foreach($val as $k => $v) { 
$return .= <<<EOF
                
EOF;
 if($v['pid']!='') { 
$return .= <<<EOF

                <li id="dxksst_floor_li_{$v['id']}">
                    <a href='home.php?mod=space&uid={$v['uid']}'>
                        <!--回复人-->
                        <em style="font-size: 14px!important;color: #009AFF">
                            <!--<img class="dxksst_avatar" src="{$v['avatar']}" alt='{$v['username']}'>-->

                            &nbsp;{$v['username']}
                        </em>
                    </a>
                    <!--回复内容-->
                    <em style="font-size: 14px">: {$v['message']}</em>

                    <div align="left" class="ddd_152">

                        <!--回复时间-->
                        <em style="color:#81828c;font-size: 11px!important;line-height: 18px ">
                            &nbsp;&nbsp;{$v['dateline']}&nbsp;
                        </em>
                        <!--回复-->
                        <em>

                            <a href="javascript:;" onclick="dxksst_reply({$upid},'{$v['username']}',{$v['uid']});">{$txt['reply']}</a>
                        </em>
                        <!--有权限的删除 显示-->
                        
EOF;
 if($del==1||$v['self']) { 
$return .= <<<EOF

                        <em>
                            &nbsp;
                            <a href="javascript:;" onclick="dxksst_reply_delete({$upid},{$v['id']});">{$txt['delete']}</a>
                        </em>
                        
EOF;
 } 
$return .= <<<EOF


                    </div>

                </li>
                
EOF;
 } 
$return .= <<<EOF

                
EOF;
 } 
$return .= <<<EOF





                <div id="dxksst_left_{$upid}"></div>

            </div>
            <div id="dxksst_floor_ready_{$upid}"></div>
            <div id="dxksst_floor_ready_wait_{$upid}"></div>
            <div id="dxksst_floor_dele_{$upid}" style="display:none;"></div>
            <!--回复-->
            <li 
EOF;
 if($have!=2) { 
$return .= <<<EOF
style="border-bottom:0px  dotted #ccc;" 
EOF;
 } 
$return .= <<<EOF
 >
            <table width="100%" border="0">
                <tr>
                    <td>
                        
EOF;
 if($hidden>0) { 
$return .= <<<EOF


                        <a href="javascript:;" id="dxksst_left_message_{$upid}" onclick="showleft({$upid});return false;" style="font-size: 12px!important;">
                            {$left_message}
                            {$txt['click_to_view']}
                        </a>
                        
EOF;
 } 
$return .= <<<EOF

                        <div id="dxksst_pagenum_{$upid}"></div>
                    </td>

                    <td align="right"><a href="javascript:;" onclick="showreplymodule({$upid});"><p class="dxksst_showreply">回复</p></a></td>
                </tr>
            </table>
            </li>

            <form id="dxksst_floor_form_{$upid}"  method="post" action="plugin.php?id=dxksst_floor:ajax&amp;type=reply" name="dxksst_floor_form_{$upid}" onsubmit="dxksst_submit({$upid},{$_G['uid']},'{$_G['tid']}','{$_G['fid']}',{$addn},{$mlimit},this.id,{$forbide_reply});return false;" >
                <input type="hidden" name="formhash" value="{$__FORMHASH}">
                <input type="hidden" name="submit" value="true">
                <input type="hidden" name="pid" value="{$upid}">
                <input type="hidden" name="tid" value="{$_G['tid']}" />
                <input type="hidden" name="fid" value="{$_G['fid']}" />
                <input type="hidden" name="inajax" value="1">
                <!--回复输入框-->
                <li id='dxksst_reply_module_{$upid}' style="display:none;">
                    <div align="center">
                     <textarea name="message" id="dxksst_floor_reply_{$upid}">

                     </textarea>
                    </div>
                    <div  align="right" style="height:35px;" >

                        <table width="100%" border="0">
                            <tr>
                                <td align="right">
                                    <a href="javascript:;" onclick="play_smiley({$upid})">
                                        <img src="source/plugin/dxksst_floor/images/smiley.png">
                                    </a>
                                </td>

                                <td align="right" width="55px;">
                                    <input type="hidden" name="touid" id="dxksst_floor_touid_{$upid}" value='0'>
                                    <button type="submit" class="dxksst_submit">
                                        <span >{$txt['submit']}</span>
                                    </button>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div id="dxksst_floor_smiley_{$upid}"  align="right" style="display:none;">
                        <div style="width:450px; border:1;" align="left">
                            
EOF;
 if(is_array($smiley)) foreach($smiley as $sk => $smiley1) { 
$return .= <<<EOF
                            
EOF;
 if(is_array($smiley1['img'])) foreach($smiley1['img'] as $sk1 => $sv) { 
$return .= <<<EOF
                            
EOF;
 if($self) { 
$return .= <<<EOF

                            <a href="javascript:;" onclick="dxksst_addsmiley('{$sk1}',{$upid})"> <img src="./source/plugin/dxksst_floor/images/{$sk}/{$sv}" width="20px;" height="20px;"></a>
                            
EOF;
 } else { 
$return .= <<<EOF

                            <a href="javascript:;" onclick="dxksst_addsmiley('{$sk1}',{$upid})"> <img src="{$smiley1['dir']}{$sv}" width="20px;" height="20px;"></a>
                            
EOF;
 } 
$return .= <<<EOF

                            
EOF;
 } 
$return .= <<<EOF

                            
EOF;
 } 
$return .= <<<EOF

                        </div>
                    </div>
                </li>

            </form>

        </ul>

    </div>
</div>
</div>

EOF;
?>