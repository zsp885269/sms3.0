<?php 
	$headline = $_POST["headline"];
	$kicker = $_POST["kicker"];
	$content = $_POST["content"];
	$time = $_POST["time"];
	$column = $_POST["column"];
	$author = $_POST["author"];
	$hc = time();
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "video/mp4")
		|| ($_FILES["file"]["type"] == "image/pjpeg"))
		&& ($_FILES["file"]["size"] < 10241000)){
		 if ($_FILES["file"]["error"] > 0){
		 	echo "错误: " . $_FILES["file"]["error"] . "<br />";
		 }else{
		 	//重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
		 	$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
		 	//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
			move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
		 }
	}else{
		echo "您上传的文件不符合要求！";
	}
	//如果是录入页面提交，那么$action等于add
	
		if ($action == "add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "news.php";
		$sql1 = "insert into news(标题,肩题,图片,内容,发布时间,创建时间,userid,columnid) value('$headline','$kicker','$filename','$content','$time','$hc','$author','$column')";
		// echo $sql1;
	}else if($action == "update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "newscolumn.php";
		$kid = $_POST["kid"];
		$sql1 = "update news set 标题='{$headline}',肩题='{$kicker}',图片='{$filename}',内容='{$content}',发布时间='{$time}',创建时间= '{$hc}',userid='{$author}',columnid='{$column}' where id={$kid}";
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