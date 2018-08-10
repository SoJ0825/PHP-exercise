<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function read() {

        $db_host = '127.0.0.1';
        $db_userName = 'root';
        $db_password = 'tacodess';
        $db_name = 'class';

        $db_link = @mysqli_connect($db_host, $db_userName, $db_password, $db_name);
        if (!$db_link) {
            die('資料庫連結失敗!');
        } else {
//            echo '連結資料庫成功';
        }

        mysqli_query($db_link, "SET NAMES 'utf8'");

        $seldb = @mysqli_select_db($db_link,"class");
        if (!$seldb) die('資料庫選擇失敗！');

        $sql_query = "SELECT * FROM member ORDER BY cID ASC";

        $result = mysqli_query($db_link,$sql_query);

        $total_records = mysqli_num_rows($result);
        return view('index', compact('total_records', 'result'));

    }

    public function create(Request $request) {

        $db_host = '127.0.0.1';
        $db_userName = 'root';
        $db_password = 'tacodess';
        $db_name = 'class';

        $db_link = @mysqli_connect($db_host, $db_userName, $db_password, $db_name);
        if (!$db_link) {
            die('資料庫連結失敗!');
        } else {
//            echo '連結資料庫成功';
        }

        mysqli_query($db_link, "SET NAMES 'utf8'");

        $data = $request->all();

        if (isset($data["action"])&&($data["action"] == "add")) {
            $name = $data["cName"];
            $birthday = $data['cBirthday'];
            $email = $data['cEmail'];
            $sql_query = "INSERT INTO member (cName, cBirthday, cEmail) VALUES ('$name', 
'$birthday','$email')";

            mysqli_query($db_link,$sql_query);

            $sql_query = "SELECT * FROM member ORDER BY cID ASC";

            $result = mysqli_query($db_link,$sql_query);

            $total_records = mysqli_num_rows($result);
            return view('index', compact('total_records', 'result'));

        } else {
            return view('add');
        }
    }

    public function update(Request $request, $id)
    {

        $db_host = '127.0.0.1';
        $db_userName = 'root';
        $db_password = 'tacodess';
        $db_name = 'class';

        $db_link = @mysqli_connect($db_host, $db_userName, $db_password, $db_name);
        if (!$db_link) {
            die('資料庫連結失敗!');
        } else {
//            echo '連結資料庫成功';
        }

        mysqli_query($db_link, "SET NAMES 'utf8'");

        $sql_getDataQuery = "SELECT * FROM member WHERE cID = $id";

        $result = mysqli_query($db_link, $sql_getDataQuery);

        $row_result = mysqli_fetch_assoc($result);
        $name = $row_result['cName'];
        $birthday = $row_result['cBirthday'];
        $email = $row_result['cEmail'];

        if (isset($_POST["action"])) {

            $data = $request->all();
            $name = $data['cName'];
            $birthday = $data['cBirthday'];
            $email = $data['cEmail'];

            $sql_query = "UPDATE member SET cName='$name', cBirthday='$birthday', cEmail='$email' WHERE cID='$id'";

            mysqli_query($db_link,$sql_query);

            $sql_query = "SELECT * FROM member ORDER BY cID ASC";

            $result = mysqli_query($db_link,$sql_query);

            $total_records = mysqli_num_rows($result);
            return view('index', compact('total_records', 'result'));

        } else {

            return view('update', compact('name', 'birthday', 'email', 'id'));
        }
    }

    public function delete($id)
    {

        $db_host = '127.0.0.1';
        $db_userName = 'root';
        $db_password = 'tacodess';
        $db_name = 'class';

        $db_link = @mysqli_connect($db_host, $db_userName, $db_password, $db_name);
        if (!$db_link) {
            die('資料庫連結失敗!');
        } else {
//            echo '連結資料庫成功';
        }

        mysqli_query($db_link, "SET NAMES 'utf8'");

        $sql_query = "DELETE FROM member WHERE cID = $id";

        mysqli_query($db_link,$sql_query);

        $sql_query = "SELECT * FROM member ORDER BY cID ASC";

        $result = mysqli_query($db_link,$sql_query);

        $total_records = mysqli_num_rows($result);
        return view('index', compact('total_records', 'result'));

    }

}