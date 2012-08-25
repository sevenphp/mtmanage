<?php
/**
*@author              	anshao
*@date                  Aug 22, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	define('IN_TAG', true);
	
	require 'include/comm.inc.php';

	if(isset($_SESSION['id']) && isset($_SESSION['user']) && $_SESSION['status'] == 1){
		header('Location:manager.php');
	}else{
		alertLocation('请先登录!','login.php');
	}
?>