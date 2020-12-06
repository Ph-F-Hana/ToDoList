<?php
session_start();
require_once("config.php");
extract($_GET);
mysqli_query($con, "DELETE FROM posts WHERE P_ID=$id");
mysqli_query($con, "DELETE FROM user_post WHERE P_ID=$id");
header("Location: index.php");
?>