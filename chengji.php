<?php 
	include("head.php");
	include("conn.php");
	$sql = "select distinct 课程编号 from xuznxiu";
	$result = mysqli_query($conn, $sql);
?>
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
					<input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
    			<label class="control-label" for="inputEmail">课程编号：</label>
   				<div class="controls">
					<input type="hidden" value="" name="xsBhao" id="xsBhao">
					<select id="duoxuan">
						<?php
							if( mysqli_num_rows($result) > 0 ){
								while ( $row = mysqli_fetch_assoc($result) ) {
									echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
								}
							}else{
								echo "<option value=''>请先添加班级信息</option>";
							}
						?>
					</select>
   				 </div>
 			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">成绩:</label>
				<div class="controls">
					<input type="text" id="grade" name="grade" class="input-large input-fat" data-rules="required" placeholder="输入成绩">
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
  var xsBhao = document.getElementById('xsBhao');
  var duoxuan = document.getElementById('duoxuan');
  console.log(duoxuan);
  xsBhao.value = duoxuan.value;
  duoxuan.onchange = function(){
    xsBhao.value = this.value.toUpperCase();
  }
</script>