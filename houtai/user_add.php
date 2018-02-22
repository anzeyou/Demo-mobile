<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<?php
include("index.php");
?>
<?php
if(isset($_POST["add"]) && $_POST["add"] == "添加")  
    {  
        $user = $_POST["root"];  
        $psw = $_POST["passwd"];  
	    $psw_confirm = $_POST["confirm"]; 
        if($user == "" || $psw == "" || $psw_confirm =""  )  
        {  
            echo "<script>alert('请确认信息完整性！');history.go(-1);;</script>";  
        }  
       else  
        {  
            if($_POST["passwd"] == $_POST["confirm"])  
            {   
               //mysql_query("set names 'gdk'"); //设定字符集  
                $sql = "select username from login where username = '$_POST[root]'"; //SQL语句  
                $result = mysql_query($sql);    //执行SQL语句  
                $num = mysql_num_rows($result); //统计执行结果影响的行数  
                if($num)    //如果已经存在该用户  
                {  
                    echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
                }  
                else    //不存在当前注册用户名称  
                {  
                    $sql_insert = "insert into login (username,password) values('$_POST[root]','$_POST[passwd]')";  
                    $res_insert = mysql_query($sql_insert);  
                    //$num_insert = mysql_num_rows($res_insert);  
                    if($res_insert)  
                    {  
                        echo "<script>alert('添加成功！'); history.go(-1);</script>";  
                    }  
                    else  
                    {  
                        echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else  
            {  
                echo "<script>alert('密码不一致！'); history.go(-1);</script>";  
            }  
        }  
    }  
    
?>  

<body>
<div class="module_content">
    <form action="user_add.php" method="post">
	    用户名：<input type="text" name="root"/>	
        密码 :<input  type="text" name="passwd" />
        确认密码:<input type="text" name="confirm" />
             <input type="submit" name="add" value="添加"/>		
      </form>      
 </div>
	<script src="scripts/libs/require/require.js" type="text/javascript" data-main="scripts/app/index/main"></script>
</body>
</html>