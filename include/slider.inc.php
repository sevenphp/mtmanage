<?php
/**
*@author              	anshao
*@date                  Aug 22, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}

	isAccess();

	if(isset($_SESSION['id']) && isset($_SESSION['user']) && $_SESSION['level'] == 0){
				echo '<div id="main-left">';
					echo "\n\t\t\t\t\t";
					echo '<dl id="list1">';
						echo "\n\t\t\t\t\t\t";
						echo '<dt><h3>分类操作</h3></dt>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="add"><a href="?action=addmeeting">添加会议记录</a></dd>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="look"><a href="?action=lookmeeting">浏览会议记录</a></dd>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="find"><a href="?action=findmeeting">查找会议记录</a></dd>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="manage"><a href="?action=managemeeting">管理用户信息</a></dd>';
						echo "\n\t\t\t\t\t";
					echo '</dl>';
					echo "\n\t\t\t\t";
				echo '</div>';
				echo "\n";		
	}elseif(isset($_SESSION['id']) && isset($_SESSION['user']) && $_SESSION['level'] == 1){
				echo '<div id="main-left">';
					echo "\n\t\t\t\t\t";
					echo '<dl id="list1">';
						echo "\n\t\t\t\t\t\t";
						echo '<dt><h3>分类操作</h3></dt>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="add"><a href="?action=addmeeting">添加会议记录</a></dd>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="look"><a href="?action=lookmeeting">浏览会议记录</a></dd>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="find"><a href="?action=findmeeting">查找会议记录</a></dd>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="manage"><a href="?action=managemeeting">管理用户信息</a></dd>';
						echo "\n\t\t\t\t\t";
					echo '</dl>';
					echo "\n\t\t\t\t";
					echo '<dl id="list2">';
						echo "\n\t\t\t\t\t";
						echo '<dt><h3>管理操作</h3></dt>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="userM"><a href="?action=usermanager">用户账号管理</a></dd>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="meetingM"><a href="?action=meetingmanager">会议信息管理</a></dd>';
						echo "\n\t\t\t\t\t\t";
						echo '<dd id="departM"><a href="?action=departmanager">部门信息管理</a></dd>';
						echo "\n\t\t\t\t\t";
					echo '</dl>';
					echo "\n\t\t\t\t";				
				echo '</div>';
				echo "\n";		
	}