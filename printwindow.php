<?php
/**
*@author                anshao
*@date                  Aug 27, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

  define('IN_TAG', true);

  //echo 'xxxw';
  require('include/comm.inc.php');

  isAccess();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会议记录打印</title>
<link href="styles/detailmeeting.css" type="text/css" rel="stylesheet" />
</head>
<script>     
  function printview(){     
  document.all.WebBrowser1.ExecWB(7,1);
  window.close();  
  }     
  function prints(){     
  document.all.WebBrowser1.ExecWB(6,1);
  window.close();  
  } 
 </script> 
<object   ID='WebBrowser1'   WIDTH=0   HEIGHT=0   CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>
<?php
if(isset($_POST["printview"]) && $_POST["printview"]=="打印预览"){;
 ?>
<body topmargin="0" leftmargin="0" bottommargin="0" onLoad="printview();">
<?php
}else if(isset($_POST["print"]) && $_POST["print"]=="打印"){
?>
<body topmargin="0" leftmargin="0" bottommargin="0" onLoad="prints();">
<?php
}
?>
<?php
//$id=$_POST["id"];
//$sqlstriii="select * from tb_meeting_info where meeting_id =$id";
$rs = mysqlFetchArray("select * from mt_meeting_content where mt_id ='{$_POST['mtid']}'");
//$s_rst=$conn->Execute($sqlstriii);
//echo $s_rst['mt_content'];
//exit();
$content = file_get_contents($rs['mt_content']);
?>
      <div id="detail">
        <h4>会议记录详情</h4>
          <table border="1" cellspacing="0">
            <tbody>
              <tr>
                <td class="tdname">会议编号:</td>
                <td class="tdvalue"><?php echo $rs['mt_id'];?></td>
                <td class="tdname">会议名称:</td>
                <td class="tdvalue"><?php echo $rs['mt_title'];?></td>
              </tr>
              <tr>
                <td class="tdname">部门名称:</td>
                <td class="tdvalue"><?php echo $rs['mt_depart'];?></td>
                <td class="tdname">会议地点:</td>
                <td class="tdvalue"><?php echo $rs['mt_addr'];?></td>
              </tr>
              <tr>
                <td class="tdname">会议日期:</td>
                <td class="tdvalue"><?php echo $rs['mt_date'];?></td>
                <td class="tdname">会议主持人:</td>
                <td class="tdvalue"><?php echo $rs['mt_manager'];?></td>
              </tr>
              <tr>
                <td class="tdname">会议出席人:</td>
                <td class="tdvalue"><?php echo $rs['mt_person'];?></td>
                <td class="tdname">会议记录人:</td>
                <td class="tdvalue"><?php echo $rs['mt_record'];?></td>
              </tr>
              <tr>
                <td class="tdname">会议摘要:</td>
                <td class="tdvalue" colspan="3"><?php echo $rs['mt_describe'];?></td>
              </tr>
              <tr>
                <td class="tdname">会议内容:</td>
                <td class="tdvalue"  colspan="3"><pre><?php echo $content;?></pre></td>
              </tr>
            </tbody>
          </table>
      </div>
</body>
</html>