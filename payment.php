<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hackathon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST data exists
if (isset($_POST['cardName'], $_POST['cardNumber'], $_POST['expiryDate'], $_POST['cvv'])) {
    // Get POST data
    $cardName = $_POST['cardName'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    // Prepare SQL statement to insert payment details into the database
    $sql = "INSERT INTO payments (cardname, cardnumber, expirydate, cvv) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if prepare() failed
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters to the SQL statement
    $stmt->bind_param("ssss", $cardName, $cardNumber, $expiryDate, $cvv);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap and Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />

    <style>
    html,
    body {
        background-color: #000;
    }

    .neon-header {
        background-color: #000;
        position: relative;
        box-shadow: 1px 0px 25px #ff1a1a;
        z-index: 1;
    }

    .contact-container {
        background-color: black;
        padding: 20px;
        border-radius: 10px;
        width: 350px;
        margin: 20px auto;
    }

    .contact-container:hover {
        box-shadow: 1px 0px 20px #ff1a1a;
        transition: 0.5s ease-in-out;
    }

    h2 {
        text-align: center;
        color: #ff1a1a;
        margin-bottom: 20px;
    }

    .contact-form label {
        display: block;
        margin-bottom: 10px;
        color: white;
    }

    .contact-form input[type="text"],
    .contact-form input[type="email"],
    .contact-form input[type="tel"],
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        background-color: black;
        color: white;
        border: 1px solid #ff1a1a;
        border-radius: 5px;
    }

    .contact-form input[type="submit"] {
        margin-left: 25%;
        width: 50%;
        padding: 10px;
        background-color: #ff1a1a;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .contact-form input[type="submit"]:hover {
        background-color: #ff1a1a;
    }

    .red {
        color: #ff1a1a;
    }
    </style>

</head>

<body style="background-color:#373636">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg neon-header">
        <!-- logoo -->
        <div class="collapse navbar-collapse mt-0" id="navbarCollapse">
            <div class="logoo">
                <a href="#"><img width="80px" class="mt-2 mx-2 mb-2" src="logo.png" alt="logo"></a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="index.php" class="nav-item nav-link active" style="color:white"><b>Home</b></a>
                <a href="about.php" class="nav-item nav-link" style="color:white"><b>About</b></a>
                <a href="contact.php" class="nav-item nav-link" style="color:white"><b>Contact</b></a>
            </div>
        </div>
    </nav>

    <!-- Payment Form -->
    <div class="contact-container mt-5 mb-5">
        <h2>Complete Your Payment</h2>
        <form action="payment.php" method="POST" class="contact-form">
            <label for="cardName">Cardholder's Name:</label>
            <input type="text" id="cardName" name="cardName" placeholder="John Doe" required>

            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="XXXX-XXXX-XXXX-XXXX" required>

            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" placeholder="123" required>

            <input type="submit" value="Pay $107.99">
        </form>
    </div>

    <!-- Footer Section -->
    <footer class="text-light pt-5 pb-4" style="background-color:black">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">

                <!-- Company Section -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold red">Company</h5>
                    <p><a href="about.php" class="text-light" style="text-decoration: none;">About Us</a></p>
                    <p><a href="team.php" class="text-light" style="text-decoration: none;">Our Team</a></p>
                    <p><a href="careers.php" class="text-light" style="text-decoration: none;">Careers</a></p>
                    <p><a href="privacy.php" class="text-light" style="text-decoration: none;">Privacy Policy</a></p>
                </div>

                <!-- Products Section -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold red">Products</h5>
                    <p><a href="customize.php" class="text-light" style="text-decoration: none;">Customize Phones</a>
                    </p>
                    <p><a href="processors.php" class="text-light" style="text-decoration: none;">Processors</a></p>
                    <p><a href="accessories.php" class="text-light" style="text-decoration: none;">Accessories</a></p>
                    <p><a href="speakers.php" class="text-light" style="text-decoration: none;">Speakers</a></p>
                </div>

                <!-- Support Section -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold red">Support</h5>
                    <p><a href="faq.php" class="text-light" style="text-decoration: none;">FAQs</a></p>
                    <p><a href="help.php" class="text-light" style="text-decoration: none;">Help Center</a></p>
                    <p><a href="warranty.php" class="text-light" style="text-decoration: none;">Warranty</a></p>
                    <p><a href="contact.php" class="text-light" style="text-decoration: none;">Contact Us</a></p>
                </div>

                <!-- Social Media Section -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold red">Follow Us</h5>
                    <p><i class="fab fa-facebook-f mr-3"></i> Facebook</p>
                    <p><i class="fab fa-twitter mr-3"></i> Twitter</p>
                    <p><i class="fab fa-instagram mr-3"></i> Instagram</p>
                    <p><i class="fab fa-linkedin mr-3"></i> LinkedIn</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>