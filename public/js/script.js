//------------------template-------------------------
//----menu burger----

let sidenav = document.getElementById("mySidenav");
let openBtn = document.getElementById("openBtn");
let closeBtn = document.getElementById("closeBtn");
let main = document.getElementsByTagName("main");

//ouvre la nav si click sur burger
openBtn.onclick = openNav;

//la ferme si click dans main
for(let i of main){
    i.onclick = closeNav;
}

//ferme si click sur croix
closeBtn.onclick = closeNav;

//rajoute la class active a la nav
function openNav() {
  sidenav.classList.add("active");
}

//enleve la class active
function closeNav() {
  sidenav.classList.remove("active");
}
//-----------------------------page Home-----------
//slider  
if(sidenav!==null){
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  //effect: "fade",
   autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
 /* scrollbar: {
    el: '.swiper-scrollbar',
  },*/
});
}
//-----------------page produit/service-----------------
//------bouton filtres pdt
let btnLegume = document.querySelector(".btn-legumes");
let btnFruit = document.querySelector(".btn-fruits");
let btnTout = document.querySelector(".btn-tout");
let carteLegume = document.querySelectorAll(".legume");
let carteFruit = document.querySelectorAll(".fruit");

let btnMaison = document.querySelector(".btn-maison");
let btnAuto = document.querySelector(".btn-auto");
let btnToutServ = document.querySelector(".btn-tout-serv");
let carteMaison = document.querySelectorAll(".maison");
let carteAuto = document.querySelectorAll(".auto");

let carteProduit = document.querySelectorAll(".card-produit");

if(btnLegume !== null){
btnLegume.addEventListener("click", ()=> {
    aff_categ(carteLegume);
})
}

if(btnFruit !== null){
btnFruit.addEventListener("click", ()=> {
    aff_categ(carteFruit);
})
}

if(btnTout !== null){
btnTout.addEventListener("click", ()=> {
    aff_categ(carteProduit);
})
}

//-----filtre services
if(btnMaison !== null){
btnMaison.addEventListener("click", ()=> {
    aff_categ(carteMaison);
})
}


if(btnAuto !== null){
btnAuto.addEventListener("click", ()=> {
    aff_categ(carteAuto);
})
}

if(btnToutServ !== null){
btnToutServ.addEventListener("click", ()=> {
    aff_categ(carteProduit);
})
}
function aff_categ(liste) {
    for(let i of carteProduit){
        i.classList.add("hide");
        i.classList.remove("flex");
    }
    for(let i of liste){
        i.classList.remove("hide");
        i.classList.add("flex")
    }
}

//----------------page message----------------------
//-----scroll auto des conv a l'ouverture 
let containerConv = document.querySelector(".liste-bulle");
let dateMessage = document.querySelectorAll(".date-msg");

//voir pour trouver la taille du div
if(containerConv!==null){
    
    containerConv.scroll({
    top:10000,
    });
    
    
    //affiche et enleve les date des messages au clic sur la conv
    for (let i of dateMessage){
        containerConv.addEventListener('click', function(){
        i.classList.remove("hide");    
        setTimeout(function(){
        i.classList.add("hide")}, 3000
        ) ;   
            
        console.log(i);    
        })
    }

}

//-----------------------page compte--------------------------

//---------------verif login et mail ajax-----------------
let form = document.getElementById('form-inscription');
let login = document.querySelector('#login');
let body = document.querySelector('body');
let contenu = document.querySelector('#contenu-login');
let contenuMail = document.querySelector("#contenu-mail");
let mail = document.querySelector('#mail');
let formvalid = true;
//verification que pas de login connu a l'inscription
if(form !== null){
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if(formvalid) {
            console.log(form, e.currentTarget);
            document.getElementById('form-inscription').submit();
        }
    });
    
    login.addEventListener('keyup', function(){
    let search = login.value;
    let formData = new FormData();
    formData.append('login', search);
        
        let obj = { 'method': 'POST', 'body': formData };
        
        fetch('ajax/loginControl.php', obj)
            .then(response => response.text())
            .then(data => {
                if(parseInt(data)) {
                    let mess = "ce pseudo est déjà utilisé !";
                    login.classList.add("red");
                    contenu.innerHTML = mess;
                    formvalid = false;
                }else{
                    contenu.innerHTML = "";
                    login.classList.remove("red");
                    formvalid = true;
                }
            })
            .catch(err => console.error(err));
})  

mail.addEventListener('keyup', function(){
    let searchM = mail.value;
    let formData = new FormData();
    formData.append('mail', searchM);
        
        let obj = { 'method': 'POST', 'body': formData };
        
        fetch('ajax/loginControl.php', obj)
            .then(response => response.text())
            .then(data => {
                if(parseInt(data)) {
                    let mess = "ce mail est déjà utilisé !";
                    mail.classList.add("red");
                    contenuMail.innerHTML = mess;
                    formvalid = false;
                }else{
                    contenuMail.innerHTML = "";
                    mail.classList.remove("red");
                    formvalid = true;
                }
            })
            .catch(err => console.error(err));
})    
}
//---------------------page gestion infos users----------------------

//verification pas de doublon de login lors de la modif de users
let formUpdateUsers = document.querySelector('.formUpdateUsers');
let loginUpdateUsers = document.querySelector('#loginUpdateUsers');
let containMsgUser = document.querySelector('#contenu-login-updateInfos');
let contenuMailUser = document.querySelector("#contenu-mail-updateInfos");
let mailUser = document.querySelector('#mailUpdateUsers');





if(formUpdateUsers !== null){
    loginUpdateUsers.addEventListener('keyup', function(){
    let search = loginUpdateUsers.value;
    let formData = new FormData();
    formData.append('login', search);
        
        let obj = { 'method': 'POST', 'body': formData };
        
        fetch('ajax/loginControl.php', obj)
            .then(response => response.text())
            .then(data => {
                if(parseInt(data)) {
                    let mess = "ce pseudo est déjà utilisé !";
                    loginUpdateUsers.classList.add("red");
                    containMsgUser.innerHTML = mess;
                }else{
                    containMsgUser.innerHTML = "";
                    loginUpdateUsers.classList.remove("red");
                }
            })
            .catch(err => console.error(err));
})

//verifcation mail
   mailUser.addEventListener('keyup', function(){
    let search = mailUser.value;
    let formData = new FormData();
    formData.append('mail', search);
        
        let obj = { 'method': 'POST', 'body': formData };
        
        fetch('ajax/loginControl.php', obj)
            .then(response => response.text())
            .then(data => {
                if(parseInt(data)) {
                    let mess = "cette adresse existe déjà";
                    mailUser.classList.add("red");
                    contenuMailUser.innerHTML = mess;
                }else{
                    contenuMailUser.innerHTML = "";
                    mailUser.classList.remove("red");
                }
            })
            .catch(err => console.error(err));
})
}


