<?php 
	$KcName = $_POST["KcName"];
	$KcTime = $_POST["KcTime"];
	//如果是录入页面提交，那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "kecheng.php";
		$sql1 = "insert into kecnang(课程名,时间) value('$KcName','$KcTime')";
	}else if($action == "update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "kecheng-list.php";
		$kid = $_POST["kid"];
		$sql1 = "update kecnang set 课程名='{$KcName}',时间='{$KcTime}' where 课程编号={$kid}";
	}else{
		die("请选择操作方法");
	}

	include ('conn.php');

	$result = mysqli_query($conn,$sql1);

	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('$str1');</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo "$str2".mysqli_error("$conn");
	}

	//关闭数据库
	mysqli_close($conn);
?>