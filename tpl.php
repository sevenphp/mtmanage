<?php
	//正则表达
	
	//preg_match($mode,$string)	返回boolean		匹配则是true	不匹配则是false
	$mode1 = '/\w{2,255}@\w{1,255}(\.[a-z]{2,4})+/';		//匹配电子邮箱
	$string1 = 'root-xx@anshao.net.com';

	if(preg_match($mode1,$string1)){
		echo '匹配';
	}else{
		echo '不匹配';
	}

	//preg_grep($mode,$array)	以数组方式返回匹配的字符串
	$mode2 = '/php[1-6]/';
	$string2 = array('php1','php4','php6','php8','python');

	print_r(preg_grep($mode2, $string2));

	//preg_match_all($mode,$string,$var)	进行全局匹配,符合规则的放入$var数组中
	$mode3 = '/php[1-6]/';
	$string3 = 'dadfafdaphp54cadfafaphp3czvafphp6czafapheqfaphp5';
	$var = '';
	preg_match_all($mode3,$string3,$var);

	print_r($var);

	echo '<br />';

	//preg_replace($mode,$replace,$string) 进行全局匹配替换
	//用来作简单ubb编辑器
	$mode4 = '/\[b\](.*)\[\/b\]/U';		// U 禁止贪婪(跟踪匹配最近的进行匹配并结束)
	$string4 = 'this is [b]php5[/b] and this is [b]python[/b]';
	echo $string4;
	$replace = '<strong>\1</strong>';

	echo '<br />';

	echo preg_replace($mode4, $replace, $string4);


	//preg_split($mode,$string)	//分割$string,返回数组
	$mode5 = '/[\.@]/';
	$string5 = 'root@anshao.net.com';

	print_r(preg_split($mode5, $string5));	

	
?>