<?php
session_start();
if(isset($_POST['logout'])) {
    session_destroy();
    header('refresh:0;url=index.php');
}

if(isset($_POST['delete'])) {
    require ('connectMySQL.php');
    $deleteQuery = "DELETE FROM nativeUsers WHERE id = ".$_SESSION['id'];
    mysqli_query($db_link, $deleteQuery);
    session_destroy();
    header('refresh:0;url=index.php');
}

if(! isset($_SESSION['name'])) {
    echo 'no session id';
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>會員登入系統</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Hello, <?php echo $_SESSION['name'] ?>
                </div>

                <div>
                    <form name="logout" method="post" action="">
                        <input type="hidden" name="logout" id="logout" value="">
                        <input type="submit" name="logout"  style="width:120px;font-size:20px;" value="登出">
                    </form>
                    <input type="button" onclick="location.href='update.php'"  style="width:120px;font-size:20px;" value="修改資料" />
                    <form name="delete" method="post" action="">
                        <input type="hidden" name="delete" value="">
                        <input type="submit" name="delete"  style="width:120px;font-size:20px;" value="刪除帳號">
                    </form>
                    <?php if (isset($_SESSION['id']) && $_SESSION['id'] == '1') {
                        echo "<input type=\"button\" onclick=\"location.href='members.php'\"  style=\"width:120px;font-size:20px;\" value=\"管理者\" />";
                    } ?>
                </div>
            </div>
        </div>
    </body>
</html>