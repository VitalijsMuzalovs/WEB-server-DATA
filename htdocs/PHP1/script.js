function showArticle(uzd){  
    console.log(uzd) 
    let klikskis = document.getElementById(uzd);
    
    if(klikskis.style.display === 'block'){
        klikskis.style.display = 'none'
        console.log(klikskis.style.display)
    }else{
        klikskis.style.display= 'block'
        console.log(klikskis.style.display)
    }
}