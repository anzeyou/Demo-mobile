<?php
	session_start();
	$conn=mysql_connect("localhost","root","111111");
	  mysql_select_db("anzeyou"); 
	 $us=$_SESSION['username'];
	 $pic=$_POST['pic'];
	if($pic == "")
     {
     	echo 0;
     	}
	 else{
     $sql="INSERT INTO `img` (`id`,`path`,`username`) VALUES (' ','$pic','$us')";
	      mysql_query($sql);
		     echo 1;	
	 }
	
?>