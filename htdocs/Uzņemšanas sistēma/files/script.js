let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
} 

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
} 

/*
if (window.history.replaceState) {
    window.history.replaceState( null, null, window.location.href );
}
*/

function cancelEdit(){
    document.getElementById('addPositionBtn').classList.remove('disabled')
    document.getElementById('addPositionBtn').type="submit"
    document.getElementById('savePositionBtn').classList.add('disabled')
    document.getElementById('savePositionBtn').type="text"
    document.getElementById('cancelEditPosition').classList.add('disabled')
    document.getElementById('cancelEditPosition').type="text"
}