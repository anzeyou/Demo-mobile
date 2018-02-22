<?php
 header("Content-type: text/html; charset=utf-8"); 
  $link=mysql_connect('localhost','root','111111');
  $key=$_GET['id'];
  mysql_select_db('anzeyou');
  $sql="select * from pic where p_id =(select p_id from p_key where f_key='$key' and from_userid=1)";
  $rec=mysql_query($sql);
  while($rc=mysql_fetch_array($rec))
  {
  	   echo "<div>原始地址：".$rc['p_url']." </div>";
  }
?>
</body>
</html>