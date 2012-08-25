<?php
/**
*@author              	anshao
*@date                  Aug 23, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}
	
	echo '<div id="footer">';
	echo "\n\t\t\t\t";
	echo '<p>本系统由<a href="http://anshao.net" >anshao.net</a>提供技术支持&nbsp;&nbsp;&copy;anshao.net</p>';
	echo "\n\t\t\t";	
	echo '</div>';
	echo "\n";