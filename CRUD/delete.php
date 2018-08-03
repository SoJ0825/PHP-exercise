<?php

    $id = $_GET['id'];

    include ('connMysql.php');

    $sql_query = "DELETE FROM member WHERE cID = $id";

    mysqli_query($db_link,$sql_query);

    header("Location: index.php");



?>