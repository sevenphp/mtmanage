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

	if(isset($_POST['modify'])){
		$user = $_POST['username'];
		$oldpass = checkPass($_POST['oldpass'],2,32);
		$newpass = checkPass($_POST['newpass'],2,32);

		mysqlQuery("SELECT `mt_id` FROM `mt_meeting_user` WHERE `mt_pass`='$oldpass'");		//判断原密码是否正确

		if(mysql_affected_rows() != 0 ){
			mysqlQuery("UPDATE `mt_meeting_user` SET `mt_pass`='$newpass' WHERE `mt_user`='$user'");

			if(mysql_affected_rows() == 1){
				mysql_close();
				alertLocation('密码更改成功!','manager.php');
			}else{
				mysql_close();
				alertBack('密码更改不成功!');
			}

		}else{
			alertBack('原密码不正确!');
		}
	}

?>
<div id="changepass">
	<form action="" method="post">
		<dl>
			<dt>修改密码</dt>
			<dd><label>用户名:<input type="text" name="username" readonly="readonly" value="<?php echo $_SESSION['user'];?>"/></label></dd>
			<dd><label>原密码:<input type="text" name="oldpass" /></label></dd>
			<dd><label>新密码:<input type="text" name="newpass" /></label></dd>
			<dd><input type="submit" name="modify" value="修改密码" />&nbsp;&nbsp;<input type="reset" name="reset" value="重置" /></dd>
		</dl>
	</form>
</div>