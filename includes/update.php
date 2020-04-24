<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $suit_number =  $_POST['suit_number'];
        $parties = $_POST['parties'];
        $court_room = $_POST['court_room'];
        $date = $_POST['date'];

        if(empty($suit_number) || empty($parties) || empty($court_room) || empty($date)){
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../all_cases.php';
            </script>";
            exit();
        } else {
            $sql = "UPDATE cases SET suit_number='$suit_number', parties='$parties', court_room='$court_room', date='$date' WHERE id='$id';";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Case updated!');
            window.location= '../all_cases.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../all_cases.php');
        exit();
    }
?>
