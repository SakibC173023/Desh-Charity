    
    <!-- Nav-bar Star-->
    <?php 
    include_once 'nav-bar.php';
    ?>
    <!-- Nav-bar End -->


        <!-- contact block -->
    <section class="contact py-5" id="contact">
        <h1 class="header-agileits w3 w3l agile-info">Donation Form</h1>
        <p>
            <?php
                if (isset($_GET['error']) == 'already-submitted')
                {
                    echo "Your donation already submitted";
                }elseif (isset($_GET['value']) == 'success')
                {
                    echo "Donation request sent successfully";
                }
            ?>
        </p>
        <div class="content">
            <div class="form-w3layouts">
                <form action="donation-validation.php" method="POST">
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
                        <input type="text" id="bill" name="address" placeholder="Address" title="Please enter Your Address" required="">
                        <div class="clear"></div>
                    </div>

                    <div class="form-control">
                        <label class="header">Phone Number <span>*</span> </label>
                        <input type="tel" id="usrtel" name="phone" placeholder="Your Phone Number" title="Please enter Your Phone Number" required="">
                        <div class="clear"></div>
                    </div>
                    <div class="form-control">
                        <label class="header">Donation Type <span>*</span> </label>
                        <input type="tel" id="usrtel" name="dType" placeholder="Clothes or Food" title="Please enter Your Amount" required="">
                        <div class="clear"></div>
                    </div>
                    <div class="form-control">
                        <label class="enquiry">Donation comments <span>*</span> </label>
                        <textarea id="message" name="comments" placeholder="Your Queries" title="Please enter Your Queries"></textarea>
                        <div class="clear"></div>
                    </div>
                    <div class="form-control">
                        <label class="enquiry">Product Image <span>*</span></label> <br>
                        <label for="myfile">Select a file:</label>
                        <input type="file" id="myfile" name="file"><br>
                    </div>

                    <div class="form-control">
                        <input type="submit" name="submit" class="register" value="Send">
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
        </div>

    </section>
        <!-- //contact block -->

         <!-- footer block start-->
         <?php
            require_once 'footer.php';
        ?>
        <!-- footer block end-->

        