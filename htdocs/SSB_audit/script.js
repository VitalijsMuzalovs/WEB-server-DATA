function switchBlock(block){ 
    let register = document.getElementById('registracija');
    let login = document.getElementById('login');

    if(block === 'registracija'){
        register.style.display = 'block';
        login.style.display = 'none';
    }else{
        login.style.display = 'block';
        register.style.display = 'none';
    }
}
;


function cancelEdit(){
    document.getElementById('addUserBtn').classList.remove('disabled')
    document.getElementById('addUserBtn').type="submit"
    document.getElementById('saveUserBtn').classList.add('disabled')
    document.getElementById('saveUserBtn').type="text"
    document.getElementById('cancelEditUser').classList.add('disabled')
    document.getElementById('cancelEditUser').type="text"
}