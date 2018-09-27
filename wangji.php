<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css1/zhuce.css" type="text/css"/>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
</head>
<body>
	<div class="box">
		<div class="box_top">
			<ul>
				<!-- <li class="top_yhzc"><a href="#">用户注册</a></li>
				<li class="top_yhdl"><a href="denglu.php">用户登陆</a></li> -->
				<h1 style="margin-left: 150px">找回密码</h1>
			</ul>
		</div>
		<div class="box_bottom">
			<form class="sui-form form-horizontal sui-validate" id="form2" action="Management system V1.0.php" method="post" style="width: 500px;height: 500px;margin: 0 auto;margin-top: 100px;">
				<div class="control-group">
					<label for="inputEmail" class="control-label">用户邮件:</label>
					<div class="controls">
						<input type="text" id="mail" name="mail" class="input-large input-fat" placeholder="输入用户邮件" data-rules="required">
					</div>
				</div>
				<div class="control-group">
	    			<label class="control-label" for="inputEmail">密码提示问题：</label>
	   				 <div class="controls">
	     				<select name="issue">
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
	     				 <input id="answer" name="answer" class="input-large input-fat" type="text" placeholder="请输入密码答案">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">验证码：</label>
	   					<div class="controls">
	     					<input id="bzr" name="bzr" class="input-mediuml input-fat" type="text" placeholder="请输入验证码">
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
					<label class="control-label"></label>
					<div class="controls">
						<input type="submit" value="提交" class="sui-btn btn-xlarge btn-primary">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<script src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<!-- 引入 jQuery -->
<script src="../../scripts/jquery.js" type="text/javascript"></script>
<script>
$(function(){
	$("#bzr").on("blur",function(){
		if (parseInt(this.value) == parseInt($("#yzm").text())) {
			$("#daanyz").text("输入正确");
		}else{
			$("#daanyz").text("输入错误");
		}
	})
})
</script>