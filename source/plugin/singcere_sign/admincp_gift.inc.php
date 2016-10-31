<?php
/*
 * CopyRight  : [5DDAI.COM!] (C)2014-2015
 * Document   : 5D源码社区：www.5ddai.com
 * Created on : 2015-03-27,14:03:15
 * Author     : 5D耀扬(QQ：193719567) Www.5Ddai.Com $
 */

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

$plang = $scriptlang['singcere_sign'];

admincp_showsubmenu(null, array(
    array($plang['gift'], 'plugins&operation=config&do=9&identifier=singcere_sign&pmod=admincp_gift', $_GET['paction'] == ''),
    array($plang['gift_record'], 'plugins&operation=config&do=9&identifier=singcere_sign&pmod=admincp_gift&paction=record', $_GET['paction'] == 'record'),
));


if($_GET['paction'] == 'record') {
    if(!submitcheck('deletesubmit')) {
        $perpage = 15;
        $page = max(1, intval($_GET['page']));
        
        showformheader('plugins&operation=config&identifier=singcere_sign&pmod=admincp_gift&paction=record');
        showtableheader();
        showsubtitle(array('', 'username', $plang['gift_id'], $plang['gift_name'], $plang['gift_dateline']));
        $count = C::t('#singcere_sign#singcere_sign_log')->count_by_gid();
        if($count) {
            $giftlist = C::t('#singcere_sign#singcere_sign_gift')->fetch_all();
            $signlist = C::t('#singcere_sign#singcere_sign_log')->fetch_all_by_gid(0, ($page-1)*$perpage, $perpage);
            foreach($signlist as $sign) {
                showtablerow("", array('class="td25"', 'class="td25"', 'class="td32"', 'class="td32"', ''), array(
                        "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$sign[sid]\">", 
                        $sign['username'],
                        $sign['gid'],
                        $giftlist[$sign['gid']]['name'],
                        dgmdate($sign['dateline'], 'u'),
                       ));
            }
            $multipage = multi($count, $perpage, $page, ADMINSCRIPT.'?action=plugins&operation=config&identifier=singcere_sign&pmod=admincp_gift&paction=record');
            showsubmit('deletesubmit', 'delete', '', '', $multipage);
        }
        showtablefooter();
        showformfooter();
    } else {
        C::t('#singcere_sign#singcere_sign_log')->update($_GET['delete'], array('gid' => 0));
        cpmsg('forums_update_succeed', 'action=plugins&operation=config&identifier=singcere_sign&pmod=admincp_gift&paction=record', 'succeed');
    }
} else {
    if(!submitcheck('giftsubmit')) {
        $perpage = 20;
        $page = max(1, intval($_GET['page']));
        showtips($plang['gift_tips']);
        showformheader('plugins&operation=config&identifier=singcere_sign&pmod=admincp_gift');
        showtableheader();
        showsubtitle(array('', 'enable', 'display_order', $plang['gift_name'], $plang['gift_uids'], $plang['gift_counts'], /*'重复中奖次数',*/ $plang['gift_random']));
        $count = C::t('#singcere_sign#singcere_sign_gift')->count();
        
        if($count) {
            $giftlist = C::t('#singcere_sign#singcere_sign_gift')->fetch_all_by_displayorder(($page-1)*$perpage, $perpage);
            foreach($giftlist as $gift) {
                showtablerow("", array('class="td25"', 'class="td25"', 'class="td25"', 'class="td32"', 'class="td31"', 'class="td25"', /*'class="td32"',*/ ''), array(
                    "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$gift[gid]\">", 
                    "<input class=\"checkbox\" type=\"checkbox\" name=\"enable[$gift[gid]]]\" value=\"1\" ".($gift['enable'] ? "checked=\"checked\"" : "").">",
                    "<input type=\"text\" class=\"txt\"  name=\"displayorder[$gift[gid]]\" value=\"$gift[displayorder]\">",
                    "<input type=\"text\" size=\"15\"  name=\"name[$gift[gid]]\" value=\"$gift[name]\">",
                    "<input type=\"text\"  size=\"35\" name=\"uids[$gift[gid]]\" value=\"$gift[uids]\">",
                    "<input type=\"text\"  name=\"counts[$gift[gid]]\" value=\"$gift[counts]\">",
                    //"<input type=\"text\"  name=\"membertimes[$gift[gid]]\" value=\"$gift[membertimes]\">",
                    "<input type=\"text\"  name=\"random[$gift[gid]]\" value=\"$gift[random]\">"));
            }
            $multipage = multi($count, $perpage, $page, ADMINSCRIPT.'?action=plugins&operation=config&identifier=singcere_sign&pmod=admincp_gift');
        }
        
        showtablerow('', array('', '', 'width="100" colspan="6"'),
            array("", "<div><a href=\"###\" onclick=\"addrow(this, 0)\" class=\"addtr\">".  cplang('add')."</a></div>", "", "")
        );
        showsubmit('giftsubmit', 'submit', 'del', '', $multipage);
        showtablefooter();
        showformfooter();
print <<<EOF
	<script type="text/JavaScript">
	var rowtypedata = [
		[[1,''],[1,''], [1,'<input type="text" class="txt" name="newdisplayorder[]" value="0" />', 'td25'],[1,'<input type="text" size="15" name="newname[]"/>', ''],[1, '<input type="text" size="35" name="newuids[]"/>', ''],[1, '<input type="text" name="newcounts[]"/>', ''], [1, '<input type="text" class="" name="newrandom[]"/>', '']],
	];
    </script>
EOF;
    } else {
        if(is_array($_GET['delete'])) {
            DB::update('singcere_sign_log', array('gid' => 0), DB::field('gid', $_GET['delete']));
            C::t('#singcere_sign#singcere_sign_gift')->delete($_GET['delete']);
        }
        
        foreach($_GET['newname'] as $key => $newname) {
            if(empty($newname)) continue;
            $uids = implode(',', array_map('intval', explode(',', $_GET['newuids'][$key])));
            $random = array_map('intval', explode('/', $_GET['newrandom'][$key]));
            C::t('#singcere_sign#singcere_sign_gift')->insert(array(
                'displayorder' => intval($_GET['newdisplayorder'][$key]),
                'name' => dhtmlspecialchars($newname),
                'uids' => $uids == 0 ? '' : $uids,
                'counts' => intval($_GET['newcounts'][$key]),
                //'membertimes' => intval($_GET['newmembertimes'][$key]),
                'random' => $random[0] <= $random[1] && $random[0] != 0 && $random[1] != 0 ? "$random[0]/$random[1]" : "",
            ));
        }
        
        foreach($_GET['name'] as $key => $newname) {
            if(empty($newname)) continue;
            $uids = implode(',', array_map('intval', explode(',', $_GET['uids'][$key])));
            $random = array_map('intval', explode('/', $_GET['random'][$key]));
            C::t('#singcere_sign#singcere_sign_gift')->update($key, array(
                'enable' => intval($_GET['enable'][$key]),
                'displayorder' => intval($_GET['displayorder'][$key]),
                'name' => dhtmlspecialchars($newname),
                'uids' => $uids == 0 ? '' : $uids,
                'counts' => intval($_GET['counts'][$key]),
                //'membertimes' => intval($_GET['membertimes'][$key]),
                'random' => $random[0] <= $random[1] && $random[0] != 0 && $random[1] != 0 ? "$random[0]/$random[1]" : "",
            ));
        }
        
        cpmsg('forums_update_succeed', 'action=plugins&operation=config&identifier=singcere_sign&pmod=admincp_gift', 'succeed');
    }
}


