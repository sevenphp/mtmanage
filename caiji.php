<?php
	header('Content-Type:text/html;charset="GB2312"');

	$url = 'http://news.qq.com/photo.shtml';	//要采集的url

	$content = file_get_contents($url);

	//echo $content;
	$greg_img = "/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i";

	preg_match($greg_img, $content,$aa);

	
	var_dump($aa);
?>