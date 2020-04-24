<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $court_room =  $_POST['court_room'];
        $judges = $_POST['judges'];

        if(empty($judges) || empty($court_room)){
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../all_courts.php';
            </script>";
            exit();
        } else {
            $sql = "UPDATE courts SET court_room='$court_room', judges='$judges' WHERE id='$id';";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Court updated!');
            window.location= '../all_courts.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../all_courts.php');
        exit();
    }
?>
