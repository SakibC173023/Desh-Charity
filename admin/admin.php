<?php
    session_start();
    include_once '../login/dbh_connect.php';

    if(isset($_SESSION['admin'])){
        header('location:./admin-dashboard.php');
        return;
    }

    if(isset($_POST['submit']))
    {
        $mail = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = 'SELECT * FROM users WHERE userEmail = ? and userPass = ?';
        $stmt = connect()->prepare($sql);
        $stmt->execute([$mail,$pass]);
        $row = $stmt->fetch();

        if($row['userEmail'] == $mail and $row['userPass'] == $pass){
            $_SESSION['admin'] = $mail;
            header('location:./admin-dashboard.php');
        }else{
            header('location:./admin.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Admin Login</title>
        <meta charset="utf-8">
        <link href="../assets/css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--webfonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet'
            type='text/css'>
        <!--//webfonts-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- font-awesome -->
        <script src="https://kit.fontawesome.com/e627d5dbde.js" crossorigin="anonymous"></script>
        <!-- Template CSS Style link -->
        <link rel="stylesheet" href="../assets/css/style-starter.css">
        <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
        <!-- Template CSS Style link -->
        <style>
            main{
                margin-bottom: 150px;
            }
        </style>
    </head>

    <body>
        <!-- header -->
        <header class="">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid">
                <a class="navbar-brand h3 fw-bold ps-lg-5 d-flex align-items-center" href="../index.php">
                    <a class="navbar-brand h3 fw-bold" href="../index.php"><i
                            class="fas fa-hand-holding-heart  fs-1" style="color: red"></i> Desh Charity</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 pe-5 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-warning" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <?php
                                if(isset($_SESSION['admin'])){
                                    echo "<li class=\"nav-item\">
                                        <a class=\"nav-link\" href=\"admin-logout.php\">Logout</a>
                                    </li>";
                                }else{
                                    echo "<li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"login.php\">Login</a>
                                </li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    <main class="container-fluid">
        <div class="login-form">
                <h1>Admin Login</h1>
                <form method="post">
                    <li>
                        <input type="text" name="email" placeholder="Enter email" required autocomplete="off"><a href="#" class="icon user"></a>
                    </li>          
                    <li>          
                        <input type="password" name="pass" placeholder="Enter password" required><a href="#" class="icon lock"></a>
                    </li> 
                    <div class="forgot">
                        <input type="submit" name="submit" value="Login"> <a href="#" class="icon arrow"></a>
                    </div>
                </form>
            </div>   
    </main>

<?php
include_once '../footer.php';