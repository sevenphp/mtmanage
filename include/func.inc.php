<?php
/**
*@author              	anshao
*@date                  Aug 22, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	/*公用函数库*/

	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}
	
	
	//服务端检查用户输入的用户名是否合法
	function checkUser($user,$min,$max){
		$user = trim($user);

		if(empty($user)){
			alertBack('用户名不能为空');
		}

		if(mb_strlen($user,'UTF-8') < $min || mb_strlen($user,'UTF-8') > $max){
			alertBack('用户名长度不能小于'.$min.'或不能大于'.$max.'位!');
		}

		if(preg_match('/[<>\\\ \'\"]/', $user)){
			alertBack('用户名包含敏感字符!');
		}
		return $user;
	}

	//服务端检查用户输入的密码是否合法
	function checkPass($pass,$min,$max){
		if(empty($pass)){
			alertBack('密码不能为空!');
		}
		if(mb_strlen($pass,'UTF-8') < $min || mb_strlen($pass,'UTF-8') > $max){
			alertBack('用户名长度不能小于'.$min.'或不能大于'.$max.'位!');
		}
		return sha1($pass);
	}


	//弹窗并返回
	function alertBack($info){
		echo '<script>alert(\''.$info.'\');history.back();</script>';
		exit();
	}

	//弹窗并跳转
	function alertLocation($info,$url){
		echo "<script>alert('$info');location.href='$url'</script>";
		exit();
	}

	//mysql执行函数
	function mysqlQuery($sql){
		if(!$rs = mysql_query($sql)){
			die('SQL执行失败:'.mysql_error());
		}
		return $rs;
	}

	//只能获取结果集中的第一条数据
	function mysqlFetchArray($sql){
		return mysql_fetch_array(mysqlQuery($sql));
		
	}

	//获取结果集中的所有数据
	/*
	*@param $result 参数只能是结果集
	*/
	function fetchArray($result){
		return mysql_fetch_array($result);
	}

	//判断是否有权限访问页面
	function isAccess(){
		if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || $_SESSION['status'] != 1){
			alertLocation('非法访问!请先登录!','login.php');
		}
	}

	//对要在页面输出的字符串进行过滤再输出
	function htmlSpecial($string) {
		if (is_array($string)) {
			foreach ($string as $key => $value) {
				$string[$key] = htmlSpecial($value);   //这里采用了递归，如果不理解，那么还是用htmlspecialchars
			}
		} else {
			$string = htmlspecialchars($string);
		}
		return $string;
	}


	//对要插入数据库的字符串先进行过滤然后再插入数据库
	function mysqlRealEscape($string){
		if(get_magic_quotes_gpc() == 'false'){
			if(is_array($string)){
				foreach($string as $key => $value){
					$string[$key] = mysql_real_escape_string($value);
				}
			}else{
				$string = mysql_real_escape_string($string);
			}		
		}
		return $string;	
	}

	//会议名称
	function chkMtTitle($title,$min,$max){
		if(empty($title)){
			alertBack('会议名称不能为空!');
		}
		if(mb_strlen($title,'UTF-8') < $min || mb_strlen($title,'UTF-8') > $max){
			alertBack('会议名称长度不能小于'.$min.'位或大于'.$max.'位!');
		}
		return $title;
	}

	//会议地点
	function chkMtAddr($addr,$min,$max){
		if(empty($addr)){
			alertBack('会议地点不能为空!');
		}
		if(mb_strlen($addr,'UTF-8') < $min || mb_strlen($addr,'UTF-8') > $max){
			alertBack('会议地点长度不能小于'.$min.'位或大于'.$max.'位!');
		}
		return $addr;		
	}

	//部门名称
	function chkMtDepart($depart,$min,$max){
		if(empty($depart)){
			alertBack('部门名称不能为空!');
		}
		if(mb_strlen($depart,'UTF-8') < $min || mb_strlen($depart,'UTF-8') > $max){
			alertBack('部门名称长度不能小于'.$min.'位或大于'.$max.'位!');
		}
		return $depart;		
	}

	//会议主持人
	function chkMtManager($manager){
		if(empty($manager)){
			alertBack('主持人名称不能为空!');
		}
		if(mb_strlen($manager,'UTF-8') < 2 || mb_strlen($manager,'UTF-8') > 20){
			alertBack('主持人名称长度不能小于'.$min.'位或大于'.$max.'位!');
		}
		return $manager;			
	}

	//会议出席人员
	function chkMtPerson($person){
		if(empty($person)){
			alertBack('出席人员名称不能为空!');
		}
		if(mb_strlen($person,'UTF-8') < 2 || mb_strlen($person,'UTF-8') > 50){
			alertBack('出席人员名称长度不能小于'.$min.'位或大于'.$max.'位!');
		}
		return $person;			
	}


	//会议记录人员名称
	function chkMtRecord($record){
		if(empty($record)){
			alertBack('会议记录人员名称不能为空!');
		}
		if(mb_strlen($record,'UTF-8') < 2 || mb_strlen($record,'UTF-8') > 20){
			alertBack('会议记录人员名称长度不能小于'.$min.'位或大于'.$max.'位!');
		}
		return $record;			
	}

	//会议摘要
	function chkMtDescribe($describe,$min,$max){
		if(empty($describe)){
			alertBack('会议摘要不能为空!');
		}
		if(mb_strlen($describe,'UTF-8') < $min || mb_strlen($describe,'UTF-8') > $max){
			alertBack('会议摘要长度不能小于'.$min.'位或大于'.$max.'位!');
		}
		return $describe;		
	}


	//搜索关键字
	function chkSearchKeyword($keyword){
		if(empty($keyword)){
			alertBack('搜索关键字不能为空!');
		}
		return $keyword;
	}

	//搜索类型
	function chkSearchType($type){
		if(empty($type)){
			alertBack('请选择搜索类型!');
		}
		return $type;
	}


	//判断文件上传的扩展名是否符合要求
	/*
	*@param $type 允许的文件类型
	*@param $file 文件路径
	*/
	function chkFileExtenName($type,$file){
		$extName = strrchr($file, '.');		//获取文件的扩展名
		$str = '';
		if(!in_array($extName, $type)){
			if(is_array($type)){
				foreach ($type as $value) {
					$str .= $value.',';
				}
			}else{
				$str = $type;
			}
			alertBack('只支持'.$str.'类型');
		}
	}

	//判断文件上传是否错误
	/*
	*
	*@param $file 	文件上传错误代码
	*
	*/
	function chkFileError($file){
		if($file > 0){
			switch ($file) {
				case '1':
					alertBack('上传文件的大小超过服务器允许的最大长度!');
					break;
				case '2':
					alertBack('上传文件的大小超过表单允许的最大长度!');
					break;
				case '3':
					alertBack('部分文件被上传!');
					break;
				case '4':
					alertBack('没有文件被上传!');
					break;
			}
		}
	}


	/*简单分页函数*/
	function pageList($info,$lj,$pagenum,$page){
			//global $page;
			echo '<div id="pagelist-num">';
				echo '<ul>';
						for($i=0;$i<$pagenum;$i++){
							if($page == $i+1){
								echo '<li><a href="'.$info.$lj.'page='.($i+1).'" class="selected">'.($i+1).'</a></li>';
								echo "\n";
							}else{
								echo '<li><a href="'.$info.$lj.'page='.($i+1).'">'.($i+1).'</a></li>';
								echo "\n";								
							}
						}
				echo '</ul>';
			echo '</div>';
	}

?>