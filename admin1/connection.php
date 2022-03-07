<?php
$db_conn = mysqli_connect('localhost', 'root', '', 'major_quiz');
if (!$db_conn) {
    echo "Connection Failed";
}
