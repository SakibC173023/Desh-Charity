<?php

    session_start();

    require_once ('php/create-db.php');

    $db = new Dbh();
    $db->connect();
?>

<!----Header---->

<?php require_once 'nav-bar.php'; ?>
<link rel="stylesheet" href="assets/css/check-out.css">

<!-----CheckOut------>
    <div class="container-fluid mt-5 pt-5">
        <div class="Checkout">
            <form action="/action_page.php">
                <div class="row">
                    <div class="col-6">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Forhad Uddin">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="abc@example.com">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="20/27 Bashundhara Chittagong">
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="Chittagong">

                        <div class="row">
                            <div class="col-50">
                                <label for="state">Division</label>
                                <input type="text" id="state" name="state" placeholder="Chittagong">
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="text" id="zip" name="zip" placeholder="4200">
                            </div>
                        </div>
                        <input type="checkbox" id="shipping"  name="shipping"> 
                        <label for="shipping">Shipping address same as billing</label>
                        
                    </div>

                    <div class="col-6">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-Checkout">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="Forhad Uddin">
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                        <label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="September">

                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input type="text" id="expyear" name="expyear" placeholder="2022">
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="352">
                            </div>
                        </div>
                        <input type="submit" value="Continue to checkout" class="btn">
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