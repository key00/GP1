<?php
session_start();
include("../includes/db.php")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Insertion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <div class="col-md-12 breadcrumb_style">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="../home.php"> Home</a></li>
            <li class="breadcrumb-item active"><a href="#"> Insert Products</a></li>
        </ul>
    </div>
    <div class="container">
        <h4 class="titles">
            Product Management
            <span><?php
                    if (isset($_SESSION['username'])) {

                        echo "
                            <a href='../logout.php' class='btn btn-secondary ms-4'>LOGOUT</a>";
                    }
                    ?>
            </span>
        </h4>
        <form action="" method="post" class="login-form" enctype="multipart/form-data">
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Product Name</label>
                <input class="form-control" type="text" name="product_name" id="">
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Product image 1</label>
                <input class="form-control" type="file" name="product_img1" id="">
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Product image 2</label>
                <input class="form-control" type="file" name="product_img2" id="">
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" type="text" name="product_desc" id=""></textarea>
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Price</label>
                <input class="form-control" type="text" name="product_price" id="">
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Category</label>
                <select class="form-select" type="text" name="category" id="">
                    <option value="" selected>Select a category</option>

                    <?php

                    $get_cat = "select * from categories";
                    $run_cat = mysqli_query($con, $get_cat);

                    while ($row_cat = mysqli_fetch_array($run_cat)) {

                        $cat_id = $row_cat['cat_id'];
                        $cat_name = $row_cat['cat_name'];

                        echo "
                                  
                                  <option value='$cat_id'> $cat_name </option>
                                  
                                  ";
                    }

                    ?>
                </select>
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Keywords</label>
                <input class="form-control" type="text" name="keywords" id="">
            </div>
            <center>
                <div class="col-md-12 form-grou mt-3">
                    <input name="submit" type="submit" class="btn btn-secondary" value="Add product">
                </div>
            </center>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        })
    </script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['category'];
    $product_keywords = $_POST['keywords'];
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];

    move_uploaded_file($temp_name1, "product_image/$product_img1");
    move_uploaded_file($temp_name2, "product_image/$product_img2");

    $insert_product = "insert into product (pro_name,product_img1,product_img2,description,price,cat_id,date,keywords) values ('$product_name','$product_img1','$product_img2','$product_desc','$product_price','$product_category',NOW(),'$product_keywords')";
    $run_product = mysqli_query($con, $insert_product);
    if ($run_product) {
        echo "<script>alert('Product added!')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";
    }
}
?>