<?php
session_start();
?>
<?php include("config.php") ?>
<?php include("header.php") ?>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background-color: black;
    font-family: 'Arial', sans-serif;
  }


  .image-overlay-container {
    position: relative;
    overflow: hidden;
    height: 370px;
    width: 100%;
    width: 100%;
    background-image: url('./assets/bg3.jpg');
    background-size: 1600px;
    justify-content: center;
    align-items: center;
    background-attachment: fixed;

    /* Ensures the overlay stays within the image bounds */
}


  .neon-header {
    padding: 20px 0;
    background-color: #000;
    position: relative;
    box-shadow: 1px 0px 25px #ff1a1a;
    /* Updated to red */
  }

  /* logoo */
  .logoo a {
    font-size: 2rem;
    /* color: #ff1a1a; Updated to red */
    /* text-transform: uppercase; */
    /* font-weight: bold; */
    /* text-decoration: none; */
    position: relative;
    margin-left: 30px;
    /* border: 1px solid red; */

    /* border: 1px solid red; */
  }

  /* .logoo a::before,
.logoo a::after {
  content: '';
  position: absolute;
  top: 50%;
  width: 100%;
  height: 2px;
  background: #39ff14; /* Updated to green */

  .logoo a::before {
    left: 0;
    transform: translateY(-300%);
  }

  .logoo a::after {
    right: 0;
    transform: translateY(300%);
  }

  .logoo a:hover::before,
  .logoo a:hover::after {
    transform: translateY(0%);
  }

  /* Navigation Menu */
  .nav-menu ul {
    list-style: none;
  }

  .nav-links li {
    margin-left: 30px;
  }

  .nav-links a {
    font-size: 1.2rem;
    color: #ff1a1a;
    /* Updated to red */
    text-transform: uppercase;
    font-weight: bold;
    text-decoration: none;
    position: relative;
    transition: color 0.3s ease;
  }

  .nav-links a:hover {
    color: #39ff14;
    /* Updated to green */
  }

  .nav-links a::before {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    background-color: #39ff14;
    /* Updated to green */
    bottom: -5px;
    left: 50%;
    transition: width 0.3s ease, left 0.3s ease;
  }

  .nav-links a:hover::before {
    width: 100%;
    left: 0;
  }

  /* User Icons */
  .user-icons a {
    margin-left: 20px;
    color: #ff1a1a;
    /* Updated to red */
    font-size: 1.5rem;
    position: relative;
    transition: color 0.3s ease;
  }

  .user-icons a:hover {
    color: #39ff14;
    /* Updated to green */
  }
 
  /* Neon Hover Effect for Icons */
  .user-icons a::before {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    background-color: #39ff14;
    /* Updated to green */
    bottom: -5px;
    left: 50%;
    transition: width 0.3s ease, left 0.3s ease;
  }

  .user-icons a:hover::before {
    width: 100%;
    left: 0;
  }

  /* Neon Glow Effect */
  .neon-header .logoo a,
  .nav-links a,
  .user-icons a {
    text-shadow: 0 0 0px rgba(255, 7, 58, 0.8), 0 0 10px rgba(255, 7, 58, 0.6);
    /* Updated to red */
  }

  .nav-links a:hover,
  .user-icons a:hover {
    text-shadow: 0 0 0px rgba(57, 255, 20, 0.8), 0 0 20px rgba(57, 255, 20, 0.6);
    /* Updated to green */
  }
  
</style>


<?php
// Check if the user is logged in
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
  // Redirect to login page
  header('Location: login.php');
  exit();
}
?>

<!-- Header Section -->
<header class="neon-header py-4">
  <div class="container-fluid d-flex justify-content-between align-items-center ">
    <!-- logoo -->
    <div class="logoo">
      <a href="#"><img width="90px" src="./assets/logo1.png" alt=""></a>
    </div>

    <!-- Navigation Menu -->
    <nav class="nav-menu">
      <ul class="nav-links d-flex">
        <li><a href="#">Home</span></a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>

    <!-- User Icons -->
    <div class="user-icons d-flex align-items-center">
      <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true): ?>
        <!-- Display the logged-in user's name -->
        <div class="text-white">Welcome, &nbsp</div><i><span
            class="text-danger"><?php echo $_SESSION['user_name']; ?></i></span>
        <div class="text-white"><i>!!!</i></div>
        &nbsp;&nbsp;&nbsp;&nbsp;<form action="" method="post">
                  <button class="btn btn-sm bg-darsk text-white mt-2"><h4><i class="bi bi-cart3 text-white"></i></h4></button>
                </form> &nbsp;&nbsp;
        <a href="logout.php" class="nav-icon ms-3"><i class="fas fa-sign-out-alt"></i> logoout</a>

      <?php endif; ?>
    </div>
  </div>
