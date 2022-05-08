<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create(new \App\Model\Entity\User(), ['url' => '/users/add']) ?>
            <legend>Ajouter un membre d'organisation</legend>
            <fieldset>
                <label for="name">Nom</label>
                <input name="name" type="text" value="" placeholder="Nom du membre" required class="form-control my-1">

                <label for="role_id">Rôle</label>
                <select class="form-control text-secondary" name="id_role" required>
                    <option selected disabled class="text-white text-left" value="">SÉLECTIONNEZ UN RÔLE</option>
                    <?php foreach ($roles as $role) { ?>
                        <?php if (!$role->is_admin) { ?>
                            <option class="text-dark" value="<?= $role->id ?>"><?= $role->name ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>

                <label for="email">Email</label>
                <input name="email" type="email" value="" placeholder="Email du membre" class="form-control my-1"
                       required>

                <label for="tel_ingame">Téléphone en jeu</label>
                <input name="tel_ingame" type="tel" minlength="8" maxlength="8" value=""
                       placeholder="Tel du membre (en jeu...)" class="form-control my-1" required>

                <label for="password">Mot de passe</label>
                <input name="password" type="password" minlength="5" maxlength="45" value=""
                       placeholder="Mot du passe du membre" class="form-control my-1" required>

                <label for="discord_id">Discord</label>
                <input type="text" name="discord_id" placeholder="Discord du membre" class="form-control my-1">
                <div class="d-flex justify-content-between mt-2 align-items-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success btn-sm">Sauvegarder <i class="bi bi-check-lg"></i>
                    </button>
                </div>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
