<?php
	$con=mysql_connect("localhost","root","111111");//连接服务器
	mysql_select_db("anzeyou");//数据库的选择
	$user=$_POST['zhanghao'];
	$pass=$_POST['mima'];
	$pass_confirm=$_POST['queren'];
	$emai=$_POST['youxiang'];
	mysql_query("INSERT INTO zhuce ( username, password) VALUES ('$user', '$pass')");
	
?>