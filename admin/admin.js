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
    height = topSection.offsetHeight;
    console.log(height);
    topMenu.style.height = height + "px";
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
  const dropdownContainer = document.getElementById("dropdown-container");
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");
  const userManageSection = document.getElementById("user-manage-section");
  const productManageSection = document.getElementById(
    "product-manage-section"
  );
  const orderHistorySection = document.getElementById("order-history-section");
  dropdownContainer.style.height = "0%";
  userManageBtn.style.color = "#ffb800";
  orderHistoryBtn.style.color = "white";
  productManageBtn.style.color = "white";
  userManageSection.style.width = "100%";
  productManageSection.style.width = "0%";
  orderHistorySection.style.width = "0%";
}
function toProductManage() {
  const dropdownContainer = document.getElementById("dropdown-container");
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");
  const userManageSection = document.getElementById("user-manage-section");
  const productManageSection = document.getElementById(
    "product-manage-section"
  );
  const orderHistorySection = document.getElementById("order-history-section");
  dropdownContainer.style.height = "0%";
  productManageBtn.style.color = "#ffb800";
  orderHistoryBtn.style.color = "white";
  userManageBtn.style.color = "white";
  productManageSection.style.width = "100%";
  userManageSection.style.width = "0%";
  orderHistorySection.style.width = "0%";
}
function toOrderHistory() {
  const dropdownContainer = document.getElementById("dropdown-container");
  const orderHistoryBtn = document.getElementById("order-history-btn");
  const productManageBtn = document.getElementById("product-manage-btn");
  const userManageBtn = document.getElementById("user-manage-btn");
  const userManageSection = document.getElementById("user-manage-section");
  const productManageSection = document.getElementById(
    "product-manage-section"
  );
  const orderHistorySection = document.getElementById("order-history-section");
  dropdownContainer.style.height = "0%";
  orderHistoryBtn.style.color = "#ffb800";
  productManageBtn.style.color = "white";
  userManageBtn.style.color = "white";
  orderHistorySection.style.width = "100%";
  userManageSection.style.width = "0%";
  productManageSection.style.width = "0%";
}
