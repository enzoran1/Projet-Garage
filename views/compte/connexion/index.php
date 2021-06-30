<div class="ban" id="ban__compte">
    <h1>Mon Compte</h1>
</div>
<div class="compte-titre">
    <h2>Veuillez-vous<br>connecter</h2>
</div>

<form action="/Compte/login" method="POST" class="form">
    <div class="form__container">
        <div class="form__content">
            <label for="email">Votre email :</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="form__content">
            <label for="mdp">Votre mot de passe :</label>
            <input type="password" name="mdp" id="mdp">
        </div>
        <div class="form__btn">
            <button type="submit">Connexion</button>
        </div>
        <div class="form__inscription">
            <a href="/Inscription">Pas de compte inscrivez-vous</a>
        </div>
    </div>
</form>