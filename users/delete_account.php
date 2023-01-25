<form action="" method="post" class="login-form">
    <h3 class="titles">do you really want to delete your account?</h3>


    <center class="mt-3 pt-3">
        <input type="submit" name="yes" value="Yes, I do" class="btn btn-primary">
        <input type="submit" name="no" value="No, I don't" class="btn btn-secondary">
    </center>
</form>

<?php
global $con;
if (isset($_POST['yes'])) {
    $user = $_SESSION['username'];
    $delete_user = "delete from users where username='$user'";
    $run_delete = mysqli_query($con, $delete_user);
    session_destroy();
    if ($run_delete) {
        echo "<script>alert ('Account deleted')</script>";
        echo "<script>window.open('../home.php','_self')</script>";
    }
} elseif (isset($_POST['no'])) {
    echo "<script>alert('Welcome back')</script>";
    echo "<script>window.open('../shop.php','_self')</script>";
}
?>