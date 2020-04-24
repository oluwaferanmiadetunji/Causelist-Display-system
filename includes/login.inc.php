<?php

    session_start();

    if(isset($_POST['submit'])){

        include_once 'config.php';

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //error handlers
        //check for empty fields
        if(empty($email) || empty($password)){
            header('Location: ../index.php?login=empty');
            exit();
        } else {
            $sql = "SELECT * FROM `users` WHERE `email`='$email';";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);
            if ($result_check < 1) {
                header('Location: ../index.php?login=error');
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    if ($password == false) {
                        header('Location: ../index.php?login=error');
                        exit();
                    } elseif ($password == true) {
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['message'] = "You are logged in!";
                        header('Location: ../add_case.php');
                        exit();
                    }
                }
            }
        }
    } else {
        header('Location: ../index.php?loginerror');
        exit();
    }
