<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $title =  $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];

        if(empty($title) || empty($content) || empty($date)){
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../all_news.php';
            </script>";
            exit();
        } else {
            $sql = "UPDATE news SET title='$title', content='$content', date='$date' WHERE id='$id';";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('News updated!');
            window.location= '../all_news.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../all_cases.php');
        exit();
    }
?>
