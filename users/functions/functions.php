<?php
$db = mysqli_connect("localhost", "root", "", "we-shop");

function getProducts()
{
    global $db;
    $get_product = " select * from product order by rand() limit 0,6";
    $run_product = mysqli_query($db, $get_product);
    while ($row_product = mysqli_fetch_array($run_product)) {
        $pro_id = $row_product['pro_id'];
        $pro_name = $row_product['pro_name'];
        $pro_price = $row_product['price'];
        $pro_img1 = $row_product['product_img1'];

        echo "
        <div class='col-sm-12 col-md-6 col-lg-3'>
            <div class='card' style='width: 15rem;'>
            <a href='product.php?pro_id=$pro_id'>
            <img src='../admin/product_image/$pro_img1' class='card-img-top' alt='' width='222' height='222'>
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
}

function getCategory()
{
    global $db;
    $get_cat = "select * from categories";
    $run_cat = mysqli_query($db, $get_cat);
    while ($row_cat = mysqli_fetch_array($run_cat)) {
        $cat_id = $row_cat['cat_id'];
        $cat_name = $row_cat['cat_name'];

        echo "
            <li> <a href='../shop.php?cat=$cat_id'> $cat_name </a></li>
        ";
    }
}

function product_per_category()
{
    global $db;

    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        $get_cat = "select * from categories where cat_id='$cat_id'";
        $run_cat = mysqli_query($db, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_id = $row_cat['cat_id'];
        $cat_name = $row_cat['cat_name'];
        $get_products = "select * from product where cat_id='$cat_id'";
        $run_products = mysqli_query($db, $get_products);
        $count = mysqli_num_rows($run_products);
        if ($count == 0) {
            echo "
                <div class='text-center'>
                <h3> $cat_name</h3>
                
                </div>
                <div class=' text-center pt-4'>
                    <h5> No products found in this category</h5>
                </div>
            ";
        } else {
            echo "
                <div class=' text-center'>
                    <h3> $cat_name</h3>
                    
                </div>
            ";
        }
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
    }
}
function add_to_cart()
{
    global $db;
    if (isset($_SESSION['username'])) {
        if (isset($_GET['add_to_cart'])) {
            $user = $_SESSION['username'];
            $p_id = $_GET['add_to_cart'];
            $quantity = $_POST['pro_quantity'];
            $check_product = " select * from cart where p_id=$p_id ";
            $run_check = mysqli_query($db, $check_product);

            if (mysqli_num_rows($run_check) > 0) {

                echo "<script>alert(Already in cart!)</script>";
                echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
            } else {

                $query = "insert into cart (username,p_id,quantity) values ('$user',' $p_id ',' $quantity ')";
                $run_query = mysqli_query($db, $query);
                echo "<script>window.open(' cart.php',' _self ')</script>";
            }
        }
    }
}

function cart_items()
{
    global $db;

    if (isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $get_items = "select * from cart where username='$user'";
        $run_items = mysqli_query($db, $get_items);
        $count_items = mysqli_num_rows($run_items);
        echo $count_items;
    }
}
