//------------------template-------------------------
//----menu burger----

let sidenav = document.getElementById("mySidenav");
let openBtn = document.getElementById("openBtn");
let closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
}

//slider 
if(sidenav!==null){
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  effect: "flip",

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




