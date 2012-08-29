<?php
/**
*@author              	anshao
*@date                  Aug 26, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

	define('IN_TAG', true);

	//echo 'xxxw';
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

	//获取会议记录内容详情
	if(isset($_GET['id']) && !empty($_GET['id'])){
		//检查是否有该会议记录
		mysqlQuery("SELECT `mt_id` FROM `mt_meeting_content` WHERE `mt_id`='{$_GET['id']}' LIMIT 1");
		if(mysql_affected_rows() == 0){
			alertBack('不存在该会议记录!');
		}

		//取得结果集
		$rs = mysqlFetchArray("SELECT `mt_id`,`mt_title`,`mt_addr`,`mt_depart`,`mt_manager`,`mt_person`,`mt_record`,`mt_date`,`mt_describe`,`mt_content` FROM `mt_meeting_content` WHERE `mt_id`='{$_GET['id']}' LIMIT 1");

		//会议内容
		//$handle = fopen($rs['mt_content'],'r');	//以只读模式打开文件,返回句柄

		$content = file_get_contents($rs['mt_content']);	//获取文件内容

		//fclose($handle);	//关闭文件句柄

		$content = htmlspecialchars($content);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link type="text/css" rel="stylesheet" href="styles/style.css" />
		<link type="text/css" rel="stylesheet" href="styles/manager.css" />
		<link type="text/css" rel="stylesheet" href="styles/detailmeeting.css" />
		<title>Manager</title>
	</head>
	<body>
		<div id="container">
			<?php
				include 'include/header.inc.php';
			?>
			<div id="title">
				<span class="fontB">尊敬的</span>:<?php echo $_SESSION['user'];?> <span class="fontB">您的身份</span>:<?php echo $sfHtml;?> <span class="fontB">当前日期</span>:<?php echo date('Y-m-d',time());?> <span class="fontB">上次登录日期</span>:<?php echo $_SESSION['last_time'];?> <span class="fontB">当前为第</span><?php echo $rsLogin['mt_login_count'];?><span class="fontB">次登录</span>&nbsp;&nbsp;<a href="manager.php">返回首页</a>&nbsp;&nbsp;<a href="logout.php" title="退出" name="logout"><img src="images/over3.png" alt="退出" title="退出"/></a>
			</div>
			<div id="detail">
				<h4>会议记录详情</h4>
				<form action="printwindow.php" method="post">
					<input type="hidden" name="mtid" value="<?php echo $rs['mt_id'];?>" />
					<table border="1" cellspacing="0">
						<tbody>
							<tr>
								<td class="tdname">会议编号:</td>
								<td class="tdvalue"><?php echo $rs['mt_id'];?></td>
								<td class="tdname">会议名称:</td>
								<td class="tdvalue"><?php echo $rs['mt_title'];?></td>
							</tr>
							<tr>
								<td class="tdname">部门名称:</td>
								<td class="tdvalue"><?php echo $rs['mt_depart'];?></td>
								<td class="tdname">会议地点:</td>
								<td class="tdvalue"><?php echo $rs['mt_addr'];?></td>
							</tr>
							<tr>
								<td class="tdname">会议日期:</td>
								<td class="tdvalue"><?php echo $rs['mt_date'];?></td>
								<td class="tdname">会议主持人:</td>
								<td class="tdvalue"><?php echo $rs['mt_manager'];?></td>
							</tr>
							<tr>
								<td class="tdname">会议出席人:</td>
								<td class="tdvalue"><?php echo $rs['mt_person'];?></td>
								<td class="tdname">会议记录人:</td>
								<td class="tdvalue"><?php echo $rs['mt_record'];?></td>
							</tr>
							<tr>
								<td class="tdname">会议摘要:</td>
								<td class="tdvalue" colspan="3"><?php echo $rs['mt_describe'];?></td>
							</tr>
							<tr>
								<td class="tdname">会议内容:</td>
								<td class="tdvalue"  colspan="3"><pre><?php echo $content;?></pre></td>
							</tr>
							<tr>
								<td colspan="4"><input type="submit" name="printview" value="打印预览" class="printview" title="ie下使用"/>&nbsp;&nbsp;<input type="submit" title="ie下使用" name="print" value="打印" class="print" />&nbsp;&nbsp;<a href="javascript:;" onclick="history.back();">返回</a></td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
			<div class="clear"></div>
			<?php
				include 'include/footer.inc.php';
			?>			
		</div>
	</body>
</html>