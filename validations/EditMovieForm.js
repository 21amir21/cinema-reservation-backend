// All  input values in form
const form = document.querySelector("#submit-form");
const posterInput = document.getElementById("poster");
const trailerInput = document.getElementById("trailer");
const movienameInput = document.getElementById("moviename");
const releasedateInput = document.getElementById("releasedate");
const genreInput = document.getElementById("genre");
const runningtimeInput = document.getElementById("runningtime");
const descriptionInput = document.getElementById("description");

// Function to display error messages
const showError = (field, errorText) => {
  field.classList.add("error");
  const errorElement = document.createElement("small");
  errorElement.classList.add("error-text");
  errorElement.innerText = errorText;
  field.closest(".form-group").appendChild(errorElement);
};

// Function to handle form submission // checks for errors
const handleFormData = (e) => {
  e.preventDefault();

  // trimmed values from inputs
  const poster = posterInput.value.trim();
  const trailer = trailerInput.value.trim();
  const moviename = movienameInput.value.trim();
  const releasedate = releasedateInput.value.trim();
  const genre = genreInput.value.trim();
  const runningtime = runningtimeInput.value.trim();
  const description = descriptionInput.value.trim();

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
  if (trailer === "") {
    showError(trailerInput, "Trailer Required");
  }
  if (moviename === "") {
    showError(movienameInput, "Movie Name Required");
  }

  if (releasedate === "") {
    showError(releasedateInput, "Release Date Required");
  }
  if (genre === "") {
    showError(genreInput, "Genre Required");
  }
  if (runningtime === "") {
    showError(runningtimeInput, "Running Time Required");
  }

  if (description === "") {
    showError(descriptionInput, "Description Required");
  }

  // Checking for any remaining errors before form submission
  const errorInputs = document.querySelectorAll(".form-group .error");
  if (errorInputs.length > 0) return;

  // Submitting the form
  form.submit();
  alert("Movie Details Edited Successfully!");
};

// Handling form submission event
form.addEventListener("submit", handleFormData);