function admincp_showsubmenu($title, $menus = array(), $right = '', $replace = array()) {
    if (empty($menus)) {
        $s = '<div style="margin-top:-8px;">' . $right . '<h3>' . cplang($title, $replace) . '</h3></div>';
    } elseif (is_array($menus)) {
        $s = '<div style="margin-top:-8px;">' . $right . '<h3>' . cplang($title, $replace) . '</h3><ul class="tab1">';
        foreach ($menus as $k => $menu) {
            if (is_array($menu[0])) {
                $s .= '<li id="addjs' . $k . '" class="' . ($menu[1] ? 'current' : 'hasdropmenu') . '" onmouseover="dropmenu(this);"><a href="#"><span>' . cplang($menu[0]['menu']) . '<em>&nbsp;&nbsp;</em></span></a><div id="addjs' . $k . 'child" class="dropmenu" style="display:none;">';
                if (is_array($menu[0]['submenu'])) {
                    foreach ($menu[0]['submenu'] as $submenu) {
                        $s .= $submenu[1] ? '<a href="' . ADMINSCRIPT . '?action=' . $submenu[1] . '" class="' . ($submenu[2] ? 'current' : '') . '" onclick="' . $submenu[3] . '">' . cplang($submenu[0]) . '</a>' : '<a><b>' . cplang($submenu[0]) . '</b></a>';
                    }
                }
                $s .= '</div></li>';
            } else {
                $s .= '<li' . ($menu[2] ? ' class="current"' : '') . '><a href="' . (!$menu[4] ? ADMINSCRIPT . '?action=' . $menu[1] : $menu[1]) . '"' . (!empty($menu[3]) ? ' target="_blank"' : '') . '><span>' . cplang($menu[0]) . '</span></a></li>';
            }
        }
        $s .= '</ul></div>';
    }
    echo!empty($menus) ? '<div class="">' . $s . '</div>' : $s;
//From:Www@5 D d a i@Com
}