<?php
include("includes/db.php");

function check_username($username)
{
    global $con;
    $username = $_POST['username'];
    $check = "select * from users where username='$username'";
    $run_check = mysqli_query($con, $check);
    if (mysqli_num_rows($run_check) > 0) {
        return "Username already taken";
    } else return "Username available";
}

if (isset($_POST['action']) && $_POST['action'] == 'check_username') {
    echo check_username($_POST['username']);
    exit();
}
?>

<?php
function check_email($email)
{
    global $con;
    $email = $_POST['email'];
    $check = "select * from users where email='$email'";
    $run_check = mysqli_query($con, $check);
    if (mysqli_num_rows($run_check) > 0) {
        return "Email already used";
    } else return "Email available";
}
if (isset($_POST['action']) && $_POST['action'] == 'check_email') {
    echo check_email($_POST['email']);
    exit();
}
?>
