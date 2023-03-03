function MenuDisplay(link) {
    var personalInfromation = document.getElementById("right-container-personal-information")
    var billPayment = document.getElementById("right-container-bill-payment")
    var orderHistory = document.getElementById("right-container-order-history")
    var giftCard = document.getElementById("right-container-gift-cards")

    console.log(document.getElementById("right-container-personal-information").style.display)

    if (link === "pi" && personalInfromation.style.display === "none") {
        personalInfromation.style.display = "block";
        billPayment.style.display = "none";
        orderHistory.style.display = "none";
        giftCard.style.display = "none";
    } 
    else if (link === "bp" && billPayment.style.display === "none") {
        personalInfromation.style.display = "none";
        billPayment.style.display = "block";
        orderHistory.style.display = "none";
        giftCard.style.display = "none";
    } else if (link === "oh" && orderHistory.style.display === "none") {
        personalInfromation.style.display = "none";
        billPayment.style.display = "none";
        orderHistory.style.display = "block";
        giftCard.style.display = "none";
    } else if (link === "gc" && giftCard.style.display === "none") {
        personalInfromation.style.display = "none";
        billPayment.style.display = "none";
        orderHistory.style.display = "none";
        giftCard.style.display = "block";
    }
}