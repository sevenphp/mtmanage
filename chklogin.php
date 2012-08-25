<?php
/**
*@author              	anshao
*@date                  Aug 22, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

	define('IN_TAG', true);

	//echo 'xxxw';
	require('include/comm.inc.php');

	if(isset($_POST['submit'])){
		//echo 'xxx'.'<br />';
		//echo $_POST['username'].'<br />';
		//echo $_POST['pass'].'<br />';

		$user = checkUser($_POST['username'],2,20);
		$pass = checkPass($_POST['pass'],2,32);

		//echo $user.'<br />'.$pass;
		//用户是否存在
		//$sql = "SELECT `mt_id`,`mt_status` FROM `mt_meeting_user` WHERE `mt_user`='$user' AND `mt_pass`='$pass' LIMIT 1";
		$query = mysqlQuery("SELECT 
									`mt_id`,
									`mt_status`,
									`mt_user`,
									`mt_level`,
									`mt_last_logintime` 
							   FROM 
									`mt_meeting_user` 
							  WHERE 
									`mt_user`='$user' 
								AND 
									`mt_pass`='$pass' 
							  LIMIT 1
							");

		$rs = mysql_fetch_array($query);

		if(!empty($rs['mt_id'])){
			if($rs['mt_status'] == 1){
				//echo 'login';
				$_SESSION['id'] = $rs['mt_id'];
				$_SESSION['user'] = $rs['mt_user'];
				$_SESSION['level'] = $rs['mt_level'];
				$_SESSION['status'] = $rs['mt_status'];
				$_SESSION['last_time'] = $rs['mt_last_logintime'];

/*				echo "UPDATE 
									`mt_meeting` 
							   SET 
									`mt_last_logintime`='".date('Y-m-d H:i:s',time())."',
									`mt_login_count`=`mt_login_count`+1 
							 WHERE 
									`mt_id`='{$rs['mt_id']}'";
									exit();*/

				mysqlQuery("UPDATE 
									`mt_meeting_user` 
							   SET 
									`mt_last_logintime`='".date('Y-m-d H:i:s',time())."',
									`mt_login_count`=`mt_login_count`+1 
							 WHERE 
									`mt_id`='{$rs['mt_id']}'
							");

				mysql_close();
				//alertBack('用户'.$_SESSION['user'].'登录成功!');
				//alertLocation('用户'.$_SESSION['user'].'登录成功!','manager.php');
				echo '<meta http-equiv="refresh" content="2;url=manager.php" />';
		  		echo "<center><img src='images/loginwait.jpg' width='1003' height='636' /></center>";

			}else{
				alertBack('账号已被冻结,请联系管理员!');
			}
		}else{
			alertBack('账号或密码错误!请确认后再次登录!');
		}
	}