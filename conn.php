<?php
$conn=@mysqli_connect("localhost","root","")or die("数据库链接错误");
mysqli_select_db($conn,"trodition");
mysqli_query($conn,"set names'utf8'");

function htmtocode($content) {
	$content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}
?>