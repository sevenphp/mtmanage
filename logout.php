<?php
/**
*@author              	anshao
*@date                  Aug 23, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	define('IN_TAG', true);

	require('include/comm.inc.php');

	isAccess();

	session_destroy();

	alertLocation('退出成功!','login.php');
?>