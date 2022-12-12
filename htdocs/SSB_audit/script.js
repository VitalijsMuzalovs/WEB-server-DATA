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
