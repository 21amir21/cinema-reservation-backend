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
  <link rel="stylesheet" href="./../styles/upFromThePoppyHill.css" />
  <?php
  $id = $_GET['id'];
  $hostName = "localhost";
  $userName = "root";
  $password = "2121";
  $dbName = "cinema_reservation_db";
  $conn = new mysqli($hostName, $userName, $password, $dbName);

  $sql = "SELECT * FROM movie WHERE id = $id";
  $row = $conn->query($sql);
  $movie = mysqli_fetch_assoc($row);
  ?>

  <title><?php echo $movie['name']; ?></title>
</head>

<body>
  <div id="header"></div>
  <div id="page-content">
    <div id="tooltip" style=" background-image: url(<?= "../images/" . $movie['backgroundImageURL']; ?>);  background-repeat: no-repeat;
  
  width: 100%;
  background-size: cover;">
      <div id="tooltip-content">
        <!-- TOOLTIP IMAGE -->
        <img src="<?= "../images/" . $movie['postersURL']; ?>" />
        <text id="title"><?php echo $movie['name']; ?></text>
        <br />
        <div id="under-title">
          <text><?php echo $movie['releaseDate']; ?></text>
          <text><?php echo $movie['ageRating']; ?></text>
          <text><?php echo $movie['runningTime']; ?></text>
          <text>Language: <?php echo $movie['language']; ?></text>
          <hr />
        </div>
        <!-- TOOLTIP GENRE -->
        <div id="genre-box">
          <text><?php echo $movie['genre']; ?></text>
          <text><?php echo $movie['genre2']; ?></text>
          <text><?php echo $movie['genre3']; ?></text>
        </div>
        <!-- TOOLTIP RATING -->
        <span id="rating">
          <text><?php echo $movie['rating']; ?></text>
          <i class="fa fa-star fa-2x" aria-hidden="true"></i>
          <i class="fa fa-star fa-2x" aria-hidden="true"></i>
          <i class="fa fa-star fa-2x" aria-hidden="true"></i>
          <i class="fa fa-star fa-2x" aria-hidden="true"></i>
          <i class="fa fa-star-half-o fa-2x" aria-hidden="true"></i>
        </span>

        <!-- TOOLTIP MOVIE DESCRIPTION -->
        <h5>Director: <?php echo $movie['director']; ?></h5>
        <p id="description">
          <?php echo $movie['description']; ?>
        </p>
      </div>
    </div>
    <div id="details">
      <div id="genre">
        <text>
          <b>Genre:</b> <?php echo $movie['genre']; ?> ,
          <?php echo $movie['genre2']; ?>,
          <?php echo $movie['genre']; ?>
        </text>
        <text><b>Running Time:</b> <?php echo $movie['runningTime']; ?></text>
        <text><b>Release Date:</b> <?php echo $movie['releaseDate']; ?></text>
        <text><b>Language:</b> <?php echo $movie['language']; ?></text>
        <text><b>Subtitles:</b> <?php echo $movie['subtitles']; ?></text>
      </div>
      <div id="show-times">
        <i class="fa fa-video-camera fa-2x" aria-hidden="true"> Show Times</i>
        <i class="fa fa-ticket" aria-hidden="true">9:00 am</i>
        <i class="fa fa-ticket" aria-hidden="true">12:00 pm</i>
        <i class="fa fa-ticket" aria-hidden="true">15:00 pm</i>
      </div>
    </div>
    <div id="trailer">
      <!-- INSERT TRAILER HERE -->
      <iframe width="100%" height="100%" src="<?php echo $movie['trailerURL']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

    <div id="button-line">
      <hr />
      <a href="../data/checkLoginStatus.php?id=<?= $id ?>">
        <button>Buy Your Ticket</button>
      </a>
    </div>
  </div>
  <div id="footer"></div>
  <!-- <div style="top: 1080px; position: relative; justify-content: center"> -->
  <!-- </div> -->
</body>

</html>