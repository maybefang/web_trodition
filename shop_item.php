<!DOCTYPE html>
<html>
	<head>
		<?php
			include("conn.php");
			session_start();
			if(isset($_GET['sid']))
			{
				$sql = 'SELECT * FROM shops WHERE sid =\'' . $_GET['sid'] . '\'';
				$query = mysqli_query($conn,$sql);
				//科普相关信息
				$row_p = mysqli_fetch_array($query);
				$sql = 'SELECT * FROM `user` WHERE `uid` = \'' . $row_p['uid'] . '\'';
				$query = mysqli_query($conn,$sql);
				//帖子发布者相关信息
				$row_p_user = mysqli_fetch_array($query);
		?>
		<meta charset="utf-8">
		<title>商铺-<?php echo $row_p['sname']; ?></title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/shop_item.css" type="text/css"/>
	</head>
	<body>
		<div id="item_ttl">岂曰无衣?&nbsp;与子同袍</div>
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
		<div id="recommender">
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
		<div id="shop_recommend">
			<!-- 这里是店铺名称 -->
			<h2 id="shop_name">店铺名称：<?php echo $row_p['sname'];?></h2>
			<!-- 这里是店铺平台 -->
			<h3 id="plant">店铺平台：<?php echo $row_p['splant'];?></h3>
			<!-- 这里是店铺地址 -->
			<h3 id="address">店铺地址：<?php echo $row_p['saddress'];?></h3>
			<!-- 这里是店铺关键字 -->
			<h4 id="skey">店铺类型：<?php echo $row_p['skey'];?></h4>
			<!-- 这里是店铺价格 -->
			<h4 id="sprice">店铺价格区间：<?php echo $row_p['sprice'];?></h4>
			<!-- 这里是店铺描述 -->
			<div id="shop_description"><?php echo $row_p['sdescription'];?></div>
		</div>
		<?php
			}
		?>
	</body>
</html>