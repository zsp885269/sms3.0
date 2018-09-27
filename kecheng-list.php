<?php include("head.php"); ?>
<?php
include ('conn.php');

//执行SQL语句
$sql = "select 课程编号,课程名,时间 from kecnang";
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
		<p class="sui-text-xxlarge" style="margin-left: 50px;">课程修改</p>
		<table class="sui-table table-primary">
			<tr>
				<th>课程编号</th>
				<th>课程名</th>
				<th>时间</th>
				<th>操作</th>
			</tr>
			<?php
				//输出数据
				// var_dump($result);
				if (mysqli_num_rows($result) > 0) {
					while ( $row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>{$row['课程编号']}</td>
								<td>{$row['课程名']}</td>
								<td>{$row['时间']}</td>
								<td><a href='kecheng-update.php?kid={$row["课程编号"]}' class='sui-btn btn-warning'>修改</a>
									&nbsp;&nbsp;
									<a href='kecheng-del.php?kid={$row["课程编号"]}' class='sui-btn btn-danger'>删除</a>
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