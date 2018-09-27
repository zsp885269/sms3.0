<?php include("head.php"); ?>
<?php
include ('conn.php');

//执行SQL语句
$sql = "select id,email,name,password,question,answer from user";
$result = mysqli_query($conn,$sql);

//关闭数据库
mysqli_close($conn);
?>
<h1 style="margin-left: 525px; margin-top: 20px;">会员管理</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">会员管理</p>
		<table class="sui-table table-primary">
			<tr>
				<th>id</th>
				<th>用户邮件</th>
				<th>用户名</th>
				<th>密码</th>
				<th>密码提示问题</th>
				<th>提示问题答案</th>
				<th>操作</th>
			</tr>
			<?php
				//输出数据
				// var_dump($result);
				if (mysqli_num_rows($result) > 0) {
					while ( $row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>{$row['id']}</td>
								<td>{$row['email']}</td>
								<td>{$row['name']}</td>
								<td>{$row['password']}</td>
								<td>{$row['question']}</td>
								<td>{$row['answer']}</td>
								<td><a href='huiyuan-update.php?kid={$row["id"]}' class='sui-btn btn-warning'>修改</a>
									&nbsp;&nbsp;
									<a href='huiyuan-del.php?kid={$row["id"]}' class='sui-btn btn-danger'>删除</a>
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