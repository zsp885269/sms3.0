<?php include("head.php"); ?>
<?php
include ('conn.php');
$surname = $_POST['surname'];
$xuehao = $_POST['xuehao'];
$Cname = $_POST['Cname'];
//判断姓名input是否有值，有则返回name，没有返回student保存到变量中
$xuanze = empty($_POST['surname'])?"student1":"name";
//执行SQL语句如果姓名input框中有值，执行$sql语句
if ($xuanze == "name") {
	//选中所有的表,选修.x左链接选修中的课程编号等于课程中的课程编号在进入左连接选修中的学号等于学生中的学号判断学生中的姓名等于输入的 and 课程中的课程名等于input中输入的课程名
	$sql1 ="select * FROM xuznxiu AS x LEFT JOIN kecnang AS k ON x.课程编号=k.课程编号 LEFT JOIN student as s ON x.学号=s.学号 WHERE s.姓名 = '{$surname}' AND k.课程名 = '{$Cname}'";
	// echo $sql1;
//如果姓名input框中没有值，执行$sql语句
}else if($xuanze == "student1"){
	$sql1="select * FROM xuznxiu AS x LEFT JOIN kecnang AS k ON x.课程编号=k.课程编号 LEFT JOIN student as s ON x.学号=s.学号 WHERE x.学号 = '{$xuehao}' AND k.课程名 = '{$Cname}'";
//否则
}else{
	//输出内容中断执行
	die("请选择操作方法");
}

$result = mysqli_query($conn,$sql1);

//关闭数据库
mysqli_close($conn);
?>
<h1 style="margin-left: 525px; margin-top: 20px;">查询信息</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">学生信息查询</p>
		<table class="sui-table table-primary">
			<tr>
				<th>姓名</th>
				<th>课程名</th>
				<th>成绩</th>
			</tr>
			<?php
				//输出数据
				// var_dump($result);
				if (mysqli_num_rows($result) > 0) {
					while ( $row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>{$row['姓名']}</td>
								<td>{$row['课程名']}</td>
								<td>{$row['成绩']}</td>
							</tr>";
					}
				}else{
					echo "没有记录";
				}
			?>
		</table>
	</div>
</div>
<?php include "foot.php"; ?>