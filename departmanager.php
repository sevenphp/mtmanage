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

	//显示所有部门
	$query = mysqlQuery("SELECT `mt_id`,`mt_depart_name` FROM `mt_meeting_depart`");

	//新增部门
	if(isset($_POST['sub'])){
		$depart = chkMtDepart($_POST['departname'],2,20);
		mysqlQuery("INSERT INTO `mt_meeting_depart`(`mt_depart_name`) VALUES('$depart')");

		if(mysql_affected_rows() == 1){
			mysql_close();
			alertLocation('新增部门成功!','manager.php?action=departmanager');
		}elseif(mysql_affected_rows() == 0){
			mysql_close();
			alertLocation('新增部门失败!','manager.php?action=departmanager');
		}
	}

?>
<div id="departmanager">
	<h3>部门详情</h3>
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>ID</th>
				<th>部门名称</th>
				<th>操作</th>
			</tr>
			<?php
				if(mysql_affected_rows() == 0){
			?>
			<tr>
				<td colspan="3">还没有部门,请尽快添加</td>
			</tr>
			<?php
				}elseif(mysql_affected_rows() != 0){
				while($rs = fetchArray($query)){
			?>
			<tr>
				<td><?php echo $rs['mt_id'];?></td>
				<td><?php echo $rs['mt_depart_name'];?></td>
				<td><a href="deldepart.php?id=<?php echo $rs['mt_id'];?>" name="deldepart">删除</a></td>
			</tr>
			<?php		
					}
				}
			?>
		</tbody>
	</table>
</div>
<div id="adddepart">
	<form action="" method="post">
		部门名称:<input type="text" name="departname" class="departname" />&nbsp;&nbsp;<input type="submit" name="sub" value="新增部门" />
	</form>
</div>