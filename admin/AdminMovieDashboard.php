<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!---font icon CDN----->

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" /> -->
  <link rel="stylesheet" href="./../includes/header.css" />
  <link rel="stylesheet" href="./../includes/footer.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
    $(function () {
      $("#header").load("../includes/header.php");
      $("#footer").load("../includes/footer.html");
    });
  </script>
  <link rel="stylesheet" href="./AdminMovieDashboard.css" />
  <title>AdminMovieDashboard</title>
</head>

<body>
  <!-- <div class="home_slideshow"></div>  -->
  <div id="header"></div>
  <section>
    <h3 class="headers">Current Movies</h3>
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
         <a href="movie_details.php?id=<?= $movie["id"] ?>">
              <img class="activate" src="<?php echo $movie['postersURL'] ?>" />
            </a>
            <div class="card-content">
                <p class="movie-name"> <?php echo $movie['name']; ?></p>    
          <br />
          <a href="./EditMovieForm.html"><input type="button" value="Edit" class="editmovie" /></a>
          <a href="removemovirfromdb.php?id=<?= $movie["id"] ?>"><input type="button" value="Remove" class="editmovie" style="margin-left: 80px" /></a> 
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
      <a href="./AddMovieForm.html"><button class="addmovie">Add Movie</button></a>
    </div>
  </section>
  <div id="footer"></div>
  <script src="./AdminMovieDashboard.js"></script>
</body>

</html>