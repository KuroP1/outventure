function MenuDisplay(link) {
    var personalInfromation = document.getElementById("right-container-personal-information")
    var billPayment = document.getElementById("right-container-bill-payment")
    var orderHistory = document.getElementById("right-container-order-history")
    var giftCard = document.getElementById("right-container-gift-cards")
    var menuText1 = document.getElementById("menu-text-1")
    var menuText2 = document.getElementById("menu-text-2")
    var menuText3 = document.getElementById("menu-text-3")
    var menuText4 = document.getElementById("menu-text-4")

    if (link === "pi" && personalInfromation.style.display === "none") {
        personalInfromation.style.display = "block";
        billPayment.style.display = "none";
        orderHistory.style.display = "none";
        giftCard.style.display = "none";
        menuText1.style.color = "#387D6B"
        menuText2.style.color = "#000000"
        menuText3.style.color = "#000000"
        menuText4.style.color = "#000000"
    } 
    else if (link === "bp" && billPayment.style.display === "none") {
        personalInfromation.style.display = "none";
        billPayment.style.display = "block";
        orderHistory.style.display = "none";
        giftCard.style.display = "none";
        menuText1.style.color = "#000000"
        menuText2.style.color = "#387D6B"
        menuText3.style.color = "#000000"
        menuText4.style.color = "#000000"
    } else if (link === "oh" && orderHistory.style.display === "none") {
        personalInfromation.style.display = "none";
        billPayment.style.display = "none";
        orderHistory.style.display = "block";
        giftCard.style.display = "none";
        menuText1.style.color = "#000000"
        menuText2.style.color = "#000000"
        menuText3.style.color = "#387D6B"
        menuText4.style.color = "#000000"
    } else if (link === "gc" && giftCard.style.display === "none") {
        personalInfromation.style.display = "none";
        billPayment.style.display = "none";
        orderHistory.style.display = "none";
        giftCard.style.display = "block";
        menuText1.style.color = "#000000"
        menuText2.style.color = "#000000"
        menuText3.style.color = "#000000"
        menuText4.style.color = "#387D6B"
    }
}