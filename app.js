const close = document.querySelector(".close");
const open = document.querySelector(".ham");
const menu = document.querySelector(".menu");
close.addEventListener("click", () => {
  menu.style.visibility = "hidden";
});
open.addEventListener("click", () => {
  menu.style.visibility = "visible";
});

fetch("products.json")
.then(function(response){
  return response.json();
})

.then(function(products){
  let placeholder = document.queryselector("#Card-wrapper");
  

  let out = "";

  for(let product of products){
    out += `
      <tr>

      // <td> <img src = '${product.image}'> </td>

      <td> ${product.Desription} </td>
    `

    ;
  }
})


// document.addEventListener("DOMContentLoaded", function () {
//     // Check local storage for the previous state, if available.
//     const isDiv2Visible = localStorage.getItem("isDiv2Visible") === "true";
    
//     // Get references to the divs and the button.
//     const div1 = document.getElementById("div1");
//     const div2 = document.getElementById("div2");
//     const toggleButton = document.getElementById("toggleButton");
    
//     // Function to toggle the visibility of the divs.
//     function toggleDivs() {
//         if (div2.classList.contains("hidden")) {
//             div1.classList.add("hidden");
//             div2.classList.remove("hidden");
//         } else {
//             div1.classList.remove("hidden");
//             div2.classList.add("hidden");
//         }
        
//         // Store the current state in local storage.
//         localStorage.setItem("isDiv2Visible", !div2.classList.contains("hidden"));
//     }
    
//     // Add a click event listener to the button.
//     toggleButton.addEventListener("click", toggleDivs);
    
//     // Set the initial visibility based on the local storage value.
//     if (isDiv2Visible) {
//         div1.classList.add("hidden");
//         div2.classList.remove("hidden");
//     } else {
//         div1.classList.remove("hidden");
//         div2.classList.add("hidden");
//     }
// });




$(document).ready(function() {
  // Hide the after-search class initially
  $(".after-search").hide();

  // When the "Search" button is clicked
  $("button[name='save']").click(function(e) {
    e.preventDefault(); // Prevent the form from submitting (assuming this button is inside a form)

    // Toggle the visibility of the initial and after-search classes
    $(".initial").toggle();
    $(".after-search").toggle();
  });
});


