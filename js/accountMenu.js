// Switching Between Tabs
$(document).ready(function () {
  $(".tab").click(function () {
    var tabId = $(this).attr("data-tab");
    $(".tab").removeClass("active");
    $(this).addClass("active");
    $(".tab-content").addClass("hidden");
    $("#" + tabId).removeClass("hidden");
  });
});

// The Button Up
var btn = $("#backToTop");
$(window).on("scroll", function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass("show");
  } else {
    btn.removeClass("show");
  }
});
btn.on("click", function (e) {
  e.preventDefault();
  $("html, body").animate(
    {
      scrollTop: 0,
    },
    500
  );
});

// for update personal info
const form = document.querySelector("form");
const passwordInput = document.getElementById("password");
const passToggleBtn = document.getElementById("pass-toggle-btn");

// for update card info
const cardnumberInput = document.getElementById("cardnumber");
const expirydateInput = document.getElementById("expirydate");
const cardsecuritycodeInput = document.getElementById("cardsecuritycode");
const offercodeInput = document.getElementById("offercode");

// Function to display error messages
const showError = (field, errorText) => {
  field.classList.add("error");
  const errorElement = document.createElement("small");
  errorElement.classList.add("error-text");
  errorElement.innerText = errorText;
  field.closest(".form-group").appendChild(errorElement);
};

// Function to handle form submission
const handleFormData = (e) => {
  e.preventDefault();

  // Retrieving input elements
  const fullnameInput = document.getElementById("fullname");
  const emailInput = document.getElementById("email");
  const dateInput = document.getElementById("date");

  // Getting trimmed values from input fields
  const fullname = fullnameInput.value.trim();
  const email = emailInput.value.trim();
  const password = passwordInput.value.trim();
  const date = dateInput.value;
  const cardnumber = cardnumberInput.value.trim();
  const expirydate = expirydateInput.value.trim();
  const cardsecuritycode = cardsecuritycodeInput.value.trim();

  // Regular expression pattern for email validation
  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  // Regular expression pattern for cardnumber validation
  const cardnumberPattern = /^\d{4}\d{4}\d{4}\d{4}$/;
  // Regular expression pattern for expirydate validation
  const expirydatePattern = /^(0[1-9]|1[0-2])\/([0-9]{4}|[0-9]{2})$/;
  // Regular expression pattern for cardsecuritycode validation
  const cardsecurtycodePattern = /^\d{3}$/;

  // Clearing previous error messages
  document
    .querySelectorAll(".form-group .error")
    .forEach((field) => field.classList.remove("error"));
  document
    .querySelectorAll(".error-text")
    .forEach((errorText) => errorText.remove());

  // Performing validation checks
  if (fullname === "") {
    showError(fullnameInput, "Enter your full name");
  }
  if (!emailPattern.test(email)) {
    showError(emailInput, "Enter a valid email address");
  }
  if (password === "") {
    showError(passwordInput, "Enter your password");
  }
  if (date === "") {
    showError(dateInput, "Select your date of birth");
  }
  if (!cardnumberPattern.test(cardnumber)) {
    showError(cardnumberInput, "Enter a valid card number");
  }
  if (!expirydatePattern.test(expirydate)) {
    showError(expirydateInput, "Enter a valid expiry date");
  }
  if (!cardsecurtycodePattern.test(cardsecuritycode)) {
    showError(cardsecuritycodeInput, "Enter a valid card security code");
  }

  // Checking for any remaining errors before form submission
  const errorInputs = document.querySelectorAll(".form-group .error");
  if (errorInputs.length > 0) return;

  // Submitting the form
  form.submit();
};

// Toggling password visibility
passToggleBtn.addEventListener("click", () => {
  passToggleBtn.className =
    passwordInput.type === "password"
      ? "fa-solid fa-eye"
      : "fa-solid fa-eye-slash";
  passwordInput.type = passwordInput.type === "password" ? "text" : "password";
});

form.addEventListener("submit", handleFormData);
