<!-- instead of check out page just redirect to personal page where it show items in cart -->
<?php include("includes/header.php");
?>

<div class="col-md-12 breadcrumb_style">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php"> Home</a></li>
        <li class="breadcrumb-item active"><a href="checkout.php"> Check-out</a></li>
    </ul>
</div>
<div class="shop">
    <!-- <h2 class='text-center box'>Welcome to WE-SHOP</h2> -->
    <div class="row gx-0">
        <div class="col-md-3 sidebar box">
            <h2 class="heading text-center">Categories</h2>
            <ul class="quick-links">
                <?php
                getCategory();
                ?>
            </ul>
        </div>

        <div class="col-md-9 ps-1">
            <?php
            if (!isset($_SESSION['username'])) {
                include("users/signin.php");
            } else {
                include("users/personal.php");
            }
            ?>
        </div>

    </div>
</div>
<?php include("includes/footer.php"); ?>