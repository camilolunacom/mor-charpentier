window.onload = () => {
  const mainHeader = document.querySelector(".main-header");
  let scrollTop;

  window.addEventListener("scroll", () => {
    scrollTop = document.documentElement.scrollTop;

    if (scrollTop > 80) {
      mainHeader.classList.add("main-header--fixed");
    } else {
      mainHeader.classList.remove("main-header--fixed");
    }
  });

  const filters = document.querySelector(".filters");

  // If there are filters
  if (filters) {
    const filtersBtn = filters.querySelector(".filters__btn");
    filtersBtn.addEventListener("click", () => {
      filters.classList.toggle("filters--active");
      if (filtersBtn.textContent === "Show filters") {
        filtersBtn.textContent = "Hide filters";
      } else {
        filtersBtn.textContent = "Show filters";
      }
    });
  }

  const shareButtons = document.querySelectorAll(".share__btn");

  // If there are share buttons
  if (shareButtons.length > 0) {
    shareButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        e.preventDefault();

        console.log(e.target);

        let network = e.target.getAttribute("data-network");
        let content = e.target.getAttribute("data-content");
        let url = e.target.getAttribute("data-url");

        if (network === "facebook") {
          window.open(
            "http://www.facebook.com/sharer.php?u=" +
              encodeURIComponent(url) +
              "&t=" +
              encodeURIComponent(content),
            "facebook",
            "height=700,width=550,resizable=1"
          );
        } else if (network === "twitter") {
          window.open(
            "http://twitter.com/share?url=" +
              encodeURIComponent(url) +
              "&text=" +
              encodeURIComponent(content) +
              "&count=none/",
            "tweet",
            "height=350,width=600,resizable=1"
          );
        }
      });
    });
  }
};
