<!DOCTYPE html>
<html>
	<?php
		include("conn.php");
		if(!isset($_SESSION['uid'])){
			echo "<script>alert('请先登录');window.location.href='forum.php'</script>";
		}
		if(@$_POST['submit']){
   			$sql="insert into forum_all (title,uid,f_acontent)".
        		"values('$_POST[title]','$_SESSION[uid]','$_POST[f_acontent]')";
			mysql_query($sql);
			echo "<script language=\"javascript\">alert('添加成功');</script>";
		}
	?>
	<SCRIPT language=javascript>
		function CheckPost()
		{
			var y=myform.title.value;
			var z=myform.f_acontent.value;
			if (y=='')
			{
				alert("请输入标题");
				myform.title.focus();
				return false;
			}
			if (z=="")
			{
				alert("请输入留言内容");
				myform.f_acontent.focus();
				return false;
			}
		}
	</SCRIPT>
	<head>
		<meta charset="utf-8">
		<title>夜话-添加</title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/forum_add.css" type="text/css"/>
	</head>
	<body>
		<div id="item_ttl">夜话诗句</div>
		<div id="all">
			<div id="row_1">
				<nav id="navigation">
					<div id="navigation_left">
						<a href="index.html" id="index"><img src="img/navigation.ico">主页</a>
						<a href="forum.php" id="forum"><img src="img/navigation.ico">夜话</a>
						<a href="shops.php" id="shops"><img src="img/navigation.ico">商铺</a>
						<a href="popularization.php" id="popularization"><img src="img/navigation.ico">科普</a>
						<a href="" id="hairstyle"><img src="img/navigation.ico">绾青丝</a>
					</div>
					<div id="navigation_right">
						<a href="login.php" id="login"><img src="img/navigation.ico">登入</a>
						<a href="register.php" id="register"><img src="img/navigation.ico">注册</a>
					</div>
				</nav>
			</div>
		</div>
		<div id="first_dec">杨意不逢，抚凌云而自惜；</div>
		<div id="second_dec">钟期既遇，奏流水以何惭？</div>
		<div id="publisher">
			<img src="" alt="这是头像" />
			<p>这里是姓名</p>
			<p>这里是个签</p>
		</div>
		<form action="#" method="post" name="myform" id="forum_add_main" onsubmit="return CheckPost();">
			<div id="forum_name" >标题：<input type="text" name="title" id="i_forum_name"/></div>
			<textarea id="forum_content" name="f_acontent" rows="20" cols="120">发帖描述</textarea><br>
			<input type="submit" value="确定" id="add_forum_b" />
		</form>
	</body>
</html>
