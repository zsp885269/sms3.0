<?php
include ('conn.php');

//执行SQL语句
$sql = "delete from xuznxiu where 学号='{$_GET['kid']}'";
// echo $sql;
$result = mysqli_query($conn,$sql);

if ($result) {
	echo "<script>alert('数据删除成功');</script>";
	header("Refresh:1;url=chengji-list.php");
}else{
	echo "数据删除失败".mysqli_error($conn);
}

//关闭数据库
mysqli_close($conn);
?>