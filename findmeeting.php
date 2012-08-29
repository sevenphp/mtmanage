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

	if(isset($_POST['search'])){
		$searchInfo = array();
		$searchInfo['keyword'] = strtolower(chkSearchKeyword($_POST['keyword']));
		$searchInfo['type'] = chkSearchType($_POST['searchtype']);

		if($searchInfo['type'] == 1){
			//按会议编号查找

/*			if(isset($_GET['page'])){	//为$_GET['page']做判断,
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
			
			$query = mysqlQuery("SELECT `mt_id` FROM `mt_meeting_content` WHERE `mt_id`='{$searchInfo['keyword']}'");
			$counter = mysql_num_rows($query);		//总记录条数
			
			if($counter == 0){
				$pagenum = 1;	//如果没有数据,默认第一页
			}else{
				$pagenum = ceil($counter/$pagelimit);		//总页数
			}
			
			if($page > $pagenum){	//如果$_GET['page']传递的参数的值大于总页数,用总页数覆盖$_GET['page']传递的值
				$page = $pagenum;
			}
			$pag = ($page-1)*$pagelimit;*/
			//$query = mysqlQuery("SELECT * FROM `mt_meeting_content` WHERE `mt_id`='{$searchInfo['keyword']}' ORDER BY `mt_id` DESC LIMIT $pag,$pagelimit");

			$query = mysqlQuery("SELECT * FROM `mt_meeting_content` WHERE `mt_id`='{$searchInfo['keyword']}' ORDER BY `mt_id` DESC");
		}elseif($searchInfo['type'] == 2){
			//按会议名称查找

		/*	if(isset($_GET['page'])){	//为$_GET['page']做判断,
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
			
			$query = mysqlQuery("SELECT `mt_id` FROM `mt_meeting_content` WHERE `mt_title` LIKE '%{$searchInfo['keyword']}%'");
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
			$query = mysqlQuery("SELECT * FROM `mt_meeting_content` WHERE `mt_title` LIKE '%{$searchInfo['keyword']}%' ORDER BY `mt_id` DESC LIMIT $pag,$pagelimit");*/

			$query = mysqlQuery("SELECT * FROM `mt_meeting_content` WHERE `mt_title` LIKE '%{$searchInfo['keyword']}%' ORDER BY `mt_id` DESC");
		}
		
	}

?>
<div id="find">
	<form action="manager.php?action=findmeeting&type=search" method="post">
		<dl>
			<dt>查找会议记录</dt>
			<dd>
				<label>查询内容: <input type="text" name="keyword" class="text key"/></label>
				查找类型:
				<select name="searchtype">
					<option value="0" selected="selected">选择类型</option>
					<option value="1" >会议编号</option>
					<option value="2" >会议名称</option>
				</select>
				<input type="submit" name="search" value="" class="search"/>
			</dd>
		</dl>
	</form>
</div>
<?php
	if(isset($_GET['type'])){
?>
<div id="find-detail">
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
			<td><a href="detailmeeting.php?id=<?php echo $rs['mt_id'];?>"><img src="images/xiazai.gif" alt="详情" title="详情" /></a></td>
		</tr>
		<?php
			$i++;
			}
		?>
	</table>
</div>
<?php
	//pageList('manager.php?action=findmeeting&type=search','&',$pagenum,$page);
?>
<?php
	}
?>