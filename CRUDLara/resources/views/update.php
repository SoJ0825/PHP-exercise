<html>

 <head>
     <meta charset="UTF-8" />
     <title>新增會員資料</title>
 </head>
 <body>
 <?php
 echo ' <form action="update'.$id.'" method="post" name="formAdd" id="formAdd">';
 echo '請輸入姓名：<input type="text" name="cName" id="cName" value="'.$name.'"><br/>';
 echo '請輸入生日：<input type="date" name="cBirthday" id="cBirthday" value="'.$birthday.'"><br/>';
 echo '請輸入Email：<input type="text" name="cEmail" id="cEmail" value="'.$email.'"><br/>';
 ?>
     <input type="hidden" name="action" value="update">
     <input type="submit" name="button" value="修改資料">
 </form>
 </body>
 </html>
