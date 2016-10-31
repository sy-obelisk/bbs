<?php
/**
 * 		Copyright���ݸ���
 * 		 WebSite��www.caogen8.co
 *       QQ:2811931192
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
 
class table_smart  extends discuz_table
{
	public function __construct() {

		$this->_table = 'dxksst_floor';
		$this->_pk    = 'id';
		parent::__construct();
	}
    public function get_floor_authorid($pid){
		$author=DB::fetch_first("SELECT authorid FROM ".DB::table('forum_post')." where pid=".$pid);
		return $author['authorid'];
		}
	public function get_moderators_by_pid($pid){
		$fid=DB::result_first("SELECT fid FROM ".DB::table("forum_post")." where pid=".intval($pid));
		return DB::result_first("SELECT moderators FROM ".DB::table("forum_forumfield")." where fid=".intval($fid));
		}	
	public function after_success_insert($member,$tid,$fid,$lastpost){
		$query=DB::query("UPDATE ".DB::table('forum_thread')." set lastpost=".time().",lastposter='".$member[author]."',replies=replies+1 where tid=".$tid);
		$query=DB::query("UPDATE ".DB::table('forum_forum')." set posts=posts+1,todayposts=todayposts+1,lastpost='$lastpost' where fid=".$fid);
		$query=DB::query("UPDATE ".DB::table('common_member_count')." set posts=posts+1 where uid=".$member[authorid]);	
		}	
	public function insert_post_to_discuz($data){
		if(isset($data['tid'])) {
		$thread = C::t('forum_thread')->fetch($data['tid']);
		$tableid = $thread['posttableid'];
		} else {
			$tableid = $data['tid'] = 0;
		}
		$pid = C::t('forum_post_tableid')->insert(array('pid' => null), true);
		$data = array_merge($data, array('pid' => $pid));
		C::t('forum_post')->insert($tableid, $data);
		if($pid % 1024 == 0) {
			C::t('forum_post_tableid')->delete_by_lesspid($pid);
		}
		savecache('max_post_id', $pid);
		return $pid;
		}		
	public function count_by_where($where) {
		    if (is_array($where)) {
			$where = " AND ".implode($where, ' AND ');
		}	else $where=" AND ".$where;	
		$sql="SELECT COUNT(*) FROM " .DB::table($this->_table)." WHERE 1=1 ".$where;
		return DB::result_first($sql);
	}
	public function fetch_first_by_id($id){
		return DB::fetch_first("SELECT * FROM ".DB::table($this->_table)." where id=".$id);
		}
	public function fetch_all_by_where($where, $orderby, $start = 0, $ppp = 0) {
	    if (is_array($where)) {
			$where = " AND ".implode($where, ' AND ');
		}
		else $where=" AND ".$where;	
		$sql="SELECT a.* FROM ".DB::table($this->_table)." as a WHERE 1=1 ".$where." ORDER BY ".$orderby." LIMIT ".$start.",".$ppp;
		//echo $sql;
		return DB::fetch_all($sql);
	}
	public function fetch_need_by_where($where, $orderby, $start = 0, $ppp = 0) {
	    if (is_array($where)) {
			$where = " AND ".implode($where, ' AND ');
		}	else $where=" AND ".$where;	
		$sql="SELECT a.tid,a.subject,b.attachment FROM ".DB::table($this->_table)." as a
		left join ".DB::table('forum_threadimage')." as b on a.tid=b.tid where  1=1 ".$where." ORDER BY ".$orderby." LIMIT ".$start.",".$ppp;
		//debug($sql);
		return DB::fetch_all($sql);
	}
	public function fetch_threadpost_by_where($where, $orderby, $start = 0, $ppp = 0) {
	    if (is_array($where)) {
			$where = " AND ".implode($where, ' AND ');
		}	else $where=" AND ".$where;	
		$sql="SELECT a.tid,a.subject,b.message FROM ".DB::table($this->_table)." as a
		left join ".DB::table('forum_post')." as b on a.tid=b.tid where  1=1 ".$where." ORDER BY ".$orderby." LIMIT ".$start.",".$ppp;
		//debug($sql);
		return DB::fetch_all($sql);
	}
	public function delete_by_where($where) {
	   if (is_array($where)) {
			$where = " AND ".implode($where, ' AND ');
		}	else $where=" AND ".$where;	
		$sql="DELETE FROM ".DB::table($this->_table)." WHERE 1=1 ".$where;
		return DB::query($sql);
	
	}
		public function insert_new($data) {
		return DB::insert($this->_table,$data);
	
	}
	public function batch_insert_new($data){
		$sql="insert into ".DB::table($this->_table);
		foreach ($data as $k=>$v){$sql.=$this->get_condition($v,0)." values";break;}
		foreach($data as $value){$sql.=$this->get_condition($value,1,"'");break;}
		foreach($data as $value){
				$sql.=",".$this->get_condition($value,1,"'");
			}
		return DB::query($sql);	
		}
	public function update_by_where($data,$where) {
	   if (is_array($where)) {
			$where = " AND ".implode($where, ' AND ');
		}	else $where=" AND ".$where;	
		$where="1=1 ".$where;
		return DB::update($this->_table,$data,$where);
	
	}
	public function  get_by_array($data){
		 $con=$this->get_condition($data,1);   
		 $sql="select * FROM ".DB::table($this->_table)." where tid IN ".$con;
		 return DB::fetch_all($sql);
		 }
	public function get_tmessage_by_array($data){
		 $con=$this->get_condition($data,1);
		 $sql="select pid,tid,message FROM ".DB::table("forum_post")." where first=1 AND tid IN ".$con; 
		 return DB::fetch_all($sql);
			}	 
	private function get_condition($data,$type,$add=''){
		 foreach ($data as $k=>$v){$first=$type?$v:$k;unset($data[$k]);break;}//ȡ�ò�ȥ����һ��
		 $con="(";
		 if(is_array($data)){
			 foreach ($data as $k=>$v){
				 if($type) $con.=$add.$v.$add.',';
				 else $con.=$add.$k.$add.',';
				 }
			 }
		 $con.=$first.')';
		//echo $first;
		return $con;  
		}	    
}


?>