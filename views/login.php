<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login</title>
  <!-- Fontawesome CDN Link For Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!---Custom CSS File--->
  <link rel="stylesheet" href="./../styles/login.css" />
</head>

<body>
  <div class="container">
    <div class="login form">
      <header>Login</header>
      <form action="/data/login.php" method="POST">
        <div class="radio-box">
          <div class="customer-radio-box">
            <input type="radio" class="btn-check" name="user-type" id="option5" autocomplete="off" checked value="Customer" />
            <label class="btn" for="option5">Customer</label>
          </div>
          <div class="admin-radio-box">
            <input type="radio" class="btn-check" name="user-type" id="option6" autocomplete="off" value="Admin" />
            <label class="btn" for="option6">Admin</label>
          </div>
        </div>
        <div class="form-group email">
          <label for="email">Email Address</label>
          <input type="text" id="email" placeholder="Enter your email address" name="emailAddress" />
        </div>
        <div class="form-group password">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Enter your password" name="password" />
          <i id="pass-toggle-btn" class="fa-solid fa-eye-slash"></i>
        </div>
        <a href="">Forgot password?</a>
        <input type="submit" class="button" value="Login" />
        <a href="/"><input type="button" class="button" value="Cancel" /></a>
        <!-- 5alyy balk mn el 7eta dy  -->
        <input type="hidden" id="user-type" name="user-type" value="Customer" />
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
          <a href="registration.html">Signup</a>
        </span>
      </div>
    </div>
  </div>
  <script src="./../validations/login.js"></script>
  <script>
    // JavaScript to update the hidden input field with the selected radio button value
    document.addEventListener("DOMContentLoaded", function() {
      var radioButtons = document.querySelectorAll(".btn-check");
      var hiddenInput = document.getElementById("user-type");

      radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener("click", function() {
          hiddenInput.value = this.value;
        });
      });
    });
  </script>
</body>

</html>

<?php
session_start();
if (isset($_SESSION['redirected']) && $_SESSION['redirected'] == true) {
  echo "<script>alert('Username or Password doesnt exist');</script>";
  // unset or reset the session variable if needed
  unset($_SESSION['redirected']);
}
?>