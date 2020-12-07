<?php
session_start();
require_once("config.php");
if(isset($_GET['id'])):
    extract($_GET);
    $result = mysqli_query($con, "SELECT * FROM posts WHERE P_ID = $id");
    $post = mysqli_fetch_array($result)["Post"];
endif;
if(isset($_POST['id'])):
    extract($_POST);
    mysqli_query($con, "UPDATE posts SET Post='$post' WHERE P_ID=$id");
    header("Location: index.php");
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="newTask">
        <form method="POST" action="edit.php">
            <input name="post" type="text" value="<?php echo $post; ?>"/>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <span class="add">+</span>
        </form>
        </div>
    </div>
    <script>
        document.querySelector("span.add").addEventListener("click", () => {
            document.forms[0].submit();
        });
    </script>
    <script src="js/sweetalert.min.js"></script>
</body>
</html>