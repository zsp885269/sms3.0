<?php include("head.php"); ?>
<h1 style="margin-left: 500px; margin-top: 20px;">班级信息录入</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">班级信息录入</p>
		<form class="sui-form form-horizontal sui-validate" id="form2" action="banji2-save.php" method="post">
			<div class="control-group">
				<label for="inputEmail" class="control-label">班号:</label>
				<div class="controls">
					<input type="text" id="no" name="no" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班长:</label>
				<div class="controls">
					<input type="text" id="monitor" name="monitor" class="input-large input-fat" data-rules="required" placeholder="输入班长名称">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">教室:</label>
				<div class="controls">
					<input type="text" id="classroom" name="classroom" class="input-large input-fat" data-rules="required" placeholder="输入教室名称">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班主任:</label>
				<div class="controls">
					<input type="text" id="allow" name="allow" class="input-large input-fat" data-rules="required" placeholder="输入班主任名称">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班级口号:</label>
				<div class="controls">
					<textarea id="motto" name="motto" placeholder="输入班级口号" data-rules="required"></textarea>
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