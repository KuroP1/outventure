function MenuDisplay(link) {
  var personalInfromation = document.getElementById(
    "right-container-personal-information"
  );
  var orderHistory = document.getElementById("right-container-order-history");
  var favourite = document.getElementById("right-container-favourite");
  var menuText1 = document.getElementById("menu-text-1");
  var menuText3 = document.getElementById("menu-text-3");
  var menuText4 = document.getElementById("menu-text-4");
  var mobileMenuText1 = document.getElementById("mobile-menu-text-1");
  var mobileMenuText3 = document.getElementById("mobile-menu-text-3");
  var mobileMenuText4 = document.getElementById("mobile-menu-text-4");

  if (link === "pi" && personalInfromation.style.display === "none") {
    personalInfromation.style.display = "block";
    orderHistory.style.display = "none";
    favourite.style.display = "none";
    menuText1.style.color = "#387D6B";
    menuText3.style.color = "#000000";
    menuText4.style.color = "#000000";
    mobileMenuText1.style.color = "#232323";
    mobileMenuText1.style.backgroundColor = "#FFFFFF";
    mobileMenuText3.style.color = "#FFFFFF";
    mobileMenuText3.style.backgroundColor = "#232323";
  } else if (link === "oh" && orderHistory.style.display === "none") {
    personalInfromation.style.display = "none";
    orderHistory.style.display = "block";
    favourite.style.display = "none";
    menuText1.style.color = "#000000";
    menuText3.style.color = "#387D6B";
    menuText4.style.color = "#000000";
    mobileMenuText1.style.color = "#FFFFFF";
    mobileMenuText1.style.backgroundColor = "#232323";
    mobileMenuText3.style.color = "#232323";
    mobileMenuText3.style.backgroundColor = "#FFFFFF";
  } else if (link === "fp" && favourite.style.display === "none") {
    personalInfromation.style.display = "none";
    orderHistory.style.display = "none";
    favourite.style.display = "block";
    menuText1.style.color = "#000000";
    menuText3.style.color = "#000000";
    menuText4.style.color = "#387D6B";
    mobileMenuText1.style.color = "#FFFFFF";
    mobileMenuText1.style.backgroundColor = "#232323";
    mobileMenuText3.style.color = "#232323";
    mobileMenuText3.style.backgroundColor = "#FFFFFF";
  }
}

function EditProfile() {
  var nameInput = document.getElementById("name-input");
  var emailInput = document.getElementById("email-text");
  editBtm = document.getElementById("edit-button");
  if (editBtm.innerHTML === "Done") {
    nameInput.disabled = true;
    nameInput.classList.remove("name-input-edit");
    emailInput.disabled = true;
    emailInput.classList.remove("email-text-edit");
    editBtm.innerHTML = "Edit";
  } else {
    nameInput.disabled = false;
    nameInput.classList.add("name-input-edit");

    emailInput.disabled = false;
    emailInput.classList.add("email-text-edit");
    editBtm = document.getElementById("edit-button");
    editBtm.innerHTML = "Done";
  }
}

function ShowMobileMenu() {
  var mobileMenu = document.getElementById("mobile-menu-container");

  if (mobileMenu.style.transform === "translateX(-100%)") {
    mobileMenu.style.transform = "translateX(0%)";
  } else {
    mobileMenu.style.transform = "translateX(-100%)";
  }
}
