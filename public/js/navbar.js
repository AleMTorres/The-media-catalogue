const navbarBurguer = document.getElementById('navbarBurguer');
const navbarMenu = document.getElementById('navbarMobileMenu');


navbarBurguer.addEventListener('click', () => {
    navbarMenu.classList.toggle('is-active');
});