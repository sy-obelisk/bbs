<?php
/**
 * 		Copyright���ݸ���
 * 		  WebSite��www.caogen8.co
 *             QQ: 2811931192
 */
function str_preg($str){
	$ar=str_split($str);
	$tn="$^*()+={}[]|/:<>.?'\"";
	$tn=str_split($tn);
	$re="/";
	foreach($ar as $k=>$v){
	 if(in_array($v,$tn)){$v="\\".$v;}
	 $re=$re.$v;}
	 $re=$re."/";
	 return $re;
	}	
	?>