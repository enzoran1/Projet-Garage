<div class="test2">
    <?php foreach ($messages as $message) : ?>
        <div class="carte_utilisateur2">
            <div class="carte__utilisateur2-container">
                <div class="utilisateur2__prenom-nom">
                    <div class="utilisateur2__flex">
                        <p id="utilisateur2_color">Prenom : </p>
                        <p><?= $message->prenom ?></p>
                    </div>
                    <div class="utilisateur2__flex">
                        <p id="utilisateur2_color">Nom : </p>
                        <p><?= $message->nom ?></p>
                    </div>
                </div>
                <div class="utilisateur2__flex">
                    <p id="utilisateur2_color">Email : </p>
                    <p><?= $message->email ?></p>
                </div>
                
                
                <div class="utilisateur2__flex">
                    <p id="utilisateur2_color">Date message: </p>
                    <p><?= $message->message_date ?></p>
                </div>
                <div class="utilisateur2__flex2">
                    <p id="utilisateur2_color">Message</p>
                    <p id="color_message2"><?= $message->message ?></p>
                </div>
                <div class="utilisateur2__btn">
                    <button type="submit">Supprimer</button>
                </div>
            </div>
        </div>

    <?php endforeach;   ?>


</div>
