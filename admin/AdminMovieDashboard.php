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
      <div class="card">
        <img id="myDiv" src="../images/upFromThePoppyHill.jpg" />
        <!-- <p id="tooltip-text">MOVIE DETAILS</p> -->
        <div class="card-content">
          <p class="movie-name">Up From The Poppy Hill</p>
          <br />
          <a href="./EditMovieForm.html"><input type="button" value="Edit" class="editmovie" /></a>

          <input type="button" value="Remove" class="editmovie" style="margin-left: 80px" />
        </div>
      </div>
      <div class="card">
        <img src="../images/ponyo.jpg" />

        <div class="card-content">
          <p class="movie-name">Ponyo</p>
          <br />
          <a href="./EditMovieForm.html"><input type="button" value="Edit" class="editmovie" /></a>

          <input type="button" value="Remove" class="editmovie" style="margin-left: 80px" />
        </div>
      </div>
      <div class="card">
        <img src="../images/YourName.jpg" />

        <div class="card-content">
          <p class="movie-name">Your Name</p>
          <br />
          <a href="./EditMovieForm.html"><input type="button" value="Edit" class="editmovie" /></a>
          <input type="button" value="Remove" class="editmovie" style="margin-left: 80px" />
        </div>
      </div>
      <div class="card">
        <img src="../images/castleInTheSky.jpg" />

        <div class="card-content">
          <p class="movie-name">Castle In The Sky</p>
          <br />
          <a href="./EditMovieForm.html"><input type="button" value="Edit" class="editmovie" /></a>
          <input type="button" value="Remove" class="editmovie" style="margin-left: 80px" />
        </div>
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