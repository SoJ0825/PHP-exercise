
<?php

header("Content-Type: text/html; charset=utf-8");

include("connMysql.php");

//使用 mysqli_select_db() 來選擇資料庫
$seldb = @mysqli_select_db($db_link,"class");
if (!$seldb) die('資料庫選擇失敗！');

//sql 語法，白話文：從 member 的資料表中選擇所有欄位，並依照 cID 遞增排序
$sql_query = "SELECT * FROM member ORDER BY cID ASC";

//使用 mysqli_query() 函式可以在 MySQL 中執行 SQL 指令後會回傳一個資源識別碼，否則回傳 False。
$result = mysqli_query($db_link,$sql_query);
//print_r($result);

$total_records = mysqli_num_rows($result)

// 使用 mysqli_fetch_assoc() 函式取得一個以欄位為索引鍵的陣列

//while($row_result = mysqli_fetch_assoc($result)) {
//    foreach ($row_result as $item => $value) {
//        echo $item.'='.$value.'<br>';
//    }
//    echo "<hr />";
//}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員資料的 CRUD 練習</title>
</head>
<body>
<h1 align = "center">會員資料總表</h1>
<p align= "center">目前資料筆數：<?php echo $total_records;?>，<a href='add.php'>新增資料</a></p>

<table border="1" align = "center">
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>生日</th>
        <th>Email</th>
        <th>編輯</th>
    </tr>


<?php

while($row_result = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row_result['cID']."</td>";
    echo "<td>".$row_result['cName']."</td>";
    echo "<td>".$row_result['cBirthday']."</td>";
    echo "<td>".$row_result['cEmail']."</td>";
    echo "<td><a href='update.php?id=".$row_result['cID']."'>修改</a> ";
    echo "<a href='delete.php?id=".$row_result['cID']."'>刪除</a></td>";
    echo "</tr>";
}
?>

<!--<form method="POST" action="php_form1.php">-->
<!--    請輸入姓名：<input type="text" name="username" />-->
<!--</form>-->
<!--<form method="GET" action="php_form1.php">-->
<!--    請輸入生日：<input type="text" name="getusername" />-->
<!--</form>-->
<!--<form method="GET" action="php_form1.php">-->
<!--    請輸入email：<input type="text" name="getusername" />-->
<!--</form>-->
<!--<input type="submit" value="新增資料" /> <hr/>-->
</table>
</body>
</html>

