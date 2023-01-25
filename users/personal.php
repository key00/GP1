<?php $active = 'personal';

include("includes/header.php");

?>

<div class="col-md-12 breadcrumb_style">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="../home.php"> Home</a></li>
        <li class="breadcrumb-item active"><a href="../users/personal.php"> My account</a></li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3 box sidemenu">
            <ul class="">

                <li class="<?php if (isset($_GET['account_info'])) {
                                echo "active";
                            } ?>">
                    <a href="personal.php?account_info">
                        <i class="fa-solid fa-user"></i> Personal infos
                    </a>
                </li>
                <li class="<?php if (isset($_GET['my_orders'])) {
                                echo "active";
                            } ?>">
                    <a href="personal.php?my_orders">
                        <i class="fa-solid fa-list"></i> My Orders
                    </a>
                </li>

                <!-- <li class="<?php if (isset($_GET['edit_account'])) {
                                    echo "active";
                                } ?>">
                    <a href="personal.php?edit_account">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Account
                    </a>
                </li> -->

                <!-- <li class="<?php if (isset($_GET['change_pass'])) {
                                    echo "active";
                                } ?>">
                    <a href="personal.php?change_pass">
                        <i class="fa fa-user"></i> Change Password
                    </a>
                </li> -->

                <li class="<?php if (isset($_GET['delete_account'])) {
                                echo "active";
                            } ?>">
                    <a href="personal.php?delete_account">
                        <i class="fa-solid fa-user-xmark"></i> Delete Account
                    </a>
                </li>

                <li>

                    <a href="../logout.php">

                        <i class="fa-solid fa-right-from-bracket"></i> Log Out

                    </a>

                </li>

            </ul>

        </div>

        <div class="col-md-9">

            <?php
            if (isset($_GET['account_info'])) {
                include("account_info.php");
            }
            if (isset($_GET['my_orders'])) {
                include("my_orders.php");
            }

            if (isset($_GET['edit_account'])) {
                include("edit_account.php");
            }

            if (isset($_GET['change_pass'])) {
                include("change_pass.php");
            }

            if (isset($_GET['delete_account'])) {
                include("delete_account.php");
            }

            ?>

        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>