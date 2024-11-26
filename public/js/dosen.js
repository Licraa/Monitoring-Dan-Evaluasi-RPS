// Sidebar toggle functionality
document
  .querySelector(".toggle-sidebar")
  .addEventListener("click", function () {
    document
      .querySelector(".dashboard-container")
      .classList.toggle("sidebar-collapsed");
  });

// Fungsi untuk menampilkan atau menyembunyikan submenu RPS
document.addEventListener("DOMContentLoaded", function () {
  const menuRPS = document.getElementById("menuRPS");
  const unggahRpsMenu = document.getElementById("unggahRpsMenu");
  const chevronIcon = document.querySelector("#menuRPS .chevron-icon");
  const cardRPS = document.querySelector(
    '.custom-card-link[href="unggah-rps.html"]'
  );

  // Set initial visibility based on localStorage
  const isSubmenuVisible = localStorage.getItem("submenuVisible") === "true";
  unggahRpsMenu.style.display = isSubmenuVisible ? "block" : "none";
  chevronIcon.classList.toggle("bi-chevron-down", isSubmenuVisible);
  chevronIcon.classList.toggle("bi-chevron-left", !isSubmenuVisible);

  // Toggle submenu and save state in localStorage
  menuRPS.addEventListener("click", function (event) {
    event.preventDefault();
    const isHidden = unggahRpsMenu.style.display === "none";

    // Update visibility and classes
    unggahRpsMenu.style.display = isHidden ? "block" : "none";
    chevronIcon.classList.toggle("bi-chevron-left", !isHidden);
    chevronIcon.classList.toggle("bi-chevron-down", isHidden);

    // Save visibility state
    localStorage.setItem("submenuVisible", isHidden);
  });

  // Prevent event bubbling for submenu item
  unggahRpsMenu.addEventListener("click", function (event) {
    event.stopPropagation(); // Prevents closing on submenu item click
  });

  // Handle click on the RPS card
  cardRPS.addEventListener("click", function () {
    // Ensure submenu "Unggah RPS" is visible
    unggahRpsMenu.style.display = "block";
    chevronIcon.classList.add("bi-chevron-down");
    chevronIcon.classList.remove("bi-chevron-left");

    // Add active class to submenu
    unggahRpsMenu.classList.add("active-submenu");

    // Save state in localStorage
    localStorage.setItem("submenuVisible", true);
  });
});

// Highlight active menu item based on current URL
document.addEventListener("DOMContentLoaded", function () {
  const currentUrl = window.location.pathname;
  const unggahRpsMenu = document.getElementById("unggahRpsMenu");

  // Reset active class before applying to prevent duplication
  const activeElements = document.querySelectorAll(".active-submenu");
  activeElements.forEach((el) => el.classList.remove("active-submenu"));

  // Apply active class to the matching submenu item
  if (currentUrl.includes("unggah-rps.html")) {
    unggahRpsMenu.classList.add("active-submenu");
  }
});
