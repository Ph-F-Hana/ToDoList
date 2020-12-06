<?php
    session_start();
    require_once("config.php");
    extract($_POST);
    $registered = FALSE;
    if(isset($register)):
        $result = mysqli_query($con, "SELECT * FROM users");
        while($user_data = mysqli_fetch_array($result)):
            if($email === $user_data['email']):
                $_SESSION['error'] = "has been registered before!!";
                $registered = TRUE;
                break;
            endif;
        endwhile;
        if(!$registered):
            if($password === $password_confirmed && filter_var($email, FILTER_VALIDATE_EMAIL)):
                mysqli_query($con, "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$password')");
                header("Location: signIn.php");
            else:
                $_SESSION['error'] = "Confirm password not match";
            endif;
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
        <p><?php echo $_SESSION['error']  ?></p>
        <form method="POST" name='form-login' action="signUP.php">
    
            <h1>REGISTER</h1>
    
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
    
            <label for="pw">Password</label>
            <input type="password"
                   id= "pw"
                   name="password"
                   placeholder="Password" required>

            <label for="Cf_pw"> Confirm Password</label>
            <input type="password"
                   id= "Cf_pw"
                   name="password_confirmed"
                   placeholder="Password" required>
    
            <ul class="helper-text">
                <li class="length">Must be at least 8 characters long.</li>
                <li class="lowercase">Must contain a lowercase letter.</li>
                <li class="uppercase">Must contain an uppercase letter.</li>
                <li class="special">Must contain a number or special character.</li>
            </ul>
            <input id="rgstr_btn" type="submit" value="Register" name="register">
    
        </form>
    </div>
    <script src="js/script.js"> </script>
</body>
</html>