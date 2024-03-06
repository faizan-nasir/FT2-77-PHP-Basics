// Loading variables with form inputs
const fname = document.querySelector("#fname");
const lname = document.querySelector("#lname");
const fullname = document.querySelector("#fullname");

function concat_name() {
  // Function to concatenate first name with last name and update the fullname.
  fullname.value = fname.value + " " + lname.value;
}

// Invoke concatName function on input event.
fname.addEventListener("input", concat_name);
lname.addEventListener("input", concat_name);
