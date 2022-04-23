<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsRight $eventsRight
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Events Rights'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsRights form content">
            <?= $this->Form->create($eventsRight) ?>
            <fieldset>
                <legend><?= __('Add Events Right') ?></legend>
                <?php
                    echo $this->Form->control('id_event');
                    echo $this->Form->control('id_user');
                    echo $this->Form->control('id_role');
                    echo $this->Form->control('name');
                    echo $this->Form->control('level');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
