<?php include("head.php"); ?>
<?php
include ('conn.php');

//执行SQL语句
$sql = "select 班号,班长,教室,班主任,班级口号 from banji2";
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
		<p class="sui-text-xxlarge" style="margin-left: 50px;">班级修改</p>
		<table class="sui-table table-primary">
			<tr>
				<th>班号</th>
				<th>班长</th>
				<th>教室</th>
				<th>班主任</th>
				<th>班级口号</th>
				<th>操作</th>
			</tr>
			<?php
				//输出数据
				// var_dump($result);
				if (mysqli_num_rows($result) > 0) {
					while ( $row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>{$row['班号']}</td>
								<td>{$row['班长']}</td>
								<td>{$row['教室']}</td>
								<td>{$row['班主任']}</td>
								<td>{$row['班级口号']}</td>
								<td><a href='banji2-update.php?kid={$row["班号"]}' class='sui-btn btn-warning'>修改</a>
									&nbsp;&nbsp;
									<a href='banji2-del.php?kid={$row["班号"]}' class='sui-btn btn-danger'>删除</a>
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