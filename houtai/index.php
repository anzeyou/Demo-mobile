<!DOCTYPE HTML>
<html >
<head>
	<meta charset="UTF-8"/>
	<title>首页</title>
	<link rel="stylesheet" href="styles/style.css" type="text/css"/>
	<script src="scripts/libs/modernizr/modernizr.js" type="text/javascript"></script>
	<script src="scripts/config.js" type="text/javascript"></script>
</head>
<?php 
@session_start();
$_uu=$_SESSION['user'];
include("conn.php");
?>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">后台管理</a></h1>
			<h2 class="section_title">欢迎进入后台管理</h2><div class="btn_view_site"><a href="index.php"></a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $_uu ?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">后台首页</a></article>
		</div>
	</section><!-- end of secondary bar -->
	<aside id="sidebar" class="column">
		<form class="quick_search" method="post" action="sous.php">
			<input type="text"  name="search" value="快速搜索" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>我的面板</h3>
		<ul class="toggle">
			<li><font class="ficomoon icon-pwd"></font><a href="admin_pwd.php">修改密码</a></li>
			<li><font class="ficomoon icon-logout"></font><a href="admin_login.php">退出</a></li>
		</ul>
		
		<h3>用户</h3>
		<ul class="toggle">
			<li><font class="ficomoon icon-users"></font><a href="user.php">查看用户</a></li>
			<li><font class="ficomoon icon-user-module"></font><a href="user_pwd.php">修改密码</a></li>
           	<li><font class="ficomoon icon-admin-role"></font><a href="#">增加用户</a>
			<menu class="children dn">
				<dl>
					<dd><a href="user_add.php">添加角色</a></dd>
                  
				</dl>
			</menu>
			</li>
		</ul>
		<h3>设置</h3>
		<ul class="toggle">
			<li><font class="ficomoon icon-admin"></font><a href="#">管理员设置</a>
			<menu class="children dn">
				<dl>
					<dd><a href="admin_add.php">添加管理员</a></dd>
                    <dd><a href="admin_modify.php">管理员管理</a></dd>
				</dl>
			</menu>
			</li>
		
			<menu class="children dn">
				<dl>
					<dd><a href="#">生成首页</a></dd>
				</dl>
			</menu>
			</li>
		</ul>
	
	</aside><!-- end of sidebar -->
		<script src="scripts/libs/require/require.js" type="text/javascript" data-main="scripts/app/index/main"></script>
</body>
</html>