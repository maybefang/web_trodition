<!DOCTYPE html>
<html>
	<?php
		include("conn.php");
		session_start();
		if(!isset($_SESSION['uid'])){
			echo "<script>alert('请先登录');window.location.href='popularization.php'</script>";
		}else{
			$sql="SELECT * FROM user WHERE uid='$_SESSION[uid]'";
			$query=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($query);
		}
		if(@$_POST['submit']){
   			$sql="insert into popularization (uid,title,pcontent,pkey)".
        		"values('$_SESSION[uid]','$_POST[title]','$_POST[pcontent]',$_POST[pkey])";
			mysql_query($sql);
			echo "<script language=\"javascript\">alert('发表成功');window.location.href='popularization.php'</script>";
		}
	?>
	<SCRIPT language=javascript>
		function CheckPost()
		{
			var y=myform.title.value;
			var z=myform.pcontent.value;
			if (y=='')
			{
				alert("请输入标题");
				myform.title.focus();
				return false;
			}
			if (z=="")
			{
				alert("请输入科普内容");
				myform.f_acontent.focus();
				return false;
			}
		}
	</SCRIPT>
	<head>
		<meta charset="utf-8">
		<title>科普-添加</title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/popularization_add.css" type="text/css"/>
	</head>
	<body>
		<div id="item_ttl">学而不厌,&nbsp;诲人不倦</div>
		<div id="all">
			<div id="row_1">
				<nav id="navigation">
					<div id="navigation_left">
						<a href="index.php" id="index"><img src="img/navigation.ico">主页</a>
						<a href="forum.php" id="forum"><img src="img/navigation.ico">夜话</a>
						<a href="shops.php" id="shops"><img src="img/navigation.ico">商铺</a>
						<a href="popularization.php" id="popularization"><img src="img/navigation.ico">科普</a>
					</div>
					<div id="navigation_right">
						<?php
						if(isset($_SESSION['uid'])){
					?>
						<label id="uid"><img src="img/navigation.ico"><?php echo $_SESSION['uid']; ?></label>
					<?php
						}
						else{
					?>
						<a href="login.php" id="login"><img src="img/navigation.ico">登入</a>
						<a href="register.php" id="register"><img src="img/navigation.ico">注册</a>
					<?php
					}
					?>
					</div>
				</nav>
			</div>
		</div>
		<div id="first_dec">书痴者文必工，</div>
		<div id="second_dec">艺痴者技必良</div>
		<div id="popularization_person">
			<?php
				if($row['sex']){
			?>
			<img src="./img/male.jpg" alt="这是头像" />
			<?php
				}else{
			?>
			<img src="./img/female.jpg" alt="这是头像" />
			<?php
				}
			?>
			<!-- 这里是姓名 -->
			<p><?php echo $row['uid']; ?></p>
			<!-- 这里是个签 -->
			<p><?php echo $row['signature']; ?></p>
		</div>
		<form action="#" method="post" name="myform" id="popularization_add_main" onsubmit="return CheckPost();">
			<div id="popularization_name" >标题：<input type="text" name="pname" id="i_popularization_name"/></div>
			<div id="pkey">
				文章类型：
				<label class="radio"><input type="radio" name="pkey" value="汉服&配饰" checked>汉服&配饰</label>
				<label class="radio"><input type="radio" name="pkey" value="礼仪">礼仪</label>
				<label class="radio"><input type="radio" name="pkey" value="小常识">小常识</label>
			</div>
			<textarea id="popularization_content" name="pcontent">科普内容</textarea><br>
			<input type="submit" name="submit" value="确定" id="add_popular_b" />
		</form>
	</body>
</html>