</header>


<div class="container-fluid image-overlay-container">

        <div class="row">
            <h1 class="text-white text-center " style="margin-top:100px; font-size:50px">Your <span style="color:#ff1a1a">Dream Phone</span> is just one click away
            </h1><br>
            <p class="text-white text-center"><i>Personalize every aspect to create a phone that fits you perfectly</i></p>

        </div>

    </div>

<section class="content py-4">
  <div class="container-fluid">
    <?php if (isset($_GET['action']) && $_GET['action'] == 'processor') {


      ?>

      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3 " data-category="battery" onclick="selectItem(this)" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5; color:black"><b>Ports</b></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
        SELECT p.*, i.price 
        FROM processor p 
        JOIN items i ON p.item_id = i.id
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>

    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'rom') {

      ?>

      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>Ports</b></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
        SELECT r.*, i.price 
        FROM rom r 
        JOIN items i ON r.item_id = i.id
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->product_name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>
      


    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'ram') {
      ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
        SELECT r.*, i.price 
        FROM ram r 
        JOIN items i ON r.item_id = i.id
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->product_name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>


    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'display') {
      ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>Ports</b></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 justify-content-between d-flex">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
        SELECT p.*, i.price 
        FROM display p 
        JOIN items i ON p.item_id = i.id
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->model_name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>



    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'front-camera') {
      ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
    SELECT c.*, i.price 
    FROM camera c 
    JOIN items i ON c.item_id = i.id 
    WHERE i.type = 'front-cam'
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->camera_name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>


    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'rear-camera') {
      ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>Port</b></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
    SELECT c.*, i.price 
    FROM camera c 
    JOIN items i ON c.item_id = i.id 
    WHERE i.type = 'rear-cam'
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->camera_name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>


    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'battery') {
      ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>Port</b></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
        SELECT b.*, i.price 
        FROM battery b 
        JOIN items i ON b.item_id = i.id
    ");

        // Loop through each processor
        while ($battery = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $battery->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $battery->product_name ?></h4>
                <h5 class="">$<?php echo number_format($battery->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Cart</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>


    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'speakers') {
      ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
    SELECT c.*, i.price 
    FROM speaker c 
    JOIN items i ON c.item_id = i.id 
    
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->product_name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>


    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'microphone') {
      ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>Port</b></a>
        </div>
      </div>

      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
    SELECT c.*, i.price 
    FROM mic c 
    JOIN items i ON c.item_id = i.id 
    
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>

    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'ports') {
      ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>Port</b></a>
        </div>
      </div>


      <div class="row mt-5 mx-5 d-flex justify-content-center">
        <?php
        // Fetch processor details along with their price from the items table
        $query = mysqli_query($db_conn, "
    SELECT c.*, i.price 
    FROM port c 
    JOIN items i ON c.item_id = i.id 
    
    ");

        // Loop through each processor
        while ($course = mysqli_fetch_object($query)) { ?>
          <div class="col-lg-3  wow fadeInUp " data-wow-delay="0.1s">
            <div class="card border border-danger " style="background-color:black; overflow: hidden; border-radius:10px; width:300px">
              <div class="card-header   overflow-hidden" style="height: 250px;">
                <!-- Set a fixed height for the container -->
                <img class="img-fluid" src="./assets/<?php echo $course->img ?>" style="width:100%; height:100%;">
              </div>

              <div class="card-body text-center text-white">
                <h4 class=""><?php echo $course->name ?></h4>
                <h5 class="">$<?php echo number_format($course->price, 2) ?></h5>
                <form action="" method="post">
                  <button class="btn btn-sm bg-danger text-white mt-2"><b>Add to Car</b>t</button>
                </form>
              </div>
            </div><br><br>
          </div>
        <?php } ?>
      </div>


    <?php } else { ?>
      <div class="row mx-auto d-flex justify-content-between">
        <div class="col-auto">
          <a href="?action=processor" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Processor</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rom" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>ROM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ram" class="btn px-5" style="background-color:#F8F2E5;  color:black"><b>RAM</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=display" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Display</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=front-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Front-Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=rear-camera" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Rear Camera</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=battery" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Battery</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=speakers" class="btn  px-4" style="background-color:#F8F2E5;  color:black"><b>Speakers</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=microphone" class="btn  px-3" style="background-color:#F8F2E5;  color:black"><b>Microphone</b></a>
        </div>
        <div class="col-auto">
          <a href="?action=ports" class="btn  px-5" style="background-color:#F8F2E5;  color:black"><b>Port</b></a>
        </div>
      </div>





    <?php } ?>

  </div>


</section>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>