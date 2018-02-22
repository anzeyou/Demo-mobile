<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style>
.yh{
	
	
	
	padding-top:50px;}
</style>
</head>
<?php
include("index.php");
?>
 <?php
$id=$_GET['id'];
$sql="delete from root where ID=$id";
$rec=mysql_query($sql);
?>
<body>
<div class="module_content">
  
  <?php
 $page=@$_GET['page']?$_GET['page']:1;
  $pagesize=5;
  $sql_count="select count(*)  as count from root";
  $cou=mysql_query($sql_count);
  $count=@mysql_fetch_array($cou);
  $count_max=$count[0]['count'];
   
  if($count_max%$pagesize==0)
  {
	  $maxpage=$count_max/$pagesize;
	 }
  else
  {
	  $maxpage=intval($count_max/$pagesize)+1;
	 }

 if($page<1)
 {
    $page=1;
	 }
  if($page>$maxpage)
  {
	  $page=$maxpage;
	 }
 $maxarray=array();
 for($i=1;$i<=$maxpage;$i++)
 $maxarray[$i]=$i;
$sql="select ID,root,password from root limit ".($page-1)*$pagesize.",$pagesize";
$rec=mysql_query($sql);

?>
 <div class="yh">
<ul><?php
 while($row=@mysql_fetch_assoc($rec)){
?>
 <table width="500" border="0" cellpadding="5" cellspacing="1" >
 <form action="" method="post">
 <tr>
  <tr>
     <td class="bt">用户名:<input type="text" name="usernm" value="<?php echo $row['root'];?>" /></td>
  </tr>
  <tr>
      <td class="bt">密码:<input type="text" name="passwd"  value="<?php echo $row['password'];?>" /> </td>
   </tr>
   <td  style="padding-left:500px"><a href="#" onclick="javescript:if(confirm('确定删除？')) location='admin_modify.php?id=<?php echo $row['ID'];?>'">删除</a></td>
   </tr>
   </form>
   </table>
   <?php
 }
 ?>
 </ul>
 </div>
 
  <div>
    <ul class="page">
      <li><a href="user.php?page=1">第一页</a></li>
      <?php if ($maxpage>6) {?>
      <li class="r"><a href="user.php?page=1">1</a></li>
      <li class="r"><a href="user.php?page=2">2</a></li>
      <li class="r"><a href="user.php?page=3">3</a></li>
      <li><a href="user.php?page=4">4</a></li>
      <li><a href="#">...</a></li>
      <li><a href="user.php?page=<?php echo $maxpage ?>"><?php echo $maxpage ?></a></li>
    <?php }else { ?>
      <?php foreach($maxarray as $key=>$v) {?>
     <li> <a href="user.php?page=<?php echo $v ?>"><?php echo $v ?></a></li>
     <?php } ?>
     <?php } ?>
      <li><a href="user.php?page=<?php echo $maxpage ?>">最后一页</a></li>
    </ul>
  </div>
 </div>
    </div>     
      </div>
	<script src="scripts/libs/require/require.js" type="text/javascript" data-main="scripts/app/index/main"></script>
</body>
</html>