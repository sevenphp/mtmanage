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

	if(isset($_GET['action']) && !empty($_GET['id'])){
		if($_GET['action']=='unlevel'){
			//是否存在该id对应的用户
			mysqlQuery("SELECT `mt_id` FROM `mt_meeting_user` WHERE `mt_id`='{$_GET['id']}' LIMIT 1");

			if(mysql_affected_rows() == 1){
				mysqlQuery("UPDATE `mt_meeting_user` SET `mt_level`='0' WHERE `mt_id`='{$_GET['id']}'");
				if(mysql_affected_rows() == 1){
					mysql_close();
					alertLocation('取消账号权限成功!','manager.php?action=usermanager');
				}elseif(mysql_affected_rows() == 0){
					mysql_close();
					alertLocation('取消账号权限失败!','manager.php?action=usermanager');
				}
			}elseif(mysql_affected_rows() == 0){
				alertBack('不存在该用户!');
			}
		}elseif($_GET['action'] == 'level'){
			//是否存在该id对应的用户
			mysqlQuery("SELECT `mt_id` FROM `mt_meeting_user` WHERE `mt_id`='{$_GET['id']}' LIMIT 1");

			if(mysql_affected_rows() == 1){
				mysqlQuery("UPDATE `mt_meeting_user` SET `mt_level`='1' WHERE `mt_id`='{$_GET['id']}'");
				if(mysql_affected_rows() == 1){
					mysql_close();
					alertLocation('设置账号权限成功!','manager.php?action=usermanager');
				}elseif(mysql_affected_rows() == 0){
					mysql_close();
					alertLocation('设置账号权限失败!','manager.php?action=usermanager');
				}			
			}elseif(mysql_affected_rows() == 0){
				alertBack('不存在该用户!');
			}
		}else{
			alertBack('参数错误!');
		}
	}else{
		alertBack('参数错误!');
	}
?>