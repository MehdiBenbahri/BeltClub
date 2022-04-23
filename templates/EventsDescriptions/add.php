<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsDescription $eventsDescription
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Events Descriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsDescriptions form content">
            <?= $this->Form->create($eventsDescription) ?>
            <fieldset>
                <legend><?= __('Add Events Description') ?></legend>
                <?php
                    echo $this->Form->control('id_event');
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('img_path');
                    echo $this->Form->control('is_complete');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
