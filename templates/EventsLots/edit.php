<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsLot $eventsLot
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventsLot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventsLot->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Events Lots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsLots form content">
            <?= $this->Form->create($eventsLot) ?>
            <fieldset>
                <legend><?= __('Edit Events Lot') ?></legend>
                <?php
                    echo $this->Form->control('id_events');
                    echo $this->Form->control('name');
                    echo $this->Form->control('somme');
                    echo $this->Form->control('is_money');
                    echo $this->Form->control('is_locked');
                    echo $this->Form->control('price_depart');
                    echo $this->Form->control('price_min');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
