<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="./styles/index.css" />
  <link rel="stylesheet" href="./includes/header.css" />
  <link rel="stylesheet" href="./includes/footer.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
    $(function() {
      $("#header").load("/includes/header.php");
      $("#footer").load("/includes/footer.html");
    });
  </script>
</head>

<body>
  <div id="header"></div>
  <a href="javascript:void(0);" id="backToTop" class="back-to-top">
    <i class="arrow"></i><i class="arrow"></i>
  </a>
  <!-- slide  show -->
  <div id="slideshow" style="margin-top: 107px">
    <div class="slide">
      <img src="./images/Howlmovingcastlelandscape.jpg" alt="Slide 1" style="width: 100%" />
    </div>
    <div class="slide">
      <img src="./images/ponyolanscape.jpg" alt="Slide 2" style="width: 100%" />
    </div>
    <div class="slide">
      <img src="./images/SpiritedAwaylansdcape.jpg" alt="Slide 3" style="width: 100%" />
    </div>
    <!-- Previous and Next buttons -->
    <button id="prev" class="button">
      <img src="./images/Arrowleft.png" alt="Arrowleft" style="height: 50px" />
    </button>
    <button id="next" class="button">
      <img src="./images/Arrowright.png" alt="Arrowleft" style="height: 50px" />
    </button>
  </div>

  <section>
    <h3 class="headers">What's On</h3>
    <div class="movie-card-section">
      <?php
      $hostName = "localhost";
      $userName = "root";
      $password = "2121";
      $dbName = "cinema_reservation_db";
      $conn = new mysqli($hostName, $userName, $password, $dbName);

      // retrieving the movies from databse
      $sql = "SELECT * FROM movie WHERE removedFlag=0";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        foreach ($result as $movie) {

      ?>
          <div class="card">
            <a href="views/movie_details.php?id=<?= $movie["id"] ?>">
              <img class="activate" src="<?= "../images/" . $movie['postersURL'] ?>" />
            </a>
            <div class="card-content">
              <p class="movie-name"> <?php echo $movie['name']; ?></p>
              <br />

            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
    </div>
    <!---movie-card--->

    <div class="show">
      <div class="show-bar"></div>
    </div>
    <h3 class="headers">Coming Soon</h3>
    <!-- coming soon  -->
    <div class="movie-card-section">
      <?php
      $hostName = "localhost";
      $userName = "root";
      $password = "2121";
      $dbName = "cinema_reservation_db";
      $conn = new mysqli($hostName, $userName, $password, $dbName);

      $sql = "SELECT * FROM comingsoon";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        foreach ($result as $movie) {

      ?>
          <div class="card">
            <a href="">
              <img class="activate" src="<?= "../images/" . $movie['posterURL'] ?>" />
            </a>
            <div class="card-content">
              <p class="movie-name"><?php echo $movie['name']; ?></p>
              <br />
              <text style="margin-left: 7%"><?php echo $movie['releaseDate']; ?></text>
            </div>
          </div>
      <?php
        }
      }
      ?>
      <!-- <div class="card">
        <img src="./images/HowlsMovingCastle.jpg" />
        <div class="card-content">
          <p class="movie-name">Howl's Moving Castle</p>
        </div>
      </div>
      <div class="card">
        <img src="./images/Pincessmononoke.jpg" />

        <div class="card-content">
          <p class="movie-name">Princess Mononoke</p>
        </div>
      </div>
      <div class="card">
        <img src="./images/whisperoftheheart.jpg" />
        <div class="card-content">
          <p class="movie-name">Whisper Of the Heart</p>
        </div>
      </div>
      <div class="card">
        <img src="./images/Myneighbourtotoro.jpg" />
        <div class="card-content">
          <p class="movie-name">My Neighbor Totoro</p>
        </div>
      </div> -->
    </div>
  </section>

  <div id="footer"></div>
  <script src="./js/index.js"></script>
</body>

</html>