<?php
/**
 * 		Copyright���ݸ���
 * 		  WebSite��www.caogen8.co
 *             QQ: 2811931192
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_dxksst_floor {} 
class plugin_dxksst_floor_forum extends plugin_dxksst_floor{	
 function viewthread_postbottom_output(){  //Function
 require_once libfile('function/smart','plugin/dxksst_floor');
 return floor_main();
}//END Function
}
class plugin_dxksst_floor_group extends plugin_dxksst_floor{	
 function viewthread_postbottom_output(){  //Function
 require_once libfile('function/smart','plugin/dxksst_floor');
 return floor_main(0,1);
}//END Function
}
?>