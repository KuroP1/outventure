var isOpen = false;
function toggleActive() {
  //get burger btn through id
  //get top-menu through id
  const topMenu = document.getElementById("dropdown-container");
  const topSection = document.getElementById("content");
  const burgerBtn = document.getElementById("burger-btn");
  burgerBtn.classList.toggle("active");

  if (!isOpen) {
    //get height of top-section
    console.log(topSection.offsetHeight);
    height = topSection.offsetHeight;
    console.log(height);
    topMenu.style.height = height + "px";
    console.log(topMenu.style.height);
    isOpen = true;
    topMenu.style.zIndex = "50";
    topMenu.style.transitionDuration = "0.5s";
  } else if (isOpen) {
    topMenu.style.height = "0%";
    isOpen = false;
  }

  //if resized window, set top-menu to height of 0
  window.addEventListener("resize", function () {
    if (isOpen) {
      console.log("resize");
      height = topSection.offsetHeight;
      topMenu.style.height = height + "px";
      topMenu.style.transitionDuration = "0s";
    }
    //if windows size is greater than 768px, set top-menu to height of 0
    if (window.innerWidth > 992) {
      if (isOpen) {
        burgerBtn.classList.toggle("active");
        isOpen = false;
        topMenu.style.height = "0%";
      }
    }
  });
}

function toUserManage() {
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");
  userManageBtn.style.color = "#ffb800";
  orderHistoryBtn.style.color = "white";
  productManageBtn.style.color = "white";
}
function toProductManage() {
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");

  productManageBtn.style.color = "#ffb800";
  orderHistoryBtn.style.color = "white";
  userManageBtn.style.color = "white";
}
function toOrderHistory() {
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");
  orderHistoryBtn.style.color = "#ffb800";
  productManageBtn.style.color = "white";
  userManageBtn.style.color = "white";
}

function toProductEdit() {
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");
  productManageBtn.style.color = "#ffb800";
  orderHistoryBtn.style.color = "white";
  userManageBtn.style.color = "white";
  console.log("toProductEdit");
}

function toUserEdit() {
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");
  productManageBtn.style.color = "#ffb800";
  orderHistoryBtn.style.color = "white";
  userManageBtn.style.color = "white";
  console.log("toProductEdit");
}

function toCategory() {
  console.log("toCategory");
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");
  const categoryBtn = document.getElementById("category-btn");
  productManageBtn.style.color = "white";
  orderHistoryBtn.style.color = "white";
  userManageBtn.style.color = "white";
  categoryBtn.style.color = "#ffb800";
}
