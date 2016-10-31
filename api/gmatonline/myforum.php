<?php
require_once 'mysql.class.php';
require_once 'cls_json.php';
header('Access-Control-Allow-Origin:*');//解决跨域

define ('DB_TYPE','mysql');
define ('DB_HOST','localhost');
define ('DB_USER','db_bbsgmat');
define ('DB_PWD','UQ8VQyR92MVbuf5K');
define ('DB_NAME','db_gamtbbs');
define ('DB_CHARSET','utf8');


$arr = array("code" => 0, "message" => "非法操作！");
$json = new JSON;
$db = new Mysql();
$db->connect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
if(empty($_POST)){
    $gid=$_GET['gid'];
    $fid=$_GET['fid'];
    $num=$_POST['num'];
}else{
    $fid=$_POST['fid'];
    $gid=$_POST['gid'];
    $num=$_POST['num'];
}

if(!empty($gid)){
    $sql="SELECT * from pre_forum_thread  where fid IN(SELECT fid from pre_forum_forum where fup=".$gid.") and displayorder>=0 ORDER BY displayorder desc,dateline desc LIMIT 0,".$num;
}
if(!empty($fid)){   
	//$sql="SELECT * from pre_forum_thread  where fid=".$fid." and displayorder>=0  ORDER BY dateline desc limit 0,".$num;
    $sql="SELECT * from pre_forum_thread  where fid IN(38,213,193) and displayorder>=0  ORDER BY dateline desc limit 0,".$num;
}
if($fid==37){
    $sql="SELECT * from pre_forum_thread  where fid IN(229,230) and displayorder>=0 ORDER BY displayorder desc,dateline desc LIMIT 0,".$num;
}
if($fid==36){
    $sql="SELECT * from pre_forum_thread  where fid IN(138,141,142,139,140,166) and displayorder>=0 ORDER BY displayorder desc,dateline desc LIMIT 0,".$num;
}
if($fid==2){
	$sql="SELECT * from pre_forum_thread  where displayorder>=0 and fid IN(2,95) ORDER BY displayorder desc,dateline desc LIMIT 0,".$num;
}
$res=$db->findAll($sql);//print_r($res);
if(!empty($res)){
    $arr['code']=1;
    $arr['data']=$res;
    $arr['message']="成功";
}
die($json -> encode($arr));






?>