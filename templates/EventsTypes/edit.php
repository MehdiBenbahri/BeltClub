<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsType $eventsType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventsType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventsType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Events Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsTypes form content">
            <?= $this->Form->create($eventsType) ?>
            <fieldset>
                <legend><?= __('Edit Events Type') ?></legend>
                <?php
                    echo $this->Form->control('slug');
                    echo $this->Form->control('name');
                    echo $this->Form->control('is_legal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
