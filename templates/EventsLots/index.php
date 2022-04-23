<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsLot[]|\Cake\Collection\CollectionInterface $eventsLots
 */
?>
<div class="eventsLots index content">
    <?= $this->Html->link(__('New Events Lot'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Events Lots') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_events') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('somme') ?></th>
                    <th><?= $this->Paginator->sort('is_money') ?></th>
                    <th><?= $this->Paginator->sort('is_locked') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('price_depart') ?></th>
                    <th><?= $this->Paginator->sort('price_min') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventsLots as $eventsLot): ?>
                <tr>
                    <td><?= $this->Number->format($eventsLot->id) ?></td>
                    <td><?= $this->Number->format($eventsLot->id_events) ?></td>
                    <td><?= h($eventsLot->name) ?></td>
                    <td><?= $eventsLot->somme === null ? '' : $this->Number->format($eventsLot->somme) ?></td>
                    <td><?= $this->Number->format($eventsLot->is_money) ?></td>
                    <td><?= $this->Number->format($eventsLot->is_locked) ?></td>
                    <td><?= h($eventsLot->created) ?></td>
                    <td><?= h($eventsLot->modified) ?></td>
                    <td><?= $eventsLot->price_depart === null ? '' : $this->Number->format($eventsLot->price_depart) ?></td>
                    <td><?= $eventsLot->price_min === null ? '' : $this->Number->format($eventsLot->price_min) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $eventsLot->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsLot->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsLot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsLot->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
