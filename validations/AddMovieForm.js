// All  input values in form
const form = document.querySelector("#submit-form");
const posterInput = document.getElementById("poster");
const backgroundimageInput = document.getElementById("backgroundimage");
const trailerInput = document.getElementById("trailer");
const movienameInput = document.getElementById("moviename");
const directornameInput = document.getElementById("directorname");
const releasedateInput = document.getElementById("releasedate");
const genre1Input = document.getElementById("genre1");
const genre2Input = document.getElementById("genre2");
const genre3Input = document.getElementById("genre3");
const ratingInput = document.getElementById("rating");
const ageratingInput = document.getElementById("agerating");
const runningtimeInput = document.getElementById("runningtime");
const languageInput = document.getElementById("language");
const subtitleInput = document.getElementById("subtitles");
const descriptionInput = document.getElementById("description");
const shortdescriptionInput = document.getElementById("shortdescription");
const priceInput = document.getElementById("price");

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
  const backgroundimage = backgroundimageInput.value.trim();
  const trailer = trailerInput.value.trim();
  const moviename = movienameInput.value.trim();
  const directorname = directornameInput.value.trim();
  const releasedate = releasedateInput.value.trim();
  const genre1 = genre1Input.value.trim();
  const genre2 = genre2Input.value.trim();
  const genre3 = genre3Input.value.trim();
  const rating = ratingInput.value.trim();
  const agerating = ageratingInput.value.trim();
  const runningtime = runningtimeInput.value.trim();
  const language = languageInput.value.trim();
  const subtitle = subtitleInput.value.trim();
  const description = descriptionInput.value.trim();
  const shortdescription = shortdescriptionInput.value.trim();
  const price = priceInput.value.trim();

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
  if (backgroundimage === "") {
    showError(backgroundimageInput, "Background Image Required");
  }
  if (trailer === "") {
    showError(trailerInput, "Trailer Required");
  }
  if (moviename === "") {
    showError(movienameInput, "Movie Name Required");
  }
  if (directorname === "") {
    showError(directornameInput, "Director Name Required");
  }
  if (releasedate === "") {
    showError(releasedateInput, "Release Date Required");
  }
  if (genre1 === "") {
    showError(genre1Input, "Genre Required");
  }
  if (genre2 === "") {
    showError(genre2Input, "Genre Required");
  }
  if (genre3 === "") {
    showError(genre3Input, "Genre Required");
  }
  if (rating === "") {
    showError(ratingInput, "Rating Required");
  }
  if (agerating === "") {
    showError(ageratingInput, "Age Rating Required");
  }
  if (runningtime === "") {
    showError(runningtimeInput, "Running Time Required");
  }
  if (language === "") {
    showError(languageInput, "Language Required");
  }
  if (subtitle === "") {
    showError(subtitleInput, "Subtitle Required");
  }
  if (description === "") {
    showError(descriptionInput, "Description Required");
  }
  if (shortdescription === "") {
    showError(shortdescriptionInput, "Description Required");
  }
  if (price === "") {
    showError(priceInput, "Price Required");
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
