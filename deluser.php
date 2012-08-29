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
		//是否存在该id对应的用户
		mysqlQuery("SELECT `mt_id` FROM `mt_meeting_user` WHERE `mt_id`='{$_GET['id']}' LIMIT 1");
		if(mysql_affected_rows() == 1){
			//删除对应id的数据
			mysqlQuery("DELETE FROM `mt_meeting_user` WHERE `mt_id`='{$_GET['id']}'");

			if(mysql_affected_rows() == 1){
				mysql_close();
				alertLocation('删除用户成功!','manager.php?action=usermanager');
			}elseif(mysql_affected_rows() == 0){
				mysql_close();
				alertBack('删除用户失败!');
			}
		}elseif(mysql_affected_rows() == 0){
			//不存在该id对应的用户
			alertBack('不存在该用户!');
		}
	}else{
		alertBack('参数错误!');
	}
?>