<?php
include('isvalid.php');
include('connection.php');

if (isset($_POST['submit'])) {
    $question_number = $_POST['question_number'];
    $sid = $_POST['cname'];
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
    // Choice Array
    $choice = array();
    $choice[1] = $_POST['choice1'];
    $choice[2] = $_POST['choice2'];
    $choice[3] = $_POST['choice3'];
    $choice[4] = $_POST['choice4'];

    // First Query for Questions Table

    $query = "INSERT INTO questions (";
    $query .= "qid,sid, ques )";
    $query .= "VALUES (";
    $query .= " '{$question_number}',{$sid},'{$question_text}' ";
    $query .= ")";

    $result = mysqli_query($db_conn, $query);

    //Validate First Query
    if ($result) {
        foreach ($choice as $option => $value) {
            if ($value != "") {
                if ($correct_choice == $option) {
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }

                //Second Query for Choices Table
                $query = "INSERT INTO options (";
                $query .= "ques_no,is_correct,options)";
                $query .= " VALUES (";
                $query .=  "'{$question_number}','{$is_correct}','{$value}' ";
                $query .= ")";

                $insert_row = mysqli_query($db_conn, $query);
                // Validate Insertion of Choices

                if ($insert_row) {
                    continue;
                } else {
                    die("2nd Query for Choices could not be executed" . $query);
                }
            }
        }
        $message = "Question has been added successfully";
    }
}

$query = "SELECT * FROM questions";
$questions = mysqli_query($db_conn, $query);
$total = mysqli_num_rows($questions);
$next = $total + 1;

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Question</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('menu.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="login-form bg-light mt-p-4">
                                <form action="addquestions.php" method="POST" class="row-g-3">
                                    <div class="text-center">
                                        <h4>Add Questions</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <label>Question Number</label>
                                        <input type="number" name="question_number" class="form-control" value="<?php echo $next; ?>">
                                    </div><br>
                                    <div class="col-12">
                                        <label>Question</label>
                                        <textarea name="question_text" class="form-control" cols="10" rows="5"></textarea>
                                    </div><br>
                                    <div class="col-12">
                                        <label>Option1</label>
                                        <textarea name="choice1" class="form-control" cols="10" rows="2"></textarea>
                                    </div><br>
                                    <div class="col-12">
                                        <label>Option2</label>
                                        <textarea name="choice2" class="form-control" cols="10" rows="2"></textarea>
                                    </div><br>
                                    <div class="col-12">
                                        <label>Option3</label>
                                        <textarea name="choice3" class="form-control" cols="10" rows="2"></textarea>
                                    </div><br>
                                    <div class="col-12">
                                        <label>Option4</label>
                                        <textarea name="choice4" class="form-control" cols="10" rows="2"></textarea>
                                    </div><br>
                                    <div class="col-12">
                                        <label>Correct Option Number</label>
                                        <input type="number" name="correct_choice" class="form-control" min="1" max="4">
                                    </div><br>
                                    <div class="col-12">
                                        <label>Select Category</label>
                                        <select name="cname" class="form-control">
                                            <?php
                                            $sql = "select * from subject";
                                            $res = mysqli_query($db_conn, $sql);
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                echo "<option value=" . $row['sid'] . ">" . $row['subname'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div><br>

                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary mx-auto w-100" name="submit" value="Add">
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include('footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

</html>