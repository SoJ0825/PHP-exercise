<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 80vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <title>會員資料的 CRUD 練習</title>
</head>

<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            會員註冊
        </div>

        <div class="links">
            <form id="update" name="update" method="post" action="../store">
                <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
                    <tr>
                        <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#000000">會員資料</font></td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline">帳號</td>
                        <td valign="baseline">
                            <input type="text" name="username" id="username" value = ""></td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline">密碼</td>
                        <td valign="baseline">
                            <input type="text" name="password" id="password" value = ""></td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline">名字</td>
                        <td valign="baseline">
                            <input type="name" name="name" id="name" value = ""></td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline">電話</td>
                        <td valign="baseline">
                            <input type="phone" name="phone" id="phone"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" bgcolor="#CCCCCC">
                            <input type="submit" name="button" id="button" value="註冊" ></td>
                        <!--                            <input type="reset" name="button2" id="button2" value="重設" ></td>-->
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

</body>
</html>



<!--<html>-->
<!---->
<!-- <head>-->
<!--     <meta charset="UTF-8" >-->
<!--     <title>新增會員資料</title>-->
<!-- </head>-->
<!-- <body>-->
<!-- --><?php
// echo ' <form action="../../update/'.$id.'" method="post" name="formAdd" id="formAdd">';
// echo '帳號：<input type="text" name="username" id="username" value="'.$username.'"><br/>';
// echo '密碼：<input type="text" name="password" id="password" value="'.$password.'"><br/>';
// echo '姓名：<input type="text" name="name" id="name" value="'.$name.'"><br/>';
// echo '電話：<input type="text" name="phone" id="phone" value="'.$phone.'"><br/>';
//
// ?>
<!--     <input type="hidden" name="action" value="update">-->
<!--     <input type="submit" name="button" value="修改資料">-->
<!-- </form>-->
<!-- </body>-->
<!-- </html>-->
