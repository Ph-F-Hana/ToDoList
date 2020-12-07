<?php
session_start();
require_once("config.php");
// var_dump($_POST);
extract($_POST);
// var_dump($_REQUEST);

// $search
$stmt = "SELECT posts.P_ID, posts.Post FROM users INNER JOIN user_post ON users.Us_ID=user_post.Us_ID INNER JOIN posts ON user_post.P_ID=posts.P_ID WHERE users.Us_ID='".$_SESSION['id']."' AND posts.Post LIKE '". $search ."%'";
$result = mysqli_query($con, $stmt);
$response = array();
while($row = mysqli_fetch_array($result)):
    $response[] = array(
        "id" => $row['P_ID'],
        "post" => $row['Post'],
    );
    // echo $row['Post'];
endwhile;
echo json_encode($response);
?>