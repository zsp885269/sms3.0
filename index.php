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
				<li class="top_yhzc"><a href="#">用户注册</a></li>
				<li class="top_yhdl"><a href="denglu.php">用户登陆</a></li>
			</ul>
		</div>
		<div class="box_bottom">
			<form class="sui-form form-horizontal sui-validate" id="form2" method="post" style="width: 500px;height: 500px;margin: 0 auto;margin-top: 100px;">
				<div class="control-group">
	    			<label class="control-label" for="inputEmail">用户邮件：</label>
	   				 <div class="controls">
	     				 <input id="email" name="email" class="input-large input-fat" type="text" placeholder="请输入用户邮件" data-rules="required">
	     				 <span id="tips"></span>
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">用户名：</label>
	   				 <div class="controls">
	     				 <input id="username" name="username" class="input-large input-fat" type="text" placeholder="请输入用户名" data-rules="required">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">密码：</label>
	   				 <div class="controls">
	     				 <input id="password" name="password" class="input-large input-fat" type="text" placeholder="请输入密码" data-rules="required">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">重复密码：</label>
	   				 <div class="controls">
	     				 <input id="congmima" name="congmima" class="input-large input-fat" type="text" placeholder="请输入密码" data-rules="required">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">验证码：</label>
	   				 <div class="controls">
	     				<input id="yzma" name="yzma" class="input-mediuml input-fat" type="text" placeholder="请输入验证码" data-rules="required">
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
	     				<select name="issue" id="issue">
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
	     				 <input id="answer" name="answer" class="input-large input-fat" type="text" placeholder="请输入密码答案" data-rules="required">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	 				<label class="control-label"></label>
	 				<div class="controls">
	 					<input type="button" value="提交" name="tijiao" class="sui-btn btn-large btn-primary">
	 				</div>
 				</div>
			</form>
		</div>
	</div>
</body>
</html>
<script src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
var email = document.getElementById('email');
var tips = document.getElementById('tips');
var names = document.getElementById('username');
var password = document.getElementById('password');
var question = document.getElementById('issue');
var answer = document.getElementById('answer');
$('input[name=email]').on('blur',function(){
	//1、为了实现异步请求，先要实例化一个XMLHttpRequest 对象
	if(window.XMLHttpRequest){
		var xhr = new XMLHttpRequest();
	}else{
		//兼容IE老版本
		var xhr = new ActiveObject("Msxml2.XMLHTTP");
	}
	xhr.onreadystatechange = function(){
		if ( xhr.readyState == 4) {
			if (xhr.status == "200") {
				// console.log("请求已完成，准备好了");
				console.log(xhr.responseText);
				if (email.value == "") {
					$("#tips").html("请填写");
				}else if (xhr.responseText == "ok") {
					$("#tips").html("可以注册");
				}else{
					$("#tips").html("邮件重复");
				}
			}
			if (xhr.status == "404") {
				console.log("网页被外星人挟持！")
			}
		}
	}
	xhr.open("post","index-save.php",true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.send("email="+encodeURIComponent(email.value));
})
$('input[name=tijiao]').on('click',function(){
	//1、为了实现异步请求，先要实例化一个XMLHttpRequest 对象
	if(window.XMLHttpRequest){
		var xhr = new XMLHttpRequest();
	}else{
		//兼容IE老版本
		var xhr = new ActiveObject("Msxml2.XMLHTTP");
	}
	xhr.onreadystatechange = function(){
		if ( xhr.readyState == 4) {
			if (xhr.status == "200") {
				console.log(xhr.responseText);
				if (xhr.responseText == "ok") {
					alert('注册成功');
					$(window).attr('location','denglu.php');
				}else{
					alert('注册失败');
					$(window).attr('location','index.php');
				}
			}
			if (xhr.status == "404") {
				alert("网页被外星人挟持！");
			}
		}
	}
	xhr.open("post","index-tijiao.php",true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.send("email="+email.value+"&names="+names.value+"&password="+password.value+"&question="+encodeURIComponent(question.value)+"&answer="+encodeURIComponent(answer.value));
})
$(function(){
	$("#yzma").on("blur",function(){
		if (parseInt(this.value) == parseInt($("#yzm").text())) {
			$("#daanyz").text("输入正确");
		}else{
			$("#daanyz").text("输入错误");
		}
	})
})
</script>