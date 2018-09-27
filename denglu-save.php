<?php
	session_start();
	$mail = $_POST["mail"];
	$password = $_POST["password"];
	$url = "denglu.php";
	$sql1 = "select * from user where email = '{$mail}'";
	include("conn1.php");
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);
	//输出数据
	if (mysqli_num_rows($result) > 0 ) {
	    // 将查询的结果转换为下列数组
	    $row = mysqli_fetch_assoc($result);
	    // echo "<script>alert('该邮件名可以使用')</script>";
	    if ($row['password'] == $password) {
	    	//创建一个session，键为usname，值为$mali;
			$_SESSION['usname'] = $mail;
	    	echo "<script>alert('成功登录')</script>";
			$url1 = "Management system V1.0.php";
		 	header("Refresh:100;url={$url1}");
	    }
	}else{
	    echo "查找不到该数据";
	    header("Refresh:1;url={$url}");
	}
	//关闭数据库
	mysqli_close($conn);
?>