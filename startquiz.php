<?php
session_start();
include('isvalid.php');
include('admin1/connection.php');

if (isset($_GET['sid'])) {
    $cd = $_GET['sid'];
    $sql = "select * from quiz where sid='$cd' order by RAND()";
    $res = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_assoc($res);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Quiz</title>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <div class="container mt-4">
        <div class="row">
            <form action="startquiz_sub.php" method="POST">
                <?php
                // $i = 1;
                // while ($row = mysqli_fetch_assoc($res)) {

                echo "<input type='hidden' name='sid' value=" . $cd . ">";
                echo "<div class='col-md-6 mt-4'>";
                echo "<input type='hidden' name='qid' value=" . $row['qid'] . ">";
                echo "<h5>" . $row['ques'] . "</h5>";
                echo "<input type='radio' name='options' value=" . $row['opt1'] . ">" . $row['opt1'] . "<br>";
                echo "<input type='radio' name='options' value=" . $row['opt2'] . ">" . $row['opt2'] . "<br>";
                echo "<input type='radio' name='options' value=" . $row['opt3'] . ">" . $row['opt3'] . "<br>";
                echo "<input type='radio' name='options' value=" . $row['opt4'] . ">" . $row['opt4'] . "<br>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                //     $i++;
                // }
                ?>
                <div class="col-12">
                    <input type="submit" class="btn btn-primary mx-auto w-100" name="submit" value="Submit">
                </div><br>
            </form>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>


</body>

</html>