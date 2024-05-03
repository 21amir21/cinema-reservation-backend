<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Offers</title>
  <link rel="stylesheet" href="../styles/offers.css"/>
  <link rel="stylesheet" href="../includes/header.css"/>
  <link rel="stylesheet" href="../includes/footer.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(function () {
      $("#header").load("../includes/header.php");
      $("#footer").load("../includes/footer.html");
      // The Button Up
      var btn = $("#backToTop");
      $(window).on("scroll", function () {
        if ($(window).scrollTop() > 300) {
          btn.addClass("show");
        } else {
          btn.removeClass("show");
        }
      });
      btn.on("click", function (e) {
        e.preventDefault();
        $("html, body").animate(
            {
              scrollTop: 0,
            },
            500
        );
      });
    });
  </script>
</head>

<body>
<div id="header"></div>
<a href="javascript:void(0);" id="backToTop" class="back-to-top">
  <i class="arrow"></i><i class="arrow"></i>
</a>
<div class="contentContainer">
  <h1 id="headers">Offers</h1>
  <br/><br/>
  <?php
  $hostName = "localhost";
  $userName = "root";
  $password = "2121";
  $dbName = "cinema_reservation_db";
  $conn = new mysqli($hostName, $userName, $password, $dbName);

  $sql = "SELECT * FROM offer";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    foreach ($result as $offer) {

      ?>
      <div class="offerContainer">
        <img src="<?php echo $offer['offerImg']; ?>" alt="Offer picture"/>
        <h2><?php echo $offer['offerName']; ?></h2>
        <p><?php echo $offer['offerDescription']; ?></p>
        <a href="../views/what's_on.php" class="bookTicketsButton">Book Tickets</a>
      </div>
      <?php
    }
  }
  ?>
</div>
<div id="footer"></div>
</body>

</html>