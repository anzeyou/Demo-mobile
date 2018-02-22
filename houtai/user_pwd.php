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
include("index.php");
?>
<?php
 if($_POST["submit"])
 {
	$user=$_POST['username']; 
	$pwd=$_POST['password'];
	$sql_check="select username from login where username = '$_POST[username]'";
	$resu=mysql_query($sql_check);
	$result=@mysql_num_rows($resu);
	if($result){
	  if($user == "" || $pwd == "")
	  {
		  echo "<script>alert('请确认信息完整性！');history.go(-1);;</script>";
		  }
	  else{  if($_POST["password"] == $_POST["confirm"])
	          {
		    $sql="update login set password='$pwd' where username = '$_POST[username]'";
			mysql_query($sql);
			 echo "<script>alert('修改成功！');history.go(-1);</script>";
	          }else
			    {
					echo "<script>alert('密码不一致，请重新输入！');history.go(-1);</script>"; }
		  }
	}
	else{ echo "<script>alert('没有该用户名！');history.go(-1);</script>";} 
	
 }
?>

<body>
	<div class="module_content">
    <form class="mm" method="post" action="">
	    用户名：<input type="text" name="username"/>	
        密码 :<input  type="text" name="password" />
        确认密码:<input type="text" name="confirm" />
             <input type="submit" name="submit" value="确定"/>		
      </form>      
      </div>
	<script src="scripts/libs/require/require.js" type="text/javascript" data-main="scripts/app/index/main"></script>
</body>
</html>