<?php
    session_start();
    require_once 'nav-bar.php';

    $email = '';
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
    }
?>

    <link rel="stylesheet" href="assets/css/donation.css">

    <div class="testbox mt-5 pt-5">
        <form class="my-5 donation-form" action="admin/donation-validation.php" method="POST" enctype="multipart/form-data">
            <div class="donation-banner">
                <h1>Donate Now</h1>
            </div>
            <br />
            <fieldset>
                <legend>Donation Form</legend>
                <div class="colums">
                    <div class="item">
                        <label class="header">Name <span>*</span> </label>
                        <input class="donation-input" type="text" id="name" name="name" placeholder="Your Name"
                            title="Please enter your Full Name" required>
                    </div>
                    <div class="item">
                        <label class="header">Email <span>*</span> </label>
                        <input class="donation-input" type="email" id="email" name="email" placeholder="Your Email"
                            title="Please enter a Valid Email Address" value="<?php echo $email?>" required>
                    </div>
                    <div class="item">
                        <label class="header">Address</label>
                        <input class="donation-input" type="text" id="bill" name="address" placeholder="Address"
                            title="Please enter Your Address" required>
                    </div>
                    <div class="item">
                        <label class="header">Phone Number</label>
                        <input class="donation-input" type="tel" id="usrtel" name="phone" placeholder="Your Phone Number"
                            title="Please enter Your Phone Number" required>
                    </div>
            </fieldset>
            <br />
            <fieldset>
                <legend>Donation Details</legend>
                <div class="colums">
                </div>
                <div class="item">
                    <label class="header">Donation Type</label>
                    <input class="donation-input" type="tel" id="usrtel" name="dType" placeholder="Clothes or Food"
                        title="Please enter Your Amount" required>
                </div>
                <div class="item">
                    <label class="enquiry">Donation comments</label>
                    <textarea id="message" name="comments" placeholder="Your Queries"
                        title="Please enter Your Queries"></textarea>
                </div>
                <div class="item">
                    <label class="enquiry">Product Image <span>*</span></label> <br>
                    <label for="myfile">Select a file:</label>
                    <input class="donation-input" type="file" id="myfile" name="image"><br>
                </div>
            </fieldset>
            <div class="btn-block">
                <button type="submit" name="submit">Confirm</button>
            </div>
        </form>
    </div>

<!-- footer block -->
<?php
    require_once 'footer.php';