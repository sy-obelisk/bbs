<?php
/**
 * 		Copyright���ݸ���
 * 		  WebSite��www.caogen8.co
 *             QQ: 2811931192
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class mobileplugin_dxksst_floor {} 
class mobileplugin_dxksst_floor_forum extends mobileplugin_dxksst_floor{	
 function viewthread_postbottom_mobile_output(){  //Function
 require_once libfile('function/smart','plugin/dxksst_floor');
 return floor_main(1);
}//END Function
}
class mobileplugin_dxksst_floor_group extends mobileplugin_dxksst_floor{	
 function viewthread_postbottom_mobile_output(){  //Function
 require_once libfile('function/smart','plugin/dxksst_floor');
 return floor_main(1,1);
}//END Function
}
?>