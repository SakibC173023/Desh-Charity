<?php
    session_start();

    include_once 'assets/php/create-db.php';
    include_once 'assets/php/component.php';

    $db = new Dbh();
    $db->connect();

    $total = 0;
    $_SESSION['total_price'] = 0;
    if (isset($_SESSION['Cart'])){
        $product_id = array_column($_SESSION['Cart'],'product_id');

        $result1 = $db->getDemoProduct('demoProduct');
        $result2 = $db->getBabyCare('babycare');
        $result3 = $db->getToys('toys');

        while($row = mysqli_fetch_assoc($result1) OR $row = mysqli_fetch_assoc($result2) OR $row = mysqli_fetch_assoc($result3)){
            foreach ($product_id as $id){
                if ($row['id'] == $id){
                    $total = $total + (int)$row['product_price'];
                    $_SESSION['total_price'] = $total;
                }
            }
        }

        }

    if(isset($_GET['error']) == 'amount-err'){
        $status = "Please enter correct amount!";
        ?>
            <script src="./assets/js/toast.js"></script>
        <?php
    }

    if(isset($_POST['checkout'])){
        $amount = $_POST['amount'];
        if((int)$amount !== (int)$_SESSION['total_price']){
            header("location: ./check-out.php?error=amount-err");
            return;
        }
        $otp = rand(000000,999999);
        $_SESSION['otp'] = $otp;

        require "./admin/Mailer/PHPMailerAutoload.php";

        $mail = new PHPMailer();
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username ='deshcharity1@gmail.com';
        $mail->Password ='ytwmxjzihkifrzzw';
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
    <div class="container my-5 py-5">
        <form method="POST" action="">
            <div class="row g-5 g-md-3">
                <div class="Checkout col-md-3">
                <h4>Cart Summary</h4>
                <hr>
                    <div class="row">
                    <div class="col-md-6">
                    <?php
                        if (isset($_SESSION['Cart'])){
                            $count  = count($_SESSION['Cart']);
                            echo "<h6>Price ($count items)</h6>";
                        }else{
                            echo "<h6>Price (0 items)</h6>";
                        }
                    ?>
                    <h6><i class="fa-solid fa-truck-container"></i> Delivery</h6>
                    <hr>
                    <h6>Amount Payable</h6>
                </div>
                <div class="col-md-6">
                    <h6 class="text-warning">$<?php echo $_SESSION['total_price']; ?></h6>
                    <h6 class="text-success">FREE</h6>
                    <hr>
                    <h6 class="text-warning">$<?php
                        echo  $_SESSION['total_price'];
                        ?></h6>
                </div>
                    </div>
                </div>
                <div class="Checkout col-md-8 ms-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Jhon Doe" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" 
                            value="<?php echo $_SESSION['email'] ?>" readonly disabled>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="20/27 Bashundhara Chittagong" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Chittagong" required>          
                        </div>

                        <div class="col-md-6">
                            <h3 class="mb-0">Payment</h3>
                            <div class="icon-Checkout">
                                <img width="80px" src="./assets/images/bkash.svg" alt="Bkash">
                                <img width="80px" src="./assets/images/Nagad.svg" alt="Nagad">
                            </div>
                            <label for="number">Send out number <span style="color: red;">*</span></label>
                            <input type="text" id="number" name="number" placeholder="+880 1781789178" required>
                            <label for="amount">Amount</label>
                            <input type="text" id="amount" class="text-warning" name="amount" placeholder="1000" value="<?php echo $_SESSION['total_price'] ?>" readonly>
                            <label for="comment">Your Comments (if any)</label>
                            <input type="text" id="comment" name="comment">
                            <input type="submit" value="Continue to Checkout" name="checkout" class="btn">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Toast -->
        <div class="position-absolute bottom-0 end-0 p-2" style="z-index: 11">
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
    </div>


<?php require_once 'footer.php'; ?>