<!DOCTYPE html>
<html>
	<?php
		include("conn.php");
		session_start();
	?>
	<head>
		<meta charset="utf-8">
		<title>同袍小筑-科普</title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/popularization.css" type="text/css"/>
	</head>
	<body>
		<table id="header">
			<tr>
				<td id="item_ttl">学而不厌,&nbsp;诲人不倦</td>
				<td id="search">
					<form action="popularization_search.php" method="post">
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
					</div>
					<div id="navigation_tail">
						<a href="popularization_add.php" id="popularization_add"><img src="img/navigation.ico">添加新科普</a>
					</div>
				</nav>
			</div>
		</div>
		<div id="first_dec">书痴者文必工，</div>
		<div id="second_dec">艺痴者技必良</div>
		<table>
			<?php
				$sql = "SELECT * FROM popularization ORDER BY time DESC";
				$query = mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($query)){
			?>
			<tr class="an_item">
				<!-- 这里是标题 -->
				<td class="ttl">
					<a href="popularization_item.php?pid=<?php echo $row['pid']; ?>">
						<?php echo $row['title']; ?>
					</a>
				</td>
				<!-- 这里是科普人 -->
				<td class="usr"><?php echo $row['uid']; ?></td>
				<!-- 这里是科普日期 -->
				<td class="date"><?php echo $row['time']; ?></td>
			</tr>
			<?php 
				}
		    ?>
		</table>
	</body>
</html>