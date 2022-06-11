<?php 
    session_start();

    $status = '';
    if(isset($_GET['status']) == 'otp-invalid'){
        $status = 'Invalid OTP!';
        ?>
            <script src="../assets/js/toast.js"></script>
        <?php
    }

?>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Verification</title>
</head>
<body>

<main class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-body p-5 bg-secondary rounded">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-3 col-form-label text-white text-md-center">OTP Code:</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-4 offset-md-4">
                                <input class="btn btn-primary d-block mx-auto mt-3 px-5" type="submit" value="Verify" name="verify">
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    </main>
       <!-- Toast -->
       <div class="position-fixed bottom-0 end-0 p-2" style="z-index: 11">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto fs-6">
                        <span class="badge bg-danger badge-pill">1 Notification</span>
                    </strong>
                    <small>1s ago..</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-danger"><?php echo $status ?></div>
            </div>
        </div>

         <!-- bootstrap js-->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- //bootstrap js-->
    </body>
</html>
<?php 
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            header("location:./otp-verification.php?status=otp-invalid");
        }else{
            unset($_SESSION['Cart']);
            unset($_SESSION['total_price']);
            header("location:../index.php?checkout=success");
            require "Mailer/PHPMailerAutoload.php";
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username ='deshcharity1@gmail.com';
            $mail->Password ='ytwmxjzihkifrzzw';
            $mail->SMTPSecure = 'tls';
            $mail->Port= 587;

            $mail->setFrom('deshcharity1@gmail.com', 'Desh Charity');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject="Verification Successful";
            $mail->Body="<p>Dear user, </p> <h3>Your checkout have been successful! Product will be delivered within 7 days. Thanks for being with us. <br></h3>
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