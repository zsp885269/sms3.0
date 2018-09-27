<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css1/denglu.css" type="text/css"/>
	<link rel="stylesheet" href="css/dnegludonghua.css" type="text/css"/>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
</head>
<body>
	<div class="box">
		<div class="box_top">
			<ul>
				<li class="top_yhzc"><a href="index.php">用户注册</a></li>
				<li class="top_yhdl"><a href="#">用户登陆</a></li>
			</ul>
		</div>
		<div class="box_bottom">
			<form class="sui-form form-horizontal sui-validate" id="form1" method="post" style="width: 500px;height: 500px;margin: 0 auto;margin-top: 100px;">
				<div class="control-group">
					<label for="inputEmail" class="control-label">用户邮件:</label>
					<div class="controls">
						<input type="text" id="mail" name="mail" class="input-large input-fat" placeholder="输入用户邮件" data-rules="required">
					</div>
				</div>
				<div class="control-group">
					<label for="inputEmail" class="control-label">密码:</label>
					<div class="controls">
						<input type="text" id="password" name="password" class="input-large input-fat" placeholder="输入密码" data-rules="required">
					</div>
				</div>
				<div class="control-group" style="position:relative;">
					<label for="inputEmail" class="control-label">验证码:</label>
					<div class="controls">
						<input type="text" id="CAPTCHA" name="CAPTCHA" class="input-large input-fat" placeholder="请输入验证码" data-rules="required">
					</div>
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
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<ul id="progress">
						    <li><div id="layer1" class="ball"></div><div id="layer7" class="pulse"></div></li>
						    <li><div id="layer2" class="ball"></div><div id="layer8" class="pulse"></div></li>
						    <li><div id="layer3" class="ball"></div><div id="layer9" class="pulse"></div></li>
						    <li><div id="layer4" class="ball"></div><div id="layer10" class="pulse"></div></li>
						    <li><div id="layer5" class="ball"></div><div id="layer11" class="pulse"></div></li>
						    <br>
						    <div id="youhaotishi"></div>
						</ul>
						<input type="submit" value="登录" class="sui-btn btn-xlarge btn-primary trigger">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<a href="wangji.php">忘记密码</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<script src="JS/jquery.js" type="text/javascript"></script>
<script src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
//给提交按钮绑定事件
$("input[type=submit").on("click",function(){
	//使用$.ajax()提交数据
	$.ajax({
		url : "denglu-save-ajax.php",
		type : "POST",
		data : $("#form1").serialize(),
		dataType : "json",
		// beforeSend : function(XMLHttpRequest){
		// 	//发送前调用此函数。一般在此编写检测代码或者loading动画
		// },
		complete : function(XMLHttpRequest,textStatus){
		// 	//请求完成后调用此函数(请求成功或失败都调用)
		},
		success : function(data,textStatus){
			//请求成功后调用此函数
			console.log( data );
			if (data.code == 200) {
				alert('登录成功');
				donghua();
				setTimeout(function(){
					$(window).attr('location','Management system V1.0.php');
				},4500);
			}
			if (data.code == 20001) {
				alert("密码错误");
			}
			if (data.code == 20004) {
				alert("邮箱填写错误");
			}
		},
		error : function(XMLHttpRequest,textStatus,errorThrown){
			//请求失败后调用此函数
			console.log("失败原因:" + errorThrown)
		}
	})
	return false
})
$(function(){
	$("#CAPTCHA").on("blur",function(){
		if (parseInt(this.value) == parseInt($("#yzm").text())) {
			$("#daanyz").text("输入正确");
		}else{
			$("#daanyz").text("输入错误");
		}
	})
})
function donghua(){
	$('#progress').removeClass('running').delay(10).queue(function(next){
		$(this).addClass('running');
		$('#youhaotishi').html("由于网络波动,浏览器正在玩命加载,请稍后！");
		next();
	});
}

</script>