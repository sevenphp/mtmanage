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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Manager</title>
		<link type="text/css" rel="stylesheet" href="styles/style.css" />
		<link type="text/css" rel="stylesheet" href="styles/manager.css" />
		<link type="text/css" rel="stylesheet" href="styles/page_list.css" />
		<link type="text/css" rel="stylesheet" href="styles/main-left.css" />
		<link type="text/css" rel="stylesheet" href="styles/main-right.css" />
		<link type="text/css" rel="stylesheet" href="styles/addmeeting.css" />
		<?php
			if(isset($_GET['action']) && $_GET['action'] == 'lookmeeting'){
		?>
		<link type="text/css" rel="stylesheet" href="styles/lookmeeting.css" />
		<script type="text/javascript" src="js/lookmeeting.js"></script>
		<?php
			}
		?>
		<?php
			if(isset($_GET['action']) && $_GET['action'] == 'findmeeting'){
		?>
		<link type="text/css" rel="stylesheet" href="styles/findmeeting.css" />
		<?php
			}
		?>
		<?php
			if(isset($_GET['action']) && $_GET['action'] == 'managemeeting'){
		?>
		<link type="text/css" rel="stylesheet" href="styles/changepass.css" />
		<?php
			}
		?>
		<?php
			if(isset($_GET['action']) && $_GET['action'] == 'usermanager'){
		?>
		<link type="text/css" rel="stylesheet" href="styles/usermanager.css" />
		<?php
			}
		?>
		<?php
			if(isset($_GET['action']) && $_GET['action'] == 'departmanager'){
		?>
		<link type="text/css" rel="stylesheet" href="styles/departmanager.css" />
		<?php
			}
		?>				
		<?php
			if(isset($_GET['action']) && $_GET['action'] == 'meetingmanager'){
		?>
		<link type="text/css" rel="stylesheet" href="styles/meetingmanager.css" />
		<?php
			}
		?>

		<script type="text/javascript" src="js/manager.js"></script>
	</head>
	<body>
		<div id="container">
			<?php
				include 'include/header.inc.php';
			?>
			<div id="title">
				<span class="fontB">尊敬的</span>:<?php echo $_SESSION['user'];?> <span class="fontB">您的身份</span>:<?php echo $sfHtml;?> <span class="fontB">当前日期</span>:<?php echo date('Y-m-d',time());?> <span class="fontB">上次登录日期</span>:<?php echo $_SESSION['last_time'];?> <span class="fontB">当前为第</span><?php echo $rsLogin['mt_login_count'];?><span class="fontB">次登录</span>&nbsp;&nbsp;<a href="manager.php">返回首页</a>&nbsp;&nbsp;<a href="logout.php" title="退出" name="logout"><img src="images/over3.png" alt="退出" title="退出"/></a>
			</div>
			<div id="main">
				<?php include 'include/slider.inc.php';?>
				<div id="main-right">
					<h4>
						当前位置 >> 
						<?php
							if(!isset($_GET['action']) || empty($_GET['action'])){
								echo '<a href="###">首页</a>';
							}else{
								switch ($_GET['action']) {
									case 'addmeeting':
										echo '<a href="###">添加会议记录</a>';
										break;
									case 'lookmeeting':
										echo '<a href="###">浏览会议记录</a>';
										break;
									case 'findmeeting':
										echo '<a href="###">查找会议记录</a>';
										break;
									case 'managemeeting':
										echo '<a href="###">管理用户信息</a>';
										break;
									case 'usermanager':
										echo '<a href="###">用户账号管理</a>';
										break;
									case 'departmanager':
										echo '<a href="###">部门信息管理</a>';
										break;
									case 'meetingmanager':
										echo '<a href="###">会议信息管理</a>';
										break;
								}
							}
						?>
					</h4>
					<?php
							if(!isset($_GET['action']) || empty($_GET['action'])){
								include 'include/introduce.inc.php';
							}else{
								switch ($_GET['action']) {
									case 'addmeeting':
										include 'addmeeting.php';
										break;
									case 'lookmeeting':
										include 'lookmeeting.php';
										break;
									case 'findmeeting':
										include 'findmeeting.php';
										break;
									case 'managemeeting':
										include 'changepass.php';
										break;
									case 'usermanager':
										include 'usermanager.php';
										break;
									case 'departmanager':
										include 'departmanager.php';
										break;
									case 'meetingmanager':
										include 'meetingmanager.php';
										break;
								}								
							}
						//include 'include/introduce.inc.php'; 
						//include 'addmeeting.php';
					?>

				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<?php
				include 'include/footer.inc.php';
			?>
		</div>
	</body>
</html>