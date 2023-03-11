<?php
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $get_user = "select * from users where username='$user'";
    $run_user = mysqli_query($con, $get_user);
    while ($row_user = mysqli_fetch_array($run_user)) {
        $first = $row_user['first_name'];
        $last = $row_user['last_name'];
        $username = $row_user['username'];
        $email = $row_user['email'];
        $phone = $row_user['phone_number'];
        $country = $row_user['country'];
        $city = $row_user['city'];
        $street = $row_user['street'];
        $postalcode = $row_user['postal_code'];
        $date = $row_user['register_date'];
    }
}
?>
<div class="container login-form">
    <h4 class="titles">Personal informations</h4>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="fname"> First Name: </label>
            <h5><?php echo $first; ?></h5>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="lname"> Last Name: </label>
            <h5><?php echo $last; ?></h5>
        </div>
    </div>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="uname"> Username:</label>
            <h5><?php echo $username; ?></h5>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="uname"> Registered on:</label>
            <h5><?php echo $date; ?></h5>
        </div>

    </div>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="email"> Email: </label>
            <h5><?php echo $email; ?></h5>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="telephone"> Your phone number: </label>
            <h5><?php echo $phone; ?></h5>
        </div>
    </div>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="country"> Country: </label>
            <h5><?php echo $country; ?></h5>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="address"> City: </label>
            <h5><?php echo $city; ?></h5>
        </div>
    </div>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="country"> Street address: </label>
            <h5><?php echo $street; ?></h5>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="address"> Postal Code: </label>
            <h5><?php echo $postalcode; ?></h5>
        </div>
    </div>
</div>