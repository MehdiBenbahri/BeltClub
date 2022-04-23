<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsType[]|\Cake\Collection\CollectionInterface $eventsTypes
 */
?>
<div class="eventsTypes index content">
    <?= $this->Html->link(__('New Events Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Events Types') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('is_legal') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventsTypes as $eventsType): ?>
                <tr>
                    <td><?= $this->Number->format($eventsType->id) ?></td>
                    <td><?= h($eventsType->slug) ?></td>
                    <td><?= h($eventsType->name) ?></td>
                    <td><?= $this->Number->format($eventsType->is_legal) ?></td>
                    <td><?= h($eventsType->created) ?></td>
                    <td><?= h($eventsType->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $eventsType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsType->id)]) ?>
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
