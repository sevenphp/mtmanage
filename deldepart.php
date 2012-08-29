<?php
/**
*@author              	anshao
*@date                  Aug 22, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	define('IN_TAG', true);

	require('include/comm.inc.php');

	isAccess();

	if($_SESSION['level'] != 1){
		alertLocation('没有权限访问!','manager.php');
	}
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		mysqlQuery("SELECT `mt_id` FROM `mt_meeting_depart` WHERE `mt_id`='{$_GET['id']}' LIMIT 1");
		if(mysql_affected_rows() == 1){
			//删除对应id的数据
			mysqlQuery("DELETE FROM `mt_meeting_depart` WHERE `mt_id`='{$_GET['id']}'");

			if(mysql_affected_rows() == 1){
				mysql_close();
				alertLocation('删除部门成功!','manager.php?action=departmanager');
			}elseif(mysql_affected_rows() == 0){
				mysql_close();
				alertBack('删除部门失败!');
			}			
		}
	}else{
		alertBack('参数错误!');
	}
?>