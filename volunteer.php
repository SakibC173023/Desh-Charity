
<?php
    require_once 'nav-bar.php';
?>
<!-- //header -->

<!-- contact block -->
<section class="contact py-5" id="contact">
    <h1 class="header-agileits agile-info">Volunteer Registration</h1>

    <div class="content">
        <div class="form-layouts">
            <form action="#" method="post">
                <div class="form-control">
                    <label class="header">Name <span>*</span> </label>
                    <input type="text" id="name" name="name" placeholder="Your Name" title="Please enter your Full Name" required="">
                    <div class="clear"></div>
                </div>

                <div class="form-control">
                    <label class="header">Email <span>*</span> </label>
                    <input type="email" id="email" name="email" placeholder="Mail@example.com" title="Please enter a Valid Email Address" required="">
                    <div class="clear"></div>
                </div>

                <div class="form-control">
                    <label class="header">Address <span>*</span> </label>
                    <input type="text" id="bill" name="bill" placeholder="Address" title="Please enter Your Address" required="">
                    <div class="clear"></div>
                </div>
                <div class="form-control">
                    <label class="header">City Area <span>*</span> </label>
                    <input type="email" id="usrtel" name="area" placeholder="Area you belong" title="City Area" required="">
                    <div class="clear"></div>
                </div>
                <div class="form-control">
                    <label class="header">Blood Group <span>*</span> </label>
                    <input type="text" id="usrtel" name="area" placeholder="Your Blood Group" title="Blood group" required="">
                    <div class="clear"></div>
                </div>


                <div class="form-control">
                    <label class="header">NID Number <span>*</span> </label>
                    <input type="tel" id="usrtel" name="usrtel" placeholder="Enter Your NID Number" title="Please enter Your NID Number" required="">
                    <div class="clear"></div>
                </div>
                <div class="form-control">
                    <label class="header">Phone Number <span>*</span> </label>
                    <input type="tel" id="usrtel" name="usrtel" placeholder="Enter Your Phone Number" title="Please enter Your Phone Number" required="">
                    <div class="clear"></div>

                    <div class="form-control">
                        <label class="enquiry">Any comments <span>*</span> </label>
                        <textarea id="message" name="message" placeholder="Your Queries" title="Please enter Your Queries"></textarea>
                        <div class="clear"></div>
                    </div>
                    <div class="form-control">
                        <label class="enquiry">Profile Image <span>*</span></label> <br>
                        <label for="myfile">Select a file:</label>
                        <input type="file" id="myfile" name="myfile"><br>
                    </div>
                    <div class="form-control">
                        <input type="submit" class="register" value="Submit">
                        <div class="clear"></div>
                    </div>
            </form>
        </div>
    </div>

</section>
<!-- map -->

<!-- //contact block -->

<!-- footer block -->
<?php
    require_once 'footer.php';
