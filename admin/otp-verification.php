<?php session_start() ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Verification</title>
</head>
<body>


<main class="container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-5 bg-secondary rounded">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-white text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input class="btn btn-success d-block mx-auto px-5" type="submit" value="Verify" name="verify">
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
<?php 
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            $_SESSION['Cart'] = []
            ?>
             <script>
                alert("Checkout success");
                window.location.replace("../index.php");
             </script>
             <?php
                require "Mailer/PHPMailerAutoload.php";
                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username ='deshcharity1@gmail.com';
                $mail->Password ='Desh!@#Charity';
                $mail->SMTPSecure = 'tls';
                $mail->Port= 587;

                $mail->setFrom('deshcharity1@gmail.com', 'Desh Charity');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject="Verification Successful";
                $mail->Body="<p>Dear user, </p> <h3>Your verification have been successful! You can sign in now. <br></h3>
                <br><br>
                With regrads,<br>
                Forhad Uddin<br><br>
                CEO, Desh Charity<br>
                Chittagong - 4200, Ave-5<br>
                Get in touch @: 01810000000<br>
                For more, visit: <a href=\"http://localhost/Desh-Charity/\">Desh Charity</a>";
                $mail->send();
        }

    }

?>