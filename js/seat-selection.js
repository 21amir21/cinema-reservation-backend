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
submitButton.addEventListener("click", function getSelectedSeats(e) {
  e.preventDefault();
  let selectedSeatsIds = [];
  let selectedSeats = document.getElementsByClassName("selected");
  for (let seat of selectedSeats) {
    let id = seat.getAttribute("id");
    let idInt = parseInt(id);
    selectedSeatsIds.push(idInt);
  }
  if (selectedSeatsIds.length) {
    fetch("../data/getSelectedSeats.php", {
      method: "POST",
      body: JSON.stringify(selectedSeatsIds),
      headers: {
        "Content-Type": "application/json; charset=UTF-8"
      }
    }).then(res => {
      console.log("Request complete! response:", res.json());
      console.log(selectedSeatsIds);
    });
  } else {
    alert("Please select at least 1 seat");
  }
});

