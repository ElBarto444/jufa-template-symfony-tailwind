/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.css";
import "flowbite";

document.addEventListener("DOMContentLoaded", function () {
  const dropdownTrigger = document.getElementById("dropdownHoverButton1");
  const dropdownMenu = document.getElementById("dropdownHover1");

  dropdownTrigger.addEventListener("mouseenter", function () {
    dropdownMenu.classList.remove("fade-out");
    dropdownMenu.classList.add("fade-in");
  });

  dropdownTrigger.addEventListener("mouseleave", function () {
    dropdownMenu.classList.remove("fade-in");
    dropdownMenu.classList.add("fade-out");
  });
});
