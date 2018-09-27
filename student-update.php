<?php
$kid = empty($_REQUEST["kid"])?"null":$_REQUEST["kid"];
if ($kid == "null") {
	die ("请选择要修改的记录");
}else{
	include ('conn.php');

	//执行SQL语句
	$sql = "select * from student where id={$kid}";

	$result = mysqli_query($conn,$sql);
		// 输出数据
		if (mysqli_num_rows($result) > 0){
			// 将查询的结果转换为下列数组
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
		<p class="sui-text-xxlarge" style="margin-left: 50px;">学生信息录入</p>
		<form class="sui-form form-horizontal sui-validate" id="form2" action="student-save.php" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label for="inputEmail" class="control-label">学号:</label>
				<div class="controls">
					<!-- 增加一个input，用来区分是新增加的数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 --> 
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
					<input type="text" id="mark" name="xuemark" value="<?php echo $row['学号']; ?>" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
    			<label class="control-label" for="inputEmail">班号：</label>
   				<div class="controls">
					<input id="xsBhao" name="xsBhao" class="input-large input-fat" type="text" placeholder="请输入班号" value="<?php echo $row['班号']; ?>">
   				 </div>
 			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">姓名:</label>
				<div class="controls">
					<input type="text" id="xingming" name="xingming" value="<?php echo $row['姓名']; ?>" class="input-large input-fat" data-rules="required" placeholder="输入姓名">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">性别:</label>
					<div class="controls" id="gender">
						<label class="radio-pretty inline <?php if ($row['性别']=="1") {echo "checked";} ?>">
							<input type="radio" checked="checked" name="man" value="1"><span>男</span>
						</label>
						<label class="radio-pretty inline <?php if ($row['性别']=="0") {echo "checked";} ?>"">
							<input type="radio" name="man" value="0"><span>女</span>
						</label>
					</div>
				</label>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">图片:</label>
				<div class="controls">
					<input type="file" name="file">
					<input type="hidden" name="tupain" value="<?php echo $row['图片']; ?>">
            		<img src="<?php echo $row['图片']; ?>" width="100px" height="120px">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">出生日期:</label>
				<div class="controls">
					<input type="text" id="birth" name="birth" value="<?php echo $row['出生日期']; ?>" class="input-large input-fat" data-toggle="datepicker" placeholder="输入出生日期">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">电话号码:</label>
				<div class="controls">
					<input type="text" id="phone" name="phone" value="<?php echo $row['电话']; ?>" class="input-large input-fat" data-rules="required" placeholder="输入电话号码">
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
<script>
  var xsBhao = document.getElementById("xsBhao");
  xsBhao.onblur = function(){
    xsBhao.value = xsBhao.value.toUpperCase();
  }
</script>