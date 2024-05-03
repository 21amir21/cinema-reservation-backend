<?php

require __DIR__ . "/../data/validate.php";

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);

$poster = $_POST["poster"];
$backgroundimage = $_POST["backgroundimage"];
$trailer = $_POST["trailer"];
$moviename = $_POST["moviename"];
$directorname = $_POST["directorname"];
$releasedate = $_POST["releasedate"];
$genre1 = $_POST["genre1"];
$genre2= $_POST["genre2"];
$genre3 = $_POST["genre3"];
$rating= $_POST["rating"];
$agerating= $_POST["agerating"];
$runningtime= $_POST["runningtime"];
$language = $_POST["language"];
$subtitles= $_POST["subtitles"];
$description= $_POST["description"];
$shortdescription= $_POST["shortdescription"];
$price= $_POST["price"];

// validataion
$poster = validate($poster);
$backgroundimage = validate($backgroundimage);
$trailer = validate($trailer);
$moviename = validate($moviename);
$directorname = validate($directorname);
$releasedate =validate($releasedate);
$genre1 = validate($genre1);
$genre2= validate($genre2);
$genre3 = validate($genre3);
$rating= validate($rating);
$agerating= validate($agerating);
$runningtime= validate($runningtime);
$language= validate($language);
$subtitles= validate($subtitles);
$description= validate($description);
$shortdescription= validate($shortdescription);
$price= validate($price);


// Escape variables to protect against SQL injection
$poster = mysqli_real_escape_string($conn, $poster);
$backgroundimage = mysqli_real_escape_string($conn, $backgroundimage);
$trailer = mysqli_real_escape_string($conn, $trailer);
$moviename = mysqli_real_escape_string($conn, $moviename);
$directorname = mysqli_real_escape_string($conn, $directorname);
$releasedate = mysqli_real_escape_string($conn, $releasedate);
$genre1 = mysqli_real_escape_string($conn, $genre1);
$genre2 = mysqli_real_escape_string($conn, $genre2);
$genre3 = mysqli_real_escape_string($conn, $genre3);
$rating = mysqli_real_escape_string($conn, $rating);
$agerating = mysqli_real_escape_string($conn, $agerating);
$runningtime = mysqli_real_escape_string($conn, $runningtime);
$language = mysqli_real_escape_string($conn, $language);
$subtitles = mysqli_real_escape_string($conn, $subtitles);
$description = mysqli_real_escape_string($conn, $description);
$shortdescription = mysqli_real_escape_string($conn, $shortdescription);
$price = mysqli_real_escape_string($conn, $price);

$sql = "INSERT INTO movie( 
    postersURL,
    backgroundImageURL,
    trailerURL,
    name,
    director,
    releaseDate,
    genre,
    genre2,
    genre3,
    rating,
    ageRating,
    runningTime,
    language,
    subtitles,
    description,
    shortDescription,
    price) 
    VALUES('$poster','$backgroundimage','$trailer',
    '$moviename','$directorname','$releasedate',
    '$genre1','$genre2','$genre3',
    '$rating', '$agerating', '$runningtime',
    '$language', '$subtitles', '$description',
    '$shortdescription','$price'
    ) ";
    
$conn->query($sql);

$conn->close();

header("Location: AdminMovieDashboard.php");
