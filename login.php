<?php
/**
*@author              	anshao
*@date                  Aug 22, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Login</title>
		<link type="text/css" rel="stylesheet" href="styles/style.css" />
		<link type="text/css" rel="stylesheet" href="styles/login.css" />
		<script type="text/javascript" src="js/login.js"></script>
	</head>
<body>
  <div class="login">
    <table cellpadding="0" cellspacing="0" border="0">
	  <tr>
	    <td colspan="4" height="22">
		  <center><img src="images/login_top.jpg" width="500" height="22" /></center>		</td>
	  </tr>
	  <tr>
	  <td width="22" rowspan="3"><img src="images/login_left.jpg" width="22" height="350" /></td>
	    <td height="120" colspan="2">
	    	<center><img src="images/logo.png" width="400" height="120" /></center>
	    </td>
	    <td width="32" rowspan="3" align="right">
	    <img src="images/login_right.jpg" width="21" height="350" /></td>
	 </tr>
	  <tr>
	    <td width="224" align="right"><img src="images/login_fb.png" width="120" height="120" /></td>
	    <td width="426" height="86"><div class="loginframe">
          <h4>用&nbsp;户&nbsp;登&nbsp;录</h4>
	      <table cellpadding="0" cellspacing="0">
            <form method="post" action="chklogin.php">
              <tr>
                <td width="58"  height="42"><div align="right">用户名:</div></td>
                <td width="163"><input  class="input1" id="username" type="text" name="username" /></td>
              </tr>
              <tr>
                <td width="58"  height="42"><div align="right">密&nbsp;&nbsp;码:</div></td>
                <td width="163"><input class="input2" id="pass" type="password" name="pass" /></td>
              </tr>
              <tr>
	            <td colspan="2"  height="22">
	                <center>
	                  <input name="submit" type="submit"  class="btnlogin" value=""/>
	                  &nbsp;
	                  <input name="reset" type="reset" class="btnreset" value="" />
	                </center>
	            </td>
              </tr>
            </form>
          </table>
        </div></td>
      </tr>
	  <tr>
	    <td height="22" colspan="2"><p class="loginbottom">&copy;<a href="http://anshao.net" >anshao.net</a>&nbsp;&nbsp;版权所有</p>
        <p class="loginbottom">&nbsp;联系电话：020-12345678</p></td>
	    </td>
      </tr>
	  
	 <tr>
	 <td colspan="4" height="22"><img src="images/login_bottom.jpg" width="500" height="25" /></td>
	 </tr>
	</table>
  </div>
</body>
</html>