<?php
include('isvalid.php');
include('connection.php');

if (isset($_GET['tid'])) {
    $cd = $_GET['tid'];
    $sql = "delete from teachers where id='$cd'";
    $res = mysqli_query($db_conn, $sql);
    if (mysqli_affected_rows($db_conn) == 1) {
        header("Location:viewteachers.php");
    }
}
