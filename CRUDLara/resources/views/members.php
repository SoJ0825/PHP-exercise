<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員資料的 CRUD 練習</title>
</head>
<body>
<h1 align = "center">會員資料總表</h1>
<p align= "center">目前資料筆數：<?php echo $count;?>，<a href='\C'>新增資料</a></p>

<table border="1" align = "center">
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>生日</th>
        <th>Email</th>
        <th>編輯</th>
    </tr>

    <?php
    foreach($members as $member) {
        echo "<tr>";
        echo "<td>".$member['id']."</td>";
        echo "<td>".$member['cName']."</td>";
        echo "<td>".$member['cBirthday']."</td>";
        echo "<td>".$member['cEmail']."</td>";
//        echo "<td><a href='U/edit/".$member['cID']."'>修改</a> ";
        echo "<td><a href='U/edit/".$member['id']."'><input type = 'submit' value = '修改'></a>";
        echo "<a href='delete/".$member['id']."'><input type='submit' value='刪除'></a></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>