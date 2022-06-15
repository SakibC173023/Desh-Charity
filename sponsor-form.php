<?php
session_start();
require_once 'nav-bar.php';

$email = '';
if($_SESSION['email']){
    $email = $_SESSION['email'];
}

if(isset($_GET['error'])){
    $status = 'Login required';
    ?>
        <script src="./assets/js/toast.js"></script>
    <?php
}
elseif(isset($_GET['status'])){
    $status = 'Your sponsorship request submitted successfully';
    ?>
        <script src="./assets/js/toast.js"></script>
    <?php
}

?>
<!-- //header -->
<link rel="stylesheet" href="assets/css/sponsor.css">

<div class="testbox">
    <form action="admin/sponsor-validation.php" method="POST">
        <div class="volunteer-banner">
        </div>
        <br/>
        <h4 style="text-align: center">Your monthly donation will provide a child in need with tools for a better education.</h4>
        <br/>
        <div class="colums">
            <div class="item">
                <label for="fname">First Name<span>*</span></label>
                <input id="fname" type="text" name="fname" required/>
            </div>
            <div class="item">
                <label for="lname">Last Name<span>*</span></label>
                <input id="lname" type="text" name="lname" required/>
            </div>
            <div class="item">
                <label for="email">Email Address<span>*</span></label>
                <input id="email" type="email"  name="email" required value="<?php echo $email ?>"/>
            </div>

            <div class="item">
                <label for="phone">Phone<span>*</span></label>
                <input id="phone" type="tel" name="phone" required/>
            </div>
            <div class="item">
                <label for="street">Address<span>*</span></label>
                <input id="street" type="text" name="street" required/>
            </div>
            <div class="item">
                <label for="comment">Comment (if any)<span></span></label>
                <input id="comment" type="text"  name="comment"/>
            </div>
        </div>
        <div class="btn-block">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>

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
<!-- footer block -->
<?php
require_once 'footer.php';
