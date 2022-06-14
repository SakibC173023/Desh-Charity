
<?php
require_once 'nav-bar.php';
?>
<!-- //header -->

<!DOCTYPE html>
<html lang="">
<head>
    <title>Sponsor A Child Form</title>
    <link rel="stylesheet" href="assets/css/sponsor.css">
</head>
<body>
<div class="testbox">
    <form action="admin/volunteer-validation.php" method="POST">
        <div class="volunteer-banner">
        </div>
        <br/>
        <h4 style="text-align: center">Your monthly donation will provide a child in need with tools for a better education.</h4>
        <br/>
        <div class="colums">
            <div class="item">
                <label for="name">First Name<span>*</span></label>
                <input id="name" type="text" name="name" required/>
            </div>
            <div class="item">
                <label for="name">Last Name<span>*</span></label>
                <input id="name" type="text" name="name" required/>
            </div>
            <div class="item">
                <label for="email">Email Address<span>*</span></label>
                <input id="email" type="text"   name="email" required/>
            </div>

            <div class="item">
                <label for="phone">Phone<span>*</span></label>
                <input id="phone" type="tel"   name="phone" required/>
            </div>
            <div class="item">
                <label for="street">Country<span>*</span></label>
                <input id="street" type="text"   name="country" required/>
            </div>
            <div class="item">
                <label for="city">Address<span>*</span></label>
                <input id="city" type="text"   name="city"  readonly/>
            </div>
        </div>
        <div class="btn-block">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>

<!-- footer block -->
<?php
require_once 'footer.php';
