<?php
/**
*@author              	anshao
*@date                  Aug 22, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

	
	define('DB_HOST', 'localhost');		
	define('DB_USER', 'root');
	define('DB_PASS', 'shao520');
	define('DB_NAME', 'meeting');
	
	//1.连接数据库
	
	/*用在本地测试*/
	$conn = @mysql_connect(DB_HOST,DB_USER,DB_PASS) or die('数据库连接失败!');
	/*用在SAE测试*/
	//$conn = @mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS) or die('数据库连接失败!');
	//2.选择数据库
	/*用在本地测试*/
	mysql_select_db(DB_NAME) or die('数据库不存在!');
	/*用在SAE测试*/
	//mysql_select_db(SAE_MYSQL_DB) or die('数据库不存在!');
	//3.设置字符集
	mysql_query("SET NAMES UTF8");
	
?>