<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $suit_number = mysqli_real_escape_string($conn, $_POST['suit_number']);
        $parties = mysqli_real_escape_string($conn, $_POST['parties']);
        $court_room = mysqli_real_escape_string($conn, $_POST['court_room']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        if(empty($suit_number) || empty($parties) || empty($court_room) || empty($date)){
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../add_case.php';
            </script>";
            exit();
        } else {
            $sql = "INSERT INTO `cases` (`id`, `suit_number`, `parties`, `court_room`, `date`)
            VALUES (NULL, '$suit_number', '$parties', '$court_room', '$date');";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Case Added!');
            window.location= '../all_cases.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../add_case.php');
        exit();
    }
