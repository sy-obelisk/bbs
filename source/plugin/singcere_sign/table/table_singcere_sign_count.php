<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_singcere_sign_count extends discuz_table { 
    
    public function __construct() {
        $this->_table = 'singcere_sign_count';
        $this->_pk = 'uid';

        parent::__construct();
    }
    
    public function count($wheresql) {
        $wheresql = $wheresql ? 'WHERE '.$wheresql : '';
        return DB::result_first("SELECT COUNT(*) FROM %t $wheresql", array($this->_table));
    }
    
    public function fetch_all($wheresql, $ordersql, $start = 0, $limit = 10) {
        $ordersql = $ordersql ? 'ORDER BY '.$ordersql : '';
        return DB::fetch_all("SELECT * FROM %t WHERE %i $ordersql ".DB::limit($start, $limit), array($this->_table, $wheresql));
    }
    
    public function fetch_count_by_lastsign($lastsign) {
        return DB::result_first("SELECT COUNT(*) FROM %t WHERE lastsign >=%d", array($this->_table, $lastsign));
    }
}