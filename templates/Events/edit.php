<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 * @var string[]|\Cake\Collection\CollectionInterface $eventsTypes
 * @var string[]|\Cake\Collection\CollectionInterface $eventsDescriptions
 * @var string[]|\Cake\Collection\CollectionInterface $organisations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $event->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $event->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Events'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="events form content">
            <?= $this->Form->create($event) ?>
            <fieldset>
                <legend><?= __('Edit Event') ?></legend>
                <?php
                    echo $this->Form->control('id_organisation', ['options' => $organisations]);
                    echo $this->Form->control('id_event_type', ['options' => $eventsTypes]);
                    echo $this->Form->control('id_event_description', ['options' => $eventsDescriptions]);
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
