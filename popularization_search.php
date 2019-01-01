<!DOCTYPE html>
<html>
	<?php
		include("conn.php");
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
		<div id="first_dec">书痴者文必工，</div>
		<div id="second_dec">艺痴者技必良</div>
		<table>
			<?php
				if(!empty($_POST['keys'])){
    				$keys = "WHERE title like '%".$_POST['keys']."%' OR uid LIKE '%".$_POST['keys']."%' OR pcontent LIKE '%".$_POST['keys']."%' ";
    				//var_dump($keys);
				} else {
    			$keys = "";
				exit();
				}
				$sql = "SELECT * FROM popularization ".$keys." ORDER BY time DESC";
				$query = mysql_query($sql);
				while($row=mysql_fetch_array($query)){
			?>
			<tr class="an_item">
				<!-- 这里是标题 -->
				<td class="ttl">
					<a href="popularization_item.php?pid=<?php echo $row['pid'] ?>">
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
