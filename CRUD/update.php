 <?php
 include "connMysql.php";

 $editId = $_GET['id'];

 $sql_getDataQuery = "SELECT * FROM member WHERE cID = $editId";

 $result = mysqli_query($db_link, $sql_getDataQuery);

 $row_result = mysqli_fetch_assoc($result);
 $id = $row_result['cID'];
 $name = $row_result['cName'];
 $birthday = $row_result['cBirthday'];
 $email = $row_result['cEmail'];


 if (isset($_POST["action"]) && $_POST["action"] == 'update') {

     $sql_query = "UPDATE member SET cName=?, cBirthday=?, cEmail=? WHERE cID=$editId";

     $stmt = $db_link->prepare($sql_query);
     $stmt->bind_param("sss", $_POST['cName'], $_POST['cBirthday'], $_POST['cEmail']);
     $stmt->execute();
     $db_link->close();

     header('Location: index.php');

 }

 ?>

 <html>

 <head>
     <meta charset="UTF-8" />
     <title>新增會員資料</title>
 </head>
 <body>
 <?php
 echo ' <form action="" method="post" name="formAdd" id="formAdd">';
 echo '請輸入姓名：<input type="text" name="cName" id="cName" value="'.$name.'"><br/>';
 echo '請輸入生日：<input type="date" name="cBirthday" id="cBirthday" value="'.$birthday.'"><br/>';
 echo '請輸入Email：<input type="text" name="cEmail" id="cEmail" value="'.$email.'"><br/>';
 ?>
     <input type="hidden" name="action" value="update">
     <input type="submit" name="button" value="修改資料">
 </form>
 </body>
 </html>
