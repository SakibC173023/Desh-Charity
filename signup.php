<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/e627d5dbde.js" crossorigin="anonymous"></script>
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->

</head>
<body>
<!-- header -->
<header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand h3 fw-bold" href="index.php"><i
                    class="fas fa-hand-holding-heart  fs-1 ps-lg-5" style="color: red"></i> Desh Charity</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 pe-5 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<!-- //header -->
<!-----start-main---->
<div class="login-form">
    <h1>Sign Up</h1>
    <form action="login/signup_validation.php" method="post">
        <li>
            <label>
                <input type="text" name="email" class="w-100" placeholder="Email" autocomplete="off">
            </label><a href="#" class=" icon user"></a>
        </li>
        <li>
            <label>
                <input type="password" name="pass" class="w-100" placeholder="Password">
            </label><a href="#" class=" icon lock"></a>
        </li>
        <li>
            <label>
                <input type="password" name="rpass" class="w-100" placeholder="Confirm Pass">
            </label><a href="#" class=" icon lock"></a>
        </li>
        <div class ="forgot">
            <input type="submit" name="submit" value="Sign Up"> <a href="#" class=" icon arrow"><a>                                                                 
        </div>
    </form>
</div>
<!--//End-login-form-->


<!-----start-copyright---->
<div class="copy-right">
    <p style="color: #00bfff">Design by <a href="http://w3layouts.com" >Desh Charity</a></p>
</div>
<!-----//end-copyright---->

</body>
</html>