<?php $active = 'Home';
include("includes/header.php"); ?>

<!-- hero section start -->
<div class="hero ">
  <div class="row">
    <div class="heading-section col-lg-6 offset-md-1">
      <h3 class="hero-heading">

        SHOP FROM ANYWHERE ANYTIME WITH US

      </h3>
      <p>
        Discover our products as you browse from the comfort of your device
      </p>
      <a href="shop.php" class="btn btn-secondary cto mt-2">Shop Now</a>
    </div>

    </di>
  </div>
</div>
<!-- hero section end -->

<!-- users favorites start-->
<section class="userfavorite">
  <div class="container ">
    <h2 class="titles">Users Favorites</h2>
    <div class="row">

      <?php
      getProducts();
      ?>

    </div>
  </div>
</section>

<!-- users favorites end -->

<!-- about section start -->
<h2 class="titles">why shop with us?</h2>
<div class="container" id="about">

  <div class="row">
    <div class="about-section col-lg-4">
      <span class=icon><i class="fa-solid fa-truck-fast"></i></span>
      <h4>Free shipping</h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      </p>

    </div>
    <div class="about-section col-lg-4">
      <span class=icon><i class="fa-solid fa-map-pin"></i></span>
      <h4>Best deals</h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      </p>
    </div>
    <div class="about-section col-lg-4">
      <span class=icon><i class="fa-solid fa-credit-card"></i></span>
      <h4>Secure payments</h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      </p>
    </div>
  </div>
</div>
<!-- about section end -->
<?php
include("includes/footer.php")
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>

</html>