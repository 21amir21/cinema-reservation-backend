// All  input values in form
const form = document.querySelector("#submit-form");
const posterInput = document.getElementById("poster");
const movienameInput = document.getElementById("moviename");
const releasedateInput = document.getElementById("releasedate");

// Function to display error messages
const showError = (field, errorText) => {
  field.classList.add("error");
  const errorElement = document.createElement("small");
  errorElement.classList.add("error-text");
  errorElement.innerText = errorText;
  field.closest(".form-group").appendChild(errorElement);
};

const handleFormData = (e) => {
  e.preventDefault();

  // trimmed values from inputs
  const poster = posterInput.value.trim();
  const moviename = movienameInput.value.trim();
  const releasedate = releasedateInput.value.trim();

  // Clearing previous error messages
  document
    .querySelectorAll(".form-group .error")
    .forEach((field) => field.classList.remove("error"));
  document
    .querySelectorAll(".error-text")
    .forEach((errorText) => errorText.remove());

  //validation checks
  if (poster === "") {
    showError(posterInput, "Poster Required");
  }
  if (moviename === "") {
    showError(movienameInput, "Movie Name Required");
  }
  if (releasedate === "") {
    showError(releasedateInput, "Release Date Required");
  }

  // Checking for any remaining errors before form submission
  const errorInputs = document.querySelectorAll(".form-group .error");
  if (errorInputs.length > 0) return;

  // Submitting the form
  form.submit();
  alert("Movie Added Successfully!");
};

// Handling form submission event
form.addEventListener("submit", handleFormData);
