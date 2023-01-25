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

<!-- categories start-->
<div class="container categories">
  <h3 class="titles">Our categories</h3>
  <div class="row">
    <div class="col-md-3">
      <div class="cat-box">
        <h4 class="cat-title">Apparel</h4>
        <p class="text-center">Find your finest apparel, for every season</p>
        <center><a href="shop.php?cat=1" class="btn btn-primary"> Browse</a></center>
      </div>
    </div>
    <div class="col-md-3">
      <div class="cat-box">
        <h4 class="cat-title">Shoes</h4>
        <p class="text-center">For everystyle you want, from sneakers to high heels</p>
        <center><a href="shop.php?cat=2" class="btn btn-primary"> Browse</a></center>
      </div>
    </div>
    <div class="col-md-3">
      <div class="cat-box">
        <h4 class="cat-title">Accessories</h4>
        <p class="text-center">Find everything you need to accessorize your outfits</p>
        <center><a href="shop.php?cat=3" class="btn btn-primary"> Browse</a></center>
      </div>
    </div>
    <div class="col-md-3">
      <div class="cat-box">
        <h4 class="cat-title">Cosmetics</h4>
        <p class="text-center">From cleanser to foundation, we've got you covered</p>
        <center><a href="shop.php?cat=4" class="btn btn-primary"> Browse</a></center>
      </div>
    </div>
  </div>
</div>

<!-- categories end -->

<!-- users favorites start-->
<section class="userfavorite">
  <div class="container ">
    <h3 class="titles">Users Favorites</h3>
    <div class="row">

      <?php
      getProducts();
      ?>

    </div>
  </div>
</section>

<!-- users favorites end -->

<!-- about section start -->
<h3 class="titles">why shop with us?</h3>
<div class="container" id="about">

  <div class="row">
    <div class="about-section col-lg-4">
      <span class=icon><i class="fa-solid fa-truck-fast"></i></span>
      <h4>Free shipping</h4>
      <p>
        Wherever you are , all around the world <br> We will get your products to you free of charge
      </p>

    </div>
    <div class="about-section col-lg-4">
      <span class=icon><i class="fa-solid fa-map-pin"></i></span>
      <h4>Best deals</h4>
      <p>
        Buy more and pay less <br>
        Buy 5 or more products and get a 10% discount
      </p>
    </div>
    <div class="about-section col-lg-4">
      <span class=icon><i class="fa-solid fa-credit-card"></i></span>
      <h4>Secure payments</h4>
      <p>
        Never worry about your information confidentiality <br> We care about our customers privacy
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