<?php
    session_start();
    require_once("config.php");
    extract($_POST);
    // echo "test";
    if(isset($login)):
        $result = mysqli_query($con, "SELECT * FROM users WHERE email='$lemail' LIMIT 1");
        $user_data = mysqli_fetch_array($result);
        var_dump($user_data);
        // sleep(10);
        // die();
        extract($user_data);
        if($Password === $lpassword):
            echo "inside if";
            $_SESSION['id'] = $id;
            echo $_SESSION['id'];
            header("Location: index.php");
        else:
            echo "inside else";
            $_SESSION['error'] = "Password or email not valid";
        endif;
    endif;
?>