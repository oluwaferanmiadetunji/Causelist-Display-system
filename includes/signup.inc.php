<?php
    if(isset($_POST['submit'])){

        include_once 'config.php';

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //error handlers
        //check for empty fields
        if(empty($name) || empty($email) || empty($password)){
            header('Location: ../register.php?signup=empty');
            exit();
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('Location: ../register.php?invalidemail');
                exit();
            } else{
                $sql = "SELECT * FROM `users` WHERE `name`='$name'";
                $result = mysqli_query($conn, $sql);
                $result_check = mysqli_num_rows($result);

                if ($result_check > 0) {
                    header('Location: ../register.php?alreadyregistered');
                    exit();
                } else {
                    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$hashedpassword');";
                    mysqli_query($conn, $sql);
                    header('Location: ../index.php');
                    exit();
                }
            }
        }
    } else {
        header('Location: ../register.php');
        exit();
    }
