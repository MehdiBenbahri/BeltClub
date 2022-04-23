<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contributor $contributor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Contributors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contributors form content">
            <?= $this->Form->create($contributor) ?>
            <fieldset>
                <legend><?= __('Add Contributor') ?></legend>
                <?php
                    echo $this->Form->control('id_users');
                    echo $this->Form->control('id_events');
                    echo $this->Form->control('somme_reverse');
                    echo $this->Form->control('somme_du');
                    echo $this->Form->control('pourcentage');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
