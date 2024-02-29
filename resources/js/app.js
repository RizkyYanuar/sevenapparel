import "./bootstrap";
import "flowbite";

const hamburgerMenu = document.querySelector(".hamburger-menu");
const adminPanel = document.querySelector(".admin-panel");
hamburgerMenu.addEventListener("mouseover", function () {
    adminPanel.style.display = "block";
});
hamburgerMenu.addEventListener("mouseout", function () {
    adminPanel.style.display = "none";
});
adminPanel.addEventListener("mouseover", function () {
    adminPanel.style.display = "block";
});
adminPanel.addEventListener("mouseout", function () {
    adminPanel.style.display = "none";
});