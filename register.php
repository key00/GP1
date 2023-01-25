<?php
$active = 'register';
include("includes/db.php");
?>
<?php include("includes/header.php"); ?>


<div class="col-md-12 breadcrumb_style">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.php"> Home</a></li>
    <li class="breadcrumb-item active"><a href="register.php"> Register</a></li>
  </ul>
</div>

<!-- section form start -->
<section class="container">
  <form action="register.php" method="post" id="register" class="login-form">

    <p>Already have an account? <a href="signin.php" class="signin-link">SIGN IN</a></p>
    <div class="row form-row mt-3">
      <div class="col-md-6">
        <label for="fname"> First Name </label>
        <input class="form-control" type="text" name="fname" placeholder="First Name" required />
      </div>
      <div class="col-md-6">
        <label for="lname"> Last Name </label>
        <input class="form-control" type="text" name="lname" placeholder="Last Name" required />
      </div>
    </div>
    <div class="row form-row mt-3">
      <div class="col-md-6">
        <label for="username"> Username</label>
        <input class="form-control" type="text" name="username" id="username" placeholder="User Name" required />
        <i>
          <p id="check_username"></p>
        </i>
      </div>
      <div class="col-md-6">
        <label for="password"> Password </label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required />
        <i>
          <p id="check_password"></p>
        </i>
      </div>

    </div>
    <div class="row form-row mt-3">
      <div class="col-md-6">
        <label for="email"> Email </label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Email" required />
        <i>
          <p id="check_email"></p>
        </i>
      </div>
      <div class="col-md-6">
        <label for="telephone"> Your phone number </label>
        <input type="hidden" name="dialCode" id="dialCode">
        <input class="form-control" type="text" name="telephone[main]" id="phone_number" placeholder="Your phone number" required />
      </div>
    </div>
    <div class="row form-row mt-3">
      <div class="col-md-6">
        <label for="country"> Country </label>
        <select class="form-select" name="country" id="country" required>

        </select>
      </div>
      <div class="col-md-6">
        <label for="address"> City </label>
        <select class="form-select" name="city" id="city" required>
          <option value="0">select country first</option>
        </select>
      </div>
    </div>
    <div class="row form-row mt-3">
      <div class="col-md-6">
        <label for="country"> Street address </label>
        <input class="form-control" type="text" name="street" placeholder="Street address" required />
      </div>
      <div class="col-md-6">
        <label for="address"> Postal Code </label>
        <input class="form-control" type="text" name="pcode" pattern="[0-9]+" placeholder="Postal Code" required />
      </div>
    </div>
    <center>
      <div class="form-row pt-4">
        <input type="submit" name="register" value="Register" class="btn btn-secondary" />
      </div>
    </center>

  </form>
</section>
<!-- section form end -->

<?php
include("includes/footer.php")
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="main.js"></script>


<?php


if (isset($_POST['register'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $uemail = $_POST['email'];
  $upassword = $_POST['password'];
  $phone = $_POST['telephone']['full'];
  $ucountry = $_POST['country'];
  $ucity = $_POST['city'];
  $ustreet = $_POST['street'];
  $p_code = $_POST['pcode'];

  $insert_user = "insert into users (first_name,last_name,username,password,email,phone_number,country,city,street,postal_code,register_date) values
  ('$fname','$lname','$username','$upassword','$uemail','$phone','$ucountry','$ucity','$ustreet','$p_code',NOW())";
  $run_user = mysqli_query($con, $insert_user);

  $to = $_POST['email'];
  $subject = "Registration Complete";
  $message = "Thank you for registering on our website. \n \n Your username: $username \n Your password: $upassword";

  mail($to, $subject, $message);

  echo "<script>alert('You have been registered successfully!') </script>";
  echo "<script>window.open('signin.php','_self')</script>";
}

?>

</body>

</html>