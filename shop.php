<?php $active = 'Shop';
if (!isset($_SESSION['username'])) {

    include("includes/header.php");
} else include("users/includes/header.php");
include("includes/db.php");

?>

<div class="col-md-12 breadcrumb_style">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php"> Home</a></li>
        <li class="breadcrumb-item active"><a href="shop.php"> Shop</a></li>
    </ul>
</div>
<div class="shop">
    <h2 class='text-center box'>Welcome to WE-SHOP</h2>
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

                <?php product_per_category(); ?>

                <?php
                if (!isset($_GET['cat'])) {
                    $per_page = 8;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $start_from = ($page - 1) * $per_page;
                    $get_products = "select * from product order by rand() DESC LIMIT $start_from, $per_page";
                    $run_products = mysqli_query($con, $get_products);

                    while ($row_product = mysqli_fetch_array($run_products)) {
                        $pro_id = $row_product['pro_id'];
                        $pro_name = $row_product['pro_name'];
                        $pro_price = $row_product['price'];
                        $pro_img1 = $row_product['product_img1'];

                        echo "
                                <div class='col-sm-12 col-md-6 col-lg-3'>
                                    <div class='card' style='width: 15rem;'>
                                        <a href='product.php?pro_id=$pro_id'>
                                        <img src='admin/product_image/$pro_img1' class='card-img-top' alt='' width='222' height='222'>
                                        </a>
                                        <div class='card-body'>
                                        <a href='product.php?pro_id=$pro_id'>
                                        <h5 class='card-title'>$pro_name</h5>
                                        <p class='card-text'>$ $pro_price</p>
                                        <a href='product.php?pro_id=$pro_id' class='btn btn-secondary'> View more </a>
                                        <a href='product.php?pro_id=$pro_id' class='btn btn-primary'> <i class='fa-solid fa-cart-shopping'></i> Buy </a>
                                        </div>
                                    </div>
                                </div>
                                ";
                    }


                ?>

            </div>

            <ul class="pagination mt-3">

            <?php
                    $query = "select * from product";
                    $result = mysqli_query($con, $query);
                    $total_records = mysqli_num_rows($result);
                    $total_pages = ceil($total_records / $per_page);
                    echo "<li class='page-item'><a href='shop.php?page=1' class='page-link'>" . 'First' . "</a></li>";
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item'><a href='shop.php?page=$i' class='page-link'>$i</a></li>";
                    };
                    echo "<li class='page-item'><a href='shop.php?page=$total_pages' class='page-link'>" . 'Last' . "</a></li>";
                }
            ?>

            </ul>

        </div>
    </div>
</div>
</div>


<?php
include("includes/footer.php")
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>

</html>