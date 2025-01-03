
///////////////////////////////////////////////// script.js ////////////////////////////////////////////////////////////

/* show first alert after open the website */
// window.onload = function() {
//   alert("Welcome To Kolkata Kravings");
// };

function showOptions() {
    var options = document.getElementById("dropdown");
    if (options.style.display === "none") {
      options.style.display = "block";
    } else {
      options.style.display = "none";
    }
  }

/*contact us */

const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});
