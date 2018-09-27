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
				<thead>
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
				</thead>
				<tbody id="studentlist"></tbody>
			</table>
	</div>
</div>
<?php include "foot.php"; ?>
<!-- <script src="template-web.js"></script>
<script type="text/html" id="template1">
	{{each arr val idx}}
		<tr>
			<td>{{val.id}}</td>
			<td>{{val.学号}}</td>
			<td>{{val.班号}}</td>
			<td>{{val.姓名}}</td>
			<td>{{val.性别}}</td>
			<td>{{val.图片}}</td>
			<td>{{val.出生日期}}</td>
			<td>{{val.电话}}</td>
			<td><a class='sui-btn btn-xlarge btn-primary' href='student-update.php?kid={{val.id}}'>修改</a>&nbsp;&nbsp;&nbsp;<a class='sui-btn btn-xlarge btn-danger' href='student-del.php?kid={{val.id}}'>删除</a></td>
		</tr>
	{{/each}}
</script> -->
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
			$("#studentlist").html("<tr><td>正在查询，请稍后~~~</td></tr>");
		},
		success : function(data,textStatus){
			console.log( data );
			// var arr = data.data;//声明一个数组
			// var html = template('template1',{"arr":arr});
			// $("tbody").html(html);
			if (data.code == 200) {
			// 	// for (var i = 0; i < data.data.length; i++) {
			// 	// 	var $trs = $("<tr></tr>");
			// 	// 	for(j in data.data[i]){
			// 	// 		var $tds = "<td>" + data.data[i][j] + "</td>";
			// 	// 		$trs.append($tds);
			// 	// 	}
			// 	// 	$("#studentlist").append($trs);
			// 	// }
				// att(data);
				var str = "";
				for (var i = 0; i < data.data.length; i++) {
					console.log(data.data[i]);
					str += "<tr><td>" + data.data[i].id + "</td><td>" + data.data[i].学号 + "</td><td>" + data.data[i].班号 + "</td><td>" + data.data[i].姓名 + "</td><td>" + data.data[i].性别 + "</td><td>" + data.data[i].出生日期 + "</td><td>" + data.data[i].电话 + "</td><td><a href='student-update.php?kid="+ data.data[i].id +"' class='sui-btn btn-warning'>修改</a>&nbsp;&nbsp;<a href='student-del.php?kid=" + data.data[i].id + "' class='sui-btn btn-danger'>删除</a></td></tr>";
				}
				$("#studentlist").html(str);
			}
		},
		error : function(XMLHttpRequest,textStatus,errorThrown){
			//请求失败后调用此函数
			console.log("失败原因:" + errorThrown);
		}
	})
})
// function att(data){
// 	for (var i = 0; i < data.data.length; i++) {
// 		var $trs = $("<tr></tr>");
// 		for(j in data.data[i]){
// 			var $tds = "<td>" + data.data[i][j] + "</td>";
// 			$trs.append($tds);
// 		}
// 		$("#studentlist").append($trs);
// 	}
// }
</script>