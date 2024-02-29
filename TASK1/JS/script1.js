
// Loading variables with form inputs
const fname = document.querySelector("#fname");
const lname = document.querySelector("#lname");
const fullName = document.querySelector("#fullName");

function concatName() {
  // Function to concatenate first name with last name and update the fullname.
  fullName.value = fname.value + " " + lname.value;
}

// Invoke concatName function on input event.
fname.addEventListener("input", concatName);
lname.addEventListener("input", concatName);
