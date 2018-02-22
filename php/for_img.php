<?php
	  header("Content-Type:text/json;charset=utf-8;");
session_start();
    $us=$_SESSION['username'];
	 $conn=mysql_connect("localhost","root","111111");
	  mysql_select_db("anzeyou"); 
     $sql="SELECT * FROM `img` where username='$us'";
// $sql="SELECT * FROM `pic` ";
   $rec=mysql_query($sql);
   $arr=array( );
   while($row=mysql_fetch_array($rec))
     {
     	$arr[]=$row;
     	
     }
//echo $arr;

echo json_encode($arr);



?>