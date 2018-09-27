<?php include("head.php"); ?>
<h1 style="margin-left: 525px; margin-top: 20px;">信息查询</h1>
	<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php") ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">成绩查询</p>
		<form class="sui-form form-horizontal sui-validate" id="form2" action="chengjichaxun-list.php" method="post">
			<div class="control-group">
				<label for="inputEmail" class="control-label">姓名:</label>
				<div class="controls">
					<input type="text" id="surname" name="surname" class="input-large input-fat" placeholder="输入姓名" data-rules="minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">学号:</label>
				<div class="controls">
					<input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程名:</label>
				<div class="controls">
					<input type="text" id="Cname" name="Cname" class="input-large input-fat" placeholder="输入课程名" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" value="查询" class="sui-btn btn-xlarge btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php include "foot.php"; ?>