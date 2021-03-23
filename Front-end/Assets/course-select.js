//Finds the select menu in the document
var currentCourse = document.getElementById("courses-select");
console.log(currentCourse.value);

//Event listener for the select menu
currentCourse.addEventListener("change", function () {
  console.log(currentCourse.value);
});
