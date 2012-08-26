<?php
/**
*@author              	anshao
*@date                  Aug 25, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
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
	
	$query = mysqlQuery("SELECT `mt_id` FROM `mt_meeting_content`");
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



	$sql = "SELECT `mt_id`,`mt_title`,`mt_depart`,`mt_addr`,`mt_date`,`mt_manager`,`mt_person`,`mt_record`,`mt_describe` FROM `mt_meeting_content` ORDER BY `mt_id` DESC LIMIT $pag,$pagelimit";
	$query = mysql_query($sql);

?>
<div id="look">
	<h3>会议记录</h3>
	<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<th>会议编号</th>
			<th>会议名称</th>
			<th>部门名称</th>
			<th>会议地点</th>
			<th>会议日期</th>
			<th>主持人</th>
			<th>出席人员</th>
			<th>记录人</th>
			<th>会议摘要</th>
			<th>查看详情</th>
		</tr>
		<?php
			//foreach (range(1,15) as $value) {
			$i = 1;
			$str = '';
			while($rs = fetchArray($query)){
				if($i % 2 == 0){
					$str = 'B';
				}else{
					$str = '';
				}
		?>
		<tr class="chColor<?php echo $str; ?>">
			<td><?php echo $rs['mt_id'];?></td>
			<td><?php echo $rs['mt_title'];?></td>
			<td><?php echo $rs['mt_depart'];?></td>
			<td><?php echo $rs['mt_addr'];?></td>
			<td><?php echo $rs['mt_date'];?></td>
			<td><?php echo $rs['mt_manager'];?></td>
			<td><?php echo $rs['mt_person'];?></td>
			<td><?php echo $rs['mt_record'];?></td>
			<td><?php echo $rs['mt_describe'];?></td>
			<td><a href="deatailmeeting.php?id=<?php echo $rs['mt_id'];?>"><img src="images/xiazai.gif" alt="详情" title="详情" /></a></td>
		</tr>
		<?php
			$i++;
			}
		?>
	</table>
</div>
<?php
	pageList('manager.php?action=lookmeeting','&',$pagenum,$page);
?>