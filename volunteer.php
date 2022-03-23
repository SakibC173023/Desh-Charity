
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
      <form action="/">
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
            <label for="eaddress">Email Address<span>*</span></label>
            <input id="eaddress" type="text"   name="eaddress" required/>
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
            <input id="city" type="text"   name="city" required/>
          </div>
          <div class="item">
            <label for="state">State<span>*</span></label>
            <input id="state" type="text"   name="state" required/>
          </div>
          <div class="item">
            <label for="zip">Zip<span>*</span></label>
            <input id="zip" type="text"   name="zip" required/>
          </div>
        </div>
        <div class="btn-block">
          <button type="submit" href="/">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>

<!-- footer block -->
<?php
    require_once 'footer.php';
