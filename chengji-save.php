<?php 
	$xuehao = $_POST["xuehao"];
	$xsBhao = $_POST["xsBhao"];
	$grade = $_POST["grade"];
	//如果是录入页面提交，那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
		if ($action == "add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "chengji.php";
		$sql1 = "insert into xuznxiu(学号,课程编号,成绩) value('$xuehao','$xsBhao','$grade')";
	}else if($action == "update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "chengji-list.php";
		$kid = $_POST["kid"];
		$sql1 = "update xuznxiu set 学号='{$xuehao}',课程编号='{$xsBhao}',成绩='{$grade}' where 学号='{$kid}'";
	}else{
		die("请选择操作方法");
	}

	include ('conn.php');
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);

	//输出数据
	if ($result) {
		echo "<script>alert('$str1');</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo "$str2".mysqli_error($conn);
	}

	//关闭数据库
	mysqli_close($conn);
?>