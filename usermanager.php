<?php
/**
*@author              	anshao
*@date                  Aug 27, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}

	if($_SESSION['level'] != 1){
		alertLocation('没有权限访问!','manager.php');
	}

	if(isset($_GET['page'])){	//为$_GET['page']做判断,
		$page = $_GET['page'];
		if(empty($page) || $page<0 || !is_numeric($page)){	//进行容错
			$page = 1;
		}else{
			$page = intval($_GET['page']);
		}
	}else{
		$page = 1;
	}
	$pagelimit = 10;	//每分页显示10条数据
	
	$query = mysqlQuery("SELECT `mt_id` FROM `mt_meeting_user`");
	$counter = mysql_num_rows($query);		//总记录条数
	
	if($counter == 0){
		$pagenum = 1;	//如果没有数据,默认第一页
	}else{
		$pagenum = ceil($counter/$pagelimit);		//总页数
	}
	
	if($page > $pagenum){	//如果$_GET['page']传递的参数的值大于总页数,用总页数覆盖$_GET['page']传递的值
		$page = $pagenum;
	}
	$pag = ($page-1)*$pagelimit;


	$query = mysqlQuery("SELECT 
								`mt_id`,
								`mt_user`,
								`mt_depart`,
								`mt_level`,
								`mt_status`,
								`mt_last_logintime`,
								`mt_last_ip` 
				       	  FROM 
								`mt_meeting_user`
					  ORDER BY
					  			`mt_id`
					  	   ASC
					  	 LIMIT  $pag,$pagelimit
						")

?>
<div id="usermanager">
	<h3>用户账号详情</h3>
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>ID</th>
				<th>用户名</th>
				<th>所属部门</th>
				<th>用户权限</th>
				<th>用户状态</th>
				<th>最后登录时间</th>
				<th>最后登录IP</th>
				<th>更改权限</th>
				<th>更改状态</th>
				<th>删除</th>
			</tr>
			<?php
				while($rs = fetchArray($query)){

					$id = $rs['mt_id'];

					//权限
					if($rs['mt_level'] == 1){
						$level = '管理员';
						/*if($rs['mt_user'] == $_SESSION['user']){*/
							$levelHtml = '<a href="updatelevel.php?action=unlevel&id='.$id.'">取消权限</a>';
/*						}else{
							
							$levelHtml = '取消权限';
						}*/		
					}elseif($rs['mt_level'] == 0){
						$level = '普通用户';
						$levelHtml = '<a href="updatelevel.php?action=level&id='.$id.'">设置权限</a>';
					}

					//状态
					if($rs['mt_status'] == 1){
					/*	if($rs['mt_user'] == $_SESSION['user']){*/
							$status = '正常';
							$statusHtml = '<a href="updatestatus.php?action=unactive&id='.$id.'">冻结账号</a>';
/*						}else{
							$statusHtml = '冻结账号';
						}*/
					}elseif($rs['mt_status'] == 0){
						$status = '冻结';
						$statusHtml = '<a href="updatestatus.php?action=active&id='.$id.'">解封账号</a>';
					}

					//删除
					if($rs['mt_level'] == 1){
						if($rs['mt_user'] == $_SESSION['user']){
							$delHtml = '<a href="deluser.php?id='.$id.'" name="deluser">删除</a>';
						}else{
							$delHtml = '删除';
						}
					}else{
						$delHtml = '<a href="deluser.php?id='.$id.'" name="deluser">删除</a>';
					}
					
			?>
			<tr>
				<td><?php echo $rs['mt_id'];?></td>
				<td><?php echo $rs['mt_user'];?></td>
				<td><?php echo $rs['mt_depart'];?></td>
				<td><?php echo $level;?></td>
				<td><?php echo $status;?></td>
				<td><?php echo $rs['mt_last_logintime'];?></td>
				<td><?php echo $rs['mt_last_ip'];?></td>
				<td><?php echo $levelHtml; ?></td>
				<td><?php echo $statusHtml; ?></td>
				<td><?php echo $delHtml; ?></td>
			</tr>
			<?php
				}
			?>
			<tr>
				<td colspan="10">
					<a href="adduser.php">添加用户</a>
				<td>
			</tr>
		</tbody>
	</table>
</div>
<?php
	pageList('manager.php?action=usermanager','&',$pagenum,$page);
?>