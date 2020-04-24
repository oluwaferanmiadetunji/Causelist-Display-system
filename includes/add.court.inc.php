<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $court = mysqli_real_escape_string($conn, $_POST['court_room']);
        $judges = mysqli_real_escape_string($conn, $_POST['judges']);

        if(empty($court) || empty($judges)){
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../add_court.php';
            </script>";
            exit();
        } else {
            $sql = "SELECT * FROM `courts` WHERE court_room='$court';";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
            if ($resultcheck > 0) {
                echo "<script type='text/javascript'>
                alert('Court already exists!');
                window.location= '../add_court.php';
                </script>";
                exit();
            } else {
                $sql = "INSERT INTO `courts` (`id`, `court_room`, `judges`) VALUES (NULL, '$court', '$judges');";
                mysqli_query($conn, $sql);
                echo "<script type='text/javascript'>
                alert('Court Added!');
                window.location= '../all_courts.php';
                </script>";
                exit();
            }
        }
    } else {
        header('Location: ../all_cases.php');
        exit();
    }
