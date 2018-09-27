<?php 
	$no = $_POST["no"];
	$monitor = $_POST["monitor"];
	$classroom = $_POST["classroom"];
	$allow = $_POST["allow"];
	$motto = $_POST["motto"];
	//如果是录入页面提交，那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
		if ($action == "add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "banji2.php";
		$sql1 = "insert into banji2(班号,班长,教室,班主任,班级口号) value('$no','$monitor','$classroom','$allow','$motto')";
	}else if($action == "update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "banji2-list.php";
		$kid = $_POST["kid"];
		$sql1 = "update banji2 set 班号='{$no}',班长='{$monitor}',教室='{$classroom}', 班主任='{$allow}',班级口号='{$motto}' where 班号='{$kid}'";
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