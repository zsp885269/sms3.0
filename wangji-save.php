<?php
	$mail = $_POST["mail"];
	$issue = $_POST["issue"];
	$answer = $_POST["answer"];
	$url = "wangji.php";
	$sql1 = "select * from user where email = '{$mail}'";
	include("conn1.php");
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result) > 0 ) {
	    // 将查询的结果转换为下列数组
	    $row = mysqli_fetch_assoc($result);
	}else{
	    echo "没有数据";
	}
	//输出数据
	// var_dump($result);
	if ($row['question'] == $issue && $row['answer'] == $answer) {
		echo "<script>alert('成功登录')</script>";
		$url = "denglu.php";
	 	header("Refresh:1;url={$url}");
	}else{
		echo "<script>alert('答案错误')</script>";
	 	header("Refresh:1;url={$url}");
	}
//关闭数据库
mysqli_close($conn);
?>