<?php
$kid = empty($_GET["kid"])?"null":$_GET["kid"];
if ($kid == "null") {
	die ("请选择要修改的记录");
}else{
include ('conn.php');
//执行SQL语句
$sql = "select * from news where id='{$kid}'";
$sql1 = "select name from newscolumn";
$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);
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
<h1 style="margin-left: 500px; margin-top: 20px;">新闻修改</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">新闻修改</p>
		<form class="sui-form form-horizontal sui-validate" id="form2" action="news-save.php" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label for="inputEmail" class="control-label">标题:</label>
				<div class="controls">
					<!-- 增加一个input，用来区分是新增加的数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存id --> 
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
					<input type="text" id="headline" name="headline" class="input-large input-fat" placeholder="输入标题名称" data-rules="required" value="<?php echo $row['标题']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">肩题:</label>
				<div class="controls">
					<input type="text" id="kicker" name="kicker" class="input-large input-fat" data-rules="required" placeholder="输入肩题名称" value="<?php echo $row['肩题']; ?>">
				</div>
			</div>
			<div class="control-group">
    			<label class="control-label" for="inputEmail">栏目:</label>
   				<div class="controls">
					<input type="hidden" name="column" id="column" value="<?php echo $row['columnid'];?>">
					<select id="duoxuan">
						<?php
							//如果查找到的班号返回长度大于0执行while进行判断
							if( mysqli_num_rows($result1) > 0 ){
								//将结果中的班号转换为数组赋值给$row
								while ( $row1 = mysqli_fetch_assoc($result1) ) {
									//输出结果下拉菜单.value值和内容都都为sql语句取到的班号
									echo "<option value='{$row1['name']}'>{$row1['name']}</option>";
								}
							//如果没有查找到输出其他语句
							}else{
								echo "<option value=''>请先添加栏目信息</option>";
							}
						?>
					</select>
   				 </div>
 			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">作者:</label>
				<div class="controls">
					<input type="text" id="author" name="author" class="input-large input-fat" data-rules="required" placeholder="输入作者名称" value="<?php echo $_SESSION['usname']; echo $row['发布时间'];?>">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label" id="picture" name="picture">图片:</label>
				<div class="controls">
					<input type="file" name="file">
					<input type="hidden" name="tupain" value="<?php echo $row['图片']; ?>">
            		<img src="<?php echo $row['图片']; ?>" width="100px" height="120px">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">时间:</label>
				<div class="controls">
					<input type="text" id="time" name="time" class="input-large input-fat" data-toggle="datepicker" placeholder="输入时间" value="<?php echo $row['发布时间']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">内容:</label>
				<div class="controls">
					<textarea id="content" name="content" placeholder="输入内容" data-rules="required" style="width: 300px; height: 80px;"><?php echo $row['内容']; ?></textarea>
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
	var column = document.getElementById('column');
	//获取select的ID
	var duoxuan = document.getElementById('duoxuan');
	console.log(duoxuan);
	//下拉菜单中去到的班号名传递给input
	column.value = duoxuan.value;
	//在input输入框发生改变时
	duoxuan.onchange = function(){
		//将value值转为大写，传递给input
		column.value = this.value.toUpperCase();
	}
</script>