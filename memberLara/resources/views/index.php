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
            Welcome
            <form id="form2" name="form2" method="post" action="signup">
                <input style="font-size:20px" type="submit" name="button2" id="button2" value="註冊" />
            </form>
        </div>

        <div class="links">
            <form id="form1" name="form1" method="post" action="login">
                <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
                    <tr>
                        <td colspan="2" align="center" bgcolor="#CCCCCC">
                            <font color="#000000">會員系統</font>
                        </td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline">帳號</td>
                        <td valign="baseline"><input type="text" name="username" id="username" /></td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline">密碼</td>
                        <td valign="baseline"><input type="password" name="password" id="password" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" bgcolor="#CCCCCC">
                            <input style="font-size:20px" type="submit" name="button" id="button" value="登入" />

                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

</body>
</html>

