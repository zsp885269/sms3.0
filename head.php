<?php
session_start();
//检测session是否为空，是则跳转到登录页面
if (empty($_SESSION['usname'])) {
	header("Refresh:0;url=denglu.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/default.css" type="text/css"/>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" href="css/Management.css">
	<style type="text/css">
	.userinfo{
		float: right;
		width: 220px;
		height: 25px;
		line-height: 25px;
		bottom: 0;
		right: 0;
		font-size: 12px;
		margin-top: 45px;
	}
	.userinfo span{
		color: red;
	}
</style>
</head>
<body>
	<div class="sui-container" style="width: 1200px; height: 700px; border:2px solid #000; margin-top: 100px;">
	<div class="userinfo">欢迎&nbsp;<span><?php echo $_SESSION['usname']; ?></span>&nbsp;登录&nbsp;&nbsp;<a href="denglu-out.php">退出</a></div>