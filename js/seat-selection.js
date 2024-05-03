const seats = document.querySelectorAll(".seats");

for (let seat of seats) {
  seat.setAttribute("isClicked", false);
}

for (let seat of seats) {
  seat.addEventListener("click", function (e) {
    e.preventDefault();
    let isClicked = seat.getAttribute("isClicked");
    let isBooked = seat.classList.contains("booked");
    if (isBooked) {
      return;
    }
    if (isClicked === "false") {
      seat.setAttribute("isClicked", true);
      seat.classList.add("selected");
    }
    if (isClicked === "true") {
      seat.setAttribute("isClicked", false);
      seat.classList.remove("selected");
    }
  });
}

let submitButton = document.getElementById("seatSubmission");
submitButton.addEventListener("click", function getSelectedSeats() {
  let selectedSeatsIds = [];
  let selectedSeats = document.getElementsByClassName("selected");
  for (let seat of selectedSeats) {
    let id = seat.getAttribute("id");
    let idInt = parseInt(id);
    selectedSeatsIds.push(idInt);
  }
  if (selectedSeatsIds.length) {
    let arrayIDs = { ids: selectedSeatsIds };
    // let queryString =
    //   "ids=" + encodeURIComponent(JSON.stringify(selectedSeatsIds));
    fetch("localhost/views/seat-selection.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=UTF-8",
      },
      body: JSON.stringify(arrayIDs),
    })
      .then((res) => res.text())
      .then((data) => {
        console.log("Request complete! response:", data);
        // Proceed with further processing if needed
      })
      .catch((err) => {
        console.error("Error:", err);
      });
  } else {
    alert("Please select at least 1 seat");
  }
});
