function showArticle(event){
    let myID = event.target.id
    let str = 'uzdevums'
    let num = myID.substr(str.length)

    let klikskis = document.getElementById(`article${num}`);
    if(klikskis.style.display === 'block'){
        klikskis.style.display = 'none'
    }else{
        klikskis.style.display= 'block'
    }
}

// function showArticle1(){
//     let klikskis = document.getElementById('article1');
//     if(klikskis.style.display === 'block'){
//         klikskis.style.display = 'none'
//     }else{
//         klikskis.style.display= 'block'
//     }
// }
