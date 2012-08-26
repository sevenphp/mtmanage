<?php
/**
*@author              	anshao
*@date                  Aug 25, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/
	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}

	//var_dump(get_magic_quotes_gpc());

	//添加会议记录
	if(isset($_POST['submt'])){
		//定义一个数组用来接受POST过来的数据
		$addMtInfo = array();

		$addMtInfo['mtname'] = mysql_real_escape_string(chkMtTitle($_POST['mtname'],2,20));
		$addMtInfo['mtdepart'] = mysql_real_escape_string(chkMtDepart($_POST['mtdepart'],2,10));
		$addMtInfo['mtaddr'] = mysql_real_escape_string(chkMtAddr($_POST['mtaddr'],2,30));
		$addMtInfo['mtdate'] = mysql_real_escape_string($_POST['mtdateY'].'-'.$_POST['mtdateM'].'-'.$_POST['mtdateD']);
		//die($addMtInfo['mtdate']);
		$addMtInfo['mtmanager'] = mysql_real_escape_string(chkMtManager($_POST['mtmanager']));
		$addMtInfo['mtrecord'] = mysql_real_escape_string(chkMtRecord($_POST['mtrecord']));
		$addMtInfo['mtperson'] = mysql_real_escape_string(chkMtPerson($_POST['mtperson']));	//到会人员
		$addMtInfo['mtdescibe'] = mysql_real_escape_string(chkMtDescribe($_POST['mtdescibe'],2,50));


/*		print_r($addMtInfo);
		echo '<br />';
		print_r($_FILES);*/

		if(empty($_FILES['mtcontent'])){
			alertBack('会议内容文稿不能为空!');
		}

		$file_type=array('.txt','.doc');

		//1.判断是否为允许上传的文件类型
		chkFileExtenName($file_type,$_FILES['mtcontent']['name']);
		//2.判断文件上传是否有错误
		chkFileError($_FILES['mtcontent']['error']);
		
		//创建存放文件的目录
		$dir = 'upfile/';
		if(!is_dir($dir)){
			mkdir($dir,0777);
		}

		//3.移动上传文件的临时文件
		if(is_uploaded_file($_FILES['mtcontent']['tmp_name'])){

			$filename = $dir.date('YmdHis',time()).rand(1,100).strrchr($_FILES['mtcontent']['name'], '.');
			//开始移动临时文件
			if(@move_uploaded_file($_FILES['mtcontent']['tmp_name'], $filename)){
				mysqlQuery("INSERT INTO `mt_meeting_content`(
																`mt_title`,
																`mt_depart`,
																`mt_addr`,
																`mt_date`,
																`mt_manager`,
																`mt_record`,
																`mt_person`,
																`mt_describe`,
																`mt_content`,
																`mt_login`
															)
													  VALUES(
																'{$addMtInfo['mtname']}',
																'{$addMtInfo['mtdepart']}',
																'{$addMtInfo['mtaddr']}',
																'{$addMtInfo['mtdate']}',
																'{$addMtInfo['mtmanager']}',
																'{$addMtInfo['mtrecord']}',
																'{$addMtInfo['mtperson']}',
																'{$addMtInfo['mtdescibe']}',
																'$filename',
																'{$_SESSION['user']}'
															)
						  ");

				if(mysql_affected_rows() == 1){
					alertLocation('添加会议记录成功!','manager.php?action=lookmeeting');
				}else{
					alertBack('添加会议记录失败!');
				}
			}else{
				alertBack('文件上传未成功!');
			}
		}else{
			alertBack('没有文件被上传!');
		}
		//exit();
	}

?>
<div id="add">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<th colspan="3">添加会议记录</th>
				</tr>
				<tr>
					<td class="tbname">会议名称:</td>
					<td><input type="text"name="mtname" class="text"/></td>
					<td class="tbnotice">*填写会议名称</td>
				</tr>
				<tr>
					<td class="tbname">部门名称:</td>
					<td><input type="text"name="mtdepart" class="text" /></td>
					<td class="tbnotice">*填写部门名称</td>
				</tr>
				<tr>
					<td class="tbname">会议地点:</td>
					<td><input type="text"name="mtaddr" class="text" /></td>
					<td class="tbnotice">*填写会议地点</td>
				</tr>
				<tr>
					<td class="tbname">会议日期:</td>
					<td><!-- <input type="text"name="mtdate" class="text" /> -->
						<select name="mtdateY" id="">
							<?php
								foreach(range(2000,2030) as $value){
									if($value == date('Y',time())){
										echo '<option selected="selected" value="'.$value.'">'.$value.'</option>';
									}
							?>
							<option value="<?php echo $value?>"><?php echo $value?></option>
							<?php
								}
							?>
						</select> 年
						<select name="mtdateM" id="">
							<?php
								foreach(range(1,12) as $value){
									if($value == date('m',time())){
										echo '<option selected="selected" value="'.$value.'">'.$value.'</option>';
									}
							?>
							<option value="<?php echo $value?>"><?php echo $value?></option>
							<?php
								}
							?>
						</select> 月
						<select name="mtdateD" id="">
							<?php
								foreach(range(1,31) as $value){
									if($value == date('d',time())){
										echo '<option selected="selected" value="'.$value.'">'.$value.'</option>';
									}									
							?>
							<option value="<?php echo $value?>"><?php echo $value?></option>
							<?php
								}
							?>
						</select> 日
					</td>
					<td class="tbnotice">*填写会议日期</td>
				</tr>
				<tr>
					<td class="tbname">会议主持人:</td>
					<td><input type="text"name="mtmanager" class="text" /></td>
					<td class="tbnotice">*填写会议主持人</td>
				</tr>
				<tr>
					<td class="tbname">会议记录人:</td>
					<td><input type="text"name="mtrecord" class="text" /></td>
					<td class="tbnotice">*填写会议记录人</td>
				</tr>
				<tr>
					<td class="tbname">出席人员:</td>
					<td><input type="text"name="mtperson" class="text" /></td>
					<td class="tbnotice">*填写出席人员(用,隔开)</td>
				</tr>
				<tr>
					<td class="tbname">上传会议内容:</td>
					<td><input type="file" name="mtcontent" /></td>
					<td class="tbnotice">*会议内容文稿</td>
				</tr>
				<tr>
					<td class="tbname">会议摘要:</td>
					<td><textarea name="mtdescibe" class="text"></textarea></td>
					<td class="tbnotice">*填写会议摘要</td>
				</tr>
				<tr>
					<td colspan="3">
						<input type="submit" name="submt" value="" class="subbtm" />
						<input type="reset" name="resetmt" value="" class="resetbtm" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>