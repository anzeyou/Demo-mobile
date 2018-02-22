<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<title>后台登录</title>
     <style type="text/css">
    .code
    {
            background:url(code_bg.jpg);
            font-family:Arial;
            font-style:italic;
             color:blue;
             font-size:30px;
             border:0;
             padding:2px 3px;
             letter-spacing:3px;
             font-weight:bolder;             
             float:left;            
             cursor:pointer;
             width:150px;
             height:60px;
             line-height:60px;
             text-align:center;
             vertical-align:middle;

    }
    a
    {
        text-decoration:none;
        font-size:12px;
        color:#288bc4;
        }
    a:hover
    {
       text-decoration:underline;
        }
    </style>
	<link rel="stylesheet" href="styles/style.css" type="text/css"/>
	<script src="scripts/libs/modernizr/modernizr.js" type="text/javascript"></script>
	<script src="scripts/config.js" type="text/javascript"></script>
</head>

<body onload="createCode()" >
	<header id="header">
		<hgroup>
			<h1 class="site_title">后台管理</h1>
		</hgroup>
	</header> <!-- end of header bar -->
	<div class="w500 mc ovh">
		<section id="main" >
			<article class="module width_full">
				<header><h3>登录</h3></header>
				<div class="module_content">
                <form action="" method="post">
					<fieldset>
						<label for="txtUser">用户名</label>
						<input type="text" name="user" />
					</fieldset>
					<fieldset>
						<label for="txtPwd">密码</label>
						<input type="password" name="passwd"/>
					</fieldset>
                     
                   
                   
                   <fieldset>
						<label for="txtPwd">验证码</label>
						<input type="text" name="inputCode" />
					</fieldset>
                      <textarea class="code" id="checkCode" name="checkCode" onclick="createCode()" /></textarea><a  href="#" onclick="createCode()">看不清换一张</a>
                   
                   
       
					<div class="tc h30">
						<input type="submit" name="submit" value="登录" />
					</div>
				</form>	
				</div>
			</article>
		</section>
	</div>
      <script language="javascript" type="text/javascript">

        var code;
        function createCode() {
            code = "";
            var codeLength = 6; //验证码的长度
            var checkCode = document.getElementById("checkCode");
            var codeChars = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 
            'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'); //所有候选组成验证码的字符，当然也可以用中文的
            for (var i = 0; i < codeLength; i++) 
            {
                var charNum = Math.floor(Math.random() * 52);
                code += codeChars[charNum];
            }
            if (checkCode) 
            {
                checkCode.className = "code";
                checkCode.innerHTML = code;
            }
        }
       
		
		   
     </script>
     <?php
@session_start();
 include("conn.php");
?>
<?php 
if(isset($_POST["submit"]) && $_POST["submit"] == "登录")  
   { 
   if($_POST["user"] == "" ||  $_POST["passwd"] == "")
       {echo "<script>alert('请输入用户名或密码！');
	   history.go(-1);</script>";
	   }
	  else
     {  
	   $sql = "select root,password from root where root = '$_POST[user]' and password = '$_POST[passwd]'";
	    mysql_query($sql);
	   $check = mysql_query($sql);  
      if($result = mysql_fetch_array($check))
		 {  //登录成功
		 // SESSION_START();  
            @session_start(); 
	        $_SESSION['user'] =$_POST["user"]; 	
            $_SESSION['passwd'] = $result['passwd']; 
			$inputCode=$_POST['inputCode'];
			 $checkCode=$_POST['checkCode'];
			 
				//echo $checkCode."----".$inputCode;
			 if($inputCode==$checkCode){
				 echo '<script>location.href="index.php";</script>';
				
				
				 }
			 else {
				echo '<script>alert("验证码错误");</script>';
				 }
			 			 
            }   
         else {  
              echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";   
              }  
	  } 
	   
   }

?>
	<script src="scripts/libs/require/require.js" type="text/javascript" data-main="scripts/app/index/main"></script>
</body>
</html>