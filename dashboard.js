const nav = document.querySelector('main nav');
const navHamburger = document.querySelector('main nav .nav_header i');

window.addEventListener('DOMContentLoaded', () => {
    if (document.documentElement.clientWidth > 850) {
        nav?.classList.remove('nav_mobile');
    } else {
        nav?.classList.add('nav_mobile');
    }

});

navHamburger?.addEventListener('click', () => {
    nav?.classList.toggle('nav_mobile');
});

window.addEventListener('resize', (e) => {
    if (e.target.innerWidth > 850) {
        nav?.classList.remove('nav_mobile');
    } else {
        nav?.classList.add('nav_mobile');
    }
});
