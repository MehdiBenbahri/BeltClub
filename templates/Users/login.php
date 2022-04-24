<div class="users form">
    <h3>Connexion</h3>
    <?= $this->Form->create(new \App\Model\Entity\User(),['url' =>  '/users/login']) ?>
    <fieldset>
        <div class="form-floating mb-3">
            <input required type="email" name="email" class="form-control  bg-secondary" id="floatingEmail" placeholder="nom@exemple.fr">
            <label for="floatingEmail">Addresse email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control bg-secondary" id="floatingPassword" placeholder="***********">
            <label for="floatingPassword">Mot de passe</label>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-outline-light">Connexion</button>
    <?= $this->Form->end() ?>
</div>
