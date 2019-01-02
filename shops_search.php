<!DOCTYPE html>
<html>
	<?php
		include("conn.php");
		session_start();
	?>
	<head>
		<meta charset="utf-8">
		<title>同袍小筑-商铺</title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/shops.css" type="text/css"/>
	</head>
	<body>
		<table id="header">
			<tr>
				<td id="item_ttl">岂曰无衣？&nbsp;与子同袍</td>
				<td id="search">
					<form action="#" method="post">
						搜索:<input type="text" name="keys" id="input_key"/>
						<input type="submit" value="确定"  id="b_search"/>
					</form>
				</td>
			</tr>
		</table>
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
				</nav>
			</div>
		</div>
		<div id="first_dec">弗敢专也，</div>
		<div id="second_dec">必以分人。</div>
		<table>
			<?php
				if(!empty($_POST['keys'])){
    				$keys = "WHERE title like '%".$_POST['keys']."%' OR uid LIKE '%".$_POST['keys']."%' OR sdescription LIKE '%".$_POST['keys']."%' ";
    				//var_dump($keys);
				} else {
    			$keys = "";
				exit();
				}
				$sql = "SELECT * FROM shops ".$keys." ORDER BY time DESC";
				$query = mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($query)){
			?>
			<tr class="an_item">
				<!-- 这里是标题 -->
				<td class="ttl">
					<a href="shop_item.php?sid=<?php echo $row['sid']; ?>">
						<?php echo $row['title']; ?>
					</a>
				</td>
				<!-- 这里是推荐人 -->
				<td class="usr"><?php echo $row['uid']; ?></td>
				<!-- 这里是推荐日期 -->
				<td class="date"><?php echo $row['time']; ?></td>
			</tr>
			<?php 
				}
			?>
		</table>
	</body>
</html>
