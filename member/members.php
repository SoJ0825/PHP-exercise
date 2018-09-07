<?php
session_start();
if ($_SESSION['id'] == '1') {
    require('connectMySQL.php');
    $getDataQuery = "SELECT * FROM nativeUsers";
    $result = mysqli_query($db_link, $getDataQuery);

    $count = mysqli_num_rows($result);

} else {
    if (isset($_SESSION['id'])) {
        header('Location:welcome.php');
    } else {
        header('Location:index.php');
    }
}

if (isset($_POST['deleteID'])) {

    require('connectMySQL.php');
    $deleteQuery = "DELETE FROM nativeUsers WHERE id = " . $_POST['deleteID'];
    $result = mysqli_query($db_link, $deleteQuery);

    header('Location: members.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員資料的 CRUD 練習</title>
</head>
<body>
<h1 align = "center">會員資料總表</h1>
<p align= "center">目前資料筆數：<?php echo $count;?></p>
<p align="center"><a href="welcome.php">回首頁</a></p>

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
    while ($user = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$user['id']."</td>";
        echo "<td>".$user['username']."</td>";
        echo "<td>".$user['password']."</td>";
        echo "<td>".$user['name']."</td>";
        echo "<td>".$user['phone']."</td>";
        echo "<td>
                <form method='post' name='updateUser' action='updateUser.php'>
                    <input type='hidden' name='updateID' value=" . $user['id'] . ">
                    <input type = 'submit' value = '修改'>
                </form>";
        echo    "<form method='post' name='deleteUser' action=''>
                    <input type='hidden' name='deleteID' value=" . $user['id'] . ">
                    <input type='submit' value='刪除'>
                </form>
              </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
