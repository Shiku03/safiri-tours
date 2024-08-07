const menu= document.getElementById('sidebar');
const overlay = document.getElementById('navbar-container');
const content = document.getElementById('content');


function openSideNav(){
    menu.classList.add('menu');
    overlay.classList.add('overlay');
    content.style.filter= 'blur(4px)';
}

function closeSideNav(){
    menu.classList.remove('menu');
    overlay.classList.remove('overlay');
    content.style.filter= 'none';

}