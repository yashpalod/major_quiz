<?php
session_start();
include('isvalid.php');
include('admin1/connection.php');
if (isset($_POST['submit'])) {
    $un = $_SESSION['USNM'];
    $sid = $_POST['sid'];
    $qid = $_POST['qid'];
    $opt = $_POST['options'];

    $sql1 = "select * from quiz where qid='$qid'";
    $res1 = mysqli_query($db_conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $corr_ans = $row1['corr'];

    $sql = "insert into user_ans values ('','$un','$sid','$qid','$opt','$corr_ans')";
    $res = mysqli_query($db_conn, $sql);
    if (mysqli_affected_rows($db_conn)) {
        // header('Location:home.php');
    }
}
