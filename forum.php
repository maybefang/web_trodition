<!DOCTYPE html>
<html>
	<?php
		include("conn.php");
	?>
	<head>
		<meta charset="utf-8">
		<title>同袍小筑-夜话</title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/forum.css" type="text/css"/>
	</head>
	<body>
		<table id="header">
			<tr>
				<td id="item_ttl">这里是标题</td>
				<td id="search">
					<form action="forum_search.php" method="post">
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
					<div id="navigation_tail">
						<a href="forum_add.php" id="forum_add"><img src="img/navigation.ico">添加新帖</a>
					</div>
				</nav>
			</div>
		</div>
		<div id="first_dec">杨意不逢，抚凌云而自惜；</div>
		<div id="second_dec">钟期既遇，奏流水以何惭？</div>
		<table>
			<?php
				$sql = "SELECT * FROM forum_all ORDER BY f_aupdatetime DESC";
				$query = mysql_query($sql);
				while($row=mysql_fetch_array($query)){
			?>
			<tr class="an_item">
				<!-- 这里是标题 -->
				<td class="ttl">
					<a href="forum_item.php?f_aid=<?php echo $row['f_aid'] ?>" >
					<?php echo @$row['title']; ?>
				</td>
				<!-- 这里是发表人 -->
				<td class="usr"><?php echo @$row['uid']; ?></td>
				<!-- 这里是最近更新日期 -->
				<td class="date"><?php echo @$row['f_aupdatetime']; ?></td>
			</tr>
			<?php 
				}
		    ?>
		</table>
	</body>
</html>