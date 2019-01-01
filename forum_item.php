<!DOCTYPE html>
<html>
	<head>
		<?php
			include("conn.php");
			if(isset($_GET['f_aid']))
			{
				$query = mysql_query('SELECT * FROM `forum_all` WHERE `f_aid` =\'' . $_GET['f_aid'] . '\'');
				//帖子相关信息
				$row_fa = mysql_fetch_array($query);
				$query = mysql_query('SELECT * FROM `user` WHERE `uid` = \'' . $row_fa['uid'] . '\'');
				//帖子发布者相关信息
				$row_fa_user = mysql_fetch_array($query);
		?>
		<meta charset="utf-8">
		<title>夜话-<?php echo $row_fa['title']; ?></title>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/forum_item.css" type="text/css"/>
	</head>
	<body>
		<!-- 标题 -->
		<div id="item_ttl"><?php echo @$row_fa['title']; ?></div>
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
		<div id="forum_main">
			<table>
				<tr class="an_item">
					<td class="item_col1">
						<div class="one_person">
							<?php
								if(@$row_fa_user['sex'])
								{
							?>
							<img src="./img/male.jpg" alt="这是一个头像" />
							<?php
								}
								else{
							?>
							<img src="./img/female.jpg" alt="这是一个头像" />
							<?php
								}
							?>
							<!-- 名字 -->
							<p><?php echo @$row_fa_user['uid'] ?></p> 
							<!-- 个签 -->
							<p><?php echo @$row_fa_user['signature'] ?></p>
						</div>
					</td>
					<td class="item_col2">
						<!-- 这里是内容上 -->
						<p class="item_con"><?php echo @$row_fa['f_acontent'] ?></p>
						<!-- 这里是日期 -->
						<p class="date"><?php echo @$row_fa['f_atime'] ?></p>
					</td>
					<?php
						}
					?>
					<!-- 这里是第三列 是空的 -->
					<td class="item_col3"></td>
				</tr>
				<?php
					if(@$POST['submit']){
						$sql = "insert into forum_item (f_aid,uid,f_acontent)".
						       "values('$_GET['f_aid']','$_SESSION['uid']','$_POST['add_content']')";
						mysql_query($sql);
						echo "<script language=\"javascript\">alert('发表成功');</script>";
					}
				?>
				<SCRIPT language=javascript>
					function CheckPost()
					{
						var z=myform.f_icontent.value;
						if (z=="")
						{
							alert("必须要填写留言内容");
							myform.f_icontent.focus();
							return false;
						}
					}
				</SCRIPT>
				<tr>
					<td colspan="3">
						<div id="add_message">
							<form action="#" method="post" name="myform" onsubmit="return CheckPost();">
								<div id="add_content">
									<div id="content_ttl">留言处：</div>
									<textarea name="f_icontent" id="content_border" rows="5" cols="45"></textarea>
								</div>
								<input type="submit" value="发表" id="forum_item_b_add"/>
							</form>
						</div>
					</td>
				</tr>
				<?php
				//搜索和主贴有关的留言
				$query = mysql_query('SELECT * FROM `forum_item` WHERE `f_aid` = \'' . $_GET['f_aid'] . '\' ORDER BY f_itime DESC');
				while($row_fi = mysql_fetch_array($query)){
					if($row_fi['sex']){
				?>
				<tr>
					<td class="item_col1">
						<div class="one_person">
							<img src="./img/male.jpg" alt="这是一个头像" />
							<?php
									}
									else{
							?>
							<img src="./img/male.jpg" alt="这是一个头像" />
							<?php
									}
							?>
							<!-- 名字 -->
							<p><?php echo $row_fi['uid']; ?></p>
							<!-- 个签 -->
							<p><?php echo $row_fi['signature']; ?></p>
						</div>
					</td>
					<td class="item_col2">
						<!-- 这里是内容 -->
						<p class="item_con"><?php echo @$row_fi['f_icontent']; ?></p>
						<!-- 这里是日期 -->
						<p class="date"><?php echo @$row_fi['f_itime'] ?></p>
					</td>
					<!-- 这里是第三列 -->
					<td class="item_col3"></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</body>
</html>
