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
    document.getElementById('savePositionBtn').setAttribute('disabled', '')
    // document.getElementById('cancelEditPosition').classList.add('disabled')
    // document.getElementById('cancelEditPosition').setAttribute('disabled', '')
    document.getElementById('editForm').style.display = 'none';
    document.getElementById("form_container").reset();
}

function displayEditForm(){
    document.getElementById('editForm').style.display = 'block';
}

function hideEditForm(){
    document.getElementById('editForm').style.display = 'none';
}

function extractFileName(){
    let a = document.getElementById('fileToUpload').files[0].name
    document.getElementById('img_url').value = "../images/spec_img/"+a
}
