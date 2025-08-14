<?php
require '../controllers/indexController.php';
$flights = getAllFlights();

$err_from = $err_to = $err_select = $err_date = $errr_select1 = '';
$from = $to = $ddate = '';
$err_name = $err_email = $err_subject = $err_description = '';
$name = $email = $subject = $description = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GYT Airlines - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Ubuntu:400,500,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Coda+Caption:800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="user/css/index.css">
</head>

<body>

<!-- Navbar -->
<section id="nvbar" style="background-color: #4caf50;
  color: #fff;">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md  navbar-dark">
            <img class="airline-logo" src="airline-logo.png" alt="">
            <a class="navbar-brand" href="index.php">GYT Airlines</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#why-us">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item">
                        <form action="Login.php"><input type="submit" value="Sign In" class="top-sign-btn" name="submit" ></form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>




<!-- Background -->
<section id="background-image" >
    
<section class="travel-hero" style="margin-left: 8.5%;padding-top: 0.5%;">
    <div class="overlay-box" style="background-color: rgba(0, 0, 0, 0.4); padding: 50px 30px; margin-top: 0%;
  border-radius: 15px; max-width: 800px; width: 90%; text-align: center;box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
        <div >
            <h1 style="font-size: 2.8rem;
  margin-bottom: 20px;
  font-weight: 700; color: antiquewhite;">✈️ Life Is Short, The World Is Wide...</h1>
            <p style="font-size: 1.3rem;
  margin-bottom: 25px;
  font-style: italic;
 color: antiquewhite;">The journey of a thousand miles begins with a single step. 🌍</p>

            <div  style="font-size: 1.1rem;
  margin: 10px 0;
  line-height: 1.5;">
                <p style="color: antiquewhite;">🏝️ Discover breathtaking places, meet new souls, and create unforgettable memories.</p>
                <p style="color: antiquewhite;">🌟 Handpicked destinations • Hassle-free booking • 24/7 support</p>
            </div>

            <div class="auth-prompt" >
                <a href="login.php" class=" login-btn" style="  display: inline-block;
  margin-top: 30px;
  padding: 14px 30px;
  background-color: #4caf50;
  color: white;
  font-weight: bold;
  text-decoration: none;
  border-radius: 8px;
  transition: background-color 0.3s ease;">🚀 Login to Start Your Journey</a>
            </div>
        </div>
    </div>
</section>


</section>

    <!-- Flight Search Result -->
   
<!-- Why Choose Us -->
<section id="why-us">
    <br><br><br><br>
    <h1 class="bookus">Why Choose Us</h1>
    <div class="container-fluid why">
        <div class="row">
            <div class="col-lg-4"><div class="text"><i class="fa fa-asl-interpreting"></i><h4>Get the best deals</h4><p>We search and compare real-time prices...</p></div></div>
            <div class="col-lg-4"><div class="text"><i class="fa fa-money"></i><h4>100% price transparency</h4><p>No hidden charges or cookies-based pricing.</p></div></div>
            <div class="col-lg-4"><div class="text"><i class="fa fa-handshake-o"></i><h4>Trusted and free</h4><p>Endorsed by CNN, Frommer’s, NYT</p></div></div>
            <div class="col-lg-4"><div class="text"><i class="fa fa-cogs"></i><h4>Fast & Easy Booking</h4><p>Quick online reservation system.</p></div></div>
            <div class="col-lg-4"><div class="text"><i class="fa fa-dot-circle-o"></i><h4>Any Time Any Where</h4><p>Access from anywhere, anytime.</p></div></div>
            <div class="col-lg-4"><div class="text"><i class="fa fa-comments"></i><h4>24/7 Support</h4><p>We’re always available to help.</p></div></div>
        </div>
    </div>
</section>

<!-- Contact Us -->
<section id="contact">
    <div class="login p-l-55 p-r-55 p-t-65 p-b-50">
        <form action="" method="post" class="login-form">
            <h1 class="login-form-title">Contact Us</h1>
            <input class="login-input" name="name" type="text" placeholder="Enter Name" value="<?php echo $name; ?>"/>
            <span style="color:red"><?php echo $err_name; ?></span>

            <input class="login-input" name="email" type="email" placeholder="Enter Email" value="<?php echo $email; ?>"/>
            <span style="color:red"><?php echo $err_email; ?></span>

            <input class="login-input" name="subject" type="text" placeholder="Enter Subject" value="<?php echo $subject; ?>"/>
            <span style="color:red"><?php echo $err_subject; ?></span>

            <textarea class="login-input" name="description" placeholder="Enter Description"><?php echo $description; ?></textarea>
            <span style="color:red"><?php echo $err_description; ?></span>

            <input type="submit" name="submit_contact" class="login-btn" value="Send Message">
        </form>
    </div>
</section>

<!-- JS Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>
