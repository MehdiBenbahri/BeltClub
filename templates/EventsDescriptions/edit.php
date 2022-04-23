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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventsDescription->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventsDescription->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Events Descriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsDescriptions form content">
            <?= $this->Form->create($eventsDescription) ?>
            <fieldset>
                <legend><?= __('Edit Events Description') ?></legend>
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
