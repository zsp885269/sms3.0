<?php include("head.php"); ?>
<?php
include ('conn.php');

//执行SQL语句
$sql = "select id,学号,班号,姓名,性别,出生日期,电话 from student";
$result = mysqli_query($conn,$sql);

//关闭数据库
mysqli_close($conn);
?>
<h1 style="margin-left: 525px; margin-top: 20px;">修改信息</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">学生修改</p>
		<table class="sui-table table-primary">
			<tr>
				<th>编号</th>
				<th>学号</th>
				<th>班号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>出生日期</th>
				<th>电话</th>
				<th>操作</th>
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
								<td><a href='student-update.php?kid={$row["id"]}' class='sui-btn btn-warning'>修改</a>
									&nbsp;&nbsp;
									<a href='student-del.php?kid={$row["id"]}' class='sui-btn btn-danger'>删除</a>
								</td>
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