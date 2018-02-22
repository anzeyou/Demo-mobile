<?php
 header("Content-type: text/html; charset=utf-8"); 
 $id=$_GET['id'];
 $key=md5('1'.$id);//
 $sql="insert into p_key(f_key,p_id,from_userid) values('$key',$id,1)"; ///userid 1
 $link=mysql_connect('localhost','root','111111');
mysql_select_db('anzeyou');
mysql_query($sql);
//echo $sql."<br>";
echo "图片分享地址（加密）:http://127.0.0.1/demo/zh.php?id=$key";
?>