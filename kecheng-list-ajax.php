<?php include("head.php"); ?>
<h1 style="margin-left: 525px; margin-top: 20px;">修改信息</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar" style="margin-top: -20px; margin-left: 50px; border-right:2px solid #000; width: 300px; height: 625px;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content" style="margin-top: 80px; margin-left: 400px;">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">学生修改</p>
			<table class="sui-table table-primary">
				<tr>
					<th>编号</th>
					<th>学号</th>
					<th>班号</th>
					<th>姓名</th>
					<th>性别</th>
					<th>出生日期</th>
					<th>电话</th>
					<th>操作</th>
				</tr>
				<tbody id="studentlist">
					<td><a href='#' class='sui-btn btn-warning'>修改</a>
						&nbsp;&nbsp;
						<a href='#' class='sui-btn btn-danger'>删除</a>
					</td>
				</tbody>
			</table>
	</div>
</div>
<?php include "foot.php"; ?>
<script>
$(function(){
	$.ajax({
		url : "api.php",
		type : "POST",
		dataType : "json",
		data:{
			"action" : "student"
		},
		beforeSend : function(XMLHttpRequest){
			$("#studentlist").html("<tr><td>正在查询，请稍后~~~</td></tr>")
		},
		success : function(data,textStatus){
			console.log( data )
			if (data.code == 200) {
				var str = "";
				for (var i = 0; i < data.data.length; i++) {
					console.log(data.data[i]);
					str += "<tr><td>" + data.data[i].id + "</td><td>" + data.data[i].学号 + "</td><td>" + data.data[i].班号 + "</td><td>" + data.data[i].姓名 + "</td><td>" + data.data[i].性别 + "</td><td>" + data.data[i].出生日期 + "</td><td>" + data.data[i].电话 + "</td><td><a href='kecheng-updata.php' class='sui-btn btn-warning'>修改</a>&nbsp;&nbsp;<a href='kecheng-del.php' class='sui-btn btn-danger'>删除</a></td></tr>";
				}
				$("#studentlist").html(str);
			}
		},
		error : function(XMLHttpRequest,textStatus,errorThrown){
			//请求失败后调用此函数
			console.log("失败原因:" + errorThrown)
		}
	})
})
</script>