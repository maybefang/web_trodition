<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>同袍小筑-注册</title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="css/register.css" />
	</head>
	<body>
		<div id="table">
			<div id="row_1">
				<div id="decw_and_form">
					<h1 id="form_ttl">欢迎加入同袍小筑</h1>
					<div id="login_form">
						<form action="#" method="post" name="myform" onsubmit="return Checklogin();">
							<div id="login_name">名帖：<input type="text" name="uid" /><p id="note">请为自己想一个独一无二的名帖</p></div>
							<div id="login_pwd">密码：<input type="password" name="password" /></div>
							<div id="pwd_confirm">确认密码：<input type="password" name="pwd_confirm"></div>
							<div id="sex">
								<label><input type="radio" name="sex" value="0" checked />红颜</label>
								<label><input type="radio" name="sex" value="1" />蓝颜</label>
							</div>
							<input type="submit" name="submit" value="注册" id="login_b_register" />
							<a href="login.php"><button id="login_b_login">返回登录</button></a>
						</form>
					</div>
					<?php
						include("conn.php");
						if (isset($_POST["submit"]))
						{
							
							$uid=empty($_POST['uid'])?'':$_POST['uid'];
							$password=empty($_POST['password'])?'':$_POST['password'];
							$sql="insert into user (uid,password,sex)"."values('$_POST[uid]','$_POST[password]','$_POST[sex]')";
							$array=mysqli_query($conn,$sql);
							if(!empty($array)){
								SESSION_start();
								$_SESSION['uid']=$uid;
								echo "<script>alert('注册成功');location.href='index.php'</script>";
							}
						}
					?>
					<SCRIPT language=JavaScript>
						function Checklogin()
						{
							if (myform.uid.value=="")
							{
								alert("请填写用户名");
								myform.user.focus();
								return false;
							}
							if (myform.password.value=="")
							{
								alert("密码不能为空");
								myform.password.focus();
								return false;
							}
							if (myform.password.value != myform.pwd_confirm.value)
							{
								alert("两次密码不相同");
								myform.pwd_confirm.focus();
								return false;
							}
						}
					</SCRIPT>
				    <ul id="dec_words">
					    <li class="dec_word">越罗衫袂迎春风，玉刻麒麟腰带红。</li>
					    <li class="dec_word">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;楼头曲宴仙人语，帐底吹笙香雾浓。</li>
					</ul>
				</div>
				<img src="img/longin_decoration.gif" id="dec_img" />
			</div>
		</div>
	</body>
</html>
