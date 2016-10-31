<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class table_forum extends discuz_table {
    public function __construct() {
		$this->_table 	= '';
		$this->_pk    	= '';
		parent::__construct();
    }
    /****以下用于后台重建缩略******/
	/*获取某个版块下某个时间段的主题ID*/
	public function fetch_tids_by_timerange($fid,$starttime,$endtime,$start,$count){
		if (empty($fid)) return array();
		$starttimeAdd=$starttime ? "AND dateline>=".$starttime : '';
		$endtimeAdd=$endtime ? "AND dateline<=".$endtime : '';
		$sql=sprintf('SELECT tid,posttableid,special FROM %s WHERE fid=%d AND displayorder>=0 %s %s LIMIT %d,%d',DB::table('forum_thread'),$fid,$starttimeAdd,$endtimeAdd,$start,$count);
		return DB::fetch_all($sql);
	}
	public function count_thread_by_timerange($fid,$starttime,$endtime){
		if (empty($fid)) return 0;
		$starttimeAdd=$starttime ? "AND dateline>=".$starttime : '';
		$endtimeAdd=$endtime ? "AND dateline<=".$endtime : '';
		$sql=sprintf('SELECT count(*) FROM %s WHERE fid=%d AND displayorder>=0 %s %s',DB::table('forum_thread'),$fid,$starttimeAdd,$endtimeAdd);
		return DB::result_first($sql);
	}
	public function fetch_post_by_tid($posttableid='',$tid,$special=0){
        $post_table = 'forum_post'.($posttableid ? '_'.$posttableid: '');
		$position=($special==2)?2:1;//商品主题的首帖在第二楼,回复从第３楼开始
		$sql=sprintf("SELECT pid,message FROM %s WHERE tid=%d AND position=%d AND invisible>=0",DB::table($post_table),$tid,$position);
        return DB::fetch_first($sql);   
    }
}
?>