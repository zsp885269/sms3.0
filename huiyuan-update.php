<?php include("head.php"); ?>
<?php
$kid = empty($_GET["kid"])?"null":$_GET["kid"];
if ($kid == "null") {
	die ("请选择要修改的记录");
}else{
include ('conn.php');

//执行SQL语句
$sql = "select id,email,name,password,question,answer from user where id='{$kid}'";
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
<h1 style="margin-left: 525px; margin-top: 20px;">会员管理</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 50px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">会员管理</p>
		<form class="sui-form form-horizontal sui-validate" id="form2" action="huiyuan-save.php" method="post" style="width: 500px;height: 500px;margin: 0 auto;margin-top: 100px;">
			<div class="control-group">
    			<label class="control-label" for="inputEmail">用户邮件：</label>
   				 <div class="controls">
   					<!-- 增加一个input，用来区分是新增加的数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存id --> 
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
     				<input id="user" name="user" class="input-large input-fat" type="text" placeholder="请输入用户邮件" data-rules="required" value="<?php echo $row['email']; ?>">
     				<span>用户邮件不能重复</span>
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">用户名：</label>
   				<div class="controls">
     				<input id="username" name="username" class="input-large input-fat" type="text" placeholder="请输入用户名" value="<?php echo $row['name']; ?>">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">密码：</label>
   				<div class="controls">
     				<input id="password" name="password" class="input-large input-fat" type="text" placeholder="请输入密码" value="<?php echo $row['password']; ?>">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">重复密码：</label>
   				<div class="controls">
     				<input id="congmima" name="congmima" class="input-large input-fat" type="text" placeholder="请输入密码">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">验证码：</label>
   				 <div class="controls">
     				<input id="yzma" name="yzma" class="input-mediuml input-fat" type="text" placeholder="请输入验证码">
     				<span id="yzm">
						<?php
							$a=array("a"=>"qwertyuiopasdfghjklzxcvbnm",0,9);
							print_r(array_rand($a,1));
							$a=array("a"=>"qwertyuiopasdfghjklzxcvbnm",0,9);
							print_r(array_rand($a,1));
							$a=array("a"=>"qwertyuiopasdfghjklzxcvbnm",0,9);
							print_r(array_rand($a,1));
							$a=array("a"=>"qwertyuiopasdfghjklzxcvbnm",0,9);
							print_r(array_rand($a,1));
						?>	
					</span>
					<span id="daanyz"></span>
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">密码提示问题：</label>
   				 <div class="controls">
     				<select id="issue" name="issue" value="<?php echo $row['question']; ?>">
     					<option>你的家住在哪里？</option>
     					<option>你的小学老师叫什么？</option>
     					<option>你的母亲叫什么？</option>
     					<option>你的父亲叫什么？</option>
     					<option>你最喜欢吃的东西是什么？</option>
     					<option>你最喜欢的人是谁？</option>
           			</select>
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">密码答案：</label>
   				 <div class="controls">
     				 <input id="answer" name="answer" class="input-large input-fat" type="text" placeholder="请输入密码答案" value="<?php echo $row['answer']; ?>">
   				 </div>
 			</div>
 			<div class="control-group">
 				<label class="control-label"></label>
 				<div class="controls">
 					<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
 				</div>
				</div>
		</form>
	</div>
</div>
<?php include "foot.php"; ?>