<?php
$db_host = '127.0.0.1';
// $db_host = 'localhost';
$db_username = 'root';
$db_password = 'tacodess';
$db_database = 'class';

$db_link = @mysqli_connect($db_host, $db_username, $db_password, $db_database);

if(! $db_link) {
    echo '資料庫連結失敗！';
// } else {
//    echo '資料庫連結成功';
}