
<?php
    require_once 'nav-bar.php';
?>
<!-- //header -->

<!DOCTYPE html>
<html>
  <head>
    <title>Volunteer Sign up form</title>
    <link rel="stylesheet" href="assets/css/volunteer.css">
  </head>
  <body>
    <div class="testbox">
      <form action="admin/volunteer-validation.php" method="POST">
        <div class="volunteer-banner">
          <h1>Volunteer Signup</h1>
        </div>
        <br/>
        <p>The HELP Group is seeking volunteers to serve our community. Fill in the information below to indicate how you would like to become involved.</p>
        <br/>
        <div class="colums">
          <div class="item">
            <label for="name">Name<span>*</span></label>
            <input id="name" type="text" name="name" required/>
          </div>
          <div class="item">
            <label for="email">Email Address<span>*</span></label>
            <input id="email" type="text"   name="email" required/>
          </div>
          <div class="item">
            <label for="nid">NID Number<span>*</span></label>
            <input id="nid" type="text"   name="nid" required/>
          </div>
          <div class="item">
            <label for="phone">Phone<span>*</span></label>
            <input id="phone" type="tel"   name="phone" required/>
          </div>
          <div class="item">
            <label for="street">Street<span>*</span></label>
            <input id="street" type="text"   name="street" required/>
          </div>
          <div class="item">
            <label for="city">City<span>*</span></label>
            <input id="city" type="text"   name="city" value="Chattogram" readonly/>
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
