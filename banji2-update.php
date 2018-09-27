<?php
$kid = empty($_GET["kid"])?"null":$_GET["kid"];
if ($kid == "null") {
	die ("请选择要修改的记录");
}else{
include ('conn.php');

//执行SQL语句
$sql = "select 班号,班长,教室,班主任,班级口号 from banji2 where 班号='{$kid}'";

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
<?php include("head.php"); ?>
<h1 style="margin-left: 500px; margin-top: 20px;">班级信息录入</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php") ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">班级信息录入</p>
		<form class="sui-form form-horizontal sui-validate" id="form2" action="banji2-save.php" method="post">
			<div class="control-group">
				<label for="inputEmail" class="control-label">班号:</label>
				<div class="controls">
					<!-- 增加一个input，用来区分是新增加的数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 --> 
					<input type="hidden" name="kid" value="<?php echo $row['班号'] ?>">
					<input type="text" id="no" name="no" value="<?php echo $row['班号']; ?>" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班长:</label>
				<div class="controls">
					<input type="text" id="monitor" name="monitor" value="<?php echo $row['班长']; ?>" class="input-large input-fat" data-rules="required" placeholder="输入班长名称">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">教室:</label>
				<div class="controls">
					<input type="text" id="classroom" name="classroom" value="<?php echo $row['教室']; ?>" class="input-large input-fat" data-rules="required" placeholder="输入教室名称">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班主任:</label>
				<div class="controls">
					<input type="text" id="allow" name="allow" value="<?php echo $row['班主任']; ?>" class="input-large input-fat" data-rules="required" placeholder="输入班主任名称">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班级口号:</label>
				<div class="controls">
					<textarea id="motto" name="motto" value="<?php echo $row['班级口号']; ?>" placeholder="输入班级口号" data-rules="required"></textarea>
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