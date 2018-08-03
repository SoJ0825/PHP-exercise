
<?php

header("Content-Type: text/html; charset=utf-8");


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員資料的 CRUD 練習</title>
</head>
<body>
<h1 align = "center">會員資料總表</h1>
<p align= "center">目前資料筆數：<?php echo $total_records;?>，<a href='\C'>新增資料</a></p>

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
    echo "<td><a href='U".$row_result['cID']."'>修改</a> ";
    echo "<a href='D".$row_result['cID']."'>刪除</a></td>";
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

