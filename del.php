<?php

//需要_一次 配置文件
require_once "config.php";

//点击之后传了个id过来
//这边php文件通过GET接受传过来的id
$id = $_GET['id'];

//sql的删除代码
$sql = "DELETE FROM `liuyan` WHERE `liuyan`.`id` = $id";
//执行sql的删除代码
$conn->query($sql);

//回到首页
header("Location:index.php");
