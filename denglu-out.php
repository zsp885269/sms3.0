<?php
session_start();
unset($_SESSION['usname'] );
header("Refresh:1;url=denglu.php");
echo "<script>alert('退出成功')</script>";
?>