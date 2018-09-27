<?php
include ('conn.php');
$kid = $_REQUEST["kid"];
$sql = "SELECT * FROM `news` WHERE id = '{$kid}'";
$sql1 = "SELECT * FROM news LIMIT 0,5";
$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);
//关闭数据库
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>北京网络职业学院2018年新生开学典礼隆重举行_北京网络职业学院</title>
	<link rel="stylesheet" href="css/xinwenye.css">
</head>
<body>
	<div class="box">
		<div class="toubu">
			<span class="toubu_top"></span>
			<div class="toubu_ul">
				<h1 class="logo">
					<a href="#">
						<span class="cn"></span>
					</a>
				</h1>
				<div class="shouye_a">
					<a href="#">首页</a>
					<a href="#">师资队伍</a>
					<a href="#">专业设置</a>
					<a href="#">招生就业</a>
					<a href="#">北网新闻</a>
					<a href="#">走进北网</a>
					<a href="#">联系我们</a>
				</div>
			</div>
		</div>
		<div class="con_img">
			<div class="wrap">
				<div class="img_wenzi">
					<h2>北网新闻</h2>
					<a href="">主页</a>
					<a href="">北网新闻</a>
				</div>
			</div>
		</div>
		<div class="biewang">
			<div class="clearfix1 wrap">
				<div class="boxL">
					<div class="block26">
						<div class="tit06">
							<h4>
								<font color="#2052af">北网新闻</font>
								<font color="#f7931e"></font>
							</h4>
						</div>
						<div class="innerleft">
							<?php
								if (mysqli_num_rows($result) > 0){
									while ($row = mysqli_fetch_assoc($result)) {
										echo "
										<h2>{$row['标题']}</h2>
										<div class='other'>
											<span class='d'>{$row['肩题']}</span>
											<span class='tag'>{$row['发布时间']}</span>
										</div>
										<div class='txt'>&nbsp;&nbsp;&nbsp;&nbsp;{$row['内容']}</div>
										<img src='{$row["图片"]}'>
										";
									}
								}
							?>
						</div>
					</div>
				</div>
				<div class="boxR">
					<div class="block30">
						<div class="border"></div>
						<div class="inner">
							<div class="tit">
								<h2>最新资讯</h2>
							</div>
							<?php
								 if (mysqli_num_rows($result1)>0) {
          							//将查询结果转换成数组
          							while ($row1 = mysqli_fetch_assoc($result1)){
          							echo "
										<div class='txt01'>
											<div class='t'>{$row1['发布时间']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
											<div class='d'>
												<a href='#'>{$row1['标题']}</a>
											</div>
										</div>";
          							};
      							}else{
          							echo "没有记录";
      							};
							?>
							<div class="tit">
								<h2>北京网络职业学院</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom">
			<span class="bottom_bjt"></span>
			<div class="clearfix">
				<div class="block06">
					<div class="innerLi">
						<img src="images/7.png" alt="">
					</div>
					<div class="innerLi">
						<img src="images/8.png" alt="">
						<span style="color: #fff;padding-left:4px">北京网络职业学院官微</span>
					</div>
				</div>
				<div class="daohang" style="float:left; width:720px;">
					<div class="block07">
						<p>
							<a href="#">选课系统</a>
							<a href="#">教学管理系统</a>
							<a href="#">学业证书查询</a>
							<a href="#">录取查询系统</a>
						</p>
						<p class="p">
							<a href="#" class="a">学院概况</a>
							<a href="#" class="a">专业设置</a>
							<a href="#" class="a">走进北王</a>
							<a href="#" class="a">招生就业</a>
							<a href="#" class="a">北网新闻</a>
							<a href="#" class="a">走进北王</a>
							<a href="#" class="a">联系我们</a>
						</p>
					</div>
				</div>
			</div>
			<div class="block09"><span class="lujing">非经营性网站主办单位有效证件号： （京）教社证字V70040 京ICP备05026716号 地址：北京市房山区窦大路12号 电话：010-81303630 邮编：京ICP备05026716号</span></div>
		</div>
	</div>
</body>
</html>