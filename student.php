<?php 
	include("head.php");
	include("conn.php");
	//在banji2中找到不同的班号
	$sql = "select distinct 班号 from banji2";
	//执行sql语句并赋值给变量
	$result = mysqli_query($conn, $sql);
?>
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
					<input type="text" id="mark" name="xuemark" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
    			<label class="control-label" for="inputEmail">班号：</label>
   				<div class="controls">
					<input type="hidden" value="" name="xsBhao" id="xsBhao">
					<select id="duoxuan">
						<?php
							//如果查找到的班号返回长度大于0执行while进行判断
							if( mysqli_num_rows($result) > 0 ){
								//将结果中的班号转换为数组赋值给$row
								while ( $row = mysqli_fetch_assoc($result) ) {
									//输出结果下拉菜单.value值和内容都都为sql语句取到的班号
									echo "<option value='{$row['班号']}'>{$row['班号']}</option>";
								}
							//如果没有查找到输出其他语句
							}else{
								echo "<option value=''>请先添加班级信息</option>";
							}
						?>
					</select>
   				 </div>
 			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">姓名:</label>
				<div class="controls">
					<input type="text" id="xingming" name="xingming" class="input-large input-fat" data-rules="required" placeholder="输入姓名">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">性别:</label>
					<div class="controls" id="gender">
						<label class="radio-pretty inline checked">
							<input type="radio" checked="checked" name="man" value="1"><span>男</span>
						</label>
						<label class="radio-pretty inline">
							<input type="radio" name="man" value="0"><span>女</span>
						</label>
					</div>
				</label>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label" id="picture" name="picture">图片:</label>
				<div class="controls">
					<input type="file" name="file">

				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">出生日期:</label>
				<div class="controls">
					<input type="text" id="birth" name="birth" class="input-large input-fat" data-toggle="datepicker" placeholder="输入出生日期">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">电话号码:</label>
				<div class="controls">
					<input type="text" id="phone" name="phone" class="input-large input-fat" data-rules="required" placeholder="输入电话号码">
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
	//获取input的ID
	var xsBhao = document.getElementById('xsBhao');
	//获取select的ID
	var duoxuan = document.getElementById('duoxuan');
	console.log(duoxuan);
	//下拉菜单中去到的班号名传递给input
	xsBhao.value = duoxuan.value;
	//在input输入框发生改变时
	duoxuan.onchange = function(){
		//将value值转为大写，传递给input
		xsBhao.value = this.value.toUpperCase();
	}
</script>