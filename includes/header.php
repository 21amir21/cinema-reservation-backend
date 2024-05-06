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
      <a href="/">
        <p class="logo"></p>
      </a>
      &nbsp;
      <i class="fa fa-bars" id="menu"></i>

      <ul>
        <li><a href="/">Home</a></li>
        <!-- <li><a href="/views/what's_on.html">Movies</a></li> -->
        <li class="nav-item dropdown">
          <a href="/views/what's_on.php" class="nav-link dropdown-toggle">Movies</a>
          <ul class="dropdown-menu">
            <li><a href="/views/what's_on.php">What's On</a></li>
            <li><a href="/views/comingSoon.php">Coming Soon</a></li>
          </ul>
        </li>
        <li><a href="/views/offers.php">Offers</a></li>
        <li><a href="/views/contact-us.html">Contact Us</a></li>
      </ul>
      <?php
      // Check if user is logged in
      if (isset($_SESSION['customer'])) {
        $firstName = $_SESSION['customer']['customerName'];
        // Display welcome message with the user's name
        echo "<p style='margin-right: 10px;' >Welcome, $firstName</p>";
        echo '<a href="/views/accountMenu.php"><button class="login-btn">My Account</button></a>';
        echo '<a href="/data/logout.php"><button class="login-btn">Logout</button></a>';
      } else if (isset($_SESSION['admin'])) {
        $firstName = $_SESSION['admin']['adminName'];
        // Display welcome message with the admin's name
        echo "<p style='margin-right: 10px;' >Welcome, $firstName</p>";
        echo '<a href="/admin/AdminMovieDashboard.php"><button class="login-btn">My Account</button></a>';
        echo '<a href="/data/logout.php"><button class="login-btn">Logout</button></a>';
      } else {
        // Display login and sign up buttons
        echo '<div class="sign-in-up">
            <a href="/views/login.php"><button class="login-btn">Login</button></a>
            <a href="/views/registration.html"><button class="login-btn">Sign Up</button></a>
          </div>';
      }
      ?>
     
    </nav>
  </header>