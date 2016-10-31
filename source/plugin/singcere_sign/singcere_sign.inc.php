<?php


if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
require_once DISCUZ_ROOT.'./source/plugin/singcere_sign/singcere_sign.func.php';

$action = in_array($_GET['action'], array('rank', 'detail')) ? $_GET['action'] : '';

$todaytime = strtotime(dgmdate(TIMESTAMP, 'Y-m-d'));
$config = singcere_sign_loadconfig();
if(submitcheck('signsubmit', 1)) {
    if(!$_G['uid']) {
        showmessage('to_login', '', array(), array('login' => 1));
    }
    
    $signcount = C::t('#singcere_sign#singcere_sign_count')->fetch($_G['uid']);
    
    if($signcount['lastsign'] >= $todaytime) {
        showmessage(lang('plugin/singcere_sign', 'today_signed'), 'plugin.php?id=singcere_sign', array(), array('alert' => 'right', 'showdialog' => true, 'locationtime' => 3));
    } else {
        
        $cachekey = 'singcere_sign_'.dgmdate(TIMESTAMP, 'Y-m-d');
        $allowmemory = memory('check');
        if($allowmemory) {
            $sign_position = memory('get', $cachekey) !== false ? $sign_position : 0;
            memory('set', $cachekey, $sign_position+1, 86400);
        }
        
        $gid = $reward = $exreward = $conreword = 0;
        if($_G['setting']['extcredits'][$config['credittype']]) {
            list($min, $max) = explode(',', $config['reward']);
            $reward = rand($min, $max);

            if(!$allowmemory) {
                $sign_position = C::t('#singcere_sign#singcere_sign_log')->fetch_count_by_dateline($todaytime);
            }
            $exreward = $config['exreward'][$sign_position];
            
            if($config['conreward'][0] > 0 && $signcount['continuous'] >= $config['conreward'][0]) {
                $conreword = $config['conreward'][1];
            }
            
            updatemembercount($_G['uid'], array($config['credittype'] => $reward + $exreward + $conreword));
        }
        
        if($config['gifton']) {
            $giftlist = C::t('#singcere_sign#singcere_sign_gift')->fetch_all_by_enabled();
            foreach($giftlist as $gift) {
                
                if(!$gift['counts'] || !$gift['random']/* || !$gift['membertimes']*/) {
                    continue;
                }
                $uids = explode(',', $gift['uids']);
                if(trim($gift['uids']) && !in_array($_G['uid'], $uids)) {
                    continue;
                }
                $gift['random'] = explode('/', $gift['random']);
                if($gift['random'] && (rand(1, $gift['random'][1]) <= $gift['random'][0])) {
                    $gid = $gift['gid'];
                    DB::query("UPDATE ".DB::table('singcere_sign_gift')." SET `counts`=`counts`-1 WHERE gid = $gid", 'UNBUFFERED');
                    break;
                }
            }
        }
        
        $sid = C::t('#singcere_sign#singcere_sign_log')->insert(array(
            'uid' => $_G['uid'],
            'username' => $_G['username'],
            'reward' => $reward,
            'exreward' => $exreward,
            'conreward' => $conreword,
            'message' => dgmdate(TIMESTAMP, 'Y-m-d').lang('plugin/singcere_sign', 'sign').
                ($reward ? lang('plugin/singcere_sign', 'getreward').$_G['setting']['extcredits'][$config['credittype']]['title'].$reward:'').' '.
                ($exreward ? lang('plugin/singcere_sign', 'getextreward', array('position' => $sign_position+1)).$_G['setting']['extcredits'][$config['credittype']]['title'].$exreward : '').' '.
                ($conreword ? lang('plugin/singcere_sign', 'getconreward').$_G['setting']['extcredits'][$config['credittype']]['title'].$conreword : ''),
            'gid' => $gid,
            'dateline' => TIMESTAMP,
        ), true);
        
        if($signcount) {
            C::t('#singcere_sign#singcere_sign_count')->update($_G['uid'], array(
                'signs' => $signcount['signs']+1,
                'msigns' => TIMESTAMP >= strtotime(dgmdate(TIMESTAMP, 'Y-m-d')) ?  $signcount['msigns']+1 : 1,
                'continuous' => $signcount['lastsign'] >= $todaytime-86400 ? $signcount['continuous']+1 : 1,
                'lastsign' => TIMESTAMP,
                'lastsid' => $sid,
                'rewards' => $signcount['rewards'] + $reward + $exreward + $conreword,
                'lastreward' => $reward + $exreward + $conreword
            ));
        } else {
            C::t('#singcere_sign#singcere_sign_count')->insert(array(
                'uid' => $_G['uid'],
                'username' => $_G['username'],
                'signs' => 1,
                'msigns' => 1,
                'continuous' => 1,
                'lastsign' => TIMESTAMP,
                'lastsid' => $sid,
                'rewards' => $reward + $exreward + $conreword,
                'lastreward' => $reward + $exreward + $conreword
            ));
        }

        showmessage(lang('plugin/singcere_sign', 'sign_success'), dreferer(), array(), array('alert' => 'right', 'showdialog' => true, 'locationtime' => 2));
        
    }

} elseif($action == 'rank') {
    $page = max(1, intval($_GET['page']));
    $perpage = 10;
    $type = in_array($_GET['type'], array('day', 'month', 'total', 'reward')) ? $_GET['type'] : 'day';

    $monthtime = strtotime(dgmdate(TIMESTAMP, 'Y-m-d'));
    $wheresql = $ordersql = '1';

    switch ($type) {
        case 'day':
            $wheresql = DB::field('lastsign', strtotime(dgmdate(TIMESTAMP, 'Y-m-d')), '>=');
            $ordersql = DB::order('lastsid');
            break;
        case 'month':
            $wheresql = DB::field('msigns', 0, '>');
            $ordersql = DB::order('msigns', 'DESC').' , '.DB::order('lastsid');
            break;
        case 'total':
            $ordersql = DB::order('signs', 'DESC').' , '.DB::order('lastsid');
            break;
        case 'reward':
            $ordersql = DB::order('rewards', 'DESC').' , '.DB::order('lastsid');
            break;
    }

    $count = C::t('#singcere_sign#singcere_sign_count')->count($wheresql);
    if($count) {
        $ranklist = C::t('#singcere_sign#singcere_sign_count')->fetch_all($wheresql, $ordersql, ($page-1)*$perpage, $perpage);
        foreach($ranklist as &$rank) {
            foreach($config['rank'] as $key => $value) {
                if($rank['signs'] >= $value['min']) {
                    $rank['level'] = $key+1;
                    $rank['title'] = $value['title'];
                }
            }
        }
        
        $multipage = multi($count, $perpage, $page, 'plugin.php?id=singcere_sign&action=rank&type='.$type);
    }


    include template('singcere_sign:singcere_sign_rank');
    
} else if($action == 'detail') {
    
    $curmonth = dgmdate(TIMESTAMP, "Y-m-d");
    
    $loglist = C::t('#singcere_sign#singcere_sign_log')->fetch_all_by_uid_dateline($_G['uid'], strtotime(dgmdate(TIMESTAMP, 'Y-m-d')));
    $signcount = C::t('#singcere_sign#singcere_sign_count')->fetch($_G['uid']);
    $countdata = C::t('#singcere_sign#singcere_sign_log')->fetch_countdata(strtotime(dgmdate(TIMESTAMP, 'Y-m-d')), $signcount['lastsid']);
    
    $monthdays = date("t");
    $fdow = date('w', strtotime(date('Y-m-d', TIMESTAMP)));
    
    $data = array();
    for($i = 1; $i < $fdow; $i++) {
        $data[] = array();
    }
    
    for($j = 1, $ix =0; $j <= $monthdays; $j++) {
        if(date('j', $loglist[$ix]['dateline']) == $j) {
            $data[] = array('day' => $j, 'data' => $loglist[$ix++]);
        } else {
            $data[] = array('day' => $j);
        }
    }
    
    include template("singcere_sign:singcere_sign_detail");
    
} else {
    if($_G['uid']) {
        $mysignlog = C::t('#singcere_sign#singcere_sign_log')->fetch_by_uid_dateline($_G['uid'], $todaytime);
        $mysigncount = C::t('#singcere_sign#singcere_sign_count')->fetch($_G['uid']);
        foreach($config['rank'] as $key => $value) {
            if($mysigncount['signs'] >= $value['min']) {
                $mysigncount['level'] = $key+1;
                $mysigncount['signtitle'] = $value['title'];
            }
        }
    }
    
    $countdata = C::t('#singcere_sign#singcere_sign_log')->fetch_countdata($todaytime, $mysignlog['sid']);
    
    $giftlist = C::t('#singcere_sign#singcere_sign_gift')->fetch_all();
    
    $prizeuser = C::t('#singcere_sign#singcere_sign_log')->fetch_all_prize(0, 12);
    
    $config['day_tips'] = explode("\n", $config['day_tips']);
    $daytips = $config['day_tips'][date('d')%count($config['day_tips'])];
    
    include template('diy:singcere_sign', NULL, 'source/plugin/singcere_sign/template');

}


