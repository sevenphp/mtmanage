<?php
/**
*@author              	anshao
*@date                  Aug 24, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}



	echo '<div id="content">';
		echo '<p>欢迎使用会议管理系统V0.1</p>';
		echo '<p>由anshao.net提供技术支持</p>';
		echo '<ul>';
		echo '简单会议管理系统功能简介:';
			echo '<li>添加会议记录</li>';
			echo '<li>浏览会议记录</li>';
			echo '<li>打印会议记录</li>';
			echo '<li>生成会议记录报表</li>';
			echo '<li>查找会议记录</li>';
			echo '<li>用户信息更改</li>';
		echo '</ul>';
	echo '</div>';


?>