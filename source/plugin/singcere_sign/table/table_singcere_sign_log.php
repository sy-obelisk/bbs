<?php
/**
 * 
 * 5D源码社区 全网首发 http://Www.5Ddai.Com  
 * 
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_singcere_sign_log extends discuz_table { 
    
    public function __construct() {
        $this->_table = 'singcere_sign_log';
        $this->_pk = 'sid';
        
        parent::__construct();
    }
    
    
    public function fetch_by_uid_dateline($uid, $dateline) {
        return DB::fetch_first("SELECT * FROM %t WHERE uid = %d AND dateline >= %d", array($this->_table, $uid, $dateline));
    }
    
    public function fetch_all_by_uid_dateline($uid, $dateline) {
        return DB::fetch_all("SELECT * FROM %t WHERE uid = %d AND dateline >= %d", array($this->_table, $uid, $dateline));
    }
    
    public function fetch_countdata($dateline, $lastsid) {
        return DB::fetch_first("SELECT COUNT(*) as count, uid, username ".($lastsid ? ',sum(sid <'.$lastsid.') +1 as position' : '').' FROM %t WHERE dateline >= %d', array($this->_table, $dateline));
    }
    
    public function get_position_by_uid($dateline, $usersign) {
        return DB::result_first("SELECT sum(sid < %d)+1 as position FROM %t WHERE dateline > %d ", array($usersign['lastsid'], $this->_table, $dateline));
    }
    
    public function fetch_count_by_dateline($dateline) {
        return DB::result_first("SELECT COUNT(*) FROM %t WHERE dateline >=%d", array($this->_table, $dateline));
    }
    
    public function fetch_all_prize($start, $limit) {
        return DB::fetch_all("SELECT * FROM %t WHERE gid > 0 ORDER BY dateline DESC ".DB::limit($start, $limit), array($this->_table));
    }
    
    public function count_by_gid($gid) {
        $wheresql = 'WHERE ' .($gid ? DB::field('gid', $gid) : 'gid > 0');
        return DB::result_first("SELECT COUNT(*) FROM %t %i", array($this->_table, $wheresql));
    }
    
    public function fetch_all_by_gid($gid, $start, $limit) {
        $wheresql = 'WHERE ' .($gid ? DB::field('gid', $gid) : 'gid > 0');
        return DB::fetch_all("SELECT * FROM %t %i ORDER BY dateline DESC ".DB::limit($start, $limit), array($this->_table, $wheresql));
    }
//WWW.5DDAI.COM
}