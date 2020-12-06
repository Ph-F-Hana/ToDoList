<?php
    session_start();
    require_once("config.php");
    if(!(isset($_SESSION['id'])) && is_numeric($_SESSION['id'])):
        header("Location: signIn.php");
    endif;
    $login = mysqli_query($con, "SELECT Name FROM users WHERE Us_ID='".$_SESSION['id']."'");
    $userName = mysqli_fetch_array($login)['Name'];
    $stmt = "SELECT post FROM users INNER JOIN user_post ON users.Us_ID=user_post.Us_ID INNER JOIN posts ON user_post.P_ID=posts.P_ID";
    $result = mysqli_query($con, $stmt) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/style.css"/>
    
    <title>To-Do</title>
</head>
<body>

    <div class="container">
        <div class="newTask">
            <input type="text"/>
            <span class="add">+</span>
        </div>
        <div class="content">
            <span class="empty">Add New Task</span>
            <!-- <span class="task">
            <span class="delete"></span>
            </span> -->
        </div>
    </div>

    <?php
        while($user_data = mysqli_fetch_array($result)):
    ?>
        <span class="task">
            <?php echo  $user_data['post'] ?>
            <span class="delete">Delete</span>
        </span>
    <?php
        endwhile;

    ?>
    
    <div class="task-stats">
        <div class="counter">
        Tasks <span>0</span>
        </div>
        <div class="completed">
            Completed <span>0</span>
        </div>
    </div>


    <script src="js/script.js"></script>
    <script src="js/sweetalert.min.js"></script>
</body>
</html>