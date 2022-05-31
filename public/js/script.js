//menu burger
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


//bouton filtres pdt
let btnLegume = document.querySelector(".btn-legumes");
let btnFruit = document.querySelector(".btn-fruits");
let btnTout = document.querySelector(".btn-tout");
let carteLegume = document.querySelectorAll(".legume");
let carteFruit = document.querySelectorAll(".fruit");
let carteProduit = document.querySelectorAll(".card-produit");



console.log(btnLegume);
console.log(carteProduit);

btnLegume.addEventListener("click", ()=> {
    aff_categ(carteLegume);
})

btnFruit.addEventListener("click", ()=> {
    aff_categ(carteFruit);
})

btnTout.addEventListener("click", ()=> {
    aff_categ(carteProduit);
})

function aff_categ(liste) {
    for(let i of carteProduit){
        i.classList.add("hide");
    }
    for(let i of liste){
        i.classList.remove("hide");
    }
}

/*
//filtre services
let btnMaison = document.querySelector(".btn-maison");
let btnAuto = document.querySelector(".btn-auto");
let btnToutServ = document.querySelector(".btn-tout-serv");
let carteMaison = document.querySelectorAll(".maison");
let carteAuto = document.querySelectorAll(".auto");
let carteService = document.querySelectorAll(".card-service");

console.log(btnMaison);
console.log(carteService);

btnMaison.addEventListener("click", ()=> {
    aff_categ_serv(carteMaison);
})

btnAuto.addEventListener("click", ()=> {
    aff_categ_serv(carteAuto);
})

btnToutServ.addEventListener("click", ()=> {
    aff_categ_serv(carteService);
})

function aff_categ_serv(liste2) {
    for(let i of carteService){
        i.classList.add("hide");
    }
    for(let i of liste2){
        i.classList.remove("hide");
    }
}*/