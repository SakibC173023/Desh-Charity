
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
    $status = 'Your help request submitted successfully';
    ?>
        <script src="./assets/js/toast.js"></script>
    <?php
}

?>
<!-- //header -->
<link rel="stylesheet" href="assets/css/sponsor.css">

<div class="testbox">
    <form action="admin/helpreq-validation.php" method="POST" enctype="multipart/form-data">
        <br />
        <fieldset>
            <legend>Your information</legend>
            <div class="colums">
                <div class="item">
                    <label class="header">Name <span>*</span> </label>
                    <input type="text" id="name" name="name" placeholder="Your Name"
                           title="Please enter your Full Name" required>
                </div>
                <div class="item">
                    <label class="header">Email <span>*</span> </label>
                    <input type="email" id="email" name="email" placeholder="Mail@example.com"
                           title="Please enter a Valid Email Address" required value="<?php echo $email ?>">
                </div>
                <div class="item">
                    <label class="header">Address</label>
                    <input type="text" id="address" name="street" placeholder="Address"
                           title="Please enter Your Address" required>
                </div>
                <div class="item">
                    <label class="header">Phone Number</label>
                    <input type="tel" id="usrtel" name="phone" placeholder="Your Phone Number"
                           title="Please enter Your Phone Number" required>
                </div>
            </div>
        </fieldset>
        <br />
        <fieldset>
            <legend>Help Request Details</legend>
            <div class="colums">
            </div>
            <div class="item">
                <label class="header">Request Type</label>
                <input type="tel" id="reqType" name="reqType" placeholder="Clothes or Food"
                       title="Please enter Your Amount" required>
            </div>
            <div class="item">
                <label class="header">Tell us a reason so the we can help immediately</label>
                <input type="text" id="reason" name="reason" placeholder="Reason for help"
                       title="Please tell us a reason" required>
            </div>
        </fieldset>
        <div class="btn-block">
            <button type="submit" name="submit">Confirm</button>
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

