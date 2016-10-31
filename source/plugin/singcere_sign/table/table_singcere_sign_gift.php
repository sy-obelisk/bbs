<?php
/**
 * 
 * 5D源码社区 全网首发 http://Www.5Ddai.Com  
 * 
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_singcere_sign_gift extends discuz_table { 
    
    public function __construct() {
        $this->_table = 'singcere_sign_gift';
        $this->_pk = 'gid';
        
        parent::__construct();
    }
    
    public function fetch_all_by_displayorder($start, $limit) {
        return DB::fetch_all("SELECT * FROM %t ORDER BY displayorder ".DB::limit($start, $limit), array($this->_table));
    }
    
    public function fetch_all_by_enabled() {
        return DB::fetch_all("SELECT * FROM %t WHERE enable = 1", array($this->_table), $this->_pk);
    }
    
    public function fetch_all() {
        return DB::fetch_all("SELECT * FROM %t", array($this->_table), $this->_pk);
    }
//www.5 d d a i.com
}