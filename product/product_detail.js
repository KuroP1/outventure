function ShowMobileMainMenu() {
  var mobileMenu = document.getElementById("mobile-sub-navbar-middle");

  if (mobileMenu.style.transform === "translateY(25%)") {
    mobileMenu.style.transform = "translateY(0%)";
    mobileMenu.style.zIndex = "-1";
  } else {
    mobileMenu.style.transform = "translateY(25%)";
    mobileMenu.style.zIndex = "1";
  }

  console.log("object");
}
