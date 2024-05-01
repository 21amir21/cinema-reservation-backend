// All  input values in form
const form = document.querySelector("#submit-form");
const firstnameInput = document.getElementById("firstname");
const surnameInput = document.getElementById("surname");
const emailInput = document.getElementById("email");
const mobilephoneInput = document.getElementById("mobilephone");

// payment specific inputs
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

const confirmBtn = document.querySelector("#confirm-btn");
confirmBtn.addEventListener("click", () => {
  validatePrevious();
});

function validatePrevious() {
  // Getting trimmed values from input fields
  const firstname = firstnameInput.value.trim();
  const surname = surnameInput.value.trim();
  const email = emailInput.value.trim();
  const mobilephone = mobilephoneInput.value.trim();

  // Regular expression pattern for email validation
  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  // Regular expression pattern for mobile validation
  const telephonePattern = /^[+]\d{12}$/;

  // Clearing previous error messages
  document
    .querySelectorAll(".form-group .error")
    .forEach((field) => field.classList.remove("error"));
  document
    .querySelectorAll(".error-text")
    .forEach((errorText) => errorText.remove());

  // Performing validation checks
  if (firstname === "") {
    showError(firstnameInput, "Enter your First name");
  }
  if (surname === "") {
    showError(surnameInput, "Enter your Surname");
  }
  if (!emailPattern.test(email)) {
    showError(emailInput, "Enter a valid email address");
  }
  if (!telephonePattern.test(mobilephone)) {
    showError(mobilephoneInput, "Enter a valid mobile phone");
  }
  const errorInputs = document.querySelectorAll(".form-group .error");
  if (errorInputs.length === 0) {
    $(".confirm_details-btn").click(function () {
      $(".payment-form").slideDown();
      $(".cancel-btn-1").remove();
    });
  }
}

// Function to handle form submission // checks for errors
const handleFormData = (e) => {
  e.preventDefault();

  // payment specific values
  const cardnumber = cardnumberInput.value.trim();
  const expirydate = expirydateInput.value.trim();
  const cardsecuritycode = cardsecuritycodeInput.value.trim();
  const offercode = offercodeInput.value.trim();

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

  if (!cardnumberPattern.test(cardnumber)) {
    showError(cardnumberInput, "Enter a valid card number");
  }
  if (!expirydatePattern.test(expirydate)) {
    showError(expirydateInput, "Enter a valid expiry date");
  }
  if (!cardsecurtycodePattern.test(cardsecuritycode)) {
    showError(cardsecuritycodeInput, "Enter a valid card security code");
  }
  if (!(offercode === "" || offercode === "Offer4")) {
    showError(offercodeInput, "Enter a valid offer code");
  }

  // Checking for any remaining errors before form submission
  const errorInputs = document.querySelectorAll(".form-group .error");
  if (errorInputs.length > 0) return;

  // Submitting the form
  form.submit();
  alert("Payment Successfull!");
};

// Handling form submission event
form.addEventListener("submit", handleFormData);
