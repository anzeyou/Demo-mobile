<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<title>首页</title>
	<link rel="stylesheet" href="styles/style.css" type="text/css"/>
	<script src="scripts/libs/modernizr/modernizr.js" type="text/javascript"></script>
	<script src="scripts/config.js" type="text/javascript"></script>
    <style>
	.mm{
		padding-top:100px;
		padding-left:150px;
		}
	</style>
</head>
<?php
@session_start();
include("index.php");
?>
<?php
  if($_POST["submit"])
  { 
  @session_start();
  $us=$_SESSION['user'];
  $user = $_POST['root'];  
  $psw = $_POST['password'];  
  $psw_confirm = $_POST['confirm']; 
  if($user == "" || $psw == "" || $psw_confirm =""  )  
        {  
            echo "<script>alert('请确认信息完整性！');history.go(-1);</script>";  
        } 
		else{ 
	         if($_POST["root"]==$us)
	         {  if($_POST["password"] == $_POST["confirm"])
			     { $sql = "update root set password='$psw' where root = '$_POST[root]'"; //SQL语句  
                      mysql_query($sql);    //执行SQL语句 
					  echo "<script>alert('修改成功！');history.go(-1);</script>";
					 }
					 else{ echo "<script>alert('密码不一致，请重新输入！');history.go(-1);</script>"; }
		     }
			 else{ echo "<script>alert('输入的用户名错误！');history.go(-1);</script>"; }
		}
 }
	  
?>
<body>
	<div class="module_content">
    <form class="mm" method="post" action="">
	    用户名：<input type="text" name="root" />	
       新密码 :<input  type="text" name="password" />
       确认密码 :<input  type="text" name="confirm" />
             <input type="submit" name="submit" value="确定"/>		
      </form>      
      </div>
	<script src="scripts/libs/require/require.js" type="text/javascript" data-main="scripts/app/index/main"></script>
</body>
</html>