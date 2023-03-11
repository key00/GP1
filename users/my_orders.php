<div class="container">
    <h3 class="text-center">Your order summary</h3>

    <table class="table table-reponsive mt-3">
        <thead>
            <th></th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>

        </thead>
        <tbody>
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

                            <td><img class="img-responsive" src="../admin/product_image/<?php echo $pro_img ?>" alt="" height="80" width="80"></td>
                            <td> <a href="../product.php?pro_id=<?php echo $pro_id ?>"> <?php echo $pro_name ?></a> </td>
                            <td> <?php if ($product_qty >= 5) {
                                        echo "
                                    <s class='pe-2'>$ $pro_price</s>   $ $new_price
                                    ";
                                    } else echo "$ $pro_price"; ?> </td>
                            <td> <?php echo $product_qty ?> </td>
                            <td> <?php echo "$ $subtotal"; ?> </td>
                        </tr>
                <?php
                    }
                }
                ?>

        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th><?php echo "$ $total "; ?></th>
            </tr>
        </tfoot>
    <?php

            } else echo "<p class='text-center'>You currently have no items in your cart</p>  ";
    ?>
    </table>


</div>