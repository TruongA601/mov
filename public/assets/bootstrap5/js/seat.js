document.addEventListener("DOMContentLoaded", function () {
  const seats = document.querySelectorAll(".seat");
  const selectedSeatsInput = document.getElementById("selectedSeatsInput");


  var selectedSeats = [];
  var newStatus = "available";

  seats.forEach(seat => {
    seat.addEventListener("click", () => {
      seat.classList.toggle("selected");
      updateSelectedSeats();
    });
  });


  function updateSelectedSeats() {
    const selectedSeatsElements = document.querySelectorAll(".seat.selected");
    selectedSeats = Array.from(selectedSeatsElements).map(seat => seat.getAttribute("data-seat-id"));
    selectedSeatsInput.value = selectedSeats.join(",");
  }

  function updateRadioStatus() {
    statusAvailableButton.style.backgroundColor = newStatus === "available" ? "#6feaf6" : "#444451";
    statusDisabledButton.style.backgroundColor = newStatus === "disabled" ? "#710000" : "#444451";
    statusBookedButton.style.backgroundColor = newStatus === "booked" ? "#b2b2b2" : "#444451";  
    document.getElementById("newStatusInput").value = newStatus;
  }

  function saveSeatStatus() {
    const selectedSeatsElements = document.querySelectorAll(".seat.selected");
    selectedSeatsElements.forEach(seatElement => {
      const seatId = seatElement.getAttribute("data-seat-id");
      const currentStatus = seatElement.classList.contains("disabled") ? "disabled" :
                            seatElement.classList.contains("booked") ? "booked" : "available";

      if (currentStatus !== newStatus) {
        seatElement.classList.remove(currentStatus);
        seatElement.classList.add(newStatus);
      }
    });

    selectedSeatsElements.forEach(seatElement => {
      seatElement.classList.remove("selected");
    });

    document.getElementById("form-seat").submit();
  }
});
// document.addEventListener("DOMContentLoaded", function () {
//   const seats = document.querySelectorAll(".seat");
//   const selectedSeatsInput = document.getElementById("selectedSeatsInput");
//   const saveButton = document.getElementById("saveButton");

//   var selectedSeats = [];
//   var newStatus = "available";

//   seats.forEach(seat => {
//     seat.addEventListener("click", () => {
//       const currentStatus = seat.classList.contains("reserved") ? "reserved" : "available";
                            

//       if (currentStatus !== "reserved") {
//         seat.classList.toggle("selected");
//         updateSelectedSeats();
//       }
//     });
//   });

//   saveButton.addEventListener("click", () => {
//     saveSeatStatus();
//   });

//   function updateSelectedSeats() {
//     const selectedSeatsElements = document.querySelectorAll(".seat.selected");
//     selectedSeats = Array.from(selectedSeatsElements).map(seat => seat.getAttribute("data-seat-id"));
//     selectedSeatsInput.value = selectedSeats.join(",");
//   }

//   function saveSeatStatus() {
//     const selectedSeatsElements = document.querySelectorAll(".seat.selected");
//     selectedSeatsElements.forEach(seatElement => {
//       const seatId = seatElement.getAttribute("data-seat-id");
//       const currentStatus =    seatElement.classList.contains("reserved") ? "reserved" : "available";
                         

//       if (currentStatus !== newStatus) {
//         seatElement.classList.remove(currentStatus);
//         seatElement.classList.add(newStatus);
//       }
//     });

//     selectedSeatsElements.forEach(seatElement => {
//       seatElement.classList.remove("selected");
//     });

   
//     document.getElementById("form-seat").submit();
//   }
// });
