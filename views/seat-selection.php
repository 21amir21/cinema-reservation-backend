<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Seat Selection</title>
  <link rel="stylesheet" href="../styles/seat-selection.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<?php
require __DIR__ . "/../data/gettingSeatsFromDatabase.php";
$bookedSeats = gettingSeatsFromDatabase(1);
$seatNumber = 0;
?>

<body>
  <div id="main-container">
    <div id="screen"></div>
    <div id="seats-container">
      <div id="row0">
        <div id="0" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="1" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="2" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="3" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="4" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="5" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="6" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="7" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="8" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="9" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
      </div>
      <div id="row1">
        <div id="10" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="11" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="12" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="13" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="14" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="15" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="16" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="17" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="18" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="19" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
      </div>
      <div id="row2">
        <div id="20" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="21" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="22" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="23" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="24" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="25" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="26" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="27" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="28" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="29" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
      </div>
      <div id="row3">
        <div id="30" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="31" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="32" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="33" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="34" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="35" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="36" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="37" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="38" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="39" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
      </div>
      <div id="row4">
        <div id="40" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="41" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="42" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="43" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="44" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="45" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="46" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="47" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="48" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="49" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
      </div>
      <div id="row5">
        <div id="50" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="51" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="52" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="53" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="54" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="55" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="56" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="57" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="58" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
        <div id="59" class="seats<?php if ($bookedSeats[$seatNumber++]) echo ' booked'; ?>"></div>
      </div>
    </div>
    <div style="width: 700px; align-self: center; justify-content: space-between">
      <a href="../views/upFromThePoppyHill.html"><button type="button" class="book" style="float: left">
          Cancel
        </button></a>
      <a href="../views/Payment.html"><button type="button" class="book" style="float: right">
          Proceed to Payment
        </button></a>
    </div>
  </div>

  <script src="../js/seat-selection.js"></script>
</body>

</html>