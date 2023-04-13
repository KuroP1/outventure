function MenuDisplay(link) {
    var personalInfromation = document.getElementById("right-container-personal-information")
    var orderHistory = document.getElementById("right-container-order-history")
    var menuText1 = document.getElementById("menu-text-1")
    var menuText3 = document.getElementById("menu-text-3")
    var mobileMenuText1 = document.getElementById("mobile-menu-text-1")
    var mobileMenuText3 = document.getElementById("mobile-menu-text-3")

    if (link === "pi" && personalInfromation.style.display === "none") {
        personalInfromation.style.display = "block";
        orderHistory.style.display = "none";
        menuText1.style.color = "#387D6B"
        menuText3.style.color = "#000000"
        mobileMenuText1.style.color = "#232323"
        mobileMenuText1.style.backgroundColor = "#FFFFFF"
        mobileMenuText3.style.color = "#FFFFFF"
        mobileMenuText3.style.backgroundColor = "#232323"
    } else if (link === "oh" && orderHistory.style.display === "none") {
        personalInfromation.style.display = "none";
        orderHistory.style.display = "block";
        menuText1.style.color = "#000000"
        menuText3.style.color = "#387D6B"
        mobileMenuText1.style.color = "#FFFFFF"
        mobileMenuText1.style.backgroundColor = "#232323"
        mobileMenuText3.style.color = "#232323"
        mobileMenuText3.style.backgroundColor = "#FFFFFF"
    }
}

function ShowMobileMenu() {
    var mobileMenu = document.getElementById("mobile-menu-container")

    if (mobileMenu.style.transform === "translateX(-100%)") {
        mobileMenu.style.transform = "translateX(0%)"
    } else {
        mobileMenu.style.transform = "translateX(-100%)"
    }
}