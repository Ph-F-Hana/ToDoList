<?php
session_start();
require_once("config.php");
extract($_POST);

$stmt = "SELECT posts.P_ID, posts.post FROM users INNER JOIN user_post ON users.Us_ID=user_post.Us_ID INNER JOIN posts ON user_post.P_ID=posts.P_ID WHERE users.Us_ID='".$_SESSION['id']."' AND posts.Post LIKE ";