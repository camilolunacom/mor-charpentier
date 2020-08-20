window.onload = () => {
  const mainHeader = document.querySelector(".main-header");
  let scrollTop;

  window.addEventListener("scroll", () => {
    scrollTop = document.documentElement.scrollTop;

    if (scrollTop > 1) {
      mainHeader.classList.add("main-header--fixed");
    } else {
      mainHeader.classList.remove("main-header--fixed");
    }
  });
};
