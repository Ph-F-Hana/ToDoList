<?php
session_start();
require_once("config.php");
extract($_POST);
// var_dump($post);
// var_dump($_SESSION['id']);

if(isset($post)):
    mysqli_query($con, "INSERT INTO posts (Post) VALUES ('$post')");
    $latest_id = mysqli_insert_id($con);
    mysqli_query($con, "INSERT INTO user_post (Us_ID, P_ID) VALUES ('" . $_SESSION['id'] . "', '$latest_id')");
endif;
header("Location: index.php");
?>