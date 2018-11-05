<?php
session_start();
if (! isset($_SESSION['id'])) {
 header('Location: index.php');
}

if (isset($_POST['currentPassword']) && $_POST['currentPassword'] != "" && password_verify($_POST['currentPassword'] ,$_SESSION['password'])) {
    if ($_POST['newPassword'] == $_POST['confirmPassword'] && $_POST['newPassword'] != "") {
        require('connectMySQL.php');

        $hash_password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

        $query = "UPDATE nativeUsers SET name = '" . $_POST['name'] . "' ,password = '" . $hash_password . "' ,phone = '" . $_POST['phone'] . "' WHERE id = " . $_SESSION['id'];

        $result = mysqli_query($db_link, $query);
        $_SESSION['password'] = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        unset($_POST['currentPassword']);
        header('Location: welcome.php');
    } else {
        echo '密碼確認有誤';
        }
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
            會員資料修改
        </div>

        <div class="links">
            <?php if (isset($_SESSION['confirmState'])) {
                echo $_SESSION['confirmState'];
            }
            ?>
            <form id="update" name="update" method="post" action="update.php">
                <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
                    <tr>
                        <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#000000">會員資料</font></td>
                    </tr>
                    <tr>
                        <td width="100" align="center" valign="baseline">請輸入舊密碼</td>
                        <td valign="baseline">
                            <input type="password" name="currentPassword" id="currentPassword" value = ""></td>
                    </tr>
                    <tr>
                        <td width="100" align="center" valign="baseline">請輸入新密碼</td>
                        <td valign="baseline">
                            <input type="password" name="newPassword" id="newPassword" value = ""></td>
                    </tr>
                    <tr>
                        <td width="100" align="center" valign="baseline">確認新密碼</td>
                        <td valign="baseline">
                            <input type="password" name="confirmPassword" id="confirmPassword" value = ""></td>
                    </tr>
                    <tr>
                        <td width="100" align="center" valign="baseline">名字</td>
                        <td valign="baseline">
                            <input type="name" name="name" id="name" value = "<?php echo $_SESSION['name'] ?>"></td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline">電話</td>
                        <td valign="baseline">
                            <input type="phone" name="phone" id="phone" value = "<?php echo $_SESSION['phone'] ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" bgcolor="#CCCCCC">
                            <input type="submit" name="button" id="button" value="修改" ></td>
<!--                            <input type="reset" name="button2" id="button2" value="重設" ></td>-->
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

</body>
</html>