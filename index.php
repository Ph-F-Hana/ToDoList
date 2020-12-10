<?php
    session_start();
    require_once("config.php");
    if(!(isset($_SESSION['id']))):
    // if(!(isset($_SESSION['id'])) && is_numeric($_SESSION['id'])):
        header("Location: signIn.php");
    endif;
    $login = mysqli_query($con, "SELECT Name FROM users WHERE Us_ID='".$_SESSION['id']."'");
    $userName = mysqli_fetch_array($login)['Name'];
    $stmt = "SELECT posts.P_ID, posts.post FROM users INNER JOIN user_post ON users.Us_ID=user_post.Us_ID INNER JOIN posts ON user_post.P_ID=posts.P_ID WHERE users.Us_ID='".$_SESSION['id']."'";
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
            <form method="POST" action="add.php">
                <input name="post" type="text"/>
                <span class="add">+</span>
            </form>
        </div>
        <div class="content">
            <input type="text" id="search" placeholder="Search">
            <span class="empty">Add New Task</span>
            <!-- <span class="task">
            <span class="delete"></span>
            </span> -->
        </div>

        <div class="content">
            <?php
                while($user_data = mysqli_fetch_array($result)):
            ?>
                <span class="task">
                    <?php echo  $user_data['post'] ?>
                    <a href="delete.php?id=<?php echo $user_data['P_ID'];?>"><span class="delete">Delete</span></a>
                    <a href="edit.php?id=<?php echo $user_data['P_ID'];?>"><span class="edit">Edit</span></a>
                </span>
            <?php
                endwhile;
            ?>
        
        </div>
        <div class="content" id="show_search">
        
        </div>

        <!-- <div class="task-stats">
            <div class="counter">
            Tasks <span>0</span>
            </div>
            <div class="completed">
                Completed <span>0</span>
            </div>
        </div> -->
        <form action="logout.php">
            <input type="submit" value="Logout">
        </form>

    </div>
    <script src="js/script.js"></script>
    <script src="js/sweetalert.min.js"></script>
</body>
</html>


<!-- <div class="content">
        <span class="task">test for test<span class="delete">Delete</span></span></div> -->