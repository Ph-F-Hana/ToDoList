<?php
    session_start();
    require_once("config.php");
    extract($_POST);
    if(isset($login)):
        $result = mysqli_query($con, "SELECT * FROM users WHERE email='$lemail' LIMIT 1");
        $user_data = mysqli_fetch_array($result);
        extract($user_data);
        if($Password === $lpassword):
            $_SESSION['id'] = $Us_ID;
            header("Location: index.php");
        else:
            $_SESSION['error'] = "email or password not valid";
        endif;
    endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="css/main.css">

    
</head>
<body>
    
    <div class="login">
        <p><?php echo $_SESSION['error']?? "no error"; ?></p>
            <!-- <form action="signIn.php" method="POST" name="update_user">
        <table>

            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="lemail" id="email"></td>
            </tr>

            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="lpassword" id="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form> -->
        <form name='form-login' method="POST" action="signIn.php">
    
            <h1>SIGN IN</h1>
    
            <label for="userName">Email</label>
            <input type="email" id="userName" name="lemail" placeholder="Username" required>
    
            <label for="userPw">Password</label>
            <input type="password" id= "userPw" name="lpassword" placeholder="Password" required>
    
            <div id="remember">
                <input type="checkbox" value="lsRememberMe" id="rememberMe"
                       style="display: inline-block;">
                <label>Remember me</label>
            </div>
            
            <input id= "login_btn" type="submit" name="login" value="Login">
            <a href="signUp.php">
                <input id= "signup_btn" type="button" value="Sign Up">
            </a>
    
        </form>
    </div>
    <!-- <script src="js/script.js"> </script> -->
</body>
</html>