<div class="ban" id="ban__contact">
    <h1>Contacts</h1>
</div>
<div class="titre-contact">
    <h2>Nous Contacter</h2>
</div>

<form action="/Contact/contact" class="form3" method="post">
    <div class="form3__container">
        <div class="form3__flex">
            <div class="form3__content">
                <label for="">Prénom :</label>
                <input type="text" name="prenom" id="prenom">
            </div>
            <div class="form3__content">
                <label for="">Nom :</label>
                <input type="text" name="nom" id="nom">
            </div>
        </div>
        <div class="form3__content">
            <label for="">Email :</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form3__content">
            <label for="">Message</label>
            <textarea name="message" id="message" cols="32" rows="10"></textarea>
        </div>
        <div class="form3__btn">
            <button type="submit">Envoyer</button>
        </div>
    </div>