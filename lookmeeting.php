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
			foreach (range(1,15) as $value) {
		?>
		<tr class="chColor<?php echo $value; ?>">
			<td>10</td>
			<td>phpcms二次开发</td>
			<td>开发部</td>
			<td>开发会议室</td>
			<td>2222-22-22</td>
			<td>Sevenphp</td>
			<td>seven,tom,zhang,lisi</td>
			<td>seven</td>
			<td>由谁来承接这次项目</td>
			<td><a href="###"><img src="images/xiazai.gif" alt="详情" title="详情" /></a></td>
		</tr>
		<?php
			}
		?>
	</table>
</div>