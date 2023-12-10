<?php
//需要_一次 配置文件
require_once "config.php";

//点击之后传了个id过来
//这边php文件通过GET接受传过来的id
$id = $_GET['id'];

//根据id查到当前的具体信息
$sql = "SELECT * FROM `liuyan` WHERE `id` = $id";
//执行sql的查询代码 并把结果给到$result
$result = $conn->query($sql);

//得到当前id的具体信息
//  var_dump($result);

if ($result->num_rows > 0) {
    $res = $result->fetch_assoc();
    $text = $res["text"];
}
 else {
    die("无此条留言");
}
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言信息编辑</title>
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <h2>编辑<?php echo $id;?>楼的留言内容</h2>
    <form action="updata.php" method="GET">
        <input hidden name="i" value="<?php echo $res['id'] ?>" type="text">
        <textarea name="t" cols="30" rows="10"><?php echo $res["text"] ?></textarea>
        <input type="submit" value="更新留言信息">
    </form>
</body>

</html>