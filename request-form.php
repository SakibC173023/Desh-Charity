
<?php
require_once 'nav-bar.php';
?>
<!-- //header -->

<!DOCTYPE html>
<html lang="">
<head>
    <title>Request Form</title>
    <link rel="stylesheet" href="assets/css/sponsor.css">
</head>
<body>
<div class="testbox">
    <form action="admin/donation-validation.php" method="POST" enctype="multipart/form-data">

        <br />
        <fieldset>
            <legend>Your Information</legend>
            <div class="colums">
                <div class="item">
                    <label class="header">Name <span>*</span> </label>
                    <input type="text" id="name" name="name" placeholder="Your Name"
                           title="Please enter your Full Name" required>
                </div>
                <div class="item">
                    <label class="header">Email <span>*</span> </label>
                    <input type="email" id="email" name="email" placeholder="Mail@example.com"
                           title="Please enter a Valid Email Address" required>
                </div>
                <div class="item">
                    <label class="header">Address</label>
                    <input type="text" id="bill" name="address" placeholder="Address"
                           title="Please enter Your Address" required>
                </div>
                <div class="item">
                    <label class="header">Phone Number</label>
                    <input type="tel" id="usrtel" name="phone" placeholder="Your Phone Number"
                           title="Please enter Your Phone Number" required>
                </div>
        </fieldset>
        <br />
        <fieldset>
            <legend>Donation Request Details</legend>
            <div class="colums">
            </div>
            <div class="item">
                <label class="header">Donation Request Type</label>
                <input type="tel" id="usrtel" name="dType" placeholder="Clothes or Food"
                       title="Please enter Your Amount" required>
            </div>
            <div class="item">
                <label class="header">Donation Address</label>
                <input type="text" id="bill" name="address" placeholder="Address"
                       title="Please enter Your Address" required>
            </div>

            <div class="item">
                <label class="enquiry">Scenery Image <span>*</span></label> <br>
                <label for="myfile">Select a file:</label>
                <input type="file" id="myfile" name="image"><br>
            </div>
        </fieldset>
        <div class="btn-block">
            <button type="submit" name="submit">Confirm</button>
        </div>
    </form>
</div>
</body>
</html>

<!-- footer block -->
<?php
require_once 'footer.php';

