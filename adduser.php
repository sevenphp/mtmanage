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

	//显示身份
	if($_SESSION['level'] == 1){
		$sfHtml = '管理员';
	}elseif($_SESSION['level'] == 0){
		$sfHtml = '普通用户';
	}

	//获取该用户登录次数
	$rsLogin = mysqlFetchArray("SELECT 
										`mt_login_count` 
								FROM 
										`mt_meeting_user` 
								WHERE 
										`mt_user`='{$_SESSION['user']}' 
								LIMIT 	1
								");

	//获取部门信息
	$query = mysqlQuery("SELECT `mt_id`,`mt_depart_name` FROM `mt_meeting_depart`");	

	//添加用户
	if(isset($_POST['sub'])){
		//定义一个数组用来接受POST过来的数据
		$userInfo = array();

		//通过部门id获取部门名称
		$rs = mysqlFetchArray("SELECT `mt_depart_name`FROM `mt_meeting_depart` WHERE `mt_id`='{$_POST['depart']}'");

		if(mysql_affected_rows() == 0){
			alertBack('请选择部门');
		}

		//exit();

		$userInfo['user'] = mysql_real_escape_string(checkUser($_POST['user'],2,20));
		$userInfo['pass'] = mysql_real_escape_string(checkPass($_POST['pass'],6,30));
		$userInfo['depart'] = mysql_real_escape_string($rs['mt_depart_name']);

		mysqlQuery("INSERT INTO `mt_meeting_user`(`mt_user`,`mt_pass`,`mt_depart`) VALUES('{$userInfo['user']}','{$userInfo['pass']}','{$userInfo['depart']}')");

		if(mysql_affected_rows() == 1){
			mysql_close();
			alertLocation('新增用户成功!','manager.php?action=usermanager');
		}elseif(mysql_affected_rows() == 0){
			mysql_close();
			alertBack('新增用户失败!');
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Add User</title>
		<link type="text/css" rel="stylesheet" href="styles/style.css" />
		<link type="text/css" rel="stylesheet" href="styles/adduser.css" />
		<script type="text/javascript" src="js/adduser.js"></script>
	</head>
	<body>
		<div id="container">
			<?php
				include 'include/header.inc.php';
			?>
			<div id="title">
				<span class="fontB">尊敬的</span>:<?php echo $_SESSION['user'];?> <span class="fontB">您的身份</span>:<?php echo $sfHtml;?> <span class="fontB">当前日期</span>:<?php echo date('Y-m-d',time());?> <span class="fontB">上次登录日期</span>:<?php echo $_SESSION['last_time'];?> <span class="fontB">当前为第</span><?php echo $rsLogin['mt_login_count'];?><span class="fontB">次登录</span>&nbsp;&nbsp;<a href="manager.php">返回首页</a>&nbsp;&nbsp;<a href="logout.php" title="退出" name="logout"><img src="images/over3.png" alt="退出" title="退出"/></a>
			</div>
			<div id="adduser">
				<form action="" method="post">
					<dl>
						<dt>添加用户</dt>
						<dd><labell>用户名:<input type="text" name="user"/></labell></dd>
						<dd><labell>密&#12288;码:<input type="password" name="pass"/></labell></dd>
						<dd>部&#12288;门:
							<select name="depart" id="">
								<option value="0">选择部门</option>
								<?php
									while($rs = fetchArray($query)){
								?>
								<option value="<?php echo $rs['mt_id'];?>"><?php echo $rs['mt_depart_name'];?></option>
								<?php
									}
								?>
							</select>
						</dd>
						<dd class="adduser"><input type="submit" name="sub" value="添加用户"/>&nbsp;&nbsp;<a href="javascript:;" name="back">返回</a></dd>
					</dl>
				</form>
			</div>
			<div class="clear"></div>
			<?php
				include 'include/footer.inc.php';
			?>			
		</div>		
	</body>
</html>