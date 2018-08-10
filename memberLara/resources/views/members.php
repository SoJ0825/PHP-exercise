<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員資料的 CRUD 練習</title>
</head>
<body>
<h1 align = "center">會員資料總表</h1>
<p align= "center">目前資料筆數：<?php echo $count;?></p>

<table border="1" align = "center">
    <tr>
        <th>ID</th>
        <th>帳號</th>
        <th>密碼</th>
        <th>姓名</th>
        <th>電話</th>
        <th>編輯</th>
    </tr>

    <?php
    foreach($users as $user) {
        echo "<tr>";
        echo "<td>".$user['id']."</td>";
        echo "<td>".$user['username']."</td>";
        echo "<td>".$user['password']."</td>";
        echo "<td>".$user['name']."</td>";
        echo "<td>".$user['phone']."</td>";
        echo "<td><a href='edit/".$user['id']."'><input type = 'submit' value = '修改'></a>";
        echo "<a href='delete/".$user['id']."'><input type='submit' value='刪除'></a></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
