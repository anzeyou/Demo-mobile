<?php
session_start();
$con=mysql_connect('localhost','root','111111');  //连接服务器
$user=$_POST["aa"];
$pass=$_POST["bb"];
$_SESSION['username']=$user;
mysql_select_db("anzeyou");//连接数据库
//$result= "SELECT * FROM 'login' where username='$user' and password='$pass'";
$result="SELECT * FROM `login` WHERE  username='$user' and password='$pass'";
mysql_query($result);
$rc=mysql_affected_rows(); 
if($rc==0){
	echo 0;
}else{
	echo 1;
}
?>