<?php include("head.php"); ?>
<h1 style="margin-left: 525px; margin-top: 20px;">课程录入</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">课程录入</p>
		<form id="form1" method="post" class="sui-form form-horizontal sui-validate" action="kecheng-save.php">
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程名:</label>
				<div class="controls">
					<input type="text" id="KcNam" name="KcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程时间:</label>
				<div class="controls">
					<input type="text" id="KcTime" name="KcTime" class="input-large input-fat" data-toggle="datepicker" placeholder="输入课程名称">
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