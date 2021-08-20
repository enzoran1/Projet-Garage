

const navButton = document.querySelector(".navbar__container-burger");
const navMenu = document.querySelector(".navbar__menu");


navButton.addEventListener("click", function(){
    navMenu.classList.toggle("show");
})


const tableauDiapo = [];

window.onload = () => {
    // On récupère le conteneur principal du diaporama
    const diapos = document.querySelectorAll(".diapo")
    diapos.forEach((diapo,index)=>{

        tableauDiapo[index] = {
            compteur: 0,
            timer: null,
            elements: null,
            slides: [],
            slideWidth: 0,
        }

        // On récupère le conteneur de tous les éléments
        tableauDiapo[index].elements = diapo.querySelector(".elements")

        // On récupère un tableau contenant la liste des diapos
        tableauDiapo[index].slides = Array.from(tableauDiapo[index].elements.children)

        // On calcule la largeur visible du diaporama
        tableauDiapo[index].slideWidth = diapo.getBoundingClientRect().width

        // On récupère les deux flèches
        let next = diapo.querySelector("#nav-droite")
        let prev = diapo.querySelector("#nav-gauche")

        // On met en place les écouteurs d'évènements sur les flèches
        next.addEventListener("click", slideNext.bind(null,index)),
        prev.addEventListener("click", slidePrev.bind(null,index))

        // Automatiser le diaporama
        tableauDiapo[index].timer = setInterval(slideNext.bind(null,index), 4000)

        // Gérer le survol de la souris
        diapo.addEventListener("mouseover", stopTimer.bind(null,index))
        diapo.addEventListener("mouseout", startTimer.bind(null,index))

        // Mise en oeuvre du "responsive"
        window.addEventListener("resize", () => {
            tableauDiapo[index].slideWidth = diapo.getBoundingClientRect().width
            slideNext(index)
        })
    })
}

/**
 * Cette fonction fait défiler le diaporama vers la droite
 */
function slideNext(index){

    // On incrémente le compteur
    tableauDiapo[index].compteur++

    // Si on dépasse la fin du diaporama, on "rembobine"
    if(tableauDiapo[index].compteur == tableauDiapo[index].slides.length){
        tableauDiapo[index].compteur = 0
    }

    // On calcule la valeur du décalage
    let decal = -tableauDiapo[index].slideWidth * tableauDiapo[index].compteur
    tableauDiapo[index].elements.style.transform = `translateX(${decal}px)`
}

/**
 * Cette fonction fait défiler le diaporama vers la gauche
 */
function slidePrev(index){
    // On décrémente le compteur
    tableauDiapo[index].compteur--

    // Si on dépasse le début du diaporama, on repart à la fin
    if(tableauDiapo[index].compteur < 0){
        tableauDiapo[index].compteur = tableauDiapo[index].slides.length - 1
    }

    // On calcule la valeur du décalage
    let decal = -tableauDiapo[index].slideWidth * tableauDiapo[index].compteur
    tableauDiapo[index].elements.style.transform = `translateX(${decal}px)`
}

/**
 * On stoppe le défilement
 */
function stopTimer(index){
    clearInterval(tableauDiapo[index].timer)
}

/**
 * On redémarre le défilement
 */
function startTimer(index){
    tableauDiapo[index].timer = setInterval(slideNext.bind(null,index), 4000)
}
