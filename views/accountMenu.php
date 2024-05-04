<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Account</title>
  <link rel="stylesheet" href="./../styles/accountMenu.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../includes/header.css" />
  <link rel="stylesheet" href="../includes/footer.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(function() {
      $("#header").load("../includes/header.php");
      $("#footer").load("../includes/footer.html");
    });
  </script>
</head>

<body style="margin-top: 126px">
  <div id="header"></div>
  <a href="javascript:void(0);" id="backToTop" class="back-to-top">
    <i class="arrow"></i><i class="arrow"></i>
  </a>
  <div class="tabs">
    <div class="tab active" data-tab="purchases">Purchases</div>
    <!-- &#38; is the code for & -->
    <div class="tab" data-tab="manage">Manage Details &#38; Payment</div>
  </div>
  <div class="tab-content" id="purchases" style="color: #013e48">
    <h2 id="headers">Purchase History</h2>
    <br /><br />

    <?php

    session_start();

    $custID = $_SESSION["customer"]["customerID"];

    $hostName = "localhost";
    $userName = "root";
    $password = "2121";
    $dbName = "cinema_reservation_db";
    $conn = new mysqli($hostName, $userName, $password, $dbName);

    $query = "SELECT movie.postersURL, movie.name, movie.price, movie.releaseDate 
    FROM movie 
    INNER JOIN payment ON movie.id = payment.movieId 
    WHERE payment.customerId = $custID";
    $result = mysqli_query($conn, $query);

    // Check if there are any movies in the database
    if (mysqli_num_rows($result) > 0) {
      // Fetch all rows as an associative array
      $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
      <div class="cards-container">
        <?php foreach ($movies as $movie) : ?>
          <div class="card" style="width: 18rem">
            <img src="<?= "../images/" . $movie['postersURL']; ?>" class="card-img-top" alt="Movie Poster" />
            <div class="card-body" style="align-content: center; color: #013e48">
              <h5 class="card-title"><b><?php echo $movie['name']; ?></b></h5>
              <li class="card-text" style="list-style-type: none">Price: <?php echo $movie['price']; ?>$</li>
              <li class="card-text" style="list-style-type: none">Date: <?php echo $movie['releaseDate']; ?></li>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php
    } else {
      echo "<p>No movies found</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

  </div>
  <div class="tab-content hidden" id="manage">
    <div class="update-form-wrapper">
      <form action="/data/update_customer.php" method="POST">
        <h2>Update Personal Information</h2>
        <div class="form-group fullname">
          <label for="fullname">First Name</label>
          <input type="text" id="fullname" placeholder="Enter your first name" name="firstName" value="<?= $_SESSION["firstName"] ?? '' ?>" />
        </div>
        <div class="form-group fullname">
          <label for="fullname">Last Name</label>
          <input type="text" id="fullname" placeholder="Enter your last name" name="lastName" value="<?= $_SESSION["lastName"] ?? '' ?>" />
        </div>
        <div class="form-group email">
          <label for="email">Email Address</label>
          <input type="text" id="email" placeholder="Enter your email address" name="email" value="<?= $_SESSION["email"] ?? '' ?>" />
        </div>
        <div class="form-group password">
          <label for="password">New Password</label>
          <input type="password" id="password" placeholder="Enter your new password" name="password" />
          <i id="pass-toggle-btn" class="fa-solid fa-eye-slash"></i>
        </div>
        <div class="form-group password">
          <label for="password">Confirm New Password</label>
          <input type="password" id="password" placeholder="Confirm your new password" required name="confirmPassword" />
          <!-- <i id="pass-toggle-btn" class="fa-solid fa-eye-slash"></i> -->
        </div>
        <div class="form-group date">
          <label for="date">Birth Date</label>
          <input type="date" id="date" placeholder="Select your date" name="dob" value="<?= $_SESSION["dob"] ?? '' ?>" />
        </div>
        <br />
        <div class="payment-form">
          <h2>Update Card Information</h2>
          <div class="form-group">
            <label for="cardnumber">Card Number *</label>
            <input type="text" id="cardnumber" placeholder="**** **** **** ****" />
          </div>
          <div class="form-group">
            <label for="expirydate">Expiry Date *</label>
            <input type="text" id="expirydate" placeholder="MM/YYYY" />
          </div>
          <div class="form-group">
            <label for="cardsecuritycode">Card Security Code *</label>
            <input type="text" id="cardsecuritycode" placeholder="***" />
          </div>
        </div>
        <div class="form-group submit-btn">
          <input type="submit" value="Update" />
        </div>
      </form>
    </div>
  </div>
  <div id="footer"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./../js/accountMenu.js"></script>
</body>

</html>