<?php include("head.php"); ?>
<?php
$kid = empty($_GET["kid"])?"null":$_GET["kid"];
if ($kid == "null") {
	die ("请选择要修改的记录");
}else{
include ('conn.php');

//执行SQL语句
$sql = "select 课程编号,课程名,时间 from kecnang where 课程编号='{$kid}'";
$result = mysqli_query($conn,$sql);

// 输出数据
if (mysqli_num_rows($result) > 0){
	//将查找到
	$row = mysqli_fetch_assoc($result);
}else{
	echo "找不到该记录";
}

//关闭数据库
mysqli_close($conn);
}
?>
<h1 style="margin-left: 525px; margin-top: 20px;">课程录入</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">课程录入</p>
		<form id="form1" action="kecheng-save.php" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程名:</label>
				<div class="controls">
					<!-- 增加一个input，用来区分是新增加的数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 --> 
					<input type="hidden" name="kid" value="<?php echo $row['课程编号'] ?>">
					<input type="text" value="<?php echo $row['课程名']; ?>" id="KcNam" name="KcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程时间:</label>
				<div class="controls">
					<input type="text" value="<?php echo $row['时间']; ?>" id="KcTime" name="KcTime" class="input-large input-fat" data-toggle="datepicker" placeholder="输入课程名称">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" value="提交" class="sui-btn btn-xlarge btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php include "foot.php"; ?>