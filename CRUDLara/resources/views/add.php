<html>

<head>
    <meta charset="UTF-8" />
    <title>新增會員資料</title>
</head>
<body>
<form action="create" method="post" name="formAdd" id="formAdd">
請輸入姓名：<input type="text" name="cName" id="cName"><br/>
請輸入生日：<input type="date" name="cBirthday" id="cBirthday"><br/>
請輸入Email：<input type="text" name="cEmail" id="cEmail"><br/>
<input type="hidden" name="action" value="add">
<input type="submit" name="button" value="新增資料">
<input type="reset" name="button2" value="重新填寫">
</form>
</body>
</html>
