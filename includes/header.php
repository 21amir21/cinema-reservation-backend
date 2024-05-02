<?php
session_start();

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Optional JavaScript for dropdown functionality
  document.addEventListener("DOMContentLoaded", function() {
    var dropdowns = document.querySelectorAll(".dropdown-toggle");
    dropdowns.forEach(function(dropdown) {
      dropdown.addEventListener("click", function(e) {
        e.preventDefault();
        this.parentNode
          .querySelector(".dropdown-menu")
          .classList.toggle("show");
      });
    });

    window.addEventListener("click", function(e) {
      dropdowns.forEach(function(dropdown) {
        if (!dropdown.contains(e.target)) {
          dropdown.parentNode
            .querySelector(".dropdown-menu")
            .classList.remove("show");
        }
      });
    });
  });
</script>
<header>
  <nav>
    <p class="logo"></p>
    &nbsp;
    <i class="fa fa-bars" id="menu"></i>

    <ul>
      <li><a href="/">Home</a></li>
      <!-- <li><a href="/views/what's_on.html">Movies</a></li> -->
      <li class="nav-item dropdown">
        <a href="/views/what's_on.html" class="nav-link dropdown-toggle">Movies</a>
        <ul class="dropdown-menu">
          <li><a href="/views/what's_on.html">What's On</a></li>
          <li><a href="/views/comingSoon.html">Coming Soon</a></li>
        </ul>
      </li>
      <li><a href="/views/offers.html">Offers</a></li>
      <li><a href="/views/contact-us.html">Contact Us</a></li>
    </ul>
    <!-- <div class="sign-in-up">
      <a href="/views/login.html"><button class="login-btn">Login</button></a>
      <a href="/views/registration.html"><button class="login-btn">Sign Up</button></a>
    </div> -->
    <?php
    // Check if user is logged in
    if (isset($_SESSION['customer'])) {
      $firstName = $_SESSION['customer']['customerName'];
      // Display welcome message with the user's name
      echo "<p>Welcome, $firstName</p>";
    } else {
      // Display login and sign up buttons
      echo '<div class="sign-in-up">
          <a href="/views/login.html"><button class="login-btn">Login</button></a>
          <a href="/views/registration.html"><button class="login-btn">Sign Up</button></a>
        </div>';
    }
    ?>
    <div>
      <img id="pazas-logo" src="./../images/pazas3.png" alt="" />
    </div>
  </nav>
</header>