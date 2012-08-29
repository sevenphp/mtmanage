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

	if($_SESSSION['level'] != 1){
		alertBack('无权限');
	}

	if(isset($_GET['id']) && !empty($_GET['id'])){
		//是否存在该id对应的会议记录
		mysqlQuery("SELECT `mt_id` FROM `mt_meeting_content` WHERE `mt_id`='{$_GET['id']}' LIMIT 1");
		if(mysql_affected_rows() == 1){
			//删除对应id的数据
			mysqlQuery("DELETE FROM `mt_meeting_content` WHERE `mt_id`='{$_GET['id']}'");

			if(mysql_affected_rows() == 1){
				mysql_close();
				alertLocation('删除会议记录成功!','manager.php?action=meetingmanager');
			}elseif(mysql_affected_rows() == 0){
				mysql_close();
				alertBack('删除会议记录失败!');
			}
		}elseif(mysql_affected_rows() == 0){
			//不存在该id对应的用户
			alertBack('不存在该会议记录!');
		}
	}else{
		alertBack('参数错误!');
	}
?>