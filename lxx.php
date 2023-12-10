<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        img{
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=300 height=70 src="//music.163.com/outchain/player?type=2&id=1397345903&auto=1&height=66"></iframe>
    <h1><a href="./index.php"><?php echo $title; ?></a></h1>

    <h2>写留言</h2>
    <form action="add.php" method="GET">
        <textarea name="t" cols="30" rows="10" placeholder="说点什么..."></textarea>
        <p><input name="n" type="text" placeholder="你的名字"></p>
        <p><input name="qq" type="text" placeholder="你的QQ"></p>
        <p><input type="submit" value="发表"></p>
    </form>

    <hr>

    <h2>留言列表</h2>
    <ul>
        <?php
        // 最新留言展示前面
        $sql = "SELECT * FROM `liuyan` ORDER BY `liuyan`.`id` DESC";
        // ORDER BY `liuyan`.`id` DESC 加上这个是降序排列
        $result = $conn->query($sql);

        if($result->num_rows>0){
            //输出数据
            while($row = $result->fetch_assoc()){
                // $result->fetch_assoc()执行一次显示第一条，执行第二次显示第二条
            ?>
            <li>
                <img src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $row["qq"]; ?>&s=640" alt="">
                <p>第<?php echo $row["id"];?>条</p>
                <p>留言内容：<?php echo $row["text"];?></p>
                <p>留言人：<?php echo $row["username"];?></p>
                <p>留言时间：<?php echo $row["time"];?></p>
                <p>
                    <a href="edit.php?id=<?php echo $row['id'];?>">编辑</a>
                    <a href="del.php?id=<?php echo $row['id'];?>">删除</a>
                </p>
            </li>
            <?php
            }
        } else {
            echo"暂无留言";
        }
        ?>        
    </ul>

</body>

</html>