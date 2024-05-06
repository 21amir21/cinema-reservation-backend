<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!---font icon CDN----->
    <link rel="stylesheet" href="../includes/header.css" />
    <link rel="stylesheet" href="../includes/footer.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(function () {
        $("#header").load("../includes/header.php");
        $("#footer").load("../includes/footer.html");
      });
    </script>
    <link rel="stylesheet" href="./../styles/what's_on.css" />
    <title>Coming Soon</title>
  </head>

  <body>
    <!-- <div class="home_slideshow"></div> -->
    <div id="header"></div>
    <section>
      <h3 class="headers">Coming Soon</h3>
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
      </div>
    </section>

    <div id="footer"></div>
  </body>
</html>
