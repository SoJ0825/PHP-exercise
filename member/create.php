<?php
if (! (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['name']) || empty($_POST['phone']))) {
    include('connectMySQL.php');

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $sql_query = "INSERT INTO nativeUsers (username, password, name, phone) VALUES ('$username', '$password', '$name', '$phone')";

    mysqli_query($db_link, $sql_query);

    $sql_findID = "SELECT * FROM nativeUsers WHERE username = '".$_POST['username']."'";

    $data = mysqli_query($db_link, $sql_findID);
    $user = mysqli_fetch_assoc($data);

    session_start();
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['phone'] = $user['phone'];


    header('Location: welcome.php');
}
?>
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
<form id="update" name="update" method="post" action="">
    <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
        <tr>
            <div class="content">
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
                            <input type="hidden" name="action" value="store">
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
