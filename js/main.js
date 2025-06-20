const container = document.querySelector('.header-burger__item');
const burger = document.querySelector('.fa-burger');
const cross = document.querySelector('.fa-xmark');
cross.style.display = 'none';
const nav = document.querySelector('.header-nav');
toggleBurger = true;

burger.addEventListener('click', () => {
  toggleBurger = !toggleBurger;
  toggleFunctions(toggleBurger, burger, cross, nav, container);
});

cross.addEventListener('click', () => {
  toggleBurger = !toggleBurger;
  toggleFunctions(toggleBurger, burger, cross, nav, container);
});

function toggleFunctions(toggleBurger, burger, cross, nav, container) {
  if (toggleBurger) {
    burger.style.display = '';
    cross.style.display = 'none';
    nav.classList.add('close');
    nav.classList.remove('open');
    container.classList.remove('open');
  } else {
    burger.style.display = 'none';
    cross.style.display = '';
    nav.classList.remove('close');
    nav.classList.add('open');
    container.classList.add('open');
  }
}
