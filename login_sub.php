<?php
include("admin1/connection.php");
if (isset($_POST['submit'])) {
    $un = $_POST['username'];
    $up = $_POST['password'];

    $sql = "select * from students where username='$un' and password='$up'";
    $res = mysqli_query($db_conn, $sql);

    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        session_start();
        $_SESSION['USNM'] = $row['uname'];
        header("Location:home.php");
    } else {
        header("Location:index.php");
    }
}
