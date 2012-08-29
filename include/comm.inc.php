<?php
/**
*@author              	anshao
*@date                  Aug 22, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	header('Content-Type:text/html;charset="UTF-8"');
	
	session_start();

	date_default_timezone_set('PRC');	//北京时间

	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}

	require('conn/conn.inc.php');	//数据库连接
	require('func.inc.php');		//函数库