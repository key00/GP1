<form action="" method="post" class="login-form">
    <h4 class="titles">Edit my account info</h4>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="fname"> First Name: </label>
            <input class="form-control" type="text" name="fname" placeholder="First Name" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="lname"> Last Name: </label>
            <input class="form-control" type="text" name="lname" placeholder="Last Name" required />
        </div>
    </div>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="uname"> Username:</label>
            <input class="form-control" type="text" name="uname" placeholder="User Name" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="password"> Password: </label>
            <input class="form-control" type="password" name="password" placeholder="Password" required />
        </div>

    </div>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="email"> Email: </label>
            <input class="form-control" type="email" name="email" placeholder="Email" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="telephone"> Your phone number: </label>
            <input class="form-control" type="tel" name="telephone" placeholder="Your phone number" required />
        </div>
    </div>
    <div class="row form-row mt-3">
        <div class="col-md-6">
            <label class="form-label" for="country"> Country: </label>
            <input class="form-control" type="text" name="country" placeholder="Country" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="address"> Address: </label>
            <input class="form-control" type="text" name="address" placeholder="Address" required />
        </div>
    </div>
    <center><button type="submit" name="submit" class="btn btn-secondary mt-3">
            <span class="me-2"><i class="fa-solid fa-circle-check"></i></span> UPDATE
        </button></center>
</form>