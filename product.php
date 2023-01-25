<?php
$active = 'Shop';
include("includes/header.php");
?>

<?php

global $con;
if (isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];
    $get_product = "select * from product where pro_id='$pro_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    $cat_id = $row_product['cat_id'];
    $pro_name = $row_product['pro_name'];
    $pro_price = $row_product['price'];
    $pro_desc = $row_product['description'];
    $pro_img1 = $row_product['product_img1'];
    $pro_img2 = $row_product['product_img2'];
    $get_cat = "select * from categories where cat_id='$cat_id'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_name = $row_cat['cat_name'];
}

?>

<div class="col-md-12 breadcrumb_style">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php"> Home</a></li>
        <li class="breadcrumb-item active"><a href="shop.php"> Shop</a></li>
    </ul>
</div>
<div class="container">
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
            <div class="row">
                <div class="col-md-4 offset-sm-2">
                    <img src="admin/product_image/<?php echo $prod_img1; ?>" alt="">
                </div>
                <div class="col-md-6">
                    <h1><?php echo $prod_name;
                        ?></h1>
                    <h3 class="price"> <?php echo "$ $prod_price";
                                        ?> </h3>
                    <p><?php echo $prod_desc;
                        ?></p>
                    <?php add_to_cart(); ?>
                    <form action="product.php?add_to_cart=<?php echo $pro_id;
                                                            ?>" method="post">
                        <label class="form-label"> Quantity: </label>
                        <input class="form-control" type="number" name="pro_quantity" placeholder="1" min="1" required>

                        <button class="btn btn-secondary mt-3" type="submit"><span><i class="fa-solid fa-cart-shopping"></i></span> Add to cart</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php")
?>
</body>