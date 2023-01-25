<?php $active = 'About';
include("includes/header.php");
?>

<div class="col-md-12 breadcrumb_style">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php"> Home</a></li>
        <li class="breadcrumb-item active"><a href="about.php"> About</a></li>
    </ul>
</div>
<section>
    <div class="container">

        <form action="about.php" class="login-form" method="post">
            <h3 class="text-center">CONTACT US</h3>
            <h5 class="text-center" style="color: #55d4a1;">Feel free to contact us anytime</h5>
            <p class="text-center text-muted">We'll be very pleased to hear from you</p>
            <div class="form-group mt-5">
                <label class="form-label"> Your full name</label>
                <input class="form-control" type="text" name="fullname" placeholder="Your full name" required>
            </div>
            <div class="form-group mt-3">
                <label class="form-label"> Your email</label>
                <input class="form-control" type="email" name="email" placeholder="Your email" required>
            </div>
            <div class="form-group mt-3">
                <label class="form-label">Subject</label>
                <input class="form-control" type="text" name="subject" placeholder="Subject of your message" required>
            </div>
            <div class="form-group mt-3">
                <label class="form-label">Message</label>
                <textarea class="form-control" name="message" placeholder="How can we help you?" required>
                </textarea>
            </div>
            <center>
                <button class="btn btn-secondary mt-3" type="submit" name="submit">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    Send
                </button>

            </center>
        </form>
    </div>
    <!-- the admin supposed to get the message to his email and the sender will receive an auto reply (video 26) -->
    <?php
    if (isset($_POST['submit'])) {

        $sender_name = $_POST['fullname'];
        $sender_email = $_POST['email'];
        $sender_subject = $_POST['subject'];
        $sender_message = $_POST['message'];
        $receiver_email = "k20190684@std.kyrenia.edu.tr";
        $header = "From:" . $sender_email . "\r\n";
        mail($receiver_email, $sender_subject, $sender_message, $sender_name, $header);

        //auto-reply 
        //i need a mail server
        // ini_set('SMTP', "server.com");
        // ini_set('smtp_port', "587");
        // ini_set('sendmail_from', "k20190684@std.kyrenia.edu.tr");
        // $email = $_POST['email'];
        // $subject = "Welcome to our store website, Thank you for contacting us";
        // $message = "We will get back to you as soon as possible";
        //another option for $from
        //$from = "santosh_shah777@yahoo.com";
        //$headers="From :" . $from;
        // $headers = "From: k20190684@std.kyrenia.edu.tr" . "\r\n" .
        //     "CC: kinamugisha@gmail.com";
        // mail($email, $subject, $message, $headers);
        echo "<h5 class='text-center'><i> 'Your message was sent successfully'<i/></h5>";
    }
    ?>
</section>

<?php include("includes/footer.php"); ?>