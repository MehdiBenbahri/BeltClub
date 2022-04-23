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
            <?= $this->Html->link(__('Edit Events Lot'), ['action' => 'edit', $eventsLot->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Events Lot'), ['action' => 'delete', $eventsLot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsLot->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Events Lots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Events Lot'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsLots view content">
            <h3><?= h($eventsLot->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($eventsLot->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($eventsLot->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Events') ?></th>
                    <td><?= $this->Number->format($eventsLot->id_events) ?></td>
                </tr>
                <tr>
                    <th><?= __('Somme') ?></th>
                    <td><?= $eventsLot->somme === null ? '' : $this->Number->format($eventsLot->somme) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Money') ?></th>
                    <td><?= $this->Number->format($eventsLot->is_money) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Locked') ?></th>
                    <td><?= $this->Number->format($eventsLot->is_locked) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price Depart') ?></th>
                    <td><?= $eventsLot->price_depart === null ? '' : $this->Number->format($eventsLot->price_depart) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price Min') ?></th>
                    <td><?= $eventsLot->price_min === null ? '' : $this->Number->format($eventsLot->price_min) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($eventsLot->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($eventsLot->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
