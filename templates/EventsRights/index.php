<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsRight[]|\Cake\Collection\CollectionInterface $eventsRights
 */
?>
<div class="eventsRights index content">
    <?= $this->Html->link(__('New Events Right'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Events Rights') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_event') ?></th>
                    <th><?= $this->Paginator->sort('id_user') ?></th>
                    <th><?= $this->Paginator->sort('id_role') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('level') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventsRights as $eventsRight): ?>
                <tr>
                    <td><?= $this->Number->format($eventsRight->id) ?></td>
                    <td><?= $this->Number->format($eventsRight->id_event) ?></td>
                    <td><?= $eventsRight->id_user === null ? '' : $this->Number->format($eventsRight->id_user) ?></td>
                    <td><?= $eventsRight->id_role === null ? '' : $this->Number->format($eventsRight->id_role) ?></td>
                    <td><?= h($eventsRight->name) ?></td>
                    <td><?= $this->Number->format($eventsRight->level) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $eventsRight->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsRight->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsRight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsRight->id)]) ?>
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
