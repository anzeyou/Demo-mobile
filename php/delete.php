<?php
	header("Content-Type:text/json;charset=utf-8;");
	session_start();
    $us=$_SESSION['username'];
	$conn=mysql_connect("localhost","root","111111");
    mysql_select_db("anzeyou"); 
	$img_id=$_POST['data'];
    mysql_query("DELETE FROM img WHERE id='$img_id'"); 
    echo "1";
?>