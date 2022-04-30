<div class="users form m-3" id="UserConnectionPlan">
    <h3 class="text-center">Vous avez déjà un compte ?</h3>
    <br>
    <?= $this->Form->create(new \App\Model\Entity\User(), ['url' => '/users/login']) ?>
    <fieldset class="my-1">
        <div class="form-floating mb-3">
            <input required type="email" name="email" class="form-control  bg-secondary" id="floatingEmail"
                   placeholder="nom@exemple.fr">
            <label for="floatingEmail">Addresse email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control bg-secondary" id="floatingPassword"
                   placeholder="***********">
            <label for="floatingPassword">Mot de passe</label>
        </div>
    </fieldset>
    <span class="d-flex justify-content-around">
        <button type="button" id="ToIncriptionPlan" class="btn btn-outline-warning">
            Inscription <i class="bi bi-currency-dollar"></i>
        </button>
        <button type="submit" class="btn btn-outline-light">Connexion <i class="bi bi-box-arrow-in-right"></i></button>

    </span>
    <?= $this->Form->end() ?>
</div>
<div class="users form" id="UserInscriptionPlan" style="display:none">
    <div class="bg-warning text-dark">
        <img class="w-100 shadow" src="<?= $this->url->build("/img/banner.png") ?>">
        <h3 class=" p-2 text-center text-uppercase">Contactez le 100-6082 <i class="bi bi-telephone-outbound"></i></h3>
    </div>
    <div class="border border-warning rounded row m-4 p-1">
        <p>- L'achat d'une licenses néssessite une organisation (entreprise, club etc...).</p>
        <p>- Une licence permet de gérer plusieurs types d'événements.</p>
        <p>- Chaque licence permet d'ajouter des utilisateurs de confiance pour aider à gérer les événements.</p>
        <p>- Le prix d'une licence peut varier en fonction de l'évènement et de l'organisation. (par exemple les
            licences pour mariages sont gratuites).</p>
    </div>
    <span class="d-flex justify-content-around">
        <button type="button" id="ToConnectionPlan"
                class="btn btn-outline-warning">Enfaite j'ai un compte... 😱</button>
    </span>
    <br>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        $("#ToIncriptionPlan").click(function () {
            $("#UserConnectionPlan").hide("slide", {direction: "left"}, 250, function () {
                $("#UserInscriptionPlan").show("slide", {direction: "right"}, 250)
            })
        });
        $("#ToConnectionPlan").click(function () {
            $("#UserInscriptionPlan").hide("slide", {direction: "right"}, 250, function () {
                $("#UserConnectionPlan").show("slide", {direction: "left"}, 250)
            })
        });
    });
</script>