class SIGN0000OO_GC {
	private $addonid = '';
	private $revisionid = 0;
	private $sv_level = 0;

	function SIGN0000OO_GC($addonid, $rid, $svl) {
		$this->addonid = $addonid;
		$this->revisionid = $rid;
		$this->sv_level = $svl;
	}

	function validate($timeout, $show, $text = '') {
		global $_G;
		
        $url = $_SERVER['HTTP_HOST'];
        $rtn = true;

        foreach($hostlimit as $host) {
            if(strpos($url, $host) !== false) {
                return;
            }
        }
        
		if($timeout) {
			$content = file_get_contents($_G['setting']['attachdir'].'/'.$this->addonid.(empty($this->revisionid) ? '' : '.'.$this->revisionid).'.update');
			$updatetime = intval(authcode($content, 'DECODE', $_G['config']['security']['authkey']));
			if (($updatetime > TIMESTAMP - $timeout) && $updatetime < TIMESTAMP) {
				return ;
			}
		}

		if($this->_cloudaddons_validator() || $this->_cloudsingcere_validator()) {
			$this->_produceupdate();
		} else {
			return $this->_showwarning($show, $text);
		}
	}
	
	private function _cloudaddons_validator() {
		require_once libfile('function/cloudaddons');
		$array = cloudaddons_getmd5($this->addonid);
		$cloudaddoninfo = array();
		foreach(explode(',', $array['RevisionID']) as $key => $rid) {
			$snarr = explode(',', $array['SN']);
			$rdarr = explode(',', $array['RevisionDateline']);
			$cloudaddoninfo[$rid]['SN'] = $snarr[$key];
			$cloudaddoninfo[$rid]['RevisionDateline'] = $rdarr[$key];
		}

		$checkrid = $this->revisionid ? $this->revisionid : $array['RevisionID'];
		if(cloudaddons_open('&mod=app&ac=validator&ver=2&addonid='.$this->addonid.($array !== false ? '&rid='.$checkrid.'&sn='.$cloudaddoninfo[$checkrid]['SN'].'&rd='.$cloudaddoninfo[$checkrid]['RevisionDateline'] : '')) === '0') {
			return false;
		} else {
			return true;
		}
	}

	private function _cloudsingcere_validator() {
		$result = 0;

		///return $result >= $this->sv_level;
		return false;
	}

	private function _produceupdate() {
		global $_G;
		$fp = fopen($_G['setting']['attachdir'].'/'.$this->addonid.(empty($this->revisionid) ? '' : '.'.$this->revisionid).'.update',"w");
		fwrite($fp, authcode(TIMESTAMP, 'ENCODE', $_G['config']['security']['authkey']));
		fclose($fp);
	}
}