<!DOCTYPE html>
<html>
	<head>
		<?php
			include("conn.php");
			session_start();
			if(isset($_GET['pid']))
			{
				$query = mysqli_query($conn,'SELECT * FROM popularization WHERE `pid` =\'' . $_GET['pid'] . '\'');
				//科普相关信息
				$row_p = mysqli_fetch_array($query);
				$query = mysqli_query($conn,'SELECT * FROM `user` WHERE `uid` = \'' . $row_p['uid'] . '\'');
				//科普发布者相关信息
				$row_p_user = mysqli_fetch_array($query);
		?>
		<meta charset="utf-8">
		<title>科普-<?php echo $row_p['title']; ?></title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/popularization_item.css" type="text/css"/>
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
		<div id="pperson">
		<?php
			if($row_p_user['sex']){
		?>
		<img src="./img/male.jpg" alt="这是头像" />
		<?php
			}
			else{
		?>
		<img src="./img/female.jpg" alt="这是头像" />
		<?php
			}
		?>
			<!-- 这里是姓名 -->
			<p><?php echo $row_p_user['uid'] ?></p>
			<!-- 这里是个签 -->
			<p><?php echo $row_p_user['signature'] ?></p>
		</div>
		<div id="tra_popularization">
			<!-- 这里是科普标题 -->
			<h2 id="pttl"><?php echo $row_p['title']; ?></h2>
			<!-- 这里是科普关键字 -->
			<h3 id="pkey"><?php echo $row_p['pkey']; ?></h3>
			<!-- 这里是科普内容 -->
			<div id="pcontent"><?php echo $row_p['pcontent'] ?></div>
		</div>
		<?php
			}
		?>
	</body>
</html>