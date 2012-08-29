<?php
/**
*@author              	anshao
*@date                  Aug 27, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

	header("Content-Disposition:filename=会议报表.xls");

	define('IN_TAG', true);



/*	header("Content-Type:application/vnd.ms=excel");	//设置http标头
	header("Content-Disposition:filename=会议报表.xls");	//定义下载文件的名称*/

	require('include/comm.inc.php');

	header("Content-type:application/vnd.ms-excel");	//和comm.inc.php中的header有冲突,放在后面覆盖

	isAccess();

	$sql = "SELECT `mt_id`,`mt_title`,`mt_depart`,`mt_addr`,`mt_date`,`mt_manager`,`mt_person`,`mt_record`,`mt_describe` FROM `mt_meeting_content` ORDER BY `mt_id`";
	$query = mysql_query($sql);	




	//echo '<table cellspacing="0" cellpadding="0" border="0">';
		//echo '<tr>';
			echo '会议编号'."\t";
			echo '会议名称'."\t";
			echo '部门名称'."\t";
			echo '会议地点'."\t";
			echo '会议日期'."\t";
			echo '主持人'."\t";
			echo '出席人员'."\t";
			echo '记录人'."\t";
			echo '会议摘要'."\t\n";
		//echo '</tr>';

			//foreach (range(1,15) as $value) {
			$i = 1;
			$str = '';
			while($rs = fetchArray($query)){
				if($i % 2 == 0){
					$str = 'B';
				}else{
					$str = '';
				}

		//echo '<tr class="chColor'.$str.'">';
			echo $rs['mt_id']."\t";
			echo $rs['mt_title']."\t";
			echo $rs['mt_depart']."\t";
			echo $rs['mt_addr']."\t";
			echo $rs['mt_date']."\t";
			echo $rs['mt_manager']."\t";
			echo $rs['mt_person']."\t";
			echo $rs['mt_record']."\t";
			echo $rs['mt_describe']."\t\n";
		//echo '</tr>';

			$i++;
			}







?>
