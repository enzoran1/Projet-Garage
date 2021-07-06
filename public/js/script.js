const navButton = document.querySelector(".navbar__container-burger");
const navMenu = document.querySelector(".navbar__menu");


navButton.addEventListener("click", function(){
    navMenu.classList.toggle("show");
})



const ajoutPanier = document.querySelector('#panier-ajout');
const hidden = document.querySelector('.hidden');


ajoutPanier.addEventListener("click",(event) =>{

    hidden.classList.toggle("show")

    

})




