<?php
// include('isvalid.php');
// include('connection.php');
// if (isset($_POST['submit'])) {
//     $ques_no = $_POST['qnum'];
//     $sid = $_POST['cname'];
//     $qname = $_POST['qname'];

//     $choice = array();
//     $choice[1] = $_POST['option1'];
//     $choice[2] = $_POST['option2'];
//     $choice[3] = $_POST['option3'];
//     $choice[4] = $_POST['option4'];
//     $crr_ans = $_POST['corr_num'];

//     $sql = "insert into questions values ('$ques_no','$sid','$qname')";
//     $res = mysqli_query($db_conn, $sql);

  
//     if ($res) {
//         foreach ($choice as $option => $value) {
//             if ($value != "") {
//                 if ($curr_ans == $option) {
//                     $is_correct = 1;
//                 } else {
//                     $is_correct = 0;
//                 }

         
//                 $sql1 = "insert into options('','$ques_no','$is_correct','{$value}')";
//                 $res1 = mysqli_query($db_conn, $sql1);

            
//                 if ($res1) {
//                     continue;
//                 } else {
//                     die("2nd Query for Choices could not be executed" . $sql1);
//                 }
//             }
//         }
//     }

//     if (mysqli_affected_rows($db_conn)) {
//         header('Location:addquestions.php');
//     }
// }
