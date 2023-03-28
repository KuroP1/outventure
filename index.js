var isOpen = false;
function toggleActive() {
  //get burger btn through id
  //get top-menu through id
  const topMenu = document.getElementById("top-menu");
  const topSection = document.getElementById("top-section");

  //set top-menu to height of 100vh
  if (!isOpen) {
    //get height of top-section
    height = topSection.offsetHeight;
    topMenu.style.height = height + "px";
    isOpen = true;
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
    }
    //if windows size is greater than 768px, set top-menu to height of 0
    if (window.innerWidth > 768) {
      isOpen = false;
      topMenu.style.height = "0%";
    }
  });
}
