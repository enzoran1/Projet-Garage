const afficheModal = document.querySelector('#affiche-modal');
const modalPub = document.querySelector('#modal-pub');
afficheModal.addEventListener('click', (e) => {
    modalPub.classList.remove('hidden');
    content.classList.add('flou');
})

const content = document.querySelector('.content');

const listeModal = document.querySelectorAll('.modal').forEach((modal) => {

    const conteneurModal = modal.querySelector('.conteneur-modal');
    const modalPubClose = modal.querySelector('.close');

    modalPubClose.addEventListener('click', cacheModal);
    modal.addEventListener('click', cacheModal);
    conteneurModal.addEventListener('click', (e) => { e.stopPropagation() });

    function cacheModal(e) {
        modal.classList.add('hidden');
        content.classList.remove('flou');
        e.stopPropagation();
    }
});
