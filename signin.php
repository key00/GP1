<?php
$active = 'signin';
include("includes/header.php");
?>


<div class="col-md-12 breadcrumb_style">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.php"> Home</a></li>
    <li class="breadcrumb-item active"><a href="signin.php"> Login</a></li>
  </ul>
</div>


<div class="container">
  <form action="signin.php" method="POST" class="login-form">

    <p>
      Don't have an account? <a href="register.php" class="signin-link"> REGISTER HERE </a>
    </p>
    <div class="form-row">
      <p><i class="fa-solid fa-user"></i> Username </p>
      <input class="form-control" type="text" name="username" required />
    </div>
    <div class="form-row mt-3">
      <p><i class="fa-solid fa-lock"></i> Password</p>
      <input class="form-control" type="password" name="password" required />
    </div>
    <center>
      <div class="form-row mt-3">
        <input class="btn btn-secondary" type="submit" name="login" value="LOGIN" />
      </div>
    </center>

  </form>

  <?php
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $user_pass = $_POST['password'];

    $get_user = "select * from users where username='$username' and password='$user_pass'";
    $run_user = mysqli_query($con, $get_user);
    $check_user = mysqli_num_rows($run_user);

    $get_cart = "select * from cart where username='$username'";
    $run_cart = mysqli_query($con, $get_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_user == 0) {
      echo "<h5 class='text-center'> username or password is wrong! </h5>";
    } elseif ($check_user == 1 and $username == 'admin') {
      session_start();
      $_SESSION['username'] = $username;
      echo "<script>alert('Welcome admin')</script>";
      echo "<script>window.open('admin/insert_product.php','_self')</script>";
    } else {
      session_start();
      $_SESSION['username'] = $username;
      echo "<script>alert('Login successful')</script>";
      echo "<script>window.open('shop.php','_self')</script>";
    }
  }
  ?>
</div>

<?php
include("includes/footer.php")
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>

</html>