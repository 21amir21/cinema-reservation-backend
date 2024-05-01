// document.addEventListener("DOMContentLoaded", () => {
//   const loginForm = document.querySelector(".login form");
//   const emailInput = document.querySelector("input[type='text']");
//   const passwordInput = document.querySelector("input[type='password']");

//   loginForm.addEventListener("submit", (e) => {
//     e.preventDefault(); // Prevent form submission

//     // Check if email and password are not empty
//     if (emailInput.value.trim() === "") {
//       alert("Please enter your email.");
//       emailInput.focus();
//       return;
//     }

//     if (passwordInput.value.trim() === "") {
//       alert("Please enter your password.");
//       passwordInput.focus();
//       return;
//     }

//     // If both fields are filled, you can proceed with form submission
//     // For now, I'm just alerting to indicate that validation is successful
//     alert("Validation successful. Logging in...");
//   });
// });

const form = document.querySelector("form");
const passwordInput = document.getElementById("password");
const passToggleBtn = document.getElementById("pass-toggle-btn");

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
  const emailInput = document.getElementById("email");

  // Getting trimmed values from input fields
  const email = emailInput.value.trim();
  const password = passwordInput.value.trim();

  // Regular expression pattern for email validation
  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  // Clearing previous error messages
  document
    .querySelectorAll(".form-group .error")
    .forEach((field) => field.classList.remove("error"));
  document
    .querySelectorAll(".error-text")
    .forEach((errorText) => errorText.remove());

  // Performing validation checks
  if (!emailPattern.test(email)) {
    showError(emailInput, "Enter a valid email address");
  }
  if (password === "") {
    showError(passwordInput, "Enter your password");
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

// Handling form submission event
form.addEventListener("submit", handleFormData);
