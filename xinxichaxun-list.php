<?php include("head.php"); ?>
<?php
include ('conn.php');
$surname = $_POST['surname'];
$xuehao = $_POST['xuehao'];
//执行SQL语句
$sql = "select * from student where 学号='{$xuehao}' and 姓名='{$surname}'";
$result = mysqli_query($conn,$sql);

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
				<th>编号</th>
				<th>学号</th>
				<th>班号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>出生日期</th>
				<th>电话</th>
			</tr>
			<?php
				//输出数据
				// var_dump($result);
				if (mysqli_num_rows($result) > 0) {
					while ( $row = mysqli_fetch_assoc($result)) {
						$row1 = $row['性别']==1?'男':'女';
						echo "<tr>
								<td>{$row['id']}</td>
								<td>{$row['学号']}</td>
								<td>{$row['班号']}</td>
								<td>{$row['姓名']}</td>
								<td>{$row1}</td>
								<td>{$row['出生日期']}</td>
								<td>{$row['电话']}</td>
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