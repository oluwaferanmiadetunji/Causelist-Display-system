<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        if(empty($title) || empty($content) || empty($date)){
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../add_news.php';
            </script>";
            exit();
        } else {
            $sql = "INSERT INTO `news` (`id`, `title`, `content`, `date`)
            VALUES (NULL, '$title', '$content', '$date');";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('News Added!');
            window.location= '../all_news.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../all_news.php');
        exit();
    }
