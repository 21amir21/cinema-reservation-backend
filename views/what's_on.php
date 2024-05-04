<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!---font icon CDN----->
  <link rel="stylesheet" href="../includes/header.css" />
  <link rel="stylesheet" href="../includes/footer.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(function() {
      $("#header").load("../includes/header.php");
      $("#footer").load("../includes/footer.html");
    });
  </script>
  <link rel="stylesheet" href="./../styles/what's_on.css" />
  <title>What's On</title>
</head>

<body>
  <!-- <div class="home_slideshow"></div> -->
  <div id="header"></div>
  <a href="javascript:void(0);" id="backToTop" class="back-to-top">
    <i class="arrow"></i><i class="arrow"></i>
  </a>
  <section>
    <h3 class="headers">WHAT'S ON</h3>
    <div class="movie-card-section">
      <?php
      $hostName = "localhost";
      $userName = "root";
      $password = "2121";
      $dbName = "cinema_reservation_db";
      $conn = new mysqli($hostName, $userName, $password, $dbName);

      $sql = "SELECT * FROM movie";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        foreach ($result as $movie) {

      ?>
          <div class="card">
            <a href="movie_details.php?id=<?= $movie["id"] ?>">
              <img class="activate" src="<?php echo $movie['postersURL'] ?>" />
            </a>
            <div class="card-content">
              <a href="movie_details.php?id=<?= $movie["id"] ?>">
                <p class="movie-name"> <?php echo $movie['name']; ?></p>
              </a>
              <!-- ToolTip For Movie -->
              <span class="tooltip">
                <div class="tooltip-content">
                  <!-- TOOLTIP IMAGE -->
                  <img style="width: 40%;height:40%;" src="<?php echo $movie['postersURL']; ?>" />
                  <text><?php echo $movie['name']; ?></text><br />
                  <!-- TOOLTIP RATING -->
                  <span class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <text><?php echo $movie['rating']; ?></text>
                  </span>
                  <!-- TOOLTIP GENRE -->
                  <div class="genre-box">
                    <text><?php echo $movie['genre']; ?></text>
                    <text><?php echo $movie['genre2']; ?></text>
                    <text><?php echo $movie['genre3']; ?></text>
                  </div>
                  <!-- TOOLTIP TICKETS AND SHOW TIMES -->
                  <div class="tickets">
                    <i class="fa fa-video-camera fa-2x" aria-hidden="true" style="justify-self: center"></i>
                    <i class="fa fa-ticket" aria-hidden="true"> 09:00 am</i>
                    <i class="fa fa-ticket" aria-hidden="true"> 12:00 pm</i>
                    <i class="fa fa-ticket" aria-hidden="true"> 15:00 pm</i>
                  </div>
                  <!-- TOOLTIP MOVIE DESCRIPTION -->
                  <p>
                    <?php echo $movie['shortDescription']; ?>
                  </p>
                </div>
              </span>
            </div>
          </div>
          <!-- <div class="card">
        <img src="./../images/ponyo.jpg" />

        <div class="card-content">
          <p class="movie-name">Ponyo</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/YourName.jpg" />

        <div class="card-content">
          <p class="movie-name">Your Name</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/castleInTheSky.jpg" />

        <div class="card-content">
          <p class="movie-name">Castle In The Sky</p>
        </div>
      </div>

      <div class="card">
        <img src="./../images/whenMarnieWasThere.jpg" />

        <div class="card-content">
          <p class="movie-name">When Marnie Was There</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/theWindRises.jpg" />

        <div class="card-content">
          <p class="movie-name">The Wind Rises</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/kiksDelivery.jpg" />

        <div class="card-content">
          <p class="movie-name">kiki's delivery service</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/SpiritedAway.jpg" />

        <div class="card-content">
          <p class="movie-name">Spirited Away</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/crimsonPig.jpg" />

        <div class="card-content">
          <p class="movie-name">Crimson Pig</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/Nausicaä of the Valley of the Wind.jpg" />

        <div class="card-content">
          <p class="movie-name">Nausicaä of the Valley of the Wind</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/theCatReturns.jpg" />

        <div class="card-content">
          <p class="movie-name">The Cat Returns</p>
        </div>
      </div>
      <div class="card">
        <img src="./../images/theSecretWorldOfArrietty.jpg" />

        <div class="card-content">
          <p class="movie-name">The Secret World Of Arrietty</p>
        </div>
      </div> -->
      <?php
        }
      }
      ?>
    </div>
    <!---movie-card--->

    <div class="show">
      <div class="show-bar">
        <div class="bar"></div>
      </div>
      <button class="show-more">Show more</button>
    </div>
  </section>
  <div id="footer"></div>
  <script src="./../js/what's_on.js"></script>
</body>

</html>