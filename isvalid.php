<?php
$uname = $_SESSION['USNM'];
if (!isset($uname)) {
    header("Location:index.php");
    exit;
}
