const btnOpen = document.querySelector('#open');
const btnClose = document.querySelector('#close');
const mobileMenu = document.querySelector('.main-menu-mobile');

btnOpen.addEventListener('click', ()=>{
mobileMenu.classList.add('show');
btnClose.classList.add('show');
});

btnClose.addEventListener('click', ()=>{
    mobileMenu.classList.remove('show');
    btnClose.classList.remove('show');
    });