<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link href="index.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a>Contact</a></li>
            <?php
            if (isset($_SESSION['username']))
                {
                    echo "<li><a href='logout.php'>Log out</a></li>";
                }
            else
            {
               echo "<li><a href='login.php'>Login</a></li>";
               echo  "<li><a href='signup.php'>Sign up</a></li>";
            }
            ?>
        </ul>
    </div>
    <?php
    if (isset($_SESSION['username']))
    {
        echo "Welcome ".$_SESSION['username'];
    }
    ?>

    <button type="submit" class="btn btn-primary" style="margin-top: 350px;margin-left: 650px;font-size: 16px"><a style="text-decoration: none" href="crud/admin.php">Admin</a></button>
</body>
</html>