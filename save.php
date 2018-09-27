<?php 
	$KcName = $_POST["KcName"];
	$KcTime = $_POST["KcTime"];
	echo $KcName;
	echo $KcTime;
	//创建连接
	$conn = mysqli_connect("localhost","root","");
	if ($conn) {
		echo "连接成功!";
	}else{
		die("连接失败!".mysqli_connect_error() );
	}

	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");

	//设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");

	//执行SQL语句
	$sql1 = "insert into kecnang(课程名,时间) value('$KcName','$KcTime')";
	$result = mysqli_query($conn,$sql1);

	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('数据更新成功');</script>";
		header("Refresh:1;url=student02.php");
	}else{
		echo "数据更新失败".mysqli_erroe($conn);
	}

	//关闭数据库
	mysqli_close($conn);
?>