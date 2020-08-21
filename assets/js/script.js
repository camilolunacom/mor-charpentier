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
  const filtersBtn = filters.querySelector(".filters__btn");
  const filtersList = filters.querySelector(".filters__list");

  if (filtersBtn) {
    filtersBtn.addEventListener('click', () => {
      filters.classList.toggle('filters--active')
      if (filtersBtn.textContent === 'Show filters') {
        filtersBtn.textContent = 'Hide filters';
      } else {
        filtersBtn.textContent = 'Show filters';
      }
    })
  }
};
