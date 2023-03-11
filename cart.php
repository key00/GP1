<?php $active = 'cart';

include("includes/header.php"); ?>

<div class="col-md-12 breadcrumb_style">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php"> Home</a></li>
        <li class="breadcrumb-item active"><a href="cart.php"> cart</a></li>
    </ul>
</div>


<h1 class="titles">shopping cart</h1>

<div class="container">
    <form action="cart.php" method="post" enctype="multipart/form-data">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Remove</th>
                    <th></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['username'])) {
                    $user = $_SESSION['username'];
                    $get_cart = "select * from cart where username='$user'";
                    $run_cart = mysqli_query($db, $get_cart);
                    $count = mysqli_num_rows($run_cart);
                    echo "<p class='text-center'>You currently have $count item(s) in your cart</p>  ";

                    $total = 0;
                    while ($row_cart = mysqli_fetch_array($run_cart)) {
                        $pro_id = $row_cart['p_id'];
                        $product_qty = $row_cart['quantity'];
                        $get_products = "select * from product where pro_id='$pro_id'";
                        $run_products = mysqli_query($con, $get_products);

                        while ($row_products = mysqli_fetch_array($run_products)) {
                            $pro_name = $row_products['pro_name'];
                            $pro_price = $row_products['price'];
                            $pro_img = $row_products['product_img1'];
                            $new_price = $row_products['price'] * 0.9;
                            if ($product_qty >= 5) {
                                $subtotal = ($row_products['price'] * 0.9) * $product_qty;
                            } else {
                                $subtotal = $row_products['price'] * $product_qty;
                            }

                            $total += $subtotal;

                ?>

                            <tr>
                                <td> <input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"> </td>
                                <td><img class="img-responsive" src="admin/product_image/<?php echo $pro_img ?>" alt="" height="80" width="80"></td>
                                <td> <a href="product.php?pro_id=<?php echo $pro_id ?>"> <?php echo $pro_name ?></a> </td>
                                <td> <?php if ($product_qty >= 5) {
                                            echo "
                                    <s class='pe-2'>$ $pro_price</s>   $ $new_price
                                    ";
                                        } else echo "$ $pro_price"; ?> </td>
                                <td> <?php echo $product_qty ?> </td>
                                <td> <?php if ($product_qty >= 5) echo "10%";
                                        else echo "0%"; ?> </td>
                                <td> <?php echo "$ $subtotal"; ?> </td>
                            </tr>
                    <?php
                        }
                    }

                    ?>

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">Total</th>
                    <th><?php echo "$ $total "; ?></th>
                </tr>
            </tfoot>
        <?php

                } else echo "<p class='text-center'>You currently have no items in your cart</p>  ";
        ?>
        </table>
        <div class="end-table">
            <a class="btn btn-secondary" href="shop.php"><span class="me-2"><i class="fa-solid fa-circle-arrow-left"></i></span>Continue Shopping</a>
            <button type="submit" name="update" class="btn btn-secondary"><span class="me-2"><i class="fa-solid fa-arrows-rotate"></i></span>Update your cart</button>
        </div>
    </form>
</div>

<?php
function update_cart()
{
    global $con;

    if (isset($_POST['update'])) {

        foreach ($_POST['remove'] as $remove_id) {
            $delete_product = "delete from cart where p_id='$remove_id'";
            $run_delete = mysqli_query($con, $delete_product);

            if ($run_delete) {
                echo "<script> alert('Product(s) deleted')</script>";
                echo "<script> window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo @$up_cart = update_cart();

?>

<?php include("includes/footer.php"); ?>