var isOpen = false;
function toggleActive() {
  //get burger btn through id
  const burger = document.getElementById("burger-btn");
  //get top-menu through id
  const topMenu = document.getElementById("top-menu");
  //set top-menu to height of 100vh
  if (!isOpen) {
    topMenu.style.height = "100%";
    isOpen = true;
  } else if (isOpen) {
    topMenu.style.height = "0%";
    isOpen = false;
  }
}
