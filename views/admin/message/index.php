<div class="ban" id="ban__annonces">
    <h1>Message utilisateur</h1>
</div>

<div class="message__container">
    <?php foreach ($messages as $message) : ?>
        <div class="center-message">
            <div class="message-carte__container">
                <div class="message-carte__content">
                    <div class="message-carte__content-flex">
                        <p id="message-color">Prenom :</p>
                        <p><?= $message->prenom ?></p>
                    </div>
                    <div class="message-carte__content-flex">
                        <p id="message-color">Nom :</p>
                        <p><?= $message->nom ?></p>
                    </div>
                    <div class="message-carte__content-flex">
                        <p id="message-color">Email :</p>
                        <p><?= $message->email ?></p>
                    </div>
                    <div class="message-carte__content-flex">
                        <p id="message-color">Date message :</p>
                        <p><?= $message->message_date ?></p>
                    </div>

                </div>
                <div class="carte__message">
                    <p id="message-color2">Message</p>
                    <p class="message__overflow"><?= $message->message ?></p>
                </div>
                <div class="message__btn">
                <a href="/admin/supprimerMessage/<?= $message->id ?>" onclick="return confirm('Etes-vous sûre ?');">Supprimer</a>

            </div>
            </div>
           
        </div>


<?php endforeach;   ?>




</div>