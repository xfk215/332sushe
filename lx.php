<?php
// 连接到 MySQL 数据库
$servername = "localhost";
$username = "messages";
$password = "123456";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 处理表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    // 插入留言到数据库
    $sql = "INSERT INTO messages (name, message) VALUES ('$name', '$message')";
    $conn->query($sql);
}

// 从数据库中获取留言
$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<html>
<head>
    <title>留言板</title>
</head>
<body>
    <h1>留言板</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">姓名：</label>
        <input type="text" name="name" required><br>

        <label for="message">留言：</label>
        <textarea name="message" required></textarea><br>

        <input type="submit" value="提交">
    </form>

    <h2>所有留言：</h2>
    <?php
    // 显示所有留言
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row["name"] . "</strong> 于 " . $row["created_at"] . " 留言：</p>";
            echo "<p>" . $row["message"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "暂无留言";
    }

    // 关闭数据库连接
    $conn->close();
    ?>
</body>
</html>