<div class="test2">
    <?php foreach ($message as $messages) : ?>
        <div class="carte_utilisateur2">
            <div class="carte__utilisateur2-container">
                <div class="utilisateur2__prenom-nom">
                    <div class="utilisateur2__flex">
                        <p id="utilisateur2_color">Prenom : </p>
                        <p><?= $messages->prenom ?></p>
                    </div>
                    <div class="utilisateur2__flex">
                        <p id="utilisateur2_color">Nom : </p>
                        <p><?= $messages->nom ?></p>
                    </div>
                </div>
                <div class="utilisateur2__flex">
                    <p id="utilisateur2_color">Email : </p>
                    <p><?= $messages->email ?></p>
                </div>
                
                
                <div class="utilisateur2__flex">
                    <p id="utilisateur2_color">Date message: </p>
                    <p><?= $messages->message_date ?></p>
                </div>
                <div class="utilisateur2__flex2">
                    <p id="utilisateur2_color">Message</p>
                    <p id="color_message2"><?= $messages->message ?></p>
                </div>
                <div class="utilisateur2__btn">
                    <button type="submit">Supprimer</button>
                </div>
            </div>
        </div>

    <?php endforeach;   ?>


</div>
