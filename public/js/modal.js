function modal()
{

    // constante qui représente le bouton "modifier"
    const afficheModal = document.querySelector('#affiche-modal');

    // correspond au modal en intégralité, caché par défaut
    const modalPub = document.querySelector('#modal-pub');

    // bouton submit
    const submitButton = document.getElementById('submitpasswordmodal');  


    const pass1 = document.getElementById('password1');
    const pass2 = document.getElementById('password2');  


    // évènement -> au click, le bouton enleve le hidden et ajoute le flou
    afficheModal.addEventListener('click', (e) => {
        modalPub.classList.remove('hidden');
    })


    const listeModal = document.querySelectorAll('.modal').forEach((modal) => 
    {

        // contenu du modal 
        const conteneurModal = modal.querySelector('.conteneur-modal');

        // bouton pour fermer le modal
        const modalPubClose = modal.querySelector('.close');

        // ajout event : ferme le modal si on appuie
        modalPubClose.addEventListener('click', cacheModal);

        // ajout event, au click, cache le modal
        modal.addEventListener('click', cacheModal);

        submitButton.addEventListener('click', testUser);

        // éviter la propagation sur les parents, enfants
        conteneurModal.addEventListener('click', (e) => { e.stopPropagation() });

        // ajoute le hidden 
        function cacheModal(e) 
        {
            modal.classList.add('hidden');
            e.stopPropagation();
        }

        function testUser() // cette méthode vérifie que les deux mots de passe renseignés sont identifiques 
        {  

            if(pass1.value === pass2.value)
            { 
                return true;
            }
            else
            { 
                alert('les deux mots de passes ne sont pas identiques, veuillez réessayer');
                pass1.value = "";
                pass2.value = "";
            }
        }
    });
}