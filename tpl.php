<?php
/*header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=test.xls");
session_start();
echo "test1\t";
echo "test2\t\n";
echo "test1\t";
echo "test2\t\n";
echo "test1\t";
echo "test2\t\n";
echo "test1\t";
echo "test2\t\n";
echo "test1\t";
echo "test2\t\n";
echo "test1\t";
echo "test2\t\n";*/
	if(isset($_POST['sub'])){
		print_r($_POST['depart']);
	}
?>
<form action="" method="post">
	<input type="checkbox" name="depart[]" value="1"/>开发部
	<input type="checkbox" name="depart[]" value="2"/>开发部
	<input type="checkbox" name="depart[]" value="3"/>开发部
	<input type="checkbox" name="depart[]" value="4"/>开发部
	<input type="checkbox" name="depart[]" value="5"/>开发部
	<input type="submit" name="sub" />
</form>