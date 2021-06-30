
// constante qui représente le bouton "modifier"
const afficheModal = document.querySelector('#affiche-modal');

// correspond au modal en intégralité, caché par défaut
const modalPub = document.querySelector('#modal-pub');


// évènement -> au click, le bouton enleve le hidden et ajoute le flou
afficheModal.addEventListener('click', (e) => {
    modalPub.classList.remove('hidden');
})


const listeModal = document.querySelectorAll('.modal').forEach((modal) => {

    // contenu du modal 
    const conteneurModal = modal.querySelector('.conteneur-modal');

    // bouton pour fermer le modal
    const modalPubClose = modal.querySelector('.close');

    // ajout event : ferme le modal si on appuie
    modalPubClose.addEventListener('click', cacheModal);

    // ajout event, au click, cache le modal
    modal.addEventListener('click', cacheModal);

    // éviter la propagation sur les parents, enfants
    conteneurModal.addEventListener('click', (e) => { e.stopPropagation() });

    // ajoute le hidden 
    function cacheModal(e) {
        modal.classList.add('hidden');
        e.stopPropagation();
    }
});
