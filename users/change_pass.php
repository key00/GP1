<form action="" method="post" class="login-form">
    <h4 class="titles">Edit password</h4>

    <div class="mt-3">
        <div class="col-md-8">
            <label class="form-label" for="password">Your Old Password: </label>
            <input class="form-control" type="password" name="old_password" placeholder="Password" required />
        </div>
        <div class="col-md-8 mt-3">
            <label class="form-label" for="password">Your New Password: </label>
            <input class="form-control" type="password" name="new_password" placeholder="Password" required />
        </div>
        <div class="col-md-8 mt-3">
            <label class="form-label" for="password">Confirm your New Password: </label>
            <input class="form-control" type="password" name="new_password_again" placeholder="Password" required />
        </div>
    </div>

    <center><button type="submit" name="submit" class="btn btn-secondary mt-3">
            <span class="me-2"><i class="fa-solid fa-circle-check"></i></span> UPDATE
        </button></center>
</form>