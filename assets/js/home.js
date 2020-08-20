window.onload = () => {
  new Glide('.glide').mount();
  
  const mainHeader = document.querySelector('.main-header');
  let scrollTimeout;  // Global for any pending scrollTimeout
  let scrollTop;

  mainHeader.classList.add('main-header--home');

  window.addEventListener('scroll', () => {
    scrollTop = document.documentElement.scrollTop;
  
    if (scrollTop > 64) {
      mainHeader.classList.remove('main-header--home');
    } else {
      mainHeader.classList.add('main-header--home');
    }
  })

}
