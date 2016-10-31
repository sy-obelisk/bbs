<?php


if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

function singcere_sign_loadconfig() {
    global $_G;
    static $config;
    if(empty($config)) {
        $config = $_G['cache']['plugin']['singcere_sign'];
        $config['rank'] = array();
        foreach(explode("\n", $_G['cache']['plugin']['singcere_sign']['rank']) as $rankrow) {
            list($signs, $title) = explode('=', $rankrow);
            $config['rank'][] = array('min' => $signs, 'title' => $title);
        }

        foreach(array('exreward', 'conreward', 'fakeuid') as $item) {
            $config[$item] = array_map('intval', explode(',', $_G['cache']['plugin']['singcere_sign'][$item]));
        }
        $config['panel_on'] = unserialize($config['panel_on']);
    }
    
    return $config;
}

function singcere_sign_fakesign($config) {
    
    global $_G;
    if(!$config['fakeon'] || empty($config['fakeuid'])) {
        return false;
    }
    
    if(discuz_process::islocked('singcere_sign_fakesign', 600)) {
		return false;
	}
    
    shuffle($config['fakeuid']);
    $uids = array_slice($config['fakeuid'], 0, $config['fakerandom'] ? $config['fakerandom'] : 50);
    if(($_G['uid'] && $key = array_search($_G['uid'],$uids))){
        unset($uids[$key]);
    }
    
    $cachekey = 'singcere_sign_'.dgmdate(TIMESTAMP, 'Ymd');
    $allowmemory = memory('check');
    $todaytime = strtotime(dgmdate(TIMESTAMP, 'Ymd'));
    $fake_success = 0;
    foreach($uids as $uid) {
        $user = getuserbyuid($uid);
        if(empty($user)) {
            continue;
        }
        
        $signcount = C::t('#singcere_sign#singcere_sign_count')->fetch($uid);
        if($signcount['lastsign'] >= $todaytime) {
            continue;
        }
        
        if($allowmemory) {
            $sign_position = memory('get', $cachekey) !== false ? $sign_position : 0;
            memory('set', $cachekey, $sign_position+1, 86400);
        }
        
        $reward = $exreward = $conreword = 0;
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

            updatemembercount($uid, array($config['credittype'] => $reward + $exreward + $conreword));
        }
        
        
        $sid = C::t('#singcere_sign#singcere_sign_log')->insert(array(
            'uid' => $uid,
            'username' => $user['username'],
            'reward' => $reward,
            'exreward' => $exreward,
            'conreward' => $conreword,
            'dateline' => TIMESTAMP,
        ), true);

        if($signcount) {
            C::t('#singcere_sign#singcere_sign_count')->update($uid, array(
                'signs' => $signcount['signs']+1,
                'msigns' => TIMESTAMP >= strtotime(dgmdate(TIMESTAMP, 'Ym01')) ?  $signcount['msigns']+1 : 1,
                'continuous' => $signcount['lastsign'] >= $todaytime-86400 ? $signcount['continuous']+1 : 1,
                'lastsign' => TIMESTAMP,
                'lastsid' => $sid,
                'rewards' => $signcount['rewards'] + $reward + $exreward + $conreword,
                'lastreward' => $reward + $exreward + $conreword
            ));
        } else {
            C::t('#singcere_sign#singcere_sign_count')->insert(array(
                'uid' => $uid,
                'username' => $user['username'],
                'signs' => 1,
                'msigns' => 1,
                'continuous' => 1,
                'lastsign' => TIMESTAMP,
                'lastsid' => $sid,
                'rewards' => $reward + $exreward + $conreword,
                'lastreward' => $reward + $exreward + $conreword
            ));
        }
        $fake_success++;
    }
    
    discuz_process::unlock('singcere_sign_fakesign');
    return $fake_success;

}
