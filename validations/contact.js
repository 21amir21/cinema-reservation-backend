// Retrieving form and input elements
const form = document.querySelector("form");
const nameOfUser = document.getElementById("name");
const email = document.getElementById("email");
const message = document.getElementById("message");

// Regular expression pattern for email validation
const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

// Function to add error message to the specified input
function appendError(parent, errorMessageContent) {
  var errorMessage = document.createElement("p");
  errorMessage.textContent = errorMessageContent;
  errorMessage.classList.add("errorMessage");
  parent.appendChild(errorMessage);
}

// Function to check if there are any errors when submitting
function errorCheck(event) {
  event.preventDefault();
  var canSubmit = true;

  // Clearing previous error messages
  document
    .querySelectorAll(".errorBox")
    .forEach((elem) => elem.classList.replace("errorBox", "noError"));
  document
    .querySelectorAll(".errorMessage")
    .forEach((errorText) => errorText.remove());

  const inputedName = nameOfUser.value.trim();
  const inputedEmail = email.value.trim();
  const inputedMessage = message.value.trim();

  if (inputedName === "") {
    appendError(nameOfUser.parentElement, "Name can not be empty");
    nameOfUser.classList.replace("noError", "errorBox");
    canSubmit = false;
  }
  if (inputedEmail === "") {
    appendError(email.parentElement, "Email can not be empty");
    email.classList.replace("noError", "errorBox");
    canSubmit = false;
  } else if (!emailPattern.test(inputedEmail)) {
    appendError(email.parentElement, "Email is of wrong format");
    email.classList.replace("noError", "errorBox");
    canSubmit = false;
  }
  if (inputedMessage === "") {
    appendError(message.parentElement, "Message can not be empty");
    message.classList.replace("noError", "errorBox");
    canSubmit = false;
  }

  if (canSubmit) {
    form.submit();
  }
}

// Handling form submission event
document.addEventListener("submit", errorCheck);
