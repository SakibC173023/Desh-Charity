<?php
include_once '../Includes/dbh_connect.php';

if (isset($_POST['submit']))
{
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $src = "SELECT * FROM login_data WHERE username = '$user'";
    $stmt = connect()->query($src);
    $row = $stmt->fetch();

    if($row['username'] == $user)
        {
            header('location:admin.php?error=userTaken');
        }
    else
    {
        $add = "INSERT INTO login_data(username,email,password) VALUES(?,?,?)";
        $stmt = connect()->prepare($add);
        $stmt->execute([$user,$email,$pass]);

        header('location:admin.php?value=success');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link rel="stylesheet" type="text/css" href="admin_curd.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="Login-box">
        <div class="row">
            <div class="col-md-6 login_area">
                <h2>Data Update</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control" required placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" required placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>