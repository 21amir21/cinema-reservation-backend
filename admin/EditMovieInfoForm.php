<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- same cc as add movie form -->
  <link rel="stylesheet" href="./AddMovieForm.css" />
  <title>EditMovie</title>
</head>

<body>
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

  <form id="submit-form" action="editmovieform.php?id=<?= $movie["id"] ?>" method="POST">
    <h2>Edit Movie Details</h2>
    <div class="form-group">
      <label for="poster">Movie Poster</label>
      <input type="file" id="poster" placeholder="Enter Movie Poster" name="poster" value="<?php echo $movie['postersURL'] ?>" />
    </div>
    <div class="form-group">
      <label for="backgroundimage">Movie Background Image</label>
      <input type="text" id="backgroundimage" placeholder="Enter Movie Background Image" name="backgroundimage" value="<?php echo $movie['backgroundImageURL'] ?>" />
    </div>
    <div class="form-group">
      <label for="trailer">Movie Trailer</label>
      <input type="text" id="trailer" placeholder="Enter Movie Trailer" name="trailer" />
    </div>
    <div class="form-group">
      <label for="moviename">Movie Name</label>
      <input type="text" id="moviename" placeholder="Enter Movie Name" name="moviename" value="<?php echo $movie['name']; ?>" />
    </div>
    <div class="form-group">
      <label for="directorname">Director Name</label>
      <input type="text" id="directorname" placeholder="Enter Director Name" name="directorname" value="<?php echo $movie['director']; ?>" />
    </div>
    <div class="form-group">
      <label for="releasedate">Release Date</label>
      <input type="text" id="releasedate" placeholder="Enter Movie Release Date" name="releasedate" />
    </div>
    <div class="form-group">
      <label for="genre1">Genre 1</label>
      <input type="text" id="genre1" placeholder="Enter Movie Genre" name="genre1" value="<?php echo $movie['genre']; ?>" />
    </div>
    <div class="form-group">
      <label for="genre2">Genre 2</label>
      <input type="text" id="genre2" placeholder="Enter Movie Genre" name="genre2" value="<?php echo $movie['genre2']; ?>" />
    </div>
    <div class="form-group">
      <label for="genre3">Genre 3</label>
      <input type="text" id="genre3" placeholder="Enter Movie Genre" name="genre3" value="<?php echo $movie['genre3']; ?>" />
    </div>

    <div class="form-group">
      <label for="rating">Rating</label>
      <input type="text" id="rating" placeholder="Enter Movie Rating" name="rating" value="<?php echo $movie['rating']; ?>" />
    </div>
    <div class="form-group">
      <label for="agerating">Age Rating</label>
      <input type="text" id="agerating" placeholder="Enter Age Rating" name="agerating" value="<?php echo $movie['ageRating']; ?>" />
    </div>
    <div class="form-group">
      <label for="runningtime">Running Time</label>
      <input type="text" id="runningtime" placeholder="Enter Movie Running Time" name="runningtime" />
    </div>
    <div class="form-group">
      <label for="language">Language</label>
      <select id="language" name="language">
        <option value="English">English</option>
        <option value="Japanese">Japanese</option>
      </select>
    </div>
    <div class="form-group">
      <label for="subtitles">Subtitles</label>
      <input type="text" id="subtitles" placeholder="Subtitles Avaliable" name="subtitles" value="<?php echo $movie['subtitles']; ?>" />
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea id="description" cols="100" rows="7" placeholder="Movie Description" name="description" value="<?php echo $movie['description']; ?>"></textarea>
    </div>
    <div class="form-group">
      <label for="shortdescription">Short Description</label>
      <textarea id="shortdescription" cols="100" rows="7" placeholder="Short Description" name="shortdescription" value="<?php echo $movie['shortDescription']; ?>"></textarea>
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" id="price" placeholder="Movie Price" name="price" value="<?php echo $movie['price']; ?>" />
    </div>

    <div class="form-group confirm_details-btn">
      <input type="submit" value="Confirm Movie Details" id="confirm-btn" />
    </div>
    <div class="form-group confirm_details-btn">
      <a href="./AdminMovieDashboard.php"><input type="button" value="Cancel" id="cancel-btn" /></a>
    </div>
  </form>

  <script src="../validations/AddMovieForm.js"></script>
</body>

</html>