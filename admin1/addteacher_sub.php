<?php
include('isvalid.php');
include('connection.php');
if (isset($_POST['submit'])) {
    $name = $_POST['tname'];
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql = "insert into teachers (name,username,password) values ('$name','$uname','$password')";
    $res = mysqli_query($db_conn, $sql);
    if (mysqli_affected_rows($db_conn)) {
        header('Location:viewteachers.php');
    }
}
