<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
    </aside>
    <div class="column-responsive column-80">
        <div class="roles form content">
            <?= $this->Form->create(new \App\Model\Entity\Role(), ['url' => '/roles/add']) ?>
            <fieldset>
                <?php
                ?>
                <label for="textInputFormRole">Nom</label>
                <input class="form-control-color w-100 bg-secondary form-control" type="text" name="name" min="0"
                       max="45" required placeholder="Un Nom De Role">
                <label for="numInputFormRole">Niveau</label>
                <input id="numInputForm" class="form-control-color w-100 bg-secondary form-control" type="number"
                       name="level" min="0" required max="99999" value="0" placeholder="10">
                <?php
                ?>
            </fieldset>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success btn-sm">Sauvegarder <i class="bi bi-check-lg"></i></button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
