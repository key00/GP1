<footer>
    <div class="footer-row row">
        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
            <h2>WE-SHOP</h2>
            <p>
                Because you deserve the best <br />
                And we're here to deliver
            </p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2">
            <h4>Quick links</h4>
            <ul class="quick-links">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="shop.php">Shop</a>
                </li>
                <li class="<?php if (isset($_SESSION['username'])) echo "active-session";
                            ?>">
                    <a href="signin.php">Sign-in</a>
                </li>
                <li class="<?php if (isset($_SESSION['username'])) echo "active-session";
                            ?>">
                    <a href="register.php">Register</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2">
            <h4>Categories</h4>
            <ul class="quick-links">
                <?php
                getCategory();
                ?>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <h4>Subscribe to our news letter</h4>
            <p>Don't miss the lastest arrivals and sales</p>
            <form action="" method="post">
                <input class="form-control" type="email" name="email" placeholder="Your email" />
                <span><input class="btn btn-primary mt-2" type="submit" name="submit" value="Subscribe"></span>
            </form>
        </div>
    </div>
    <div class="row copyright">
        <div class="col-md-12 text-center py-2">
            &copy;Keyna 2022 | Graduation Project I
        </div>
    </div>
</footer>