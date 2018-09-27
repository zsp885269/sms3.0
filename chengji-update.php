<?php
$kid = empty($_GET["kid"])?"null":$_GET["kid"];
if ($kid == "null") {
	die ("请选择要修改的记录");
}else{
include ('conn.php');

//执行SQL语句
$sql = "select 学号,课程编号,成绩 from xuznxiu where 学号='{$kid}'";

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
<h1 style="margin-left: 500px; margin-top: 20px;">录入信息</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php") ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">成绩录入</p>
		<form class="sui-form form-horizontal sui-validate" id="form2" action="chengji-save.php" method="post">
			<div class="control-group">
				<label for="inputEmail" class="control-label">学号:</label>
				<div class="controls">
					<!-- 增加一个input，用来区分是新增加的数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 --> 
					<input type="hidden" name="kid" value="<?php echo $row['学号'] ?>">
					<input type="text" id="xuehao" name="xuehao" value="<?php echo $row['学号']; ?>" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
    			<label class="control-label" for="inputEmail">课程编号：</label>
   				<div class="controls">
					<input type="text" id="xsBhao" name="xsBhao" value="<?php echo $row['课程编号']; ?>" class="input-large input-fat" placeholder="输入课程编号" data-rules="required|minlength=2|maxlength=10">
   				 </div>
 			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">成绩:</label>
				<div class="controls">
					<input type="text" id="grade" name="grade" value="<?php echo $row['成绩']; ?>" class="input-large input-fat" data-rules="required" placeholder="输入成绩">
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