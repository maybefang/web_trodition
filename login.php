<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>同袍小筑-登入</title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="css/login.css" />
	</head>
	<body>
		<div id="table">
			<div id="row_1">
				<div id="decw_and_form">
					<h1 id="form_ttl">欢迎进入同袍小筑</h1>
					<div id="login_form">
						<?php
							include("conn.php");
							//error_reporting(0);
							if(isset($_POST['submit']))
							{
								$uid=empty($_POST['uid'])?'':$_POST['uid'];
								$password=empty($_POST['password'])?'':$_POST['password'];
								$sql="select * from user where uid='".$uid."' and password='".$password."'";
								$query=mysqli_query($conn,$sql);
								$array=mysqli_fetch_array($query);
								if(!empty($array)){
									SESSION_start();
									$_SESSION['uid']=$uid;
									echo "<script>alert('登录成功');location.href='index.php'</script>";
								}
								else{
									echo "<script>alert('请先注册')</script>";
								}
							}
						?>
						<SCRIPT language=JavaScript>
							function Checklogin()
							{
								if (myform.uid.value=="")
								{
									alert("请填写登录名");
									myform.user.focus();
									return false;
								}
								if (myform.password.value=="")
								{
									alert("密码不能为空");
									myform.password.focus();
									return false;
								}
							}
						</SCRIPT>
						<form action="#" method="post" name="myform" onsubmit="Checklogin();">
							<div id="login_name">名帖：<input type="text" name="uid" /></div>
							<div id="login_pwd">密码：<input type="password" name="password" /></div>
							<input type="submit" name="submit" value="登入" id="login_b_submit" />
							<a href="register.php"><button id="login_b_register">注册</button></a>
						</form>
					</div>
				    <ul id="dec_words">
					    <li class="dec_word">绿兮衣兮，绿衣黄裹。心之忧矣，曷维其已！</li>
					    <li class="dec_word">绿兮衣兮，绿衣黄裳。心之忧矣，曷维其亡！</li>
					    <li class="dec_word">绿兮丝兮，女所治兮。我思古人，俾无訧兮！</li>
					    <li class="dec_word">絺兮绤兮，凄其以风。我思古人，实获我心！</li>
					</ul>
				</div>
				<img src="img/longin_decoration.gif" id="dec_img" />
			</div>
		</div>
	</body>
</html>
