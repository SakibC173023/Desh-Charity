<?php
    session_start();

    if(isset($_POST['checkout'])){
        $otp = rand(000000,999999);
        $_SESSION['otp'] = $otp;

        require "./admin/Mailer/PHPMailerAutoload.php";

        $mail = new PHPMailer();
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username ='deshcharity1@gmail.com';
        $mail->Password ='Desh!@#Charity';
        $mail->SMTPSecure = 'tls';
        $mail->Port= 587;
        
        $mail->setFrom('deshcharity1@gmail.com', 'Desh Charity');
        $mail->addAddress($_SESSION['email']);
        
        $mail->isHTML(true);
                    
        $mail->Subject="Your verification code";
        $mail->Body="<p>Dear user, </p> <h3>Your verification code is $otp <br></h3>
        <br><br>
        With regrads,<br>
        Forhad Uddin<br><br>
        CEO, Desh Charity<br>
        Chittagong - 4200, Ave-5<br>
        Get in touch @: 01810000000<br>
        For more, visit: <a href=\"http://localhost/Desh-Charity/\">Desh Charity</a>";

        if(!$mail->send()){
            ?>
                <script>
                    alert("<?php echo "Something Went wrong! Try later."?>");
                </script>
            <?php
            }
            else{
                header('location: ./admin/otp-verification.php');
            }
            ?>

            <script>
                window.alert(`An OTP has been sent to ${$_SESSION['email']}`)
            </script>
<?php
    }
?>

<!----Header---->
<?php require_once 'nav-bar.php'; ?>
<link rel="stylesheet" href="assets/css/check-out.css">

<!-----CheckOut------>
    <div class="container mt-5 pt-5">
        <div class="Checkout">
            <form method="POST">
                <div class="row ">
                    <div class="col-6">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Jhon Doe">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" 
                        value="<?php echo $_SESSION['email'] ?>" readonly disabled>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="20/27 Bashundhara Chittagong" required>
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="Chittagong" required>          
                    </div>

                    <div class="col-6">
                        <h3 class="mb-0">Payment</h3>
                        <div class="icon-Checkout">
                            <img width="80px" src="./assets/images/bkash.svg" alt="Bkash">
                            <img width="80px" src="./assets/images/Nagad.svg" alt="Nagad">
                        </div>
                        <label for="cname">Send out number <span style="color: red;">*</span></label>
                        <input type="text" id="cname" name="cardname" placeholder="+880 1781789178" required>
                        <label for="ccnum">Enter Amount <span style="color: red;">*</span></label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="999" required>
                        <label for="expmonth">Your Comments (if any)</label>
                        <input type="text" id="expmonth" name="expmonth">
                        <input type="submit" value="Continue to checkout" name="checkout" class="btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
function checkElement($count,$total)
{
    $elements =
        "
         <div class='pt-1'>
                        <h6 style='text-align: center;margin-left: 30px'>DETAILS</h6>
                        <hr style='text-align: center;margin-left: 30px'>
                        <div class='row price-details'>
                        <div class='col-md-6'>
                            <h6>Products</h6>
                            <h6>Price</h6>
                        <h6>Charges</h6>
                        <hr style='margin-left: 3px'>
                        <h6>Payable</h6>
                        </div>
                        <div class='col-md-6'>
                        <h6 style='text-align: center;margin-left: 30px'>($count)</h6>
                        <h6 style='text-align: center;margin-left: 30px'>$$total</h6>
                        <h6 class='text-success' style='text-align: center;margin-left: 30px'>FREE</h6>
                        <hr>
                                    <h6 style='text-align: center;margin-left: 30px'>$$total</h6>

        ";
    return $elements;
}