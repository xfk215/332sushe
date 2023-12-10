<?php
require_once 'config.php';

$t = $_GET["t"];
$n = $_GET["n"];
$qq = $_GET["qq"];
$time = date("Y-m-d H:i:s",time());

//插入语句
$sql = "INSERT INTO `liuyan` (`id`, `username`, `text`,`qq`, `time`) VALUES (NULL, '$n', '$t','$qq', '$time');";
//执行sql的添加代码
$conn->query($sql);
//回到首页
header("Location:index.php");
?>