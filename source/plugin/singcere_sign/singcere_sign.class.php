<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class plugin_singcere_sign {
    protected $_config = array();
    function plugin_singcere_sign() {
        global $_G;
        require_once DISCUZ_ROOT.'./source/plugin/singcere_sign/singcere_sign.func.php';
        
        $this->_config = singcere_sign_loadconfig();
    }
    
    function global_header() {
        global $_G;
        
        $todaytime = strtotime(dgmdate(TIMESTAMP, 'Ymd'));
        if($this->_config['fakeon'] && !empty($this->_config['fakeuid'])) {
            $allowmemory = memory('check');
            $cachekey = 'singcere_sign_'.dgmdate(TIMESTAMP, 'Ymd');
            if($allowmemory) {
                $sign_position = memory('get', $cachekey) !== false ? $sign_position : 0;
            } else {
                $sign_position = C::t('#singcere_sign#singcere_sign_count')->fetch_count_by_lastsign($todaytime);
            }

            if($sign_position == $this->_config['fakeposition']) {
                $sign_position += singcere_sign_fakesign($this->_config);
            }
        }
        
        $panel_on = in_array('all', $this->_config['panel_on']) || in_array(CURSCRIPT.'_'.CURMODULE, $this->_config['panel_on']) || (CURSCRIPT == 'plugin' && in_array('plugin', $this->_config['panel_on']));
        
        if($panel_on && !(CURSCRIPT == 'plugin' && CURMODULE == 'singcere_sign')) {
            if($_G['uid']) {
                $mysigncount = C::t('#singcere_sign#singcere_sign_count')->fetch($_G['uid']);
            }
            
            if(!($this->_config['panel_display'] && $mysigncount['lastsign'] > $todaytime)) {
                $countdata = C::t('#singcere_sign#singcere_sign_log')->fetch_countdata($todaytime, $mysigncount['lastsid']);
                include template("singcere_sign:singcere_sign_panel");
            }
            
            return $return;
        }
        
        
    }
    
    function global_footer() {
        global $_G;
        
    }

}
?>

