<?php
include_once '..\Includes/dbh_connect.php';
$id = $_GET['id'];
if(isset($_POST['submit']))
{
        $email = $_POST['email'];
        $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE userEmail = '$email'";
    $stmt = connect()->query($sql);
    $row = $stmt->fetch();

    if($email == $row['userEmail'])
    {
        header('location:edit_data.php');
    }else
    {
        $sql = "UPDATE users SET userEmail = '$email', userPass = '$pass' WHERE userEmail = '$email'";
        $stmt = connect()->query($sql);
        header('location:admin.php');
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