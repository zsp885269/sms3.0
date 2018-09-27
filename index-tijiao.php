<?php 
	$conn = mysqli_connect("localhost","root","");
	if ($conn) {
		// echo "连接成功!";
	}else{
		// die("连接失败!".mysqli_connect_error() );
	}

	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	//设置读取数据库的编码,不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");
	// 执行查询eamil的sql
	$email = $_REQUEST['email'];
	$name = $_REQUEST["names"];
	$password = $_REQUEST["password"];
	$question = $_REQUEST["question"];
	$answer = $_REQUEST["answer"];
	$sql = "insert into user(email,name,password,question,answer) value('$email','$name','$password','$question','$answer')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "ok";
	}else{
		echo "数据添加失败";
	}
	mysqli_close($conn);
?>