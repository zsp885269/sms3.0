<?php include("head.php"); ?>
<h1 style="margin-left: 400px; margin-top: 20px;">北京网络职业学院学生管理系统V3.0</h1>
	<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php") ?>
	</div>
	<div class="content" style="margin-top: 50px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">欢迎访问学生管理系统！</p>
		<div class="xinwen_box">
			<ul id="xinwen_box"></ul>
		</div>
	</div>
</div>
<?php include "foot.php"; ?>
<script>
window.onload = function(){
	$.ajax({
	url     : "news-ajax.php",
	type    : "POST",
	dataType: "json",
	success : function(data,textStatus){
		console.log(data);
	var str = "";
		for (var i=0; i < data.data.length; i++) { 
			console.log(data.data[i].id);
			str += "<li class='lis'><a href='xinwenye.php?kid="+data.data[i].id+"'><img src='"+ data.data[i].图片 + "'></a>"+"<br>"+"<a href='xinwenye.php'>" + data.data[i].标题 + "</a>"+"<span class='jt'>"+ data.data[i].肩题 +"</span>"+"<br>"+"<span class='fbsj'>" + data.data[i].发布时间 + "</span>" +"<p>" + "&nbsp;&nbsp;&nbsp;&nbsp;"+ data.data[i].内容 + "</p>"+"</li>";
		}
		$("#xinwen_box").html(str);
	},
	error   : function(XMLHttpRequest,textStatus,errorThrown){
	// 请求失败后调用此函数
	console.log("失败原因：" + errorThrown);
	}
	});
}
</script>

