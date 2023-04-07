var isOpen = false;
function toggleActive() {
  //get burger btn through id
  //get top-menu through id
  const topMenu = document.getElementById("top-menu");
  const topSection = document.getElementById("top-section");
  const burgerBtn = document.getElementById("burger-btn");
  burgerBtn.classList.toggle("active");
  //set top-menu to height of 100vh
  if (!isOpen) {
    //get height of top-section
    height = topSection.offsetHeight;
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
      burgerBtn.classList.toggle("active");
      isOpen = false;
      topMenu.style.height = "0%";
    }
  });
}
