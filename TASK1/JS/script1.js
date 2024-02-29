
// Loading variables with form inputs
const fName = document.querySelector("#fName");
const lName = document.querySelector("#lName");
const fullName = document.querySelector("#fullName");

function concatName() {
  // Function to concatenate first name with last name and update the fullname.
  fullName.value = fName.value + " " + lName.value;
}

// Invoke concatName function on input event.
fName.addEventListener("input", concatName);
lName.addEventListener("input", concatName);
