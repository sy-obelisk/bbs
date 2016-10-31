<?php
/**
 *
 *
 *
 */
class dxksst_page{
	private $table;
	private $order;
	private $maxnum;
	private $maxpage;
	private $each_num;
	private $where;
	function dxksst_page($table,$where='',$order,$each_num){
		$this->table=$table;
		$this->order=$order;
		$this->each_num=$each_num;
		$maxnum=C::t("#dxksst_floor#smart")->count_by_where($where);
		$this->maxnum=$maxnum;
		$this->where=$where;
		if(($maxnum%$each_num)==0){$maxpage=(int)($maxnum/$each_num);}
	    else{$maxpage=(int)($maxnum/$each_num)+1;}
		$this->maxpage=$maxpage;
		}
	function getpage($page){
		$page=(int)($page);
		if($page>=($this->maxpage))$page=$this->maxpage;
		if($page<=0)$page=1;
		$result=C::t("#dxksst_floor#smart")->fetch_all_by_where($this->where,$this->order,(($page-1)*$this->each_num),$this->each_num);
		return $result;}
	 function getaround($page,$around){
		 $return=array();
		 for($i=0;$i<=2*$around;$i++){
		$thispage=$page-$around+$i;
		if(($thispage>=1)&&($thispage<=$this->maxpage))
		$return[]=$thispage;
			 }
		return $return;	 
		 }
		
			
	function _get($name){return $this->$name;}
	function _set($name,$value){$this->$name=$value;}
	
	
	}
?>