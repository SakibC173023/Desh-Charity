<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Desh Charity Web Application</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- font-awesome -->
        <script src="https://kit.fontawesome.com/e627d5dbde.js" crossorigin="anonymous"></script>
        <!-- Template CSS Style link -->
        <link rel="stylesheet" href="assets/css/style-starter.css">
    </head>

    <body>
        <!-- header -->
        <header class="">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid">
                <a class="navbar-brand h3 fw-bold ps-lg-5 d-flex align-items-center" href="index.php">
                    <a class="navbar-brand h3 fw-bold" href="index.php"><i
                            class="fas fa-hand-holding-heart  fs-1" style="color: red"></i> Desh Charity</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 pe-5 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-warning" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="volunteer.php">Be a Volunteer</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Products
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="baby-care.php">Baby Care</a></li>
                                    <li><a class="dropdown-item" href="#">Not Added Yet</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Not Added Yet</a></li>
                                </ul>
                            </li>
                            <?php
                                if(isset($_SESSION['username'])){
                                    echo "<li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"login/logout.php\">Logout</a>
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

     