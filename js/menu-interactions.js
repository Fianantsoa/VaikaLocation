const showButton = document.getElementById('showButton');
const menu = document.getElementById('menu');
const menuLinks = menu.querySelectorAll('a');

showButton.addEventListener('click', () => {
    menu.classList.toggle('show');
});

menuLinks.forEach(link => {
    link.addEventListener('click', () => {
    menu.classList.remove('show');
    });
});