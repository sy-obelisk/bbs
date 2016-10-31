<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$__FORMHASH = FORMHASH;$return = <<<EOF

<style type="text/css">
.midaben_con {
font-family:arial,"Hiragino Sans GB","Microsoft Yahei",sans-serif;
background-color:#fff;
width:{$setting['width']}px;
height:50px;
border-radius:5px;
position:relative
}
.midaben_con .midaben_signpanel {
background-color:{$setting['bcolor']};
height:50px;
display:block;
position:relative;
border-radius:4px;
background-image:url(./source/plugin/k_misign/static/tou.png);
background-repeat:no-repeat;
background-position:14px 8px;
cursor:pointer
}
.midaben_con .midaben_signpanel .font {
position:absolute;
color:#fff;
width:55px;
height:30px;
font-size:24px;
line-height:30px;
top:11px;
left:50px
}
.midaben_con .midaben_signpanel .nums {
display:none
}
.midaben_con .midaben_signpanel .fblock {
height:46px;
width:101px;
background-color:#fff;
padding-left:5px;
padding-right:5px;
position:absolute;
top:2px;
right:2px;
font-size:14px;
color:#606060
}
.midaben_con .midaben_signpanel .fblock .all {
height:23px;
line-height:26px;
padding-left:30px;
border-bottom:1px solid #eee;
background-image:url(./source/plugin/k_misign/static/tou2.jpg);
background-repeat:no-repeat;
background-position:5px 0;
margin-bottom:0;
color:#606060
}
.midaben_con .midaben_signpanel .fblock .line {
height:22px;
line-height:24px;
padding-left:30px;
width:60px;
background-image:url(./source/plugin/k_misign/static/tou2.jpg);
background-repeat:no-repeat;
background-position:5px -25px;
color:#606060
}
.midaben_con a.midaben_signpanel:hover {
background-color:{$setting['hcolor']};
}
.midaben_con a.midaben_signpanel:active {
background-color:{$setting['hcolor']};
}
.midaben_con .default {
cursor:default;
background-color:{$setting['bcolor']};
}
.midaben_con a.default:hover {
background-color:{$setting['hcolor']};
}
.midaben_con a.default:active {
background-color:{$setting['hcolor']};
}
.midaben_con .visted {
background-position:7px 8px
}
.midaben_con .visted .font {
font-size:20px;
line-height:25px;
width:60px;
left:40px;
top:8px;
text-shadow:0 1px 0 {$setting['hcolor']};
}
.midaben_con .visted .nums {
display:block;
font-size:12px;
width:56px;
text-align:center;
line-height:20px;
position:absolute;
color:#fff;
top:29px;
left:43px
}
.midaben_con .midaben_win {
width:205px;
height:115px;
background-color:#fff;
border:1px solid #dedfe3;
border-radius:5px;
position:absolute;
top:-135px;
left:10px;
box-shadow:0 5px 0 #dedfe3;
padding-left:5px;
padding-right:5px
}
.midaben_con .midaben_win .angleA {
width:0;
_border:0;
position:absolute;
bottom:-30px;
left:70px;
border-color:#dedfe3 transparent transparent;
border-style:solid;
border-width:15px
}
.midaben_con .midaben_win .angleB {
width:0;
_border:0;
position:absolute;
bottom:-20px;
left:75px;
border-color:#fff transparent transparent;
border-style:solid;
border-width:10px
}
.midaben_con .midaben_win .title {
padding-left:58px;
height:55px;
padding-top:22px;
background-repeat:no-repeat;
background-image:url(./source/plugin/k_misign/static/tou3.jpg);
background-position:0 5px;
border-bottom:1px solid #eee
}
.midaben_con .midaben_win .title h3 {
font-size:18px;
color:#434a54;
line-height:25px;
font-weight:400;
margin:0;
padding:0
}
.midaben_con .midaben_win .title .con {
font-size:12px;
color:#434a54;
line-height:20px;
font-weight:normal;
width:150px;
margin:0;
padding:0
}
.midaben_con .midaben_win .info {
height:35px;
line-height:35px;
color:#aab2bd;
font-size:14px;
text-align:center;
padding-left:10px
}
.midaben_con a.midaben_signpanel:visited,.midaben_con a.visted:visited,.midaben_con a.visted:hover,.midaben_con a.visted:active {
background-color:{$setting['bcolor']}
}

</style>
<script type="text/javascript">
function cjdsign(){
document.getElementById("JD_sign").className = 'midaben_signpanel JD_sign visted';	
document.getElementById("JD_sign").href = 'javascript:;';
document.getElementById("JD_sign").target = '_blank';
document.getElementById("JD_sign").onclick = '';
} 
</script>
<div id="midaben_sign">
    <div class="midaben_con mbm">
        <a class="midaben_signpanel JD_sign
EOF;
 if($qiandaodb['time'] >= $tdtime) { 
$return .= <<<EOF
 visted
EOF;
 } 
$return .= <<<EOF
" id="JD_sign"
EOF;
 if($qiandaodb['time'] >= $tdtime || !$_G['uid']) { 
$return .= <<<EOF
 href="javascript:;" target="_blank"
EOF;
 } else { 
$return .= <<<EOF
 href="plugin.php?id=k_misign:sign&amp;operation=qiandao&amp;formhash={$__FORMHASH}" onclick="ajaxget(this.href, this.id, '', '', '', 'cjdsign();');return false;"
EOF;
 } 
$return .= <<<EOF
>
            <div class="font">
                
EOF;
 if($qiandaodb['time'] >= $tdtime) { 
$return .= <<<EOF
已签到
EOF;
 } else { 
$return .= <<<EOF
签到
EOF;
 } 
$return .= <<<EOF

            </div>
            <span class="nums">
                连续{$qiandaodb['lasted']}天
            </span>
            <div class="fblock">
                <div class="all">
                    {$stats['todayq']}人
                </div>
                <div class="line">
                    
EOF;
 if($qiandaodb['time'] >= $tdtime) { 
$return .= <<<EOF
{$qiandaodb['row']}
EOF;
 } else { 
$return .= <<<EOF
<span style="font-size:12px;">签到看排名</span>
EOF;
 } 
$return .= <<<EOF

                </div>
            </div>
        </a>
        <div id="JD_win" class="midaben_win JD_win" style="display:none;">
            <div class="title">
                <h3>
                    签到成功
                </h3>
                <p class="con">
                </p>
            </div>
            <div class="info">
            </div>
            <div class="angleA">
            </div>
            <div class="angleB">
            </div>
        </div>
    </div>
</div>


EOF;
?><?php return $return;?>