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
    header('refresh:0;url=index.php');
}

if(! isset($_SESSION['name'])) {
//    header('refresh:0;url = index.php');
    echo 'no session id';
}

?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Hello, <?php echo $_SESSION['name'] ?>
                </div>

                <div class="links">
                    <form name="logout" method="post" action="">
                        <input type="hidden" name="logout" id="logout" value="">
                        <input type="submit" name="logout" value="登出">
                    </form>
                    <a href="update.php">修改資料</a>
                    <form name="delete" method="post" action="">
                        <input type="hidden" name="delete" value="">
                        <input type="submit" name="delete" value="刪除帳號">
                    </form>
                    <?php if (isset($_SESSION['id']) && $_SESSION['id'] == '1') {
                        echo '<a href="members.php">管理者</a>';
                    } ?>
                </div>
            </div>
        </div>
    </body>
</html>